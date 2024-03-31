<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserMahasiswaController;
use App\Http\Controllers\ProgramStudiController;
use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\KategoriSuratController;

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

Route::get('/', [WelcomeController::class, 'index'])->name("welcome.index");
Route::get('/login', [WelcomeController::class, 'login'])->name("welcome.login");

Route::prefix('mahasiswa')->group(function () {
    Route::get('/dashboard', [UserMahasiswaController::class, 'index'])->name("mahasiswa.index");
    Route::get('/dashboard/lacak_surat', [UserMahasiswaController::class, 'lacak'])->name("mahasiswa.lacak_surat");
    Route::get('/layanan', [UserMahasiswaController::class, 'layanan'])->name("mahasiswa.layanan");
});

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [UserAdminController::class, 'index'])->name("admin.index");

    Route::prefix('/dashboard/program_studi')->group(function () {
        Route::get('/', [ProgramStudiController::class, 'index'])->name("admin.prodi");
        Route::post('/', [ProgramStudiController::class, 'store'])->name("prodi.store");
        Route::put('/{id_prodi}', [ProgramStudiController::class, 'update'])->name("prodi.update");
        Route::delete('/{id_prodi}', [ProgramStudiController::class, 'delete'])->name("prodi.delete");
    });

    Route::prefix('/dashboard/kategori_surat')->group(function () {
        Route::get('/', [KategoriSuratController::class, 'index'])->name("admin.kategori");
        Route::get('/{id}/edit', [KategoriSuratController::class, 'edit'])->name("kategori.edit");
        Route::post('/', [KategoriSuratController::class, 'store'])->name("kategori.store");
        Route::put('/{id_kategori_surat}', [KategoriSuratController::class, 'update'])->name("kategori.update");
        Route::delete('/{id_kategori_surat}', [KategoriSuratController::class, 'delete'])->name("kategori.delete");
    });  
});
