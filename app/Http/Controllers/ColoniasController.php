<?php

namespace App\Http\Controllers;

use App\Models\Colonias;
use Illuminate\Http\Request;

class ColoniasController extends Controller
{
    public function colonias()
    {
        $colonias = Colonias::all();

        return view('colonias', compact('colonias'));
    }

    public function storeColonias(Request $request)
    {
        $colonia = new Colonias();

        $colonia->colonia = $request->colonia;
        $colonia->codPostal = $request->codPostal;

        $colonia->save();

        return redirect()->route('colonias');
    }

    public function editColonias(Colonias $colonia)
    {
        return view('colonias', compact('colonia'));
    }

    public function updateColonias(Request $request, Colonias $colonia)
    {
        $colonia->colonia = $request->colonia;
        $colonia->codPostal = $request->codPostal;

        $colonia->save();

        return redirect()->route('colonias');
    }

    public function destroyColonias(Colonias $colonia)
    {
        $colonia->delete();

        return redirect()->route('colonias');
    }
}
