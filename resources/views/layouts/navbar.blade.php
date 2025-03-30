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

    .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
            z-index: 100;
            display: none;
        }

        .profile-sidebar {
            position: fixed;
            top: 0;
            right: 0;
            width: 400px;
            height: 100%;
            background-color: white;
            z-index: 101;
            transform: translateX(100%);
            transition: transform 0.3s ease;
            padding: 30px;
        }

        .profile-sidebar.show {
            transform: translateX(0);
        }

        .overlay.active {
            display: block;
        }

        .profile-header {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 30px;
            text-align: left;
        }

        .profile-icon {
            width: 110px;
            height: 110px;
            background-image: url('{{ asset('Image/dompetKu-logo.png') }}');
            border-radius: 50%;
            background-repeat: no-repeat;
            background-size: cover;
            margin-top: 30px;
        }

        .profile-info {
            text-align: left;
            width: 100%;
            margin-left: 0;
        }

        .profile-info h2 {
            font-weight: 500;
            margin-bottom: 25px;
            color: black;
            margin-top: 20px;
        }

        .profile-info h3 {
            margin-bottom: 10px;
            font-weight: 300;
            color: black;
        }

        .profile-info p {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 20px;
        }

        .notification-dropdown {
            display: none; /* Sembunyikan secara default */
            position: absolute;
            top: 40px; /* Sesuaikan posisi dropdown */
            right: 0;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 250px;
            z-index: 1000;
        }

        .notification-dropdown ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .notification-dropdown li {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            color: black;
            cursor: pointer;
        }

        .notification-dropdown li:last-child {
            border-bottom: none;
        }

        .notification-dropdown li:hover {
            background-color: #f5f5f5;
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
                class="nav-item {{ Request::routeIs('transfer-kirim.index') || Request::routeIs('transfer-minta.index') || Request::routeIs('transfer-topup.index') || Request::routeIs('transaksi-topup') || Request::routeIs('share-page.index') || Request::routeIs('kirim.index') || Request::routeIs('check-pin.verify') ? 'active' : '' }}">
                Transfer
            </a>
        <a href="{{ route('catatan.index') }}" class="nav-item {{ Request::routeIs('catatan.index') || Request::routeIs('catatan-daftar.index') || Request::routeIs('catatan-kategori.index') ? 'active' : '' }}">Catatan</a>
        <a href="{{ route('investasi.index') }}" class="nav-item {{ Request::routeIs('investasi.index') ? 'active' : '' }}">Investasi</a>
        @endif
    </div>
    <div class="header-right" style="cursor: pointer;">
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

            <div class="notification-dropdown">
                <ul>
                    <li>Notifikasi 1</li>
                    <li>Notifikasi 2</li>
                    <li>Notifikasi 3</li>
                </ul>
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

    <div id="overlay" class="overlay"></div>

    @if (Auth::check())
        <div id="profileSidebar" class="profile-sidebar">
            <div class="profile-header">
                <img src="" class="profile-icon"></img>
                <div class="profile-info">
                    <h2>{{ Auth::user()->name }}</h2>
                    <h3>Email</h3>
                    <p>{{ Auth::user()->email }}</p>
                    <h3>No Telepon</h3>
                    <p>{{ Auth::user()->phone }}</p>
                </div>
            </div>

            <hr>

        </div>
    @else
        <div id="profileSidebar" class="profile-sidebar">
            <div class="profile-header">
                <img src="" class="profile-icon"></img>
                <div class="profile-info">
                    <h2>Silahkan Login Terlebih Dahulu</h2>
                </div>
            </div>

            <hr>

        </div>
    @endif

</div>

<script>

    document.addEventListener('DOMContentLoaded', function() {
        const iconMenu = document.querySelector('.icon-menu svg');
        const overlay = document.getElementById('overlay');
        const profileSidebar = document.getElementById('profileSidebar');

        iconMenu.addEventListener('click', function(event) {
            event.stopPropagation();
            overlay.classList.add('active');
            profileSidebar.classList.add('show');
        });

        overlay.addEventListener('click', function() {
            overlay.classList.remove('active');
            profileSidebar.classList.remove('show');
        });

        profileSidebar.addEventListener('click', function(event) {
            event.stopPropagation();
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        const icon = document.querySelector('.icon');
        const notificationDropdown = document.querySelector('.notification-dropdown');

        icon.addEventListener('click', function (event) {
            event.stopPropagation(); // Mencegah event bubbling
            notificationDropdown.style.display =
                notificationDropdown.style.display === 'block' ? 'none' : 'block';
        });

        // Sembunyikan dropdown jika klik di luar elemen
        document.addEventListener('click', function () {
            notificationDropdown.style.display = 'none';
        });
    });

</script>
