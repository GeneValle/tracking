<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Contactos;
use App\Models\Citas;
use App\Models\User;
use App\Models\Detallecontactos;
use App\Models\Descartados;
use App\Models\Empresas;
use App\Models\Colonias;
use App\Models\Detallecitas;
use App\Models\Cotizaciones;
use Faker\Factory as Faker;


class ContactosController extends Controller
{
    public function updateVolverProspecto(Contactos $candidato)
    {
        $candidato->tipo = 'Prospecto';
        $candidato->save();

        return response()->json(['message' => 'Contacto actualizado con éxito']);
    }

    public function updateDescartarCandidato(Contactos $candidato)
    {
        $candidato->tipo = 'Descartado';
        $candidato->save();

        return response()->json(['message' => 'Contacto actualizado con éxito']);
    }

    public function contactos()
    {
        $tiposContacto = DB::table('contactos')->distinct()->pluck('tipo');
        $origenContacto = DB::table('contactos')->distinct()->pluck('origen');

        $contactos = Contactos::all();

        $asesores = DB::table('users')
            ->where('puesto', 'asesor')
            ->get();

        /* Consultas para candidatos */
        $numeroCandidatos = DB::table('contactos')
            ->where('contactos.tipo', 'Candidato')
            // ->select(DB::raw('count(contactos.id) as numeroCandidatos'))
            ->count();

        $detalleCandidatos = DB::table('contactos')
            ->where('tipo', 'Candidato')
            ->get();

        $antiguedadCandidatos = DB::table('detallecontactos')
            ->join('contactos', 'detallecontactos.contactos_id', '=', 'contactos_id')
            ->select(
                'contactos.id',
                DB::raw('DATEDIFF(now(), contactos.fechaIngreso) AS diasDesdeIngreso')
            )
            ->where('tipo', 'Candidato')
            ->groupBy('contactos.id', 'contactos.fechaIngreso')
            ->get();

        $numeroCitasCandidatos = DB::table('detallecontactos')
            //     ->select(DB::raw('count(detallecitas.citas_id) as noCitasCandidatos'))
            ->leftJoin('contactos', 'detallecontactos.contactos_id', '=', 'contactos.id')
            ->join('detallecitas', 'detallecontactos.id', '=', 'detallecitas.detallecontactos_id')
            ->leftJoin('citas', 'detallecitas.citas_id', '=', 'citas.id')
            ->where('contactos.tipo', 'Candidato')
            ->count();

        $citasCandidatos = [];
        foreach ($detalleCandidatos as $candidato) {
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
                ->where('detallecontactos.contactos_id', $candidato->id)
                ->orderBy('detallecitas.fecha', 'desc')
                ->get();

            $citasCandidatos[$candidato->id] = $citas;
        }

        $citasPorCandidatos = DB::table('detallecontactos')
            ->selectRaw('contactos.id, contactos.funeraria, contactos.nombre, COUNT(DISTINCT detallecitas.citas_id) AS noCitas')
            ->leftJoin('contactos', 'detallecontactos.contactos_id', '=', 'contactos.id')
            ->leftJoin('detallecitas', 'detallecontactos.id', '=', 'detallecitas.detallecontactos_id')
            ->where('contactos.tipo', 'Candidato')
            ->groupBy('contactos.id', 'contactos.funeraria', 'contactos.nombre')
            ->get();

        $cotizacionesCandidatos = [];
        foreach ($detalleCandidatos as $candidato) {
            $cotizaciones = DB::table('cotizaciones')
                ->select(
                    'cotizaciones.id',
                    'cotizaciones.fecha',
                    'cotizaciones.total',
                    'cotizaciones.estado'
                )
                ->join('contactos', 'cotizaciones.contactos_id', '=', 'contactos.id')
                ->where('contactos.id', $candidato->id)
                ->orderBy('cotizaciones.fecha', 'desc')
                ->get();

            $cotizacionesCandidatos[$candidato->id] = $cotizaciones;
        }

        $ventasCandidatos = [];
        foreach ($detalleCandidatos as $candidato) {
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
                ->where('detallecontactos.contactos_id', $candidato->id)
                ->orderBy('detalleventas.fecha', 'desc')
                ->get();

            $ventasCandidatos[$candidato->id] = $ventas;
        }

        $empresasCandidatos = DB::table('contactos')
            ->join('empresas', 'contactos.empresas_id', '=', 'empresas.id')
            ->select('empresas.id', 'empresas.nombreEmpresa')
            ->where('contactos.tipo', 'Candidato')
            ->orderBy('contactos.id')
            ->get();

        $coloniasCandidatos = DB::table('contactos')
            ->join('colonias', 'contactos.colonias_id', '=', 'colonias.id')
            ->select('colonias.id', 'colonias.colonia')
            ->where('contactos.tipo', 'Candidato')
            ->orderBy('contactos.id')
            ->get();

        /* Consultas para candidatos */

        /* Consultas para Prospectos */

        $numeroProspectos = DB::table('contactos')
            ->where('contactos.tipo', 'Prospecto')
            ->count();

        $detalleProspectos = DB::table('contactos')
            ->where('tipo', 'Prospecto')
            ->get();

        $antiguedadProspectos = DB::table('detallecontactos')
            ->join('contactos', 'detallecontactos.contactos_id', '=', 'contactos_id')
            ->select(
                'contactos.id',
                DB::raw('DATEDIFF(now(), contactos.fechaIngreso) AS diasDesdeIngreso')
            )
            ->where('tipo', 'Prospecto')
            ->groupBy('contactos.id', 'contactos.fechaIngreso')
            ->get();

        $numeroCitasProspectos = DB::table('detallecontactos')
            ->leftJoin('contactos', 'detallecontactos.contactos_id', '=', 'contactos.id')
            ->join('detallecitas', 'detallecontactos.id', '=', 'detallecitas.detallecontactos_id')
            ->leftJoin('citas', 'detallecitas.citas_id', '=', 'citas.id')
            ->where('contactos.tipo', 'Prospecto')
            ->count();

        $citasProspectos = [];
        foreach ($detalleProspectos as $prospecto) {
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
                ->where('detallecontactos.contactos_id', $prospecto->id)
                ->orderBy('detallecitas.fecha', 'desc')
                ->get();

            $citasProspectos[$prospecto->id] = $citas;
        }

        $citasPorProspectos = DB::table('detallecontactos')
            ->selectRaw('contactos.id, contactos.funeraria, contactos.nombre, COUNT(DISTINCT detallecitas.citas_id) AS noCitas')
            ->leftJoin('contactos', 'detallecontactos.contactos_id', '=', 'contactos.id')
            ->leftJoin('detallecitas', 'detallecontactos.id', '=', 'detallecitas.detallecontactos_id')
            ->where('contactos.tipo', 'Prospecto')
            ->groupBy('contactos.id', 'contactos.funeraria', 'contactos.nombre')
            ->get();

        $cotizacionesProspectos = [];
        foreach ($detalleProspectos as $prospecto) {
            $cotizaciones = DB::table('cotizaciones')
                ->select(
                    'cotizaciones.id',
                    'cotizaciones.fecha',
                    'cotizaciones.total',
                    'cotizaciones.estado'
                )
                ->join('contactos', 'cotizaciones.contactos_id', '=', 'contactos.id')
                ->where('contactos.id', $prospecto->id)
                ->orderBy('cotizaciones.fecha', 'desc')
                ->get();

            $cotizacionesProspectos[$prospecto->id] = $cotizaciones;
        }

        $ventasProspectos = [];
        foreach ($detalleProspectos as $prospecto) {
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
                ->where('detallecontactos.contactos_id', $prospecto->id)
                ->orderBy('detalleventas.fecha', 'desc')
                ->get();

            $ventasProspectos[$prospecto->id] = $ventas;
        }

        //  dd($ventasProspectos);

        $empresasProspectos = DB::table('contactos')
            ->join('empresas', 'contactos.empresas_id', '=', 'empresas.id')
            ->select('empresas.id', 'empresas.nombreEmpresa')
            // 
            ->where('contactos.tipo', 'Prospecto')
            ->orderBy('contactos.id')
            ->get();

        $coloniasProspectos = DB::table('contactos')
            ->join('colonias', 'contactos.colonias_id', '=', 'colonias.id')
            ->select('colonias.id', 'colonias.colonia')
            // 
            ->where('contactos.tipo', 'Prospecto')
            ->orderBy('contactos.id')
            ->get();

        /* Consultas para Prospectos */

        /* Consultas para Clientes */
        $numeroClientes = DB::table('contactos')
            ->where('contactos.tipo', 'Cliente')
            ->count();

        $detalleClientes = DB::table('contactos')
            ->where('tipo', 'Cliente')
            ->get();

        $antiguedadClientes = DB::table('detallecontactos')
            ->join('contactos', 'detallecontactos.contactos_id', '=', 'contactos_id')
            ->select(
                'contactos.id',
                DB::raw('DATEDIFF(now(), contactos.fechaIngreso) AS diasDesdeIngreso')
            )
            ->where('tipo', 'Cliente')
            ->groupBy('contactos.id', 'contactos.fechaIngreso')
            ->get();

        $numeroCitasClientes = DB::table('detallecontactos')
            ->leftJoin('contactos', 'detallecontactos.contactos_id', '=', 'contactos.id')
            ->join('detallecitas', 'detallecontactos.id', '=', 'detallecitas.detallecontactos_id')
            ->leftJoin('citas', 'detallecitas.citas_id', '=', 'citas.id')
            ->where('contactos.tipo', 'Cliente')
            ->count();

        $citasClientes = [];
        foreach ($detalleClientes as $cliente) {
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
                ->where('detallecontactos.contactos_id', $cliente->id)
                ->orderBy('detallecitas.fecha', 'desc')
                ->get();

            $citasClientes[$cliente->id] = $citas;
        }

        $citasPorClientes = DB::table('detallecontactos')
            ->selectRaw('contactos.id, contactos.funeraria, contactos.nombre, COUNT(DISTINCT detallecitas.citas_id) AS noCitas')
            ->leftJoin('contactos', 'detallecontactos.contactos_id', '=', 'contactos.id')
            ->leftJoin('detallecitas', 'detallecontactos.id', '=', 'detallecitas.detallecontactos_id')
            ->where('contactos.tipo', 'Cliente')
            ->groupBy('contactos.id', 'contactos.funeraria', 'contactos.nombre')
            ->get();

        $cotizacionesClientes = [];
        foreach ($detalleClientes as $cliente) {
            $cotizaciones = DB::table('cotizaciones')
                ->select(
                    'cotizaciones.id',
                    'cotizaciones.fecha',
                    'cotizaciones.total',
                    'cotizaciones.estado'
                )
                ->join('contactos', 'cotizaciones.contactos_id', '=', 'contactos.id')
                ->where('contactos.id', $cliente->id)
                ->orderBy('cotizaciones.fecha', 'desc')
                ->get();

            $cotizacionesClientes[$cliente->id] = $cotizaciones;
        }

        $ventasClientes = [];
        foreach ($detalleClientes as $cliente) {
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
                ->where('detallecontactos.contactos_id', $cliente->id)
                ->orderBy('detalleventas.fecha', 'desc')
                ->get();

            $ventasClientes[$cliente->id] = $ventas;
        }

        // dd($ventasClientes);

        $empresasClientes = DB::table('contactos')
            ->join('empresas', 'contactos.empresas_id', '=', 'empresas.id')
            ->select('empresas.id', 'empresas.nombreEmpresa')
            // 
            ->where('contactos.tipo', 'Cliente')
            ->orderBy('contactos.id')
            ->get();

        $coloniasClientes = DB::table('contactos')
            ->join('colonias', 'contactos.colonias_id', '=', 'colonias.id')
            ->select('colonias.id', 'colonias.colonia')
            // 
            ->where('contactos.tipo', 'Cliente')
            ->orderBy('contactos.id')
            ->get();

        /* Consultas para Clientes */

        /* Consultas para Descartados */
        $numeroDescartados = DB::table('contactos')
            ->where('contactos.tipo', 'Descartado')
            ->count();

        $detalleDescartados = DB::table('descartados')
            ->leftJoin('contactos', 'descartados.contactos_id', '=', 'contactos.id')
            ->where('contactos.tipo', 'Descartado')
            ->get();

        $antiguedadDescartados = DB::table('detallecontactos')
            ->join('contactos', 'detallecontactos.contactos_id', '=', 'contactos_id')
            ->select(
                'contactos.id',
                DB::raw('DATEDIFF(now(), contactos.fechaIngreso) AS diasDesdeIngreso')
            )
            ->where('tipo', 'Descartado')
            ->groupBy('contactos.id', 'contactos.fechaIngreso')
            ->get();

        $numeroCitasDescartados = DB::table('detallecontactos')
            ->leftJoin('contactos', 'detallecontactos.contactos_id', '=', 'contactos.id')
            ->join('detallecitas', 'detallecontactos.id', '=', 'detallecitas.detallecontactos_id')
            ->leftJoin('citas', 'detallecitas.citas_id', '=', 'citas.id')
            ->where('contactos.tipo', 'Descartado')
            ->count();

        $citasDescartados = [];
        foreach ($detalleDescartados as $descartado) {
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
                ->where('detallecontactos.contactos_id', $descartado->id)
                ->orderBy('detallecitas.fecha', 'desc')
                ->get();

            $citasDescartados[$descartado->id] = $citas;
        }

        $citasPorDescartados = DB::table('detallecontactos')
            ->selectRaw('contactos.id, contactos.funeraria, contactos.nombre, COUNT(DISTINCT detallecitas.citas_id) AS noCitas')
            ->leftJoin('contactos', 'detallecontactos.contactos_id', '=', 'contactos.id')
            ->leftJoin('detallecitas', 'detallecontactos.id', '=', 'detallecitas.detallecontactos_id')
            ->where('contactos.tipo', 'Descartado')
            ->groupBy('contactos.id', 'contactos.funeraria', 'contactos.nombre')
            ->get();

        $cotizacionesDescartados = [];
        foreach ($detalleDescartados as $descartado) {
            $cotizaciones = DB::table('cotizaciones')
                ->select(
                    'cotizaciones.id',
                    'cotizaciones.fecha',
                    'cotizaciones.total',
                    'cotizaciones.estado'
                )
                ->join('contactos', 'cotizaciones.contactos_id', '=', 'contactos.id')
                ->where('contactos.id', $descartado->id)
                ->orderBy('cotizaciones.fecha', 'desc')
                ->get();

            $cotizacionesDescartados[$descartado->id] = $cotizaciones;
        }

        $ventasDescartados = [];
        foreach ($detalleDescartados as $descartado) {
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
                ->where('detallecontactos.contactos_id', $descartado->id)
                ->orderBy('detalleventas.fecha', 'desc')
                ->get();

            $ventasDescartados[$descartado->id] = $ventas;
        }

        // dd($ventasDescartados);

        $empresasDescartados = DB::table('contactos')
            ->join('empresas', 'contactos.empresas_id', '=', 'empresas.id')
            ->select('empresas.id', 'empresas.nombreEmpresa')
            // 
            ->where('contactos.tipo', 'Descartado')
            ->orderBy('contactos.id')
            ->get();

        $coloniasDescartados = DB::table('contactos')
            ->join('colonias', 'contactos.colonias_id', '=', 'colonias.id')
            ->select('colonias.id', 'colonias.colonia')
            // 
            ->where('contactos.tipo', 'Descartado')
            ->orderBy('contactos.id')
            ->get();

        /* Consultas para Descartados */

        /* Mas consultas */

        $empresas = DB::table('contactos')
            ->join('empresas', 'contactos.empresas_id', '=', 'empresas.id')
            ->select('empresas.id', 'empresas.nombreEmpresa')
            ->distinct('empresas.nombreEmpresa')
            ->get();

        $colonias = DB::table('contactos')
            ->join('colonias', 'contactos.colonias_id', '=', 'colonias.id')
            ->select('colonias.id', 'colonias.colonia')
            ->distinct('colonias.colonia')
            ->get();

        $numeroCitas = DB::table('citas')->count();

        $citas = Citas::all();

        $tiposdeCita = DB::table('citas')->distinct()->pluck('tipo');
        $lugarCita = DB::table('citas')->distinct()->pluck('lugar');

        $productos = DB::table('cotizaciones')
            ->join('productos', 'cotizaciones.productos_id', '=', 'productos.id')
            ->select('productos.*')
            ->distinct('productos.producto')
            ->get();

        /* Mas consultas */

        return view('contactos', compact(
            'tiposContacto',
            'origenContacto',
            'contactos',
            'asesores',
            'numeroCandidatos',
            'detalleCandidatos',
            'antiguedadCandidatos',
            'numeroCitasCandidatos',
            'citasCandidatos',
            'citasPorCandidatos',
            'cotizacionesCandidatos',
            'ventasCandidatos',
            'empresasCandidatos',
            'coloniasCandidatos',
            'numeroProspectos',
            'detalleProspectos',
            'antiguedadProspectos',
            'numeroCitasProspectos',
            'citasProspectos',
            'citasPorProspectos',
            'cotizacionesProspectos',
            'ventasProspectos',
            'empresasProspectos',
            'coloniasProspectos',
            'numeroClientes',
            'detalleClientes',
            'citasClientes',
            'citasPorClientes',
            'cotizacionesClientes',
            'ventasClientes',
            'empresasClientes',
            'coloniasClientes',
            'antiguedadClientes',
            'numeroCitasClientes',
            'numeroDescartados',
            'detalleDescartados',
            'antiguedadDescartados',
            'numeroCitasDescartados',
            'citasDescartados',
            'citasPorDescartados',
            'cotizacionesDescartados',
            'ventasDescartados',
            'empresasDescartados',
            'coloniasDescartados',
            'empresas',
            'colonias',
            'numeroCitas',
            'citas',
            'tiposdeCita',
            'lugarCita',
            'productos'
        ));
    }

    public function storeContactos(Request $request)
    {
        $contacto = new Contactos();

        $contacto->funeraria = $request->funeraria;
        $contacto->nombre = $request->nombreContacto;
        $contacto->tipo = $request->tipo;
        $contacto->correo = $request->correo;
        $contacto->telefono = $request->telefono;
        $contacto->celular = $request->celular;
        $contacto->referenciado = $request->referenciado;
        $contacto->origen = $request->origen;
        $contacto->fechaNacimiento = $request->fechaNacimiento;
        $contacto->fechaIngreso = $request->fechaIngreso;
        $contacto->vigencia = $request->vigencia;
        $contacto->profesion = $request->profesion;
        $contacto->empresas_id = $request->empresa;
        $contacto->ingresos = $request->ingresos;
        $contacto->calle = $request->calle;
        $contacto->noExterior = $request->noExterior;
        $contacto->noInterior = $request->noInterior;
        $contacto->colonias_id = $request->colonias_id;
        $contacto->localidad = $request->localidad;
        $contacto->municipio = $request->municipio;
        $contacto->estado = $request->estado;
        $contacto->pais = $request->pais;
        $contacto->codPostal = $request->codPostal;
        $contacto->observaciones = $request->observaciones;
        $contacto->users_id = $request->usuario;

        $contacto->save();

        $detalles = new Detallecontactos();
        $faker = Faker::create();

        $detalles->funeraria = $request->funeraria;
        $detalles->nombre = $request->nombreContacto;
        $detalles->estado = 'por autorizar';
        $detalles->citas_id = rand(Citas::min('id'), Citas::max('id'));
        $detalles->users_id = rand(User::min('id'), User::max('id'));

        $contacto->detalle()->save($detalles);


        if ($contacto->tipo == 'Descartado') {
            $descartados = new Descartados();

            $faker = Faker::create();

            $descartados->fecha = $faker->date();
            $descartados->causa = $faker->randomElement(['precio', 'no le interesa', 'otro']);
            $descartados->users_id = rand(User::min('id'), User::max('id'));

            $contacto->descartado()->save($descartados);
        }

        $empresa = new Empresas();

        $faker = Faker::create();

        $empresa->nombreEmpresa = $request->empresa;
        $empresa->giro = $faker->randomElement(['Cremación', 'Floristería', 'Venta', 'Servicios de planificación y previsión funeraria']);
        $empresa->sitioWeb = $faker->sentence();
        $empresa->calle = $faker->streetName();
        $empresa->noExterior = $faker->buildingNumber();
        $empresa->noInterior = $faker->buildingNumber();
        $empresa->colonias_id = $faker->rand(Colonias::max('id'), Colonias::min('id'));
        $empresa->ciudad = $faker->city();
        $empresa->municipio = $faker->city();
        $empresa->estado = $faker->state();
        $empresa->codPostal = $faker->numberBetween(10000, 100000);
        $empresa->pais = $faker->country();
        $empresa->observaciones = $faker->paragraph();

        $empresa->save();

        $colonia = new Colonias();

        $colonia->colonia = $request->colonia;
        $colonia->codPostal = $request->codPostal;

        $colonia->save();

        return redirect()->route('contactos');
    }

    public function storeContactosCitas(Request $request)
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
        $detalleCita->estado = 'Por autorizar';
        $detalleCita->telefono = $faker->phoneNumber();
        $detalleCita->correo = $faker->unique()->safeEmail();
        $detalleCita->observaciones = $request->comentarios;
        $detalleCita->contactos_id = $request->persona_id;
        $detalleCita->citas_id = $cita->id;
        $detalleCita->users_id = $faker->numberBetween(User::min('id'), User::max('id'));
        $detalleCita->detalleContactos_id = $request->persona_id;

        $detalleCita->save();

        return redirect()->route('contactos');
    }

    public function storeContactosCotizaciones(Request $request)
    {
        $faker = Faker::create();

        // Obtener los datos del formulario
        $productoId = $request->input('productoCandidato');
        $cantidad = $request->input('cantidadCandidato');
        $descuento = $request->input('descuentoCandidato');
        $observaciones = $request->input('observacionesCandidato');
        $personaId = $request->input('personaCandidato_id');
        $preciosArray = $request->input('preciosCandidato');
        $totalesArray = $request->input('totalesCandidato');

        if (is_array($preciosArray) && is_array($totalesArray)) {
            foreach ($preciosArray as $index => $precio) {
                $cotizacion = new Cotizaciones();
                $cotizacion->productos_id = $productoId;
                $cotizacion->precio = $precio;
                $cotizacion->cantidad = $cantidad;
                $cotizacion->descuento = $descuento;
                $cotizacion->observaciones = $observaciones;
                $cotizacion->fecha = $faker->date();
                $cotizacion->total = $totalesArray[$index];
                $cotizacion->estado = $faker->word();
                $cotizacion->envios = $faker->word();
                $cotizacion->visitas = $faker->word();
                $cotizacion->contactos_id = $personaId;
                $cotizacion->users_id = $faker->numberBetween(User::min('id'), User::max('id'));

                $cotizacion->save();
            }
        } else {
            return redirect()->route('contactos')->with('error', 'Error al procesar los datos.');
        }

        return redirect()->route('contactos');
    }

    public function editCandidatos(Contactos $candidato)
    {
        return view('contactos', compact('candidato'));
    }

    public function updateCandidatos(Request $request, Contactos $candidato)
    {
        $candidato->funeraria = $request->funeraria;
        $candidato->nombre = $request->nombreContacto;
        $candidato->tipo = $request->tipo;
        $candidato->correo = $request->correo;
        $candidato->telefono = $request->telefono;
        $candidato->celular = $request->celular;
        $candidato->referenciado = $request->referenciado;
        $candidato->origen = $request->origen;
        $candidato->fechaNacimiento = $request->fechaNacimiento;
        $candidato->fechaIngreso = $request->fechaIngreso;
        $candidato->vigencia = $request->vigencia;
        $candidato->profesion = $request->profesion;
        $candidato->empresas_id = $request->empresa;
        $candidato->ingresos = $request->ingresos;
        $candidato->calle = $request->calle;
        $candidato->noExterior = $request->noExterior;
        $candidato->noInterior = $request->noInterior;
        $candidato->colonias_id = $request->colonias_id;
        $candidato->localidad = $request->localidad;
        $candidato->municipio = $request->municipio;
        $candidato->estado = $request->estado;
        $candidato->pais = $request->pais;
        $candidato->codPostal = $request->codPostal;
        $candidato->observaciones = $request->observaciones;
        $candidato->users_id = $request->usuario;

        $candidato->save();

        return redirect()->route('contactos');
    }

    public function destroyCandidatos(Contactos $candidato)
    {
        $candidato->delete();

        return redirect()->route('contactos');
    }

    public function updateVolverCandidato(Contactos $prospecto)
    {
        $prospecto->tipo = 'Candidato';
        $prospecto->save();

        return response()->json(['message' => 'Contacto actualizado con éxito']);
    }

    public function updateDescartarProspecto(Contactos $prospecto)
    {
        $prospecto->tipo = 'Descartado';
        $prospecto->save();

        return response()->json(['message' => 'Contacto actualizado con éxito']);
    }

    public function editProspectos(Contactos $prospecto)
    {
        return view('contactos', compact('prospecto'));
    }

    public function updateProspectos(Request $request, Contactos $prospecto)
    {
        $prospecto->funeraria = $request->funeraria;
        $prospecto->nombre = $request->nombreContacto;
        $prospecto->tipo = $request->tipo;
        $prospecto->correo = $request->correo;
        $prospecto->telefono = $request->telefono;
        $prospecto->celular = $request->celular;
        $prospecto->referenciado = $request->referenciado;
        $prospecto->origen = $request->origen;
        $prospecto->fechaNacimiento = $request->fechaNacimiento;
        $prospecto->fechaIngreso = $request->fechaIngreso;
        $prospecto->vigencia = $request->vigencia;
        $prospecto->profesion = $request->profesion;
        $prospecto->empresas_id = $request->empresa;
        $prospecto->ingresos = $request->ingresos;
        $prospecto->calle = $request->calle;
        $prospecto->noExterior = $request->noExterior;
        $prospecto->noInterior = $request->noInterior;
        $prospecto->colonias_id = $request->colonias_id;
        $prospecto->localidad = $request->localidad;
        $prospecto->municipio = $request->municipio;
        $prospecto->estado = $request->estado;
        $prospecto->pais = $request->pais;
        $prospecto->codPostal = $request->codPostal;
        $prospecto->observaciones = $request->observaciones;
        $prospecto->users_id = $request->usuario;

        $prospecto->save();

        return redirect()->route('contactos');
    }

    public function destroyProspectos(Contactos $prospecto)
    {
        $prospecto->delete();

        return redirect()->route('contactos');
    }

    public function updateVolverProspecto2(Contactos $cliente)
    {
        $cliente->tipo = 'Prospecto';
        $cliente->save();

        return response()->json(['message' => 'Contacto actualizado con éxito']);
    }

    public function editClientes(Contactos $cliente)
    {
        return view('contactos', compact('cliente'));
    }

    public function updateClientes(Request $request, Contactos $cliente)
    {
        $cliente->funeraria = $request->funeraria;
        $cliente->nombre = $request->nombreContacto;
        $cliente->tipo = $request->tipo;
        $cliente->correo = $request->correo;
        $cliente->telefono = $request->telefono;
        $cliente->celular = $request->celular;
        $cliente->referenciado = $request->referenciado;
        $cliente->origen = $request->origen;
        $cliente->fechaNacimiento = $request->fechaNacimiento;
        $cliente->fechaIngreso = $request->fechaIngreso;
        $cliente->vigencia = $request->vigencia;
        $cliente->profesion = $request->profesion;
        $cliente->empresas_id = $request->empresa;
        $cliente->ingresos = $request->ingresos;
        $cliente->calle = $request->calle;
        $cliente->noExterior = $request->noExterior;
        $cliente->noInterior = $request->noInterior;
        $cliente->colonias_id = $request->colonias_id;
        $cliente->localidad = $request->localidad;
        $cliente->municipio = $request->municipio;
        $cliente->estado = $request->estado;
        $cliente->pais = $request->pais;
        $cliente->codPostal = $request->codPostal;
        $cliente->observaciones = $request->observaciones;
        $cliente->users_id = $request->usuario;

        $cliente->save();

        return redirect()->route('contactos');
    }

    public function editDescartados(Contactos $descartado)
    {
        return view('contactos', compact('descartado'));
    }

    public function updateDescartados(Request $request, Contactos $descartado)
    {
        // dd($request);

        $descartado->nombre = $request->input('nombre');
        $descartado->tipo = $request->input('tipo');
        $descartado->empresas_id = $request->input('empresas_id');
        $descartado->users_id = $request->input('User_id');
        $descartado->save();

        return redirect()->route('contactos');
    }
}
