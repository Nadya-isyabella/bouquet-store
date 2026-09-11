<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bouquet Store — Hadiah Spesial untuk Semua Momen</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

    <!-- Font Awesome 6 (gratis) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <style>
        /* ───────────── RESET & BASE ───────────── */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --rose: #b85c78;
            --rose-light: #e9a8bc;
            --rose-pale: #f7d7e1;
            --rose-soft: #fff8fa;
            --dark: #3d3035;
            --muted: #76666c;
            --gold: #d4af37;
            --gold-light: #f3e5ab;
            --shadow: 0 20px 60px rgba(184, 92, 120, 0.20);
            --shadow-sm: 0 8px 24px rgba(184, 92, 120, 0.10);
            --radius: 20px;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--rose-soft);
            color: var(--dark);
            overflow-x: hidden;
            line-height: 1.6;
        }

        h1,
        h2,
        h3,
        .logo {
            font-family: 'Playfair Display', serif;
        }

        a {
            text-decoration: none;
        }

        /* ───────────── SCROLLBAR ───────────── */
        ::-webkit-scrollbar {
            width: 10px;
        }
        ::-webkit-scrollbar-track {
            background: var(--rose-soft);
        }
        ::-webkit-scrollbar-thumb {
            background: var(--rose);
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #994a63;
        }

        /* ───────────── ANIMATIONS ───────────── */
        @keyframes fadeDown {
            0% {
                opacity: 0;
                transform: translateY(-30px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeUp {
            0% {
                opacity: 0;
                transform: translateY(40px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {
            0% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-16px);
            }
            100% {
                transform: translateY(0px);
            }
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.04);
            }
            100% {
                transform: scale(1);
            }
        }

        @keyframes shimmer {
            0% {
                background-position: -200% center;
            }
            100% {
                background-position: 200% center;
            }
        }

        @keyframes spinSlow {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

        .animate-on-scroll {
            opacity: 0;
            transform: translateY(40px);
            transition: all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .animate-on-scroll.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* ───────────── NAVBAR ───────────── */
        nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 8%;
            background: rgba(255, 255, 255, 0.80);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(243, 225, 231, 0.6);
            transition: box-shadow 0.3s;
        }

        nav.scrolled {
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.06);
        }

        .logo {
            font-size: 28px;
            font-weight: 700;
            color: var(--rose);
            letter-spacing: -0.5px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .logo i {
            font-size: 26px;
            color: var(--gold);
        }

        .logo span {
            color: var(--gold);
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 32px;
        }

        /* ─── Hanya link biasa yang dapat underline ─── */
        .nav-menu a:not(.btn-login):not(.btn-register) {
            text-decoration: none;
            color: var(--dark);
            font-size: 15px;
            font-weight: 500;
            position: relative;
            transition: color 0.3s;
        }

        .nav-menu a:not(.btn-login):not(.btn-register)::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 0;
            height: 2.5px;
            background: var(--rose);
            border-radius: 4px;
            transition: width 0.3s ease;
        }

        .nav-menu a:not(.btn-login):not(.btn-register):hover {
            color: var(--rose);
        }
        .nav-menu a:not(.btn-login):not(.btn-register):hover::after {
            width: 100%;
        }

        /* ─── Tombol Login & Register (tanpa underline) ─── */
        .nav-menu .btn-login,
        .nav-menu .btn-register {
            padding: 10px 24px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            text-decoration: none; /* hilangkan underline bawaan link */
        }

        /* Pastikan pseudo-elemen tidak muncul */
        .nav-menu .btn-login::after,
        .nav-menu .btn-register::after {
            display: none !important;
            content: none !important;
            width: 0 !important;
            height: 0 !important;
        }

        .nav-menu .btn-login {
            border: 2px solid var(--rose);
            color: var(--rose) !important;
            background: transparent;
        }
        .nav-menu .btn-login:hover {
            background: var(--rose);
            color: #fff !important;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(184, 92, 120, 0.30);
        }

        .nav-menu .btn-register {
            background: var(--rose);
            color: #fff !important;
            border: 2px solid var(--rose);
        }
        .nav-menu .btn-register:hover {
            background: #994a63;
            border-color: #994a63;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(184, 92, 120, 0.35);
        }

        /* ───────────── HERO ───────────── */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 120px 8% 80px;
            gap: 50px;
            position: relative;
            overflow: hidden;
            background: linear-gradient(145deg, #fff8fa 0%, #fdf0f4 100%);
        }

        .hero::before {
            content: '';
            position: absolute;
            top: -20%;
            right: -10%;
            width: 600px;
            height: 600px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(233, 168, 188, 0.20) 0%, transparent 70%);
            pointer-events: none;
        }

        .hero::after {
            content: '';
            position: absolute;
            bottom: -10%;
            left: -5%;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(212, 175, 55, 0.10) 0%, transparent 70%);
            pointer-events: none;
        }

        .hero-text {
            max-width: 580px;
            position: relative;
            z-index: 2;
            animation: fadeDown 1s ease forwards;
        }

        .hero-text .badge {
            display: inline-block;
            background: linear-gradient(135deg, var(--rose-pale), var(--rose-light));
            color: var(--rose);
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 2px;
            padding: 6px 18px;
            border-radius: 50px;
            margin-bottom: 18px;
            text-transform: uppercase;
        }

        .hero-text h1 {
            font-size: 58px;
            line-height: 1.12;
            margin-bottom: 18px;
            color: var(--dark);
            font-weight: 700;
        }

        .hero-text h1 span {
            color: var(--rose);
            position: relative;
        }

        .hero-text h1 span::after {
            content: '✨';
            font-size: 30px;
            position: absolute;
            top: -20px;
            right: -40px;
            animation: float 3s ease-in-out infinite;
        }

        .hero-text p {
            color: var(--muted);
            font-size: 17px;
            line-height: 1.8;
            margin-bottom: 32px;
            max-width: 480px;
        }

        .hero-buttons {
            display: flex;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap;
        }

        .hero-btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: var(--rose);
            color: #fff;
            padding: 16px 34px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s;
            border: 2px solid var(--rose);
            box-shadow: 0 8px 28px rgba(184, 92, 120, 0.30);
        }

        .hero-btn-primary:hover {
            background: #994a63;
            border-color: #994a63;
            transform: translateY(-4px);
            box-shadow: 0 14px 40px rgba(184, 92, 120, 0.40);
        }

        .hero-btn-secondary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--dark);
            font-weight: 500;
            padding: 16px 28px;
            border-radius: 50px;
            border: 2px solid #e0d0d6;
            transition: all 0.3s;
        }

        .hero-btn-secondary:hover {
            border-color: var(--rose);
            color: var(--rose);
            transform: translateY(-4px);
        }

        .hero-image {
            position: relative;
            z-index: 2;
            width: 440px;
            height: 440px;
            border-radius: 50%;
            background: linear-gradient(145deg, var(--rose-pale), var(--rose-light));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 180px;
            box-shadow: var(--shadow);
            animation: float 5s ease-in-out infinite;
            flex-shrink: 0;
            border: 6px solid rgba(255, 255, 255, 0.60);
        }

        .hero-image .ring {
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 2px dashed rgba(184, 92, 120, 0.20);
            animation: spinSlow 40s linear infinite;
        }

        .hero-image .ring2 {
            position: absolute;
            width: 115%;
            height: 115%;
            border-radius: 50%;
            border: 1.5px dashed rgba(212, 175, 55, 0.15);
            animation: spinSlow 60s linear infinite reverse;
        }

        .float-icon {
            position: absolute;
            font-size: 36px;
            opacity: 0.5;
            animation: float 6s ease-in-out infinite;
            pointer-events: none;
            z-index: 1;
        }
        .float-icon:nth-child(1) {
            top: 8%;
            left: 4%;
            animation-delay: 0s;
        }
        .float-icon:nth-child(2) {
            bottom: 10%;
            right: 3%;
            animation-delay: 2s;
            font-size: 28px;
        }
        .float-icon:nth-child(3) {
            top: 20%;
            right: 15%;
            animation-delay: 4s;
            font-size: 22px;
            opacity: 0.35;
        }

        /* ───────────── CATEGORY ───────────── */
        .category {
            padding: 90px 8% 80px;
            background: #ffffff;
            text-align: center;
            position: relative;
        }

        .category::before {
            content: '🌸';
            position: absolute;
            top: 30px;
            right: 6%;
            font-size: 50px;
            opacity: 0.15;
            transform: rotate(15deg);
        }

        .category::after {
            content: '🌷';
            position: absolute;
            bottom: 30px;
            left: 6%;
            font-size: 40px;
            opacity: 0.12;
            transform: rotate(-10deg);
        }

        .section-title {
            font-size: 38px;
            font-weight: 700;
            margin-bottom: 6px;
            color: var(--dark);
        }

        .section-title span {
            color: var(--rose);
        }

        .section-desc {
            color: var(--muted);
            font-size: 17px;
            margin-bottom: 48px;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            position: relative;
            z-index: 2;
        }

        .card {
            padding: 40px 30px 36px;
            border-radius: var(--radius);
            background: var(--rose-soft);
            border: 1px solid #f3e1e7;
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            position: relative;
            overflow: hidden;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(145deg, rgba(184, 92, 120, 0.04), transparent);
            opacity: 0;
            transition: opacity 0.4s;
        }

        .card:hover::before {
            opacity: 1;
        }

        .card:hover {
            transform: translateY(-12px);
            box-shadow: 0 20px 50px rgba(184, 92, 120, 0.14);
            border-color: var(--rose-light);
        }

        .card-icon {
            font-size: 60px;
            margin-bottom: 16px;
            display: block;
            transition: transform 0.4s;
        }

        .card:hover .card-icon {
            transform: scale(1.12) rotate(-6deg);
        }

        .card h3 {
            font-family: 'Playfair Display', serif;
            font-size: 24px;
            margin-bottom: 8px;
            color: var(--dark);
        }

        .card p {
            color: var(--muted);
            line-height: 1.7;
            font-size: 15px;
        }

        .card .card-tag {
            display: inline-block;
            margin-top: 14px;
            font-size: 13px;
            font-weight: 600;
            color: var(--rose);
            background: rgba(184, 92, 120, 0.10);
            padding: 4px 16px;
            border-radius: 50px;
            transition: background 0.3s;
        }

        .card:hover .card-tag {
            background: rgba(184, 92, 120, 0.18);
        }

        /* ───────────── ABOUT ───────────── */
        .about {
            padding: 90px 8% 80px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 60px;
            background: linear-gradient(165deg, #fff8fa, #fdf0f4);
        }

        .about-box {
            flex: 1;
            animation: fadeUp 1s ease forwards;
        }

        .about-box .badge {
            display: inline-block;
            background: var(--rose-pale);
            color: var(--rose);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1.5px;
            padding: 4px 16px;
            border-radius: 50px;
            text-transform: uppercase;
            margin-bottom: 12px;
        }

        .about-box h2 {
            font-size: 40px;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 18px;
        }

        .about-box h2 span {
            color: var(--rose);
        }

        .about-box p {
            color: var(--muted);
            line-height: 1.9;
            font-size: 16px;
            max-width: 500px;
        }

        .about-box .about-stats {
            display: flex;
            gap: 40px;
            margin-top: 30px;
        }

        .about-box .stat-item {
            text-align: left;
        }

        .about-box .stat-item .number {
            font-size: 32px;
            font-weight: 700;
            color: var(--rose);
            font-family: 'Playfair Display', serif;
        }

        .about-box .stat-item .label {
            font-size: 14px;
            color: var(--muted);
        }

        .about-highlight {
            flex: 1;
            background: linear-gradient(145deg, #f8dce5, #f2ccda);
            border-radius: var(--radius);
            padding: 50px 40px;
            text-align: center;
            box-shadow: var(--shadow-sm);
            transition: transform 0.4s;
            position: relative;
            overflow: hidden;
        }

        .about-highlight:hover {
            transform: translateY(-6px);
        }

        .about-highlight .flower {
            font-size: 90px;
            margin-bottom: 10px;
            display: block;
            animation: float 4s ease-in-out infinite;
        }

        .about-highlight h3 {
            font-size: 28px;
            color: #9e4f69;
            margin-bottom: 8px;
        }

        .about-highlight p {
            color: #7a4b5a;
            font-size: 15px;
            max-width: 300px;
            margin: 0 auto;
        }

        .about-highlight .deco-dots {
            position: absolute;
            bottom: 16px;
            right: 20px;
            font-size: 14px;
            letter-spacing: 6px;
            color: rgba(184, 92, 120, 0.20);
        }

        /* ───────────── FOOTER ───────────── */
        footer {
            background: var(--dark);
            color: #fff;
            padding: 40px 8% 30px;
            text-align: center;
            position: relative;
        }

        footer::before {
            content: '💐';
            position: absolute;
            top: -18px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 36px;
            background: var(--dark);
            padding: 0 16px;
        }

        footer .footer-links {
            display: flex;
            justify-content: center;
            gap: 32px;
            flex-wrap: wrap;
            margin-bottom: 18px;
        }

        footer .footer-links a {
            color: #dccbd1;
            font-size: 14px;
            transition: color 0.3s;
        }

        footer .footer-links a:hover {
            color: var(--rose-light);
        }

        footer .social-icons {
            display: flex;
            justify-content: center;
            gap: 18px;
            margin-bottom: 20px;
        }

        footer .social-icons a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.06);
            color: #dccbd1;
            font-size: 18px;
            transition: all 0.3s;
            border: 1px solid rgba(255, 255, 255, 0.04);
        }

        footer .social-icons a:hover {
            background: var(--rose);
            color: #fff;
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(184, 92, 120, 0.30);
        }

        footer p {
            color: #b097a0;
            font-size: 14px;
            margin-top: 6px;
        }

        /* ───────────── RESPONSIVE ───────────── */
        @media (max-width: 1024px) {
            .hero-text h1 {
                font-size: 48px;
            }
            .hero-image {
                width: 360px;
                height: 360px;
                font-size: 140px;
            }
        }

        @media (max-width: 860px) {
            .nav-menu a:not(.btn-login):not(.btn-register) {
                display: none;
            }

            .hero {
                flex-direction: column;
                text-align: center;
                padding-top: 100px;
                padding-bottom: 50px;
            }

            .hero-text {
                max-width: 100%;
            }

            .hero-text p {
                max-width: 100%;
                margin-left: auto;
                margin-right: auto;
            }

            .hero-buttons {
                justify-content: center;
            }

            .hero-text h1 span::after {
                display: none;
            }

            .hero-image {
                width: 280px;
                height: 280px;
                font-size: 100px;
            }

            .cards {
                grid-template-columns: 1fr;
                max-width: 420px;
                margin: 0 auto;
            }

            .about {
                flex-direction: column;
                text-align: center;
            }

            .about-box p {
                max-width: 100%;
                margin-left: auto;
                margin-right: auto;
            }

            .about-box .about-stats {
                justify-content: center;
            }

            .about-box .stat-item {
                text-align: center;
            }

            .section-title {
                font-size: 30px;
            }

            .float-icon {
                display: none;
            }
        }

        @media (max-width: 480px) {
            nav {
                padding: 0 5%;
                height: 70px;
            }

            .logo {
                font-size: 22px;
            }
            .logo i {
                font-size: 20px;
            }

            .nav-menu {
                gap: 12px;
            }

            .nav-menu .btn-login,
            .nav-menu .btn-register {
                padding: 8px 16px;
                font-size: 12px;
            }

            .hero-text h1 {
                font-size: 34px;
            }

            .hero-image {
                width: 220px;
                height: 220px;
                font-size: 80px;
            }

            .hero-btn-primary,
            .hero-btn-secondary {
                padding: 12px 22px;
                font-size: 14px;
            }

            .about-box h2 {
                font-size: 30px;
            }

            .about-highlight {
                padding: 30px 20px;
            }
            .about-highlight .flower {
                font-size: 60px;
            }
        }
    </style>
</head>

<body>

    <!-- ─── NAVBAR ─── -->
    <nav id="navbar">
        <a href="#" class="logo">
            <i class="fas fa-seedling"></i>
            Bouquet<span>Store</span>
        </a>

        <div class="nav-menu">
            <a href="#home">Beranda</a>
            <a href="#bouquet">Bouquet</a>
            <a href="#about">Tentang</a>

            @auth
            <a href="{{ url('/dashboard') }}" class="btn-register">
                <i class="fas fa-user-circle"></i> Dashboard
            </a>
            @else
            <a href="{{ route('login') }}" class="btn-login">
                <i class="fas fa-sign-in-alt"></i> Login
            </a>
            <a href="{{ route('register') }}" class="btn-register">
                <i class="fas fa-user-plus"></i> Register
            </a>
            @endauth
        </div>
    </nav>

    <!-- ─── HERO ─── -->
    <section class="hero" id="home">

        <!-- floating decorative -->
        <span class="float-icon">🌺</span>
        <span class="float-icon">🌸</span>
        <span class="float-icon">🌼</span>

        <div class="hero-text">
            <div class="badge">
                <i class="fas fa-star" style="color: var(--gold);"></i> &nbsp; Terbaik Sepanjang Tahun
            </div>

            <h1>
                Berikan Kebahagiaan<br />
                dengan <span>Buket Indah</span>
            </h1>

            <p>
                Temukan berbagai pilihan bouquet cantik untuk orang tersayang.
                Cocok untuk ulang tahun, wisuda, anniversary, dan segala momen spesial.
            </p>

            <div class="hero-buttons">
                <a href="{{ route('register') }}" class="hero-btn-primary">
                    <i class="fas fa-shopping-bag"></i> Mulai Belanja
                </a>
                <a href="#bouquet" class="hero-btn-secondary">
                    <i class="fas fa-arrow-right"></i> Lihat Koleksi
                </a>
            </div>
        </div>

        <div class="hero-image">
            <div class="ring"></div>
            <div class="ring2"></div>
            💐
        </div>

    </section>

    <!-- ─── CATEGORY ─── -->
    <section class="category" id="bouquet">

        <h2 class="section-title animate-on-scroll">
            Pilihan <span>Bouquet</span>
        </h2>

        <p class="section-desc animate-on-scroll">
            Pilih bouquet yang paling sesuai dengan momen spesialmu
        </p>

        <div class="cards">

            <div class="card animate-on-scroll">
                <span class="card-icon">🌹</span>
                <h3>Flower Bouquet</h3>
                <p>Bouquet bunga cantik dengan berbagai pilihan warna dan jenis bunga segar.</p>
                <span class="card-tag"><i class="fas fa-leaf"></i> Segar &amp; Harum</span>
            </div>

            <div class="card animate-on-scroll">
                <span class="card-icon">🌸</span>
                <h3>Money Bouquet</h3>
                <p>Bouquet uang kreatif yang cocok untuk hadiah ulang tahun maupun wisuda.</p>
                <span class="card-tag"><i class="fas fa-coins"></i> Hadiah Premium</span>
            </div>

            <div class="card animate-on-scroll">
                <span class="card-icon">🌷</span>
                <h3>Custom Bouquet</h3>
                <p>Buat bouquet sesuai keinginanmu untuk memberikan hadiah yang lebih personal.</p>
                <span class="card-tag"><i class="fas fa-pen-fancy"></i> 100% Personal</span>
            </div>

        </div>

    </section>

    <!-- ─── ABOUT ─── -->
    <section class="about" id="about">

        <div class="about-box animate-on-scroll">
            <div class="badge">
                <i class="fas fa-heart" style="color: var(--rose);"></i> &nbsp; Tentang Kami
            </div>

            <h2>
                Hadiah kecil, <br />
                <span>makna yang besar.</span>
            </h2>

            <p>
                Bouquet Store hadir untuk membantu kamu memberikan hadiah terbaik
                kepada orang-orang tersayang. Kami menyediakan berbagai macam
                bouquet dengan desain cantik, elegan, dan penuh makna.
            </p>

        </div>

        <div class="about-highlight animate-on-scroll">
            <span class="flower">💐</span>
            <h3>Made With Love</h3>
            <p>Setiap bouquet dibuat dengan penuh perhatian untuk momen spesialmu.</p>
            <div class="deco-dots">✦ ✦ ✦</div>
        </div>

    </section>

    <!-- ─── FOOTER ─── -->
    <footer>

        <div class="social-icons">
            <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
            <a href="#" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
            <a href="#" aria-label="TikTok"><i class="fab fa-tiktok"></i></a>
            <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
        </div>

        <div class="footer-links">
            <a href="#home">Beranda</a>
            <a href="#bouquet">Koleksi</a>
            <a href="#about">Tentang</a>
            <a href="#">Kebijakan Privasi</a>
            <a href="#">Syarat &amp; Ketentuan</a>
        </div>

        <p>
            &copy; {{ date('Y') }} Bouquet Store. Made with <i class="fas fa-heart" style="color: var(--rose-light);"></i> in Indonesia.
        </p>

    </footer>

    <!-- ─── SCRIPTS ─── -->
    <script>
        // ── Navbar shadow on scroll ──
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 20) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // ── Intersection Observer for animations ──
        const animateEls = document.querySelectorAll('.animate-on-scroll');

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, {
            threshold: 0.15,
            rootMargin: '0px 0px -40px 0px'
        });

        animateEls.forEach(el => observer.observe(el));

        // ── Smooth anchor scroll (optional enhancement) ──
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href === '#') return;
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>

</body>
</html>