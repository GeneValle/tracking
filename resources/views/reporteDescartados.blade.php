<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<x-app-layout>
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-purple-300 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="mt-4 ml-6 font-bold text-4xl text-slate-950 flex items-center">
                    Reportes

                    <span class="font-normal text-lg text-custom-morado ml-6 mt-3">
                        Descartados |
                    </span>
                </div>

                <hr class="w-3/4 h-1 mx-auto my-4 bg-custom-morado border-0 rounded md:my-5">

                <form action="{{ route('reporteDescartados') }}" method="GET">
                    @csrf

                    <div class="rounded-lg p-6 my-3">
                        <div class="bg-purple-300 border border-custom-morado rounded-lg p-4">
                            <div class="flex flex-wrap px-5">
                                <div class="basis-3/12">
                                    <div class="text-lg font-bold text-custom-morado">Rango de fechas:</div>
                                    <div class="my-2">
                                        <select name="rangoFechas" id="rangoFechas"
                                            class="block rounded-lg py-2.5 px-0 w-4/5 text-lg text-black bg-purple-300 border-0 border-b-2 border-custom-morado">
                                            <option selected value="todas">Todas</option>
                                            <option value="personalizada" class="text-base">Personalizada</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="basis-3/12">
                                    <div class="text-lg font-bold text-custom-morado">Fecha Inicial:</div>
                                    <div class="my-2">
                                        <input type="date" name="fechaInicial" id="fechaInicial"
                                            class="rounded-lg w-4/5 bg-purple-300 border-0 border-b-2 border-custom-morado h-12">
                                    </div>
                                </div>

                                <div class="basis-3/12">
                                    <div class="text-lg font-bold text-custom-morado">Fecha Final:</div>
                                    <div class="my-2">
                                        <input type="date" name="fechaFinal" id="fechaFinal"
                                            class="rounded-lg w-4/5 bg-purple-300 border-0 border-b-2 border-custom-morado h-12">
                                    </div>
                                </div>

                                <div class="basis-3/12">
                                    <button type="submit"
                                        class="text-white bg-indigo-700 hover:bg-indigo-900 font-bold rounded-lg text-lg w-full sm:w-auto mt-11 mx-2 px-5 py-2.5 text-center">Generar
                                        Reporte</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <canvas id="barChart" style="width: 75%; margin: auto"></canvas>

                <div class="overflow-x-auto {{-- shadow-md --}} sm:rounded-lg my-6">
                    @if ($rangoFechas === 'todas')
                        <table class="text-sm w-3/4 m-auto text-left text-custom-linksmenu">
                            <thead class="text-lg text-custom-linksmenu uppercase bg-purple-300 border-b-2 border-custom-morado my-4">
                                <tr class="text-center">
                                    <th scope="col" class="px-4 py-3">
                                        Tipo de causa
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Total descartados por causa
                                    </th>
                                </tr>
                            </thead>
                            @foreach ($descartados as $descartado)
                                <tbody>
                                    <tr class="bg-teal-500 hover:bg-teal-700 text-white text-lg">
                                        <td class="text-center">
                                            {{ $descartado->causa }}
                                        </td>
                                        <td class="text-center">
                                            {{ $descartado->totalDescartadosCausa }}
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    @else
                        <table class="text-sm w-3/4 m-auto text-left text-custom-linksmenu">
                            <thead class="text-lg text-custom-linksmenu uppercase bg-purple-300 border-2 border-custom-morado my-4">
                                <tr class="text-center">
                                    <th scope="col" class="px-4 py-3">
                                        Tipo de causa
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Total descartados por causa
                                    </th>
                                </tr>
                            </thead>
                            @foreach ($descartadosPorFecha as $descartadoPorFecha)
                                <tbody>
                                    <tr class="bg-teal-500 hover:bg-teal-700 text-white text-lg">
                                        <td class="text-center">
                                            {{ $descartadoPorFecha->causa }}
                                        </td>
                                        <td class="text-center">
                                            {{ $descartadoPorFecha->totalDescartadosCausaPorFecha }}
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    @endif
                </div>

            </div>
        </div>
    </div>

    <script>
        var selectRangoFechas = document.getElementById('rangoFechas');
        var selectFechaInicio = document.getElementById('fechaInicial');
        var selectFechaFinal = document.getElementById('fechaFinal');
        var fechaActual = new Date().toISOString().split('T')[0];


        if (selectRangoFechas.value == 'todas') {
            selectFechaInicio.value = '2018-01-01';
            selectFechaInicio.disabled = true;
            selectFechaFinal.value = fechaActual;
            selectFechaFinal.disabled = true;
        }

        selectRangoFechas.addEventListener('change', function() {
            if (selectRangoFechas.value === 'todas') {
                selectFechaInicio.value = '2018-01-01';
                selectFechaInicio.disabled = true;
                selectFechaFinal.value = fechaActual;
                selectFechaFinal.disabled = true;
            } else {
                selectFechaInicio.disabled = false;
                selectFechaFinal.disabled = false;
            }
        });

        Chart.defaults.backgroundColor = '#000000';
        Chart.defaults.borderColor = '#000000';
        Chart.defaults.color = '#000000';

        var ctx = document.getElementById('barChart').getContext('2d');

        var chartData = {
            labels: {!! json_encode($causas) !!},
            datasets: [{
                label: 'Total Descartados por Causa',
                backgroundColor: 'rgb(75, 192, 192)',
                data: {!! json_encode(array_values($totalDescartados)) !!},
            }]
        };

        @if ($rangoFechas === 'personalizada')
            chartData.datasets[0].data = {!! json_encode(array_values($totalDescartadosPorFecha)) !!};
        @endif


        var chart = new Chart(ctx, {
            type: 'bar',
            data: chartData,
            options: {
                responsive: false,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        type: 'category',
                        position: 'bottom'
                    },
                    y: {
                        type: 'linear',
                        position: 'left'
                    }
                }
            }
        });
    </script>
</x-app-layout>
