@extends('master');
@section('konten')
    <link rel="stylesheet" href="penawaranlelang.css">
    <h1>Tampilan lelang masyarakat</h1>

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

                <p style="font-weight: bold; color: #007BFF;">
                    Harga Pembuka : Rp {{ number_format($item->harga_awal, 0, ',', '.') }}
                </p>

                <p>Status :
                    <span style="color: {{ $item->status == 'dibuka' ? 'green' : 'red' }}">
                        {{ ucfirst($item->status) }}
                    </span>
                </p>

                <button class="btn-primary" onclick="openTawar({{ $item->id_lelang }})">
                    Ajukan Penawaran
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
                            <h3>Ajukan Penawaran</h3>

                            <p><b>Nama Barang :</b> <span id="tawar_nama"></span></p>
                            <p><b>Harga Awal :</b> Rp <span id="tawar_harga_awal"></span></p>
                            <p><b>Penawaran Tertinggi :</b> Rp <span id="tawar_max"></span></p>

                            <form id="formTawar" method="POST">
                                @csrf
                                <label>Penawaran Anda</label>
                                <input type="text" name="penawaran" class="input-box" required placeholder="Ajukan Penawaran">

                                <button class="btn-primary" type="submit">Kirim Penawaran</button>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        @endforeach

    </div>

    <script>
        function openTawar(id) {
            fetch(`/lelang_masyarakat/detail/${id}`)
                .then(res => res.json())
                .then(data => {

                    document.getElementById('tawar_gambar').src = "/storage/gambar_barang/" + data.lelang.gambar;

                    document.getElementById('tawar_nama').innerHTML = data.lelang.nama_barang;
                    document.getElementById('tawar_harga_awal').innerHTML = data.lelang.harga_awal;
                    document.getElementById('tawar_max').innerHTML = data.max_penawaran ?? 0;

                    document.getElementById('formTawar').action = `/tawar/${id}`;

                    document.getElementById('modalTawar').style.display = 'flex';
                });
        }

        function closeTawar() {
            document.getElementById('modalTawar').style.display = 'none';
        }
    </script>


@endsection