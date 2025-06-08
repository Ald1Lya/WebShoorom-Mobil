<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->get();
        return view('admin.konten.berita', compact('beritas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'video_url' => 'nullable|url',
            'title' => 'required|string|max:255',
            'text1' => 'nullable|string',
            'text2' => 'nullable|string',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:20048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:20048',
            'highlights' => 'nullable|string',
        ]);

        // Delete oldest news if already 5
        if (Berita::count() >= 5) {
            $oldest = Berita::oldest()->first();
            $this->deleteOldFiles($oldest);
            $oldest->delete();
        }

        // Process highlights
        $highlights = null;
        if ($request->highlights) {
            $highlightsArray = array_map('trim', explode(',', $request->highlights));
            $highlights = json_encode(array_filter($highlightsArray));
        }

        // Store images
        $image1Path = $request->hasFile('image1') 
            ? $request->file('image1')->store('berita_images', 'public') 
            : null;
            
        $image2Path = $request->hasFile('image2') 
            ? $request->file('image2')->store('berita_images', 'public') 
            : null;

        Berita::create([
            'video_url' => $request->video_url,
            'title' => $request->title,
            'image1' => $image1Path,
            'text1' => $request->text1,
            'image2' => $image2Path,
            'text2' => $request->text2,
            'highlights' => $highlights,
        ]);

        return redirect()->route('admin.index')
               ->with('success', 'Berita berhasil ditambahkan.')
               ->with('active_tab', 'berita');
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.konten.berita_edit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'video_url' => 'nullable|url',
            'title' => 'required|string|max:255',
            'text1' => 'nullable|string',
            'text2' => 'nullable|string',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:20048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:20048',
            'highlights' => 'nullable|string',
        ]);

        $berita = Berita::findOrFail($id);

        // Process highlights
        $highlights = null;
        if ($request->highlights) {
            $highlightsArray = array_map('trim', explode(',', $request->highlights));
            $highlights = json_encode(array_filter($highlightsArray));
        }

        // Update images if new ones are provided
        $image1Path = $berita->image1;
        if ($request->hasFile('image1')) {
            // Delete old image
            if ($berita->image1 && Storage::disk('public')->exists($berita->image1)) {
                Storage::disk('public')->delete($berita->image1);
            }
            $image1Path = $request->file('image1')->store('berita_images', 'public');
        }

        $image2Path = $berita->image2;
        if ($request->hasFile('image2')) {
            // Delete old image
            if ($berita->image2 && Storage::disk('public')->exists($berita->image2)) {
                Storage::disk('public')->delete($berita->image2);
            }
            $image2Path = $request->file('image2')->store('berita_images', 'public');
        }

        $berita->update([
            'video_url' => $request->video_url,
            'title' => $request->title,
            'image1' => $image1Path,
            'text1' => $request->text1,
            'image2' => $image2Path,
            'text2' => $request->text2,
            'highlights' => $highlights,
        ]);

        return redirect()->route('admin.index')
               ->with('success', 'Berita berhasil diperbarui.')
               ->with('active_tab', 'berita');
    }

    protected function deleteOldFiles($berita)
    {
        if ($berita->image1 && Storage::disk('public')->exists($berita->image1)) {
            Storage::disk('public')->delete($berita->image1);
        }
        if ($berita->image2 && Storage::disk('public')->exists($berita->image2)) {
            Storage::disk('public')->delete($berita->image2);
        }
    }
}