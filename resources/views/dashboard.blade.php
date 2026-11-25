@extends('layouts.app')

@section('title', 'Dashboard')

@section('header', 'Dashboard')

@section('content')

<div class="page-heading">
    <h1>Dashboard</h1>
    <p>Selamat datang di Blue Garage - Sistem Informasi Service Motor.</p>
</div>

<style>
    .welcome-card {
        background: linear-gradient(135deg, #163B70, #2563EB);
        color: white;
        padding: 30px;
        border-radius: 16px;
        margin-bottom: 25px;
        position: relative;
        overflow: hidden;
    }

    .welcome-card h2 {
        font-size: 24px;
        margin-bottom: 10px;
    }

    .welcome-card p {
        font-size: 14px;
        color: #DBEAFE;
        line-height: 1.7;
    }

    .welcome-tag {
        display: inline-block;
        background: rgba(255,255,255,0.15);
        border: 1px solid rgba(255,255,255,0.2);
        padding: 7px 12px;
        border-radius: 20px;
        font-size: 12px;
        margin-bottom: 15px;
    }

    .dashboard-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        margin-bottom: 25px;
    }

    .dashboard-card {
        background: white;
        border: 1px solid #E5EBF3;
        border-radius: 13px;
        padding: 22px;
        transition: 0.2s;
    }

    .dashboard-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 22px rgba(37, 99, 235, 0.08);
    }

    .dashboard-card-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 17px;
    }

    .dashboard-icon {
        width: 46px;
        height: 46px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 21px;
    }

    .icon-blue {
        background: #DBEAFE;
    }

    .icon-sky {
        background: #E0F2FE;
    }

    .icon-indigo {
        background: #E0E7FF;
    }

    .icon-cyan {
        background: #CFFAFE;
    }

    .icon-purple {
        background: #EDE9FE;
    }

    .dashboard-card h3 {
        color: #163B70;
        font-size: 16px;
        margin-bottom: 8px;
    }

    .dashboard-card p {
        font-size: 13px;
        color: #64748B;
        line-height: 1.6;
        margin-bottom: 18px;
    }

    .card-link {
        text-decoration: none;
        color: #2563EB;
        font-size: 13px;
        font-weight: 600;
    }

    .card-link:hover {
        color: #163B70;
    }

    .dashboard-info {
        background: white;
        border: 1px solid #E5EBF3;
        border-radius: 13px;
        padding: 22px;
    }

    .dashboard-info h3 {
        font-size: 16px;
        color: #163B70;
        margin-bottom: 12px;
    }

    .dashboard-info p {
        font-size: 13px;
        color: #64748B;
        line-height: 1.8;
    }

    @media(max-width: 700px) {
        .dashboard-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="welcome-card">
    <div class="welcome-tag">MOTOR SERVICE MANAGEMENT</div>
    <h2>Welcome to Blue Garage</h2>
    <p>
        Kelola data pelanggan, kendaraan, pencatatan service,
        pengerjaan, dan pembayaran motor dengan mudah melalui
        satu sistem terintegrasi.
    </p>
</div>

<div class="dashboard-grid">

    <div class="dashboard-card">
        <div class="dashboard-card-top">
            <div class="dashboard-icon icon-blue">👥</div>
        </div>
        <h3>Data Pelanggan</h3>
        <p>Mengelola informasi pelanggan, nomor HP, alamat, dan pekerjaan.</p>
        <a href="{{ route('pelanggan.index') }}" class="card-link">
            Buka Data Pelanggan →
        </a>
    </div>

    <div class="dashboard-card">
        <div class="dashboard-card-top">
            <div class="dashboard-icon icon-sky">🏍️</div>
        </div>
        <h3>Data Kendaraan</h3>
        <p>Mengelola identitas motor, nomor plat, STNK, tahun, dan warna.</p>
        <a href="{{ route('kendaraan.index') }}" class="card-link">
            Buka Data Kendaraan →
        </a>
    </div>

    <div class="dashboard-card">
        <div class="dashboard-card-top">
            <div class="dashboard-icon icon-indigo">📋</div>
        </div>
        <h3>Daftar Service</h3>
        <p>Mencatat kendaraan masuk, pelanggan, keluhan, dan tanggal service.</p>
        <a href="{{ route('daftar-service.index') }}" class="card-link">
            Buka Daftar Service →
        </a>
    </div>

    <div class="dashboard-card">
        <div class="dashboard-card-top">
            <div class="dashboard-icon icon-cyan">🔧</div>
        </div>
        <h3>Data Service</h3>
        <p>Mencatat proses pengerjaan, mekanik, estimasi, dan sparepart.</p>
        <a href="{{ route('data-service.index') }}" class="card-link">
            Buka Data Service →
        </a>
    </div>

    <div class="dashboard-card">
        <div class="dashboard-card-top">
            <div class="dashboard-icon icon-purple">💳</div>
        </div>
        <h3>Pembayaran Service</h3>
        <p>Mencatat biaya service, metode pembayaran, dan keterangan.</p>
        <a href="{{ route('pembayaran-service.index') }}" class="card-link">
            Buka Pembayaran →
        </a>
    </div>

</div>

<div class="dashboard-info">
    <h3>Informasi Sistem</h3>
    <p>
        Blue Garage merupakan aplikasi berbasis web yang dirancang
        untuk membantu proses administrasi bengkel motor mulai dari
        pendataan pelanggan dan kendaraan hingga pencatatan service
        dan pembayaran.
    </p>
</div>

@endsection
