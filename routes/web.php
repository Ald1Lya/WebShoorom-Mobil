<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserLoginController;


Route::get('/', [App\Http\Controllers\BerandaController::class, 'index'])->name('beranda');

Route::get('katalogmobil', function () {
    return view('katalogmobil');
});

// Route Login dan Register
Route::post('/register', [UserLoginController::class, 'store'])->name('register.store');
Route::post('/login', [UserLoginController::class, 'login'])->name('login');
Route::post('/logout', [UserLoginController::class, 'logout'])->name('logout');


// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('index');

     // Beranda bagian admin
    Route::get('beranda', [App\Http\Controllers\Admin\BerandaController::class, 'index'])->name('konten.beranda.index');
    Route::post('beranda', [App\Http\Controllers\Admin\BerandaController::class, 'store'])->name('konten.beranda.store');
    Route::put('beranda/{id}', [App\Http\Controllers\Admin\BerandaController::class, 'update'])->name('konten.beranda.update');
    Route::delete('beranda/{id}', [App\Http\Controllers\Admin\BerandaController::class, 'destroy'])->name('konten.beranda.destroy');
});

