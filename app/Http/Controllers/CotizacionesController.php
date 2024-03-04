<?php

namespace App\Http\Controllers;


use App\Models\Cotizaciones;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CotizacionesController extends Controller
{
    public function cotizaciones(Request $request)
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

        $prospectos = DB::table('cotizaciones')
            ->join('contactos', 'cotizaciones.contactos_id', '=', 'contactos.id')
            ->select('contactos.id', DB::raw("CONCAT(contactos.funeraria, ' - ', contactos.nombre) as nombre"))
            ->distinct()
            ->get();

        // dd($prospectos);

        $productos = DB::table('cotizaciones')
            ->join('productos', 'cotizaciones.productos_id', '=', 'productos.id')
            ->select('productos.*')
            ->distinct('productos.producto')
            ->get();

        $cotizaciones = [];

        if ($colaboradorId || $fechaInicio || $fechaFin) {
            $cotizaciones = DB::table('cotizaciones')
                ->join('contactos', 'cotizaciones.contactos_id', '=', 'contactos.id')
                ->when($colaboradorId, function ($query) use ($colaboradorId) {
                    return $query->where('cotizaciones.users_id', $colaboradorId);
                })
                ->when($fechaInicio, function ($query) use ($fechaInicio) {
                    return $query->whereDate('cotizaciones.fecha', '>=', $fechaInicio);
                })
                ->when($fechaFin, function ($query) use ($fechaFin) {
                    return $query->whereDate('cotizaciones.fecha', '<=', $fechaFin);
                })
                ->select(
                    'cotizaciones.id',
                    'cotizaciones.fecha',
                    'contactos.nombre',
                    'cotizaciones.observaciones',
                    'cotizaciones.envios',
                    'cotizaciones.visitas',
                    'cotizaciones.total',
                    'cotizaciones.estado'
                )
                ->get();
        }

        $cotizacionesCount = count($cotizaciones);

        return view('cotizaciones', compact('usuarios', 'prospectos', 'productos', 'cotizaciones', 'cotizacionesCount'));
    }

    public function storeCotizaciones(Request $request)
    {
        $faker = Faker::create();

        // Obtener los datos del formulario
        $productoId = $request->input('producto');
        $cantidad = $request->input('cantidad');
        $descuento = $request->input('descuento');
        $observaciones = $request->input('observaciones');
        $personaId = $request->input('prospecto');
        $fecha = $request->input('fecha');
        $preciosArray = $request->input('precios');
        $totalesArray = $request->input('totales');

        if (is_array($preciosArray) && is_array($totalesArray)) {
            foreach ($preciosArray as $index => $precio) {
                $cotizacion = new Cotizaciones();
                $cotizacion->productos_id = $productoId;
                $cotizacion->precio = $precio;
                $cotizacion->cantidad = $cantidad;
                $cotizacion->descuento = $descuento;
                $cotizacion->observaciones = $observaciones;
                $cotizacion->fecha = $fecha;
                $cotizacion->total = $totalesArray[$index];
                $cotizacion->estado = $faker->word();
                $cotizacion->envios = $faker->word();
                $cotizacion->visitas = $faker->word();
                $cotizacion->contactos_id = $personaId;
                $cotizacion->users_id = $faker->numberBetween(User::min('id'), User::max('id'));

                $cotizacion->save();
            }
        } else {
            return redirect()->route('cotizaciones')->with('error', 'Error al procesar los datos.');
        }

        return redirect()->route('cotizaciones');
    }
}
