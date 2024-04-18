<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswas';
    protected $primaryKey = 'id_mahasiswa';
    protected $fillable = ['nim', 'id_user', 'id_kelas', 'nama_mhs', 'telp_mhs'];

    public function User()
    {
        return $this->belongsTo('app\Models\User', 'id_user');
    }

    public function Kelas()
    {
        return $this->belongsTo('app\Models\Kelas', 'id_kelas');
    }

    public function Pemohon()
    {
        return $this->hasMany('app\Models\Pemohon', 'id_mahasiswa');
    }
}
