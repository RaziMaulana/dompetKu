<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer | DompetKu</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            margin-bottom: 20px;
            border-bottom: 1px solid #e0e0e0;
        }
        .tab-container {
            display: flex;
            background-color: white;
            margin-right: 100px;
            margin-left: 100px;
            border-bottom: 1px solid #e0e0e0;
        }

        .menu-tab {
            padding: 15px 0;
            margin-top: 10px;
            margin-right: 30px;
            text-align: center;
            cursor: pointer;
            font-weight: bold;
        }
        .menu-tab.active {
            color: black;
            border-bottom: 2px solid black;
        }
        .card {
            border-radius: 16px;
            margin: 0 98px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .search-container {
            position: relative;
        }
        .search-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            z-index: 10;
        }
        .form-control {
            padding-left: 40px;
            border-radius: 50px;
        }
        .tabs {
            display: flex;
            margin-top: 20px;
        }
        .tab {
            padding: 10px 20px;
            border-radius: 30px;
            color: #666;
            cursor: pointer;
            margin-right: 10px;
        }
        .tab.active {
            background-color: #e0e0e0;
            color: #000;
            font-weight: bold;
        }
        .daftar-img {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding-top: 10px;
        }
        .bank-logo {
            width: 60px;
            height: 60px;
            object-fit: cover;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    @include('layouts.navbar')

    <main class="container">

        <div class="tab-container">
            <div class="menu-tab {{ Request::routeIs('transfer-kirim.index') ? 'active' : '' }}" data-url="{{ route('transfer-kirim.index') }}">Kirim</div>
            <div class="menu-tab {{ Request::routeIs('transfer-minta.index') ? 'active' : '' }}" data-url="{{ route('transfer-minta.index') }}">Minta</div>
            <div class="menu-tab {{ Request::routeIs('transfer-topup.index') ? 'active' : '' }}" data-url="{{ route('transfer-topup.index') }}">Top up</div>
        </div>

        <div class="card mt-5 p-4">
            <h5 class="card-title">Metode Top Up</h5>
            <p class="card-text">Mulai dari E Wallet, ATM, m-banking, internet banking, dan lain-lain</p>

            <div class="search-container mb-4">
                <div class="search-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                        fill="none" stroke="#999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </div>
                <input type="text" class="form-control" placeholder="Cari Nama Pengguna, Alamat Email, Nomor Telepon">
            </div>

            <div class="tabs">
                <div class="tab active">Semua</div>
                <div class="tab">E Wallet</div>
                <div class="tab">Bank</div>
            </div>

            <div class="daftar-img">
                <div>
                    <img class="bank-logo" src="{{ asset('image/BRI.png') }}" alt="BRI">
                    <div style="text-align: center">BRI</div>
                </div>
                <div>
                    <img class="bank-logo" src="{{ asset('image/BCA.png') }}" alt="BCA">
                    <div style="text-align: center">BCA</div>
                </div>
                <div>
                    <img class="bank-logo" src="{{ asset('image/Mandiri.png') }}" alt="Mandiri">
                    <div style="text-align: center">Mandiri</div>
                </div>
                <div>
                    <img class="bank-logo" src="{{ asset('image/BNI.png') }}" alt="BNI">
                    <div style="text-align: center">BNI</div>
                </div>
                <div>
                    <img class="bank-logo" src="{{ asset('image/Jago.png') }}" alt="Jago">
                    <div style="text-align: center">Jago</div>
                </div>
            </div>
        </div>

    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tabs = document.querySelectorAll('.menu-tab');

            tabs.forEach(tab => {
                tab.addEventListener('click', function () {
                    window.location.href = tab.getAttribute('data-url');
                });
            });
        });
    </script>

</body>
</html>
