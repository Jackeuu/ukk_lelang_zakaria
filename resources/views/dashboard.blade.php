@extends('master')
@section('konten')

<style>
    .dashboard-title {
        font-size: 24px;
        font-weight: bold;
        color: #0d47a1;
        margin-bottom: 10px;
    }

    .dashboard-sub {
        color: #666;
        margin-bottom: 25px;
    }

    .cards {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        margin-bottom: 30px;
    }

    .card-box {
        background: #f5f9ff;
        border-left: 5px solid #0d47a1;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        transition: .3s;
    }

    .card-box:hover {
        transform: translateY(-4px);
    }

    .card-title {
        color: #0d47a1;
        font-weight: bold;
        font-size: 16px;
    }

    .card-value {
        font-size: 28px;
        font-weight: bold;
        margin-top: 8px;
        color: #333;
    }

    /* Grafik */
    .chart-box {
        background: #ffffff;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 3px 7px rgba(0,0,0,0.1);
        margin-bottom: 30px;
    }

    /* Tabel */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
    }

    table th, table td {
        padding: 12px;
        border-bottom: 1px solid #eee;
        text-align: left;
    }

    table th {
        background: #e3f2fd;
        color: #0d47a1;
    }

    .status-open {
        color: green;
        font-weight: bold;
    }

    .status-close {
        color: red;
        font-weight: bold;
    }
</style>

<div class="dashboard-title">Dashboard Aplikasi Lelang</div>
<div class="dashboard-sub">Selamat datang! Berikut ringkasan aktivitas lelang hari ini.</div>

{{-- CARD INFORMASI --}}
<div class="cards">
    <div class="card-box">
        <div class="card-title">Total Barang</div>
        <div class="card-value">120</div>
    </div>
    <div class="card-box">
        <div class="card-title">Lelang Berlangsung</div>
        <div class="card-value">8</div>
    </div>
    <div class="card-box">
        <div class="card-title">User Terdaftar</div>
        <div class="card-value">340</div>
    </div>
    <div class="card-box">
        <div class="card-title">Transaksi Hari Ini</div>
        <div class="card-value">27</div>
    </div>
</div>

{{-- TABEL --}}
<div class="chart-box">
    <h3 style="color:#0d47a1; margin-bottom: 15px;">Lelang Terbaru</h3>

    <table>
        <tr>
            <th>Nama Barang</th>
            <th>Harga Awal</th>
            <th>Penawaran Tertinggi</th>
            <th>Status</th>
        </tr>

        <tr>
            <td>Smartphone Samsung A52</td>
            <td>Rp 1.200.000</td>
            <td>Rp 1.550.000</td>
            <td class="status-open">OPEN</td>
        </tr>

        <tr>
            <td>Sepeda Gunung Polygon</td>
            <td>Rp 850.000</td>
            <td>Rp 1.300.000</td>
            <td class="status-close">CLOSED</td>
        </tr>

        <tr>
            <td>Laptop Lenovo Thinkpad</td>
            <td>Rp 2.000.000</td>
            <td>Rp 2.750.000</td>
            <td class="status-open">OPEN</td>
        </tr>
    </table>
</div>

@endsection
