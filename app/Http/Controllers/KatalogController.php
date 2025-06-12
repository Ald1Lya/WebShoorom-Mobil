<?php

namespace App\Http\Controllers;

use App\Models\Katalog;
use App\Models\Merek;
use App\Models\Makelar;
use Illuminate\Http\Request;

class KatalogController extends Controller
{
    public function index(Request $request)
    {
        // Ambil semua data merek & makelar untuk kebutuhan tampilan
        $mereks = Merek::all();
        $makelars = Makelar::all();

        // Awal query katalog
        $query = Katalog::query();

        // --- FILTER BERDASARKAN MEREK (via tombol) ---
        if ($request->filled('merek_id')) {
            $query->where('merek_id', $request->merek_id);
        }

        // --- FITUR PENCARIAN (via input teks) ---
        if ($request->filled('q')) {
            $search = $request->q;

            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhereHas('merek', function ($q2) use ($search) {
                      $q2->where('nama_merek', 'like', "%{$search}%");
                  });
            });
        }

        // Eksekusi query
        $katalogs = $query->get();

        // Siapkan pesan jika hasil kosong
        $pesan = null;
        if ($katalogs->isEmpty()) {
            if ($request->filled('merek_id')) {
                $merekTerpilih = $mereks->firstWhere('id', $request->merek_id);
                $namaMerek = $merekTerpilih?->nama_merek ?? 'Merek tersebut';
                $pesan = "Maaf, tidak ada mobil tersedia untuk merek '{$namaMerek}' / Unit mobil tidak ada.";
            } else {
                $pesan = "Mobil tidak ditemukan.";
            }
        }

        // Kirim data ke view
        return view('katalog', [
            'katalogs' => $katalogs,
            'mereks' => $mereks,
            'makelars' => $makelars,
            'pesan'   => $pesan,
        ]);
    }
}
