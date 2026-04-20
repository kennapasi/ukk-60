@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-slate-800">Riwayat Peminjaman </h2>
        <p class="text-slate-500 mt-2">Daftar buku yang sedang dan pernah kamu pinjam.</p>
    </div>

    @if(session('success'))
        <div class="bg-emerald-100 border-l-4 border-emerald-500 text-emerald-700 p-4 rounded mb-6 shadow-sm">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded mb-6 shadow-sm">
            {{ session('error') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-slate-50 border-b border-slate-100 text-slate-500 text-sm uppercase tracking-wider">
                    <tr>
                        <th class="p-4 font-semibold">Informasi Buku</th>
                        <th class="p-4 font-semibold">Tgl Pinjam</th>
                        <th class="p-4 font-semibold">Tgl Kembali</th>
                        <th class="p-4 font-semibold">Status</th>
                        <th class="p-4 font-semibold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($transactions as $trx)
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="p-4">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-16 bg-slate-100 rounded overflow-hidden flex-shrink-0 border border-slate-200">
                                    @if($trx->book && $trx->book->image)
                                        <img src="{{ asset('storage/' . $trx->book->image) }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center">
                                            <i class="fas fa-book text-slate-300"></i>
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <p class="font-bold text-slate-800">{{ $trx->book->judul ?? 'Buku Dihapus' }}</p>
                                    <p class="text-xs text-slate-500">{{ $trx->book->penulis ?? '-' }}</p>
                                </div>
                            </div>
                        </td>

                        <td class="p-4 text-slate-600">
                            {{ \Carbon\Carbon::parse($trx->tanggal_pinjam)->format('d M Y') }}
                        </td>

                        <td class="p-4 text-slate-600">
                            @if($trx->tanggal_kembali)
                                {{ \Carbon\Carbon::parse($trx->tanggal_kembali)->format('d M Y') }}
                            @else
                                <span class="text-slate-400 italic">-</span>
                            @endif
                        </td>

                        <td class="p-4">
                            @if($trx->status == 'pending_pinjam')
                                <span class="bg-blue-50 text-blue-600 px-3 py-1 rounded-full text-xs font-bold border border-blue-100">Menunggu ACC Admin</span>
                            @elseif($trx->status == 'pinjam')
                                <span class="bg-amber-50 text-amber-600 px-3 py-1 rounded-full text-xs font-bold border border-amber-100">Sedang Dipinjam</span>
                            @elseif($trx->status == 'pending_kembali')
                                <span class="bg-purple-50 text-purple-600 px-3 py-1 rounded-full text-xs font-bold border border-purple-100">Menunggu ACC Kembali</span>
                            @elseif($trx->status == 'kembali')
                                <span class="bg-emerald-50 text-emerald-600 px-3 py-1 rounded-full text-xs font-bold border border-emerald-100">Selesai</span>
                            @elseif($trx->status == 'ditolak')
                                <span class="bg-red-50 text-red-600 px-3 py-1 rounded-full text-xs font-bold border border-red-100">Ditolak Admin</span>
                            @endif
                        </td>

                       <td class="p-4 text-center">
                            @if($trx->status == 'pinjam')
                                <form action="{{ route('transactions.userReturn', $trx->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    {{-- <button type="submit" class="bg-amber-500 hover:bg-amber-600 text-white px-4 py-2 rounded-lg text-xs font-bold shadow-sm transition-colors" onclick="return confirm('Kamu yakin ingin mengembalikan buku ini? Silakan serahkan fisik buku ke petugas setelah klik OK.')">
                                        <i class="fas fa-undo mr-1"></i> Kembalikan
                                    </button> --}}
                                </form>
                            @elseif($trx->status == 'pending_kembali')
                                <span class="text-purple-500 text-xs italic"><i class="fas fa-hourglass-half"></i> Menunggu ACC Admin</span>
                            @else
                                <span class="text-slate-300 text-xs italic">Tidak ada aksi</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="p-12 text-center text-slate-400">
                            <i class="fas fa-history text-4xl mb-3"></i>
                            <p>Kamu belum pernah meminjam buku apapun.</p>
                            <a href="{{ route('books.index') }}" class="text-blue-600 hover:underline mt-2 inline-block">Cari buku sekarang!</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
