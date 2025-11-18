@extends('master')
@section('konten')
<style>
    .form-container {
        background: #ffffff;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.08);
        width: 70%;
        margin: 25px auto;
        animation: fadeIn .4s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .form-title {
        font-size: 28px;
        font-weight: bold;
        margin-bottom: 25px;
        color: #2c3e50;
    }

    .form-group {
        margin-bottom: 18px;
    }

    .form-group label {
        font-weight: 600;
        margin-bottom: 8px;
        display: block;
        color: #34495e;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccd1d1;
        border-radius: 10px;
        font-size: 15px;
        outline: none;
        transition: 0.2s;
        background: #f8f9fa;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        border-color: #3498db;
        background: white;
        box-shadow: 0 0 4px rgba(52, 152, 219, 0.4);
    }

    .btn-submit {
        padding: 12px 22px;
        background: #3498db;
        border: none;
        border-radius: 10px;
        color: white;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: 0.2s;
    }

    .btn-submit:hover {
        background: #2980b9;
        transform: scale(1.03);
    }
</style>

    <div class="form-container">
    <div class="form-title">Input Lelang Barang</div>

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
@endsection