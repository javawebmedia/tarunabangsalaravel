<?php

use Illuminate\Support\Facades\Route;
// panggil controller
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LatihanController;
use App\Http\Controllers\TestingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\DasborController;
// end panggil controller

// Route::get('/', function () {
//     return view('welcome');
// });

// home
Route::get('/', [HomeController::class, 'index']);

// routes latihan
Route::get('latihan', [LatihanController::class, 'index']);
Route::get('latihan/berita', [LatihanController::class, 'berita']);
Route::get('latihan/profil', [LatihanController::class, 'profil']);
// routes testing
Route::get('testing', [TestingController::class, 'index']);
Route::get('testing/halo/{id}', [TestingController::class, 'halo']);
// routes login
Route::get('login', [LoginController::class, 'index']);
Route::post('login/proses', [LoginController::class, 'proses']);
Route::get('login/logout', [LoginController::class, 'logout']);
Route::get('logout', [LoginController::class, 'logout']);
Route::get('reset', [LoginController::class, 'reset']);
Route::get('ganti-password/{id}', [LoginController::class, 'gantiPassword']);
Route::post('proses-ganti-password', [LoginController::class, 'prosesGantiPassword']);

// admin
Route::prefix('admin')->group(function() {
    // dasbor
    Route::get('dasbor', [DasborController::class, 'index']);
});
