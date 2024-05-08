<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    use HasFactory;
    protected $table = 'riwayats';
    protected $primaryKey = 'id_riwayat';
    protected $fillable = [
        'id_surat',
        'id_status',
        'nama_status',
        'keterangan_status'
    ];

    public function Surat()
    {
        return $this->belongsTo(Surat::class, 'id_surat');
    }

    // public function Status()
    // {
    //     return $this->belongsTo(Status::class, 'id_status');
    // }
}
