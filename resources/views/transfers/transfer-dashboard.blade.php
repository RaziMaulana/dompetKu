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
            flex: 1;
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
            margin-top: 20px;
            justify-content: space-between;
        }

        .transfer-option {
            flex: 1;
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
        }

        .transfer-option img {
            width: 50px;
            height: 50px;
            margin-right: 15px;
            margin-left: 25px;
        }
    </style>
</head>

<body>
    @include('layouts.navbar')

    <main>

        <div class="tab-container">
            <div class="menu-tab active">Kirim</div>
            <div class="menu-tab">Minta</div>
            <div class="menu-tab">Top up</div>
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

    </main>

</body>
</html>
