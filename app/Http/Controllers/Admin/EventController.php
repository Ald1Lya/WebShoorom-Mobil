<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    // Tampilkan daftar event
    public function index()
    {
        $events = Event::latest()->get();
        return view('admin.konten.event', compact('events'));
    }

    // Simpan event baru
public function store(Request $request)
{
    $request->validate([
        'title'       => 'required|string|max:255',
        'description' => 'nullable|string',
        'event_date'  => 'required|date',
        'event_time'  => 'required',
        'location'    => 'nullable|string|max:255',
        'image'       => 'nullable|image|max:20048',
    ]);

    // Hapus semua event lama
    Event::truncate();

    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('event_images', 'public');
    }

    Event::create([
        'title'       => $request->title,
        'description' => $request->description,
        'event_date'  => $request->event_date,
        'event_time'  => $request->event_time,
        'location'    => $request->location,
        'image_url'   => $imagePath,
    ]);

    return redirect()->route('admin.index')->with('active_tab','event')->with('success', 'Event berhasil ditambahkan.');
}


    // Update event
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'event_date'  => 'required|date',
            'event_time'  => 'required',
            'location'    => 'nullable|string|max:255',
            'image'       => 'nullable|image|max:20048',
        ]);

        $imagePath = $event->image_url;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('event_images', 'public');
        }

        $event->update([
            'title'       => $request->title,
            'description' => $request->description,
            'event_date'  => $request->event_date,
            'event_time'  => $request->event_time,
            'location'    => $request->location,
            'image_url'   => $imagePath,
        ]);

        return redirect()->route('admin.index')->with('active_tab','event')->with('successEvent', 'Event berhasil diperbarui.');
    }

    // Hapus event
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('admin.index')->with('active_tab','event')->with('successEvent', 'Event berhasil dihapus.');
    }
}
