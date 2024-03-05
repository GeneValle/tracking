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

    

    <div class="py-5 bg-purple-400">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-purple-300 overflow-hidden shadow-xl sm:rounded-lg">

                <div class="text-center text-4xl mt-5 font-bold text-custom-morado">
                    Bienvenido <?php echo e(Auth::user()->name); ?>

                </div>

                <img src="img/ANDF_Tracking_Logo.png" class="h-80 w-90 m-auto mt-5">

                <div class="text-center font-semibold text-custom-morado text-2xl mt-4">
                    Este mes has contribuido con <?php echo e($numeroVentasUserAuth); ?> ventas
                </div>

                <hr class="w-3/4 h-1 mx-auto my-4 bg-custom-morado border-0 rounded">

                <div class="flex justify-center my-4">
                    <table class="w-3/4 text-md text-center table-auto rounded-lg bg-purple-300 text-slate-950 border-2">
                        <thead class="uppercase font-bold">
                            <tr>
                                <th scope="col" class="px-6 py-">
                                    Nombre
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Prospectos
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Citas
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Ventas
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Mes actual
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Mes anterior
                                </th>
                            </tr>
                        </thead>
                        <?php $__currentLoopData = $asesores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asesor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tbody>
                                <tr class="border-b hover:bg-custom-morado hover:text-white">
                                    <th scope="row" class="px-6 py-4">
                                        <?php echo e($asesor->name); ?>

                                    </th>

                                    <td class="px-6 py-4">
                                        <?php if(isset($numeroProspectos[$loop->index])): ?>
                                            <?php echo e($numeroProspectos[$loop->index]->numeroProspectos); ?>

                                        <?php else: ?>
                                            0
                                        <?php endif; ?>
                                    </td>

                                    <td class="px-6 py-4">
                                        <?php if(isset($numeroCitas[$loop->index])): ?>
                                            <?php echo e($numeroCitas[$loop->index]->numeroCitas); ?>

                                        <?php else: ?>
                                            0
                                        <?php endif; ?>
                                    </td>

                                    <td class="px-6 py-4">
                                        <?php if(isset($numeroVentas[$loop->index])): ?>
                                            <?php echo e($numeroVentas[$loop->index]->numeroVentas); ?>

                                        <?php else: ?>
                                            0
                                        <?php endif; ?>
                                    </td>

                                    <td class="px-6 py-4">
                                        <input id="mesActual" type="radio" value="mes_actual" name="seleccion_mes"
                                            class="w-4 h-4 text-custom-morado bg-white border-white focus:ring-red-500">
                                    </td>

                                    <td class="px-6 py-4">
                                        <input id="mesAnterior" type="radio" value="mes_anterior" name="seleccion_mes"
                                            class="w-4 h-4 text-custom-morado bg-white border-white focus:ring-red-500">
                                    </td>
                                </tr>
                            </tbody>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>

                </div>
            </div>
        </div>
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
<?php /**PATH C:\xampp\htdocs\ANDF\jetStream\resources\views/dashboard.blade.php ENDPATH**/ ?>