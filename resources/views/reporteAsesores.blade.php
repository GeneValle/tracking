<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<x-app-layout>
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-purple-300 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="mt-4 ml-6 font-bold text-4xl text-slate-950 flex items-center">
                    Reporte

                    <span class="font-normal text-lg text-custom-morado ml-6 mt-3">
                        Asesores |
                    </span>
                </div>

                <hr class="w-3/4 h-1 mx-auto my-4 bg-custom-morado border-0 rounded md:my-5">

                <form method="POST" id="filtroForm" action="{{ route('reporteAsesores.obtenerDatosAsesoresGrafica') }}">
                    @csrf

                    <div class="rounded-lg p-6 my-3">
                        <div class="bg-purple-300 border border-custom-morado rounded-lg p-4">
                            <div class="text-xl font-semibold text-custom-morado mb-2">Colaboradores</div>

                            <select name="colaboradores" id="colaboradores"
                                class="block rounded-lg py-2.5 px-0 w-3/4 text-lg text-black bg-purple-300 border-0 border-b-2 border-custom-morado">
                                <option selected>Selecciona un colaborador</option>
                                {{-- <option value="todos" class="text-base">Todos</option> --}}
                                @foreach ($asesores as $asesor)
                                    <option value="{{ $asesor->id }}" class="text-base">
                                        {{ $asesor->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="grid grid-cols-2 gap-6 my-3 p-4">
                            <div>
                                <label for="mes" class="text-xl text-custom-morado">Mes:</label>

                                <select name="mes" id="mes"
                                    class="block rounded-lg py-2.5 px-0 w-full text-lg text-black bg-purple-300 border-0 border-b-2 border-custom-morado">
                                    <option selected>Selecciona un mes</option>
                                    <option value="1" class="text-base">Enero</option>
                                    <option value="2" class="text-base">Febrero</option>
                                    <option value="3" class="text-base">Marzo</option>
                                    <option value="4" class="text-base">Abril</option>
                                    <option value="5" class="text-base">Mayo</option>
                                    <option value="6" class="text-base">Junio</option>
                                    <option value="7" class="text-base">Julio</option>
                                    <option value="8" class="text-base">Agosto</option>
                                    <option value="9" class="text-base">Septiembre</option>
                                    <option value="10" class="text-base">Octubre</option>
                                    <option value="11" class="text-base">Noviembre</option>
                                    <option value="12" class="text-base">Diciembre</option>
                                </select>
                            </div>

                            <div>
                                <label for="año" class="text-xl text-custom-morado">Año:</label>
                                <select name="año" id="año"
                                    class="block rounded-lg py-2.5 px-0 w-full text-lg text-black bg-purple-300 border-0 border-b-2 border-custom-morado">
                                    <option selected>Selecciona un año</option>
                                    <option value="2018" class="text-base">2018</option>
                                    <option value="2019" class="text-base">2019</option>
                                    <option value="2020" class="text-base">2020</option>
                                    <option value="2021" class="text-base">2021</option>
                                    <option value="2022" class="text-base">2022</option>
                                    <option value="2023" class="text-base">2023</option>
                                    <option value="2024" class="text-base">2024</option>
                                </select>
                            </div>

                        </div>

                        <div class="text-right">
                            <button type="submit"
                                class="text-custom-header bg-custom-morado focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2">
                                Filtrar resultados por mes </button>
                        </div>
                    </div>
                </form>

                <canvas id="reporteChart" style="width: 75%; height: 456px; margin: auto"></canvas>
                <canvas id="reporteChartAsesor"></canvas>
                {{-- * width: 75%; height: 456px; margin: auto; display: none * --}}

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            function obtenerYRenderizarDatos() {
                $.ajax({
                    url: '{{ route("reporteAsesores.obtenerDatosGeneralesGrafica") }}',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {

                        // console.log('Datos del servidor:', data);

                        var prospectosTotales = data.prospectosTotales;
                        var citasRealizadasTotales = data.citasRealizadasTotales;
                        var citasRegistradasTotales = data.citasRegistradasTotales;
                        var ventasTotales = data.ventasTotales;

                        var chartData = {
                            labels: ['Prospectos', 'Citas Realizadas', 'Citas Registradas',
                                'Ventas'
                            ],
                            datasets: [{
                                label: 'Datos Generales',
                                backgroundColor: ['blue', 'green', 'orange', 'red'],
                                data: [prospectosTotales, citasRealizadasTotales,
                                    citasRegistradasTotales, ventasTotales
                                ]
                            }]
                        };

                        var chartOptions = {
                            /* responsive: true,
                            maintainAspectRatio: false */
                            indexAxis: 'y',
                            scales: {
                                x: {
                                    beginAtZero: true
                                }
                            }
                        };

                        var ctx = document.getElementById('reporteChart').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: chartData,
                            options: chartOptions
                        });
                    },
                    error: function(error) {
                        console.error('Error al obtener datos:', error);
                    }
                });
            }

            obtenerYRenderizarDatos();

            $('#filtroForm').submit(function(e) {
                e.preventDefault();

                $('#reporteChart').hide();

                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    dataType: 'json',
                    data: $(this).serialize(),
                    success: function(data) {
                        var prospectosPorAsesor = data.prospectosPorAsesor;
                        var citasRealizadasPorAsesor = data.citasRealizadasPorAsesor;
                        var citasRegistradasPorAsesor = data.citasRegistradasPorAsesor;
                        var ventasPorAsesor = data.ventasPorAsesor;

                        var chartData = {
                            labels: ['Prospectos', 'Citas Realizadas', 'Citas Registradas',
                                'Ventas'
                            ],
                            datasets: [{
                                label: 'Datos Por Asesor',
                                backgroundColor: ['blue', 'green', 'orange', 'red'],
                                data: [prospectosPorAsesor,
                                    citasRealizadasPorAsesor,
                                    citasRegistradasPorAsesor, ventasPorAsesor
                                ]
                            }]
                        };

                        var chartOptions = {
                            /* responsive: true,
                            maintainAspectRatio: false */
                            indexAxis: 'y',
                            scales: {
                                x: {
                                    beginAtZero: true
                                }
                            }
                        };

                        var ctx = document.getElementById('reporteChartAsesor').getContext(
                            '2d');
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: chartData,
                            options: chartOptions
                        });

                        $('#reporteAsesores').css({
                            'width': '75%',
                            'height': '456px',
                            'margin': 'auto'
                        });
                    },
                    error: function(error) {
                        console.error('Error al obtener datos del formulario:', error);
                    }
                });
            });
        });
    </script>
</x-app-layout>

{{-- // url: '/reporteAsesores/obtenerDatosGeneralesGrafica', --}}