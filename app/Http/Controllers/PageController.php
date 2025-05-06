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
        $username = session('username');
        
        $products = [
            [
                'id' => 1,
                'nama' => 'mi goreng 75gr',
                'harga' => 3500,
                'stok' => 50,
                'gambar' => 'images/intermi.png'
            ],
            [
                'id' => 2,
                'nama' => 'air 600ml',
                'harga' => 3000,
                'stok' => 100,
                'gambar' => 'images/air botol.webp'
            ],
            [
                'id' => 3,
                'nama' => 'chips 80g',
                'harga' => 12000,
                'stok' => 30,
                'gambar' => 'images/kentangchip.jpg'
            ],
            [
                'id' => 4,
                'nama' => 'telur 1kg',
                'harga' => 26000,
                'stok' => 16,
                'gambar' => 'images/elegg.webp'
            ],
            [
                'id' => 5,
                'nama' => 'detergen 1lt',
                'harga' => 23000,
                'stok' => 16,
                'gambar' => 'images/detergen.jpg'
            ],
            [
                'id' => 6,
                'nama' => 'sabun batangan 100gr',
                'harga' => 4000,
                'stok' => 34,
                'gambar' => 'images/sabun.jpg'
            ],
            [
                'id' => 7,
                'nama' => 'susu 1lt',
                'harga' => 20000,
                'stok' => 16,
                'gambar' => 'images/susu.jpg'
            ],
            [
                'id' => 8,
                'nama' => 'minyak goreng 1lt',
                'harga' => 20000,
                'stok' => 16,
                'gambar' => 'images/minyak.jpeg'
            ]
        ];
    
        return view('dashboard', compact('username', 'products'));
    }
        public function showPengelolaan()
    {
        $products = [
            [
                'id' => 1,
                'nama' => 'mi goreng 75gr',
                'harga' => 3500,
                'stok' => 50,
                'gambar' => 'images/intermi.png'
            ],
            [
                'id' => 2,
                'nama' => 'air 600ml',
                'harga' => 3000,
                'stok' => 100,
                'gambar' => 'images/air botol.webp'
            ],
            [
                'id' => 3,
                'nama' => 'chips 80g',
                'harga' => 12000,
                'stok' => 30,
                'gambar' => 'images/kentangchip.jpg'
            ],
            [
                'id' => 4,
                'nama' => 'telur 1kg',
                'harga' => 26000,
                'stok' => 16,
                'gambar' => 'images/elegg.webp'
            ],
            [
                'id' => 5,
                'nama' => 'detergen 1lt',
                'harga' => 23000,
                'stok' => 16,
                'gambar' => 'images/detergen.jpg'
            ],
            [
                'id' => 6,
                'nama' => 'sabun batangan 100gr',
                'harga' => 4000,
                'stok' => 34,
                'gambar' => 'images/sabun.jpg'
            ],
            [
                'id' => 7,
                'nama' => 'susu 1lt',
                'harga' => 20000,
                'stok' => 16,
                'gambar' => 'images/susu.jpg'
            ],
            [
                'id' => 8,
                'nama' => 'minyak goreng 1lt',
                'harga' => 20000,
                'stok' => 16,
                'gambar' => 'images/minyak.jpeg'
            ]

        ];
    
        return view('pengelolaan', compact('products'));
    }
    

    public function showProfile()
    {
        return view('profile', [
            'username' => session('username')
        ]);
    }
}