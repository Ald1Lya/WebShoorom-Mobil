<?php

namespace App\Http\Controllers;

use App\Models\Beranda;
use App\Models\Event;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $beranda = Beranda::first(); 

        $events = Event::latest()->first(); 
        $google_maps = $beranda->google_maps ?? '';
        $embedUrl = $this->convertGoogleMapsToEmbed($google_maps);

        return view('beranda', [
            'judul1' => $beranda->judul1 ?? null,
            'deskripsi1' => $beranda->deskripsi1 ?? null,
            'gambar1' => $beranda->gambar1 ?? null,
            'judul2' => $beranda->judul2 ?? null,
            'deskripsi2' => $beranda->deskripsi2 ?? null,
            'gambar2' => $beranda->gambar2 ?? null,
            'alamat' => $beranda->alamat ?? null,
            'email' => $beranda->email ?? null,
            'google_maps' => $google_maps,
            'embedUrl' => $embedUrl,
            'nomor' => $beranda->nomor ?? null,
            'judulsec3' => $beranda->judulsec3 ?? null,
            'gambarsec3' => $beranda->gambarsec3 ?? null,
            'gambarsec4' => $beranda->gambarsec4 ?? null,
            'gambarsec5' => $beranda->gambarsec5 ?? null,
            'gambarsec6' => $beranda->gambarsec6 ?? null,
            'events' => $events,  
        ]);
    }

    function convertGoogleMapsToEmbed($mapUrl) {
    if (empty($mapUrl)) {
        return '';
    }

    if (strpos($mapUrl, 'embed') !== false) {
        return $mapUrl; // sudah embed, biarkan
    }

    if (preg_match('/@(-?\d+\.\d+),(-?\d+\.\d+)/', $mapUrl, $matches)) {
        $lat = $matches[1];
        $lng = $matches[2];
        return "https://maps.google.com/maps?q={$lat},{$lng}&hl=id&z=18&output=embed";
    }

    if (preg_match('/\/place\/([^\/]+)/', $mapUrl, $matches)) {
        $place = $matches[1];
        return "https://www.google.com/maps?q={$place}&hl=id&output=embed";
    }

    return '';
}

}
