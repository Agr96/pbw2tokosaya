<?php

use App\Http\Controllers\BackOffice\AuthController;
use App\Http\Controllers\BackOffice\DashboardController;
use App\Http\Controllers\BackOffice\KategoriController;
use App\Http\Controllers\BackOffice\ProdukController as ProdukBackOffice;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BahasaController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\BackOffice\PesananController;


// Route untuk mengubah bahasa
Route::get('/bahasa/{kode}', [BahasaController::class, 'ganti'])->name('bahasa.ganti');

Route::get('/', [HalamanController::class, 'home'])
    ->name('home');

Route::get('/kontak', [HalamanController::class, 'kontak'])
    ->name('kontak');


// =========================
// HALAMAN PUBLIK
// =========================

Route::get('/produk', [ProdukController::class, 'index'])
    ->name('produk.index');

// Detail produk berdasarkan slug
Route::get('/produk/{produk:slug}', [ProdukController::class, 'show'])
    ->name('produk.show');


// =========================
// BACK OFFICE
// =========================

Route::prefix('back-office')
    ->name('back_office.')
    ->group(function () {

        // Login
        Route::get('/login', [AuthController::class, 'tampilkanForm'])
            ->name('login');

        Route::post('/login', [AuthController::class, 'proses'])
            ->name('login.proses');


        // Hanya admin yang sudah login
        Route::middleware('admin')->group(function () {
            Route::get('/pesanan',                  [PesananController::class, 'index'])->name('pesanan.index');
            Route::get('/pesanan/{pesanan}',        [PesananController::class, 'show'])->name('pesanan.show');
            Route::patch('/pesanan/{pesanan}/status', [PesananController::class, 'ubahStatus'])->name('pesanan.status');

            // Dashboard
            Route::get('/dashboard', [DashboardController::class, 'index'])
                ->name('dashboard');

            // Logout
            Route::post('/logout', [AuthController::class, 'logout'])
                ->name('logout');


            // CRUD Kategori
            Route::resource('kategori', KategoriController::class)
                ->except(['show']);


            // CRUD Produk Back Office
            Route::resource('produk', ProdukBackOffice::class)
                ->except(['show']);

        });
    });

Route::controller(KeranjangController::class)->prefix('keranjang')->name('keranjang.')->group(function () {

    Route::get('/',                    'index')->name('index');
    Route::post('/tamb  ah/{produk}',    'tambah')->name('tambah');
    Route::patch('/{produk}',          'ubah')->name('ubah');
    Route::delete('/{produk}',         'hapus')->name('hapus');
    Route::delete('/',                 'kosongkan')->name('kosongkan');

});

Route::controller(CheckoutController::class)->prefix('checkout')->name('checkout.')->group(function () {
    Route::get('/',        'index')->name('index');
    Route::post('/',       'proses')->name('proses');
    Route::get('/selesai/{pesanan:kode_pesanan}', 'selesai')->name('selesai');
});

