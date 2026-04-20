@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="mb-6">
        <form action="{{ route('books.index') }}" method="GET" class="flex gap-2">
            <div class="relative flex-1 max-w-md">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-search text-slate-400"></i>
                </div>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari judul buku atau penulis..." class="w-full pl-10 pr-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-500 outline-none shadow-sm text-sm">
            </div>
            <button type="submit" class="bg-blue-600 text-white px-5 py-3 rounded-xl font-bold hover:bg-blue-700 transition shadow-sm text-sm">Cari</button>
            @if(request('search'))
                <a href="{{ route('books.index') }}" class="bg-slate-200 text-slate-600 px-5 py-3 rounded-xl font-bold hover:bg-slate-300 transition shadow-sm text-sm">Reset</a>
            @endif
        </form>
    </div>

    <div class="mb-8">
        <h2 class="text-3xl font-bold text-slate-800">Katalog Buku</h2>
        <p class="text-slate-500 mt-2">Jelajahi koleksi buku kami dan pinjam buku favoritmu.</p>
    </div>

    @if(session('success'))
        <div class="bg-emerald-100 border-l-4 border-emerald-500 text-emerald-700 p-4 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded mb-6">
            {{ session('error') }}
        </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($books as $book)
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden hover:shadow-md transition-shadow flex flex-col">
                <div class="h-48 bg-slate-100 flex items-center justify-center overflow-hidden">
                    @if($book->image)
                        <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->judul }}" class="w-full h-full object-cover">
                    @else
                        <i class="fas fa-book-open text-5xl text-slate-300"></i>
                    @endif
                </div>

                <div class="p-5 flex-1 flex flex-col">
                    <h3 class="font-bold text-lg text-slate-800 mb-1 leading-tight">{{ $book->judul }}</h3>
                    <p class="text-sm text-slate-500 mb-3">{{ $book->penulis }}</p>

                    <div class="mt-auto">
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-xs font-semibold px-2 py-1 bg-slate-100 text-slate-600 rounded">
                                Tahun: {{ $book->tahun_terbit }}
                            </span>
                            <span class="text-xs font-bold {{ $book->stok > 0 ? 'text-emerald-600' : 'text-red-500' }}">
                                Stok: {{ $book->stok }}
                            </span>
                        </div>

                        @if($book->stok > 0)
                            <button type="button" onclick="openModal('modal-{{ $book->id }}')" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2.5 rounded-xl text-sm font-bold transition-colors shadow-sm">
                                <i class="fas fa-hand-holding mr-1"></i> Pinjam Buku
                            </button>
                        @else
                            <button type="button" disabled class="w-full bg-slate-200 text-slate-400 py-2.5 rounded-xl text-sm font-bold cursor-not-allowed">
                                Stok Habis
                            </button>
                        @endif
                    </div>
                </div>
            </div>

            <div id="modal-{{ $book->id }}" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm hidden items-center justify-center z-50 transition-all opacity-0">
                <div class="bg-white p-6 rounded-3xl max-w-sm w-full mx-4 shadow-2xl transform scale-95 transition-transform" id="modal-content-{{ $book->id }}">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="font-bold text-xl text-slate-800">Detail Pinjaman</h3>
                        <button type="button" onclick="closeModal('modal-{{ $book->id }}')" class="text-slate-400 hover:text-red-500 transition-colors">
                            <i class="fas fa-times text-lg"></i>
                        </button>
                    </div>

                    <p class="text-sm text-slate-500 mb-5">Berapa lama kamu ingin meminjam buku <span class="font-bold text-blue-600">"{{ $book->judul }}"</span>?</p>

                    <form action="{{ route('transactions.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="book_id" value="{{ $book->id }}">

                        <div class="mb-6">
                            <label class="block text-xs font-bold text-slate-700 mb-2">Pilih Durasi Waktu</label>
                            <select name="lama_pinjam" class="w-full border border-slate-200 p-3 rounded-xl outline-none focus:ring-2 focus:ring-blue-500 bg-slate-50 text-slate-700 font-medium cursor-pointer" required>
                                <option value="" disabled selected>-- Pilih Waktu --</option>
                                <option value="3">3 Hari (Tugas Pendek)</option>
                                <option value="7">7 Hari (1 Minggu)</option>
                                <option value="14">14 Hari (2 Minggu)</option>
                            </select>
                        </div>

                        <div class="flex gap-3">
                            <button type="button" onclick="closeModal('modal-{{ $book->id }}')" class="flex-1 px-4 py-3 bg-slate-100 text-slate-600 rounded-xl font-bold hover:bg-slate-200 transition-colors">Batal</button>
                            <button type="submit" class="flex-1 px-4 py-3 bg-blue-600 text-white rounded-xl font-bold hover:bg-blue-700 shadow-lg shadow-blue-500/30 transition-colors">Konfirmasi</button>
                        </div>
                    </form>
                </div>
            </div>
            @empty
            <div class="col-span-full py-12 text-center text-slate-400 bg-white rounded-2xl border border-slate-100 border-dashed">
                <i class="fas fa-box-open text-4xl mb-3"></i>
                <p>Belum ada koleksi buku saat ini.</p>
            </div>
        @endforelse
    </div>
</div>

<script>
    function openModal(id) {
        const modal = document.getElementById(id);
        const content = document.getElementById('modal-content-' + id.split('-')[1]);
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        // Efek animasi muncul
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            content.classList.remove('scale-95');
        }, 10);
    }

    function closeModal(id) {
        const modal = document.getElementById(id);
        const content = document.getElementById('modal-content-' + id.split('-')[1]);
        // Efek animasi hilang
        modal.classList.add('opacity-0');
        content.classList.add('scale-95');
        setTimeout(() => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }, 200);
    }
</script>
@endsection
