@extends('layouts.main')

@section('title', 'Data Pemesanan')

@section('content')

<style>

    /* =========================
       CARD
    ========================= */
    .card {
        border: none;
        border-radius: 24px;
        box-shadow: 0 10px 30px rgba(200,150,150,0.15);
        background: #fff;
        overflow: hidden;
    }

    .card-header {
        background: linear-gradient(135deg, #fce4e4, #f8d0d0);
        border-bottom: none;
        padding: 1.2rem 1.8rem;
    }

    .card-header .card-title {
        color: #6b4c4c;
        font-weight: 700;
        font-size: 1.4rem;
        margin: 0;
    }

    .card-body {
        padding: 1.5rem 1.8rem;
    }


    /* =========================
       TABLE
    ========================= */
    .table {
        margin-bottom: 0;
    }

    .table thead th {
        background-color: #f8f0f0;
        color: #6b4c4c;
        font-weight: 600;
        border-bottom: 2px solid #f5e0e0;
        vertical-align: middle;
        white-space: nowrap;
    }

    .table tbody td {
        vertical-align: middle;
        border-color: #f0e6e6;
        color: #5a4a4a;
    }

    .table-hover tbody tr:hover {
        background-color: #fdf6f6;
    }


    /* =========================
       KOLOM AKSI
    ========================= */

    /* Kolom Aksi dibuat lebih kecil */
    .table th:last-child,
    .table td:last-child {
        width: 120px;
        min-width: 120px;
        max-width: 120px;
        text-align: center;
        padding-left: 8px;
        padding-right: 8px;
    }

    .action-buttons {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
    }

    .action-buttons .btn {
        width: 42px;
        height: 42px;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        border-radius: 13px;

        padding: 0;

        font-size: 17px;

        border: none;

        flex-shrink: 0;
    }

    /* Hapus margin icon */
    .action-buttons .bi {
        margin-right: 0;
    }


    /* =========================
       BUTTON TAMBAH
    ========================= */
    .btn-primary {
        background-color: #a7c7c9 !important;
        border-color: #a7c7c9 !important;
        color: #2d4f4f !important;
        border-radius: 30px;
        padding: 0.5rem 1.8rem;
        font-weight: 500;
    }

    .btn-primary:hover {
        background-color: #8fb9bb !important;
        border-color: #8fb9bb !important;
        color: #1d3a3a !important;
    }


    /* =========================
       BUTTON EDIT
    ========================= */
    .btn-edit {
        background-color: #f7c948 !important;
        color: #5a3e3e !important;
    }

    .btn-edit:hover {
        background-color: #f0b82a !important;
        color: #3d2b2b !important;
    }


    /* =========================
       BUTTON HAPUS
    ========================= */
    .btn-delete {
        background-color: #e6717a !important;
        color: #ffffff !important;
    }

    .btn-delete:hover {
        background-color: #d95f69 !important;
    }


    /* =========================
       STATUS
    ========================= */
    .badge-status {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        padding: 0.55rem 1rem;

        border-radius: 30px;

        font-weight: 600;
        font-size: 14px;

        white-space: nowrap;
    }

    .badge-pending {
        background: #f7c948;
        color: #5a3e3e;
    }

    .badge-diproses {
        background: #6ec3d4;
        color: #1f4a5a;
    }

    .badge-selesai {
        background: #7fc29b;
        color: #1f4a38;
    }

    .badge-batal {
        background: #e6717a;
        color: #5a2a2a;
    }


    /* =========================
       ITEM PEMESANAN
    ========================= */
    .item-badge {
        display: inline-block;

        background: #f8f0f0;
        color: #5a4a4a;

        padding: 6px 10px;

        border-radius: 8px;

        font-size: 13px;

        margin-bottom: 4px;
    }


    /* =========================
       ALERT
    ========================= */
    .alert-success {
        border-radius: 16px;
        border: none;
        background: #e0f0ed;
        color: #2d5f5a;
    }


    /* =========================
       EMPTY DATA
    ========================= */
    .text-secondary {
        color: #b59595 !important;
    }

    .bi-clipboard-list {
        color: #d4b8b8 !important;
    }


    /* =========================
       RESPONSIVE
    ========================= */
    @media (max-width: 768px) {

        .table th:last-child,
        .table td:last-child {
            width: 100px;
            min-width: 100px;
            max-width: 100px;
        }

        .action-buttons {
            gap: 5px;
        }

        .action-buttons .btn {
            width: 38px;
            height: 38px;
            border-radius: 11px;
            font-size: 16px;
        }

    }

</style>


<div class="container-fluid">


    {{-- =========================
         TOMBOL TAMBAH
    ========================= --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <a href="{{ route('admin.pemesanan.create') }}"
           class="btn btn-primary">

            <i class="bi bi-plus-lg"></i>

            Tambah Pemesanan

        </a>

    </div>


    {{-- =========================
         SUCCESS MESSAGE
    ========================= --}}
    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif


    {{-- =========================
         CARD PEMESANAN
    ========================= --}}
    <div class="card">


        {{-- HEADER --}}
        <div class="card-header">

            <h3 class="card-title">

                Daftar Pemesanan

            </h3>

        </div>


        {{-- BODY --}}
        <div class="card-body p-0">

            <div class="table-responsive">


                <table class="table table-bordered table-hover mb-0">


                    {{-- =========================
                         HEADER TABLE
                    ========================= --}}
                    <thead>

                        <tr>

                            <th>No</th>

                            <th>Customer</th>

                            <th>Alamat</th>

                            <th>Pemesanan</th>

                            <th>Total</th>

                            <th>Tgl Pemesanan</th>

                            <th>Tgl Pengambilan</th>

                            <th>Status</th>

                            <th>Aksi</th>

                        </tr>

                    </thead>


                    {{-- =========================
                         BODY TABLE
                    ========================= --}}
                    <tbody>


                        @forelse($pemesanans as $p)

                            <tr>


                                {{-- NO --}}
                                <td>

                                    {{ $loop->iteration }}

                                </td>


                                {{-- CUSTOMER --}}
                                <td>

                                    {{ $p->customer->nama ?? '-' }}

                                </td>


                                {{-- ALAMAT --}}
                                <td>

                                    {{ $p->alamat ?? '-' }}

                                </td>


                                {{-- PEMESANAN --}}
                                <td>

                                    @forelse($p->details as $detail)

                                        <span class="item-badge">

                                            {{ ucfirst($detail->item_type) }}:

                                            {{ $detail->item->nama ?? 'Item dihapus' }}

                                            ({{ $detail->jumlah }})

                                        </span>

                                        <br>

                                    @empty

                                        <span class="text-secondary">

                                            Tidak ada item

                                        </span>

                                    @endforelse

                                </td>


                                {{-- TOTAL --}}
                                <td>

                                    Rp
                                    {{ number_format(
                                        $p->total_harga ?? 0,
                                        0,
                                        ',',
                                        '.'
                                    ) }}

                                </td>


                                {{-- TANGGAL PEMESANAN --}}
                                <td>

                                    @if($p->tanggal_pemesanan)

                                        {{ \Carbon\Carbon::parse(
                                            $p->tanggal_pemesanan
                                        )->format('d-m-Y') }}

                                    @else

                                        -

                                    @endif

                                </td>


                                {{-- TANGGAL PENGAMBILAN --}}
                                <td>

                                    @if($p->tanggal_pengembalian)

                                        {{ \Carbon\Carbon::parse(
                                            $p->tanggal_pengembalian
                                        )->format('d-m-Y') }}

                                    @else

                                        -

                                    @endif

                                </td>


                                {{-- STATUS --}}
                                <td>

                                    @php

                                        $statusClass = [

                                            'pending' => 'badge-pending',

                                            'diproses' => 'badge-diproses',

                                            'selesai' => 'badge-selesai',

                                            'batal' => 'badge-batal',

                                        ][$p->status] ?? 'badge-pending';

                                    @endphp


                                    <span class="badge-status {{ $statusClass }}">

                                        {{ ucfirst($p->status ?? 'Pending') }}

                                    </span>

                                </td>


                                {{-- =========================
                                     AKSI
                                ========================= --}}
                                <td>

                                    <div class="action-buttons">


                                        {{-- EDIT --}}
                                        <a href="{{ route(
                                            'admin.pemesanan.edit',
                                            $p->id
                                        ) }}"
                                           class="btn btn-edit"
                                           title="Edit Pemesanan">

                                            <i class="bi bi-pencil"></i>

                                        </a>


                                        {{-- HAPUS --}}
                                        <form action="{{ route(
                                            'admin.pemesanan.destroy',
                                            $p->id
                                        ) }}"
                                              method="POST"
                                              onsubmit="return confirm(
                                                  'Yakin hapus pemesanan ini?'
                                              )">

                                            @csrf

                                            @method('DELETE')


                                            <button type="submit"
                                                    class="btn btn-delete"
                                                    title="Hapus Pemesanan">

                                                <i class="bi bi-trash"></i>

                                            </button>

                                        </form>


                                    </div>

                                </td>


                            </tr>


                        @empty


                            {{-- =========================
                                 DATA KOSONG
                            ========================= --}}
                            <tr>

                                <td colspan="9"
                                    class="text-center py-5">

                                    <i class="bi bi-clipboard-list fs-1"></i>


                                    <p class="mt-3 mb-0 text-secondary">

                                        Belum ada pemesanan.

                                    </p>

                                </td>

                            </tr>


                        @endforelse


                    </tbody>


                </table>

            </div>

        </div>

    </div>


</div>

@endsection