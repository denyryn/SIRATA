<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Http;

use App\Http\Controllers\LayananProxyApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::prefix('proxy')->group(function () {
    Route::prefix('mahasiswa')->group(function () {
        Route::get('/', [LayananProxyApiController::class, 'getMahasiswa'])->name('mahasiswa.getAll');
        Route::post('/', [LayananProxyApiController::class, 'postMahasiswa'])->name('mahasiswa.post');
    });

    Route::prefix('dosen')->group(function () {
        Route::get('/', [LayananProxyApiController::class, 'getDosen'])->name('dosen.getAll');
        Route::post('/', [LayananProxyApiController::class, 'postDosen'])->name('dosen.post');
    });
});
