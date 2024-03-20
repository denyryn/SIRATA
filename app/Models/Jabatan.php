<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'jabatans';
    protected $primaryKey = 'id_jabatan';
    protected $fillable = ['keterangan_jabatan'];

    public function Dosen()
    {
        return $this->hasMany('app\Models\Dosen', 'id_jabatan');
    }

    public function Surat()
    {
        return $this->hasMany('app\Models\Surat', 'id_jabatan');
    }
}
