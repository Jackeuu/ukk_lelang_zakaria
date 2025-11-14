<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use illuminate\Support\Facades\Auth;
use illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Petugas;

class AuthController extends Controller
{
    public function ShowLoginForm(){
        return view('login');
    }

    public function ShowRegisterForm(){
        return view('register');
    }
    public function register(Request $request){
        $request->validate([
            'nama_petugas' => 'required',
            'username' => 'required',
            'password' => 'required',
            'id_level' => 'required',
        ]);

        $user = Petugas::create([
            'nama_petugas' => $request->nama_petugas,
            'username' => $request->username,
            'password' => $request->password,
            'id_level' => $request->id_level,
        ]);
    }
}
