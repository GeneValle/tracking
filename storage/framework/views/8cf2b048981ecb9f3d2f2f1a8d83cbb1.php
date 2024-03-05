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
                    Ventas

                    <span class="font-normal text-lg text-custom-morado ml-6 mt-3">|</span>
                </div>

                <hr class="w-3/4 h-1 mx-auto my-4 bg-custom-morado border-0 rounded md:my-5">

                <div class="rounded-lg p-6 my-3">
                    <form action="<?php echo e(route('ventas')); ?>" method="get">
                        <div class="bg-purple-300 border border-custom-morado rounded-lg p-4">
                            <div class="text-xl text-center font-semibold text-custom-morado mb-2">Colaboradores</div>

                            <select name="colaboradores" id="underline_select"
                                class="block rounded-lg py-2.5 px-0 w-3/4 text-center mx-auto text-lg text-black bg-purple-300 border-0 border-b-2 border-custom-morado">
                                <option selected>Selecciona un colaborador</option>
                                <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($usuario->id); ?>" class="text-base">
                                        <?php echo e($usuario->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="grid grid-cols-2 gap-6 px-4 py-2 my-3">
                            <div>
                                <div class="text-center">
                                    <label for="fechaInicial" class="text-xl text-custom-morado">Fecha Inicial:</label>
                                </div>

                                <div class="mt-2 text-center">
                                    <input type="date" name="fechaInicio" id="fechaInicio" class="w-3/4 rounded-lg bg-purple-300">
                                </div>
                            </div>

                            <div>
                                <div class="text-center">
                                    <label for="fechaFinal" class="text-xl text-custom-morado">Fecha Final:</label>
                                </div>

                                <div class="mt-2 text-center">
                                    <input type="date" name="fechaFinal" id="fechaFinal" class="rounded-lg w-3/4 bg-purple-300">
                                </div>

                                <div class="text-right p-2 mt-7">
                                    <button type="submit"
                                        class="text-custom-header bg-custom-morado focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2">
                                        Filtrar ventas </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="rounded-lg  p-6 my-3">
                    <?php if(!$sinRegistros): ?>
                    <table class="text-sm w-full text-left text-custom-linksmenu">
                        <thead class="text-sm text-custom-linksmenu uppercase bg-purple-300 border-b-2 border-custom-morado my-4">
                            <tr class="text-center">
                                <th scope="col" class="px-4 py-3">
                                    Fecha de venta
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    Cliente
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    Observaciones
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    Monto
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    Operaciones
                                </th>
                            </tr>
                        </thead>
                        <?php $__currentLoopData = $ventas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $venta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tbody class="bg-purple-300 hover:bg-purple-500 text-black">
                            <td class="text-center">
                                <?php echo e($venta->fecha); ?>

                            </td>
                            <td class="text-center">
                                <?php echo e($venta->nombre); ?>

                            </td>
                            <td class="text-center">
                                <?php echo e($venta->observaciones); ?>

                            </td>
                            <td class="text-center">
                                <?php
                                    $montoFormateado = number_format($venta->monto, 2, '.', ',');
                                    echo '$' . $montoFormateado;
                                ?>
                            </td>
                            <td class="text-center">
                                <div class="inline-flex p-2 space-x-3">
                                    <button type="button" title="Detalle Venta" data-modal-target="detalleVenta<?php echo e($venta->id); ?>"
                                        data-modal-toggle="detalleVenta<?php echo e($venta->id); ?>"
                                        class="px-3
                                            py-2 text-xs font-medium text-center items-center text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" class="m-auto"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                                        </svg>
                                    </button>

                                    <div id="detalleVenta<?php echo e($venta->id); ?>"  tabindex="-1" aria-hidden="true"
                                        class="fixed z-50 hidden w-full p-6 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative w-full max-w-2xl max-h-full">
                                            <div class="relative bg-white rounded-lg shadow">
                                                <!-- Modal header -->
                                                <div
                                                    class="bg-custom-morado flex items-start justify-between p-4 border-b rounded-t">
                                                    <div class="text-3xl font-semibold text-white">
                                                        Detalles de Venta
                                                    </div>

                                                    <button type="button"
                                                        class="text-white bg-transparent hover:bg-custom-header hover:text-custom-linksmenu rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center"
                                                        data-modal-hide="detalleVenta<?php echo e($venta->id); ?>">
                                                        <svg class="w-3 h-3" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <div class="text-start text-custom-morado px-4 my-2">
                                                        <label for="nombre" class="text-lg font-bold">Cliente:
                                                        </label>
                                                        <div class="my-1 font-semibold text-base">
                                                            <?php echo e($venta->nombre); ?>

                                                        </div>
                                                    </div>

                                                    <div class="grid grid-cols-2 gap-6 px-4">

                                                        <div class="text-start text-custom-morado my-2">
                                                            <label for="fechaVenta" class="text-lg font-bold">Fecha de
                                                                venta:
                                                            </label>
                                                            <div class="my-1 font-semibold text-base">
                                                                <?php echo e($venta->fecha); ?>

                                                            </div>
                                                        </div>
                                                        <div class="text-start text-custom-morado my-2">
                                                            <label for="montoVenta" class="text-lg font-bold">Monto de
                                                                la venta:
                                                            </label>
                                                            <div class="my-1 font-semibold text-base">
                                                                <?php
                                                                    $montoFormateado = number_format($venta->monto, 2, '.', ',');
                                                                    echo '$' . $montoFormateado;
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="text-start text-custom-morado px-4 my-2">
                                                        <label for="nombreProducto" class="text-lg font-bold">Nombre
                                                            del
                                                            producto: </label>
                                                        <div class="my-1 font-semibold text-base">
                                                            <?php echo e($venta->producto); ?>

                                                        </div>
                                                    </div>

                                                    <div class="text-start text-custom-morado px-4 my-2">
                                                        <label for="observaciones"
                                                            class="text-lg font-bold">Observaciones:
                                                        </label>
                                                        <div class="my-1 font-semibold text-base">
                                                            <?php echo e($venta->observaciones); ?>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="text-right">
                                                    <div class="inline-flex p-2">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="button" title="No se pueden realizar cambios" disabled="disabled"
                                        class="px-3 py-2 text-xs font-medium text-center items-center text-white rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" class="m-auto"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                                        </svg>
                                    </button>

                                    


                                    

                                    <button type="button" title="No se pueden realizar cambios" disabled="disabled"
                                        class="px-3 py-2 text-xs font-medium text-center items-center text-white rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" class="m-auto"
                                            onclick="eliminarVenta()" viewBox="0 0 512 512">
                                            <path
                                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tbody>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                    <?php else: ?>
                    <table class="text-sm w-full text-left text-custom-linksmenu">
                        <thead class="text-sm text-custom-linksmenu uppercase bg-purple-300 border-custom-morado border-b-2 my-4">
                            <tr class="text-center">
                                <th scope="col" class="px-4 py-3">
                                    Fecha de venta
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    Cliente
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    Observaciones
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    Monto
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    Operaciones
                                </th>
                            </tr>
                        </thead>

                        <tbody class="bg-purple-300 hover:bg-purple-500 text-black">
                            <td class="text-center">Sin registros</td>
                            <td class="text-center">Sin registros</td>
                            <td class="text-center">Sin registros</td>
                            <td class="text-center">Sin registros</td>
                            <td class="text-center">Sin registros</td>
                        </tbody>
                    </table>
                    <?php endif; ?>
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
<?php /**PATH C:\xampp\htdocs\ANDF\jetStream\resources\views\ventas.blade.php ENDPATH**/ ?>