<!DOCTYPE html>
<head>
    <title>Investasi | DompetKu</title>

    <style>

        main {
            margin: 0 136px;
        }

        h1 {
            font-size: 36px;
            margin-top: 20px;
            font-weight: 700;
            margin-bottom: 16px;
        }

        .card {
            width: 290px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
            padding: 15px;
            box-sizing: border-box;
            margin-top: 20px;
        }

        .picture {
            width: 80px;
            height: 80px;
            margin-right: 20px;

        }

        .picture img {
            max-width: 80px;
            max-height: 100px;
            border-radius: 30px;
        }

        .price {
            font-size: 18px;
            color: blue;
            margin-bottom: 5px;
        }

        .percentage {
            background-color: green;
            color: white;
            padding: 3px 8px;
            border-radius: 4px;
            display: inline-block;
            font-size: 14px;
        }

        .description {
            flex-grow: 1;
        }

        .name {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .pt {
            font-size: 14px;
            color: #666;
            margin-bottom: 5px;
        }

        .group {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        .tata-letak {
            display: flex;
            justify-content: space-between;
            gap: 15px;
        }

        .tata-letak-card {
            display: flex;
            justify-content: space-between;
            gap: 5px;
        }

        .banking-sector-container {
            margin-top: 30px;
            width: 400px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            font-family: Arial, sans-serif;
            padding: 25px;
            box-sizing: border-box;
        }

        .banking-sector-title {
            font-weight: bold;
            margin-bottom: 10px;
            padding-left: 5px;
        }

        .banking-sector-stock-card {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            padding: 5px;
            background-color: #f9f9f9;
            border-radius: 4px;
        }

        .banking-sector-logo {
            width: 30px;
            height: 30px;
            margin-right: 20px;
        }

        .banking-sector-logo img {
            max-width: 100%;
            max-height: 100%;
        }

        .banking-sector-info {
            flex-grow: 1;
        }

        .banking-sector-bank-name {
            font-weight: bold;
            margin-bottom: 3px;
            justify-content: space-between;
            display: flex;
            gap: 30px;
        }

        .banking-sector-bank-code {
            color: #666;
            font-size: 12px;
            margin-bottom: 3px;
        }

        .banking-sector-stock-price {
            font-size: 16px;
            color: blue;
        }

        .banking-sector-stock-change {
            background-color: green;
            color: white;
            padding: 2px 6px;
            border-radius: 4px;
            font-size: 12px;
        }

        .bank-group {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

    </style>

</head>
<body>

    @include('layouts.navbar')

    <main>

        <h1>Rekomendasi Saham</h1>
        <p>Trand saat ini</p>

        <div class="tata-letak">
            <div class="card">
                <div class="picture">
                    <img src="{{  asset('Image/QR-dompetKu.png') }}" alt="">
                </div>

                <div class="description">
                    <div class="name">WIIM</div>
                    <div class="pt">PT Wismilak Inti Ma.</div>
                    <div class="group">
                        <div class="price">Rp.100000</div>
                        <div class="percentage">211.43%</div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="picture">
                    <img src="" alt="">
                </div>

                <div class="description">
                    <div class="name">WIIM</div>
                    <div class="pt">PT Wismilak Inti Ma.</div>
                    <div class="group">
                        <div class="price">Rp.100000</div>
                        <div class="percentage">211.43%</div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="picture">
                    <img src="" alt="">
                </div>

                <div class="description">
                    <div class="name">WIIM</div>
                    <div class="pt">PT Wismilak Inti Ma.</div>
                    <div class="group">
                        <div class="price">Rp.100000</div>
                        <div class="percentage">211.43%</div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="picture">
                    <img src="" alt="">
                </div>

                <div class="description">
                    <div class="name">WIIM</div>
                    <div class="pt">PT Wismilak Inti Ma.</div>
                    <div class="group">
                        <div class="price">Rp.100000</div>
                        <div class="percentage">211.43%</div>
                    </div>
                </div>
            </div>

        </div>

        <div class="tata-letak-card">

            <div class="banking-sector-container">
                <div class="banking-sector-title">Sektor Perbankan</div>

                <div class="banking-sector-stock-card">
                    <div class="banking-sector-logo">
                        <img src="{{ asset('Image/BCA.png') }}" alt="BCA Logo">
                    </div>
                    <div class="banking-sector-info">
                        <div class="banking-sector-bank-name">Bank Central Asia
                            <span class="banking-sector-stock-price">Rp1562</span>
                        </div>
                        <div class="bank-group">
                            <div class="banking-sector-bank-code">BCA</div>
                            <span class="banking-sector-stock-change">144.21%</span>
                        </div>
                    </div>
                </div>

                <div class="banking-sector-stock-card">
                    <div class="banking-sector-logo">
                        <img src="{{ asset('Image/BCA.png') }}" alt="BCA Logo">
                    </div>
                    <div class="banking-sector-info">
                        <div class="banking-sector-bank-name">Bank Central Asia
                            <span class="banking-sector-stock-price">Rp1562</span>
                        </div>
                        <div class="bank-group">
                            <div class="banking-sector-bank-code">BCA</div>
                            <span class="banking-sector-stock-change">144.21%</span>
                        </div>
                    </div>
                </div>

                <div class="banking-sector-stock-card">
                    <div class="banking-sector-logo">
                        <img src="{{ asset('Image/BCA.png') }}" alt="BCA Logo">
                    </div>
                    <div class="banking-sector-info">
                        <div class="banking-sector-bank-name">Bank Central Asia
                            <span class="banking-sector-stock-price">Rp1562</span>
                        </div>
                        <div class="bank-group">
                            <div class="banking-sector-bank-code">BCA</div>
                            <span class="banking-sector-stock-change">144.21%</span>
                        </div>
                    </div>
                </div>

                <div class="banking-sector-stock-card">
                    <div class="banking-sector-logo">
                        <img src="{{ asset('Image/BCA.png') }}" alt="BCA Logo">
                    </div>
                    <div class="banking-sector-info">
                        <div class="banking-sector-bank-name">Bank Central Asia
                            <span class="banking-sector-stock-price">Rp1562</span>
                        </div>
                        <div class="bank-group">
                            <div class="banking-sector-bank-code">BCA</div>
                            <span class="banking-sector-stock-change">144.21%</span>
                        </div>
                    </div>
                </div>

                <div class="banking-sector-stock-card">
                    <div class="banking-sector-logo">
                        <img src="{{ asset('Image/BCA.png') }}" alt="BCA Logo">
                    </div>
                    <div class="banking-sector-info">
                        <div class="banking-sector-bank-name">Bank Central Asia
                            <span class="banking-sector-stock-price">Rp1562</span>
                        </div>
                        <div class="bank-group">
                            <div class="banking-sector-bank-code">BCA</div>
                            <span class="banking-sector-stock-change">144.21%</span>
                        </div>
                    </div>
                </div>

            </div>

            <div class="banking-sector-container">
                <div class="banking-sector-title">Sektor Energi</div>

                <div class="banking-sector-stock-card">
                    <div class="banking-sector-logo">
                        <img src="{{ asset('Image/BCA.png') }}" alt="BCA Logo">
                    </div>
                    <div class="banking-sector-info">
                        <div class="banking-sector-bank-name">Bank Central Asia
                            <span class="banking-sector-stock-price">Rp1562</span>
                        </div>
                        <div class="bank-group">
                            <div class="banking-sector-bank-code">BCA</div>
                            <span class="banking-sector-stock-change">144.21%</span>
                        </div>
                    </div>
                </div>

                <div class="banking-sector-stock-card">
                    <div class="banking-sector-logo">
                        <img src="{{ asset('Image/BCA.png') }}" alt="BCA Logo">
                    </div>
                    <div class="banking-sector-info">
                        <div class="banking-sector-bank-name">Bank Central Asia
                            <span class="banking-sector-stock-price">Rp1562</span>
                        </div>
                        <div class="bank-group">
                            <div class="banking-sector-bank-code">BCA</div>
                            <span class="banking-sector-stock-change">144.21%</span>
                        </div>
                    </div>
                </div>

                <div class="banking-sector-stock-card">
                    <div class="banking-sector-logo">
                        <img src="{{ asset('Image/BCA.png') }}" alt="BCA Logo">
                    </div>
                    <div class="banking-sector-info">
                        <div class="banking-sector-bank-name">Bank Central Asia
                            <span class="banking-sector-stock-price">Rp1562</span>
                        </div>
                        <div class="bank-group">
                            <div class="banking-sector-bank-code">BCA</div>
                            <span class="banking-sector-stock-change">144.21%</span>
                        </div>
                    </div>
                </div>

                <div class="banking-sector-stock-card">
                    <div class="banking-sector-logo">
                        <img src="{{ asset('Image/BCA.png') }}" alt="BCA Logo">
                    </div>
                    <div class="banking-sector-info">
                        <div class="banking-sector-bank-name">Bank Central Asia
                            <span class="banking-sector-stock-price">Rp1562</span>
                        </div>
                        <div class="bank-group">
                            <div class="banking-sector-bank-code">BCA</div>
                            <span class="banking-sector-stock-change">144.21%</span>
                        </div>
                    </div>
                </div>

                <div class="banking-sector-stock-card">
                    <div class="banking-sector-logo">
                        <img src="{{ asset('Image/BCA.png') }}" alt="BCA Logo">
                    </div>
                    <div class="banking-sector-info">
                        <div class="banking-sector-bank-name">Bank Central Asia
                            <span class="banking-sector-stock-price">Rp1562</span>
                        </div>
                        <div class="bank-group">
                            <div class="banking-sector-bank-code">BCA</div>
                            <span class="banking-sector-stock-change">144.21%</span>
                        </div>
                    </div>
                </div>

            </div>

            <div class="banking-sector-container">
                <div class="banking-sector-title">Sektor Telekomunikasi</div>

                <div class="banking-sector-stock-card">
                    <div class="banking-sector-logo">
                        <img src="{{ asset('Image/BCA.png') }}" alt="BCA Logo">
                    </div>
                    <div class="banking-sector-info">
                        <div class="banking-sector-bank-name">Bank Central Asia
                            <span class="banking-sector-stock-price">Rp1562</span>
                        </div>
                        <div class="bank-group">
                            <div class="banking-sector-bank-code">BCA</div>
                            <span class="banking-sector-stock-change">144.21%</span>
                        </div>
                    </div>
                </div>

                <div class="banking-sector-stock-card">
                    <div class="banking-sector-logo">
                        <img src="{{ asset('Image/BCA.png') }}" alt="BCA Logo">
                    </div>
                    <div class="banking-sector-info">
                        <div class="banking-sector-bank-name">Bank Central Asia
                            <span class="banking-sector-stock-price">Rp1562</span>
                        </div>
                        <div class="bank-group">
                            <div class="banking-sector-bank-code">BCA</div>
                            <span class="banking-sector-stock-change">144.21%</span>
                        </div>
                    </div>
                </div>

                <div class="banking-sector-stock-card">
                    <div class="banking-sector-logo">
                        <img src="{{ asset('Image/BCA.png') }}" alt="BCA Logo">
                    </div>
                    <div class="banking-sector-info">
                        <div class="banking-sector-bank-name">Bank Central Asia
                            <span class="banking-sector-stock-price">Rp1562</span>
                        </div>
                        <div class="bank-group">
                            <div class="banking-sector-bank-code">BCA</div>
                            <span class="banking-sector-stock-change">144.21%</span>
                        </div>
                    </div>
                </div>

                <div class="banking-sector-stock-card">
                    <div class="banking-sector-logo">
                        <img src="{{ asset('Image/BCA.png') }}" alt="BCA Logo">
                    </div>
                    <div class="banking-sector-info">
                        <div class="banking-sector-bank-name">Bank Central Asia
                            <span class="banking-sector-stock-price">Rp1562</span>
                        </div>
                        <div class="bank-group">
                            <div class="banking-sector-bank-code">BCA</div>
                            <span class="banking-sector-stock-change">144.21%</span>
                        </div>
                    </div>
                </div>

                <div class="banking-sector-stock-card">
                    <div class="banking-sector-logo">
                        <img src="{{ asset('Image/BCA.png') }}" alt="BCA Logo">
                    </div>
                    <div class="banking-sector-info">
                        <div class="banking-sector-bank-name">Bank Central Asia
                            <span class="banking-sector-stock-price">Rp1562</span>
                        </div>
                        <div class="bank-group">
                            <div class="banking-sector-bank-code">BCA</div>
                            <span class="banking-sector-stock-change">144.21%</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </main>

</body>
</html>
