<?php

use Illuminate\Support\Facades\Route;
// panggil controller
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LatihanController;
use App\Http\Controllers\TestingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\DasborController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AkunController;
use App\Http\Controllers\Admin\JenisKendaraanController;
use App\Http\Controllers\Admin\PintuParkirController;
use App\Http\Controllers\Admin\ParkirController;
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

// admin: semua route admin diproteksi dengan login
Route::middleware(['checklogin'])->prefix('admin')->name('admin.')->group(function () {
    // dasbor
    Route::get('dasbor', [DasborController::class, 'index']);

    // parkir
    Route::get('parkir', [ParkirController::class, 'index']);
    Route::get('parkir/edit/{id}', [ParkirController::class, 'edit']);
    Route::get('parkir/delete/{id}', [ParkirController::class, 'delete']);
    Route::post('parkir/proses-tambah', [ParkirController::class, 'prosesTambah']);
    Route::post('parkir/proses-edit', [ParkirController::class, 'prosesEdit']);

    // user
    Route::get('user', [UserController::class, 'index']);
    Route::get('user/edit/{id}', [UserController::class, 'edit']);
    Route::get('user/delete/{id}', [UserController::class, 'delete']);
    Route::post('user/proses-tambah', [UserController::class, 'prosesTambah']);
    Route::post('user/proses-edit', [UserController::class, 'prosesEdit']);

    // jenis-kendaraan
    Route::get('jenis-kendaraan', [JenisKendaraanController::class, 'index']);
    Route::get('jenis-kendaraan/edit/{id}', [JenisKendaraanController::class, 'edit']);
    Route::get('jenis-kendaraan/delete/{id}', [JenisKendaraanController::class, 'delete']);
    Route::post('jenis-kendaraan/proses-tambah', [JenisKendaraanController::class, 'prosesTambah']);
    Route::post('jenis-kendaraan/proses-edit', [JenisKendaraanController::class, 'prosesEdit']);

    // jenis-kendaraan
    Route::get('pintu-parkir', [PintuParkirController::class, 'index']);
    Route::get('pintu-parkir/edit/{id}', [PintuParkirController::class, 'edit']);
    Route::get('pintu-parkir/delete/{id}', [PintuParkirController::class, 'delete']);
    Route::post('pintu-parkir/proses-tambah', [PintuParkirController::class, 'prosesTambah']);
    Route::post('pintu-parkir/proses-edit', [PintuParkirController::class, 'prosesEdit']);

    // akun
    Route::get('akun', [AkunController::class, 'index']);
    Route::post('akun/proses-edit', [AkunController::class, 'prosesEdit']);
});
