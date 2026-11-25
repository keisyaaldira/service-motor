<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Service Motor') - Blue Garage</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            background: #f1f5fb;
            color: #1e293b;
        }

        /* Layout */
        .app-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 255px;
            background: #163B70;
            color: white;
            padding: 25px 16px;
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 5px 10px 30px;
        }

        .brand-icon {
            width: 43px;
            height: 43px;
            background: #2563EB;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
        }

        .brand-name {
            font-size: 18px;
            font-weight: 700;
        }

        .brand-subtitle {
            font-size: 11px;
            color: #b9d4f5;
            margin-top: 3px;
        }

        .menu-label {
            font-size: 11px;
            color: #8fb5e3;
            font-weight: 700;
            letter-spacing: 1.2px;
            padding: 10px 12px;
            margin-bottom: 8px;
        }

        .nav-menu {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .nav-menu a {
            text-decoration: none;
            color: #d6e5f8;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            border-radius: 9px;
            font-size: 14px;
            transition: 0.2s;
        }

        .nav-menu a:hover {
            background: #234d82;
            color: white;
        }

        .nav-menu a.active {
            background: #2563EB;
            color: white;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(10, 25, 55, 0.18);
        }

        .nav-icon {
            width: 22px;
            text-align: center;
            font-size: 17px;
        }

        .sidebar-footer {
            margin-top: auto;
            border-top: 1px solid #315783;
            padding: 18px 10px 0;
            color: #b9d4f5;
            font-size: 12px;
            line-height: 1.7;
        }

        /* Main Content */
        .main-area {
            flex: 1;
            min-width: 0;
        }

        .topbar {
            background: #ffffff;
            height: 75px;
            padding: 0 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #e4eaf2;
        }

        .topbar-title {
            font-size: 18px;
            font-weight: 600;
            color: #163B70;
        }

        .admin-info {
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .admin-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #DBEAFE;
            color: #2563EB;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        .admin-name {
            font-size: 13px;
            font-weight: 600;
            color: #334155;
        }

        .admin-role {
            font-size: 11px;
            color: #94a3b8;
            margin-top: 3px;
        }

        .content {
            padding: 30px 32px;
        }

        .page-heading {
            margin-bottom: 25px;
        }

        .page-heading h1 {
            font-size: 24px;
            color: #163B70;
            margin-bottom: 7px;
        }

        .page-heading p {
            color: #64748b;
            font-size: 14px;
        }

        /* Cards */
        .card {
            background: white;
            border: 1px solid #e5ebf3;
            border-radius: 13px;
            padding: 22px;
            box-shadow: 0 3px 12px rgba(30, 60, 100, 0.04);
            margin-bottom: 20px;
        }

        /* Buttons */
        .btn {
            display: inline-block;
            border: none;
            border-radius: 8px;
            padding: 10px 16px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-primary {
            background: #2563EB;
            color: white;
        }

        .btn-primary:hover {
            background: #1D4ED8;
        }

        .btn-secondary {
            background: #EAF2FF;
            color: #1D4ED8;
        }

        .btn-danger {
            background: #FEE2E2;
            color: #DC2626;
        }

        /* Forms */
        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #334155;
            margin-bottom: 8px;
        }

        .form-control {
            width: 100%;
            border: 1px solid #d7e1ee;
            background: #fff;
            border-radius: 8px;
            padding: 11px 13px;
            font-size: 14px;
            color: #334155;
            outline: none;
        }

        .form-control:focus {
            border-color: #60A5FA;
            box-shadow: 0 0 0 3px rgba(96, 165, 250, 0.15);
        }

        /* Table */
        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th {
            background: #EFF6FF;
            color: #163B70;
            padding: 13px 14px;
            text-align: left;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        table td {
            padding: 13px 14px;
            border-bottom: 1px solid #edf1f6;
            font-size: 13px;
            color: #475569;
        }

        table tr:hover td {
            background: #f8fbff;
        }

        /* Alerts */
        .alert-success {
            background: #DCFCE7;
            color: #166534;
            border: 1px solid #BBF7D0;
            padding: 13px 16px;
            border-radius: 8px;
            margin-bottom: 18px;
            font-size: 14px;
        }

        .alert-danger {
            background: #FEE2E2;
            color: #991B1B;
            border: 1px solid #FECACA;
            padding: 13px 16px;
            border-radius: 8px;
            margin-bottom: 18px;
            font-size: 14px;
        }

        /* Responsive */
        @media (max-width: 850px) {
            .sidebar {
                width: 210px;
            }

            .content {
                padding: 22px 18px;
            }

            .topbar {
                padding: 0 18px;
            }
        }

        @media (max-width: 600px) {
            .app-container {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                padding: 15px;
            }

            .brand {
                padding-bottom: 15px;
            }

            .nav-menu {
                flex-direction: row;
                flex-wrap: wrap;
            }

            .nav-menu a {
                padding: 10px;
                font-size: 12px;
            }

            .sidebar-footer {
                display: none;
            }

            .topbar {
                height: 60px;
            }

            .content {
                padding: 18px 14px;
            }
        }
    </style>
</head>

<body>

<div class="app-container">

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div class="brand">
            <div class="brand-icon">🏍</div>
            <div>
                <div class="brand-name">Blue Garage</div>
                <div class="brand-subtitle">Motor Service System</div>
            </div>
        </div>

        <div class="menu-label">MENU UTAMA</div>

        <nav class="nav-menu">

            <a href="{{ route('pelanggan.index') }}"
               class="{{ request()->routeIs('pelanggan.*') ? 'active' : '' }}">
                <span class="nav-icon">👥</span>
                Data Pelanggan
            </a>

            <a href="{{ route('kendaraan.index') }}"
               class="{{ request()->routeIs('kendaraan.*') ? 'active' : '' }}">
                <span class="nav-icon">🏍</span>
                Data Kendaraan
            </a>

            <a href="{{ route('daftar-service.index') }}"
               class="{{ request()->routeIs('daftar-service.*') ? 'active' : '' }}">
                <span class="nav-icon">📋</span>
                Daftar Service
            </a>

            <a href="{{ route('data-service.index') }}"
               class="{{ request()->routeIs('data-service.*') ? 'active' : '' }}">
                <span class="nav-icon">🔧</span>
                Data Service
            </a>

            <a href="{{ route('pembayaran-service.index') }}"
               class="{{ request()->routeIs('pembayaran-service.*') ? 'active' : '' }}">
                <span class="nav-icon">💳</span>
                Pembayaran Service
            </a>

        </nav>

        <div class="sidebar-footer">
            <strong>Blue Garage</strong><br>
            Sistem Informasi Service Motor<br>
            &copy; {{ date('Y') }} All Rights Reserved
        </div>

    </aside>

    <!-- MAIN AREA -->
    <main class="main-area">

        <header class="topbar">
            <div class="topbar-title">
                @yield('header', 'Blue Garage')
            </div>

            <div class="admin-info">
                <div class="admin-avatar">A</div>
                <div>
                    <div class="admin-name">Administrator</div>
                    <div class="admin-role">Admin Sistem</div>
                </div>
            </div>
        </header>

        <section class="content">

            @if(session('success'))
                <div class="alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')

        </section>

    </main>

</div>

</body>
</html>
