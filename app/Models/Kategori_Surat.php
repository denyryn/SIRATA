<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori_Surat extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'kategori_surats';
    protected $primaryKey = 'id_kategori_surat';
    protected $fillable = [
        'nama_kategori'
    ];

    public function Surat()
    {
        return $this->hasMany('app\Models\Surat', 'id_kategori_surat');
    }

    public function Perihal()
    {
        return $this->hasMany('app\Models\Perihal', 'id_kategori_surat');
    }
}
