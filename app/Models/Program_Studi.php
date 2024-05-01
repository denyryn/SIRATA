<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program_Studi extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'program_studis';
    protected $primaryKey = 'id_prodi';
    protected $fillable = ['nama_prodi'];

    // public function Kelas()
    // {
    //     return $this->hasMany(Kelas::class, 'id_prodi');
    // }

    public function Mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'id_prodi');
    }
}
