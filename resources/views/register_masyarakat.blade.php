<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Daftar — Aplikasi</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="register.css">
</head>

<body>
    <aside class="card">
        <h2>Daftar Akun Masyarakat</h2>
        <p class="sub">Isi data berikut untuk membuat akun baru</p>

        <form id="formAuthetication" class="mb-3" action="{{ route('daftar') }}" method="POST">
            @csrf
            <div>
                <label>NIK</label>
                <input type="text" name="NIK" placeholder="Masukkan NIK anda" required>
            </div>

            <div>
                <label>Nama Lengkap</label>
                <input type="text" name="nama_lengkap" placeholder="Masukkan nama lengkap anda" required>
            </div>

            <div>
                <label>Username</label>
                <input type="text" name="username" placeholder="Buat username anda" required>
            </div>

            <div>
                <label>Password</label>
                <input type="password" name="password" placeholder="Buat kata sandi" required>
            </div>

            <div>
                <label>No Telepon</label>
                <input type="text" name="telp" placeholder="Masukkan nomor telepon anda" required>
            </div>

            <button class="btn">Daftar</button>

            <div class="links">
                Sudah punya akun? <a href={{ Route('login_masyarakat') }}>Masuk</a>
            </div>
        </form>
    </aside>
</body>

</html>