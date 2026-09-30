<?php

use App\Http\Controllers\HalamanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\BackOffice\AuthController;
use App\Http\Controllers\BackOffice\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| RUTE ASLI (FRONTEND)
|--------------------------------------------------------------------------
*/
Route::get('/', [HalamanController::class, 'home'])->name('home');
Route::get('/kontak', [HalamanController::class, 'kontak'])->name('kontak');

Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('produk.show');


/*
|--------------------------------------------------------------------------
| RUTE PATCH (BACK-OFFICE)
|--------------------------------------------------------------------------
*/
Route::prefix('back-office')->name('back_office.')->group(function () {

    // Boleh diakses siapa saja (sebelum login admin)
    Route::get('/login',  [AuthController::class, 'tampilkanForm'])->name('login');
    Route::post('/login', [AuthController::class, 'proses'])->name('login.proses');

    // Hanya untuk admin yang sudah login dan lolos pengecekan PastikanAdmin
    Route::middleware('admin')->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::post('/logout',   [AuthController::class, 'logout'])->name('logout');

    });
});
