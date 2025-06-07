<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Makelar;
use Illuminate\Http\Request;

class MakelarController extends Controller
{
public function index()
{
    $makelars = Makelar::paginate(5);
    return view('admin.konten.makelar', compact('makelars'));
}


    public function store(Request $request)
    {
        $request->validate([
            'nama'  => 'required|string|max:100',
            'no_wa' => 'required|string|max:20',
        ]);

        Makelar::create([
            'nama'  => $request->nama,
            'no_wa' => $request->no_wa,
        ]);

        return redirect()->route('admin.index')->with('active_tab','makelar')->with('successkatalog', 'Makelar berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'  => 'required|string|max:100',
            'no_wa' => 'required|string|max:20',
        ]);

        $makelar = Makelar::findOrFail($id);
        $makelar->update([
            'nama'  => $request->nama,
            'no_wa' => $request->no_wa,
        ]);

        return redirect()->route('admin.index')->with('active_tab','makelar')->with('success', 'Makelar berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $makelar = Makelar::findOrFail($id);
        $makelar->delete();

        return  redirect()->route('admin.index')->with('active_tab','makelar')->with('success', 'Makelar berhasil dihapus.');
    }
}
