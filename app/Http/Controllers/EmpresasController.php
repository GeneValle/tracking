<?php

namespace App\Http\Controllers;

use App\Models\Colonias;
use Illuminate\Http\Request;
use App\Models\Empresas;

class EmpresasController extends Controller
{
    public function empresas()
    {
        $empresas = Empresas::all();
        $colonias = Colonias::all();

        return view('empresas', compact('empresas', 'colonias'));
    }

    public function storeEmpresas(Request $request)
    {
        $empresa = new Empresas();

        $empresa->nombreEmpresa = $request->nombre;
        $empresa->giro = $request->giro;
        $empresa->sitioWeb = $request->web;
        $empresa->calle = $request->calle;
        $empresa->noExterior = $request->noExt;
        $empresa->noInterior = $request->noInt;
        $empresa->colonias_id = $request->colonia;
        $empresa->ciudad = $request->ciudad;
        $empresa->municipio = $request->municipio;
        $empresa->estado = $request->estado;
        $empresa->codPostal = $request->codPostal;
        $empresa->pais = $request->pais;
        $empresa->observaciones = $request->observaciones;

        $empresa->save();

        return redirect()->route('empresas');
    }

    public function editEmpresas(Empresas $empresa)
    {
        return view('empresas', compact('empresa'));
    }

    public function updateEmpresas(Request $request, Empresas $empresa)
    {
        $empresa->nombreEmpresa = $request->nombre;
        $empresa->giro = $request->giro;
        $empresa->sitioWeb = $request->web;
        $empresa->calle = $request->calle;
        $empresa->noExterior = $request->noExt;
        $empresa->noInterior = $request->noInt;
        $empresa->colonias_id = $request->colonia;
        $empresa->ciudad = $request->ciudad;
        $empresa->municipio = $request->municipio;
        $empresa->estado = $request->estado;
        $empresa->codPostal = $request->codPostal;
        $empresa->pais = $request->pais;
        $empresa->observaciones = $request->observaciones;

        $empresa->save();

        return redirect()->route('empresas');
    }

    public function destroyEmpresas(Empresas $empresa)
    {
        $empresa->delete();

        return redirect()->route('colonias');
    }
}
