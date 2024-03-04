<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Descartados;
use Illuminate\Support\Facades\DB;

class ReporteDescartadosController extends Controller
{
    public function reporteDescartados(Request $request)
    {
        $rangoFechas = $request->input('rangoFechas');
        $fechaInicio = $request->input('fechaInicial');
        $fechaFin = $request->input('fechaFinal');

        $descartados = DB::table('descartados')
            ->distinct('causa')
            ->select('causa', DB::raw('count(*) as totalDescartadosCausa'))
            ->groupBy('causa')
            ->get();

        $totalDescartados = $descartados->pluck('totalDescartadosCausa')->toArray();
        $causas = $descartados->pluck('causa')->toArray();

        $descartadosPorFecha = DB::table('descartados')
            ->distinct('causa')
            ->select('causa', DB::raw('count(*) as totalDescartadosCausaPorFecha'))
            ->when($fechaInicio, function ($query) use ($fechaInicio) {
                return $query->whereDate('fecha', '>=', $fechaInicio);
            })
            ->when($fechaFin, function ($query) use ($fechaFin) {
                return $query->whereDate('fecha', '<=', $fechaFin);
            })
            ->groupBy('causa')
            ->get();

        $totalDescartadosPorFecha = $descartadosPorFecha->pluck('totalDescartadosCausaPorFecha')->toArray();

        return view('reporteDescartados', compact(
            'rangoFechas',
            'descartados',
            'causas',
            'totalDescartados',
            'descartadosPorFecha',
            'totalDescartadosPorFecha'
        ));
    }
}
