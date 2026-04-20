<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // --- FITUR LOGIN ---
    public function showLoginForm() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $request->validate([
            'login_id' => 'required|string',
            'password' => 'required|string',
        ]);

        // PERBAIKAN: Cek apakah input adalah email atau USERNAME (bukan name)
        $loginType = filter_var($request->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $credentials = [
            $loginType => $request->login_id,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();

            if (Auth::user()->role === 'admin') {
                return redirect()->intended('/admin/dashboard');
            }
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'login_id' => 'Email/Username atau Password salah.',
        ])->withInput($request->only('login_id'));
    }

    // --- FITUR REGISTER ---
    public function showRegisterForm() {
        return view('auth.register');
    }

    public function register(Request $request) {
        // PERBAIKAN: Validasi username wajib diisi
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users', // <-- WAJIB ADA
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // PERBAIKAN: Simpan username ke database
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username, // <-- WAJIB DISIMPAN
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'peminjam',
        ]);

        Auth::login($user);
        return redirect()->route('user.dashboard')->with('success', 'Akun berhasil dibuat!');
    }

    // --- LOGOUT ---
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
