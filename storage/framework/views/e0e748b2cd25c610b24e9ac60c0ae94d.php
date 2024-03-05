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
                <div class="mt-4 ml-6 font-bold text-4xl text-slate-950 flex items-center">
                    Gerenciamiento

                    <span class="font-normal text-lg text-custom-morado ml-6 mt-3">
                        Estructura del equipo |
                    </span>
                </div>

                <hr class="w-3/4 h-1 mx-auto my-4 bg-custom-morado border-0 rounded md:my-5">

                

                <div class="flex flex-wrap my-5">
                    <?php $__currentLoopData = $liderEquipo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="basis-1/3 px-4 mb-4"></div>

                    <div class="basis-1/3 px-4 mb-4">

                        <div class="max-w-sm bg-purple-300 border-2 border-gray-200 rounded-lg shadow">
                            <a href="#">
                                <img class="rounded-t-lg" src="" alt="" />
                            </a>
                            <div class="p-5">
                                <div class="mb-2 text-2xl text-center font-bold tracking-tight text-custom-morado">
                                    <?php echo e($lider->puesto); ?> <br>
                                    <?php echo e($lider->name); ?>

                                </div>

                                <div class="mt-2 flex flex-wrap text-center text-custom-linksmenu justify-between">
                                    <div class="w-1/3 mt-2">
                                        Prospectos
                                    </div>
                                    <div class="w-1/3 mt-2">
                                        Citas
                                    </div>
                                    <div class="w-1/3 mt-2">
                                        Ventas
                                    </div>
                                </div>

                                <div class="mt-2 flex flex-wrap text-center text-custom-linksmenu justify-between">
                                    <div class="w-1/3 mt-2">
                                        <?php echo e($numeroProspectosLider[$loop->index]->numeroProspectosL); ?>

                                    </div>
                                    <div class="w-1/3 mt-2">
                                        <?php echo e($numeroCitasLider[$loop->index]->numeroCitasL); ?>

                                    </div>
                                    <div class="w-1/3 mt-2">
                                        <?php echo e($numeroVentasLider[$loop->index]->numeroVentasL); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="basis-1/3 px-4 mb-4"></div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <hr class="w-auto h-0 mx-auto my-4 bg-custom-morado customDashed">

                <div class="flex flex-wrap my-5">
                    <?php $__currentLoopData = $asesores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asesor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="w-1/3 px-4 mb-4">
                            <div class="max-w-sm bg-purple-300 border-2 border-gray-200 rounded-lg shadow">
                                <a href="#">
                                    <img class="rounded-t-lg" src="" alt="" />
                                </a>
                                <div class="p-5">
                                    <div class="mb-2 text-2xl text-center font-bold tracking-tight text-custom-morado">
                                        <?php echo e($asesor->puesto); ?> <br>
                                        <?php echo e($asesor->name); ?>

                                    </div>

                                    <div class="mt-2 flex flex-wrap text-center text-custom-linksmenu justify-between">
                                        <div class="w-1/3 mt-2">
                                            Prospectos
                                        </div>
                                        <div class="w-1/3 mt-2">
                                            Citas
                                        </div>
                                        <div class="w-1/3 mt-2">
                                            Ventas
                                        </div>
                                    </div>

                                    <div class="mt-2 flex flex-wrap text-center text-custom-linksmenu justify-between">
                                        <div class="w-1/3 mt-2">
                                            <?php echo e($numeroProspectosAsesor[$loop->index]->numeroProspectosA); ?>

                                        </div>
                                        <div class="w-1/3 mt-2">
                                            <?php echo e($numeroCitasAsesor[$loop->index]->numeroCitasA); ?>

                                        </div>
                                        <div class="w-1/3 mt-2">
                                            <?php echo e($numeroVentasAsesor[$loop->index]->numeroVentasA); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
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
<?php /**PATH C:\xampp\htdocs\ANDF\jetStream\resources\views\equipo.blade.php ENDPATH**/ ?>