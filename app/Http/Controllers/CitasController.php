<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Contactos;
use App\Models\Citas;
use App\Models\Detallecitas;
use App\Models\User;
use App\Models\DetalleContactos;

use Faker\Factory as Faker;

class CitasController extends Controller
{
    public function citas(Request $request)
    {
        $colaboradorId = $request->input('colaboradores');

        $contactos = Contactos::all();

        $tiposdeCita = DB::table('citas')->distinct()->pluck('tipo');
        $lugarCita = DB::table('citas')->distinct()->pluck('lugar');
        $citas = Citas::all();

        $asesores = DB::table('users')
            ->where('puesto', 'asesor')
            ->get();

        $numerocitasProgramadas = DB::table('detallecitas')
            ->join('citas', 'detallecitas.citas_id', '=', 'citas.id')
            ->whereDate('detallecitas.fecha', now()->toDateString())
            ->where('detallecitas.estado', 'Programada')
            ->where('detallecitas.users_id', $colaboradorId)
            ->count();

        $numerocitasCanceladas = DB::table('detallecitas')
            ->join('citas', 'detallecitas.citas_id', '=', 'citas.id')
            ->whereDate('detallecitas.fecha', now()->toDateString())
            ->where('detallecitas.estado', 'Cancelada')
            ->where('detallecitas.users_id', $colaboradorId)
            ->count();

        $numerocitasRealizadas = DB::table('detallecitas')
            ->join('citas', 'detallecitas.citas_id', '=', 'citas.id')
            ->whereDate('detallecitas.fecha', now()->toDateString())
            ->where('detallecitas.estado', 'Realizada')
            ->where('detallecitas.users_id', $colaboradorId)
            ->count();

        $numerocitasPorAutorizar = DB::table('detallecitas')
            ->join('citas', 'detallecitas.citas_id', '=', 'citas.id')
            ->whereDate('detallecitas.fecha', now()->toDateString())
            ->where('detallecitas.estado', 'Por Autorizar')
            ->where('detallecitas.users_id', $colaboradorId)
            ->count();

        $citasHoy = [];

        if ($colaboradorId) {
            $citasHoy = DB::table('detallecitas')
                ->join('citas', 'detallecitas.citas_id', '=', 'citas.id')
                ->join('contactos', 'detallecitas.contactos_id', '=', 'contactos.id')
                ->where('detallecitas.users_id', $colaboradorId)
                ->whereDate('detallecitas.fecha', now()->toDateString())
                ->orderByDesc('detallecitas.fecha')
                ->select(
                    DB::raw("CONCAT(contactos.funeraria, '-', contactos.nombre) as Nombre"),
                    'contactos.*',
                    'detallecitas.id',
                    'detallecitas.fecha',
                    'detallecitas.horaInicio',
                    'detallecitas.horaFin',
                    'citas.tipo'
                )
                ->groupBy(
                    'detallecitas.id',
                    'detallecitas.fecha',
                    'detallecitas.horaInicio',
                    'detallecitas.horaFin',
                    'detallecitas.estado',
                    'detallecitas.telefono',
                    'detallecitas.correo',
                    'detallecitas.observaciones',
                    'detallecitas.contactos_id',
                    'detallecitas.citas_id',
                    'detallecitas.users_id',
                    'detallecitas.detallecontactos_id',
                    'detallecitas.created_at',
                    'detallecitas.updated_at',
                    'contactos.id',
                    'contactos.funeraria',
                    'contactos.nombre',
                    'contactos.tipo',
                    'contactos.correo',
                    'contactos.telefono',
                    'contactos.celular',
                    'contactos.referenciado',
                    'contactos.origen',
                    'contactos.fechaNacimiento',
                    'contactos.fechaIngreso',
                    'contactos.vigencia',
                    'contactos.profesion',
                    'contactos.empresas_id',
                    'contactos.ingresos',
                    'contactos.calle',
                    'contactos.noInterior',
                    'contactos.noExterior',
                    'contactos.colonias_id',
                    'contactos.localidad',
                    'contactos.municipio',
                    'contactos.estado',
                    'contactos.pais',
                    'contactos.codPostal',
                    'contactos.observaciones',
                    'contactos.users_id',
                    'contactos.created_at',
                    'contactos.updated_at',
                    'citas.tipo',
                    'citas.lugar',
                    'citas.comentarios',
                    'citas.created_at',
                    'citas.updated_at',
                )
                ->get();
        }
        $citasHoyCount = count($citasHoy);

        $detallesCitasHoy = DB::table('detallecitas')
            ->join('citas as c', 'detallecitas.citas_id', '=', 'c.id')
            ->join('contactos', 'detallecitas.contactos_id', '=', 'contactos.id')
            ->where('detallecitas.users_id', $colaboradorId)
            ->whereDate('detallecitas.fecha', now()->toDateString())
            ->orderByDesc('detallecitas.fecha')
            ->select(
                'contactos.funeraria',
                'contactos.nombre',
                'detallecitas.fecha',
                'detallecitas.horaInicio',
                'detallecitas.horaFin',
                'detallecitas.estado',
                'detallecitas.telefono',
                'detallecitas.correo',
                'detallecitas.observaciones',
                'c.tipo',
                'c.lugar'
            )
            ->get();

        $citasContactoHoy = [];
        foreach ($citasHoy as $citaHoy) {
            $citas = DB::table('detallecontactos')
                ->select(
                    'detallecitas.fecha',
                    'detallecitas.horaInicio',
                    DB::raw('TIMESTAMPDIFF(MINUTE, detallecitas.horaInicio, detallecitas.horaFin) as duracion'),
                    'detallecitas.estado',
                    'citas.comentarios'
                )
                ->join('detallecitas', 'detallecontactos.id', '=', 'detallecitas.detallecontactos_id')
                ->leftJoin('citas', 'detallecitas.citas_id', '=', 'citas.id')
                ->where('detallecontactos.contactos_id', $citaHoy->id)
                ->orderBy('detallecitas.fecha', 'desc')
                ->get();

            $citasContactoHoy[$citaHoy->id] = $citas;
        }

        $citasContactoHoyCount = count($citasContactoHoy);

        /* $detallesCitasContactoHoy = DB::table('detallecitas')
            ->join('contactos', 'detallecitas.contactos_id', '=', 'contactos.id')
            ->where('detallecitas.users_id', $colaboradorId)
            ->whereDate('detallecitas.fecha', now()->toDateString())
            ->orderByDesc('detallecitas.fecha')
            ->select(
                'detallecitas.fecha',
                'detallecitas.horaInicio',
                'detallecitas.horaFin',
                'detallecitas.estado',
                'detallecitas.observaciones'
            )
            ->get(); */


        /* $detallesContactoCitasHoy = DB::table('detallecontactos')
            ->select('contactos.*')
            ->join('contactos', 'detallecontactos.contactos_id', '=', 'contactos.id')
            ->join('users', 'detallecontactos.users_id', '=', 'users.id')
            ->join('citas', 'detallecontactos.citas_id', '=', 'citas.id')
            ->leftJoin('detallecitas', 'detallecitas.citas_id', '=', 'citas.id')
            ->where('detallecitas.users_id', '=', $colaboradorId)
            ->whereDate('detallecitas.fecha', now()->toDateString())
            ->orderBy('detallecitas.id', 'asc')
            ->get(); */

        $citasVencidas = [];

        if ($colaboradorId) {
            $citasVencidas = DB::table('detallecitas')
                ->join('citas', 'detallecitas.citas_id', '=', 'citas.id')
                ->join('contactos', 'detallecitas.contactos_id', '=', 'contactos.id')
                ->when($colaboradorId, function ($query) use ($colaboradorId) {
                    return $query->where('detallecitas.users_id', $colaboradorId);
                })
                ->whereDate('detallecitas.fecha', '<', now()->toDateString())
                ->orderByDesc('detallecitas.fecha')
                ->select(
                    DB::raw("CONCAT(contactos.funeraria, '-', contactos.nombre) as Nombre"),
                    'contactos.*',
                    'detallecitas.id',
                    'detallecitas.fecha',
                    'detallecitas.horaInicio',
                    'detallecitas.horaFin',
                    'citas.tipo'
                )
                ->groupBy(
                    'detallecitas.id',
                    'detallecitas.fecha',
                    'detallecitas.horaInicio',
                    'detallecitas.horaFin',
                    'detallecitas.estado',
                    'detallecitas.telefono',
                    'detallecitas.correo',
                    'detallecitas.observaciones',
                    'detallecitas.contactos_id',
                    'detallecitas.citas_id',
                    'detallecitas.users_id',
                    'detallecitas.detallecontactos_id',
                    'detallecitas.created_at',
                    'detallecitas.updated_at',
                    'contactos.id',
                    'contactos.funeraria',
                    'contactos.nombre',
                    'contactos.tipo',
                    'contactos.correo',
                    'contactos.telefono',
                    'contactos.celular',
                    'contactos.referenciado',
                    'contactos.origen',
                    'contactos.fechaNacimiento',
                    'contactos.fechaIngreso',
                    'contactos.vigencia',
                    'contactos.profesion',
                    'contactos.empresas_id',
                    'contactos.ingresos',
                    'contactos.calle',
                    'contactos.noInterior',
                    'contactos.noExterior',
                    'contactos.colonias_id',
                    'contactos.localidad',
                    'contactos.municipio',
                    'contactos.estado',
                    'contactos.pais',
                    'contactos.codPostal',
                    'contactos.observaciones',
                    'contactos.users_id',
                    'contactos.created_at',
                    'contactos.updated_at',
                    'citas.tipo',
                    'citas.lugar',
                    'citas.comentarios',
                    'citas.created_at',
                    'citas.updated_at',
                )
                ->get();
        }
        $citasVencidasCount = count($citasVencidas);

        $detallesCitasVencidas = DB::table('detallecitas')
            ->join('citas as c', 'detallecitas.citas_id', '=', 'c.id')
            ->join('contactos', 'detallecitas.contactos_id', '=', 'contactos.id')
            ->when($colaboradorId, function ($query) use ($colaboradorId) {
                return $query->where('detallecitas.users_id', $colaboradorId);
            })
            ->whereDate('detallecitas.fecha', '<', now()->toDateString())
            ->orderByDesc('detallecitas.fecha')
            ->select(
                'contactos.funeraria',
                'contactos.nombre',
                'detallecitas.fecha',
                'detallecitas.horaInicio',
                'detallecitas.horaFin',
                'detallecitas.estado',
                'detallecitas.telefono',
                'detallecitas.correo',
                'detallecitas.observaciones',
                'c.tipo',
                'c.lugar'
            )
            ->get();

        /* $detallesContactoCitasVencidas = [];
        foreach ($citasVencidas as $citaVencida ) {
            $detalles = DB::table('contactos')
            ->where('contactos.id', $citaVencida->id)
            ->get();

            $detallesContactoCitasVencidas[$citaVencida->id] = $detalles;
        } */

        $citasContactoVencidas = [];
        foreach ($citasVencidas as $citaVencida) {
            $citas2 = DB::table('detallecontactos')
                ->select(
                    'detallecitas.fecha',
                    'detallecitas.horaInicio',
                    DB::raw('TIMESTAMPDIFF(MINUTE, detallecitas.horaInicio, detallecitas.horaFin) as duracion'),
                    'detallecitas.estado',
                    'citas.comentarios'
                )
                ->join('detallecitas', 'detallecontactos.id', '=', 'detallecitas.detallecontactos_id')
                ->leftJoin('citas', 'detallecitas.citas_id', '=', 'citas.id')
                ->where('detallecontactos.contactos_id', $citaVencida->id)
                ->orderBy('detallecitas.fecha', 'desc')
                ->get();

            $citasContactoVencidas[$citaVencida->id] = $citas2;
        }

        $citasContactoVencidasCount = count($citasContactoVencidas);

        $cotizacionesContactoCitasVencidas = [];
        foreach ($citasVencidas as $citaVencida) {
            $cotizaciones = DB::table('cotizaciones')
                ->select(
                    'cotizaciones.id',
                    'cotizaciones.fecha',
                    'cotizaciones.total',
                    'cotizaciones.estado'
                )
                ->join('contactos', 'cotizaciones.contactos_id', '=', 'contactos.id')
                ->where('contactos.id', $citaVencida->id)
                ->orderBy('cotizaciones.fecha', 'desc')
                ->get();

            $cotizacionesContactoCitasVencidas[$citaVencida->id] = $cotizaciones;
        }

        $ventasContactoCitasVencidas = [];
        foreach ($citasVencidas as $citaVencida) {
            $ventas = DB::table('detalleventas')
                ->select(
                    'detalleventas.referencia',
                    'detalleventas.fecha',
                    'detalleventas.total',
                    'detalleventas.observaciones',
                    'users.name'
                )
                ->join('detallecontactos', 'detalleventas.detallecontactos_id', '=', 'detallecontactos.id')
                ->join('contactos', 'detalleventas.contactos_id', '=', 'contactos.id')
                ->join('ventas', 'detalleventas.ventas_id', '=', 'ventas.id')
                ->leftJoin('users', 'ventas.users_id', '=', 'users.id')
                ->where('detallecontactos.contactos_id', $citaVencida->id)
                ->orderBy('detalleventas.fecha', 'desc')
                ->get();

            $ventasContactoCitasVencidas[$citaVencida->id] = $ventas;
        }


        /* $detallesContactoCitasVencidas = DB::table('detallecontactos')
            ->select('contactos.*')
            ->join('contactos', 'detallecontactos.contactos_id', '=', 'contactos.id')
            ->join('users', 'detallecontactos.users_id', '=', 'users.id')
            ->join('citas', 'detallecontactos.citas_id', '=', 'citas.id')
            ->leftJoin('detallecitas', 'detallecitas.citas_id', '=', 'citas.id')
            ->where('detallecitas.users_id', '=', $colaboradorId)
            ->whereDate('detallecitas.fecha', '<', now()->toDateString())
            ->orderBy('detallecitas.id', 'asc')
            ->get(); */

        $proximasCitas = [];

        if ($colaboradorId) {
            $proximasCitas = DB::table('detallecitas')
                ->join('citas', 'detallecitas.citas_id', '=', 'citas.id')
                ->join('contactos', 'detallecitas.contactos_id', '=', 'contactos.id')
                ->when($colaboradorId, function ($query) use ($colaboradorId) {
                    return $query->where('detallecitas.users_id', $colaboradorId);
                })
                ->whereDate('detallecitas.fecha', '>', now()->toDateString())
                ->orderBy('detallecitas.fecha')
                ->select(
                    DB::raw("CONCAT(contactos.funeraria, '-', contactos.nombre) as Nombre"),
                    'contactos.*',
                    'detallecitas.id',
                    'detallecitas.fecha',
                    'detallecitas.horaInicio',
                    'detallecitas.horaFin',
                    'citas.tipo'
                )
                ->groupBy(
                    'detallecitas.id',
                    'detallecitas.fecha',
                    'detallecitas.horaInicio',
                    'detallecitas.horaFin',
                    'detallecitas.estado',
                    'detallecitas.telefono',
                    'detallecitas.correo',
                    'detallecitas.observaciones',
                    'detallecitas.contactos_id',
                    'detallecitas.citas_id',
                    'detallecitas.users_id',
                    'detallecitas.detallecontactos_id',
                    'detallecitas.created_at',
                    'detallecitas.updated_at',
                    'contactos.id',
                    'contactos.funeraria',
                    'contactos.nombre',
                    'contactos.tipo',
                    'contactos.correo',
                    'contactos.telefono',
                    'contactos.celular',
                    'contactos.referenciado',
                    'contactos.origen',
                    'contactos.fechaNacimiento',
                    'contactos.fechaIngreso',
                    'contactos.vigencia',
                    'contactos.profesion',
                    'contactos.empresas_id',
                    'contactos.ingresos',
                    'contactos.calle',
                    'contactos.noInterior',
                    'contactos.noExterior',
                    'contactos.colonias_id',
                    'contactos.localidad',
                    'contactos.municipio',
                    'contactos.estado',
                    'contactos.pais',
                    'contactos.codPostal',
                    'contactos.observaciones',
                    'contactos.users_id',
                    'contactos.created_at',
                    'contactos.updated_at',
                    'citas.tipo',
                    'citas.lugar',
                    'citas.comentarios',
                    'citas.created_at',
                    'citas.updated_at',
                )
                ->get();
        }
        $proximasCitasCount = count($proximasCitas);

        $detallesProximasCitas = DB::table('detallecitas')
            ->join('citas as c', 'detallecitas.citas_id', '=', 'c.id')
            ->join('contactos', 'detallecitas.contactos_id', '=', 'contactos.id')
            ->when($colaboradorId, function ($query) use ($colaboradorId) {
                return $query->where('detallecitas.users_id', $colaboradorId);
            })
            ->whereDate('detallecitas.fecha', '>', now()->toDateString())
            ->orderBy('detallecitas.fecha')
            ->select(
                'contactos.funeraria',
                'contactos.nombre',
                'detallecitas.fecha',
                'detallecitas.horaInicio',
                'detallecitas.horaFin',
                'detallecitas.estado',
                'detallecitas.telefono',
                'detallecitas.correo',
                'detallecitas.observaciones',
                'c.tipo',
                'c.lugar'
            )
            ->get();

        $proximasCitasContacto = [];
        foreach ($proximasCitas as $proximaCita) {
            $citas3 = DB::table('detallecontactos')
                ->select(
                    'detallecitas.fecha',
                    'detallecitas.horaInicio',
                    DB::raw('TIMESTAMPDIFF(MINUTE, detallecitas.horaInicio, detallecitas.horaFin) as duracion'),
                    'detallecitas.estado',
                    'citas.comentarios'
                )
                ->join('detallecitas', 'detallecontactos.id', '=', 'detallecitas.detallecontactos_id')
                ->leftJoin('citas', 'detallecitas.citas_id', '=', 'citas.id')
                ->where('detallecontactos.contactos_id', $proximaCita->id)
                ->orderBy('detallecitas.fecha', 'desc')
                ->get();

            $proximasCitasContacto[$proximaCita->id] = $citas3;
        }

        $proximasCitasContactoCount = count($proximasCitasContacto);

        /* $detallesContactoCitasProximas = DB::table('detallecontactos')
            ->select('contactos.*')
            ->join('contactos', 'detallecontactos.contactos_id', '=', 'contactos.id')
            ->join('users', 'detallecontactos.users_id', '=', 'users.id')
            ->join('citas', 'detallecontactos.citas_id', '=', 'citas.id')
            ->leftJoin('detallecitas', 'detallecitas.citas_id', '=', 'citas.id')
            ->where('detallecitas.users_id', '=', $colaboradorId)
            ->whereDate('detallecitas.fecha', '>', now()->toDateString())
            ->orderBy('detallecitas.id', 'asc')
            ->get(); */

        $citasPorAutorizar = [];

        if ($colaboradorId) {
            $citasPorAutorizar = DB::table('detallecitas')
                ->join('citas', 'detallecitas.citas_id', '=', 'citas.id')
                ->join('contactos', 'detallecitas.contactos_id', '=', 'contactos.id')
                ->when($colaboradorId, function ($query) use ($colaboradorId) {
                    return $query->where('detallecitas.users_id', $colaboradorId);
                })
                ->whereDate('detallecitas.fecha', '>=', now()->toDateString())
                ->orderByDesc('detallecitas.fecha')
                ->where('detallecitas.estado', 'Por Autorizar')
                ->select(
                    DB::raw("CONCAT(contactos.funeraria, '-', contactos.nombre) as Nombre"),
                    'contactos.*',
                    'detallecitas.id',
                    'detallecitas.fecha',
                    'detallecitas.horaInicio',
                    'detallecitas.horaFin',
                    'citas.tipo'
                )
                ->groupBy(
                    'detallecitas.id',
                    'detallecitas.fecha',
                    'detallecitas.horaInicio',
                    'detallecitas.horaFin',
                    'detallecitas.estado',
                    'detallecitas.telefono',
                    'detallecitas.correo',
                    'detallecitas.observaciones',
                    'detallecitas.contactos_id',
                    'detallecitas.citas_id',
                    'detallecitas.users_id',
                    'detallecitas.detallecontactos_id',
                    'detallecitas.created_at',
                    'detallecitas.updated_at',
                    'contactos.id',
                    'contactos.funeraria',
                    'contactos.nombre',
                    'contactos.tipo',
                    'contactos.correo',
                    'contactos.telefono',
                    'contactos.celular',
                    'contactos.referenciado',
                    'contactos.origen',
                    'contactos.fechaNacimiento',
                    'contactos.fechaIngreso',
                    'contactos.vigencia',
                    'contactos.profesion',
                    'contactos.empresas_id',
                    'contactos.ingresos',
                    'contactos.calle',
                    'contactos.noInterior',
                    'contactos.noExterior',
                    'contactos.colonias_id',
                    'contactos.localidad',
                    'contactos.municipio',
                    'contactos.estado',
                    'contactos.pais',
                    'contactos.codPostal',
                    'contactos.observaciones',
                    'contactos.users_id',
                    'contactos.created_at',
                    'contactos.updated_at',
                    'citas.tipo',
                    'citas.lugar',
                    'citas.comentarios',
                    'citas.created_at',
                    'citas.updated_at',
                )
                ->get();
        }
        $citasPorAutorizarCount = count($citasPorAutorizar);

        $detallesCitasPorAutorizar = DB::table('detallecitas')
            ->join('citas as c', 'detallecitas.citas_id', '=', 'c.id')
            ->join('contactos', 'detallecitas.contactos_id', '=', 'contactos.id')
            ->when($colaboradorId, function ($query) use ($colaboradorId) {
                return $query->where('detallecitas.users_id', $colaboradorId);
            })
            ->whereDate('detallecitas.fecha', '>=', now()->toDateString())
            ->orderByDesc('detallecitas.fecha')
            ->where('detallecitas.estado', 'Por Autorizar')
            ->select(
                'contactos.funeraria',
                'contactos.nombre',
                'detallecitas.fecha',
                'detallecitas.horaInicio',
                'detallecitas.horaFin',
                'detallecitas.estado',
                'detallecitas.telefono',
                'detallecitas.correo',
                'detallecitas.observaciones',
                'c.tipo',
                'c.lugar'
            )
            ->get();

        $citasContactoPorAutorizar = [];
        foreach ($citasPorAutorizar as $citaPorAutorizar) {
            $citas4 = DB::table('detallecontactos')
                ->select(
                    'detallecitas.fecha',
                    'detallecitas.horaInicio',
                    DB::raw('TIMESTAMPDIFF(MINUTE, detallecitas.horaInicio, detallecitas.horaFin) as duracion'),
                    'detallecitas.estado',
                    'citas.comentarios'
                )
                ->join('detallecitas', 'detallecontactos.id', '=', 'detallecitas.detallecontactos_id')
                ->leftJoin('citas', 'detallecitas.citas_id', '=', 'citas.id')
                ->where('detallecontactos.contactos_id', $citaPorAutorizar->id)
                ->orderBy('detallecitas.fecha', 'desc')
                ->get();

            $citasContactoPorAutorizar[$citaPorAutorizar->id] = $citas4;
        }

        $citasContactoPorAutorizarCount = count($citasContactoPorAutorizar);

        /* $detallesContactoCitasPorAutorizar = DB::table('detallecontactos')
            ->select('contactos.*')
            ->join('contactos', 'detallecontactos.contactos_id', '=', 'contactos.id')
            ->join('users', 'detallecontactos.users_id', '=', 'users.id')
            ->join('citas', 'detallecontactos.citas_id', '=', 'citas.id')
            ->leftJoin('detallecitas', 'detallecitas.citas_id', '=', 'citas.id')
            ->where('detallecitas.users_id', '=', $colaboradorId)
            ->where('detallecitas.estado', 'Por Autorizar')
            ->whereDate('detallecitas.fecha', '>=', now()->toDateString())
            ->orderBy('detallecitas.id', 'asc')
            ->get(); */

        return view('citas', compact(
            'contactos',
            'tiposdeCita',
            'lugarCita',
            'citas',
            'asesores',
            'numerocitasProgramadas',
            'numerocitasCanceladas',
            'numerocitasRealizadas',
            'numerocitasPorAutorizar',
            'citasHoy',
            'citasHoyCount',
            'citasVencidas',
            'citasVencidasCount',
            'proximasCitas',
            'proximasCitasCount',
            'citasPorAutorizar',
            'citasPorAutorizarCount',
            'detallesCitasHoy',
            'detallesCitasVencidas',
            'detallesProximasCitas',
            'detallesCitasPorAutorizar',
            // 'detallesContactoCitasVencidas',
            'cotizacionesContactoCitasVencidas',
            'ventasContactoCitasVencidas',
            'citasContactoHoy',
            'citasContactoHoyCount',
            'citasContactoVencidas',
            'citasContactoVencidasCount',
            'proximasCitasContacto',
            'proximasCitasContactoCount',
            'citasContactoPorAutorizar',
            'citasContactoPorAutorizarCount',
            /* 'detallesContactoCitasHoy',
            'detallesContactoCitasVencidas', 
            'detallesContactoCitasProximas',
            'detallesContactoCitasPorAutorizar' */
        ));
    }

    public function storeCitas(Request $request)
    {
        $cita = new Citas();
        $faker = Faker::create();

        $cita->tipo = $request->tipoCita;
        $cita->lugar = $request->lugar;
        $cita->comentarios = $request->comentarios;
        $cita->save();

        $detalleCita = new DetalleCitas();
        $faker = Faker::create();

        $detalleCita->fecha = $request->fecha;
        $detalleCita->horaInicio = $request->horaInicio;
        $detalleCita->horaFin = $request->horaFinal;
        $detalleCita->estado = $faker->randomElement(['Programada', 'Cancelada', 'Realizada', 'Por autorizar']);
        $detalleCita->telefono = $faker->phoneNumber();
        $detalleCita->correo = $faker->unique()->safeEmail();
        $detalleCita->observaciones = $faker->paragraph();
        $detalleCita->contactos_id = $request->persona;
        $detalleCita->citas_id = $cita->id;
        $detalleCita->users_id = $faker->numberBetween(User::min('id'), User::max('id'));
        $detalleCita->detalleContactos_id = $faker->numberBetween(Detallecontactos::min('id'), Detallecontactos::max('id'));

        $detalleCita->save();

        return redirect()->route('citas');
    }
}
