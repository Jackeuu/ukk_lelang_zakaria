<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Layout - Aplikasi Lelang</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'poppins';
        }

        body {
            background-color: #f4f8ff;
            display: flex;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color:rgb(255, 255, 255);
            color: white;
            padding: 20px;
            position: fixed;
        }

        .sidebar h2 {
            margin-bottom: 30px;
            text-align: center;
            color: black;
        }

        .sidebar a {
            display: block;
            padding: 12px;
            margin-bottom: 10px;
            background: rgba(255, 255, 255, 0.1);
            color: blue;
            text-decoration: none;
            border-radius: 6px;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background: rgba(90, 156, 255, 0.3);
        }

        /* Main content */
        .main {
            margin-left: 250px;
            width: calc(100% - 250px);
            padding: 20px;
        }

        /* Top bar search */
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
        <a href="#">Dashboard</a>
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Data Master</span></li>
        br
        <a href="#">Data Petugas</a>
        <a href="#">Data Barang</a>
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Transaksi</span></li>
        <a href="#">Lelang</a>
        <a href="#">Pengaturan</a>
    </div>

    <div class="main">
        <div class="top-bar">
            <div class="search-box">
                <input type="text" placeholder="Search...">
            </div>
        </div>

        <div class="content">
            <h2>Selamat datang di aplikasi lelang</h2>
            <p>Silahkan pilih menu di sidebar untuk melanjutkan.</p>
        </div>

        <div class="content">
            @yield('konten')
        </div>
    </div>

</body>

</html>