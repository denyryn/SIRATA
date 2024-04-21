<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProgramStudiController;
use App\Http\Controllers\UserMahasiswaController;
use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PerihalController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\LayananSuratController;


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

// =============================== AUTH ROUTE ================================
Route::get('/', [WelcomeController::class, 'index'])->name("welcome.index");
Route::get('/login', [WelcomeController::class, 'login'])->name("welcome.login");

// =============================== GROUP ROUTE MAHASISWA ================================
Route::prefix('mahasiswa')->group(function () {
    Route::get('/dashboard', [UserMahasiswaController::class, 'index'])->name("mahasiswa.index");
    Route::get('/dashboard/lacak_surat', [LayananSuratController::class, 'lacak'])->name("mahasiswa.lacak_surat");
    Route::prefix('/layanan')->group(function () {
        Route::get('/', [LayananSuratController::class, 'index'])->name("mahasiswa.layanan");
        Route::get('/{nama_kategori}', [LayananSuratController::class, 'create'])->name("mahasiswa.layanan.surat");
    });
});

// =============================== GROUP ROUTE ADMIN ================================
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

    Route::prefix('/dashboard/kategori_surat')->group(function () {
        Route::get('/', [KategoriController::class, 'index'])->name("admin.kategori");
        Route::post('/', [KategoriController::class, 'store'])->name("kategori.store");
        Route::put('/{id_kategori}', [KategoriController::class, 'update'])->name("kategori.update");
        Route::delete('/{id_kategori}', [KategoriController::class, 'delete'])->name("kategori.delete");
    });

    Route::prefix('/dashboard/status')->group(function () {
        Route::get('/', [StatusController::class, 'index'])->name("admin.status");
        Route::get('/{id_status}', [StatusController::class, 'show'])->name("status.show");
        Route::get('/create', [StatusController::class, 'create'])->name("status.create");
        Route::post('/', [StatusController::class, 'store'])->name("status.store");
        Route::put('/{id_status}', [StatusController::class, 'update'])->name("status.update");
        Route::delete('/{id_status}', [StatusController::class, 'delete'])->name("status.delete");
    });

    Route::prefix('/dashboard/perihal')->group(function () {
        Route::get('/', [PerihalController::class, 'index'])->name("admin.perihal");
        Route::get('/create', [PerihalController::class, 'create'])->name("perihal.create");
        Route::get('/details/{id_perihal}', [PerihalController::class, 'read'])->name("perihal.read");
        Route::post('/', [PerihalController::class, 'store'])->name("perihal.store");
        Route::get('/edit/{id_perihal}', [PerihalController::class, 'edit'])->name("perihal.edit");
        Route::put('/{id_perihal}', [PerihalController::class, 'update'])->name("perihal.update");
        Route::delete('/{id_perihal}', [PerihalController::class, 'delete'])->name("perihal.delete");

    });

});

// =============================== GROUP ROUTE TEMPLATE ================================
Route::prefix('template')->group(function () {
    Route::get('/build', [TemplateController::class, 'create'])->name("template.build");
});
