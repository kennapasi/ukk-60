<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard()
    {
        $userId = Auth::id();

        $totalBorrowed = Transaction::where('user_id', $userId)->count();
        // Perbaikan status: 'pinjam'
        $pendingReturns = Transaction::where('user_id', $userId)->where('status', 'pinjam')->count();

        $recentTransactions = Transaction::with('book')
            ->where('user_id', $userId)
            ->latest()
            ->take(3)
            ->get();

        return view('user.dashboard', compact('totalBorrowed', 'pendingReturns', 'recentTransactions'));
    }
}
