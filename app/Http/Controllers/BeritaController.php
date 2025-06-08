<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Event;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index(Request $request)
    {

           $berita = Berita::all();
          
           
           // Kirim data berita ke view
           return view('berita', compact('berita'));
    }

}
