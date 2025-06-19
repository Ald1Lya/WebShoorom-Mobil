<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Katalog;
use App\Models\Merek;
use App\Models\Makelar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;

class KatalogController extends Controller
{
    public function index()
    {
            $katalogs = Katalog::with('merek', 'makelar')
        ->where('status', 'tersedia') // hanya tampilkan mobil yang tersedia
        ->paginate(10);

        
        $katalogs = Katalog::with('merek', 'makelar')->paginate(10);
        $mereks = Merek::orderBy('nama_merek')->get();
        $makelars = Makelar::orderBy('nama')->get(); // ✅ ambil dari tabel makelars

        return view('admin.konten.katalog', compact('katalogs', 'mereks', 'makelars'));
    }

    public function store(Request $request)
    {
        $action = $request->input('action');

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
                return redirect()->route('admin.index')
                    ->with('active_tab', 'katalog')
                    ->with('successkatalog', 'Merek baru berhasil disimpan.');
            } catch (\Exception $e) {
                return redirect()->route('admin.index')
                    ->with('active_tab', 'katalog')
                    ->withErrors(['error' => 'Gagal menyimpan merek: ' . $e->getMessage()]);
            }
        }

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
                'makelar_id'   => 'required|exists:makelars,id', // ✅ pastikan valid
                'foto_utama'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20048',
                'foto1'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20048',
                'foto2'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20048',
                'foto3'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20048',
            ]);

            try {
                $data = $request->only([
                    'nama', 'harga', 'tahun', 'transmisi', 'bahan_bakar', 'kilometer',
                    'deskripsi', 'status', 'merek_id', 'makelar_id' // ✅ makelar_id ikut
                ]);

                foreach (['foto_utama', 'foto1', 'foto2', 'foto3'] as $foto) {
                    if ($request->hasFile($foto)) {
                        $data[$foto] = $request->file($foto)->store('foto_katalog', 'public');
                    }
                }

                Katalog::create($data);
                return redirect()->route('admin.index')
                    ->with('active_tab', 'katalog')
                    ->with('successkatalog', 'Katalog mobil berhasil disimpan.');
            } catch (\Exception $e) {
                return redirect()->route('admin.index')
                    ->with('active_tab', 'katalog')
                    ->withErrors(['error' => 'Gagal menyimpan katalog: ' . $e->getMessage()]);
            }
        }

        return redirect()->route('admin.index')
            ->with('active_tab', 'katalog')
            ->withErrors(['error' => 'Aksi tidak valid']);
    }

    public function update(Request $request, Katalog $katalog)
    {
        $request->validate([
            'nama'         => 'nullable|string|max:255',
            'harga'        => 'nullable|numeric|min:0',
            'tahun'        => 'nullable|integer|min:1900|max:' . (date('Y') + 1),
            'transmisi'    => 'nullable|in:Manual,Otomatik',
            'bahan_bakar'  => 'nullable|in:Bensin,Solar,Listrik',
            'kilometer'    => 'nullable|numeric|min:0',
            'deskripsi'    => 'nullable|string|max:1000',
            'status'       => 'nullable|in:tersedia,terjual',
            'merek_id'     => 'nullable|exists:mereks,id',
            'makelar_id'   => 'nullable|exists:makelars,id',
            'foto_utama'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20048',
            'foto1'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20048',
            'foto2'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20048',
            'foto3'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20048',
        ]);

        try {
            $data = $request->only([
                'nama', 'harga', 'tahun', 'transmisi', 'bahan_bakar', 'kilometer',
                'deskripsi', 'status', 'merek_id', 'makelar_id'
            ]);

            foreach (['foto_utama', 'foto1', 'foto2', 'foto3'] as $foto) {
                if ($request->hasFile($foto)) {
                    if ($katalog->$foto) {
                        Storage::disk('public')->delete($katalog->$foto);
                    }
                    $data[$foto] = $request->file($foto)->store('foto_katalog', 'public');
                }
            }

            $katalog->update($data);
            return redirect()->route('admin.index')
                ->with('active_tab', 'katalog')
                ->with('successkatalog', 'Katalog mobil berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('admin.index')
                ->with('active_tab', 'katalog')
                ->withErrors(['error' => 'Gagal memperbarui katalog: ' . $e->getMessage()]);
        }
    }

    public function updateMerek(Request $request, $id)
    {
        $request->validate([
            'nama_merek' => 'required|string|max:100|unique:mereks,nama_merek,' . $id,
        ], [
            'nama_merek.required' => 'Nama merek wajib diisi',
            'nama_merek.unique' => 'Nama merek sudah ada',
        ]);

        try {
            $merek = Merek::findOrFail($id);
            $merek->update([
                'nama_merek' => ucfirst(trim($request->input('nama_merek'))),
            ]);

            return redirect()->route('admin.index')
                ->with('active_tab', 'katalog')
                ->with('successkatalog', 'Nama merek berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('admin.index')
                ->with('active_tab', 'katalog')
                ->withErrors(['error' => 'Gagal memperbarui merek: ' . $e->getMessage()]);
        }
    }



    public function destroy(Katalog $katalog)
    {
        try {
            foreach (['foto_utama', 'foto1', 'foto2', 'foto3'] as $foto) {
                if ($katalog->$foto) {
                    Storage::disk('public')->delete($katalog->$foto);
                }
            }

            $katalog->delete();
            return redirect()->route('admin.index')
                ->with('active_tab', 'katalog')
                ->with('successkatalog', 'Katalog mobil berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('admin.index')
                ->with('active_tab', 'katalog')
                ->withErrors(['error' => 'Gagal menghapus katalog: ' . $e->getMessage()]);
        }
    }

    public function destroyMerek($id)
    {
        try {
            $merek = Merek::findOrFail($id);

            // Pastikan tidak ada katalog yang menggunakan merek ini sebelum menghapus
            if ($merek->katalogs()->exists()) {
                return redirect()->route('admin.index')
                    ->with('active_tab', 'katalog')
                    ->withErrors(['error' => 'Tidak bisa menghapus merek yang sedang digunakan.']);
            }

            $merek->delete();
            return redirect()->route('admin.index')
                ->with('active_tab', 'katalog')
                ->with('successkatalog', 'Merek berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('admin.index')
                ->with('active_tab', 'katalog')
                ->withErrors(['error' => 'Gagal menghapus merek: ' . $e->getMessage()]);
        }
    }

        public function cetakLaporan()
    {
        $tersedia = Katalog::with('merek', 'makelar')->where('status', 'tersedia')->get();
        $terjual = Katalog::with('merek', 'makelar')->where('status', 'terjual')->get();

        $pdf = PDF::loadView('admin.laporan.mobil', compact('tersedia', 'terjual'))
            ->setPaper('a4', 'landscape');

        return $pdf->download('laporan-mobil.pdf');
    }

}
