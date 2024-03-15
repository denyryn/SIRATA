<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $table = 'dosens';
    protected $primaryKey = 'id_dosen';
    protected $fillable = ['nip','id_user','nama_dosen','id_jabatan'];

    public function User(){
        return $this->belongsTo('app\Models\User','id_user');
    }

    public function Jabatan(){
        return $this->belongsTo('app\Models\Jabatan','id_jabatan');
    }

    public function Tanda_Tangan(){
        return $this->hasOne('app\Models\Tanda_Tangan', 'id_dosen');
    }
}
