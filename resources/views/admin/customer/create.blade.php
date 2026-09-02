```blade
@extends('layouts.main')

@section('title', 'Tambah Customer')

@section('content')

<div class="container-fluid">

    {{-- Header halaman --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 style="color: #6b4c4c; font-weight: 700;">
            <i class="bi bi-person-plus" style="color: #d4758a;"></i>
            Tambah Customer
        </h3>
    </div>

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

    {{-- Pesan sukses --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Card --}}
    <div class="card">

        <div class="card-header">
            <h3 class="card-title">
                <i class="bi bi-person-fill" style="color: #d4758a;"></i>
                Form Data Customer
            </h3>
        </div>

        <form action="{{ route('admin.customer.store') }}" method="POST">

            @csrf

            <div class="card-body">

                {{-- Nama --}}
                <div class="mb-4">
                    <label class="form-label">
                        Nama Lengkap
                    </label>

                    <input
                        type="text"
                        name="nama"
                        class="form-control"
                        placeholder="Contoh: Budi Santoso"
                        value="{{ old('nama') }}"
                        required
                    >

                    @error('nama')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>


                {{-- Email --}}
                <div class="mb-4">
                    <label class="form-label">
                        Alamat Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        placeholder="Contoh: budi@gmail.com"
                        value="{{ old('email') }}"
                        required
                    >

                    @error('email')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>


                {{-- Nomor HP --}}
                <div class="mb-4">
                    <label class="form-label">
                        Nomor Telepon / WhatsApp
                    </label>

                    <input
                        type="text"
                        name="nomor_hp"
                        id="nomor_hp"
                        class="form-control"
                        placeholder="Contoh: 081234567890"
                        value="{{ old('nomor_hp') }}"
                        maxlength="20"
                        required
                    >

                    @error('nomor_hp')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>


                {{-- Alamat --}}
                <div class="mb-4">
                    <label class="form-label">
                        Alamat Lengkap
                    </label>

                    <textarea
                        name="alamat"
                        class="form-control"
                        rows="3"
                        placeholder="Contoh: Jl. Mawar No. 10, Jakarta"
                        required
                    >{{ old('alamat') }}</textarea>

                    @error('alamat')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

            </div>


            {{-- Footer --}}
            <div class="card-footer d-flex justify-content-between align-items-center">

                <a
                    href="{{ route('admin.customer.index') }}"
                    class="btn btn-secondary"
                >
                    <i class="bi bi-arrow-left"></i>
                    Kembali
                </a>

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    <i class="bi bi-save"></i>
                    Simpan Customer
                </button>

            </div>

        </form>

    </div>

</div>

@endsection