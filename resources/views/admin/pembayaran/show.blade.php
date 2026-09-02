@extends('layouts.main')

@section('title', 'Detail Pembayaran')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="mb-4">

        <h2 style="color:#6b4c4c; font-weight:700;">
            <i class="bi bi-credit-card"
               style="color:#d4758a;"></i>
            Detail Pembayaran
        </h2>

        <p class="text-muted mb-0">
            Detail pembayaran pelanggan
        </p>

    </div>


    {{-- SUCCESS --}}
    @if(session('success'))

        <div class="alert alert-success">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('success') }}
        </div>

    @endif


    <div class="row g-4">

        {{-- INFORMASI PEMBAYARAN --}}
        <div class="col-lg-7">

            <div class="card border-0 shadow-sm"
                 style="border-radius:16px;">

                <div class="card-header bg-white"
                     style="border-bottom:1px solid #f0e5e8;">

                    <h5 class="mb-0"
                        style="color:#6b4c4c; font-weight:700;">

                        Informasi Pembayaran

                    </h5>

                </div>


                <div class="card-body">

                    <div class="row mb-3">

                        <div class="col-sm-5 text-muted">
                            Pesanan
                        </div>

                        <div class="col-sm-7 fw-semibold">
                            #{{ $pembayaran->pemesanan_id }}
                        </div>

                    </div>


                    <div class="row mb-3">

                        <div class="col-sm-5 text-muted">
                            Customer
                        </div>

                        <div class="col-sm-7 fw-semibold">

                            {{ $pembayaran->pemesanan->customer->nama
                                ?? '-' }}

                        </div>

                    </div>


                    <div class="row mb-3">

                        <div class="col-sm-5 text-muted">
                            Metode Pembayaran
                        </div>

                        <div class="col-sm-7">

                            @if($pembayaran->metode_pembayaran === 'qris')
                                <span class="badge"
                                      style="background:#e8f0ff;
                                             color:#4267a9;">
                                    QRIS
                                </span>
                            @else
                                <span class="badge"
                                      style="background:#fff0f3;
                                             color:#c8667d;">
                                    Offline
                                </span>
                            @endif

                        </div>

                    </div>


                    <div class="row mb-3">

                        <div class="col-sm-5 text-muted">
                            Jumlah
                        </div>

                        <div class="col-sm-7">

                            <strong style="font-size:20px;
                                           color:#d4758a;">

                                Rp
                                {{ number_format(
                                    $pembayaran->jumlah,
                                    0,
                                    ',',
                                    '.'
                                ) }}

                            </strong>

                        </div>

                    </div>


                    <div class="row">

                        <div class="col-sm-5 text-muted">
                            Status
                        </div>

                        <div class="col-sm-7">

                            @if($pembayaran->status_pembayaran === 'belum_dibayar')

                                <span class="badge rounded-pill"
                                      style="background:#fff3cd;
                                             color:#856404;">
                                    Belum Dibayar
                                </span>

                            @elseif($pembayaran->status_pembayaran === 'menunggu_konfirmasi')

                                <span class="badge rounded-pill"
                                      style="background:#fff0c2;
                                             color:#946c00;">
                                    Menunggu Konfirmasi
                                </span>

                            @elseif($pembayaran->status_pembayaran === 'dikonfirmasi')

                                <span class="badge rounded-pill"
                                      style="background:#d1e7dd;
                                             color:#0f5132;">
                                    Dikonfirmasi
                                </span>

                            @elseif($pembayaran->status_pembayaran === 'ditolak')

                                <span class="badge rounded-pill"
                                      style="background:#f8d7da;
                                             color:#842029;">
                                    Ditolak
                                </span>

                            @endif

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- BUKTI PEMBAYARAN --}}
        <div class="col-lg-5">

            <div class="card border-0 shadow-sm"
                 style="border-radius:16px;">

                <div class="card-header bg-white"
                     style="border-bottom:1px solid #f0e5e8;">

                    <h5 class="mb-0"
                        style="color:#6b4c4c; font-weight:700;">

                        Bukti Pembayaran

                    </h5>

                </div>


                <div class="card-body text-center">

                    @if($pembayaran->bukti_pembayaran)

                        <img src="{{ asset(
                            'storage/' . $pembayaran->bukti_pembayaran
                        ) }}"
                             class="img-fluid rounded"
                             style="max-height:400px;">

                    @else

                        <i class="bi bi-image"
                           style="font-size:60px;
                                  color:#dda2b2;"></i>

                        <p class="text-muted mt-3 mb-0">
                            Belum ada bukti pembayaran.
                        </p>

                    @endif

                </div>

            </div>

        </div>

    </div>


    {{-- TOMBOL KONFIRMASI --}}
    @if($pembayaran->status_pembayaran === 'menunggu_konfirmasi')

        <div class="card border-0 shadow-sm mt-4"
             style="border-radius:16px;">

            <div class="card-body">

                <div class="d-flex gap-2">

                    {{-- KONFIRMASI --}}
                    <form method="POST"
                          action="{{ route(
                              'admin.pembayaran.konfirmasi',
                              $pembayaran->id
                          ) }}">

                        @csrf
                        @method('PATCH')

                        <button type="submit"
                                class="btn btn-success"
                                onclick="return confirm(
                                    'Konfirmasi pembayaran ini?'
                                )">

                            <i class="bi bi-check-circle me-1"></i>
                            Konfirmasi Pembayaran

                        </button>

                    </form>


                    {{-- TOLAK --}}
                    <form method="POST"
                          action="{{ route(
                              'admin.pembayaran.tolak',
                              $pembayaran->id
                          ) }}">

                        @csrf
                        @method('PATCH')

                        <button type="submit"
                                class="btn btn-danger"
                                onclick="return confirm(
                                    'Tolak pembayaran ini?'
                                )">

                            <i class="bi bi-x-circle me-1"></i>
                            Tolak

                        </button>

                    </form>

                </div>

            </div>

        </div>

    @endif


    <div class="mt-4">

        <a href="{{ route('admin.pembayaran.index') }}"
           class="btn btn-secondary">

            <i class="bi bi-arrow-left me-1"></i>
            Kembali

        </a>

    </div>

</div>

@endsection