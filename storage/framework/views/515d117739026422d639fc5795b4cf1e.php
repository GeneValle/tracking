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
                        Citas |
                    </span>
                </div>

                <hr class="w-3/4 h-1 mx-auto my-4 bg-custom-morado border-0 rounded md:my-5">

                <form method="GET" action="<?php echo e(route('reporteCitas')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="rounded-lg  p-6 my-3">
                        <div class="bg-purple-300 border border-custom-morado rounded-lg p-4">
                            <div class="text-xl text-center font-semibold text-custom-morado mb-2">Colaboradores</div>

                            <select name="colaboradores" id="colaboradores"
                                class="block rounded-lg py-2.5 px-0 w-3/4 text-center mx-auto text-lg text-black bg-purple-300 border-0 border-b-2 border-custom-morado"
                                onchange="this.form.submit()">
                                <option selected>Selecciona un colaborador</option>
                                <?php $__currentLoopData = $asesores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asesor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($asesor->id); ?>" class="text-base">
                                        <?php echo e($asesor->name); ?> - <?php echo e($asesor->puesto); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </form>

                <div class="grid grid-cols-4 gap-3 px-6 my-4 space-x-5">

                    <div class="max-w-sm text-white bg-teal-500 border border-gray-200 rounded-lg shadow py-6 cursor-pointer"
                        onclick="solicitarCitas('1');">

                        <div class="text-center text-4xl font-bold">
                            <?php echo e($numeroCitasVencidas); ?>

                        </div>

                        <div class="text-right text-2xl font-medium mr-2">
                            Vencidas
                        </div>
                    </div>

                    <div class="max-w-sm text-white bg-green-500 border border-gray-200 rounded-lg shadow py-6 cursor-pointer"
                        onclick="solicitarCitas('2');">

                        <div class="text-center text-4xl font-bold">
                            <?php echo e($numeroCitasHoy); ?>

                        </div>

                        <div class="text-right text-2xl font-medium mr-2">
                            Del día
                        </div>
                    </div>

                    <div class="max-w-sm text-white bg-red-500 border border-gray-200 rounded-lg shadow py-6 cursor-pointer"
                        onclick="solicitarCitas('3');">

                        <div class="text-center text-4xl font-bold">
                            <?php echo e($numeroProximasCitas); ?>

                        </div>

                        <div class="text-right text-2xl font-medium mr-2">
                            Próximas
                        </div>
                    </div>

                    <div class="max-w-sm text-white bg-slate-600 border border-gray-200 rounded-lg shadow py-6 cursor-pointer"
                        onclick="solicitarCitas('4');">

                        <div class="text-center text-4xl font-bold">
                            <?php echo e($numeroCitas); ?>

                        </div>

                        <div class="text-right text-2xl font-medium mr-2">
                            Todas
                        </div>
                    </div>
                </div>

                <div id="tablaCitasVencidas" >
                    <div class="overflow-x-auto shadow-md sm:rounded-lg my-4">
                        <?php if(!$sinRegistrosCitasVencidas): ?>
                            <table class="text-sm w-full text-left text-custom-linksmenu">
                                <thead class="text-sm text-custom-linksmenu uppercase bg-purple-300 border-b-2 border-custom-morado my-4">
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
                                            Estado
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Observaciones
                                        </th>
                                    </tr>
                                </thead>
                                <?php $__currentLoopData = $citasVencidas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $citaVencida): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tbody>
                                        <tr class="bg-teal-500 hover:bg-teal-700 text-white">
                                            <td class="text-center">
                                                <?php echo e($citaVencida->funeraria); ?>

                                            </td>
                                            <td class="text-center">
                                                <?php echo e($citaVencida->nombre); ?>

                                            </td>
                                            <td class="text-center">
                                                <?php echo e($citaVencida->fecha); ?>

                                            </td>
                                            <td class="text-center">
                                                <?php echo e($citaVencida->horaInicio); ?>

                                            </td>
                                            <td class="text-center">
                                                <?php echo e($citaVencida->estado); ?>

                                            </td>
                                            <td class="text-center">
                                                <?php echo e($citaVencida->observaciones); ?>

                                            </td>
                                        </tr>
                                    </tbody>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                        <?php else: ?>
                            <table class="text-sm w-full text-left text-custom-linksmenu">
                                <thead class="text-sm text-custom-linksmenu uppercase bg-purple-300 border-b-2 border-custom-morado my-4">
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
                                            Estado
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Observaciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="bg-teal-500 hover:bg-teal-700 text-white">
                                        <td class="text-center">
                                            Sin registros
                                        </td>
                                        <td class="text-center">
                                            Sin registros
                                        </td>
                                        <td class="text-center">
                                            Sin registros
                                        </td>
                                        <td class="text-center">
                                            Sin registros
                                        </td>
                                        <td class="text-center">
                                            Sin registros
                                        </td>
                                        <td class="text-center">
                                            Sin registros
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        <?php endif; ?>
                    </div>
                </div>

                <div id="tablaCitasHoy" style="display: none">
                    <div class="overflow-x-auto shadow-md sm:rounded-lg my-4">
                        <?php if(!$sinRegistrosCitasHoy): ?>
                            <table class="text-sm w-full text-left text-custom-linksmenu">
                                <thead class="text-sm text-custom-linksmenu uppercase bg-purple-300 border-b-2 border-custom-morado my-4">
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
                                            Estado
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Observaciones
                                        </th>
                                    </tr>
                                </thead>
                                <?php $__currentLoopData = $citasHoy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $citaHoy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tbody>
                                        <tr class="bg-green-500 hover:bg-green-700 text-white">
                                            <td class="text-center">
                                                <?php echo e($citaHoy->funeraria); ?>

                                            </td>
                                            <td class="text-center">
                                                <?php echo e($citaHoy->nombre); ?>

                                            </td>
                                            <td class="text-center">
                                                <?php echo e($citaHoy->fecha); ?>

                                            </td>
                                            <td class="text-center">
                                                <?php echo e($citaHoy->horaInicio); ?>

                                            </td>
                                            <td class="text-center">
                                                <?php echo e($citaHoy->estado); ?>

                                            </td>
                                            <td class="text-center">
                                                <?php echo e($citaHoy->observaciones); ?>

                                            </td>
                                        </tr>
                                    </tbody>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                        <?php else: ?>
                            <table class="text-sm w-full text-left text-custom-linksmenu">
                                <thead class="text-sm text-custom-linksmenu uppercase bg-purple-300 border-b-2 border-custom-morado my-4">
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
                                            Estado
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Observaciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="bg-green-500 hover:bg-green-700 text-white">
                                        <td class="text-center">
                                            Sin registros
                                        </td>
                                        <td class="text-center">
                                            Sin registros
                                        </td>
                                        <td class="text-center">
                                            Sin registros
                                        </td>
                                        <td class="text-center">
                                            Sin registros
                                        </td>
                                        <td class="text-center">
                                            Sin registros
                                        </td>
                                        <td class="text-center">
                                            Sin registros
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        <?php endif; ?>
                    </div>
                </div>

                <div id="tablaProximasCitas" style="display: none">
                    <div class="overflow-x-auto shadow-md sm:rounded-lg my-4">
                        <?php if(!$sinRegistrosProximasCitas): ?>
                            <table class="text-sm w-full text-left text-custom-linksmenu">
                                <thead class="text-sm text-custom-linksmenu uppercase bg-purple-300 border-b-2 border-custom-morado my-4">
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
                                            Estado
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Observaciones
                                        </th>
                                    </tr>
                                </thead>
                                <?php $__currentLoopData = $proximasCitas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proximaCita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tbody>
                                        <tr class="bg-red-500 hover:bg-red-700 text-white">
                                            <td class="text-center">
                                                <?php echo e($proximaCita->funeraria); ?>

                                            </td>
                                            <td class="text-center">
                                                <?php echo e($proximaCita->nombre); ?>

                                            </td>
                                            <td class="text-center">
                                                <?php echo e($proximaCita->fecha); ?>

                                            </td>
                                            <td class="text-center">
                                                <?php echo e($citaVencida->horaInicio); ?>

                                            </td>
                                            <td class="text-center">
                                                <?php echo e($citaVencida->estado); ?>

                                            </td>
                                            <td class="text-center">
                                                <?php echo e($citaVencida->observaciones); ?>

                                            </td>
                                        </tr>
                                    </tbody>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                        <?php else: ?>
                            <table class="text-sm w-full text-left text-custom-linksmenu">
                                <thead class="text-sm text-custom-linksmenu uppercase bg-purple-300 border-b-2 border-custom-morado my-4">
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
                                            Estado
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Observaciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="bg-red-500 hover:bg-red-700 text-white">
                                        <td class="text-center">
                                            Sin registros
                                        </td>
                                        <td class="text-center">
                                            Sin registros
                                        </td>
                                        <td class="text-center">
                                            Sin registros
                                        </td>
                                        <td class="text-center">
                                            Sin registros
                                        </td>
                                        <td class="text-center">
                                            Sin registros
                                        </td>
                                        <td class="text-center">
                                            Sin registros
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        <?php endif; ?>
                    </div>
                </div>

                <div id="tablaCitas" style="display: none">
                    <div class="overflow-x-auto shadow-md sm:rounded-lg my-4">
                        <?php if(!$sinRegistrosCitas): ?>
                            <table class="text-sm w-full text-left text-custom-linksmenu">
                                <thead class="text-sm text-custom-linksmenu uppercase bg-purple-300 border-b-2 border-custom-morado my-4">
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
                                            Estado
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Observaciones
                                        </th>
                                    </tr>
                                </thead>
                                <?php $__currentLoopData = $citas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tbody>
                                        <tr class="bg-slate-600 hover:bg-slate-800 text-white">
                                            <td class="text-center">
                                                <?php echo e($cita->funeraria); ?>

                                            </td>
                                            <td class="text-center">
                                                <?php echo e($cita->nombre); ?>

                                            </td>
                                            <td class="text-center">
                                                <?php echo e($cita->fecha); ?>

                                            </td>
                                            <td class="text-center">
                                                <?php echo e($cita->horaInicio); ?>

                                            </td>
                                            <td class="text-center">
                                                <?php echo e($cita->estado); ?>

                                            </td>
                                            <td class="text-center">
                                                <?php echo e($cita->observaciones); ?>

                                            </td>
                                        </tr>
                                    </tbody>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                        <?php else: ?>
                            <table class="text-sm w-full text-left text-custom-linksmenu">
                                <thead class="text-sm text-custom-linksmenu uppercase bg-purple-300 border-b-2 border-custom-morado my-4">
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
                                            Estado
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Observaciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="bg-slate-600 hover:bg-slate-800 text-white">
                                        <td class="text-center">
                                            Sin registros
                                        </td>
                                        <td class="text-center">
                                            Sin registros
                                        </td>
                                        <td class="text-center">
                                            Sin registros
                                        </td>
                                        <td class="text-center">
                                            Sin registros
                                        </td>
                                        <td class="text-center">
                                            Sin registros
                                        </td>
                                        <td class="text-center">
                                            Sin registros
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        function solicitarCitas(id) {
            switch (id) {
                case "1":
                    $("#tablaCitasVencidas").show();
                    $("#tablaCitasHoy").hide();
                    $("#tablaProximasCitas").hide();
                    $("#tablaCitas").hide();
                    break;
                case "2":
                    $("#tablaCitasVencidas").hide();
                    $("#tablaCitasHoy").show();
                    $("#tablaProximasCitas").hide();
                    $("#tablaCitas").hide();
                    break;
                case "3":
                    $("#tablaCitasVencidas").hide();
                    $("#tablaCitasHoy").hide();
                    $("#tablaProximasCitas").show();
                    $("#tablaCitas").hide();
                    break;
                case "4":
                    $("#tablaCitasVencidas").hide();
                    $("#tablaCitasHoy").hide();
                    $("#tablaProximasCitas").hide();
                    $("#tablaCitas").show();
                    break;
            }
        }
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
<?php /**PATH C:\xampp\htdocs\ANDF\jetStream\resources\views\reporteCitas.blade.php ENDPATH**/ ?>