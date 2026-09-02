@extends('layouts.user')

@section('title', 'Buat Pesanan')

@section('content')

<div class="container-fluid py-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 style="color:#6b4c4c; font-weight:700; margin-bottom:5px;">
                <i class="bi bi-cart-plus me-2"
                   style="color:#d4758a;"></i>

                Buat Pesanan
            </h3>

            <p class="text-muted mb-0">
                Pilih bouquet dan aksesoris yang kamu inginkan.
            </p>
        </div>

        <a href="{{ route('user.pesanan.index') }}"
           class="btn"
           style="
                background:#f5e6e9;
                color:#6b4c4c;
                border-radius:10px;
                font-weight:600;
           ">

            <i class="bi bi-arrow-left me-1"></i>
            Kembali
        </a>

    </div>


    {{-- SUCCESS --}}
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">
            <i class="bi bi-check-circle me-2"></i>

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>
        </div>

    @endif


    {{-- ERROR --}}
    @if(session('error'))

        <div class="alert alert-danger alert-dismissible fade show">
            <i class="bi bi-exclamation-circle me-2"></i>

            {{ session('error') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>
        </div>

    @endif


    {{-- VALIDATION ERROR --}}
    @if($errors->any())

        <div class="alert alert-danger">

            <div class="fw-bold mb-2">
                <i class="bi bi-exclamation-triangle me-2"></i>
                Periksa kembali data pesanan.
            </div>

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif



    <form action="{{ route('user.pesanan.store') }}"
          method="POST">

        @csrf


        <div class="row g-4">


            {{-- =====================================================
                 KIRI
                 ===================================================== --}}

            <div class="col-lg-8">

                {{-- PILIH BOUQUET --}}
                <div class="card border-0 shadow-sm mb-4"
                     style="border-radius:16px;">

                    <div class="card-body p-4">

                        <div class="mb-4">

                            <h5 class="fw-bold mb-1"
                                style="color:#6b4c4c;">

                                <i class="bi bi-flower1 me-2"
                                   style="color:#d4758a;"></i>

                                Pilih Bouquet
                            </h5>

                            <small class="text-muted">
                                Pilih satu kategori bouquet.
                            </small>

                        </div>


                        @if($kategoriBouquets->count() > 0)

                            <div class="row g-3">

                                @foreach($kategoriBouquets as $kategori)

                                    <div class="col-md-6">

                                        <label class="w-100"
                                               style="cursor:pointer;">

                                            <input
                                                type="radio"
                                                name="kategori_bouquet_id"
                                                value="{{ $kategori->id }}"
                                                class="d-none bouquet-radio"
                                                data-harga="{{ $kategori->harga ?? 0 }}"
                                                required
                                                {{ old('kategori_bouquet_id') == $kategori->id ? 'checked' : '' }}
                                            >


                                            <div class="bouquet-card p-3"
                                                 style="
                                                    border:2px solid #eee;
                                                    border-radius:14px;
                                                    transition:.2s;
                                                 ">

                                                {{-- GAMBAR --}}
                                                @if(!empty($kategori->gambar))

                                                    <img
                                                        src="{{ asset('storage/' . $kategori->gambar) }}"
                                                        alt="{{ $kategori->nama ?? 'Bouquet' }}"
                                                        style="
                                                            width:100%;
                                                            height:180px;
                                                            object-fit:cover;
                                                            border-radius:10px;
                                                        "
                                                    >

                                                @else

                                                    <div
                                                        class="d-flex align-items-center justify-content-center"
                                                        style="
                                                            width:100%;
                                                            height:180px;
                                                            background:#f8eef0;
                                                            border-radius:10px;
                                                        "
                                                    >

                                                        <i class="bi bi-flower1"
                                                           style="
                                                              font-size:50px;
                                                              color:#d4758a;
                                                           ">
                                                        </i>

                                                    </div>

                                                @endif


                                                <div class="mt-3">

                                                    <h6 class="fw-bold mb-1"
                                                        style="color:#6b4c4c;">

                                                        {{ $kategori->nama ?? $kategori->nama_kategori ?? 'Bouquet' }}

                                                    </h6>


                                                    <div
                                                        class="fw-bold"
                                                        style="color:#d4758a;"
                                                    >

                                                        Rp
                                                        {{ number_format($kategori->harga ?? 0, 0, ',', '.') }}

                                                    </div>


                                                    @if(isset($kategori->stok))

                                                        <small class="text-muted">

                                                            Stok:
                                                            {{ $kategori->stok }}

                                                        </small>

                                                    @endif

                                                </div>

                                            </div>

                                        </label>

                                    </div>

                                @endforeach

                            </div>

                        @else

                            <div class="text-center py-5">

                                <i class="bi bi-flower1"
                                   style="
                                       font-size:50px;
                                       color:#d4758a;
                                   ">
                                </i>

                                <h6 class="mt-3 fw-bold">
                                    Belum ada bouquet
                                </h6>

                                <p class="text-muted mb-0">
                                    Saat ini belum tersedia bouquet.
                                </p>

                            </div>

                        @endif

                    </div>

                </div>



                {{-- AKSESORIS --}}
                <div class="card border-0 shadow-sm"
                     style="border-radius:16px;">

                    <div class="card-body p-4">

                        <div class="mb-4">

                            <h5 class="fw-bold mb-1"
                                style="color:#6b4c4c;">

                                <i class="bi bi-gift me-2"
                                   style="color:#d4758a;"></i>

                                Tambah Aksesoris
                            </h5>

                            <small class="text-muted">
                                Pilih aksesoris tambahan jika diperlukan.
                            </small>

                        </div>


                        @if($aksesoris->count() > 0)

                            <div class="row g-3">

                                @foreach($aksesoris as $item)

                                    <div class="col-md-6">

                                        <label class="w-100"
                                               style="cursor:pointer;">

                                            <input
                                                type="checkbox"
                                                name="aksesoris_id[]"
                                                value="{{ $item->id }}"
                                                class="d-none aksesoris-checkbox"
                                                data-harga="{{ $item->harga ?? 0 }}"
                                                {{ in_array($item->id, old('aksesoris_id', [])) ? 'checked' : '' }}
                                            >


                                            <div class="aksesoris-card p-3"
                                                 style="
                                                    border:2px solid #eee;
                                                    border-radius:14px;
                                                    transition:.2s;
                                                 ">

                                                @if(!empty($item->gambar))

                                                    <img
                                                        src="{{ asset('storage/' . $item->gambar) }}"
                                                        alt="{{ $item->nama ?? 'Aksesoris' }}"
                                                        style="
                                                            width:100%;
                                                            height:150px;
                                                            object-fit:cover;
                                                            border-radius:10px;
                                                        "
                                                    >

                                                @else

                                                    <div
                                                        class="d-flex align-items-center justify-content-center"
                                                        style="
                                                            width:100%;
                                                            height:150px;
                                                            background:#f8eef0;
                                                            border-radius:10px;
                                                        "
                                                    >

                                                        <i class="bi bi-gift"
                                                           style="
                                                              font-size:45px;
                                                              color:#d4758a;
                                                           ">
                                                        </i>

                                                    </div>

                                                @endif


                                                <div class="mt-3">

                                                    <h6 class="fw-bold mb-1"
                                                        style="color:#6b4c4c;">

                                                        {{ $item->nama ?? $item->nama_aksesoris ?? 'Aksesoris' }}

                                                    </h6>


                                                    <div
                                                        class="fw-bold"
                                                        style="color:#d4758a;"
                                                    >

                                                        Rp
                                                        {{ number_format($item->harga ?? 0, 0, ',', '.') }}

                                                    </div>


                                                    @if(isset($item->stok))

                                                        <small class="text-muted">

                                                            Stok:
                                                            {{ $item->stok }}

                                                        </small>

                                                    @endif

                                                </div>

                                            </div>

                                        </label>

                                    </div>

                                @endforeach

                            </div>

                        @else

                            <div class="text-center py-4">

                                <i class="bi bi-gift"
                                   style="
                                       font-size:45px;
                                       color:#d4758a;
                                   ">
                                </i>

                                <p class="text-muted mt-3 mb-0">
                                    Belum ada aksesoris tersedia.
                                </p>

                            </div>

                        @endif

                    </div>

                </div>

            </div>



            {{-- =====================================================
                 KANAN
                 ===================================================== --}}

            <div class="col-lg-4">

                <div class="card border-0 shadow-sm"
                     style="
                        border-radius:16px;
                        position:sticky;
                        top:20px;
                     ">

                    <div class="card-body p-4">

                        <h5 class="fw-bold mb-4"
                            style="color:#6b4c4c;">

                            <i class="bi bi-clipboard-check me-2"
                               style="color:#d4758a;"></i>

                            Detail Pesanan

                        </h5>


                        {{-- ALAMAT --}}
                        <div class="mb-3">

                            <label class="form-label fw-semibold">

                                Alamat

                            </label>

                            <textarea
                                name="alamat"
                                class="form-control"
                                rows="3"
                                placeholder="Masukkan alamat lengkap..."
                                required
                                style="border-radius:10px;"
                            >{{ old('alamat') }}</textarea>

                        </div>


                        {{-- TANGGAL PEMESANAN --}}
                        <div class="mb-3">

                            <label class="form-label fw-semibold">

                                Tanggal Pemesanan

                            </label>

                            <input
                                type="date"
                                name="tanggal_pemesanan"
                                class="form-control"
                                value="{{ old('tanggal_pemesanan', date('Y-m-d')) }}"
                                required
                                style="border-radius:10px;"
                            >

                        </div>


                        {{-- TANGGAL PENGEMBALIAN --}}
                        <div class="mb-3">

                            <label class="form-label fw-semibold">

                                Tanggal Pengembalian

                            </label>

                            <input
                                type="date"
                                name="tanggal_pengembalian"
                                class="form-control"
                                value="{{ old('tanggal_pengembalian') }}"
                                required
                                style="border-radius:10px;"
                            >

                        </div>


                        {{-- CATATAN --}}
                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                Catatan
                                <small class="text-muted">
                                    (opsional)
                                </small>

                            </label>

                            <textarea
                                name="catatan"
                                class="form-control"
                                rows="3"
                                placeholder="Contoh: warna bunga pink..."
                                style="border-radius:10px;"
                            >{{ old('catatan') }}</textarea>

                        </div>


                        {{-- TOTAL --}}
                        <div
                            class="p-3 mb-4"
                            style="
                                background:#fff4f6;
                                border-radius:12px;
                            "
                        >

                            <div class="d-flex justify-content-between">

                                <span class="fw-semibold">
                                    Total Harga
                                </span>

                                <strong
                                    id="totalHarga"
                                    style="
                                        color:#d4758a;
                                        font-size:18px;
                                    "
                                >
                                    Rp 0
                                </strong>

                            </div>

                        </div>


                        {{-- SUBMIT --}}
                        <button
                            type="submit"
                            class="btn w-100"
                            style="
                                background:#d4758a;
                                color:white;
                                border:none;
                                border-radius:10px;
                                padding:12px;
                                font-weight:600;
                            "
                        >

                            <i class="bi bi-cart-check me-2"></i>

                            Buat Pesanan

                        </button>


                        <a
                            href="{{ route('user.dashboard') }}"
                            class="btn w-100 mt-2"
                            style="
                                background:#f5e6e9;
                                color:#6b4c4c;
                                border:none;
                                border-radius:10px;
                                padding:11px;
                                font-weight:600;
                            "
                        >

                            Batal

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </form>

</div>



{{-- =========================================================
     STYLE
     ========================================================= --}}

<style>

    .bouquet-radio:checked + .bouquet-card {
        border-color: #d4758a !important;
        background: #fff7f8;
        box-shadow: 0 4px 15px rgba(212,117,138,.15);
    }

    .aksesoris-checkbox:checked + .aksesoris-card {
        border-color: #d4758a !important;
        background: #fff7f8;
        box-shadow: 0 4px 15px rgba(212,117,138,.15);
    }

    .bouquet-card:hover,
    .aksesoris-card:hover {
        border-color: #d4758a !important;
        transform: translateY(-2px);
    }

</style>



{{-- =========================================================
     JAVASCRIPT
     ========================================================= --}}

<script>

document.addEventListener('DOMContentLoaded', function () {

    const bouquetRadios =
        document.querySelectorAll('.bouquet-radio');

    const aksesorisCheckboxes =
        document.querySelectorAll('.aksesoris-checkbox');

    const totalHarga =
        document.getElementById('totalHarga');


    function hitungTotal() {

        let total = 0;


        // BOUQUET
        bouquetRadios.forEach(function (radio) {

            if (radio.checked) {

                total += parseFloat(
                    radio.dataset.harga || 0
                );

            }

        });


        // AKSESORIS
        aksesorisCheckboxes.forEach(function (checkbox) {

            if (checkbox.checked) {

                total += parseFloat(
                    checkbox.dataset.harga || 0
                );

            }

        });


        totalHarga.innerText =
            'Rp ' +
            new Intl.NumberFormat('id-ID').format(total);

    }


    bouquetRadios.forEach(function (radio) {

        radio.addEventListener(
            'change',
            hitungTotal
        );

    });


    aksesorisCheckboxes.forEach(function (checkbox) {

        checkbox.addEventListener(
            'change',
            hitungTotal
        );

    });


    hitungTotal();

});

</script>

@endsection