<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salle;

class SalleController extends Controller
{
    public function index()
    {
        return view('menu.salle');
    }

    public function addSalle(Request $request)
    {
        Salle::create([
            'design' => $request->design,
            'occupation' => 'libre',
        ]);

        return redirect()->back();
    }

    public function editSalle(Request $request)
    {
        $data = Salle::find($request->id);
        $data->update([
            'design' => $request->design,
        ]);

        return redirect()->back();
    }
}
