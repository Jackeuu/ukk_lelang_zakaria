@extends('master')
@section('konten')
    <link rel="stylesheet" href="masyarakat.css">
    <h1>ini masyarakat</h1>
    <!-- Tombol Tambah -->
    <button class="btn btn-primary" onclick="openAdd()">+ Tambah Masyarakat</button>

    <br><br>

    <!-- Modal tambah data disini -->
    <div class="modal-overlay" id="modalAdd">
        <div class="modal-box">
            <span class="modal-close" onclick="closeAdd()">&times;</span>
            <h3>Tambah Masyarakat</h3>

            <form action="/masyarakat/store" method="POST">
                @csrf
                <label>Nama Lengkap</label>
                <input type="text" name="nama_lengkap" placeholder="Masukkan nama lengkap anda" required>

                <label>Alamat</label>
                <input type="text" name="alamat" placeholder="Masukkan alamat anda" required>

                <label>Username / NIK</label>
                <input type="text" name="username" placeholder="Masukkan username atau NIK anda" required>

                <label>Password</label>
                <input type="password" name="password" placeholder="Buat password anda" required>

                <label>Telepon</label>
                <input type="text" name="telp" placeholder="Masukkan nomor telepon anda" required>

                <label>Status</label>
                <input type="text" name="status" placeholder="Status anda saat ini" required>

                <button class="btn btn-primary" type="submit">Simpan Data</button>
            </form>
        </div>
    </div>

    <div style="margin-top:20px;">
        <table style="width:100%; border-collapse:collapse; background:white;">
            <thead>
                <tr style="background:#f1f5f9; text-align:left;">
                    <th style="padding:12px; border-bottom:2px solid #e2e8f0;">ID Masyarakat</th>
                    <th style="padding:12px; border-bottom:2px solid #e2e8f0;">Nama Masyarakat</th>
                    <th style="padding:12px; border-bottom:2px solid #e2e8f0;">Alamat</th>
                    <th style="padding:12px; border-bottom:2px solid #e2e8f0;">Username</th>
                    <th style="padding:12px; border-bottom:2px solid #e2e8f0;">No Telepon</th>
                    <th style="padding:12px; border-bottom:2px solid #e2e8f0;">Status</th>
                    <th style="padding:12px; border-bottom:2px solid #e2e8f0;">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($masyarakat as $m)
                    <tr style="border-bottom:1px solid #e5e7eb; transition:0.2s;" onmouseover="this.style.background='#f8fafc'"
                        onmouseout="this.style.background='white'">

                        <td style="padding:12px;">{{ $m->id_user }}</td>
                        <td style="padding:12px;">{{ $m->nama_lengkap }}</td>
                        <td style="padding:12px;">{{ $m->alamat }}</td>
                        <td style="padding:12px;">{{ $m->username }}</td>
                        <td style="padding:12px;">{{ $m->telp }}</td>
                        <td style="padding:12px;">{{ $m->status }}</td>
                        <td style="padding:12px;">
                            <button
                                onclick="openEdit('{{ $m->id_user }}', '{{ $m->nama_lengkap }}', '{{ $m->alamat }}', '{{ $m->username }}','{{ $m->telp }}', '{{ $m->status }}')"
                                style="background:#f59e0b; color:white; padding:6px 12px; border-radius:6px; font-size:14px; cursor:pointer; border:none;">
                                Edit
                            </button>
                            <form action="" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')

                                <button onclick="return confirm('Yakin hapus?')"
                                    style="background:#dc2626; color:white; padding:6px 12px; border:none; border-radius:6px; font-size:14px; cursor:pointer;">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="modal-overlay" id="modalEdit">
        <div class="modal-box">
            <span class="modal-close" onclick="closeEdit()">&times;</span>
            <h3>Edit Masyarakat</h3>

            <form id="editForm" method="POST">
                @csrf
                @method("PUT")

                <label>Nama Lengkap</label>
                <input type="text" id="edit_nama" name="nama_lengkap" required>

                <label>Alamat</label>
                <input type="text" id="edit_alamat" name="alamat" required>

                <label>Username</label>
                <input type="text" id="edit_username" name="username" required>

                <label>Telepon</label>
                <input type="text" id="edit_telp" name="telp" required>

                <label>Status</label>
                <input type="text" id="edit_status" name="status" required>

                <button class="btn btn-primary" type="submit">Update</button>
            </form>
        </div>
    </div>

    <script>
        
        function openAdd() {
            document.getElementById('modalAdd').style.display = 'flex';
        }
        function closeAdd() {
            document.getElementById('modalAdd').style.display = 'none';
        }

        /* ===== Modal Edit ===== */
        function openEdit(id, nama, alamat, username, telp, status) {
            document.getElementById('modalEdit').style.display = 'flex';

            // Isi otomatis
            document.getElementById('edit_nama').value = nama;
            document.getElementById('edit_alamat').value = alamat;
            document.getElementById('edit_username').value = username;
            document.getElementById('edit_telp').value = telp;
            document.getElementById('edit_status').value = status;

            // Set action form Laravel
            document.getElementById('editForm').action = "/masyarakat/update/" + id;
        }

        function closeEdit() {
            document.getElementById('modalEdit').style.display = 'none';
        }
    </script>

@endsection