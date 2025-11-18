<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Barang;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::all();
        return view('barang.index', compact('barang'));
    }
    public function store(Request $request)
    {
        $img_name = null;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $img_name = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/gambar_barang', $img_name);
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

    public function update(Request $request, $id_barang)
    {
        $barang = DB::table('tb_barang')->where('id_barang', $id_barang)->first();
        $img_name = $barang->gambar;

        if ($request->hasFile('gambar')) {

            // hapus gambar lama jika ada
            if ($barang->gambar && Storage::exists('public/gambar_barang/' . $barang->gambar)) {
                Storage::delete('public/gambar_barang/' . $barang->gambar);
            }

            // upload gambar baru
            $file = $request->file('gambar');
            $img_name = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/gambar_barang', $img_name);
        }


        DB::table('tb_barang')->where('id_barang', $id_barang)->update([
            'nama_barang' => $request->nama_barang,
            'tgl' => now(),
            'harga_awal' => $request->harga_awal,
            'deskripsi_barang' => $request->deskripsi_barang,
            'gambar' => $img_name,
        ]);

        return redirect()->back()->with('success', 'Data berhasil diedit!');
    }

    public function destroy($id)
    {
        $barang = DB::table('tb_barang')->where('id_barang', $id)->first();

        // hapus gambar dari storage
        if ($barang->gambar && Storage::exists('public/gambar_barang/'.$barang->gambar)) {
            Storage::delete('public/gambar_barang/'.$barang->gambar);
        }
        
        DB::table('tb_barang')->where('id_barang', $id)->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
}
