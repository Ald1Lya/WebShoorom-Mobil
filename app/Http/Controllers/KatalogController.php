<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Katalog;
use App\Models\Merek; // Tambahkan ini di atas
use Illuminate\Http\Request;

class KatalogController extends Controller
{
    
public function index(Request $request)
{
    // Ambil semua merek buat tombol filter
    $mereks = Merek::all();

    // Query awal katalog
    $query = Katalog::query();

    // Cek jika ada filter merek dari request
    if ($request->has('merek_id') && $request->merek_id != '') {
        $query->where('merek_id', $request->merek_id);
    }

    // Ambil data katalog dengan filter jika ada
    $katalogs = $query->get();

        // Cek apakah ada katalog yang sesuai
    $pesan = null;
    if ($request->has('merek_id') && $request->merek_id != '' && $katalogs->isEmpty()) {
        $merekTerpilih = $mereks->where('id', $request->merek_id)->first();
        $namaMerek = $merekTerpilih ? $merekTerpilih->nama_merek : 'Merek tersebut';
        $pesan = "Maaf, tidak ada mobil tersedia untuk merek '{$namaMerek}'/ Stok Mobil Habis.";
    }

        // Kalau TIDAK ada filter merek, dan data katalog kosong
    if (!$request->has('merek_id') && $katalogs->isEmpty()) {
        $pesan = "Belum ada mobil yang tersedia saat ini.";
    }


    // Kirim data ke view
    return view('katalog', [
        'katalogs' => $katalogs,
        'mereks' => $mereks,
        'pesan' => $pesan, // Kirim pesan ke view
    ]);
    }
}