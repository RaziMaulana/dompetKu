<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gopay Balance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('{{ asset('Image/CheckPinBackground.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            min-height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        .center-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex: 1;
        }

        .balance-card {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            padding: 1.5rem;
            margin: 1rem;
        }

        .balance-amount {
            font-size: 2rem;
            font-weight: bold;
            text-align: center;
            margin: 1rem 0;
        }

        .balance-option {
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 1rem;
        }

        .form-check-input {
            margin-top: 0.3rem;
        }

        .user-info {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .user-name {
            font-weight: bold;
            font-size: 1.2rem;
        }

        .user-phone {
            color: #666;
        }
    </style>
</head>

<body>
    @include('layouts.navbar')

    <div class="center-container">
        <div class="balance-card">
            <div class="user-info">
                <div class="user-name">Raditya Anugrah Sagitaris</div>
                <div class="user-phone">Gopay 0811 2233 4455</div>
            </div>

            <div class="balance-amount">Rp 0</div>

            <div class="balance-option form-check">
                <input class="form-check-input" type="checkbox" id="walletBalance">
                <label class="form-check-label" for="walletBalance">
                    Saldo <strong>Dompetku.</strong><br>
                    Rp1.000.000
                </label>
            </div>

            <div class="balance-option">
                <label for="notes">Catatan (Opsional)</label>
                <input type="text" class="form-control mt-2" id="notes" placeholder="">
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
