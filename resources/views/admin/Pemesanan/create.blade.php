@extends('layouts.main')

@section('title', 'Tambah Pemesanan')

@section('content')

<div class="container-fluid">

    {{-- ========================================================= --}}
    {{-- HEADER --}}
    {{-- ========================================================= --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3 style="color: #6b4c4c; font-weight: 700;">
            <i class="bi bi-plus-circle" style="color: #d4758a;"></i>
            Tambah Pemesanan
        </h3>

        <a href="{{ route('admin.pemesanan.index') }}"
           class="btn btn-secondary">

            <i class="bi bi-arrow-left"></i>
            Kembali

        </a>

    </div>


    {{-- ========================================================= --}}
    {{-- ERROR --}}
    {{-- ========================================================= --}}
    @if($errors->any())

        <div class="alert alert-danger">

            <strong>Terjadi kesalahan:</strong>

            <ul class="mb-0 mt-2">

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif



    {{-- ========================================================= --}}
    {{-- FORM UTAMA --}}
    {{-- ========================================================= --}}
    <form action="{{ route('admin.pemesanan.store') }}"
          method="POST">

        @csrf


        <div class="row">


            {{-- ================================================= --}}
            {{-- KOLOM KIRI --}}
            {{-- ================================================= --}}
            <div class="col-md-4">


                {{-- ============================================= --}}
                {{-- DATA CUSTOMER --}}
                {{-- ============================================= --}}
                <div class="card mb-3 shadow-sm">

                    <div class="card-header"
                         style="
                            background:#f8f0f0;
                            border-bottom:2px solid #d4758a;
                         ">

                        <h5 class="mb-0"
                            style="color:#6b4c4c;">

                            <i class="bi bi-person"
                               style="color:#d4758a;"></i>

                            Data Customer

                        </h5>

                    </div>


                    <div class="card-body">


                        {{-- ===================================== --}}
                        {{-- NAMA CUSTOMER --}}
                        {{-- ===================================== --}}
                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Nama Customer
                            </label>

                            <input
                                type="text"
                                name="nama_customer"
                                class="form-control @error('nama_customer') is-invalid @enderror"
                                placeholder="Ketik nama customer"
                                value="{{ old('nama_customer') }}"
                                required
                            >

                            @error('nama_customer')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                            <small class="text-secondary">
                                Jika belum terdaftar, akan dibuat otomatis.
                            </small>

                        </div>


                        {{-- ===================================== --}}
                        {{-- EMAIL CUSTOMER --}}
                        {{-- ===================================== --}}
                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Email Customer
                            </label>

                            <input
                                type="email"
                                name="email"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="Contoh: customer@gmail.com"
                                value="{{ old('email') }}"
                                required
                            >

                            @error('email')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- ===================================== --}}
                        {{-- NOMOR HP --}}
                        {{-- ===================================== --}}
                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Nomor HP / WhatsApp
                            </label>

                            <input
                                type="text"
                                name="nomor_hp"
                                class="form-control @error('nomor_hp') is-invalid @enderror"
                                placeholder="Contoh: 081234567890"
                                value="{{ old('nomor_hp') }}"
                                required
                            >

                            @error('nomor_hp')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- ===================================== --}}
                        {{-- ALAMAT --}}
                        {{-- ===================================== --}}
                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Alamat
                            </label>

                            <textarea
                                name="alamat"
                                class="form-control @error('alamat') is-invalid @enderror"
                                rows="3"
                                placeholder="Masukkan alamat lengkap"
                                required
                            >{{ old('alamat') }}</textarea>

                            @error('alamat')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                    </div>

                </div>



                {{-- ============================================= --}}
                {{-- DATA TANGGAL --}}
                {{-- ============================================= --}}
                <div class="card mb-3 shadow-sm">

                    <div class="card-header"
                         style="
                            background:#f8f0f0;
                            border-bottom:2px solid #d4758a;
                         ">

                        <h5 class="mb-0"
                            style="color:#6b4c4c;">

                            <i class="bi bi-calendar"
                               style="color:#d4758a;"></i>

                            Data Tanggal

                        </h5>

                    </div>


                    <div class="card-body">


                        {{-- TANGGAL PEMESANAN --}}
                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Tanggal Pemesanan
                            </label>

                            <input
                                type="date"
                                name="tanggal_pemesanan"
                                class="form-control @error('tanggal_pemesanan') is-invalid @enderror"
                                value="{{ old(
                                    'tanggal_pemesanan',
                                    date('Y-m-d')
                                ) }}"
                                required
                            >

                            @error('tanggal_pemesanan')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- TANGGAL PENGEMBALIAN --}}
                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Tanggal Pengambilan
                            </label>

                            <input
                                type="date"
                                name="tanggal_pengembalian"
                                class="form-control @error('tanggal_pengembalian') is-invalid @enderror"
                                value="{{ old('tanggal_pengembalian') }}"
                            >

                            @error('tanggal_pengembalian')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                    </div>

                </div>



            </div>



            {{-- ================================================= --}}
            {{-- KOLOM KANAN --}}
            {{-- ================================================= --}}
            <div class="col-md-8">


                {{-- ============================================= --}}
                {{-- PENCARIAN & FILTER --}}
                {{-- ============================================= --}}
                <div class="card mb-3 shadow-sm">

                    <div class="card-body">

                        <div class="input-group">

                            <span class="input-group-text bg-white">

                                <i
                                    class="bi bi-search"
                                    style="color:#d4758a;"
                                ></i>

                            </span>

                            <input
                                type="text"
                                id="searchProduct"
                                class="form-control"
                                placeholder="Cari bouquet atau aksesoris..."
                            >

                        </div>


                        <div class="mt-3 d-flex flex-wrap gap-2">

                            <button
                                type="button"
                                class="btn btn-sm btn-outline-secondary filter-btn"
                                data-filter="all"
                            >
                                Semua
                            </button>


                            <button
                                type="button"
                                class="btn btn-sm btn-outline-secondary filter-btn"
                                data-filter="bouquet"
                            >
                                Bouquet
                            </button>


                            <button
                                type="button"
                                class="btn btn-sm btn-outline-secondary filter-btn"
                                data-filter="aksesoris"
                            >
                                Aksesoris
                            </button>

                        </div>

                    </div>

                </div>



                {{-- ============================================= --}}
                {{-- DAFTAR PRODUK --}}
                {{-- ============================================= --}}
                <div class="card mb-3 shadow-sm">

                    <div class="card-header"
                         style="
                            background:#f8f0f0;
                            border-bottom:2px solid #d4758a;
                         ">

                        <h5 class="mb-0"
                            style="color:#6b4c4c;">

                            <i
                                class="bi bi-grid"
                                style="color:#d4758a;"
                            ></i>

                            Daftar Produk

                        </h5>

                    </div>


                    <div
                        class="card-body"
                        style="
                            max-height:550px;
                            overflow-y:auto;
                        "
                    >

                        <div
                            class="row"
                            id="productGrid"
                        >

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


                            @forelse($allProducts as $product)


                                <div
                                    class="col-md-4 col-sm-6 mb-3 product-item"
                                    data-tipe="{{ $product->tipe }}"
                                    data-nama="{{ strtolower($product->nama) }}"
                                >


                                    <div class="card h-100 shadow-sm border-0">


                                        {{-- GAMBAR --}}
                                        @if($product->gambar)

                                            <img
                                                src="{{ asset(
                                                    'storage/' .
                                                    $product->gambar
                                                ) }}"
                                                class="card-img-top"
                                                style="
                                                    height:150px;
                                                    object-fit:cover;
                                                    border-radius:8px 8px 0 0;
                                                "
                                                alt="{{ $product->nama }}"
                                            >

                                        @else

                                            <div
                                                class="
                                                    card-img-top
                                                    bg-light
                                                    d-flex
                                                    align-items-center
                                                    justify-content-center
                                                "
                                                style="
                                                    height:150px;
                                                    border-radius:8px 8px 0 0;
                                                "
                                            >

                                                <i
                                                    class="bi bi-image"
                                                    style="
                                                        font-size:3rem;
                                                        color:#ccc;
                                                    "
                                                ></i>

                                            </div>

                                        @endif


                                        {{-- DETAIL --}}
                                        <div
                                            class="
                                                card-body
                                                d-flex
                                                flex-column
                                            "
                                        >

                                            <h6
                                                class="
                                                    card-title
                                                    fw-bold
                                                    text-truncate
                                                "
                                            >
                                                {{ $product->nama }}
                                            </h6>


                                            <p class="card-text mb-2">

                                                <span
                                                    style="
                                                        font-size:18px;
                                                        color:#d4758a;
                                                        font-weight:700;
                                                    "
                                                >

                                                    Rp
                                                    {{ number_format(
                                                        $product->harga,
                                                        0,
                                                        ',',
                                                        '.'
                                                    ) }}

                                                </span>

                                                <br>

                                                <small class="text-muted">

                                                    Stok:
                                                    {{ $product->stok ?? 0 }}

                                                </small>

                                            </p>


                                            {{-- TOMBOL TAMBAH --}}
                                            <button
                                                type="button"
                                                class="
                                                    btn
                                                    btn-sm
                                                    btn-primary
                                                    mt-auto
                                                    add-to-cart
                                                "
                                                data-id="{{ $product->id }}"
                                                data-nama="{{ $product->nama }}"
                                                data-harga="{{ $product->harga }}"
                                                data-gambar="{{ $product->gambar ?? '' }}"
                                                data-tipe="{{ $product->tipe }}"
                                                data-stok="{{ $product->stok ?? 0 }}"
                                            >

                                                <i class="bi bi-cart-plus"></i>

                                                Tambah

                                            </button>


                                        </div>

                                    </div>

                                </div>


                            @empty


                                <div class="col-12">

                                    <div class="alert alert-warning text-center">

                                        Belum ada produk yang tersedia.

                                    </div>

                                </div>


                            @endforelse


                        </div>

                    </div>

                </div>



                {{-- ================================================= --}}
                {{-- KERANJANG --}}
                {{-- ================================================= --}}
                <div class="card shadow-sm">


                    {{-- HEADER KERANJANG --}}
                    <div class="card-header"
                         style="
                            background:#f8f0f0;
                            border-bottom:2px solid #d4758a;
                         ">

                        <h5
                            class="mb-0"
                            style="color:#6b4c4c;"
                        >

                            <i
                                class="bi bi-cart"
                                style="color:#d4758a;"
                            ></i>

                            Keranjang Pesanan

                            <span
                                class="badge bg-secondary"
                                id="cartCount"
                                style="
                                    background:#d4758a !important;
                                "
                            >
                                0
                            </span>

                        </h5>

                    </div>



                    <div class="card-body">


                        {{-- ========================================= --}}
                        {{-- ITEM KERANJANG --}}
                        {{-- ========================================= --}}
                        <div id="cartItems">

                            <p
                                class="text-muted text-center"
                                id="emptyCart"
                                style="padding:20px 0;"
                            >

                                <i
                                    class="bi bi-cart-plus"
                                    style="
                                        font-size:24px;
                                        display:block;
                                        margin-bottom:8px;
                                    "
                                ></i>

                                Belum ada item.

                            </p>

                        </div>



                        {{-- ========================================= --}}
                        {{-- TOTAL --}}
                        {{-- ========================================= --}}
                        <div class="row mt-3">

                            <div class="col-md-8 offset-md-4">

                                <div
                                    class="bg-light p-3 rounded-3"
                                    style="
                                        border:1px solid #e9ecef;
                                    "
                                >

                                    <h5
                                        class="
                                            d-flex
                                            justify-content-between
                                            align-items-center
                                            mb-0
                                        "
                                    >

                                        <span style="font-weight:600;">
                                            Total Semua Item
                                        </span>

                                        <span
                                            id="grandTotal"
                                            style="
                                                color:#d4758a;
                                                font-weight:700;
                                                font-size:22px;
                                            "
                                        >
                                            Rp 0
                                        </span>

                                    </h5>


                                    {{-- TOTAL UNTUK SERVER --}}
                                    <input
                                        type="hidden"
                                        name="total_harga"
                                        id="totalHidden"
                                        value="0"
                                    >

                                </div>

                            </div>

                        </div>



                        {{-- ========================================= --}}
                        {{-- BUTTON --}}
                        {{-- ========================================= --}}
                        <div
                            class="
                                mt-4
                                d-flex
                                flex-wrap
                                justify-content-end
                                gap-2
                            "
                        >

                            <button
                                type="button"
                                class="btn btn-outline-danger"
                                id="clearCart"
                            >

                                <i class="bi bi-trash"></i>

                                Kosongkan

                            </button>


                            <button
                                type="submit"
                                class="btn btn-primary"
                                style="
                                    background:#d4758a;
                                    border-color:#d4758a;
                                "
                            >

                                <i class="bi bi-save"></i>

                                Simpan Pemesanan

                            </button>

                        </div>


                    </div>

                </div>


            </div>


        </div>


    </form>


</div>



{{-- ============================================================= --}}
{{-- JAVASCRIPT --}}
{{-- ============================================================= --}}

<script>

document.addEventListener('DOMContentLoaded', function () {


    // =========================================================
    // CART
    // =========================================================

    let cart = [];



    // =========================================================
    // ELEMENT
    // =========================================================

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



    // =========================================================
    // FORMAT RUPIAH
    // =========================================================

    function rupiah(number) {

        return 'Rp ' +
            Number(number).toLocaleString('id-ID');

    }



    // =========================================================
    // RENDER CART
    // =========================================================

    function renderCart() {


        // Hapus item lama
        const oldItems =
            cartContainer.querySelectorAll(
                '.cart-item'
            );


        oldItems.forEach(function (item) {

            item.remove();

        });



        // =====================================================
        // JIKA CART KOSONG
        // =====================================================

        if (cart.length === 0) {

            emptyCart.style.display = 'block';

            cartCount.textContent = '0';

            grandTotal.textContent = 'Rp 0';

            totalHidden.value = '0';

            return;

        }



        // Sembunyikan pesan kosong
        emptyCart.style.display = 'none';



        let total = 0;

        let totalQty = 0;



        // =====================================================
        // TAMPILKAN ITEM
        // =====================================================

        cart.forEach(function (item, index) {


            const subtotal =
                item.harga * item.qty;


            total += subtotal;

            totalQty += item.qty;



            const row =
                document.createElement('div');


            row.className =
                'cart-item row align-items-center mb-3 p-3 border rounded';



            // =================================================
            // GAMBAR
            // =================================================

            let gambarHTML = '';


            if (item.gambar) {

                gambarHTML = `

                    <img
                        src="{{ asset('storage') }}/${item.gambar}"
                        alt="${item.nama}"
                        style="
                            width:60px;
                            height:60px;
                            object-fit:cover;
                            border-radius:8px;
                            margin-right:10px;
                        "
                    >

                `;

            } else {

                gambarHTML = `

                    <div
                        style="
                            width:60px;
                            height:60px;
                            background:#eeeeee;
                            border-radius:8px;
                            margin-right:10px;
                            display:flex;
                            align-items:center;
                            justify-content:center;
                        "
                    >

                        <i
                            class="bi bi-image"
                            style="
                                font-size:24px;
                                color:#cccccc;
                            "
                        ></i>

                    </div>

                `;

            }



            // =================================================
            // HTML ITEM
            // =================================================

            row.innerHTML = `

                <div class="col-md-4 d-flex align-items-center">

                    ${gambarHTML}

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
                        class="form-control form-control-sm qty-input"
                        min="1"
                        max="${item.stok}"
                        value="${item.qty}"
                        data-index="${index}"
                    >

                    <small class="text-muted">
                        Stok: ${item.stok}
                    </small>

                </div>



                <div class="col-md-2">

                    <small class="text-muted">
                        Subtotal
                    </small>

                    <div class="fw-bold">
                        ${rupiah(subtotal)}
                    </div>

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



                <!-- DATA YANG DIKIRIM KE CONTROLLER -->

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



        // =====================================================
        // UPDATE TOTAL
        // =====================================================

        cartCount.textContent =
            totalQty;


        grandTotal.textContent =
            rupiah(total);


        totalHidden.value =
            total;



        // =====================================================
        // EVENT JUMLAH
        // =====================================================

        document
            .querySelectorAll('.qty-input')
            .forEach(function (input) {


                input.addEventListener(
                    'change',
                    function () {


                        const index =
                            parseInt(
                                this.dataset.index
                            );


                        let qty =
                            parseInt(
                                this.value
                            );


                        if (
                            isNaN(qty) ||
                            qty < 1
                        ) {

                            qty = 1;

                        }



                        // Tidak boleh lebih dari stok
                        if (
                            qty >
                            cart[index].stok
                        ) {

                            alert(
                                'Jumlah melebihi stok. Stok tersedia hanya ' +
                                cart[index].stok
                            );


                            qty =
                                cart[index].stok;

                        }



                        cart[index].qty =
                            qty;


                        renderCart();

                    }
                );

            });



        // =====================================================
        // EVENT HAPUS
        // =====================================================

        document
            .querySelectorAll('.remove-item')
            .forEach(function (button) {


                button.addEventListener(
                    'click',
                    function () {


                        const index =
                            parseInt(
                                this.dataset.index
                            );


                        cart.splice(
                            index,
                            1
                        );


                        renderCart();

                    }
                );

            });

    }



    // =========================================================
    // TAMBAH KE CART
    // =========================================================

    function addToCart(product) {


        const existing =
            cart.find(function (item) {

                return (
                    item.id === product.id &&
                    item.tipe === product.tipe
                );

            });



        // =====================================================
        // PRODUK SUDAH ADA
        // =====================================================

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

                return false;

            }


            existing.qty += 1;

        }



        // =====================================================
        // PRODUK BARU
        // =====================================================

        else {


            cart.push({

                id:
                    product.id,

                nama:
                    product.nama,

                harga:
                    product.harga,

                gambar:
                    product.gambar,

                tipe:
                    product.tipe,

                stok:
                    product.stok,

                qty:
                    1

            });

        }



        renderCart();

        return true;

    }



    // =========================================================
    // SEMUA TOMBOL TAMBAH
    // =========================================================

    document
        .querySelectorAll('.add-to-cart')
        .forEach(function (button) {


            button.addEventListener(
                'click',
                function () {


                    const product = {

                        id:
                            parseInt(
                                this.dataset.id
                            ),

                        nama:
                            this.dataset.nama,

                        harga:
                            parseInt(
                                this.dataset.harga
                            ),

                        gambar:
                            this.dataset.gambar ||
                            '',

                        tipe:
                            this.dataset.tipe,

                        stok:
                            parseInt(
                                this.dataset.stok
                            ) || 0

                    };



                    // Kalau stok 0
                    if (
                        product.stok <= 0
                    ) {

                        alert(
                            'Produk ' +
                            product.nama +
                            ' sedang habis.'
                        );

                        return;

                    }



                    const berhasil =
                        addToCart(product);



                    // =================================================
                    // EFEK TOMBOL
                    // =================================================

                    if (berhasil) {


                        const original =
                            this.innerHTML;


                        this.innerHTML =
                            '<i class="bi bi-check-circle"></i> Ditambahkan';


                        this.classList.remove(
                            'btn-primary'
                        );


                        this.classList.add(
                            'btn-success'
                        );



                        const currentButton =
                            this;


                        setTimeout(
                            function () {


                                currentButton.innerHTML =
                                    original;


                                currentButton.classList.remove(
                                    'btn-success'
                                );


                                currentButton.classList.add(
                                    'btn-primary'
                                );


                            },
                            800
                        );

                    }

                }
            );

        });



    // =========================================================
    // KOSONGKAN CART
    // =========================================================

    clearCartButton.addEventListener(
        'click',
        function () {


            if (
                cart.length === 0
            ) {

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

        }
    );



    // =========================================================
    // FILTER
    // =========================================================

    document
        .querySelectorAll('.filter-btn')
        .forEach(function (button) {


            button.addEventListener(
                'click',
                function () {


                    const filter =
                        this.dataset.filter;



                    document
                        .querySelectorAll('.product-item')
                        .forEach(function (item) {


                            const tipe =
                                item.dataset.tipe;



                            if (
                                filter === 'all' ||
                                tipe === filter
                            ) {

                                item.style.display =
                                    '';

                            } else {

                                item.style.display =
                                    'none';

                            }

                        });

                }
            );

        });



    // =========================================================
    // SEARCH
    // =========================================================

    document
        .getElementById('searchProduct')
        .addEventListener(
            'input',
            function () {


                const keyword =
                    this.value
                        .toLowerCase()
                        .trim();



                document
                    .querySelectorAll('.product-item')
                    .forEach(function (item) {


                        const nama =
                            item.dataset.nama;



                        if (
                            nama.includes(keyword)
                        ) {

                            item.style.display =
                                '';

                        } else {

                            item.style.display =
                                'none';

                        }

                    });

            }
        );



    // =========================================================
    // CEK SEBELUM SIMPAN
    // =========================================================

    document
        .querySelector('form')
        .addEventListener(
            'submit',
            function (event) {


                if (
                    cart.length === 0
                ) {


                    event.preventDefault();


                    alert(
                        'Silakan tambahkan minimal 1 produk ke keranjang terlebih dahulu.'
                    );


                    return;

                }



                // Pastikan total diperbarui
                renderCart();

            }
        );



    // =========================================================
    // JALANKAN SAAT HALAMAN DIBUKA
    // =========================================================

    renderCart();


});

</script>

@endsection