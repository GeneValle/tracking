<?php

namespace App\Http\Controllers;

use App\Models\Preferencias;
use Illuminate\Http\Request;

class PreferenciasController extends Controller
{
    public function preferencias()
    {
        $preferencias = Preferencias::all();

        return view('preferencias', compact('preferencias'));
    }

    public function storePreferencias(Request $request)
    {
        $preferencia = new Preferencias();

        $preferencia->nombre = $request->nombre;
        $preferencia->valores = $request->valores;

        $preferencia->save();

        return redirect()->route('preferencias');
    }

    public function editPreferencias(Preferencias $preferencia)
    {
        return view('preferencias', compact('preferencia'));
    }

    public function updatePreferencias(Preferencias $preferencia, Request $request)
    {
        $preferencia->nombre = $request->nombre;
        $preferencia->valores = $request->valores;

        $preferencia->save();

        return redirect()->route('preferencias');
    }

    public function destroyPreferencias(Preferencias $preferencia)
    {
        $preferencia->delete();

        return redirect()->route('preferencias');
    }
}
