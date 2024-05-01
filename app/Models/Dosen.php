<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $table = 'dosens';
    protected $primaryKey = 'id_dosen';
    protected $fillable = [
        'nip',
        'nidn',
        'id_user',
        // 'id_jabatan',
        'id_prodi',
        // 'id_tanda_tangan',
        'nama_dosen',
        'gelar_depan',
        'gelar_belakang'
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function Jabatan()
    {
        return $this->hasOne(Jabatan::class, 'id_dosen');
    }

    public function Mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'id_dosen_pembimbing');
    }

    public function Tanda_Tangan()
    {
        return $this->hasOne(Tanda_Tangan::class, 'id_dosen');
    }
}
