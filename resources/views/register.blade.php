<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register - MiniSoccerBook</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(135deg, #e8f6f1, #f7faf9);
            min-height: 100vh;
            color: #17352c;
        }

        .register-container {
            width: 100%;
            min-height: 100vh;

            display: flex;
            justify-content: center;
            align-items: center;

            padding: 30px 15px;
        }

        .register-card {
            width: 480px;
            background: white;

            border-radius: 22px;

            padding: 45px 43px;

            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);

            border: 1px solid #e5e5e5;
        }

        /* LOGO */
        .logo {
            display: flex;
            justify-content: center;
            align-items: center;

            gap: 10px;

            margin-bottom: 25px;
        }

        .logo-ball {
            width: 38px;
            height: 38px;

            border-radius: 50%;

            background: #16b77f;

            display: flex;
            align-items: center;
            justify-content: center;

            color: white;

            font-size: 20px;
        }

        .logo-text {
            font-size: 21px;
            font-weight: 700;

            color: #15372e;
        }

        .logo-text .green {
            color: #32b88b;
            font-weight: 400;
        }

        /* JUDUL */
        h1 {
            text-align: center;

            font-size: 24px;

            margin-bottom: 8px;

            color: #14372d;
        }

        .subtitle {
            text-align: center;

            color: #7c8581;

            font-size: 14px;

            line-height: 1.5;

            margin-bottom: 32px;
        }

        /* FORM */
        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;

            font-size: 14px;

            font-weight: 600;

            color: #173a30;

            margin-bottom: 8px;
        }

        .input-box {
            width: 100%;
            height: 49px;

            display: flex;
            align-items: center;

            border: 1px solid #dedede;

            border-radius: 10px;

            background: #fff;

            transition: 0.2s;
        }

        .input-box:focus-within {
            border-color: #16b77f;

            box-shadow: 0 0 0 3px rgba(22, 183, 127, 0.10);
        }

        .icon {
            width: 43px;

            text-align: center;

            color: #7d8984;

            font-size: 18px;
        }

        .input-box input {
            flex: 1;

            height: 100%;

            border: none;

            outline: none;

            font-size: 14px;

            color: #333;

            background: transparent;
        }

        .input-box input::placeholder {
            color: #adb6b2;
        }

        .show-password {
            border: none;

            background: transparent;

            color: #718079;

            cursor: pointer;

            font-size: 17px;

            padding: 0 14px;
        }

        /* ERROR */
        .error {
            display: block;

            color: #dc3545;

            font-size: 12px;

            margin-top: 5px;
        }

        /* BUTTON */
        .register-button {
            width: 100%;

            height: 50px;

            border: none;

            border-radius: 10px;

            background: #12b982;

            color: white;

            font-size: 15px;

            font-weight: 700;

            cursor: pointer;

            margin-top: 8px;

            transition: 0.2s;
        }

        .register-button:hover {
            background: #0fa875;
        }

        .register-button:active {
            transform: scale(0.99);
        }

        /* LOGIN */
        .login-text {
            text-align: center;

            color: #7c8581;

            font-size: 14px;

            margin-top: 18px;
        }

        .login-text a {
            color: #079d6d;

            text-decoration: none;

            font-weight: 700;
        }

        .login-text a:hover {
            text-decoration: underline;
        }

        /* RESPONSIVE */
        @media (max-width: 520px) {
            .register-card {
                width: 100%;

                padding: 35px 25px;
            }

            h1 {
                font-size: 22px;
            }
        }
    </style>
</head>

<body>

    <div class="register-container">

        <div class="register-card">

            <!-- LOGO -->
            <div class="logo">
                <div class="logo-ball">⚽</div>

                <div class="logo-text">
                    <span>MiniSoccer</span><span class="green">Book</span>
                </div>
            </div>

            <!-- JUDUL -->
            <h1>Daftar Akun Baru</h1>

            <p class="subtitle">
                Lengkapi data diri Anda untuk mendaftar akun MiniSoccer Book.
            </p>

            <!-- FORM REGISTER -->
            <form action="{{ route('register') }}" method="POST">

                @csrf

                <!-- NAMA -->
                <div class="form-group">

                    <label for="name">
                        Nama Lengkap
                    </label>

                    <div class="input-box">

                        <span class="icon">♙</span>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Masukkan nama lengkap Anda"
                            required>

                    </div>

                    @error('name')
                        <small class="error">
                            {{ $message }}
                        </small>
                    @enderror

                </div>


                <!-- EMAIL -->
                <div class="form-group">

                    <label for="email">
                        Email
                    </label>

                    <div class="input-box">

                        <span class="icon">✉</span>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="Contoh: nama@email.com"
                            required>

                    </div>

                    @error('email')
                        <small class="error">
                            {{ $message }}
                        </small>
                    @enderror

                </div>


                <!-- ALAMAT -->
                <div class="form-group">

                    <label for="address">
                        Alamat
                    </label>

                    <div class="input-box">

                        <span class="icon">⌂</span>

                        <input
                            type="text"
                            id="address"
                            name="address"
                            value="{{ old('address') }}"
                            placeholder="Masukkan alamat lengkap Anda"
                            required>

                    </div>

                    @error('address')
                        <small class="error">
                            {{ $message }}
                        </small>
                    @enderror

                </div>


                <!-- NO IDENTITAS -->
                <div class="form-group">

                    <label for="identity_number">
                        No Identitas
                    </label>

                    <div class="input-box">

                        <span class="icon">▣</span>

                        <input
                            type="text"
                            id="identity_number"
                            name="identity_number"
                            value="{{ old('identity_number') }}"
                            placeholder="Masukkan nomor identitas Anda"
                            required>

                    </div>

                    @error('identity_number')
                        <small class="error">
                            {{ $message }}
                        </small>
                    @enderror

                </div>


                <!-- NO TELEPON -->
                <div class="form-group">

                    <label for="phone">
                        No Telepon
                    </label>

                    <div class="input-box">

                        <span class="icon">☎</span>

                        <input
                            type="tel"
                            id="phone"
                            name="phone"
                            value="{{ old('phone') }}"
                            placeholder="Contoh: 08123456789"
                            required>

                    </div>

                    @error('phone')
                        <small class="error">
                            {{ $message }}
                        </small>
                    @enderror

                </div>


                <!-- PASSWORD -->
                <div class="form-group">

                    <label for="password">
                        Password
                    </label>

                    <div class="input-box">

                        <span class="icon">🔒</span>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Buat password minimal 8 karakter"
                            required>

                        <button
                            type="button"
                            class="show-password"
                            onclick="togglePassword('password', this)">
                            ◉
                        </button>

                    </div>

                    @error('password')
                        <small class="error">
                            {{ $message }}
                        </small>
                    @enderror

                </div>


                <!-- KONFIRMASI PASSWORD -->
                <div class="form-group">
                    <label for="password_confirmation">
                        Konfirmasi Password
                    </label>

                    <div class="input-box">
                        <span class="icon">🔒</span>
                        <input type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            placeholder="Ulangi password Anda"
                            required>

                        <button type="button" class="show-password"
                            onclick="togglePassword('password_confirmation', this)"> ◉
                        </button>
                    </div>
                </div>


                <!-- REGISTER BUTTON -->
                <button
                    type="submit"
                    class="register-button">
                    Register
                </button>
            </form>


            <!-- LINK LOGIN -->
            <p class="login-text">
                Sudah punya akun?
                <a href="{{ route('login') }}">
                    Masuk di sini
                </a>
            </p>
        </div>
    </div>

    <script>
        function togglePassword(inputId, button) {
            const input = document.getElementById(inputId);
            if (input.type === "password") {
                input.type = "text";
            } else {
                input.type = "password";
            }
        }
    </script>
</body>
</html>