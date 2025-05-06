@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Daftar Produk</h1>

    @foreach(array_chunk($products, 3) as $groupedProducts)
        <div class="row mb-4">
            @foreach($groupedProducts as $item)
                <div class="col-md-4 d-flex align-items-stretch">
                    <div class="card shadow-sm w-100 h-100">
                        <img src="{{ Str::startsWith($item['gambar'], 'http') ? $item['gambar'] : asset($item['gambar']) }}" 
                            class="card-img-top img-fluid" 
                            style="height: 200px; object-fit: contain;" 
                            alt="{{ $item['nama'] }}">

                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title">{{ $item['nama'] }}</h5>
                                <p class="card-text">Harga: Rp {{ number_format($item['harga'], 0, ',', '.') }}</p>
                                <p class="card-text">
                                    Stok: <span id="stock-{{ $item['id'] }}">{{ $item['stok'] }}</span>
                                </p>
                            </div>
                            <div class="d-flex justify-content-between mt-3">
                                <button class="btn btn-sm btn-primary" onclick="updateStock({{ $item['id'] }}, 1)">+</button>
                                <button class="btn btn-sm btn-danger" onclick="updateStock({{ $item['id'] }}, -1)">-</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach

    <script>
        function updateStock(id, change) {
            const stockElement = document.getElementById(`stock-${id}`);
            let stock = parseInt(stockElement.innerText);
            stock += change;
            if (stock < 0) stock = 0;
            stockElement.innerText = stock;
        }
    </script>
@endsection
