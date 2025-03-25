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
