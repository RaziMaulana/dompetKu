<x-guest-layout>
    <div class="container min-vh-100 d-flex align-items-center text-white">
        <div class="row justify-content-center w-100">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-lg border-0" style="background-color: rgba(0,0,0,0.3)">
                    <div class="card-body p-md-5">
                        <!-- Header -->
                        <div class="text-center mb-5">
                            <h2 class="fw-bold text-white">Selamat Datang!</h2>
                            <p class="text-white-50">Silakan masuk untuk melanjutkan</p>
                        </div>

                        @if (session('status'))
                            <div class="alert alert-success mb-4 rounded-3">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" class="text-white" action="{{ route('login') }}">
                            @csrf

                            <!-- Email Input -->
                            <div class="mb-4">
                                <input type="email"
                                       class="form-control text-white @error('email') is-invalid @enderror"
                                       id="email"
                                       name="email"
                                       placeholder="Masukkan Email"
                                       value="{{ old('email') }}"
                                       required autofocus>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Password Input -->
                            <div class="mb-4">
                                <input type="password"
                                       class="form-control text-white @error('password') is-invalid @enderror"
                                       id="password"
                                       name="password"
                                       placeholder="Masukkan Password"
                                       required>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Forgot Password Link -->
                            <div class="mb-4 text-end">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-decoration-none text-primary">
                                        Lupa Kata Sandi?
                                    </a>
                                @endif
                            </div>

                            <!-- Login Button -->
                            <div class="d-grid mb-4">
                                <button type="submit" class="btn btn-primary btn-lg btn-login">
                                    <span>Log In</span>
                                    <i class="fas fa-arrow-right ms-2"></i>
                                </button>
                            </div>

                            <!-- Separator -->
                            <div class="separator my-4 position-relative text-center">
                                <span class="px-2 bg-transparent position-relative" style="z-index: 2;">Atau</span>
                                <div class="position-absolute top-50 start-0 end-0" style="border-top: 1px solid rgba(255,255,255,0.2);"></div>
                            </div>

                            <!-- Google Button -->
                            <a href="{{ route('google.login') }}" class="btn btn-light w-100 rounded-pill google-btn">
                                <img src="./Image/GoogleLogo.png" alt="Google" class="me-2">
                                {{ __('Masuk Dengan Google') }}
                            </a>

                            <!-- Register Link -->
                            <div class="text-center mt-4">
                                <p class="text-white-50">
                                    Belum memiliki akun?
                                    <a href="{{ route('register') }}" class="text-decoration-none fw-bold text-primary">
                                        Daftar Disini
                                    </a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Styling Input Field Konsisten dengan Registrasi */
        .form-control {
            background-color: rgba(255,255,255,0.1) !important;
            border: 1px solid rgba(255,255,255,0.3);
            color: white;
            border-radius: 30px;
            padding: 10px 20px;
        }

        .form-control::placeholder {
            color: rgba(255,255,255,0.6);
        }

        .form-control:focus {
            background-color: rgba(255,255,255,0.2);
            border-color: rgba(255,255,255,0.5);
            box-shadow: 0 0 0 0.25rem rgba(255,255,255,0.25);
        }

        /* Styling Tombol Login */
        .btn-login {;
            border-radius: 25px;
            padding: 0.5rem 1rem;
            letter-spacing: 1px;
            transition: all 0.3s;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }

        /* Pertahankan Styling Tombol Google Asli */
        .google-btn {
            background: rgba(42, 40, 52, 0.9);
            color: #edeaea;
            border: 1px solid rgba(0,0,0,0.1);
            padding: 12px 0;
            font-weight: 500;
            border: 0.5px solid white;
            transition: all 0.3s ease;
        }

        .google-btn img {
            width: 25px;
        }

        .google-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
    </style>
</x-guest-layout>
