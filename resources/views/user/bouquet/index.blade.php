@extends('layouts.user')

@section('title', 'Status Bouquet')

@section('page-title', 'Status Bouquet')

@section('content')

<style>
    /* =====================================================
       HALAMAN UTAMA
    ====================================================== */

    .bouquet-page {
        width: 100%;
    }

    .bouquet-header {
        margin-bottom: 25px;
    }

    .bouquet-title {
        margin: 0;
        color: #6b4c4c;
        font-size: 28px;
        font-weight: 700;
    }

    .bouquet-title i {
        color: #d4758a;
        margin-right: 8px;
    }

    .bouquet-description {
        margin-top: 7px;
        margin-bottom: 0;
        color: #999;
        font-size: 14px;
    }

    /* =====================================================
       CARD PESANAN
    ====================================================== */

    .bouquet-card {
        background: #ffffff;
        border: 1px solid #eee5e5;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(107, 76, 76, 0.07);
    }

    .bouquet-card-header {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 20px 25px;
        background: #faf5f5;
        border-bottom: 1px solid #eee5e5;
    }

    .bouquet-card-header i {
        color: #d4758a;
        font-size: 22px;
    }

    .bouquet-card-header h5 {
        margin: 0;
        color: #6b4c4c;
        font-size: 18px;
        font-weight: 700;
    }

    /* =====================================================
       ISI PESANAN
    ====================================================== */

    .bouquet-body {
        width: 100%;
    }

    .order-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 40px;
        padding: 25px;
        border-bottom: 1px solid #f1ebeb;
        transition: background 0.2s ease;
    }

    .order-item:last-child {
        border-bottom: none;
    }

    .order-item:hover {
        background: #fffafa;
    }

    /* =====================================================
       BAGIAN KIRI
    ====================================================== */

    .order-left {
        flex: 1;
        min-width: 0;
    }

    .order-info {
        display: flex;
        align-items: center;
        gap: 45px;
    }

    .date-info {
        min-width: 180px;
    }

    .date-label {
        display: block;
        margin-bottom: 6px;
        color: #a58d8d;
        font-size: 12px;
        font-weight: 500;
    }

    .date-value {
        color: #6b4c4c;
        font-size: 15px;
        font-weight: 600;
    }

    .date-value i {
        color: #d4758a;
        margin-right: 6px;
    }

    /* =====================================================
       BAGIAN KANAN
    ====================================================== */

    .order-right {
        display: flex;
        align-items: center;
        gap: 35px;
        flex-shrink: 0;
    }

    .order-price-box {
        min-width: 160px;
        text-align: right;
    }

    .price-label {
        display: block;
        margin-bottom: 5px;
        color: #a58d8d;
        font-size: 12px;
    }

    .order-price {
        color: #d4758a;
        font-size: 18px;
        font-weight: 700;
        white-space: nowrap;
    }

    .order-status {
        min-width: 170px;
        text-align: center;
    }

    /* =====================================================
       STATUS
    ====================================================== */

    .status-label {
        display: block;
        margin-bottom: 5px;
        color: #a58d8d;
        font-size: 12px;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        padding: 8px 16px;
        border-radius: 25px;
        font-size: 12px;
        font-weight: 600;
        white-space: nowrap;
    }

    .status-pending {
        background: #fff3cd;
        color: #856404;
    }

    .status-diproses {
        background: #cff4fc;
        color: #087990;
    }

    .status-selesai {
        background: #d1e7dd;
        color: #0f5132;
    }

    .status-batal {
        background: #f8d7da;
        color: #842029;
    }

    .status-default {
        background: #e9ecef;
        color: #495057;
    }

    /* =====================================================
       EMPTY
    ====================================================== */

    .bouquet-empty {
        padding: 70px 20px;
        text-align: center;
    }

    .bouquet-empty i {
        display: block;
        margin-bottom: 15px;
        color: #d4b8b8;
        font-size: 48px;
    }

    .bouquet-empty h5 {
        margin-bottom: 7px;
        color: #6b4c4c;
        font-size: 17px;
        font-weight: 700;
    }

    .bouquet-empty p {
        margin: 0;
        color: #999;
        font-size: 13px;
    }

    /* =====================================================
       RESPONSIVE TABLET
    ====================================================== */

    @media (max-width: 992px) {
        .order-item {
            gap: 25px;
        }

        .order-info {
            gap: 25px;
        }

        .date-info {
            min-width: 150px;
        }

        .order-right {
            gap: 20px;
        }

        .order-price-box {
            min-width: 140px;
        }

        .order-status {
            min-width: 150px;
        }
    }

    /* =====================================================
       RESPONSIVE HP
    ====================================================== */

    @media (max-width: 768px) {
        .bouquet-title {
            font-size: 23px;
        }

        .bouquet-card-header {
            padding: 18px 20px;
        }

        .order-item {
            align-items: flex-start;
            flex-direction: column;
            gap: 20px;
            padding: 22px 20px;
        }

        .order-left {
            width: 100%;
        }

        .order-info {
            width: 100%;
            gap: 20px;
            flex-wrap: wrap;
        }

        .date-info {
            min-width: 150px;
        }

        .order-right {
            width: 100%;
            justify-content: space-between;
            gap: 15px;
        }

        .order-price-box {
            min-width: auto;
            text-align: left;
        }

        .order-status {
            min-width: auto;
            text-align: right;
        }
    }

    /* =====================================================
       RESPONSIVE HP KECIL
    ====================================================== */

    @media (max-width: 480px) {
        .bouquet-title {
            font-size: 21px;
        }

        .bouquet-description {
            font-size: 13px;
        }

        .order-info {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }

        .date-info {
            min-width: 100%;
        }

        .order-right {
            align-items: flex-start;
            flex-direction: column;
            width: 100%;
        }

        .order-price-box {
            width: 100%;
            text-align: left;
        }

        .order-status {
            width: 100%;
            text-align: left;
        }
    }
</style>


<div class="bouquet-page">

    {{-- HEADER --}}
    <div class="bouquet-header">

        <h2 class="bouquet-title">
            <i class="bi bi-flower1"></i>
            Status Bouquet
        </h2>

        <p class="bouquet-description">
            Lihat perkembangan pesanan bouquet kamu.
        </p>

    </div>


    {{-- CARD PESANAN --}}
    <div class="bouquet-card">

        {{-- HEADER CARD --}}
        <div class="bouquet-card-header">

            <i class="bi bi-receipt"></i>

            <h5>
                Pesanan Saya
            </h5>

        </div>


        {{-- BODY --}}
        <div class="bouquet-body">

            @forelse ($pemesanans as $pemesanan)

                <div
                    class="order-item"
                    data-order-id="{{ $pemesanan->id }}"
                >

                    {{-- INFORMASI TANGGAL --}}
                    <div class="order-left">

                        <div class="order-info">

                            {{-- TANGGAL PEMESANAN --}}
                            <div class="date-info">

                                <span class="date-label">
                                    Tanggal Pemesanan
                                </span>

                                <div class="date-value">

                                    <i class="bi bi-calendar-event"></i>

                                    @if ($pemesanan->tanggal_pemesanan)

                                        {{ \Carbon\Carbon::parse(
                                            $pemesanan->tanggal_pemesanan
                                        )->format('d-m-Y') }}

                                    @else

                                        -

                                    @endif

                                </div>

                            </div>


                            {{-- TANGGAL PENGAMBILAN --}}
                            <div class="date-info">

                                <span class="date-label">
                                    Tanggal Pengambilan
                                </span>

                                <div class="date-value">

                                    <i class="bi bi-calendar-check"></i>

                                    @if ($pemesanan->tanggal_pengembalian)

                                        {{ \Carbon\Carbon::parse(
                                            $pemesanan->tanggal_pengembalian
                                        )->format('d-m-Y') }}

                                    @else

                                        -

                                    @endif

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- HARGA + STATUS --}}
                    <div class="order-right">

                        {{-- TOTAL HARGA --}}
                        <div class="order-price-box">

                            <span class="price-label">
                                Total Pesanan
                            </span>

                            <div class="order-price">

                                Rp
                                {{ number_format(
                                    $pemesanan->total_harga ?? 0,
                                    0,
                                    ',',
                                    '.'
                                ) }}

                            </div>

                        </div>


                        {{-- STATUS --}}
                        <div class="order-status">

                            <span class="status-label">
                                Status
                            </span>


                            @if (
                                $pemesanan->status === 'pending' ||
                                $pemesanan->status === 'baru'
                            )

                                <span class="status-badge status-pending">

                                    <i class="bi bi-clock"></i>

                                    Menunggu Diproses

                                </span>


                            @elseif ($pemesanan->status === 'diproses')

                                <span class="status-badge status-diproses">

                                    <i class="bi bi-arrow-repeat"></i>

                                    Sedang Diproses

                                </span>


                            @elseif ($pemesanan->status === 'selesai')

                                <span class="status-badge status-selesai">

                                    <i class="bi bi-check-circle"></i>

                                    Selesai

                                </span>


                            @elseif ($pemesanan->status === 'batal')

                                <span class="status-badge status-batal">

                                    <i class="bi bi-x-circle"></i>

                                    Dibatalkan

                                </span>


                            @else

                                <span class="status-badge status-default">

                                    {{ ucfirst(
                                        $pemesanan->status ?? 'Belum Ada Status'
                                    ) }}

                                </span>

                            @endif

                        </div>

                    </div>

                </div>

            @empty

                {{-- BELUM ADA PESANAN --}}
                <div class="bouquet-empty">

                    <i class="bi bi-flower1"></i>

                    <h5>
                        Belum Ada Pesanan
                    </h5>

                    <p>
                        Pesanan yang kamu buat akan muncul di sini.
                    </p>

                </div>

            @endforelse

        </div>

    </div>

</div>

@endsection
