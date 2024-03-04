<?php

namespace App\Http\Controllers;

use App\Models\Citas;
use App\Models\Colonias;
use App\Models\Contactos;
use App\Models\Descartados;
use App\Models\Detallecontactos;
use App\Models\Empresas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class AdminContactosController extends Controller
{
    public function adminContactos(Request $request)
    {
        $asesoresId = $request->input('asesores');

        $asesores = DB::table('users')
            ->where('puesto', 'asesor')
            ->get();

        $candidatosPorAsesor = DB::table('detallecontactos')
            ->select(
                'contactos.*',
                DB::raw('MAX(detallecontactos.estado) as estado')
            )
            ->join('contactos', 'detallecontactos.contactos_id', '=', 'contactos.id')
            ->join('users', 'detallecontactos.users_id', '=', 'users.id')
            ->where('detallecontactos.users_id', $asesoresId)
            ->where('contactos.tipo', 'Candidato')
            ->groupBy(
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
                'contactos.updated_at'
            )
            ->get();

        $numeroCandidatosPorAsesor = DB::table('detallecontactos')
            ->join('contactos', 'detallecontactos.contactos_id', '=', 'contactos.id')
            ->join('users', 'detallecontactos.users_id', '=', 'users.id')
            ->where('detallecontactos.users_id', $asesoresId)
            ->where('contactos.tipo', 'Candidato')
            ->selectRaw('COUNT(DISTINCT contactos.id) + (COUNT(*) - COUNT(DISTINCT detallecontactos.id)) as numeroCandidatos')
            ->get()
            ->first();

        if ($numeroCandidatosPorAsesor) {
            $numeroCandidatos = $numeroCandidatosPorAsesor->numeroCandidatos;
        } else {
            $numeroCandidatos = 0;
        }

        $antiguedadCandidatosPorAsesor = DB::table('detallecontactos')
            ->select(
                'contactos.funeraria',
                'contactos.nombre',
                DB::raw('DATEDIFF(now(), contactos.fechaIngreso) AS diasDesdeIngreso')
            )
            ->join('contactos', 'detallecontactos.contactos_id', '=', 'contactos.id')
            ->join('users', 'detallecontactos.users_id', '=', 'users.id')
            ->where('detallecontactos.users_id', $asesoresId)
            ->where('contactos.tipo', 'Candidato')
            ->get();

        $vigenciaCandidatosPorAsesor = DB::table('detallecontactos')
            ->select('contactos.vigencia')
            ->join('contactos', 'detallecontactos.contactos_id', '=', 'contactos.id')
            ->join('users', 'detallecontactos.users_id', '=', 'users.id')
            ->where('detallecontactos.users_id', $asesoresId)
            ->where('contactos.tipo', 'Candidato')
            ->get();

        $citasPorCandidatos = DB::table('detallecontactos')
            ->selectRaw('contactos.id, contactos.funeraria, contactos.nombre, COUNT(DISTINCT detallecitas.citas_id) AS noCitas')
            ->leftJoin('contactos', 'detallecontactos.contactos_id', '=', 'contactos.id')
            ->leftJoin('detallecitas', 'detallecontactos.id', '=', 'detallecitas.detallecontactos_id')
            ->where('detallecontactos.users_id', $asesoresId)
            ->where('contactos.tipo', 'Candidato')
            ->groupBy('contactos.id', 'contactos.funeraria', 'contactos.nombre')
            ->get();

        // dd($citasPorCandidatos);

        $ultimaCitaCandidatosPorAsesor = DB::table('detallecontactos')
            ->selectRaw('contactos.funeraria, contactos.nombre, MAX(detallecitas.fecha) AS ultimaCita')
            ->join('contactos', 'detallecontactos.contactos_id', '=', 'contactos.id')
            ->leftJoin('detallecitas', 'detallecontactos.id', '=', 'detallecitas.detallecontactos_id')
            ->where('detallecontactos.users_id', $asesoresId)
            ->where('contactos.tipo', 'Candidato')
            ->groupBy('contactos.id', 'contactos.funeraria', 'contactos.nombre')
            ->get();

        $numeroCitasCandidatos = DB::table('detallecontactos')
            //     ->select(DB::raw('count(detallecitas.citas_id) as noCitasCandidatos'))
            ->leftJoin('contactos', 'detallecontactos.contactos_id', '=', 'contactos.id')
            ->join('detallecitas', 'detallecontactos.id', '=', 'detallecitas.detallecontactos_id')
            ->leftJoin('citas', 'detallecitas.citas_id', '=', 'citas.id')
            ->where('contactos.tipo', 'Candidato')
            ->count();

        $citasCandidatos = [];
        foreach ($candidatosPorAsesor as $candidato) {
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

        $prospectosPorAsesor = DB::table('detallecontactos')
            ->select(
                'contactos.*',
                DB::raw('MAX(detallecontactos.estado) as estado')
            )
            ->join('contactos', 'detallecontactos.contactos_id', '=', 'contactos.id')
            ->join('users', 'detallecontactos.users_id', '=', 'users.id')
            ->where('detallecontactos.users_id', $asesoresId)
            ->where('contactos.tipo', 'Prospecto')
            ->groupBy(
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
                'contactos.updated_at'
            )
            ->get();

        $numeroProspectosPorAsesor = DB::table('detallecontactos')
            ->join('contactos', 'detallecontactos.contactos_id', '=', 'contactos.id')
            ->join('users', 'detallecontactos.users_id', '=', 'users.id')
            ->where('detallecontactos.users_id', $asesoresId)
            ->where('contactos.tipo', 'Prospecto')
            ->selectRaw('COUNT(DISTINCT contactos.id) + (COUNT(*) - COUNT(DISTINCT detallecontactos.id)) as numeroProspectos')
            ->get()
            ->first();

        if ($numeroProspectosPorAsesor) {
            $numeroProspectos = $numeroProspectosPorAsesor->numeroProspectos;
        } else {
            $numeroProspectos = 0;
        }

        $antiguedadProspectosPorAsesor = DB::table('detallecontactos')
            ->select(
                'contactos.funeraria',
                'contactos.nombre',
                DB::raw('DATEDIFF(now(), contactos.fechaIngreso) AS diasDesdeIngreso')
            )
            ->join('contactos', 'detallecontactos.contactos_id', '=', 'contactos.id')
            ->join('users', 'detallecontactos.users_id', '=', 'users.id')
            ->where('detallecontactos.users_id', $asesoresId)
            ->where('contactos.tipo', 'Prospecto')
            ->get();

        $vigenciaProspectosPorAsesor = DB::table('detallecontactos')
            ->select('contactos.vigencia')
            ->join('contactos', 'detallecontactos.contactos_id', '=', 'contactos.id')
            ->join('users', 'detallecontactos.users_id', '=', 'users.id')
            ->where('detallecontactos.users_id', $asesoresId)
            ->where('contactos.tipo', 'Prospecto')
            ->get();

        $citasPorProspectos = DB::table('detallecontactos')
            ->selectRaw('contactos.id, contactos.funeraria, contactos.nombre, COUNT(DISTINCT detallecitas.citas_id) AS noCitas')
            ->leftJoin('contactos', 'detallecontactos.contactos_id', '=', 'contactos.id')
            ->leftJoin('detallecitas', 'detallecontactos.id', '=', 'detallecitas.detallecontactos_id')
            ->where('detallecontactos.users_id', $asesoresId)
            ->where('contactos.tipo', 'Prospecto')
            ->groupBy('contactos.id', 'contactos.funeraria', 'contactos.nombre')
            ->get();

        $ultimaCitaProspectosPorAsesor = DB::table('detallecontactos')
            ->selectRaw('contactos.funeraria, contactos.nombre, MAX(detallecitas.fecha) AS ultimaCita')
            ->join('contactos', 'detallecontactos.contactos_id', '=', 'contactos.id')
            ->leftJoin('detallecitas', 'detallecontactos.id', '=', 'detallecitas.detallecontactos_id')
            ->where('detallecontactos.users_id', $asesoresId)
            ->where('contactos.tipo', 'Prospecto')
            ->groupBy('contactos.id', 'contactos.funeraria', 'contactos.nombre')
            ->get();

        $numeroCitasProspectos = DB::table('detallecontactos')
            //     ->select(DB::raw('count(detallecitas.citas_id) as noCitasCandidatos'))
            ->leftJoin('contactos', 'detallecontactos.contactos_id', '=', 'contactos.id')
            ->join('detallecitas', 'detallecontactos.id', '=', 'detallecitas.detallecontactos_id')
            ->leftJoin('citas', 'detallecitas.citas_id', '=', 'citas.id')
            ->where('contactos.tipo', 'Prospecto')
            ->count();

        $citasProspectos = [];
        foreach ($prospectosPorAsesor as $prospecto) {
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

        $empresasProspectos = DB::table('contactos')
            ->join('empresas', 'contactos.empresas_id', '=', 'empresas.id')
            ->select('empresas.id', 'empresas.nombreEmpresa')
            ->where('contactos.tipo', 'Prospecto')
            ->orderBy('contactos.id')
            ->get();

        $coloniasProspectos = DB::table('contactos')
            ->join('colonias', 'contactos.colonias_id', '=', 'colonias.id')
            ->select('colonias.id', 'colonias.colonia')
            ->where('contactos.tipo', 'Prospecto')
            ->orderBy('contactos.id')
            ->get();

        $clientesPorAsesor = DB::table('detallecontactos')
            ->select(
                'contactos.*',
                DB::raw('MAX(detallecontactos.estado) as estado')
            )
            ->join('contactos', 'detallecontactos.contactos_id', '=', 'contactos.id')
            ->join('users', 'detallecontactos.users_id', '=', 'users.id')
            ->where('detallecontactos.users_id', $asesoresId)
            ->where('contactos.tipo', 'Cliente')
            ->groupBy(
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
                'contactos.updated_at'
            )
            ->get();

        $numeroClientesPorAsesor = DB::table('detallecontactos')
            ->join('contactos', 'detallecontactos.contactos_id', '=', 'contactos.id')
            ->join('users', 'detallecontactos.users_id', '=', 'users.id')
            ->where('detallecontactos.users_id', $asesoresId)
            ->where('contactos.tipo', 'Cliente')
            ->selectRaw('COUNT(DISTINCT contactos.id) + (COUNT(*) - COUNT(DISTINCT detallecontactos.id)) as numeroClientes')
            ->get()
            ->first();

        if ($numeroClientesPorAsesor) {
            $numeroClientes = $numeroClientesPorAsesor->numeroClientes;
        } else {
            $numeroClientes = 0;
        }

        $antiguedadClientesPorAsesor = DB::table('detallecontactos')
            ->select(
                'contactos.funeraria',
                'contactos.nombre',
                DB::raw('DATEDIFF(now(), contactos.fechaIngreso) AS diasDesdeIngreso')
            )
            ->join('contactos', 'detallecontactos.contactos_id', '=', 'contactos.id')
            ->join('users', 'detallecontactos.users_id', '=', 'users.id')
            ->where('detallecontactos.users_id', $asesoresId)
            ->where('contactos.tipo', 'Cliente')
            ->get();

        $vigenciaClientesPorAsesor = DB::table('detallecontactos')
            ->select('contactos.vigencia')
            ->join('contactos', 'detallecontactos.contactos_id', '=', 'contactos.id')
            ->join('users', 'detallecontactos.users_id', '=', 'users.id')
            ->where('detallecontactos.users_id', $asesoresId)
            ->where('contactos.tipo', 'Cliente')
            ->get();

        $citasPorClientes = DB::table('detallecontactos')
            ->selectRaw('contactos.id, contactos.funeraria, contactos.nombre, COUNT(DISTINCT detallecitas.citas_id) AS noCitas')
            ->leftJoin('contactos', 'detallecontactos.contactos_id', '=', 'contactos.id')
            ->leftJoin('detallecitas', 'detallecontactos.id', '=', 'detallecitas.detallecontactos_id')
            ->where('detallecontactos.users_id', $asesoresId)
            ->where('contactos.tipo', 'Cliente')
            ->groupBy('contactos.id', 'contactos.funeraria', 'contactos.nombre')
            ->get();

        $ultimaCitaClientesPorAsesor = DB::table('detallecontactos')
            ->selectRaw('contactos.funeraria, contactos.nombre, MAX(detallecitas.fecha) AS ultimaCita')
            ->join('contactos', 'detallecontactos.contactos_id', '=', 'contactos.id')
            ->leftJoin('detallecitas', 'detallecontactos.id', '=', 'detallecitas.detallecontactos_id')
            ->where('detallecontactos.users_id', $asesoresId)
            ->where('contactos.tipo', 'Cliente')
            ->groupBy('contactos.id', 'contactos.funeraria', 'contactos.nombre')
            ->get();

        $citasClientes = [];
        foreach ($clientesPorAsesor as $cliente) {
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

        $empresasClientes = DB::table('contactos')
            ->join('empresas', 'contactos.empresas_id', '=', 'empresas.id')
            ->select('empresas.id', 'empresas.nombreEmpresa')
            ->where('contactos.tipo', 'Cliente')
            ->orderBy('contactos.id')
            ->get();

        $coloniasClientes = DB::table('contactos')
            ->join('colonias', 'contactos.colonias_id', '=', 'colonias.id')
            ->select('colonias.id', 'colonias.colonia')
            ->where('contactos.tipo', 'Cliente')
            ->orderBy('contactos.id')
            ->get();

        return view(
            'adminContactos',
            compact(
                'asesores',
                'candidatosPorAsesor',
                'numeroCandidatosPorAsesor',
                'antiguedadCandidatosPorAsesor',
                'vigenciaCandidatosPorAsesor',
                'citasPorCandidatos',
                'ultimaCitaCandidatosPorAsesor',
                'citasCandidatos',
                'empresasCandidatos',
                'coloniasCandidatos',
                'prospectosPorAsesor',
                'numeroProspectosPorAsesor',
                'antiguedadProspectosPorAsesor',
                'vigenciaProspectosPorAsesor',
                'citasPorProspectos',
                'ultimaCitaProspectosPorAsesor',
                'numeroCitasProspectos',
                'citasProspectos',
                'empresasProspectos',
                'coloniasProspectos',
                'clientesPorAsesor',
                'numeroClientesPorAsesor',
                'antiguedadClientesPorAsesor',
                'vigenciaClientesPorAsesor',
                'citasPorClientes',
                'ultimaCitaClientesPorAsesor',
                'citasClientes',
                'empresasClientes',
                'coloniasClientes'
                // 'numeroCitasCandidatosPorAsesor',
                // 'numeroCitasProspectosPorAsesor',
                // 'numeroCitasClientesPorAsesor',

            )
        );
    }

    public function formReasignarCandidatos(Contactos $candidato)
    {
        return view('adminContactos', compact('candidato'));
    }

    public function formReasignarProspectos(Contactos $prospecto)
    {
        return view('adminContactos', compact('prospecto'));
    }

    public function formVigenciaProspectos(Contactos $prospecto)
    {
        return view('adminContactos', compact('prospecto'));
    }

    public function formReasignarClientes(Contactos $cliente)
    {
        return view('adminContactos', compact('cliente'));
    }

    public function formVigenciaClientes(Contactos $cliente)
    {
        return view('adminContactos', compact('cliente'));
    }


    public function reasignarCandidatos(Request $request, Contactos $candidato)
    {
        $candidato->users_id = $request->input('usuarioCandidato');
        $candidato->save();

        return redirect()->route('adminContactos')->with('success', 'Contacto reasignado exitosamente');
    }

    public function reasignarProspectos(Request $request, Contactos $prospecto)
    {
        $prospecto->users_id = $request->input('usuarioProspecto');
        $prospecto->save();

        return redirect()->route('adminContactos')->with('success', 'Contacto reasignado exitosamente');
    }

    public function vigenciaProspectos(Request $request, Contactos $prospecto)
    {
        $prospecto->vigencia = $request->input('fechaVigenciaProspecto');
        $prospecto->save();

        return redirect()->route('adminContactos')->with('success', 'Vigencia de contacto actualizada correctamente');
    }

    public function reasignarClientes(Request $request, Contactos $cliente)
    {
        $cliente->users_id = $request->input('UsuarioCliente');
        $cliente->save();

        return redirect()->route('adminContactos')->with('success', 'Contacto reasignado exitosamente');
    }

    public function vigenciaClientes(Request $request, Contactos $cliente)
    {
        // dd($request->all());

        $cliente->update(['vigencia' => $request->input('fechaVigenciaCliente')]);
        $cliente->save();

        return redirect()->route('adminContactos')->with('success', 'Vigencia de contacto actualizada correctamente');
    }
}
    /* private function updateContacto(Request $request, Contactos $contacto) {
        $contacto->User_id = $request->input('usuario');
        $contacto->save();

        // Redireccionar según el tipo de contacto
        switch ($contacto->tipo) {
            case 'candidato':
                return redirect()->route('adminContactos.editCandidatos')->with('success', 'Candidato reasignado exitosamente');
            case 'prospecto':
                return redirect()->route('adminContactos.editProspectos')->with('success', 'Prospecto reasignado exitosamente');
            case 'cliente':
                return redirect()->route('adminContactos.editClientes')->with('success', 'Cliente reasignado exitosamente');
            default:
                
        }
    } */

    /* public function storeContactos(Request $request)
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
        $contacto->User_id = $request->usuario;

        $contacto->save();

        $detalles = new Detallecontactos();
        $faker = Faker::create();

        $detalles->funeraria = $request->funeraria;
        $detalles->nombre = $request->nombreContacto;
        $detalles->estado = 'por autorizar';
        $detalles->citas_id = rand(Citas::min('id'), Citas::max('id'));
        $detalles->User_id = rand(User::min('id'), User::max('id'));

        $contacto->detalle()->save($detalles);


        if ($contacto->tipo == 'Descartado') {
            $descartados = new Descartados();

            $faker = Faker::create();

            $descartados->fecha = $faker->date();
            $descartados->causa = $faker->randomElement(['precio', 'no le interesa', 'otro']);
            $descartados->User_id = rand(User::min('id'), User::max('id'));

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
    }*/

    /* $numeroCitasProspectosPorAsesor = DB::table('detallecontactos')
            ->selectRaw('contactos.id, contactos.funeraria, contactos.nombre, COUNT(DISTINCT detallecitas.citas_id) AS noCitas')
            ->leftjoin('contactos', 'detallecontactos.contactos_id', '=', 'contactos.id')
            ->leftJoin('detallecitas', 'detallecontactos.id', '=', 'detallecitas.detallecontactos_id')
            ->where('detallecontactos.User_id', $asesoresId)
            ->where('contactos.tipo', 'Prospecto')
            ->groupBy('contactos.id', 'contactos.funeraria', 'contactos.nombre')
            ->get();

        $numeroCitasClientesPorAsesor = DB::table('detallecontactos')
            ->selectRaw('contactos.id, contactos.funeraria, contactos.nombre, COUNT(DISTINCT detallecitas.citas_id) AS noCitas')
            ->join('contactos', 'detallecontactos.contactos_id', '=', 'contactos.id')
            ->leftJoin('detallecitas', 'detallecontactos.id', '=', 'detallecitas.detallecontactos_id')
            ->where('detallecontactos.User_id', $asesoresId)
            ->where('contactos.tipo', 'Cliente')
            ->groupBy('contactos.id', 'contactos.funeraria', 'contactos.nombre')
            ->get(); */

