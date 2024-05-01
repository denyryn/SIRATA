<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswas';
    protected $primaryKey = 'id_mahasiswa';
    protected $fillable = ['id_user', 'id_prodi', 'id_dosen_pembimbing', 'nim', 'nama_mahasiswa'];

    public function User()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // public function Kelas()
    // {
    //     return $this->belongsTo(kelas::class, 'id_kelas');
    // }

    public function Program_Studi()
    {
        return $this->belongsTo(Program_Studi::class, 'id_prodi');
    }

    public function Dosen()
    {
        return $this->belongsTo(Dosen::class, 'id_dosen_pembimbing');
    }

}
