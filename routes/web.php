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
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [WelcomeController::class, 'index'])->name("welcome.index");
Route::get('/login', [WelcomeController::class, 'login'])->name("welcome.login");

Route::prefix('mahasiswa')->group(function () {
<<<<<<< Updated upstream
    Route::get('/dashboard', [UserMahasiswaController::class, 'index'])->name("mahasiswa.index");
    Route::get('/dashboard/lacak_surat', [UserMahasiswaController::class, 'lacak'])->name("mahasiswa.lacak_surat");
    Route::get('/layanan', [UserMahasiswaController::class, 'layanan'])->name("mahasiswa.layanan");
=======
    Route::get('/dashboard', [UserMahasiswa::class, 'index'])->name("mahasiswa.index");
    Route::get('/dashboard/lacak', [UserMahasiswa::class, 'lacak'])->name("mahasiswa.lacak_surat");
    Route::get('/layanan', [UserMahasiswa::class, 'layanan'])->name("mahasiswa.layanan");

    // Tambahkan route untuk controller Status di sini
    Route::get('/dashboard/status', [StatusController::class, 'index'])->name("mahasiswa.status");
});
 //instead of one by one its better to use grouping :D

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [userAdmin::class, 'index'])->name("admin.index");
    Route::get('/dashboard/program_studi', [ProgramStudi::class, 'index'])->name("admin.prodi");

}); //instead of one by one its better to use grouping :D

Route::prefix('functionProdi')->group(function () {
    Route::post('/dashboard', [ProgramStudi::class, 'store'])->name("prodi.store");

    Route::get('/dashboard/{id_prodi}/edit', [ProgramStudi::class, 'edit'])->name("prodi.edit");
    Route::put('/dashboard/{id_prodi}', [ProgramStudi::class, 'update'])->name("prodi.update");

    Route::delete('/dashboard/{id_prodi}', [ProgramStudi::class, 'delete'])->name("prodi.delete");
>>>>>>> Stashed changes
});

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [UserAdminController::class, 'index'])->name("admin.index");

    Route::prefix('/dashboard/program_studi')->group(function () {
        Route::get('/', [ProgramStudiController::class, 'index'])->name("admin.prodi");
        Route::post('/', [ProgramStudiController::class, 'store'])->name("prodi.store");
        Route::put('/{id_prodi}', [ProgramStudiController::class, 'update'])->name("prodi.update");
        Route::delete('/{id_prodi}', [ProgramStudiController::class, 'delete'])->name("prodi.delete");
    });
    Route::prefix('/dashboard/jabatan')->group(function () {
        Route::get('/', [JabatanController::class, 'index'])->name("admin.jabatan");
        Route::post('/', [JabatanController::class, 'store'])->name("jabatan.store");
        Route::put('/{id_jabatan}', [JabatanController::class, 'update'])->name("jabatan.update");
        Route::delete('/{id_jabatan}', [JabatanController::class, 'delete'])->name("jabatan.delete");
    });

});
