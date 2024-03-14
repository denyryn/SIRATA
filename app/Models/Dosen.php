<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $table = 'Dosen';
    protected $primaryKey = 'id_dosen';
    protected $fillable = ['nip','id_user','nama_dosen','id_jabatan'];

    public function User(){
        return $this->belongsTo('app\Models\User','id_user');
    }

    public function Jabatan(){
        return $this->belongsTo('app\Models\Jabatan','id_jabatan');
    }
}
