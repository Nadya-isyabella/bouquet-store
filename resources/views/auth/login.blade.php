<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Bouquet Store</title>

    {{-- Bootstrap Icons --}}
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
            background: #fdf7f8;
            color: #4f3b3b;
        }

        .login-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 20px;
        }

        .login-container {
            width: 100%;
            max-width: 430px;
        }

        /* LOGO / JUDUL */

        .brand {
            text-align: center;
            margin-bottom: 25px;
        }

        .brand-icon {
            width: 62px;
            height: 62px;
            margin: 0 auto 12px;
            border-radius: 50%;
            background: #f4d9df;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #b8667b;
            font-size: 28px;
        }

        .brand h1 {
            margin: 0;
            color: #6b4c4c;
            font-size: 27px;
            font-weight: 700;
        }

        .brand p {
            margin: 7px 0 0;
            color: #8a7777;
            font-size: 14px;
        }

        /* CARD */

        .login-card {
            background: #ffffff;
            border: 1px solid #eee1e4;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(107, 76, 76, 0.08);
        }

        .login-title {
            margin-bottom: 24px;
        }

        .login-title h2 {
            margin: 0;
            color: #6b4c4c;
            font-size: 21px;
            font-weight: 600;
        }

        .login-title p {
            margin: 6px 0 0;
            color: #8b7b7b;
            font-size: 14px;
        }

        /* FORM */

        .form-group {
            margin-bottom: 18px;
        }

        .form-label {
            display: block;
            margin-bottom: 7px;
            color: #5d4a4a;
            font-size: 14px;
            font-weight: 600;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 13px;
            top: 50%;
            transform: translateY(-50%);
            color: #b48691;
            font-size: 16px;
            pointer-events: none;
        }

        .form-input {
            width: 100%;
            height: 44px;
            padding: 10px 13px 10px 40px;
            border: 1px solid #dcd1d3;
            border-radius: 7px;
            background: #fff;
            color: #4f3b3b;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .form-input:focus {
            border-color: #c98294;
            box-shadow: 0 0 0 3px rgba(201, 130, 148, 0.12);
        }

        .form-input::placeholder {
            color: #aaa0a0;
        }

        /* PASSWORD */

        .password-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: transparent;
            color: #8f7d7d;
            cursor: pointer;
            padding: 4px;
            font-size: 16px;
        }

        .password-toggle:hover {
            color: #b8667b;
        }

        .password-input {
            padding-right: 42px;
        }

        /* ERROR */

        .error-message {
            margin-top: 6px;
            color: #c24f5f;
            font-size: 13px;
        }

        .session-message {
            margin-bottom: 18px;
            padding: 10px 12px;
            border-radius: 7px;
            background: #eef8f0;
            border: 1px solid #cce6d1;
            color: #3d7547;
            font-size: 13px;
        }

        /* REMEMBER + FORGOT */

        .form-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 5px 0 22px;
            gap: 10px;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 7px;
            color: #716363;
            font-size: 13px;
        }

        .remember input {
            width: 15px;
            height: 15px;
            accent-color: #c98294;
            cursor: pointer;
        }

        .forgot-link {
            color: #b8667b;
            text-decoration: none;
            font-size: 13px;
        }

        .forgot-link:hover {
            text-decoration: underline;
        }

        /* BUTTON */

        .login-button {
            width: 100%;
            height: 45px;
            border: none;
            border-radius: 7px;
            background: #c98294;
            color: white;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
        }

        .login-button:hover {
            background: #b96f82;
        }

        .login-button i {
            margin-right: 6px;
        }

        /* REGISTER */

        .register-text {
            text-align: center;
            margin: 22px 0 0;
            color: #766767;
            font-size: 14px;
        }

        .register-link {
            color: #b8667b;
            text-decoration: none;
            font-weight: 600;
        }

        .register-link:hover {
            text-decoration: underline;
        }

        /* FOOTER */

        .footer-text {
            text-align: center;
            margin-top: 20px;
            color: #a09292;
            font-size: 12px;
        }

        /* MOBILE */

        @media (max-width: 480px) {

            .login-page {
                padding: 20px 15px;
            }

            .login-card {
                padding: 24px 20px;
            }

            .brand h1 {
                font-size: 24px;
            }

            .form-options {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

<div class="login-page">

    <div class="login-container">

        {{-- BRAND --}}
        <div class="brand">

            <div class="brand-icon">
                <i class="bi bi-flower1"></i>
            </div>

            <h1>Bouquet Store</h1>

            <p>Selamat datang kembali</p>

        </div>


        {{-- LOGIN CARD --}}
        <div class="login-card">

            <div class="login-title">

                <h2>Login</h2>

                <p>Silakan masuk ke akun Anda</p>

            </div>


            {{-- SESSION STATUS --}}
            @if (session('status'))

                <div class="session-message">
                    {{ session('status') }}
                </div>

            @endif


            <form method="POST" action="{{ route('login') }}">

                @csrf


                {{-- EMAIL --}}
                <div class="form-group">

                    <label
                        for="email"
                        class="form-label"
                    >
                        Email
                    </label>

                    <div class="input-wrapper">

                        <i class="bi bi-envelope input-icon"></i>

                        <input
                            id="email"
                            class="form-input"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="Masukkan email"
                            required
                            autofocus
                            autocomplete="username"
                        >

                    </div>


                    @if ($errors->get('email'))

                        <div class="error-message">
                            {{ $errors->first('email') }}
                        </div>

                    @endif

                </div>


                {{-- PASSWORD --}}
                <div class="form-group">

                    <label
                        for="password"
                        class="form-label"
                    >
                        Password
                    </label>

                    <div class="input-wrapper">

                        <i class="bi bi-lock input-icon"></i>

                        <input
                            id="password"
                            class="form-input password-input"
                            type="password"
                            name="password"
                            placeholder="Masukkan password"
                            required
                            autocomplete="current-password"
                        >

                        <button
                            type="button"
                            class="password-toggle"
                            onclick="togglePassword()"
                            aria-label="Tampilkan password"
                        >
                            <i
                                id="password-icon"
                                class="bi bi-eye"
                            ></i>
                        </button>

                    </div>


                    @if ($errors->get('password'))

                        <div class="error-message">
                            {{ $errors->first('password') }}
                        </div>

                    @endif

                </div>


                {{-- OPTIONS --}}
                <div class="form-options">

                    <label
                        for="remember"
                        class="remember"
                    >

                        <input
                            id="remember"
                            type="checkbox"
                            name="remember"
                        >

                        <span>Ingat saya</span>

                    </label>


                    @if (Route::has('password.request'))

                        <a
                            href="{{ route('password.request') }}"
                            class="forgot-link"
                        >
                            Lupa password?
                        </a>

                    @endif

                </div>


                {{-- LOGIN BUTTON --}}
                <button
                    type="submit"
                    class="login-button"
                >

                    <i class="bi bi-box-arrow-in-right"></i>

                    Login

                </button>

            </form>


            {{-- REGISTER --}}
            @if (Route::has('register'))

                <div class="register-text">

                    Belum punya akun?

                    <a
                        href="{{ route('register') }}"
                        class="register-link"
                    >
                        Daftar sekarang
                    </a>

                </div>

            @endif

        </div>


        <div class="footer-text">
            © {{ date('Y') }} Bouquet Store
        </div>

    </div>

</div>


<script>

    function togglePassword() {

        const password =
            document.getElementById('password');

        const icon =
            document.getElementById('password-icon');

        if (password.type === 'password') {

            password.type = 'text';

            icon.classList.remove('bi-eye');

            icon.classList.add('bi-eye-slash');

        } else {

            password.type = 'password';

            icon.classList.remove('bi-eye-slash');

            icon.classList.add('bi-eye');

        }
    }

</script>

</body>

</html>
