@extends('layouts.main')

@section('title', 'Edit Kategori Bouquet')

@section('content')

<style>
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
    }

    .card-body {
        padding: 2rem 1.8rem;
    }

    .card-footer {
        background: #fcf7f7;
        border-top: 2px solid #f5e8e8;
        padding: 1.2rem 1.8rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .form-label {
        color: #6b4c4c;
        font-weight: 600;
        margin-bottom: 0.4rem;
    }

    .form-control {
        border: 2px solid #f0e0e0;
        border-radius: 12px;
        padding: 0.6rem 1rem;
        transition: border-color 0.3s, box-shadow 0.3s;
        background-color: #fefcfc;
    }

    .form-control:focus {
        border-color: #d4758a;
        box-shadow: 0 0 0 0.2rem rgba(212, 117, 138, 0.25);
    }

    .text-muted {
        color: #b59595 !important;
    }

    .btn-secondary {
        background-color: #d4b8b8 !important;
        border-color: #d4b8b8 !important;
        color: #5a3e3e !important;
        border-radius: 30px;
        padding: 0.5rem 1.8rem;
        font-weight: 500;
    }

    .btn-secondary:hover {
        background-color: #c7a8a8 !important;
        border-color: #c7a8a8 !important;
        color: #3d2b2b !important;
    }

    .btn-primary {
        background-color: #a7c7c9 !important;
        border-color: #a7c7c9 !important;
        color: #2d4f4f !important;
        border-radius: 30px;
        padding: 0.5rem 2rem;
        font-weight: 500;
    }

    .btn-primary:hover {
        background-color: #8fb9bb !important;
        border-color: #8fb9bb !important;
        color: #1d3a3a !important;
    }

    .bi {
        margin-right: 6px;
    }

    .alert-danger {
        border-radius: 16px;
        border: none;
        background-color: #fce8e8;
        color: #8a4a4a;
    }

    .alert-danger ul {
        list-style: none;
        padding-left: 0;
    }

    .alert-danger ul li::before {
        content: "• ";
        color: #d4758a;
    }

    .preview-image {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 15px;
        border: 3px solid #f0e0e0;
        margin-top: 10px;
    }
</style>

<div class="container-fluid">

    {{-- Pesan error --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">

        {{-- HEADER --}}
        <div class="card-header">
            <h3 class="card-title">
                <i class="bi bi-pencil-square" style="color: #d4758a;"></i>
                Edit Bouquet
            </h3>
        </div>

        {{-- FORM EDIT --}}
        <form action="{{ route('admin.kategori-bouquet.update', $kategoriBouquet->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="card-body">

                {{-- Nama --}}
                <div class="mb-3">
                    <label for="nama" class="form-label">
                        Nama Bouquet
                    </label>

                    <input type="text"
                           name="nama"
                           id="nama"
                           class="form-control"
                           value="{{ old('nama', $kategoriBouquet->nama) }}"
                           placeholder="Contoh: Bouquet Ulang Tahun"
                           required>
                </div>

                {{-- Harga --}}
                <div class="mb-3">
                    <label for="harga" class="form-label">
                        Harga
                    </label>

                    <input type="number"
                           name="harga"
                           id="harga"
                           class="form-control"
                           value="{{ old('harga', $kategoriBouquet->harga) }}"
                           min="0"
                           placeholder="Contoh: 150000"
                           required>
                </div>

                {{-- Stok --}}
                <div class="mb-3">
                    <label for="stok" class="form-label">
                        Stok
                    </label>

                    <input type="number"
                           name="stok"
                           id="stok"
                           class="form-control"
                           value="{{ old('stok', $kategoriBouquet->stok) }}"
                           min="0"
                           placeholder="Contoh: 10"
                           required>
                </div>

                {{-- Foto --}}
                <div class="mb-3">
                    <label for="gambar" class="form-label">
                        Foto Bouquet
                    </label>

                    <input type="file"
                           name="gambar"
                           id="gambar"
                           class="form-control"
                           accept=".jpg,.jpeg,.png,.webp">

                    <small class="text-muted">
                        Kosongkan jika tidak ingin mengganti foto.
                        JPG, JPEG, PNG, WEBP. Maksimal 2 MB.
                    </small>

                    {{-- Foto lama --}}
                    @if ($kategoriBouquet->gambar)
                        <div class="mt-3">
                            <label class="form-label d-block">
                                Foto Saat Ini
                            </label>

                            <img src="{{ asset('storage/' . $kategoriBouquet->gambar) }}"
                                 alt="{{ $kategoriBouquet->nama }}"
                                 class="preview-image">
                        </div>
                    @endif

                </div>

            </div>

            {{-- FOOTER --}}
            <div class="card-footer">

                <a href="{{ route('admin.kategori-bouquet.index') }}"
                   class="btn btn-secondary">

                    <i class="bi bi-arrow-left"></i>
                    Kembali
                </a>

                <button type="submit"
                        class="btn btn-primary">

                    <i class="bi bi-save"></i>
                    Update Bouquet
                </button>

            </div>

        </form>

    </div>

</div>

@endsection