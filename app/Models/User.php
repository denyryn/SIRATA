<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id_user';
    protected $fillable = ['username', 'password', 'email', 'akses'];

    public function Mahasiswa()
    {
        return $this->hasOne('App\Models\Mahasiswa', 'id_user');
    }

    public function Dosen()
    {
        return $this->hasOne('App\Models\Dosen', 'id_user');
    }
}
