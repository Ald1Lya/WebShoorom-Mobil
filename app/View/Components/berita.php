<?php

// app/View/Components/Berita.php
namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Berita extends Component
{
    public $berita;

    public $event;

    public function __construct($berita, $event )
    {
        $this->berita = $berita;
        $this->event = $event;
    }

    public function render(): View|Closure|string
    {
        return view('components.berita', [
            'berita' => $this->berita,
            'event' => $this->event,
        ]);
    }
}
