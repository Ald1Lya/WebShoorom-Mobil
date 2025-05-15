<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Katalog;
use Illuminate\Http\Request;

class KatalogController extends Controller
{
    
    public function index()
    {
    
    $katalogs = Katalog::all();
    return view('katalog', ['katalogs' => $katalogs]);
     }
    }

   
