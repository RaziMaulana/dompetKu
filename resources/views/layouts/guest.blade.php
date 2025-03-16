<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <style>
           body {
                background-image: url('{{ asset('Image/LoginAndRegisterBackgroundImage.png') }}');
                background-size: cover; /* Menutupi seluruh area */
                background-position: center; /* Posisi gambar di tengah */
                background-repeat: no-repeat; /* Gambar tidak diulang */
                background-attachment: fixed; /* Gambar tetap diam saat di-scroll (opsional) */
                min-height: 100vh; /* Tinggi minimal sama dengan tinggi layar */
                margin: 0; /* Menghapus margin default */
            }
        </style>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    </head>
    <body>
        <div>
            <div>
                {{ $slot }}
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
