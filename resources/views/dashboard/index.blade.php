@extends('layouts.main')

@section('title', 'Dashboard Admin')

@section('content')

{{-- ========== CSS KUSTOM UNTUK DASHBOARD YANG LUCU ========== --}}
<style>
    /* --- Kartu sambutan --- */
    .card-welcome {
        background: linear-gradient(135deg, #fce4e4, #fde9e9);
        border: none;
        border-radius: 30px;
        box-shadow: 0 8px 25px rgba(200, 150, 150, 0.15);
        padding: 1.5rem 2rem;
        position: relative;
        overflow: hidden;
    }
    .card-welcome::after {
        content: "🌸";
        font-size: 6rem;
        position: absolute;
        right: 20px;
        bottom: -10px;
        opacity: 0.15;
        transform: rotate(-10deg);
    }
    .card-welcome h4 {
        color: #6b4c4c;
        font-weight: 700;
    }
    .card-welcome p {
        color: #9a7a7a;
        font-size: 1.05rem;
    }

    /* --- Small Box (statistik) --- */
    .small-box {
        border-radius: 24px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        transition: transform 0.25s ease, box-shadow 0.25s ease;
        position: relative;
        overflow: hidden;
        border: none;
        padding: 1.5rem 1.2rem;
    }
    .small-box:hover {
        transform: translateY(-8px) scale(1.01);
        box-shadow: 0 16px 40px rgba(0,0,0,0.15);
    }

    /* Warna gradien masing-masing box */
    .small-box.bg-primary {
        background: linear-gradient(135deg, #6ec3d4, #4ba3b5) !important;
    }
    .small-box.bg-success {
        background: linear-gradient(135deg, #8bc9a0, #5fb07a) !important;
    }
    .small-box.bg-warning {
        background: linear-gradient(135deg, #f7d06a, #f0b83a) !important;
    }
    .small-box.bg-danger {
        background: linear-gradient(135deg, #f08a8a, #e06a6a) !important;
    }

    /* Inner teks */
    .small-box .inner h3 {
        font-size: 2.8rem;
        font-weight: 800;
        margin: 0 0 0.2rem;
        letter-spacing: 1px;
        color: #fff;
        text-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .small-box .inner p {
        font-size: 1.1rem;
        font-weight: 500;
        color: rgba(255,255,255,0.9);
        margin: 0;
    }

    /* Ikon besar di pojok */
    .small-box .small-box-icon {
        position: absolute;
        right: 1.2rem;
        bottom: 0.8rem;
        font-size: 4.2rem;
        opacity: 0.25;
        color: #fff;
        transition: transform 0.3s ease, opacity 0.3s ease;
    }
    .small-box:hover .small-box-icon {
        transform: scale(1.1) rotate(-5deg);
        opacity: 0.35;
    }

    /* Footer link */
    .small-box .small-box-footer {
        display: inline-block;
        margin-top: 1rem;
        padding: 0.4rem 1rem;
        background: rgba(255,255,255,0.2);
        border-radius: 30px;
        color: #fff;
        font-weight: 500;
        text-decoration: none;
        transition: background 0.2s;
        font-size: 0.9rem;
    }
    .small-box .small-box-footer:hover {
        background: rgba(255,255,255,0.35);
        color: #fff;
    }
    .small-box .small-box-footer i {
        margin-left: 4px;
        transition: transform 0.2s;
    }
    .small-box .small-box-footer:hover i {
        transform: translateX(4px);
    }

    /* --- Tabel Pesanan Terbaru --- */
    .card-table {
        border: none;
        border-radius: 30px;
        box-shadow: 0 8px 25px rgba(200,150,150,0.10);
        overflow: hidden;
        margin-top: 2rem;
    }
    .card-table .card-header {
        background: linear-gradient(135deg, #fce4e4, #f8d0d0);
        border: none;
        padding: 1.2rem 1.8rem;
    }
    .card-table .card-header .card-title {
        color: #6b4c4c;
        font-weight: 700;
        font-size: 1.3rem;
    }
    .card-table .table {
        margin-bottom: 0;
    }
    .card-table .table thead th {
        background: #f8f0f0;
        color: #6b4c4c;
        font-weight: 600;
        border-bottom: 2px solid #f5e0e0;
        padding: 0.8rem 1rem;
    }
    .card-table .table tbody td {
        padding: 0.8rem 1rem;
        vertical-align: middle;
        border-color: #f0e6e6;
        color: #5a4a4a;
    }
    .card-table .table-hover tbody tr:hover {
        background: #fdf6f6;
    }

    /* Badge status */
    .badge {
        padding: 0.5rem 1rem;
        border-radius: 30px;
        font-weight: 500;
        font-size: 0.8rem;
    }
    .badge.bg-warning {
        background: #f7c948 !important;
        color: #5a3e3e;
    }
    .badge.bg-success {
        background: #7fc29b !important;
        color: #1f4a38;
    }
    .badge.bg-primary {
        background: #6ec3d4 !important;
        color: #1f4a5a;
    }
    .badge.bg-secondary {
        background: #b0a0a0 !important;
    }

    .page-title {
        color: #6b4c4c;
        font-weight: 700;
    }
</style>

<div class="container-fluid">

    {{-- Kartu sambutan --}}
    <div class="card card-welcome mb-4">
        <div class="card-body">
            <h4>🌷 Selamat Datang, Admin!</h4>
            <p class="mb-0">Kelola data Bouquet Store dengan senyum dan bunga di hati 🌸</p>
        </div>
    </div>

    {{-- Statistik --}}
    <div class="row">

        {{-- Customer --}}
        <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3 class="counter" data-target="{{ $totalCustomer ?? 0 }}">{{ $totalCustomer ?? 0 }}</h3>
                    <p>Total Customer</p>
                </div>
                <i class="bi bi-people small-box-icon"></i>
                <a href="{{ route('admin.customer.index') }}" class="small-box-footer">
                    Lihat Data <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>

        {{-- Bouquet --}}
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3 class="counter" data-target="{{ $totalBouquet ?? 0 }}">{{ $totalBouquet ?? 0 }}</h3>
                    <p>Total Bouquet</p>
                </div>
                <i class="bi bi-flower1 small-box-icon"></i>
                <a href="{{ route('admin.kategori-bouquet.index') }}" class="small-box-footer">
                    Lihat Data <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>

        {{-- Petugas --}}
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3 class="counter" data-target="{{ $totalPetugas ?? 0 }}">{{ $totalPetugas ?? 0 }}</h3>
                    <p>Total Petugas</p>
                </div>
                <i class="bi bi-person-badge small-box-icon"></i>
                <a href="{{ route('admin.petugas.index') }}" class="small-box-footer">
                    Lihat Data <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>

        {{-- Pesanan --}}
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3 class="counter" data-target="{{ $totalPesanan ?? 0 }}">{{ $totalPesanan ?? 0 }}</h3>
                    <p>Total Pesanan</p>
                </div>
                <i class="bi bi-cart-check small-box-icon"></i>
                <a href="{{ route('admin.pemesanan.index') }}" class="small-box-footer">
                    Lihat Data <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>

    </div>

    {{-- Tabel Pesanan Terbaru --}}
    <div class="card card-table">
        <div class="card-header">
            <h3 class="card-title">
                <i class="bi bi-clock-history" style="color: #d4758a;"></i> Pesanan Terbaru
            </h3>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Customer</th>
                            <th>Item</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentOrders ?? [] as $index => $order)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <i class="bi bi-person-circle" style="color: #d4758a;"></i>
                                    {{ $order->customer->nama ?? 'Tidak diketahui' }}
                                </td>
                                <td>
                                    @if($order->details->isNotEmpty())
                                        {{ $order->details->first()->item->nama ?? 'Item tidak ditemukan' }}
                                        @if($order->details->count() > 1)
                                            + {{ $order->details->count() - 1 }} lainnya
                                        @endif
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ \Carbon\Carbon::parse($order->tanggal_pemesanan)->format('d-m-Y') }}</td>
                                <td>
                                    @php
                                        $statusClass = [
                                            'selesai'   => 'bg-success',
                                            'diproses'  => 'bg-warning',
                                            'baru'      => 'bg-primary',
                                            'batal'     => 'bg-secondary',
                                            'dikembalikan' => 'bg-secondary'
                                        ][$order->status] ?? 'bg-secondary';
                                    @endphp
                                    <span class="badge {{ $statusClass }}">
                                        <i class="bi bi-{{ $order->status == 'selesai' ? 'check-circle' : ($order->status == 'diproses' ? 'hourglass-split' : ($order->status == 'baru' ? 'star' : 'circle')) }}"></i>
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">
                                    <i class="bi bi-inbox" style="font-size:2rem; display:block; margin-bottom:8px;"></i>
                                    Belum ada pesanan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

{{-- ========== JAVASCRIPT UNTUK ANIMASI ANGKA ========== --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const counters = document.querySelectorAll('.counter');

        counters.forEach(counter => {
            const target = parseInt(counter.getAttribute('data-target'));
            if (isNaN(target)) return;

            const duration = 1200;
            const stepTime = 20;
            const steps = duration / stepTime;
            const increment = target / steps;
            let current = 0;

            const updateCounter = () => {
                current += increment;
                if (current < target) {
                    counter.textContent = Math.ceil(current);
                    setTimeout(updateCounter, stepTime);
                } else {
                    counter.textContent = target;
                }
            };

            updateCounter();
        });
    });
</script>

@endsection