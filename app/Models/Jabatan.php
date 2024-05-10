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
    protected $fillable = ['nama_jabatan', 'id_dosen'];

    public function Dosen()
    {
        return $this->belongsTo(Dosen::class, 'id_dosen');
    }

    public function Surat()
    {
        return $this->hasMany(Surat::class, 'id_jabatan');
    }
}
