<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classe;

class ClasseController extends Controller
{
    public function index()
    {
        return view('menu.classe');
    }

    public function addClasse(Request $request)
    {
        $data = Classe::count();
        if($data > 0) {
            $last_id = Classe::orderBy('id', 'desc')->first()->id_classe;
            if ($last_id) {
                $intVal = (int) substr($last_id, 1);
                $id_classe = "C" . str_pad($intVal + 1, 3, "0", STR_PAD_LEFT);
            } 
        } else {
            $id_classe = 'C001';
        }
        
        Classe::create([
            'id_classe' => $id_classe,
            'niveau' => $request->niveau,
            'design' => $request->design,
        ]);

        return redirect()->back();
    }

    public function editClasse(Request $request)
    {
        $data = Classe::find($request->id);
        $data->update([
            'niveau' => $request->niveau,
            'design' => $request->design,
        ]);

        return redirect()->back();
    }
}
