<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program_Studi extends Model
{
    use HasFactory;
    protected $table = 'Program_Studi';
    protected $primaryKey = 'id_prodi';
    protected $fillable = ['nama_prodi'];

    public function Kelas(){
        return $this->hasMany('app\Models\Kelas','id_prodi');
    }
}
