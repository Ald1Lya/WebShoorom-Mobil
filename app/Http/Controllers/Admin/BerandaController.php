<?php

namespace App\Http\Controllers\Admin;

use App\Models\Beranda;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BerandaController extends Controller
{
    // Tampilkan form dan data beranda
    public function index()
    {
        $beranda = Beranda::first(); // Ambil data pertama (jika ada)
        return view('admin.konten.beranda', compact('beranda'));
    }

    // Simpan atau update data beranda
    public function store(Request $request)
{
    $beranda = Beranda::first(); // Cek apakah data sudah ada (untuk edit)

    $rules = [
        'email' => 'required|email|max:255',
        'alamat' => 'required|string|max:255',
        'nomor' => 'required|string|max:20',
    ];

    // Jika tidak ada data (input baru), semua field wajib
    if (!$beranda) {
        $rules = array_merge($rules, [
            'judul1' => 'required|string|max:255',
            'deskripsi1' => 'required|string',
            'gambar1' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'judul2' => 'required|string|max:255',
            'deskripsi2' => 'required|string',
            'gambar2' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    } else {
        // Kalau edit, field gambar tidak wajib
        $rules = array_merge($rules, [
            'judul1' => 'nullable|string|max:255',
            'deskripsi1' => 'nullable|string',
            'gambar1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'judul2' => 'nullable|string|max:255',
            'deskripsi2' => 'nullable|string',
            'gambar2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    }

    $validated = $request->validate($rules);

    if (!$beranda) {
        $beranda = new Beranda();
    }

    // Isi field jika ada inputnya
    foreach (['judul1', 'deskripsi1', 'judul2', 'deskripsi2', 'email', 'alamat', 'nomor'] as $field) {
        if ($request->filled($field)) {
            $beranda->$field = $request->$field;
        }
    }

    // Gambar 1
    if ($request->hasFile('gambar1')) {
        $beranda->gambar1 = $request->file('gambar1')->store('gambarberanda', 'public');
    }

    // Gambar 2
    if ($request->hasFile('gambar2')) {
        $beranda->gambar2 = $request->file('gambar2')->store('gambarberanda', 'public');
    }

    $beranda->save();

    return redirect()->back()->with('success', 'Data Beranda berhasil disimpan!');
}
}