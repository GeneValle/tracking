<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminContactosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminDescartadosController;
use App\Http\Controllers\AdminUsuariosController;
use App\Http\Controllers\AutCitasController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\AutContactosController;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\ColoniasController;
use App\Http\Controllers\ContactosController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\CotizacionesController;
use App\Http\Controllers\DesempeñoController;
use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\OrigenesController;
use App\Http\Controllers\PreferenciasController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\reporteAsesoresController;
use App\Http\Controllers\ReporteCitasController;
use App\Http\Controllers\ReporteAnualController;
use App\Http\Controllers\ReporteDescartadosController;
use App\Http\Controllers\TipoCausaController;
use App\Http\Controllers\TipoCitasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    /* Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard'); */
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    Route::get('/equipo', [EquipoController::class, 'equipo'])->name('equipo');

    Route::put('/autContactos/{contactoPorAutorizar}', [AutContactosController::class, 'updateAutContactos'])->name('autContactos.update');
    Route::get('/autContactos', [AutContactosController::class, 'autContactos'])->name('autContactos');
    Route::delete('/autContactos/{contactoPorAutorizar}', [AutContactosController::class, 'destroyAutContactos'])->name('autContactos.destroy');

    Route::put('/autCitas/{citaPorAutorizar}', [AutCitasController::class, 'updateAutCitas'])->name('autCitas.update');
    Route::get('/autCitas', [AutCitasController::class, 'autCitas'])->name('autCitas');
    Route::delete('/autCitas/{citaPorAutorizar}', [AutCitasController::class, 'destroyAutCitas'])->name('autCitas.destroy');

    Route::get('/desempeño', [DesempeñoController::class, 'desempeño'])->name('desempeño');

    Route::get('/ranking', [RankingController::class, 'ranking'])->name('ranking');

    Route::put('/contactos/{candidato}', [ContactosController::class, 'updateVolverProspecto'])->name('contactos.updateVolverProspecto');
    Route::put('/contactos/{candidato}/descartar', [ContactosController::class, 'updateDescartarCandidato'])->name('contactos.updateDescartar');
    Route::get('/contactos', [ContactosController::class, 'contactos'])->name('contactos');
    Route::post('/contactos/store', [ContactosController::class, 'storeContactos'])->name('contactos.store');
    Route::post('/contactos/storeCitas', [ContactosController::class, 'storeContactosCitas'])->name('contactos.storeCitas');
    Route::post('/contactos/storeCotizaciones', [ContactosController::class, 'storeContactosCotizaciones'])->name('contactos.storeCotizaciones');
    Route::get('/contactos/{candidato}/edit', [ContactosController::class, 'editCandidatos'])->name('contactos.editCandidato');
    Route::put('/contactos/{candidato}/actualizar', [ContactosController::class, 'updateCandidatos'])->name('contactos.updateCandidato');
    Route::delete('/contactos/{candidato}', [ContactosController::class, 'destroyCandidatos'])->name('contactos.destroyCandidato');
    Route::put('/contactos/{prospecto}', [ContactosController::class, 'updateVolverCandidato'])->name('contactos.updateVolverCandidato');
    Route::put('/contactos/{prospecto}/descartar', [ContactosController::class, 'updateDescartarProspecto'])->name('contactos.updateDescartar');
    Route::get('/contactos/{prospecto}/edit', [ContactosController::class, 'editProspectos'])->name('contactos.editProspecto');
    Route::put('/contactos/{prospecto}/actualizar', [ContactosController::class, 'updateProspectos'])->name('contactos.updateProspecto');
    Route::delete('/contactos/{prospecto}', [ContactosController::class, 'destroyProspectos'])->name('contactos.destroyProspecto');
    Route::put('/contactos/{cliente}', [ContactosController::class, 'updateVolverProspecto2'])->name('contactos.updateVolverProspecto2');
    Route::get('/contactos/{cliente}/edit', [ContactosController::class, 'editClientes'])->name('contactos.editCliente');
    Route::put('/contactos/{cliente}/actualizar', [ContactosController::class, 'updateClientes'])->name('contactos.updateCliente');
    Route::get('/contactos/{descartado}/edit', [ContactosController::class, 'editDescartados'])->name('contactos.editDescartado');
    Route::put('contactos/{descartado}/activar', [ContactosController::class, 'activateDescartado'])->name('contactos.activateDescartado');
    
    Route::get('/ventas', [VentasController::class, 'ventas'])->name('ventas');
    Route::get('/cotizaciones', [CotizacionesController::class, 'cotizaciones'])->name('cotizaciones');
    Route::post('/cotizaciones/store', [CotizacionesController::class, 'storeCotizaciones'])->name('cotizaciones.store');

    Route::get('/citas', [CitasController::class, 'citas'])->name('citas');
    Route::post('/citas/store', [CitasController::class, 'storeCitas'])->name('citas.store');

    Route::get('/colonias', [ColoniasController::class, 'colonias'])->name('colonias');
    Route::post('/colonias/store', [ColoniasController::class, 'storeColonias'])->name('colonias.store');
    Route::get('/colonias/{colonia}/edit', [ColoniasController::class, 'editColonias'])->name('colonias.edit');
    Route::put('/colonias/{colonia}', [ColoniasController::class, 'updateColonias'])->name('colonias.update');
    Route::delete('/colonias/{colonia}', [ColoniasController::class, 'destroyColonias'])->name('colonias.destroy');

    Route::get('/empresas', [EmpresasController::class, 'empresas'])->name('empresas');
    Route::post('/empresas/store', [EmpresasController::class, 'storeEmpresas'])->name('empresas.store');
    Route::get('/empresas/{empresa}/edit', [EmpresasController::class, 'editEmpresas'])->name('empresas.edit');
    Route::put('/empresas/{empresa}', [EmpresasController::class, 'updateEmpresas'])->name('empresas.update');
    Route::delete('/empresas/{empresa}', [EmpresasController::class, 'destroyEmpresas'])->name('empresas.destroy');

    Route::get('/origenes', [OrigenesController::class, 'origenes'])->name('origenes');
    Route::post('/origenes/store', [OrigenesController::class, 'storeOrigenes'])->name('origenes.store');
    Route::get('/origenes/{origen}/edit', [OrigenesController::class, 'editOrigenes'])->name('origenes.edit');
    Route::put('/origenes/{origen}', [OrigenesController::class, 'updateOrigenes'])->name('origenes.update');
    Route::delete('/origenes/{origen}', [OrigenesController::class, 'destroyOrigenes'])->name('origenes.destroy');

    Route::get('/preferencias', [PreferenciasController::class, 'preferencias'])->name('preferencias');
    Route::post('/preferencias/store', [PreferenciasController::class, 'storePreferencias'])->name('preferencias.store');
    Route::get('/preferencias/{preferencia}/edit', [PreferenciasController::class, 'editPreferencias'])->name('preferencias.edit');
    Route::put('/preferencias/{preferencia}', [PreferenciasController::class, 'updatePreferencias'])->name('preferencias.update');
    Route::delete('/preferencias/{preferencia}', [PreferenciasController::class, 'destroyPreferencias'])->name('preferencias.destroy');

    Route::get('/tipoCita', [TipoCitasController::class, 'tipoCita'])->name('tipoCita');
    Route::post('/tipoCita/store', [TipoCitasController::class, 'storeTipoCita'])->name('tipoCita.store');
    Route::get('/tipoCita/{tipoCita}/edit', [TipoCitasController::class, 'editTipoCita'])->name('tipoCita.edit');
    Route::put('/tipoCita/{tipoCita}', [TipoCitasController::class, 'updateTipoCita'])->name('tipoCita.update');
    Route::delete('/tipoCita/{tipoCita}', [TipoCitasController::class, 'destroyTipoCita'])->name('tipoCita.destroy');

    Route::get('/productos', [ProductosController::class, 'productos'])->name('productos');
    Route::post('/productos/store', [ProductosController::class, 'storeProductos'])->name('productos.store');
    Route::get('/productos/{producto}/edit', [ProductosController::class, 'editProductos'])->name('productos.edit');
    Route::put('/productos/{producto}', [ProductosController::class, 'updateProductos'])->name('productos.update');
    Route::delete('/productos/{producto}', [ProductosController::class, 'destroyProductos'])->name('productos.destroy');

    Route::get('/tipoCausa', [TipoCausaController::class, 'tipoCausa'])->name('tipoCausa');
    Route::post('/tipoCausa/store', [TipoCausaController::class, 'storeTipoCausa'])->name('tipoCausa.store');
    Route::get('/tipoCausa/{tipoCausa}/edit', [TipoCausaController::class, 'editTipoCausa'])->name('tipoCausa.edit');
    Route::put('/tipoCausa/{tipoCausa}', [TipoCausaController::class, 'updateTipoCausa'])->name('tipoCausa.update');
    Route::delete('/tipoCausa/{tipoCausa}', [TipoCausaController::class, 'destroyTipoCausa'])->name('tipoCausa.destroy');

    Route::get('/reporteCitas', [ReporteCitasController::class, 'reporteCitas'])->name('reporteCitas');

    Route::get('/reporteAnual', [ReporteAnualController::class, 'reporteAnual'])->name('reporteAnual');

    Route::get('/reporteAsesores', [ReporteAsesoresController::class, 'reporteAsesores'])->name('reporteAsesores');
    Route::get('/reporteAsesores/obtenerDatosGeneralesGrafica', [ReporteAsesoresController::class, 'obtenerDatosGeneralesGrafica'])->name('reporteAsesores.obtenerDatosGeneralesGrafica');
    Route::post('/reporteAsesores/obtenerDatosAsesoresGrafica', [ReporteAsesoresController::class, 'obtenerDatosAsesoresGrafica'])->name('reporteAsesores.obtenerDatosAsesoresGrafica');

    Route::get('/reporteDescartados', [ReporteDescartadosController::class, 'reporteDescartados'])->name('reporteDescartados');

    Route::get('/adminContactos', [AdminContactosController::class, 'adminContactos'])->name('adminContactos');
    Route::get('/adminContactos/{candidato}/formReasignar', [AdminContactosController::class, 'formReasignarCandidatos'])->name('adminContactos.formReasignarCandidatos');
    Route::put('/adminContactos/{candidato}', [AdminContactosController::class, 'reasignarCandidatos'])->name('adminContactos.reasignarCandidatos');
    Route::get('/adminContactos/{prospecto}/formReasignar', [AdminContactosController::class, 'formReasignarProspectos'])->name('adminContactos.formReasignarProspectos');
    Route::get('/adminContactos/{prospecto}/formVigencia', [AdminContactosController::class, 'formVigenciaProspectos'])->name('adminContactos.formVigenciaProspectos');
    Route::put('/adminContactos/{prospecto}', [AdminContactosController::class, 'reasignarProspectos'])->name('adminContactos.reasignarProspectos');
    Route::put('/adminContactos/{prospecto}/vigencia', [AdminContactosController::class, 'vigenciaProspectos'])->name('adminContactos.vigenciaProspectos');
    Route::get('/adminContactos/{cliente}/formReasignar', [AdminContactosController::class, 'formReasignarClientes'])->name('adminContactos.formReasignarClientes');
    Route::get('/adminContactos/{cliente}/formVigencia', [AdminContactosController::class, 'formVigenciaClientes'])->name('adminContactos.formVigenciaClientes');
    Route::put('/adminContactos/{cliente}', [AdminContactosController::class, 'reasignarClientes'])->name('adminContactos.reasignarClientes');
    Route::put('/adminContactos/{cliente}/vigencia', [AdminContactosController::class, 'vigenciaClientes'])->name('adminContactos.vigenciaClientes');

    Route::get('/adminUsuarios', [AdminUsuariosController::class, 'adminUsuarios'])->name('adminUsuarios');
    Route::post('/adminUsuarios/store', [AdminUsuariosController::class, 'storeAdminUsuarios'])->name('adminUsuarios.store');
    Route::get('/adminUsuarios/{usuario}/edit', [AdminUsuariosController::class, 'editAdminUsuarios'])->name('adminUsuarios.edit');
    Route::put('/adminUsuarios/{usuario}', [AdminUsuariosController::class, 'updateAdminUsuarios'])->name('adminUsuarios.update');
    Route::delete('/adminUsuarios/{usuario}', [AdminUsuariosController::class, 'destroyAdminUsuarios'])->name('adminUsuarios.destroy');

    Route::get('/adminDescartados', [AdminDescartadosController::class, 'adminDescartados'])->name('adminDescartados');
    Route::get('/adminDescartados/{descartado}', [AdminDescartadosController::class, 'formActivarDescartados'])->name('adminDescartados.formActivarDescartados');
    Route::put('/adminDescartados/{descartado}', [AdminDescartadosController::class, 'activarDescartados'])->name('adminDescartados.activarDescartados');
});
