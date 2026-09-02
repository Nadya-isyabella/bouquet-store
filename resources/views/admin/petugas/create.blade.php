@extends('layouts.main')

@section('title', 'Tambah Petugas')

@section('content')

{{-- ========== CSS KUSTOM ========== --}}
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
    .card-body { padding: 2rem 1.8rem; }
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
    .form-select {
        border: 2px solid #f0e0e0;
        border-radius: 12px;
        padding: 0.6rem 1rem;
        background-color: #fefcfc;
    }
    .form-select:focus {
        border-color: #d4758a;
        box-shadow: 0 0 0 0.2rem rgba(212, 117, 138, 0.25);
    }
    .text-muted { color: #b59595 !important; }
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
    .bi { margin-right: 6px; }
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
</style>

<div class="container-fluid">

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

        <div class="card-header">
            <h3 class="card-title">
                <i class="bi bi-plus-circle" style="color: #d4758a;"></i>
                Form Tambah Petugas
            </h3>
        </div>

        <form action="{{ route('admin.petugas.store') }}" method="POST">
            @csrf

            <div class="card-body">

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Petugas</label>
                    <input type="text"
                           name="nama"
                           id="nama"
                           class="form-control"
                           value="{{ old('nama') }}"
                           placeholder="Contoh: Ahmad Fauzi"
                           required>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat"
                              id="alamat"
                              class="form-control"
                              rows="2"
                              placeholder="Contoh: Jl. Mawar No. 12, Jakarta"
                              required>{{ old('alamat') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="nomor_hp" class="form-label">Nomor HP</label>
                    <input type="text"
                           name="nomor_hp"
                           id="nomor_hp"
                           class="form-control"
                           value="{{ old('nomor_hp') }}"
                           placeholder="Contoh: 08123456789"
                           required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email"
                           name="email"
                           id="email"
                           class="form-control"
                           value="{{ old('email') }}"
                           placeholder="Contoh: ahmad@email.com"
                           required>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-select" required>
                        <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="Cuti" {{ old('status') == 'Cuti' ? 'selected' : '' }}>Cuti</option>
                        <option value="Sakit" {{ old('status') == 'Sakit' ? 'selected' : '' }}>Sakit</option>
                        <option value="Nonaktif" {{ old('status') == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                    <small class="text-muted">Pilih status petugas saat ini.</small>
                </div>

            </div>

            <div class="card-footer">
                <a href="{{ route('admin.petugas.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Simpan Petugas
                </button>
            </div>

        </form>

    </div>

</div>

@endsection