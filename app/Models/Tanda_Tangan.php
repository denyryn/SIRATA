<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanda_Tangan extends Model
{
    use HasFactory;
    protected $table = 'tanda_tangans';
    protected $primaryKey = 'id_tanda_tangan';
    protected $fillable = [
        'id_dosen',
        'path_tanda_tangan'
    ];

    public function Dosen()
    {
        return $this->belongsTo('app\Models\Dosen', 'id_dosen');
    }
}
