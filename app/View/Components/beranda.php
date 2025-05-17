<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Beranda extends Component
{
    // Hapus $berandas dan ganti dengan parameter yang sesuai
    public $judul1, $deskripsi1, $gambar1, $judul2, $deskripsi2, $gambar2,$alamat,$email,$nomor,$judulsec3,$gambarsec3,$gambarsec4,$gambarsec5,$gambarsec6;

    /**
     * Create a new component instance.
     */
    public function __construct($judul1, $deskripsi1, $gambar1, $judul2, $deskripsi2, $gambar2, $alamat, $email, $nomor,$judulsec3,$gambarsec3,$gambarsec4,$gambarsec5,$gambarsec6)
    {
        // Inisialisasi properti dengan data yang diterima
        $this->judul1 = $judul1;
        $this->deskripsi1 = $deskripsi1;
        $this->gambar1 = $gambar1;
        $this->judul2 = $judul2;
        $this->deskripsi2 = $deskripsi2;
        $this->gambar2 = $gambar2;
        $this->alamat = $alamat;
        $this->email = $email;
        $this->nomor = $nomor;
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
        return view('components.beranda');  // Pastikan view yang digunakan benar
    }
}
