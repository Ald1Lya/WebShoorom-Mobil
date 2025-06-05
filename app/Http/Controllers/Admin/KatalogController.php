<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Katalog;
use App\Models\Merek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KatalogController extends Controller
{
    // Menampilkan daftar katalog dan merek
    public function index()
    {
        $katalogs = Katalog::with('merek')->paginate(10); // Ambil data katalog dengan relasi merek (10 per halaman)
        $mereks = Merek::orderBy('nama_merek')->get();    // Ambil semua merek, urutkan berdasarkan nama

        return view('admin.konten.katalog', compact('katalogs', 'mereks'));
    }

    // Menyimpan data baru (merek baru atau katalog baru)
    public function store(Request $request)
    {
        $action = $request->input('action'); // Ambil jenis aksi dari form

        // Aksi: Simpan merek baru
        if ($action === 'simpan_merek') {
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
        }

        // Aksi: Simpan katalog baru
        if ($action === 'simpan_katalog') {
            $request->validate([
                'nama'         => 'required|string|max:255',
                'harga'        => 'required|numeric|min:0',
                'tahun'        => 'required|integer|min:1900|max:' . (date('Y') + 1),
                'transmisi'    => 'required|in:Manual,Otomatik',
                'bahan_bakar'  => 'required|in:Bensin,Solar,Listrik',
                'kilometer'    => 'required|numeric|min:0',
                'deskripsi'    => 'nullable|string|max:1000',
                'status'       => 'required|in:tersedia,terjual',
                'merek_id'     => 'required|exists:mereks,id',
                'foto_utama'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20048',
                'foto1'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20048',
                'foto2'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20048',
                'foto3'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20048',
            ]);

            try {
                $data = $request->except(['_token', 'action', 'foto_utama', 'foto1', 'foto2', 'foto3']);

                // Simpan semua foto jika diupload
                foreach (['foto_utama', 'foto1', 'foto2', 'foto3'] as $foto) {
                    if ($request->hasFile($foto)) {
                        $data[$foto] = $request->file($foto)->store('foto_katalog', 'public');
                    }
                }

                Katalog::create($data); // Simpan data katalog
                return redirect()->back()->with('successkatalog', 'Katalog mobil berhasil disimpan.');
            } catch (\Exception $e) {
                return redirect()->back()->withErrors(['error' => 'Gagal menyimpan katalog: ' . $e->getMessage()]);
            }
        }

        // Aksi tidak valid
        return redirect()->back()->withErrors(['error' => 'Aksi tidak valid']);
    }

    // Memperbarui data katalog
    public function update(Request $request, Katalog $katalog)
    {
        $request->validate([
            'nama'         => 'required|string|max:255',
            'harga'        => 'required|numeric|min:0',
            'tahun'        => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'transmisi'    => 'required|in:Manual,Otomatik',
            'bahan_bakar'  => 'required|in:Bensin,Solar,Listrik',
            'kilometer'    => 'required|numeric|min:0',
            'deskripsi'    => 'nullable|string|max:1000',
            'status'       => 'required|in:tersedia,terjual',
            'merek_id'     => 'required|exists:mereks,id',
            'foto_utama'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20048',
            'foto1'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20048',
            'foto2'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20048',
            'foto3'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20048',
        ]);

        try {
            $data = $request->except(['_token', '_method', 'foto_utama', 'foto1', 'foto2', 'foto3']);

            // Update foto jika ada file baru
            foreach (['foto_utama', 'foto1', 'foto2', 'foto3'] as $foto) {
                if ($request->hasFile($foto)) {
                    // Hapus file lama
                    if ($katalog->$foto) {
                        Storage::disk('public')->delete($katalog->$foto);
                    }
                    // Simpan file baru
                    $data[$foto] = $request->file($foto)->store('foto_katalog', 'public');
                }
            }

            $katalog->update($data); // Update data katalog
            return redirect()->back()->with('successkatalog', 'Katalog mobil berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Gagal memperbarui katalog: ' . $e->getMessage()]);
        }
    }

    // Menghapus data katalog
    public function destroy(Katalog $katalog)
    {
        try {
            // Hapus foto utama jika ada
            if ($katalog->foto_utama) {
                Storage::disk('public')->delete($katalog->foto_utama);
            }

            $katalog->delete(); // Hapus katalog
            return redirect()->back()->with('successkatalog', 'Katalog mobil berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Gagal menghapus katalog: ' . $e->getMessage()]);
        }
    }
}
