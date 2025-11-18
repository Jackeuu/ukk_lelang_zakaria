@extends('master')
@section('konten')
<link rel="stylesheet" href="barang.css">

    <h1>ini barang</h1>

    <button class="btn-primary" onclick="openAdd()">+ Tambah Barang</button>

    <div class="modal-overlay" id="modalAdd">
        <div class="modal-box">
            <span class="modal-close" onclick="closeAdd()">&times;</span>
            <h3>Tambah Barang</h3>

            <form action="/barang/store" method="POST" enctype="multipart/form-data">
                @csrf
                <label>Nama Barang</label>
                <input type="text" name="nama_barang" required>

                <label>Tanggal</label>
                <input type="date" name="tanggal" value="{{ date('Y-m-d') }}" readonly>

                <label>Harga Awal</label>
                <input type="text" name="harga_awal" required>

                <label>Deskripsi Barang</label>
                <input type="text" name="deskripsi_barang" required>

                <label>Gambar</label>
                <input type="file" name="gambar" accept="image/*">

                <button class="btn-primary" type="submit">Simpan Data</button>
            </form>
        </div>
    </div>

    <br>

    <div class="grid">
        @forelse ($barang as $b)
            <div class="card">
                @if($b->gambar)
                    <img src="{{ asset('storage/gambar_barang/' . $b->gambar) }}" class="card-img">
                @else
                    <div class="card-img empty">Tidak ada gambar</div>
                @endif

                <div class="card-body">
                    <h2 class="title">{{ $b->nama_barang }}</h2>
                    <p class="date-text">
                        Tanggal : <span class="date">{{ $b->tgl }}</span>
                    </p>
                    <p class="price-text">
                        Harga Awal : <span class="price">Rp {{ number_format($b->harga_awal, 0, ',', '.') }}</span>
                    </p>
                    <p class="desc-text">
                        Deskripsi : <span class="desc">{{ $b->deskripsi_barang }}</span>
                    </p>
                    <div class="btn-group">
                        <button onclick="openEdit('{{ $b->id_barang }}','{{ $b->nama_barang }}','{{ $b->tgl }}','{{ $b->harga_awal }}','{{ $b->deskripsi_barang }}','{{ $b->gambar }}')" class="btn-warning">Edit</button>
                        <form action="{{ route('barang.destroy', $b->id_barang) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin hapus?')" class="btn-danger">
                                Hapus
                            </button>
                        </form>

                    </div>
                </div>

            </div>

        @empty
            <p class="empty-list">Belum ada data barang.</p>
        @endforelse

    </div>

    <div class="modal-overlay" id="modalEdit">
        <div class="modal-box">
            <span class="modal-close" onclick="closeEdit()">&times;</span>
            <h3>Edit Barang</h3>

            <form id="editForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")

                <label>Nama Barang</label>
                <input type="text" id="edit_nama" name="nama_barang" required>

                <label>Tanggal</label>
                <input type="date" id="edit_tgl" name="tgl" required readonly>

                <label>Harga Awal</label>
                <input type="text" id="edit_harga_awal" name="harga_awal" required>

                <label>Deskripsi</label>
                <input type="text" id="edit_deskripsi_barang" name="deskripsi_barang" required>

                <label>Gambar Lama</label><br>
                <img id="preview_gambar" src="" width="100" class="img-preview">

                <label>Ganti Gambar</label>
                <input type="file" name="gambar">

                <input type="hidden" id="edit_old_image" name="old_image">

                <button class="btn-primary" type="submit">Update</button>
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

        function openEdit(id, nama, tgl, harga, deskripsi, gambar) {

            document.getElementById('modalEdit').style.display = 'flex';

            document.getElementById('edit_nama').value = nama;
            document.getElementById('edit_tgl').value = tgl;
            document.getElementById('edit_harga_awal').value = harga;
            document.getElementById('edit_deskripsi_barang').value = deskripsi;

            document.getElementById('preview_gambar').src ="storage/gambar_barang/" + gambar;

            document.getElementById('edit_old_image').value = gambar;

            document.getElementById('editForm').action = "/barang/update/" + id;
        }

        function closeEdit() {
            document.getElementById('modalEdit').style.display = 'none';
        }
    </script>
@endsection