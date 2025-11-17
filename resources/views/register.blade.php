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
      <h2>Daftar Akun</h2>
      <p class="sub">Isi data berikut untuk membuat akun baru</p>

      <form id="formAuthetication" class="mb-3" action="{{ route('register') }}" method="POST">
        @csrf
        <div>
          <label>Nama Petugas</label>
          <input type="text" name="nama_petugas" placeholder="Nama Petugas" required>
        </div>
        
        <div>
          <label>Username</label>
          <input type="text" name="username" placeholder="Username" required>
        </div>

        <div>
          <label>Password</label>
          <input type="password" name="password" placeholder="Buat kata sandi" required>
        </div>

        <div>
          <label>Level</label>
          <input type="text" name="id_level" placeholder="Hak Akses" required>
        </div>

        <button class="btn">Daftar</button>

        <div class="links">
          Sudah punya akun? <a href={{ Route('login_petugas') }}>Masuk</a>
        </div>
      </form>
    </aside>
</body>
</html>
