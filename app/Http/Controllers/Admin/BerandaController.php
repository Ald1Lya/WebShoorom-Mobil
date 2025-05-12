<?php

namespace App\Http\Controllers\Admin;

use App\Models\Beranda;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BerandaController extends Controller
{
    // Tampilkan semua data beranda
    public function index()
    {
        $berandas = Beranda::all();
        return view('admin.konten.beranda', compact('berandas'));
    }

public function store(Request $request)
{
    $validated = $request->validate([
        'judul1' => 'required|string|max:255',
        'deskripsi1' => 'required|string',
        'gambar1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'judul2' => 'required|string|max:255',
        'deskripsi2' => 'required|string',
        'gambar2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'email' => 'required|email|max:255',
        'alamat' => 'required|string|max:255',
        'nomor' => 'required|string|max:20',
    ]);

    Beranda::truncate(); // Hapus semua data beranda sebelum menyimpan yang baru

    $beranda = new Beranda($validated);

    // Menyimpan gambar pertama
    if ($request->hasFile('gambar1')) {
        $gambar1 = $request->file('gambar1')->store('gambarberanda', 'public');
        $beranda->gambar1 = $gambar1;
    }

    // Menyimpan gambar kedua
    if ($request->hasFile('gambar2')) {
        $gambar2 = $request->file('gambar2')->store('gambarberanda', 'public');
        $beranda->gambar2 = $gambar2;
    }


    // Simpan ke database
    $beranda->save();

    return redirect()->back()->with('success', 'Data Beranda berhasil disimpan!');

}

   
}
