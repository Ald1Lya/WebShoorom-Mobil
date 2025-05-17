<?php

namespace App\Http\Controllers\Admin;

use App\Models\Beranda;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BerandaController extends Controller
{
    // Menampilkan form dengan data beranda pertama (jika ada)
    public function index()
    {
        $beranda = Beranda::first();
        return view('admin.konten.beranda', compact('beranda'));
    }

    // Simpan atau update data beranda
    public function store(Request $request)
    {
        $beranda = Beranda::first();

        // Aturan validasi dasar untuk field kontak
        $rules = [
            'email' => 'required|email|max:255',
            'alamat' => 'required|string|max:255',
            'nomor' => 'required|string|max:20',
        ];

        if (!$beranda) {
            // Jika belum ada data (create), semua field wajib
            $rules = array_merge($rules, [
                'judul1' => 'required|string|max:255',
                'deskripsi1' => 'required|string',
                'gambar1' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',

                'judul2' => 'required|string|max:255',
                'deskripsi2' => 'required|string',
                'gambar2' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',

                'judulsec3' => 'required|string|max:255',
                'gambarsec3' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'gambarsec4' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'gambarsec5' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'gambarsec6' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
        } else {
            // Jika update, judul, deskripsi, dan gambar bisa kosong
            $rules = array_merge($rules, [
                'judul1' => 'nullable|string|max:255',
                'deskripsi1' => 'nullable|string',
                'gambar1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

                'judul2' => 'nullable|string|max:255',
                'deskripsi2' => 'nullable|string',
                'gambar2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

                'judulsec3' => 'nullable|string|max:255',
                'gambarsec3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'gambarsec4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'gambarsec5' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'gambarsec6' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
        }

        $validated = $request->validate($rules);

        if (!$beranda) {
            $beranda = new Beranda();
        }

        // Update field teks (judul, deskripsi, email, alamat, nomor)
        foreach (['judul1', 'deskripsi1', 'judul2', 'deskripsi2', 'email', 'alamat', 'nomor', 'judulsec3'] as $field) {
            if ($request->filled($field)) {
                $beranda->$field = $request->input($field);
            }
        }

        // Update gambar jika ada file baru yang diupload
        foreach (['gambar1', 'gambar2', 'gambarsec3', 'gambarsec4', 'gambarsec5', 'gambarsec6'] as $imgField) {
            if ($request->hasFile($imgField)) {
                // Simpan file di storage 'public/gambarberanda' dan update path ke db
                $beranda->$imgField = $request->file($imgField)->store('gambarberanda', 'public');
            }
        }

        $beranda->save();

        return redirect()->back()->with('success', 'Data Beranda berhasil disimpan!');
    }
}
