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
        'template',
    ];

    public function Kategori_Surat()
    {
        return $this->belongsTo('app\Models\Kategori_Surat', 'id_kategori_surat');
    }

    public function Surat()
    {
        return $this->hasMany('app\Models\Surat', 'id_perihal');
    }
}
