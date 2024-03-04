<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReporteCitasController extends Controller
{
    public function reporteCitas(Request $request)
    {
        $colaboradorId = $request->input('colaboradores');

        $asesores = DB::table('users')
            ->where('puesto', 'asesor')
            ->orWhere('puesto', 'lider de equipo')
            ->orderBy('puesto', 'desc')
            ->orderBy('id', 'asc')
            ->get();

        $numeroCitasVencidas = [];

        if ($colaboradorId) {
            $numeroCitasVencidas = DB::table('detallecitas')
                ->join('citas', 'detallecitas.citas_id', '=', 'citas.id')
                ->join('contactos', 'detallecitas.contactos_id', '=', 'contactos.id')
                ->join('users', 'detallecitas.users_id', '=', 'users.id')
                ->where('detallecitas.users_id', $colaboradorId)
                ->whereDate('detallecitas.fecha', '<', now()->toDateString())
                ->count();
        } else {
            $numeroCitasVencidas = null;
        }


        $citasVencidas = [];

        if ($colaboradorId) {
            $citasVencidas = DB::table('detallecitas')
                ->join('citas', 'detallecitas.citas_id', '=', 'citas.id')
                ->join('contactos', 'detallecitas.contactos_id', '=', 'contactos.id')
                ->join('users', 'detallecitas.users_id', '=', 'users.id')
                ->where('detallecitas.users_id', $colaboradorId)
                ->whereDate('detallecitas.fecha', '<', now()->toDateString())
                ->select(
                    'contactos.nombre',
                    'contactos.funeraria',
                    'detallecitas.fecha',
                    'detallecitas.horaInicio',
                    'detallecitas.estado',
                    'detallecitas.observaciones'
                )
                ->get();
        } 
        /* else {
            $citasVencidas = null;
        } */

        // $sinRegistrosCitasVencidas = empty($citasVencidas);
        $citasVencidasCount = count($citasVencidas);

        // dd($citasVencidas);

        $numeroCitasHoy = [];

        if ($colaboradorId) {
            $numeroCitasHoy = DB::table('detallecitas')
                ->join('citas', 'detallecitas.citas_id', '=', 'citas.id')
                ->join('contactos', 'detallecitas.contactos_id', '=', 'contactos.id')
                ->join('users', 'detallecitas.users_id', '=', 'users.id')
                ->where('detallecitas.users_id', $colaboradorId)
                ->whereDate('detallecitas.fecha', now()->toDateString())
                ->count();
        } else {
            $numeroCitasHoy = null;
        }

        $citasHoy = [];

        if ($colaboradorId) {
            $citasHoy = DB::table('detallecitas')
                ->join('citas', 'detallecitas.citas_id', '=', 'citas.id')
                ->join('contactos', 'detallecitas.contactos_id', '=', 'contactos.id')
                ->join('users', 'detallecitas.users_id', '=', 'users.id')
                ->where('detallecitas.users_id', $colaboradorId)
                ->whereDate('detallecitas.fecha', now()->toDateString())
                ->select(
                    'contactos.nombre',
                    'contactos.funeraria',
                    'detallecitas.fecha',
                    'detallecitas.horaInicio',
                    'detallecitas.estado',
                    'detallecitas.observaciones'
                )
                ->get();
        } /* else {
            $citasHoy = null;
        } */
        $citasHoyCount = count($citasHoy);
        // $sinRegistrosCitasHoy = empty($citasHoy);

        $numeroProximasCitas = [];

        if ($colaboradorId) {
            $numeroProximasCitas = DB::table('detallecitas')
                ->join('citas', 'detallecitas.citas_id', '=', 'citas.id')
                ->join('contactos', 'detallecitas.contactos_id', '=', 'contactos.id')
                ->join('users', 'detallecitas.users_id', '=', 'users.id')
                ->where('detallecitas.users_id', $colaboradorId)
                ->whereDate('detallecitas.fecha', '>', now()->toDateString())
                ->count();
        } else {
            $numeroProximasCitas = null;
        }

        $proximasCitas = [];

        if ($colaboradorId) {
            $proximasCitas = DB::table('detallecitas')
                ->join('citas', 'detallecitas.citas_id', '=', 'citas.id')
                ->join('contactos', 'detallecitas.contactos_id', '=', 'contactos.id')
                ->join('users', 'detallecitas.users_id', '=', 'users.id')
                ->where('detallecitas.users_id', $colaboradorId)
                ->whereDate('detallecitas.fecha', '>',  now()->toDateString())
                ->select(
                    'contactos.nombre',
                    'contactos.funeraria',
                    'detallecitas.fecha',
                    'detallecitas.horaInicio',
                    'detallecitas.estado',
                    'detallecitas.observaciones'
                )
                ->get();
        } /* else {
            $proximasCitas = null;
        } */

        $proximasCitasCount = count($proximasCitas);

        $numeroCitas = [];

        if ($colaboradorId) {
            $numeroCitas = DB::table('detallecitas')
                ->join('citas', 'detallecitas.citas_id', '=', 'citas.id')
                ->join('contactos', 'detallecitas.contactos_id', '=', 'contactos.id')
                ->join('users', 'detallecitas.users_id', '=', 'users.id')
                ->where('detallecitas.users_id', $colaboradorId)
                ->count();
        } else {
            $numeroCitas = null;
        }

        $citas = [];

        if ($colaboradorId) {
            $citas = DB::table('detallecitas')
                ->join('citas', 'detallecitas.citas_id', '=', 'citas.id')
                ->join('contactos', 'detallecitas.contactos_id', '=', 'contactos.id')
                ->join('users', 'detallecitas.users_id', '=', 'users.id')
                ->where('detallecitas.users_id', $colaboradorId)
                ->select(
                    'contactos.nombre',
                    'contactos.funeraria',
                    'detallecitas.fecha',
                    'detallecitas.horaInicio',
                    'detallecitas.estado',
                    'detallecitas.observaciones'
                )
                ->get();
        } /* else {
            $citas = null;
        }
 */
        $citasCount = count($citas);

        return view('reporteCitas', compact(
            'asesores',
            'numeroCitasVencidas',
            'citasVencidas',
            'citasVencidasCount',
            'numeroCitasHoy',
            'citasHoy',
            'citasHoyCount',
            'numeroProximasCitas',
            'proximasCitas',
            'proximasCitasCount',
            'numeroCitas',
            'citas',
            'citasCount'
        ));
    }
}
