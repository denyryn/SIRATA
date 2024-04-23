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
        // 'id_riwayat',
        'id_kategori_surat',
        'nama_perihal',
        'tujuan_surat',
        'nomor_surat',
        // 'tanggal_surat',
        'body',
        'lower',
        'lampiran'

    ];

    public function User()
    {
        return $this->belongsTo('app\Models\User', 'id_user');
    }

    public function Kategori_Surat()
    {
        return $this->belongsTo('app\Models\Kategori_Surat', 'id_kategori_surat');
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
