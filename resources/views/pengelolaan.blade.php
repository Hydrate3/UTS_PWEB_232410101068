@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Daftar Produk</h1>

    @foreach(array_chunk($products, 3) as $productRow)
        <div class="row mb-4">
            @foreach($productRow as $product)
                <div class="col-md-4">
                    <div class="card h-60 shadow-sm">
                        <img src="{{ $product['gambar'] }}" class="card-img-top" alt="{{ $product['nama'] }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product['nama'] }}</h5>
                            <p class="card-text">Harga: Rp {{ number_format($product['harga'], 0, ',', '.') }}</p>
                            <p class="card-text">
                                Stok: <span id="stok-{{ $product['id'] }}">{{ $product['stok'] }}</span>
                            </p>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-sm btn-primary" onclick="ubahStok({{ $product['id'] }}, 1)">+</button>
                                <button class="btn btn-sm btn-danger" onclick="ubahStok({{ $product['id'] }}, -1)">-</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach

    <script>
        function ubahStok(id, perubahan) {
            const stokEl = document.getElementById(`stok-${id}`);
            let stok = parseInt(stokEl.innerText);
            stok += perubahan;
            if (stok < 0) stok = 0;
            stokEl.innerText = stok;
        }
    </script>
@endsection
