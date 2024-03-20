<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemohon extends Model
{
    use HasFactory;
    protected $table = 'pemohons';
    protected $primaryKey = 'id_pemohon';
    protected $fillable = [
        'id_mahasiswa', //daripada memakai NIM or any suggestion?
        'id_surat'
    ];

    public function Mahasiswa()
    {
        return $this->belongsTo('app\Models\Mahasiswa', 'id_mahasiswa');
    }

    public function Surat()
    {
        return $this->belongsTo('app\Models\Surat', 'id_surat');
    }
}
