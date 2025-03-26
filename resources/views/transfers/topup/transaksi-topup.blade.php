<!-- filepath: c:\laragon\www\dompetKu\resources\views\transfers\topup\transaksi-topup.blade.php -->
<!DOCTYPE html>
<head>
    <title>Transfer | DompetKu</title>

    <style>
        main {
            margin: 0 136px;
        }

        .tab-container {
            display: flex;
            background-color: white;
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

        .container {
            width: 100%;
            max-width: 380px;
        }

        .card-container {
            display: flex;
            gap: 10px;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .card {
            flex: 1;
            background-color: white;
            border-radius: 10px;
            padding: 15px;
            display: flex;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            border: 1px solid #e0e0e0;
        }

        .card-icon {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            margin-right: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            font-weight: bold;
        }

        .dompetku-icon {
            background-color: #4285F4;
            color: white;
        }

        .jago-icon {
            background-color: #FFA500;
            color: white;
        }

        .card-content {
            flex-grow: 1;
        }

        .card-title {
            font-weight: 600;
            font-size: 15px;
            margin-bottom: 5px;
        }

        .card-subtitle {
            color: #666;
            font-size: 13px;
        }

        .amount-input-container {
            background-color: white;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            padding: 0 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .amount-input {
            flex-grow: 1;
            border: none;
            text-align: left;
            padding: 12px 10px;
            font-size: 16px;
            outline: none;
        }

        .edit-icon {
            color: #4285F4;
            font-size: 20px;
        }

        .amount-buttons {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }

        .amount-button {
            background-color: white;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            padding: 12px;
            font-size: 13px;
            font-weight: 600;
            color: black;
            cursor: pointer;
            transition: background-color 0.2s;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .amount-button:hover {
            background-color: #f5f5f5;
        }

        .judul-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            margin-top: 20px;
        }

        .amount-container {
            outline: 2px solid #ffffff;
            border-radius: 10px;
            padding: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .btn-submit {
            display: block;
            margin: 20px auto;
            background-image: url("{{ asset('image/bg-btn-transfer.png') }}");
            background-size: cover;
            background-color: #4285F4;
            color: white;
            border: none;
            border-radius: 50px;
            padding: 15px 100px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.2s;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .cancel-button {
            text-align: center;
            color: #4285F4;
            cursor: pointer;
        }

    </style>

</head>
<body>

    @include('layouts.navbar')

    <main>
        <div class="tab-container">
            <div class="menu-tab {{ Request::routeIs('transfer-kirim.index') ? 'active' : '' }}" data-url="{{ route('transfer-kirim.index') }}">Kirim</div>
            <div class="menu-tab {{ Request::routeIs('transfer-minta.index') ? 'active' : '' }}" data-url="{{ route('transfer-minta.index') }}">Minta</div>
            <div class="menu-tab active">Top up</div>
        </div>

        <div class="container">
            <div class="judul-container">
                <h1>Dompet Tujuan</h1>
                <h1>Metode TopUp</h1>
            </div>
            <div class="card-container">
                <div class="card">
                    <div class="card-icon">
                        <img src="{{ asset('image/dompetKu-logo.png') }}" alt="Dompetku Icon" style="width: 48px; height: 48px; border-radius: 10px;">
                    </div>
                    <div class="card-content">
                        <div class="card-title">{{ Auth::user()->name }}</div>
                        <div class="card-subtitle">Dompetku {{ Auth::user()->phone }}</div>
                    </div>
                </div>
                @if(session('metode_topup'))
                    <div class="card">
                        <div class="card-icon">
                            <img src="{{ session('metode_topup.icon') }}" alt="{{ session('metode_topup.nama') }} Icon" style="width: 48px; height: 48px; border-radius: 10px;">
                        </div>
                        <div class="card-content">
                            <div class="card-title">{{ session('metode_topup.nama') }}</div>
                            <div class="card-subtitle">{{ session('metode_topup.nomor') }}</div>
                        </div>
                    </div>
                @else
                {{--  --}}
                @endif
            </div>

            <div class="amount-container">
                <div class="amount-input-container">
                    <input type="text" class="amount-input" placeholder="Rp 0" />
                    <span class="edit-icon">✏️</span>
                </div>

                <div class="amount-buttons">
                    <button class="amount-button">Rp20.000</button>
                    <button class="amount-button">Rp50.000</button>
                    <button class="amount-button">Rp80.000</button>
                    <button class="amount-button">Rp100.000</button>
                    <button class="amount-button">Rp120.000</button>
                    <button class="amount-button">Rp150.000</button>
                    <button class="amount-button">Rp180.000</button>
                    <button class="amount-button">Rp200.000</button>
                </div>
            </div>

            <button class="btn-submit">Transfer</button>
            <p class="cancel-button" onclick="window.location.href='{{ route('transfer-topup.index') }}'">Batalkan</p>

        </div>

    </main>

    <script>
        const menuTab = document.querySelectorAll('.menu-tab');

        menuTab.forEach(tab => {
            tab.addEventListener('click', function() {
                window.location.href = tab.getAttribute('data-url');
            });
        });
    </script>

</body>
</html>
