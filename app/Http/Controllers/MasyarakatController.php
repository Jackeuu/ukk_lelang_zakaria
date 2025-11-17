<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masyarakat;

class MasyarakatController extends Controller
{
    public function index(){
        $masyarakat = Masyarakat::all();
        return view('masyarakat.index', compact('masyarakat'));
    }
}
