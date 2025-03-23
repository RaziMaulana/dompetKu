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

</style>

<div class="header">
    <div class="logo">
        <img src="{{ asset('image/dompetKu-logo.png') }}" alt="Logo">
    </div>
    <div class="nav">
        <a href="{{ route('dashboard-new') }}" class="nav-item {{ Request::routeIs('dashboard-new') ? 'active' : '' }}">Beranda</a>
        <a href="{{ route('transfer-dashboard') }}" class="nav-item {{ Request::routeIs('transfer-dashboard') ? 'active' : '' }}">Transfer</a>
        <a href="#" class="nav-item {{ Request::routeIs('activity') ? 'active' : '' }}">Aktivitas</a>
        <a href="#" class="nav-item {{ Request::routeIs('notes') ? 'active' : '' }}">Catatan</a>
        <a href="#" class="nav-item {{ Request::routeIs('investment') ? 'active' : '' }}">Investasi</a>
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
