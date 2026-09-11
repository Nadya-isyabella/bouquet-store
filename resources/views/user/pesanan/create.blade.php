@extends('layouts.user')

@section('title', 'Pemesanan')

@section('content')

<style>
    .pemesanan-page {
        padding: 10px 5px 40px;
    }

    .page-title {
        color: #6b4c4c;
        font-weight: 700;
    }

    .card-pesanan {
        border: none;
        border-radius: 20px;
        box-shadow: 0 8px 25px rgba(180, 130, 130, 0.12);
        overflow: hidden;
    }

    .card-header-pink {
        background: #f8f0f0;
        border-bottom: 2px solid #d4758a;
        padding: 15px 20px;
    }

    .card-header-pink h5 {
        color: #6b4c4c;
        margin: 0;
        font-weight: 700;
    }

    .form-control,
    .form-select {
        border-radius: 10px;
    }

    .product-card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(180, 130, 130, 0.10);
        height: 100%;
        transition: .2s;
    }

    .product-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(180, 130, 130, 0.18);
    }

    .product-image {
        width: 100%;
        height: 160px;
        object-fit: cover;
    }

    .empty-image {
        height: 160px;
        background: #f9eeee;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .empty-image i {
        font-size: 45px;
        color: #d4b8b8;
    }

    .product-name {
        color: #6b4c4c;
        font-weight: 700;
    }

    .product-price {
        color: #d4758a;
        font-weight: 700;
        font-size: 17px;
    }

    .btn-tambah {
        background: #a7c7c9;
        border: none;
        color: #2d4f4f;
        border-radius: 20px;
        width: 100%;
    }

    .btn-tambah:hover {
        background: #8fb9bb;
        color: #1d3a3a;
    }

    .cart-item {
        border: 1px solid #eee;
        border-radius: 15px;
        padding: 12px;
        margin-bottom: 10px;
    }

    .cart-image {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 10px;
    }

    .total-box {
        background: #f8f0f0;
        border-radius: 15px;
        padding: 18px;
    }

    .grand-total {
        color: #d4758a;
        font-size: 24px;
        font-weight: 700;
    }

    .filter-btn.active {
        background: #d4758a;
        color: white;
        border-color: #d4758a;
    }
</style>


<div class="container-fluid pemesanan-page">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="page-title mb-1">
                <i class="bi bi-cart-heart" style="color:#d4758a;"></i>
                Buat Pemesanan
            </h3>

            <p class="text-muted mb-0">
                Pilih bouquet dan aksesoris favoritmu.
            </p>
        </div>

        <a href="{{ route('user.dashboard') }}"
           class="btn btn-outline-secondary">

            <i class="bi bi-arrow-left"></i>
            Kembali

        </a>

    </div>


    {{-- ERROR --}}
    @if($errors->any())

        <div class="alert alert-danger">

            <strong>Terjadi kesalahan:</strong>

            <ul class="mb-0 mt-2">

                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif


    {{-- FORM --}}
    <form action="{{ route('user.pesanan.store') }}"
          method="POST">

        @csrf


        <div class="row">

            {{-- ================================================= --}}
            {{-- KIRI : DATA CUSTOMER --}}
            {{-- ================================================= --}}

            <div class="col-lg-4">

                {{-- DATA CUSTOMER --}}
                <div class="card card-pesanan mb-4">

                    <div class="card-header-pink">

                        <h5>
                            <i class="bi bi-person-circle"
                               style="color:#d4758a;"></i>

                            Data Pemesan
                        </h5>

                    </div>


                    <div class="card-body">

                        {{-- NAMA --}}
                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Nama
                            </label>

                            <input type="text"
                                   class="form-control"
                                   value="{{ auth()->user()->name }}"
                                   readonly>

                            <small class="text-muted">
                                Nama diambil dari akun yang kamu gunakan.
                            </small>

                        </div>


                        {{-- EMAIL --}}
                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Email
                            </label>

                            <input type="email"
                                   class="form-control"
                                   value="{{ auth()->user()->email }}"
                                   readonly>

                            <small class="text-muted">
                                Email diambil otomatis dari akun.
                            </small>

                        </div>


                        {{-- NOMOR HP --}}
                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Nomor HP / WhatsApp
                            </label>

                            <input type="text"
                                   name="nomor_hp"
                                   class="form-control"
                                   value="{{ old('nomor_hp') }}"
                                   placeholder="Contoh: 081234567890"
                                   required>

                        </div>


                        {{-- ALAMAT --}}
                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Alamat
                            </label>

                            <textarea name="alamat"
                                      class="form-control"
                                      rows="4"
                                      placeholder="Masukkan alamat lengkap"
                                      required>{{ old('alamat') }}</textarea>

                        </div>

                    </div>

                </div>


                {{-- TANGGAL --}}
                <div class="card card-pesanan mb-4">

                    <div class="card-header-pink">

                        <h5>
                            <i class="bi bi-calendar-heart"
                               style="color:#d4758a;"></i>

                            Tanggal Pesanan
                        </h5>

                    </div>


                    <div class="card-body">

                        {{-- TANGGAL PEMESANAN --}}
                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Tanggal Pemesanan
                            </label>

                            <input type="date"
                                   name="tanggal_pemesanan"
                                   class="form-control"
                                   value="{{ old('tanggal_pemesanan', date('Y-m-d')) }}"
                                   required>

                        </div>


                        {{-- TANGGAL PENGAMBILAN --}}
                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Tanggal Pengambilan
                            </label>

                            <input type="date"
                                   name="tanggal_pengambilan"
                                   class="form-control"
                                   value="{{ old('tanggal_pengembalian') }}"
                                   required>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ================================================= --}}
            {{-- KANAN : PRODUK --}}
            {{-- ================================================= --}}

            <div class="col-lg-8">

                {{-- SEARCH --}}
                <div class="card card-pesanan mb-4">

                    <div class="card-body">

                        <div class="input-group">

                            <span class="input-group-text bg-white">
                                <i class="bi bi-search"
                                   style="color:#d4758a;"></i>
                            </span>

                            <input type="text"
                                   id="searchProduct"
                                   class="form-control"
                                   placeholder="Cari bouquet atau aksesoris...">

                        </div>


                        <div class="mt-3 d-flex gap-2 flex-wrap">

                            <button type="button"
                                    class="btn btn-sm btn-outline-secondary filter-btn active"
                                    data-filter="all">

                                Semua

                            </button>

                            <button type="button"
                                    class="btn btn-sm btn-outline-secondary filter-btn"
                                    data-filter="bouquet">

                                Bouquet

                            </button>

                            <button type="button"
                                    class="btn btn-sm btn-outline-secondary filter-btn"
                                    data-filter="aksesoris">

                                Aksesoris

                            </button>

                        </div>

                    </div>

                </div>


                {{-- PRODUK --}}
                <div class="card card-pesanan mb-4">

                    <div class="card-header-pink">

                        <h5>
                            <i class="bi bi-grid"
                               style="color:#d4758a;"></i>

                            Pilih Produk

                        </h5>

                    </div>


                    <div class="card-body">

                        <div class="row g-3"
                             id="productGrid">


                            {{-- ================================ --}}
                            {{-- BOUQUET --}}
                            {{-- ================================ --}}

                            @foreach($bouquets as $bouquet)

                                <div class="col-md-6 col-xl-4 product-item"
                                     data-tipe="bouquet"
                                     data-nama="{{ strtolower($bouquet->nama) }}">

                                    <div class="card product-card">

                                        @if($bouquet->gambar)

                                            <img src="{{ asset('storage/' . $bouquet->gambar) }}"
                                                 class="product-image"
                                                 alt="{{ $bouquet->nama }}">

                                        @else

                                            <div class="empty-image">
                                                <i class="bi bi-flower1"></i>
                                            </div>

                                        @endif


                                        <div class="card-body">

                                            <div class="product-name">
                                                {{ $bouquet->nama }}
                                            </div>

                                            <div class="product-price mb-1">

                                                Rp {{ number_format(
                                                    $bouquet->harga,
                                                    0,
                                                    ',',
                                                    '.'
                                                ) }}

                                            </div>

                                            <small class="text-muted d-block mb-3">

                                                Stok:
                                                {{ $bouquet->stok }}

                                            </small>


                                            @if($bouquet->stok > 0)

                                                <button type="button"
                                                        class="btn btn-tambah add-to-cart"

                                                        data-id="{{ $bouquet->id }}"
                                                        data-nama="{{ $bouquet->nama }}"
                                                        data-harga="{{ $bouquet->harga }}"
                                                        data-gambar="{{ $bouquet->gambar ?? '' }}"
                                                        data-tipe="bouquet"
                                                        data-stok="{{ $bouquet->stok }}">

                                                    <i class="bi bi-cart-plus"></i>
                                                    Tambah

                                                </button>

                                            @else

                                                <button type="button"
                                                        class="btn btn-secondary"
                                                        style="width:100%; border-radius:20px;"
                                                        disabled>

                                                    Stok Habis

                                                </button>

                                            @endif

                                        </div>

                                    </div>

                                </div>

                            @endforeach


                            {{-- ================================ --}}
                            {{-- AKSESORIS --}}
                            {{-- ================================ --}}

                            @foreach($aksesoris as $aksesorisItem)

                                <div class="col-md-6 col-xl-4 product-item"
                                     data-tipe="aksesoris"
                                     data-nama="{{ strtolower($aksesorisItem->nama) }}">

                                    <div class="card product-card">

                                        @if($aksesorisItem->gambar)

                                            <img src="{{ asset('storage/' . $aksesorisItem->gambar) }}"
                                                 class="product-image"
                                                 alt="{{ $aksesorisItem->nama }}">

                                        @else

                                            <div class="empty-image">

                                                <i class="bi bi-gift"></i>

                                            </div>

                                        @endif


                                        <div class="card-body">

                                            <div class="product-name">

                                                {{ $aksesorisItem->nama }}

                                            </div>


                                            <div class="product-price mb-1">

                                                Rp {{ number_format(
                                                    $aksesorisItem->harga,
                                                    0,
                                                    ',',
                                                    '.'
                                                ) }}

                                            </div>


                                            <small class="text-muted d-block mb-3">

                                                Stok:
                                                {{ $aksesorisItem->stok }}

                                            </small>


                                            @if($aksesorisItem->stok > 0)

                                                <button type="button"
                                                        class="btn btn-tambah add-to-cart"

                                                        data-id="{{ $aksesorisItem->id }}"
                                                        data-nama="{{ $aksesorisItem->nama }}"
                                                        data-harga="{{ $aksesorisItem->harga }}"
                                                        data-gambar="{{ $aksesorisItem->gambar ?? '' }}"
                                                        data-tipe="aksesoris"
                                                        data-stok="{{ $aksesorisItem->stok }}">

                                                    <i class="bi bi-cart-plus"></i>
                                                    Tambah

                                                </button>

                                            @else

                                                <button type="button"
                                                        class="btn btn-secondary"
                                                        style="width:100%; border-radius:20px;"
                                                        disabled>

                                                    Stok Habis

                                                </button>

                                            @endif

                                        </div>

                                    </div>

                                </div>

                            @endforeach


                        </div>

                    </div>

                </div>


                {{-- ================================================= --}}
                {{-- KERANJANG --}}
                {{-- ================================================= --}}

                <div class="card card-pesanan">

                    <div class="card-header-pink">

                        <h5>

                            <i class="bi bi-cart-heart"
                               style="color:#d4758a;"></i>

                            Keranjang Pesanan

                            <span class="badge"
                                  id="cartCount"
                               

                                0

                            </span>

                        </h5>

                    </div>


                    <div class="card-body">

                        <div id="cartItems">

                            <div id="emptyCart"
                                 class="text-center text-muted py-4">

                                <i class="bi bi-cart-x"
                                   style="font-size:40px;"></i>

                                <div class="mt-2">
                                    Belum ada produk.
                                </div>

                            </div>

                        </div>


                        {{-- TOTAL --}}
                        <div class="total-box mt-3">

                            <div class="d-flex justify-content-between align-items-center">

                                <span class="fw-semibold">
                                    Total Pesanan
                                </span>

                                <span class="grand-total"
                                      id="grandTotal">

                                    Rp 0

                                </span>

                            </div>

                        </div>


                        <input type="hidden"
                               name="total_harga"
                               id="totalHidden"
                               value="0">


                        {{-- BUTTON --}}
                        <div class="d-flex justify-content-end gap-2 mt-4">

                            <button type="button"
                                    id="clearCart"
                                    class="btn btn-outline-danger">

                                <i class="bi bi-trash"></i>
                                Kosongkan

                            </button>


                            <button type="submit"
                                    class="btn"
                                    style="background:#d4758a; color:white; border-radius:25px;">

                                <i class="bi bi-check-circle"></i>
                                Simpan Pemesanan

                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </form>

</div>


<script>

document.addEventListener('DOMContentLoaded', function () {

    let cart = [];


    const cartItems = document.getElementById('cartItems');
    const emptyCart = document.getElementById('emptyCart');
    const cartCount = document.getElementById('cartCount');
    const grandTotal = document.getElementById('grandTotal');
    const totalHidden = document.getElementById('totalHidden');
    const clearCart = document.getElementById('clearCart');


    function rupiah(number) {

        return 'Rp ' + Number(number).toLocaleString('id-ID');

    }


    function renderCart() {

        document.querySelectorAll('.cart-item').forEach(function (item) {
            item.remove();
        });


        if (cart.length === 0) {

            emptyCart.style.display = 'block';
            cartCount.textContent = '0';
            grandTotal.textContent = 'Rp 0';
            totalHidden.value = '0';

            return;

        }


        emptyCart.style.display = 'none';


        let total = 0;
        let totalQty = 0;


        cart.forEach(function (item, index) {

            let subtotal = item.harga * item.qty;

            total += subtotal;
            totalQty += item.qty;


            let row = document.createElement('div');

            row.className = 'cart-item';


            let image = '';

            if (item.gambar) {

                image = `
                    <img
                        src="{{ asset('storage') }}/${item.gambar}"
                        class="cart-image me-3"
                    >
                `;

            } else {

                image = `
                    <div
                        class="cart-image me-3 d-flex align-items-center justify-content-center"
                        style="background:#f9eeee;"
                    >
                        <i class="bi bi-image"
                           style="color:#d4b8b8;"></i>
                    </div>
                `;

            }


            row.innerHTML = `

                <div class="row align-items-center">

                    <div class="col-md-4">

                        <div class="d-flex align-items-center">

                            ${image}

                            <div>

                                <strong>
                                    ${item.nama}
                                </strong>

                                <br>

                                <small class="text-muted">
                                    ${item.tipe}
                                </small>

                            </div>

                        </div>

                    </div>


                    <div class="col-md-2">

                        <small class="text-muted">
                            Harga
                        </small>

                        <div>
                            ${rupiah(item.harga)}
                        </div>

                    </div>


                    <div class="col-md-2">

                        <small class="text-muted">
                            Jumlah
                        </small>

                        <input
                            type="number"
                            min="1"
                            max="${item.stok}"
                            value="${item.qty}"
                            class="form-control form-control-sm qty-input"
                            data-index="${index}"
                        >

                    </div>


                    <div class="col-md-2">

                        <small class="text-muted">
                            Subtotal
                        </small>

                        <strong>
                            ${rupiah(subtotal)}
                        </strong>

                    </div>


                    <div class="col-md-2 text-end">

                        <button
                            type="button"
                            class="btn btn-sm btn-danger remove-item"
                            data-index="${index}"
                        >

                            <i class="bi bi-trash"></i>

                        </button>

                    </div>


                    <input
                        type="hidden"
                        name="items[${index}][item_id]"
                        value="${item.id}"
                    >

                    <input
                        type="hidden"
                        name="items[${index}][item_type]"
                        value="${item.tipe}"
                    >

                    <input
                        type="hidden"
                        name="items[${index}][jumlah]"
                        value="${item.qty}"
                    >

                    <input
                        type="hidden"
                        name="items[${index}][harga_satuan]"
                        value="${item.harga}"
                    >

                </div>

            `;


            cartItems.appendChild(row);

        });


        cartCount.textContent = totalQty;

        grandTotal.textContent = rupiah(total);

        totalHidden.value = total;


        document.querySelectorAll('.qty-input').forEach(function (input) {

            input.addEventListener('change', function () {

                let index = parseInt(this.dataset.index);

                let qty = parseInt(this.value);


                if (isNaN(qty) || qty < 1) {
                    qty = 1;
                }


                if (qty > cart[index].stok) {

                    alert(
                        'Jumlah melebihi stok. Stok tersedia hanya ' +
                        cart[index].stok
                    );

                    qty = cart[index].stok;

                }


                cart[index].qty = qty;

                renderCart();

            });

        });


        document.querySelectorAll('.remove-item').forEach(function (button) {

            button.addEventListener('click', function () {

                let index = parseInt(this.dataset.index);

                cart.splice(index, 1);

                renderCart();

            });

        });

    }


    // TAMBAH PRODUK

    document.querySelectorAll('.add-to-cart').forEach(function (button) {

        button.addEventListener('click', function () {

            let product = {

                id: parseInt(this.dataset.id),

                nama: this.dataset.nama,

                harga: parseInt(this.dataset.harga),

                gambar: this.dataset.gambar || '',

                tipe: this.dataset.tipe,

                stok: parseInt(this.dataset.stok) || 0,

                qty: 1

            };


            let existing = cart.find(function (item) {

                return item.id === product.id &&
                       item.tipe === product.tipe;

            });


            if (existing) {

                if (existing.qty >= existing.stok) {

                    alert(
                        'Stok ' +
                        existing.nama +
                        ' hanya tersedia ' +
                        existing.stok
                    );

                    return;

                }

                existing.qty++;

            } else {

                cart.push(product);

            }


            renderCart();


            let original = this.innerHTML;

            this.innerHTML =
                '<i class="bi bi-check-circle"></i> Ditambahkan';

            this.classList.add('btn-success');


            setTimeout(() => {

                this.innerHTML = original;

                this.classList.remove('btn-success');

            }, 800);

        });

    });


    // KOSONGKAN

    clearCart.addEventListener('click', function () {

        if (cart.length === 0) {
            return;
        }


        if (confirm('Yakin ingin mengosongkan keranjang?')) {

            cart = [];

            renderCart();

        }

    });


    // FILTER

    document.querySelectorAll('.filter-btn').forEach(function (button) {

        button.addEventListener('click', function () {

            document.querySelectorAll('.filter-btn')
                .forEach(btn => btn.classList.remove('active'));

            this.classList.add('active');


            let filter = this.dataset.filter;


            document.querySelectorAll('.product-item')
                .forEach(function (item) {

                    if (
                        filter === 'all' ||
                        item.dataset.tipe === filter
                    ) {

                        item.style.display = '';

                    } else {

                        item.style.display = 'none';

                    }

                });

        });

    });


    // SEARCH

    document.getElementById('searchProduct')
        .addEventListener('input', function () {

            let keyword = this.value.toLowerCase().trim();


            document.querySelectorAll('.product-item')
                .forEach(function (item) {

                    let nama = item.dataset.nama;

                    item.style.display =
                        nama.includes(keyword)
                            ? ''
                            : 'none';

                });

        });


    // VALIDASI

    document.querySelector('form')
        .addEventListener('submit', function (event) {

            if (cart.length === 0) {

                event.preventDefault();

                alert(
                    'Silakan pilih minimal satu produk terlebih dahulu.'
                );

                return;

            }

            renderCart();

        });


    renderCart();

});

</script>

@endsection