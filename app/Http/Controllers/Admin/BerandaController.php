<?php
namespace App\Http\Controllers\Admin;

use App\Models\Beranda;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BerandaController extends Controller
{
    public function index()
    {
        $berandas = Beranda::all();
        return view('admin.konten.beranda', compact('berandas')); // Pastikan menuju satu tampilan
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'section' => 'required|string',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $beranda = new Beranda($validated);
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('images', 'public');
            $beranda->gambar = $gambar;
        }
        $beranda->save();

        return redirect()->route('admin.konten.beranda.index')->with('success', 'Konten berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $beranda = Beranda::findOrFail($id);
        $validated = $request->validate([
            'section' => 'required|string',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $beranda->update($validated);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('images', 'public');
            $beranda->gambar = $gambar;
        }

        return redirect()->route('admin.konten.beranda.index')->with('success', 'Konten berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $beranda = Beranda::findOrFail($id);
        $beranda->delete();

        return redirect()->route('admin.konten.beranda.index')->with('success', 'Konten berhasil dihapus.');
    }
}
