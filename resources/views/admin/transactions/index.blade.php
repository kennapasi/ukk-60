@extends('layouts.admin')

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
    <div class="p-6 border-b border-slate-50 flex justify-between items-center">
        <h3 class="font-bold text-slate-800 text-xl">Manajemen Peminjaman Buku</h3>
    </div>

    <div class="px-6 pt-4">
        @if(session('success'))
            <div class="bg-emerald-100 border-l-4 border-emerald-500 text-emerald-700 p-4 rounded-r-lg mb-4" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-r-lg mb-4" role="alert">
                {{ session('error') }}
            </div>
        @endif
    </div>

    <div class="p-6 overflow-x-auto">
        <table class="w-full text-left">
            <thead>
                <tr class="text-slate-400 text-sm uppercase tracking-wider border-b border-slate-100">
                    <th class="pb-4 px-4 font-semibold">Peminjam</th>
                    <th class="pb-4 px-4 font-semibold">Buku</th>
                    <th class="pb-4 px-4 font-semibold">Tgl Pinjam</th>
                    <th class="pb-4 px-4 font-semibold">Status</th>
                    <th class="pb-4 px-4 font-semibold text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                @forelse($transactions as $trx)
                <tr class="hover:bg-slate-50/50 transition-colors">
                    <td class="py-4 px-4 font-medium text-slate-700">{{ $trx->user->name ?? 'User Dihapus' }}</td>
                    <td class="py-4 px-4 text-slate-600">{{ $trx->book->judul ?? 'Buku Dihapus' }}</td>
                    <td class="py-4 px-4 text-slate-500">{{ \Carbon\Carbon::parse($trx->tanggal_pinjam)->format('d M Y') }}</td>
                   <td class="py-4 px-4">
                        @if($trx->status == 'pending_pinjam')
                            <span class="bg-blue-50 text-blue-600 px-3 py-1 rounded-full text-xs font-bold border border-blue-200">Menunggu ACC Pinjam</span>
                        @elseif($trx->status == 'pinjam')
                            <span class="bg-amber-50 text-amber-600 px-3 py-1 rounded-full text-xs font-bold border border-amber-200">Sedang Dipinjam</span>
                        @elseif($trx->status == 'pending_kembali')
                            <span class="bg-purple-50 text-purple-600 px-3 py-1 rounded-full text-xs font-bold border border-purple-200">Menunggu ACC Kembali</span>
                        @elseif($trx->status == 'ditolak')
                            <span class="bg-red-50 text-red-600 px-3 py-1 rounded-full text-xs font-bold border border-red-200">Ditolak Admin</span>
                        @else
                            <span class="bg-emerald-50 text-emerald-600 px-3 py-1 rounded-full text-xs font-bold border border-emerald-200">Sudah Kembali</span>
                        @endif
                    </td>

                    <td class="py-4 px-4 text-center">
                        @if($trx->status == 'pending_pinjam')
                            <form action="{{ route('admin.transactions.update', [$trx->id, 'pinjam']) }}" method="POST" class="inline-block">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-xs font-bold hover:bg-blue-700 shadow-sm transition-colors" onclick="return confirm('Setujui peminjaman ini? Stok buku akan berkurang.')">
                                    <i class="fas fa-check mr-1"></i> ACC PINJAM
                                </button>
                            </form>
                        @elseif($trx->status == 'pinjam')
                            <span class="text-amber-500 text-xs italic"><i class="fas fa-clock"></i> Belum dikembalikan siswa</span>
                        @elseif($trx->status == 'pending_kembali')
                            <form action="{{ route('admin.transactions.update', [$trx->id, 'kembali']) }}" method="POST" class="inline-block">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="bg-emerald-600 text-white px-4 py-2 rounded-lg text-xs font-bold hover:bg-emerald-700 shadow-sm transition-colors" onclick="return confirm('Konfirmasi buku telah diterima petugas? Stok buku akan bertambah kembali.')">
                                    <i class="fas fa-undo mr-1"></i> ACC KEMBALI
                                </button>
                            </form>
                        @else
                            <span class="text-slate-300 text-xs italic"><i class="fas fa-check-circle"></i> Selesai</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-8 text-center text-slate-500 italic">Belum ada data transaksi peminjaman.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
