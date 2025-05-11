<?php
namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Beranda extends Component
{
    public $berandas;

    /**
     * Create a new component instance.
     */
    public function __construct($berandas)
    {
        // Pastikan menggunakan $berandas, bukan $beranda
        $this->berandas = $berandas;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.beranda');  // Pastikan view yang digunakan benar
    }
}
