<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    // ==========================================
    // AREA USER
    // ==========================================

    // Lihat riwayat
    public function index() {
        $transactions = Transaction::with('book')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();
        return view('transactions.index', compact('transactions'));
    }

    // Mengajukan Pinjaman
    public function store(Request $request) {
        $request->validate(['book_id' => 'required|exists:books,id']);
        $book = Book::findOrFail($request->book_id);

        if ($book->stok <= 0) {
            return back()->with('error', 'Maaf, stok buku sedang habis.');
        }

        // Cek jika masih ada transaksi menggantung di buku ini
        $isProcessing = Transaction::where('user_id', Auth::id())
            ->where('book_id', $book->id)
            ->whereIn('status', ['pending_pinjam', 'pinjam', 'pending_kembali'])
            ->exists();

        if ($isProcessing) {
            return back()->with('error', 'Anda masih meminjam atau dalam antrean untuk buku ini.');
        }

        Transaction::create([
            'user_id' => Auth::id(),
            'book_id' => $book->id,
            'tanggal_pinjam' => now(),
            'status' => 'pending_pinjam' // Nunggu ACC Admin
        ]);

        return redirect()->route('transactions.index')->with('success', 'Permintaan pinjam dikirim. Silakan ambil buku di petugas.');
    }

    // USER: Inisiatif mengembalikan buku
    public function userReturnBook(Transaction $transaction) {
        // Pastikan ini buku milik user tersebut
        if ($transaction->user_id !== Auth::id()) {
            abort(403);
        }

        if ($transaction->status === 'pinjam') {
            $transaction->update(['status' => 'pending_kembali']);
            return back()->with('success', 'Laporan pengembalian dikirim. Silakan serahkan fisik buku ke petugas.');
        }

        return back()->with('error', 'Aksi tidak diizinkan.');
    }


    // ==========================================
    // AREA ADMIN
    // ==========================================

    public function adminIndex() {
        $transactions = Transaction::with(['book', 'user'])->latest()->get();
        return view('admin.transactions.index', compact('transactions'));
    }

    // ACC Status Peminjaman (Super Logic)
    public function updateStatus(Transaction $transaction, $newStatus) {

        // 1. Admin ACC Pinjam -> Stok berkurang
        if ($newStatus === 'pinjam' && $transaction->status === 'pending_pinjam') {
            if ($transaction->book->stok > 0) {
                $transaction->book->decrement('stok');
                $transaction->update(['status' => 'pinjam']);
                return back()->with('success', 'Buku diserahkan ke Peminjam. Stok dikurangi.');
            }
            return back()->with('error', 'Gagal ACC, stok sudah habis.');
        }

        // 2. Admin TOLAK Pinjam -> Transaksi batal
        if ($newStatus === 'ditolak' && $transaction->status === 'pending_pinjam') {
            $transaction->update(['status' => 'ditolak']);
            return back()->with('success', 'Permintaan pinjam ditolak.');
        }

        // 3. Admin ACC Kembali -> Stok bertambah
        if ($newStatus === 'kembali' && $transaction->status === 'pending_kembali') {
            $transaction->update([
                'status' => 'kembali',
                'tanggal_kembali' => now()
            ]);
            $transaction->book->increment('stok');
            return back()->with('success', 'Buku telah diterima petugas. Stok bertambah.');
        }

        return back()->with('error', 'Tindakan tidak valid atau status sudah berubah.');
    }
}
