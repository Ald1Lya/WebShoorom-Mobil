<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Beranda;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
        public function index()
        {
                // Menampilkan semua konten beranda
                $berandas = Beranda::all();
                return view('beranda', compact('berandas'));
        }
        
}
