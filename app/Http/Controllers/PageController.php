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
    
        session(['username' => $request->username]);
    
        return redirect()->route('dashboard');
    }
    

    public function showDashboard()
    {
        return view('dashboard', [
            'username' => session('username')
        ]);
    }
    

    

    // Pengelolaan Produk
    public function showPengelolaan()
    {
        $products = [
            [
                'id' => 1,
                'nama' => 'Indomie Goreng',
                'harga' => 3500,
                'stok' => 50,
                'gambar' => 'images/intermi.png'
            ],
            [
                'id' => 2,
                'nama' => 'Aqua 600ml',
                'harga' => 3000,
                'stok' => 100,
                'gambar' => 'https://images.unsplash.com/photo-1609942739764-df5b92e752c7?auto=format&fit=crop&w=400&q=80'
            ],
            [
                'id' => 3,
                'nama' => 'Chitato 80g',
                'harga' => 12000,
                'stok' => 30,
                'gambar' => 'https://images.unsplash.com/photo-1627308595229-7830a5c91f9f?auto=format&fit=crop&w=400&q=80'
            ],
        ];
    
        return view('pengelolaan', compact('products'));
    }
    

    // Profil
    public function showProfile()
    {
        return view('profile', [
            'username' => session('username')
        ]);
    }
}