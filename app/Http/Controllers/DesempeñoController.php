<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DesempeñoController extends Controller
{
    public function desempeño()
    {
        $usuarios = DB::table('users')
            ->where('puesto', 'asesor')
            ->get();

        return view('desempeño', compact('usuarios'));
    }
}
