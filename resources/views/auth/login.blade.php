<x-guest-layout>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 text-white" style="width: 400px; background-color: transparent;">
            <h3 class="text-center mb-5 fw-light display-6">Selamat Datang!</h3>

            @if (session('status'))
                <div class="alert alert-success mb-4 rounded-pill">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
                @csrf

                <!-- Email Address -->
                <div class="mb-4">
                    <input id="email"
                           type="email"
                           class="form-control border-0 rounded-pill shadow-sm px-4 text-white"
                           placeholder="Masukkan Email"
                           name="email"
                           value="{{ old('email') }}"
                           required autofocus autocomplete="username">
                    @if ($errors->has('email'))
                        <div class="invalid-feedback d-block mt-2 ps-3">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <input id="password"
                           type="password"
                           class="form-control border-0 rounded-pill shadow-sm px-4 text-white"
                           placeholder="Masukkan Password"
                           name="password"
                           required autocomplete="current-password">
                    @if ($errors->has('password'))
                        <div class="invalid-feedback d-block mt-2 ps-3">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </div>

                <!-- Forgot Password Link -->
                <div class="mb-4 text-end">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-decoration-none text-primary">{{ __('Lupa Password?') }}</a>
                    @endif
                </div>

                <!-- Login Button -->
                <button type="submit" class="btn btn-primary w-100 mb-3 rounded-pill login-btn">
                    <span class="login-text">{{ __('Log In') }}</span>
                    <i class="fas fa-arrow-right ms-2"></i>
                </button>

                <div class="separator my-4 position-relative text-center">
                    <span class="px-2 bg-transparent position-relative" style="z-index: 2;">Atau</span>
                    <div class="position-absolute top-50 start-0 end-0" style="border-top: 1px solid rgba(255,255,255,0.2); z-index: 1;"></div>
                </div>

                <!-- Google Button -->
                <a href="{{ route('google.login') }}" class="btn btn-light w-100 rounded-pill google-btn">
                    <img src="https://img.icons8.com/color/16/000000/google-logo.png" alt="Google" class="me-2">
                    {{ __('Masuk Dengan Google') }}
                </a>

                <div class="text-center mt-4">
                    <span class="text-white-50">Belum memiliki akun? <a href="{{ route('register') }}" class="text-decoration-none text-primary">{{ __('Daftar Disini') }}</a></span>
                </div>
            </form>
        </div>
    </div>

    <style>
        /* Custom Form Styling */
        .form-control {
            background-color: rgba(255, 255, 255, 0.1) !important;
            color: #fff !important;
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.6) !important;
        }

        .form-control:focus {
            background-color: rgba(255, 255, 255, 0.15) !important;
            border-color: rgba(255, 255, 255, 0.5) !important;
            box-shadow: 0 0 0 3px rgba(255,255,255,0.1) !important;
            color: #fff !important;
        }

        /* Autofill Color Fix */
        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus {
            -webkit-text-fill-color: #fff !important;
            -webkit-box-shadow: 0 0 0px 1000px rgba(255, 255, 255, 0.1) inset !important;
        }

        /* Login Button Styling */
        .login-btn {
            border: none;
            padding: 12px 0;
            position: relative;
            overflow: hidden;
            transition: all 0.4s ease;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }

        /* Google Button Styling */
        .google-btn {
            background: rgba(255,255,255,0.9);
            color: #444;
            border: 1px solid rgba(0,0,0,0.1);
            padding: 12px 0;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .google-btn:hover {
            background: #fff;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        /* Card Styling */
        .card {
            border: 1px solid rgba(255,255,255,0.2);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
        }
    </style>
</x-guest-layout>
