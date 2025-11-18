<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Lelang</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins";
        }

        body {
            background-color: #f4f8ff;
            display: flex;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: white;
            padding: 20px;
            position: fixed;
        }

        .sidebar h2 {
            margin-bottom: 30px;
            text-align: center;
            color: black;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px;
            margin-bottom: 10px;
            color: blue;
            text-decoration: none;
            border-radius: 6px;
            transition: 0.3s;
            font-size: 15px;
        }

        .sidebar a:hover {
            background: rgba(90, 156, 255, 0.3);
        }

        .sidebar a.active {
            background-color: rgb(0, 102, 255);
            color: white;
        }

        .main {
            margin-left: 250px;
            width: calc(100% - 250px);
            padding: 20px;
        }

        .top-bar {
            background: white;
            padding: 15px 20px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 3px 7px rgba(0, 0, 0, 0.1);
        }

        .search-box {
            width: 300px;
            display: flex;
            align-items: center;
            background: #e3f2fd;
            border-radius: 6px;
            padding: 8px 12px;
        }

        .search-box input {
            border: none;
            outline: none;
            background: transparent;
            width: 100%;
        }

        .content {
            margin-top: 25px;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 3px 7px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <h2>Aplikasi Lelang</h2>
        {{-- DEBUG --}}


        <!-- ADMIN -->
        @if(session('level') == 'Administrator')

            <a href="/dashboard">Dashboard</a>

            <br>
            <small style="color:gray">DATA MASTER</small>
            <a href="/petugas">Data Petugas</a>
            <a href="/masyarakat">Data Masyarakat</a>
            <a href="/barang">Data Barang</a>

            <br>
            <small style="color:gray">LAPORAN</small>
            <a href="/laporan">Laporan</a>

            <a href="/logout_petugas">Logout</a>

        @endif



        <!-- PETUGAS -->
        @if(session('level') == 'Petugas')

            <a href="/dashboard">Dashboard</a>

            <br>
            <small style="color:gray">DATA MASTER</small>
            <a href="/barang">Data Barang</a>

            <br>
            <small style="color:gray">LELANG</small>
            <a href="/lelang">Lelang Barang</a>
            <a href="/History_lelang">Riwayat Lelang</a>

            <br>
            <small style="color:gray">LAPORAN</small>
            <a href="/laporan">Laporan</a>

            <a href="/logout_petugas">Logout</a>

        @endif

        <!-- MASYARAKAT -->
        @if(session('level') == 'masyarakat')

            <a href="/dashboard_masyarakat">Dashboard</a>

            <br>
            <small style="color:gray">LELANG</small>
            <a href="{{ route('lelangMasyarakat') }}">Lelang</a>
            <a href="/History_lelang">History Saya</a>

            <a href="/logout_masyarakat">Logout</a>

        @endif

    </div>


    <div class="main">

        <div class="top-bar">
            <div class="search-box">
                <input type="text" placeholder="Search...">
            </div>
        </div>

        <div class="content">
            @yield('konten')
        </div>

    </div>

    <script>
        const links = document.querySelectorAll(".sidebar a");
        const current = window.location.pathname;

        links.forEach(a => {
            if (current.startsWith(a.getAttribute("href"))) {
                a.classList.add("active");
            }
        });
    </script>

</body>

</html>