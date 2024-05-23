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
    protected $fillable = ['username', 'password', 'email', 'foto_profil'];

    public function Mahasiswa()
    {
        return $this->hasOne(Mahasiswa::class, 'id_user');
    }

    public function Dosen()
    {
        return $this->hasOne(Dosen::class, 'id_user');
    }

    public function Surat()
    {
        return $this->hasMany(Surat::class, 'id_user');
    }

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
