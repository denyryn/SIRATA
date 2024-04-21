<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $primaryKey = 'id_user';
    protected $fillable = ['username', 'password', 'email', 'akses'];

    public function Mahasiswa()
    {
        return $this->hasOne('app\Models\Mahasiswa', 'id_user');
    }

    public function Dosen()
    {
        return $this->hasOne('app\Models\Dosen', 'id_user');
    }

    public function Surat()
    {
        return $this->hasMany('app\Models\Surat', 'id_user');
    }

    public function Pemohon()
    {
        return $this->hasMany('app\Models\Pemohon', 'id_user');
    }

    public function Tanda_Tangan()
    {
        return $this->hasOne('app\Models\Tanda_Tangan', 'id_user');
    }
}
