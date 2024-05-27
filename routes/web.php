<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;

use App\Http\Controllers\UserMahasiswaController;
use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\UserDosenController;

use App\Http\Controllers\JabatanController;
use App\Http\Controllers\ProgramStudiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PerihalController;

use App\Http\Controllers\SuratController;
use App\Http\Controllers\SuratMahasiswaController;
use App\Http\Controllers\SuratDosenController;

use App\Http\Controllers\LayananSuratAdminController;
use App\Http\Controllers\LayananSuratMahasiswaController;
use App\Http\Controllers\LayananSuratDosenController;
use App\Http\Controllers\CariLayananSuratController;
use App\Http\Controllers\LayananLacakSuratController;

use App\Http\Controllers\FetchMahasiswaController;
use App\Http\Controllers\FetchDosenController;

use App\Http\Controllers\DownloadSuratController;
use App\Http\Controllers\UploadSuratController;
use App\Http\Controllers\StreamSuratController;

use App\Http\Controllers\ProfileMahasiswaController;
use App\Http\Controllers\ProfileDosenController;

use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\ManageUserDosenController;

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
Route::get('/', [LoginController::class, 'index'])->name("welcome.index");
Route::get('/login', [LoginController::class, 'login'])->name("login");
Route::get('/postlogin', [LoginController::class, 'postlogin'])->name("postlogin");
Route::get('/logout', [LoginController::class, 'logout'])->name("logout");

// =============================== GROUP ROUTE MAHASISWA ================================
Route::group(['prefix' => 'mahasiswa', 'middleware' => ['auth', 'cekakses:mahasiswa']], function () {

    Route::prefix('/dashboard')->group(function () {

        Route::get('/', [UserMahasiswaController::class, 'index'])->name("mahasiswa.index");

        Route::prefix('/layanan_surat')->group(function () {
            Route::get('/', [LayananSuratMahasiswaController::class, 'index'])->name("mahasiswa.surat.layanan");
            Route::get('/create/{id_perihal}', [LayananSuratMahasiswaController::class, 'create'])->name("mahasiswa.surat.form");
            Route::get('/search', [CariLayananSuratController::class, 'index'])->name("mahasiswa.surat.search");
            Route::post('/', [LayananSuratMahasiswaController::class, 'store'])->name("mahasiswa.surat.form.store");
        });

        Route::prefix('/surat')->middleware('CekAksesSurat')->group(function () {
            Route::get('/surat_selesai/{id_surat}', [StreamSuratController::class, 'index'])->name("mahasiswa.surat.stream");
            Route::get('/preview/{id_surat}', [SuratMahasiswaController::class, 'read'])->name("mahasiswa.surat.preview");
            Route::get('/lacak/{id_surat}', [LayananLacakSuratController::class, 'index'])->name("mahasiswa.surat.lacak");
        });

        Route::prefix("/profile")->group(function () {
            Route::get('/', [ProfileMahasiswaController::class, 'index'])->name("mahasiswa.profile");
        });

    });

});


// =============================== GROUP ROUTE Dosen ================================
Route::group(['prefix' => 'dosen', 'middleware' => ['auth', 'cekakses:dosen']], function () {

    Route::prefix('/dashboard')->group(function () {

        Route::get('/', [UserDosenController::class, 'index'])->name("dosen.index");

        Route::prefix('/layanan_surat')->group(function () {
            Route::get('/', [LayananSuratDosenController::class, 'index'])->name("dosen.surat.layanan");
            Route::get('/create/{id_perihal}', [LayananSuratDosenController::class, 'create'])->name("dosen.surat.form");
            Route::get('/search', [CariLayananSuratController::class, 'index'])->name("dosen.surat.search");
            Route::post('/', [LayananSuratDosenController::class, 'store'])->name("dosen.surat.form.store");
        });

        Route::prefix('/surat')->group(function () {
            Route::get('/surat_selesai/{id_surat}', [StreamSuratController::class, 'index'])->name("dosen.surat.stream");
            Route::get('/preview/{id_surat}', [SuratDosenController::class, 'read'])->name("dosen.surat.preview");
            Route::get('/lacak_surat/{id_surat}', [LayananLacakSuratController::class, 'index'])->name("dosen.surat.lacak");
        });

        Route::prefix("/profile")->group(function () {
            Route::get('/', [ProfileDosenController::class, 'index'])->name("dosen.profile");
        });

    });

});

// =============================== GROUP ROUTE ADMIN ================================
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'cekakses:admin']], function () {

    Route::prefix('/dashboard')->group(function () {

        Route::get('/', [UserAdminController::class, 'index'])->name("admin.index");

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

        // Surat Routes
        Route::prefix('/surat')->group(function () {
            Route::get('/', [SuratController::class, 'index'])->name("admin.surat");
            Route::get('/download/{id_surat}', [DownloadSuratController::class, 'index'])->name("admin.surat.download");
            Route::put('/upload/surat_selesai/{id_surat}', [UploadSuratController::class, 'index'])->name("admin.surat.upload");
            Route::get('/stream/surat_selesai/{id_surat}', [StreamSuratController::class, 'index'])->name("admin.surat.stream");
            Route::get('/preview/{id_surat}', [SuratController::class, 'edit'])->name("admin.surat.preview");
            Route::put('/preview/accept/{id_surat}', [SuratController::class, 'update'])->name("admin.surat.update");
            Route::put('/preview/reject/{id_surat}', [SuratController::class, 'reject'])->name("admin.surat.update.reject");
        });

        // Manage User Routes
        Route::prefix('/manage_users')->group(function () {
            Route::get('/', [ManageUserController::class, 'index'])->name("admin.manage_users");

            Route::get('/dosen', [ManageUserDosenController::class, 'index'])->name("admin.manage_users.dosen");
            Route::put('/dosen/{id_dosen}', [ManageUserDosenController::class, 'update'])->name("admin.manage_users.dosen.update");

            // ==========================API====================================
            Route::get('/fetch_data_mahasiswa', [FetchMahasiswaController::class, 'index']);
            Route::get('/fetch_data_dosen', [FetchDosenController::class, 'index']);
        });

    });

});
