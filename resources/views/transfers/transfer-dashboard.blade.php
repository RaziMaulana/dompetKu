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

        .content {
            display: flex;
            flex-wrap: wrap;
            margin-top: 20px;
            justify-content: space-between;
        }

        .transfer-option {
            flex: 1 1 calc(33.333% - 20px);
            background-color: #5b9aff;
            border-radius: 15px;
            padding: 10px;
            display: flex;
            align-items: center;
            color: white;
            cursor: pointer;
            max-width: 300px;
            font-size: 20px;
            font-weight: bold;
            margin: 0;
            box-sizing: border-box;
            border: none;
        }

        .transfer-option img {
            width: 50px;
            height: 50px;
            margin-right: 15px;
            margin-left: 25px;
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

        .transaction-name {
            font-weight: 500;
        }

        .transaction-amount {
            text-align: right;
            font-weight: 500;
        }
    </style>
</head>

<body>
    @include('layouts.navbar')

    <main>

        <div class="tab-container">
            <div class="menu-tab {{ Request::routeIs('transfer-dashboard') ? 'active' : '' }}" data-url="{{ route('transfer-dashboard') }}">Kirim</div>
            <div class="menu-tab {{ Request::routeIs('transfer-minta') ? 'active' : '' }}" data-url="{{ route('transfer-minta') }}">Minta</div>
            <div class="menu-tab {{ Request::routeIs('transfer-topup') ? 'active' : '' }}" data-url="{{ route('transfer-topup') }}">Top up</div>
        </div>

        <div class="content">

            <button class="transfer-option">
                <img src="{{ asset('image/dompetku2.png') }}" alt=""> DompetKu.
            </button>

            <button class="transfer-option">
                <img src="{{ asset('image/bank-logo.png') }}" alt=""> Bank
            </button>

            <button class="transfer-option">
                <img src="{{ asset('image/e-wallet.png') }}" alt=""> E Wallet
            </button>

        </div>

        <div class="card">
            <div class="activity-header">Kirim Pembayaran</div>

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

                    <tr>
                        <td>
                            <div class="transaction-name">Fatur Al Khafi</div>
                        </td>
                        <td>
                            <div class="transaction-status">

                                Gopay
                            </div>
                        </td>
                        <td>
                            <div class="transaction-amount">0811 2233 4455</div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="transaction-name">Dr Tirta</div>
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
