<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Masyarakat extends Authenticatable
{
    use HasFactory;
    protected $table = 'tb_masyarakat';
    protected $primaryKey = 'id_user';
    public $timestamps = false;
    protected $fillable = ['id_user', 'nama_lengkap', 'alamat' , 'username',  'password', 'telp', 'statusj'];
}
