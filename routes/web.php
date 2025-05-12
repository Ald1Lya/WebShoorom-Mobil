<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserLoginController;


Route::get('/', [App\Http\Controllers\BerandaController::class, 'index'])->name('beranda');

Route::get('katalog', function () {
    return view('katalog');
});

// Route Login dan Register
Route::post('/register', [UserLoginController::class, 'store'])->name('register.store');
Route::post('/login', [UserLoginController::class, 'login'])->name('login');
Route::post('/logout', [UserLoginController::class, 'logout'])->name('logout');


// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('index');

   // Beranda bagian admin
    Route::get('beranda', [App\Http\Controllers\Admin\BerandaController::class, 'index'])->name('konten.beranda');
    Route::get('beranda/create', [App\Http\Controllers\Admin\BerandaController::class, 'create'])->name('konten.beranda.create');
    Route::post('beranda', [App\Http\Controllers\Admin\BerandaController::class, 'store'])->name('konten.beranda.store');});