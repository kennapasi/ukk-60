@extends('layouts.admin')

@section('content')
<div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 max-w-2xl mx-auto">
    <div class="mb-6 border-b border-slate-100 pb-4">
        <h2 class="text-2xl font-bold text-slate-800">Edit Data Buku Anda!</h2>
    </div>

    <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-sm font-bold text-slate-700 mb-2">Judul Buku</label>
            <input type="text" name="judul" value="{{ $book->judul }}" class="w-full border border-slate-200 p-3 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none" required>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Penulis</label>
                <input type="text" name="penulis" value="{{ $book->penulis }}" class="w-full border border-slate-200 p-3 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none" required>
            </div>
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Penerbit</label>
                <input type="text" name="penerbit" value="{{ $book->penerbit }}" class="w-full border border-slate-200 p-3 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none" required>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Tahun Terbit</label>
                <input type="number" name="tahun_terbit" value="{{ $book->tahun_terbit }}" class="w-full border border-slate-200 p-3 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none" required>
            </div>
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Stok Tersedia</label>
                <input type="number" name="stok" value="{{ $book->stok }}" class="w-full border border-slate-200 p-3 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none" required>
            </div>
        </div>

        <div class="mb-8 p-4 bg-slate-50 rounded-xl border border-slate-100">
            <label class="block text-sm font-bold text-slate-700 mb-2">Ganti Foto Cover (Opsional)</label>
            <input type="file" name="image" class="w-full text-slate-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100" accept="image/*">
            <p class="text-xs text-slate-500 mt-2"><i class="fas fa-info-circle"></i> Biarkan kosong jika tidak ingin mengubah foto saat ini.</p>
        </div>

        <div class="flex items-center gap-3">
            <button type="submit" class="bg-emerald-600 text-white px-6 py-3 rounded-xl font-bold hover:bg-emerald-700 transition-colors shadow-sm">
                <i class="fas fa-check mr-2"></i> Update Buku
            </button>
            <a href="{{ route('admin.books.index') }}" class="bg-slate-100 text-slate-600 px-6 py-3 rounded-xl font-bold hover:bg-slate-200 transition-colors">Batal</a>
        </div>
    </form>
</div>
@endsection
