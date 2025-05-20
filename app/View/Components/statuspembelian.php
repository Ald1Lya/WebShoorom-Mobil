<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Statuspembelian extends Component
{
    public $pembelians;

    public function __construct($pembelians = null)
    {
        // Jika tidak dikirim, set default koleksi kosong supaya tidak error
        $this->pembelians = $pembelians ?? collect();
    }

    public function render()
    {
        return view('components.statuspembelian');
    }
}
