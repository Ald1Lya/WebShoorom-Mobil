<?
namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Katalog extends Component
{
    // Properti untuk menyimpan data katalog
    public $katalogs;
    public $mereks;
    public $makelars;
    /**
     * Create a new component instance.
     */
    public function __construct($katalogs = null, $mereks = null, $makelars = null)
    {
        // Inisialisasi properti dengan data yang diterima
        $this->katalogs = $katalogs;
        $this->mereks = $mereks;
        $this->makelars = $makelars;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.katalog', [
            'katalogs' => $this->katalogs,  // Pastikan mengirimkan data ke view
            'mereks' => $this->mereks,      // Pastikan mengirimkan data ke 
            'makelars' => $this->makelars,  // Pastikan mengirimkan data ke view
        ]);
    }
}
