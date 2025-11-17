<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Petugas;
use App\Models\Masyarakat;

class AuthController extends Controller
{
    public function ShowLoginForm()
    {
        return view('login');
    }

    public function ShowLoginMasyarakat()
    {
        return view('login_masyarakat');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::guard('petugas')->attempt($credentials)) {

            $request->session()->regenerate();

            $petugas = Auth::guard('petugas')->user();

            // Simpan ROLE ke session
            session([
                'level' => $petugas->level->level,  // admin atau petugas
                'id_petugas' => $petugas->id_petugas
            ]);

            return redirect('/dashboard');
        }

        return back()->with('error', 'Username atau Password salah');
    }
    public function LoginMasyarakat(Request $req)
{
    $req->validate([
        'username' => 'required',
        'password' => 'required'
    ]);

    // Cari user masyarakat berdasarkan username
    $user = Masyarakat::where('username', $req->username)->first();

    if (!$user) {
        return back()->with('error', 'Username tidak ditemukan');
    }

    // Cek password
    if (!Hash::check($req->password, $user->password)) {
        return back()->with('error', 'Password salah');
    }

    // Simpan session manual
    session([
        'level' => 'masyarakat',
        'id_user' => $user->id_user,    // pastikan kolomnya benar
        'nama_lengkap' => $user->nama_lengkap,
    ]);

    return redirect()->route('dashboard_masyarakat');
}



    public function ShowRegisterForm()
    {
        return view('register');
    }

    public function ShowRegisterMasyarakat()
    {
        return view('register_masyarakat');
    }
    public function register(Request $request)
    {
        $request->validate([
            'nama_petugas' => 'required',
            'username' => 'required',
            'password' => 'required',
            'id_level' => 'required',
        ]);

        $user = Petugas::create([
            'nama_petugas' => $request->nama_petugas,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'id_level' => $request->id_level,
        ]);

        return redirect('/login');
    }

    public function RegisterMasyarakat(Request $request)
    {
        $request->validate([
            'NIK' => 'required',
            'nama_lengkap' => 'required',
            'username' => 'required',
            'password' => 'required',
            'telp' => 'required',
        ]);

        $user = Masyarakat::create([
            'NIK' => $request->NIK,
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'telp' => $request->telp,
        ]);

        return redirect('/login_masyarakat');
    }
}
