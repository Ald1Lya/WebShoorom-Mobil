<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('beranda');
});

Route::get('katalogmobil', function () {
    return view('katalogmobil');
});

Route::get('/', function () {
    return view('beranda');
});
