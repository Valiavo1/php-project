<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Professeur;

class ProfesseurController extends Controller
{
    public function index()
    {
        return view('menu.prof');
    }

    public function addProf(Request $request)
    {
        $data = Professeur::count();
        if($data > 0) {
            $last_id = Professeur::orderBy('id', 'desc')->first()->id_prof;
            if ($last_id) {
                $intVal = (int) substr($last_id, 1);
                $id_prof = "P" . str_pad($intVal + 1, 3, "0", STR_PAD_LEFT);
            } 
        } else {
            $id_prof = 'P001';
        }
        
        Professeur::create([
            'id_prof' => $id_prof,
            'nom' => $request->name,
            'prenoms' => $request->lastName,
            'grade' => $request->grade
        ]);

        return redirect()->back();
    }

    public function editProf(Request $request)
    {
        $data = Professeur::find($request->id);
        $data->update([
            'nom' => $request->name,
            'prenoms' => $request->lastName,
            'grade' => $request->grade
        ]);

        return redirect()->back();
    }
}
