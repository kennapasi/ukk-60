<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // Menentukan kolom mana saja yang boleh diisi secara massal
   protected $fillable = [
    'judul', 'penulis', 'penerbit', 'tahun_terbit', 'stok', 'image' // Tambahkan image
];

    /**
     * Relasi: Satu buku bisa memiliki banyak transaksi peminjaman
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
