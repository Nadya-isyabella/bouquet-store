@extends('layouts.user')

@section('title', 'Tambah Pemesanan')

@section('content')

<style>
    /* =========================================================
       HALAMAN
    ========================================================= */

    .pemesanan-page {
        padding: 15px 20px 90px;
    }

    .page-title {
        color: #6b4c4c;
        font-size: 24px;
        font-weight: 600;
        margin: 0;
    }

    .page-subtitle {
        color: #888;
        font-size: 14px;
        margin-top: 4px;
    }


    /* =========================================================
       CARD
    ========================================================= */

    .pesanan-card {
        background: #fff;
        border: 1px solid #e9e1e1;
        border-radius: 9px;
        margin-bottom: 20px;
        overflow: hidden;
    }

    .pesanan-header {
        padding: 13px 18px;
        background: #faf6f6;
        border-bottom: 1px solid #eadede;
    }

    .pesanan-header h5 {
        margin: 0;
        color: #6b4c4c;
        font-size: 16px;
        font-weight: 500;
    }

    .pesanan-header i {
        color: #d4758a;
        margin-right: 7px;
    }

    .pesanan-body {
        padding: 20px;
    }


    /* =========================================================
       FORM DATA
    ========================================================= */

    .data-form {
        max-width: 100%;
    }

    .data-row {
        margin-bottom: 17px;
    }

    .data-row:last-child {
        margin-bottom: 0;
    }

    .data-label {
        display: block;
        color: #555;
        font-size: 14px;
        font-weight: 400;
        margin-bottom: 6px;
    }

    .data-input {
        width: 100%;
        height: 40px;
        padding: 8px 11px;

        border: 1px solid #dcd5d5;
        border-radius: 6px;

        background: #fff;
        color: #444;

        font-size: 14px;
        font-weight: 400;

        outline: none;
        box-shadow: none;
    }

    .data-input:focus {
        border-color: #d4758a;
        box-shadow: 0 0 0 2px rgba(212, 117, 138, .08);
    }

    textarea.data-input {
        height: auto;
        min-height: 85px;
        resize: vertical;
    }

    .data-help {
        display: block;
        margin-top: 5px;
        color: #999;
        font-size: 12px;
        font-weight: 400;
    }

    .required {
        color: #d4758a;
    }


    /* =========================================================
       TANGGAL
    ========================================================= */

    .tanggal-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }


    /* =========================================================
       SEARCH
    ========================================================= */

    .search-box {
        max-width: 650px;
    }

    .search-box .input-group-text {
        background: #fff;
        border-color: #ddd;
        color: #d4758a;
    }

    .search-box .form-control {
        border-left: 0;
        font-size: 14px;
        box-shadow: none;
    }

    .filter-area {
        margin-top: 12px;
    }

    .filter-btn {
        border-radius: 6px;
        padding: 6px 14px;
        font-size: 13px;
        font-weight: 400;
    }

    .filter-btn.active {
        background: #d4758a;
        border-color: #d4758a;
        color: white;
    }


    /* =========================================================
       PRODUK
    ========================================================= */

    .product-grid {
        display: grid;
        grid-template-columns: repeat(5, minmax(0, 1fr));
        gap: 18px;
    }

    .product-card {
        height: 100%;
        background: #fff;
        border: 1px solid #e9e2e2;
        border-radius: 8px;
        overflow: hidden;
    }

    .product-image {
        width: 100%;
        height: 155px;
        object-fit: cover;
        display: block;
    }

    .empty-image {
        width: 100%;
        height: 155px;
        background: #f8f4f4;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .empty-image i {
        color: #d1bebe;
        font-size: 35px;
    }

    .product-content {
        padding: 11px;
    }

    .product-name {
        color: #555;
        font-size: 14px;
        font-weight: 500;
        line-height: 1.4;
        min-height: 40px;
    }

    .product-price {
        color: #d4758a;
        font-size: 14px;
        font-weight: 500;
        margin-top: 6px;
    }

    .product-stock {
        color: #999;
        font-size: 12px;
        margin-top: 3px;
        margin-bottom: 10px;
    }

    .btn-tambah {
        width: 100%;
        border: none;
        border-radius: 6px;
        background: #a7c7c9;
        color: #294d4e;
        font-size: 13px;
        font-weight: 400;
        padding: 7px;
    }

    .btn-tambah:hover {
        background: #91babc;
        color: #294d4e;
    }


    /* =========================================================
       KERANJANG
    ========================================================= */

    .cart-item {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 13px 18px;
        border-bottom: 1px solid #eee;
    }

    .cart-item:last-child {
        border-bottom: none;
    }

    .cart-image {
        width: 62px;
        height: 62px;
        border-radius: 7px;
        object-fit: cover;
        flex-shrink: 0;
    }

    .cart-info {
        flex: 1;
        min-width: 0;
    }

    .cart-name {
        color: #555;
        font-size: 14px;
        font-weight: 500;
    }

    .cart-type {
        color: #999;
        font-size: 11px;
        margin-top: 2px;
        text-transform: capitalize;
    }

    .cart-price {
        color: #d4758a;
        font-size: 13px;
        margin-top: 3px;
    }

    .cart-quantity {
        width: 85px;
        text-align: center;
        flex-shrink: 0;
    }

    .qty-input {
        width: 65px;
        text-align: center;
        font-size: 13px;
        padding: 5px;
    }

    .cart-subtotal {
        width: 140px;
        text-align: right;
        flex-shrink: 0;
    }

    .subtotal-label {
        color: #999;
        font-size: 11px;
    }

    .subtotal-value {
        color: #d4758a;
        font-size: 14px;
        font-weight: 500;
        margin-top: 2px;
    }

    .remove-item {
        width: 32px;
        height: 32px;
        padding: 0;
        flex-shrink: 0;
        border-radius: 6px;
    }


    /* =========================================================
       CART KOSONG
    ========================================================= */

    .empty-cart {
        padding: 35px 15px;
        text-align: center;
        color: #999;
        font-size: 14px;
    }

    .empty-cart i {
        display: block;
        color: #d5c0c0;
        font-size: 35px;
        margin-bottom: 8px;
    }

    .empty-cart small {
        color: #aaa;
        font-size: 12px;
    }


    /* =========================================================
       TOTAL
    ========================================================= */

    .cart-footer {
        display: flex;
        justify-content: flex-end;
        padding: 15px 18px;
        border-top: 1px solid #eee;
    }

    .total-box {
        width: 270px;
        padding: 11px 14px;
        border: 1px solid #eadada;
        border-radius: 7px;
        background: #fcf7f7;
    }

    .total-label {
        color: #666;
        font-size: 13px;
        font-weight: 400;
    }

    .grand-total {
        color: #d4758a;
        font-size: 17px;
        font-weight: 600;
    }


    /* =========================================================
       TOMBOL KEMBALI
    ========================================================= */

    


    /* =========================================================
       ACTION BAR
    ========================================================= */

    .action-bar {
        position: sticky;
        bottom: 0;
        z-index: 100;

        background: rgba(255,255,255,.97);
        border-top: 1px solid #e9e2e2;

        padding: 11px 0;
    }

    .action-inner {
        display: flex;
        justify-content: flex-end;
        gap: 9px;
    }

    .btn-clear {
        border-radius: 6px;
        font-size: 13px;
        font-weight: 400;
        padding: 8px 15px;
    }

    .btn-submit {
        background: #d4758a;
        border: 1px solid #d4758a;
        color: #fff;

        border-radius: 6px;
        font-size: 13px;
        font-weight: 400;

        padding: 8px 20px;
    }

    .btn-submit:hover {
        background: #c46178;
        border-color: #c46178;
        color: #fff;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 1200px) {

        .product-grid {
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }

    }

    @media (max-width: 900px) {

        .product-grid {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }

        .tanggal-grid {
            grid-template-columns: 1fr;
        }

    }

    @media (max-width: 650px) {

        .pemesanan-page {
            padding-left: 10px;
            padding-right: 10px;
        }

        .product-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 12px;
        }

        .product-image,
        .empty-image {
            height: 135px;
        }

        .cart-item {
            flex-wrap: wrap;
        }

        .cart-info {
            min-width: calc(100% - 80px);
        }

        .cart-subtotal {
            width: auto;
            margin-left: auto;
        }

        .total-box {
            width: 270px;
        }

    }
</style>

<div class="container-fluid pemesanan-page">

{{-- =========================================================
     HEADER
========================================================= --}}

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h3 class="page-title">
            <i class="bi bi-plus-circle me-1"
               style="color:#d4758a;"></i>

            Tambah Pemesanan
        </h3>

        <div class="page-subtitle">
            Isi data customer dan pilih produk yang dipesan.
        </div>




{{-- =========================================================
     ERROR
========================================================= --}}

@if($errors->any())

    <div class="alert alert-danger"
         style="font-size:13px;">

        <strong>Terjadi kesalahan:</strong>

        <ul class="mb-0 mt-2">

            @foreach($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif


<form action="{{ route('user.pesanan.store') }}"
      method="POST">

    @csrf


    {{-- =====================================================
         DATA CUSTOMER
    ====================================================== --}}

    <div class="pesanan-card">

        <div class="pesanan-header">

            <h5>
                <i class="bi bi-person"></i>
                Data Customer
            </h5>

        </div>


        <div class="pesanan-body">

            <div class="data-form">

                {{-- NAMA --}}

                <div class="data-row">

                    <label class="data-label">
                        Nama Customer
                        <span class="required">*</span>
                    </label>

                    <input type="text"
                           name="nama_customer"
                           class="data-input"
                           value="{{ old('nama_customer', auth()->user()->name) }}"
                           placeholder="Masukkan nama customer"
                           readonly
                           required>

                </div>


                {{-- EMAIL --}}

                <div class="data-row">

                    <label class="data-label">
                        Email
                        <span class="required">*</span>
                    </label>

                    <input type="email"
                           name="email"
                           class="data-input"
                           value="{{ old('email', auth()->user()->email) }}"
                           placeholder="Masukkan email customer"
                           readonly
                           required>

                    <small class="data-help">
                        Contoh: customer@gmail.com
                    </small>

                </div>


                {{-- NOMOR HP --}}

                <div class="data-row">

                    <label class="data-label">
                        Nomor HP / WhatsApp
                        <span class="required">*</span>
                    </label>

                    <input type="text"
                           name="nomor_hp"
                           class="data-input"
                           value="{{ old('nomor_hp') }}"
                           placeholder="Masukkan nomor HP / WhatsApp"
                           required>

                </div>


                {{-- ALAMAT --}}

                <div class="data-row">

                    <label class="data-label">
                        Alamat Pengiriman
                        <span class="required">*</span>
                    </label>

                    <textarea name="alamat"
                              class="data-input"
                              rows="3"
                              placeholder="Masukkan alamat lengkap"
                              required>{{ old('alamat') }}</textarea>

                </div>

            </div>

        </div>

    </div>


    {{-- =====================================================
         DATA TANGGAL
    ====================================================== --}}

    <div class="pesanan-card">

        <div class="pesanan-header">

            <h5>
                <i class="bi bi-calendar"></i>
                Data Tanggal
            </h5>

        </div>


        <div class="pesanan-body">

            <div class="tanggal-grid">

                <div class="data-row mb-0">

                    <label class="data-label">
                        Tanggal Pemesanan
                        <span class="required">*</span>
                    </label>

                    <input type="date"
                           name="tanggal_pemesanan"
                           class="data-input"
                           value="{{ old('tanggal_pemesanan', date('Y-m-d')) }}"
                           required>

                </div>


                <div class="data-row mb-3">

    <label class="data-label">
        Tanggal Pengambilan
    </label>

    <input type="date"
           name="tanggal_pengembalian"
           class="data-input"
           value="{{ old('tanggal_pengembalian') }}">

</div>

            </div>

        </div>

    </div>


    {{-- =====================================================
         PILIH PRODUK
    ====================================================== --}}

    <div class="pesanan-card">

        <div class="pesanan-header">

            <h5>
                <i class="bi bi-grid"></i>
                Pilih Produk
            </h5>

        </div>


        <div class="pesanan-body">

            <div class="search-box">

                <div class="input-group">

                    <span class="input-group-text">

                        <i class="bi bi-search"></i>

                    </span>

                    <input type="text"
                           id="searchProduct"
                           class="form-control"
                           placeholder="Cari bouquet atau aksesoris...">

                </div>

            </div>


            <div class="filter-area d-flex gap-2 flex-wrap">

                <button type="button"
                        class="btn btn-sm btn-outline-secondary filter-btn active"
                        data-filter="all">

                    Semua

                </button>


                <button type="button"
                        class="btn btn-sm btn-outline-secondary filter-btn"
                        data-filter="bouquet">

                    <i class="bi bi-flower1 me-1"></i>
                    Bouquet

                </button>


                <button type="button"
                        class="btn btn-sm btn-outline-secondary filter-btn"
                        data-filter="aksesoris">

                    <i class="bi bi-gift me-1"></i>
                    Aksesoris

                </button>

            </div>

        </div>

    </div>


    {{-- =====================================================
         DAFTAR PRODUK
    ====================================================== --}}

    <div class="pesanan-card">

        <div class="pesanan-header">

            <h5>
                <i class="bi bi-image"></i>
                Daftar Produk
            </h5>

        </div>


        <div class="pesanan-body">

            @php

                $allProducts = collect();

                if (isset($bouquets)) {

                    foreach ($bouquets as $b) {

                        $b->tipe = 'bouquet';

                        $allProducts->push($b);

                    }

                }

                if (isset($aksesoris)) {

                    foreach ($aksesoris as $a) {

                        $a->tipe = 'aksesoris';

                        $allProducts->push($a);

                    }

                }

            @endphp


            <div class="product-grid"
                 id="productGrid">

                @forelse($allProducts as $product)

                    <div class="product-item"
                         data-tipe="{{ $product->tipe }}"
                         data-nama="{{ strtolower($product->nama) }}">

                        <div class="product-card">

                            @if($product->gambar)

                                <img src="{{ asset('storage/' . $product->gambar) }}"
                                     class="product-image"
                                     alt="{{ $product->nama }}">

                            @else

                                <div class="empty-image">

                                    <i class="bi bi-image"></i>

                                </div>

                            @endif


                            <div class="product-content">

                                <div class="product-name">

                                    {{ $product->nama }}

                                </div>


                                <div class="product-price">

                                    Rp {{ number_format(
                                        $product->harga,
                                        0,
                                        ',',
                                        '.'
                                    ) }}

                                </div>


                                <div class="product-stock">

                                    Stok:
                                    {{ $product->stok ?? 0 }}

                                </div>


                                @if(($product->stok ?? 0) > 0)

                                    <button type="button"
                                            class="btn btn-tambah add-to-cart"
                                            data-id="{{ $product->id }}"
                                            data-nama="{{ $product->nama }}"
                                            data-harga="{{ $product->harga }}"
                                            data-gambar="{{ $product->gambar ?? '' }}"
                                            data-tipe="{{ $product->tipe }}"
                                            data-stok="{{ $product->stok ?? 0 }}">

                                        <i class="bi bi-cart-plus me-1"></i>
                                        Tambah

                                    </button>

                                @else

                                    <button type="button"
                                            class="btn btn-secondary w-100"
                                            style="border-radius:6px; font-size:13px;"
                                            disabled>

                                        Stok Habis

                                    </button>

                                @endif

                            </div>

                        </div>

                    </div>

                @empty

                    <div style="grid-column:1/-1;">

                        <div class="alert alert-warning text-center mb-0">

                            Belum ada produk yang tersedia.

                        </div>

                    </div>

                @endforelse

            </div>

        </div>

    </div>


    {{-- =====================================================
         KERANJANG
    ====================================================== --}}

    <div class="pesanan-card">

        <div class="pesanan-header">

            <h5>

                <i class="bi bi-cart"></i>

                Keranjang Pesanan

                <span class="badge ms-1"
                      id="cartCount"
                    

                    0

                </span>

            </h5>

        </div>


        <div id="cartItems">

            <div id="emptyCart"
                 class="empty-cart">

                <i class="bi bi-cart-x"></i>

                Belum ada produk di keranjang.

                <small class="d-block">
                    Pilih produk di atas untuk menambahkannya.
                </small>

            </div>

        </div>


        {{-- TOTAL --}}

        <div class="cart-footer">

            <div class="total-box">

                <div class="d-flex justify-content-between align-items-center">

                    <span class="total-label">
                        Total Pesanan
                    </span>

                    <span id="grandTotal"
                          class="grand-total">

                        Rp 0

                    </span>

                </div>


                <input type="hidden"
                       name="total_harga"
                       id="totalHidden"
                       value="0">

            </div>

        </div>

    </div>


    {{-- =====================================================
         TOMBOL
    ====================================================== --}}

    <div class="action-bar">

        <div class="action-inner">

            <button type="button"
                    class="btn btn-outline-danger btn-clear"
                    id="clearCart">

                <i class="bi bi-trash me-1"></i>
                Kosongkan

            </button>


            <button type="submit"
                    class="btn btn-submit">

                <i class="bi bi-check-circle me-1"></i>
                Pesan

            </button>

        </div>

    </div>

</form>
```

</div>

<script>

document.addEventListener('DOMContentLoaded', function () {

    let cart = [];


    const cartContainer =
        document.getElementById('cartItems');

    const emptyCart =
        document.getElementById('emptyCart');

    const cartCount =
        document.getElementById('cartCount');

    const grandTotal =
        document.getElementById('grandTotal');

    const totalHidden =
        document.getElementById('totalHidden');

    const clearCartButton =
        document.getElementById('clearCart');


    /* =========================================================
       RUPIAH
    ========================================================= */

    function rupiah(number) {

        return 'Rp ' +
            Number(number).toLocaleString('id-ID');

    }


    /* =========================================================
       RENDER CART
    ========================================================= */

    function renderCart() {

        cartContainer
            .querySelectorAll('.cart-item')
            .forEach(function (item) {

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

            const subtotal =
                Number(item.harga) *
                Number(item.qty);


            total += subtotal;
            totalQty += Number(item.qty);


            const row =
                document.createElement('div');


            row.className = 'cart-item';


            let gambarHTML = '';


            if (item.gambar) {

                gambarHTML = `
                    <img
                        src="{{ asset('storage') }}/${item.gambar}"
                        class="cart-image"
                        alt="${item.nama}"
                    >
                `;

            } else {

                gambarHTML = `
                    <div
                        class="cart-image d-flex align-items-center justify-content-center"
                        style="background:#f8f2f2;"
                    >
                        <i
                            class="bi bi-image"
                            style="color:#d2baba;"
                        ></i>
                    </div>
                `;

            }


            row.innerHTML = `

                ${gambarHTML}


                <div class="cart-info">

                    <div class="cart-name">
                        ${item.nama}
                    </div>

                    <div class="cart-type">
                        ${item.tipe}
                    </div>

                    <div class="cart-price">
                        ${rupiah(item.harga)}
                    </div>

                </div>


                <div class="cart-quantity">

                    <input
                        type="number"
                        min="1"
                        max="${item.stok}"
                        value="${item.qty}"
                        class="form-control qty-input"
                        data-index="${index}"
                    >

                    <small
                        class="text-muted"
                        style="font-size:10px;"
                    >
                        Stok ${item.stok}
                    </small>

                </div>


                <div class="cart-subtotal">

                    <div class="subtotal-label">
                        Subtotal
                    </div>

                    <div class="subtotal-value">
                        ${rupiah(subtotal)}
                    </div>

                </div>


                <button
                    type="button"
                    class="btn btn-outline-danger remove-item"
                    data-index="${index}"
                >

                    <i class="bi bi-trash"></i>

                </button>


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

            `;


            cartContainer.appendChild(row);

        });


        cartCount.textContent = totalQty;

        grandTotal.textContent = rupiah(total);

        totalHidden.value = total;


        /* =====================================================
           QTY
        ===================================================== */

        document.querySelectorAll('.qty-input')
            .forEach(function (input) {

                input.addEventListener('change', function () {

                    const index =
                        parseInt(this.dataset.index);


                    let qty =
                        parseInt(this.value);


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


        /* =====================================================
           HAPUS
        ===================================================== */

        document.querySelectorAll('.remove-item')
            .forEach(function (button) {

                button.addEventListener('click', function () {

                    const index =
                        parseInt(this.dataset.index);


                    cart.splice(index, 1);

                    renderCart();

                });

            });

    }


    /* =========================================================
       TAMBAH PRODUK
    ========================================================= */

    document.querySelectorAll('.add-to-cart')
        .forEach(function (button) {

            button.addEventListener('click', function () {

                const product = {

                    id:
                        parseInt(this.dataset.id),

                    nama:
                        this.dataset.nama,

                    harga:
                        parseInt(this.dataset.harga),

                    gambar:
                        this.dataset.gambar || '',

                    tipe:
                        this.dataset.tipe,

                    stok:
                        parseInt(this.dataset.stok) || 0

                };


                const existing =
                    cart.find(function (item) {

                        return (
                            item.id === product.id &&
                            item.tipe === product.tipe
                        );

                    });


                if (existing) {

                    if (
                        existing.qty >=
                        existing.stok
                    ) {

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

                    cart.push({

                        id: product.id,
                        nama: product.nama,
                        harga: product.harga,
                        gambar: product.gambar,
                        tipe: product.tipe,
                        stok: product.stok,
                        qty: 1

                    });

                }


                renderCart();


                const original =
                    this.innerHTML;


                this.innerHTML =
                    '<i class="bi bi-check-circle me-1"></i> Ditambahkan';


                this.style.background =
                    '#8fb9bb';


                const currentButton =
                    this;


                setTimeout(function () {

                    currentButton.innerHTML =
                        original;

                    currentButton.style.background =
                        '';

                }, 800);

            });

        });


    /* =========================================================
       KOSONGKAN
    ========================================================= */

    clearCartButton.addEventListener('click', function () {

        if (cart.length === 0) {

            return;

        }


        if (
            confirm(
                'Yakin ingin mengosongkan semua item di keranjang?'
            )
        ) {

            cart = [];

            renderCart();

        }

    });


    /* =========================================================
       FILTER
    ========================================================= */

    document.querySelectorAll('.filter-btn')
        .forEach(function (button) {

            button.addEventListener('click', function () {

                document.querySelectorAll('.filter-btn')
                    .forEach(function (btn) {

                        btn.classList.remove('active');

                    });


                this.classList.add('active');


                const filter =
                    this.dataset.filter;


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


    /* =========================================================
       SEARCH
    ========================================================= */

    document.getElementById('searchProduct')
        .addEventListener('input', function () {

            const keyword =
                this.value
                    .toLowerCase()
                    .trim();


            document.querySelectorAll('.product-item')
                .forEach(function (item) {

                    const nama =
                        item.dataset.nama;


                    item.style.display =
                        nama.includes(keyword)
                            ? ''
                            : 'none';

                });

        });


    /* =========================================================
       SUBMIT
    ========================================================= */

    document.querySelector('form')
        .addEventListener('submit', function (event) {

            if (cart.length === 0) {

                event.preventDefault();

                alert(
                    'Silakan tambahkan minimal 1 produk ke keranjang terlebih dahulu.'
                );

                return;

            }

            renderCart();

        });


    renderCart();

});

</script>

@endsection
