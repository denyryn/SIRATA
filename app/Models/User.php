<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = ['username', 'password', 'email'];

    // public function Mahasiswa()
    // {
    //     return $this->hasOne('app\Models\Mahasiswa', 'id_user');
    // }

    // public function Dosen()
    // {
    //     return $this->hasOne('app\Models\Dosen', 'id_user');
    // }

    // public function Surat()
    // {
    //     return $this->hasMany('app\Models\Surat', 'id_user');
    // }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
