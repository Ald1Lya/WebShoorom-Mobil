<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Beranda;

class AdminController extends Controller
{
    public function index(Request $request)
    {
         $berandas = Beranda::all();

        return view('admin.index', compact('berandas'));
    }
}
