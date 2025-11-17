<?php

namespace App\Http\Controllers;

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
    // LOGIN PETUGAS (ADMIN / PETUGAS)
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::guard('petugas')->attempt($credentials)) {
            $request->session()->regenerate();

            $petugas = Auth::guard('petugas')->user();

            // AMBIL LEVEL DENGAN AMAN atau HAK AKSES

            $level = null;

            // jika relasi level ada
            if ($petugas->level) {
                // sesuaikan nama kolomnya (level atau nama_level)
                $level = $petugas->level->level ?? $petugas->level->nama_level ?? null;
            }

            // fallback jika level null
            if (!$level) {
                if ($petugas->id_level == 1)
                    $level = 'admin';
                elseif ($petugas->id_level == 2)
                    $level = 'petugas';
                else
                    $level = 'petugas';
            }

            session([
                'level' => $level,
                'id_petugas' => $petugas->id_petugas,
            ]);

            return redirect('/dashboard');
        }

        return back()->with('error', 'Username atau Password salah');
    }

    // LOGIN SEBAGAI MASYARAKAT
    public function LoginMasyarakat(Request $req)
    {
        $req->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = Masyarakat::where('username', $req->username)->first();

        if (!$user) {
            return back()->with('error', 'Username tidak ditemukan');
        }

        if (!Hash::check($req->password, $user->password)) {
            return back()->with('error', 'Password salah');
        }

        $req->session()->put([
            'level' => 'masyarakat',
            'id_user' => $user->id_user,
            'nama_lengkap' => $user->nama_lengkap,
        ]);

        return redirect()->route('dashboard_masyarakat');
    }

    // REGISTER PETUGAS

    public function showRegisterForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama_petugas' => 'required',
            'username' => 'required',
            'password' => 'required',
            'id_level' => 'required',
        ]);

        Petugas::create([
            'nama_petugas' => $request->nama_petugas,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'id_level' => $request->id_level,
        ]);

        return redirect('/login');
    }

    // REGISTER MASYARAKAT

    public function showRegisterMasyarakat()
    {
        return view('register_masyarakat');
    }
    public function RegisterMasyarakat(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'alamat' => 'required',
            'username' => 'required',
            'password' => 'required',
            'telp' => 'required',
            'status' => 'required',
            
        ]);

        Masyarakat::create([
            'nama_lengkap' => $request->nama_lengkap,
            'alamat' => $request->alamat,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'telp' => $request->telp,
            'status' => $request->status,
        ]);

        return redirect('/login_masyarakat');
    }


    // LOGOUT PETUGAS
    public function logoutPetugas(Request $request)
    {
        Auth::guard('petugas')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    // LOGOUT MASYARAKAT
    public function logoutMasyarakat(Request $request)
    {
        $request->session()->flush();
        $request->session()->regenerate();

        return redirect('/login_masyarakat');
    }
}