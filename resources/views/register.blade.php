<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Daftar — Aplikasi</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
  <style>
    :root{
      --bg-1:#e8f1ff;
      --bg-2:#ffffff;
      --primary:#0b67d0;
      --primary-600:#0957b3;
      --accent:#2b9df4;
      --muted:#6b7280;
      --radius:12px;
      --shadow:0 8px 30px rgba(11,103,208,0.12);
      --shadow-soft:0 6px 18px rgba(15,23,42,0.06);
      font-family:'poppins';
    }
    *{box-sizing:border-box}
    html,body{height:100%}
    body{
      margin:0;
      display:flex;
      align-items:center;
      justify-content:center;
      padding:32px;
      background:linear-gradient(180deg,var(--bg-1),#f8fbff 40%);
    }
    .container{
      width:100%;
      max-width:980px;
      display:grid;
      grid-template-columns:1fr 420px;
      gap:28px;
      align-items:center;
    }
    .hero{
      padding:40px;
      border-radius:var(--radius);
      box-shadow:var(--shadow-soft);
      background:linear-gradient(135deg,rgba(11,103,208,0.05),rgba(43,157,244,0.03));
      min-height:320px;
    }
    .logo{width:56px;height:56px;display:grid;place-items:center;background:linear-gradient(135deg,var(--primary),var(--accent));color:white;border-radius:10px;font-weight:700;box-shadow:0 6px 18px rgba(11,103,208,0.18)}
    .hero h1{margin:0;font-size:28px;color:var(--primary-600)}
    .hero p{color:var(--muted);line-height:1.5;margin-top:10px}

    .card{
      background:var(--bg-2);
      padding:28px;
      border-radius:var(--radius);
      box-shadow:var(--shadow);
    }
    .card h2{margin:0;font-size:20px}
    .card p.sub{margin:6px 0 18px 0;color:var(--muted);font-size:14px}

    form{display:flex;flex-direction:column;gap:12px}
    label{font-size:13px;color:var(--muted);margin-bottom:4px}
    input{
      width:100%;padding:12px 14px;border-radius:10px;
      border:1px solid rgba(15,23,42,0.06);
      background:linear-gradient(180deg,#fff,#fbfdff);
      font-size:15px;outline:none;
    }
    input:focus{border-color:var(--accent);box-shadow:0 6px 18px rgba(11,103,208,0.12)}
    .btn{
      padding:12px 14px;border-radius:10px;border:0;
      background:linear-gradient(90deg,var(--primary),var(--primary-600));
      color:white;font-weight:600;cursor:pointer;font-size:15px;
      box-shadow:0 8px 30px rgba(11,103,208,0.18);
    }
    .links{text-align:center;margin-top:10px;font-size:14px}
    .links a{color:var(--primary);text-decoration:none;font-weight:600}

    @media(max-width:900px){
      .container{grid-template-columns:1fr;max-width:520px}
      .hero{order:2}
    }
  </style>
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
          Sudah punya akun? <a href={{ Route('login') }}>Masuk</a>
        </div>
      </form>
    </aside>
</body>
</html>
