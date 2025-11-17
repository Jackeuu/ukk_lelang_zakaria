@extends('master')
@section('konten')
    <link rel="stylesheet" href="petugas.css">

    <h1>ini petugas</h1>

    <button class="btn btn-primary" onclick="openAdd()">+ Tambah Petugas</button>

    <!-- Modal tambah data disini -->
    <div class="modal-overlay" id="modalAdd">
        <div class="modal-box">
            <span class="modal-close" onclick="closeAdd()">&times;</span>
            <h3>Tambah Petugas</h3>

            <form action="/petugas/store" method="POST">
                @csrf
                <label>Nama Lengkap</label>
                <input type="text" name="nama_petugas" placeholder="Masukkan nama lengkap anda" required>

                <label>Username</label>
                <input type="text" name="username" placeholder="Masukkan username atau NIK anda" required>

                <label>Password</label>
                <input type="password" name="password" placeholder="Buat password anda" required>

                <label>Level</label>
                <input type="text" name="id_level" placeholder="Masukkan hak akses / level anda" required>

                <button class="btn btn-primary" type="submit">Simpan Data</button>
            </form>
        </div>
    </div>


    <div style="margin-top:20px;">
        <table style="width:100%; border-collapse:collapse; background:white;">
            <thead>
                <tr style="background:#f1f5f9; text-align:left;">
                    <th style="padding:12px; border-bottom:2px solid #e2e8f0;">ID</th>
                    <th style="padding:12px; border-bottom:2px solid #e2e8f0;">Nama Petugas</th>
                    <th style="padding:12px; border-bottom:2px solid #e2e8f0;">Username</th>
                    <th style="padding:12px; border-bottom:2px solid #e2e8f0;">Level</th>
                    <th style="padding:12px; border-bottom:2px solid #e2e8f0;">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($petugas as $p)
                    <tr style="border-bottom:1px solid #e5e7eb; transition:0.2s;" onmouseover="this.style.background='#f8fafc'"
                        onmouseout="this.style.background='white'">

                        <td style="padding:12px;">{{ $p->id_petugas }}</td>
                        <td style="padding:12px;">{{ $p->nama_petugas }}</td>
                        <td style="padding:12px;">{{ $p->username }}</td>
                        <td style="padding:12px;">{{ $p->level->id_level }}</td>
                        <td style="padding:12px;">
                            <button
                                onclick="openEdit('{{ $p->id_petugas }}', '{{ $p->nama_petugas }}', '{{ $p->username }}','{{ $p->id_level }}')"
                                style="background:#f59e0b; color:white; padding:6px 12px; border-radius:6px; font-size:14px; cursor:pointer; border:none;">
                                Edit
                            </button>

                            <form action="{{ route('petugas.destroy', $p->id_petugas) }}" method="POST" style="display:inline;">
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
    </div>

    <div class="modal-overlay" id="modalEdit">
        <div class="modal-box">
            <span class="modal-close" onclick="closeEdit()">&times;</span>
            <h3>Edit Petugas</h3>

            <form id="editForm" method="POST">
                @csrf
                @method("PUT")

                <label>Nama Lengkap</label>
                <input type="text" id="edit_nama" name="nama_petugas" required>

                <label>Username</label>
                <input type="text" id="edit_username" name="username" required>

                <label>Level</label>
                <input type="text" id="edit_level" name="id_level" required>

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
        function openEdit(id, nama, username, level) {
            document.getElementById('modalEdit').style.display = 'flex';

            // Isi otomatis
            document.getElementById('edit_nama').value = nama;
            document.getElementById('edit_username').value = username;
            document.getElementById('edit_level').value = level;

            // Set action form Laravel
            document.getElementById('editForm').action = "/petugas/update/" + id;
        }

        function closeEdit() {
            document.getElementById('modalEdit').style.display = 'none';
        }
    </script>


@endsection