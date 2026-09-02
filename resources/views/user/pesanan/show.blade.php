@extends('layouts.user')

@section('title', 'Pesanan Anda')

@section('content')

<style>
    /* =====================================================
       PESANAN ANDA
       ===================================================== */

    .pesanan-page {
        padding: 10px 0 30px;
    }

    /* =====================================================
       ALERT
       ===================================================== */

    .pesanan-alert {
        border: none;
        border-radius: 12px;
        padding: 13px 18px;
        margin-bottom: 24px;
        font-size: 14px;
        box-shadow: 0 3px 10px rgba(107, 76, 76, 0.05);
    }

    /* =====================================================
       HEADER
       ===================================================== */

    .pesanan-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 25px;
    }

    .pesanan-header-left {
        min-width: 0;
    }

    .pesanan-title {
        display: flex;
        align-items: center;
        gap: 10px;
        margin: 0 0 6px;
        color: #6b4c4c;
        font-size: 26px;
        font-weight: 700;
        line-height: 1.3;
    }

    .pesanan-title i {
        color: #d4758a;
        font-size: 25px;
    }

    .pesanan-subtitle {
        margin: 0;
        color: #918888;
        font-size: 14px;
    }

    .pesanan-back-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        padding: 9px 17px;
        border: none;
        border-radius: 9px;
        background: #6b4c4c;
        color: #ffffff;
        font-size: 14px;
        font-weight: 500;
        text-decoration: none;
        white-space: nowrap;
        transition: all 0.2s ease;
    }

    .pesanan-back-btn:hover {
        background: #563b3b;
        color: #ffffff;
        transform: translateY(-1px);
    }

    /* =====================================================
       CARD
       ===================================================== */

    .pesanan-card {
        border: 1px solid #eee5e5;
        border-radius: 14px;
        background: #ffffff;
        box-shadow: 0 3px 12px rgba(107, 76, 76, 0.06);
        overflow: hidden;
    }

    .pesanan-card-body {
        padding: 22px;
    }

    /* =====================================================
       STATUS PESANAN
       ===================================================== */

    .pesanan-status-card {
        margin-bottom: 24px;
    }

    .pesanan-status-item {
        padding: 2px 10px;
    }

    .pesanan-label {
        display: block;
        margin-bottom: 6px;
        color: #918888;
        font-size: 12px;
        font-weight: 500;
    }

    .pesanan-number {
        margin: 0;
        color: #6b4c4c;
        font-size: 19px;
        font-weight: 700;
    }

    .pesanan-status-badge {
        display: inline-flex;
        align-items: center;
        padding: 6px 13px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }

    /* =====================================================
       CONTENT
       ===================================================== */

    .pesanan-content {
        align-items: stretch;
    }

    .pesanan-column {
        display: flex;
        flex-direction: column;
    }

    /* =====================================================
       CARD HEADER
       ===================================================== */

    .pesanan-card-header {
        display: flex;
        align-items: center;
        gap: 9px;
        padding: 16px 20px;
        border-bottom: 1px solid #eee5e5;
        background: #faf5f5;
    }

    .pesanan-card-header i {
        color: #d4758a;
        font-size: 18px;
    }

    .pesanan-card-header h5 {
        margin: 0;
        color: #6b4c4c;
        font-size: 16px;
        font-weight: 700;
    }

    /* =====================================================
       DATA PEMESAN
       ===================================================== */

    .pesanan-info-card {
        margin-bottom: 20px;
    }

    .pesanan-info {
        margin: 0;
    }

    .pesanan-info-item {
        padding-bottom: 14px;
        margin-bottom: 14px;
        border-bottom: 1px solid #f0eaea;
    }

    .pesanan-info-item:last-child {
        padding-bottom: 0;
        margin-bottom: 0;
        border-bottom: none;
    }

    .pesanan-info-label {
        display: block;
        margin-bottom: 4px;
        color: #918888;
        font-size: 12px;
        font-weight: 500;
    }

    .pesanan-info-value {
        margin: 0;
        color: #514848;
        font-size: 14px;
        line-height: 1.5;
        word-break: break-word;
    }

    /* =====================================================
       TANGGAL
       ===================================================== */

    .pesanan-date-item {
        margin-bottom: 18px;
    }

    .pesanan-date-item:last-child {
        margin-bottom: 0;
    }

    .pesanan-date-label {
        display: block;
        margin-bottom: 5px;
        color: #918888;
        font-size: 12px;
        font-weight: 500;
    }

    .pesanan-date-value {
        color: #514848;
        font-size: 14px;
        font-weight: 600;
    }

    .pesanan-date-empty {
        color: #aaa1a1;
        font-size: 14px;
        font-style: italic;
    }

    /* =====================================================
       DETAIL PRODUK
       ===================================================== */

    .pesanan-product-card {
        height: 100%;
    }

    .pesanan-product-list {
        margin: 0;
    }

    .pesanan-product-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        padding: 17px 0;
        border-bottom: 1px solid #eee8e8;
    }

    .pesanan-product-item:first-child {
        padding-top: 2px;
    }

    .pesanan-product-item:last-child {
        border-bottom: none;
    }

    .pesanan-product-info {
        min-width: 0;
    }

    .pesanan-product-name {
        display: block;
        margin-bottom: 5px;
        color: #5e4848;
        font-size: 14px;
        font-weight: 700;
    }

    .pesanan-product-detail {
        color: #918888;
        font-size: 12px;
    }

    .pesanan-product-price {
        flex-shrink: 0;
        color: #d4758a;
        font-size: 14px;
        font-weight: 700;
        white-space: nowrap;
    }

    /* =====================================================
       EMPTY PRODUCT
       ===================================================== */

    .pesanan-empty {
        padding: 40px 20px;
        text-align: center;
        color: #aaa1a1;
    }

    .pesanan-empty i {
        display: block;
        margin-bottom: 10px;
        font-size: 34px;
    }

    .pesanan-empty p {
        margin: 0;
        font-size: 13px;
    }

    /* =====================================================
       TOTAL
       ===================================================== */

    .pesanan-total {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        margin-top: 18px;
        padding-top: 18px;
        border-top: 2px solid #f1e8e8;
    }

    .pesanan-total-label {
        margin: 0;
        color: #6b4c4c;
        font-size: 16px;
        font-weight: 700;
    }

    .pesanan-total-price {
        margin: 0;
        color: #d4758a;
        font-size: 21px;
        font-weight: 700;
        white-space: nowrap;
    }

    /* =====================================================
       TABLET
       ===================================================== */

    @media (max-width: 991.98px) {

        .pesanan-page {
            padding-top: 5px;
        }

        .pesanan-title {
            font-size: 23px;
        }

        .pesanan-card-body {
            padding: 20px;
        }

        .pesanan-product-item {
            gap: 15px;
        }
    }

    /* =====================================================
       MOBILE
       ===================================================== */

    @media (max-width: 767.98px) {

        .pesanan-page {
            padding: 5px 0 25px;
        }

        .pesanan-header {
            align-items: flex-start;
            flex-direction: column;
            margin-bottom: 20px;
        }

        .pesanan-title {
            font-size: 21px;
        }

        .pesanan-title i {
            font-size: 21px;
        }

        .pesanan-subtitle {
            font-size: 13px;
        }

        .pesanan-back-btn {
            width: 100%;
        }

        .pesanan-status-card {
            margin-bottom: 18px;
        }

        .pesanan-status-item {
            padding: 0;
        }

        .pesanan-status-item + .pesanan-status-item {
            margin-top: 18px;
        }

        .pesanan-card-body {
            padding: 17px;
        }

        .pesanan-card-header {
            padding: 14px 17px;
        }

        .pesanan-card-header h5 {
            font-size: 15px;
        }

        .pesanan-info-card {
            margin-bottom: 18px;
        }

        .pesanan-product-item {
            align-items: flex-start;
            flex-direction: column;
            gap: 7px;
        }

        .pesanan-product-price {
            align-self: flex-end;
        }

        .pesanan-total {
            align-items: flex-start;
            flex-direction: column;
            gap: 6px;
        }

        .pesanan-total-price {
            font-size: 19px;
        }
    }

    /* =====================================================
       SMALL MOBILE
       ===================================================== */

    @media (max-width: 400px) {

        .pesanan-title {
            font-size: 19px;
        }

        .pesanan-card-body {
            padding: 15px;
        }

        .pesanan-card-header {
            padding: 13px 15px;
        }

        .pesanan-total-price {
            font-size: 18px;
        }
    }
</style>


<div class="container-fluid pesanan-page">

    {{-- SUCCESS MESSAGE --}}
    @if (session('success'))

        <div class="alert alert-success pesanan-alert">
            <i class="bi bi-check-circle me-1"></i>
            {{ session('success') }}
        </div>

    @endif


    {{-- HEADER --}}
    <div class="pesanan-header">

        <div class="pesanan-header-left">

            <h3 class="pesanan-title">
                <i class="bi bi-receipt"></i>
                Pesanan Anda
            </h3>

            <p class="pesanan-subtitle">
                Detail pesanan yang kamu buat.
            </p>

        </div>


        <a
            href="{{ route('user.dashboard') }}"
            class="pesanan-back-btn"
        >
            <i class="bi bi-arrow-left"></i>
            Dashboard
        </a>

    </div>


    {{-- STATUS PESANAN --}}
    <div class="pesanan-card pesanan-status-card">

        <div class="pesanan-card-body">

            <div class="row">

                {{-- NOMOR PESANAN --}}
                <div class="col-md-6 pesanan-status-item">

                    <span class="pesanan-label">
                        Nomor Pesanan
                    </span>

                    <h5 class="pesanan-number">
                        #{{ $pemesanan->id }}
                    </h5>

                </div>


                {{-- STATUS --}}
                <div class="col-md-6 pesanan-status-item">

                    <span class="pesanan-label">
                        Status
                    </span>

                    <div>

                        @if ($pemesanan->status === 'pending')

                            <span class="badge bg-warning text-dark pesanan-status-badge">
                                Pending
                            </span>

                        @elseif ($pemesanan->status === 'diproses')

                            <span class="badge bg-info pesanan-status-badge">
                                Sedang Diproses
                            </span>

                        @elseif ($pemesanan->status === 'selesai')

                            <span class="badge bg-success pesanan-status-badge">
                                Selesai
                            </span>

                        @else

                            <span class="badge bg-secondary pesanan-status-badge">
                                {{ ucfirst($pemesanan->status) }}
                            </span>

                        @endif

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- CONTENT --}}
    <div class="row g-4 pesanan-content">


        {{-- =========================
             KOLOM KIRI
             ========================= --}}
        <div class="col-lg-4 pesanan-column">


            {{-- DATA PEMESAN --}}
            <div class="pesanan-card pesanan-info-card">

                <div class="pesanan-card-header">

                    <i class="bi bi-person"></i>

                    <h5>
                        Data Pemesan
                    </h5>

                </div>


                <div class="pesanan-card-body">

                    <div class="pesanan-info">


                        {{-- NAMA --}}
                        <div class="pesanan-info-item">

                            <span class="pesanan-info-label">
                                Nama
                            </span>

                            <p class="pesanan-info-value">
                                {{ $pemesanan->customer->nama }}
                            </p>

                        </div>


                        {{-- EMAIL --}}
                        <div class="pesanan-info-item">

                            <span class="pesanan-info-label">
                                Email
                            </span>

                            <p class="pesanan-info-value">
                                {{ $pemesanan->customer->email }}
                            </p>

                        </div>


                        {{-- NOMOR HP --}}
                        <div class="pesanan-info-item">

                            <span class="pesanan-info-label">
                                Nomor HP
                            </span>

                            <p class="pesanan-info-value">
                                {{ $pemesanan->customer->nomor_hp }}
                            </p>

                        </div>


                        {{-- ALAMAT --}}
                        <div class="pesanan-info-item">

                            <span class="pesanan-info-label">
                                Alamat
                            </span>

                            <p class="pesanan-info-value">
                                {{ $pemesanan->alamat }}
                            </p>

                        </div>


                    </div>

                </div>

            </div>


            {{-- TANGGAL --}}
            <div class="pesanan-card">

                <div class="pesanan-card-header">

                    <i class="bi bi-calendar"></i>

                    <h5>
                        Tanggal
                    </h5>

                </div>


                <div class="pesanan-card-body">


                    {{-- TANGGAL PESANAN --}}
                    <div class="pesanan-date-item">

                        <span class="pesanan-date-label">
                            Tanggal Pesanan
                        </span>

                        <span class="pesanan-date-value">
                            {{ $pemesanan->tanggal_pemesanan->format('d-m-Y') }}
                        </span>

                    </div>


                    {{-- TANGGAL PENGAMBILAN --}}
                    <div class="pesanan-date-item">

                        <span class="pesanan-date-label">
                            Tanggal Pengambilan
                        </span>


                        @if ($pemesanan->tanggal_pengembalian)

                            <span class="pesanan-date-value">
                                {{ $pemesanan->tanggal_pengembalian->format('d-m-Y') }}
                            </span>

                        @else

                            <span class="pesanan-date-empty">
                                Belum ditentukan
                            </span>

                        @endif

                    </div>


                </div>

            </div>

        </div>


        {{-- =========================
             KOLOM KANAN
             ========================= --}}
        <div class="col-lg-8 pesanan-column">

            <div class="pesanan-card pesanan-product-card">


                {{-- HEADER DETAIL PRODUK --}}
                <div class="pesanan-card-header">

                    <i class="bi bi-cart"></i>

                    <h5>
                        Detail Produk
                    </h5>

                </div>


                <div class="pesanan-card-body">

                    <div class="pesanan-product-list">


                        {{-- DETAIL PRODUK --}}
                        @forelse ($pemesanan->details as $detail)

                            <div class="pesanan-product-item">


                                {{-- INFORMASI PRODUK --}}
                                <div class="pesanan-product-info">

                                    <span class="pesanan-product-name">

                                        @if ($detail->item_type === 'bouquet')

                                            Bouquet

                                        @else

                                            Aksesoris

                                        @endif

                                    </span>


                                    <span class="pesanan-product-detail">

                                        Jumlah {{ $detail->jumlah }}

                                        ×

                                        Rp
                                        {{ number_format(
                                            $detail->harga_satuan,
                                            0,
                                            ',',
                                            '.'
                                        ) }}

                                    </span>

                                </div>


                                {{-- SUBTOTAL --}}
                                <strong class="pesanan-product-price">

                                    Rp
                                    {{ number_format(
                                        $detail->subtotal,
                                        0,
                                        ',',
                                        '.'
                                    ) }}

                                </strong>


                            </div>

                        @empty


                            {{-- JIKA TIDAK ADA PRODUK --}}
                            <div class="pesanan-empty">

                                <i class="bi bi-cart-x"></i>

                                <p>
                                    Belum ada detail produk.
                                </p>

                            </div>


                        @endforelse


                    </div>


                    {{-- TOTAL --}}
                    <div class="pesanan-total">

                        <h5 class="pesanan-total-label">
                            Total
                        </h5>

                        <h4 class="pesanan-total-price">

                            Rp
                            {{ number_format(
                                $pemesanan->total_harga,
                                0,
                                ',',
                                '.'
                            ) }}

                        </h4>

                    </div>


                </div>

            </div>

        </div>

    </div>

</div>

@endsection