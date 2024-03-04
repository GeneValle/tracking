<?php

namespace App\Http\Controllers;

use App\Models\Contactos;
use Illuminate\Http\Request;
use App\Models\Descartados;
use Illuminate\Support\Facades\DB;

class AdminDescartadosController extends Controller
{
    public function adminDescartados(Request $request)
    {
        $colaboradoresId = $request->input('colaboradores');
        $rangoFechas = $request->input('rangoFechas');
        $fechaInicio = $request->input('fechaInicial');
        $fechaFin = $request->input('fechaFinal');

        $usuarios = DB::table('users')
            ->where('puesto', 'asesor')
            ->orWhere('puesto', 'lider de equipo')
            ->get();

        $ordenPuestos = [
            'lider de equipo' => 1,
            'asesor' => 2
        ];

        $descartados = [];

        if ($colaboradoresId || $fechaInicio || $fechaFin) {
            $descartados = DB::table('descartados')
                ->join('contactos', 'descartados.contactos_id', '=', 'contactos.id')
                ->join('users', 'descartados.users_id', '=', 'users.id')
                ->when($colaboradoresId, function ($query) use ($colaboradoresId) {
                    return $query->where('descartados.users_id', $colaboradoresId);
                })
                ->when($rangoFechas == 'personalizada', function ($query) use ($fechaInicio) {
                    return $query->whereDate('descartados.fecha', '>=', $fechaInicio);
                })
                ->when($rangoFechas == 'personalizada', function ($query) use ($fechaFin) {
                    return $query->whereDate('descartados.fecha', '<=', $fechaFin);
                })
                ->select(
                    'descartados.id',
                    'descartados.fecha',
                    'contactos.funeraria',
                    'contactos.nombre',
                    'descartados.causa',
                    'users.name AS nombreAsesor'
                )
                ->get();
        } else {
            $descartados = DB::table('descartados')
                ->join('contactos', 'descartados.contactos_id', '=', 'contactos.id')
                ->join('users', 'descartados.users_id', '=', 'users.id')
                ->select(
                    'descartados.id',
                    'descartados.fecha',
                    'contactos.funeraria',
                    'contactos.nombre',
                    'descartados.causa',
                    'users.name AS nombreAsesor'
                )
                ->get();
        }


        return view('adminDescartados', compact('usuarios', 'ordenPuestos', 'descartados'));
    }

    public function formActivarDescartados(Contactos $descartado)
    {
        return view('adminDescartados', compact('descartado'));
    }

    public function activarDescartados(Request $request, Contactos $descartado)
    {

        $descartado->users_id = $request->input('asesores');
        $descartado->tipo = $request->input('selectActivar');
        $descartado->save();
        /* $descartado->tipo = 'Prospecto';
        $cliente->save(); */

        return redirect()->route('adminDescartados');
    }
}
