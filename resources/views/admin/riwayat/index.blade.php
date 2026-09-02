@extends('layouts.main')

@section('title', 'Riwayat Pemesanan')

@section('content')

<div class="container-fluid py-4">

    {{-- =====================================================
        HEADER
    ====================================================== --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 style="color:#6b4c4c; font-weight:700; margin-bottom:5px;">
                <i class="bi bi-clock-history me-2"
                   style="color:#d4758a;"></i>
            </h2>

            <small class="text-muted">
                Daftar pemesanan yang telah selesai
            </small>
        </div>

        <a href="{{ route('admin.dashboard') }}"
           class="btn btn-secondary">

            <i class="bi bi-arrow-left me-1"></i>
            Kembali

        </a>

    </div>


    {{-- =====================================================
        SUCCESS
    ====================================================== --}}
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            <i class="bi bi-check-circle me-1"></i>

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    {{-- =====================================================
        ERROR
    ====================================================== --}}
    @if(session('error'))

        <div class="alert alert-danger alert-dismissible fade show">

            <i class="bi bi-exclamation-circle me-1"></i>

            {{ session('error') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    {{-- =====================================================
        VALIDATION ERROR
    ====================================================== --}}
    @if($errors->any())

        <div class="alert alert-danger alert-dismissible fade show">

            <i class="bi bi-exclamation-triangle me-1"></i>

            {{ $errors->first() }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    {{-- =====================================================
        TABEL RIWAYAT
    ====================================================== --}}
    <div class="card shadow-sm">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover table-striped mb-0">

                    <thead style="
                        background:#f8f0f0;
                        border-bottom:2px solid #d4758a;
                    ">

                        <tr>

                            <th style="width:60px;">
                                #
                            </th>

                            <th>
                                Customer
                            </th>

                            <th>
                                Tanggal Pemesanan
                            </th>

                            <th>
                                Tanggal Pengambilan
                            </th>

                            <th>
                                Total
                            </th>

                            <th>
                                Status
                            </th>

                            <th class="text-center"
                                style="width:120px;">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($riwayat as $index => $p)

                            <tr>

                                {{-- NOMOR --}}
                                <td>
                                    {{ $riwayat->firstItem() + $index }}
                                </td>


                                {{-- CUSTOMER --}}
                                <td>

                                    <strong style="color:#6b4c4c;">

                                        {{ $p->customer->nama ?? 'Customer tidak ditemukan' }}

                                    </strong>

                                </td>


                                {{-- TANGGAL PEMESANAN --}}
                                <td>

                                    @if($p->tanggal_pemesanan)

                                        {{ \Carbon\Carbon::parse(
                                            $p->tanggal_pemesanan
                                        )->format('d/m/Y') }}

                                    @else

                                        -

                                    @endif

                                </td>


                                {{-- TANGGAL PENGAMBILAN --}}
                                <td>

                                    @if($p->tanggal_pengembalian)

                                        {{ \Carbon\Carbon::parse(
                                            $p->tanggal_pengembalian
                                        )->format('d/m/Y') }}

                                    @else

                                        -

                                    @endif

                                </td>


                                {{-- TOTAL --}}
                                <td>

                                    <strong style="color:#6b4c4c;">

                                        Rp
                                        {{ number_format(
                                            $p->total_harga ?? 0,
                                            0,
                                            ',',
                                            '.'
                                        ) }}

                                    </strong>

                                </td>


                                {{-- STATUS --}}
                                <td>

                                    <span class="badge bg-success">

                                        <i class="bi bi-check-circle me-1"></i>
                                        Selesai

                                    </span>

                                </td>


                                {{-- AKSI --}}
                                <td class="text-center">

                                    <form action="{{ route(
                                        'admin.pemesanan.destroy',
                                        $p->id
                                    ) }}"
                                          method="POST"
                                          onsubmit="return confirm(
                                              'Yakin ingin menghapus riwayat pemesanan ini?'
                                          )">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-sm btn-outline-danger"
                                                title="Hapus">

                                            <i class="bi bi-trash"></i>

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="7"
                                    class="text-center py-5">

                                    <i class="bi bi-inbox"
                                       style="
                                           font-size:2.5rem;
                                           color:#aaa;
                                           display:block;
                                           margin-bottom:10px;
                                       ">
                                    </i>

                                    <span class="text-muted">

                                        Belum ada riwayat pemesanan.

                                    </span>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>


        {{-- =================================================
            FOOTER
        ================================================== --}}
        @if($riwayat->total() > 0)

            <div class="card-footer bg-white">

                <div class="text-muted">

                    Menampilkan

                    <strong>
                        {{ $riwayat->firstItem() }}
                    </strong>

                    sampai

                    <strong>
                        {{ $riwayat->lastItem() }}
                    </strong>

                    dari

                    <strong>
                        {{ $riwayat->total() }}
                    </strong>

                    riwayat pemesanan.

                </div>

            </div>

        @endif


        {{-- =================================================
            PAGINATION
        ================================================== --}}
        @if($riwayat->hasPages())

            <div class="card-footer bg-white">

                {{ $riwayat->links() }}

            </div>

        @endif

    </div>

</div>

@endsection