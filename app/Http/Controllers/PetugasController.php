<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas;

class PetugasController extends Controller
{
    public function index(){
        $petugas = Petugas::all();
        return view('petugas.index', compact('petugas'));
    }
}
