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

        .form-container {
            width: 100%;
            margin-top: 30px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 40px;
            outline: 1px solid rgba(0, 0, 0, 0.1);
        }

        .form-title {
            text-align: left;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
        }

        .input-wrapper {
            margin-bottom: 20px;
            position: relative;
        }

        .input-wrapper input,
        .input-wrapper select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            background-color: #EEF1F2;
            border-radius: 4px;
            box-sizing: border-box;
            appearance: none;
            -webkit-appearance: none;
            font-weight: bold;
        }

        .input-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #1877f2;
        }

        .submit-button {
            width: 10%;
            padding: 10px;
            background-color: #1877f2;
            color: white;
            border: none;
            border-radius: 40px;
            cursor: pointer;
        }

        .input-wrapper:nth-child(2),
        .input-wrapper:nth-child(3) {
            display: flex;
            gap: 10px;
        }

        .input-wrapper:nth-child(2) .half-input,
        .input-wrapper:nth-child(3) .half-input {
            flex: 1;
        }

    </style>

</head>
<body>

    @include('layouts.navbar')

    <main>
        <div class="tab-container">
            <div class="menu-tab {{ Request::routeIs('catatan.index') ? 'active' : '' }}" data-url="{{ route('catatan.index') }}">Tambah Catatan</div>
            <div class="menu-tab {{ Request::routeIs('catatan-daftar.index') ? 'active' : '' }}" data-url="{{ route('catatan-daftar.index') }}">Daftar</div>
            <div class="menu-tab {{ Request::routeIs('catatan-kategori.index') ? 'active' : '' }}" data-url="{{ route('catatan-kategori.index') }}">Kategori</div>
        </div>

        <div class="form-container">
            <div class="form-title">Tambah Catatan</div>

            <div class="input-wrapper">
                <input type="text" placeholder="Hari/Tanggal"/>
                <span class="input-icon">📅</span>
            </div>

            <div class="input-wrapper">
                <div class="half-input">
                    <select>
                        <option>Jenis Transaksi</option>
                    </select>
                </div>
                <div class="half-input">
                    <select>
                        <option>Kategori</option>
                    </select>
                </div>
            </div>

            <div class="input-wrapper">
                <input type="text" placeholder="Rp lxx.xxx" />
                <span class="input-icon">💳</span>
            </div>

            <div class="input-wrapper">
                <input type="text" placeholder="Catatan" />
                <span class="input-icon">✏️</span>
            </div>

            <button class="submit-button">Simpan</button>
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
