<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Petugas;
use App\Models\Level;

class PetugasController extends Controller
{
    public function index()
    {
        $petugas = Petugas::all();
        $levels = Level::all();  
        return view('petugas.index', compact('petugas', 'levels'));
    }

    public function store(Request $request)
    {
        DB::table('tb_petugas')->insert([
            'id_petugas' => $request->id_petugas,
            'nama_petugas' => $request->nama_petugas,
            'username' => $request->username,
            'password' => $request->password,
            'id_level' => $request->id_level,
        ]);
        return redirect('/petugas');
    }

    public function update(Request $request)
    {
        DB::table('tb_petugas')->where('id_petugas', $request->id_petugas)->update([
            'id_petugas' => $request->id_petugas,
            'nama_petugas' => $request->nama_petugas,
            'username' => $request->username,
            'password' => $request->password,
            'id_level' => $request->id_level,
        ]);
        return redirect('/petugas');
    }

    public function destroy($id){
        DB::table('tb_petugas')->where('id_petugas', $id)->delete();
        return redirect('/petugas   ');
    }
}
