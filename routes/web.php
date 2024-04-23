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
use App\Http\Controllers\SuratController;
use App\Http\Controllers\LayananSuratAdminController;
use App\Http\Controllers\LayananSuratMahasiswaController;
use App\Http\Controllers\CariLayananSuratController;


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
    Route::get('/dashboard/lacak_surat', [LayananSuratMahasiswaController::class, 'lacak'])->name("mahasiswa.lacak_surat");
    Route::prefix('/layanan')->group(function () {
        Route::get('/', [LayananSuratMahasiswaController::class, 'index'])->name("mahasiswa.layanan");
        Route::get('/{nama_kategori}', [LayananSuratMahasiswaController::class, 'create'])->name("mahasiswa.layanan.surat");
    });
});

// =============================== GROUP ROUTE ADMIN ================================
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [UserAdminController::class, 'index'])->name("admin.index");

    Route::prefix('/dashboard')->group(function () {
        // Program Studi Routes
        Route::prefix('/surat')->group(function () {
            Route::get('/', [SuratController::class, 'index'])->name("admin.surat");
            // Route::post('/', [ProgramStudiController::class, 'store'])->name("surat.store");
            // Route::put('/{id_prodi}', [ProgramStudiController::class, 'update'])->name("prodi.update");
            // Route::delete('/{id_prodi}', [ProgramStudiController::class, 'delete'])->name("prodi.delete");
        });

        // Program Studi Routes
        Route::prefix('/program_studi')->group(function () {
            Route::get('/', [ProgramStudiController::class, 'index'])->name("admin.prodi");
            Route::post('/', [ProgramStudiController::class, 'store'])->name("prodi.store");
            Route::put('/{id_prodi}', [ProgramStudiController::class, 'update'])->name("prodi.update");
            Route::delete('/{id_prodi}', [ProgramStudiController::class, 'delete'])->name("prodi.delete");
        });

        // Jabatan Routes
        Route::prefix('/jabatan')->group(function () {
            Route::get('/', [JabatanController::class, 'index'])->name("admin.jabatan");
            Route::post('/', [JabatanController::class, 'store'])->name("jabatan.store");
            Route::put('/{id_jabatan}', [JabatanController::class, 'update'])->name("jabatan.update");
            Route::delete('/{id_jabatan}', [JabatanController::class, 'delete'])->name("jabatan.delete");
        });

        // Kategori Surat Routes
        Route::prefix('/kategori_surat')->group(function () {
            Route::get('/', [KategoriController::class, 'index'])->name("admin.kategori");
            Route::post('/', [KategoriController::class, 'store'])->name("kategori.store");
            Route::put('/{id_kategori}', [KategoriController::class, 'update'])->name("kategori.update");
            Route::delete('/{id_kategori}', [KategoriController::class, 'delete'])->name("kategori.delete");
        });

        // Status Routes
        Route::prefix('/status')->group(function () {
            Route::get('/', [StatusController::class, 'index'])->name("admin.status");
            Route::get('/{id_status}', [StatusController::class, 'show'])->name("status.show");
            Route::get('/create', [StatusController::class, 'create'])->name("status.create");
            Route::post('/', [StatusController::class, 'store'])->name("status.store");
            Route::put('/{id_status}', [StatusController::class, 'update'])->name("status.update");
            Route::delete('/{id_status}', [StatusController::class, 'delete'])->name("status.delete");
        });

        // Perihal Routes
        Route::prefix('/perihal')->group(function () {
            Route::get('/', [PerihalController::class, 'index'])->name("admin.perihal");
            Route::get('/create', [PerihalController::class, 'create'])->name("perihal.create");
            Route::get('/details/{id_perihal}', [PerihalController::class, 'read'])->name("perihal.read");
            Route::post('/', [PerihalController::class, 'store'])->name("perihal.store");
            Route::get('/edit/{id_perihal}', [PerihalController::class, 'edit'])->name("perihal.edit");
            Route::put('/{id_perihal}', [PerihalController::class, 'update'])->name("perihal.update");
            Route::delete('/{id_perihal}', [PerihalController::class, 'delete'])->name("perihal.delete");
        });

        // Layanan Surat Routes
        Route::prefix('/layanan_surat')->group(function () {
            Route::get('/', [LayananSuratAdminController::class, 'index'])->name("admin.surat.layanan");
            Route::get('/create/{id_perihal}', [LayananSuratAdminController::class, 'create'])->name("admin.surat.form");
            Route::get('/search', [CariLayananSuratController::class, 'index'])->name("admin.surat.search");
            Route::post('/', [LayananSuratAdminController::class, 'store'])->name("admin.surat.form.store");
        });
    });
});

// =============================== GROUP ROUTE TEMPLATE ================================
Route::prefix('layanan_surat')->group(function () {
    Route::get('/', [LayananSuratAdminController::class, 'index'])->name("surat.layanan");
    Route::get('/search', [CariLayananSuratController::class, 'index'])->name("surat.search");
});
