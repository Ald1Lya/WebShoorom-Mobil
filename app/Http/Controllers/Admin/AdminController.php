<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Beranda;
use App\Models\Katalog;
use App\Models\Makelar;
use App\Models\Merek;
use App\Models\Berita;
use App\Models\Event;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $berandas = Beranda::all();       

        $katalogs = Katalog::with('merek','makelar')->get(); 

        $mereks = Merek::all(); // ← ini WAJIB agar tidak error

        $makelars = Makelar::all(); // ← ini WAJIB agar tidak error
        $makelars = Makelar::paginate(5);

        // Berita dan Review
        $beritas = Berita::latest()->first();

        $events = Event::all();
       
        return view('admin.index', compact('berandas','katalogs','mereks','makelars','beritas','events'));
    }
}
