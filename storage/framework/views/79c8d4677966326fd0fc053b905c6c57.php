

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
                    Citas

                    <span class="font-normal text-lg text-custom-morado ml-6 mt-3">
                        Agenda de Citas |
                    </span>

                    <!-- Modal toggle -->

                    

                    <button data-modal-target="registroCita" data-modal-toggle="registroCita"
                        class="block mt-4 ml-2 text-white bg-custom-morado hover:bg-fuchsia-600 rounded-lg text-center px-2 py-2"
                        type="button">
                        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 20 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 8h6m-3 3V5m-6-.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0ZM5 11h3a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z" />
                        </svg>
                    </button>

                    <div id="registroCita" tabindex="-1" aria-hidden="true"
                        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-2xl max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow">
                                <!-- Modal header -->
                                <div class="bg-custom-morado flex items-start justify-between p-4 border-b rounded-t">
                                    <div class="text-xl font-semibold text-white">
                                        Registro de Cita
                                    </div>

                                    <button type="button"
                                        class="text-white bg-transparent hover:bg-custom-header hover:text-custom-linksmenu rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center"
                                        data-modal-hide="registroCita">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>

                                <!-- Modal body -->

                                <form accept-charset="utf-8" method="POST" action="<?php echo e(route('citas.store')); ?>">
                                    <?php echo csrf_field(); ?>

                                    <label for="persona"
                                        class="text-lg font-semibold text-custom-morado px-5">Persona:</label>
                                    <div class="my-2">
                                        <select name="persona" id="persona"
                                            class="rounded-lg mx-6 h-10 w-4/5 text-xs text-custom-morado font-semibold">
                                            <option selected>---Selecciona una opción---</option>
                                            <?php $__currentLoopData = $contactos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contacto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($contacto->id); ?>"><?php echo e($contacto->nombre); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    <div class="flex flex-row px-6">
                                        <div class="basis-3/12 text-center">
                                            <label for="tipoCita"
                                                class="text-lg font-semibold text-custom-morado px-5">Tipo:</label>
                                            <div class="my-2">
                                                <select name="tipoCita" id="tipoCita"
                                                    class="rounded-lg w-4/5 h-1/2 text-xs text-custom-morado font-semibold">
                                                    <option selected>---Selecciona una opción---</option>
                                                    <?php $__currentLoopData = $tiposdeCita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tCita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($tCita); ?>"><?php echo e($tCita); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="basis-3/12 text-center">
                                            <label for="fecha"
                                                class="text-lg font-semibold text-custom-morado px-5">Fecha:</label>
                                            <div class="my-2">
                                                <input type="date" name="fecha" id="fecha"
                                                    class="rounded-lg w-4/5 h-1/2 text-sm text-custom-morado">
                                            </div>
                                        </div>
                                        <div class="basis-3/12 text-center">
                                            <label for="horaInicio"
                                                class="text-lg font-semibold text-custom-morado px-5">Hora
                                                Inicio:</label>
                                            <div class="my-2">
                                                <input type="time" name="horaInicio" id="horaInicio"
                                                    class="rounded-lg h-1/2 w-4/5">
                                            </div>
                                        </div>
                                        <div class="basis-3/12 text-center">
                                            <label for="horaFinal"
                                                class="text-lg font-semibold text-custom-morado px-5">Hora
                                                Final:</label>
                                            <div class="my-2">
                                                <input type="time" name="horaFinal" id="horaFinal"
                                                    class="rounded-lg h-1/2 w-4/5">
                                            </div>
                                        </div>
                                    </div>

                                    <label for="lugar"
                                        class="text-lg font-semibold text-custom-morado px-5">Lugar:</label>
                                    <div class="my-2">
                                        <select name="lugar" id="lugar"
                                            class="rounded-lg mx-6 h-10 w-4/5 text-xs text-custom-morado font-semibold">
                                            <option selected>---Selecciona una opción---</option>
                                            <?php $__currentLoopData = $lugarCita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lCita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($lCita); ?>"><?php echo e($lCita); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    <label for="comentarios"
                                        class="text-lg font-semibold text-custom-morado px-5">Comentarios:</label>
                                    <textarea name="comentarios" id="comentarios" rows="4"
                                        class="block p-3 w-11/12 m-auto text-sm bg-white rounded-lg border-2 border-green-300 focus:ring-blue-500 focus:border-blue-500"></textarea>

                                    <!-- Modal footer -->
                                    <div class="text-right p-2 border-y rounded-b">
                                        <button type="submit"
                                            class="text-custom-header bg-custom-morado focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2">
                                            Registrar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    
                </div>

                <hr class="w-3/4 h-1 mx-auto my-4 bg-custom-morado border-0 rounded md:my-5">


                <div class="rounded-lg p-6 my-3">
                    <form id="formularioCitas" accept-charset="utf-8" method="get" action="<?php echo e(route('citas')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="bg-purple-300 border border-custom-morado rounded-lg p-4 w-3/4 mx-auto">
                            <div class="text-xl font-semibold text-custom-morado text-center mb-2">Colaboradores</div>

                            <select name="colaboradores" id="colaboradores"
                                class="block rounded-lg py-2.5 px-0 w-3/4 text-lg text-center mx-auto text-black bg-purple-300 border-0 border-b-2 border-custom-morado">
                                <option selected>Selecciona un colaborador</option>
                                <?php $__currentLoopData = $asesores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asesor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($asesor->id); ?>" class="text-base">
                                        <?php echo e($asesor->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>

                            <input type="hidden" name="colaboradorId" id="colaboradorId">
                        </div>
                        
                        <div class="text-right p-2 mt-6">
                            <button type="submit"
                                class="text-custom-header bg-custom-morado focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2">
                                Filtrar citas
                            </button>
                        </div>
                    </form>
                </div>

                

                <div class="grid grid-cols-4 gap-3 px-8 my-4 space-x-8">
                    <div class="max-w-sm text-white bg-teal-500 border border-gray-200 rounded-lg shadow py-6">
                        <div class="text-center text-4xl font-bold">
                            <?php echo e($numerocitasProgramadas); ?>

                        </div>

                        <div class="text-right text-2xl font-medium mr-2">
                            Programadas
                        </div>
                    </div>

                    <div class="max-w-sm text-white bg-red-500 border border-gray-200 rounded-lg shadow py-6">
                        <div class="text-center text-4xl font-bold">
                            <?php echo e($numerocitasCanceladas); ?>

                        </div>

                        <div class="text-right text-2xl font-medium mr-2">
                            Canceladas
                        </div>
                    </div>

                    <div class="max-w-sm text-white bg-green-500 border border-gray-200 rounded-lg shadow py-6">
                        <div class="text-center text-4xl font-bold">
                            <?php echo e($numerocitasRealizadas); ?>

                        </div>

                        <div class="text-right text-2xl font-medium mr-2">
                            Realizadas
                        </div>
                    </div>

                    <div class="max-w-sm text-white bg-slate-600 border border-gray-200 rounded-lg shadow py-6">
                        <div class="text-center text-4xl font-bold">
                            <?php echo e($numerocitasPorAutorizar); ?>

                        </div>

                        <div class="text-right text-2xl font-medium mr-2">
                            Por autorizar
                        </div>
                    </div>
                </div>

                <div class="shadow-2xl">
                    <div class="tabs">
                        <ul
                            class="tab-links flex flex-wrap items-center justify-between px-5 py-3 font-medium text-base">
                            <li class="tab"><a href="#tab1" class="text-custom-linksmenu">Seguimientos de
                                    hoy</a></li>
                            <li class="tab"><a href="#tab2" class="text-custom-linksmenu">Seguimientos
                                    vencidos</a></li>
                            <li class="tab"><a href="#tab3" class="text-custom-linksmenu">Próximos
                                    seguimientos</a></li>
                            <li class="tab"><a href="#tab4" class="text-custom-linksmenu">Seguimientos por
                                    Autorizar</a></li>
                        </ul>

                        <div class="tab-content" id="tab1">
                            <div class="overflow-x-auto shadow-md sm:rounded-lg my-4">
                                <?php if($citasHoyCount === 0): ?>
                                    <table class="text-sm w-full text-left text-custom-linksmenu">
                                        <thead
                                            class="text-sm text-custom-linksmenu uppercase bg-purple-300 border-custom-morado border-b-2 my-4">
                                            <tr class="text-center">
                                                <th scope="col" class="px-4 py-3">
                                                    Nombre
                                                </th>
                                                <th scope="col" class="px-4 py-3">
                                                    Fecha
                                                </th>
                                                <th scope="col" class="px-4 py-3">
                                                    Hora Inicio
                                                </th>
                                                <th scope="col" class="px-4 py-3">
                                                    Hora Fin
                                                </th>
                                                <th scope="col" class="px-4 py-3">
                                                    Tipo
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="bg-teal-500 hover:bg-teal-700 text-white">
                                                <td class="text-center p-2">
                                                    Sin registros
                                                </td>
                                                <td class="text-center p-2">
                                                    Sin registros
                                                </td>
                                                <td class="text-center p-2">
                                                    Sin registros
                                                </td>
                                                <td class="text-center p-2">
                                                    Sin registros
                                                </td>
                                                <td class="text-center p-2">
                                                    Sin registros
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php else: ?>
                                    <table class="text-sm w-full text-left text-custom-linksmenu">
                                        <thead
                                            class="text-sm text-custom-linksmenu uppercase bg-purple-300 border-custom-morado border-b-2 my-4">
                                            <tr class="text-center">
                                                <th scope="col" class="px-4 py-3">
                                                    Nombre
                                                </th>
                                                <th scope="col" class="px-4 py-3">
                                                    Fecha
                                                </th>
                                                <th scope="col" class="px-4 py-3">
                                                    Hora Inicio
                                                </th>
                                                <th scope="col" class="px-4 py-3">
                                                    Hora Fin
                                                </th>
                                                <th scope="col" class="px-4 py-3">
                                                    Tipo
                                                </th>
                                                <th scope="col" class="px-4 py-3">
                                                    Detalles
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="citasHoyBody">
                                            <?php $__currentLoopData = $citasHoy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $citaHoy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr class="bg-teal-500 hover:bg-teal-700 text-white">
                                                    <td class="text-center">
                                                        <?php echo e($citaHoy->Nombre); ?>

                                                    </td>
                                                    <td class="text-center">
                                                        <?php echo e($citaHoy->fecha); ?>

                                                    </td>
                                                    <td class="text-center">
                                                        <?php echo e($citaHoy->horaInicio); ?>

                                                    </td>
                                                    <td class="text-center">
                                                        <?php echo e($citaHoy->horaFin); ?>

                                                    </td>
                                                    <td class="text-center">
                                                        <?php echo e($citaHoy->tipo); ?>

                                                    </td>
                                                    <td class="text-center">
                                                        

                                                        <div class="flex justify-center items-center">
                                                            <button
                                                                data-modal-target="detallesCitasHoy<?php echo e($citaHoy->id); ?>"
                                                                data-modal-toggle="detallesCitasHoy<?php echo e($citaHoy->id); ?>"
                                                                class="my-2 text-white bg-teal-700 hover:bg-teal-900 rounded-lg text-center px-2 py-2"
                                                                type="button">
                                                                <svg class="w-6 h-6 text-white" aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    fill="currentColor" viewBox="0 0 20 20">
                                                                    <path
                                                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                                                </svg>
                                                            </button>
                                                        </div>

                                                        <div id="detallesCitasHoy<?php echo e($citaHoy->id); ?>" tabindex="-1"
                                                            aria-hidden="true"
                                                            class="fixed z-50 hidden w-full p-6 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">

                                                            <div class="relative w-full max-w-2xl max-h-full">

                                                                <div class="relative bg-white rounded-lg shadow">

                                                                    
                                                                    <div
                                                                        class="bg-custom-morado flex items-start justify-between p-4 border-b rounded-t">
                                                                        <div class="text-3xl font-semibold text-white">
                                                                            Detalles de Cita
                                                                        </div>

                                                                        <button type="button"
                                                                            class="text-white bg-transparent hover:bg-custom-header hover:text-custom-linksmenu rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center"
                                                                            data-modal-hide="detallesCitasHoy<?php echo e($citaHoy->id); ?>">
                                                                            <svg class="w-3 h-3" aria-hidden="true"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                fill="none" viewBox="0 0 14 14">
                                                                                <path stroke="currentColor"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    stroke-width="2"
                                                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                            </svg>
                                                                            <span class="sr-only">Close modal</span>
                                                                        </button>
                                                                    </div>
                                                                    

                                                                    

                                                                    <div class="modal-body">
                                                                        <div class="flex flex-wrap px-2 mt-5">

                                                                            <div class="basis-3/4">
                                                                                <div
                                                                                    class="text-2xl font-medium text-custom-morado text-start">
                                                                                    <?php echo e($detallesCitasHoy[$loop->index]->funeraria); ?>

                                                                                </div>
                                                                            </div>
                                                                            
                                                                        </div>

                                                                        <div
                                                                            class="px-2 text-2xl font-medium text-custom-morado text-start">
                                                                            <?php echo e($detallesCitasHoy[$loop->index]->nombre); ?>

                                                                        </div>

                                                                        <div class="my-5 text-start">
                                                                            <div class="grid grid-cols-3 gap-4 px-2">
                                                                                <div
                                                                                    class="text-sm text-custom-morado">
                                                                                    <strong>Fecha: </strong>
                                                                                    <?php echo e($detallesCitasHoy[$loop->index]->fecha); ?>

                                                                                </div>

                                                                                <div
                                                                                    class="text-sm text-custom-morado">
                                                                                    <strong>Hora de inicio: </strong>
                                                                                    <?php echo e($detallesCitasHoy[$loop->index]->horaInicio); ?>

                                                                                </div>

                                                                                <div
                                                                                    class="text-sm text-custom-morado">
                                                                                    <strong>Hora Fin: </strong>
                                                                                    <?php echo e($detallesCitasHoy[$loop->index]->horaFin); ?>

                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="my-5 text-start">
                                                                            <div class="grid grid-cols-3 gap-4 px-2">

                                                                                <div
                                                                                    class="text-sm text-custom-morado">
                                                                                    <strong>Tipo: </strong>
                                                                                    <?php echo e($detallesCitasHoy[$loop->index]->tipo); ?>

                                                                                </div>

                                                                                <div
                                                                                    class="text-sm text-custom-morado">
                                                                                    <strong>Lugar: </strong>
                                                                                    <?php echo e($detallesCitasHoy[$loop->index]->lugar); ?>

                                                                                </div>

                                                                                <div
                                                                                    class="text-sm text-custom-morado">
                                                                                    <strong>Estado de la cita: </strong>
                                                                                    <?php echo e($detallesCitasHoy[$loop->index]->estado); ?>

                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="my-5 text-start">
                                                                            <div class="flex flex-wrap px-2">

                                                                                <div class="basis-1/3">
                                                                                    <div
                                                                                        class="text-sm text-custom-morado">
                                                                                        <strong>Telefono: </strong>
                                                                                        <?php echo e($detallesCitasHoy[$loop->index]->telefono); ?>

                                                                                    </div>
                                                                                </div>

                                                                                <div class="basis-2/3">
                                                                                    <div
                                                                                        class="text-sm text-custom-morado">
                                                                                        <strong>Correo: </strong>
                                                                                        <?php echo e($detallesCitasHoy[$loop->index]->correo); ?>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="my-5 text-start px-2">
                                                                            <div class="text-sm text-custom-morado">
                                                                                <strong>Observaciones: </strong>
                                                                                <?php echo e($detallesCitasHoy[$loop->index]->observaciones); ?>

                                                                            </div>
                                                                        </div>

                                                                        

                                                                        <div class="text-right">
                                                                            <div class="inline-flex">
                                                                                <button type="button"
                                                                                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Cancelar
                                                                                    cita</button>
                                                                                <button type="button"
                                                                                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Realizar
                                                                                    cita</button>
                                                                            </div>
                                                                        </div>

                                                                        

                                                                        <hr
                                                                            class="w-auto h-0 mx-auto my-4 bg-custom-morado customDashed">
                                                                        <div
                                                                            class="text-2xl text-custom-morado mx-5 my-3">
                                                                            Citas que ha tenido este contacto:
                                                                        </div>

                                                                        <div
                                                                            class="relative overflow-x-auto shadow-md sm:rounded-lg my-3">
                                                                            <?php if($citasContactoHoyCount === 0): ?>
                                                                                <table
                                                                                    class="w-full text-sm text-left text-gray-500">
                                                                                    <thead
                                                                                        class="text-xs text-gray-700 uppercase bg-gray-50">
                                                                                        <tr class="text-center">
                                                                                            <th scope="col"
                                                                                                class="px-6 py-3">
                                                                                                Fecha
                                                                                            </th>
                                                                                            <th scope="col"
                                                                                                class="px-6 py-3">
                                                                                                Hora
                                                                                            </th>
                                                                                            <th scope="col"
                                                                                                class="px-6 py-3">
                                                                                                Duración
                                                                                            </th>
                                                                                            <th scope="col"
                                                                                                class="px-6 py-3">
                                                                                                Estado
                                                                                            </th>
                                                                                            <th scope="col"
                                                                                                class="px-6 py-3">
                                                                                                Comentarios
                                                                                            </th>
                                                                                        </tr>
                                                                                    </thead>

                                                                                    <?php $__currentLoopData = $citasContactoHoy[$citaHoy->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <tbody class="text-center">
                                                                                            <tr
                                                                                                class="bg-white border-b-4">
                                                                                                <td class="">
                                                                                                    Sin registros
                                                                                                </td>
                                                                                                <td class="">
                                                                                                    Sin registros
                                                                                                </td>
                                                                                                <td class="">
                                                                                                    Sin registros
                                                                                                </td>
                                                                                                <td class="">
                                                                                                    Sin registros
                                                                                                </td>
                                                                                                <td class="">
                                                                                                    Sin registros
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                </table>
                                                                            <?php else: ?>
                                                                                <table
                                                                                    class="w-full text-sm text-left text-gray-500">
                                                                                    <thead
                                                                                        class="text-xs text-gray-700 uppercase bg-gray-50">
                                                                                        <tr class="text-center">
                                                                                            <th scope="col"
                                                                                                class="px-6 py-3">
                                                                                                Fecha
                                                                                            </th>
                                                                                            <th scope="col"
                                                                                                class="px-6 py-3">
                                                                                                Hora
                                                                                            </th>
                                                                                            <th scope="col"
                                                                                                class="px-6 py-3">
                                                                                                Duración
                                                                                            </th>
                                                                                            <th scope="col"
                                                                                                class="px-6 py-3">
                                                                                                Estado
                                                                                            </th>
                                                                                            <th scope="col"
                                                                                                class="px-6 py-3">
                                                                                                Comentarios
                                                                                            </th>
                                                                                        </tr>
                                                                                    </thead>

                                                                                    <?php $__currentLoopData = $citasContactoHoy[$citaHoy->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <tbody class="text-center">
                                                                                            <tr
                                                                                                class="bg-white border-b-4">
                                                                                                <td class="">
                                                                                                    <?php echo e($cita->fecha); ?>

                                                                                                </td>
                                                                                                <td class="">
                                                                                                    <?php echo e($cita->horaInicio); ?>

                                                                                                </td>
                                                                                                <td class="">
                                                                                                    <?php echo e($cita->duracion); ?>

                                                                                                    minutos
                                                                                                </td>
                                                                                                <td class="">
                                                                                                    <?php echo e($cita->estado); ?>

                                                                                                </td>
                                                                                                <td class="">
                                                                                                    <?php echo e($cita->comentarios); ?>

                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                </table>
                                                                            <?php endif; ?>

                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="tab-content" id="tab2">
                            <div class="overflow-x-auto shadow-md sm:rounded-lg my-4">
                                <?php if($citasVencidasCount === 0): ?>
                                    <table class="text-sm w-full text-left text-custom-linksmenu">
                                        <thead
                                            class="text-sm text-custom-linksmenu uppercase bg-purple-300 border-custom-morado border-b-2 my-4">
                                            <tr class="text-center">
                                                <th scope="col" class="px-4 py-3">
                                                    Nombre
                                                </th>
                                                <th scope="col" class="px-4 py-3">
                                                    Fecha
                                                </th>
                                                <th scope="col" class="px-4 py-3">
                                                    Hora Inicio
                                                </th>
                                                <th scope="col" class="px-4 py-3">
                                                    Hora Fin
                                                </th>
                                                <th scope="col" class="px-4 py-3">
                                                    Tipo
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="bg-red-500 hover:bg-red-700 text-white">
                                                <td class="text-center p-2">
                                                    Sin registros
                                                </td>
                                                <td class="text-center p-2">
                                                    Sin registros
                                                </td>
                                                <td class="text-center p-2">
                                                    Sin registros
                                                </td>
                                                <td class="text-center p-2">
                                                    Sin registros
                                                </td>
                                                <td class="text-center p-2">
                                                    Sin registros
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php else: ?>
                                    <table class="text-sm w-full text-left text-custom-linksmenu">
                                        <thead
                                            class="text-sm text-custom-linksmenu uppercase bg-purple-300 border-custom-morado border-b-2 my-4">
                                            <tr class="text-center">
                                                <th scope="col" class="px-4 py-3">
                                                    Nombre
                                                </th>
                                                <th scope="col" class="px-4 py-3">
                                                    Fecha
                                                </th>
                                                <th scope="col" class="px-4 py-3">
                                                    Hora Inicio
                                                </th>
                                                <th scope="col" class="px-4 py-3">
                                                    Hora Fin
                                                </th>
                                                <th scope="col" class="px-4 py-3">
                                                    Tipo
                                                </th>
                                                <th scope="col" class="px-4 py-3">
                                                    Detalles
                                                </th>
                                            </tr>
                                        </thead>
                                        <?php $__currentLoopData = $citasVencidas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $citaVencida): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tbody>
                                                <tr class="bg-red-500 hover:bg-red-700 text-white">
                                                    <td class="text-center">
                                                        <?php echo e($citaVencida->Nombre); ?>

                                                    </td>
                                                    <td class="text-center">
                                                        <?php echo e($citaVencida->fecha); ?>

                                                    </td>
                                                    <td class="text-center">
                                                        <?php echo e($citaVencida->horaInicio); ?>

                                                    </td>
                                                    <td class="text-center">
                                                        <?php echo e($citaVencida->horaFin); ?>

                                                    </td>
                                                    <td class="text-center">
                                                        <?php echo e($citaVencida->tipo); ?>

                                                    </td>
                                                    <td class="text-center">
                                                        <div class="flex justify-center items-center">
                                                            <button
                                                                data-modal-target="detallesCitasVencidas<?php echo e($citaVencida->id); ?>"
                                                                data-modal-toggle="detallesCitasVencidas<?php echo e($citaVencida->id); ?>"
                                                                class="my-2 text-white bg-red-700 hover:bg-red-800 rounded-lg text-center px-2 py-2"
                                                                type="button">
                                                                <svg class="w-6 h-6 text-white" aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    fill="currentColor" viewBox="0 0 20 20">
                                                                    <path
                                                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                                                </svg>
                                                            </button>
                                                        </div>

                                                        <div id="detallesCitasVencidas<?php echo e($citaVencida->id); ?>"
                                                            tabindex="-1" aria-hidden="true"
                                                            class="fixed z-50 hidden w-full p-6 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                            <div class="relative w-full max-w-2xl max-h-full">

                                                                <div class="relative bg-white rounded-lg shadow">

                                                                    <div
                                                                        class="bg-custom-morado flex items-start justify-between p-4 border-b rounded-t">
                                                                        <div class="text-3xl font-semibold text-white">
                                                                            Detalles de Cita
                                                                        </div>

                                                                        <button type="button"
                                                                            class="text-white bg-transparent hover:bg-custom-header hover:text-custom-linksmenu rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center"
                                                                            data-modal-hide="detallesCitasVencidas<?php echo e($citaVencida->id); ?>">
                                                                            <svg class="w-3 h-3" aria-hidden="true"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                fill="none" viewBox="0 0 14 14">
                                                                                <path stroke="currentColor"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    stroke-width="2"
                                                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                            </svg>
                                                                            <span class="sr-only">Close modal</span>
                                                                        </button>
                                                                    </div>

                                                                    <div class="modal-body">
                                                                        <div class="flex flex-wrap px-2 mt-5">
                                                                            <div class="basis-3/4">
                                                                                <div
                                                                                    class="text-2xl font-medium text-custom-morado text-start">
                                                                                    <?php echo e($detallesCitasVencidas[$loop->index]->funeraria); ?>

                                                                                </div>
                                                                            </div>

                                                                            
                                                                        </div>

                                                                        <div
                                                                            class="px-2 text-2xl font-medium text-custom-morado text-start">
                                                                            <?php echo e($detallesCitasVencidas[$loop->index]->nombre); ?>

                                                                        </div>

                                                                        <div class="my-5 text-start">
                                                                            <div class="grid grid-cols-3 gap-4 px-2">

                                                                                <div
                                                                                    class="text-sm text-custom-morado">
                                                                                    <strong>Fecha: </strong>
                                                                                    <?php echo e($detallesCitasVencidas[$loop->index]->fecha); ?>

                                                                                </div>

                                                                                <div
                                                                                    class="text-sm text-custom-morado">
                                                                                    <strong>Hora de inicio:
                                                                                    </strong>
                                                                                    <?php echo e($detallesCitasVencidas[$loop->index]->horaInicio); ?>

                                                                                </div>

                                                                                <div
                                                                                    class="text-sm text-custom-morado">
                                                                                    <strong>Hora Fin: </strong>
                                                                                    <?php echo e($detallesCitasVencidas[$loop->index]->horaFin); ?>

                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="my-5 text-start">
                                                                            <div class="grid grid-cols-3 gap-4 px-2">

                                                                                <div
                                                                                    class="text-sm text-custom-morado">
                                                                                    <strong>Tipo: </strong>
                                                                                    <?php echo e($detallesCitasVencidas[$loop->index]->tipo); ?>

                                                                                </div>

                                                                                <div
                                                                                    class="text-sm text-custom-morado">
                                                                                    <strong>Lugar: </strong>
                                                                                    <?php echo e($detallesCitasVencidas[$loop->index]->lugar); ?>

                                                                                </div>

                                                                                <div
                                                                                    class="text-sm text-custom-morado">
                                                                                    <strong>Estado de la cita:
                                                                                    </strong>
                                                                                    <?php echo e($detallesCitasVencidas[$loop->index]->estado); ?>

                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="my-5 text-start">
                                                                            <div class="flex flex-wrap px-2">

                                                                                <div class="basis-1/3">
                                                                                    <div
                                                                                        class="text-sm text-custom-morado">
                                                                                        <strong>Telefono: </strong>
                                                                                        <?php echo e($detallesCitasVencidas[$loop->index]->telefono); ?>

                                                                                    </div>
                                                                                </div>

                                                                                <div class="basis-2/3">
                                                                                    <div
                                                                                        class="text-sm text-custom-morado">
                                                                                        <strong>Correo: </strong>
                                                                                        <?php echo e($detallesCitasVencidas[$loop->index]->correo); ?>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="my-5 text-start px-2">
                                                                            <div class="text-sm text-custom-morado">
                                                                                <strong>Observaciones: </strong>
                                                                                <?php echo e($detallesCitasVencidas[$loop->index]->observaciones); ?>

                                                                            </div>
                                                                        </div>

                                                                        <div class="text-right">
                                                                            <div class="inline-flex">
                                                                                <button type="button"
                                                                                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Cancelar
                                                                                    cita</button>
                                                                                <button type="button"
                                                                                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Realizar
                                                                                    cita</button>
                                                                            </div>
                                                                        </div>

                                                                        <hr
                                                                            class="w-auto h-0 mx-auto my-4 bg-custom-morado customDashed">

                                                                        <div
                                                                            class="text-2xl my-3 mx-5 text-custom-morado">
                                                                            Citas que ha tenido este contacto:
                                                                        </div>

                                                                        <div
                                                                            class="relative overflow-x-auto shadow-md sm:rounded-lg my-3">
                                                                            <?php if($citasContactoVencidasCount === 0): ?>
                                                                                <table
                                                                                    class="w-full text-sm text-left text-gray-500">
                                                                                    <thead
                                                                                        class="text-xs text-gray-700 uppercase bg-gray-50">
                                                                                        <tr class="text-center">
                                                                                            <th scope="col"
                                                                                                class="px-6 py-3">
                                                                                                Fecha
                                                                                            </th>
                                                                                            <th scope="col"
                                                                                                class="px-6 py-3">
                                                                                                Hora
                                                                                            </th>
                                                                                            <th scope="col"
                                                                                                class="px-6 py-3">
                                                                                                Duración
                                                                                            </th>
                                                                                            <th scope="col"
                                                                                                class="px-6 py-3">
                                                                                                Estado
                                                                                            </th>
                                                                                            <th scope="col"
                                                                                                class="px-6 py-3">
                                                                                                Comentarios
                                                                                            </th>
                                                                                        </tr>
                                                                                    </thead>

                                                                                    <?php $__currentLoopData = $citasContactoVencidas[$citaVencida->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cita2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <tbody class="text-center">
                                                                                            <tr
                                                                                                class="bg-white border-b-4">
                                                                                                <td class="">
                                                                                                    Sin registros
                                                                                                </td>
                                                                                                <td class="">
                                                                                                    Sin registros
                                                                                                </td>
                                                                                                <td class="">
                                                                                                    Sin registros
                                                                                                </td>
                                                                                                <td class="">
                                                                                                    Sin registros
                                                                                                </td>
                                                                                                <td class="">
                                                                                                    Sin registros
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                </table>
                                                                            <?php else: ?>
                                                                                <table
                                                                                    class="w-full text-sm text-left text-gray-500">
                                                                                    <thead
                                                                                        class="text-xs text-gray-700 uppercase bg-gray-50">
                                                                                        <tr class="text-center">
                                                                                            <th scope="col"
                                                                                                class="px-6 py-3">
                                                                                                Fecha
                                                                                            </th>
                                                                                            <th scope="col"
                                                                                                class="px-6 py-3">
                                                                                                Hora
                                                                                            </th>
                                                                                            <th scope="col"
                                                                                                class="px-6 py-3">
                                                                                                Duración
                                                                                            </th>
                                                                                            <th scope="col"
                                                                                                class="px-6 py-3">
                                                                                                Estado
                                                                                            </th>
                                                                                            <th scope="col"
                                                                                                class="px-6 py-3">
                                                                                                Comentarios
                                                                                            </th>
                                                                                        </tr>
                                                                                    </thead>

                                                                                    <?php $__currentLoopData = $citasContactoVencidas[$citaVencida->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cita2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <tbody class="text-center">
                                                                                            <tr
                                                                                                class="bg-white border-b-4">
                                                                                                <td class="">
                                                                                                    <?php echo e($cita2->fecha); ?>

                                                                                                </td>
                                                                                                <td class="">
                                                                                                    <?php echo e($cita2->horaInicio); ?>

                                                                                                </td>
                                                                                                <td class="">
                                                                                                    <?php echo e($cita2->duracion); ?>

                                                                                                    minutos
                                                                                                </td>
                                                                                                <td class="">
                                                                                                    <?php echo e($cita2->estado); ?>

                                                                                                </td>
                                                                                                <td class="">
                                                                                                    <?php echo e($cita2->comentarios); ?>

                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                </table>
                                                                            <?php endif; ?>
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
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="tab-content" id="tab3">
                            <div class="overflow-x-auto shadow-md sm:rounded-lg my-4">
                                <?php if($proximasCitasCount === 0): ?>
                                    <table class="text-sm w-full text-left text-custom-linksmenu">
                                        <thead
                                            class="text-sm text-custom-linksmenu uppercase bg-purple-300 border-custom-morado border-b-2 my-4">
                                            <tr class="text-center">
                                                <th scope="col" class="px-4 py-3">
                                                    Nombre
                                                </th>
                                                <th scope="col" class="px-4 py-3">
                                                    Fecha
                                                </th>
                                                <th scope="col" class="px-4 py-3">
                                                    Hora Inicio
                                                </th>
                                                <th scope="col" class="px-4 py-3">
                                                    Hora Fin
                                                </th>
                                                <th scope="col" class="px-4 py-3">
                                                    Tipo
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="bg-green-500 hover:bg-green-700 text-white">
                                                <td class="text-center p-2">
                                                    Sin registros
                                                </td>
                                                <td class="text-center p-2">
                                                    Sin registros
                                                </td>
                                                <td class="text-center p-2">
                                                    Sin registros
                                                </td>
                                                <td class="text-center p-2">
                                                    Sin registros
                                                </td>
                                                <td class="text-center p-2">
                                                    Sin registros
                                                </td>
                                        </tbody>
                                    </table>
                                <?php else: ?>
                                    <table class="text-sm w-full text-left text-custom-linksmenu">
                                        <thead
                                            class="text-sm text-custom-linksmenu uppercase bg-purple-300 border-custom-morado border-b-2 my-4">
                                            <tr class="text-center">
                                                <th scope="col" class="px-4 py-3">
                                                    Nombre
                                                </th>
                                                <th scope="col" class="px-4 py-3">
                                                    Fecha
                                                </th>
                                                <th scope="col" class="px-4 py-3">
                                                    Hora Inicio
                                                </th>
                                                <th scope="col" class="px-4 py-3">
                                                    Hora Fin
                                                </th>
                                                <th scope="col" class="px-4 py-3">
                                                    Tipo
                                                </th>
                                                <th scope="col" class="px-4 py-3">
                                                    Detalles
                                                </th>
                                            </tr>
                                        </thead>
                                        <?php $__currentLoopData = $proximasCitas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proximaCita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tbody>
                                                <tr class="bg-green-500 hover:bg-green-700 text-white">
                                                    <td class="text-center">
                                                        <?php echo e($proximaCita->Nombre); ?>

                                                    </td>
                                                    <td class="text-center">
                                                        <?php echo e($proximaCita->fecha); ?>

                                                    </td>
                                                    <td class="text-center">
                                                        <?php echo e($proximaCita->horaInicio); ?>

                                                    </td>
                                                    <td class="text-center">
                                                        <?php echo e($proximaCita->horaFin); ?>

                                                    </td>
                                                    <td class="text-center">
                                                        <?php echo e($proximaCita->tipo); ?>

                                                    </td>
                                                    <td class="text-center">
                                                        <div class="flex justify-center items-center">
                                                            <button
                                                                data-modal-target="detallesProximasCitas<?php echo e($proximaCita->id); ?>"
                                                                data-modal-toggle="detallesProximasCitas<?php echo e($proximaCita->id); ?>"
                                                                class="my-2 text-white bg-green-700 hover:bg-green-900 rounded-lg text-center px-2 py-2"
                                                                type="button">
                                                                <svg class="w-6 h-6 text-white" aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    fill="currentColor" viewBox="0 0 20 20">
                                                                    <path
                                                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                                                </svg>
                                                            </button>
                                                        </div>

                                                        <div id="detallesProximasCitas<?php echo e($proximaCita->id); ?>"
                                                            tabindex="-1" aria-hidden="true"
                                                            class="fixed z-50 hidden w-full p-6 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                            <div class="relative w-full max-w-2xl max-h-full">

                                                                <div class="relative bg-white rounded-lg shadow">

                                                                    <div
                                                                        class="bg-custom-morado flex items-start justify-between p-4 border-b rounded-t">
                                                                        <div class="text-3xl font-semibold text-white">
                                                                            Detalles de Cita
                                                                        </div>

                                                                        <button type="button"
                                                                            class="text-white bg-transparent hover:bg-custom-header hover:text-custom-linksmenu rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center"
                                                                            data-modal-hide="detallesProximasCitas<?php echo e($proximaCita->id); ?>">
                                                                            <svg class="w-3 h-3" aria-hidden="true"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                fill="none" viewBox="0 0 14 14">
                                                                                <path stroke="currentColor"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    stroke-width="2"
                                                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                            </svg>
                                                                            <span class="sr-only">Close modal</span>
                                                                        </button>
                                                                    </div>

                                                                    <div class="modal-body">
                                                                        <div class="flex flex-wrap px-2 mt-5">
                                                                            <div class="basis-3/4">
                                                                                <div
                                                                                    class="text-2xl font-medium text-custom-morado text-start">
                                                                                    <?php echo e($detallesProximasCitas[$loop->index]->funeraria); ?>

                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div
                                                                            class="px-2 text-2xl font-medium text-custom-morado text-start">
                                                                            <?php echo e($detallesProximasCitas[$loop->index]->nombre); ?>

                                                                        </div>

                                                                        <div class="my-5 text-start">
                                                                            <div class="grid grid-cols-3 gap-4 px-2">

                                                                                <div
                                                                                    class="text-sm text-custom-morado">
                                                                                    <strong>Fecha: </strong>
                                                                                    <?php echo e($detallesProximasCitas[$loop->index]->fecha); ?>

                                                                                </div>

                                                                                <div
                                                                                    class="text-sm text-custom-morado">
                                                                                    <strong>Hora de inicio: </strong>
                                                                                    <?php echo e($detallesProximasCitas[$loop->index]->horaInicio); ?>

                                                                                </div>

                                                                                <div
                                                                                    class="text-sm text-custom-morado">
                                                                                    <strong>Hora Fin: </strong>
                                                                                    <?php echo e($detallesProximasCitas[$loop->index]->horaFin); ?>

                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="my-5 text-start">
                                                                            <div class="grid grid-cols-3 gap-4 px-2">

                                                                                <div
                                                                                    class="text-sm text-custom-morado">
                                                                                    <strong>Tipo: </strong>
                                                                                    <?php echo e($detallesProximasCitas[$loop->index]->tipo); ?>

                                                                                </div>

                                                                                <div
                                                                                    class="text-sm text-custom-morado">
                                                                                    <strong>Lugar: </strong>
                                                                                    <?php echo e($detallesProximasCitas[$loop->index]->lugar); ?>

                                                                                </div>

                                                                                <div
                                                                                    class="text-sm text-custom-morado">
                                                                                    <strong>Estado de la cita: </strong>
                                                                                    <?php echo e($detallesProximasCitas[$loop->index]->estado); ?>

                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="my-5 text-start">
                                                                            <div class="flex flex-wrap px-2">

                                                                                <div class="basis-1/3">
                                                                                    <div
                                                                                        class="text-sm text-custom-morado">
                                                                                        <strong>Telefono: </strong>
                                                                                        <?php echo e($detallesProximasCitas[$loop->index]->telefono); ?>

                                                                                    </div>
                                                                                </div>

                                                                                <div class="basis-2/3">
                                                                                    <div
                                                                                        class="text-sm text-custom-morado">
                                                                                        <strong>Correo: </strong>
                                                                                        <?php echo e($detallesProximasCitas[$loop->index]->correo); ?>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="my-5 text-start px-2">
                                                                            <div class="text-sm text-custom-morado">
                                                                                <strong>Observaciones: </strong>
                                                                                <?php echo e($detallesProximasCitas[$loop->index]->observaciones); ?>

                                                                            </div>
                                                                        </div>


                                                                        <div class="text-right">
                                                                            <div class="inline-flex">
                                                                                <button type="button"
                                                                                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Cancelar
                                                                                    cita</button>
                                                                                <button type="button"
                                                                                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Realizar
                                                                                    cita</button>
                                                                            </div>
                                                                        </div>

                                                                        <hr
                                                                            class="w-auto h-0 mx-auto my-4 bg-custom-morado customDashed">

                                                                        <div
                                                                            class="text-2xl my-3 mx-5 text-custom-morado">
                                                                            Citas que ha tenido este contacto:
                                                                        </div>

                                                                        <div
                                                                            class="relative overflow-x-auto shadow-md sm:rounded-lg my-3">
                                                                            <?php if($proximasCitasContactoCount === 0): ?>
                                                                                <table
                                                                                    class="w-full text-sm text-left text-gray-500">
                                                                                    <thead
                                                                                        class="text-xs text-gray-700 uppercase bg-gray-50">
                                                                                        <tr class="text-center">
                                                                                            <th scope="col"
                                                                                                class="px-6 py-3">
                                                                                                Fecha
                                                                                            </th>
                                                                                            <th scope="col"
                                                                                                class="px-6 py-3">
                                                                                                Hora
                                                                                            </th>
                                                                                            <th scope="col"
                                                                                                class="px-6 py-3">
                                                                                                Duración
                                                                                            </th>
                                                                                            <th scope="col"
                                                                                                class="px-6 py-3">
                                                                                                Estado
                                                                                            </th>
                                                                                            <th scope="col"
                                                                                                class="px-6 py-3">
                                                                                                Comentarios
                                                                                            </th>
                                                                                        </tr>
                                                                                    </thead>

                                                                                    <?php $__currentLoopData = $proximasCitasContacto[$proximaCita->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cita3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <tbody class="text-center">
                                                                                            <tr
                                                                                                class="bg-white border-b-4">
                                                                                                <td class="">
                                                                                                    Sin registros
                                                                                                </td>
                                                                                                <td class="">
                                                                                                    Sin registros
                                                                                                </td>
                                                                                                <td class="">
                                                                                                    Sin registros
                                                                                                </td>
                                                                                                <td class="">
                                                                                                    Sin registros
                                                                                                </td>
                                                                                                <td class="">
                                                                                                    Sin registros
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                </table>
                                                                            <?php else: ?>
                                                                                <table
                                                                                    class="w-full text-sm text-left text-gray-500">
                                                                                    <thead
                                                                                        class="text-xs text-gray-700 uppercase bg-gray-50">
                                                                                        <tr class="text-center">
                                                                                            <th scope="col"
                                                                                                class="px-6 py-3">
                                                                                                Fecha
                                                                                            </th>
                                                                                            <th scope="col"
                                                                                                class="px-6 py-3">
                                                                                                Hora
                                                                                            </th>
                                                                                            <th scope="col"
                                                                                                class="px-6 py-3">
                                                                                                Duración
                                                                                            </th>
                                                                                            <th scope="col"
                                                                                                class="px-6 py-3">
                                                                                                Estado
                                                                                            </th>
                                                                                            <th scope="col"
                                                                                                class="px-6 py-3">
                                                                                                Comentarios
                                                                                            </th>
                                                                                        </tr>
                                                                                    </thead>

                                                                                    <?php $__currentLoopData = $proximasCitasContacto[$proximaCita->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cita3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <tbody class="text-center">
                                                                                            <tr
                                                                                                class="bg-white border-b-4">
                                                                                                <td class="">
                                                                                                    <?php echo e($cita3->fecha); ?>

                                                                                                </td>
                                                                                                <td class="">
                                                                                                    <?php echo e($cita3->horaInicio); ?>

                                                                                                </td>
                                                                                                <td class="">
                                                                                                    <?php echo e($cita3->duracion); ?>

                                                                                                    minutos
                                                                                                </td>
                                                                                                <td class="">
                                                                                                    <?php echo e($cita3->estado); ?>

                                                                                                </td>
                                                                                                <td class="">
                                                                                                    <?php echo e($cita3->comentarios); ?>

                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                </table>
                                                                            <?php endif; ?>
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
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="tab-content" id="tab4">
                            <div class="overflow-x-auto shadow-md sm:rounded-lg my-4">
                                <?php if($citasPorAutorizarCount === 0): ?>
                                    <table class="text-sm w-full text-left text-custom-linksmenu">
                                        <thead
                                            class="text-sm text-custom-linksmenu uppercase bg-purple-300 border-custom-morado border-b-2 my-4">
                                            <tr class="text-center">
                                                <th scope="col" class="px-4 py-3">
                                                    Nombre
                                                </th>
                                                <th scope="col" class="px-4 py-3">
                                                    Fecha
                                                </th>
                                                <th scope="col" class="px-4 py-3">
                                                    Hora Inicio
                                                </th>
                                                <th scope="col" class="px-4 py-3">
                                                    Hora Fin
                                                </th>
                                                <th scope="col" class="px-4 py-3">
                                                    Tipo
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="bg-slate-600 hover:bg-slate-800 text-white">
                                                <td class="text-center p-2">
                                                    Sin registros
                                                </td>
                                                <td class="text-center p-2">
                                                    Sin registros
                                                </td>
                                                <td class="text-center p-2">
                                                    Sin registros
                                                </td>
                                                <td class="text-center p-2">
                                                    Sin registros
                                                </td>
                                                <td class="text-center p-2">
                                                    Sin registros
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php else: ?>
                                    <table class="text-sm w-full text-left text-custom-linksmenu">
                                        <thead
                                            class="text-sm text-custom-linksmenu uppercase bg-purple-300 border-custom-morado border-b-2 my-4">
                                            <tr class="text-center">
                                                <th scope="col" class="px-4 py-3">
                                                    Nombre
                                                </th>
                                                <th scope="col" class="px-4 py-3">
                                                    Fecha
                                                </th>
                                                <th scope="col" class="px-4 py-3">
                                                    Hora Inicio
                                                </th>
                                                <th scope="col" class="px-4 py-3">
                                                    Hora Fin
                                                </th>
                                                <th scope="col" class="px-4 py-3">
                                                    Tipo
                                                </th>
                                                <th scope="col" class="px-4 py-3">
                                                    Detalles
                                                </th>
                                            </tr>
                                        </thead>
                                        <?php $__currentLoopData = $citasPorAutorizar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $citaPorAutorizar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tbody>
                                                <tr class="bg-slate-600 hover:bg-slate-800 text-white">
                                                    <td class="text-center">
                                                        <?php echo e($citaPorAutorizar->Nombre); ?>

                                                    </td>
                                                    <td class="text-center">
                                                        <?php echo e($citaPorAutorizar->fecha); ?>

                                                    </td>
                                                    <td class="text-center">
                                                        <?php echo e($citaPorAutorizar->horaInicio); ?>

                                                    </td>
                                                    <td class="text-center">
                                                        <?php echo e($citaPorAutorizar->horaFin); ?>

                                                    </td>
                                                    <td class="text-center">
                                                        <?php echo e($citaPorAutorizar->tipo); ?>

                                                    </td>
                                                    <td class="text-center">
                                                        <div class="flex justify-center items-center">
                                                            <button
                                                                data-modal-target="detallesCitasPorAutorizar<?php echo e($citaPorAutorizar->id); ?>"
                                                                data-modal-toggle="detallesCitasPorAutorizar<?php echo e($citaPorAutorizar->id); ?>"
                                                                class="my-2 text-white bg-slate-800 hover:bg-slate-900 rounded-lg text-center px-2 py-2"
                                                                type="button">
                                                                <svg class="w-6 h-6 text-white" aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    fill="currentColor" viewBox="0 0 20 20">
                                                                    <path
                                                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                                                </svg>
                                                            </button>
                                                        </div>

                                                        <div id="detallesCitasPorAutorizar<?php echo e($citaPorAutorizar->id); ?>"
                                                            tabindex="-1" aria-hidden="true"
                                                            class="fixed z-50 hidden w-full p-6 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                            <div class="relative w-full max-w-2xl max-h-full">

                                                                <div class="relative bg-white rounded-lg shadow">

                                                                    <div
                                                                        class="bg-custom-morado flex items-start justify-between p-4 border-b rounded-t">
                                                                        <div class="text-3xl font-semibold text-white">
                                                                            Detalles de Cita
                                                                        </div>

                                                                        <button type="button"
                                                                            class="text-white bg-transparent hover:bg-custom-header hover:text-custom-linksmenu rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center"
                                                                            data-modal-hide="detallesCitasPorAutorizar<?php echo e($citaPorAutorizar->id); ?>">
                                                                            <svg class="w-3 h-3" aria-hidden="true"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                fill="none" viewBox="0 0 14 14">
                                                                                <path stroke="currentColor"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    stroke-width="2"
                                                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                            </svg>
                                                                            <span class="sr-only">Close modal</span>
                                                                        </button>
                                                                    </div>

                                                                    <div class="modal-body">
                                                                        <div class="flex flex-wrap px-2 mt-5">
                                                                            <div class="basis-3/4">
                                                                                <div
                                                                                    class="text-2xl font-medium text-custom-morado text-start">
                                                                                    <?php echo e($detallesCitasPorAutorizar[$loop->index]->funeraria); ?>

                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div
                                                                            class="px-2 text-2xl font-medium text-custom-morado text-start">
                                                                            <?php echo e($detallesCitasPorAutorizar[$loop->index]->nombre); ?>

                                                                        </div>

                                                                        <div class="my-5 text-start">
                                                                            <div class="grid grid-cols-3 gap-4 px-2">

                                                                                <div
                                                                                    class="text-sm text-custom-morado">
                                                                                    <strong>Fecha: </strong>
                                                                                    <?php echo e($detallesCitasPorAutorizar[$loop->index]->fecha); ?>

                                                                                </div>

                                                                                <div
                                                                                    class="text-sm text-custom-morado">
                                                                                    <strong>Hora de inicio: </strong>
                                                                                    <?php echo e($detallesCitasPorAutorizar[$loop->index]->horaInicio); ?>

                                                                                </div>

                                                                                <div
                                                                                    class="text-sm text-custom-morado">
                                                                                    <strong>Hora Fin: </strong>
                                                                                    <?php echo e($detallesCitasPorAutorizar[$loop->index]->horaFin); ?>

                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="my-5 text-start">
                                                                            <div class="grid grid-cols-3 gap-4 px-2">

                                                                                <div
                                                                                    class="text-sm text-custom-morado">
                                                                                    <strong>Tipo: </strong>
                                                                                    <?php echo e($detallesCitasPorAutorizar[$loop->index]->tipo); ?>

                                                                                </div>

                                                                                <div
                                                                                    class="text-sm text-custom-morado">
                                                                                    <strong>Lugar: </strong>
                                                                                    <?php echo e($detallesCitasPorAutorizar[$loop->index]->lugar); ?>

                                                                                </div>

                                                                                <div
                                                                                    class="text-sm text-custom-morado">
                                                                                    <strong>Estado de la cita: </strong>
                                                                                    <?php echo e($detallesCitasPorAutorizar[$loop->index]->estado); ?>

                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="my-5 text-start">
                                                                            <div class="flex flex-wrap px-2">

                                                                                <div class="basis-1/3">
                                                                                    <div
                                                                                        class="text-sm text-custom-morado">
                                                                                        <strong>Telefono: </strong>
                                                                                        <?php echo e($detallesCitasPorAutorizar[$loop->index]->telefono); ?>

                                                                                    </div>
                                                                                </div>

                                                                                <div class="basis-2/3">
                                                                                    <div
                                                                                        class="text-sm text-custom-morado">
                                                                                        <strong>Correo: </strong>
                                                                                        <?php echo e($detallesCitasPorAutorizar[$loop->index]->correo); ?>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="my-5 text-start px-2">
                                                                            <div class="text-sm text-custom-morado">
                                                                                <strong>Observaciones: </strong>
                                                                                <?php echo e($detallesCitasPorAutorizar[$loop->index]->observaciones); ?>

                                                                            </div>
                                                                        </div>


                                                                        <div class="text-right">
                                                                            <div class="inline-flex">
                                                                                <button type="button"
                                                                                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Cancelar
                                                                                    cita</button>
                                                                                <button type="button"
                                                                                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Realizar
                                                                                    cita</button>
                                                                            </div>
                                                                        </div>

                                                                        <hr
                                                                            class="w-auto h-0 mx-auto my-4 bg-custom-morado customDashed">

                                                                        <div
                                                                            class="text-2xl my-3 mx-5 text-custom-morado">
                                                                            Citas que ha tenido este contacto:
                                                                        </div>

                                                                        <div
                                                                            class="relative overflow-x-auto shadow-md sm:rounded-lg my-3">
                                                                            <?php if($citasContactoPorAutorizarCount === 0): ?>
                                                                                <table
                                                                                    class="w-full text-sm text-left text-gray-500">
                                                                                    <thead
                                                                                        class="text-xs text-gray-700 uppercase bg-gray-50">
                                                                                        <tr class="text-center">
                                                                                            <th scope="col"
                                                                                                class="px-6 py-3">
                                                                                                Fecha
                                                                                            </th>
                                                                                            <th scope="col"
                                                                                                class="px-6 py-3">
                                                                                                Hora
                                                                                            </th>
                                                                                            <th scope="col"
                                                                                                class="px-6 py-3">
                                                                                                Duración
                                                                                            </th>
                                                                                            <th scope="col"
                                                                                                class="px-6 py-3">
                                                                                                Estado
                                                                                            </th>
                                                                                            <th scope="col"
                                                                                                class="px-6 py-3">
                                                                                                Comentarios
                                                                                            </th>
                                                                                        </tr>
                                                                                    </thead>

                                                                                    <?php $__currentLoopData = $citasContactoPorAutorizar[$citaPorAutorizar->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cita4): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <tbody class="text-center">
                                                                                            <tr
                                                                                                class="bg-white border-b-4">
                                                                                                <td class="">
                                                                                                    Sin registros
                                                                                                </td>
                                                                                                <td class="">
                                                                                                    Sin registros
                                                                                                </td>
                                                                                                <td class="">
                                                                                                    Sin registros
                                                                                                </td>
                                                                                                <td class="">
                                                                                                    Sin registros
                                                                                                </td>
                                                                                                <td class="">
                                                                                                    Sin registros
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                </table>
                                                                            <?php else: ?>
                                                                                <table
                                                                                    class="w-full text-sm text-left text-gray-500">
                                                                                    <thead
                                                                                        class="text-xs text-gray-700 uppercase bg-gray-50">
                                                                                        <tr class="text-center">
                                                                                            <th scope="col"
                                                                                                class="px-6 py-3">
                                                                                                Fecha
                                                                                            </th>
                                                                                            <th scope="col"
                                                                                                class="px-6 py-3">
                                                                                                Hora
                                                                                            </th>
                                                                                            <th scope="col"
                                                                                                class="px-6 py-3">
                                                                                                Duración
                                                                                            </th>
                                                                                            <th scope="col"
                                                                                                class="px-6 py-3">
                                                                                                Estado
                                                                                            </th>
                                                                                            <th scope="col"
                                                                                                class="px-6 py-3">
                                                                                                Comentarios
                                                                                            </th>
                                                                                        </tr>
                                                                                    </thead>

                                                                                    <?php $__currentLoopData = $citasContactoPorAutorizar[$citaPorAutorizar->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cita4): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <tbody class="text-center">
                                                                                            <tr
                                                                                                class="bg-white border-b-4">
                                                                                                <td class="">
                                                                                                    <?php echo e($cita4->fecha); ?>

                                                                                                </td>
                                                                                                <td class="">
                                                                                                    <?php echo e($cita4->horaInicio); ?>

                                                                                                </td>
                                                                                                <td class="">
                                                                                                    <?php echo e($cita4->duracion); ?>

                                                                                                    minutos
                                                                                                </td>
                                                                                                <td class="">
                                                                                                    <?php echo e($cita4->estado); ?>

                                                                                                </td>
                                                                                                <td class="">
                                                                                                    <?php echo e($cita4->comentarios); ?>

                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                </table>
                                                                            <?php endif; ?>
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
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    
    <script>
        $(document).ready(function() {

            $(".tab-content").not(":first").hide();

            // Manejar el evento de clic en los enlaces de las pestañas
            $(".tab-links a").click(function(e) {
                e.preventDefault();

                // Desactivar todas las pestañas
                $(".tab-links li").removeClass("tabActive");

                // Ocultar todos los contenidos de las pestañas
                $(".tab-content").hide();

                // Activar la pestaña seleccionada
                $(this).parent("li").addClass("tabActive");

                // Mostrar el contenido de la pestaña correspondiente
                var tabId = $(this).attr("href");
                $(tabId).show();
            });

            // Manejar el envío del formulario al hacer clic en el botón de submit
            $("#formularioCitas").submit(function() {
                // Actualizar el valor de colaboradorId
                var selectedColaboradorId = $("#colaboradores").val();
                $("#colaboradorId").val(selectedColaboradorId);
            });
        });

        const tabLinks = document.querySelectorAll('[data-tab]');
        const tabContents = document.querySelectorAll('.tab-content');

        tabLinks.forEach(tabLink => {
            tabLink.addEventListener('click', () => {
                const tabId = tabLink.getAttribute('data-tab');
                const tabContent = document.getElementById(tabId);

                // Oculta todas las pestañas de detalles
                tabContents.forEach(content => {
                    content.classList.add('hidden');
                });

                tabContent.classList.remove('hidden');
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




<?php /**PATH C:\xampp\htdocs\ANDF\jetStream\resources\views/citas.blade.php ENDPATH**/ ?>