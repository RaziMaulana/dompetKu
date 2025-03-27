<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Top Up Success</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('layouts.navbar')

    <div class="container py-4 mt-5">
        <div class="row justify-content-center">
            <div class="col-10 col-md-8 col-lg-6 col-xl-4">
                <div class="card shadow-sm rounded-3 border-0">
                    <div class="card-body text-center p-4">
                        <!-- Gambar -->
                        <img src="image/Succeed-Check.png"
                             alt="Success Icon"
                             class="img-fluid mw-100 mb-5 mt-5"
                             style="width: 150px">

                        <!-- Judul -->
                        <h4 class="fs-2 mb-5 mt-3">Berhasil <span class="fw-bold">Top Up</span></h4>

                        <!-- Detail -->
                        <div class="mb-5 mt-5">
                            <h5 class="fs-5 mb-2">{{ $user->name }}</h5>
                            <p class="text-muted fs-5 mb-1">Dompetku</p>
                            <p class="fs-5 text-dark fw-medium">{{ $user->phone }}</p>
                        </div>

                        <!-- Tombol -->
                        <a href="{{ route('dashboard-new') }}" class="btn btn-primary w-75 py-2 rounded-2 mt-5 mb-5 fw-medium">
                            Beranda
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
