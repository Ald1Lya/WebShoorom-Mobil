<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Beranda extends Component
{
    public $judul1, $deskripsi1, $gambar1, $judul2, $deskripsi2, $gambar2,
           $alamat, $email, $nomor, $google_maps,
           $judulsec3, $gambarsec3, $gambarsec4, $gambarsec5, $gambarsec6;

    /**
     * Create a new component instance.
     */
    public function __construct(
        $judul1 = null, $deskripsi1 = null, $gambar1 = null,
        $judul2 = null, $deskripsi2 = null, $gambar2 = null,
        $alamat = null, $email = null, $nomor = null, $google_maps = null,
        $judulsec3 = null, $gambarsec3 = null, $gambarsec4 = null, $gambarsec5 = null, $gambarsec6 = null
    ) {
        $this->judul1 = $judul1;
        $this->deskripsi1 = $deskripsi1;
        $this->gambar1 = $gambar1;
        $this->judul2 = $judul2;
        $this->deskripsi2 = $deskripsi2;
        $this->gambar2 = $gambar2;
        $this->alamat = $alamat;
        $this->email = $email;
        $this->nomor = $nomor;
        $this->google_maps = $google_maps;
        $this->judulsec3 = $judulsec3;
        $this->gambarsec3 = $gambarsec3;
        $this->gambarsec4 = $gambarsec4;
        $this->gambarsec5 = $gambarsec5;
        $this->gambarsec6 = $gambarsec6;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.beranda');
    }
}
