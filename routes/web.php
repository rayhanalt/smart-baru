<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KriteriaController;

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
    return view('home');
});
Route::get('/home', function () {
    return view('home');
});


// login
Route::controller(loginController::class)->group(function(){
    Route::post('/login', 'auth');
    Route::get('/login', 'auth')->middleware('guest');
    
    Route::post('/logout', 'logout');
    Route::get('/logout', 'logout')->middleware('guest');
});

// kriteria
// Route::resource('/kriteria', KriteriaController::class)->except('show','store')->middleware('auth');

// kategori
Route::resource('/kategori', KategoriController::class)->middleware('auth');