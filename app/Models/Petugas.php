<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;

class Petugas extends Authenticable {
    use HasFactory;

    protected $table = 'tb_petugas';

    protected $fillable = ['id_petugas', 'nama_petugas', 'username', 'password', 'id_level'];
}
