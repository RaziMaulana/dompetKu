<!DOCTYPE html>

<head>
    <title>Document</title>
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
            overflow: hidden;
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
    </style>
</head>

<body>

    <div class="container">
        <!-- Header -->
        <div class="header">
            <div class="logo">
                <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNCAyNCI+PHBhdGggZmlsbD0iIzM0OThkYiIgZD0iTTEyIDJDNi40ODYgMiAyIDYuNDg2IDIgMTJzNC40ODYgMTAgMTAgMTBzMTAtNC40ODYgMTAtMTBTMTcuNTE0IDIgMTIgMm0wIDE4Yy00LjQxMSAwLTgtMy41ODktOC04czMuNTg5LTggOC04IDggMy41ODkgOCA4LTMuNTg5IDgtOCA4bTIuNS02LjVIOS41VjE0aDVhLjUuNSAwIDAgMCAuNS0uNXYtNGEuNS41IDAgMCAwLS41LS41aC00YS41LjUgMCAwIDAtLjUuNVYxM2g1di0uNWgtNXYtM2g0LjV2NGgtMVYxMEg5LjV2NWgxYS41LjUgMCAwIDAgLjUtLjV2LS41aDIuNVYxMy41YS41LjUgMCAwIDAgLjUtLjV2LTV6Ii8+PC9zdmc+"
                    alt="Logo">
                <span>Beranda</span>
            </div>
            <div class="nav">
                <span class="nav-item">Transfer</span>
                <span class="nav-item">Aktivitas</span>
                <span class="nav-item">Catatan</span>
                <span class="nav-item">Investasi</span>
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
    </div>

</body>

</html>
