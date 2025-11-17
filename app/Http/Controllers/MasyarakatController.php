<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Masyarakat;

class MasyarakatController extends Controller
{
    public function index()
    {
        $masyarakat = Masyarakat::all();
        return view('masyarakat.index', compact('masyarakat'));
    }

    public function store(Request $request)
    {
        DB::table('tb_masyarakat')->insert([
            'id_user' => $request->id_user,
            'nama_lengkap' => $request->nama_lengkap,
            'alamat' => $request->alamat,
            'username' => $request->username,
            'password' => $request->password,
            'telp' => $request->telp,
            'status' => $request->status,
        ]);
        return redirect('/masyarakat');
    }

    public function update(Request $request, $id)
    {
        $masyarakat = Masyarakat::where('id_user', $id)->first();

        if (!$masyarakat) {
            return redirect('/masyarakat')->with('error', 'Data tidak ditemukan');
        }

        DB::table('tb_masyarakat')->where('id_user', $request->id_user)->update([
            'id_user' => $request->id_user,
            'nama_lengkap' => $request->nama_lengkap,
            'alamat' => $request->alamat,
            'username' => $request->username,
            'password' => $request->password,
            'telp' => $request->telp,
            'status' => $request->status,
        ]);
        return redirect('/masyarakat');
    }

    public function destroy($id){
        DB::table('tb_masyarakat')->where('id_user', $id)->delete();
        return redirect('/masyarakat');
    }
}
