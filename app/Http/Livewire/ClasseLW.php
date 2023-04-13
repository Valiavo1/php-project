<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Classe;

class ClasseLW extends Component
{
    public string $search = '';
    public $niveau = '';

    protected $queryString = [
        'search' => ['except' => '']
    ];

    public function render()
    {
        $classes = Classe::where('design', 'LIKE', "%{$this->search}%")
                        ->where('niveau', 'LIKE', "%{$this->niveau}%")
                        ->get();
        return view('livewire.classe-l-w', [
            'classes' => $classes
        ]);
    }

    public function deleteClasse($id)
    {
        Classe::destroy($id);
    }
}
