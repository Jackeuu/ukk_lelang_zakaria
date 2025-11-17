<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Login — Aplikasi</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-1: #e8f1ff;
            /* very light blue */
            --bg-2: #ffffff;
            /* white */
            --primary: #0b67d0;
            /* strong blue */
            --primary-600: #0957b3;
            --accent: #2b9df4;
            /* lighter blue */
            --muted: #6b7280;
            /* gray */
            --success: #10b981;
            --danger: #ef4444;
            --glass: rgba(255, 255, 255, 0.6);
            --radius: 12px;
            --shadow: 0 8px 30px rgba(11, 103, 208, 0.12);
            --shadow-soft: 0 6px 18px rgba(15, 23, 42, 0.06);
            font-family: 'poppins';
        }

        * {
            box-sizing: border-box
        }

        html,
        body {
            height: 100%
        }

        body {
            margin: 0;
            background: linear-gradient(180deg, var(--bg-1), #f8fbff 40%);
            color: #0f172a;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 32px;
        }

        /* Container */
        .login-wrap {
            width: 100%;
            max-width: 980px;
            display: grid;
            grid-template-columns: 1fr 420px;
            gap: 28px;
            align-items: center;
        }

        /* Left promo area */
        .hero {
            padding: 40px;
            background: linear-gradient(135deg, rgba(11, 103, 208, 0.05), rgba(43, 157, 244, 0.03));
            border-radius: var(--radius);
            box-shadow: var(--shadow-soft);
            min-height: 320px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 18px;
        }

        .logo {
            width: 56px;
            height: 56px;
            border-radius: 10px;
            display: inline-grid;
            place-items: center;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            color: white;
            font-weight: 700;
            font-size: 18px;
            box-shadow: 0 6px 18px rgba(11, 103, 208, 0.18);
        }

        .hero h1 {
            margin: 0;
            font-size: 28px;
            color: var(--primary-600);
        }

        .hero p {
            margin-top: 10px;
            color: var(--muted);
            line-height: 1.5
        }

        /* Card (right) */
        .card {
            background: var(--bg-2);
            border-radius: var(--radius);
            padding: 28px;
            box-shadow: var(--shadow);
        }

        .card h2 {
            margin: 0 0 6px 0;
            font-size: 20px
        }

        .card p.sub {
            margin: 0 0 18px 0;
            color: var(--muted);
            font-size: 14px
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 12px
        }

        label {
            font-size: 13px;
            color: var(--muted);
            display: block;
            margin-bottom: 6px
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px 14px;
            border-radius: 10px;
            border: 1px solid rgba(15, 23, 42, 0.06);
            background: linear-gradient(180deg, #ffffff, #fbfdff);
            font-size: 15px;
            outline: none;
            transition: box-shadow .15s, border-color .15s, transform .05s;
        }

        input:focus {
            box-shadow: 0 6px 18px rgba(11, 103, 208, 0.12);
            border-color: var(--accent);
            transform: translateY(-1px)
        }

        .row {
            display: flex;
            gap: 12px;
            align-items: center;
            justify-content: space-between
        }

        .remember {
            display: flex;
            gap: 8px;
            align-items: center
        }

        .remember input {
            width: 16px;
            height: 16px
        }

        .btn {
            padding: 12px 14px;
            border-radius: 10px;
            border: 0;
            background: linear-gradient(90deg, var(--primary), var(--primary-600));
            color: white;
            font-weight: 600;
            cursor: pointer;
            font-size: 15px;
            box-shadow: 0 8px 30px rgba(11, 103, 208, 0.18);
            transition: transform .12s, box-shadow .12s, opacity .12s
        }

        .btn:active {
            transform: translateY(1px)
        }

        .btn.ghost {
            background: transparent;
            color: var(--primary);
            border: 1px solid rgba(11, 103, 208, 0.12);
            box-shadow: none
        }

        .links {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin-top: 10px
        }

        .links a {
            color: var(--primary);
            text-decoration: none;
            font-size: 13px
        }

        .divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, #e6f0ff, transparent);
            margin: 18px 0;
            border-radius: 4px
        }

        .social {
            display: flex;
            gap: 10px
        }

        .social button {
            flex: 1;
            padding: 10px;
            border-radius: 10px;
            border: 1px solid rgba(11, 103, 208, 0.06);
            background: var(--glass);
            cursor: pointer
        }

        .hint {
            font-size: 13px;
            color: var(--muted);
            margin-top: 6px
        }

        /* Responsive */
        @media (max-width:900px) {
            .login-wrap {
                grid-template-columns: 1fr;
                max-width: 520px;
                padding: 6px
            }

            .hero {
                order: 2
            }
        }

        /* small helper for error */
        .error {
            color: var(--danger);
            font-size: 13px;
            margin-top: 6px
        }

        .success {
            color: var(--success);
            font-size: 13px;
            margin-top: 6px
        }
    </style>
</head>

<body>
    <main class="login-wrap" role="main">
        <section class="hero" aria-hidden="false">
            <div class="brand">
                <div class="logo" aria-hidden="true">AL</div>
                <div>
                    <div style="font-weight:700;color:var(--primary)">Aplikasi Lelang</div>
                    <div style="font-size:13px;color:var(--muted)">Lelang yang lebih cepat dan terpercaya</div>
                </div>
            </div>
            <h1>Selamat datang Masyarakat!</h1>
            <p>Aplikasi lelang adalah program komputer berbasis internet yang memfasilitasi penjualan barang secara
                daring, memungkinkan peserta untuk mengajukan penawaran harga secara tertulis atau lisan tanpa harus
                hadir secara fisik. Aplikasi ini menawarkan kemudahan akses, efisiensi, transparansi, dan keamanan
                proses lelang, serta bisa digunakan untuk berbagai jenis lelang, mulai dari kendaraan, properti, hingga
                produk UMKM. </p>
        </section>

        <aside class="card" aria-label="Form login">
            <h2>Masuk Sebagai Masyarakat</h2>
            <p class="sub">Gunakan username dan kata sandi Anda</p>

            <form method="post" action="/login/proses">
                @csrf
                <div>
                    <label for="text">Username</label>
                    <input type="text" name="username" placeholder="Masukkan username" required>
                </div>

                <div>
                    <label for="password">Kata Sandi</label>
                    <input type="password" name="password" autocomplete="current-password"
                        placeholder="Masukkan kata sandi" required>
                </div>

                <div class="row">
                    <label class="remember"><input type="checkbox" id="remember"> <span
                            style="font-size:13px;color:var(--muted)">Ingat saya</span></label>
                </div>

                <button type="submit" class="btn">Masuk</button>

                <a href="/register_masyarakat" class="btn-login" style="text-align:center; display:block; margin-top:10px;">
                    Daftar
                </a>
                <p class="hint">Login sebagai Administrator <a href="{{ Route('login') }}"
                        style="color:var(--primary);text-decoration:none">Login</a></p>

                <div id="message" role="status" aria-live="polite"></div>
            </form>
        </aside>
    </main>
</body>

</html>