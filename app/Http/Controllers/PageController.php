<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function processLogin(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        return redirect()->route('dashboard', [
            'username' => $request->username
        ]);
    }

    // Dashboard
    public function showDashboard(Request $request)
    {
        return view('dashboard', [
            'username' => $request->query('username')
        ]);
    }

    // Pengelolaan Produk
    public function showPengelolaan()
    {
        $products = [
            ['id' => 1, 'nama' => 'Indomie Goreng', 'harga' => 3500, 'stok' => 50],
            ['id' => 2, 'nama' => 'Aqua 600ml', 'harga' => 3000, 'stok' => 100],
            ['id' => 3, 'nama' => 'Chitato 80g', 'harga' => 12000, 'stok' => 30],
        ];

        return view('pengelolaan', compact('products'));
    }

    // Profil
    public function showProfile(Request $request)
    {
        return view('profile', [
            'username' => $request->query('username')
        ]);
    }
}