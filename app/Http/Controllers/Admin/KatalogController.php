<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Katalog;
use App\Models\Merek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KatalogController extends Controller
{
    public function index()
    {
        $katalogs = Katalog::with('merek')->paginate(10); // Pagination dengan 10 item per halaman
        $mereks = Merek::orderBy('nama_merek')->get();
        
        return view('admin.konten.katalog', compact('katalogs', 'mereks'));
    }

   public function store(Request $request)
{
    $action = $request->input('action');  // Mendapatkan aksi dari form

    if ($action === 'simpan_merek') {
        // Validasi untuk aksi simpan merek
        $request->validate([
            'merek_baru' => 'required|string|max:100|unique:mereks,nama_merek',
        ], [
            'merek_baru.required' => 'Nama merek wajib diisi',
            'merek_baru.unique' => 'Merek ini sudah ada',
        ]);

        try {
            Merek::create([
                'nama_merek' => ucfirst(trim($request->input('merek_baru'))),
            ]);

            return redirect()->back()->with('successkatalog', 'Merek baru berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Gagal menyimpan merek: ' . $e->getMessage()]);
        }
    } elseif ($action === 'simpan_katalog') {
        // Validasi untuk aksi simpan katalog
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'tahun' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'transmisi' => 'required|in:Manual,Otomatik',
            'bahan_bakar' => 'required|in:Bensin,Solar,Listrik',
            'kilometer' => 'required|numeric|min:0',
            'deskripsi' => 'nullable|string|max:1000',
            'status' => 'required|in:tersedia,terjual',
            'merek_id' => 'required|exists:mereks,id',
            'foto_utama' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $data = $request->except(['_token', 'action', 'foto_utama']);
            
            if ($request->hasFile('foto_utama')) {
                // Simpan file ke storage
                $path = $request->file('foto_utama')->store('foto_katalog', 'public');
                $data['foto_utama'] = $path; // Simpan path lengkap
            }

            Katalog::create($data);  // Simpan data katalog ke database

            return redirect()->back()->with('successkatalog', 'Katalog mobil berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Gagal menyimpan katalog: ' . $e->getMessage()]);
        }
    }

    // Jika tidak ada aksi yang valid
    return redirect()->back()->withErrors(['error' => 'Aksi tidak valid']);
}
public function update(Request $request, Katalog $katalog)
{
    // Validasi inputan
    $request->validate([
        'nama' => 'required|string|max:255',
        'harga' => 'required|numeric|min:0',
        'tahun' => 'required|integer|min:1900|max:' . (date('Y') + 1),
        'transmisi' => 'required|in:Manual,Otomatik',
        'bahan_bakar' => 'required|in:Bensin,Solar,Listrik',
        'kilometer' => 'required|numeric|min:0',
        'deskripsi' => 'nullable|string|max:1000',
        'status' => 'required|in:tersedia,terjual',
        'merek_id' => 'required|exists:mereks,id',
        'foto_utama' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    try {
        $data = $request->except(['_token', '_method', 'foto_utama']);
        
        // Jika ada foto utama yang diupload
        if ($request->hasFile('foto_utama')) {
            // Hapus foto lama jika ada
            if ($katalog->foto_utama) {
                Storage::disk('public')->delete($katalog->foto_utama);
            }

            // Simpan foto baru
            $path = $request->file('foto_utama')->store('foto_katalog', 'public');
            $data['foto_utama'] = $path;
        }

        $katalog->update($data); // Update data katalog

        return redirect()->back()->with('successkatalog', 'Katalog mobil berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Gagal menyimpan katalog: ' . $e->getMessage()]);
        }
}

public function destroy(Katalog $katalog)
{
    try {
        // Hapus foto utama jika ada
        if ($katalog->foto_utama) {
            Storage::disk('public')->delete($katalog->foto_utama);
        }

        $katalog->delete(); // Hapus data katalog

       return redirect()->back()->with('successkatalog', 'Katalog mobil berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Gagal menyimpan katalog: ' . $e->getMessage()]);
        }
}

}