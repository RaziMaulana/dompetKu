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

        .ticket-container {
            position: relative;
            display: inline-block;
            margin-top: 30px;
            max-width: 100%;
            user-select: none;
        }

        .ticket {
            width: 100%;
            height: auto;
        }

        .qr {
            position: absolute;
            top: 50%;
            left: 87%;
            transform: translate(-50%, -50%);
            max-width: 21%;
        }

        .ticket-text {
            position: absolute;
            top: 25%;
            left: 10%;
            transform: translate(-10%, -50%);
            text-align: left;
            width: 80%;
        }

        .ticket-text h1 {
            font-size: 4vw;
            font-weight: bold;
            margin-bottom: 10px;
            margin-top: 25px;
            color: white;
        }

        .ticket-text p {
            font-size: 1.2vw;
            color: white;
        }

        .share-container {
            position: absolute;
            top: 75%;
            left: 50%;
            transform: translate(-45%, -50%);
            width: 100%;
            text-align: center;
        }

        .share-btn {
            background-color: #0562CE;
            border-radius: 15px;
            padding: 15px 90px;
            color: white;
            cursor: pointer;
            max-width: 300px;
            box-sizing: border-box;
            border: none;
            font-weight: bold;
        }

        .card {
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.40);
            margin-top: 20px;
        }

        .activity-header {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .search-container {
            position: relative;
            margin-bottom: 20px;
        }

        .search-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
        }

        .search-input {
            width: 100%;
            padding: 14px 15px 14px 45px;
            border: 1px solid #e0e0e0;
            border-radius: 50px;
            font-size: 14px;
            outline: none;
        }

        .search-input::placeholder {
            color: #999;
        }

        .tabs {
            display: flex;
            margin-bottom: 20px;
        }

        .tab {
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 30px;
            margin-right: 10px;
            font-size: 14px;
            color: #666;
        }

        .tab.active {
            background-color: #e0e0e0;
            color: #000;
            font-weight: bold;
        }

        /* Styling for table */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        tr {
            border-bottom: 1px solid #f0f0f0;
        }

        tr:last-child {
            border-bottom: none;
        }

        td {
            padding: 15px 0;
            vertical-align: middle;
        }

    </style>

</head>
<body>

    @include('layouts.navbar')

    <main>
        <div class="tab-container">
            <div class="menu-tab {{ Request::routeIs('transfer-kirim.index') ? 'active' : '' }}" data-url="{{ route('transfer-kirim.index') }}">Kirim</div>
            <div class="menu-tab {{ Request::routeIs('transfer-minta.index') ? 'active' : '' }}" data-url="{{ route('transfer-minta.index') }}">Minta</div>
            <div class="menu-tab {{ Request::routeIs('transfer-topup.index') ? 'active' : '' }}" data-url="{{ route('transfer-topup.index') }}">Top up</div>
        </div>

        <div class="ticket-container">
            <img src="{{ asset('Image/ticket-qr.png')}}" alt="gambar background qr" class="ticket">
            <img src="{{ asset('Image/QR-dompetKu.png')}}" class="qr" alt="gambar qr">

            <div class="ticket-text">
                <h1>Minta Lewat QR</h1>
                <p>“Matahari terbenam indah, angin sepoi-sepoi, burung berkicau <br> riang, hujan turun perlahan, senja merah, gelombang laut tenang, malam datang sunyi.”</p>
            </div>

            <a href="{{ route('share-page.index') }}" class="share-container">
                <button class="share-btn">Bagi Kode QR</button>
            </a>

        </div>

        <div class="card">
            <div class="activity-header">Pilih Dari Kontak</div>

            <div class="search-container">
                <div class="search-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                        fill="none" stroke="#999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </div>
                <input type="text" class="search-input"
                    placeholder="Cari Nama Pengguna, Alamat Email, Nomor Telepon">
            </div>

            <div class="tabs">
                <div class="tab active">Semua</div>
                <div class="tab">E Wallet</div>
                <div class="tab">Bank</div>
            </div>

            <table>
                <tbody>
                    <tr>
                        <td width="50%">
                            <div class="transaction-name">Raditya Anugrah Sagitaris</div>
                        </td>
                        <td width="25%">
                            <div class="transaction-status">

                                Gopay
                            </div>
                        </td>
                        <td width="25%">
                            <div class="transaction-amount">0811 2233 4455</div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="transaction-name">Zahra Nur Azizah</div>
                        </td>
                        <td>
                            <div class="transaction-status">

                                Mandiri
                            </div>
                        </td>
                        <td>
                            <div class="transaction-amount">0811 2233 4455</div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div> <br>

    </main>

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
