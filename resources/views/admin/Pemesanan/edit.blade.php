@extends('layouts.main')

@section('title', 'Edit Pemesanan')

@section('content')

<style>

    /* =====================================================
       CARD
    ===================================================== */

    .card {
        border: none;
        border-radius: 24px;
        box-shadow: 0 10px 30px rgba(200,150,150,0.15);
        background: #fff;
        overflow: hidden;
    }


    /* =====================================================
       CARD BODY
    ===================================================== */

    .card-body {
        padding: 2rem 1.8rem;
    }


    /* =====================================================
       CARD FOOTER
    ===================================================== */

    .card-footer {
        background: #fcf7f7;
        border-top: 2px solid #f5e8e8;
        padding: 1.2rem 1.8rem;

        display: flex;
        justify-content: space-between;
        align-items: center;
    }


    /* =====================================================
       FORM
    ===================================================== */

    .form-label {
        color: #6b4c4c;
        font-weight: 600;
    }

    .form-control,
    .form-select {
        border: 2px solid #f0e0e0;
        border-radius: 12px;
        padding: 0.6rem 1rem;
        background-color: #fefcfc;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #d4758a;

        box-shadow:
            0 0 0 0.2rem
            rgba(212,117,138,0.25);
    }


    /* =====================================================
       BUTTON KEMBALI
    ===================================================== */

    .btn-secondary {
        background-color: #d4b8b8 !important;
        border-color: #d4b8b8 !important;
        color: #5a3e3e !important;

        border-radius: 30px;
        padding: 0.5rem 1.8rem;

        font-weight: 500;
    }

    .btn-secondary:hover {
        background-color: #c5a5a5 !important;
        border-color: #c5a5a5 !important;
        color: #4a3030 !important;
    }


    /* =====================================================
       BUTTON UPDATE
    ===================================================== */

    .btn-primary {
        background-color: #a7c7c9 !important;
        border-color: #a7c7c9 !important;
        color: #2d4f4f !important;

        border-radius: 30px;
        padding: 0.5rem 2rem;

        font-weight: 500;
    }

    .btn-primary:hover {
        background-color: #8fb9bb !important;
        border-color: #8fb9bb !important;
        color: #1d3a3a !important;
    }


    /* =====================================================
       ICON
    ===================================================== */

    .bi {
        margin-right: 6px;
    }


    /* =====================================================
       ALERT ERROR
    ===================================================== */

    .alert-danger {
        border-radius: 16px;
        border: none;

        background: #fce8e8;
        color: #8a4a4a;
    }

    .alert-danger ul {
        list-style: none;
        padding-left: 0;
    }

    .alert-danger ul li::before {
        content: "• ";
        color: #d4758a;
    }


    /* =====================================================
       DETAIL PEMESANAN
    ===================================================== */

    .detail-box {
        background: #fcf7f7;
        border: 2px solid #f0e0e0;
        border-radius: 15px;
        padding: 15px;
    }


    /* =====================================================
       PRODUCT BOX
    ===================================================== */

    .product-box {
        background: #fff;
        border: 1px solid #eadede;
        border-radius: 12px;
        padding: 15px;
    }


    /* =====================================================
       STOCK
    ===================================================== */

    .stock-info {
        font-size: 0.85rem;
    }

    .stock-badge {
        display: inline-block;

        background: #e9f5eb;
        color: #347347;

        border-radius: 20px;

        padding: 5px 10px;

        font-size: 0.8rem;
    }


    /* =====================================================
       RESPONSIVE
    ===================================================== */

    @media (max-width: 768px) {

        .card-body {
            padding: 1.5rem 1rem;
        }

        .card-footer {
            padding: 1rem;
            gap: 10px;
        }

        .btn-secondary,
        .btn-primary {
            padding: 0.5rem 1.2rem;
        }

    }

</style>


<div class="container-fluid">


    {{-- =====================================================
         JUDUL HALAMAN
    ===================================================== --}}

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1
            style="
                color:#6b4c4c;
                font-weight:700;
                margin:0;
            "
        >
            Edit Pemesanan
        </h1>

    </div>


    {{-- =====================================================
         ERROR
    ===================================================== --}}

    @if ($errors->any())

        <div class="alert alert-danger mb-4">

            <strong>
                Terjadi kesalahan:
            </strong>

            <ul class="mb-0 mt-2">

                @foreach ($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- =====================================================
         SUCCESS
    ===================================================== --}}

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif


    {{-- =====================================================
         CARD FORM
    ===================================================== --}}

    <div class="card">


        {{-- =================================================
             FORM
        ================================================= --}}

        <form
            action="{{ route(
                'admin.pemesanan.update',
                $pemesanan->id
            ) }}"
            method="POST"
            id="editPemesananForm"
        >

            @csrf

            @method('PUT')


            {{-- =================================================
                 CARD BODY
            ================================================= --}}

            <div class="card-body">


                {{-- =================================================
                     CUSTOMER
                ================================================= --}}

                <div class="mb-4">

                    <label
                        for="customer_id"
                        class="form-label"
                    >
                        Customer
                    </label>

                    <select
                        name="customer_id"
                        id="customer_id"
                        class="form-select @error('customer_id') is-invalid @enderror"
                        required
                    >

                        <option value="">
                            -- Pilih Customer --
                        </option>


                        @foreach($customers as $c)

                            <option
                                value="{{ $c->id }}"

                                {{ old(
                                    'customer_id',
                                    $pemesanan->customer_id
                                ) == $c->id
                                    ? 'selected'
                                    : ''
                                }}
                            >

                                {{ $c->nama }}

                                @if($c->nomor_hp)

                                    -
                                    {{ $c->nomor_hp }}

                                @endif

                            </option>

                        @endforeach

                    </select>


                    @error('customer_id')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- =================================================
                     ALAMAT
                ================================================= --}}

                <div class="mb-4">

                    <label
                        for="alamat"
                        class="form-label"
                    >
                        Alamat
                    </label>

                    <textarea
                        name="alamat"
                        id="alamat"
                        class="form-control @error('alamat') is-invalid @enderror"
                        rows="3"
                        required
                    >{{ old(
                        'alamat',
                        $pemesanan->alamat
                    ) }}</textarea>


                    @error('alamat')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- =================================================
                     TANGGAL PEMESANAN
                ================================================= --}}

                <div class="mb-4">

                    <label
                        for="tanggal_pemesanan"
                        class="form-label"
                    >
                        Tanggal Pemesanan
                    </label>

                    <input
                        type="date"
                        name="tanggal_pemesanan"
                        id="tanggal_pemesanan"

                        class="form-control @error('tanggal_pemesanan') is-invalid @enderror"

                        value="{{ old(
                            'tanggal_pemesanan',

                            $pemesanan->tanggal_pemesanan
                                ? date(
                                    'Y-m-d',
                                    strtotime(
                                        $pemesanan->tanggal_pemesanan
                                    )
                                )
                                : ''
                        ) }}"

                        required
                    >


                    @error('tanggal_pemesanan')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- =================================================
                     TANGGAL PENGAMBILAN
                ================================================= --}}

                <div class="mb-4">

                    <label
                        for="tanggal_pengembalian"
                        class="form-label"
                    >
                        Tanggal Pengambilan
                    </label>

                    <input
                        type="date"
                        name="tanggal_pengembalian"
                        id="tanggal_pengembalian"

                        class="form-control @error('tanggal_pengembalian') is-invalid @enderror"

                        value="{{ old(
                            'tanggal_pengembalian',

                            $pemesanan->tanggal_pengembalian
                                ? date(
                                    'Y-m-d',
                                    strtotime(
                                        $pemesanan->tanggal_pengembalian
                                    )
                                )
                                : ''
                        ) }}"
                    >


                    @error('tanggal_pengembalian')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- =================================================
                     STATUS
                ================================================= --}}

                <div class="mb-4">

                    <label
                        for="status"
                        class="form-label"
                    >
                        Status
                    </label>

                    <select
                        name="status"
                        id="status"
                        class="form-select @error('status') is-invalid @enderror"
                        required
                    >

                        <option
                            value="pending"

                            {{ old(
                                'status',
                                $pemesanan->status
                            ) === 'pending'
                                ? 'selected'
                                : ''
                            }}
                        >
                            Pending
                        </option>


                        <option
                            value="diproses"

                            {{ old(
                                'status',
                                $pemesanan->status
                            ) === 'diproses'
                                ? 'selected'
                                : ''
                            }}
                        >
                            Diproses
                        </option>


                        <option
                            value="selesai"

                            {{ old(
                                'status',
                                $pemesanan->status
                            ) === 'selesai'
                                ? 'selected'
                                : ''
                            }}
                        >
                            Selesai
                        </option>


                        <option
                            value="batal"

                            {{ old(
                                'status',
                                $pemesanan->status
                            ) === 'batal'
                                ? 'selected'
                                : ''
                            }}
                        >
                            Batal
                        </option>

                    </select>


                    @error('status')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- =================================================
                     DETAIL PEMESANAN
                ================================================= --}}

                <div class="mb-4">

                    <label class="form-label">
                        Detail Pemesanan
                    </label>


                    <div class="detail-box">


                        @forelse(
                            $pemesanan->details
                            as $index => $detail
                        )


                            @php

                                $barang = $detail->item;

                                /*
                                |--------------------------------------------------------------------------
                                | STOK MAKSIMAL
                                |--------------------------------------------------------------------------
                                |
                                | Stok database ditambah jumlah
                                | pesanan lama.
                                |
                                */

                                $stokMaksimal =
                                    ($barang->stok ?? 0)
                                    + $detail->jumlah;

                            @endphp


                            <div class="product-box mb-3">


                                <div class="row align-items-center">


                                    {{-- =================================================
                                         NAMA BARANG
                                    ================================================= --}}

                                    <div class="col-md-5">

                                        <strong>

                                            {{ $barang->nama
                                                ?? 'Item dihapus'
                                            }}

                                        </strong>

                                        <br>


                                        <small class="text-muted">

                                            {{ ucfirst(
                                                $detail->item_type
                                            ) }}

                                        </small>

                                        <br>


                                        <small class="text-muted">

                                            Harga satuan:

                                            Rp

                                            {{ number_format(
                                                $detail->harga_satuan,
                                                0,
                                                ',',
                                                '.'
                                            ) }}

                                        </small>

                                    </div>


                                    {{-- =================================================
                                         JUMLAH
                                    ================================================= --}}

                                    <div class="col-md-3">

                                        <label
                                            class="form-label mb-1"
                                        >
                                            Jumlah
                                        </label>

                                        <input
                                            type="number"

                                            name="items[{{ $index }}][jumlah]"

                                            class="form-control quantity-input"

                                            min="1"

                                            max="{{ $stokMaksimal }}"

                                            value="{{ old(
                                                'items.' .
                                                $index .
                                                '.jumlah',

                                                $detail->jumlah
                                            ) }}"

                                            data-max="{{ $stokMaksimal }}"

                                            required
                                        >

                                    </div>


                                    {{-- =================================================
                                         STOK
                                    ================================================= --}}

                                    <div class="col-md-4">

                                        <span class="stock-badge">

                                            Stok tersedia:

                                            {{ $barang->stok ?? 0 }}

                                        </span>

                                        <br>


                                        <small
                                            class="text-muted stock-info"
                                        >

                                            Maksimal jumlah:

                                            <strong>
                                                {{ $stokMaksimal }}
                                            </strong>

                                        </small>

                                    </div>


                                    {{-- =================================================
                                         HIDDEN ITEM TYPE
                                    ================================================= --}}

                                    <input
                                        type="hidden"

                                        name="items[{{ $index }}][item_type]"

                                        value="{{ $detail->item_type }}"
                                    >


                                    {{-- =================================================
                                         HIDDEN ITEM ID
                                    ================================================= --}}

                                    <input
                                        type="hidden"

                                        name="items[{{ $index }}][item_id]"

                                        value="{{ $detail->item_id }}"
                                    >


                                    {{-- =================================================
                                         HIDDEN HARGA
                                    ================================================= --}}

                                    <input
                                        type="hidden"

                                        name="items[{{ $index }}][harga_satuan]"

                                        value="{{ $detail->harga_satuan }}"
                                    >

                                </div>

                            </div>


                        @empty


                            <div class="text-center text-muted py-3">

                                <i
                                    class="bi bi-cart-x"
                                    style="font-size:2rem;"
                                ></i>

                                <br>

                                Belum ada detail pemesanan.

                            </div>


                        @endforelse


                    </div>

                </div>


                {{-- =================================================
                     TOTAL HARGA
                ================================================= --}}

                <div class="mb-3">

                    <label class="form-label">
                        Total Harga
                    </label>


                    <div
                        class="fw-bold"

                        style="
                            font-size:1.4rem;
                            color:#d4758a;
                        "
                    >

                        Rp

                        {{ number_format(
                            $pemesanan->total_harga ?? 0,
                            0,
                            ',',
                            '.'
                        ) }}

                    </div>


                    <small class="text-muted">

                        Total akan dihitung ulang ketika jumlah
                        barang diubah.

                    </small>

                </div>


            </div>


            {{-- =====================================================
                 FOOTER
            ===================================================== --}}

            <div class="card-footer">


                {{-- KEMBALI --}}

                <a
                    href="{{ route(
                        'admin.pemesanan.index'
                    ) }}"
                    class="btn btn-secondary"
                >

                    <i class="bi bi-arrow-left"></i>

                    Kembali

                </a>


                {{-- UPDATE --}}

                <button
                    type="submit"
                    class="btn btn-primary"
                >

                    <i class="bi bi-save"></i>

                    Perbarui Pemesanan

                </button>


            </div>


        </form>

    </div>

</div>


{{-- =========================================================
     JAVASCRIPT
========================================================= --}}

<script>

document.addEventListener(
    'DOMContentLoaded',
    function () {

        const form =
            document.getElementById(
                'editPemesananForm'
            );

        const quantityInputs =
            document.querySelectorAll(
                '.quantity-input'
            );


        /* =====================================================
           BATASI JUMLAH BERDASARKAN STOK
        ===================================================== */

        quantityInputs.forEach(
            function (input) {

                input.addEventListener(
                    'input',
                    function () {

                        const max =
                            parseInt(
                                this.dataset.max
                            );

                        let value =
                            parseInt(
                                this.value
                            );


                        if (
                            isNaN(value) ||
                            value < 1
                        ) {

                            this.value = 1;

                            return;

                        }


                        if (
                            value > max
                        ) {

                            alert(
                                'Jumlah tidak boleh lebih dari ' +
                                max +
                                '.'
                            );

                            this.value = max;

                        }

                    }
                );

            }
        );


        /* =====================================================
           CEK SEBELUM SUBMIT
        ===================================================== */

        form.addEventListener(
            'submit',
            function (event) {

                let valid = true;


                quantityInputs.forEach(
                    function (input) {

                        const max =
                            parseInt(
                                input.dataset.max
                            );

                        const value =
                            parseInt(
                                input.value
                            );


                        if (
                            isNaN(value) ||
                            value < 1 ||
                            value > max
                        ) {

                            valid = false;

                        }

                    }
                );


                if (!valid) {

                    event.preventDefault();

                    alert(
                        'Periksa kembali jumlah barang. Jumlah tidak boleh melebihi stok.'
                    );

                }

            }
        );

    }
);

</script>

@endsection