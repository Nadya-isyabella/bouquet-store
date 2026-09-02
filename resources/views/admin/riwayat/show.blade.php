@extends('layouts.main')

@section('title', 'Detail Riwayat Pemesanan')

@section('content')

<style>
    .riwayat-detail {
        padding: 10px 5px 40px;
    }

    .page-title {
        color: #6b4c4c;
        font-size: 24px;
        font-weight: 600;
        margin: 0;
    }

    .page-subtitle {
        color: #777;
        font-size: 14px;
        margin-top: 4px;
    }

    .detail-card {
        border: 1px solid #eee5e5;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, .05);
        overflow: hidden;
        background: #fff;
    }

    .detail-header {
        background: #f8e9ec;
        border-bottom: 1px solid #ecd9dd;
        padding: 13px 18px;
    }

    .detail-header h5 {
        margin: 0;
        color: #6b4c4c;
        font-size: 16px;
        font-weight: 600;
    }

    .detail-header i {
        color: #d4758a;
        margin-right: 6px;
    }

    .detail-body {
        padding: 20px;
    }

    .data-item {
        margin-bottom: 16px;
    }

    .data-item:last-child {
        margin-bottom: 0;
    }

    .data-label {
        display: block;
        color: #777;
        font-size: 13px;
        margin-bottom: 5px;
    }

    .data-value {
        color: #333;
        font-size: 14px;
        font-weight: 400;
    }

    .customer-name {
        color: #6b4c4c;
        font-size: 16px;
        font-weight: 600;
    }

    .status-badge {
        display: inline-block;
        padding: 5px 11px;
        border-radius: 15px;
        font-size: 12px;
        font-weight: 500;
    }

    .status-selesai {
        background: #d1e7dd;
        color: #146c43;
    }

    .status-dikembalikan {
        background: #fff3cd;
        color: #997404;
    }

    .status-batal {
        background: #f8d7da;
        color: #b02a37;
    }

    .status-default {
        background: #e9ecef;
        color: #495057;
    }

    .table-detail {
        margin: 0;
    }

    .table-detail thead th {
        background: #faf6f7;
        color: #6b4c4c;
        font-size: 13px;
        font-weight: 600;
        padding: 12px 14px;
        border-bottom: 1px solid #eadfe1;
        white-space: nowrap;
    }

    .table-detail tbody td {
        color: #444;
        font-size: 13px;
        padding: 12px 14px;
        vertical-align: middle;
        border-bottom: 1px solid #f0ebeb;
    }

    .table-detail tbody tr:last-child td {
        border-bottom: none;
    }

    .item-name {
        color: #6b4c4c;
        font-weight: 600;
    }

    .type-badge {
        display: inline-block;
        padding: 4px 9px;
        border-radius: 12px;
        font-size: 11px;
        background: #f3eeee;
        color: #765f5f;
    }

    .total-wrapper {
        display: flex;
        justify-content: flex-end;
        padding: 16px 18px;
        background: #fafafa;
        border-top: 1px solid #eee5e5;
    }

    .total-box {
        width: 320px;
        background: #fff7f8;
        border: 1px solid #f0dfe2;
        border-radius: 9px;
        padding: 12px 15px;
    }

    .total-label {
        color: #6b4c4c;
        font-size: 14px;
        font-weight: 500;
    }

    .total-value {
        color: #d4758a;
        font-size: 19px;
        font-weight: 600;
    }

    .btn-back {
        background: #fff;
        border: 1px solid #d8cdcd;
        color: #6b4c4c;
        border-radius: 7px;
        padding: 8px 15px;
        font-size: 14px;
    }

    .btn-back:hover {
        background: #f8e9ec;
        border-color: #d4758a;
        color: #6b4c4c;
    }

    @media (max-width: 767px) {

        .page-title {
            font-size: 20px;
        }

        .header-detail {
            align-items: flex-start !important;
            gap: 12px;
        }

        .total-box {
            width: 100%;
        }

        .total-wrapper {
            justify-content: stretch;
        }
    }
</style>


<div class="container-fluid riwayat-detail">

    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="d-flex justify-content-between align-items-center mb-4 header-detail">

        <div>

            <h3 class="page-title">
                <i class="bi bi-receipt me-1"
                   style="color:#d4758a;"></i>

                Detail Riwayat Pemesanan
            </h3>

            <div class="page-subtitle">
                Informasi lengkap mengenai pemesanan customer.
            </div>

        </div>


        <a href="{{ route('admin.riwayat.index') }}"
           class="btn btn-back">

            <i class="bi bi-arrow-left me-1"></i>
            Kembali

        </a>

    </div>


    {{-- =====================================================
         DATA CUSTOMER
    ====================================================== --}}

    <div class="detail-card mb-4">

        <div class="detail-header">

            <h5>
                <i class="bi bi-person"></i>
                Data Customer
            </h5>

        </div>


        <div class="detail-body">

            <div class="row">

                {{-- NAMA --}}

                <div class="col-md-6">

                    <div class="data-item">

                        <span class="data-label">
                            Nama Customer
                        </span>

                        <div class="customer-name">
                            {{ $pemesanan->customer->nama ?? '-' }}
                        </div>

                    </div>

                </div>


                {{-- EMAIL --}}

                <div class="col-md-6">

                    <div class="data-item">

                        <span class="data-label">
                            Email
                        </span>

                        <div class="data-value">

                            {{ $pemesanan->customer->email ?? '-' }}

                        </div>

                    </div>

                </div>


                {{-- NOMOR HP --}}

                <div class="col-md-6">

                    <div class="data-item">

                        <span class="data-label">
                            Nomor HP / WhatsApp
                        </span>

                        <div class="data-value">

                            {{ $pemesanan->customer->nomor_hp ?? '-' }}

                        </div>

                    </div>

                </div>


                {{-- ALAMAT --}}

                <div class="col-md-6">

                    <div class="data-item">

                        <span class="data-label">
                            Alamat Pengiriman
                        </span>

                        <div class="data-value">

                            {{ $pemesanan->alamat ?? '-' }}

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- =====================================================
         INFORMASI PEMESANAN
    ====================================================== --}}

    <div class="detail-card mb-4">

        <div class="detail-header">

            <h5>
                <i class="bi bi-calendar-check"></i>
                Informasi Pemesanan
            </h5>

        </div>


        <div class="detail-body">

            <div class="row">

                {{-- ID --}}

                <div class="col-md-3">

                    <div class="data-item">

                        <span class="data-label">
                            ID Pemesanan
                        </span>

                        <div class="data-value">
                            #{{ $pemesanan->id }}
                        </div>

                    </div>

                </div>


                {{-- TANGGAL PEMESANAN --}}

                <div class="col-md-3">

                    <div class="data-item">

                        <span class="data-label">
                            Tanggal Pemesanan
                        </span>

                        <div class="data-value">

                            @if($pemesanan->tanggal_pemesanan)

                                {{ \Carbon\Carbon::parse(
                                    $pemesanan->tanggal_pemesanan
                                )->format('d/m/Y') }}

                            @else

                                -

                            @endif

                        </div>

                    </div>

                </div>


                {{-- TANGGAL PENGEMBALIAN --}}

                <div class="col-md-3">

                    <div class="data-item">

                        <span class="data-label">
                            Tanggal Pengembalian
                        </span>

                        <div class="data-value">

                            @if($pemesanan->tanggal_pengembalian)

                                {{ \Carbon\Carbon::parse(
                                    $pemesanan->tanggal_pengembalian
                                )->format('d/m/Y') }}

                            @else

                                -

                            @endif

                        </div>

                    </div>

                </div>


                {{-- STATUS --}}

                <div class="col-md-3">

                    <div class="data-item">

                        <span class="data-label">
                            Status Pemesanan
                        </span>

                        @php

                            $status = strtolower(
                                $pemesanan->status ?? ''
                            );

                        @endphp


                        @if($status === 'selesai')

                            <span class="status-badge status-selesai">
                                Selesai
                            </span>

                        @elseif($status === 'dikembalikan')

                            <span class="status-badge status-dikembalikan">
                                Dikembalikan
                            </span>

                        @elseif($status === 'batal')

                            <span class="status-badge status-batal">
                                Batal
                            </span>

                        @else

                            <span class="status-badge status-default">
                                {{ ucfirst($status ?: '-') }}
                            </span>

                        @endif

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- =====================================================
         BARANG YANG DIPESAN
    ====================================================== --}}

    <div class="detail-card mb-4">

        <div class="detail-header">

            <h5>
                <i class="bi bi-bag"></i>
                Barang yang Dipesan
            </h5>

        </div>


        <div class="table-responsive">

            <table class="table table-detail">

                <thead>

                    <tr>

                        <th style="width:50px;">
                            #
                        </th>

                        <th style="width:120px;">
                            Jenis
                        </th>

                        <th>
                            Nama Barang
                        </th>

                        <th class="text-end">
                            Harga Satuan
                        </th>

                        <th class="text-center">
                            Jumlah
                        </th>

                        <th class="text-end">
                            Subtotal
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($pemesanan->details as $index => $detail)

                        @php

                            $namaBarang = '-';

                            if ($detail->item_type === 'bouquet') {

                                $barang =
                                    \App\Models\KategoriBouquet::find(
                                        $detail->item_id
                                    );

                                $namaBarang =
                                    $barang->nama ?? 'Bouquet';

                            }

                            elseif ($detail->item_type === 'aksesoris') {

                                $barang =
                                    \App\Models\Aksesoris::find(
                                        $detail->item_id
                                    );

                                $namaBarang =
                                    $barang->nama ?? 'Aksesoris';

                            }

                        @endphp


                        <tr>

                            <td>
                                {{ $index + 1 }}
                            </td>


                            <td>

                                <span class="type-badge">

                                    {{ ucfirst(
                                        $detail->item_type ?? '-'
                                    ) }}

                                </span>

                            </td>


                            <td>

                                <span class="item-name">
                                    {{ $namaBarang }}
                                </span>

                            </td>


                            <td class="text-end">

                                Rp
                                {{ number_format(
                                    $detail->harga_satuan ?? 0,
                                    0,
                                    ',',
                                    '.'
                                ) }}

                            </td>


                            <td class="text-center">

                                {{ $detail->jumlah ?? 0 }}

                            </td>


                            <td class="text-end">

                                <strong>

                                    Rp
                                    {{ number_format(
                                        $detail->subtotal ?? (
                                            ($detail->harga_satuan ?? 0)
                                            * ($detail->jumlah ?? 0)
                                        ),
                                        0,
                                        ',',
                                        '.'
                                    ) }}

                                </strong>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6"
                                class="text-center text-muted py-4">

                                <i class="bi bi-inbox"
                                   style="font-size:28px;"></i>

                                <div class="mt-2">
                                    Belum ada detail barang.
                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- TOTAL --}}

        <div class="total-wrapper">

            <div class="total-box">

                <div class="d-flex justify-content-between align-items-center">

                    <span class="total-label">
                        Total Pemesanan
                    </span>

                    <span class="total-value">

                        Rp
                        {{ number_format(
                            $pemesanan->total_harga ?? 0,
                            0,
                            ',',
                            '.'
                        ) }}

                    </span>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
