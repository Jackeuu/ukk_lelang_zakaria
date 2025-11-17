@extends('master')
@section('konten')
    <link rel="stylesheet" href="petugas.css">

    <h1>ini petugas</h1>

    <button id="ModalBtn" class="btn-primary">+ Tambah Petugas</button>

    <div id="modalOverlay" class="modal-overlay"></div>

    <div id="modalBox" class="modal-box">
        <h2>Tambah Petugas</h2>

        <form action="{{ url('/register') }}" method="POST">
            @csrf

            <label>Nama Petugas</label>
            <input type="text" name="nama_petugas" required>

            <label>Username</label>
            <input type="text" name="username" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <label>Level</label>
            <select name="id_level" required>
                <option value="1">Admin</option>
                <option value="2">Petugas</option>
            </select>

            <div class="modal-actions">
                <button type="button" id="TutupModalBtn" class="btn-secondary">Tutup</button>
                <button type="submit" class="btn-primary">Simpan</button>
            </div>

        </form>
    </div>


    <table class="table mb-0">
        <thead>
            <tr>
                <th>Id Petugas</th>
                <th>Nama Petugas</th>
                <th>Username</th>
                <th>Level</th>
            </tr>
        </thead>
    </table>

    <script>
        const openBtn = document.getElementById("ModalBtn");
        const closeBtn = document.getElementById("TutupModalBtn");
        const overlay = document.getElementById("modalOverlay");
        const modal = document.getElementById("modalBox");

        openBtn.onclick = () => {
            overlay.style.display = "block";
            modal.style.display = "block";
            setTimeout(() => modal.style.transform = "translate(-50%, -50%) scale(1)", 20);
        };

        closeBtn.onclick = closeModal;
        overlay.onclick = closeModal;

        function closeModal() {
            modal.style.transform = "translate(-50%, -50%) scale(0.8)";
            setTimeout(() => {
                overlay.style.display = "none";
                modal.style.display = "none";
            }, 150);
        }
    </script>

@endsection