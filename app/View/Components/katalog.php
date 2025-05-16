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

    /**
     * Create a new component instance.
     */
    public function __construct($katalogs = null, $mereks = null)
    {
        // Inisialisasi properti dengan data yang diterima
        $this->katalogs = $katalogs;
        $this->mereks = $mereks;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.katalog', [
            'katalogs' => $this->katalogs,  // Pastikan mengirimkan data ke view
            'mereks' => $this->mereks,      // Pastikan mengirimkan data ke view
        ]);
    }
}
