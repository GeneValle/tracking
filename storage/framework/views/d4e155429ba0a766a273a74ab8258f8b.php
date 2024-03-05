<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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

                <form method="GET" id="filtroForm" action="<?php echo e(route('reporteAsesores')); ?>">
                    <?php echo csrf_field(); ?>

                    <div class="rounded-lg p-6 my-3">
                        <div class="bg-purple-300 border border-custom-morado rounded-lg p-4">
                            <div class="text-xl font-semibold text-custom-morado mb-2">Colaboradores</div>

                            <select name="colaboradores" id="colaboradores"
                                class="block rounded-lg py-2.5 px-0 w-3/4 text-lg text-black bg-purple-300 border-0 border-b-2 border-custom-morado">
                                <option selected>Selecciona un colaborador</option>
                                <option value="todos" class="text-base">Todos</option>
                                <?php $__currentLoopData = $asesores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asesor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($asesor->id); ?>" class="text-base">
                                        <?php echo e($asesor->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

                <canvas id="barChart" style="width: 75%; height: 456px; margin: auto"></canvas>

            </div>
        </div>
    </div>

    <script>

        if (condition) {
            
        } else {
            
        }
        
        $(document).ready(function() {
            $.ajax({
                url: '/reporteAsesores/obtenerDatosGrafica',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    
                    var prospectosTotales = data.prospectosTotales;
                    var citasRealizadasTotales = data.citasRealizadasTotales;
                    var citasRegistradasTotales = data.citasRegistradasTotales;
                    var ventasTotales = data.ventasTotales;

                    // Configura los datos para Chart.js
                    var chartData = {
                        labels: ['Prospectos', 'Citas Realizadas', 'Citas Registradas', 'Ventas'],
                        datasets: [{
                            label: 'Datos Generales',
                            backgroundColor: ['blue', 'green', 'orange', 'red'],
                            data: [prospectosTotales, citasRealizadasTotales, citasRegistradasTotales, ventasTotales]
                        }]
                    };

                    // Configura las opciones de la gráfica
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

                    // Crea la gráfica
                    var ctx = document.getElementById('barChart').getContext('2d');
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
        });
    </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>


<?php /**PATH C:\xampp\htdocs\ANDF\jetStream\resources\views\reporteAsesores.blade.php ENDPATH**/ ?>