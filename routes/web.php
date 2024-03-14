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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [Welcome::class, 'index']);
Route::get('/login', [Welcome::class, 'login']);
Route::get('/dashboard', [userMahasiswa::class, 'index']);
Route::get('/dashboard/lacak', [userMahasiswa::class, 'lacak']);



