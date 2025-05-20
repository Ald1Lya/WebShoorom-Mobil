<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Beranda;
use App\Models\Katalog;
use App\Models\Merek;
use App\Models\Pembelian;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $berandas = Beranda::all();       
        $katalogs = Katalog::with('merek')->get();     
        $mereks = Merek::all(); // ← ini WAJIB agar tidak error
        $pembelians=Pembelian::with('katalog')->latest()->get();

        return view('admin.index', compact('berandas','katalogs','mereks','pembelians'));
    }
}
