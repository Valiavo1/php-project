<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmploiDuTemps;
use App\Models\Professeur;
use App\Models\Salle;
use App\Models\Classe;

class EmploiDuTempsController extends Controller
{
    public function index()
    {
        return view('menu.edt');
    }

    public function addEdt(Request $request)
    {
        $salle = Salle::where('design', $request->salle)->first()->id;
        $prof = Professeur::where('id_prof', $request->prof)->first()->id;
        $classe = Classe::where('id_classe', $request->classe)->first()->id;
        $end = date('H:i:s',strtotime('+1 hour +30 minutes',strtotime($request->time)));
        EmploiDuTemps::create([
            'id_salle' => $salle,
            'id_prof' => $prof,
            'id_classe' => $classe,
            'cours' => $request->cours,
            'date' => $request->date,
            'start' => $request->time,
            'end' => $end
        ]);

        return redirect()->back();
    }

    public function editEdt(Request $request)
    {
        $edt = EmploiDuTemps::find($request->id);
        $salle = Salle::where('design', $request->salle)->first()->id;
        $prof = Professeur::where('id_prof', $request->prof)->first()->id;
        $classe = Classe::where('id_classe', $request->classe)->first()->id;
        $end = date('H:i:s',strtotime('+1 hour +30 minutes',strtotime($request->time)));
        $edt->update([
            'id_salle' => $salle,
            'id_prof' => $prof,
            'id_classe' => $classe,
            'cours' => $request->cours,
            'date' => $request->date,
            'start' => $request->time,
            'end' => $end
        ]);

        return redirect()->back();
    }
}
