<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Petugas extends Authenticatable
{
    use HasFactory;

    protected $table = 'tb_petugas';
    protected $primaryKey = 'id_petugas';
    public $timestamps = false;

    protected $fillable = ['id_petugas', 'nama_petugas', 'username', 'password', 'id_level'];

    public function level()
    {
        return $this->belongsTo(Level::class, 'id_level', 'id_level');
    }

}