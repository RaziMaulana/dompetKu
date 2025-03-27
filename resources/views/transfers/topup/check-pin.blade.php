<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buat PIN</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('{{ asset('Image/CheckPinBackground.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            min-height: 100vh;
        }

        .pin-input {
            width: 60px;
            height: 60px;
            font-size: 30px;
            text-align: center;
            border: 2px solid #007bff;
            border-radius: 8px;
            margin: 0 10px;
            outline: none;
            transition: border-color 0.3s;
        }

        .pin-input.error {
            border-color: #dc3545;
            animation: shake 0.5s;
        }

        .btn-custom {
            background-color: #007bff;
            color: white;
            width: 100%;
            padding: 15px;
            font-size: 18px;
        }

        .container {
            background: transparent;
        }

        h2 {
            font-weight: bold;
        }

        label {
            font-size: 18px;
            font-weight: 500;
            margin-top: 20px;
        }

        .alert-danger {
            background-color: rgba(220, 53, 69, 0.9);
            color: white;
            border-radius: 10px;
            max-width: 400px;
            margin: 20px auto;
        }

        @keyframes shake {
            0% { transform: translateX(0); }
            25% { transform: translateX(5px); }
            50% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
            100% { transform: translateX(0); }
        }
    </style>
</head>

<body class="d-flex align-items-center justify-content-center">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="container">
                    <h2 class="card-title mb-4">Masukan PIN</h2>

                    <!-- Error Messages -->
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true" style="color: white;">&times;</span>
                            </button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true" style="color: white;">&times;</span>
                            </button>
                        </div>
                    @endif

                    <form id="pinForm" action="{{ route('check-pin.verify') }}" method="POST">
                        @csrf
                        <input type="hidden" id="pin" name="pin" value="">

                        <label for="pin-input">Masukan 6 digit angka</label>
                        <div id="first-pin-inputs" class="d-flex justify-content-center my-3">
                            @for($i = 0; $i < 6; $i++)
                                <input type="text" class="pin-input {{ $errors->has('pin') ? 'error' : '' }}"
                                       maxlength="1" data-index="{{ $i }}">
                            @endfor
                        </div>

                        <button type="submit" class="btn btn-primary btn-custom rounded-pill mt-4">Lanjutkan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Function to handle automatic moving between PIN inputs
        function setupPinInputs(containerSelector) {
            const container = document.querySelector(containerSelector);
            const inputs = container.querySelectorAll('.pin-input');

            inputs.forEach((input, index) => {
                input.addEventListener('input', (e) => {
                    // Remove error class on input
                    input.classList.remove('error');

                    // Only move to next input if a digit is entered
                    if (e.target.value.length === 1 && /^\d$/.test(e.target.value)) {
                        // Move focus to next input if not the last input
                        if (index < inputs.length - 1) {
                            inputs[index + 1].focus();
                        }
                    }
                });

                // Handle backspace to move to previous input
                input.addEventListener('keydown', (e) => {
                    if (e.key === 'Backspace' && e.target.value.length === 0) {
                        if (index > 0) {
                            inputs[index - 1].focus();
                        }
                    }
                });

                // Restrict input to only numbers
                input.addEventListener('keypress', (e) => {
                    const char = e.key;
                    if (!/^\d$/.test(char)) {
                        e.preventDefault();
                    }
                });
            });
        }

        // Setup input handling for PIN input group
        setupPinInputs('#first-pin-inputs');

        // Handle form submission
        document.getElementById('pinForm').addEventListener('submit', function(e) {
            e.preventDefault();

            // Collect PIN from input group
            const pinInputs = document.querySelectorAll('#first-pin-inputs .pin-input');
            const pin = Array.from(pinInputs).map(input => input.value).join('');

            // Validate length
            if (pin.length !== 6) {
                pinInputs.forEach(input => input.classList.add('error'));
                alert('PIN harus 6 digit');
                return;
            }

            // Set hidden input value
            document.getElementById('pin').value = pin;

            // Submit the form
            this.submit();
        });

        // Auto-focus first empty input
        document.addEventListener('DOMContentLoaded', function() {
            const firstEmptyInput = document.querySelector('.pin-input:not([value])');
            if (firstEmptyInput) {
                firstEmptyInput.focus();
            }
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
