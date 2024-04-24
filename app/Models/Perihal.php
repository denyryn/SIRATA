<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perihal extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'perihals';
    protected $primaryKey = 'id_perihal';
    protected $fillable = [
        'id_kategori_surat',
        'nama_perihal',
        'nama_tujuan',
        'alamat_tujuan',
        'upper_body',
        'lower_body',
    ];

    public function Kategori_Surat()
    {
        return $this->belongsTo(Kategori_Surat::class, 'id_kategori_surat');
    }
}
