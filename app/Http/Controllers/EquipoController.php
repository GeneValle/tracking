<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EquipoController extends Controller
{
    public function equipo()
    {
        $asesores = DB::table('users')
            ->where('puesto', 'asesor')
            ->get();

        $liderEquipo = DB::table('users')
            ->where('puesto', 'lider de equipo')
            ->get();

        $numeroProspectosLider = DB::table('users')
            ->join('contactos', 'contactos.users_id', '=', 'users.id')
            ->where('users.puesto', 'lider de equipo')
            ->select(DB::raw('count(contactos.id) as numeroProspectosL'))
            ->groupBy('users.id', 'users.name')
            ->get();

        $numeroCitasLider = DB::table('users')
            ->join('detallecitas', 'detallecitas.users_id', '=', 'users.id')
            ->where('users.puesto', 'lider de equipo')
            ->select(DB::raw('count(detallecitas.id) as numeroCitasL'))
            ->groupBy('users.id', 'users.name')
            ->get();

        $numeroVentasLider = DB::table('users')
            ->join('ventas', 'ventas.users_id', '=', 'users.id')
            ->where('users.puesto', 'lider de equipo')
            ->select(DB::raw('count(ventas.id) as numeroVentasL'))
            ->groupBy('users.id', 'users.name')
            ->get();

        $numeroProspectosAsesor = DB::table('users')
            ->join('contactos', 'contactos.users_id', '=', 'users.id')
            ->where('users.puesto', 'asesor')
            ->select('users.name as nombreAsesor', DB::raw('count(contactos.id) as numeroProspectosA'))
            ->groupBy('users.id', 'users.name')
            ->get();

        $numeroCitasAsesor = DB::table('users')
            ->join('detallecitas', 'detallecitas.users_id', '=', 'users.id')
            ->where('users.puesto', 'asesor')
            ->select('users.name as nombreAsesor', DB::raw('count(detallecitas.id) as numeroCitasA'))
            ->groupBy('users.id', 'users.name')
            ->get();

        $numeroVentasAsesor = DB::table('users')
            ->leftJoin('ventas', 'ventas.users_id', '=', 'users.id')
            ->where('users.puesto', 'asesor')
            ->select('users.name as nombreAsesor', DB::raw('count(ventas.id) as numeroVentasA'))
            ->groupBy('users.id', 'users.name')
            ->get();

        return view('equipo', compact(
            'asesores',
            'liderEquipo',
            'numeroProspectosLider',
            'numeroCitasLider',
            'numeroVentasLider',
            'numeroProspectosAsesor',
            'numeroCitasAsesor',
            'numeroVentasAsesor'
        ));
    }
}
