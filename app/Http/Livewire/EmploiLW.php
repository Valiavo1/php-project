<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\EmploiDuTemps;
use App\Models\Classe;
use App\Models\Professeur;

class EmploiLW extends Component
{
    public string $search = '';
    public $niveau = '';
    public $classe;
    public $date;
    public $profPanel;
    public $niveauPanel = 'L1';
    public $classePanel;

    public function render()
    {
        $classes = Classe::where('niveau', 'LIKE', "%{$this->niveau}%")->get();
        if ($this->date) {
            $edts = EmploiDuTemps::with('professeur', 'salle')
                            ->join('classes', 'classes.id', '=', 'emploi_du_temps.id_classe')
                            ->join('professeurs', 'professeurs.id', '=', 'emploi_du_temps.id_prof')
                            ->select('emploi_du_temps.*', 'classes.*', 'professeurs.*', 'emploi_du_temps.id') 
                            ->where('classes.design', 'LIKE', "%{$this->classe}%")
                            ->where('classes.niveau', 'LIKE', "%{$this->niveau}%")
                            ->where(function($query) {
                                $query->where('professeurs.nom', 'LIKE', "%{$this->search}%")
                                ->orWhere('professeurs.prenoms', 'LIKE', "%{$this->search}%");
                            })
                            ->where('emploi_du_temps.date', '=', $this->date)
                            ->get();
        } else {
            $edts = EmploiDuTemps::with('professeur', 'salle')
                            ->join('classes', 'classes.id', '=', 'emploi_du_temps.id_classe')
                            ->join('professeurs', 'professeurs.id', '=', 'emploi_du_temps.id_prof')
                            ->select('emploi_du_temps.*', 'classes.*', 'professeurs.*', 'emploi_du_temps.id') 
                            ->where('classes.design', 'LIKE', "%{$this->classe}%")
                            ->where('classes.niveau', 'LIKE', "%{$this->niveau}%")
                            ->where(function($query) {
                                $query->where('professeurs.nom', 'LIKE', "%{$this->search}%")
                                ->orWhere('professeurs.prenoms', 'LIKE', "%{$this->search}%");
                            })
                            ->get();
        }

        if ($this->profPanel) {
            $profs = Professeur::where('prenoms', 'LIKE', "%{$this->profPanel}%")
                            ->orWhere('nom', 'LIKE', "%{$this->profPanel}%")
                            ->get();
        } else {
            $profs = null;
        }

        if ($this->classePanel) {
            $niveau = Classe::where('niveau', '=', $this->niveauPanel)
                            ->where('design', 'LIKE', "%{$this->classePanel}%")
                            ->get();
        } else {
            $niveau = null;
        }

        return view('livewire.emploi-l-w', [
            'edts' => $edts,
            'classes' => $classes,
            'profs' => $profs,
            'niveauP' => $niveau
        ]);
    }

    public function deleteEdt($id)
    {
        EmploiDuTemps::destroy($id);
    }

    public function setProfPanel($id)
    {
        $this->profPanel = $id;
    }

    public function setClassePanel($id)
    {
        $this->classePanel = $id;
    }
}
