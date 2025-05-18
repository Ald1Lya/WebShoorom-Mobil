<?php

namespace App\View\Components;

use App\Models\Beranda;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Footer extends Component
{
    public $email,$nomor,$alamat;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $beranda = Beranda::first();
        
        $this->email = $beranda->email ?? null;
        $this->nomor = $beranda->nomor ?? null;
        $this->alamat = $beranda->alamat ?? null;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.footer');
    }
}
