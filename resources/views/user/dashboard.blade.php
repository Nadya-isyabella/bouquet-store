@extends('layouts.user')

@section('title', 'Hallo!')

@section('content')

<style>
    .user-page {
        padding: 25px 30px;
    }

    /* HEADER */
    .page-header {
        margin-bottom: 25px;
    }

    .page-title {
        font-size: 24px;
        font-weight: 700;
        color: #2c3e50;
        margin: 0 0 6px 0;
    }

    .page-subtitle {
        font-size: 14px;
        color: #7f8c8d;
        margin: 0;
    }

    /* GRID */
    .aksesoris-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 20px;
    }

    /* CARD */
    .aksesoris-card {
        background: #ffffff;
        border: 1px solid #e9ecef;
        border-radius: 12px;
        overflow: hidden;
        height: 100%;
        display: flex;
        flex-direction: column;
        transition: all 0.2s ease;
    }

    .aksesoris-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
    }

    /* GAMBAR */
    .aksesoris-image {
        width: 100%;
        height: 180px;
        background: #f7f7f7;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .aksesoris-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .image-empty {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #c9c9c9;
        font-size: 45px;
    }

    /* BODY */
    .aksesoris-body {
        padding: 15px;
        display: flex;
        flex-direction: column;
        flex: 1;
    }

    .aksesoris-name {
        font-size: 16px;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 7px;

        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .aksesoris-price {
        font-size: 18px;
        font-weight: 700;
        color: #e67e22;
        margin-bottom: 10px;
    }

    .aksesoris-stock {
        margin-top: auto;
        display: flex;
        align-items: center;
        gap: 6px;

        font-size: 13px;
        color: #7f8c8d;
    }

    .aksesoris-stock i {
        font-size: 15px;
    }

    /* STOK HABIS */
    .stock-empty {
        color: #e74c3c;
    }

    /* EMPTY */
    .empty-data {
        background: #ffffff;
        border: 1px solid #e9ecef;
        border-radius: 12px;
        padding: 50px 20px;
        text-align: center;
    }

    .empty-data i {
        font-size: 45px;
        color: #cfcfcf;
        margin-bottom: 12px;
    }

    .empty-data p {
        margin: 0;
        color: #888;
        font-size: 14px;
    }

    /* TABLET */
    @media (max-width: 1100px) {
        .aksesoris-grid {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }
    }

    /* TABLET KECIL */
    @media (max-width: 800px) {
        .user-page {
            padding: 20px;
        }

        .aksesoris-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 15px;
        }

        .aksesoris-image {
            height: 160px;
        }
    }

    /* HP */
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

        .aksesoris-image {
            height: 130px;
        }

        .aksesoris-body {
            padding: 11px;
        }

        .aksesoris-name {
            font-size: 14px;
        }

        .aksesoris-price {
            font-size: 15px;
        }

        .aksesoris-stock {
            font-size: 11px;
        }
    }
</style>

<div class="user-page">

    {{-- HEADER --}}
    <div class="page-header">
        <h3 class="page-title">Aksesoris</h3>

        <p class="page-subtitle">
            Lengkapi bouquet-mu dengan aksesoris pilihan.
        </p>
    </div>


    {{-- DATA AKSESORIS --}}
    @if($aksesoris->count() > 0)

        <div class="aksesoris-grid">

            @foreach($aksesoris as $item)

                <div class="aksesoris-card">

                    {{-- GAMBAR --}}
                    <div class="aksesoris-image">

                        @if($item->gambar)

                            <img
                                src="{{ asset('storage/' . $item->gambar) }}"
                                alt="{{ $item->nama }}"
                            >

                        @else

                            <div class="image-empty">
                                <i class="bi bi-gift"></i>
                            </div>

                        @endif

                    </div>


                    {{-- INFORMASI --}}
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


                        {{-- STOK --}}
                        @if($item->stok > 0)

                            <div class="aksesoris-stock">
                                <i class="bi bi-box-seam"></i>
                                <span>Stok: {{ $item->stok }}</span>
                            </div>

                        @else

                            <div class="aksesoris-stock stock-empty">
                                <i class="bi bi-x-circle"></i>
                                <span>Stok habis</span>
                            </div>

                        @endif

                    </div>

                </div>

            @endforeach

        </div>

    @else

        {{-- JIKA BELUM ADA DATA --}}
        <div class="empty-data">

            <i class="bi bi-gift"></i>

            <p>
                Belum ada aksesoris tersedia.
            </p>

        </div>

    @endif

</div>

@endsection