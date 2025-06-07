<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Katalog;
use App\Models\Merek;
use App\Models\Makelar;
use Illuminate\Http\Request;

class KatalogController extends Controller
{
    public function index(Request $request)
    {
        // Ambil semua data merek untuk tombol filter di tampilan
        $mereks = Merek::all();

        // Buat query awal untuk data katalog
        $query = Katalog::query();

        // ambil semua data makelar
         $makelars = Makelar::all();

        // Jika pengguna memilih filter merek, tambahkan kondisi ke query
        if ($request->has('merek_id') && $request->merek_id != '') {
            $query->where('merek_id', $request->merek_id);
        }

        // Eksekusi query dan ambil hasilnya
        $katalogs = $query->get();

        // Siapkan variabel pesan untuk kondisi tertentu
        $pesan = null;

        // Jika pengguna memilih merek tapi tidak ada mobil yang tersedia
        if ($request->has('merek_id') && $request->merek_id != '' && $katalogs->isEmpty()) {
            $merekTerpilih = $mereks->where('id', $request->merek_id)->first();
            $namaMerek = $merekTerpilih ? $merekTerpilih->nama_merek : 'Merek tersebut';
            $pesan = "Maaf, tidak ada mobil tersedia untuk merek '{$namaMerek}' / Stok mobil habis.";
        }

        // Jika tidak ada filter merek dan tidak ada data katalog
        if (!$request->has('merek_id') && $katalogs->isEmpty()) {
            $pesan = "Belum ada mobil yang tersedia saat ini.";
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
