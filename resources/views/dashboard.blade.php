@extends('layouts.app')

@section('content')
<div class="welcome-message mb-4">
    <h1>🛒 Selamat datang, <span class="username">{{ $username }}</span>!</h1>
    <p>Sistem Kasir Toko Swalayan</p>
</div>

<h4 class="mb-3">Daftar Produk</h4>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>Nama Produk</th>
            <th>Harga (Rp)</th>
            <th>Stok</th>
            <th>Jumlah</th>
            <th>Subtotal (Rp)</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $item)
            <tr>
                <td>{{ $item['nama'] }}</td>
                <td>{{ number_format($item['harga'], 0, ',', '.') }}</td>
                <td>{{ $item['stok'] }}</td>
                <td>
                    <input type="number" min="0" max="{{ $item['stok'] }}" value="0" 
                        class="form-control jumlah-input" 
                        data-id="{{ $item['id'] }}" 
                        data-harga="{{ $item['harga'] }}">
                </td>
                <td>
                    <span id="subtotal-{{ $item['id'] }}">0</span>
                </td>
                <td>
                    <button class="btn btn-sm btn-success" onclick="tambahKeKeranjang({{ $item['id'] }})">Tambah</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="mt-4 text-end">
    <h4>Total: Rp <span id="total-harga">0</span></h4>
    <button class="btn btn-warning" onclick="resetKeranjang()">Reset</button>
</div>

<script>
    const keranjang = {};

    function tambahKeKeranjang(id) {
        const jumlahInput = document.querySelector(`input[data-id='${id}']`);
        const jumlah = parseInt(jumlahInput.value);
        const harga = parseInt(jumlahInput.dataset.harga);

        if (jumlah > 0) {
            const subtotal = jumlah * harga;
            keranjang[id] = subtotal;

            document.getElementById(`subtotal-${id}`).innerText = subtotal.toLocaleString('id-ID');

            updateTotal();
        }
    }

    function updateTotal() {
        let total = 0;
        for (const id in keranjang) {
            total += keranjang[id];
        }
        document.getElementById('total-harga').innerText = total.toLocaleString('id-ID');
    }
    function resetKeranjang() {

    for (const id in keranjang) {
        document.getElementById(`subtotal-${id}`).innerText = '0';
        const jumlahInput = document.querySelector(`input[data-id='${id}']`);
        if (jumlahInput) jumlahInput.value = 0;
    }


    Object.keys(keranjang).forEach(id => delete keranjang[id]);
    document.getElementById('total-harga').innerText = '0';
}

</script>
@endsection
