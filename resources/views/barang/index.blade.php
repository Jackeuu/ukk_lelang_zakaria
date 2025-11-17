@extends('master')
@section('konten')
    <link rel="stylesheet" href="barang.css">

    <h1>ini barang</h1>

    <button class="btn btn-primary" onclick="openAdd()">+ Tambah Masyarakat</button>

    <!-- Modal tambah data disini -->
    <div class="modal-overlay" id="modalAdd">
        <div class="modal-box">
            <span class="modal-close" onclick="closeAdd()">&times;</span>
            <h3>Tambah Barang</h3>

            <form action="/barang/store" method="POST">
                @csrf
                <label>Nama Barang</label>
                <input type="text" name="nama_barang" placeholder="Masukkan nama barang" required>

                <label>Tanggal</label>
                <input type="date" name="tanggal" value="{{ date('Y-m-d') }}" class="form-control" readonly>

                <label>Harga Awal</label>
                <input type="text" name="harga_awal" placeholder="Masukkan harga awal" required>

                <label>Deskripsi Barang</label>
                <input type="text" name="deskripsi_barang" placeholder="Masukkan deskripsi barang" required>

                <label>Gambar</label>
                <input type="file" name="gambar" accept="image/*" class="form-control">

                <button class="btn btn-primary" type="submit">Simpan Data</button>
            </form>
        </div>
    </div>

    <div class="row g-4">
        @forelse ($barang as $b)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card h-100 border-0 shadow-sm hover-shadow transition rounded-3 overflow-hidden">
                    @if($b->gambar)
                        <img src="{{ asset('assets/img/storage/' . $b->gambar) }}" class="h-48 w-full object-cover"
                            alt="{{ $b->nama_barang }}">
                    @else
                        <div class="bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                            <span class="text-muted small">Tidak ada gambar</span>
                        </div>
                    @endif

                    <div class="card-body p-3">
                        <h6 class="card-title fw-semibold text-dark mb-1">{{ $b->nama_barang }}</h6>
                        <p class="mb-1 text-muted small">Harga:
                            <span class="fw-semibold text-success">Rp
                                {{ number_format($b->harga_awal, 0, ',', '.') }}</span>
                        </p>
                        <br>

                        <div class="d-flex justify-content-center gap-2 mt-2">

                            <button
                                onclick="openEdit('{{ $b->id_barang }}', '{{ $b->nama_barang }}', '{{ $b->tgl }}', '{{ $b->harga_awal }}','{{ $b->deskripsi_barang }}', '{{ $b->gambar }}')"
                                style="background:#f59e0b; color:white; padding:6px 12px; border-radius:6px; font-size:14px; cursor:pointer; border:none;">
                                Edit
                            </button>
                            <form action="{{ Route('barang.destroy', $b->id_barang) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')

                                <button onclick="return confirm('Yakin hapus?')"
                                    style="background:#dc2626; color:white; padding:6px 12px; border:none; border-radius:6px; font-size:14px; cursor:pointer;">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5 text-muted">
                <p>Belum ada data barang.</p>
            </div>
        @endforelse

        <div class="modal-overlay" id="modalEdit">
            <div class="modal-box">
                <span class="modal-close" onclick="closeEdit()">&times;</span>
                <h3>Edit Masyarakat</h3>

                <form id="editForm" method="POST">
                    @csrf
                    @method("PUT")

                    <label>Nama Barang</label>
                    <input type="text" id="edit_nama" name="nama_barang" required>

                    <label>Tanggal</label>
                    <input type="text" id="edit_tgl" name="tgl" required>

                    <label>Harga Awal</label>
                    <input type="text" id="edit_harga_awal" name="harga_awal" required>

                    <label>Deskripsi Barang</label>
                    <input type="text" id="edit_deskripsi_barang" name="deskripsi_barang" required>

                    <label>Gambar</label>
                    {{-- Tampilkan gambar lama jika ada --}}
                    @if ($b->gambar)
                        <img src="{{ asset('assets/img/storage/' . $b->gambar) }}" alt="{{ $b->nama_barang }}" width="100"
                            class="mb-2 rounded">
                    @endif

                    <input type="file" name="gambar" class="form-control">
                    {{-- Simpan nama file lama di input hidden --}}
                    <input type="hidden" id="edit_gambar" name="old_image" value="{{ $b->gambar }}" required>

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
                document.getElementById('edit_tgl').value = tgl;
                document.getElementById('edit_harga_awal').value = harga_awal;
                document.getElementById('edit_deskripsi_barang').value = deskripsi_barang;
                document.getElementById('edit_gambar').value = old_image;

                // Set action form Laravel
                document.getElementById('editForm').action = "/masyarakat/update/" + id;
            }

            function closeEdit() {
                document.getElementById('modalEdit').style.display = 'none';
            }
        </script>
@endsection