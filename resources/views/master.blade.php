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
            font-family: "Poppins";
        }

        body {
            background-color: #f4f8ff;
            display: flex;
        }

        /*  untuk bagian Sidebar */
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

        .sidebar a svg {
            width: 20px;
            height: 20px;
        }

        .sidebar a:hover {
            background: rgba(90, 156, 255, 0.3);
        }

        .sidebar a.active {
            background-color: rgb(0, 102, 255);
            color: white;
        }

        .sidebar a.active svg path {
            fill: white;
        }

        /* Main */
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

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Aplikasi Lelang</h2>

        <a href="/dashboard">
            <!-- Dashboard Icon -->
            <svg viewBox="0 0 24 24">
                <path fill="blue" d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z" />
            </svg>
            Dashboard
        </a>

        <br>
        <small style="color:gray">DATA MASTER</small>

        <a href="/petugas">
            <svg viewBox="0 0 24 24">
                <path fill="blue"
                    d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5zm0 2c-3.3 0-10 1.7-10 5v3h20v-3c0-3.3-6.7-5-10-5z" />
            </svg>
            Data Petugas
        </a>

        <a href="/masyarakat">
            <svg viewBox="0 0 24 24">
                <path fill="blue"
                    d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5zm0 2c-3.3 0-10 1.7-10 5v3h20v-3c0-3.3-6.7-5-10-5z" />
            </svg>
            Data Masyarakat
        </a>

        <a href="/barang">
            <svg viewBox="0 0 24 24">
                <path fill="blue" d="M3 3v18h18V3H3zm16 16H5V5h14v14z" />
            </svg>
            Data Barang
        </a>

        <br>
        <small style="color:gray">TRANSAKSI</small>

        <a href="/lelang">
            <svg viewBox="0 0 24 24">
                <path fill="blue"
                    d="M3 21h18v-2H3v2zM14.1 3l1.4 1.4-9.2 9.2-1.4-1.4L14.1 3zM16.5 5.4l1.4 1.4-9.2 9.2-1.4-1.4 9.2-9.2z" />
            </svg>
            Lelang
        </a>

        <a href="/lelang">
            <svg viewBox="0 0 24 24">
                <path fill="blue"
                    d="M3 21h18v-2H3v2zM14.1 3l1.4 1.4-9.2 9.2-1.4-1.4L14.1 3zM16.5 5.4l1.4 1.4-9.2 9.2-1.4-1.4 9.2-9.2z" />
            </svg>
            History Lelang
        </a>

        <div style="display: flex; flex-direction: column; flex: 0.95;"></div>
        <a href="/Logout">
            <svg viewBox="0 0 24 24">
                <path fill="blue"
                    d="M12 15.5c-1.9 0-3.5-1.6-3.5-3.5s1.6-3.5 3.5-3.5 3.5 1.6 3.5 3.5-1.6 3.5-3.5 3.5zm7.4-2.9l1.6 1.2c.2.1.3.4.1.6l-1.5 2.6c-.1.2-.4.3-.6.2l-1.8-.7c-.4.3-.9.6-1.4.8l-.3 1.9c0 .2-.2.4-.5.4h-3c-.2 0-.4-.2-.5-.4l-.3-1.9c-.5-.2-1-.5-1.4-.8l-1.8.7c-.2.1-.5 0-.6-.2L4.9 15c-.1-.2 0-.5.2-.6l1.6-1.2c-.1-.3-.1-.6-.1-.9s0-.6.1-.9L5.1 9.7c-.2-.1-.3-.4-.2-.6l1.5-2.6c.1-.2.4-.3.6-.2l1.8.7c.4-.3.9-.6 1.4-.8l.3-1.9c0-.2.2-.4.5-.4h3c.2 0 .4.2.5.4l.3 1.9c.5.2 1 .5 1.4.8l1.8-.7c.2-.1.5 0 .6.2l1.5 2.6c.1.2 0 .5-.2.6l-1.6 1.2c.1.3.1.6.1.9s0 .6-.1.9z" />
            </svg>
            Logout
        </a>
    </div>

    <!-- Main konten atau isi dalam kontennya-->
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

    <!-- ketika button aktif -->
    <script>
        const links = document.querySelectorAll(".sidebar a");
        const current = window.location.pathname;

        links.forEach(a => {
            if (a.getAttribute("href") === current) {
                a.classList.add("active");
            }
        });
    </script>

</body>

</html>