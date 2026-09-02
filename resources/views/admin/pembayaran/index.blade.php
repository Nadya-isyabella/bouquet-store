@extends('layouts.main')

@section('title', 'Data Pembayaran')

@section('content')

<div class="container-fluid py-4">

    <div class="mb-4">
        <h3 style="color:#6b4c4c; font-weight:700;">
            <i class="bi bi-credit-card me-2" style="color:#d4758a;"></i>
            Data Pembayaran
        </h3>

        <p class="text-muted mb-0">
            Data pembayaran customer
        </p>
    </div>

    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white border-0 py-3">
            <h5 class="mb-0" style="color:#6b4c4c;">
                Daftar Pembayaran
            </h5>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle mb-0">

                    <thead style="background:#f8e8ec;">
                        <tr>
                            <th width="60" class="text-center">No</th>
                            <th>ID Pembayaran</th>
                            <th>ID Pemesanan</th>
                            <th>Metode Pembayaran</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($pembayarans as $pembayaran)

                            <tr>

                                <td class="text-center">
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    {{ $pembayaran->id }}
                                </td>

                                <td>
                                    {{ $pembayaran->pemesanan_id ?? '-' }}
                                </td>

                                <td>
                                    {{ $pembayaran->metode_pembayaran ?? '-' }}
                                </td>

                                <td>
                                    Rp {{ number_format($pembayaran->jumlah_bayar ?? 0, 0, ',', '.') }}
                                </td>

                                <td>

                                    @if ($pembayaran->status === 'menunggu')

                                        <span class="badge bg-warning text-dark">
                                            Menunggu
                                        </span>

                                    @elseif ($pembayaran->status === 'disetujui')

                                        <span class="badge bg-success">
                                            Disetujui
                                        </span>

                                    @elseif ($pembayaran->status === 'ditolak')

                                        <span class="badge bg-danger">
                                            Ditolak
                                        </span>

                                    @else

                                        <span class="badge bg-secondary">
                                            {{ $pembayaran->status ?? '-' }}
                                        </span>

                                    @endif

                                </td>

                                <td>
                                    {{ $pembayaran->created_at?->format('d-m-Y') ?? '-' }}
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="7" class="text-center py-4 text-muted">
                                    Belum ada data pembayaran.
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