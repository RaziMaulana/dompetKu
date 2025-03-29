<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gopay Balance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Existing Styles */
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
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            margin: 1rem;
            padding: 2rem;
        }

        .transaction-title {
            text-align: center;
            font-weight: bold;
            font-size: 1.25rem;
        }

        .balance-amount,
        .wallet-amount {
            font-size: 1.5rem;
            margin: 1rem 0;
            text-align: center;
        }

        .user-info {
            margin-bottom: 1.5rem;
        }

        .user-name {
            font-weight: bold;
            font-size: 1.5rem;
        }

        .user-phone {
            color: #666;
        }

        .wallet-balance {
            display: flex;
            justify-content: space-between;
            text-align: center;
            font-size: 1.5rem;
            margin-top: 5px;
        }

        .quote-card {
            background-color: #007bff;
            border-bottom-left-radius: 15px;
            border-bottom-right-radius: 15px;
            padding: 20px;
            max-width: 500px;
            color: white;
            position: relative;
            bottom: 20px;
        }
    </style>
</head>

<body>
    @include('layouts.navbar')
    <div class="center-container">
        <div class="balance-card">
            <div class="transaction-title mb-5">Cek Ulang Transaksi</div>
            <div class="user-info">
                <div class="user-name">Raditya Anugrah Sagitaris</div>
                <div class="user-phone">Gopay 0811 2233 4455</div>
            </div>
            <div class="wallet-balance">
                @foreach ($kirim as $kirim)
                    <div>Jumlah</div>
                    <div class="wallet-amount">Rp{{ number_format($kirim->nominal, 0, ',', '.') }}</div>
            </div>
            <div class="wallet-balance">
                <div>Biaya</div>
                <div class="wallet-amount"> GRATIS</div>
            </div>
            <div class="wallet-balance">
                    <div><strong>Total</strong></div>
                    <div class="wallet-amount">Rp{{ number_format($kirim->nominal, 0, ',', '.') }}</div>
            </div>
        </div>

        <div class="quote-card">
            "Matahari terbenam indah, angin sepoi-sepoi, burung berkicau riang, hujan turun perlahan, senja merah,
            gelombang laut tenang, malam datang sunyi."
        </div>

        <!-- Kirim Button -->
        <form id="kirimForm" method="POST" action="{{ route('kirim-confirmation.FillStatus') }}">
            @csrf
                <input type="hidden" name="id" value="{{ $kirim->id }}">
            @endforeach
            <button type="submit" class="btn btn-primary mt-3 px-5 py-3 rounded-pill">Kirim</button>
        </form>
        <a class="text-primary mt-3 fs-6 link-underline link-underline-opacity-0" href="{{ route('kirim.index') }}">Kembali</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('kirimForm').addEventListener('submit', function(e) {
            e.preventDefault();

            // Tampilkan loading atau feedback ke user
            const button = this.querySelector('button[type="submit"]');
            button.disabled = true;
            button.innerHTML = 'Memproses...';

            // Kirim form secara asynchronous
            fetch(this.action, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                },
                body: new URLSearchParams(new FormData(this))
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = "{{ route('kirim-succeed.index') }}";
                } else {
                    alert('Gagal mengupdate status');
                    button.disabled = false;
                    button.innerHTML = 'Kirim';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan');
                button.disabled = false;
                button.innerHTML = 'Kirim';
            });
        });
    </script>
</body>

</html>
