<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;

// Halaman Depan
Route::get('/', function () { return view('welcome'); });

// --- AREA TAMU (Belum Login) ---
Route::middleware('guest')->group(function () {
    // Login
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    // Register
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Penawar Error bawaan Laravel jika nyasar ke /home
Route::get('/home', function() {
    if (Auth::check()) {
        return Auth::user()->role === 'admin' ? redirect()->route('admin.dashboard') : redirect()->route('user.dashboard');
    }
    return redirect()->route('login');
})->name('home');

// --- AREA WAJIB LOGIN ---
Route::middleware(['auth'])->group(function () {

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // =====================================
    // -- AREA USER BIASA --
    // =====================================
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/books', [BookController::class, 'index'])->name('books.index');
    Route::get('/my-loans', [TransactionController::class, 'index'])->name('transactions.index');
    Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');

    // NAH, RUTENYA DITARUH DI SINI:
    Route::patch('/transactions/{transaction}/user-return', [TransactionController::class, 'userReturnBook'])->name('transactions.userReturn');


    // =====================================
    // -- AREA KHUSUS ADMIN --
    // =====================================
    Route::prefix('admin')->middleware(['is_admin'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        // Manajemen Buku
        Route::get('/books-manage', [BookController::class, 'adminIndex'])->name('admin.books.index');
        Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
        Route::post('/books', [BookController::class, 'store'])->name('books.store');
        Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
        Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');
        Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');

        // Manajemen Transaksi (Sudah dirapikan)
        Route::get('/transactions', [TransactionController::class, 'adminIndex'])->name('admin.transactions.index');
        Route::patch('/transactions/{transaction}/{status}', [TransactionController::class, 'updateStatus'])->name('admin.transactions.update');

        // Manajemen User
        Route::get('/users', [AdminController::class, 'usersIndex'])->name('admin.users.index');
    });
});
