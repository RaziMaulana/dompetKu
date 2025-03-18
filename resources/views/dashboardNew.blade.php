<!DOCTYPE html>

<head>
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 100%;
            margin: 0 auto;
            background-color: white;
            height: 100vh;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Header */
        .header {
            background-color: #1a1f2b;
            display: flex;
            align-items: center;
            padding: 15px 20px;
            justify-content: space-between;
            color: white;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo img {
            width: 30px;
            height: 30px;
            margin-right: 10px;
        }

        .nav {
            display: flex;
            gap: 20px;
        }

        .nav-item {
            color: white;
            text-decoration: none;
            cursor: pointer;
        }

        .nav-item.active {
            color: #3498db;
        }

        .header-right {
            display: flex;
            gap: 15px;
        }

        /* Banner */
        .banner {
            background-color: #3498db;
            height: 320px;
            position: relative;
        }

        .dots {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 5px;
        }

        .dot {
            width: 8px;
            height: 8px;
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
        }

        .dot.active {
            background-color: white;
        }

        /* Wrapper untuk Balance Card dan Action Buttons */
        .balance-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 40px;
            padding: 20px;
        }

        /* Balance Card */
        .balance-card {
            background-color: #1a1f2b;
            border-radius: 10px;
            padding: 20px;
            color: white;
            position: relative;
            width: 60%;
            height: 240px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            flex-grow: 1;
        }

        /* Title, Amount, Info */
        .balance-title {
            font-size: 20px;
            margin-top: -50px;
        }

        .balance-amount {
            font-size: 33px;
            font-weight: bold;
            margin-top: 10px;
        }

        .balance-info {
            font-size: 14px;
            color: #ccc;
            margin-top: 10px;
        }

        /* Icon Menu */
        .menu-icon {
            position: absolute;
            top: 20px;
            right: 20px;
            cursor: pointer;
        }

        /* Action Buttons (Diatur menjadi 2x2) */
        .action-buttons {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }

        /* Style untuk tiap tombol */
        .action-button {
            background-color: #0066cc;
            border-radius: 10px;
            width: 110px;
            height: 110px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            cursor: pointer;
            text-align: center;
        }

        .action-icon {
            font-size: 24px;
            margin-bottom: 5px;
        }

        .action-label {
            font-size: 14px;
        }

        .card {
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.40);
            width: 97.60%;
            margin: 0 auto;
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

        .transaction-status {
            color: #4CAF50;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .check-icon {
            margin-right: 5px;
            color: #4CAF50;
        }

        .transaction-amount {
            text-align: right;
            font-weight: 500;
        }

        .transaction-amount.positive {
            color: #4CAF50;
        }

        .transaction-amount.negative {
            color: #000;
        }

        .banner {
                position: relative;
                width: 100%;
                height: 320px;
                overflow: hidden;
            }

            .slides {
                display: flex;
                transition: transform 0.5s ease-in-out;
            }

            .slide {
                min-width: 100%;
                height: 320px;
                display: none;
            }

            .slide.active {
                display: block;
            }

            .dots {
                position: absolute;
                bottom: 10px;
                left: 50%;
                transform: translateX(-50%);
                display: flex;
                gap: 5px;
            }

            .dot {
                width: 8px;
                height: 8px;
                background-color: rgba(255, 255, 255, 0.5);
                border-radius: 50%;
                cursor: pointer;
            }

            .dot.active {
                background-color: white;
            }

    </style>
</head>

<body>

    <div class="container">
        <!-- Header -->
        <div class="header">
            <div class="logo">
                <img src="{{ asset('image/dompetKu-logo.png') }}" alt="Logo">
            </div>
            <div class="nav">
                <a href="#" class="nav-item active">Beranda</a>
                <a href="#" class="nav-item">Transfer</a>
                <a href="#" class="nav-item">Aktivitas</a>
                <a href="#" class="nav-item">Catatan</a>
                <a href="#" class="nav-item">Investasi</a>
            </div>
            <div class="header-right">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                        <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                    </svg>
                </div>
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="12" cy="12" r="3"></circle>
                        <path
                            d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                        </path>
                    </svg>
                </div>
                <div class="icon">Keluar</div>
            </div>
        </div>

        <!-- Banner -->
        <div class="banner">
            <div class="slides">
                <img src="image1.jpg" class="slide active">
                <img src="image2.jpg" class="slide">
                <img src="image3.jpg" class="slide">
            </div>
            <div class="dots">
                <div class="dot active" onclick="currentSlide(1)"></div>
                <div class="dot" onclick="currentSlide(2)"></div>
                <div class="dot" onclick="currentSlide(3)"></div>
            </div>
        </div>

        <div class="balance-container">
            <!-- Balance Card -->
            <div class="balance-card">
                <div class="balance-title">Saldo Dompetku</div>
                <div class="balance-amount">Rp1.000.000</div>
                <div class="balance-info">Tersedia di Walletmu</div>
                <div class="menu-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="12" cy="12" r="1"></circle>
                        <circle cx="12" cy="5" r="1"></circle>
                        <circle cx="12" cy="19" r="1"></circle>
                    </svg>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="action-buttons">
                <div class="action-button">
                    <div class="action-icon">
                        <i class="fa-solid fa-location-arrow"></i>
                    </div>
                    <div class="action-label">Kirim</div>
                </div>
                <div class="action-button">
                    <div class="action-icon">
                        <i class="fa-solid fa-hand-holding"></i>
                    </div>
                    <div class="action-label">Minta</div>
                </div>
                <div class="action-button">
                    <div class="action-icon">
                        <i class="fa-solid fa-circle-plus"></i>
                    </div>
                    <div class="action-label">Top Up</div>
                </div>
                <div class="action-button">
                    <div class="action-icon">
                        <i class="fa-solid fa-arrow-down"></i>
                    </div>
                    <div class="action-label">Tarik</div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="activity-header">Aktivitas Terakhir</div>

            <div class="search-container">
                <div class="search-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                        fill="none" stroke="#999" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
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
                            <div class="transaction-name">Spotify Subscription</div>
                        </td>
                        <td width="25%">
                            <div class="transaction-status">
                                <svg class="check-icon" xmlns="http://www.w3.org/2000/svg" width="18"
                                    height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                                Selesai
                            </div>
                        </td>
                        <td width="25%">
                            <div class="transaction-amount negative">-Rp26.000,00</div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="transaction-name">John Doe</div>
                        </td>
                        <td>
                            <div class="transaction-status">
                                <svg class="check-icon" xmlns="http://www.w3.org/2000/svg" width="18"
                                    height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                                Selesai
                            </div>
                        </td>
                        <td>
                            <div class="transaction-amount positive">+Rp5.000.000,00</div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="transaction-name">Fatur Al Khafi</div>
                        </td>
                        <td>
                            <div class="transaction-status">
                                <svg class="check-icon" xmlns="http://www.w3.org/2000/svg" width="18"
                                    height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                                Selesai
                            </div>
                        </td>
                        <td>
                            <div class="transaction-amount negative">-Rp26.000,00</div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="transaction-name">Dr Tirta</div>
                        </td>
                        <td>
                            <div class="transaction-status">
                                <svg class="check-icon" xmlns="http://www.w3.org/2000/svg" width="18"
                                    height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                                Selesai
                            </div>
                        </td>
                        <td>
                            <div class="transaction-amount negative">-Rp26.000,00</div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div> <br>

    </div>

    <script>
        let slideIndex = 0;
        showSlides();

        function showSlides() {
            let slides = document.getElementsByClassName("slide");
            let dots = document.getElementsByClassName("dot");
            for (let i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
                dots[i].classList.remove("active");
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].classList.add("active");
            setTimeout(showSlides, 5000);
        }

        function currentSlide(n) {
            slideIndex = n - 1;
            showSlides();
        }
    </script>

</body>

</html>
