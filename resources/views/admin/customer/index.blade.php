@extends('layouts.main')

@section('title', 'Data Customer')

@section('content')

<style>

    /* =========================
       CARD
    ========================= */
    .card {
        border: none;
        border-radius: 24px;
        box-shadow: 0 10px 30px rgba(200, 150, 150, 0.15);
        background: #ffffff;
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
        letter-spacing: 0.5px;
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
       KOLOM AKSI
       DIBUAT LEBIH KECIL
    ========================= */
    .action-column {
        width: 105px;
        min-width: 105px;
        max-width: 105px;
        text-align: center;
        white-space: nowrap;
    }


    /* =========================
       TOMBOL AKSI
    ========================= */
    .action-buttons {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
    }

    .action-btn {
        width: 42px;
        height: 42px;

        padding: 0 !important;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        border-radius: 13px;

        border: none !important;

        font-size: 17px;

        transition: all 0.2s ease;

        flex-shrink: 0;
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
        transform: translateY(-2px);
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
        color: #ffffff !important;
        transform: translateY(-2px);
    }


    /* =========================
       ICON
    ========================= */
    .action-btn i {
        margin: 0 !important;
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
       TEXT
    ========================= */
    .text-secondary {
        color: #b59595 !important;
    }


    /* =========================
       ICON DATA KOSONG
    ========================= */
    .bi-people {
        color: #d4b8b8 !important;
    }


    /* =========================
       RESPONSIVE
    ========================= */
    @media (max-width: 768px) {

        .action-column {
            width: 95px;
            min-width: 95px;
            max-width: 95px;
        }

        .action-buttons {
            gap: 5px;
        }

        .action-btn {
            width: 38px;
            height: 38px;
            border-radius: 11px;
            font-size: 16px;
        }

    }

</style>


<div class="container-fluid">


    {{-- =========================
         TOMBOL TAMBAH CUSTOMER
    ========================= --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <a href="{{ route('admin.customer.create') }}"
           class="btn btn-primary">

            <i class="bi bi-plus-lg"></i>

            Tambah Customer

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
         CARD DATA CUSTOMER
    ========================= --}}
    <div class="card shadow-sm">


        {{-- HEADER --}}
        <div class="card-header">

            <h3 class="card-title">

                Daftar Customer

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

                            <th>Nama</th>

                            <th>Alamat</th>

                            <th>Nomor HP</th>

                            <th>Email</th>

                            <th class="action-column">

                                Aksi

                            </th>

                        </tr>

                    </thead>


                    {{-- =========================
                         BODY TABLE
                    ========================= --}}
                    <tbody>


                        @forelse($customers as $customer)

                            <tr>


                                {{-- NO --}}
                                <td>

                                    {{ $loop->iteration }}

                                </td>


                                {{-- NAMA --}}
                                <td>

                                    {{ $customer->nama }}

                                </td>


                                {{-- ALAMAT --}}
                                <td>

                                    {{ $customer->alamat }}

                                </td>


                                {{-- NOMOR HP --}}
                                <td>

                                    {{ $customer->nomor_hp }}

                                </td>


                                {{-- EMAIL --}}
                                <td>

                                    {{ $customer->email }}

                                </td>


                                {{-- =========================
                                     AKSI
                                ========================= --}}
                                <td class="action-column">


                                    <div class="action-buttons">


                                        {{-- EDIT --}}
                                        <a href="{{ route(
                                            'admin.customer.edit',
                                            $customer->id
                                        ) }}"
                                           class="action-btn btn-edit"
                                           title="Edit Customer">

                                            <i class="bi bi-pencil"></i>

                                        </a>


                                        {{-- HAPUS --}}
                                        <form action="{{ route(
                                            'admin.customer.destroy',
                                            $customer->id
                                        ) }}"
                                              method="POST"
                                              onsubmit="return confirm(
                                                  'Yakin ingin menghapus customer ini?'
                                              )">

                                            @csrf

                                            @method('DELETE')


                                            <button type="submit"
                                                    class="action-btn btn-delete"
                                                    title="Hapus Customer">

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

                                <td colspan="6"
                                    class="text-center py-5">

                                    <i class="bi bi-people fs-1"></i>

                                    <p class="mt-3 mb-0 text-secondary">

                                        Belum ada data customer.

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