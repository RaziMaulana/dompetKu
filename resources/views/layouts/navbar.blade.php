<!-- filepath: c:\laragon\www\dompetKu\resources\views\layouts\navbar.blade.php -->
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
    }

    /* Header */
    .header {
        background-color: #1a1f2b;
        display: flex;
        align-items: center;
        padding: 15px 140px;
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

    .icon-menu {
        position: relative;
        display: inline-block;
    }

    .icon-menu-content {
        display: none;
        position: absolute;
        left: 0;
        top: 100%;
        background-color: #1a1f2b;
        min-width: 200px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        z-index: 1000;
        /* Ensure it appears above other elements */
    }

    .icon-menu-content.show {
        display: block;
    }

    .icon-menu-content a {
        color: white;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .icon-menu-content a:hover {
        background-color: #3498db;
    }
</style>

<div class="header">
    <div class="logo">
        <img src="{{ asset('image/dompetKu-logo.png') }}" alt="Logo">
    </div>
    <div class="nav">
        <a href="{{ route('dashboard-new') }}"
            class="nav-item {{ Request::routeIs('dashboard-new') ? 'active' : '' }}">Beranda</a>
        @if (Auth::check())
            <a href="{{ Auth::user()->pin ? route('transfer-kirim.index') : route('set-pin') }}"
                class="nav-item {{ Request::routeIs('transfer-kirim.index') || Request::routeIs('transfer-minta.index') || Request::routeIs('transfer-topup.index') || Request::routeIs('transaksi-topup') ? 'active' : '' }}">
                Transfer
            </a>
        @endif
        <a href="#" class="nav-item {{ Request::routeIs('activity') ? 'active' : '' }}">Aktivitas</a>
        <a href="{{ route('catatan.index') }}" class="nav-item {{ Request::routeIs('catatan.index') || Request::routeIs('catatan-daftar.index') || Request::routeIs('catatan-kategori.index') ? 'active' : '' }}">Catatan</a>
        <a href="#" class="nav-item {{ Request::routeIs('investment') ? 'active' : '' }}">Investasi</a>
    </div>
    <div class="header-right">
        <div class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
            </svg>
        </div>
        <div class="icon-menu" style="cursor: pointer;">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="3"></circle>
                <path
                    d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                </path>
            </svg>

            <div class="icon-menu-content">
                <a href="#">Profile</a>
                <a href="#">Settings</a>
                <a href="#">Logout</a>
            </div>

        </div>

        @if (Auth::check())
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="icon"
                    style="background: none; border: none; color: white; cursor: pointer;">Keluar</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="icon"
                style="color: white; text-decoration: none; cursor: pointer;">Login</a>
        @endif
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const iconMenu = document.querySelector('.icon-menu');
        const iconMenuContent = document.querySelector('.icon-menu-content');

        iconMenu.addEventListener('click', function(event) {
            event.stopPropagation();
            iconMenuContent.classList.toggle('show');
        });

        document.addEventListener('click', function() {
            if (iconMenuContent.classList.contains('show')) {
                iconMenuContent.classList.remove('show');
            }
        });

        iconMenuContent.addEventListener('click', function(event) {
            event.stopPropagation();
        });
    });
</script>
