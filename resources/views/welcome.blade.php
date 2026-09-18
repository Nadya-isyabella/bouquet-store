<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Bouquet Store — Hadiah Spesial untuk Semua Momen</title>

    <meta name="description"
        content="Bouquet Store menyediakan berbagai pilihan bouquet cantik untuk ulang tahun, wisuda, anniversary, dan berbagai momen spesial.">

    <style>
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
            --shadow: 0 20px 60px rgba(184, 92, 120, .20);
            --shadow-sm: 0 8px 24px rgba(184, 92, 120, .10);
            --radius: 20px;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: var(--rose-soft);
            color: var(--dark);
            overflow-x: hidden;
            line-height: 1.6;
        }

        h1,
        h2,
        h3,
        .logo {
            font-family: Georgia, "Times New Roman", serif;
        }

        a {
            text-decoration: none;
        }

        section {
            scroll-margin-top: 80px;
        }

        /* =========================
           NAVBAR
        ========================= */

        nav {
            position: fixed;
            inset: 0 0 auto;
            z-index: 1000;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 8%;
            background: rgba(255, 255, 255, .96);
            border-bottom: 1px solid rgba(243, 225, 231, .6);
            transition: box-shadow .3s ease;
        }

        nav.scrolled {
            box-shadow: 0 4px 30px rgba(0, 0, 0, .06);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 6px;
            color: var(--rose);
            font-size: 28px;
            font-weight: 700;
            letter-spacing: -.5px;
        }

        .logo span {
            color: var(--gold);
        }

        .logo-icon {
            font-family: Arial, sans-serif;
            font-size: 25px;
            color: var(--gold);
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 32px;
        }

        .nav-menu > a:not(.btn-login):not(.btn-register) {
            position: relative;
            color: var(--dark);
            font-size: 15px;
            font-weight: 500;
            transition: color .3s ease;
        }

        .nav-menu > a:not(.btn-login):not(.btn-register)::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -4px;
            width: 0;
            height: 2px;
            background: var(--rose);
            border-radius: 4px;
            transition: width .3s ease;
        }

        .nav-menu > a:not(.btn-login):not(.btn-register):hover {
            color: var(--rose);
        }

        .nav-menu > a:not(.btn-login):not(.btn-register):hover::after {
            width: 100%;
        }

        .btn-login,
        .btn-register {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 10px 24px;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 600;
            transition:
                transform .3s ease,
                background-color .3s ease,
                box-shadow .3s ease;
        }

        .btn-login {
            color: var(--rose) !important;
            background: transparent;
            border: 2px solid var(--rose);
        }

        .btn-login:hover {
            color: #fff !important;
            background: var(--rose);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(184, 92, 120, .30);
        }

        .btn-register {
            color: #fff !important;
            background: var(--rose);
            border: 2px solid var(--rose);
        }

        .btn-register:hover {
            color: #fff !important;
            background: #994a63;
            border-color: #994a63;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(184, 92, 120, .35);
        }

        /* =========================
           HERO
        ========================= */

        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 50px;
            padding: 120px 8% 80px;
            position: relative;
            overflow: hidden;
            background: linear-gradient(145deg, #fff8fa 0%, #fdf0f4 100%);
        }

        .hero::before {
            content: "";
            position: absolute;
            top: -20%;
            right: -10%;
            width: 600px;
            height: 600px;
            border-radius: 50%;
            background: radial-gradient(
                circle,
                rgba(233, 168, 188, .20) 0%,
                transparent 70%
            );
            pointer-events: none;
        }

        .hero::after {
            content: "";
            position: absolute;
            bottom: -10%;
            left: -5%;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background: radial-gradient(
                circle,
                rgba(212, 175, 55, .10) 0%,
                transparent 70%
            );
            pointer-events: none;
        }

        .hero-text {
            position: relative;
            z-index: 2;
            max-width: 580px;
        }

        .badge {
            display: inline-block;
            padding: 6px 18px;
            margin-bottom: 18px;
            border-radius: 50px;
            color: var(--rose);
            background: linear-gradient(
                135deg,
                var(--rose-pale),
                var(--rose-light)
            );
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .hero-text h1 {
            margin-bottom: 18px;
            color: var(--dark);
            font-size: 58px;
            line-height: 1.12;
            font-weight: 700;
        }

        .hero-text h1 span {
            position: relative;
            color: var(--rose);
        }

        .hero-text h1 span::after {
            content: "✨";
            position: absolute;
            top: -20px;
            right: -40px;
            font-family: Arial, sans-serif;
            font-size: 30px;
            animation: float 3s ease-in-out infinite;
        }

        .hero-text p {
            max-width: 480px;
            margin-bottom: 32px;
            color: var(--muted);
            font-size: 17px;
            line-height: 1.8;
        }

        .hero-buttons {
            display: flex;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap;
        }

        .hero-btn-primary,
        .hero-btn-secondary {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 16px 30px;
            border-radius: 50px;
            font-size: 16px;
            font-weight: 600;
            transition:
                transform .3s ease,
                background-color .3s ease,
                box-shadow .3s ease,
                border-color .3s ease,
                color .3s ease;
        }

        .hero-btn-primary {
            color: #fff;
            background: var(--rose);
            border: 2px solid var(--rose);
            box-shadow: 0 8px 28px rgba(184, 92, 120, .30);
        }

        .hero-btn-primary:hover {
            color: #fff;
            background: #994a63;
            border-color: #994a63;
            transform: translateY(-4px);
            box-shadow: 0 14px 40px rgba(184, 92, 120, .40);
        }

        .hero-btn-secondary {
            color: var(--dark);
            border: 2px solid #e0d0d6;
        }

        .hero-btn-secondary:hover {
            color: var(--rose);
            border-color: var(--rose);
            transform: translateY(-4px);
        }

        /* =========================
           HERO ILLUSTRATION
        ========================= */

        .hero-image {
            position: relative;
            z-index: 2;
            flex-shrink: 0;
            width: 440px;
            height: 440px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 6px solid rgba(255, 255, 255, .60);
            border-radius: 50%;
            background: linear-gradient(
                145deg,
                var(--rose-pale),
                var(--rose-light)
            );
            box-shadow: var(--shadow);
            font-family: Arial, sans-serif;
            font-size: 180px;
            animation: float 5s ease-in-out infinite;
        }

        .ring,
        .ring2 {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
        }

        .ring {
            inset: 0;
            border: 2px dashed rgba(184, 92, 120, .20);
            animation: spinSlow 40s linear infinite;
        }

        .ring2 {
            width: 115%;
            height: 115%;
            border: 1.5px dashed rgba(212, 175, 55, .15);
            animation: spinSlow 60s linear infinite reverse;
        }

        .float-icon {
            position: absolute;
            z-index: 1;
            font-family: Arial, sans-serif;
            font-size: 36px;
            opacity: .5;
            pointer-events: none;
            animation: float 6s ease-in-out infinite;
        }

        .float-icon:nth-child(1) {
            top: 8%;
            left: 4%;
        }

        .float-icon:nth-child(2) {
            right: 3%;
            bottom: 10%;
            font-size: 28px;
            animation-delay: 2s;
        }

        .float-icon:nth-child(3) {
            top: 20%;
            right: 15%;
            font-size: 22px;
            opacity: .35;
            animation-delay: 4s;
        }

        /* =========================
           ANIMATION
        ========================= */

        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-16px);
            }
        }

        @keyframes spinSlow {
            from {
                transform: rotate(0);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .animate-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition:
                opacity .6s ease,
                transform .6s ease;
        }

        .animate-on-scroll.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* =========================
           CATEGORY
        ========================= */

        .category {
            position: relative;
            padding: 90px 8% 80px;
            background: #fff;
            text-align: center;
            content-visibility: auto;
            contain-intrinsic-size: 700px;
        }

        .category::before {
            content: "🌸";
            position: absolute;
            top: 30px;
            right: 6%;
            font-size: 50px;
            opacity: .15;
            transform: rotate(15deg);
        }

        .category::after {
            content: "🌷";
            position: absolute;
            bottom: 30px;
            left: 6%;
            font-size: 40px;
            opacity: .12;
            transform: rotate(-10deg);
        }

        .section-title {
            margin-bottom: 6px;
            color: var(--dark);
            font-size: 38px;
            font-weight: 700;
        }

        .section-title span {
            color: var(--rose);
        }

        .section-desc {
            max-width: 500px;
            margin: 0 auto 48px;
            color: var(--muted);
            font-size: 17px;
        }

        .cards {
            position: relative;
            z-index: 2;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .card {
            position: relative;
            overflow: hidden;
            padding: 40px 30px 36px;
            border: 1px solid #f3e1e7;
            border-radius: var(--radius);
            background: var(--rose-soft);
            transition:
                transform .3s ease,
                box-shadow .3s ease,
                border-color .3s ease;
        }

        .card::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(
                145deg,
                rgba(184, 92, 120, .04),
                transparent
            );
            opacity: 0;
            transition: opacity .3s ease;
        }

        .card:hover {
            transform: translateY(-8px);
            border-color: var(--rose-light);
            box-shadow: 0 20px 50px rgba(184, 92, 120, .14);
        }

        .card:hover::before {
            opacity: 1;
        }

        .card-icon {
            display: block;
            margin-bottom: 16px;
            font-family: Arial, sans-serif;
            font-size: 60px;
            transition: transform .3s ease;
        }

        .card:hover .card-icon {
            transform: scale(1.08) rotate(-5deg);
        }

        .card h3 {
            margin-bottom: 8px;
            color: var(--dark);
            font-family: Georgia, "Times New Roman", serif;
            font-size: 24px;
        }

        .card p {
            color: var(--muted);
            font-size: 15px;
            line-height: 1.7;
        }

        .card-tag {
            display: inline-block;
            margin-top: 14px;
            padding: 4px 16px;
            border-radius: 50px;
            color: var(--rose);
            background: rgba(184, 92, 120, .10);
            font-size: 13px;
            font-weight: 600;
        }

        /* =========================
           ABOUT
        ========================= */

        .about {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 60px;
            padding: 90px 8% 80px;
            background: linear-gradient(
                165deg,
                #fff8fa,
                #fdf0f4
            );
            content-visibility: auto;
            contain-intrinsic-size: 600px;
        }

        .about-box,
        .about-highlight {
            flex: 1;
        }

        .about-box .badge {
            margin-bottom: 12px;
            background: var(--rose-pale);
            font-size: 12px;
            letter-spacing: 1.5px;
        }

        .about-box h2 {
            margin-bottom: 18px;
            font-size: 40px;
            line-height: 1.2;
        }

        .about-box h2 span {
            color: var(--rose);
        }

        .about-box p {
            max-width: 500px;
            color: var(--muted);
            font-size: 16px;
            line-height: 1.9;
        }

        .about-highlight {
            position: relative;
            overflow: hidden;
            padding: 50px 40px;
            border-radius: var(--radius);
            background: linear-gradient(
                145deg,
                #f8dce5,
                #f2ccda
            );
            text-align: center;
            box-shadow: var(--shadow-sm);
            transition: transform .3s ease;
        }

        .about-highlight:hover {
            transform: translateY(-6px);
        }

        .about-highlight .flower {
            display: block;
            margin-bottom: 10px;
            font-family: Arial, sans-serif;
            font-size: 90px;
            animation: float 4s ease-in-out infinite;
        }

        .about-highlight h3 {
            margin-bottom: 8px;
            color: #9e4f69;
            font-size: 28px;
        }

        .about-highlight p {
            max-width: 300px;
            margin: 0 auto;
            color: #7a4b5a;
            font-size: 15px;
        }

        .deco-dots {
            position: absolute;
            right: 20px;
            bottom: 16px;
            color: rgba(184, 92, 120, .20);
            font-size: 14px;
            letter-spacing: 6px;
        }

        /* =========================
           FOOTER
        ========================= */

        footer {
            position: relative;
            padding: 40px 8% 30px;
            background: var(--dark);
            color: #fff;
            text-align: center;
            content-visibility: auto;
            contain-intrinsic-size: 300px;
        }

        footer::before {
            content: "💐";
            position: absolute;
            top: -18px;
            left: 50%;
            padding: 0 16px;
            background: var(--dark);
            font-size: 36px;
            transform: translateX(-50%);
        }

        .social-icons {
            display: flex;
            justify-content: center;
            gap: 18px;
            margin-bottom: 20px;
        }

        .social-icons a {
            width: 42px;
            height: 42px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(255, 255, 255, .04);
            border-radius: 50%;
            background: rgba(255, 255, 255, .06);
            color: #dccbd1;
            font-family: Arial, sans-serif;
            font-size: 18px;
            transition:
                transform .3s ease,
                background-color .3s ease;
        }

        .social-icons a:hover {
            color: #fff;
            background: var(--rose);
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(184, 92, 120, .30);
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 32px;
            flex-wrap: wrap;
            margin-bottom: 18px;
        }

        .footer-links a {
            color: #dccbd1;
            font-size: 14px;
            transition: color .3s ease;
        }

        .footer-links a:hover {
            color: var(--rose-light);
        }

        footer p {
            margin-top: 6px;
            color: #b097a0;
            font-size: 14px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

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
            .nav-menu > a:not(.btn-login):not(.btn-register) {
                display: none;
            }

            .hero {
                flex-direction: column;
                padding-top: 110px;
                padding-bottom: 60px;
                text-align: center;
            }

            .hero-text {
                max-width: 100%;
            }

            .hero-text p {
                max-width: 100%;
                margin-right: auto;
                margin-left: auto;
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
                margin-right: auto;
                margin-left: auto;
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
                height: 70px;
                padding: 0 5%;
            }

            section {
                scroll-margin-top: 70px;
            }

            .logo {
                font-size: 22px;
            }

            .logo-icon {
                font-size: 20px;
            }

            .nav-menu {
                gap: 12px;
            }

            .btn-login,
            .btn-register {
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

        @media (prefers-reduced-motion: reduce) {
            html {
                scroll-behavior: auto;
            }

            *,
            *::before,
            *::after {
                animation-duration: .01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: .01ms !important;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav id="navbar">
        <a href="#home"
           class="logo"
           aria-label="Bouquet Store">
            <span class="logo-icon" aria-hidden="true">🌱</span>
            Bouquet<span>Store</span>
        </a>

        <div class="nav-menu">
            <a href="#home">Beranda</a>
            <a href="#bouquet">Bouquet</a>
            <a href="#about">Tentang</a>

            @auth
                <a href="{{ url('/dashboard') }}"
                   class="btn-register">
                    <span aria-hidden="true">👤</span>
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}"
                   class="btn-login">
                    <span aria-hidden="true">→</span>
                    Login
                </a>
            @endauth
        </div>
    </nav>

    <main>

        <!-- HERO -->
        <section class="hero" id="home">

            <span class="float-icon" aria-hidden="true">🌺</span>
            <span class="float-icon" aria-hidden="true">🌸</span>
            <span class="float-icon" aria-hidden="true">🌼</span>

            <div class="hero-text">

                <div class="badge">
                    <span aria-hidden="true">★</span>
                    &nbsp;
                    Terbaik Sepanjang Tahun
                </div>

                <h1>
                    Berikan Kebahagiaan
                    <br>
                    dengan
                    <span>Buket Indah</span>
                </h1>

                <p>
                    Temukan berbagai pilihan bouquet cantik
                    untuk orang tersayang. Cocok untuk ulang
                    tahun, wisuda, anniversary, dan segala
                    momen spesial.
                </p>

                <div class="hero-buttons">

                    <a href="{{ route('register') }}"
                       class="hero-btn-primary">
                        <span aria-hidden="true">🛍</span>
                        Mulai Belanja
                    </a>

                    <a href="#bouquet"
                       class="hero-btn-secondary">
                        <span aria-hidden="true">→</span>
                        Lihat Koleksi
                    </a>

                </div>
            </div>

            <div class="hero-image"
                 aria-label="Ilustrasi bouquet"
                 role="img">

                <div class="ring" aria-hidden="true"></div>
                <div class="ring2" aria-hidden="true"></div>

                <span aria-hidden="true">💐</span>
            </div>

        </section>


        <!-- CATEGORY -->
        <section class="category" id="bouquet">

            <h2 class="section-title animate-on-scroll">
                Pilihan <span>Bouquet</span>
            </h2>

            <p class="section-desc animate-on-scroll">
                Pilih bouquet yang paling sesuai
                dengan momen spesialmu
            </p>

            <div class="cards">

                <div class="card animate-on-scroll">
                    <span class="card-icon" aria-hidden="true">
                        🌹
                    </span>

                    <h3>Flower Bouquet</h3>

                    <p>
                        Bouquet bunga cantik dengan berbagai
                        pilihan warna dan jenis bunga segar.
                    </p>

                    <span class="card-tag">
                        <span aria-hidden="true">🍃</span>
                        Segar &amp; Harum
                    </span>
                </div>


                <div class="card animate-on-scroll">
                    <span class="card-icon" aria-hidden="true">
                        🌸
                    </span>

                    <h3>Money Bouquet</h3>

                    <p>
                        Bouquet uang kreatif yang cocok
                        untuk hadiah ulang tahun maupun wisuda.
                    </p>

                    <span class="card-tag">
                        <span aria-hidden="true">🪙</span>
                        Hadiah Premium
                    </span>
                </div>


                <div class="card animate-on-scroll">
                    <span class="card-icon" aria-hidden="true">
                        🌷
                    </span>

                    <h3>Custom Bouquet</h3>

                    <p>
                        Buat bouquet sesuai keinginanmu
                        untuk memberikan hadiah yang lebih personal.
                    </p>

                    <span class="card-tag">
                        <span aria-hidden="true">✎</span>
                        100% Personal
                    </span>
                </div>

            </div>
        </section>


        <!-- ABOUT -->
        <section class="about" id="about">

            <div class="about-box animate-on-scroll">

                <div class="badge">
                    <span aria-hidden="true">♥</span>
                    &nbsp;
                    Tentang Kami
                </div>

                <h2>
                    Hadiah kecil,
                    <br>
                    <span>makna yang besar.</span>
                </h2>

                <p>
                    Bouquet Store hadir untuk membantu kamu
                    memberikan hadiah terbaik kepada orang-orang
                    tersayang. Kami menyediakan berbagai macam
                    bouquet dengan desain cantik, elegan,
                    dan penuh makna.
                </p>

            </div>


            <div class="about-highlight animate-on-scroll">

                <span class="flower" aria-hidden="true">
                    💐
                </span>

                <h3>Made With Love</h3>

                <p>
                    Setiap bouquet dibuat dengan penuh perhatian
                    untuk momen spesialmu.
                </p>

                <div class="deco-dots" aria-hidden="true">
                    ✦ ✦ ✦
                </div>

            </div>

        </section>

    </main>


    <!-- FOOTER -->
    <footer>

        <div class="social-icons">

            <a href="#" aria-label="Instagram">
                <span aria-hidden="true">◎</span>
            </a>

            <a href="#" aria-label="WhatsApp">
                <span aria-hidden="true">☎</span>
            </a>

            <a href="#" aria-label="TikTok">
                <span aria-hidden="true">♪</span>
            </a>

            <a href="#" aria-label="YouTube">
                <span aria-hidden="true">▶</span>
            </a>

        </div>


        <div class="footer-links">
            <a href="#home">Beranda</a>
            <a href="#bouquet">Koleksi</a>
            <a href="#about">Tentang</a>
            <a href="#">Kebijakan Privasi</a>
            <a href="#">Syarat &amp; Ketentuan</a>
        </div>


        <p>
            &copy; {{ date('Y') }}
            Bouquet Store.
            Made with
            <span
                aria-hidden="true"
                style="color: var(--rose-light);">
                ♥
            </span>
            in Indonesia.
        </p>

    </footer>


    <script>
        const navbar = document.getElementById('navbar');

        let ticking = false;

        window.addEventListener('scroll', () => {
            if (!ticking) {
                window.requestAnimationFrame(() => {
                    navbar.classList.toggle(
                        'scrolled',
                        window.scrollY > 20
                    );

                    ticking = false;
                });

                ticking = true;
            }
        }, { passive: true });


        const animateEls = document.querySelectorAll(
            '.animate-on-scroll'
        );

        if ('IntersectionObserver' in window) {

            const observer = new IntersectionObserver(
                (entries, obs) => {

                    entries.forEach(entry => {

                        if (entry.isIntersecting) {

                            entry.target.classList.add('visible');

                            obs.unobserve(entry.target);
                        }

                    });

                },
                {
                    threshold: 0.1,
                    rootMargin: '0px 0px -30px 0px'
                }
            );

            animateEls.forEach(el => {
                observer.observe(el);
            });

        } else {

            animateEls.forEach(el => {
                el.classList.add('visible');
            });

        }
    </script>

</body>
</html>