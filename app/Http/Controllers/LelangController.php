<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Barang;
use Illuminate\Support\Facades\Auth;

class LelangController extends Controller
{
    public function index()
    {
        $lelang = DB::table('tb_lelang')
            ->join('tb_barang', 'tb_barang.id_barang', '=', 'tb_lelang.id_barang')
            ->select(
                'tb_lelang.*',
                'tb_barang.nama_barang',
                'tb_barang.harga_awal',
                'tb_barang.deskripsi_barang',
                'tb_barang.gambar'
            )
            ->orderBy('tb_lelang.id_lelang', 'DESC')
            ->get();

        return view('lelang.index', compact('lelang'));
    }

    public function indexLelangMasyarakat()
    {
        $lelang = DB::table('tb_lelang')
            ->join('tb_barang', 'tb_barang.id_barang', '=', 'tb_lelang.id_barang')
            ->select(
                'tb_lelang.*',
                'tb_barang.nama_barang',
                'tb_barang.harga_awal',
                'tb_barang.deskripsi_barang',
                'tb_barang.gambar'
            )
            ->orderBy('tb_lelang.id_lelang', 'DESC')
            ->get();

        return view('lelang_masyarakat.index', compact('lelang'));
    }

    public function tambahLelang()
    {
        return view('lelang.tambah_lelang');
    }

    public function create()
    {
        $barang = DB::table('tb_barang')->get();
        $users = DB::table('tb_masyarakat')->get();
        $petugas = DB::table('tb_petugas')->get();

        return view('lelang.tambah_lelang', compact('barang', 'users', 'petugas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required|exists:tb_barang,id_barang',
        ]);

        $barang = Barang::findOrFail($request->id_barang);

        DB::table('tb_lelang')->insert([
            'id_barang' => $request->id_barang,
            'tgl_lelang' => now(),
            'id_petugas' => Auth::guard('petugas')->user()->id_petugas,
            'status' => 'dibuka',
            'created_at' => now(),
        ]);

        $barang->update(['status' => 'dibuka']);

        return redirect('/lelang')->with('success', 'Data lelang berhasil ditambahkan');
    }

    public function detail($id)
    {
        $lelang = DB::table('tb_lelang')
            ->join('tb_barang', 'tb_barang.id_barang', '=', 'tb_lelang.id_barang')
            ->select('tb_lelang.*', 'tb_barang.nama_barang', 'tb_barang.gambar', 'tb_barang.harga_awal')
            ->where('tb_lelang.id_lelang', $id)
            ->first();

        $maxPenawaran = DB::table('history_lelang')
            ->where('id_lelang', $id)
            ->max('penawaran_harga');

        return response()->json([
            'lelang' => $lelang,
            'max_penawaran' => $maxPenawaran ?? 0
        ]);
    }

    public function tawar(Request $request, $id)
    {
        $lelang = DB::table('tb_lelang')
            ->join('tb_barang', 'tb_barang.id_barang', '=', 'tb_lelang.id_barang')
            ->where('tb_lelang.id_lelang', $id)
            ->first();

        $maxPenawaran = DB::table('history_lelang')
            ->where('id_lelang', $id)
            ->max('penawaran_harga') ?? 0;

        $minPenawaran = max($lelang->harga_awal, $maxPenawaran);

        if ($request->penawaran < $minPenawaran) {
            return back()->with('error', 'Penawaran harus lebih tinggi dari harga pembuka dan penawaran tertinggi!');
        }

        DB::table('history_lelang')->insert([
            'id_lelang' => $id,
            'id_barang' => $lelang->id_barang,
            'id_user' => Auth::guard('masyarakat')->id(),
            'penawaran_harga' => $request->penawaran,
            'created_at' => now()
        ]);

        return back()->with('success', 'Penawaran berhasil dikirim!');
    }


}
