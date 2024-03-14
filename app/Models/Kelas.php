<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'Kelas';
    protected $primaryKey = 'id_kelas';
    protected $fillable = ['id_prodi','id_dosen','nama_kelas'];

    public function Dosen(){
        return $this->belongsTo('app\Models\Dosen','id_dosen');
    }

    public function Program_Studi(){
        return $this->belongsTo('app\Models\Program_Studi','id_prodi');
    }

    public function Mahasiswa(){
        return $this->hasMany('app\Models\Mahasiswa','id_kelas');
    }
}
