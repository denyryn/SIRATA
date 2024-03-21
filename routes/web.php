<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserMahasiswa;
use App\Http\Controllers\ProgramStudi;
use App\Http\Controllers\UserAdmin;
use App\Http\Controllers\Welcome;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [Welcome::class, 'index'])->name("welcome.index");
Route::get('/login', [Welcome::class, 'login'])->name("welcome.login");

Route::prefix('mahasiswa')->group(function () {
    Route::get('/dashboard', [UserMahasiswa::class, 'index'])->name("mahasiswa.index");
    Route::get('/dashboard/lacak_surat', [UserMahasiswa::class, 'lacak'])->name("mahasiswa.lacak_surat");
    Route::get('/layanan', [UserMahasiswa::class, 'layanan'])->name("mahasiswa.layanan");
}); //instead of one by one its better to use grouping :D

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [userAdmin::class, 'index'])->name("admin.index");

    Route::prefix('/dashboard/program_studi')->group(function () {

        Route::get('/', [ProgramStudi::class, 'index'])->name("admin.prodi");

        Route::post('/', [ProgramStudi::class, 'store'])->name("prodi.store");

        Route::put('/{id_prodi}', [ProgramStudi::class, 'update'])->name("prodi.update");

        Route::delete('/{id_prodi}', [ProgramStudi::class, 'delete'])->name("prodi.delete");
    });

}); //instead of one by one its better to use grouping :D



