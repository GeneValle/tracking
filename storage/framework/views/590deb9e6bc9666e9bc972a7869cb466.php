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
                    Reportes

                    <span class="font-normal text-lg text-custom-morado ml-6 mt-3">
                        Anual |
                    </span>
                </div>

                <hr class="w-3/4 h-1 mx-auto my-4 bg-custom-morado border-0 rounded md:my-5">

                <form method="GET" action="<?php echo e(route('reporteAnual')); ?>" id="formReporteAnual">
                    <?php echo csrf_field(); ?>
                    <div class="rounded-lg  p-6 my-3">

                        <div class="bg-purple-300 border border-custom-morado rounded-lg p-4">
                            <div class="text-xl font-semibold text-custom-morado mb-2 text-center">Colaboradores</div>

                            <select name="colaboradores" id="colaboradores"
                                class="block rounded-lg py-2.5 px-0 w-3/4 text-lg mx-auto text-center text-black bg-purple-300  border-0 border-b-2 border-custom-morado">
                                <option selected>Selecciona un colaborador</option>
                                <?php $__currentLoopData = $asesores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asesor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($asesor->id); ?>" class="text-base">
                                        <?php echo e($asesor->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="flex flex-grow px-4 py-2 my-3">
                            <div class="basis-5/12">
                                <div class="text-center">
                                    <label for="añoInicio" class="text-xl text-custom-morado">Año de inicio:</label>
                                </div>
                                <select name="añoInicio" id="añoInicio"
                                    class="block rounded-lg py-2.5 px-0 w-full text-lg text-black text-center bg-purple-300 border-0 border-b-2 border-custom-morado">
                                    <option selected>Selecciona un año de Inicio</option>
                                    <option value="2018" class="text-base">2018</option>
                                    <option value="2019" class="text-base">2019</option>
                                    <option value="2020" class="text-base">2020</option>
                                    <option value="2021" class="text-base">2021</option>
                                    <option value="2022" class="text-base">2022</option>
                                    <option value="2023" class="text-base">2023</option>
                                </select>
                            </div>

                            <div class="basis-2/12 text-center m-auto text-2xl text-custom-morado">
                                a
                            </div>

                            <div class="basis-5/12">
                                <div class="text-center">
                                    <label for="añoFin" class="text-xl text-custom-morado">Año Final:</label>
                                </div>

                                <select name="añoFin" id="añoFin"
                                    class="block rounded-lg py-2.5 px-0 w-full text-lg text-black text-center bg-purple-300 border-0 border-b-2 border-custom-morado">
                                    <option selected>Selecciona un año Final</option>
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

                        <div class="text-right mt-6">
                            <button type="submit"
                                class="text-custom-header bg-custom-morado focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2">
                                Filtrar ventas por año </button>
                        </div>
                    </div>
                </form>

                <canvas id="barChart" style="width: 75%; margin: auto"></canvas>

                <div class="relative overflow-x-auto  sm:rounded-lg my-6">
                    <?php if(!empty($colaboradorId) && !empty($añoInicio) && !empty($añoFin)): ?>
                        <table class="w-11/12 m-auto text-sm text-left rtl:text-right text-gray-500">
                            <thead class="text-xs text-center text-gray-700 uppercase">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 bg-gray-50 border-y-2 border-x-2 border-custom-morado">
                                        MES
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 border-y-2 border-custom-morado">
                                        2018
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 border-y-2 border-custom-morado">
                                        2019
                                    </th>
                                    <th scope="col" class="px-6 py-3  bg-gray-50 border-y-2 border-custom-morado">
                                        2020
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 border-y-2 border-custom-morado">
                                        2021
                                    </th>
                                    <th scope="col" class="px-6 py-3  bg-gray-50 border-y-2 border-custom-morado">
                                        2022
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 border-y-2 border-custom-morado">
                                        2023
                                    </th>
                                    <th scope="col" class="px-6 py-3  bg-gray-50 border-y-2 border-custom-morado">
                                        2024
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 bg-gray-50 border-y-2 border-e-2 border-custom-morado">
                                        PROMEDIO
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr class="border-b border-gray-200">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 border-b-2 border-x-2 border-custom-morado">
                                        Enero
                                    </th>
                                    <?php $__currentLoopData = $alignedDataEnero; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $totalVentasEnero): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <td class="px-6 py-4 border-b-2 border-custom-morado">
                                            <?php echo e($totalVentasEnero); ?>

                                        </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <td class="px-6 py-4 bg-purple-300 border-b-2 border-e-2 border-custom-morado">
                                        <?php echo e(number_format($sumatoriaEnero / 7, 2)); ?>

                                    </td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 border-b-2 border-x-2 border-custom-morado">
                                        Febrero
                                    </th>
                                    <?php $__currentLoopData = $alignedDataFebrero; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $totalVentasFebrero): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <td class="px-6 py-4 border-b-2 border-custom-morado">
                                            <?php echo e($totalVentasFebrero); ?>

                                        </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td class="px-6 py-4 bg-purple-300 border-b-2 border-e-2 border-custom-morado">
                                        <?php echo e(number_format($sumatoriaFebrero / 7, 2)); ?>

                                    </td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 border-b-2 border-x-2 border-custom-morado">
                                        Marzo
                                    </th>
                                    <?php $__currentLoopData = $alignedDataMarzo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $totalVentasMarzo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <td class="px-6 py-4 border-b-2 border-custom-morado">
                                            <?php echo e($totalVentasMarzo); ?>

                                        </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td class="px-6 py-4 bg-purple-300 border-b-2 border-e-2 border-custom-morado">
                                        <?php echo e(number_format($sumatoriaMarzo / 7, 2)); ?>

                                    </td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 border-b-2 border-x-2 border-custom-morado">
                                        Abril
                                    </th>
                                    <?php $__currentLoopData = $alignedDataAbril; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $totalVentasAbril): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <td class="px-6 py-4 border-b-2 border-custom-morado">
                                            <?php echo e($totalVentasAbril); ?>

                                        </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td class="px-6 py-4 bg-purple-300 border-b-2 border-e-2 border-custom-morado">
                                        <?php echo e(number_format($sumatoriaAbril / 7, 2)); ?>

                                    </td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 border-b-2 border-x-2 border-custom-morado">
                                        Mayo
                                    </th>
                                    <?php $__currentLoopData = $alignedDataMayo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $totalVentasMayo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <td class="px-6 py-4 border-b-2 border-custom-morado">
                                            <?php echo e($totalVentasMayo); ?>

                                        </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td class="px-6 py-4 bg-purple-300 border-b-2 border-e-2 border-custom-morado">
                                        <?php echo e(number_format($sumatoriaMayo / 7, 2)); ?>

                                    </td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 border-b-2 border-x-2 border-custom-morado">
                                        Junio
                                    </th>
                                    <?php $__currentLoopData = $alignedDataJunio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $totalVentasJunio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <td class="px-6 py-4 border-b-2 border-custom-morado">
                                            <?php echo e($totalVentasJunio); ?>

                                        </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td class="px-6 py-4 bg-purple-300 border-b-2 border-e-2 border-custom-morado">
                                        <?php echo e(number_format($sumatoriaJunio / 7, 2)); ?>

                                    </td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 border-b-2 border-x-2 border-custom-morado">
                                        Julio
                                    </th>
                                    <?php $__currentLoopData = $alignedDataJulio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $totalVentasJulio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <td class="px-6 py-4 border-b-2 border-custom-morado">
                                            <?php echo e($totalVentasJulio); ?>

                                        </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td class="px-6 py-4 bg-purple-300 border-b-2 border-e-2 border-custom-morado">
                                        <?php echo e(number_format($sumatoriaJulio / 7, 2)); ?>

                                    </td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 border-b-2 border-x-2 border-custom-morado">
                                        Agosto
                                    </th>
                                    <?php $__currentLoopData = $alignedDataAgosto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $totalVentasAgosto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <td class="px-6 py-4 border-b-2 border-custom-morado">
                                            <?php echo e($totalVentasAgosto); ?>

                                        </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td class="px-6 py-4 bg-purple-300 border-b-2 border-e-2 border-custom-morado">
                                        <?php echo e(number_format($sumatoriaAgosto / 7, 2)); ?>

                                    </td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 border-b-2 border-x-2 border-custom-morado">
                                        Septiembre
                                    </th>
                                    <?php $__currentLoopData = $alignedDataSeptiembre; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $totalVentasSeptiembre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <td class="px-6 py-4 border-b-2 border-custom-morado">
                                            <?php echo e($totalVentasSeptiembre); ?>

                                        </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td class="px-6 py-4 bg-purple-300 border-b-2 border-e-2 border-custom-morado">
                                        <?php echo e(number_format($sumatoriaSeptiembre / 7, 2)); ?>

                                    </td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 border-b-2 border-x-2 border-custom-morado">
                                        Octubre
                                    </th>
                                    <?php $__currentLoopData = $alignedDataOctubre; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $totalVentasOctubre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <td class="px-6 py-4 border-b-2 border-custom-morado">
                                            <?php echo e($totalVentasOctubre); ?>

                                        </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td class="px-6 py-4 bg-purple-300 border-b-2 border-e-2 border-custom-morado">
                                        <?php echo e(number_format($sumatoriaOctubre / 7, 2)); ?>

                                    </td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 border-b-2 border-x-2 border-custom-morado">
                                        Noviembre
                                    </th>
                                    <?php $__currentLoopData = $alignedDataNoviembre; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $totalVentasNoviembre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <td class="px-6 py-4 border-b-2 border-custom-morado">
                                            <?php echo e($totalVentasNoviembre); ?>

                                        </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td class="px-6 py-4 bg-purple-300 border-b-2 border-e-2 border-custom-morado">
                                        <?php echo e(number_format($sumatoriaNoviembre / 7, 2)); ?>

                                    </td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 border-b-2 border-x-2 border-custom-morado">
                                        Diciembre
                                    </th>
                                    <?php $__currentLoopData = $alignedDataDiciembre; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $totalVentasDiciembre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <td class="px-6 py-4 border-b-2 border-custom-morado">
                                            <?php echo e($totalVentasDiciembre); ?>

                                        </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td class="px-6 py-4 bg-purple-300 border-b-2 border-e-2 border-custom-morado">
                                        <?php echo e(number_format($sumatoriaDiciembre / 7, 2)); ?>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <table class="w-11/12 m-auto text-sm text-left rtl:text-right text-gray-500">
                            <thead class="text-xs text-center text-gray-700 uppercase">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 bg-gray-50 border-y-2 border-x-2 border-custom-morado">
                                        MES
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 border-y-2 border-custom-morado">
                                        2018
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 border-y-2 border-custom-morado">
                                        2019
                                    </th>
                                    <th scope="col" class="px-6 py-3  bg-gray-50 border-y-2 border-custom-morado">
                                        2020
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 border-y-2 border-custom-morado">
                                        2021
                                    </th>
                                    <th scope="col" class="px-6 py-3  bg-gray-50 border-y-2 border-custom-morado">
                                        2022
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 border-y-2 border-custom-morado">
                                        2023
                                    </th>
                                    <th scope="col" class="px-6 py-3  bg-gray-50 border-y-2 border-custom-morado">
                                        2024
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 bg-gray-50 border-y-2 border-e-2 border-custom-morado">
                                        PROMEDIO
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr class="border-b border-gray-200">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 border-b-2 border-x-2 border-custom-morado">
                                        Enero
                                    </th>
                                    <?php $__currentLoopData = $alignedDataGeneralEnero; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $totalVentasGeneralesEnero): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <td class="px-6 py-4 border-b-2 border-custom-morado">
                                            <?php echo e($totalVentasGeneralesEnero); ?>

                                        </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <td class="px-6 py-4 bg-purple-300 border-b-2 border-e-2 border-custom-morado">
                                        <?php echo e(number_format($sumatoriaGeneralEnero / 7, 2)); ?>

                                    </td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 border-b-2 border-x-2 border-custom-morado">
                                        Febrero
                                    </th>
                                    <?php $__currentLoopData = $alignedDataGeneralFebrero; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $totalVentasGeneralesFebrero): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <td class="px-6 py-4 border-b-2 border-custom-morado">
                                            <?php echo e($totalVentasGeneralesFebrero); ?>

                                        </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td class="px-6 py-4 bg-purple-300 border-b-2 border-e-2 border-custom-morado">
                                        <?php echo e(number_format($sumatoriaGeneralFebrero / 7, 2)); ?> 
                                    </td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 border-b-2 border-x-2 border-custom-morado">
                                        Marzo
                                    </th>
                                    <?php $__currentLoopData = $alignedDataGeneralMarzo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $totalVentasGeneralesMarzo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <td class="px-6 py-4 border-b-2 border-custom-morado">
                                            <?php echo e($totalVentasGeneralesMarzo); ?>

                                        </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td class="px-6 py-4 bg-purple-300 border-b-2 border-e-2 border-custom-morado">
                                        <?php echo e(number_format($sumatoriaGeneralMarzo / 7, 2)); ?> 
                                    </td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 border-b-2 border-x-2 border-custom-morado">
                                        Abril
                                    </th>
                                    <?php $__currentLoopData = $alignedDataGeneralAbril; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $totalVentasGeneralesAbril): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <td class="px-6 py-4 border-b-2 border-custom-morado">
                                            <?php echo e($totalVentasGeneralesAbril); ?>

                                        </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td class="px-6 py-4 bg-purple-300 border-b-2 border-e-2 border-custom-morado">
                                        <?php echo e(number_format($sumatoriaGeneralAbril / 7, 2)); ?> 
                                    </td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 border-b-2 border-x-2 border-custom-morado">
                                        Mayo
                                    </th>
                                    <?php $__currentLoopData = $alignedDataGeneralMayo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $totalVentasGeneralesMayo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <td class="px-6 py-4 border-b-2 border-custom-morado">
                                            <?php echo e($totalVentasGeneralesMayo); ?>

                                        </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td class="px-6 py-4 bg-purple-300 border-b-2 border-e-2 border-custom-morado">
                                        <?php echo e(number_format($sumatoriaGeneralMayo / 7, 2)); ?> 
                                    </td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 border-b-2 border-x-2 border-custom-morado">
                                        Junio
                                    </th>
                                    <?php $__currentLoopData = $alignedDataGeneralJunio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $totalVentasGeneralesJunio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <td class="px-6 py-4 border-b-2 border-custom-morado">
                                            <?php echo e($totalVentasGeneralesJunio); ?>

                                        </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td class="px-6 py-4 bg-purple-300 border-b-2 border-e-2 border-custom-morado">
                                        <?php echo e(number_format($sumatoriaGeneralJunio / 7, 2)); ?> 
                                    </td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 border-b-2 border-x-2 border-custom-morado">
                                        Julio
                                    </th>
                                    <?php $__currentLoopData = $alignedDataGeneralJulio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $totalVentasGeneralesJulio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <td class="px-6 py-4 border-b-2 border-custom-morado">
                                            <?php echo e($totalVentasGeneralesJulio); ?>

                                        </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td class="px-6 py-4 bg-purple-300 border-b-2 border-e-2 border-custom-morado">
                                        <?php echo e(number_format($sumatoriaGeneralJulio / 7, 2)); ?> 
                                    </td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 border-b-2 border-x-2 border-custom-morado">
                                        Agosto
                                    </th>
                                    <?php $__currentLoopData = $alignedDataGeneralAgosto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $totalVentasGeneralesAgosto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <td class="px-6 py-4 border-b-2 border-custom-morado">
                                            <?php echo e($totalVentasGeneralesAgosto); ?>

                                        </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td class="px-6 py-4 bg-purple-300 border-b-2 border-e-2 border-custom-morado">
                                        <?php echo e(number_format($sumatoriaGeneralAgosto / 7, 2)); ?> 
                                    </td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 border-b-2 border-x-2 border-custom-morado">
                                        Septiembre
                                    </th>
                                    <?php $__currentLoopData = $alignedDataGeneralSeptiembre; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $totalVentasGeneralesSeptiembre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <td class="px-6 py-4 border-b-2 border-custom-morado">
                                            <?php echo e($totalVentasGeneralesSeptiembre); ?>

                                        </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td class="px-6 py-4 bg-purple-300 border-b-2 border-e-2 border-custom-morado">
                                        <?php echo e(number_format($sumatoriaGeneralSeptiembre / 7, 2)); ?> 
                                    </td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 border-b-2 border-x-2 border-custom-morado">
                                        Octubre
                                    </th>
                                    <?php $__currentLoopData = $alignedDataGeneralOctubre; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $totalVentasGeneralesOctubre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <td class="px-6 py-4 border-b-2 border-custom-morado">
                                            <?php echo e($totalVentasGeneralesOctubre); ?>

                                        </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td class="px-6 py-4 bg-purple-300 border-b-2 border-e-2 border-custom-morado">
                                        <?php echo e(number_format($sumatoriaGeneralOctubre / 7, 2)); ?>

                                    </td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 border-b-2 border-x-2 border-custom-morado">
                                        Noviembre
                                    </th>
                                    <?php $__currentLoopData = $alignedDataGeneralNoviembre; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $totalVentasGeneralesNoviembre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <td class="px-6 py-4 border-b-2 border-custom-morado">
                                            <?php echo e($totalVentasGeneralesNoviembre); ?>

                                        </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td class="px-6 py-4 bg-purple-300 border-b-2 border-e-2 border-custom-morado">
                                        <?php echo e(number_format($sumatoriaGeneralNoviembre / 7, 2)); ?>

                                    </td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 border-b-2 border-x-2 border-custom-morado">
                                        Diciembre
                                    </th>
                                    <?php $__currentLoopData = $alignedDataGeneralDiciembre; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $totalVentasGeneralesDiciembre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <td class="px-6 py-4 border-b-2 border-custom-morado">
                                            <?php echo e($totalVentasGeneralesDiciembre); ?>

                                        </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td class="px-6 py-4 bg-purple-300 border-b-2 border-e-2 border-custom-morado">
                                        <?php echo e(number_format($sumatoriaGeneralDiciembre / 7, 2)); ?>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        Chart.defaults.backgroundColor = '#000000';
        Chart.defaults.borderColor = '#000000';
        Chart.defaults.color = '#000000';

        var reporteAnual = document.getElementById('barChart').getContext('2d');

        var chartData = {
            labels: <?php echo json_encode($years); ?>,
            datasets: [{
                label: 'Total Ventas Por Año',
                backgroundColor: 'rgb(75, 192, 192)',
                data: <?php echo json_encode($totalVentasPorAño); ?>,
            }]
        };

        <?php if(!empty($colaboradorId) && !empty($añoInicio) && !empty($añoFin)): ?>
            chartData.datasets[0].data = <?php echo json_encode($totalVentasPorAsesorEntreAños); ?>;
        <?php endif; ?>

        var chart = new Chart(reporteAnual, {
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

        console.log('Datos JSON:', chartData);
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
<?php /**PATH C:\xampp\htdocs\ANDF\jetStream\resources\views/reporteAnual.blade.php ENDPATH**/ ?>