<?php

use App\Http\Controllers\PembelianController;
use App\Http\Controllers\UserLoginController;
use Illuminate\Support\Facades\Route;


// Public Routes
Route::get('/', [App\Http\Controllers\BerandaController::class, 'index'])->name('beranda.index');
Route::get('katalog', [App\Http\Controllers\KatalogController::class, 'index'])->name('katalog.index');


// Route Login dan Register
Route::post('/register', [UserLoginController::class, 'store'])->name('register.store');
Route::post('/login', [UserLoginController::class, 'login'])->name('login');
Route::post('/logout', [UserLoginController::class, 'logout'])->name('logout');

// Route Untuk Beli Mobil Dari Katalog 
Route::get('/beli/{katalog_id}', [PembelianController::class, 'beli'])->name('beli.mobil');
Route::get('/statuspembelian', [ App\Http\Controllers\StatusPembelianController::class, 'index'])->name('statuspembelian');
Route::post('/beli/confirm', [PembelianController::class, 'confirm'])->name('beli.confirm');
Route::get('/login', function () {return redirect('/');  //Syarat Logout karna status pembelian dia nge get login untuk menampilkan data
});

// Route Untuk Cetak Bukti
Route::get('/pembelian/{id}/cetak-bukti', [PembelianController::class, 'cetakBukti'])->name('cetak.bukti');




// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Admin Dashboard
    Route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('index');

    // Beranda bagian admin
    Route::get('beranda', [App\Http\Controllers\Admin\BerandaController::class, 'index'])->name('konten.beranda');
    Route::post('beranda', [App\Http\Controllers\Admin\BerandaController::class, 'store'])->name('konten.beranda.store');

    // Katalog bagian admin
    Route::get('katalog', [App\Http\Controllers\Admin\KatalogController::class, 'index'])->name('konten.katalog');
    Route::post('katalog', [App\Http\Controllers\Admin\KatalogController::class, 'store'])->name('konten.katalog.store');
    Route::get('katalog/{katalog}/edit', [App\Http\Controllers\Admin\KatalogController::class, 'edit'])->name('konten.katalog.edit');
    Route::put('katalog/{katalog}', [App\Http\Controllers\Admin\KatalogController::class, 'update'])->name('konten.katalog.update');
    Route::delete('katalog/{katalog}', [App\Http\Controllers\Admin\KatalogController::class, 'destroy'])->name('konten.katalog.destroy');

    // Status Pembelian Bagian Admin
    Route::get('/admin/status-pembelian', [App\Http\Controllers\Admin\StatusPembelianController::class, 'index'])->name('admin.statuspembelian');
    Route::put('/status-pembelian/{id}', [App\Http\Controllers\Admin\StatusPembelianController::class, 'update'])->name('statuspembelian.update');

});
