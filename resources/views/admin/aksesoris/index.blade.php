@extends('layouts.main')

@section('title', 'Aksesoris')

@section('content')

<style>
    /* --- Background card dengan gradien lembut --- */
    .card {
        background: linear-gradient(145deg, #ffffff, #f8f0f0);
        border: none;
        border-radius: 20px;
        transition: transform 0.2s, box-shadow 0.2s;
        box-shadow: 0 6px 18px rgba(233, 150, 150, 0.10);
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 28px rgba(233, 150, 150, 0.20);
    }

    /* --- Gambar placeholder --- */
    .bg-light i.bi-image {
        color: #d4b8b8 !important;
    }

    /* --- Judul card --- */
    .card-title {
        color: #6b4c4c;
        font-weight: 600;
    }

    /* --- Harga (text-primary) --- */
    .text-primary {
        color: #d4758a !important;
    }

    /* --- Badge Stok --- */
    .badge.text-bg-secondary {
        background-color: #f5d1d1 !important;
        color: #7a4a4a !important;
        padding: 6px 14px;
        border-radius: 30px;
        font-weight: 500;
        font-size: 0.85rem;
    }

    /* --- Tombol Edit (btn-warning) --- */
    .btn-warning {
        background-color: #f7c948 !important;
        border-color: #f7c948 !important;
        color: #5a3e3e !important;
    }
    .btn-warning:hover {
        background-color: #f0b82a !important;
        border-color: #f0b82a !important;
        color: #3d2b2b !important;
    }

    /* --- Tombol Hapus (btn-danger) --- */
    .btn-danger {
        background-color: #e6717a !important;
        border-color: #e6717a !important;
    }
    .btn-danger:hover {
        background-color: #d95f69 !important;
        border-color: #d95f69 !important;
    }

    /* --- Tombol Tambah (btn-primary) --- */
    .btn-primary {
        background-color: #a7c7c9 !important;
        border-color: #a7c7c9 !important;
        color: #2d4f4f !important;
    }
    .btn-primary:hover {
        background-color: #8fb9bb !important;
        border-color: #8fb9bb !important;
        color: #1d3a3a !important;
    }

    /* --- Judul halaman --- */
    h3 {
        color: #6b4c4c;
        font-weight: 600;
        letter-spacing: 0.5px;
    }

    /* --- Ikon di tombol --- */
    .bi {
        margin-right: 5px;
    }

    /* --- Empty state --- */
    .card .bi-gift {
        color: #d4b8b8 !important;
    }
</style>

<div class="container-fluid">

    {{-- Pesan berhasil --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Pesan error --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Judul + Tombol Tambah --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{ route('admin.aksesoris.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Tambah Aksesoris
        </a>
    </div>

    {{-- Daftar Aksesoris --}}
   <div class="row">
    @forelse($aksesoris as $item)
        <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
            <div class="card h-100 shadow-sm">

                {{-- Gambar --}}
                @if($item->gambar)
                   <img src="{{ asset('storage/' . $item->gambar) }}"
                    class="card-img-top"
                    width="400"
                    height="220"
                    alt="{{ $item->nama }}"
                    loading="{{ $loop->first ? 'eager' : 'lazy' }}"
                    decoding="async"
                    sizes="(max-width: 768px) 100vw, (max-width: 1200px) 50vw, 25vw"
                    @if($loop->first) fetchpriority="high" @endif
                    style="height: 220px; object-fit: cover;">
                @else
                    <div class="d-flex align-items-center justify-content-center bg-light"
                         style="height: 220px;">
                        <i class="bi bi-image fs-1 text-secondary"></i>
                    </div>
                @endif

                {{-- Isi Card --}}
                <div class="card-body">
                    <h5 class="card-title fw-bold">
                        {{ $item->nama }}
                    </h5>

                    <p class="mb-2 text-primary fw-bold">
                        Rp {{ number_format($item->harga, 0, ',', '.') }}
                    </p>

                    <p class="mb-3">
                        <span class="badge text-bg-secondary">
                            Stok: {{ $item->stok }}
                        </span>
                    </p>

                    {{-- Tombol --}}
                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.aksesoris.edit', $item->id) }}"
                           class="btn btn-warning btn-sm flex-fill">
                            <i class="bi bi-pencil"></i> Edit
                        </a>

                        <form action="{{ route('admin.aksesoris.destroy', $item->id) }}"
                              method="POST"
                              class="flex-fill"
                              onsubmit="return confirm('Yakin ingin menghapus aksesoris ini?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-danger btn-sm w-100">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    @empty
        <div class="col-12">
            <div class="card">
                <div class="card-body text-center py-5">
                    <i class="bi bi-gift fs-1 text-secondary"></i>

                    <h5 class="mt-3">
                        Belum ada aksesoris
                    </h5>

                    <p class="text-secondary">
                        Silakan tambahkan aksesoris terlebih dahulu.
                    </p>
                </div>
            </div>
        </div>
    @endforelse
</div>

</div>

@endsection