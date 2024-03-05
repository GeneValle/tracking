<style>
    #reasignarCandidatoBoton,
    #vigenciaClienteBoton,
    #vigenciaProspectoBoton {
        fill: white;
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
                    Administración
            
                    <span class="font-normal text-lg text-custom-morado ml-6 mt-3">
                        Contactos |
                    </span>
                </div>
            
                <hr class="w-3/4 h-1 mx-auto my-4 bg-custom-morado border-0 rounded md:my-5">
            
                <form method="GET" action="<?php echo e(route('adminContactos')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="rounded-lg p-6 my-3">
                        <div class="bg-purple-300 border border-custom-morado rounded-lg p-4">
                            <div class="text-xl font-semibold text-custom-morado text-center mb-2">Asesor</div>
            
                            <select name="asesores" id="asesores"
                                class="block rounded-lg py-2.5 m-auto px-0 w-3/4 text-lg text-black bg-purple-300 border-0 border-b-2 border-custom-morado"
                                onchange="this.form.submit()">
                                <option selected>Selecciona un colaborador</option>
                                <?php $__currentLoopData = $asesores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asesor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($asesor->id); ?>" class="text-base">
                                        <?php echo e($asesor->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </form>

                <div class="grid grid-cols-3 gap-4 px-6 my-4 space-x-5">

                    <div class="max-w-sm text-white bg-teal-500 border border-gray-200 rounded-lg shadow py-6 cursor-pointer"
                        onclick="datosContactos('1'); mostrarBarra('barraCandidatos')">
                        <div class="text-center text-4xl font-bold">
                            <?php echo e($numeroCandidatosPorAsesor->numeroCandidatos); ?>

                        </div>
            
                        <div class="text-right text-2xl font-medium mr-2">
                            Candidatos
                        </div>
                    </div>
            
                    <div class="max-w-sm text-white bg-green-500 border border-gray-200 rounded-lg shadow py-6 cursor-pointer"
                        onclick="datosContactos('2'); mostrarBarra('barraProspectos')">
            
                        <div class="text-center text-4xl font-bold">
                            <?php echo e($numeroProspectosPorAsesor->numeroProspectos); ?>

                        </div>
            
                        <div class="text-right text-2xl font-medium mr-2">
                            Prospectos
                        </div>
                    </div>
            
                    <div class="max-w-sm text-white bg-orange-600 border border-gray-200 rounded-lg shadow py-6 cursor-pointer"
                        onclick="datosContactos('3'); mostrarBarra('barraClientes')">
            
                        <div class="text-center text-4xl font-bold">
                            <?php echo e($numeroClientesPorAsesor->numeroClientes); ?>

                        </div>
            
                        <div class="text-right text-2xl font-medium mr-2">
                            Clientes
                        </div>
                    </div>
                </div>
            
                <div class="barraColor my-4">
                    <div class="barraCandidatos">
                        <div class="flex flex-wrap">
                            <div class="basis-3/4">
                                <div class="bg-teal-500 border border-gray-300 w-3/4 rounded-lg shadow-lg h-8 mx-5"></div>
                            </div>
                            
                        </div>
                    </div>
            
                    <div class="barraProspectos" style="display: none">
                        <div class="flex flex-wrap">
                            <div class="basis-3/4">
                                <div class="bg-green-500 border border-gray-300 w-3/4 rounded-lg shadow-lg h-8 mx-5"></div>
                            </div>
                            
                        </div>
                    </div>
            
                    <div class="barraClientes" style="display: none">
                        <div class="flex flex-wrap">
                            <div class="basis-3/4">
                                <div class="bg-orange-600 border border-gray-300 w-3/4 rounded-lg shadow-lg h-8 mx-5"></div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            
                <div id="tablaCandidatos">
                    <div class="overflow-x-auto sm:rounded-lg my-4">
            
                        <table class="text-sm w-full text-left text-custom-linksmenu">
                            <thead class="text-sm text-custom-linksmenu uppercase bg-purple-300 my-4">
                                <tr class="text-center">
                                    
                                    <th scope="col" class="px-4 py-3">
                                        Funeraria
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Nombre
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Estado
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Antigüedad
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Vigencia
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        No. Citas
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Cita
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <?php $__currentLoopData = $candidatosPorAsesor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $candidato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tbody>
                                    <tr class="bg-teal-500 hover:bg-teal-700 text-white">
                                        
                                        <td class="text-center">
                                            <?php echo e($candidato->funeraria); ?>

                                        </td>
                                        <td class="text-center">
                                            <?php echo e($candidato->nombre); ?>

                                        </td>
                                        <td class="text-center">
                                            <?php echo e($candidato->estado); ?>

                                        </td>
                                        <td class="text-center">
                                            <?php echo e($antiguedadCandidatosPorAsesor[$loop->index]->diasDesdeIngreso); ?> días desde Ingreso
                                        </td>
                                        <td class="text-center">
                                            <?php echo e($vigenciaCandidatosPorAsesor[$loop->index]->vigencia); ?>

                                        </td>
                                        <td class="text-center">
                                            <?php echo e($citasPorCandidatos[$loop->index]->noCitas); ?>

                                        </td>
                                        <td class="text-center">
                                            <?php echo e($ultimaCitaCandidatosPorAsesor[$loop->index]->ultimaCita); ?>

                                        </td>
                                        <td class="text-center">
                                            <div class="flex justify-center items-center space-x-3">
                                                
                                                <!-- Modal toggle -->
                                                <button data-modal-target="detalleCandidato<?php echo e($candidato->id); ?>"
                                                    data-modal-toggle="detalleCandidato<?php echo e($candidato->id); ?>"
                                                    class="my-2 text-white bg-slate-700 hover:bg-slate-800 rounded-lg text-center px-2 py-2"
                                                    type="button">
                                                    <svg class="w-6 h-6 text-white" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                        <path
                                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                                    </svg>
                                                </button>
            
                                                <div id="detalleCandidato<?php echo e($candidato->id); ?>" tabindex="-1" aria-hidden="true"
                                                    class="fixed z-50 hidden w-full p-6 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                    <div class="relative w-full max-w-2xl max-h-full">
            
                                                        <div class="relative bg-white rounded-lg shadow">
            
                                                            <!-- Modal header -->
                                                            <div
                                                                class="bg-custom-morado flex items-start justify-between p-4 border-b rounded-t">
                                                                <div class="text-3xl font-semibold text-white">
                                                                    Detalles de Candidato <br>
                                                                    <?php echo e($candidato->funeraria); ?> - <?php echo e($candidato->nombre); ?>

                                                                </div>
            
                                                                <button type="button"
                                                                    class="text-white bg-transparent hover:bg-custom-header hover:text-custom-linksmenu rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center"
                                                                    data-modal-hide="detalleCandidato<?php echo e($candidato->id); ?>">
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
            
                                                                <ul class="flex flex-wrap items-center justify-between px-5 py-3 font-medium text-base"
                                                                    id="tabContent">
                                                                    <li>
                                                                        <a class="text-custom-linksmenu cursor-pointer"
                                                                            data-tab="detalles <?php echo e($candidato->id); ?>">Detalles</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="text-custom-linksmenu cursor-pointer"
                                                                            data-tab="citas <?php echo e($candidato->id); ?>">Citas</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="text-custom-linksmenu cursor-pointer"
                                                                            data-tab="preferencias <?php echo e($candidato->id); ?>">Preferencias</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="text-custom-linksmenu cursor-pointer"
                                                                            data-tab="cotizaciones <?php echo e($candidato->id); ?>">Cotizaciones</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="text-custom-linksmenu cursor-pointer"
                                                                            data-tab="ventas <?php echo e($candidato->id); ?>">Ventas</a>
                                                                    </li>
                                                                </ul>
            
            
                                                                <div class="border p-4 rounded-b">
                                                                    <div id="detalles <?php echo e($candidato->id); ?>"
                                                                        class="tab-content text-black">
                                                                        <div class="inline-flex my-2 px-2 text-sm text-custom-morado">
                                                                            <div>
                                                                                <strong>Funeraria: </strong>
                                                                                <?php echo e($candidato->funeraria); ?>

                                                                            </div>
                                                                            <div class="px-3">
                                                                                <strong>Nombre: </strong> <?php echo e($candidato->nombre); ?>

                                                                            </div>
                                                                        </div>
            
                                                                        <div
                                                                            class="grid grid-cols-3 gap-4 px-2 text-custom-morado text-sm">
                                                                            <div>
                                                                                <strong>Antiguedad: </strong>
                                                                                <?php echo e($antiguedadCandidatosPorAsesor[$loop->index]->diasDesdeIngreso); ?>

                                                                            </div>
                                                                            <div class="px-3">
                                                                                <strong>No. de Citas: </strong>
                                                                                <?php echo e($citasPorCandidatos[$loop->index]->noCitas); ?>

                                                                            </div>
                                                                            <div class="px-3">
                                                                                <strong>Tipo: </strong> Candidato
                                                                            </div>
                                                                        </div>
            
                                                                        <hr class="w-auto h-0 mx-3 my-5 bg-custom-morado customDashed">
            
                                                                        <div
                                                                            class="grid grid-cols-3 gap-4 px-2 text-custom-morado text-sm">
                                                                            <div>
                                                                                <strong>Teléfono: </strong> <?php echo e($candidato->telefono); ?>

                                                                            </div>
                                                                            <div class="px-3">
                                                                                <strong>Email: </strong> <?php echo e($candidato->correo); ?>

                                                                            </div>
                                                                        </div>
            
                                                                        <hr class="w-auto h-0 mx-3 my-5 bg-custom-morado customDashed">
            
                                                                        <div
                                                                            class="grid grid-cols-3 py-3 gap-4 px-2 text-custom-morado text-sm">
                                                                            <div>
                                                                                <strong>Referenciado: </strong>
                                                                                <?php echo e($candidato->referenciado); ?>

                                                                            </div>
                                                                            <div class="px-3">
                                                                                <strong>Origen: </strong> <?php echo e($candidato->origen); ?>

                                                                            </div>
                                                                            <div class="px-3">
                                                                                <strong>Fecha de Ingreso: </strong>
                                                                                <?php echo e($candidato->fechaIngreso); ?>

                                                                            </div>
                                                                        </div>
            
                                                                        <div
                                                                            class="grid grid-cols-3 py-3 gap-4 px-2 text-custom-morado text-sm">
                                                                            <div>
                                                                                <strong>Profesión: </strong>
                                                                                <?php echo e($candidato->profesion); ?>

                                                                            </div>
                                                                            <div class="px-3">
                                                                                <strong>Empresa: </strong>
                                                                                <?php echo e($empresasCandidatos[$loop->index]->nombreEmpresa); ?>

                                                                            </div>
                                                                            <div class="px-3">
                                                                                <strong>Ingresos: </strong> <?php echo e($candidato->ingresos); ?>

                                                                            </div>
                                                                        </div>
            
                                                                        <div
                                                                            class="grid grid-cols-3 gap-4 py-3 px-2 text-custom-morado text-sm">
                                                                            <div>
                                                                                <strong>Calle: </strong> <?php echo e($candidato->calle); ?>

                                                                            </div>
                                                                            <div class="px-3">
                                                                                <strong>No. Exterior: </strong>
                                                                                <?php echo e($candidato->noExterior); ?>

                                                                            </div>
                                                                            <div class="px-3">
                                                                                <strong>No. Interior: </strong>
                                                                                <?php echo e($candidato->noInterior); ?>

                                                                            </div>
                                                                        </div>
            
                                                                        <div
                                                                            class="grid grid-cols-3 gap-4 py-3 px-2 text-custom-morado text-sm">
                                                                            <div>
                                                                                <strong>Colonia: </strong>
                                                                                <?php echo e($coloniasCandidatos[$loop->index]->colonia); ?>

                                                                            </div>
                                                                            <div class="px-3">
                                                                                <strong>Localidad: </strong>
                                                                                <?php echo e($candidato->localidad); ?>

                                                                            </div>
                                                                            <div class="px-3">
                                                                                <strong>Municipio: </strong>
                                                                                <?php echo e($candidato->municipio); ?>

                                                                            </div>
                                                                        </div>
            
                                                                        <div
                                                                            class="grid grid-cols-3 gap-4 py-3 px-2 text-custom-morado text-sm">
                                                                            <div>
                                                                                <strong>Estado: </strong> <?php echo e($candidato->estado); ?>

                                                                            </div>
                                                                            <div class="px-3">
                                                                                <strong>País: </strong> <?php echo e($candidato->pais); ?>

                                                                            </div>
                                                                            <div class="px-3">
                                                                                <strong>C.P.: </strong> <?php echo e($candidato->codPostal); ?>

                                                                            </div>
                                                                        </div>
            
                                                                        <hr class="w-auto h-0 mx-3 my-5 bg-custom-morado customDashed">
            
                                                                        <div class="px-2 text-custom-morado text-sm py-3">
                                                                            <p>
                                                                                <strong>Observaciones: </strong>
                                                                                <?php echo e($candidato->observaciones); ?>

                                                                            </p>
                                                                        </div>
                                                                    </div>
            
                                                                    <div id="citas <?php echo e($candidato->id); ?>"
                                                                        class="tab-content hidden text-black">
            
                                                                        <div class="text-center text-2xl text-custom-morado">
                                                                            <?php echo e($citasPorCandidatos[$loop->index]->noCitas); ?>

                                                                            Citas Realizadas
                                                                        </div>
            
                                                                        <div
                                                                            class="relative overflow-x-auto shadow-md sm:rounded-lg my-3">
                                                                            <table class="w-full text-sm text-left text-gray-500">
                                                                                <thead
                                                                                    class="text-xs text-gray-700 uppercase bg-gray-50">
                                                                                    <tr class="text-center">
                                                                                        <th scope="col" class="px-6 py-3">
                                                                                            Fecha
                                                                                        </th>
                                                                                        <th scope="col" class="px-6 py-3">
                                                                                            Hora
                                                                                        </th>
                                                                                        <th scope="col" class="px-6 py-3">
                                                                                            Duración
                                                                                        </th>
                                                                                        <th scope="col" class="px-6 py-3">
                                                                                            Estado
                                                                                        </th>
                                                                                        <th scope="col" class="px-6 py-3">
                                                                                            Comentarios
                                                                                        </th>
                                                                                    </tr>
                                                                                </thead>
            
                                                                                <?php $__currentLoopData = $citasCandidatos[$candidato->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <tbody class="text-center">
                                                                                        <tr class="bg-white border-b-4">
                                                                                            <td class="">
                                                                                                <?php echo e($cita->fecha); ?>

                                                                                            </td>
                                                                                            <td class="">
                                                                                                <?php echo e($cita->horaInicio); ?>

                                                                                            </td>
                                                                                            <td class="">
                                                                                                <?php echo e($cita->duracion); ?> minutos
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
            
            
                                                                        </div>
                                                                    </div>
            
                                                                    <div id="preferencias <?php echo e($candidato->id); ?>"
                                                                        class="tab-content hidden text-black">
                                                                        <div class="rounded-lg shadow-md px-10">
                                                                            <div class="text-custom-morado text-2xl font-medium">
                                                                                Pase
                                                                            </div>
            
                                                                            <hr
                                                                                class="w-auto h-0 mx-3 my-5 bg-custom-morado customDashed">
            
                                                                            <div class="grid grid-cols-3 gap-4 py-4">
                                                                                <div class="flex justify-center items-center">
                                                                                    <input id="default-checkbox" type="checkbox"
                                                                                        value=""
                                                                                        class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                    <label for="default-checkbox"
                                                                                        class="ml-2 text-sm font-medium text-gray-900">Tipo
                                                                                        Infantil</label>
                                                                                </div>
                                                                                <div class="flex justify-center items-center">
                                                                                    <input id="default-checkbox" type="checkbox"
                                                                                        value=""
                                                                                        class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                    <label for="default-checkbox"
                                                                                        class="ml-2 text-sm font-medium text-gray-900">Tipo
                                                                                        A</label>
                                                                                </div>
                                                                                <div class="flex justify-center items-center">
                                                                                    <input id="default-checkbox" type="checkbox"
                                                                                        value=""
                                                                                        class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                    <label for="checked-checkbox"
                                                                                        class="ml-2 text-sm font-medium text-gray-900">Tipo
                                                                                        B</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
            
                                                                        <div class="rounded-lg shadow-md px-10 my-5">
                                                                            <div class="text-custom-morado text-2xl font-medium">
                                                                                Stand
                                                                            </div>
            
                                                                            <hr
                                                                                class="w-auto h-0 mx-3 my-5 bg-custom-morado customDashed">
            
                                                                            <div class="grid grid-cols-4 gap-3 py-4">
                                                                                <div class="flex justify-center items-center">
                                                                                    <input id="default-checkbox" type="checkbox"
                                                                                        value=""
                                                                                        class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                    <label for="default-checkbox"
                                                                                        class="ml-2 text-sm font-medium text-gray-900">6
                                                                                        X
                                                                                        15</label>
                                                                                </div>
                                                                                <div class="flex justify-center items-center">
                                                                                    <input id="default-checkbox" type="checkbox"
                                                                                        value=""
                                                                                        class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                    <label for="default-checkbox"
                                                                                        class="ml-2 text-sm font-medium text-gray-900">6
                                                                                        X
                                                                                        6</label>
                                                                                </div>
                                                                                <div class="flex justify-center items-center">
                                                                                    <input id="default-checkbox" type="checkbox"
                                                                                        value=""
                                                                                        class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                    <label for="default-checkbox"
                                                                                        class="ml-2 text-sm font-medium text-gray-900">3
                                                                                        X
                                                                                        9</label>
                                                                                </div>
                                                                                <div class="flex justify-center items-center">
                                                                                    <input id="default-checkbox" type="checkbox"
                                                                                        value=""
                                                                                        class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                    <label for="default-checkbox"
                                                                                        class="ml-2 text-sm font-medium text-gray-900">3
                                                                                        X
                                                                                        6</label>
                                                                                </div>
                                                                                <div class="flex justify-center items-center">
                                                                                    <input id="default-checkbox" type="checkbox"
                                                                                        value=""
                                                                                        class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                    <label for="default-checkbox"
                                                                                        class="ml-2 text-sm font-medium text-gray-900">3
                                                                                        X
                                                                                        3</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
            
                                                                        <div class="rounded-lg shadow-md px-10 mt-5 mb-2">
                                                                            <div class="text-custom-morado text-2xl font-medium">
                                                                                Paquete
                                                                            </div>
            
                                                                            <hr
                                                                                class="w-auto h-0 mx-3 my-5 bg-custom-morado customDashed">
            
                                                                            <div class="grid grid-cols-4 gap-3 py-4">
                                                                                <div class="flex justify-center items-center">
                                                                                    <input id="default-checkbox" type="checkbox"
                                                                                        value=""
                                                                                        class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                    <label for="default-checkbox"
                                                                                        class="ml-2 text-sm font-medium text-gray-900">Doble
                                                                                        tipo A</label>
                                                                                </div>
                                                                                <div class="flex justify-center items-center">
                                                                                    <input id="default-checkbox" type="checkbox"
                                                                                        value=""
                                                                                        class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                    <label for="default-checkbox"
                                                                                        class="ml-2 text-sm font-medium text-gray-900">Doble
                                                                                        tipo B</label>
                                                                                </div>
                                                                                <div class="flex justify-center items-center">
                                                                                    <input id="default-checkbox" type="checkbox"
                                                                                        value=""
                                                                                        class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                    <label for="default-checkbox"
                                                                                        class="ml-2 text-sm font-medium text-gray-900">Sencillo
                                                                                        tipo A</label>
                                                                                </div>
                                                                                <div class="flex justify-center items-center">
                                                                                    <input id="default-checkbox" type="checkbox"
                                                                                        value=""
                                                                                        class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                    <label for="default-checkbox"
                                                                                        class="ml-2 text-sm font-medium text-gray-900">Sencillo
                                                                                        tipo B</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
            
                                                                    <div id="cotizaciones <?php echo e($candidato->id); ?>"
                                                                        class="tab-content hidden text-black">
            
                                                                        <div class="overflow-x-auto shadow-md sm:rounded-lg my-4">
            
                                                                            <table
                                                                                class="text-sm w-full text-left text-custom-linksmenu">
                                                                                <thead
                                                                                    class="text-sm text-custom-linksmenu uppercase bg-custom-header my-4">
                                                                                    <tr class="text-center">
                                                                                        <th scope="col" class="px-4 py-3">
                                                                                            Folio
                                                                                        </th>
                                                                                        <th scope="col" class="px-4 py-3">
                                                                                            Fecha
                                                                                        </th>
                                                                                        <th scope="col" class="px-4 py-3">
                                                                                            Total
                                                                                        </th>
                                                                                        <th scope="col" class="px-4 py-3">
                                                                                            Estado
                                                                                        </th>
                                                                                        <th scope="col" class="px-4 py-3">
            
                                                                                        </th>
                                                                                    </tr>
                                                                                </thead>
            
                                                                                <tbody>
                                                                                    <td>-</td>
                                                                                    <td>Sin información</td>
                                                                                    <td>Sin información</td>
                                                                                    <td></td>
                                                                                    <td>
                                                                                        <button type="button" title="Ver cotización"
                                                                                            class="px-3 py-2 text-xs font-medium text-center inline-flex items-center bg-custom-morado rounded-lg">
                                                                                            <svg id="verCotizacionBoton"
                                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                                class="m-auto" height="2em"
                                                                                                viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                                                                <path
                                                                                                    d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z" />
                                                                                            </svg>
                                                                                        </button>
                                                                                    </td>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
            
                                                                    <div id="ventas <?php echo e($candidato->id); ?>"
                                                                        class="tab-content hidden text-black">
                                                                        <div class="overflow-x-auto shadow-md sm:rounded-lg my-4">
                                                                            <table
                                                                                class="text-sm w-full text-left text-custom-linksmenu">
                                                                                <thead
                                                                                    class="text-sm text-custom-linksmenu uppercase bg-custom-header my-4">
                                                                                    <tr class="text-center">
                                                                                        <th scope="col" class="px-4 py-3">
                                                                                            Contrato
                                                                                        </th>
                                                                                        <th scope="col" class="px-4 py-3">
                                                                                            Fecha
                                                                                        </th>
                                                                                        <th scope="col" class="px-4 py-3">
                                                                                            Total
                                                                                        </th>
                                                                                        <th scope="col" class="px-4 py-3">
                                                                                            Detalles
                                                                                        </th>
                                                                                        <th scope="col" class="px-4 py-3">
                                                                                            Asesor
                                                                                        </th>
                                                                                    </tr>
                                                                                </thead>
            
                                                                                <tbody>
                                                                                    <td>-</td>
                                                                                    <td>Sin información</td>
                                                                                    <td>Sin información</td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
            
                                                <button data-modal-target="reasignarCandidato<?php echo e($candidato->id); ?>"
                                                    data-modal-toggle="reasignarCandidato<?php echo e($candidato->id); ?>"
                                                    class="my-2 text-white bg-slate-700 hover:bg-slate-800 rounded-lg text-center px-2 py-2"
                                                    type="button">
                                                    <svg id="reasignarCandidatoBoton" class="w-6 h-6"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <path
                                                            d="M307 34.8c-11.5 5.1-19 16.6-19 29.2v64H176C78.8 128 0 206.8 0 304C0 417.3 81.5 467.9 100.2 478.1c2.5 1.4 5.3 1.9 8.1 1.9c10.9 0 19.7-8.9 19.7-19.7c0-7.5-4.3-14.4-9.8-19.5C108.8 431.9 96 414.4 96 384c0-53 43-96 96-96h96v64c0 12.6 7.4 24.1 19 29.2s25 3 34.4-5.4l160-144c6.7-6.1 10.6-14.7 10.6-23.8s-3.8-17.7-10.6-23.8l-160-144c-9.4-8.5-22.9-10.6-34.4-5.4z" />
                                                    </svg>
                                                </button>
            
                                                <div id="reasignarCandidato<?php echo e($candidato->id); ?>" tabindex="-1" aria-hidden="true"
                                                    class="fixed z-50 hidden w-full p-6 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                    <div class="relative w-full max-w-2xl max-h-full">
            
                                                        <div class="relative bg-white rounded-lg shadow">
            
                                                            <!-- Modal header -->
                                                            <div
                                                                class="bg-custom-morado flex items-start justify-between p-4 border-b rounded-t">
                                                                <div class="text-3xl font-semibold text-white">
                                                                    REASIGNAR
                                                                </div>
            
                                                                <button type="button"
                                                                    class="text-white bg-transparent hover:bg-custom-header hover:text-custom-linksmenu rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center"
                                                                    data-modal-hide="reasignarCandidato<?php echo e($candidato->id); ?>">
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
            
                                                            <div class="text-lg text-start px-4 my-3 text-custom-morado">
                                                                <?php echo e($candidato->funeraria); ?> - <?php echo e($candidato->nombre); ?>

                                                            </div>
            
                                                            <form
                                                                action="<?php echo e(route('adminContactos.reasignarCandidatos', $candidato->id)); ?>"
                                                                method="POST">
                                                                <?php echo csrf_field(); ?>
                                                                <?php echo method_field('put'); ?>
            
                                                                <input type="hidden" name="funeraria" value="<?php echo e($candidato->funeraria); ?>">
                                                                <input type="hidden" name="nombre" value="<?php echo e($candidato->nombre); ?>">
                                                                <input type="hidden" name="tipo" value="<?php echo e($candidato->tipo); ?>">
                                                                <input type="hidden" name="correo" value="<?php echo e($candidato->correo); ?>">
                                                                <input type="hidden" name="telefono" value="<?php echo e($candidato->telefono); ?>">
                                                                <input type="hidden" name="celular" value="<?php echo e($candidato->celular); ?>">
                                                                <input type="hidden" name="referenciado" value="<?php echo e($candidato->referenciado); ?>">
                                                                <input type="hidden" name="origen" value="<?php echo e($candidato->origen); ?>">
                                                                <input type="hidden" name="fechaNacimiento" value="<?php echo e($candidato->fechaNacimiento); ?>">
                                                                <input type="hidden" name="fechaIngreso" value="<?php echo e($candidato->fechaIngreso); ?>">
                                                                <input type="hidden" name="vigencia" value="<?php echo e($candidato->vigencia); ?>">
                                                                <input type="hidden" name="profesion" value="<?php echo e($candidato->profesion); ?>">
                                                                <input type="hidden" name="empresas_id" value="<?php echo e($candidato->empresas_id); ?>">
                                                                <input type="hidden" name="ingresos" value="<?php echo e($candidato->ingresos); ?>">
                                                                <input type="hidden" name="calle" value="<?php echo e($candidato->calle); ?>">
                                                                <input type="hidden" name="noExterior" value="<?php echo e($candidato->noExterior); ?>">
                                                                <input type="hidden" name="noInterior" value="<?php echo e($candidato->noInterior); ?>">
                                                                <input type="hidden" name="colonias_id" value="<?php echo e($candidato->colonias_id); ?>">
                                                                <input type="hidden" name="localidad" value="<?php echo e($candidato->localidad); ?>">
                                                                <input type="hidden" name="municipio" value="<?php echo e($candidato->municipio); ?>">
                                                                <input type="hidden" name="estado" value="<?php echo e($candidato->estado); ?>">
                                                                <input type="hidden" name="pais" value="<?php echo e($candidato->pais); ?>">
                                                                <input type="hidden" name="codPostal" value="<?php echo e($candidato->codPostal); ?>">
                                                                <input type="hidden" name="observaciones" value="<?php echo e($candidato->observaciones); ?>">
            
                                                                <div class="text-base text-start px-4 my-2 text-custom-morado">
                                                                    Seleccione un asesor para reasignar el candidato seleccionado:
                                                                    <select name="usuarioCandidato" id="usuarioCandidato"
                                                                        class="rounded-lg ml-2 h-10 w-3/4 text-xs text-custom-morado">
                                                                        <option value="">---Selecciona una
                                                                            opción---</option>
                                                                        <?php $__currentLoopData = $asesores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asesor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option value="<?php echo e($asesor->id); ?>"
                                                                                <?php if($asesor->id == $candidato->users_id): ?> selected <?php endif; ?>>
                                                                                <?php echo e($asesor->name); ?>

                                                                            </option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>
                                                                </div>
            
                                                                <div class="text-right">
                                                                    <div class="inline-flex p-2 space-x-3">
                                                                        <button type="button" title="cancelar"
                                                                            class="bg-custom-morado rounded-lg w-10 h-10 ml-auto inline-flex justify-center items-center"
                                                                            data-modal-hide="reasignarCandidato<?php echo e($candidato->id); ?>">
                                                                            <svg class="w-6 h-6" aria-hidden="true"
                                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                                viewBox="0 0 14 14">
                                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                                    stroke-linejoin="round" stroke-width="2"
                                                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                            </svg>
                                                                            <span class="sr-only">Close modal</span>
                                                                        </button>
                                                                        <button type="submit" title="Reasignar asesor"
                                                                            class="bg-custom-morado rounded-lg w-10 h-10 ml-auto inline-flex justify-center items-center">
                                                                            <svg id="btnReasignar" class="w-6 h-6" aria-hidden="true"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                viewBox="0 0 576 512">
                                                                                <path
                                                                                    d="M400 255.4V240 208c0-8.8-7.2-16-16-16H352 336 289.5c-50.9 0-93.9 33.5-108.3 79.6c-3.3-9.4-5.2-19.8-5.2-31.6c0-61.9 50.1-112 112-112h48 16 32c8.8 0 16-7.2 16-16V80 64.6L506 160 400 255.4zM336 240h16v48c0 17.7 14.3 32 32 32h3.7c7.9 0 15.5-2.9 21.4-8.2l139-125.1c7.6-6.8 11.9-16.5 11.9-26.7s-4.3-19.9-11.9-26.7L409.9 8.9C403.5 3.2 395.3 0 386.7 0C367.5 0 352 15.5 352 34.7V80H336 304 288c-88.4 0-160 71.6-160 160c0 60.4 34.6 99.1 63.9 120.9c5.9 4.4 11.5 8.1 16.7 11.2c4.4 2.7 8.5 4.9 11.9 6.6c3.4 1.7 6.2 3 8.2 3.9c2.2 1 4.6 1.4 7.1 1.4h2.5c9.8 0 17.8-8 17.8-17.8c0-7.8-5.3-14.7-11.6-19.5l0 0c-.4-.3-.7-.5-1.1-.8c-1.7-1.1-3.4-2.5-5-4.1c-.8-.8-1.7-1.6-2.5-2.6s-1.6-1.9-2.4-2.9c-1.8-2.5-3.5-5.3-5-8.5c-2.6-6-4.3-13.3-4.3-22.4c0-36.1 29.3-65.5 65.5-65.5H304h32zM72 32C32.2 32 0 64.2 0 104V440c0 39.8 32.2 72 72 72H408c39.8 0 72-32.2 72-72V376c0-13.3-10.7-24-24-24s-24 10.7-24 24v64c0 13.3-10.7 24-24 24H72c-13.3 0-24-10.7-24-24V104c0-13.3 10.7-24 24-24h64c13.3 0 24-10.7 24-24s-10.7-24-24-24H72z" />
                                                                            </svg>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    </div>
                </div>
            
                <div id="tablaProspectos" style="display: none">
                    <div class="overflow-x-auto  sm:rounded-lg my-4">
            
                        <table class="text-sm w-full text-left text-custom-linksmenu">
                            <thead class="text-sm text-custom-linksmenu uppercase bg-purple-300 my-4">
                                <tr class="text-center">
                                    
                                    <th scope="col" class="px-4 py-3">
                                        Funeraria
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Nombre
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Estado
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Antigüedad
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Vigencia
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        No. Citas
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Cita
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <?php $__currentLoopData = $prospectosPorAsesor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prospecto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tbody>
                                    <tr class="bg-green-500 hover:bg-green-700 text-white">
                                        
                                        <td class="text-center">
                                            <?php echo e($prospecto->funeraria); ?>

                                        </td>
                                        <td class="text-center">
                                            <?php echo e($prospecto->nombre); ?>

                                        </td>
                                        <td class="text-center">
                                            <?php echo e($prospecto->estado); ?>

                                        </td>
                                        <td class="text-center">
                                            <?php echo e($antiguedadProspectosPorAsesor[$loop->index]->diasDesdeIngreso); ?> días desde Ingreso
                                        </td>
                                        <td class="text-center">
                                            <?php echo e($vigenciaProspectosPorAsesor[$loop->index]->vigencia); ?>

                                        </td>
                                        <td class="text-center">
                                            <?php echo e($citasPorProspectos[$loop->index]->noCitas); ?>

                                        </td>
                                        <td class="text-center">
                                            <?php echo e($ultimaCitaProspectosPorAsesor[$loop->index]->ultimaCita); ?>

                                        </td>
                                        <td class="text-center">
                                            <div class="flex justify-center items-center space-x-3">
                                                
                                                <!-- Modal detalle prospecto -->
            
                                                <button data-modal-target="detalleProspecto<?php echo e($prospecto->id); ?>"
                                                    data-modal-toggle="detalleProspecto<?php echo e($prospecto->id); ?>"
                                                    class="my-2 text-white bg-slate-700 hover:bg-slate-800 rounded-lg text-center px-2 py-2"
                                                    type="button">
                                                    <svg class="w-6 h-6 text-white" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                        <path
                                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                                    </svg>
                                                </button>
            
                                                <div id="detalleProspecto<?php echo e($prospecto->id); ?>" tabindex="-1" aria-hidden="true"
                                                    class="fixed z-50 hidden w-full p-6 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                    <div class="relative w-full max-w-2xl max-h-full">
            
                                                        <div class="relative bg-white rounded-lg shadow">
            
                                                            <!-- Modal header -->
                                                            <div
                                                                class="bg-custom-morado flex items-start justify-between p-4 border-b rounded-t">
                                                                <div class="text-3xl font-semibold text-white">
                                                                    Detalles de Prospecto <br>
                                                                    <?php echo e($prospecto->funeraria); ?> - <?php echo e($prospecto->nombre); ?>

                                                                </div>
            
                                                                <button type="button"
                                                                    class="text-white bg-transparent hover:bg-custom-header hover:text-custom-linksmenu rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center"
                                                                    data-modal-hide="detalleProspecto<?php echo e($prospecto->id); ?>">
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
            
                                                                <ul class="flex flex-wrap items-center justify-between px-5 py-3 font-medium text-base"
                                                                    id="tabContent">
                                                                    <li>
                                                                        <a class="text-custom-linksmenu cursor-pointer"
                                                                            data-tab="detalles <?php echo e($prospecto->id); ?>">Detalles</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="text-custom-linksmenu cursor-pointer"
                                                                            data-tab="citas <?php echo e($prospecto->id); ?>">Citas</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="text-custom-linksmenu cursor-pointer"
                                                                            data-tab="preferencias <?php echo e($prospecto->id); ?>">Preferencias</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="text-custom-linksmenu cursor-pointer"
                                                                            data-tab="cotizaciones <?php echo e($prospecto->id); ?>">Cotizaciones</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="text-custom-linksmenu cursor-pointer"
                                                                            data-tab="ventas <?php echo e($prospecto->id); ?>">Ventas</a>
                                                                    </li>
                                                                </ul>
            
            
                                                                <div class="border p-4 rounded-b">
                                                                    <div id="detalles <?php echo e($prospecto->id); ?>"
                                                                        class="tab-content text-black">
                                                                        <div class="inline-flex my-2 px-2 text-sm text-custom-morado">
                                                                            <div>
                                                                                <strong>Funeraria: </strong>
                                                                                <?php echo e($prospecto->funeraria); ?>

                                                                            </div>
                                                                            <div class="px-3">
                                                                                <strong>Nombre: </strong> <?php echo e($prospecto->nombre); ?>

                                                                            </div>
                                                                        </div>
            
                                                                        <div
                                                                            class="grid grid-cols-3 gap-4 px-2 text-custom-morado text-sm">
                                                                            <div>
                                                                                <strong>Antiguedad: </strong>
                                                                                <?php echo e($antiguedadProspectosPorAsesor[$loop->index]->diasDesdeIngreso); ?>

                                                                            </div>
                                                                            <div class="px-3">
                                                                                <strong>No. de Citas: </strong>
                                                                                <?php echo e($citasPorProspectos[$loop->index]->noCitas); ?>

                                                                            </div>
                                                                            <div class="px-3">
                                                                                <strong>Tipo: </strong> Prospecto
                                                                            </div>
                                                                        </div>
            
                                                                        <hr class="w-auto h-0 mx-3 my-5 bg-custom-morado customDashed">
            
                                                                        <div
                                                                            class="grid grid-cols-3 gap-4 px-2 text-custom-morado text-sm">
                                                                            <div>
                                                                                <strong>Teléfono: </strong> <?php echo e($prospecto->telefono); ?>

                                                                            </div>
                                                                            <div class="px-3">
                                                                                <strong>Email: </strong> <?php echo e($prospecto->correo); ?>

                                                                            </div>
                                                                        </div>
            
                                                                        <hr class="w-auto h-0 mx-3 my-5 bg-custom-morado customDashed">
            
                                                                        <div
                                                                            class="grid grid-cols-3 py-3 gap-4 px-2 text-custom-morado text-sm">
                                                                            <div>
                                                                                <strong>Referenciado: </strong>
                                                                                <?php echo e($prospecto->referenciado); ?>

                                                                            </div>
                                                                            <div class="px-3">
                                                                                <strong>Origen: </strong> <?php echo e($prospecto->origen); ?>

                                                                            </div>
                                                                            <div class="px-3">
                                                                                <strong>Fecha de Ingreso: </strong>
                                                                                <?php echo e($prospecto->fechaIngreso); ?>

                                                                            </div>
                                                                        </div>
            
                                                                        <div
                                                                            class="grid grid-cols-3 py-3 gap-4 px-2 text-custom-morado text-sm">
                                                                            <div>
                                                                                <strong>Profesión: </strong>
                                                                                <?php echo e($prospecto->profesion); ?>

                                                                            </div>
                                                                            <div class="px-3">
                                                                                <strong>Empresa: </strong>
                                                                                <?php echo e($empresasProspectos[$loop->index]->nombreEmpresa); ?>

                                                                            </div>
                                                                            <div class="px-3">
                                                                                <strong>Ingresos: </strong> <?php echo e($prospecto->ingresos); ?>

                                                                            </div>
                                                                        </div>
            
                                                                        <div
                                                                            class="grid grid-cols-3 gap-4 py-3 px-2 text-custom-morado text-sm">
                                                                            <div>
                                                                                <strong>Calle: </strong> <?php echo e($prospecto->calle); ?>

                                                                            </div>
                                                                            <div class="px-3">
                                                                                <strong>No. Exterior: </strong>
                                                                                <?php echo e($prospecto->noExterior); ?>

                                                                            </div>
                                                                            <div class="px-3">
                                                                                <strong>No. Interior: </strong>
                                                                                <?php echo e($prospecto->noInterior); ?>

                                                                            </div>
                                                                        </div>
            
                                                                        <div
                                                                            class="grid grid-cols-3 gap-4 py-3 px-2 text-custom-morado text-sm">
                                                                            <div>
                                                                                <strong>Colonia: </strong>
                                                                                <?php echo e($coloniasProspectos[$loop->index]->colonia); ?>

                                                                            </div>
                                                                            <div class="px-3">
                                                                                <strong>Localidad: </strong>
                                                                                <?php echo e($prospecto->localidad); ?>

                                                                            </div>
                                                                            <div class="px-3">
                                                                                <strong>Municipio: </strong>
                                                                                <?php echo e($prospecto->municipio); ?>

                                                                            </div>
                                                                        </div>
            
                                                                        <div
                                                                            class="grid grid-cols-3 gap-4 py-3 px-2 text-custom-morado text-sm">
                                                                            <div>
                                                                                <strong>Estado: </strong> <?php echo e($prospecto->estado); ?>

                                                                            </div>
                                                                            <div class="px-3">
                                                                                <strong>País: </strong> <?php echo e($prospecto->pais); ?>

                                                                            </div>
                                                                            <div class="px-3">
                                                                                <strong>C.P.: </strong> <?php echo e($prospecto->codPostal); ?>

                                                                            </div>
                                                                        </div>
            
                                                                        <hr class="w-auto h-0 mx-3 my-5 bg-custom-morado customDashed">
            
                                                                        <div class="px-2 text-custom-morado text-sm py-3">
                                                                            <p>
                                                                                <strong>Observaciones: </strong>
                                                                                <?php echo e($prospecto->observaciones); ?>

                                                                            </p>
                                                                        </div>
                                                                    </div>
            
                                                                    <div id="citas <?php echo e($prospecto->id); ?>"
                                                                        class="tab-content hidden text-black">
            
                                                                        <div class="text-center text-2xl text-custom-morado">
                                                                            <?php echo e($citasPorProspectos[$loop->index]->noCitas); ?>

                                                                            Citas Realizadas
                                                                        </div>
            
                                                                        <div
                                                                            class="relative overflow-x-auto shadow-md sm:rounded-lg my-3">
                                                                            <table class="w-full text-sm text-left text-gray-500">
                                                                                <thead
                                                                                    class="text-xs text-gray-700 uppercase bg-gray-50">
                                                                                    <tr class="text-center">
                                                                                        <th scope="col" class="px-6 py-3">
                                                                                            Fecha
                                                                                        </th>
                                                                                        <th scope="col" class="px-6 py-3">
                                                                                            Hora
                                                                                        </th>
                                                                                        <th scope="col" class="px-6 py-3">
                                                                                            Duración
                                                                                        </th>
                                                                                        <th scope="col" class="px-6 py-3">
                                                                                            Estado
                                                                                        </th>
                                                                                        <th scope="col" class="px-6 py-3">
                                                                                            Comentarios
                                                                                        </th>
                                                                                    </tr>
                                                                                </thead>
            
                                                                                <?php $__currentLoopData = $citasProspectos[$prospecto->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <tbody class="text-center">
                                                                                        <tr class="bg-white border-b-4">
                                                                                            <td class="">
                                                                                                <?php echo e($cita->fecha); ?>

                                                                                            </td>
                                                                                            <td class="">
                                                                                                <?php echo e($cita->horaInicio); ?>

                                                                                            </td>
                                                                                            <td class="">
                                                                                                <?php echo e($cita->duracion); ?> minutos
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
                                                                        </div>
                                                                    </div>
            
                                                                    <div id="preferencias <?php echo e($prospecto->id); ?>"
                                                                        class="tab-content hidden text-black">
                                                                        <div class="rounded-lg shadow-md px-10">
                                                                            <div class="text-custom-morado text-2xl font-medium">
                                                                                Pase
                                                                            </div>
            
                                                                            <hr
                                                                                class="w-auto h-0 mx-3 my-5 bg-custom-morado customDashed">
            
                                                                            <div class="grid grid-cols-3 gap-4 py-4">
                                                                                <div class="flex justify-center items-center">
                                                                                    <input id="default-checkbox" type="checkbox"
                                                                                        value=""
                                                                                        class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                    <label for="default-checkbox"
                                                                                        class="ml-2 text-sm font-medium text-gray-900">Tipo
                                                                                        Infantil</label>
                                                                                </div>
                                                                                <div class="flex justify-center items-center">
                                                                                    <input id="default-checkbox" type="checkbox"
                                                                                        value=""
                                                                                        class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                    <label for="default-checkbox"
                                                                                        class="ml-2 text-sm font-medium text-gray-900">Tipo
                                                                                        A</label>
                                                                                </div>
                                                                                <div class="flex justify-center items-center">
                                                                                    <input id="default-checkbox" type="checkbox"
                                                                                        value=""
                                                                                        class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                    <label for="checked-checkbox"
                                                                                        class="ml-2 text-sm font-medium text-gray-900">Tipo
                                                                                        B</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
            
                                                                        <div class="rounded-lg shadow-md px-10 my-5">
                                                                            <div class="text-custom-morado text-2xl font-medium">
                                                                                Stand
                                                                            </div>
            
                                                                            <hr
                                                                                class="w-auto h-0 mx-3 my-5 bg-custom-morado customDashed">
            
                                                                            <div class="grid grid-cols-4 gap-3 py-4">
                                                                                <div class="flex justify-center items-center">
                                                                                    <input id="default-checkbox" type="checkbox"
                                                                                        value=""
                                                                                        class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                    <label for="default-checkbox"
                                                                                        class="ml-2 text-sm font-medium text-gray-900">6
                                                                                        X
                                                                                        15</label>
                                                                                </div>
                                                                                <div class="flex justify-center items-center">
                                                                                    <input id="default-checkbox" type="checkbox"
                                                                                        value=""
                                                                                        class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                    <label for="default-checkbox"
                                                                                        class="ml-2 text-sm font-medium text-gray-900">6
                                                                                        X
                                                                                        6</label>
                                                                                </div>
                                                                                <div class="flex justify-center items-center">
                                                                                    <input id="default-checkbox" type="checkbox"
                                                                                        value=""
                                                                                        class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                    <label for="default-checkbox"
                                                                                        class="ml-2 text-sm font-medium text-gray-900">3
                                                                                        X
                                                                                        9</label>
                                                                                </div>
                                                                                <div class="flex justify-center items-center">
                                                                                    <input id="default-checkbox" type="checkbox"
                                                                                        value=""
                                                                                        class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                    <label for="default-checkbox"
                                                                                        class="ml-2 text-sm font-medium text-gray-900">3
                                                                                        X
                                                                                        6</label>
                                                                                </div>
                                                                                <div class="flex justify-center items-center">
                                                                                    <input id="default-checkbox" type="checkbox"
                                                                                        value=""
                                                                                        class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                    <label for="default-checkbox"
                                                                                        class="ml-2 text-sm font-medium text-gray-900">3
                                                                                        X
                                                                                        3</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
            
                                                                        <div class="rounded-lg shadow-md px-10 mt-5 mb-2">
                                                                            <div class="text-custom-morado text-2xl font-medium">
                                                                                Paquete
                                                                            </div>
            
                                                                            <hr
                                                                                class="w-auto h-0 mx-3 my-5 bg-custom-morado customDashed">
            
                                                                            <div class="grid grid-cols-4 gap-3 py-4">
                                                                                <div class="flex justify-center items-center">
                                                                                    <input id="default-checkbox" type="checkbox"
                                                                                        value=""
                                                                                        class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                    <label for="default-checkbox"
                                                                                        class="ml-2 text-sm font-medium text-gray-900">Doble
                                                                                        tipo A</label>
                                                                                </div>
                                                                                <div class="flex justify-center items-center">
                                                                                    <input id="default-checkbox" type="checkbox"
                                                                                        value=""
                                                                                        class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                    <label for="default-checkbox"
                                                                                        class="ml-2 text-sm font-medium text-gray-900">Doble
                                                                                        tipo B</label>
                                                                                </div>
                                                                                <div class="flex justify-center items-center">
                                                                                    <input id="default-checkbox" type="checkbox"
                                                                                        value=""
                                                                                        class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                    <label for="default-checkbox"
                                                                                        class="ml-2 text-sm font-medium text-gray-900">Sencillo
                                                                                        tipo A</label>
                                                                                </div>
                                                                                <div class="flex justify-center items-center">
                                                                                    <input id="default-checkbox" type="checkbox"
                                                                                        value=""
                                                                                        class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                    <label for="default-checkbox"
                                                                                        class="ml-2 text-sm font-medium text-gray-900">Sencillo
                                                                                        tipo B</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
            
                                                                    <div id="cotizaciones <?php echo e($prospecto->id); ?>"
                                                                        class="tab-content hidden text-black">
            
                                                                        <div class="overflow-x-auto shadow-md sm:rounded-lg my-4">
            
                                                                            <table
                                                                                class="text-sm w-full text-left text-custom-linksmenu">
                                                                                <thead
                                                                                    class="text-sm text-custom-linksmenu uppercase bg-custom-header my-4">
                                                                                    <tr class="text-center">
                                                                                        <th scope="col" class="px-4 py-3">
                                                                                            Folio
                                                                                        </th>
                                                                                        <th scope="col" class="px-4 py-3">
                                                                                            Fecha
                                                                                        </th>
                                                                                        <th scope="col" class="px-4 py-3">
                                                                                            Total
                                                                                        </th>
                                                                                        <th scope="col" class="px-4 py-3">
                                                                                            Estado
                                                                                        </th>
                                                                                        <th scope="col" class="px-4 py-3">
            
                                                                                        </th>
                                                                                    </tr>
                                                                                </thead>
            
                                                                                <tbody>
                                                                                    <td>-</td>
                                                                                    <td>Sin información</td>
                                                                                    <td>Sin información</td>
                                                                                    <td></td>
                                                                                    <td>
                                                                                        <button type="button" title="Ver cotización"
                                                                                            class="px-3 py-2 text-xs font-medium text-center inline-flex items-center bg-custom-morado rounded-lg">
                                                                                            <svg id="verCotizacionBoton"
                                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                                class="m-auto" height="2em"
                                                                                                viewBox="0 0 448 512">
                                                                                                <path
                                                                                                    d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z" />
                                                                                            </svg>
                                                                                        </button>
                                                                                    </td>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
            
                                                                    <div id="ventas <?php echo e($prospecto->id); ?>"
                                                                        class="tab-content hidden text-black">
                                                                        <div class="overflow-x-auto shadow-md sm:rounded-lg my-4">
                                                                            <table
                                                                                class="text-sm w-full text-left text-custom-linksmenu">
                                                                                <thead
                                                                                    class="text-sm text-custom-linksmenu uppercase bg-custom-header my-4">
                                                                                    <tr class="text-center">
                                                                                        <th scope="col" class="px-4 py-3">
                                                                                            Contrato
                                                                                        </th>
                                                                                        <th scope="col" class="px-4 py-3">
                                                                                            Fecha
                                                                                        </th>
                                                                                        <th scope="col" class="px-4 py-3">
                                                                                            Total
                                                                                        </th>
                                                                                        <th scope="col" class="px-4 py-3">
                                                                                            Detalles
                                                                                        </th>
                                                                                        <th scope="col" class="px-4 py-3">
                                                                                            Asesor
                                                                                        </th>
                                                                                    </tr>
                                                                                </thead>
            
                                                                                <tbody>
                                                                                    <td>-</td>
                                                                                    <td>Sin información</td>
                                                                                    <td>Sin información</td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
            
                                                <!-- Modal detalle prospecto -->
            
                                                
            
                                                <button data-modal-target="vigenciaProspecto<?php echo e($prospecto->id); ?>"
                                                    data-modal-toggle="vigenciaProspecto<?php echo e($prospecto->id); ?>"
                                                    class="my-2 text-white bg-slate-700 hover:bg-slate-800 rounded-lg text-center px-2 py-2"
                                                    type="button">
                                                    <svg id="vigenciaProspectoBoton" class="w-6 h-6 text-white" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                        <path
                                                            d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z" />
                                                    </svg>
                                                </button>
            
                                                <div id="vigenciaProspecto<?php echo e($prospecto->id); ?>" tabindex="-1" aria-hidden="true"
                                                    class="fixed z-50 hidden w-full p-6 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                    <div class="relative w-full max-w-2xl max-h-full">
            
                                                        <div class="relative bg-white rounded-lg shadow">
            
                                                            <!-- Modal header -->
                                                            <div
                                                                class="bg-custom-morado flex items-start justify-between p-4 border-b rounded-t">
                                                                <div class="text-3xl font-semibold text-white">
                                                                    VIGENCIA
                                                                </div>
            
                                                                <button type="button"
                                                                    class="text-white bg-transparent hover:bg-custom-header hover:text-custom-linksmenu rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center"
                                                                    data-modal-hide="vigenciaProspecto<?php echo e($prospecto->id); ?>">
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
            
                                                                <div class="text-lg text-start px-8 my-3 text-custom-morado">
                                                                    <?php echo e($prospecto->funeraria); ?> - <?php echo e($prospecto->nombre); ?>

                                                                </div>
            
                                                                <form action="<?php echo e(route('adminContactos.vigenciaProspectos', $prospecto->id)); ?>" method="POST">
                                                                    <?php echo csrf_field(); ?>
                                                                    <?php echo method_field('put'); ?>
            
                                                                    <div class="text-start px-8">
                                                                        <label for="fechaVigencia"
                                                                            class="text-lg text-custom-morado">Fecha
                                                                            de vigencia</label><br>
                                                                        <input type="date" name="fechaVigencia" id="fechaVigencia"
                                                                            value="<?php echo e($prospecto->vigencia); ?>"
                                                                            class="rounded-lg text-custom-morado">
                                                                    </div>
            
                                                                    <div class="text-right">
                                                                        <div class="inline-flex p-2 space-x-3">
                                                                            <button type="button" title="cancelar"
                                                                                class="bg-custom-morado rounded-lg w-10 h-10 ml-auto inline-flex justify-center items-center"
                                                                                data-modal-hide="vigenciaProspecto<?php echo e($prospecto->id); ?>">
                                                                                <svg class="w-6 h-6" aria-hidden="true"
                                                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                                    viewBox="0 0 14 14">
                                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                                        stroke-linejoin="round" stroke-width="2"
                                                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                                </svg>
                                                                                <span class="sr-only">Close modal</span>
                                                                            </button>
                                                                            <button type="submit" title="Agregar"
                                                                                class="bg-custom-morado rounded-lg w-10 h-10 ml-auto inline-flex justify-center items-center">
                                                                                <svg id="btnActualizarVigencia" class="w-6 h-6"
                                                                                    aria-hidden="true"
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    viewBox="0 0 512 512" fill="none">
                                                                                    <path
                                                                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                                                                                </svg>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
            
                                                
            
                                                
            
                                                <button data-modal-target="reasignarProspecto<?php echo e($prospecto->id); ?>"
                                                    data-modal-toggle="reasignarProspecto<?php echo e($prospecto->id); ?>"
                                                    class="my-2 text-white bg-slate-700 hover:bg-slate-800 rounded-lg text-center px-2 py-2"
                                                    type="button">
                                                    <svg id="reasignarCandidatoBoton" class="w-6 h-6"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <path
                                                            d="M307 34.8c-11.5 5.1-19 16.6-19 29.2v64H176C78.8 128 0 206.8 0 304C0 417.3 81.5 467.9 100.2 478.1c2.5 1.4 5.3 1.9 8.1 1.9c10.9 0 19.7-8.9 19.7-19.7c0-7.5-4.3-14.4-9.8-19.5C108.8 431.9 96 414.4 96 384c0-53 43-96 96-96h96v64c0 12.6 7.4 24.1 19 29.2s25 3 34.4-5.4l160-144c6.7-6.1 10.6-14.7 10.6-23.8s-3.8-17.7-10.6-23.8l-160-144c-9.4-8.5-22.9-10.6-34.4-5.4z" />
                                                    </svg>
                                                </button>
            
                                                <div id="reasignarProspecto<?php echo e($prospecto->id); ?>" tabindex="-1" aria-hidden="true"
                                                    class="fixed z-50 hidden w-full p-6 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                    <div class="relative w-full max-w-2xl max-h-full">
            
                                                        <div class="relative bg-white rounded-lg shadow">
            
                                                            <!-- Modal header -->
                                                            <div
                                                                class="bg-custom-morado flex items-start justify-between p-4 border-b rounded-t">
                                                                <div class="text-3xl font-semibold text-white">
                                                                    REASIGNAR
                                                                </div>
            
                                                                <button type="button"
                                                                    class="text-white bg-transparent hover:bg-custom-header hover:text-custom-linksmenu rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center"
                                                                    data-modal-hide="reasignarProspecto<?php echo e($prospecto->id); ?>">
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
            
                                                            <div class="text-lg text-start px-4 my-3 text-custom-morado">
                                                                <?php echo e($prospecto->funeraria); ?> - <?php echo e($prospecto->nombre); ?>

                                                            </div>
            
                                                            <form
                                                                action="<?php echo e(route('adminContactos.reasignarProspectos', $prospecto->id)); ?>"
                                                                method="POST">
                                                                <?php echo csrf_field(); ?>
                                                                <?php echo method_field('put'); ?>
            
                                                                <input type="hidden" name="funeraria" value="<?php echo e($prospecto->funeraria); ?>">
                                                                <input type="hidden" name="nombre" value="<?php echo e($prospecto->nombre); ?>">
                                                                <input type="hidden" name="tipo" value="<?php echo e($prospecto->tipo); ?>">
                                                                <input type="hidden" name="correo" value="<?php echo e($prospecto->correo); ?>">
                                                                <input type="hidden" name="telefono" value="<?php echo e($prospecto->telefono); ?>">
                                                                <input type="hidden" name="celular" value="<?php echo e($prospecto->celular); ?>">
                                                                <input type="hidden" name="referenciado" value="<?php echo e($prospecto->referenciado); ?>">
                                                                <input type="hidden" name="origen" value="<?php echo e($prospecto->origen); ?>">
                                                                <input type="hidden" name="fechaNacimiento" value="<?php echo e($prospecto->fechaNacimiento); ?>">
                                                                <input type="hidden" name="fechaIngreso" value="<?php echo e($prospecto->fechaIngreso); ?>">
                                                                <input type="hidden" name="vigencia" value="<?php echo e($prospecto->vigencia); ?>">
                                                                <input type="hidden" name="profesion" value="<?php echo e($prospecto->profesion); ?>">
                                                                <input type="hidden" name="empresas_id" value="<?php echo e($prospecto->empresas_id); ?>">
                                                                <input type="hidden" name="ingresos" value="<?php echo e($prospecto->ingresos); ?>">
                                                                <input type="hidden" name="calle" value="<?php echo e($prospecto->calle); ?>">
                                                                <input type="hidden" name="noExterior" value="<?php echo e($prospecto->noExterior); ?>">
                                                                <input type="hidden" name="noInterior" value="<?php echo e($prospecto->noInterior); ?>">
                                                                <input type="hidden" name="colonias_id" value="<?php echo e($prospecto->colonias_id); ?>">
                                                                <input type="hidden" name="localidad" value="<?php echo e($prospecto->localidad); ?>">
                                                                <input type="hidden" name="municipio" value="<?php echo e($prospecto->municipio); ?>">
                                                                <input type="hidden" name="estado" value="<?php echo e($prospecto->estado); ?>">
                                                                <input type="hidden" name="pais" value="<?php echo e($prospecto->pais); ?>">
                                                                <input type="hidden" name="codPostal" value="<?php echo e($prospecto->codPostal); ?>">
                                                                <input type="hidden" name="observaciones" value="<?php echo e($prospecto->observaciones); ?>">
            
                                                                <div class="text-base text-start px-4 my-2 text-custom-morado">
                                                                    Seleccione un asesor para reasignar el prospecto seleccionado:
                                                                    <select name="usuarioProspecto" id="usuarioProspecto"
                                                                        class="rounded-lg ml-2 h-10 w-3/4 text-xs text-custom-morado">
                                                                        <option value="">---Selecciona una
                                                                            opción---</option>
                                                                        <?php $__currentLoopData = $asesores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asesor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option value="<?php echo e($asesor->id); ?>"
                                                                                <?php if($asesor->id == $prospecto->users_id): ?> selected <?php endif; ?>>
                                                                                <?php echo e($asesor->name); ?>

                                                                            </option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>
                                                                </div>
            
                                                                <div class="text-right">
                                                                    <div class="inline-flex p-2 space-x-3">
                                                                        <button type="button" title="cancelar"
                                                                            class="bg-custom-morado rounded-lg w-10 h-10 ml-auto inline-flex justify-center items-center"
                                                                            data-modal-hide="reasignarProspecto<?php echo e($prospecto->id); ?>">
                                                                            <svg class="w-6 h-6" aria-hidden="true"
                                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                                viewBox="0 0 14 14">
                                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                                    stroke-linejoin="round" stroke-width="2"
                                                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                            </svg>
                                                                            <span class="sr-only">Close modal</span>
                                                                        </button>
                                                                        <button type="submit" title="Reasignar asesor"
                                                                            class="bg-custom-morado rounded-lg w-10 h-10 ml-auto inline-flex justify-center items-center">
                                                                            <svg id="btnReasignar" class="w-6 h-6" aria-hidden="true"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                viewBox="0 0 576 512">
                                                                                <path
                                                                                    d="M400 255.4V240 208c0-8.8-7.2-16-16-16H352 336 289.5c-50.9 0-93.9 33.5-108.3 79.6c-3.3-9.4-5.2-19.8-5.2-31.6c0-61.9 50.1-112 112-112h48 16 32c8.8 0 16-7.2 16-16V80 64.6L506 160 400 255.4zM336 240h16v48c0 17.7 14.3 32 32 32h3.7c7.9 0 15.5-2.9 21.4-8.2l139-125.1c7.6-6.8 11.9-16.5 11.9-26.7s-4.3-19.9-11.9-26.7L409.9 8.9C403.5 3.2 395.3 0 386.7 0C367.5 0 352 15.5 352 34.7V80H336 304 288c-88.4 0-160 71.6-160 160c0 60.4 34.6 99.1 63.9 120.9c5.9 4.4 11.5 8.1 16.7 11.2c4.4 2.7 8.5 4.9 11.9 6.6c3.4 1.7 6.2 3 8.2 3.9c2.2 1 4.6 1.4 7.1 1.4h2.5c9.8 0 17.8-8 17.8-17.8c0-7.8-5.3-14.7-11.6-19.5l0 0c-.4-.3-.7-.5-1.1-.8c-1.7-1.1-3.4-2.5-5-4.1c-.8-.8-1.7-1.6-2.5-2.6s-1.6-1.9-2.4-2.9c-1.8-2.5-3.5-5.3-5-8.5c-2.6-6-4.3-13.3-4.3-22.4c0-36.1 29.3-65.5 65.5-65.5H304h32zM72 32C32.2 32 0 64.2 0 104V440c0 39.8 32.2 72 72 72H408c39.8 0 72-32.2 72-72V376c0-13.3-10.7-24-24-24s-24 10.7-24 24v64c0 13.3-10.7 24-24 24H72c-13.3 0-24-10.7-24-24V104c0-13.3 10.7-24 24-24h64c13.3 0 24-10.7 24-24s-10.7-24-24-24H72z" />
                                                                            </svg>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
            
                                                
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    </div>
                </div>
            
                <div id="tablaClientes" style="display: none">
                    <div class="overflow-x-auto  sm:rounded-lg my-4">
            
                        <table class="text-sm w-full text-left text-custom-linksmenu">
                            <thead class="text-sm text-custom-linksmenu uppercase bg-purple-300 my-4">
                                <tr class="text-center">
                                    
                                    <th scope="col" class="px-4 py-3">
                                        Funeraria
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Nombre
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Estado
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Antigüedad
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Vigencia
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        No. Citas
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Cita
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <?php $__currentLoopData = $clientesPorAsesor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tbody>
                                    <tr class="bg-orange-600 hover:bg-orange-800 text-white">
                                        
                                        <td class="text-center">
                                            <?php echo e($cliente->funeraria); ?>

                                        </td>
                                        <td class="text-center">
                                            <?php echo e($cliente->nombre); ?>

                                        </td>
                                        <td class="text-center">
                                            <?php echo e($cliente->estado); ?>

                                        </td>
                                        <td class="text-center">
                                            <?php echo e($antiguedadClientesPorAsesor[$loop->index]->diasDesdeIngreso); ?> días desde Ingreso
                                        </td>
                                        <td class="text-center">
                                            <?php echo e($vigenciaClientesPorAsesor[$loop->index]->vigencia); ?>

                                        </td>
                                        <td class="text-center">
                                            <?php echo e($citasPorClientes[$loop->index]->noCitas); ?>

                                        </td>
                                        <td class="text-center">
                                            <?php echo e($ultimaCitaClientesPorAsesor[$loop->index]->ultimaCita); ?>

                                        </td>
                                        <td class="text-center">
                                            <div class="flex justify-center items-center space-x-3">
            
            
                                                <!-- Modal detalle clientes -->
                                                <button data-modal-target="detalleCliente<?php echo e($cliente->id); ?>"
                                                    data-modal-toggle="detalleCliente<?php echo e($cliente->id); ?>"
                                                    class="my-2 text-white bg-slate-700 hover:bg-slate-800 rounded-lg text-center px-2 py-2"
                                                    type="button">
                                                    <svg class="w-6 h-6 text-white" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                        <path
                                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                                    </svg>
                                                </button>
            
                                                <div id="detalleCliente<?php echo e($cliente->id); ?>" tabindex="-1" aria-hidden="true"
                                                    class="fixed z-50 hidden w-full p-6 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                    <div class="relative w-full max-w-2xl max-h-full">
            
                                                        <div class="relative bg-white rounded-lg shadow">
            
                                                            <!-- Modal header -->
                                                            <div
                                                                class="bg-custom-morado flex items-start justify-between p-4 border-b rounded-t">
                                                                <div class="text-3xl font-semibold text-white">
                                                                    Detalles de Cliente <br>
                                                                    <?php echo e($cliente->funeraria); ?> - <?php echo e($cliente->nombre); ?>

                                                                </div>
            
                                                                <button type="button"
                                                                    class="text-white bg-transparent hover:bg-custom-header hover:text-custom-linksmenu rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center"
                                                                    data-modal-hide="detalleCliente<?php echo e($cliente->id); ?>">
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
            
                                                                <ul class="flex flex-wrap items-center justify-between px-5 py-3 font-medium text-base"
                                                                    id="tabContent">
                                                                    <li>
                                                                        <a class="text-custom-linksmenu cursor-pointer"
                                                                            data-tab="detalles <?php echo e($cliente->id); ?>">Detalles</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="text-custom-linksmenu cursor-pointer"
                                                                            data-tab="citas <?php echo e($cliente->id); ?>">Citas</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="text-custom-linksmenu cursor-pointer"
                                                                            data-tab="preferencias <?php echo e($cliente->id); ?>">Preferencias</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="text-custom-linksmenu cursor-pointer"
                                                                            data-tab="cotizaciones <?php echo e($cliente->id); ?>">Cotizaciones</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="text-custom-linksmenu cursor-pointer"
                                                                            data-tab="ventas <?php echo e($cliente->id); ?>">Ventas</a>
                                                                    </li>
                                                                </ul>
            
            
                                                                <div class="border p-4 rounded-b">
                                                                    <div id="detalles <?php echo e($cliente->id); ?>"
                                                                        class="tab-content text-black">
                                                                        <div class="inline-flex my-2 px-2 text-sm text-custom-morado">
                                                                            <div>
                                                                                <strong>Funeraria: </strong>
                                                                                <?php echo e($cliente->funeraria); ?>

                                                                            </div>
                                                                            <div class="px-3">
                                                                                <strong>Nombre: </strong> <?php echo e($cliente->nombre); ?>

                                                                            </div>
                                                                        </div>
            
                                                                        <div
                                                                            class="grid grid-cols-3 gap-4 px-2 text-custom-morado text-sm">
                                                                            <div>
                                                                                <strong>Antiguedad: </strong>
                                                                                <?php echo e($antiguedadClientesPorAsesor[$loop->index]->diasDesdeIngreso); ?>

                                                                            </div>
                                                                            <div class="px-3">
                                                                                <strong>No. de Citas: </strong>
                                                                                <?php echo e($citasPorClientes[$loop->index]->noCitas); ?>

                                                                            </div>
                                                                            <div class="px-3">
                                                                                <strong>Tipo: </strong> Cliente
                                                                            </div>
                                                                        </div>
            
                                                                        <hr class="w-auto h-0 mx-3 my-5 bg-custom-morado customDashed">
            
                                                                        <div
                                                                            class="grid grid-cols-3 gap-4 px-2 text-custom-morado text-sm">
                                                                            <div>
                                                                                <strong>Teléfono: </strong> <?php echo e($cliente->telefono); ?>

                                                                            </div>
                                                                            <div class="px-3">
                                                                                <strong>Email: </strong> <?php echo e($cliente->correo); ?>

                                                                            </div>
                                                                        </div>
            
                                                                        <hr class="w-auto h-0 mx-3 my-5 bg-custom-morado customDashed">
            
                                                                        <div
                                                                            class="grid grid-cols-3 py-3 gap-4 px-2 text-custom-morado text-sm">
                                                                            <div>
                                                                                <strong>Referenciado: </strong>
                                                                                <?php echo e($cliente->referenciado); ?>

                                                                            </div>
                                                                            <div class="px-3">
                                                                                <strong>Origen: </strong> <?php echo e($cliente->origen); ?>

                                                                            </div>
                                                                            <div class="px-3">
                                                                                <strong>Fecha de Ingreso: </strong>
                                                                                <?php echo e($cliente->fechaIngreso); ?>

                                                                            </div>
                                                                        </div>
            
                                                                        <div
                                                                            class="grid grid-cols-3 py-3 gap-4 px-2 text-custom-morado text-sm">
                                                                            <div>
                                                                                <strong>Profesión: </strong>
                                                                                <?php echo e($cliente->profesion); ?>

                                                                            </div>
                                                                            <div class="px-3">
                                                                                <strong>Empresa: </strong>
                                                                                <?php echo e($empresasClientes[$loop->index]->nombreEmpresa); ?>

                                                                            </div>
                                                                            <div class="px-3">
                                                                                <strong>Ingresos: </strong> <?php echo e($cliente->ingresos); ?>

                                                                            </div>
                                                                        </div>
            
                                                                        <div
                                                                            class="grid grid-cols-3 gap-4 py-3 px-2 text-custom-morado text-sm">
                                                                            <div>
                                                                                <strong>Calle: </strong> <?php echo e($cliente->calle); ?>

                                                                            </div>
                                                                            <div class="px-3">
                                                                                <strong>No. Exterior: </strong>
                                                                                <?php echo e($cliente->noExterior); ?>

                                                                            </div>
                                                                            <div class="px-3">
                                                                                <strong>No. Interior: </strong>
                                                                                <?php echo e($cliente->noInterior); ?>

                                                                            </div>
                                                                        </div>
            
                                                                        <div
                                                                            class="grid grid-cols-3 gap-4 py-3 px-2 text-custom-morado text-sm">
                                                                            <div>
                                                                                <strong>Colonia: </strong>
                                                                                <?php echo e($coloniasClientes[$loop->index]->colonia); ?>

                                                                            </div>
                                                                            <div class="px-3">
                                                                                <strong>Localidad: </strong>
                                                                                <?php echo e($cliente->localidad); ?>

                                                                            </div>
                                                                            <div class="px-3">
                                                                                <strong>Municipio: </strong>
                                                                                <?php echo e($cliente->municipio); ?>

                                                                            </div>
                                                                        </div>
            
                                                                        <div
                                                                            class="grid grid-cols-3 gap-4 py-3 px-2 text-custom-morado text-sm">
                                                                            <div>
                                                                                <strong>Estado: </strong> <?php echo e($cliente->estado); ?>

                                                                            </div>
                                                                            <div class="px-3">
                                                                                <strong>País: </strong> <?php echo e($cliente->pais); ?>

                                                                            </div>
                                                                            <div class="px-3">
                                                                                <strong>C.P.: </strong> <?php echo e($cliente->codPostal); ?>

                                                                            </div>
                                                                        </div>
            
                                                                        <hr class="w-auto h-0 mx-3 my-5 bg-custom-morado customDashed">
            
                                                                        <div class="px-2 text-custom-morado text-sm py-3">
                                                                            <p>
                                                                                <strong>Observaciones: </strong>
                                                                                <?php echo e($cliente->observaciones); ?>

                                                                            </p>
                                                                        </div>
                                                                    </div>
            
                                                                    <div id="citas <?php echo e($cliente->id); ?>"
                                                                        class="tab-content hidden text-black">
            
                                                                        <div class="text-center text-2xl text-custom-morado">
                                                                            <?php echo e($citasPorClientes[$loop->index]->noCitas); ?>

                                                                            Citas Realizadas
                                                                        </div>
            
                                                                        <div
                                                                            class="relative overflow-x-auto shadow-md sm:rounded-lg my-3">
                                                                            <table class="w-full text-sm text-left text-gray-500">
                                                                                <thead
                                                                                    class="text-xs text-gray-700 uppercase bg-gray-50">
                                                                                    <tr class="text-center">
                                                                                        <th scope="col" class="px-6 py-3">
                                                                                            Fecha
                                                                                        </th>
                                                                                        <th scope="col" class="px-6 py-3">
                                                                                            Hora
                                                                                        </th>
                                                                                        <th scope="col" class="px-6 py-3">
                                                                                            Duración
                                                                                        </th>
                                                                                        <th scope="col" class="px-6 py-3">
                                                                                            Estado
                                                                                        </th>
                                                                                        <th scope="col" class="px-6 py-3">
                                                                                            Comentarios
                                                                                        </th>
                                                                                    </tr>
                                                                                </thead>
            
                                                                                <?php $__currentLoopData = $citasClientes[$cliente->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <tbody class="text-center">
                                                                                        <tr class="bg-white border-b-4">
                                                                                            <td class="">
                                                                                                <?php echo e($cita->fecha); ?>

                                                                                            </td>
                                                                                            <td class="">
                                                                                                <?php echo e($cita->horaInicio); ?>

                                                                                            </td>
                                                                                            <td class="">
                                                                                                <?php echo e($cita->duracion); ?> minutos
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
                                                                        </div>
                                                                    </div>
            
                                                                    <div id="preferencias <?php echo e($cliente->id); ?>"
                                                                        class="tab-content hidden text-black">
                                                                        <div class="rounded-lg shadow-md px-10">
                                                                            <div class="text-custom-morado text-2xl font-medium">
                                                                                Pase
                                                                            </div>
            
                                                                            <hr
                                                                                class="w-auto h-0 mx-3 my-5 bg-custom-morado customDashed">
            
                                                                            <div class="grid grid-cols-3 gap-4 py-4">
                                                                                <div class="flex justify-center items-center">
                                                                                    <input id="default-checkbox" type="checkbox"
                                                                                        value=""
                                                                                        class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                    <label for="default-checkbox"
                                                                                        class="ml-2 text-sm font-medium text-gray-900">Tipo
                                                                                        Infantil</label>
                                                                                </div>
                                                                                <div class="flex justify-center items-center">
                                                                                    <input id="default-checkbox" type="checkbox"
                                                                                        value=""
                                                                                        class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                    <label for="default-checkbox"
                                                                                        class="ml-2 text-sm font-medium text-gray-900">Tipo
                                                                                        A</label>
                                                                                </div>
                                                                                <div class="flex justify-center items-center">
                                                                                    <input id="default-checkbox" type="checkbox"
                                                                                        value=""
                                                                                        class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                    <label for="checked-checkbox"
                                                                                        class="ml-2 text-sm font-medium text-gray-900">Tipo
                                                                                        B</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
            
                                                                        <div class="rounded-lg shadow-md px-10 my-5">
                                                                            <div class="text-custom-morado text-2xl font-medium">
                                                                                Stand
                                                                            </div>
            
                                                                            <hr
                                                                                class="w-auto h-0 mx-3 my-5 bg-custom-morado customDashed">
            
                                                                            <div class="grid grid-cols-4 gap-3 py-4">
                                                                                <div class="flex justify-center items-center">
                                                                                    <input id="default-checkbox" type="checkbox"
                                                                                        value=""
                                                                                        class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                    <label for="default-checkbox"
                                                                                        class="ml-2 text-sm font-medium text-gray-900">6
                                                                                        X
                                                                                        15</label>
                                                                                </div>
                                                                                <div class="flex justify-center items-center">
                                                                                    <input id="default-checkbox" type="checkbox"
                                                                                        value=""
                                                                                        class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                    <label for="default-checkbox"
                                                                                        class="ml-2 text-sm font-medium text-gray-900">6
                                                                                        X
                                                                                        6</label>
                                                                                </div>
                                                                                <div class="flex justify-center items-center">
                                                                                    <input id="default-checkbox" type="checkbox"
                                                                                        value=""
                                                                                        class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                    <label for="default-checkbox"
                                                                                        class="ml-2 text-sm font-medium text-gray-900">3
                                                                                        X
                                                                                        9</label>
                                                                                </div>
                                                                                <div class="flex justify-center items-center">
                                                                                    <input id="default-checkbox" type="checkbox"
                                                                                        value=""
                                                                                        class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                    <label for="default-checkbox"
                                                                                        class="ml-2 text-sm font-medium text-gray-900">3
                                                                                        X
                                                                                        6</label>
                                                                                </div>
                                                                                <div class="flex justify-center items-center">
                                                                                    <input id="default-checkbox" type="checkbox"
                                                                                        value=""
                                                                                        class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                    <label for="default-checkbox"
                                                                                        class="ml-2 text-sm font-medium text-gray-900">3
                                                                                        X
                                                                                        3</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
            
                                                                        <div class="rounded-lg shadow-md px-10 mt-5 mb-2">
                                                                            <div class="text-custom-morado text-2xl font-medium">
                                                                                Paquete
                                                                            </div>
            
                                                                            <hr
                                                                                class="w-auto h-0 mx-3 my-5 bg-custom-morado customDashed">
            
                                                                            <div class="grid grid-cols-4 gap-3 py-4">
                                                                                <div class="flex justify-center items-center">
                                                                                    <input id="default-checkbox" type="checkbox"
                                                                                        value=""
                                                                                        class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                    <label for="default-checkbox"
                                                                                        class="ml-2 text-sm font-medium text-gray-900">Doble
                                                                                        tipo A</label>
                                                                                </div>
                                                                                <div class="flex justify-center items-center">
                                                                                    <input id="default-checkbox" type="checkbox"
                                                                                        value=""
                                                                                        class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                    <label for="default-checkbox"
                                                                                        class="ml-2 text-sm font-medium text-gray-900">Doble
                                                                                        tipo B</label>
                                                                                </div>
                                                                                <div class="flex justify-center items-center">
                                                                                    <input id="default-checkbox" type="checkbox"
                                                                                        value=""
                                                                                        class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                    <label for="default-checkbox"
                                                                                        class="ml-2 text-sm font-medium text-gray-900">Sencillo
                                                                                        tipo A</label>
                                                                                </div>
                                                                                <div class="flex justify-center items-center">
                                                                                    <input id="default-checkbox" type="checkbox"
                                                                                        value=""
                                                                                        class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                    <label for="default-checkbox"
                                                                                        class="ml-2 text-sm font-medium text-gray-900">Sencillo
                                                                                        tipo B</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
            
                                                                    <div id="cotizaciones <?php echo e($cliente->id); ?>"
                                                                        class="tab-content hidden text-black">
            
                                                                        <div class="overflow-x-auto shadow-md sm:rounded-lg my-4">
            
                                                                            <table
                                                                                class="text-sm w-full text-left text-custom-linksmenu">
                                                                                <thead
                                                                                    class="text-sm text-custom-linksmenu uppercase bg-custom-header my-4">
                                                                                    <tr class="text-center">
                                                                                        <th scope="col" class="px-4 py-3">
                                                                                            Folio
                                                                                        </th>
                                                                                        <th scope="col" class="px-4 py-3">
                                                                                            Fecha
                                                                                        </th>
                                                                                        <th scope="col" class="px-4 py-3">
                                                                                            Total
                                                                                        </th>
                                                                                        <th scope="col" class="px-4 py-3">
                                                                                            Estado
                                                                                        </th>
                                                                                        <th scope="col" class="px-4 py-3">
            
                                                                                        </th>
                                                                                    </tr>
                                                                                </thead>
            
                                                                                <tbody>
                                                                                    <td>-</td>
                                                                                    <td>Sin información</td>
                                                                                    <td>Sin información</td>
                                                                                    <td></td>
                                                                                    <td>
                                                                                        <button type="button"
                                                                                            title="Ver cotización"
                                                                                            class="px-3 py-2 text-xs font-medium text-center inline-flex items-center bg-custom-morado rounded-lg">
                                                                                            <svg id="verCotizacionBoton"
                                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                                class="m-auto" height="2em"
                                                                                                viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                                                                <path
                                                                                                    d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z" />
                                                                                            </svg>
                                                                                        </button>
                                                                                    </td>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
            
                                                                    <div id="ventas <?php echo e($cliente->id); ?>"
                                                                        class="tab-content hidden text-black">
                                                                        <div class="overflow-x-auto shadow-md sm:rounded-lg my-4">
                                                                            <table
                                                                                class="text-sm w-full text-left text-custom-linksmenu">
                                                                                <thead
                                                                                    class="text-sm text-custom-linksmenu uppercase bg-custom-header my-4">
                                                                                    <tr class="text-center">
                                                                                        <th scope="col" class="px-4 py-3">
                                                                                            Contrato
                                                                                        </th>
                                                                                        <th scope="col" class="px-4 py-3">
                                                                                            Fecha
                                                                                        </th>
                                                                                        <th scope="col" class="px-4 py-3">
                                                                                            Total
                                                                                        </th>
                                                                                        <th scope="col" class="px-4 py-3">
                                                                                            Detalles
                                                                                        </th>
                                                                                        <th scope="col" class="px-4 py-3">
                                                                                            Asesor
                                                                                        </th>
                                                                                    </tr>
                                                                                </thead>
            
                                                                                <tbody>
                                                                                    <td>-</td>
                                                                                    <td>Sin información</td>
                                                                                    <td>Sin información</td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
            
                                                <!-- Modal detalle clientes -->
            
                                                
            
                                                <button data-modal-target="vigenciaCliente<?php echo e($cliente->id); ?>"
                                                    data-modal-toggle="vigenciaCliente<?php echo e($cliente->id); ?>"
                                                    class="my-2 text-white bg-slate-700 hover:bg-slate-800 rounded-lg text-center px-2 py-2"
                                                    type="button">
                                                    <svg id="vigenciaClienteBoton" class="w-6 h-6 text-white" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                        <path
                                                            d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z" />
                                                    </svg>
                                                </button>
            
                                                <div id="vigenciaCliente<?php echo e($cliente->id); ?>" tabindex="-1" aria-hidden="true"
                                                    class="fixed z-50 hidden w-full p-6 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                    <div class="relative w-full max-w-2xl max-h-full">
            
                                                        <div class="relative bg-white rounded-lg shadow">
            
                                                            <!-- Modal header -->
                                                            <div
                                                                class="bg-custom-morado flex items-start justify-between p-4 border-b rounded-t">
                                                                <div class="text-3xl font-semibold text-white">
                                                                    VIGENCIA
                                                                </div>
            
                                                                <button type="button"
                                                                    class="text-white bg-transparent hover:bg-custom-header hover:text-custom-linksmenu rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center"
                                                                    data-modal-hide="vigenciaCliente<?php echo e($cliente->id); ?>">
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
            
                                                                <div class="text-lg text-start px-8 my-3 text-custom-morado">
                                                                    <?php echo e($cliente->funeraria); ?> - <?php echo e($cliente->nombre); ?>

                                                                </div>
            
                                                                <form action="<?php echo e(route('adminContactos.vigenciaClientes', $cliente->id)); ?>" method="POST">
                                                                    <?php echo csrf_field(); ?>
                                                                    <?php echo method_field('put'); ?>
            
                                                                    <div class="text-start px-8">
                                                                        <label for="fechaVigencia"
                                                                            class="text-lg text-custom-morado">Fecha
                                                                            de vigencia</label><br>
                                                                        <input type="date" name="fechaVigencia"
                                                                            id="fechaVigenciaCliente" value="<?php echo e($cliente->vigencia); ?>"
                                                                            class="rounded-lg text-custom-morado">
                                                                    </div>
            
                                                                    <div class="text-right">
                                                                        <div class="inline-flex p-2 space-x-3">
                                                                            <button type="button" title="cancelar"
                                                                                class="bg-custom-morado rounded-lg w-10 h-10 ml-auto inline-flex justify-center items-center"
                                                                                data-modal-hide="vigenciaCliente<?php echo e($cliente->id); ?>">
                                                                                <svg class="w-6 h-6" aria-hidden="true"
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    fill="none" viewBox="0 0 14 14">
                                                                                    <path stroke="currentColor"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round" stroke-width="2"
                                                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                                </svg>
                                                                                <span class="sr-only">Close modal</span>
                                                                            </button>
                                                                            <button type="submit" title="Agregar"
                                                                                class="bg-custom-morado rounded-lg w-10 h-10 ml-auto inline-flex justify-center items-center">
                                                                                <svg id="btnActualizarVigencia" class="w-6 h-6"
                                                                                    aria-hidden="true"
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    viewBox="0 0 512 512" fill="none">
                                                                                    <path
                                                                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                                                                                </svg>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
            
                                                
            
                                                
            
                                                <button data-modal-target="reasignarCliente<?php echo e($cliente->id); ?>"
                                                    data-modal-toggle="reasignarCliente<?php echo e($cliente->id); ?>"
                                                    class="my-2 text-white bg-slate-700 hover:bg-slate-800 rounded-lg text-center px-2 py-2"
                                                    type="button">
                                                    <svg id="reasignarCandidatoBoton" class="w-6 h-6"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <path
                                                            d="M307 34.8c-11.5 5.1-19 16.6-19 29.2v64H176C78.8 128 0 206.8 0 304C0 417.3 81.5 467.9 100.2 478.1c2.5 1.4 5.3 1.9 8.1 1.9c10.9 0 19.7-8.9 19.7-19.7c0-7.5-4.3-14.4-9.8-19.5C108.8 431.9 96 414.4 96 384c0-53 43-96 96-96h96v64c0 12.6 7.4 24.1 19 29.2s25 3 34.4-5.4l160-144c6.7-6.1 10.6-14.7 10.6-23.8s-3.8-17.7-10.6-23.8l-160-144c-9.4-8.5-22.9-10.6-34.4-5.4z" />
                                                    </svg>
                                                </button>
            
                                                <div id="reasignarCliente<?php echo e($cliente->id); ?>" tabindex="-1" aria-hidden="true"
                                                    class="fixed z-50 hidden w-full p-6 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                    <div class="relative w-full max-w-2xl max-h-full">
            
                                                        <div class="relative bg-white rounded-lg shadow">
            
                                                            <!-- Modal header -->
                                                            <div
                                                                class="bg-custom-morado flex items-start justify-between p-4 border-b rounded-t">
                                                                <div class="text-3xl font-semibold text-white">
                                                                    REASIGNAR
                                                                </div>
            
                                                                <button type="button"
                                                                    class="text-white bg-transparent hover:bg-custom-header hover:text-custom-linksmenu rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center"
                                                                    data-modal-hide="reasignarCliente<?php echo e($cliente->id); ?>">
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
            
                                                            <div class="text-lg text-start px-4 my-3 text-custom-morado">
                                                                <?php echo e($cliente->funeraria); ?> - <?php echo e($cliente->nombre); ?>

                                                            </div>
            
                                                            <form
                                                                action="<?php echo e(route('adminContactos.reasignarClientes', $cliente->id)); ?>"
                                                                method="POST">
                                                                <?php echo csrf_field(); ?>
                                                                <?php echo method_field('put'); ?>
            
                                                                <input type="hidden" name="funeraria" value="<?php echo e($cliente->funeraria); ?>">
                                                                <input type="hidden" name="nombre" value="<?php echo e($cliente->nombre); ?>">
                                                                <input type="hidden" name="tipo" value="<?php echo e($cliente->tipo); ?>">
                                                                <input type="hidden" name="correo" value="<?php echo e($cliente->correo); ?>">
                                                                <input type="hidden" name="telefono" value="<?php echo e($cliente->telefono); ?>">
                                                                <input type="hidden" name="celular" value="<?php echo e($cliente->celular); ?>">
                                                                <input type="hidden" name="referenciado" value="<?php echo e($cliente->referenciado); ?>">
                                                                <input type="hidden" name="origen" value="<?php echo e($cliente->origen); ?>">
                                                                <input type="hidden" name="fechaNacimiento" value="<?php echo e($cliente->fechaNacimiento); ?>">
                                                                <input type="hidden" name="fechaIngreso" value="<?php echo e($cliente->fechaIngreso); ?>">
                                                                <input type="hidden" name="vigencia" value="<?php echo e($cliente->vigencia); ?>">
                                                                <input type="hidden" name="profesion" value="<?php echo e($cliente->profesion); ?>">
                                                                <input type="hidden" name="empresas_id" value="<?php echo e($cliente->empresas_id); ?>">
                                                                <input type="hidden" name="ingresos" value="<?php echo e($cliente->ingresos); ?>">
                                                                <input type="hidden" name="calle" value="<?php echo e($cliente->calle); ?>">
                                                                <input type="hidden" name="noExterior" value="<?php echo e($cliente->noExterior); ?>">
                                                                <input type="hidden" name="noInterior" value="<?php echo e($cliente->noInterior); ?>">
                                                                <input type="hidden" name="colonias_id" value="<?php echo e($cliente->colonias_id); ?>">
                                                                <input type="hidden" name="localidad" value="<?php echo e($cliente->localidad); ?>">
                                                                <input type="hidden" name="municipio" value="<?php echo e($cliente->municipio); ?>">
                                                                <input type="hidden" name="estado" value="<?php echo e($cliente->estado); ?>">
                                                                <input type="hidden" name="pais" value="<?php echo e($cliente->pais); ?>">
                                                                <input type="hidden" name="codPostal" value="<?php echo e($cliente->codPostal); ?>">
                                                                <input type="hidden" name="observaciones" value="<?php echo e($cliente->observaciones); ?>">
            
                                                                <div class="text-base text-start px-4 my-2 text-custom-morado">
                                                                    Seleccione un asesor para reasignar el cliente seleccionado:
                                                                    <select name="usuarioCliente" id="usuarioCliente"
                                                                        class="rounded-lg ml-2 h-10 w-3/4 text-xs text-custom-morado">
                                                                        <option value="">---Selecciona una
                                                                            opción---</option>
                                                                        <?php $__currentLoopData = $asesores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asesor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option value="<?php echo e($asesor->id); ?>"
                                                                                <?php if($asesor->id == $cliente->users_id): ?> selected <?php endif; ?>>
                                                                                <?php echo e($asesor->name); ?>

                                                                            </option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>
                                                                </div>
            
                                                                <div class="text-right">
                                                                    <div class="inline-flex p-2 space-x-3">
                                                                        <button type="button" title="cancelar"
                                                                            class="bg-custom-morado rounded-lg w-10 h-10 ml-auto inline-flex justify-center items-center"
                                                                            data-modal-hide="reasignarCliente<?php echo e($cliente->id); ?>">
                                                                            <svg class="w-6 h-6" aria-hidden="true"
                                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                                viewBox="0 0 14 14">
                                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                                    stroke-linejoin="round" stroke-width="2"
                                                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                            </svg>
                                                                            <span class="sr-only">Close modal</span>
                                                                        </button>
                                                                        <button type="submit" title="Reasignar asesor"
                                                                            class="bg-custom-morado rounded-lg w-10 h-10 ml-auto inline-flex justify-center items-center">
                                                                            <svg id="btnReasignar" class="w-6 h-6"
                                                                                aria-hidden="true"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                viewBox="0 0 576 512">
                                                                                <path
                                                                                    d="M400 255.4V240 208c0-8.8-7.2-16-16-16H352 336 289.5c-50.9 0-93.9 33.5-108.3 79.6c-3.3-9.4-5.2-19.8-5.2-31.6c0-61.9 50.1-112 112-112h48 16 32c8.8 0 16-7.2 16-16V80 64.6L506 160 400 255.4zM336 240h16v48c0 17.7 14.3 32 32 32h3.7c7.9 0 15.5-2.9 21.4-8.2l139-125.1c7.6-6.8 11.9-16.5 11.9-26.7s-4.3-19.9-11.9-26.7L409.9 8.9C403.5 3.2 395.3 0 386.7 0C367.5 0 352 15.5 352 34.7V80H336 304 288c-88.4 0-160 71.6-160 160c0 60.4 34.6 99.1 63.9 120.9c5.9 4.4 11.5 8.1 16.7 11.2c4.4 2.7 8.5 4.9 11.9 6.6c3.4 1.7 6.2 3 8.2 3.9c2.2 1 4.6 1.4 7.1 1.4h2.5c9.8 0 17.8-8 17.8-17.8c0-7.8-5.3-14.7-11.6-19.5l0 0c-.4-.3-.7-.5-1.1-.8c-1.7-1.1-3.4-2.5-5-4.1c-.8-.8-1.7-1.6-2.5-2.6s-1.6-1.9-2.4-2.9c-1.8-2.5-3.5-5.3-5-8.5c-2.6-6-4.3-13.3-4.3-22.4c0-36.1 29.3-65.5 65.5-65.5H304h32zM72 32C32.2 32 0 64.2 0 104V440c0 39.8 32.2 72 72 72H408c39.8 0 72-32.2 72-72V376c0-13.3-10.7-24-24-24s-24 10.7-24 24v64c0 13.3-10.7 24-24 24H72c-13.3 0-24-10.7-24-24V104c0-13.3 10.7-24 24-24h64c13.3 0 24-10.7 24-24s-10.7-24-24-24H72z" />
                                                                            </svg>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
            
                                                
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            mostrarBarra("barraCandidatos");
            datosContactos('1');
        })
        
        function mostrarBarra(clase) {
            $(".barraColor > div").hide();
            $("." + clase).show();
        }

        function datosContactos(id) {
            switch (id) {
                case "1":
                    $("#tablaCandidatos").show();
                    $("#tablaProspectos").hide();
                    $("#tablaClientes").hide();
                    break;
                case "2":
                    $("#tablaCandidatos").hide();
                    $("#tablaProspectos").show();
                    $("#tablaClientes").hide();
                    break;
                case "3":
                    $("#tablaCandidatos").hide();
                    $("#tablaProspectos").hide();
                    $("#tablaClientes").show();
                    break;
            }
        }

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

        function asignarSeleccionados() {

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
<?php /**PATH C:\xampp\htdocs\ANDF\jetStream\resources\views/adminContactos.blade.php ENDPATH**/ ?>