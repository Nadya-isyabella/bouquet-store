<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title') - Bouquet Store
    </title>

    {{-- ===================================================== --}}
    {{-- PRECONNECT CDN --}}
    {{-- ===================================================== --}}
    <link rel="preconnect"
          href="https://cdn.jsdelivr.net"
          crossorigin>

    {{-- ===================================================== --}}
    {{-- ADMINLTE 4 --}}
    {{-- ===================================================== --}}
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0/dist/css/adminlte.min.css">

    {{-- ===================================================== --}}
    {{-- BOOTSTRAP ICONS --}}
    {{-- ===================================================== --}}
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    {{-- ===================================================== --}}
    {{-- HEAD TAMBAHAN DARI HALAMAN --}}
    {{-- ===================================================== --}}
    @stack('head')

    {{-- ===================================================== --}}
    {{-- STYLE --}}
    {{-- ===================================================== --}}
    <style>

        * {
            box-sizing: border-box;
        }

        body {
            background: #f9f2f2 !important;
            font-family:
                'Segoe UI',
                Roboto,
                Arial,
                sans-serif;
        }


        /* =====================================================
           NAVBAR
        ===================================================== */

        .app-header.navbar {
            background: #ffffff !important;
            border-bottom: 3px solid #f5d1d1;
            box-shadow: 0 2px 12px rgba(200,150,150,0.08);
        }

        .app-header .nav-link {
            color: #6b4c4c !important;
            font-weight: 500;
        }

        .app-header .nav-link:hover {
            color: #d4758a !important;
        }

        .app-header .nav-link i {
            font-size: 1.3rem;
        }

        .app-header .nav-link .bi-person-circle {
            color: #d4758a;
            margin-right: 5px;
        }


        /* =====================================================
           SIDEBAR
        ===================================================== */

        .app-sidebar {
            background:
                linear-gradient(
                    180deg,
                    #1f1414 0%,
                    #3a2828 100%
                ) !important;

            border-right: none !important;

            box-shadow:
                4px 0 20px rgba(0,0,0,0.25);
        }


        /* =====================================================
           LOGO
        ===================================================== */

        .app-sidebar .sidebar-brand {
            padding: 1.2rem 1rem;

            border-bottom:
                2px solid rgba(255,255,255,0.15);

            background:
                rgba(255,255,255,0.05);
        }

        .app-sidebar .brand-link {
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
        }

        .app-sidebar .brand-text {
            color: #ffffff !important;
            font-size: 1.5rem;
            font-weight: 800;
            letter-spacing: 1.5px;

            text-shadow:
                0 2px 8px rgba(0,0,0,0.5);
        }

        .app-sidebar .brand-text::before {
            content: "🌸 ";
            font-size: 1.7rem;
        }


        /* =====================================================
           SIDEBAR MENU
        ===================================================== */

        .sidebar-menu {
            padding-top: 8px;
        }

        .sidebar-menu .nav-item .nav-link {
            color: #ffffff !important;

            display: flex;
            align-items: center;

            min-height: 48px;

            padding:
                0.7rem 1.2rem;

            margin:
                0.2rem 0.6rem;

            border-radius: 12px;

            background: transparent;

            transition:
                background 0.25s,
                transform 0.15s;
        }

        .sidebar-menu .nav-item .nav-link:hover {
            background:
                rgba(255,255,255,0.15) !important;

            transform:
                translateX(4px);
        }

        .sidebar-menu .nav-item .nav-link.active {
            background:
                rgba(212,117,138,0.35) !important;

            box-shadow:
                inset 4px 0 0 #d4758a;
        }


        /* =====================================================
           ICON
        ===================================================== */

        .sidebar-menu
        .nav-item
        .nav-link
        .nav-icon {
            width: 28px;
            min-width: 28px;
            height: 28px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin-right: 12px;

            color: #f5d1d1 !important;

            font-size: 1.2rem;
        }

        .sidebar-menu
        .nav-item
        .nav-link:hover
        .nav-icon {
            color: #ffffff !important;
        }


        /* =====================================================
           SVG ICON
        ===================================================== */

        .sidebar-svg {
            width: 22px;
            height: 22px;

            stroke: currentColor;

            fill: none;

            stroke-width: 2;

            stroke-linecap: round;

            stroke-linejoin: round;
        }


        /* =====================================================
           TEXT
        ===================================================== */

        .sidebar-menu
        .nav-item
        .nav-link p {
            margin: 0;

            color: #ffffff !important;

            font-weight: 500;

            white-space: nowrap;
        }


        /* =====================================================
           LOGOUT
        ===================================================== */

        .sidebar-menu form {
            margin: 0;
        }

        .sidebar-menu form .nav-link {
            width: 100%;

            border: none;

            text-align: left;

            cursor: pointer;
        }

        .sidebar-menu form .nav-link:hover {
            background:
                rgba(255,255,255,0.15) !important;
        }


        /* =====================================================
           MAIN
        ===================================================== */

        .app-main {
            background: #f9f2f2;
        }

        .app-content-header {
            background: transparent;

            padding:
                1.5rem 0 0.5rem;
        }

        .app-content-header h3 {
            color: #6b4c4c;

            font-weight: 700;

            letter-spacing: 0.3px;
        }

        .app-content-header .breadcrumb {
            background: transparent;

            padding: 0;

            margin: 0;
        }

        .app-content-header .breadcrumb-item {
            color: #b59595;
        }

        .app-content-header .breadcrumb-item.active {
            color: #6b4c4c;
        }


        /* =====================================================
           CONTENT
        ===================================================== */

        .app-content {
            background: #f9f2f2;
        }


        /* =====================================================
           FOOTER
        ===================================================== */

        .app-footer {
            background: #ffffff;

            border-top:
                2px solid #f5d1d1;

            color: #6b4c4c;

            padding:
                0.8rem 1.5rem;

            font-weight: 500;

            box-shadow:
                0 -2px 10px
                rgba(200,150,150,0.05);
        }

        .app-footer .float-end {
            color: #b59595;
        }

        .app-footer .float-end::before {
            content: "🌿 ";
        }


        /* =====================================================
           SIDEBAR SCROLL
        ===================================================== */

        .sidebar-wrapper::-webkit-scrollbar {
            width: 4px;
        }

        .sidebar-wrapper::-webkit-scrollbar-track {
            background:
                rgba(255,255,255,0.05);
        }

        .sidebar-wrapper::-webkit-scrollbar-thumb {
            background:
                #d4758a;

            border-radius:
                10px;
        }


        /* =====================================================
           MOBILE
        ===================================================== */

        @media (max-width: 768px) {

            .app-sidebar .brand-text {
                font-size: 1.1rem;
            }

            .sidebar-menu
            .nav-item
            .nav-link {
                padding:
                    0.6rem 0.8rem;
            }

        }

    </style>

</head>


<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">

<div class="app-wrapper">


    {{-- ===================================================== --}}
    {{-- NAVBAR --}}
    {{-- ===================================================== --}}

    <nav class="app-header navbar navbar-expand bg-body">

        <div class="container-fluid">

            {{-- Tombol buka/tutup sidebar --}}
            <ul class="navbar-nav">

                <li class="nav-item">

                    <a class="nav-link"
                       data-lte-toggle="sidebar"
                       href="#">

                        <i class="bi bi-list"></i>

                    </a>

                </li>

            </ul>


            {{-- Admin --}}
            <ul class="navbar-nav ms-auto">

                <li class="nav-item">

                    <span class="nav-link">

                        <i class="bi bi-person-circle"></i>

                        Admin

                    </span>

                </li>

            </ul>

        </div>

    </nav>


    {{-- ===================================================== --}}
    {{-- SIDEBAR --}}
    {{-- ===================================================== --}}

    <aside class="app-sidebar bg-dark shadow"
           data-bs-theme="dark">


        {{-- BRAND --}}
        <div class="sidebar-brand">

            <a href="{{ route('admin.dashboard') }}"
               class="brand-link">

                <span class="brand-text">
                    Bouquet Store
                </span>

            </a>

        </div>


        {{-- SIDEBAR WRAPPER --}}
        <div class="sidebar-wrapper">

            <nav class="mt-2">

                <ul class="nav sidebar-menu flex-column"
                    role="menu">


                    {{-- ================================================= --}}
                    {{-- DASHBOARD --}}
                    {{-- ================================================= --}}

                    <li class="nav-item">

                        <a href="{{ route('admin.dashboard') }}"
                           class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">

                            <i class="nav-icon bi bi-speedometer2"></i>

                            <p>
                                Dashboard
                            </p>

                        </a>

                    </li>


                    {{-- ================================================= --}}
                    {{-- DATA CUSTOMER --}}
                    {{-- ================================================= --}}

                    <li class="nav-item">

                        <a href="{{ route('admin.customer.index') }}"
                           class="nav-link {{ request()->routeIs('admin.customer.*') ? 'active' : '' }}">

                            <i class="nav-icon bi bi-people"></i>

                            <p>
                                Data Customer
                            </p>

                        </a>

                    </li>


                    {{-- ================================================= --}}
                    {{-- PEMESANAN --}}
                    {{-- ================================================= --}}

                    <li class="nav-item">

                        <a href="{{ route('admin.pemesanan.index') }}"
                           class="nav-link {{ request()->routeIs('admin.pemesanan.*') ? 'active' : '' }}">

                            <span class="nav-icon">

                                <svg class="sidebar-svg"
                                     viewBox="0 0 24 24">

                                    <circle
                                        cx="9"
                                        cy="20"
                                        r="1.5">
                                    </circle>

                                    <circle
                                        cx="19"
                                        cy="20"
                                        r="1.5">
                                    </circle>

                                    <path
                                        d="M3 4h2l2.4 11.5a2 2 0 0 0 2 1.5h7.8a2 2 0 0 0 2-1.5L21 8H6">
                                    </path>

                                    <path
                                        d="M8 8h11">
                                    </path>

                                </svg>

                            </span>

                            <p>
                                Pemesanan
                            </p>

                        </a>

                    </li>


                    {{-- ================================================= --}}
                    {{-- AKSESORIS --}}
                    {{-- ================================================= --}}

                    <li class="nav-item">

                        <a href="{{ route('admin.aksesoris.index') }}"
                           class="nav-link {{ request()->routeIs('admin.aksesoris.*') ? 'active' : '' }}">

                            <i class="nav-icon bi bi-gift"></i>

                            <p>
                                Aksesoris
                            </p>

                        </a>

                    </li>


                    {{-- ================================================= --}}
                    {{-- KATEGORI BOUQUET --}}
                    {{-- ================================================= --}}

                    <li class="nav-item">

                        <a href="{{ route('admin.kategori-bouquet.index') }}"
                           class="nav-link {{ request()->routeIs('admin.kategori-bouquet.*') ? 'active' : '' }}">

                            <i class="nav-icon bi bi-tags"></i>

                            <p>
                                Kategori Bouquet
                            </p>

                        </a>

                    </li>


                    {{-- ================================================= --}}
                    {{-- DATA PETUGAS --}}
                    {{-- ================================================= --}}

                    <li class="nav-item">

                        <a href="{{ route('admin.petugas.index') }}"
                           class="nav-link {{ request()->routeIs('admin.petugas.*') ? 'active' : '' }}">

                            <i class="nav-icon bi bi-person-badge"></i>

                            <p>
                                Data Petugas
                            </p>

                        </a>

                    </li>


                    {{-- ================================================= --}}
                    {{-- RIWAYAT --}}
                    {{-- ================================================= --}}

                    <li class="nav-item">

                        <a href="{{ route('admin.riwayat.index') }}"
                           class="nav-link {{ request()->routeIs('admin.riwayat.*') ? 'active' : '' }}">

                            <i class="nav-icon bi bi-clock-history"></i>

                            <p>
                                Riwayat
                            </p>

                        </a>

                    </li>


                    {{-- ================================================= --}}
                    {{-- LOGOUT --}}
                    {{-- ================================================= --}}

                    <li class="nav-item mt-2">

                        <form action="{{ route('logout') }}"
                              method="POST">

                            @csrf

                            <button type="submit"
                                    class="nav-link border-0 bg-transparent w-100 text-start">

                                <i class="nav-icon bi bi-box-arrow-right"></i>

                                <p>
                                    Logout
                                </p>

                            </button>

                        </form>

                    </li>


                </ul>

            </nav>

        </div>

    </aside>


    {{-- ===================================================== --}}
    {{-- MAIN --}}
    {{-- ===================================================== --}}

    <main class="app-main">


        {{-- HEADER --}}
        <div class="app-content-header">

            <div class="container-fluid">

                <div class="row">

                    <div class="col-sm-6">

                        <h3 class="mb-0">
                            @yield('title')
                        </h3>

                    </div>


                    <div class="col-sm-6">

                        <ol class="breadcrumb float-sm-end">

                            <li class="breadcrumb-item">
                                Admin
                            </li>

                            <li class="breadcrumb-item active">
                                @yield('title')
                            </li>

                        </ol>

                    </div>

                </div>

            </div>

        </div>


        {{-- CONTENT --}}
        <div class="app-content">

            <div class="container-fluid">

                @yield('content')

            </div>

        </div>

    </main>


    {{-- ===================================================== --}}
    {{-- FOOTER --}}
    {{-- ===================================================== --}}

    <footer class="app-footer">

        <div class="float-end d-none d-sm-inline">
            Bouquet Store
        </div>

    </footer>


</div>


{{-- ========================================================= --}}
{{-- ADMINLTE JS --}}
{{-- ========================================================= --}}

<script
    src="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0/dist/js/adminlte.min.js"
    defer>
</script>


</body>

</html>