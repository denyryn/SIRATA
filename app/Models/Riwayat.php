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
        'id_status'
    ];

    public function Surat()
    {
        return $this->belongsTo('app\Models\Surat', 'id_surat');
    }

    public function Status()
    {
        return $this->belongsTo(Status::class, 'id_status');
    }
}
