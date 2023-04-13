<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Professeur;

class ProfesseurLW extends Component
{
    public string $search = '';

    protected $queryString = [
        'search' => ['except' => '']
    ];

    public function render()
    {
        $profs = Professeur::where('prenoms', 'LIKE', "%{$this->search}%")
                        ->orWhere('nom', 'LIKE', "%{$this->search}%")
                        ->orWhere('id_prof', 'LIKE', "%{$this->search}%")
                        ->get();
        return view('livewire.professeur-l-w', [
            'profs' => $profs
        ]);
    }

    public function deleteProf($id)
    {
        Professeur::destroy($id);
    }
}
