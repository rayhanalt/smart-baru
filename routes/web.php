<?php

use App\Models\mahasiswa;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpkController;
use App\Http\Controllers\AlurController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\dashboardController;

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
Route::get('/loginpage', function () {
    return view('login');
})->name('login')->middleware('guest');

// dashboard admin
Route::get('/dashboard', [dashboardController::class, 'dashboard'])->middleware('auth');

// home
Route::get('/', function () {
    return view('/spk/alur');
})->middleware('guest');

Route::get('/home', function () {
    return view('/spk/alur');
})->middleware('guest');

// login
Route::controller(loginController::class)->group(function () {
    Route::post('/login', 'auth');
    Route::get('/login', 'auth')->middleware('guest');

    Route::post('/logout', 'logout');
    Route::get('/logout', 'logout')->middleware('guest');
});

// kriteria
Route::resource('/kriteria', KriteriaController::class)->except('show', 'create', 'delete')->middleware('auth');

// kategori
Route::resource('/kategori', KategoriController::class)->except('show')->middleware('auth');

// alternatif
Route::resource('/alternatif', AlternatifController::class)->except('show')->middleware('auth');
Route::get('pdf-alternatif', [AlternatifController::class, 'createPDF'])->middleware('auth');

// mahasiswa
Route::resource('/mahasiswa', MahasiswaController::class)->except('create')->middleware('auth');
Route::get('pdf-mahasiswa', [MahasiswaController::class, 'createPDF'])->middleware('auth');

//spk
Route::controller(SpkController::class)->group(function () {
    Route::get('/spk/spk', 'spk')->middleware('guest');
    Route::get('/spk/spk/{kriteria}', 'spk')->middleware('guest');
    Route::post('/spk/spk/{kriteria}', 'store');
    Route::get('/spk/hasil', 'hasil_kategori')->middleware('guest');
    Route::get('/spk/spk-alternatif/{kriteria}', 'spkAlternatif')->middleware('guest');
    Route::get('/spk/hasil-alternatif', 'hasil_alternatif')->middleware('guest');
    Route::post('/spk/spk-alternatif/{kriteria}', 'storeAlternatif');
});

Route::controller(AlurController::class)->group(function () {
    Route::post('/spk/alur', 'alur');
    Route::get('/spk/alur', 'alur')->middleware('guest');
    Route::post('/hapus', 'hapus');
    Route::get('/hapus', 'hapus')->middleware('guest');
    Route::post('/spk/hasil', 'alurAlternatif');
});
