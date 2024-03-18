<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $table = 'statuses';
    protected $primaryKey = 'id_status';
    protected $fillable = [
        'nama_status'
    ];

    public function Surat(){
        return $this->belongsTo('app\Models\Surat','id_status');
    }
}
