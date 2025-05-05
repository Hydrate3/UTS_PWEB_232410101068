@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Daftar Produk</h1>

    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    {{-- Gambar online sementara berdasarkan nama produk --}}
                    <img src="https://source.unsplash.com/400x300/?{{ urlencode($product['nama']) }}" 
                        class="card-img-top" alt="{{ $product['nama'] }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product['nama'] }}</h5>
                        <p class="card-text">Harga: Rp {{ number_format($product['harga'], 0, ',', '.') }}</p>
                        <p class="card-text">Stok: {{ $product['stok'] }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
