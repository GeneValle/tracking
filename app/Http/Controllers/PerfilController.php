<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerfilController extends Controller
{
    /* public function perfil()
    {
        $usuarios = DB::table('users')
            ->select('*')
            ->where('puesto', 'lider de equipo')
            ->get();

        $jefe = DB::table('users')
            ->select('nombre')
            ->where('puesto', 'director general')
            ->get();

        return view('perfil', compact('usuarios', 'jefe'));
    } */
}
