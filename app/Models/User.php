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
}
