<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function dashboard()
    {

        if (Auth::check()) {
            $usuarioAutenticado = Auth::user();

            $numeroVentasUserAuth = DB::table('users')
                ->leftJoin('ventas', 'ventas.users_id', '=', 'users.id')
                ->where('users.id', $usuarioAutenticado->id)
                ->where(DB::raw('MONTH(ventas.fecha)'), '=', date('m'))
                ->groupBy('users.id', 'users.name')
                ->count();
        }

        $asesores = DB::table('users')
            ->where('puesto', 'asesor')
            ->get();

        $numeroProspectos = DB::table('users')
            ->join('contactos', 'contactos.users_id', '=', 'users.id')
            ->where('users.puesto', 'asesor')
            ->select('users.name as nombreAsesor', DB::raw('count(contactos.id) as numeroProspectos'))
            ->groupBy('users.id', 'users.name')
            ->get();

        $numeroCitas = DB::table('users')
            ->join('detallecitas', 'detallecitas.users_id', '=', 'users.id')
            ->where('users.puesto', 'asesor')
            ->select('users.name as nombreAsesor', DB::raw('count(detallecitas.id) as numeroCitas'))
            ->groupBy('users.id', 'users.name')
            ->get();

        $numeroVentas = DB::table('users')
            ->leftJoin('ventas', 'ventas.users_id', '=', 'users.id')
            ->where('users.puesto', 'asesor')
            ->select('users.name as nombreAsesor', DB::raw('count(ventas.id) as numeroVentas'))
            ->groupBy('users.id', 'users.name')
            ->get();

        return view('dashboard', compact(
            'numeroVentasUserAuth',
            'asesores',
            'numeroProspectos',
            'numeroCitas',
            'numeroVentas'
        ));
    }
}
