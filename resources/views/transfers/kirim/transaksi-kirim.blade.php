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
            flex-direction: column;
        }

        .balance-card {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 900px;
            margin: 1rem;
            padding: 2rem;
        }

        .balance-amount {
            font-size: 2rem;
            font-weight: bold;
            margin: 1rem 0;
        }

        .balance-option {
            border-radius: 10px;
            margin-bottom: 1rem;
        }

        .form-check-input {
            margin-top: 0.3rem;
        }

        .user-info {
            margin-bottom: 1.5rem;
        }

        .user-name {
            font-weight: bold;
            font-size: 1.2rem;
        }

        .user-phone {
            color: #666;
        }

        .large-input {
            height: 50px;
            font-size: 1.1rem;
        }

        .amount-input {
            font-size: 1.3rem;
            height: 60px;
            text-align: left;
            padding-left: 15px;
        }

        .input-label {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 5px;
            display: block;
        }

        .input-group-text {
            font-size: 1.3rem;
            font-weight: bold;
            background-color: white;
            border-right: none;
        }

        .wallet-balance-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 1rem;
            margin-top: 5px;
            padding: 0 15px;
        }

        .wallet-label {
            color: #666;
        }

        .wallet-label strong {
            color: #000;
        }

        .wallet-amount {
            font-weight: bold;
        }

        .next-button {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 1rem;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .next-button:hover {
            background-color: #0056b3;
        }

        .group-teks {
            display: flex;
            justify-content: space-between;
        }

    </style>
</head>

<body>
    @include('layouts.navbar')
    <div class="center-container">
        <div class="balance-card p-5">
            <div class="user-info">
                <div class="user-name">{{ Auth::user()->name }}</div>
                <div class="group-teks">
                    <div class="user-phone">Gopay {{ Auth::user()->phone }}</div>
                    <div>Saldo Anda Rp{{ number_format(Auth::user()->saldo, 0, ',', '.') }}</div>
                </div>
            </div>

            <form id="transferForm" action="{{ route('kirim.store') }}" method="POST">
                @csrf
                <!-- Currency formatted amount input field -->
                    <div class="balance-option">
                        <div class="input-group">
                            <input type="text" class="form-control amount-input" id="amountInput" name="nominal" placeholder="RP 0"
                                inputmode="numeric" required>
                        </div>
                        <div class="wallet-balance-container mt-3">
                            @foreach ($kirim as $kirim)
                                <div class="wallet-item" style="display: flex; align-items : center; margin-bottom: 10px;">
                                    <img src="{{ $kirim->gambar }}" alt="Wallet Image" class="img-fluid"
                                        style="max-width: 40px; margin-right: 10px;">
                                    <span class="wallet-label">Saldo <strong>{{ $kirim->dikirim }}</strong></span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Larger notes input field -->
                    <div class="balance-option">
                        <input type="text" class="form-control large-input" id="notes" name="note" placeholder="Catatan (Opsional)">
                    </div>
                </div>
                <!-- Input hidden untuk menyimpan ID kirim -->
                <input type="hidden" id="kirimId" name="id" value="{{ $kirim->id }}">
                <button type="submit" class="next-button w-50 rounded-pill" id="nextButton"><strong>Berikutnya</strong></button>
                <a class="text-primary mt-3 fs-6 link-underline link-underline-opacity-0" href="{{ route('transfer-kirim.index') }}">Batalkan</a>
            </form>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const amountInput = document.getElementById('amountInput');
            const notesInput = document.getElementById('notes');
            const nextButton = document.getElementById('nextButton');
            const kirimIdInput = document.getElementById('kirimId');
            const transferForm = document.getElementById('transferForm');

            // Debugging untuk memastikan elemen ditemukan
            console.log(amountInput); // Pastikan ini tidak null
            console.log(notesInput);  // Pastikan ini tidak null
            console.log(nextButton);  // Pastikan ini tidak null
            console.log(kirimIdInput); // Pastikan ini tidak null
            console.log(transferForm); // Pastikan ini tidak null

            if (!amountInput || !notesInput || !nextButton || !kirimIdInput || !transferForm) {
                console.error('Salah satu elemen tidak ditemukan!');
                return;
            }

            // Format input nominal sebagai mata uang
            amountInput.addEventListener('input', function(e) {
                let value = this.value.replace(/\D/g, ''); // Hapus karakter non-digit
                if (value !== '') {
                    value = parseInt(value, 10).toLocaleString('id-ID'); // Format angka
                }
                this.value = value;
            });

            // Tangani klik tombol "Berikutnya"
            nextButton.addEventListener('click', function(e) {
                e.preventDefault(); // Cegah pengiriman form default

                const amount = amountInput.value.replace(/\D/g, ''); // Ambil nilai nominal tanpa format
                const notes = notesInput.value; // Ambil nilai catatan
                const kirimId = kirimIdInput.value; // Ambil ID kirim

                // Validasi nominal
                if (!amount || parseInt(amount) <= 0) {
                    alert('Masukkan nominal yang valid!');
                    return;
                }

                // Set nilai bersih ke input sebelum submit
                amountInput.value = amount;

                // Kirim form
                transferForm.submit();
            });
        });
    </script>
</body>

</html>
