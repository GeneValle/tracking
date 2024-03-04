<?php

namespace App\Http\Controllers;

use App\Models\Contactos;
use App\Models\Detallecontactos;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AutContactosController extends Controller
{
    public function updateAutContactos($contactoPorAutorizar)
    {
        // Encuentra el contacto por su ID y actualiza el estado a 'activo'
        $contacto = Detallecontactos::findOrFail($contactoPorAutorizar);
        $contacto->estado = 'activo';
        $contacto->save();

        // Puedes enviar una respuesta JSON si es necesario
        return response()->json(['message' => 'Contacto autorizado con éxito']);
    }

    public function autContactos(Request $request)
    {
        $colaboradorId = $request->input('colaboradores');

        $usuarios = DB::table('users')
            ->where('puesto', 'asesor')
            ->orWhere('puesto', 'lider de equipo')
            ->get();

        $ordenPuestos = [
            'asesor' => 1,
            'lider de equipo' => 2,
        ];

        // $contacto = Contactos::all();

        $contactosPorAutorizar = [];

        if ($colaboradorId) {
            $contactosPorAutorizar = DB::table('detallecontactos')
                ->join('contactos as c', 'detallecontactos.id', 'c.id')
                ->join('users as u', 'detallecontactos.users_id', 'u.id')
                ->leftJoin('colonias', 'c.colonias_id', '=', 'colonias.id')
                ->leftJoin('detallecitas', 'detallecontactos.id', '=', 'detallecitas.detallecontactos_id')
                ->where('detallecontactos.estado', 'por autorizar')
                ->where('detallecontactos.users_id', $colaboradorId)
                ->select(
                    'c.id',
                    'c.funeraria',
                    'c.nombre as nombreContacto',
                    'c.calle',
                    'c.noExterior',
                    'c.noInterior',
                    'colonias.colonia',
                    'c.localidad',
                    'c.municipio',
                    'c.estado',
                    'c.pais',
                    'c.codPostal',
                    'u.name',
                    DB::raw('MAX(detallecitas.fecha) as fecha_cita'), // o GROUP_CONCAT para obtener todas las fechas
                    DB::raw('MAX(detallecitas.observaciones) as observaciones_cita') // o GROUP_CONCAT para obtener todas las observaciones
                )
                ->groupBy(
                    'c.id',
                    'c.funeraria',
                    'nombreContacto',
                    'c.calle',
                    'c.noExterior',
                    'c.noInterior',
                    'colonias.colonia',
                    'c.localidad',
                    'c.municipio',
                    'c.estado',
                    'c.pais',
                    'c.codPostal',
                    'u.name',
                )
                ->get();
        } else {
            $contactosPorAutorizar = null;
        }

        // dd($contactosPorAutorizar);

        $sinRegistros = empty($contactosPorAutorizar);

        return view('autContactos', compact('usuarios', 'ordenPuestos', 'contactosPorAutorizar', 'sinRegistros'));
    }

    public function destroyAutContactos($contactoPorAutorizar)
    {
        $contactoPorAutorizar = Contactos::find($contactoPorAutorizar);

        if ($contactoPorAutorizar) {
            $contactoPorAutorizar->delete();
            return redirect()->route('autContactos');
        } else {
            return redirect()->route('autContactos')->with('error', 'Contacto no encontrado');
        }
    }
}
