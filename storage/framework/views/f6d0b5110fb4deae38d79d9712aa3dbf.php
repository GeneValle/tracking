<style>
    #info,
    #autorizar2,
    #eliminar,
    #cancelarAutorizar,
    #autorizarCita {
        fill: white;
    }

    #autorizar1 {
        fill: indigo;
    }

    form {
        margin-top: 0;
        margin-bottom: 0;
    }
</style>

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
                    Gerenciamiento

                    <span class="font-normal text-lg text-custom-morado ml-6 mt-3">
                        Autorizar Citas |
                    </span>
                </div>

                <hr class="w-3/4 h-1 mx-auto my-4 bg-custom-morado border-0 rounded md:my-5">

                <form method="GET" action="<?php echo e(route('autCitas')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="rounded-lg  p-6">
                        <div class="bg-purple-300 border border-custom-morado rounded-lg p-4">
                            <div class="text-xl text-center font-semibold text-custom-morado mb-2">Colaboradores</div>

                            <select name="colaboradores" id="colaboradores"
                                class="block py-2.5 px-0 w-3/4 text-lg text-center mx-auto text-slate-950 bg-purple-300 border-0 border-b-2 border-custom-morado"
                                onchange="this.form.submit()">
                                <option selected>Selecciona un colaborador</option>
                                <?php $__currentLoopData = $usuarios->sortBy(function ($usuario) use ($ordenPuestos) {
        return $ordenPuestos[$usuario->puesto];
    }); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($usuario->id); ?>" class="text-base">
                                        <?php echo e($usuario->name); ?>-<?php echo e($usuario->puesto); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </form>

                

                <div class="overflow-x-auto sm:rounded-lg my-4">
                    <?php if(!$sinRegistros): ?>
                        <table class="text-sm w-full text-left text-custom-linksmenu">
                            <thead class="text-sm text-custom-linksmenu uppercase border-b-2 border-custom-morado bg-purple-300 my-4">
                                <tr class="text-center">
                                    
                                    <th scope="col" class="px-4 py-3">
                                        Funeraria
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Nombre
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Fecha
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Hora
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <?php $__currentLoopData = $citasPorAutorizar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $citaPorAutorizar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tbody>
                                    <tr class="bg-purple-300 hover:bg-purple-500 hover:text-custom-header text-black">
                                        
                                        <td class="text-center">
                                            <?php echo e($citaPorAutorizar->funeraria); ?>

                                        </td>
                                        <td class="text-center">
                                            <?php echo e($citaPorAutorizar->nombre); ?>

                                        </td>
                                        <td class="text-center">
                                            <?php echo e($citaPorAutorizar->fecha); ?>

                                        </td>
                                        <td class="text-center">
                                            <?php echo e($citaPorAutorizar->horaInicio); ?>

                                        </td>
                                        <td class="text-center">
                                            <div class="inline-flex p-2 space-x-3">

                                                

                                                <button data-modal-target="detalleCita<?php echo e($citaPorAutorizar->id); ?>"
                                                    data-modal-toggle="detalleCita<?php echo e($citaPorAutorizar->id); ?>"
                                                    class="my-2 text-white bg-custom-morado hover:bg-fuchsia-800 rounded-lg text-center px-2 py-2"
                                                    type="button">
                                                    <svg class="w-6 h-6 text-white" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                                    </svg>
                                                </button>

                                                <div id="detalleCita<?php echo e($citaPorAutorizar->id); ?>" tabindex="-1"
                                                    aria-hidden="true"
                                                    class="fixed z-50 hidden w-full p-6 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                    <div class="relative w-full max-w-2xl max-h-full">

                                                        <div class="relative bg-white rounded-lg shadow">

                                                            <!-- Modal header -->
                                                            <div
                                                                class="bg-custom-morado flex items-start justify-between p-4 border-b rounded-t">
                                                                <div class="text-3xl font-semibold text-white">
                                                                    Detalles de la cita
                                                                </div>

                                                                <button type="button"
                                                                    class="text-white bg-transparent hover:bg-custom-header hover:text-custom-linksmenu rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center"
                                                                    data-modal-hide="detalleCita<?php echo e($citaPorAutorizar->id); ?>">
                                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        fill="none" viewBox="0 0 14 14">
                                                                        <path stroke="currentColor"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                    </svg>
                                                                    <span class="sr-only">Close modal</span>
                                                                </button>
                                                            </div>

                                                            
                                                            <div class="modal-body">
                                                                <div
                                                                    class="text-start text-2xl ms-3 my-3 font-bold text-custom-morado">
                                                                    Cita de
                                                                    <?php echo e($citaPorAutorizar->nombre); ?>

                                                                </div>

                                                                <div class="grid grid-cols-2">
                                                                    <div
                                                                        class="text-start text-base ms-8 my-3 text-custom-morado">
                                                                        <strong>Nombre de funeraria a la que pertenece:
                                                                        </strong> <br>
                                                                        <?php echo e($citaPorAutorizar->funeraria); ?>

                                                                    </div>

                                                                    <div
                                                                        class="text-start text-base ms-8 my-3 text-custom-morado">
                                                                        <strong>Fecha de la cita: </strong> <br>
                                                                        <?php echo e($citaPorAutorizar->fecha); ?>

                                                                    </div>
                                                                </div>

                                                                <div class="grid grid-cols-3">
                                                                    <div
                                                                        class="text-start text-base ms-8 my-3 text-custom-morado">
                                                                        <strong>Hora de Inicio: </strong> <br>
                                                                        <?php echo e($citaPorAutorizar->horaInicio); ?>

                                                                    </div>
                                                                    <div
                                                                        class="text-start text-base ms-8 my-3 text-custom-morado">
                                                                        <strong>Hora Final: </strong> <br>
                                                                        <?php echo e($citaPorAutorizar->horaFin); ?>

                                                                    </div>
                                                                    <div
                                                                        class="text-start text-base ms-8 my-3 text-custom-morado">
                                                                        <strong>Estado de Cita: </strong> <br>
                                                                        <?php echo e($citaPorAutorizar->estado); ?>

                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="text-start text-base ms-8 my-3 text-custom-morado">
                                                                    <strong>Observaciones de la cita: </strong> <br>
                                                                    <?php echo e($citaPorAutorizar->observaciones); ?>

                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                

                                                

                                                <button data-modal-target="autorizarCita<?php echo e($citaPorAutorizar->id); ?>"
                                                    data-modal-toggle="autorizarCita<?php echo e($citaPorAutorizar->id); ?>"
                                                    type="button" title="Autorizar Contacto"
                                                    class="my-2 text-white bg-custom-morado hover:bg-fuchsia-800 rounded-lg text-center px-2 py-2">
                                                    <svg id="autorizar2" xmlns="http://www.w3.org/2000/svg"
                                                        class="w-6 h-6 text-white" viewBox="0 0 448 512">
                                                        <path
                                                            d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                                                    </svg>
                                                </button>

                                                <div id="autorizarCita<?php echo e($citaPorAutorizar->id); ?>" tabindex="-1"
                                                    aria-hidden="true"
                                                    class="fixed z-50 hidden w-full p-6 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                    <div class="relative w-full max-w-2xl max-h-full">

                                                        <div class="relative bg-white rounded-lg shadow">

                                                            <!-- Modal header -->
                                                            <div
                                                                class="bg-custom-morado flex items-start justify-between p-4 border-b rounded-t">
                                                                <div class="text-3xl font-semibold text-white">
                                                                    Atención
                                                                </div>

                                                                <button type="button"
                                                                    class="text-white bg-transparent hover:bg-custom-header hover:text-custom-linksmenu rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center"
                                                                    data-modal-hide="autorizarCita<?php echo e($citaPorAutorizar->id); ?>">
                                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        fill="none" viewBox="0 0 14 14">
                                                                        <path stroke="currentColor"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                    </svg>
                                                                    <span class="sr-only">Close modal</span>
                                                                </button>
                                                            </div>

                                                            
                                                            <div class="modal-body">
                                                                <div class="text-center text-2xl font-bold">
                                                                    ¿Desea autorizar la cita?
                                                                </div>
                                                            </div>
                                                            

                                                            
                                                            <div class="text-right">
                                                                <div class="inline-flex">
                                                                    <div class="m-4">
                                                                        <button type="button" title="cancelar"
                                                                            data-modal-hide="autorizarCita<?php echo e($citaPorAutorizar->id); ?>"
                                                                            class="text-custom-header text-right bg-custom-morado focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2">
                                                                            <svg id="cancelarAutorizar"
                                                                                class="w-4 h-4"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                viewBox="0 0 384 512">
                                                                                <path
                                                                                    d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                                                                            </svg>
                                                                        </button>
                                                                    </div>

                                                                    <div class="m-4">
                                                                        <button type="button" title="autorizar"
                                                                            onclick="autorizarCitas(<?php echo e($citaPorAutorizar->id); ?>)"
                                                                            class="text-custom-header bg-custom-morado focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2">
                                                                            <svg id="autorizarCita" class="w-4 h-4"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                viewBox="0 0 448 512">
                                                                                <path
                                                                                    d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                                                                            </svg>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                                

                                                
                                                <button data-modal-target="eliminarCita<?php echo e($citaPorAutorizar->id); ?>"
                                                    data-modal-toggle="eliminarCita<?php echo e($citaPorAutorizar->id); ?>"
                                                    type="button" title="Eliminar Cita por autorizar"
                                                    class="my-2 text-white bg-custom-morado hover:bg-fuchsia-800 rounded-lg text-center px-2 py-2">
                                                    <svg id="eliminar" class="w-6 h-6"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                                        <path
                                                            d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                                                    </svg>
                                                </button>

                                                <div id="eliminarCita<?php echo e($citaPorAutorizar->id); ?>" tabindex="-1"
                                                    aria-hidden="true"
                                                    class="fixed z-50 hidden w-full p-6 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                    <div class="relative w-full max-w-2xl max-h-full">

                                                        <div class="relative bg-white rounded-lg shadow">

                                                            <!-- Modal header -->
                                                            <div
                                                                class="bg-custom-morado flex items-start justify-between p-4 border-b rounded-t">
                                                                <div class="text-3xl font-semibold text-white">
                                                                    Atención
                                                                </div>

                                                                <button type="button"
                                                                    class="text-white bg-transparent hover:bg-custom-header hover:text-custom-linksmenu rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center"
                                                                    data-modal-hide="eliminarCita<?php echo e($citaPorAutorizar->id); ?>">
                                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        fill="none" viewBox="0 0 14 14">
                                                                        <path stroke="currentColor"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                    </svg>
                                                                    <span class="sr-only">Close modal</span>
                                                                </button>
                                                            </div>

                                                            
                                                            <div class="modal-body">
                                                                <div class="text-center text-2xl font-bold">
                                                                    ¿Desea eliminar la cita?
                                                                </div>
                                                            </div>
                                                            


                                                            <div class="text-right">
                                                                <div class="inline-flex p-2 space-x-3">
                                                                    <button type="button" title="cancelar"
                                                                        class="bg-custom-morado rounded-lg w-10 h-10 ml-auto inline-flex justify-center items-center"
                                                                        data-modal-hide="eliminarCita<?php echo e($citaPorAutorizar->id); ?>">
                                                                        <svg id="cancelarAutorizar" class="w-4 h-4"
                                                                            aria-hidden="true"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 384 512">
                                                                            <path
                                                                                d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                                                                        </svg>
                                                                    </button>
                                                                    <form
                                                                        action="<?php echo e(route('autCitas.destroy', $citaPorAutorizar->id)); ?>"
                                                                        method="post">
                                                                        <?php echo csrf_field(); ?>
                                                                        <?php echo method_field('delete'); ?>
                                                                        <button type="submit" title="Eliminar cita"
                                                                            class="bg-custom-morado rounded-lg w-10 h-10 ml-auto inline-flex justify-center items-center">
                                                                            <svg id="eliminar" class="w-4 h-4"
                                                                                aria-hidden="true"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                viewBox="0 0 448 512" fill="none">
                                                                                <path
                                                                                    d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                                                                            </svg>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    <?php else: ?>
                        <table class="text-sm w-full text-left text-custom-linksmenu">
                            <thead class="text-sm text-custom-linksmenu uppercase border-b-2 border-custom-morado bg-purple-300 my-4">
                                <tr class="text-center">
                                    
                                    <th scope="col" class="px-4 py-3">
                                        Funeraria
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Nombre
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Fecha
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Hora
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-purple-300 hover:bg-purple-500 text-black">
                                    
                                    <td class="text-center">Sin registros</td>
                                    <td class="text-center">Sin registros</td>
                                    <td class="text-center">Sin registros</td>
                                    <td class="text-center">Sin registros</td>
                                    <td class="text-center">Sin registros</td>
                                </tr>
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
<?php /**PATH C:\xampp\htdocs\ANDF\jetStream\resources\views/autCitas.blade.php ENDPATH**/ ?>