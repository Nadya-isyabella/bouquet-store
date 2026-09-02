<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Aksesoris - Bouquet Store</title>

    {{-- AdminLTE & Bootstrap Icons --}}
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0/dist/css/adminlte.min.css">
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    {{-- ========== CSS KUSTOM BOUQUET STORE ========== --}}
    <style>
        /* --- Latar belakang halaman --- */
        body.bg-body-tertiary {
            background: #f9f2f2 !important;
        }

        /* --- Card utama --- */
        .card {
            border: none;
            border-radius: 24px;
            box-shadow: 0 10px 30px rgba(200, 150, 150, 0.15);
            background: #ffffff;
            overflow: hidden;
        }

        /* --- Header card --- */
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

        /* --- Body card --- */
        .card-body {
            padding: 2rem 1.8rem;
        }

        /* --- Label form --- */
        .form-label {
            color: #6b4c4c;
            font-weight: 600;
            margin-bottom: 0.4rem;
        }

        /* --- Input form --- */
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

        /* --- Teks kecil (helper) --- */
        .text-secondary {
            color: #b59595 !important;
        }

        /* --- Footer card --- */
        .card-footer {
            background: #fcf7f7;
            border-top: 2px solid #f5e8e8;
            padding: 1.2rem 1.8rem;
        }

        /* --- Tombol Kembali (btn-secondary) --- */
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

        /* --- Tombol Simpan (btn-primary) --- */
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

        /* --- Ikon di tombol --- */
        .bi {
            margin-right: 6px;
        }

        /* --- Alert untuk error/success --- */
        .alert {
            border-radius: 16px;
            border: none;
        }
        .alert-success {
            background-color: #e0f0ed;
            color: #2d5f5a;
        }
        .alert-danger {
            background-color: #fce8e8;
            color: #8a4a4a;
        }
        .alert ul {
            list-style: none;
            padding-left: 0;
        }
        .alert ul li::before {
            content: "• ";
            color: #d4758a;
        }

        /* --- Judul halaman (app-content-header) --- */
        .app-content-header h3 {
            color: #6b4c4c;
            font-weight: 700;
            letter-spacing: 0.5px;
            margin-bottom: 0;
        }

        /* --- Tambahan margin untuk card agar rapi --- */
        .app-content .container-fluid .card {
            margin-top: 1.5rem;
        }
    </style>
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">

<div class="app-wrapper">

    <main class="app-main">

        {{-- Header halaman --}}
        <div class="app-content-header">
            <div class="container-fluid">
                <h3>
                    <i class="bi bi-plus-circle" style="color: #d4758a;"></i>
                    Tambah Aksesoris
                </h3>
            </div>
        </div>

        {{-- Konten utama --}}
        <div class="app-content">
            <div class="container-fluid">

                {{-- Pesan sukses / error --}}
                @if(session('success'))
                    <div class="alert alert-success mt-3">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger mt-3">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card">

                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="bi bi-box-seam" style="color: #d4758a;"></i>
                            Form Aksesoris
                        </h3>
                    </div>

                    <form action="{{ route('admin.aksesoris.store') }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf

                        <div class="card-body">

                            {{-- Nama --}}
                            <div class="mb-4">
                                <label class="form-label">Nama Aksesoris</label>
                                <input type="text"
                                       name="nama"
                                       class="form-control"
                                       placeholder="Contoh: Pita Pink"
                                       value="{{ old('nama') }}"
                                       required>
                            </div>

                            {{-- Gambar --}}
                            <div class="mb-4">
                                <label class="form-label">Gambar Aksesoris</label>
                                <input type="file"
                                       name="gambar"
                                       class="form-control"
                                       accept="image/*">
                                <small class="text-secondary">
                                    Format JPG, JPEG, PNG, atau WEBP. Maksimal 2MB.
                                </small>
                            </div>

                            {{-- Harga --}}
                            <div class="mb-4">
                                <label class="form-label">Harga</label>
                                <input type="number"
                                       name="harga"
                                       class="form-control"
                                       placeholder="Contoh: 10000"
                                       value="{{ old('harga') }}"
                                       min="0"
                                       required>
                            </div>

                            {{-- Stok --}}
                            <div class="mb-4">
                                <label class="form-label">Stok</label>
                                <input type="number"
                                       name="stok"
                                       class="form-control"
                                       placeholder="Contoh: 10"
                                       value="{{ old('stok', 0) }}"
                                       min="0"
                                       required>
                            </div>

                        </div>

                        {{-- Footer --}}
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <a href="{{ route('admin.aksesoris.index') }}"
                               class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>
                            <button type="submit"
                                    class="btn btn-primary">
                                <i class="bi bi-save"></i> Simpan
                            </button>
                        </div>

                    </form>

                </div>

            </div>
        </div>

    </main>

</div>

</body>
</html>