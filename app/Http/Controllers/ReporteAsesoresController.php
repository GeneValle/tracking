<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Ventas;

class ReporteAsesoresController extends Controller
{
    public function reporteAsesores()
    {
        $asesores = DB::table('users')
            ->where('puesto', 'asesor')
            ->get();

        return view(
            'reporteAsesores',
            compact(
                'asesores'
            )
        );
    }

    public function obtenerDatosGeneralesGrafica()
    {
        $prospectosTotales = DB::table('contactos')
            ->where('contactos.tipo', '=', 'Prospecto')
            ->count();

        $citasRealizadasTotales = DB::table('detallecitas')
            ->where('detallecitas.estado', '=', 'Realizada')
            ->count();

        $citasRegistradasTotales = DB::table('detallecitas')
            ->where('detallecitas.estado', '=', 'Programada')
            ->count();

        $ventasTotales = DB::table('ventas')
            ->count();

        return response()->json([
            'prospectosTotales' => $prospectosTotales,
            'citasRealizadasTotales' => $citasRealizadasTotales,
            'citasRegistradasTotales' => $citasRegistradasTotales,
            'ventasTotales' => $ventasTotales,
        ]);
    }

    public function obtenerDatosAsesoresGrafica(Request $request)
    {
        $colaboradorId = $request->input('colaboradores');
        $mes = $request->input('mes');
        $año = $request->input('año');

        $prospectosPorAsesor = DB::table('users')
            ->join('contactos', 'contactos.users_id', 'users.id')
            ->where('contactos.tipo', '=', 'Prospecto')
            ->where('contactos.users_id', '=', $colaboradorId)
            ->whereMonth('contactos.fechaIngreso', '=', $mes)
            ->whereYear('contactos.fechaIngreso', '=', $año)
            ->count();

        $citasRealizadasPorAsesor = DB::table('users')
            ->join('detallecitas', 'detallecitas.users_id', 'users.id')
            ->where('detallecitas.users_id', '=', $colaboradorId)
            ->whereMonth('detallecitas.fecha', '=', $mes)
            ->whereYear('detallecitas.fecha', '=', $año)
            ->where('detallecitas.estado', '=', 'Realizada')
            ->count();

        $citasRegistradasPorAsesor = DB::table('users')
            ->join('detallecitas', 'detallecitas.users_id', 'users.id')
            ->where('detallecitas.users_id', '=', $colaboradorId)
            ->whereMonth('detallecitas.fecha', '=', $mes)
            ->whereYear('detallecitas.fecha', '=', $año)
            ->where('detallecitas.estado', '=', 'Programada')
            ->count();

        $ventasPorAsesor = DB::table('users')
            ->join('ventas', 'ventas.users_id', 'users.id')
            ->where('ventas.users_id', '=', $colaboradorId)
            ->whereMonth('ventas.fecha', '=', $mes)
            ->whereYear('ventas.fecha', '=', $año)
            ->count();

        return response()->json([
            'prospectosPorAsesor' => $prospectosPorAsesor,
            'citasRealizadasPorAsesor' => $citasRealizadasPorAsesor,
            'citasRegistradasPorAsesor' => $citasRegistradasPorAsesor,
            'ventasPorAsesor' => $ventasPorAsesor
        ]);
    }
}

        // ->join('contactos', 'contactos.users_id', 'users.id')
        // ->join('contactos', 'contactos.users_id', 'users.id')


        /*  $prospectosTotales = DB::table('users')
            ->join('contactos', 'contactos.users_id', 'users.id')
            ->selectRaw('COUNT(*) AS prospectos')
            ->whereRaw('MONTH(contactos.fechaIngreso) = ? AND YEAR(contactos.fechaIngreso) = ?', [$mes, $año])
            ->get(); */

        /* $prospectosTotalesArray = [];
        foreach ($prospectosTotales as $prospecto) {
            $prospectosTotalesArray[] = $prospecto->prospectos;
        } */

        /* $prospectosPorAsesor = DB::table('users')
            ->join('contactos', 'contactos.users_id', 'users.id')
            ->selectRaw('COUNT(*) AS prospectosAsesor')
            ->whereRaw('contactos.users_id = ? AND MONTH(contactos.fechaIngreso) = ? AND YEAR(contactos.fechaIngreso) = ?', [$colaboradorId, $mes, $año])
            ->get(); */

        /* $prospectosAsesorArray = [];
        foreach ($prospectosPorAsesor as $prospectoAsesor) {
            $prospectosAsesorArray[] = $prospectoAsesor->prospectosAsesor;
        } */

        /* Categoría de prospectos */

        /* Categoría de citas Realizadas */

        /* $citasRealizadasTotales = DB::table('users')
            ->join('detallecitas', 'detallecitas.users_id', 'users.id')
            ->selectRaw('COUNT(*) AS citasRealizadas')
            ->whereRaw('MONTH(detallecitas.fecha) = ? AND YEAR(detallecitas.fecha) = ? AND detallecitas.estado = "Realizada" ',  [$mes, $año])
            ->get(); */

        /* $citasRealizadasTotalesArray = [];
        foreach ($citasRealizadasTotales as $citaRealizada) {
            $citasRealizadasTotalesArray[] = $citaRealizada->citasRealizadas;
        } */



        /* $citasRealizadasAsesorArray = [];
        foreach ($citasRealizadasPorAsesor as $citaRealizadaAsesor) {
            $citasRealizadasAsesorArray[] = $citaRealizadaAsesor->citasRealizadasAsesor;
        } */

        /* Categoría de citas Realizadas */

        /* Categoría de citas registradas */

        /* $citasRegistradasTotales = DB::table('users')
            ->join('detallecitas', 'detallecitas.users_id', 'users.id')
            ->selectRaw('COUNT(*) AS citasRegistradas')
            ->whereRaw('MONTH(detallecitas.fecha) = ? AND YEAR(detallecitas.fecha) = ? AND detallecitas.estado = "Programada" ',  [$mes, $año])
            ->get(); */

        /* $citasRegistradasTotalesArray = [];
        foreach ($citasRegistradasTotales as $citaRegistrada) {
            $citasRegistradasTotalesArray[] = $citaRegistrada->citasRegistradas;
        }
 */
        /* $citasRegistradasPorAsesor = DB::table('users')
            ->join('contactos', 'contactos.users_id', 'users.id')
            ->join('detallecitas', 'detallecitas.users_id', 'users.id')
            ->selectRaw('COUNT(*) AS citasRegistradasAsesor')
            ->whereRaw('contactos.users_id = ? AND MONTH(detallecitas.fecha) = ? AND YEAR(detallecitas.fecha) = ? AND detallecitas.estado = "Programada" ',  [$colaboradorId, $mes, $año])
            ->get();

        $citasRegistradasAsesorArray = [];
        foreach ($citasRegistradasPorAsesor as $citaRegistradaAsesor) {
            $citasRegistradasAsesorArray[] = $citaRegistradaAsesor->citasRegistradasAsesor;
        }
 */
        /* Categoría de citas registradas */

        /* Categoría de ventas */

        /* $ventasTotales = DB::table('users')
            ->join('ventas', 'ventas.users_id', 'users.id')
            ->selectRaw('COUNT(*) AS ventas')
            ->whereRaw('MONTH(ventas.fecha) = ? AND YEAR(ventas.fecha) = ?', [$mes, $año])
            ->get();

        $ventasTotalesArray = [];
        foreach ($ventasTotales as $venta) {
            $ventasTotalesArray[] = $venta->ventas;
        } */



        /* $ventasAsesorArray = [];
        foreach ($ventasPorAsesor as $ventaAsesor) {
            $ventasAsesorArray[] = $ventaAsesor->ventasAsesor;
        } */

        /* Categoría de ventas */
