<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Register - MiniSoccer Book</title>

    <!-- Font Awesome SB Admin 2 -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

    <!-- SB Admin 2 -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body style="background-color: #f1f8f5;">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-7 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">

                    <div class="card-body p-0">

                        <div class="p-5">

                            <!-- LOGO -->
                            <div class="text-center mb-4">
                                <h2 style="color: #172b24; font-size: 30px;">
                                    <i class="fas fa-futbol" style="color: #10b981;"></i>
                                    MiniSoccer<span style="color: #10b981;">Book</span>
                                </h2>
                            </div>

                            <!-- JUDUL -->
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-2">
                                    Daftar Akun Baru
                                </h1>

                                <p class="mb-4 text-gray-600">
                                    Lengkapi data diri Anda untuk mendaftar
                                    akun MiniSoccer Book.
                                </p>
                            </div>

                            <!-- ERROR UMUM -->
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    {{ $errors->first() }}
                                </div>
                            @endif

                            <!-- FORM -->
                            <form action="{{ route('register') }}" method="POST">

                                @csrf

                                <!-- NAMA -->
                                <div class="form-group">
                                    <label>Nama Lengkap</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-user"></i>
                                            </span>
                                        </div>

                                        <input type="text" name="name" class="form-control"
                                            placeholder="Masukkan nama lengkap" value="{{ old('name') }}" required>
                                    </div>

                                    @error('name')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>

                                <!-- EMAIL -->
                                <div class="form-group">
                                    <label>Email</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-envelope"></i>
                                            </span>
                                        </div>

                                        <input type="email" name="email" class="form-control"
                                            placeholder="Contoh: nama@email.com" value="{{ old('email') }}" required>
                                    </div>

                                    @error('email')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>

                                <!-- ALAMAT -->
                                <div class="form-group">
                                    <label>Alamat</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-home"></i>
                                            </span>
                                        </div>

                                        <input type="text" name="address" class="form-control"
                                            placeholder="Masukkan alamat" value="{{ old('address') }}" required>
                                    </div>

                                    @error('address')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>

                                <!-- IDENTITAS -->
                                <div class="form-group">
                                    <label>No Identitas</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-id-card"></i>
                                            </span>
                                        </div>

                                        <input type="text" name="identity_number" class="form-control"
                                            placeholder="Masukkan nomor identitas" value="{{ old('identity_number') }}"
                                            required>
                                    </div>

                                    @error('identity_number')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>

                                <!-- TELEPON -->
                                <div class="form-group">
                                    <label>No Telepon</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-phone"></i>
                                            </span>
                                        </div>

                                        <input type="tel" name="phone" class="form-control"
                                            placeholder="Contoh: 08123456789" value="{{ old('phone') }}" required>
                                    </div>

                                    @error('phone')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>

                                <!-- PASSWORD -->
                                <div class="form-group">
                                    <label>Password</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-lock"></i>
                                            </span>
                                        </div>

                                        <input type="password" name="password" id="password" class="form-control"
                                            placeholder="Minimal 8 karakter" required>

                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-light"
                                                onclick="togglePassword('password')">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>

                                    @error('password')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>

                                <!-- KONFIRMASI PASSWORD -->
                                <div class="form-group">
                                    <label>Konfirmasi Password</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-lock"></i>
                                            </span>
                                        </div>

                                        <input type="password" name="password_confirmation"
                                            id="password_confirmation" class="form-control"
                                            placeholder="Ulangi password" required>

                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-light"
                                                onclick="togglePassword('password_confirmation')">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- BUTTON -->
                                <button type="submit" class="btn btn-success btn-block"
                                    style="background-color:#13b981; border-color:#13b981;">
                                    <i class="fas fa-user-plus mr-2"></i>
                                    Register
                                </button>

                            </form>

                            <hr>

                            <!-- LOGIN -->
                            <div class="text-center">
                                <span class="small text-gray-600">
                                    Sudah punya akun?
                                </span>

                                <a class="small" href="{{ route('login') }}" style="color:#10b981;">
                                    Masuk di sini
                                </a>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Script -->
    <script>
        function togglePassword(inputId) {
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
