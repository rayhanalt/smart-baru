<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\AlternatifController;
use App\Models\mahasiswa;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// login page
Route::get('/loginpage', function(){
    return view('login');
})->name('login')->middleware('guest');

// home
Route::get('/', function () {
    return view('mahasiswa.create',[
        'mahasiswa' => mahasiswa::get()
    ]);
});
Route::get('/home', function () {
    return view('mahasiswa.create',[
        'mahasiswa' => mahasiswa::get()
    ]);
});


// login
Route::controller(loginController::class)->group(function(){
    Route::post('/login', 'auth');
    Route::get('/login', 'auth')->middleware('guest');
    
    Route::post('/logout', 'logout');
    Route::get('/logout', 'logout')->middleware('guest');
});

// kriteria
 Route::resource('/kriteria', KriteriaController::class)->except('show')->middleware('auth');

// kategori
Route::resource('/kategori', KategoriController::class)->except('show')->middleware('auth');

// alternatif
Route::resource('/alternatif', AlternatifController::class)->except('show')->middleware('auth');

// mahasiswa
Route::resource('/mahasiswa', MahasiswaController::class)->except('show','create')->middleware('auth');
