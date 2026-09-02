@extends('layouts.user')

@section('title', 'Riwayat Pesanan')
@section('page-title', 'Riwayat Pesanan')

@section('content')

<style>

    .riwayat-page {
        width: 100%;
    }

    /* HEADER */
    .riwayat-header {
        margin-bottom: 25px;
    }

    .riwayat-title {
        margin: 0;
        color: #6b4c4c;
        font-size: 28px;
        font-weight: 700;
    }

    .riwayat-title i {
        color: #d4758a;
        margin-right: 8px;
    }

    .riwayat-description {
        margin-top: 7px;
        color: #999;
        font-size: 14px;
        margin-bottom: 0;
    }

    /* CARD */
    .riwayat-card {
        background: #ffffff;
        border: 1px solid #eee5e5;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 3px 12px rgba(107, 76, 76, 0.06);
    }

    .riwayat-card-header {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 18px 22px;
        background: #faf5f5;
        border-bottom: 1px solid #eee5e5;
    }

    .riwayat-card-header i {
        color: #d4758a;
        font-size: 20px;
    }

    .riwayat-card-header h5 {
        margin: 0;
        color: #6b4c4c;
        font-size: 17px;
        font-weight: 700;
    }

    /* ITEM RIWAYAT */
    .riwayat-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 25px;
        padding: 22px;
        border-bottom: 1px solid #f1ebeb;
        transition: background 0.2s ease;
    }

    .riwayat-item:last-child {
        border-bottom: none;
    }

    .riwayat-item:hover {
        background: #fffafa;
    }

    /* KIRI */
    .riwayat-left {
        min-width: 0;
    }

    .riwayat-label {
        color: #999;
        font-size: 12px;
        margin-bottom: 5px;
    }

    .riwayat-date {
        color: #6b4c4c;
        font-size: 15px;
        font-weight: 600;
    }

    /* KANAN */
    .riwayat-right {
        display: flex;
        align-items: center;
        gap: 30px;
        flex-shrink: 0;
    }

    .riwayat-price {
        color: #d4758a;
        font-size: 17px;
        font-weight: 700;
        white-space: nowrap;
    }

    /* STATUS */
    .riwayat-status {
        min-width: 120px;
        text-align: center;
    }

    .status-selesai {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
        padding: 8px 15px;
        border-radius: 20px;
        background: #d1e7dd;
        color: #0f5132;
        font-size: 12px;
        font-weight: 600;
        white-space: nowrap;
    }

    /* DETAIL */
    .riwayat-detail {
        padding: 18px 22px;
        background: #fffafa;
        border-bottom: 1px solid #f1ebeb;
    }

    .detail-title {
        color: #6b4c4c;
        font-size: 13px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .detail-item {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        background: #faf0f3;
        color: #6b4c4c;
        padding: 7px 11px;
        border-radius: 8px;
        margin-right: 7px;
        margin-bottom: 5px;
        font-size: 12px;
    }

    .detail-item span {
        color: #999;
    }

    /* EMPTY */
    .riwayat-empty {
        padding: 65px 20px;
        text-align: center;
    }

    .riwayat-empty i {
        display: block;
        margin-bottom: 14px;
        color: #d4b8b8;
        font-size: 48px;
    }

    .riwayat-empty h5 {
        margin-bottom: 7px;
        color: #6b4c4c;
        font-size: 17px;
        font-weight: 700;
    }

    .riwayat-empty p {
        margin: 0;
        color: #999;
        font-size: 13px;
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {

        .riwayat-title {
            font-size: 23px;
        }

        .riwayat-item {
            align-items: flex-start;
            flex-direction: column;
            gap: 15px;
        }

        .riwayat-right {
            width: 100%;
            justify-content: space-between;
        }

        .riwayat-status {
            min-width: auto;
        }

    }

    @media (max-width: 480px) {

        .riwayat-right {
            align-items: flex-start;
            flex-direction: column;
            gap: 10px;
        }

        .riwayat-status {
            text-align: left;
        }

    }

</style>


<div class="riwayat-page">

    {{-- =====================================================
        HEADER
    ====================================================== --}}

    <div class="riwayat-header">

        <h2 class="riwayat-title">

            <i class="bi bi-clock-history"></i>

            Riwayat Pesanan

        </h2>

        <p class="riwayat-description">
            Daftar pesanan yang sudah selesai.
        </p>

    </div>


    {{-- =====================================================
        RIWAYAT
    ====================================================== --}}

    <div class="riwayat-card">

        {{-- HEADER CARD --}}

        <div class="riwayat-card-header">

            <i class="bi bi-receipt"></i>

            <h5>
                Pesanan Selesai
            </h5>

        </div>


        {{-- BODY --}}

        @forelse($riwayat as $pesanan)

            {{-- PESANAN --}}

            <div class="riwayat-item">

                {{-- KIRI --}}

                <div class="riwayat-left">

                    <div class="riwayat-label">
                        Tanggal Pemesanan
                    </div>

                    <div class="riwayat-date">

                        @if($pesanan->tanggal_pemesanan)

                            {{ \Carbon\Carbon::parse(
                                $pesanan->tanggal_pemesanan
                            )->format('d-m-Y') }}

                        @else

                            {{ $pesanan->created_at
                                ? $pesanan->created_at->format('d-m-Y')
                                : '-'
                            }}

                        @endif

                    </div>

                </div>


                {{-- KANAN --}}

                <div class="riwayat-right">

                    {{-- TOTAL --}}

                    <div class="riwayat-price">

                        Rp
                        {{ number_format(
                            $pesanan->total_harga ?? 0,
                            0,
                            ',',
                            '.'
                        ) }}

                    </div>


                    {{-- STATUS --}}

                    <div class="riwayat-status">

                        <span class="status-selesai">

                            <i class="bi bi-check-circle"></i>

                            Selesai

                        </span>

                    </div>

                </div>

            </div>


            {{-- =================================================
                DETAIL PESANAN
            ================================================== --}}

            @if($pesanan->details && $pesanan->details->count() > 0)

                <div class="riwayat-detail">

                    <div class="detail-title">

                        <i class="bi bi-flower1 me-1"
                           style="color:#d4758a;"></i>

                        Detail Pesanan

                    </div>


                    <div>

                        @foreach($pesanan->details as $detail)

                            <div class="detail-item">

                                {{ $detail->item->nama
                                    ?? $detail->item->nama_bouquet
                                    ?? $detail->item->nama_aksesoris
                                    ?? 'Produk'
                                }}

                                <span>
                                    × {{ $detail->jumlah ?? 1 }}
                                </span>

                            </div>

                        @endforeach

                    </div>

                </div>

            @endif


        @empty

            {{-- TIDAK ADA RIWAYAT --}}

            <div class="riwayat-empty">

                <i class="bi bi-clock-history"></i>

                <h5>
                    Belum Ada Riwayat
                </h5>

                <p>
                    Pesanan yang sudah selesai akan muncul di sini.
                </p>

            </div>

        @endforelse

    </div>

</div>

@endsection