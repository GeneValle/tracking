<?php

namespace App\Http\Controllers;

use App\Models\Detallecitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AutCitasController extends Controller
{
    public function updateAutCitas($citaPorAutorizar)
    {
        // Encuentra el contacto por su ID y actualiza el estado a 'activo'
        $cita = Detallecitas::findOrFail($citaPorAutorizar);
        $cita->estado = 'activo';
        $cita->save();

        // Puedes enviar una respuesta JSON si es necesario
        return response()->json(['message' => 'Contacto autorizado con éxito']);
    }

    public function autCitas(Request $request)
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

        $citasPorAutorizar = [];

        if ($colaboradorId) {
            $citasPorAutorizar = DB::table('detallecitas')
                ->join('citas', 'detallecitas.id', 'citas.id')
                ->join('users', 'detallecitas.users_id', 'users.id')
                ->join('contactos', 'detallecitas.contactos_id', 'contactos.id')
                ->where('detallecitas.estado', 'Por autorizar')
                ->where('detallecitas.users_id', $colaboradorId)
                ->select(
                    'contactos.funeraria',
                    'contactos.nombre',
                    'detallecitas.id',
                    'detallecitas.fecha',
                    'detallecitas.horaInicio',
                    'detallecitas.horaFin',
                    'detallecitas.estado',
                    'detallecitas.observaciones'
                )
                ->get();
        } else {
            $citasPorAutorizar = null;
        }

        // dd($citasPorAutorizar);

        $sinRegistros = empty($citasPorAutorizar);

        return view('autCitas', compact('usuarios', 'ordenPuestos', 'citasPorAutorizar', 'sinRegistros'));
    }

    public function destroyAutCitas($citaPorAutorizar)
    {
        try {
            $detalleCita = Detallecitas::findOrFail($citaPorAutorizar);
            $cita = $detalleCita->cita;

            if ($cita) {
                $detalleCita->delete();
                $cita->delete();
                Log::info('Cita eliminada con éxito.');
            } else {
                Log::error('Cita no encontrada.');
            }
            return redirect()->route('autCitas');
        } catch (\Exception $e) {
            Log::error('Error al eliminar la cita: ' . $e->getMessage());
            return back()->withError('Error al eliminar la cita.');
        }
    }
}
