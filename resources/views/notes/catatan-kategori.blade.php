<!DOCTYPE html>

<head>
    <title>Catatan | DompetKu</title>

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

        .search-container {
            margin-top: 20px;
            position: relative;
            margin-bottom: 20px;
        }

        .search-icon {
            position: absolute;
            left: 15px;
            top: 55%;
            transform: translateY(-50%);
        }

        .search-input {
            width: 100%;
            padding: 19px 15px 14px 45px;
            border: 1px solid #e0e0e0;
            border-radius: 15px;
            font-size: 14px;
            outline: none;
        }

        .search-input::placeholder {
            color: #999;
        }

        .chart-container {
            padding: 40px;
            outline: 2px solid rgba(0, 0, 0, 0.1);
            border-radius: 20px;
            margin-top: 30px;
            width: 100%;
            background-image: url('image/bg-chart.png');
            background-size: cover;
            background-position: center;
        }

        .chart-item {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
        }

        .chart-label {
            flex: 0 0 100px;
            color: #333;
            font-size: 14px;
        }

        .chart-bar-container {
            flex-grow: 1;
            height: 10px;
            background-color: #e0e0e0;
            border-radius: 5px;
            position: relative;
        }

        .chart-bar {
            height: 100%;
            background-color: #2196F3;
            border-radius: 5px;
            position: relative;
        }

        .chart-bar::after {
            content: '';
            position: absolute;
            right: -5px;
            top: 50%;
            transform: translateY(-50%);
            width: 10px;
            height: 10px;
            background-color: #2196F3;
            border-radius: 50%;
        }

        #liburan .chart-bar {
            width: 80%;
        }

        #makan .chart-bar {
            width: 95%;
        }

        #gaji .chart-bar {
            width: 85%;
        }

        #listrik .chart-bar {
            width: 70%;
        }

        #hobi .chart-bar {
            width: 85%;
        }

    </style>

</head>

<body>

    @include('layouts.navbar')

    <main>

        <div class="tab-container">
            <div class="menu-tab {{ Request::routeIs('catatan.index') ? 'active' : '' }}"
                data-url="{{ route('catatan.index') }}">Tambah Catatan</div>
            <div class="menu-tab {{ Request::routeIs('catatan-daftar.index') ? 'active' : '' }}"
                data-url="{{ route('catatan-daftar.index') }}">Daftar</div>
            <div class="menu-tab {{ Request::routeIs('catatan-kategori.index') ? 'active' : '' }}"
                data-url="{{ route('catatan-kategori.index') }}">Kategori</div>
        </div>

        <div class="search-container">
            <div class="search-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                    fill="none" stroke="#999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
            </div>
            <input type="text" class="search-input"
                placeholder="Catatan Apa Yang Ingin Dicari">
        </div>

        <div class="chart-container">

            <div class="background-circle"></div>
            <div class="chart-item" id="liburan">
                <div class="chart-label">Liburan</div>
                <div class="chart-bar-container">
                    <div class="chart-bar"></div>
                </div>
            </div>
            <div class="chart-item" id="makan">
                <div class="chart-label">Makan</div>
                <div class="chart-bar-container">
                    <div class="chart-bar"></div>
                </div>
            </div>
            <div class="chart-item" id="gaji">
                <div class="chart-label">Gaji</div>
                <div class="chart-bar-container">
                    <div class="chart-bar"></div>
                </div>
            </div>
            <div class="chart-item" id="listrik">
                <div class="chart-label">Listrik</div>
                <div class="chart-bar-container">
                    <div class="chart-bar"></div>
                </div>
            </div>
            <div class="chart-item" id="hobi">
                <div class="chart-label">Hobi</div>
                <div class="chart-bar-container">
                    <div class="chart-bar"></div>
                </div>
            </div>
        </div>

    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('.menu-tab');

            tabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    window.location.href = tab.getAttribute('data-url');
                });
            });
        });
    </script>

</body>

</html>
