<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Salle;
use App\Models\EmploiDuTemps;

class SalleLW extends Component
{
    public string $search = '';
    public $free = false;
    public $date;
    public $time;

    protected $queryString = [
        'search' => ['except' => '']
    ];

    public function render()
    {
        if ($this->time) {
            $occupiedSalleIds = EmploiDuTemps::where('date', $this->date)
                                                ->where('start', '<=', $this->time)
                                                ->where('end', '>=', $this->time)
                                                ->pluck('id_salle');
            $salles = Salle::whereNotIn('id', $occupiedSalleIds)->where('design', 'LIKE', "%{$this->search}%")->get();
        } else {
            $salles = Salle::where('design', 'LIKE', "%{$this->search}%")
                        ->get();
        }
        return view('livewire.salle-l-w', [
            'salles' => $salles
        ]);
    }

    public function deleteSalle($id)
    {
        Salle::destroy($id);
    }
}
