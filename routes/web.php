<?php

use App\Http\Controllers\PembelianController;
use App\Http\Controllers\UserLoginController;
use Illuminate\Support\Facades\Route;



// Public Routes
Route::get('/', [App\Http\Controllers\BerandaController::class, 'index'])->name('beranda.index');
Route::get('katalog', [App\Http\Controllers\KatalogController::class, 'index'])->name('katalog.index');
Route::get('berita', [App\Http\Controllers\BeritaController::class, 'index'])->name('berita.index');




// Route Login dan Register
// Route::post('/register', [UserLoginController::class, 'store'])->name('register.store');
// Route::post('/login', [UserLoginController::class, 'login'])->name('login');
// Route::post('/logout', [UserLoginController::class, 'logout'])->name('logout');


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
    Route::delete('konten/katalog/merek/{id}', [App\Http\Controllers\Admin\KatalogController::class, 'destroyMerek'])->name('konten.katalog.destroyMerek');
    Route::put('konten/katalog/merek/{id}', [App\Http\Controllers\Admin\KatalogController::class, 'updateMerek'])->name('konten.katalog.updateMerek');

    
    // makelar bagian admin
    Route::get('makelar', [App\Http\Controllers\Admin\MakelarController::class, 'index'])->name('konten.makelar');
    Route::post('makelar', [App\Http\Controllers\Admin\MakelarController::class, 'store'])->name('konten.makelar.store');
    Route::put('makelar/{id}', [App\Http\Controllers\Admin\MakelarController::class, 'update'])->name('konten.makelar.update');
    Route::delete('makelar/{id}', [App\Http\Controllers\Admin\MakelarController::class, 'destroy'])->name('konten.makelar.destroy');

    // Berita bagian admin
    Route::get('berita', [App\Http\Controllers\Admin\BeritaController::class, 'index'])->name('konten.berita');
    Route::post('berita', [App\Http\Controllers\Admin\BeritaController::class, 'store'])->name('konten.berita.store'); 
    Route::delete('berita/{id}', [App\Http\Controllers\Admin\BeritaController::class, 'destroy'])->name('konten.berita.destroy');

    // Event bagian admin
    Route::get('event', [App\Http\Controllers\Admin\EventController::class, 'index'])->name('konten.event');
    Route::post('event', [App\Http\Controllers\Admin\EventController::class, 'store'])->name('konten.event.store');
    Route::delete('event/{id}', [App\Http\Controllers\Admin\EventController::class, 'destroy'])->name('konten.event.destroy');
    Route::put('event/{id}', [App\Http\Controllers\Admin\EventController::class, 'update'])->name('konten.event.update');
    

});