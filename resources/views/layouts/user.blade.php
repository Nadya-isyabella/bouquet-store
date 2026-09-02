<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'Dashboard User') - Bouquet Store
    </title>

    <!-- =====================================================
         BOOTSTRAP ICONS
    ====================================================== -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <style>

        /* =====================================================
           RESET
        ===================================================== */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            min-height: 100%;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f8f6f7;
            color: #333;
        }


        /* =====================================================
           SIDEBAR
        ===================================================== */

        .user-sidebar {
            position: fixed;
            top: 0;
            left: 0;

            width: 260px;
            height: 100vh;

            background: #ffffff;
            border-right: 1px solid #eeeeee;

            z-index: 1000;

            display: flex;
            flex-direction: column;

            overflow: hidden;
        }


        /* =====================================================
           LOGO
        ===================================================== */

        .sidebar-logo {
            height: 85px;
            flex-shrink: 0;

            display: flex;
            align-items: center;

            padding: 0 24px;

            border-bottom: 1px solid #f0f0f0;
        }

        .sidebar-logo .logo-icon {
            width: 46px;
            height: 46px;

            flex-shrink: 0;

            border-radius: 13px;

            background: #e8a6b7;
            color: #ffffff;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 23px;

            margin-right: 13px;
        }

        .sidebar-logo h3 {
            font-size: 19px;
            line-height: 1.2;

            color: #333333;
            font-weight: 700;

            white-space: nowrap;
        }

        .sidebar-logo span {
            display: block;

            font-size: 12px;
            color: #999999;

            margin-top: 4px;
        }


        /* =====================================================
           MENU AREA
        ===================================================== */

        .sidebar-menu {
            flex: 1;

            padding: 30px 16px 20px;

            overflow-y: auto;
            overflow-x: hidden;
        }


        /* =====================================================
           SCROLLBAR
        ===================================================== */

        .sidebar-menu::-webkit-scrollbar {
            width: 5px;
        }

        .sidebar-menu::-webkit-scrollbar-thumb {
            background: #eeeeee;
            border-radius: 10px;
        }


        /* =====================================================
           MENU TITLE
        ===================================================== */

        .menu-title {
            font-size: 12px;

            font-weight: 700;

            color: #a0a0a0;

            text-transform: uppercase;

            letter-spacing: 1px;

            padding: 0 14px;

            margin-bottom: 12px;
        }


        /* =====================================================
           MENU ITEM
        ===================================================== */

        .menu-item {
            width: 100%;
            margin-bottom: 5px;
        }


        /* =====================================================
           MENU LINK
        ===================================================== */

        .menu-link {
            width: 100%;
            min-height: 48px;

            display: flex;
            align-items: center;

            gap: 14px;

            padding: 12px 14px;

            border-radius: 12px;

            color: #666666;

            text-decoration: none !important;

            font-size: 15px;

            font-weight: 400;

            transition:
                background 0.2s ease,
                color 0.2s ease,
                box-shadow 0.2s ease;
        }


        /* =====================================================
           MENU ICON
        ===================================================== */

        .menu-link i {
            width: 24px;

            flex-shrink: 0;

            text-align: center;

            font-size: 21px;

            color: #666666;

            transition: color 0.2s ease;
        }


        /* =====================================================
           MENU TEXT
        ===================================================== */

        .menu-link span {
            line-height: 1;

            white-space: nowrap;
        }


        /* =====================================================
           HOVER
        ===================================================== */

        .menu-link:hover {
            background: #fff1f4;

            color: #d77f98;

            text-decoration: none !important;
        }

        .menu-link:hover i {
            color: #d77f98;
        }


        /* =====================================================
           ACTIVE
        ===================================================== */

        .menu-link.active {
            background: #e8a6b7;

            color: #ffffff;

            font-weight: 600;

            box-shadow:
                0 5px 15px rgba(232, 166, 183, 0.25);
        }

        .menu-link.active i {
            color: #ffffff;
        }


        /* =====================================================
           LOGOUT AREA
        ===================================================== */

        .sidebar-bottom {
            flex-shrink: 0;

            padding: 15px 16px 20px;

            background: #ffffff;

            border-top: 1px solid #f3f3f3;
        }

        .logout-form {
            width: 100%;
        }

        .logout-button {
            width: 100%;

            border: none;

            background: #fff1f4;

            color: #d77f98;

            padding: 12px 14px;

            border-radius: 10px;

            display: flex;
            align-items: center;

            gap: 14px;

            font-family: inherit;

            font-size: 15px;

            cursor: pointer;

            transition:
                background 0.2s ease,
                color 0.2s ease;
        }

        .logout-button:hover {
            background: #e8a6b7;

            color: #ffffff;
        }

        .logout-button i {
            width: 24px;

            text-align: center;

            font-size: 20px;
        }

        .logout-button span {
            line-height: 1;
        }


        /* =====================================================
           MAIN CONTENT
        ===================================================== */

        .user-main {
            margin-left: 260px;

            min-height: 100vh;

            background: #f8f6f7;
        }


        /* =====================================================
           TOPBAR
        ===================================================== */

        .user-topbar {
            height: 85px;

            background: #ffffff;

            border-bottom: 1px solid #eeeeee;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 0 35px;
        }


        /* =====================================================
           PAGE TITLE
        ===================================================== */

        .page-title {
            min-width: 0;
        }

        .page-title h2 {
            font-size: 21px;

            font-weight: 700;

            color: #333333;

            margin: 0;
        }

        .page-title p {
            font-size: 12px;

            color: #999999;

            margin-top: 4px;
        }


        /* =====================================================
           USER PROFILE
        ===================================================== */

        .user-profile {
            display: flex;

            align-items: center;

            gap: 10px;
        }

        .user-avatar {
            width: 42px;
            height: 42px;

            flex-shrink: 0;

            background: #f3c1ce;

            color: #ffffff;

            border-radius: 50%;

            display: flex;

            align-items: center;
            justify-content: center;

            font-weight: 700;

            font-size: 16px;
        }

        .user-info strong {
            display: block;

            font-size: 13px;

            color: #333333;

            line-height: 1.3;
        }

        .user-info span {
            display: block;

            font-size: 11px;

            color: #999999;

            margin-top: 2px;
        }


        /* =====================================================
           CONTENT
        ===================================================== */

        .user-content {
            padding: 30px 35px;

            min-height: calc(100vh - 85px);
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 900px) {

            .user-sidebar {
                width: 230px;
            }

            .user-main {
                margin-left: 230px;
            }

            .user-topbar {
                padding: 0 25px;
            }

            .user-content {
                padding: 25px;
            }
        }


        @media (max-width: 700px) {

            .user-sidebar {
                width: 210px;
            }

            .user-main {
                margin-left: 210px;
            }

            .sidebar-logo {
                padding: 0 18px;
            }

            .sidebar-logo h3 {
                font-size: 17px;
            }

            .sidebar-menu {
                padding-left: 12px;
                padding-right: 12px;
            }

            .sidebar-bottom {
                padding-left: 12px;
                padding-right: 12px;
            }

            .user-topbar {
                padding: 0 18px;
            }

            .user-content {
                padding: 20px;
            }

            .user-info {
                display: none;
            }
        }


        @media (max-width: 500px) {

            .user-sidebar {
                width: 75px;
            }

            .user-main {
                margin-left: 75px;
            }

            .sidebar-logo {
                height: 75px;

                padding: 0;

                justify-content: center;
            }

            .sidebar-logo .logo-icon {
                margin: 0;

                width: 43px;
                height: 43px;
            }

            .sidebar-logo > div:last-child {
                display: none;
            }

            .sidebar-menu {
                padding: 20px 8px;
            }

            .menu-title {
                display: none;
            }

            .menu-item {
                margin-bottom: 7px;
            }

            .menu-link {
                justify-content: center;

                padding: 13px 5px;

                gap: 0;
            }

            .menu-link i {
                font-size: 21px;
            }

            .menu-link span {
                display: none;
            }

            .sidebar-bottom {
                padding: 10px 8px 15px;
            }

            .logout-button {
                justify-content: center;

                padding: 13px 5px;
            }

            .logout-button span {
                display: none;
            }

            .logout-button i {
                font-size: 21px;
            }

            .user-topbar {
                height: 75px;

                padding: 0 15px;
            }

            .page-title h2 {
                font-size: 18px;
            }

            .page-title p {
                display: none;
            }

            .user-content {
                min-height: calc(100vh - 75px);

                padding: 15px;
            }
        }

    </style>

    @stack('styles')

</head>


<body>

    <!-- =====================================================
         DATA PEMESANAN TERBARU USER
    ====================================================== -->

    @php

        $customerUser = null;
        $pemesananTerbaru = null;

        if (auth()->check()) {

            $customerUser = \App\Models\Customer::where(
                'email',
                auth()->user()->email
            )->first();

            if ($customerUser) {

                $pemesananTerbaru = $customerUser
                    ->pemesanans()
                    ->latest()
                    ->first();
            }
        }

    @endphp


    <!-- =====================================================
         SIDEBAR USER
    ====================================================== -->

    <aside class="user-sidebar">


        <!-- =================================================
             LOGO
        ================================================== -->

        <div class="sidebar-logo">

            <div class="logo-icon">

                <i class="bi bi-flower1"></i>

            </div>

            <div>

                <h3>
                    Bouquet Store
                </h3>

                <span>
                    User Panel
                </span>

            </div>

        </div>


        <!-- =================================================
             MENU
        ================================================== -->

        <div class="sidebar-menu">

            <div class="menu-title">
                Menu Utama
            </div>


            <!-- =================================================
                 DASHBOARD
            ================================================== -->

            <div class="menu-item">

                <a
                    href="{{ route('user.dashboard') }}"
                    class="menu-link {{ request()->routeIs('user.dashboard') ? 'active' : '' }}"
                >

                    <i class="bi bi-house-door"></i>

                    <span>
                        Dashboard
                    </span>

                </a>

            </div>

             <div class="menu-item">

                <a
                    href="{{ route('user.pesanan.index') }}"
                    class="menu-link {{ request()->routeIs('user.pesanan.*') ? 'active' : '' }}"
                >

                    <i class="bi bi-flower1"></i>

                    <span>
                            Pesanan
                    </span>

                </a>

            </div>


            <!-- =================================================
                 STATUS BOUQUET
            ================================================== -->

            <div class="menu-item">

                <a
                    href="{{ route('user.bouquet.index') }}"
                    class="menu-link {{ request()->routeIs('user.bouquet.*') ? 'active' : '' }}"
                >

                 <i class="bi bi-clock-history"></i>
                    <span>
                        Status Bouquet
                    </span>

                </a>

            </div>


            <!-- =================================================
                 PEMBAYARAN

                 Route membutuhkan:
                 user/pembayaran/{pemesanan}

                 Jadi harus mengirim ID pemesanan.
            ================================================== -->

           


            <!-- =================================================
                 RIWAYAT
            ================================================== -->

            <div class="menu-item">

                <a
                    href="{{ route('user.riwayat.index') }}"
                    class="menu-link {{ request()->routeIs('user.riwayat.*') ? 'active' : '' }}"
                >

                    <i class="bi bi-check-square"></i>

                    <span>
                        Riwayat
                    </span>

                </a>

            </div>

        </div>


        <!-- =====================================================
             LOGOUT
        ====================================================== -->

        <div class="sidebar-bottom">

            <form
                method="POST"
                action="{{ route('logout') }}"
                class="logout-form"
            >

                @csrf

                <button
                    type="submit"
                    class="logout-button"
                >

                    <i class="bi bi-box-arrow-right"></i>

                    <span>
                        Logout
                    </span>

                </button>

            </form>

        </div>

    </aside>


    <!-- =====================================================
         MAIN CONTENT
    ====================================================== -->

    <main class="user-main">


        <!-- =================================================
             TOPBAR
        ================================================== -->

        <header class="user-topbar">


            <!-- PAGE TITLE -->

            <div class="page-title">

                <h2>
                    @yield('page-title', 'Dashboard')
                </h2>

                <p>
                    Selamat datang di Bouquet Store 🌷
                </p>

            </div>


            <!-- USER PROFILE -->

            <div class="user-profile">

                <div class="user-avatar">

                    {{ strtoupper(
                        substr(
                            auth()->user()->name ?? 'U',
                            0,
                            1
                        )
                    ) }}

                </div>

                <div class="user-info">

                    <strong>
                        {{ auth()->user()->name ?? 'User' }}
                    </strong>

                    <span>
                        Customer
                    </span>

                </div>

            </div>

        </header>


        <!-- =================================================
             CONTENT
        ================================================== -->

        <section class="user-content">

            @yield('content')

        </section>

    </main>


    @stack('scripts')

</body>

</html>