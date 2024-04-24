<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswas';
    protected $primaryKey = 'id_mahasiswa';
    protected $fillable = ['nim', 'id_user', 'id_kelas', 'nama_mahasiswa'];

    public function User()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function Kelas()
    {
        return $this->belongsTo(kelas::class, 'id_kelas');
    }

}
