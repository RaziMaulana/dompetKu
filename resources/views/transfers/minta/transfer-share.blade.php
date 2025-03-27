<!DOCTYPE html>
<head>
    <title>Transfer | DompetKu</title>

    <style>
        body {
            background-image: url('../image/background-bagikan.png'); /* Sesuaikan path gambar */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            min-height: 100vh;
        }

        .center-container {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        .card {
            width: 400px;
            height: 500px;
            background-color: #292935;
            border-radius: 20px;
            outline: 0.6px solid #686868;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .card h2 {
            margin-top: 20px;
            margin-bottom: 20px;
            text-align: center;
            color: white;
            font-weight: 50;
        }

        .card .info-head {
            color: white;
            margin-left: 6%;
            font-size: 19px;
            font-weight: 50;
        }

        .bg-qr {
            width: 320px;
            height: 320px;
            justify-self: center;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 20px;
        }

        .qr {
            width: 230px;
            height: 230px;
            position: absolute;
            transform: translate(29%, -120%);
        }

        .info {
            margin-left: 6%;
            margin-top: 3px;
            color: #686868;
        }

        .btn-submit {
            display: block;
            margin: 20px auto;
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
        <div class="center-container">
            <div class="card">
                <div>

                    <img src="{{ asset('Image/bg-qr.png') }}" class="bg-qr" alt="">
                    <img src="{{ asset('Image/QR-dompetKu.png') }}" class="qr" alt="">

                </div>
                <h2>{{ strtoupper(Str::random(6)) }}</h2>
                <p class="info-head">{{ Auth::user()->name }}</p>
                <p class="info">dompetKu {{  Auth::user()->phone }}</p>
            </div>

        </div>

        <button class="btn-submit">Bagikan Kode</button>
        <p class="cancel-button" onclick="window.location.href='{{ route('transfer-minta.index') }}'">Batalkan</p>

    </main>

</body>
</html>
