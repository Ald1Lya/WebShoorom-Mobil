<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserLoginController;


Route::get('/', function () {
    return view('beranda');
})->name('beranda');

Route::get('katalogmobil', function () {
    return view('katalogmobil');
});

// Route Login dan Register
Route::post('/register', [UserLoginController::class, 'store'])->name('register.store');
Route::post('/login', [UserLoginController::class, 'login'])->name('login');