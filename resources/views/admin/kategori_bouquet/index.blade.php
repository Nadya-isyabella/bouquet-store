@extends('layouts.main')

@section('title', 'Kategori Bouquet')

@section('content')

{{-- ========== CSS KUSTOM ========== --}}
<style>
    .card {
        border: none;
        border-radius: 24px;
        box-shadow: 0 10px 30px rgba(200, 150, 150, 0.15);
        background: #ffffff;
        overflow: hidden;
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 16px 40px rgba(200, 150, 150, 0.20);
    }
    .card-img-top {
        border-top-left-radius: 24px;
        border-top-right-radius: 24px;
    }
    .card-body { padding: 1.5rem 1.2rem; }
    .card-title {
        color: #6b4c4c;
        font-weight: 700;
    }
    .card-body p strong {
        color: #d4758a;
        font-size: 1.1rem;
    }
    .card-footer {
        background: #fcf7f7;
        border-top: 2px solid #f5e8e8;
        padding: 1rem 1.2rem;
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
    }
    .btn-warning {
        background-color: #f7c948 !important;
        border-color: #f7c948 !important;
        color: #5a3e3e !important;
        border-radius: 20px;
        padding: 0.3rem 1rem;
    }
    .btn-warning:hover {
        background-color: #f0b82a !important;
        border-color: #f0b82a !important;
        color: #3d2b2b !important;
    }
    .btn-danger {
        background-color: #e6717a !important;
        border-color: #e6717a !important;
        border-radius: 20px;
        padding: 0.3rem 1rem;
    }
    .btn-danger:hover {
        background-color: #d95f69 !important;
        border-color: #d95f69 !important;
    }
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
    .bi { margin-right: 6px; }
    .alert-success {
        border-radius: 16px;
        border: none;
        background: #e0f0ed;
        color: #2d5f5a;
    }
    .alert-info {
        border-radius: 16px;
        border: none;
        background: #f5e8e8;
        color: #6b4c4c;
    }
    .text-muted { color: #b59595 !important; }
    .bg-light { background: #f8f0f0 !important; }
    .card-footer .btn {
        flex: 1;
        min-width: 60px;
    }
</style>

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">

        <a href="{{ route('admin.kategori-bouquet.create') }}"
           class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Tambah Bouquet
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">

        @forelse ($kategoriBouquets as $bouquet)

            <div class="col-md-4 col-lg-3 mb-4">

                <div class="card h-100 shadow-sm">

                    @if ($bouquet->gambar)
                        <img src="{{ asset('storage/' . $bouquet->gambar) }}"
                             class="card-img-top"
                             style="height: 220px; object-fit: cover;"
                             alt="{{ $bouquet->nama }}">
                    @else
                        <div class="d-flex align-items-center justify-content-center bg-light"
                             style="height: 220px;">
                            <span class="text-muted"><i class="bi bi-image"></i> Tidak ada foto</span>
                        </div>
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $bouquet->nama }}</h5>
                        <p class="mb-2">
                            <strong>Rp {{ number_format($bouquet->harga, 0, ',', '.') }}</strong>
                        </p>
                        <p class="text-muted"><i class="bi bi-box"></i> Stok: {{ $bouquet->stok }}</p>
                    </div>

                    <div class="card-footer bg-white">
                        <a href="{{ route('admin.kategori-bouquet.edit', $bouquet->id) }}"
                           class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <form action="{{ route('admin.kategori-bouquet.destroy', $bouquet->id) }}"
                              method="POST"
                              class="d-inline"
                              onsubmit="return confirm('Yakin ingin menghapus bouquet ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </form>
                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">
                <div class="alert alert-info text-center py-5">
                    <i class="bi bi-flower1 fs-1" style="color: #d4758a;"></i>
                    <p class="mt-3 mb-0">Belum ada bouquet yang ditambahkan.</p>
                </div>
            </div>

        @endforelse

    </div>

</div>

@endsection