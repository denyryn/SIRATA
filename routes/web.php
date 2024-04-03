<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserMahasiswaController;
use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProgramStudiController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PerihalController;
use App\Http\Controllers\StatusController;

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
Route::post('/login', [AuthController::class, 'login'])->name("login"); // Endpoint untuk proses login

// Mahasiswa Routes
Route::middleware('auth')->prefix('mahasiswa')->group(function () {
    Route::get('/dashboard', [UserMahasiswaController::class, 'index'])->name("mahasiswa.index");
    Route::get('/dashboard/lacak_surat', [UserMahasiswaController::class, 'lacak'])->name("mahasiswa.lacak_surat");
    Route::get('/layanan', [UserMahasiswaController::class, 'layanan'])->name("mahasiswa.layanan");
});

// Admin Routes
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/dashboard', [UserAdminController::class, 'index'])->name("admin.index");
    Route::post('/logout', function () {
        auth()->logout(); // Logout user
        return redirect('/login'); // Redirect to login page after logout
    })->name('logout');

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

    // Perihal Routes
    Route::prefix('/dashboard/perihal')->group(function () {
        Route::get('/', [PerihalController::class, 'index'])->name("admin.perihal");
        Route::post('/', [PerihalController::class, 'store'])->name("perihal.store");
        Route::put('/{id_perihal}', [PerihalController::class, 'update'])->name("perihal.update");
        Route::delete('/{id_perihal}', [PerihalController::class, 'delete'])->name("perihal.delete");
    });

    // Kategori Surat Routes
    Route::prefix('/dashboard/kategori_surat')->group(function () {
        Route::get('/', [KategoriController::class, 'index'])->name("admin.kategori");
        Route::post('/', [KategoriController::class, 'store'])->name("kategori.store");
        Route::put('/{id_kategori}', [KategoriController::class, 'update'])->name("kategori.update");
        Route::delete('/{id_kategori}', [KategoriController::class, 'delete'])->name("kategori.delete");
    });

    // Status Surat Routes
    Route::prefix('/dashboard/status')->group(function () {
        Route::get('/', [StatusController::class, 'index'])->name("admin.status");
        Route::get('/{nama_status}', [StatusController::class, 'show'])->name("status.show");
        Route::get('/create', [StatusController::class, 'create'])->name("status.create");
        Route::post('/', [StatusController::class, 'store'])->name("status.store");
        Route::put('/{id_status}', [StatusController::class, 'update'])->name("status.update");
        Route::delete('/{id_status}', [StatusController::class, 'delete'])->name("status.delete");
    });
});
