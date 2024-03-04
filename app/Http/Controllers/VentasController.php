<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class VentasController extends Controller
{
    public function ventas(Request $request)
    {
        $colaboradorId = $request->input('colaboradores');
        $fechaInicio = $request->input('fechaInicio');
        $fechaFin = $request->input('fechaFinal');

        $usuarios = DB::table('users')
            ->where('puesto', 'asesor')
            ->orWhere('puesto', 'lider de equipo')
            ->orderBy('puesto', 'desc')
            ->orderBy('id', 'asc')
            ->get();

        $ventas = [];

        if ($colaboradorId || $fechaInicio || $fechaFin) {
            $ventas = DB::table('ventas')
                ->join('contactos', 'ventas.contactos_id', '=', 'contactos.id')
                ->join('detalleventas', 'detalleventas.ventas_id', '=', 'ventas.id')
                ->leftJoin('productos', 'detalleventas.productos_id', '=', 'productos.id')
                ->when($colaboradorId, function ($query) use ($colaboradorId) {
                    return $query->where('ventas.users_id', $colaboradorId);
                })
                ->when($fechaInicio, function ($query) use ($fechaInicio) {
                    return $query->whereDate('ventas.fecha', '>=', $fechaInicio);
                })
                ->when($fechaFin, function ($query) use ($fechaFin) {
                    return $query->whereDate('ventas.fecha', '<=', $fechaFin);
                })
                ->select(
                    'ventas.id',
                    'ventas.fecha',
                    'contactos.nombre',
                    'ventas.observaciones',
                    'ventas.monto',
                    'detalleventas.productos_id',
                    'productos.producto'
                )
                ->get();
        }

        $sinRegistros = empty($ventas);

        return view('ventas', compact('usuarios', 'ventas', 'sinRegistros'));
    }
}
