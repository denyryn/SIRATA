<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;
    protected $table = 'surats';
    protected $primaryKey = 'id_surat';
    protected $fillable = [
        'id_perihal',
        'id_jabatan',
        'id_riwayat',
        'tujuan_surat', //Is it necessary?????
        'nomor_surat',
        'email_mahasiswa',
        'tanggal_surat',
        'lampiran'

    ];

    public function Jabatan()
    {
        return $this->belongsTo('app\Models\Jabatan', 'id_jabatan');
    }


    public function Perihal()
    {
        return $this->belongsTo('app\Models\Jabatan', 'id_perihal');
    }

    public function Pemohon()
    {
        return $this->hasMany('app\Models\Pemohon', 'id_surat');
    }

    public function Riwayat()
    {
        return $this->hasMany('app\Models\Riwayat', 'id_surat');
    }
}
