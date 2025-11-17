<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function index(){
        $barang = Barang::all();
        return view('barang.index', compact('barang'));
    }
    public function store(Request $request)
    {
        $img_name = 'photo.img';

        if ($request->hasFile('gambar')) {
            $foto = $request->file('gambar');
            $img_name = now()->format('d-m-Y') . $foto->hashName();
            $foto->move(public_path('assets/img/storage'), $img_name);
        }

        DB::table('tb_barang')->insert([
            'nama_barang' => $request->nama_barang,
            'tgl' => now(),
            'harga_awal' => $request->harga_awal,
            'deskripsi_barang' => $request->deskripsi_barang,
            'gambar' => $img_name,
        ]);
        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }

    public function destroy($id){
        DB::table('tb_barang')->where('id_barang', $id)->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
}
