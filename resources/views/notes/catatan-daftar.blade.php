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

        .expense-card {
            position: relative;
            width: 100%;
            background: url('{{ asset('image/dompetku2.png') }}') no-repeat left center;
            background-size: 150px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            padding: 25px;
            overflow: hidden;
            margin-top: 30px;
            transition: transform 0.3s ease;
        }

        .expense-card:hover {
            transform: scale(1.03);
        }

        .abstract-lines {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0.1;
            pointer-events: none;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            position: relative;
            z-index: 10;
        }

        .date {
            color: #7a8ca3;
            font-size: 14px;
            font-weight: 500;
        }

        .category {
            background: linear-gradient(to right, #6a11cb 0%, #2575fc 100%);
            color: white;
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
        }

        .description {
            color: #2c3e50;
            font-size: 16px;
            margin-bottom: 20px;
            position: relative;
            z-index: 10;
        }

        .amount {
            text-align: right;
            font-size: 26px;
            font-weight: 700;
            position: relative;
            z-index: 10;
        }

        .amount.income {
            color: green;
        }

        .amount.expense {
            color: red;
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

        <div class="expense-card">
            <div class="abstract-lines">
                <div class="line-1"></div>
                <div class="line-2"></div>
            </div>
            <div class="card-header">
                <span class="date">02/10/2024</span>
                <span class="category">Makan</span>
            </div>
            <div class="description">Makan siang di warung pak mat</div>
            <div class="amount">Rp 20.000,00</div>
            {{-- <div class="amount {{ $isIncome ? 'income' : 'expense' }}">Rp 20.000,00</div> --}}
        </div>

        <div class="expense-card">
            <div class="abstract-lines">
                <div class="line-1"></div>
                <div class="line-2"></div>
            </div>
            <div class="card-header">
                <span class="date">02/10/2024</span>
                <span class="category">Makan</span>
            </div>
            <div class="description">Makan siang di warung pak mat</div>
            <div class="amount">Rp 20.000,00</div>
            {{-- <div class="amount {{ $isIncome ? 'income' : 'expense' }}">Rp 20.000,00</div> --}}
        </div>

        <div class="expense-card">
            <div class="abstract-lines">
                <div class="line-1"></div>
                <div class="line-2"></div>
            </div>
            <div class="card-header">
                <span class="date">02/10/2024</span>
                <span class="category">Makan</span>
            </div>
            <div class="description">Makan siang di warung pak mat</div>
            <div class="amount">Rp 20.000,00</div>
            {{-- <div class="amount {{ $isIncome ? 'income' : 'expense' }}">Rp 20.000,00</div> --}}
        </div>

        <div class="expense-card">
            <div class="abstract-lines">
                <div class="line-1"></div>
                <div class="line-2"></div>
            </div>
            <div class="card-header">
                <span class="date">02/10/2024</span>
                <span class="category">Makan</span>
            </div>
            <div class="description">Makan siang di warung pak mat</div>
            <div class="amount">Rp 20.000,00</div>
            {{-- <div class="amount {{ $isIncome ? 'income' : 'expense' }}">Rp 20.000,00</div> --}}
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
