<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserMahasiswaController;
use App\Http\Controllers\ProgramStudiController;
use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\JabatanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider and assigned to
| the "web" middleware group. Now create something great!
|
*/

// Welcome Routes
Route::get('/', [WelcomeController::class, 'index'])->name("welcome.index");
Route::get('/login', [WelcomeController::class, 'login'])->name("welcome.login");

// Mahasiswa Routes
Route::prefix('mahasiswa')->group(function () {
    Route::get('/dashboard', [UserMahasiswaController::class, 'index'])->name("mahasiswa.index");
    Route::get('/dashboard/lacak_surat', [UserMahasiswaController::class, 'lacak'])->name("mahasiswa.lacak_surat");
    Route::get('/layanan', [UserMahasiswaController::class, 'layanan'])->name("mahasiswa.layanan");
});

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [UserAdminController::class, 'index'])->name("admin.index");

    // Program Studi Routes
    Route::prefix('/dashboard/program_studi')->group(function () {
        Route::get('/', [ProgramStudiController::class, 'index'])->name("admin.prodi");
        Route::post('/', [ProgramStudiController::class, 'store'])->name("prodi.store");
        Route::put('/{id_prodi}', [ProgramStudiController::class, 'update'])->name("prodi.update");
        Route::delete('/{id_prodi}', [ProgramStudiController::class, 'delete'])->name("prodi.delete");
    });

    // Jabatan Routes
    Route::prefix('/dashboard/jabatan')->group(function () {
        Route::get('/', [JabatanController::class, 'index'])->name("admin.jabatan");
        Route::post('/', [JabatanController::class, 'store'])->name("jabatan.store");
        Route::put('/{id_jabatan}', [JabatanController::class, 'update'])->name("jabatan.update");
        Route::delete('/{id_jabatan}', [JabatanController::class, 'delete'])->name("jabatan.delete");
    });
});
