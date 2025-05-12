<?php

namespace App\Http\Controllers;

use App\Models\Beranda;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        // Ambil satu baris data saja (karena hanya 1 baris di tabel)
        $beranda = Beranda::first(); 
        
        // Pastikan jika tidak ada data, tetap bisa ditangani dengan default
        return view('beranda', [
            'judul1' => $beranda->judul1 ?? null,
            'deskripsi1' => $beranda->deskripsi1 ?? null,
            'gambar1' => $beranda->gambar1 ?? null,
            'judul2' => $beranda->judul2 ?? null,
            'deskripsi2' => $beranda->deskripsi2 ?? null,
            'gambar2' => $beranda->gambar2 ?? null,
            'alamat' => $beranda->alamat ?? null,
            'email' => $beranda->email ?? null,
            'nomor' => $beranda->nomor ?? null,
        ]);
    }
}
