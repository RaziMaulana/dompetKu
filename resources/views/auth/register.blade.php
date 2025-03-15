<x-guest-layout>
    <div class="container min-vh-100 d-flex align-items-center text-white">
        <div class="row justify-content-center w-100">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-lg border-0" style="background-color: transparent">
                    <div class="card-body p-md-5">
                        <!-- Header -->
                        <div class="text-center mb-1">
                            <h2 class="fw-bold text-white">Selamat Datang!</h2>
                            <p class="text-white-50">Kami senang kamu ingin bergabung dengan kami!</p>
                        </div>

                        <form method="POST" class="text-white" action="{{ route('register') }}">
                            @csrf

                            <!-- Name Input -->
                            <div class="mb-4">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input type="text"
                                       class="form-control text-white @error('name') is-invalid @enderror"
                                       id="name"
                                       name="name"
                                       placeholder="Masukkan nama lengkap"
                                       value="{{ old('name') }}"
                                       required
                                       autofocus>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Email Input -->
                            <div class="mb-4">
                                <label for="email" class="form-label">Alamat Email</label>
                                <input type="email"
                                       class="form-control text-white @error('email') is-invalid @enderror"
                                       id="email"
                                       name="email"
                                       placeholder="Masukkan Email"
                                       value="{{ old('email') }}"
                                       required>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Phone Number Input -->
                            <div class="mb-4">
                                <label for="phone" class="form-label">Nomor Telepon</label>
                                <input type="tel"
                                       class="form-control text-white @error('phone') is-invalid @enderror"
                                       id="phone"
                                       name="phone"
                                       placeholder="Masukkan Nomor Telepon"
                                       value="{{ old('phone') }}"
                                       required
                                       pattern="[0-9]{10,13}"
                                       title="Masukkan nomor telepon yang valid (10-13 angka)">
                                @error('phone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Password Input -->
                            <div class="mb-4">
                                <label for="password" class="form-label">Kata Sandi</label>
                                <input type="password"
                                       class="form-control text-white @error('password') is-invalid @enderror"
                                       id="password"
                                       name="password"
                                       placeholder="Buat Password"
                                       required>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Confirm Password Input -->
                            <div class="mb-5">
                                <label for="password_confirmation" class="form-label">
                                    Konfirmasi Kata Sandi
                                </label>
                                <input type="password"
                                       class="form-control text-white"
                                       id="password_confirmation"
                                       name="password_confirmation"
                                       placeholder="Verfikasi Password"
                                       required>
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid mb-4">
                                <button type="submit" class="btn btn-daftar btn-lg btn-primary">
                                    Daftar
                                </button>
                            </div>

                            <!-- Separator -->
                            <div class="separator my-4 position-relative text-center">
                                <span class="px-2 bg-transparent position-relative" style="z-index: 2;">Atau</span>
                                <div class="position-absolute top-50 start-0 end-0" style="border-top: 1px solid rgba(255,255,255,0.2);"></div>
                            </div>

                            <!-- Google Button (Tidak Diupdate) -->
                            <a href="{{ route('google.login') }}" class="btn btn-light w-100 rounded-pill google-btn">
                                <img src="./Image/GoogleLogo.png" alt="Google" class="me-2">
                                {{ __('Daftar Dengan Google') }}
                            </a>

                        <!-- Login Link -->
                        <div class="text-center mt-3">
                            <p class="text-primary-50 mb-0">
                                Sudah punya akun?
                                <a href="{{ route('login') }}" class="text-decoration-none fw-bold text-primary">
                                    Log In di sini
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
        .card {
            border-radius: 1rem;
        }

        .btn-daftar {
            border-radius: 25px;
            padding: 0.5rem 1rem;
            letter-spacing: 1px;
            transition: all 0.3s;
        }

        .btn-daftar:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }

        .form-control {
            background-color: rgba(255,255,255,0.1);
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

        .invalid-feedback {
            background-color: #dc3545;
            color: white;
            border-radius: 5px;
            padding: 5px 10px;
            margin-top: 5px;
        }
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
