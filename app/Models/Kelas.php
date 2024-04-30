<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    protected $primaryKey = 'id_kelas';
    protected $fillable = ['id_prodi', 'id_dosen', 'nama_kelas'];

    public function Dosen()
    {
        return $this->belongsTo(Dosen::class, 'id_dosen');
    }

    public function Program_Studi()
    {
        return $this->belongsTo(Program_Studi::class, 'id_prodi');
    }

    public function Mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'id_kelas');
    }
}
