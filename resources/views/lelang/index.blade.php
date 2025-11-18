@extends('master')
@section('konten')
    <link rel="stylesheet" href="penawaranlelang.css">
    <h1>ini lelang</h1>
    <br>
    <a href="{{ Route('tambahlelang') }}" class="btn-primary"> + Tambah Lelang </a>

    <button class="btn-primary" onclick="openAdd()">+ Tambah Lelang Modal</button>

    <div class="modal-overlay" id="modalAdd">
        <div class="modal-box">
            <span class="modal-close" onclick="closeAdd()">&times;</span>
            <h3>Tambah Lelang</h3>

            <form action="{{ route('lelang.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Pilih Barang</label>
                    <select name="id_barang" required>
                        <option value="">-- Pilih Barang --</option>
                        @foreach ($barang as $b)
                            <option value="{{ $b->id_barang }}">{{ $b->nama_barang }}</option>
                        @endforeach
                    </select>
                </div>



                <button type="submit" class="btn-submit">Buka Lelang</button>
            </form>
        </div>
    </div>
    <BR></BR>
    <BR></BR>
    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); gap: 20px;">

        @foreach ($lelang as $item)
            <div style="
                                                                background: white;
                                                                border-radius: 12px;
                                                                padding: 15px;
                                                                box-shadow: 0 4px 10px rgba(0,0,0,0.1);
                                                            ">
                <img src="{{ asset('storage/gambar_barang/' . $item->gambar) }}" alt="gambar barang"
                    style="width: 100%; height: 180px; object-fit: cover; border-radius: 10px;">

                <h3 style="margin-top: 10px;">{{ $item->nama_barang }}</h3>

                <p style="margin: 5px 0; font-size: 14px; color: #444;">
                    {{ $item->deskripsi_barang }}
                </p>

                <p style="font-weight: bold; color: #007BFF;">
                    Harga Awal: Rp {{ number_format($item->harga_awal, 0, ',', '.') }}
                </p>

                <p>Status:
                    <span style="color: {{ $item->status == 'dibuka' ? 'green' : 'red' }}">
                        {{ ucfirst($item->status) }}
                    </span>
                </p>

                <button class="btn-primary" onclick="openTawar({{ $item->id_lelang }})">
                    Detail Barang
                </button>

                <div class="modal-overlay" id="modalTawar">
                    <div class="modal-box-2col">

                        <span class="modal-close" onclick="closeTawar()">&times;</span>

                        <!-- KIRI: GAMBAR -->
                        <div class="modal-left">
                            <img id="tawar_gambar" class="modal-img">
                        </div>

                        <!-- KANAN: DETAIL & FORM -->
                        <div class="modal-right">
                            <h3>Detail Barang</h3>

                            <p><b>Nama Barang :</b> <span id="tawar_nama"></span></p>
                            <p><b>Harga Awal :</b> Rp <span id="tawar_harga_awal"></span></p>
                            <p><b>Deskripsi Barang</b></p>

                            <form id="formTawar" method="POST">
                                @csrf
                                <p>Status:
                                    <span style="color: {{ $item->status == 'dibuka' ? 'green' : 'red' }}">
                                        {{ ucfirst($item->status) }}
                                    </span>
                                </p>

                                <button class="btn-primary" type="submit">Simpan Perubahan</button>
                            </form>
                        </div>

                    </div>
                </div>
        @endforeach

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

                document.getElementById('preview_gambar').src = "storage/gambar_barang/" + gambar;

                document.getElementById('edit_old_image').value = gambar;

                document.getElementById('editForm').action = "/barang/update/" + id;
            }

            function closeEdit() {
                document.getElementById('modalEdit').style.display = 'none';
            }
        </script>

        <script>
            function openTawar(id) {
                fetch(`/lelang_masyarakat/detail/${id}`)
                    .then(res => res.json())
                    .then(data => {

                        document.getElementById('tawar_gambar').src = "/storage/gambar_barang/" + data.lelang.gambar;

                        document.getElementById('tawar_nama').innerHTML = data.lelang.nama_barang;
                        document.getElementById('tawar_harga_awal').innerHTML = data.lelang.harga_awal;

                        document.getElementById('formTawar').action = `/tawar/${id}`;

                        document.getElementById('modalTawar').style.display = 'flex';
                    });
            }

            function closeTawar() {
                document.getElementById('modalTawar').style.display = 'none';
            }
        </script>
@endsection