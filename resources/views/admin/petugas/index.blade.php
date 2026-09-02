@extends('layouts.main')

@section('title', 'Data Petugas')

@section('content')

<style>

    /* =====================================================
       CARD
    ===================================================== */

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


    /* =====================================================
       TABLE
    ===================================================== */

    .table {
        margin-bottom: 0;
        width: 100%;
    }

    .table thead th {
        background-color: #f8f0f0;
        color: #6b4c4c;
        font-weight: 600;
        border-bottom: 2px solid #f5e0e0;
        padding: 0.8rem 1rem;
        vertical-align: middle;
        white-space: nowrap;
    }

    .table tbody td {
        vertical-align: middle;
        border-color: #f0e6e6;
        color: #5a4a4a;
        padding: 0.8rem 1rem;
    }

    .table-hover tbody tr:hover {
        background-color: #fdf6f6;
    }


    /* =====================================================
       KOLOM AKSI
    ===================================================== */

    .action-column {
        width: 115px !important;
        min-width: 115px !important;
        max-width: 115px !important;
        text-align: center;
        white-space: nowrap;
    }

    .action-buttons {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
    }

    .action-buttons .btn {
        width: 44px;
        height: 44px;

        min-width: 44px;
        min-height: 44px;

        padding: 0 !important;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        border-radius: 14px;

        border: none !important;

        font-size: 18px;

        line-height: 1;

        transition: all 0.2s ease;
    }

    .action-buttons .bi {
        margin: 0 !important;
        padding: 0 !important;
    }


    /* =====================================================
       TOMBOL EDIT
    ===================================================== */

    .btn-edit {
        background-color: #f7c948 !important;
        border-color: #f7c948 !important;
        color: #5a3e3e !important;
    }

    .btn-edit:hover {
        background-color: #f0b82a !important;
        border-color: #f0b82a !important;
        color: #3d2b2b !important;
        transform: translateY(-2px);
    }


    /* =====================================================
       TOMBOL HAPUS
    ===================================================== */

    .btn-delete {
        background-color: #e6717a !important;
        border-color: #e6717a !important;
        color: #ffffff !important;
    }

    .btn-delete:hover {
        background-color: #d95f69 !important;
        border-color: #d95f69 !important;
        color: #ffffff !important;
        transform: translateY(-2px);
    }


    /* =====================================================
       BADGE STATUS
    ===================================================== */

    .badge {
        padding: 0.5rem 1rem;
        border-radius: 30px;
        font-weight: 500;
        font-size: 0.8rem;
        white-space: nowrap;
    }

    .badge.bg-success {
        background: #7fc29b !important;
        color: #1f4a38;
    }

    .badge.bg-warning {
        background: #f7c948 !important;
        color: #5a3e3e;
    }

    .badge.bg-danger {
        background: #e6717a !important;
        color: #5a2a2a;
    }

    .badge.bg-secondary {
        background: #b59595 !important;
        color: #3d2b2b;
    }


    /* =====================================================
       TOMBOL TAMBAH
    ===================================================== */

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


    /* =====================================================
       ALERT
    ===================================================== */

    .alert-success {
        border-radius: 16px;
        border: none;
        background: #e0f0ed;
        color: #2d5f5a;
    }


    /* =====================================================
       TEXT
    ===================================================== */

    .text-secondary {
        color: #b59595 !important;
    }

    .bi-person-badge {
        color: #d4758a !important;
    }


    /* =====================================================
       RESPONSIVE
    ===================================================== */

    @media (max-width: 768px) {

        .action-column {
            width: 100px !important;
            min-width: 100px !important;
            max-width: 100px !important;
        }

        .action-buttons {
            gap: 5px;
        }

        .action-buttons .btn {
            width: 40px;
            height: 40px;

            min-width: 40px;
            min-height: 40px;

            border-radius: 12px;

            font-size: 17px;
        }

    }

</style>


<div class="container-fluid">


    {{-- =====================================================
         HEADER
    ===================================================== --}}

    <div class="d-flex justify-content-between align-items-center mb-4">



        {{-- TOMBOL TAMBAH --}}

        <a href="{{ route('admin.petugas.create') }}"
           class="btn btn-primary">

            <i class="bi bi-plus-lg"></i>

            Tambah Petugas

        </a>

    </div>


    {{-- =====================================================
         SUCCESS MESSAGE
    ===================================================== --}}

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif


    {{-- =====================================================
         CARD
    ===================================================== --}}

    <div class="card shadow-sm">


        {{-- =================================================
             CARD HEADER
        ================================================= --}}

        <div class="card-header">

            <h3 class="card-title">

                Daftar Petugas

            </h3>

        </div>


        {{-- =================================================
             CARD BODY
        ================================================= --}}

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-bordered table-hover mb-0">


                    {{-- =================================================
                         TABLE HEADER
                    ================================================= --}}

                    <thead>

                        <tr>

                            <th>No</th>

                            <th>Nama</th>

                            <th>Alamat</th>

                            <th>Nomor HP</th>

                            <th>Email</th>

                            <th>Status</th>

                            <th class="action-column">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    {{-- =================================================
                         TABLE BODY
                    ================================================= --}}

                    <tbody>


                        @forelse($petugas as $item)

                            <tr>


                                {{-- NO --}}

                                <td>
                                    {{ $loop->iteration }}
                                </td>


                                {{-- NAMA --}}

                                <td>
                                    {{ $item->nama }}
                                </td>


                                {{-- ALAMAT --}}

                                <td>
                                    {{ $item->alamat }}
                                </td>


                                {{-- NOMOR HP --}}

                                <td>
                                    {{ $item->nomor_hp }}
                                </td>


                                {{-- EMAIL --}}

                                <td>
                                    {{ $item->email }}
                                </td>


                                {{-- STATUS --}}

                                <td>

                                    @php

                                        $statusClass = [

                                            'Aktif' => 'bg-success',

                                            'Cuti' => 'bg-warning',

                                            'Sakit' => 'bg-danger',

                                            'Nonaktif' => 'bg-secondary'

                                        ][$item->status] ?? 'bg-secondary';

                                    @endphp


                                    <span class="badge {{ $statusClass }}">

                                        {{ $item->status }}

                                    </span>

                                </td>


                                {{-- =================================================
                                     AKSI
                                ================================================= --}}

                                <td class="action-column">

                                    <div class="action-buttons">


                                        {{-- EDIT --}}

                                        <a href="{{ route(
                                            'admin.petugas.edit',
                                            $item->id
                                        ) }}"
                                           class="btn btn-edit"
                                           title="Edit Petugas">

                                            <i class="bi bi-pencil"></i>

                                        </a>


                                        {{-- HAPUS --}}

                                        <form action="{{ route(
                                            'admin.petugas.destroy',
                                            $item->id
                                        ) }}"
                                              method="POST"
                                              onsubmit="return confirm(
                                                  'Yakin ingin menghapus petugas ini?'
                                              )">

                                            @csrf

                                            @method('DELETE')


                                            <button type="submit"
                                                    class="btn btn-delete"
                                                    title="Hapus Petugas">

                                                <i class="bi bi-trash"></i>

                                            </button>

                                        </form>


                                    </div>

                                </td>


                            </tr>


                        @empty


                            {{-- =================================================
                                 DATA KOSONG
                            ================================================= --}}

                            <tr>

                                <td colspan="7"
                                    class="text-center py-5">

                                    <i class="bi bi-person-badge fs-1 text-secondary"></i>

                                    <p class="mt-3 mb-0 text-secondary">

                                        Belum ada data petugas.

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