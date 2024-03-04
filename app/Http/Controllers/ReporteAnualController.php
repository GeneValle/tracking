<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReporteAnualController extends Controller
{
    public function reporteAnual(Request $request)
    {
        $colaboradorId = $request->input('colaboradores');
        $añoInicio = $request->input('añoInicio');
        $añoFin = $request->input('añoFin');

        $asesores = DB::table('users')
            ->where('puesto', 'asesor')
            ->get();

        $totalVentasPorAño = $this->getTotalVentasPorAño();
        $years = $totalVentasPorAño['years'];
        $totalVentasPorAño = $totalVentasPorAño['data'];

        $totalVentasGeneralesEneroPorAño = $this->getTotalVentasGeneralesEneroPorAño();
        $totalVentasGeneralesFebreroPorAño = $this->getTotalVentasGeneralesFebreroPorAño();
        $totalVentasGeneralesMarzoPorAño = $this->getTotalVentasGeneralesMarzoPorAño();
        $totalVentasGeneralesAbrilPorAño = $this->getTotalVentasGeneralesAbrilPorAño();
        $totalVentasGeneralesMayoPorAño = $this->getTotalVentasGeneralesMayoPorAño();
        $totalVentasGeneralesJunioPorAño = $this->getTotalVentasGeneralesJunioPorAño();
        $totalVentasGeneralesJulioPorAño = $this->getTotalVentasGeneralesJulioPorAño();
        $totalVentasGeneralesAgostoPorAño = $this->getTotalVentasGeneralesAgostoPorAño();
        $totalVentasGeneralesSeptiembrePorAño = $this->getTotalVentasGeneralesSeptiembrePorAño();
        $totalVentasGeneralesOctubrePorAño = $this->getTotalVentasGeneralesOctubrePorAño();
        $totalVentasGeneralesNoviembrePorAño = $this->getTotalVentasGeneralesNoviembrePorAño();
        $totalVentasGeneralesDiciembrePorAño = $this->getTotalVentasGeneralesDiciembrePorAño();

        $totalVentasPorAsesorEntreAños = $this->getTotalVentasPorAsesorEntreAños($colaboradorId, $añoInicio, $añoFin);
        $totalVentasEneroPorAño = $this->getTotalVentasEneroPorAño($colaboradorId, $añoInicio, $añoFin);
        $totalVentasFebreroPorAño = $this->getTotalVentasFebreroPorAño($colaboradorId, $añoInicio, $añoFin);
        $totalVentasMarzoPorAño = $this->getTotalVentasMarzoPorAño($colaboradorId, $añoInicio, $añoFin);
        $totalVentasAbrilPorAño = $this->getTotalVentasAbrilPorAño($colaboradorId, $añoInicio, $añoFin);
        $totalVentasMayoPorAño = $this->getTotalVentasMayoPorAño($colaboradorId, $añoInicio, $añoFin);
        $totalVentasJunioPorAño = $this->getTotalVentasJunioPorAño($colaboradorId, $añoInicio, $añoFin);
        $totalVentasJulioPorAño = $this->getTotalVentasJulioPorAño($colaboradorId, $añoInicio, $añoFin);
        $totalVentasAgostoPorAño = $this->getTotalVentasAgostoPorAño($colaboradorId, $añoInicio, $añoFin);
        $totalVentasSeptiembrePorAño = $this->getTotalVentasSeptiembrePorAño($colaboradorId, $añoInicio, $añoFin);
        $totalVentasOctubrePorAño = $this->getTotalVentasOctubrePorAño($colaboradorId, $añoInicio, $añoFin);
        $totalVentasNoviembrePorAño = $this->getTotalVentasNoviembrePorAño($colaboradorId, $añoInicio, $añoFin);
        $totalVentasDiciembrePorAño = $this->getTotalVentasDiciembrePorAño($colaboradorId, $añoInicio, $añoFin);

        $alignedDataEnero = [];

        foreach ($this->getTotalVentasPorAño()['years'] as $year) {
            $matchingData = $totalVentasEneroPorAño->firstWhere('año', $year);

            if ($matchingData) {
                $alignedDataEnero[] = $matchingData->totalVentasEnero;
            } else {
                $alignedDataEnero[] = 0;
            }
        }

        $alignedDataGeneralEnero = [];

        foreach ($this->getTotalVentasPorAño()['years'] as $year) {
            $matchingData = $totalVentasGeneralesEneroPorAño->firstWhere('año', $year);

            if ($matchingData) {
                $alignedDataGeneralEnero[] = $matchingData->totalVentasGeneralesEnero;
            } else {
                $alignedDataGeneralEnero[] = 0;
            }
        }

        $alignedDataFebrero = [];

        foreach ($this->getTotalVentasPorAño()['years'] as $year) {
            $matchingData = $totalVentasFebreroPorAño->firstWhere('año', $year);

            if ($matchingData) {
                $alignedDataFebrero[] = $matchingData->totalVentasFebrero;
            } else {
                $alignedDataFebrero[] = 0;
            }
        }

        $alignedDataGeneralFebrero = [];

        foreach ($this->getTotalVentasPorAño()['years'] as $year) {
            $matchingData = $totalVentasGeneralesFebreroPorAño->firstWhere('año', $year);

            if ($matchingData) {
                $alignedDataGeneralFebrero[] = $matchingData->totalVentasGeneralesFebrero;
            } else {
                $alignedDataGeneralFebrero[] = 0;
            }
        }

        $alignedDataMarzo = [];

        foreach ($this->getTotalVentasPorAño()['years'] as $year) {
            $matchingData = $totalVentasMarzoPorAño->firstWhere('año', $year);

            if ($matchingData) {
                $alignedDataMarzo[] = $matchingData->totalVentasMarzo;
            } else {
                $alignedDataMarzo[] = 0;
            }
        }

        $alignedDataGeneralMarzo = [];

        foreach ($this->getTotalVentasPorAño()['years'] as $year) {
            $matchingData = $totalVentasGeneralesMarzoPorAño->firstWhere('año', $year);

            if ($matchingData) {
                $alignedDataGeneralMarzo[] = $matchingData->totalVentasGeneralesMarzo;
            } else {
                $alignedDataGeneralMarzo[] = 0; 
            }
        }

        $alignedDataAbril = [];

        foreach ($this->getTotalVentasPorAño()['years'] as $year) {
            $matchingData = $totalVentasAbrilPorAño->firstWhere('año', $year);

            if ($matchingData) {
                $alignedDataAbril[] = $matchingData->totalVentasAbril;
            } else {
                $alignedDataAbril[] = 0;
            }
        }

        $alignedDataGeneralAbril = [];

        foreach ($this->getTotalVentasPorAño()['years'] as $year) {
            $matchingData = $totalVentasGeneralesAbrilPorAño->firstWhere('año', $year);

            if ($matchingData) {
                $alignedDataGeneralAbril[] = $matchingData->totalVentasGeneralesAbril;
            } else {
                $alignedDataGeneralAbril[] = 0; 
            }
        }

        $alignedDataMayo = [];

        foreach ($this->getTotalVentasPorAño()['years'] as $year) {
            $matchingData = $totalVentasMayoPorAño->firstWhere('año', $year);

            if ($matchingData) {
                $alignedDataMayo[] = $matchingData->totalVentasMayo;
            } else {
                $alignedDataMayo[] = 0;
            }
        }

        $alignedDataGeneralMayo = [];

        foreach ($this->getTotalVentasPorAño()['years'] as $year) {
            $matchingData = $totalVentasGeneralesMayoPorAño->firstWhere('año', $year);

            if ($matchingData) {
                $alignedDataGeneralMayo[] = $matchingData->totalVentasGeneralesMayo;
            } else {
                $alignedDataGeneralMayo[] = 0; 
            }
        }

        $alignedDataJunio = [];

        foreach ($this->getTotalVentasPorAño()['years'] as $year) {
            $matchingData = $totalVentasJunioPorAño->firstWhere('año', $year);

            if ($matchingData) {
                $alignedDataJunio[] = $matchingData->totalVentasJunio;
            } else {
                $alignedDataJunio[] = 0;
            }
        }

        $alignedDataGeneralJunio = [];

        foreach ($this->getTotalVentasPorAño()['years'] as $year) {
            $matchingData = $totalVentasGeneralesJunioPorAño->firstWhere('año', $year);

            if ($matchingData) {
                $alignedDataGeneralJunio[] = $matchingData->totalVentasGeneralesJunio;
            } else {
                $alignedDataGeneralJunio[] = 0; 
            }
        }

        $alignedDataJulio = [];

        foreach ($this->getTotalVentasPorAño()['years'] as $year) {
            $matchingData = $totalVentasJulioPorAño->firstWhere('año', $year);

            if ($matchingData) {
                $alignedDataJulio[] = $matchingData->totalVentasJulio;
            } else {
                $alignedDataJulio[] = 0;
            }
        }

        $alignedDataGeneralJulio = [];

        foreach ($this->getTotalVentasPorAño()['years'] as $year) {
            $matchingData = $totalVentasGeneralesJulioPorAño->firstWhere('año', $year);

            if ($matchingData) {
                $alignedDataGeneralJulio[] = $matchingData->totalVentasGeneralesJulio;
            } else {
                $alignedDataGeneralJulio[] = 0; 
            }
        }

        $alignedDataAgosto = [];

        foreach ($this->getTotalVentasPorAño()['years'] as $year) {
            $matchingData = $totalVentasAgostoPorAño->firstWhere('año', $year);

            if ($matchingData) {
                $alignedDataAgosto[] = $matchingData->totalVentasAgosto;
            } else {
                $alignedDataAgosto[] = 0;
            }
        }

        $alignedDataGeneralAgosto = [];

        foreach ($this->getTotalVentasPorAño()['years'] as $year) {
            $matchingData = $totalVentasGeneralesAgostoPorAño->firstWhere('año', $year);

            if ($matchingData) {
                $alignedDataGeneralAgosto[] = $matchingData->totalVentasGeneralesAgosto;
            } else {
                $alignedDataGeneralAgosto[] = 0; 
            }
        }

        $alignedDataSeptiembre = [];

        foreach ($this->getTotalVentasPorAño()['years'] as $year) {
            $matchingData = $totalVentasSeptiembrePorAño->firstWhere('año', $year);

            if ($matchingData) {
                $alignedDataSeptiembre[] = $matchingData->totalVentasSeptiembre;
            } else {
                $alignedDataSeptiembre[] = 0;
            }
        }

        $alignedDataGeneralSeptiembre = [];

        foreach ($this->getTotalVentasPorAño()['years'] as $year) {
            $matchingData = $totalVentasGeneralesSeptiembrePorAño->firstWhere('año', $year);

            if ($matchingData) {
                $alignedDataGeneralSeptiembre[] = $matchingData->totalVentasGeneralesSeptiembre;
            } else {
                $alignedDataGeneralSeptiembre[] = 0; 
            }
        }

        $alignedDataOctubre = [];

        foreach ($this->getTotalVentasPorAño()['years'] as $year) {
            $matchingData = $totalVentasOctubrePorAño->firstWhere('año', $year);

            if ($matchingData) {
                $alignedDataOctubre[] = $matchingData->totalVentasOctubre;
            } else {
                $alignedDataOctubre[] = 0;
            }
        }

        $alignedDataGeneralOctubre = [];

        foreach ($this->getTotalVentasPorAño()['years'] as $year) {
            $matchingData = $totalVentasGeneralesOctubrePorAño->firstWhere('año', $year);

            if ($matchingData) {
                $alignedDataGeneralOctubre[] = $matchingData->totalVentasGeneralesOctubre;
            } else {
                $alignedDataGeneralOctubre[] = 0; 
            }
        }

        $alignedDataNoviembre = [];

        foreach ($this->getTotalVentasPorAño()['years'] as $year) {
            $matchingData = $totalVentasNoviembrePorAño->firstWhere('año', $year);

            if ($matchingData) {
                $alignedDataNoviembre[] = $matchingData->totalVentasNoviembre;
            } else {
                $alignedDataNoviembre[] = 0;
            }
        }

        $alignedDataGeneralNoviembre = [];

        foreach ($this->getTotalVentasPorAño()['years'] as $year) {
            $matchingData = $totalVentasGeneralesNoviembrePorAño->firstWhere('año', $year);

            if ($matchingData) {
                $alignedDataGeneralNoviembre[] = $matchingData->totalVentasGeneralesNoviembre;
            } else {
                $alignedDataGeneralNoviembre[] = 0; 
            }
        }

        $alignedDataDiciembre = [];

        foreach ($this->getTotalVentasPorAño()['years'] as $year) {
            $matchingData = $totalVentasDiciembrePorAño->firstWhere('año', $year);

            if ($matchingData) {
                $alignedDataDiciembre[] = $matchingData->totalVentasDiciembre;
            } else {
                $alignedDataDiciembre[] = 0;
            }
        }

        $alignedDataGeneralDiciembre = [];

        foreach ($this->getTotalVentasPorAño()['years'] as $year) {
            $matchingData = $totalVentasGeneralesDiciembrePorAño->firstWhere('año', $year);

            if ($matchingData) {
                $alignedDataGeneralDiciembre[] = $matchingData->totalVentasGeneralesDiciembre;
            } else {
                $alignedDataGeneralDiciembre[] = 0; 
            }
        }

        $sumatoriaEnero = array_sum($alignedDataEnero);
        $sumatoriaGeneralEnero = array_sum($alignedDataGeneralEnero);

        $sumatoriaFebrero = array_sum($alignedDataFebrero);
        $sumatoriaGeneralFebrero = array_sum($alignedDataGeneralFebrero);

        $sumatoriaMarzo = array_sum($alignedDataMarzo);
        $sumatoriaGeneralMarzo = array_sum($alignedDataGeneralMarzo);

        $sumatoriaAbril = array_sum($alignedDataAbril);
        $sumatoriaGeneralAbril = array_sum($alignedDataGeneralAbril);

        $sumatoriaMayo = array_sum($alignedDataMayo);
        $sumatoriaGeneralMayo = array_sum($alignedDataGeneralMayo);

        $sumatoriaJunio = array_sum($alignedDataJunio);
        $sumatoriaGeneralJunio = array_sum($alignedDataGeneralJunio);

        $sumatoriaJulio = array_sum($alignedDataJulio);
        $sumatoriaGeneralJulio = array_sum($alignedDataGeneralJulio);

        $sumatoriaAgosto = array_sum($alignedDataAgosto);
        $sumatoriaGeneralAgosto = array_sum($alignedDataGeneralAgosto);

        $sumatoriaSeptiembre = array_sum($alignedDataSeptiembre);
        $sumatoriaGeneralSeptiembre = array_sum($alignedDataGeneralSeptiembre);

        $sumatoriaOctubre = array_sum($alignedDataOctubre);
        $sumatoriaGeneralOctubre = array_sum($alignedDataGeneralOctubre);

        $sumatoriaNoviembre = array_sum($alignedDataNoviembre);
        $sumatoriaGeneralNoviembre = array_sum($alignedDataGeneralNoviembre);

        $sumatoriaDiciembre = array_sum($alignedDataDiciembre);
        $sumatoriaGeneralDiciembre = array_sum($alignedDataGeneralDiciembre);

        return view(
            'reporteAnual',
            compact(
                'colaboradorId',
                'añoInicio',
                'añoFin',
                'asesores',
                'years',
                'totalVentasPorAño',
                'totalVentasGeneralesEneroPorAño',
                'alignedDataGeneralEnero',
                'totalVentasGeneralesFebreroPorAño',
                'alignedDataGeneralFebrero',
                'totalVentasGeneralesMarzoPorAño',
                'alignedDataGeneralMarzo',
                'totalVentasGeneralesAbrilPorAño',
                'alignedDataGeneralAbril',
                'totalVentasGeneralesMayoPorAño',
                'alignedDataGeneralMayo',
                'totalVentasGeneralesJunioPorAño',
                'alignedDataGeneralJunio',
                'totalVentasGeneralesJulioPorAño',
                'alignedDataGeneralJulio',
                'totalVentasGeneralesAgostoPorAño',
                'alignedDataGeneralAgosto',
                'totalVentasGeneralesSeptiembrePorAño',
                'alignedDataGeneralSeptiembre',
                'totalVentasGeneralesOctubrePorAño',
                'alignedDataGeneralOctubre',
                'totalVentasGeneralesNoviembrePorAño',
                'alignedDataGeneralNoviembre',
                'totalVentasGeneralesDiciembrePorAño',
                'alignedDataGeneralDiciembre',
                'totalVentasPorAsesorEntreAños',
                'totalVentasEneroPorAño',
                'alignedDataEnero',
                'totalVentasFebreroPorAño',
                'alignedDataFebrero',
                'totalVentasMarzoPorAño',
                'alignedDataMarzo',
                'totalVentasAbrilPorAño',
                'alignedDataAbril',
                'totalVentasMayoPorAño',
                'alignedDataMayo',
                'totalVentasJunioPorAño',
                'alignedDataJunio',
                'totalVentasJulioPorAño',
                'alignedDataJulio',
                'totalVentasAgostoPorAño',
                'alignedDataAgosto',
                'totalVentasSeptiembrePorAño',
                'alignedDataSeptiembre',
                'totalVentasOctubrePorAño',
                'alignedDataOctubre',
                'totalVentasNoviembrePorAño',
                'alignedDataNoviembre',
                'totalVentasDiciembrePorAño',
                'alignedDataDiciembre',
                'sumatoriaEnero',
                'sumatoriaGeneralEnero',
                'sumatoriaFebrero',
                'sumatoriaGeneralFebrero',
                'sumatoriaMarzo',
                'sumatoriaGeneralMarzo',
                'sumatoriaAbril',
                'sumatoriaGeneralAbril',
                'sumatoriaMayo',
                'sumatoriaGeneralMayo',
                'sumatoriaJunio',
                'sumatoriaGeneralJunio',
                'sumatoriaJulio',
                'sumatoriaGeneralJulio',
                'sumatoriaAgosto',
                'sumatoriaGeneralAgosto',
                'sumatoriaSeptiembre',
                'sumatoriaGeneralSeptiembre',
                'sumatoriaOctubre',
                'sumatoriaGeneralOctubre',
                'sumatoriaNoviembre',
                'sumatoriaGeneralNoviembre',
                'sumatoriaDiciembre',
                'sumatoriaGeneralDiciembre',
            )
        );
    }

    protected function getTotalVentasPorAño()
    {
        $totalVentas = DB::table('ventas')
            ->join('contactos', 'ventas.contactos_id', '=', 'contactos.id')
            ->join('detalleventas', 'detalleventas.ventas_id', '=', 'ventas.id')
            ->leftJoin('productos', 'detalleventas.productos_id', '=', 'productos.id')
            ->select(DB::raw('YEAR(ventas.fecha) AS año'), DB::raw('COUNT(*) AS totalVentasPorAño'))
            ->groupBy(DB::raw('YEAR(ventas.fecha)'))
            ->get();

        $years = $totalVentas->pluck('año')->toArray();
        $totalVentasPorAño = $totalVentas->pluck('totalVentasPorAño')->toArray();

        return ['years' => $years, 'data' => $totalVentasPorAño];
    }

    protected function getTotalVentasPorAsesorEntreAños($colaboradorId, $añoInicio, $añoFin)
    {
        $ventasPorAsesor = DB::table('ventas')
            ->join('contactos', 'ventas.contactos_id', '=', 'contactos.id')
            ->join('detalleventas', 'detalleventas.ventas_id', '=', 'ventas.id')
            ->leftJoin('productos', 'detalleventas.productos_id', '=', 'productos.id')
            ->where('ventas.users_id', $colaboradorId)
            ->whereRaw("YEAR(ventas.fecha) >= ?", [$añoInicio])
            ->whereRaw("YEAR(ventas.fecha) <= ?", [$añoFin])
            ->select(
                DB::raw('year(ventas.fecha) as año'),
                DB::raw('count(*) as totalVentasPorAsesor')
            )
            ->groupBy('año')
            ->get();

        $alignedData = [];

        foreach ($this->getTotalVentasPorAño()['years'] as $year) {
            $matchingData = $ventasPorAsesor->firstWhere('año', $year);

            if ($matchingData) {
                $alignedData[] = $matchingData->totalVentasPorAsesor;
            } else {
                $alignedData[] = 0; // Otra opción es usar null si prefieres manejar la ausencia de datos de otra manera
            }
        }
        return $alignedData;
    }

    protected function getTotalVentasGeneralesEneroPorAño()
    {
        $ventasGeneralesEneroPorAño = DB::table('ventas')
            ->join('contactos', 'ventas.contactos_id', '=', 'contactos.id')
            ->join('detalleventas', 'detalleventas.ventas_id', '=', 'ventas.id')
            ->leftJoin('productos', 'detalleventas.productos_id', '=', 'productos.id')
            ->whereRaw("MONTH(ventas.fecha) = 1") // Filtrar solo por enero
            ->whereRaw("YEAR(ventas.fecha) >= ?", '2018')
            ->whereRaw("YEAR(ventas.fecha) <= ?", '2024')
            ->select(
                DB::raw('YEAR(ventas.fecha) as año'),
                DB::raw('COUNT(*) as totalVentasGeneralesEnero')
            )
            ->groupBy('año')
            ->get();

        return $ventasGeneralesEneroPorAño;
    }

    protected function getTotalVentasGeneralesFebreroPorAño()
    {
        $ventasGeneralesFebreroPorAño = DB::table('ventas')
            ->join('contactos', 'ventas.contactos_id', '=', 'contactos.id')
            ->join('detalleventas', 'detalleventas.ventas_id', '=', 'ventas.id')
            ->leftJoin('productos', 'detalleventas.productos_id', '=', 'productos.id')
            ->whereRaw("MONTH(ventas.fecha) = 2") // Filtrar solo por enero
            ->whereRaw("YEAR(ventas.fecha) >= ?", '2018')
            ->whereRaw("YEAR(ventas.fecha) <= ?", '2024')
            ->select(
                DB::raw('YEAR(ventas.fecha) as año'),
                DB::raw('COUNT(*) as totalVentasGeneralesFebrero')
            )
            ->groupBy('año')
            ->get();

        return $ventasGeneralesFebreroPorAño;
    }

    protected function getTotalVentasGeneralesMarzoPorAño()
    {
        $ventasGeneralesMarzoPorAño = DB::table('ventas')
            ->join('contactos', 'ventas.contactos_id', '=', 'contactos.id')
            ->join('detalleventas', 'detalleventas.ventas_id', '=', 'ventas.id')
            ->leftJoin('productos', 'detalleventas.productos_id', '=', 'productos.id')
            ->whereRaw("MONTH(ventas.fecha) = 3") // Filtrar solo por enero
            ->whereRaw("YEAR(ventas.fecha) >= ?", '2018')
            ->whereRaw("YEAR(ventas.fecha) <= ?", '2024')
            ->select(
                DB::raw('YEAR(ventas.fecha) as año'),
                DB::raw('COUNT(*) as totalVentasGeneralesMarzo')
            )
            ->groupBy('año')
            ->get();

        return $ventasGeneralesMarzoPorAño;
    }

    protected function getTotalVentasGeneralesAbrilPorAño()
    {
        $ventasGeneralesAbrilPorAño = DB::table('ventas')
            ->join('contactos', 'ventas.contactos_id', '=', 'contactos.id')
            ->join('detalleventas', 'detalleventas.ventas_id', '=', 'ventas.id')
            ->leftJoin('productos', 'detalleventas.productos_id', '=', 'productos.id')
            ->whereRaw("MONTH(ventas.fecha) = 4") // Filtrar solo por enero
            ->whereRaw("YEAR(ventas.fecha) >= ?", '2018')
            ->whereRaw("YEAR(ventas.fecha) <= ?", '2024')
            ->select(
                DB::raw('YEAR(ventas.fecha) as año'),
                DB::raw('COUNT(*) as totalVentasGeneralesAbril')
            )
            ->groupBy('año')
            ->get();

        return $ventasGeneralesAbrilPorAño;
    }

    protected function getTotalVentasGeneralesMayoPorAño()
    {
        $ventasGeneralesMayoPorAño = DB::table('ventas')
            ->join('contactos', 'ventas.contactos_id', '=', 'contactos.id')
            ->join('detalleventas', 'detalleventas.ventas_id', '=', 'ventas.id')
            ->leftJoin('productos', 'detalleventas.productos_id', '=', 'productos.id')
            ->whereRaw("MONTH(ventas.fecha) = 5") // Filtrar solo por enero
            ->whereRaw("YEAR(ventas.fecha) >= ?", '2018')
            ->whereRaw("YEAR(ventas.fecha) <= ?", '2024')
            ->select(
                DB::raw('YEAR(ventas.fecha) as año'),
                DB::raw('COUNT(*) as totalVentasGeneralesMayo')
            )
            ->groupBy('año')
            ->get();

        return $ventasGeneralesMayoPorAño;
    }

    protected function getTotalVentasGeneralesJunioPorAño()
    {
        $ventasGeneralesJunioPorAño = DB::table('ventas')
            ->join('contactos', 'ventas.contactos_id', '=', 'contactos.id')
            ->join('detalleventas', 'detalleventas.ventas_id', '=', 'ventas.id')
            ->leftJoin('productos', 'detalleventas.productos_id', '=', 'productos.id')
            ->whereRaw("MONTH(ventas.fecha) = 6") // Filtrar solo por enero
            ->whereRaw("YEAR(ventas.fecha) >= ?", '2018')
            ->whereRaw("YEAR(ventas.fecha) <= ?", '2024')
            ->select(
                DB::raw('YEAR(ventas.fecha) as año'),
                DB::raw('COUNT(*) as totalVentasGeneralesJunio')
            )
            ->groupBy('año')
            ->get();

        return $ventasGeneralesJunioPorAño;
    }

    protected function getTotalVentasGeneralesJulioPorAño()
    {
        $ventasGeneralesJulioPorAño = DB::table('ventas')
            ->join('contactos', 'ventas.contactos_id', '=', 'contactos.id')
            ->join('detalleventas', 'detalleventas.ventas_id', '=', 'ventas.id')
            ->leftJoin('productos', 'detalleventas.productos_id', '=', 'productos.id')
            ->whereRaw("MONTH(ventas.fecha) = 7") // Filtrar solo por enero
            ->whereRaw("YEAR(ventas.fecha) >= ?", '2018')
            ->whereRaw("YEAR(ventas.fecha) <= ?", '2024')
            ->select(
                DB::raw('YEAR(ventas.fecha) as año'),
                DB::raw('COUNT(*) as totalVentasGeneralesJulio')
            )
            ->groupBy('año')
            ->get();

        return $ventasGeneralesJulioPorAño;
    }

    protected function getTotalVentasGeneralesAgostoPorAño()
    {
        $ventasGeneralesAgostoPorAño = DB::table('ventas')
            ->join('contactos', 'ventas.contactos_id', '=', 'contactos.id')
            ->join('detalleventas', 'detalleventas.ventas_id', '=', 'ventas.id')
            ->leftJoin('productos', 'detalleventas.productos_id', '=', 'productos.id')
            ->whereRaw("MONTH(ventas.fecha) = 8") // Filtrar solo por enero
            ->whereRaw("YEAR(ventas.fecha) >= ?", '2018')
            ->whereRaw("YEAR(ventas.fecha) <= ?", '2024')
            ->select(
                DB::raw('YEAR(ventas.fecha) as año'),
                DB::raw('COUNT(*) as totalVentasGeneralesAgosto')
            )
            ->groupBy('año')
            ->get();

        return $ventasGeneralesAgostoPorAño;
    }

    protected function getTotalVentasGeneralesSeptiembrePorAño()
    {
        $ventasGeneralesSeptiembrePorAño = DB::table('ventas')
            ->join('contactos', 'ventas.contactos_id', '=', 'contactos.id')
            ->join('detalleventas', 'detalleventas.ventas_id', '=', 'ventas.id')
            ->leftJoin('productos', 'detalleventas.productos_id', '=', 'productos.id')
            ->whereRaw("MONTH(ventas.fecha) = 9") // Filtrar solo por enero
            ->whereRaw("YEAR(ventas.fecha) >= ?", '2018')
            ->whereRaw("YEAR(ventas.fecha) <= ?", '2024')
            ->select(
                DB::raw('YEAR(ventas.fecha) as año'),
                DB::raw('COUNT(*) as totalVentasGeneralesSeptiembre')
            )
            ->groupBy('año')
            ->get();

        return $ventasGeneralesSeptiembrePorAño;
    }

    protected function getTotalVentasGeneralesOctubrePorAño()
    {
        $ventasGeneralesOctubrePorAño = DB::table('ventas')
            ->join('contactos', 'ventas.contactos_id', '=', 'contactos.id')
            ->join('detalleventas', 'detalleventas.ventas_id', '=', 'ventas.id')
            ->leftJoin('productos', 'detalleventas.productos_id', '=', 'productos.id')
            ->whereRaw("MONTH(ventas.fecha) = 10") // Filtrar solo por enero
            ->whereRaw("YEAR(ventas.fecha) >= ?", '2018')
            ->whereRaw("YEAR(ventas.fecha) <= ?", '2024')
            ->select(
                DB::raw('YEAR(ventas.fecha) as año'),
                DB::raw('COUNT(*) as totalVentasGeneralesOctubre')
            )
            ->groupBy('año')
            ->get();

        return $ventasGeneralesOctubrePorAño;
    }

    protected function getTotalVentasGeneralesNoviembrePorAño()
    {
        $ventasGeneralesNoviembrePorAño = DB::table('ventas')
            ->join('contactos', 'ventas.contactos_id', '=', 'contactos.id')
            ->join('detalleventas', 'detalleventas.ventas_id', '=', 'ventas.id')
            ->leftJoin('productos', 'detalleventas.productos_id', '=', 'productos.id')
            ->whereRaw("MONTH(ventas.fecha) = 11") // Filtrar solo por enero
            ->whereRaw("YEAR(ventas.fecha) >= ?", '2018')
            ->whereRaw("YEAR(ventas.fecha) <= ?", '2024')
            ->select(
                DB::raw('YEAR(ventas.fecha) as año'),
                DB::raw('COUNT(*) as totalVentasGeneralesNoviembre')
            )
            ->groupBy('año')
            ->get();

        return $ventasGeneralesNoviembrePorAño;
    }

    protected function getTotalVentasGeneralesDiciembrePorAño()
    {
        $ventasGeneralesDiciembrePorAño = DB::table('ventas')
            ->join('contactos', 'ventas.contactos_id', '=', 'contactos.id')
            ->join('detalleventas', 'detalleventas.ventas_id', '=', 'ventas.id')
            ->leftJoin('productos', 'detalleventas.productos_id', '=', 'productos.id')
            ->whereRaw("MONTH(ventas.fecha) = 12") // Filtrar solo por enero
            ->whereRaw("YEAR(ventas.fecha) >= ?", '2018')
            ->whereRaw("YEAR(ventas.fecha) <= ?", '2024')
            ->select(
                DB::raw('YEAR(ventas.fecha) as año'),
                DB::raw('COUNT(*) as totalVentasGeneralesDiciembre')
            )
            ->groupBy('año')
            ->get();

        return $ventasGeneralesDiciembrePorAño;
    }

    protected function getTotalVentasEneroPorAño($colaboradorId, $añoInicio, $añoFin)
    {
        $ventasEneroPorAño = DB::table('ventas')
            ->join('contactos', 'ventas.contactos_id', '=', 'contactos.id')
            ->join('detalleventas', 'detalleventas.ventas_id', '=', 'ventas.id')
            ->leftJoin('productos', 'detalleventas.productos_id', '=', 'productos.id')
            ->where('ventas.users_id', $colaboradorId)
            ->whereRaw("MONTH(ventas.fecha) = 1") // Filtrar solo por enero
            ->whereRaw("YEAR(ventas.fecha) >= ?", '2018')
            ->whereRaw("YEAR(ventas.fecha) <= ?", '2024')
            ->select(
                DB::raw('YEAR(ventas.fecha) as año'),
                DB::raw('COUNT(*) as totalVentasEnero')
            )
            ->groupBy('año')
            ->get();

        return $ventasEneroPorAño;
    }

    protected function getTotalVentasFebreroPorAño($colaboradorId, $añoInicio, $añoFin)
    {
        $ventasEneroPorAño = DB::table('ventas')
            ->join('contactos', 'ventas.contactos_id', '=', 'contactos.id')
            ->join('detalleventas', 'detalleventas.ventas_id', '=', 'ventas.id')
            ->leftJoin('productos', 'detalleventas.productos_id', '=', 'productos.id')
            ->where('ventas.users_id', $colaboradorId)
            ->whereRaw("MONTH(ventas.fecha) = 2") // Filtrar solo por enero
            ->whereRaw("YEAR(ventas.fecha) >= ?", '2018')
            ->whereRaw("YEAR(ventas.fecha) <= ?", '2024')
            ->select(
                DB::raw('YEAR(ventas.fecha) as año'),
                DB::raw('COUNT(*) as totalVentasFebrero')
            )
            ->groupBy('año')
            ->get();

        return $ventasEneroPorAño;
    }

    protected function getTotalVentasMarzoPorAño($colaboradorId, $añoInicio, $añoFin)
    {
        $ventasEneroPorAño = DB::table('ventas')
            ->join('contactos', 'ventas.contactos_id', '=', 'contactos.id')
            ->join('detalleventas', 'detalleventas.ventas_id', '=', 'ventas.id')
            ->leftJoin('productos', 'detalleventas.productos_id', '=', 'productos.id')
            ->where('ventas.users_id', $colaboradorId)
            ->whereRaw("MONTH(ventas.fecha) = 3") // Filtrar solo por enero
            ->whereRaw("YEAR(ventas.fecha) >= ?", '2018')
            ->whereRaw("YEAR(ventas.fecha) <= ?", '2024')
            ->select(
                DB::raw('YEAR(ventas.fecha) as año'),
                DB::raw('COUNT(*) as totalVentasMarzo')
            )
            ->groupBy('año')
            ->get();

        return $ventasEneroPorAño;
    }

    protected function getTotalVentasAbrilPorAño($colaboradorId, $añoInicio, $añoFin)
    {
        $ventasEneroPorAño = DB::table('ventas')
            ->join('contactos', 'ventas.contactos_id', '=', 'contactos.id')
            ->join('detalleventas', 'detalleventas.ventas_id', '=', 'ventas.id')
            ->leftJoin('productos', 'detalleventas.productos_id', '=', 'productos.id')
            ->where('ventas.users_id', $colaboradorId)
            ->whereRaw("MONTH(ventas.fecha) = 4") // Filtrar solo por enero
            ->whereRaw("YEAR(ventas.fecha) >= ?", '2018')
            ->whereRaw("YEAR(ventas.fecha) <= ?", '2024')
            ->select(
                DB::raw('YEAR(ventas.fecha) as año'),
                DB::raw('COUNT(*) as totalVentasAbril')
            )
            ->groupBy('año')
            ->get();

        return $ventasEneroPorAño;
    }

    protected function getTotalVentasMayoPorAño($colaboradorId, $añoInicio, $añoFin)
    {
        $ventasEneroPorAño = DB::table('ventas')
            ->join('contactos', 'ventas.contactos_id', '=', 'contactos.id')
            ->join('detalleventas', 'detalleventas.ventas_id', '=', 'ventas.id')
            ->leftJoin('productos', 'detalleventas.productos_id', '=', 'productos.id')
            ->where('ventas.users_id', $colaboradorId)
            ->whereRaw("MONTH(ventas.fecha) = 5") // Filtrar solo por enero
            ->whereRaw("YEAR(ventas.fecha) >= ?", '2018')
            ->whereRaw("YEAR(ventas.fecha) <= ?", '2024')
            ->select(
                DB::raw('YEAR(ventas.fecha) as año'),
                DB::raw('COUNT(*) as totalVentasMayo')
            )
            ->groupBy('año')
            ->get();

        return $ventasEneroPorAño;
    }

    protected function getTotalVentasJunioPorAño($colaboradorId, $añoInicio, $añoFin)
    {
        $ventasEneroPorAño = DB::table('ventas')
            ->join('contactos', 'ventas.contactos_id', '=', 'contactos.id')
            ->join('detalleventas', 'detalleventas.ventas_id', '=', 'ventas.id')
            ->leftJoin('productos', 'detalleventas.productos_id', '=', 'productos.id')
            ->where('ventas.users_id', $colaboradorId)
            ->whereRaw("MONTH(ventas.fecha) = 6") // Filtrar solo por enero
            ->whereRaw("YEAR(ventas.fecha) >= ?", '2018')
            ->whereRaw("YEAR(ventas.fecha) <= ?", '2024')
            ->select(
                DB::raw('YEAR(ventas.fecha) as año'),
                DB::raw('COUNT(*) as totalVentasJunio')
            )
            ->groupBy('año')
            ->get();

        return $ventasEneroPorAño;
    }

    protected function getTotalVentasJulioPorAño($colaboradorId, $añoInicio, $añoFin)
    {
        $ventasEneroPorAño = DB::table('ventas')
            ->join('contactos', 'ventas.contactos_id', '=', 'contactos.id')
            ->join('detalleventas', 'detalleventas.ventas_id', '=', 'ventas.id')
            ->leftJoin('productos', 'detalleventas.productos_id', '=', 'productos.id')
            ->where('ventas.users_id', $colaboradorId)
            ->whereRaw("MONTH(ventas.fecha) = 7") // Filtrar solo por enero
            ->whereRaw("YEAR(ventas.fecha) >= ?", '2018')
            ->whereRaw("YEAR(ventas.fecha) <= ?", '2024')
            ->select(
                DB::raw('YEAR(ventas.fecha) as año'),
                DB::raw('COUNT(*) as totalVentasJulio')
            )
            ->groupBy('año')
            ->get();

        return $ventasEneroPorAño;
    }

    protected function getTotalVentasAgostoPorAño($colaboradorId, $añoInicio, $añoFin)
    {
        $ventasEneroPorAño = DB::table('ventas')
            ->join('contactos', 'ventas.contactos_id', '=', 'contactos.id')
            ->join('detalleventas', 'detalleventas.ventas_id', '=', 'ventas.id')
            ->leftJoin('productos', 'detalleventas.productos_id', '=', 'productos.id')
            ->where('ventas.users_id', $colaboradorId)
            ->whereRaw("MONTH(ventas.fecha) = 8") // Filtrar solo por enero
            ->whereRaw("YEAR(ventas.fecha) >= ?", '2018')
            ->whereRaw("YEAR(ventas.fecha) <= ?", '2024')
            ->select(
                DB::raw('YEAR(ventas.fecha) as año'),
                DB::raw('COUNT(*) as totalVentasAgosto')
            )
            ->groupBy('año')
            ->get();

        return $ventasEneroPorAño;
    }

    protected function getTotalVentasSeptiembrePorAño($colaboradorId, $añoInicio, $añoFin)
    {
        $ventasEneroPorAño = DB::table('ventas')
            ->join('contactos', 'ventas.contactos_id', '=', 'contactos.id')
            ->join('detalleventas', 'detalleventas.ventas_id', '=', 'ventas.id')
            ->leftJoin('productos', 'detalleventas.productos_id', '=', 'productos.id')
            ->where('ventas.users_id', $colaboradorId)
            ->whereRaw("MONTH(ventas.fecha) = 9") // Filtrar solo por enero
            ->whereRaw("YEAR(ventas.fecha) >= ?", '2018')
            ->whereRaw("YEAR(ventas.fecha) <= ?", '2024')
            ->select(
                DB::raw('YEAR(ventas.fecha) as año'),
                DB::raw('COUNT(*) as totalVentasSeptiembre')
            )
            ->groupBy('año')
            ->get();

        return $ventasEneroPorAño;
    }

    protected function getTotalVentasOctubrePorAño($colaboradorId, $añoInicio, $añoFin)
    {
        $ventasEneroPorAño = DB::table('ventas')
            ->join('contactos', 'ventas.contactos_id', '=', 'contactos.id')
            ->join('detalleventas', 'detalleventas.ventas_id', '=', 'ventas.id')
            ->leftJoin('productos', 'detalleventas.productos_id', '=', 'productos.id')
            ->where('ventas.users_id', $colaboradorId)
            ->whereRaw("MONTH(ventas.fecha) = 10") // Filtrar solo por enero
            ->whereRaw("YEAR(ventas.fecha) >= ?", '2018')
            ->whereRaw("YEAR(ventas.fecha) <= ?", '2024')
            ->select(
                DB::raw('YEAR(ventas.fecha) as año'),
                DB::raw('COUNT(*) as totalVentasOctubre')
            )
            ->groupBy('año')
            ->get();

        return $ventasEneroPorAño;
    }

    protected function getTotalVentasNoviembrePorAño($colaboradorId, $añoInicio, $añoFin)
    {
        $ventasEneroPorAño = DB::table('ventas')
            ->join('contactos', 'ventas.contactos_id', '=', 'contactos.id')
            ->join('detalleventas', 'detalleventas.ventas_id', '=', 'ventas.id')
            ->leftJoin('productos', 'detalleventas.productos_id', '=', 'productos.id')
            ->where('ventas.users_id', $colaboradorId)
            ->whereRaw("MONTH(ventas.fecha) = 11") // Filtrar solo por enero
            ->whereRaw("YEAR(ventas.fecha) >= ?", '2018')
            ->whereRaw("YEAR(ventas.fecha) <= ?", '2024')
            ->select(
                DB::raw('YEAR(ventas.fecha) as año'),
                DB::raw('COUNT(*) as totalVentasNoviembre')
            )
            ->groupBy('año')
            ->get();

        return $ventasEneroPorAño;
    }

    protected function getTotalVentasDiciembrePorAño($colaboradorId, $añoInicio, $añoFin)
    {
        $ventasEneroPorAño = DB::table('ventas')
            ->join('contactos', 'ventas.contactos_id', '=', 'contactos.id')
            ->join('detalleventas', 'detalleventas.ventas_id', '=', 'ventas.id')
            ->leftJoin('productos', 'detalleventas.productos_id', '=', 'productos.id')
            ->where('ventas.users_id', $colaboradorId)
            ->whereRaw("MONTH(ventas.fecha) = 12") // Filtrar solo por enero
            ->whereRaw("YEAR(ventas.fecha) >= ?", '2018')
            ->whereRaw("YEAR(ventas.fecha) <= ?", '2024')
            ->select(
                DB::raw('YEAR(ventas.fecha) as año'),
                DB::raw('COUNT(*) as totalVentasDiciembre')
            )
            ->groupBy('año')
            ->get();

        return $ventasEneroPorAño;
    }
}
