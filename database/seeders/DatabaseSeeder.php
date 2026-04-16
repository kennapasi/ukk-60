<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Akun Admin (Jika belum ada)
        if (!User::where('role', 'admin')->exists()) {
            User::create([
                'name' => 'admin joestar',
                'username' => 'joestar',
                'email' => 'adminjoestar@gmail.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ]);
        }

        // 2. Buat Akun User Peminjam (Jika belum ada)
        if (!User::where('email', 'user@gmail.com')->exists()) {
            User::create([
                'name' => 'bubud geming',
                'username' => 'budi joestar',
                'email' => 'user@gmail.com',
                'password' => Hash::make('user123'),
                'role' => 'peminjam',
            ]);
        }

        // 3. (Opsional) Buat beberapa user tambahan secara otomatis
        // User::factory(5)->create(['role' => 'peminjam']);
    }
}
