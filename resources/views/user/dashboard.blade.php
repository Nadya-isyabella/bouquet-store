@extends('layouts.user')

@section('title', 'Hallo!')

@push('styles')
<style>
    /* =========================================================
       USER DASHBOARD - OPTIMIZED
       ========================================================= */

    .user-page {
        padding: 25px 30px;
    }

    /* HEADER */
    .page-header {
        margin-bottom: 22px;
    }

    .page-title {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 24px;
        font-weight: 700;
        color: #2c3e50;
        margin: 0 0 6px;
        line-height: 1.3;
    }

    .page-subtitle {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 14px;
        color: #7f8c8d;
        margin: 0;
        line-height: 1.5;
    }

    /* =========================================================
       GRID
       ========================================================= */

    .aksesoris-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 18px;

        /* Browser tidak perlu merender bagian yang jauh di bawah */
        content-visibility: auto;
        contain-intrinsic-size: 800px;
    }

    /* =========================================================
       CARD
       ========================================================= */

    .aksesoris-card {
        background: #fff;
        border: 1px solid #e9ecef;
        border-radius: 12px;
        overflow: hidden;
        min-width: 0;

        display: flex;
        flex-direction: column;

        /* Hindari efek berat */
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
    }

    /* =========================================================
       IMAGE
       ========================================================= */

    .aksesoris-image {
        width: 100%;
        height: 180px;
        background: #f7f7f7;
        overflow: hidden;
        position: relative;
    }

    .aksesoris-image img {
        display: block;
        width: 100%;
        height: 180px;

        object-fit: cover;

        /* Penting untuk CLS */
        aspect-ratio: 5 / 3;

        /* Browser bisa merender gambar lebih efisien */
        contain: layout paint;
    }

    .image-empty {
        width: 100%;
        height: 180px;

        display: flex;
        align-items: center;
        justify-content: center;

        color: #c9c9c9;
        font-size: 40px;
    }

    /* =========================================================
       BODY
       ========================================================= */

    .aksesoris-body {
        padding: 14px;
        min-height: 108px;

        display: flex;
        flex-direction: column;
        flex: 1;
    }

    .aksesoris-name {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 15px;
        font-weight: 600;
        color: #2c3e50;

        margin-bottom: 6px;

        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;

        line-height: 1.4;
    }

    .aksesoris-price {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 17px;
        font-weight: 700;
        color: #e67e22;

        margin-bottom: 9px;
        line-height: 1.3;
    }

    .aksesoris-stock {
        margin-top: auto;

        display: flex;
        align-items: center;
        gap: 5px;

        font-family: Arial, Helvetica, sans-serif;
        font-size: 12px;
        color: #7f8c8d;

        line-height: 1.3;
    }

    .stock-icon {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #27ae60;
        flex-shrink: 0;
    }

    .stock-empty {
        color: #e74c3c;
    }

    .stock-empty .stock-icon {
        background: #e74c3c;
    }

    /* =========================================================
       EMPTY DATA
       ========================================================= */

    .empty-data {
        background: #fff;
        border: 1px solid #e9ecef;
        border-radius: 12px;

        padding: 50px 20px;
        text-align: center;
    }

    .empty-icon {
        font-size: 40px;
        color: #cfcfcf;
        margin-bottom: 12px;
    }

    .empty-data p {
        font-family: Arial, Helvetica, sans-serif;
        margin: 0;
        color: #888;
        font-size: 14px;
    }

    /* =========================================================
       TABLET
       ========================================================= */

    @media (max-width: 1100px) {
        .aksesoris-grid {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }
    }

    /* =========================================================
       TABLET KECIL
       ========================================================= */

    @media (max-width: 800px) {
        .user-page {
            padding: 20px;
        }

        .aksesoris-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
        }

        .aksesoris-image,
        .aksesoris-image img {
            height: 160px;
        }
    }

    /* =========================================================
       HP
       ========================================================= */

    @media (max-width: 500px) {
        .user-page {
            padding: 15px;
        }

        .page-title {
            font-size: 21px;
        }

        .page-subtitle {
            font-size: 13px;
        }

        .aksesoris-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 12px;
        }

        .aksesoris-image,
        .aksesoris-image img {
            height: 130px;
        }

        .aksesoris-body {
            padding: 10px;
            min-height: 96px;
        }

        .aksesoris-name {
            font-size: 13px;
            margin-bottom: 5px;
        }

        .aksesoris-price {
            font-size: 14px;
            margin-bottom: 7px;
        }

        .aksesoris-stock {
            font-size: 10px;
        }
    }

    /* =========================================================
       HP SANGAT KECIL
       ========================================================= */

    @media (max-width: 360px) {
        .user-page {
            padding: 12px;
        }

        .aksesoris-grid {
            gap: 10px;
        }

        .aksesoris-image,
        .aksesoris-image img {
            height: 115px;
        }

        .aksesoris-body {
            padding: 9px;
        }

        .aksesoris-name {
            font-size: 12px;
        }

        .aksesoris-price {
            font-size: 13px;
        }

        .aksesoris-stock {
            font-size: 9px;
        }
    }
</style>
@endpush


@section('content')

<div class="user-page">

    {{-- =====================================================
         HEADER
         ===================================================== --}}

    <div class="page-header">
        <h3 class="page-title">Aksesoris</h3>

        <p class="page-subtitle">
            Lengkapi bouquet-mu dengan aksesoris pilihan.
        </p>
    </div>


    {{-- =====================================================
         DATA AKSESORIS
         ===================================================== --}}

    @if($aksesoris->count() > 0)

        <div class="aksesoris-grid">

            @foreach($aksesoris as $item)

                <div class="aksesoris-card">

                    {{-- =================================================
                         GAMBAR
                         ================================================= --}}

                    <div class="aksesoris-image">

                        @if($item->gambar)

                            @if($loop->first)

                                {{-- 
                                    GAMBAR PERTAMA:
                                    Ini biasanya menjadi kandidat LCP.
                                    Jangan lazy karena gambar pertama harus
                                    segera dimuat.
                                --}}

                                <img
                                    src="{{ asset('storage/' . $item->gambar) }}"
                                    alt="{{ $item->nama }}"
                                    width="300"
                                    height="180"
                                    fetchpriority="high"
                                    decoding="async"
                                >

                            @else

                                {{-- 
                                    GAMBAR LAIN:
                                    Lazy loading supaya browser tidak
                                    langsung download semua gambar.
                                --}}

                                <img
                                    src="{{ asset('storage/' . $item->gambar) }}"
                                    alt="{{ $item->nama }}"
                                    width="300"
                                    height="180"
                                    loading="lazy"
                                    decoding="async"
                                >

                            @endif

                        @else

                            <div class="image-empty">
                                <span>🎁</span>
                            </div>

                        @endif

                    </div>


                    {{-- =================================================
                         INFORMASI PRODUK
                         ================================================= --}}

                    <div class="aksesoris-body">

                        <div
                            class="aksesoris-name"
                            title="{{ $item->nama }}"
                        >
                            {{ $item->nama }}
                        </div>


                        <div class="aksesoris-price">
                            Rp {{ number_format($item->harga, 0, ',', '.') }}
                        </div>


                        {{-- =================================================
                             STOK
                             ================================================= --}}

                        @if($item->stok > 0)

                            <div class="aksesoris-stock">

                                <span class="stock-icon"></span>

                                <span>
                                    Stok: {{ $item->stok }}
                                </span>

                            </div>

                        @else

                            <div class="aksesoris-stock stock-empty">

                                <span class="stock-icon"></span>

                                <span>
                                    Stok habis
                                </span>

                            </div>

                        @endif

                    </div>

                </div>

            @endforeach

        </div>

    @else

        {{-- =====================================================
             DATA KOSONG
             ===================================================== --}}

        <div class="empty-data">

            <div class="empty-icon">
                🎁
            </div>

            <p>
                Belum ada aksesoris tersedia.
            </p>

        </div>

    @endif

</div>

@endsection