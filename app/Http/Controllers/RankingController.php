<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RankingController extends Controller
{
    public function ranking()
    {
        $usuarios = DB::table('users')
            ->select('users.name', DB::raw('count(ventas.id) as numeroVentas'))
            ->leftJoin('ventas', 'users.id', '=', 'ventas.users_id')
            ->where('puesto', 'asesor')
            ->groupBy('users.name')
            ->orderBy('numeroVentas', 'desc')
            ->get();

        return view('ranking', compact('usuarios'));
    }
}
