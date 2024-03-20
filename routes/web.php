<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userMahasiswa;
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
    Route::get('/dashboard', [userMahasiswa::class, 'index'])->name("mahasiswa.index");
    Route::get('/dashboard/lacak', [userMahasiswa::class, 'lacak'])->name("mahasiswa.lacak_surat");
    Route::get('/layanan', [userMahasiswa::class, 'layanan'])->name("mahasiswa.layanan");
}); //instead of one by one its better to use grouping :D

Route::get('/surat/form', function () {
    return view('surat.form');
})->name('surat.form');

