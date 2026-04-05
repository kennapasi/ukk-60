<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            // Menghubungkan ke tabel users
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            // Menghubungkan ke tabel books
            $table->foreignId('book_id')->constrained('books')->onDelete('cascade');

            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali')->nullable();
            $table->enum('status', ['pending_pinjam', 'pinjam', 'pending_kembali', 'kembali', 'ditolak'])->default('pending_pinjam');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('transactions');
    }
};
