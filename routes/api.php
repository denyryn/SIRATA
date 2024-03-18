<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/message', function(){
    return response()->json([
        'id' => '1',
        'nama' => 'Aria',
        'nim' => '4.33.22.1.02',
        'kelas' => 'TI2B'
    ]); 
});
