<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Transaction;
use App\Models\User;

class AdminController extends Controller
{
    // Dashboard Khusus Admin
    public function dashboard()
    {
        // Hitung statistik keseluruhan perpustakaan
        $totalBooks = Book::count();
        $totalUsers = User::where('role', 'peminjam')->count();
        $activeLoans = Transaction::where('status', 'pinjam')->count();

        // Kirim 3 variabel ini ke tampilan admin
        return view('admin.dashboard', compact('totalBooks', 'totalUsers', 'activeLoans'));
    }

    // Halaman Daftar Anggota
    public function usersIndex()
    {
        $users = User::where('role', 'peminjam')->get();
        return view('admin.users.index', compact('users'));
    }
}
