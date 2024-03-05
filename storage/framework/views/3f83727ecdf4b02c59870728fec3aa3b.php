<style>
    #tarjetaPresentacion,
    #volverProspecto,
    #descartar,
    #editar,
    #eliminar,
    #btnCancelar,
    #btnConfirmar {
        fill: #ffffff
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
                    Contactos
            
                    <span class="font-normal text-lg text-custom-morado ml-6 mt-3">
                        Candidatos, prospectos y clientes |
                    </span>
            
                    <!-- Modal toggle -->
                    <button data-modal-target="agregarContacto" data-modal-toggle="agregarContacto"
                        class="block mt-4 ml-2 text-white bg-custom-morado hover:bg-fuchsia-600 rounded-lg text-center px-2 py-2"
                        type="button">
                        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 8h6m-3 3V5m-6-.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0ZM5 11h3a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z" />
                        </svg>
                    </button>
            
                    <!-- Main modal -->
                    <div id="agregarContacto" tabindex="-1" aria-hidden="true"
                        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-2xl max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow">
                                <!-- Modal header -->
                                <div class="bg-custom-morado flex items-start justify-between p-4 border-b rounded-t">
                                    <div class="text-xl font-semibold text-white">
                                        Agregar Contacto
                                    </div>
            
                                    <button type="button"
                                        class="text-white bg-transparent hover:bg-custom-header hover:text-custom-linksmenu rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center"
                                        data-modal-hide="agregarContacto">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
            
                                <!-- Modal body -->
                                <form accept-charset="utf-8" method="POST" action="<?php echo e(route('contactos.store')); ?>">
                                    <?php echo csrf_field(); ?>
            
                                    <div class="grid grid-cols-3 gap-4 px-4">
                                        <div class="text-center my-3">
                                            <label for="funeraria" class="text-base text-custom-morado">Funeraria:</label>
                                            <input type="text" class="rounded-lg ml-2 w-full" name="funeraria" id="funeraria">
                                        </div>
            
                                        <div class="text-center my-3">
                                            <label for="nombreContacto" class="text-base text-custom-morado">Nombre:</label>
                                            <input type="text" class="rounded-lg ml-2 w-full" name="nombreContacto"
                                                id="nombreContacto">
                                        </div>
            
                                        <div class="text-center my-3">
                                            <label for="tipo" class="text-base text-custom-morado">Tipo:</label>
                                            <select name="tipo" id="tipo"
                                                class="rounded-lg ml-2 h-10 w-full text-xs text-custom-morado">
                                                <option selected>---Selecciona una opción---</option>
                                                <?php $__currentLoopData = $tiposContacto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($tipo); ?>"><?php echo e($tipo); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
            
                                    <hr class="w-auto h-0 mx-auto my-4 bg-custom-morado customDashed">
            
                                    <div class="grid grid-cols-3 gap-4 px-4">
            
                                        <div class="text-center my-3">
                                            <label for="correo" class="text-base text-custom-morado">Correo:</label>
                                            <input type="email" class="rounded-lg ml-2 w-full" name="correo" id="correo">
                                        </div>
            
                                        <div class="text-center my-3">
                                            <label for="telefono" class="text-base text-custom-morado">Teléfono:</label>
                                            <input type="tel" class="rounded-lg ml-2 w-full" name="telefono" id="telefono">
                                        </div>
            
                                        <div class="text-center my-3">
                                            <label for="celular" class="text-base text-custom-morado">Celular:</label>
                                            <input type="tel" class="rounded-lg ml-2 w-full" name="celular" id="celular">
                                        </div>
                                    </div>
            
                                    <hr class="w-auto h-0 mx-auto my-4 bg-custom-morado customDashed">
            
                                    <div class="grid grid-cols-3 gap-4 px-4 my-4">
            
                                        <div class="text-center">
                                            <label for="referenciado" class="text-base text-custom-morado">Referenciado:</label>
                                            <select name="referenciado" id="referenciado"
                                                class="rounded-lg ml-2 h-10 w-full text-xs text-custom-morado">
                                                <option selected>---Selecciona una opción---</option>
                                                <?php $__currentLoopData = $contactos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contacto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($contacto->referenciado); ?>">
                                                        <?php echo e($contacto->referenciado); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
            
                                        <div class="text-center">
                                            <label for="origen" class="text-base text-custom-morado">Origen:</label>
                                            <select name="origen" id="origen"
                                                class="rounded-lg ml-2 h-10 w-full text-xs text-custom-morado">
                                                <option selected>---Selecciona una opción---</option>
                                                <?php $__currentLoopData = $origenContacto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $origen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($origen); ?>">
                                                        <?php echo e($origen); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
            
                                        <div class="text-center">
                                            <label for="fechaNacimiento" class="text-base text-custom-morado">Fecha de
                                                nacimiento:</label>
                                            <input type="date" name="fechaNacimiento" id="fechaNacimiento"
                                                class="rounded-lg ml-2 h-10 w-full text-xs text-custom-morado">
                                        </div>
                                    </div>
            
                                    <div class="grid grid-cols-2 gap-6 px-4 my-4">
                                        <div class="text-center">
                                            <label for="fechaIngreso" class="text-base text-custom-morado">Fecha de
                                                Ingreso:</label>
                                            <input type="date" name="fechaIngreso" id="fechaIngreso"
                                                class="rounded-lg ml-2 h-10 w-full text-xs text-custom-morado">
                                        </div>
                                        <div class="text-center">
                                            <label for="vigencia" class="text-base text-custom-morado">Vigencia:</label>
                                            <input type="date" name="vigencia" id="vigencia"
                                                class="rounded-lg ml-2 h-10 w-full text-xs text-custom-morado">
                                        </div>
                                    </div>
            
                                    <div class="grid grid-cols-3 gap-4 px-4 my-4">
            
                                        <div class="text-center">
                                            <label for="profesion" class="text-base text-custom-morado">Profesion:</label>
                                            <input type="text" class="rounded-lg ml-2 w-full" name="profesion" id="profesion">
                                        </div>
            
                                        <div class="text-center">
                                            <label for="empresa" class="text-base text-custom-morado">Empresa:</label>
            
                                            <div class="flex items-center">
                                                <select name="empresa" id="empresa"
                                                    class="rounded-lg ml-2 h-10 w-full text-xs text-custom-morado">
                                                    <option selected>---Selecciona una opción---</option>
                                                    <?php $__currentLoopData = $empresas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $empresa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($empresa->id); ?>">
                                                            <?php echo e($empresa->nombreEmpresa); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <button data-modal-target="agregarEmpresa" data-modal-toggle="agregarEmpresa"
                                                    class="block ml-2 text-custom-header bg-custom-morado rounded-lg text-center px-2 py-2"
                                                    type="button">
                                                    <svg class="w-6 h-6 text-white" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                        <path
                                                            d="M9.546.5a9.5 9.5 0 1 0 9.5 9.5 9.51 9.51 0 0 0-9.5-9.5ZM13.788 11h-3.242v3.242a1 1 0 1 1-2 0V11H5.304a1 1 0 0 1 0-2h3.242V5.758a1 1 0 0 1 2 0V9h3.242a1 1 0 1 1 0 2Z" />
                                                    </svg>
                                                </button>
            
                                                <div id="agregarEmpresa" tabindex="-1"
                                                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                    <div class="relative w-full max-w-md max-h-full">
                                                        <!-- Modal content -->
                                                        <div class="relative bg-white rounded-lg shadow">
                                                            <!-- Modal header -->
                                                            <div
                                                                class="bg-custom-morado flex items-start justify-between p-4 border-b rounded-t">
                                                                <div class="text-xl font-semibold text-white">
                                                                    Agregar Empresa
                                                                </div>
            
                                                                <button type="button"
                                                                    class="text-white bg-transparent hover:bg-custom-header hover:text-custom-linksmenu rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center"
                                                                    data-modal-hide="agregarEmpresa">
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
                                                            <!-- Modal body -->
                                                            <label for="nombre"
                                                                class="text-base my-2 text-custom-morado">Nombre:</label>
                                                            <input type="text" class="rounded-lg px-3 w-full" name="nombre"
                                                                id="nombre">
                                                            <!-- Modal footer -->
            
            
                                                            <div class="inline-flex">
                                                                <div class="m-4">
                                                                    <button type="button" title="cancelar"
                                                                        class="text-custom-header bg-custom-morado focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2"
                                                                        data-modal-hide="agregarEmpresa">
                                                                        <svg class="w-3 h-3" aria-hidden="true"
                                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                            viewBox="0 0 14 14">
                                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                                stroke-linejoin="round" stroke-width="2"
                                                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                        </svg>
                                                                    </button>
                                                                </div>
            
                                                                <div class="m-4">
                                                                    <button type="submit" title="añadir"
                                                                        class="text-custom-header bg-custom-morado focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2">
                                                                        <svg class="w-3 h-3" aria-hidden="true"
                                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                            viewBox="0 0 18 18">
                                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                                stroke-linejoin="round" stroke-width="2"
                                                                                d="M9 1v16M1 9h16" />
                                                                        </svg>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
            
                                        <div class="text-center">
                                            <label for="ingresos" class="text-base text-custom-morado">Ingresos:</label>
                                            <input type="number" name="ingresos" id="ingresos"
                                                class="rounded-lg ml-2 mt-1 w-full text-xs text-custom-morado">
                                        </div>
            
                                    </div>
            
                                    <div class="grid grid-cols-3 gap-4 px-4 my-4">
            
                                        <div class="text-center">
                                            <label for="calle" class="text-base text-custom-morado">Calle:</label>
                                            <input type="text" class="rounded-lg ml-2 w-full" name="calle" id="calle">
                                        </div>
            
                                        <div class="text-center">
                                            <label for="noExterior" class="text-base text-custom-morado">No. Exterior:</label>
                                            <input type="text" class="rounded-lg ml-2 w-full" name="noExterior" id="noExterior">
                                        </div>
            
                                        <div class="text-center">
                                            <label for="noInterior" class="text-base text-custom-morado">No. Interior:</label>
                                            <input type="text" class="rounded-lg ml-2 w-full" name="noInterior" id="noInterior">
                                        </div>
            
                                    </div>
            
                                    <div class="grid grid-cols-3 gap-4 px-4 my-4">
            
                                        <div class="text-center">
                                            <label for="colonias_id" class="text-base text-custom-morado">Colonia:</label>
            
                                            <div class="flex items-center">
                                                <select name="colonias_id" id="colonia"
                                                    class="rounded-lg ml-2 h-10 w-full text-xs text-custom-morado">
                                                    <option selected>---Selecciona una opción---</option>
                                                    <?php $__currentLoopData = $colonias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $colonia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($colonia->id); ?>">
                                                            <?php echo e($colonia->colonia); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
            
            
                                                <button data-modal-target="agregarColonia" data-modal-toggle="agregarColonia"
                                                    class="block ml-2 text-custom-header bg-custom-morado rounded-lg text-center px-2 py-2"
                                                    type="button">
                                                    <svg class="w-6 h-6 text-white" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                        <path
                                                            d="M9.546.5a9.5 9.5 0 1 0 9.5 9.5 9.51 9.51 0 0 0-9.5-9.5ZM13.788 11h-3.242v3.242a1 1 0 1 1-2 0V11H5.304a1 1 0 0 1 0-2h3.242V5.758a1 1 0 0 1 2 0V9h3.242a1 1 0 1 1 0 2Z" />
                                                    </svg>
                                                </button>
            
                                                <div id="agregarColonia" tabindex="-1"
                                                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                    <div class="relative w-full max-w-md max-h-full">
                                                        <!-- Modal content -->
                                                        <div class="relative bg-white rounded-lg shadow">
                                                            <!-- Modal header -->
                                                            <div
                                                                class="bg-custom-morado flex items-start justify-between p-4 border-b rounded-t">
                                                                <div class="text-xl font-semibold text-white">
                                                                    Agregar Colonia
                                                                </div>
            
                                                                <button type="button"
                                                                    class="text-white bg-transparent hover:bg-custom-header hover:text-custom-linksmenu rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center"
                                                                    data-modal-hide="agregarColonia">
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
                                                            <!-- Modal body -->
                                                            <label for="colonia"
                                                                class="text-base my-2 text-custom-morado">Colonia:</label>
                                                            <input type="text" class="rounded-lg  w-full" name="colonia"
                                                                id="colonia">
            
                                                            <label for="codPostal" class="text-base my-2 text-custom-morado">Código
                                                                Postal:</label>
                                                            <input type="number" class="rounded-lg w-full" name="codPostal"
                                                                id="codPostal">
                                                            <!-- Modal footer -->
            
                                                            <div class="inline-flex">
                                                                <div class="m-4">
                                                                    <button type="button" title="cancelar"
                                                                        class="text-custom-header bg-custom-morado focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2"
                                                                        data-modal-hide="agregarColonia">
                                                                        <svg class="w-3 h-3" aria-hidden="true"
                                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                            viewBox="0 0 14 14">
                                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                                stroke-linejoin="round" stroke-width="2"
                                                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                        </svg>
                                                                    </button>
                                                                </div>
            
                                                                <div class="m-4">
                                                                    <button type="submit" title="añadir"
                                                                        class="text-custom-header bg-custom-morado focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2">
                                                                        <svg class="w-3 h-3" aria-hidden="true"
                                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                            viewBox="0 0 18 18">
                                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                                stroke-linejoin="round" stroke-width="2"
                                                                                d="M9 1v16M1 9h16" />
                                                                        </svg>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
            
                                        <div class="text-center">
                                            <label for="localidad" class="text-base text-custom-morado">Localidad:</label>
                                            <input type="text" class="rounded-lg ml-2 w-full" name="localidad" id="localidad">
                                        </div>
            
                                        <div class="text-center">
                                            <label for="municipio" class="text-base text-custom-morado">Municipio:</label>
                                            <input type="text" class="rounded-lg ml-2 w-full" name="municipio" id="municipio">
                                        </div>
            
                                    </div>
            
                                    <div class="grid grid-cols-3 gap-4 px-4 my-4">
            
                                        <div class="text-center">
                                            <label for="estado" class="text-base text-custom-morado">Estado:</label>
                                            <input type="text" class="rounded-lg ml-2 w-full" name="estado" id="estado">
                                        </div>
            
                                        <div class="text-center">
                                            <label for="pais" class="text-base text-custom-morado">Pais:</label>
                                            <input type="text" class="rounded-lg ml-2 w-full" name="pais" id="pais">
                                        </div>
            
                                        <div class="text-center">
                                            <label for="codigoP" class="text-base text-custom-morado">C.P.:</label>
                                            <input type="number" name="codPostal" id="codPostal"
                                                class="rounded-lg ml-2 mt-1 w-full text-xs text-custom-morado">
                                        </div>
                                    </div>
            
                                    <div class="text-start ms-5">
                                        <label for="usuario" class="text-base text-custom-morado">Usuario al que se le
                                            asignara:</label>
                                        <select name="usuario" id="usuario"
                                            class="rounded-lg ml-2 h-10 w-3/4 text-xs text-custom-morado">
                                            <option selected>---Selecciona una opción---</option>
                                            <?php $__currentLoopData = $asesores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asesor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($asesor->id); ?>">
                                                    <?php echo e($asesor->name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
            
                                    <hr class="w-auto h-0 mx-auto my-4 bg-custom-morado customDashed">
            
            
                                    <label for="Observaciones"
                                        class="block ml-4 my-2 text-base text-custom-morado">Observaciones:</label>
                                    <textarea name="observaciones" id="message" rows="4"
                                        class="block p-3 w-4/5 m-auto text-sm bg-white rounded-lg border-2 border-green-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
            
                                    <!-- Modal footer -->
                                    <div class="text-right p-2 border-y rounded-b">
                                        <button data-modal-hide="defaultModal" type="submit"
                                            class="text-custom-header bg-custom-morado focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2">
                                            Agregar</button>
                                    </div>
            
                                </form>
                            </div>
                        </div>
                    </div>
            
                </div>

                <hr class="w-3/4 h-1 mx-auto my-4 bg-custom-morado border-0 rounded md:my-5">

                <div class="grid grid-cols-4 gap-3 px-6 my-4 space-x-5">

                    <div class="max-w-sm text-white bg-teal-500 border border-gray-200 rounded-lg shadow py-6 cursor-pointer"
                        onclick="datosContactos('1'); mostrarBarra('barraCandidatos')">
                        <div class="text-center text-4xl font-bold">
                            <?php echo e($numeroCandidatos); ?>

                        </div>

                        <div class="text-right text-2xl font-medium mr-2">
                            Candidatos
                        </div>
                    </div>

                    <div class="max-w-sm text-white bg-green-500 border border-gray-200 rounded-lg shadow py-6 cursor-pointer"
                        onclick="datosContactos('2'); mostrarBarra('barraProspectos')">

                        <div class="text-center text-4xl font-bold">
                            <?php echo e($numeroProspectos); ?>

                        </div>

                        <div class="text-right text-2xl font-medium mr-2">
                            Prospectos
                        </div>
                    </div>

                    <div class="max-w-sm text-white bg-red-500 border border-gray-200 rounded-lg shadow py-6 cursor-pointer"
                        onclick="datosContactos('3'); mostrarBarra('barraClientes')">

                        <div class="text-center text-4xl font-bold">
                            <?php echo e($numeroClientes); ?>

                        </div>

                        <div class="text-right text-2xl font-medium mr-2">
                            Clientes
                        </div>
                    </div>

                    <div class="max-w-sm text-white bg-slate-600 border border-gray-200 rounded-lg shadow py-6 cursor-pointer"
                        onclick="datosContactos('4'); mostrarBarra('barraDescartados')">

                        <div class="text-center text-4xl font-bold">
                            <?php echo e($numeroDescartados); ?>

                        </div>

                        <div class="text-right text-2xl font-medium mr-2">
                            Descartados
                        </div>
                    </div>
                </div>

                <div class="barraColor my-4">
                    <div class="barraCandidatos" style="display: none">
                        <div class="bg-teal-500 border border-gray-300 rounded-lg shadow-lg h-8 mx-5"></div>
                    </div>

                    <div class="barraProspectos" style="display: none">
                        <div class="bg-green-500 border border-gray-300 rounded-lg shadow-lg h-8 mx-5"></div>
                    </div>

                    <div class="barraClientes" style="display: none">
                        <div class="bg-red-500 hover:bg-red-700 border border-gray-300 rounded-lg shadow-lg h-8 mx-5"></div>
                    </div>

                    <div class="barraDescartados" style="display: none">
                        <div class="bg-slate-600 border border-gray-300 rounded-lg shadow-lg h-8 mx-5"></div>
                    </div>
                </div>

                <div id="tablaCandidatos" style="display: none">
                    <div class="overflow-x-auto  sm:rounded-lg my-4">
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
                                        Telefono
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Email
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Antigüedad
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Citas
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Tipo
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Detalles
                                    </th>
                                </tr>
                            </thead>
                            <?php $__currentLoopData = $detalleCandidatos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $candidato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tbody>
                                    <tr class="bg-teal-500 hover:bg-teal-700 text-white">
                                        <td class="text-center">
                                            <?php echo e($candidato->funeraria); ?>

                                        </td>
                                        <td class="text-center">
                                            <?php echo e($candidato->nombre); ?>

                                        </td>
                                        <td class="text-center">
                                            <?php echo e($candidato->telefono); ?>

                                        </td>
                                        <td class="text-center">
                                            <?php echo e($candidato->correo); ?>

                                        </td>
                                        <td class="text-center">
                                            <?php echo e($antiguedadCandidatos[$loop->index]->diasDesdeIngreso); ?>

                                        </td>
                                        <td class="text-center">
                                            <?php echo e($citasPorCandidatos[$loop->index]->noCitas); ?>

                                        </td>
                                        <td class="text-center">
                                            Candidato
                                        </td>
                                        <td>
                                            <div class="flex justify-center items-center">
                                                <!-- Modal toggle -->
                                                <button data-modal-target="detalleCandidato<?php echo e($candidato->id); ?>"
                                                    data-modal-toggle="detalleCandidato<?php echo e($candidato->id); ?>"
                                                    class="my-2 text-white bg-blue-600 hover:bg-blue-800 rounded-lg text-center px-2 py-2"
                                                    type="button">
                                                    <svg class="w-6 h-6 text-white" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                        <path
                                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                                    </svg>
                                                </button>
                                            </div>
            
                                            <!-- Modal Detalles -->
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
                                                                    <div class="inline-flex my-5 px-2 text-sm text-custom-morado">
                                                                        <div>
                                                                            <strong>Funeraria: </strong> <?php echo e($candidato->funeraria); ?>

                                                                        </div>
                                                                        <div class="px-3">
                                                                            <strong>Nombre: </strong> <?php echo e($candidato->nombre); ?>

                                                                        </div>
                                                                    </div>
            
                                                                    <div
                                                                        class="grid grid-cols-3 gap-4 px-2 text-custom-morado text-sm">
                                                                        <div>
                                                                            <strong>Antiguedad: </strong>
                                                                            <?php echo e($antiguedadCandidatos[$loop->index]->diasDesdeIngreso); ?>

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
                                                                            <strong>Profesión: </strong> <?php echo e($candidato->profesion); ?>

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
                                                                            <strong>Localidad: </strong> <?php echo e($candidato->localidad); ?>

                                                                        </div>
                                                                        <div class="px-3">
                                                                            <strong>Municipio: </strong> <?php echo e($candidato->municipio); ?>

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
                                                                        <?php echo e($citasPorCandidatos[$loop->index]->noCitas); ?>/<?php echo e($numeroCitasCandidatos); ?>

                                                                        Citas Realizadas
                                                                    </div>
            
                                                                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-3">
                                                                        <table class="w-full text-sm text-left text-gray-500">
                                                                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
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
            
                                                                        <div class="text-right">
                                                                            <div class="inline-flex p-3">
                                                                                <button data-modal-target="defaultModal"
                                                                                    data-modal-toggle="registrarCitaCandidato<?php echo e($candidato->id); ?>"
                                                                                    class="block mt-4 ml-2 text-white bg-custom-morado hover:bg-fuchsia-600 rounded-lg text-center px-2 py-2"
                                                                                    type="button">
                                                                                    <svg class="w-6 h-6 text-white" aria-hidden="true"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        fill="none" viewBox="0 0 20 18">
                                                                                        <path stroke="currentColor"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round" stroke-width="2"
                                                                                            d="M13 8h6m-3 3V5m-6-.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0ZM5 11h3a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z" />
                                                                                    </svg>
                                                                                </button>
            
                                                                                <div id="registrarCitaCandidato<?php echo e($candidato->id); ?>"
                                                                                    tabindex="-1"
                                                                                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                                                    <div class="relative w-full max-w-md max-h-full">
                                                                                        <!-- Modal content -->
                                                                                        <div
                                                                                            class="relative bg-white rounded-lg shadow">
                                                                                            <!-- Modal header -->
                                                                                            <div
                                                                                                class="bg-custom-morado flex items-start justify-between p-4 border-b rounded-t">
                                                                                                <div
                                                                                                    class="text-xl font-semibold text-white">
                                                                                                    Registro de Cita
                                                                                                </div>
            
                                                                                                <button type="button"
                                                                                                    class="text-white bg-transparent hover:bg-custom-header hover:text-custom-linksmenu rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center"
                                                                                                    data-modal-hide="registrarCitaCandidato<?php echo e($candidato->id); ?>">
                                                                                                    <svg class="w-3 h-3"
                                                                                                        aria-hidden="true"
                                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                                        fill="none"
                                                                                                        viewBox="0 0 14 14">
                                                                                                        <path stroke="currentColor"
                                                                                                            stroke-linecap="round"
                                                                                                            stroke-linejoin="round"
                                                                                                            stroke-width="2"
                                                                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                                                    </svg>
                                                                                                    <span class="sr-only">Close
                                                                                                        modal</span>
                                                                                                </button>
                                                                                            </div>
                                                                                            <!-- Modal body -->
                                                                                            <form accept-charset="utf-8"
                                                                                                method="POST"
                                                                                                action="<?php echo e(route('contactos.storeCitas')); ?>">
                                                                                                <?php echo csrf_field(); ?>
            
                                                                                                <div class="text-center">
                                                                                                    <label for="persona"
                                                                                                        class="text-center text-lg font-semibold text-custom-morado px-5">Persona:</label>
                                                                                                    <input type="hidden"
                                                                                                        name="persona_id"
                                                                                                        id="persona_id"
                                                                                                        value="<?php echo e($candidato->id); ?>">
                                                                                                    <input type="text"
                                                                                                        class="rounded-lg ml-2 h-8 w-3/4"
                                                                                                        name="persona" id="persona"
                                                                                                        value="<?php echo e($candidato->nombre); ?>"
                                                                                                        disabled>
                                                                                                    
                                                                                                </div>
            
                                                                                                <div class="text-center my-3">
                                                                                                    <label for="tipoCita"
                                                                                                        class="text-lg text-center font-semibold text-custom-morado p-5">Tipo:</label>
                                                                                                    <div class="my-2">
                                                                                                        <select name="tipoCita"
                                                                                                            id="tipoCita"
                                                                                                            class="rounded-lg w-4/5 text-xs text-custom-morado font-semibold">
                                                                                                            <option selected>
                                                                                                                ---Selecciona una
                                                                                                                opción---</option>
                                                                                                            <?php $__currentLoopData = $tiposdeCita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tCita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                                <option
                                                                                                                    value="<?php echo e($tCita); ?>">
                                                                                                                    <?php echo e($tCita); ?>

                                                                                                                </option>
                                                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
            
                                                                                                <div class="text-center my-3">
                                                                                                    <label for="fecha"
                                                                                                        class="text-lg text-center font-semibold text-custom-morado px-5">Fecha:</label>
                                                                                                    <div class="my-2">
                                                                                                        <input type="date"
                                                                                                            name="fecha"
                                                                                                            id="fecha"
                                                                                                            class="rounded-lg w-4/5 text-sm text-custom-morado">
                                                                                                    </div>
                                                                                                </div>
            
                                                                                                <div class="text-center my-3">
                                                                                                    <label for="horaInicio"
                                                                                                        class="text-lg text-center font-semibold text-custom-morado px-5">Hora
                                                                                                        Inicio:</label>
                                                                                                    <div class="my-2">
                                                                                                        <input type="time"
                                                                                                            name="horaInicio"
                                                                                                            id="horaInicio"
                                                                                                            class="rounded-lg w-4/5">
                                                                                                    </div>
                                                                                                </div>
            
                                                                                                <div class="text-center my-3">
                                                                                                    <label for="horaFinal"
                                                                                                        class="text-lg font-semibold text-custom-morado text-center px-5">Hora
                                                                                                        Final:</label>
                                                                                                    <div class="my-2">
                                                                                                        <input type="time"
                                                                                                            name="horaFinal"
                                                                                                            id="horaFinal"
                                                                                                            class="rounded-lg w-4/5">
                                                                                                    </div>
                                                                                                </div>
            
                                                                                                <div class="text-center my-3">
                                                                                                    <label for="lugar"
                                                                                                        class="text-lg text-center font-semibold text-custom-morado px-5">Lugar:</label>
                                                                                                    <div class="my-2">
                                                                                                        <select name="lugar"
                                                                                                            id="lugar"
                                                                                                            class="rounded-lg mx-6 h-10 w-4/5 text-xs text-custom-morado font-semibold">
                                                                                                            <option selected>
                                                                                                                ---Selecciona una
                                                                                                                opción---</option>
                                                                                                            <?php $__currentLoopData = $lugarCita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lugar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                                <option
                                                                                                                    value="<?php echo e($lugar); ?>">
                                                                                                                    <?php echo e($lugar); ?>

                                                                                                                </option>
                                                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
            
                                                                                                <div class="text-center my-3">
                                                                                                    <label for="comentarios"
                                                                                                        class="text-lg font-semibold text-custom-morado px-5">Comentarios:</label>
                                                                                                    <textarea name="comentarios" id="comentarios" rows="4"
                                                                                                        class="block p-3 w-11/12 m-auto text-sm bg-white rounded-lg border-2 border-green-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
                                                                                                </div>
            
            
                                                                                                <!-- Modal footer -->
            
                                                                                                <div class="text-right">
                                                                                                    <div class="inline-flex p-2">
                                                                                                        <button type="submit"
                                                                                                            title="Registrar cita"
                                                                                                            class="text-custom-header bg-custom-morado focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2">
                                                                                                            <svg class="w-4 h-4"
                                                                                                                aria-hidden="true"
                                                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                                                fill="none"
                                                                                                                viewBox="0 0 18 18">
                                                                                                                <path
                                                                                                                    stroke="currentColor"
                                                                                                                    stroke-linecap="round"
                                                                                                                    stroke-linejoin="round"
                                                                                                                    stroke-width="2"
                                                                                                                    d="M9 1v16M1 9h16" />
                                                                                                            </svg>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
            
                                                                <div id="preferencias <?php echo e($candidato->id); ?>"
                                                                    class="tab-content hidden text-black">
                                                                    <div class="rounded-lg shadow-md px-10">
                                                                        <div class="text-custom-morado text-2xl font-medium">
                                                                            Pase
                                                                        </div>
            
                                                                        <hr class="w-auto h-0 mx-3 my-5 bg-custom-morado customDashed">
            
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
            
                                                                        <hr class="w-auto h-0 mx-3 my-5 bg-custom-morado customDashed">
            
                                                                        <div class="grid grid-cols-4 gap-3 py-4">
                                                                            <div class="flex justify-center items-center">
                                                                                <input id="default-checkbox" type="checkbox"
                                                                                    value=""
                                                                                    class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                <label for="default-checkbox"
                                                                                    class="ml-2 text-sm font-medium text-gray-900">6 X
                                                                                    15</label>
                                                                            </div>
                                                                            <div class="flex justify-center items-center">
                                                                                <input id="default-checkbox" type="checkbox"
                                                                                    value=""
                                                                                    class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                <label for="default-checkbox"
                                                                                    class="ml-2 text-sm font-medium text-gray-900">6 X
                                                                                    6</label>
                                                                            </div>
                                                                            <div class="flex justify-center items-center">
                                                                                <input id="default-checkbox" type="checkbox"
                                                                                    value=""
                                                                                    class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                <label for="default-checkbox"
                                                                                    class="ml-2 text-sm font-medium text-gray-900">3 X
                                                                                    9</label>
                                                                            </div>
                                                                            <div class="flex justify-center items-center">
                                                                                <input id="default-checkbox" type="checkbox"
                                                                                    value=""
                                                                                    class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                <label for="default-checkbox"
                                                                                    class="ml-2 text-sm font-medium text-gray-900">3 X
                                                                                    6</label>
                                                                            </div>
                                                                            <div class="flex justify-center items-center">
                                                                                <input id="default-checkbox" type="checkbox"
                                                                                    value=""
                                                                                    class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                <label for="default-checkbox"
                                                                                    class="ml-2 text-sm font-medium text-gray-900">3 X
                                                                                    3</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
            
                                                                    <div class="rounded-lg shadow-md px-10 mt-5 mb-2">
                                                                        <div class="text-custom-morado text-2xl font-medium">
                                                                            Paquete
                                                                        </div>
            
                                                                        <hr class="w-auto h-0 mx-3 my-5 bg-custom-morado customDashed">
            
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
            
                                                                    <div class="text-right py-2">
                                                                        <button type="button" title="Guardar"
                                                                            class="px-3 py-2 text-xs font-medium text-center inline-flex items-center bg-custom-morado rounded-lg">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" height="2em"
                                                                                class="m-auto"
                                                                                viewBox="0 0 512 512">
                                                                                <style>
                                                                                    svg {
                                                                                        fill: #ffffff
                                                                                    }
                                                                                </style>
                                                                                <path
                                                                                    d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z" />
                                                                            </svg>
                                                                        </button>
                                                                    </div>
                                                                </div>
            
                                                                <div id="cotizaciones <?php echo e($candidato->id); ?>"
                                                                    class="tab-content hidden text-black">
            
                                                                    <div class="overflow-x-auto shadow-md sm:rounded-lg my-4">
            
                                                                        <table class="text-sm w-full text-left text-custom-linksmenu">
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
                                                                                <?php $__currentLoopData = $cotizacionesCandidatos[$candidato->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cotizacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <tbody>
                                                                                        <td class="px-6 py-4 text-center"><?php echo e($cotizacion->id); ?>

                                                                                        </td>
                                                                                        <td class="px-6 py-4 text-center"><?php echo e($cotizacion->fecha); ?></td>
                                                                                        <td class="px-6 py-4 text-center"><?php echo e($cotizacion->total); ?></td>
                                                                                        <td class="px-6 py-4 text-center"><?php echo e($cotizacion->estado); ?>

                                                                                        </td>
                                                                                        <td>
                                                                                            <button type="button" title="Ver cotización"
                                                                                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center bg-custom-morado rounded-lg">
                                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                    class="m-auto" height="2em"
                                                                                                    viewBox="0 0 448 512">
                                                                                                    <path
                                                                                                        d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z" />
                                                                                                </svg>
                                                                                            </button>
                                                                                        </td>
                                                                                    </tbody>
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </table>
                                                                    </div>
            
                                                                    <div class="text-right">
                                                                        <div class="inline-flex">
                                                                            <button data-modal-target="default-modal"
                                                                                data-modal-toggle="agregarCotizacionCandidato <?php echo e($candidato->id); ?>"
                                                                                class="block mt-4 ml-2 text-white bg-custom-morado hover:bg-fuchsia-600 rounded-lg text-center px-3 py-2"
                                                                                type="button">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" height="2em"
                                                                                    class="m-auto"
                                                                                    viewBox="0 0 512 512">
                                                                                    <path
                                                                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                                                                                </svg>
                                                                            </button>
            
                                                                            <div id="agregarCotizacionCandidato <?php echo e($candidato->id); ?>"
                                                                                tabindex="-1"
                                                                                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                                                <div class="relative w-full max-w-md max-h-full">
                                                                                    <!-- Modal content -->
                                                                                    <div class="relative bg-white rounded-lg shadow">
                                                                                        <!-- Modal header -->
                                                                                        <div
                                                                                            class="bg-custom-morado flex items-start justify-between p-4 border-b rounded-t">
                                                                                            <div
                                                                                                class="text-xl font-semibold text-white">
                                                                                                Agregar Cotización
                                                                                            </div>
            
                                                                                            <button type="button"
                                                                                                class="text-white bg-transparent hover:bg-custom-header hover:text-custom-linksmenu rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center"
                                                                                                data-modal-hide="agregarCotizacionCandidato <?php echo e($candidato->id); ?>">
                                                                                                <svg class="w-3 h-3"
                                                                                                    aria-hidden="true"
                                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                                    fill="none"
                                                                                                    viewBox="0 0 14 14">
                                                                                                    <path stroke="currentColor"
                                                                                                        stroke-linecap="round"
                                                                                                        stroke-linejoin="round"
                                                                                                        stroke-width="2"
                                                                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                                                </svg>
                                                                                                <span class="sr-only">Close
                                                                                                    modal</span>
                                                                                            </button>
                                                                                        </div>
                                                                                        <!-- Modal body -->
            
                                                                                        <form accept-charset="utf-8" method="POST"
                                                                                            action="<?php echo e(route('contactos.storeCotizaciones')); ?>">
                                                                                            <?php echo csrf_field(); ?>
            
                                                                                            <div class="text-center">
                                                                                                <label for="personaCandidato"
                                                                                                    class="text-center text-lg font-semibold text-custom-morado px-5">Prospecto:</label>
                                                                                                <input type="hidden"
                                                                                                    name="personaCandidato_id"
                                                                                                    id="personaCandidato_id"
                                                                                                    value="<?php echo e($candidato->id); ?>">
                                                                                                <input type="text"
                                                                                                    class="rounded-lg ml-2 h-8 w-3/4"
                                                                                                    name="personaCandidato"
                                                                                                    id="personaCandidato"
                                                                                                    value="<?php echo e($candidato->nombre); ?>"
                                                                                                    disabled>
                                                                                            </div>
            
                                                                                            <div class="grid grid-cols-2">
                                                                                                <div class="text-center my-2">
                                                                                                    <label for="productoCandidato"
                                                                                                        class="text-lg text-center font-semibold text-custom-morado p-5">Producto</label>
                                                                                                    <div class="my-2">
                                                                                                        <select
                                                                                                            name="productoCandidato"
                                                                                                            id="productoCandidato"
                                                                                                            class="rounded-lg w-4/5 text-xs text-custom-morado font-semibold"
                                                                                                            onchange="establecerPrecio(this)">
                                                                                                            <option selected>
                                                                                                                ---Selecciona una
                                                                                                                opción---
                                                                                                            </option>
                                                                                                            <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                                <option
                                                                                                                    value="<?php echo e($producto->id); ?>"
                                                                                                                    data-precio="<?php echo e($producto->precio); ?>">
                                                                                                                    <?php echo e($producto->producto); ?>

                                                                                                                </option>
                                                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
            
                                                                                                <div class="text-center my-2">
                                                                                                    <label for="precioCandidato"
                                                                                                        class="text-lg font-semibold text-center text-custom-morado">Precio</label>
                                                                                                    <div class="my-2">
                                                                                                        <div name="precioCandidato"
                                                                                                            id="precioCandidato">
                                                                                                            <i
                                                                                                                class="text-xs">$00.00</i>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
            
                                                                                            <div class="grid grid-cols-2">
                                                                                                <div class="text-center my-1">
                                                                                                    <label for="cantidadCandidato"
                                                                                                        class="text-base text-custom-morado">Cantidad</label>
                                                                                                    <div class="my-2">
                                                                                                        <input type="number"
                                                                                                            class="rounded-lg ml-2 h-8 w-4/5"
                                                                                                            name="cantidadCandidato"
                                                                                                            id="cantidadCandidato">
                                                                                                    </div>
                                                                                                </div>
            
                                                                                                <div class="text-center my-1">
                                                                                                    <label for="descuentoCandidato"
                                                                                                        class="text-base text-custom-morado">Descuento
                                                                                                        %</label>
            
                                                                                                    <div class="my-2">
                                                                                                        <input type="number"
                                                                                                            class="rounded-lg ml-2 h-8 w-4/5"
                                                                                                            name="descuentoCandidato"
                                                                                                            id="descuentoCandidato">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
            
                                                                                            <div class="my-1 p-2">
                                                                                                <button type="button"
                                                                                                    onclick="agregarProducto()"
                                                                                                    title="Agregar Producto"
                                                                                                    class="px-2 py-2 text-xs font-medium inline-flex text-center items-center bg-custom-morado rounded-lg">
                                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                        height="2em"
                                                                                                        viewBox="0 0 512 512">
                                                                                                        <path
                                                                                                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                                                                                                    </svg>
                                                                                                </button>
                                                                                            </div>
            
                                                                                            <div
                                                                                                class="overflow-x-auto shadow-md sm:rounded-lg my-4">
                                                                                                <table
                                                                                                    class="text-sm w-full text-left text-custom-linksmenu">
                                                                                                    <thead
                                                                                                        class="text-sm text-custom-linksmenu uppercase bg-custom-header my-4">
                                                                                                        <tr class="text-center">
                                                                                                            <th scope="col"
                                                                                                                class="px-2 py-3">
                                                                                                                Nombre
                                                                                                            </th>
                                                                                                            <th scope="col"
                                                                                                                class="px-2 py-3">
                                                                                                                Precio
                                                                                                            </th>
                                                                                                            <th scope="col"
                                                                                                                class="px-2 py-3">
                                                                                                                Cantidad
                                                                                                            </th>
                                                                                                            <th scope="col"
                                                                                                                class="px-2 py-3">
                                                                                                                Descuento
                                                                                                            </th>
                                                                                                            <th scope="col"
                                                                                                                class="px-2 py-3">
                                                                                                                Total
                                                                                                            </th>
                                                                                                            <th scope="col"
                                                                                                                class="px-2 py-3">
            
                                                                                                            </th>
                                                                                                        </tr>
                                                                                                    </thead>
                                                                                                    <tbody id="tablaCotizacion">
                                                                                                        <tr
                                                                                                            class="bg-teal-500 hover:bg-teal-700 text-white">
                                                                                                            <td class="text-center">
            
                                                                                                            </td>
                                                                                                            <td class="text-center">
            
                                                                                                            </td>
                                                                                                            <td class="text-center">
            
                                                                                                            </td>
                                                                                                            <td class="text-center">
            
                                                                                                            </td>
                                                                                                            <td class="text-center">
            
                                                                                                            </td>
                                                                                                            <td class="text-center">
            
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </div>
            
                                                                                            <div class="inline-flex">
                                                                                                <div class="text-right">
                                                                                                    <div class="my-2">
                                                                                                        <div name="totalCandidato"
                                                                                                            id="totalCandidato">
                                                                                                            <i class="text-base">Total:
                                                                                                                $00.00</i>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
            
                                                                                            <hr
                                                                                                class="w-auto h-0 mx-auto my-4 bg-custom-morado customDashed">
            
                                                                                            <div class="text-center my-3">
                                                                                                <label for="observacionesCandidato"
                                                                                                    class="text-lg font-semibold text-custom-morado px-5">Observaciones:</label>
                                                                                                <textarea name="observacionesCandidato" id="observacionesCandidato" rows="4"
                                                                                                    class="block p-3 w-11/12 m-auto text-sm bg-white rounded-lg border-2 border-green-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
                                                                                            </div>
            
                                                                                            <div
                                                                                                class="text-right p-2 border-y rounded-b">
                                                                                                <button type="submit"
                                                                                                    class="text-custom-header bg-custom-morado focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2">
                                                                                                    Guardar cotización</button>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
            
                                                                <div id="ventas <?php echo e($candidato->id); ?>"
                                                                    class="tab-content hidden text-black">
                                                                    <div class="overflow-x-auto shadow-md sm:rounded-lg my-4">
                                                                        <table class="text-sm w-full text-left text-custom-linksmenu">
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
            
                                                                            <?php $__currentLoopData = $ventasCandidatos[$candidato->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $venta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <tbody>
                                                                                    <td class="px-6 py-4"><?php echo e($venta->referencia); ?>

                                                                                    </td>
                                                                                    <td class="px-6 py-4"><?php echo e($venta->fecha); ?></td>
                                                                                    <td class="px-6 py-4"><?php echo e($venta->total); ?></td>
                                                                                    <td class="px-6 py-4"><?php echo e($venta->observaciones); ?>

                                                                                    </td>
                                                                                    <td class="px-6 py-4"><?php echo e($venta->name); ?></td>
                                                                                </tbody>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </table>
            
                                                                        <div class="text-right">
                                                                            <div class="inline-flex">
                                                                                <button data-modal-target="default-modal"
                                                                                    data-modal-toggle="agregarCotizacionCandidato <?php echo e($candidato->id); ?>"
                                                                                    class="block mt-4 ml-2 text-white bg-custom-morado hover:bg-fuchsia-600 rounded-lg text-center px-3 py-2"
                                                                                    type="button">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        height="2em" class="m-auto"
                                                                                        viewBox="0 0 512 512">
                                                                                        <path
                                                                                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                                                                                    </svg>
                                                                                </button>
            
                                                                                <div id="agregarCotizacionCandidato <?php echo e($candidato->id); ?>"
                                                                                    tabindex="-1"
                                                                                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                                                    <div class="relative w-full max-w-md max-h-full">
                                                                                        <!-- Modal content -->
                                                                                        <div
                                                                                            class="relative bg-white rounded-lg shadow">
                                                                                            <!-- Modal header -->
                                                                                            <div
                                                                                                class="bg-custom-morado flex items-start justify-between p-4 border-b rounded-t">
                                                                                                <div
                                                                                                    class="text-xl font-semibold text-white">
                                                                                                    Agregar Cotización
                                                                                                </div>
            
                                                                                                <button type="button"
                                                                                                    class="text-white bg-transparent hover:bg-custom-header hover:text-custom-linksmenu rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center"
                                                                                                    data-modal-hide="agregarCotizacionCandidato <?php echo e($candidato->id); ?>">
                                                                                                    <svg class="w-3 h-3"
                                                                                                        aria-hidden="true"
                                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                                        fill="none"
                                                                                                        viewBox="0 0 14 14">
                                                                                                        <path stroke="currentColor"
                                                                                                            stroke-linecap="round"
                                                                                                            stroke-linejoin="round"
                                                                                                            stroke-width="2"
                                                                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                                                    </svg>
                                                                                                    <span class="sr-only">Close
                                                                                                        modal</span>
                                                                                                </button>
                                                                                            </div>
                                                                                            <!-- Modal body -->
            
                                                                                            <form accept-charset="utf-8"
                                                                                                method="POST"
                                                                                                action="<?php echo e(route('contactos.storeCotizaciones')); ?>">
                                                                                                <?php echo csrf_field(); ?>
            
                                                                                                <div class="text-center">
                                                                                                    <label for="personaCandidato"
                                                                                                        class="text-center text-lg font-semibold text-custom-morado px-5">Prospecto:</label>
                                                                                                    <input type="hidden"
                                                                                                        name="personaCandidato_id"
                                                                                                        id="personaCandidato_id"
                                                                                                        value="<?php echo e($candidato->id); ?>">
                                                                                                    <input type="text"
                                                                                                        class="rounded-lg ml-2 h-8 w-3/4"
                                                                                                        name="personaCandidato"
                                                                                                        id="personaCandidato"
                                                                                                        value="<?php echo e($candidato->nombre); ?>"
                                                                                                        disabled>
                                                                                                </div>
            
                                                                                                <div class="grid grid-cols-2">
                                                                                                    <div class="text-center my-2">
                                                                                                        <label for="productoCandidato"
                                                                                                            class="text-lg text-center font-semibold text-custom-morado p-5">Producto</label>
                                                                                                        <div class="my-2">
                                                                                                            <select
                                                                                                                name="productoCandidato"
                                                                                                                id="productoCandidato"
                                                                                                                class="rounded-lg w-4/5 text-xs text-custom-morado font-semibold"
                                                                                                                onchange="establecerPrecio(this)">
                                                                                                                <option selected>
                                                                                                                    ---Selecciona una
                                                                                                                    opción---
                                                                                                                </option>
                                                                                                                <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                                    <option
                                                                                                                        value="<?php echo e($producto->id); ?>"
                                                                                                                        data-precio="<?php echo e($producto->precio); ?>">
                                                                                                                        <?php echo e($producto->producto); ?>

                                                                                                                    </option>
                                                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
            
                                                                                                    <div class="text-center my-2">
                                                                                                        <label for="precioCandidato"
                                                                                                            class="text-lg font-semibold text-center text-custom-morado">Precio</label>
                                                                                                        <div class="my-2">
                                                                                                            <div name="precioCandidato"
                                                                                                                id="precioCandidato">
                                                                                                                <i
                                                                                                                    class="text-xs">$00.00</i>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
            
                                                                                                <div class="grid grid-cols-2">
                                                                                                    <div class="text-center my-1">
                                                                                                        <label for="cantidadCandidato"
                                                                                                            class="text-base text-custom-morado">Cantidad</label>
                                                                                                        <div class="my-2">
                                                                                                            <input type="number"
                                                                                                                class="rounded-lg ml-2 h-8 w-4/5"
                                                                                                                name="cantidadCandidato"
                                                                                                                id="cantidadCandidato">
                                                                                                        </div>
                                                                                                    </div>
            
                                                                                                    <div class="text-center my-1">
                                                                                                        <label for="descuentoCandidato"
                                                                                                            class="text-base text-custom-morado">Descuento
                                                                                                            %</label>
            
                                                                                                        <div class="my-2">
                                                                                                            <input type="number"
                                                                                                                class="rounded-lg ml-2 h-8 w-4/5"
                                                                                                                name="descuentoCandidato"
                                                                                                                id="descuentoCandidato">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
            
                                                                                                <div class="my-1 p-2">
                                                                                                    <button type="button"
                                                                                                        onclick="agregarProducto()"
                                                                                                        title="Agregar Producto"
                                                                                                        class="px-2 py-2 text-xs font-medium inline-flex text-center items-center bg-custom-morado rounded-lg">
                                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                            height="2em"
                                                                                                            viewBox="0 0 512 512">
                                                                                                            <path
                                                                                                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                                                                                                        </svg>
                                                                                                    </button>
                                                                                                </div>
            
                                                                                                <div
                                                                                                    class="overflow-x-auto shadow-md sm:rounded-lg my-4">
                                                                                                    <table
                                                                                                        class="text-sm w-full text-left text-custom-linksmenu">
                                                                                                        <thead
                                                                                                            class="text-sm text-custom-linksmenu uppercase bg-custom-header my-4">
                                                                                                            <tr class="text-center">
                                                                                                                <th scope="col"
                                                                                                                    class="px-2 py-3">
                                                                                                                    Nombre
                                                                                                                </th>
                                                                                                                <th scope="col"
                                                                                                                    class="px-2 py-3">
                                                                                                                    Precio
                                                                                                                </th>
                                                                                                                <th scope="col"
                                                                                                                    class="px-2 py-3">
                                                                                                                    Cantidad
                                                                                                                </th>
                                                                                                                <th scope="col"
                                                                                                                    class="px-2 py-3">
                                                                                                                    Descuento
                                                                                                                </th>
                                                                                                                <th scope="col"
                                                                                                                    class="px-2 py-3">
                                                                                                                    Total
                                                                                                                </th>
                                                                                                                <th scope="col"
                                                                                                                    class="px-2 py-3">
            
                                                                                                                </th>
                                                                                                            </tr>
                                                                                                        </thead>
                                                                                                        <tbody id="tablaCotizacion">
                                                                                                            <tr
                                                                                                                class="bg-teal-500 hover:bg-teal-700 text-white">
                                                                                                                <td
                                                                                                                    class="text-center">
            
                                                                                                                </td>
                                                                                                                <td
                                                                                                                    class="text-center">
            
                                                                                                                </td>
                                                                                                                <td
                                                                                                                    class="text-center">
            
                                                                                                                </td>
                                                                                                                <td
                                                                                                                    class="text-center">
            
                                                                                                                </td>
                                                                                                                <td
                                                                                                                    class="text-center">
            
                                                                                                                </td>
                                                                                                                <td
                                                                                                                    class="text-center">
            
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                </div>
            
                                                                                                <div class="inline-flex">
                                                                                                    <div class="text-right">
                                                                                                        <div class="my-2">
                                                                                                            <div name="totalCandidato"
                                                                                                                id="totalCandidato">
                                                                                                                <i class="text-base">Total:
                                                                                                                    $00.00</i>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
            
                                                                                                <hr
                                                                                                    class="w-auto h-0 mx-auto my-4 bg-custom-morado customDashed">
            
                                                                                                <div class="text-center my-3">
                                                                                                    <label
                                                                                                        for="observacionesCandidato"
                                                                                                        class="text-lg font-semibold text-custom-morado px-5">Observaciones:</label>
                                                                                                    <textarea name="observacionesCandidato" id="observacionesCandidato" rows="4"
                                                                                                        class="block p-3 w-11/12 m-auto text-sm bg-white rounded-lg border-2 border-green-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
                                                                                                </div>
            
                                                                                                <div
                                                                                                    class="text-right p-2 border-y rounded-b">
                                                                                                    <button type="submit"
                                                                                                        class="text-custom-header bg-custom-morado focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2">
                                                                                                        Guardar cotización</button>
                                                                                                </div>
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
            
                                                        
            
                                                        
            
                                                        <div class="text-right">
                                                            <div class="inline-flex p-2 space-x-3">
            
                                                                
                                                                <button
                                                                    data-modal-target="enviarTarjetaPresentacion<?php echo e($candidato->id); ?>"
                                                                    data-modal-toggle="enviarTarjetaPresentacion<?php echo e($candidato->id); ?>"
                                                                    type="button" title="Envia la tarjeta de presentación"
                                                                    class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                                                                    <svg id="tarjetaPresentacion" xmlns="http://www.w3.org/2000/svg"
                                                                        height="2em" class="m-auto"
                                                                        viewBox="0 0 576 512">
                                                                        <path
                                                                            d="M512 80c8.8 0 16 7.2 16 16v32H48V96c0-8.8 7.2-16 16-16H512zm16 144V416c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V224H528zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm56 304c-13.3 0-24 10.7-24 24s10.7 24 24 24h48c13.3 0 24-10.7 24-24s-10.7-24-24-24H120zm128 0c-13.3 0-24 10.7-24 24s10.7 24 24 24H360c13.3 0 24-10.7 24-24s-10.7-24-24-24H248z" />
                                                                    </svg>
                                                                </button>
            
                                                                <div id="enviarTarjetaPresentacion<?php echo e($candidato->id); ?>"
                                                                    tabindex="-1"
                                                                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                                    <div class="relative w-full max-w-md max-h-full">
                                                                        <!-- Modal content -->
                                                                        <div class="relative bg-white rounded-lg shadow">
                                                                            <!-- Modal header -->
                                                                            <div
                                                                                class="bg-custom-morado flex items-start justify-between p-4 border-b rounded-t">
                                                                                <div class="text-xl font-semibold text-white">
                                                                                    Enviar tarjeta de presentación
                                                                                </div>
            
                                                                                <button type="button"
                                                                                    class="text-white bg-transparent hover:bg-custom-header hover:text-custom-linksmenu rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center"
                                                                                    data-modal-hide="enviarTarjetaPresentacion<?php echo e($candidato->id); ?>">
                                                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        fill="none" viewBox="0 0 14 14">
                                                                                        <path stroke="currentColor"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round" stroke-width="2"
                                                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                                    </svg>
                                                                                    <span class="sr-only">Close
                                                                                        modal</span>
                                                                                </button>
                                                                            </div>
                                                                            <!-- Modal body -->
            
                                                                            <div class="text-center my-3">
                                                                                <label for="correoCandidato"
                                                                                    class="text-lg text-center font-semibold text-custom-morado px-5">Correo
                                                                                    electrónico del contacto:</label>
                                                                                <div class="my-2">
                                                                                    <select name="correoCandidato"
                                                                                        id="correoCandidato"
                                                                                        class="rounded-lg mx-6 h-10 w-4/5 text-xs text-custom-morado font-semibold">
                                                                                        <option selected>
                                                                                            ---Selecciona una
                                                                                            opción---</option>
                                                                                        <option value="<?php echo e($candidato->correo); ?>">
                                                                                            <?php echo e($candidato->correo); ?>

                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <!-- Modal footer -->
            
                                                                            <div class="text-right">
                                                                                <div class="inline-flex p-2">
                                                                                    <button type="button"
                                                                                        title="cancelar envio de Tarjeta"
                                                                                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center bg-white rounded-lg hover:bg-white">
                                                                                        <svg class="h-6 w-6 m-auto"
                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                            viewBox="0 0 384 512">
                                                                                            <path fill="#000000"
                                                                                                d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                                                                                        </svg>
                                                                                    </button>
            
                                                                                    <button type="submit" title="enviar Tarjeta"
                                                                                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center bg-custom-morado rounded-lg hover:bg-fuchsia-800">
                                                                                        <svg class="h-6 w-6 m-auto"
                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                            viewBox="0 0 512 512">
                                                                                            <path fill="#ffffff"
                                                                                                d="M64 112c-8.8 0-16 7.2-16 16v22.1L220.5 291.7c20.7 17 50.4 17 71.1 0L464 150.1V128c0-8.8-7.2-16-16-16H64zM48 212.2V384c0 8.8 7.2 16 16 16H448c8.8 0 16-7.2 16-16V212.2L322 328.8c-38.4 31.5-93.7 31.5-132 0L48 212.2zM0 128C0 92.7 28.7 64 64 64H448c35.3 0 64 28.7 64 64V384c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128z" />
                                                                                        </svg>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
            
                                                                
            
                                                                <button data-modal-target="volverProspecto<?php echo e($candidato->id); ?>"
                                                                    data-modal-toggle="volverProspecto<?php echo e($candidato->id); ?>"
                                                                    type="button" title="Volver Prospecto"
                                                                    class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                                                                    <svg id="btnVolverProspecto" xmlns="http://www.w3.org/2000/svg"
                                                                        height="2em" class="m-auto" viewBox="0 0 512 512">
                                                                        <path
                                                                            d="M32 96l320 0V32c0-12.9 7.8-24.6 19.8-29.6s25.7-2.2 34.9 6.9l96 96c6 6 9.4 14.1 9.4 22.6s-3.4 16.6-9.4 22.6l-96 96c-9.2 9.2-22.9 11.9-34.9 6.9s-19.8-16.6-19.8-29.6V160L32 160c-17.7 0-32-14.3-32-32s14.3-32 32-32zM480 352c17.7 0 32 14.3 32 32s-14.3 32-32 32H160v64c0 12.9-7.8 24.6-19.8 29.6s-25.7 2.2-34.9-6.9l-96-96c-6-6-9.4-14.1-9.4-22.6s3.4-16.6 9.4-22.6l96-96c9.2-9.2 22.9-11.9 34.9-6.9s19.8 16.6 19.8 29.6l0 64H480z" />
                                                                    </svg>
                                                                </button>
            
                                                                <div id="volverProspecto<?php echo e($candidato->id); ?>" tabindex="-1"
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
                                                                                    data-modal-hide="volverProspecto<?php echo e($candidato->id); ?>">
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
                                                                                    class="text-center text-2xl font-bold text-custom-morado">
                                                                                    ¿Estas seguro de volver prospecto a este contacto?
                                                                                </div>
                                                                            </div>
                                                                            
            
                                                                            
                                                                            <div class="text-right">
                                                                                <div class="inline-flex">
                                                                                    <div class="m-4">
                                                                                        <button type="button" title="cancelar"
                                                                                            data-modal-hide="volverProspecto<?php echo e($candidato->id); ?>"
                                                                                            class="text-custom-header text-right bg-custom-morado focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2">
                                                                                            <svg id="btnCancelar" class="w-4 h-4"
                                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                                viewBox="0 0 384 512">
                                                                                                <path
                                                                                                    d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                                                                                            </svg>
                                                                                        </button>
                                                                                    </div>
            
                                                                                    <div class="m-4">
                                                                                        <button type="button" title="confirmar"
                                                                                            onclick="volverProspecto(<?php echo e($candidato->id); ?>)"
                                                                                            class="text-custom-header bg-custom-morado focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2">
                                                                                            <svg id="btnConfirmar" class="w-4 h-4"
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
            
                                                                
            
                                                                
            
                                                                <button data-modal-target="descartarCandidato<?php echo e($candidato->id); ?>"
                                                                    data-modal-toggle="descartarCandidato<?php echo e($candidato->id); ?>"
                                                                    type="button" title="Descartar"
                                                                    class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                                                                    <svg id="descartar" xmlns="http://www.w3.org/2000/svg"
                                                                        height="2em" class="m-auto"
                                                                        viewBox="0 0 640 512">
                                                                        <path
                                                                            d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM471 143c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                                                                    </svg>
                                                                </button>
            
                                                                <div id="descartarCandidato<?php echo e($candidato->id); ?>" tabindex="-1"
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
                                                                                    data-modal-hide="descartarCandidato<?php echo e($candidato->id); ?>">
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
                                                                                    class="text-center text-2xl font-bold text-custom-morado">
                                                                                    ¿Estas seguro de descartar a este contacto?
                                                                                </div>
                                                                            </div>
                                                                            
            
                                                                            
                                                                            <div class="text-right">
                                                                                <div class="inline-flex">
                                                                                    <div class="m-4">
                                                                                        <button type="button" title="cancelar"
                                                                                            data-modal-hide="descartarCandidato<?php echo e($candidato->id); ?>"
                                                                                            class="text-custom-header text-right bg-custom-morado focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2">
                                                                                            <svg id="btnCancelar" class="w-4 h-4"
                                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                                viewBox="0 0 384 512">
                                                                                                <path
                                                                                                    d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                                                                                            </svg>
                                                                                        </button>
                                                                                    </div>
            
                                                                                    <div class="m-4">
                                                                                        <button type="button" title="confirmar"
                                                                                            onclick="descartarCandidato(<?php echo e($candidato->id); ?>)"
                                                                                            class="text-custom-header bg-custom-morado focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2">
                                                                                            <svg id="btnConfirmar" class="w-4 h-4"
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
            
                                                                
            
                                                                
            
                                                                <button data-modal-target="editarCandidato<?php echo e($candidato->id); ?>"
                                                                    data-modal-toggle="editarCandidato<?php echo e($candidato->id); ?>"
                                                                    type="button" title="Editar"
                                                                    class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                                                                    <svg id="editar" xmlns="http://www.w3.org/2000/svg"
                                                                        height="2em" class="m-auto" viewBox="0 0 640 512">
                                                                        <path
                                                                            d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H322.8c-3.1-8.8-3.7-18.4-1.4-27.8l15-60.1c2.8-11.3 8.6-21.5 16.8-29.7l40.3-40.3c-32.1-31-75.7-50.1-123.9-50.1H178.3zm435.5-68.3c-15.6-15.6-40.9-15.6-56.6 0l-29.4 29.4 71 71 29.4-29.4c15.6-15.6 15.6-40.9 0-56.6l-14.4-14.4zM375.9 417c-4.1 4.1-7 9.2-8.4 14.9l-15 60.1c-1.4 5.5 .2 11.2 4.2 15.2s9.7 5.6 15.2 4.2l60.1-15c5.6-1.4 10.8-4.3 14.9-8.4L576.1 358.7l-71-71L375.9 417z" />
                                                                    </svg>
                                                                </button>
            
                                                                <div id="editarCandidato<?php echo e($candidato->id); ?>" tabindex="-1"
                                                                    aria-hidden="true"
                                                                    class="fixed z-50 hidden w-full p-6 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                                    <div class="relative w-full max-w-2xl max-h-full">
                                                                        <div class="relative bg-white rounded-lg shadow">
                                                                            
                                                                            <div
                                                                                class="bg-custom-morado flex items-start justify-between p-4 border-b rounded-t">
                                                                                <div
                                                                                    class="text-3xl text-start font-semibold text-white">
                                                                                    Editar Candidato <br>
                                                                                    <?php echo e($candidato->funeraria); ?> -
                                                                                    <?php echo e($candidato->nombre); ?>

                                                                                </div>
            
                                                                                <button type="button"
                                                                                    class="text-white bg-transparent hover:bg-custom-header hover:text-custom-linksmenu rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center"
                                                                                    data-modal-hide="editarCandidato<?php echo e($candidato->id); ?>">
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
            
                                                                            
            
                                                                            
            
                                                                            <form
                                                                                action="<?php echo e(route('contactos.updateCandidato', $candidato->id)); ?>"
                                                                                method="POST">
                                                                                <?php echo csrf_field(); ?>
                                                                                <?php echo method_field('put'); ?>
            
                                                                                <div class="grid grid-cols-3 gap-4 px-4">
                                                                                    <div class="text-center my-3">
                                                                                        <label for="funeraria"
                                                                                            class="text-base text-custom-morado">Funeraria:</label>
                                                                                        <input type="text"
                                                                                            class="rounded-lg text-custom-morado ml-2 w-full"
                                                                                            name="funeraria" id="funeraria"
                                                                                            value=<?php echo e($candidato->funeraria); ?>>
                                                                                    </div>
            
                                                                                    <div class="text-center my-3">
                                                                                        <label for="nombreCandidato"
                                                                                            class="text-base text-custom-morado">Nombre:</label>
                                                                                        <input type="text"
                                                                                            class="rounded-lg text-custom-morado ml-2 w-full"
                                                                                            name="nombreContacto"
                                                                                            id="nombreContacto"
                                                                                            value=<?php echo e($candidato->nombre); ?>>
                                                                                    </div>
            
                                                                                    <div class="text-center my-3">
                                                                                        <label for="tipo"
                                                                                            class="text-base text-custom-morado">Tipo:</label>
            
                                                                                        <select name="tipoContacto" id="tipoContacto"
                                                                                            class="rounded-lg ml-2 h-10 w-full text-xs text-custom-morado">
                                                                                            <option value="">---Selecciona una
                                                                                                opción---</option>
                                                                                            <?php $__currentLoopData = $tiposContacto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                <option value="<?php echo e($tipo); ?>"
                                                                                                    <?php if($tipo == $candidato->tipo): ?> selected <?php endif; ?>>
                                                                                                    <?php echo e($tipo); ?>

                                                                                                </option>
                                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
            
                                                                                <hr
                                                                                    class="w-auto h-0 mx-auto my-4 bg-custom-morado customDashed">
            
                                                                                <div class="grid grid-cols-3 gap-4 px-4">
            
                                                                                    <div class="text-center my-3">
                                                                                        <label for="correo"
                                                                                            class="text-base text-custom-morado">Correo:</label>
                                                                                        <input type="email"
                                                                                            class="rounded-lg text-custom-morado ml-2 w-full"
                                                                                            name="correo" id="correo"
                                                                                            value=<?php echo e($candidato->correo); ?>>
                                                                                    </div>
            
                                                                                    <div class="text-center my-3">
                                                                                        <label for="telefono"
                                                                                            class="text-base text-custom-morado">Teléfono:</label>
                                                                                        <input type="tel"
                                                                                            class="rounded-lg text-custom-morado ml-2 w-full"
                                                                                            name="telefono" id="telefono"
                                                                                            value=<?php echo e($candidato->telefono); ?>>
                                                                                    </div>
            
                                                                                    <div class="text-center my-3">
                                                                                        <label for="celular"
                                                                                            class="text-base text-custom-morado">Celular:</label>
                                                                                        <input type="tel"
                                                                                            class="rounded-lg text-custom-morado ml-2 w-full"
                                                                                            name="celular" id="celular"
                                                                                            value=<?php echo e($candidato->celular); ?>>
                                                                                    </div>
                                                                                </div>
            
                                                                                <hr
                                                                                    class="w-auto h-0 mx-auto my-4 bg-custom-morado customDashed">
            
                                                                                <div class="grid grid-cols-3 gap-4 px-4 my-4">
            
                                                                                    <div class="text-center">
                                                                                        <label for="referenciado"
                                                                                            class="text-base text-custom-morado">Referenciado:</label>
                                                                                        <select name="referenciado"
                                                                                            id="referenciado"
                                                                                            class="rounded-lg ml-2 h-10 w-full text-xs text-custom-morado">
                                                                                            <option value="">---Selecciona una
                                                                                                opción---</option>
                                                                                            <?php $__currentLoopData = $contactos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contacto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                <option
                                                                                                    value="<?php echo e($contacto->referenciado); ?>"
                                                                                                    <?php if($contacto->referenciado == $candidato->referenciado): ?> selected <?php endif; ?>>
                                                                                                    <?php echo e($contacto->referenciado); ?>

                                                                                                </option>
                                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                        </select>
                                                                                    </div>
            
                                                                                    <div class="text-center">
                                                                                        <label for="origen"
                                                                                            class="text-base text-custom-morado">Origen:</label>
                                                                                        <select name="origen" id="origen"
                                                                                            class="rounded-lg ml-2 h-10 w-full text-xs text-custom-morado">
                                                                                            <option value="">---Selecciona una
                                                                                                opción---</option>
                                                                                            <?php $__currentLoopData = $origenContacto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $origen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                <option value="<?php echo e($origen); ?>"
                                                                                                    <?php if($origen == $candidato->origen): ?> selected <?php endif; ?>>
                                                                                                    <?php echo e($origen); ?>

                                                                                                </option>
                                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                        </select>
                                                                                    </div>
            
                                                                                    <div class="text-center">
                                                                                        <label for="fechaNacimiento"
                                                                                            class="text-base text-custom-morado">Fecha
                                                                                            de
                                                                                            nacimiento:</label>
                                                                                        <input type="date" name="fechaNacimiento"
                                                                                            id="fechaNacimiento"
                                                                                            class="rounded-lg ml-2 h-10 w-full text-xs text-custom-morado"
                                                                                            value=<?php echo e($candidato->fechaNacimiento); ?>>
                                                                                    </div>
                                                                                </div>
            
                                                                                <div class="grid grid-cols-2 gap-6 px-4 my-4">
                                                                                    <div class="text-center">
                                                                                        <label for="fechaIngreso"
                                                                                            class="text-base text-custom-morado">Fecha
                                                                                            de
                                                                                            Ingreso:</label>
                                                                                        <input type="date" name="fechaIngreso"
                                                                                            id="fechaIngreso"
                                                                                            class="rounded-lg ml-2 h-10 w-full text-xs text-custom-morado"
                                                                                            value=<?php echo e($candidato->fechaIngreso); ?>>
                                                                                    </div>
                                                                                    <div class="text-center">
                                                                                        <label for="vigencia"
                                                                                            class="text-base text-custom-morado">Vigencia:</label>
                                                                                        <input type="date" name="vigencia"
                                                                                            id="vigencia"
                                                                                            class="rounded-lg ml-2 h-10 w-full text-xs text-custom-morado"
                                                                                            value=<?php echo e($candidato->vigencia); ?>>
                                                                                    </div>
                                                                                </div>
            
                                                                                <div class="grid grid-cols-3 gap-4 px-4 my-4">
            
                                                                                    <div class="text-center">
                                                                                        <label for="profesion"
                                                                                            class="text-base text-custom-morado">Profesion:</label>
                                                                                        <input type="text"
                                                                                            class="rounded-lg text-custom-morado ml-2 w-full"
                                                                                            name="profesion" id="profesion"
                                                                                            value=<?php echo e($candidato->profesion); ?>>
                                                                                    </div>
            
                                                                                    <div class="text-center">
                                                                                        <label for="empresa"
                                                                                            class="text-base text-custom-morado">Empresa:</label>
            
                                                                                        <div class="flex items-center">
                                                                                            <select name="empresas" id="empresas"
                                                                                                class="rounded-lg ml-2 h-10 w-full text-xs text-custom-morado">
                                                                                                <option value="">---Selecciona
                                                                                                    una opción---</option>
                                                                                                <?php $__currentLoopData = $empresas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $empresa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                    <option
                                                                                                        value="<?php echo e($empresa->id); ?>"
                                                                                                        <?php if($empresa->id == $candidato->empresas_id): ?> selected <?php endif; ?>>
                                                                                                        <?php echo e($empresa->nombreEmpresa); ?>

                                                                                                    </option>
                                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
            
                                                                                    <div class="text-center">
                                                                                        <label for="ingresos"
                                                                                            class="text-base text-custom-morado">Ingresos:</label>
                                                                                        <input type="number" name="ingresos"
                                                                                            id="ingresos"
                                                                                            class="rounded-lg ml-2 mt-1 w-full text-xs text-custom-morado"
                                                                                            value=<?php echo e($candidato->ingresos); ?>>
                                                                                    </div>
            
                                                                                </div>
            
                                                                                <div class="grid grid-cols-3 gap-4 px-4 my-4">
            
                                                                                    <div class="text-center">
                                                                                        <label for="calle"
                                                                                            class="text-base text-custom-morado">Calle:</label>
                                                                                        <input type="text"
                                                                                            class="rounded-lg text-custom-morado ml-2 w-full"
                                                                                            name="calle" id="calle"
                                                                                            value=<?php echo e($candidato->calle); ?>>
                                                                                    </div>
            
                                                                                    <div class="text-center">
                                                                                        <label for="noExterior"
                                                                                            class="text-base text-custom-morado">No.
                                                                                            Exterior:</label>
                                                                                        <input type="text"
                                                                                            class="rounded-lg text-custom-morado ml-2 w-full"
                                                                                            name="noExterior" id="noExterior"
                                                                                            value=<?php echo e($candidato->noExterior); ?>>
                                                                                    </div>
            
                                                                                    <div class="text-center">
                                                                                        <label for="noInterior"
                                                                                            class="text-base text-custom-morado">No.
                                                                                            Interior:</label>
                                                                                        <input type="text"
                                                                                            class="rounded-lg text-custom-morado ml-2 w-full"
                                                                                            name="noInterior" id="noInterior"
                                                                                            value=<?php echo e($candidato->noInterior); ?>>
                                                                                    </div>
            
                                                                                </div>
            
                                                                                <div class="grid grid-cols-3 gap-4 px-4 my-4">
            
                                                                                    <div class="text-center">
                                                                                        <label for="colonias_id"
                                                                                            class="text-base text-custom-morado">Colonia:</label>
                                                                                        <div class="flex items-center">
                                                                                            <select name="colonias_id"
                                                                                                id="colonia"
                                                                                                class="rounded-lg ml-2 h-10 w-full text-xs text-custom-morado">
                                                                                                <option value="">---Selecciona
                                                                                                    una opción---</option>
                                                                                                <?php $__currentLoopData = $colonias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $colonia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                    <option
                                                                                                        value="<?php echo e($colonia->id); ?>"
                                                                                                        <?php if($colonia->id == $candidato->colonias_id): ?> selected <?php endif; ?>>
                                                                                                        <?php echo e($colonia->colonia); ?>

                                                                                                    </option>
                                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
            
                                                                                    <div class="text-center">
                                                                                        <label for="localidad"
                                                                                            class="text-base text-custom-morado">Localidad:</label>
                                                                                        <input type="text"
                                                                                            class="rounded-lg text-custom-morado ml-2 w-full"
                                                                                            name="localidad" id="localidad"
                                                                                            value=<?php echo e($candidato->localidad); ?>>
                                                                                    </div>
            
                                                                                    <div class="text-center">
                                                                                        <label for="municipio"
                                                                                            class="text-base text-custom-morado">Municipio:</label>
                                                                                        <input type="text"
                                                                                            class="rounded-lg text-custom-morado ml-2 w-full"
                                                                                            name="municipio" id="municipio"
                                                                                            value=<?php echo e($candidato->municipio); ?>>
                                                                                    </div>
            
                                                                                </div>
            
                                                                                <div class="grid grid-cols-3 gap-4 px-4 my-4">
            
                                                                                    <div class="text-center">
                                                                                        <label for="estado"
                                                                                            class="text-base text-custom-morado">Estado:</label>
                                                                                        <input type="text"
                                                                                            class="rounded-lg text-custom-morado ml-2 w-full"
                                                                                            name="estado" id="estado"
                                                                                            value=<?php echo e($candidato->estado); ?>>
                                                                                    </div>
            
                                                                                    <div class="text-center">
                                                                                        <label for="pais"
                                                                                            class="text-base text-custom-morado">Pais:</label>
                                                                                        <input type="text"
                                                                                            class="rounded-lg text-custom-morado ml-2 w-full"
                                                                                            name="pais" id="pais"
                                                                                            value=<?php echo e($candidato->pais); ?>>
                                                                                    </div>
            
                                                                                    <div class="text-center">
                                                                                        <label for="codigoP"
                                                                                            class="text-base text-custom-morado">C.P.:</label>
                                                                                        <input type="number" name="codPostal"
                                                                                            id="codPostal"
                                                                                            class="rounded-lg ml-2 mt-1 w-full text-xs text-custom-morado"
                                                                                            value=<?php echo e($candidato->codPostal); ?>>
                                                                                    </div>
                                                                                </div>
            
                                                                                <div class="text-start ms-5">
                                                                                    <label for="usuarios"
                                                                                        class="text-base text-custom-morado">Usuario
                                                                                        al que se le
                                                                                        asignara:</label>
                                                                                    <select name="usuarios" id="usuarios"
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
            
                                                                                <hr
                                                                                    class="w-auto h-0 mx-auto my-4 bg-custom-morado customDashed">
            
                                                                                <label for="Observaciones"
                                                                                    class="block text-start ml-4 my-2 text-base text-custom-morado">Observaciones:</label>
                                                                                <textarea name="observaciones" id="message" rows="4"
                                                                                    class="block p-3 w-4/5 m-auto text-sm bg-white rounded-lg text-custom-morado border-2 border-green-300 focus:ring-blue-500 focus:border-blue-500"><?php echo e($candidato->observaciones); ?></textarea>
            
                                                                                <div class="text-right p-2 border-y rounded-b">
                                                                                    <button
                                                                                        data-modal-hide="editarCandidato<?php echo e($candidato->id); ?>"
                                                                                        type="submit"
                                                                                        class="text-custom-header bg-custom-morado focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2">
                                                                                        Actualizar contacto</button>
                                                                                </div>
                                                                            </form>
            
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
            
                                                                
            
                                                                
            
                                                                <form action="<?php echo e(route('contactos.destroyCandidato', $candidato->id)); ?>"
                                                                    method="POST">
                                                                    <?php echo csrf_field(); ?>
                                                                    <?php echo method_field('delete'); ?>
            
                                                                    <button type="submit" title="Eliminar candidato"
                                                                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                                                                        <svg id="eliminar" xmlns="http://www.w3.org/2000/svg"
                                                                            height="2em" class="m-auto"
                                                                            viewBox="0 0 448 512">
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
                            <thead class="text-sm text-custom-linksmenu uppercase bg-purple-300 border-b-2 border-custom-morado my-4">
                                <tr class="text-center">
                                    <th scope="col" class="px-4 py-3">
                                        Funeraria
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Nombre
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Telefono
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Email
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Antigüedad
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Citas
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Tipo
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Detalles
                                    </th>
                                </tr>
                            </thead>
                            <?php $__currentLoopData = $detalleProspectos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prospecto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tbody>
                                    <tr class="bg-green-500 hover:bg-green-700 text-white">
                                        <td class="text-center">
                                            <?php echo e($prospecto->funeraria); ?>

                                        </td>
                                        <td class="text-center">
                                            <?php echo e($prospecto->nombre); ?>

                                        </td>
                                        <td class="text-center">
                                            <?php echo e($prospecto->telefono); ?>

                                        </td>
                                        <td class="text-center">
                                            <?php echo e($prospecto->correo); ?>

                                        </td>
                                        <td class="text-center">
                                            <?php echo e($antiguedadProspectos[$loop->index]->diasDesdeIngreso); ?>

                                        </td>
                                        <td class="text-center">
                                            <?php echo e($citasPorProspectos[$loop->index]->noCitas); ?>

                                        </td>
                                        <td class="text-center">
                                            Prospecto
                                        </td>
                                        <td>
                                            <div class="flex justify-center items-center">
                                                <!-- Modal toggle -->
                                                <button data-modal-target="detalleProspecto<?php echo e($prospecto->id); ?>"
                                                    data-modal-toggle="detalleProspecto<?php echo e($prospecto->id); ?>"
                                                    class="my-2 text-white bg-green-700 hover:bg-green-900 rounded-lg text-center px-2 py-2"
                                                    type="button">
                                                    <svg class="w-6 h-6 text-white" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                                    </svg>
                                                </button>
                                            </div>
            
                                            <!-- Modal Detalles -->
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
                                                                    <div class="inline-flex my-5 px-2 text-sm text-custom-morado">
                                                                        <div>
                                                                            <strong>Funeraria: </strong> <?php echo e($prospecto->funeraria); ?>

                                                                        </div>
                                                                        <div class="px-3">
                                                                            <strong>Nombre: </strong> <?php echo e($prospecto->nombre); ?>

                                                                        </div>
                                                                    </div>
            
                                                                    <div
                                                                        class="grid grid-cols-3 gap-4 px-2 text-custom-morado text-sm">
                                                                        <div>
                                                                            <strong>Antiguedad: </strong>
                                                                            <?php echo e($antiguedadProspectos[$loop->index]->diasDesdeIngreso); ?>

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
                                                                            <strong>Profesión: </strong> <?php echo e($prospecto->profesion); ?>

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
                                                                            <strong>Localidad: </strong> <?php echo e($prospecto->localidad); ?>

                                                                        </div>
                                                                        <div class="px-3">
                                                                            <strong>Municipio: </strong> <?php echo e($prospecto->municipio); ?>

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
                                                                        <?php echo e($citasPorProspectos[$loop->index]->noCitas); ?>/<?php echo e($numeroCitasProspectos); ?>

                                                                        citas realizadas
                                                                    </div>
            
                                                                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                                                        <table
                                                                            class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                                            <thead
                                                                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                                                <tr>
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
                                                                                <tbody>
                                                                                    <tr class="bg-white border-b">
                                                                                        <td class="px-6 py-4">
                                                                                            <?php echo e($cita->fecha); ?>

                                                                                        </td>
                                                                                        <td class="px-6 py-4">
                                                                                            <?php echo e($cita->horaInicio); ?>

                                                                                        </td>
                                                                                        <td class="px-6 py-4">
                                                                                            <?php echo e($cita->duracion); ?> minutos
                                                                                        </td>
                                                                                        <td class="px-6 py-4">
                                                                                            <?php echo e($cita->estado); ?>

                                                                                        </td>
                                                                                        <td class="px-6 py-4">
                                                                                            <?php echo e($cita->comentarios); ?>

                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </table>
            
                                                                        <div class="text-right">
                                                                            <div class="inline-flex p-3">
                                                                                <button data-modal-target="defaultModal"
                                                                                    data-modal-toggle="registrarCitaProspecto<?php echo e($prospecto->id); ?>"
                                                                                    class="block mt-4 ml-2 text-white bg-custom-morado hover:bg-fuchsia-600 rounded-lg text-center px-2 py-2"
                                                                                    type="button">
                                                                                    <svg class="w-6 h-6 text-white"
                                                                                        aria-hidden="true"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        fill="none" viewBox="0 0 20 18">
                                                                                        <path stroke="currentColor"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round" stroke-width="2"
                                                                                            d="M13 8h6m-3 3V5m-6-.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0ZM5 11h3a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z" />
                                                                                    </svg>
                                                                                </button>
            
                                                                                <div id="registrarCitaProspecto<?php echo e($prospecto->id); ?>"
                                                                                    tabindex="-1"
                                                                                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                                                    <div class="relative w-full max-w-md max-h-full">
                                                                                        <!-- Modal content -->
                                                                                        <div
                                                                                            class="relative bg-white rounded-lg shadow">
                                                                                            <!-- Modal header -->
                                                                                            <div
                                                                                                class="bg-custom-morado flex items-start justify-between p-4 border-b rounded-t">
                                                                                                <div
                                                                                                    class="text-xl font-semibold text-white">
                                                                                                    Registro de Cita
                                                                                                </div>
            
                                                                                                <button type="button"
                                                                                                    class="text-white bg-transparent hover:bg-custom-header hover:text-custom-linksmenu rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center"
                                                                                                    data-modal-hide="registrarCitaProspecto<?php echo e($prospecto->id); ?>">
                                                                                                    <svg class="w-3 h-3"
                                                                                                        aria-hidden="true"
                                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                                        fill="none"
                                                                                                        viewBox="0 0 14 14">
                                                                                                        <path stroke="currentColor"
                                                                                                            stroke-linecap="round"
                                                                                                            stroke-linejoin="round"
                                                                                                            stroke-width="2"
                                                                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                                                    </svg>
                                                                                                    <span class="sr-only">Close
                                                                                                        modal</span>
                                                                                                </button>
                                                                                            </div>
                                                                                            <!-- Modal body -->
                                                                                            <form accept-charset="utf-8"
                                                                                                method="POST"
                                                                                                action="<?php echo e(route('contactos.storeCitas')); ?>">
                                                                                                <?php echo csrf_field(); ?>
            
                                                                                                <div class="text-center">
                                                                                                    <label for="persona"
                                                                                                        class="text-center text-lg font-semibold text-custom-morado px-5">Persona:</label>
                                                                                                    <input type="hidden"
                                                                                                        name="persona_id"
                                                                                                        id="persona_id"
                                                                                                        value="<?php echo e($prospecto->id); ?>">
                                                                                                    <input type="text"
                                                                                                        class="rounded-lg ml-2 h-8 w-3/4"
                                                                                                        name="persona"
                                                                                                        id="persona"
                                                                                                        value="<?php echo e($prospecto->nombre); ?>"
                                                                                                        disabled>
                                                                                                </div>
            
                                                                                                <div class="text-center my-3">
                                                                                                    <label for="tipoCita"
                                                                                                        class="text-lg text-center font-semibold text-custom-morado p-5">Tipo:</label>
                                                                                                    <div class="my-2">
                                                                                                        <select name="tipoCita"
                                                                                                            id="tipoCita"
                                                                                                            class="rounded-lg w-4/5 text-xs text-custom-morado font-semibold">
                                                                                                            <option selected>
                                                                                                                ---Selecciona una
                                                                                                                opción---</option>
                                                                                                            <?php $__currentLoopData = $tiposdeCita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tCita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                                <option
                                                                                                                    value="<?php echo e($tCita); ?>">
                                                                                                                    <?php echo e($tCita); ?>

                                                                                                                </option>
                                                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
            
                                                                                                <div class="text-center my-3">
                                                                                                    <label for="fecha"
                                                                                                        class="text-lg text-center font-semibold text-custom-morado px-5">Fecha:</label>
                                                                                                    <div class="my-2">
                                                                                                        <input type="date"
                                                                                                            name="fecha"
                                                                                                            id="fecha"
                                                                                                            class="rounded-lg w-4/5 text-sm text-custom-morado">
                                                                                                    </div>
                                                                                                </div>
            
                                                                                                <div class="text-center my-3">
                                                                                                    <label for="horaInicio"
                                                                                                        class="text-lg text-center font-semibold text-custom-morado px-5">Hora
                                                                                                        Inicio:</label>
                                                                                                    <div class="my-2">
                                                                                                        <input type="time"
                                                                                                            name="horaInicio"
                                                                                                            id="horaInicio"
                                                                                                            class="rounded-lg w-4/5">
                                                                                                    </div>
                                                                                                </div>
            
                                                                                                <div class="text-center my-3">
                                                                                                    <label for="horaFinal"
                                                                                                        class="text-lg font-semibold text-custom-morado text-center px-5">Hora
                                                                                                        Final:</label>
                                                                                                    <div class="my-2">
                                                                                                        <input type="time"
                                                                                                            name="horaFinal"
                                                                                                            id="horaFinal"
                                                                                                            class="rounded-lg w-4/5">
                                                                                                    </div>
                                                                                                </div>
            
                                                                                                <div class="text-center my-3">
                                                                                                    <label for="lugar"
                                                                                                        class="text-lg text-center font-semibold text-custom-morado px-5">Lugar:</label>
                                                                                                    <div class="my-2">
                                                                                                        <select name="lugar"
                                                                                                            id="lugar"
                                                                                                            class="rounded-lg mx-6 h-10 w-4/5 text-xs text-custom-morado font-semibold">
                                                                                                            <option selected>
                                                                                                                ---Selecciona una
                                                                                                                opción---</option>
                                                                                                            <?php $__currentLoopData = $lugarCita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lugar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                                <option
                                                                                                                    value="<?php echo e($lugar); ?>">
                                                                                                                    <?php echo e($lugar); ?>

                                                                                                                </option>
                                                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
            
                                                                                                <div class="text-center my-3">
                                                                                                    <label for="comentarios"
                                                                                                        class="text-lg font-semibold text-custom-morado px-5">Comentarios:</label>
                                                                                                    <textarea name="comentarios" id="comentarios" rows="4"
                                                                                                        class="block p-3 w-11/12 m-auto text-sm bg-white rounded-lg border-2 border-green-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
                                                                                                </div>
            
            
                                                                                                <div class="text-right">
                                                                                                    <div class="inline-flex p-2">
                                                                                                        <button type="submit"
                                                                                                            title="Registrar cita"
                                                                                                            class="text-custom-header bg-custom-morado focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2">
                                                                                                            <svg class="w-4 h-4"
                                                                                                                aria-hidden="true"
                                                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                                                fill="none"
                                                                                                                viewBox="0 0 18 18">
                                                                                                                <path
                                                                                                                    stroke="currentColor"
                                                                                                                    stroke-linecap="round"
                                                                                                                    stroke-linejoin="round"
                                                                                                                    stroke-width="2"
                                                                                                                    d="M9 1v16M1 9h16" />
                                                                                                            </svg>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
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
                                                                                    class="ml-2 text-sm font-medium text-gray-900">6 X
                                                                                    15</label>
                                                                            </div>
                                                                            <div class="flex justify-center items-center">
                                                                                <input id="default-checkbox" type="checkbox"
                                                                                    value=""
                                                                                    class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                <label for="default-checkbox"
                                                                                    class="ml-2 text-sm font-medium text-gray-900">6 X
                                                                                    6</label>
                                                                            </div>
                                                                            <div class="flex justify-center items-center">
                                                                                <input id="default-checkbox" type="checkbox"
                                                                                    value=""
                                                                                    class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                <label for="default-checkbox"
                                                                                    class="ml-2 text-sm font-medium text-gray-900">3 X
                                                                                    9</label>
                                                                            </div>
                                                                            <div class="flex justify-center items-center">
                                                                                <input id="default-checkbox" type="checkbox"
                                                                                    value=""
                                                                                    class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                <label for="default-checkbox"
                                                                                    class="ml-2 text-sm font-medium text-gray-900">3 X
                                                                                    6</label>
                                                                            </div>
                                                                            <div class="flex justify-center items-center">
                                                                                <input id="default-checkbox" type="checkbox"
                                                                                    value=""
                                                                                    class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                <label for="default-checkbox"
                                                                                    class="ml-2 text-sm font-medium text-gray-900">3 X
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
            
                                                                    <div class="text-right py-2">
                                                                        <button type="button" title="Guardar"
                                                                            class="px-3 py-2 text-xs font-medium text-center inline-flex items-center bg-custom-morado rounded-lg">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" height="2em"
                                                                                class="m-auto"
                                                                                viewBox="0 0 512 512">
                                                                                <style>
                                                                                    svg {
                                                                                        fill: #ffffff
                                                                                    }
                                                                                </style>
                                                                                <path
                                                                                    d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z" />
                                                                            </svg>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <div id="cotizaciones <?php echo e($prospecto->id); ?>"
                                                                    class="tab-content hidden text-black">
            
                                                                    <div class="overflow-x-auto shadow-md sm:rounded-lg my-4">
            
                                                                        <table class="text-sm w-full text-left text-custom-linksmenu">
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
                                                                                <?php $__currentLoopData = $cotizacionesProspectos[$prospecto->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cotizacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <tbody>
                                                                                        <td class="px-6 py-4 text-center"><?php echo e($cotizacion->id); ?>

                                                                                        </td>
                                                                                        <td class="px-6 py-4 text-center"><?php echo e($cotizacion->fecha); ?></td>
                                                                                        <td class="px-6 py-4 text-center"><?php echo e($cotizacion->total); ?></td>
                                                                                        <td class="px-6 py-4 text-center"><?php echo e($cotizacion->estado); ?>

                                                                                        </td>
                                                                                        <td>
                                                                                            <button type="button" title="Ver cotización"
                                                                                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center bg-custom-morado rounded-lg">
                                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                    class="m-auto" height="2em"
                                                                                                    viewBox="0 0 448 512">
                                                                                                    <path
                                                                                                        d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z" />
                                                                                                </svg>
                                                                                            </button>
                                                                                        </td>
                                                                                    </tbody>
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
            
                                                                    <div class="text-right">
                                                                        <div class="inline-flex">
                                                                            <button data-modal-target="default-modal"
                                                                                data-modal-toggle="agregarCotizacionProspecto<?php echo e($prospecto->id); ?>"
                                                                                class="block mt-4 ml-2 text-white bg-custom-morado hover:bg-fuchsia-600 rounded-lg text-center px-3 py-2"
                                                                                type="button">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    height="2em" class="m-auto"
                                                                                    viewBox="0 0 512 512">
                                                                                    <path
                                                                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                                                                                </svg>
                                                                            </button>
            
                                                                            <div id="agregarCotizacionProspecto<?php echo e($prospecto->id); ?>"
                                                                                tabindex="-1"
                                                                                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                                                <div class="relative w-full max-w-md max-h-full">
                                                                                    <!-- Modal content -->
                                                                                    <div class="relative bg-white rounded-lg shadow">
                                                                                        <!-- Modal header -->
                                                                                        <div
                                                                                            class="bg-custom-morado flex items-start justify-between p-4 border-b rounded-t">
                                                                                            <div
                                                                                                class="text-xl font-semibold text-white">
                                                                                                Agregar Cotización
                                                                                            </div>
            
                                                                                            <button type="button"
                                                                                                class="text-white bg-transparent hover:bg-custom-header hover:text-custom-linksmenu rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center"
                                                                                                data-modal-hide="agregarCotizacionProspecto<?php echo e($prospecto->id); ?>">
                                                                                                <svg class="w-3 h-3"
                                                                                                    aria-hidden="true"
                                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                                    fill="none"
                                                                                                    viewBox="0 0 14 14">
                                                                                                    <path stroke="currentColor"
                                                                                                        stroke-linecap="round"
                                                                                                        stroke-linejoin="round"
                                                                                                        stroke-width="2"
                                                                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                                                </svg>
                                                                                                <span class="sr-only">Close
                                                                                                    modal</span>
                                                                                            </button>
                                                                                        </div>
                                                                                        <!-- Modal body -->
            
                                                                                        
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
            
                                                                <div id="ventas <?php echo e($prospecto->id); ?>"
                                                                    class="tab-content hidden text-black">
                                                                    <div class="overflow-x-auto shadow-md sm:rounded-lg my-4">
                                                                        <table class="text-sm w-full text-left text-custom-linksmenu">
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
            
                                                                            <?php $__currentLoopData = $ventasProspectos[$prospecto->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $venta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <tbody>
                                                                                    <td class="px-6 py-4"><?php echo e($venta->referencia); ?>

                                                                                    </td>
                                                                                    <td class="px-6 py-4"<?php echo e($venta->fecha); ?></td>
                                                                                    <td class="px-6 py-4"><?php echo e($venta->total); ?></td>
                                                                                    <td class="px-6 py-4">
                                                                                        <?php echo e($venta->observaciones); ?></td>
                                                                                    <td class="px-6 py-4"><?php echo e($venta->name); ?></td>
                                                                                </tbody>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </table>
            
                                                                        <div class="text-right">
                                                                            <div class="inline-flex">
                                                                                <button data-modal-target="default-modal"
                                                                                    data-modal-toggle="agregarVentaProspecto<?php echo e($prospecto->id); ?>"
                                                                                    class="block mt-4 ml-2 text-white bg-custom-morado hover:bg-fuchsia-600 rounded-lg text-center px-3 py-2"
                                                                                    type="button">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        height="2em" class="m-auto"
                                                                                        viewBox="0 0 512 512">
                                                                                        <path
                                                                                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                                                                                    </svg>
                                                                                </button>
            
                                                                                <div id="agregarVentaProspecto<?php echo e($prospecto->id); ?>"
                                                                                    tabindex="-1"
                                                                                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                                                    <div class="relative w-full max-w-md max-h-full">
                                                                                        <!-- Modal content -->
                                                                                        <div
                                                                                            class="relative bg-white rounded-lg shadow">
                                                                                            <!-- Modal header -->
                                                                                            <div
                                                                                                class="bg-custom-morado flex items-start justify-between p-4 border-b rounded-t">
                                                                                                <div
                                                                                                    class="text-xl font-semibold text-white text-left">
                                                                                                    Detalles de Venta <br>
                                                                                                    <?php echo e($prospecto->funeraria); ?> -
                                                                                                    <?php echo e($prospecto->nombre); ?>

                                                                                                </div>
            
                                                                                                <button type="button"
                                                                                                    class="text-white bg-transparent hover:bg-custom-header hover:text-custom-linksmenu rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center"
                                                                                                    data-modal-hide="agregarVentaProspecto<?php echo e($prospecto->id); ?>">
                                                                                                    <svg class="w-3 h-3"
                                                                                                        aria-hidden="true"
                                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                                        fill="none"
                                                                                                        viewBox="0 0 14 14">
                                                                                                        <path stroke="currentColor"
                                                                                                            stroke-linecap="round"
                                                                                                            stroke-linejoin="round"
                                                                                                            stroke-width="2"
                                                                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                                                    </svg>
                                                                                                    <span class="sr-only">Close
                                                                                                        modal</span>
                                                                                                </button>
                                                                                            </div>
                                                                                            <!-- Modal body -->
            
                                                                                            <form accept-charset="utf-8"
                                                                                                method="POST"
                                                                                                action="<?php echo e(route('contactos.storeCotizaciones')); ?>">
                                                                                                <?php echo csrf_field(); ?>
            
                                                                                                <div class="text-center">
                                                                                                    <label for="referencia"
                                                                                                        class="text-center text-lg font-semibold text-custom-morado px-5">Referencia:</label>
                                                                                                    <input type="text"
                                                                                                        class="rounded-lg ml-2 h-8 w-3/4"
                                                                                                        name="referencia"
                                                                                                        id="referencia">
                                                                                                </div>
            
                                                                                                <div class="text-center my-3">
                                                                                                    <label for="fechaVenta"
                                                                                                        class="text-lg text-center font-semibold text-custom-morado px-5">Fecha:</label>
                                                                                                    <div class="my-2">
                                                                                                        <input type="date"
                                                                                                            name="fechaVenta"
                                                                                                            id="fechaVenta"
                                                                                                            class="rounded-lg w-4/5 text-sm text-custom-morado">
                                                                                                    </div>
                                                                                                </div>
            
                                                                                                <div class="text-center my-3">
                                                                                                    <label for="productoVenta"
                                                                                                        class="text-lg text-center font-semibold text-custom-morado p-5">Producto</label>
                                                                                                    <div class="my-2">
                                                                                                        <select name="productoVenta"
                                                                                                            id="productoVenta"
                                                                                                            class="rounded-lg w-4/5 text-xs text-custom-morado font-semibold">
                                                                                                            <option selected>
                                                                                                                ---Selecciona una
                                                                                                                opción---
                                                                                                            </option>
                                                                                                            <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                                <option
                                                                                                                    value="<?php echo e($producto->producto); ?>">
                                                                                                                    <?php echo e($producto->producto); ?>

                                                                                                                </option>
                                                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
            
                                                                                                <div class="text-center my-3">
                                                                                                    <label for="totalVenta"
                                                                                                        class="text-base text-custom-morado">Total
                                                                                                        de venta</label>
                                                                                                    <div class="my-2">
                                                                                                        <input type="number"
                                                                                                            class="rounded-lg ml-2 h-8 w-4/5"
                                                                                                            name="totalVenta"
                                                                                                            id="totalVenta">
                                                                                                    </div>
                                                                                                </div>
            
                                                                                                <div class="text-center my-3">
                                                                                                    <label for="Observaciones"
                                                                                                        class="block ml-4 my-2 text-base text-custom-morado">Observaciones:</label>
                                                                                                    <textarea name="observaciones" id="message" rows="4"
                                                                                                        class="block p-3 w-4/5 m-auto text-sm bg-white rounded-lg border-2 border-green-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
                                                                                                </div>
            
                                                                                                <div
                                                                                                    class="text-right p-2 border-y rounded-b">
                                                                                                    <button type="submit"
                                                                                                        class="text-custom-header bg-custom-morado focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2">
                                                                                                        Registrar venta</button>
                                                                                                </div>
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
            
                                                        
            
                                                        
            
                                                        <div class="text-right">
                                                            <div class="inline-flex p-2 space-x-3">
            
                                                                
            
                                                                <button data-modal-target="volverCandidato<?php echo e($prospecto->id); ?>"
                                                                    data-modal-toggle="volverCandidato<?php echo e($prospecto->id); ?>"
                                                                    type="button" title="Volver Candidato"
                                                                    class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                                                                    <svg id="btnVolverCandidato" xmlns="http://www.w3.org/2000/svg"
                                                                        height="2em" class="m-auto" viewBox="0 0 512 512">
                                                                        <path
                                                                            d="M32 96l320 0V32c0-12.9 7.8-24.6 19.8-29.6s25.7-2.2 34.9 6.9l96 96c6 6 9.4 14.1 9.4 22.6s-3.4 16.6-9.4 22.6l-96 96c-9.2 9.2-22.9 11.9-34.9 6.9s-19.8-16.6-19.8-29.6V160L32 160c-17.7 0-32-14.3-32-32s14.3-32 32-32zM480 352c17.7 0 32 14.3 32 32s-14.3 32-32 32H160v64c0 12.9-7.8 24.6-19.8 29.6s-25.7 2.2-34.9-6.9l-96-96c-6-6-9.4-14.1-9.4-22.6s3.4-16.6 9.4-22.6l96-96c9.2-9.2 22.9-11.9 34.9-6.9s19.8 16.6 19.8 29.6l0 64H480z" />
                                                                    </svg>
                                                                </button>
            
                                                                <div id="volverCandidato<?php echo e($prospecto->id); ?>" tabindex="-1"
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
                                                                                    data-modal-hide="volverCandidato<?php echo e($prospecto->id); ?>">
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
                                                                                    class="text-center text-2xl font-bold text-custom-morado">
                                                                                    ¿Estas seguro de volver candidato a este prospecto?
                                                                                </div>
                                                                            </div>
                                                                            
            
                                                                            
                                                                            <div class="text-right">
                                                                                <div class="inline-flex">
                                                                                    <div class="m-4">
                                                                                        <button type="button" title="cancelar"
                                                                                            data-modal-hide="volverCandidato<?php echo e($prospecto->id); ?>"
                                                                                            class="text-custom-header text-right bg-custom-morado focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2">
                                                                                            <svg id="btnCancelar" class="w-4 h-4"
                                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                                viewBox="0 0 384 512">
                                                                                                <path
                                                                                                    d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                                                                                            </svg>
                                                                                        </button>
                                                                                    </div>
            
                                                                                    <div class="m-4">
                                                                                        <button type="button" title="confirmar"
                                                                                            onclick="volverCandidato(<?php echo e($prospecto->id); ?>)"
                                                                                            class="text-custom-header bg-custom-morado focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2">
                                                                                            <svg id="btnConfirmar" class="w-4 h-4"
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
            
                                                                
            
                                                                
            
                                                                <button data-modal-target="descartarProspecto<?php echo e($prospecto->id); ?>"
                                                                    data-modal-toggle="descartarProspecto<?php echo e($prospecto->id); ?>"
                                                                    type="button" title="Descartar"
                                                                    class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                                                                    <svg id="descartar" xmlns="http://www.w3.org/2000/svg"
                                                                        height="2em" class="m-auto"
                                                                        viewBox="0 0 640 512">
                                                                        <path
                                                                            d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM471 143c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                                                                    </svg>
                                                                </button>
            
                                                                <div id="descartarProspecto<?php echo e($prospecto->id); ?>" tabindex="-1"
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
                                                                                    data-modal-hide="descartarProspecto<?php echo e($prospecto->id); ?>">
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
                                                                                    class="text-center text-2xl font-bold text-custom-morado">
                                                                                    ¿Estas seguro de descartar a este contacto?
                                                                                </div>
                                                                            </div>
                                                                            
            
                                                                            
                                                                            <div class="text-right">
                                                                                <div class="inline-flex">
                                                                                    <div class="m-4">
                                                                                        <button type="button" title="cancelar"
                                                                                            data-modal-hide="descartarProspecto<?php echo e($prospecto->id); ?>"
                                                                                            class="text-custom-header text-right bg-custom-morado focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2">
                                                                                            <svg id="btnCancelar" class="w-4 h-4"
                                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                                viewBox="0 0 384 512">
                                                                                                <path
                                                                                                    d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                                                                                            </svg>
                                                                                        </button>
                                                                                    </div>
            
                                                                                    <div class="m-4">
                                                                                        <button type="button" title="confirmar"
                                                                                            onclick="descartarProspecto(<?php echo e($prospecto->id); ?>)"
                                                                                            class="text-custom-header bg-custom-morado focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2">
                                                                                            <svg id="btnConfirmar" class="w-4 h-4"
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
            
                                                                
            
                                                                
            
                                                                <button data-modal-target="editarProspecto<?php echo e($prospecto->id); ?>"
                                                                    data-modal-toggle="editarProspecto<?php echo e($prospecto->id); ?>"
                                                                    type="button" title="Editar"
                                                                    class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                                                                    <svg id="editar" xmlns="http://www.w3.org/2000/svg"
                                                                        height="2em" class="m-auto" viewBox="0 0 640 512">
                                                                        <path
                                                                            d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H322.8c-3.1-8.8-3.7-18.4-1.4-27.8l15-60.1c2.8-11.3 8.6-21.5 16.8-29.7l40.3-40.3c-32.1-31-75.7-50.1-123.9-50.1H178.3zm435.5-68.3c-15.6-15.6-40.9-15.6-56.6 0l-29.4 29.4 71 71 29.4-29.4c15.6-15.6 15.6-40.9 0-56.6l-14.4-14.4zM375.9 417c-4.1 4.1-7 9.2-8.4 14.9l-15 60.1c-1.4 5.5 .2 11.2 4.2 15.2s9.7 5.6 15.2 4.2l60.1-15c5.6-1.4 10.8-4.3 14.9-8.4L576.1 358.7l-71-71L375.9 417z" />
                                                                    </svg>
                                                                </button>
            
                                                                <div id="editarProspecto<?php echo e($prospecto->id); ?>" tabindex="-1"
                                                                    aria-hidden="true"
                                                                    class="fixed z-50 hidden w-full p-6 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                                    <div class="relative w-full max-w-2xl max-h-full">
                                                                        <div class="relative bg-white rounded-lg shadow">
                                                                            
                                                                            <div
                                                                                class="bg-custom-morado flex items-start justify-between p-4 border-b rounded-t">
                                                                                <div
                                                                                    class="text-3xl text-start font-semibold text-white">
                                                                                    Editar Prospecto <br>
                                                                                    <?php echo e($prospecto->funeraria); ?> -
                                                                                    <?php echo e($prospecto->nombre); ?>

                                                                                </div>
            
                                                                                <button type="button"
                                                                                    class="text-white bg-transparent hover:bg-custom-header hover:text-custom-linksmenu rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center"
                                                                                    data-modal-hide="editarProspecto<?php echo e($prospecto->id); ?>">
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
            
                                                                            
            
                                                                            
            
                                                                            <form
                                                                                action="<?php echo e(route('contactos.updateProspecto', $prospecto->id)); ?>"
                                                                                method="POST">
                                                                                <?php echo csrf_field(); ?>
                                                                                <?php echo method_field('put'); ?>
            
                                                                                <div class="grid grid-cols-3 gap-4 px-4">
                                                                                    <div class="text-center my-3">
                                                                                        <label for="funeraria"
                                                                                            class="text-base text-custom-morado">Funeraria:</label>
                                                                                        <input type="text"
                                                                                            class="rounded-lg text-custom-morado ml-2 w-full"
                                                                                            name="funeraria" id="funeraria"
                                                                                            value=<?php echo e($prospecto->funeraria); ?>>
                                                                                    </div>
            
                                                                                    <div class="text-center my-3">
                                                                                        <label for="nombreContacto"
                                                                                            class="text-base text-custom-morado">Nombre:</label>
                                                                                        <input type="text"
                                                                                            class="rounded-lg text-custom-morado ml-2 w-full"
                                                                                            name="nombreContacto"
                                                                                            id="nombreContacto"
                                                                                            value=<?php echo e($prospecto->nombre); ?>>
                                                                                    </div>
            
                                                                                    <div class="text-center my-3">
                                                                                        <label for="tipo"
                                                                                            class="text-base text-custom-morado">Tipo:</label>
            
                                                                                        <select name="tipoContacto" id="tipoContacto"
                                                                                            class="rounded-lg ml-2 h-10 w-full text-xs text-custom-morado">
                                                                                            <option value="">---Selecciona una
                                                                                                opción---</option>
                                                                                            <?php $__currentLoopData = $tiposContacto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                <option value="<?php echo e($tipo); ?>"
                                                                                                    <?php if($tipo == $prospecto->tipo): ?> selected <?php endif; ?>>
                                                                                                    <?php echo e($tipo); ?>

                                                                                                </option>
                                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
            
                                                                                <hr
                                                                                    class="w-auto h-0 mx-auto my-4 bg-custom-morado customDashed">
            
                                                                                <div class="grid grid-cols-3 gap-4 px-4">
            
                                                                                    <div class="text-center my-3">
                                                                                        <label for="correo"
                                                                                            class="text-base text-custom-morado">Correo:</label>
                                                                                        <input type="email"
                                                                                            class="rounded-lg text-custom-morado ml-2 w-full"
                                                                                            name="correo" id="correo"
                                                                                            value=<?php echo e($prospecto->correo); ?>>
                                                                                    </div>
            
                                                                                    <div class="text-center my-3">
                                                                                        <label for="telefono"
                                                                                            class="text-base text-custom-morado">Teléfono:</label>
                                                                                        <input type="tel"
                                                                                            class="rounded-lg text-custom-morado ml-2 w-full"
                                                                                            name="telefono" id="telefono"
                                                                                            value=<?php echo e($prospecto->telefono); ?>>
                                                                                    </div>
            
                                                                                    <div class="text-center my-3">
                                                                                        <label for="celular"
                                                                                            class="text-base text-custom-morado">Celular:</label>
                                                                                        <input type="tel"
                                                                                            class="rounded-lg text-custom-morado ml-2 w-full"
                                                                                            name="celular" id="celular"
                                                                                            value=<?php echo e($prospecto->celular); ?>>
                                                                                    </div>
                                                                                </div>
            
                                                                                <hr
                                                                                    class="w-auto h-0 mx-auto my-4 bg-custom-morado customDashed">
            
                                                                                <div class="grid grid-cols-3 gap-4 px-4 my-4">
            
                                                                                    <div class="text-center">
                                                                                        <label for="referenciado"
                                                                                            class="text-base text-custom-morado">Referenciado:</label>
                                                                                        <select name="referenciado"
                                                                                            id="referenciado"
                                                                                            class="rounded-lg ml-2 h-10 w-full text-xs text-custom-morado">
                                                                                            <option value="">---Selecciona una
                                                                                                opción---</option>
                                                                                            <?php $__currentLoopData = $contactos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contacto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                <option
                                                                                                    value="<?php echo e($contacto->referenciado); ?>"
                                                                                                    <?php if($contacto->referenciado == $prospecto->referenciado): ?> selected <?php endif; ?>>
                                                                                                    <?php echo e($contacto->referenciado); ?>

                                                                                                </option>
                                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                        </select>
                                                                                    </div>
            
                                                                                    <div class="text-center">
                                                                                        <label for="origen"
                                                                                            class="text-base text-custom-morado">Origen:</label>
                                                                                        <select name="origen" id="origen"
                                                                                            class="rounded-lg ml-2 h-10 w-full text-xs text-custom-morado">
                                                                                            <option value="">---Selecciona una
                                                                                                opción---</option>
                                                                                            <?php $__currentLoopData = $origenContacto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $origen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                <option value="<?php echo e($origen); ?>"
                                                                                                    <?php if($origen == $prospecto->origen): ?> selected <?php endif; ?>>
                                                                                                    <?php echo e($origen); ?>

                                                                                                </option>
                                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                        </select>
                                                                                    </div>
            
                                                                                    <div class="text-center">
                                                                                        <label for="fechaNacimiento"
                                                                                            class="text-base text-custom-morado">Fecha
                                                                                            de
                                                                                            nacimiento:</label>
                                                                                        <input type="date" name="fechaNacimiento"
                                                                                            id="fechaNacimiento"
                                                                                            class="rounded-lg ml-2 h-10 w-full text-xs text-custom-morado"
                                                                                            value=<?php echo e($prospecto->fechaNacimiento); ?>>
                                                                                    </div>
                                                                                </div>
            
                                                                                <div class="grid grid-cols-2 gap-6 px-4 my-4">
                                                                                    <div class="text-center">
                                                                                        <label for="fechaIngreso"
                                                                                            class="text-base text-custom-morado">Fecha
                                                                                            de
                                                                                            Ingreso:</label>
                                                                                        <input type="date" name="fechaIngreso"
                                                                                            id="fechaIngreso"
                                                                                            class="rounded-lg ml-2 h-10 w-full text-xs text-custom-morado"
                                                                                            value=<?php echo e($prospecto->fechaIngreso); ?>>
                                                                                    </div>
                                                                                    <div class="text-center">
                                                                                        <label for="vigencia"
                                                                                            class="text-base text-custom-morado">Vigencia:</label>
                                                                                        <input type="date" name="vigencia"
                                                                                            id="vigencia"
                                                                                            class="rounded-lg ml-2 h-10 w-full text-xs text-custom-morado"
                                                                                            value=<?php echo e($prospecto->vigencia); ?>>
                                                                                    </div>
                                                                                </div>
            
                                                                                <div class="grid grid-cols-3 gap-4 px-4 my-4">
            
                                                                                    <div class="text-center">
                                                                                        <label for="profesion"
                                                                                            class="text-base text-custom-morado">Profesion:</label>
                                                                                        <input type="text"
                                                                                            class="rounded-lg text-custom-morado ml-2 w-full"
                                                                                            name="profesion" id="profesion"
                                                                                            value=<?php echo e($prospecto->profesion); ?>>
                                                                                    </div>
            
                                                                                    <div class="text-center">
                                                                                        <label for="empresas"
                                                                                            class="text-base text-custom-morado">Empresa:</label>
            
                                                                                        <div class="flex items-center">
                                                                                            <select name="empresas" id="empresas"
                                                                                                class="rounded-lg ml-2 h-10 w-full text-xs text-custom-morado">
                                                                                                <option value="">---Selecciona
                                                                                                    una opción---</option>
                                                                                                <?php $__currentLoopData = $empresas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $empresa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                    <option
                                                                                                        value="<?php echo e($empresa->id); ?>"
                                                                                                        <?php if($empresa->id == $prospecto->empresas_id): ?> selected <?php endif; ?>>
                                                                                                        <?php echo e($empresa->nombreEmpresa); ?>

                                                                                                    </option>
                                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
            
                                                                                    <div class="text-center">
                                                                                        <label for="ingresos"
                                                                                            class="text-base text-custom-morado">Ingresos:</label>
                                                                                        <input type="number" name="ingresos"
                                                                                            id="ingresos"
                                                                                            class="rounded-lg ml-2 mt-1 w-full text-xs text-custom-morado"
                                                                                            value=<?php echo e($prospecto->ingresos); ?>>
                                                                                    </div>
            
                                                                                </div>
            
                                                                                <div class="grid grid-cols-3 gap-4 px-4 my-4">
            
                                                                                    <div class="text-center">
                                                                                        <label for="calle"
                                                                                            class="text-base text-custom-morado">Calle:</label>
                                                                                        <input type="text"
                                                                                            class="rounded-lg text-custom-morado ml-2 w-full"
                                                                                            name="calle" id="calle"
                                                                                            value=<?php echo e($prospecto->calle); ?>>
                                                                                    </div>
            
                                                                                    <div class="text-center">
                                                                                        <label for="noExterior"
                                                                                            class="text-base text-custom-morado">No.
                                                                                            Exterior:</label>
                                                                                        <input type="text"
                                                                                            class="rounded-lg text-custom-morado ml-2 w-full"
                                                                                            name="noExterior" id="noExterior"
                                                                                            value=<?php echo e($prospecto->noExterior); ?>>
                                                                                    </div>
            
                                                                                    <div class="text-center">
                                                                                        <label for="noInterior"
                                                                                            class="text-base text-custom-morado">No.
                                                                                            Interior:</label>
                                                                                        <input type="text"
                                                                                            class="rounded-lg text-custom-morado ml-2 w-full"
                                                                                            name="noInterior" id="noInterior"
                                                                                            value=<?php echo e($prospecto->noInterior); ?>>
                                                                                    </div>
            
                                                                                </div>
            
                                                                                <div class="grid grid-cols-3 gap-4 px-4 my-4">
            
                                                                                    <div class="text-center">
                                                                                        <label for="colonias_id"
                                                                                            class="text-base text-custom-morado">Colonia:</label>
                                                                                        <div class="flex items-center">
                                                                                            <select name="colonias_id"
                                                                                                id="colonia"
                                                                                                class="rounded-lg ml-2 h-10 w-full text-xs text-custom-morado">
                                                                                                <option value="">---Selecciona
                                                                                                    una opción---</option>
                                                                                                <?php $__currentLoopData = $colonias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $colonia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                    <option
                                                                                                        value="<?php echo e($colonia->id); ?>"
                                                                                                        <?php if($colonia->id == $prospecto->colonias_id): ?> selected <?php endif; ?>>
                                                                                                        <?php echo e($colonia->colonia); ?>

                                                                                                    </option>
                                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
            
                                                                                    <div class="text-center">
                                                                                        <label for="localidad"
                                                                                            class="text-base text-custom-morado">Localidad:</label>
                                                                                        <input type="text"
                                                                                            class="rounded-lg text-custom-morado ml-2 w-full"
                                                                                            name="localidad" id="localidad"
                                                                                            value=<?php echo e($prospecto->localidad); ?>>
                                                                                    </div>
            
                                                                                    <div class="text-center">
                                                                                        <label for="municipio"
                                                                                            class="text-base text-custom-morado">Municipio:</label>
                                                                                        <input type="text"
                                                                                            class="rounded-lg text-custom-morado ml-2 w-full"
                                                                                            name="municipio" id="municipio"
                                                                                            value=<?php echo e($prospecto->municipio); ?>>
                                                                                    </div>
            
                                                                                </div>
            
                                                                                <div class="grid grid-cols-3 gap-4 px-4 my-4">
            
                                                                                    <div class="text-center">
                                                                                        <label for="estado"
                                                                                            class="text-base text-custom-morado">Estado:</label>
                                                                                        <input type="text"
                                                                                            class="rounded-lg text-custom-morado ml-2 w-full"
                                                                                            name="estado" id="estado"
                                                                                            value=<?php echo e($prospecto->estado); ?>>
                                                                                    </div>
            
                                                                                    <div class="text-center">
                                                                                        <label for="pais"
                                                                                            class="text-base text-custom-morado">Pais:</label>
                                                                                        <input type="text"
                                                                                            class="rounded-lg text-custom-morado ml-2 w-full"
                                                                                            name="pais" id="pais"
                                                                                            value=<?php echo e($prospecto->pais); ?>>
                                                                                    </div>
            
                                                                                    <div class="text-center">
                                                                                        <label for="codigoP"
                                                                                            class="text-base text-custom-morado">C.P.:</label>
                                                                                        <input type="number" name="codPostal"
                                                                                            id="codPostal"
                                                                                            class="rounded-lg ml-2 mt-1 w-full text-xs text-custom-morado"
                                                                                            value=<?php echo e($prospecto->codPostal); ?>>
                                                                                    </div>
                                                                                </div>
            
                                                                                <div class="text-start ms-5">
                                                                                    <label for="usuarios"
                                                                                        class="text-base text-custom-morado">Usuario
                                                                                        al que se le
                                                                                        asignara:</label>
                                                                                    <select name="usuarios" id="usuarios"
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
            
                                                                                <hr
                                                                                    class="w-auto h-0 mx-auto my-4 bg-custom-morado customDashed">
            
                                                                                <label for="Observaciones"
                                                                                    class="block text-start ml-4 my-2 text-base text-custom-morado">Observaciones:</label>
                                                                                <textarea name="observaciones" id="message" rows="4"
                                                                                    class="block p-3 w-4/5 m-auto text-sm bg-white rounded-lg text-custom-morado border-2 border-green-300 focus:ring-blue-500 focus:border-blue-500"><?php echo e($prospecto->observaciones); ?></textarea>
            
                                                                                <div class="text-right p-2 border-y rounded-b">
                                                                                    <button
                                                                                        data-modal-hide="editarProspecto<?php echo e($prospecto->id); ?>"
                                                                                        type="submit"
                                                                                        class="text-custom-header bg-custom-morado focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2">
                                                                                        Actualizar contacto</button>
                                                                                </div>
                                                                            </form>
            
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
            
                                                                
            
                                                                
            
                                                                <form action="<?php echo e(route('contactos.destroyProspecto', $prospecto->id)); ?>"
                                                                    method="POST">
                                                                    <?php echo csrf_field(); ?>
                                                                    <?php echo method_field('delete'); ?>
            
                                                                    <button type="submit" title="Eliminar prospecto"
                                                                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                                                                        <svg id="eliminar" xmlns="http://www.w3.org/2000/svg"
                                                                            height="2em" class="m-auto"
                                                                            viewBox="0 0 448 512">
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
                            <thead class="text-sm text-custom-linksmenu uppercase bg-purple-300 border-b-2 border-custom-morado my-4">
                                <tr class="text-center">
                                    <th scope="col" class="px-4 py-3">
                                        Funeraria
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Nombre
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Telefono
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Email
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Antigüedad
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Citas
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Tipo
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Detalles
                                    </th>
                                </tr>
                            </thead>
                            <?php $__currentLoopData = $detalleClientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tbody>
                                    <tr class="bg-red-500 hover:bg-red-700 text-white">
                                        <td class="text-center">
                                            <?php echo e($cliente->funeraria); ?>

                                        </td>
                                        <td class="text-center">
                                            <?php echo e($cliente->nombre); ?>

                                        </td>
                                        <td class="text-center">
                                            <?php echo e($cliente->telefono); ?>

                                        </td>
                                        <td class="text-center">
                                            <?php echo e($cliente->correo); ?>

                                        </td>
                                        <td class="text-center">
                                            <?php echo e($antiguedadClientes[$loop->index]->diasDesdeIngreso); ?>

                                        </td>
                                        <td class="text-center">
                                            <?php echo e($citasPorClientes[$loop->index]->noCitas); ?>

                                        </td>
                                        <td class="text-center">
                                            Cliente
                                        </td>
                                        <td>
                                            <div class="flex justify-center items-center">
                                                <!-- Modal toggle -->
                                                <button data-modal-target="detalleCliente<?php echo e($cliente->id); ?>"
                                                    data-modal-toggle="detalleCliente<?php echo e($cliente->id); ?>"
                                                    class="my-2 text-white bg-red-700 hover:bg-red-900 rounded-lg text-center px-2 py-2"
                                                    type="button">
                                                    <svg class="w-6 h-6 text-white" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                                    </svg>
                                                </button>
                                            </div>
            
                                            <!-- Modal Detalles -->
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
                                                                    <div class="inline-flex my-5 px-2 text-sm text-custom-morado">
                                                                        <div>
                                                                            <strong>Funeraria: </strong> <?php echo e($cliente->funeraria); ?>

                                                                        </div>
                                                                        <div class="px-3">
                                                                            <strong>Nombre: </strong> <?php echo e($cliente->nombre); ?>

                                                                        </div>
                                                                    </div>
            
                                                                    <div
                                                                        class="grid grid-cols-3 gap-4 px-2 text-custom-morado text-sm">
                                                                        <div>
                                                                            <strong>Antiguedad: </strong>
                                                                            <?php echo e($antiguedadClientes[$loop->index]->diasDesdeIngreso); ?>

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
                                                                            <strong>Profesión: </strong> <?php echo e($cliente->profesion); ?>

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
                                                                            <strong>Localidad: </strong> <?php echo e($cliente->localidad); ?>

                                                                        </div>
                                                                        <div class="px-3">
                                                                            <strong>Municipio: </strong> <?php echo e($cliente->municipio); ?>

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
                                                                        <?php echo e($citasPorClientes[$loop->index]->noCitas); ?>/<?php echo e($numeroCitasClientes); ?>

                                                                        citas realizadas
                                                                    </div>
            
                                                                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                                                        <table
                                                                            class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                                            <thead
                                                                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                                                <tr>
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
                                                                                <tbody>
                                                                                    <tr class="bg-white border-b">
                                                                                        <td class="px-6 py-4">
                                                                                            <?php echo e($cita->fecha); ?>

                                                                                        </td>
                                                                                        <td class="px-6 py-4">
                                                                                            <?php echo e($cita->horaInicio); ?>

                                                                                        </td>
                                                                                        <td class="px-6 py-4">
                                                                                            <?php echo e($cita->duracion); ?> minutos
                                                                                        </td>
                                                                                        <td class="px-6 py-4">
                                                                                            <?php echo e($cita->estado); ?>

                                                                                        </td>
                                                                                        <td class="px-6 py-4">
                                                                                            <?php echo e($cita->comentarios); ?>

                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </table>
                                                                        <div class="text-right">
                                                                            <div class="inline-flex p-3">
                                                                                <button data-modal-target="defaultModal"
                                                                                    data-modal-toggle="registrarCitaCliente<?php echo e($cliente->id); ?>"
                                                                                    class="block mt-4 ml-2 text-white bg-custom-morado hover:bg-fuchsia-600 rounded-lg text-center px-2 py-2"
                                                                                    type="button">
                                                                                    <svg class="w-6 h-6 text-white"
                                                                                        aria-hidden="true"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        fill="none" viewBox="0 0 20 18">
                                                                                        <path stroke="currentColor"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round" stroke-width="2"
                                                                                            d="M13 8h6m-3 3V5m-6-.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0ZM5 11h3a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z" />
                                                                                    </svg>
                                                                                </button>
            
                                                                                <div id="registrarCitaCliente<?php echo e($cliente->id); ?>"
                                                                                    tabindex="-1"
                                                                                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                                                    <div class="relative w-full max-w-md max-h-full">
                                                                                        <!-- Modal content -->
                                                                                        <div
                                                                                            class="relative bg-white rounded-lg shadow">
                                                                                            <!-- Modal header -->
                                                                                            <div
                                                                                                class="bg-custom-morado flex items-start justify-between p-4 border-b rounded-t">
                                                                                                <div
                                                                                                    class="text-xl font-semibold text-white">
                                                                                                    Registro de Cita
                                                                                                </div>
            
                                                                                                <button type="button"
                                                                                                    class="text-white bg-transparent hover:bg-custom-header hover:text-custom-linksmenu rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center"
                                                                                                    data-modal-hide="registrarCitaCliente<?php echo e($cliente->id); ?>">
                                                                                                    <svg class="w-3 h-3"
                                                                                                        aria-hidden="true"
                                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                                        fill="none"
                                                                                                        viewBox="0 0 14 14">
                                                                                                        <path stroke="currentColor"
                                                                                                            stroke-linecap="round"
                                                                                                            stroke-linejoin="round"
                                                                                                            stroke-width="2"
                                                                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                                                    </svg>
                                                                                                    <span class="sr-only">Close
                                                                                                        modal</span>
                                                                                                </button>
                                                                                            </div>
                                                                                            <!-- Modal body -->
                                                                                            <form accept-charset="utf-8"
                                                                                                method="POST"
                                                                                                action="<?php echo e(route('contactos.storeCitas')); ?>">
                                                                                                <?php echo csrf_field(); ?>
            
                                                                                                <div class="text-center">
                                                                                                    <label for="persona"
                                                                                                        class="text-center text-lg font-semibold text-custom-morado px-5">Persona:</label>
                                                                                                    <input type="hidden"
                                                                                                        name="persona_id"
                                                                                                        id="persona_id"
                                                                                                        value="<?php echo e($cliente->id); ?>">
                                                                                                    <input type="text"
                                                                                                        class="rounded-lg ml-2 h-8 w-3/4"
                                                                                                        name="persona"
                                                                                                        id="persona"
                                                                                                        value="<?php echo e($cliente->nombre); ?>"
                                                                                                        disabled>
                                                                                                    
                                                                                                </div>
            
                                                                                                <div class="text-center my-3">
                                                                                                    <label for="tipoCita"
                                                                                                        class="text-lg text-center font-semibold text-custom-morado p-5">Tipo:</label>
                                                                                                    <div class="my-2">
                                                                                                        <select name="tipoCita"
                                                                                                            id="tipoCita"
                                                                                                            class="rounded-lg w-4/5 text-xs text-custom-morado font-semibold">
                                                                                                            <option selected>
                                                                                                                ---Selecciona una
                                                                                                                opción---</option>
                                                                                                            <?php $__currentLoopData = $tiposdeCita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tCita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                                <option
                                                                                                                    value="<?php echo e($tCita); ?>">
                                                                                                                    <?php echo e($tCita); ?>

                                                                                                                </option>
                                                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
            
                                                                                                <div class="text-center my-3">
                                                                                                    <label for="fecha"
                                                                                                        class="text-lg text-center font-semibold text-custom-morado px-5">Fecha:</label>
                                                                                                    <div class="my-2">
                                                                                                        <input type="date"
                                                                                                            name="fecha"
                                                                                                            id="fecha"
                                                                                                            class="rounded-lg w-4/5 text-sm text-custom-morado">
                                                                                                    </div>
                                                                                                </div>
            
                                                                                                <div class="text-center my-3">
                                                                                                    <label for="horaInicio"
                                                                                                        class="text-lg text-center font-semibold text-custom-morado px-5">Hora
                                                                                                        Inicio:</label>
                                                                                                    <div class="my-2">
                                                                                                        <input type="time"
                                                                                                            name="horaInicio"
                                                                                                            id="horaInicio"
                                                                                                            class="rounded-lg w-4/5">
                                                                                                    </div>
                                                                                                </div>
            
                                                                                                <div class="text-center my-3">
                                                                                                    <label for="horaFinal"
                                                                                                        class="text-lg font-semibold text-custom-morado text-center px-5">Hora
                                                                                                        Final:</label>
                                                                                                    <div class="my-2">
                                                                                                        <input type="time"
                                                                                                            name="horaFinal"
                                                                                                            id="horaFinal"
                                                                                                            class="rounded-lg w-4/5">
                                                                                                    </div>
                                                                                                </div>
            
                                                                                                <div class="text-center my-3">
                                                                                                    <label for="lugar"
                                                                                                        class="text-lg text-center font-semibold text-custom-morado px-5">Lugar:</label>
                                                                                                    <div class="my-2">
                                                                                                        <select name="lugar"
                                                                                                            id="lugar"
                                                                                                            class="rounded-lg mx-6 h-10 w-4/5 text-xs text-custom-morado font-semibold">
                                                                                                            <option selected>
                                                                                                                ---Selecciona una
                                                                                                                opción---</option>
                                                                                                            <?php $__currentLoopData = $lugarCita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lugar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                                <option
                                                                                                                    value="<?php echo e($lugar); ?>">
                                                                                                                    <?php echo e($lugar); ?>

                                                                                                                </option>
                                                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
            
                                                                                                <div class="text-center my-3">
                                                                                                    <label for="comentarios"
                                                                                                        class="text-lg font-semibold text-custom-morado px-5">Comentarios:</label>
                                                                                                    <textarea name="comentarios" id="comentarios" rows="4"
                                                                                                        class="block p-3 w-11/12 m-auto text-sm bg-white rounded-lg border-2 border-green-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
                                                                                                </div>
            
            
                                                                                                <!-- Modal footer -->
            
                                                                                                <div class="text-right">
                                                                                                    <div class="inline-flex p-2">
                                                                                                        <button type="submit"
                                                                                                            title="Registrar cita"
                                                                                                            class="text-custom-header bg-custom-morado focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2">
                                                                                                            <svg class="w-4 h-4"
                                                                                                                aria-hidden="true"
                                                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                                                fill="none"
                                                                                                                viewBox="0 0 18 18">
                                                                                                                <path
                                                                                                                    stroke="currentColor"
                                                                                                                    stroke-linecap="round"
                                                                                                                    stroke-linejoin="round"
                                                                                                                    stroke-width="2"
                                                                                                                    d="M9 1v16M1 9h16" />
                                                                                                            </svg>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
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
                                                                                    class="ml-2 text-sm font-medium text-gray-900">6 X
                                                                                    15</label>
                                                                            </div>
                                                                            <div class="flex justify-center items-center">
                                                                                <input id="default-checkbox" type="checkbox"
                                                                                    value=""
                                                                                    class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                <label for="default-checkbox"
                                                                                    class="ml-2 text-sm font-medium text-gray-900">6 X
                                                                                    6</label>
                                                                            </div>
                                                                            <div class="flex justify-center items-center">
                                                                                <input id="default-checkbox" type="checkbox"
                                                                                    value=""
                                                                                    class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                <label for="default-checkbox"
                                                                                    class="ml-2 text-sm font-medium text-gray-900">3 X
                                                                                    9</label>
                                                                            </div>
                                                                            <div class="flex justify-center items-center">
                                                                                <input id="default-checkbox" type="checkbox"
                                                                                    value=""
                                                                                    class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                <label for="default-checkbox"
                                                                                    class="ml-2 text-sm font-medium text-gray-900">3 X
                                                                                    6</label>
                                                                            </div>
                                                                            <div class="flex justify-center items-center">
                                                                                <input id="default-checkbox" type="checkbox"
                                                                                    value=""
                                                                                    class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                <label for="default-checkbox"
                                                                                    class="ml-2 text-sm font-medium text-gray-900">3 X
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
            
                                                                    <div class="text-right py-2">
                                                                        <button type="button" title="Guardar"
                                                                            class="px-3 py-2 text-xs font-medium text-center inline-flex items-center bg-custom-morado rounded-lg">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" height="2em"
                                                                                class="m-auto"
                                                                                viewBox="0 0 512 512">
                                                                                <style>
                                                                                    svg {
                                                                                        fill: #ffffff
                                                                                    }
                                                                                </style>
                                                                                <path
                                                                                    d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z" />
                                                                            </svg>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <div id="cotizaciones <?php echo e($cliente->id); ?>"
                                                                    class="tab-content hidden text-black">
                                                                    <div class="overflow-x-auto shadow-md sm:rounded-lg my-4">
            
                                                                        <table class="text-sm w-full text-left text-custom-linksmenu">
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
                                                                                <?php $__currentLoopData = $cotizacionesClientes[$cliente->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cotizacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <tbody>
                                                                                        <td class="px-6 py-4 text-center"><?php echo e($cotizacion->id); ?>

                                                                                        </td>
                                                                                        <td class="px-6 py-4 text-center"><?php echo e($cotizacion->fecha); ?></td>
                                                                                        <td class="px-6 py-4 text-center"><?php echo e($cotizacion->total); ?></td>
                                                                                        <td class="px-6 py-4 text-center"><?php echo e($cotizacion->estado); ?>

                                                                                        </td>
                                                                                        <td>
                                                                                            <button type="button" title="Ver cotización"
                                                                                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center bg-custom-morado rounded-lg">
                                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                    class="m-auto" height="2em"
                                                                                                    viewBox="0 0 448 512">
                                                                                                    <path
                                                                                                        d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z" />
                                                                                                </svg>
                                                                                            </button>
                                                                                        </td>
                                                                                    </tbody>
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
            
                                                                    <div class="text-right">
                                                                        <div class="inline-flex">
                                                                            <button data-modal-target="default-modal"
                                                                                data-modal-toggle="agregarCotizacionCliente<?php echo e($cliente->id); ?>"
                                                                                class="block mt-4 ml-2 text-white bg-custom-morado hover:bg-fuchsia-600 rounded-lg text-center px-3 py-2"
                                                                                type="button">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    height="2em" class="m-auto"
                                                                                    viewBox="0 0 512 512">
                                                                                    <path
                                                                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                                                                                </svg>
                                                                            </button>
            
                                                                            <div id="agregarCotizacionCliente<?php echo e($cliente->id); ?>"
                                                                                tabindex="-1"
                                                                                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                                                <div class="relative w-full max-w-md max-h-full">
                                                                                    <!-- Modal content -->
                                                                                    <div class="relative bg-white rounded-lg shadow">
                                                                                        <!-- Modal header -->
                                                                                        <div
                                                                                            class="bg-custom-morado flex items-start justify-between p-4 border-b rounded-t">
                                                                                            <div
                                                                                                class="text-xl font-semibold text-white">
                                                                                                Agregar Cotización
                                                                                            </div>
            
                                                                                            <button type="button"
                                                                                                class="text-white bg-transparent hover:bg-custom-header hover:text-custom-linksmenu rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center"
                                                                                                data-modal-hide="agregarCotizacionCliente<?php echo e($cliente->id); ?>">
                                                                                                <svg class="w-3 h-3"
                                                                                                    aria-hidden="true"
                                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                                    fill="none"
                                                                                                    viewBox="0 0 14 14">
                                                                                                    <path stroke="currentColor"
                                                                                                        stroke-linecap="round"
                                                                                                        stroke-linejoin="round"
                                                                                                        stroke-width="2"
                                                                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                                                </svg>
                                                                                                <span class="sr-only">Close
                                                                                                    modal</span>
                                                                                            </button>
                                                                                        </div>
                                                                                        <!-- Modal body -->
            
                                                                                        <form accept-charset="utf-8" method="POST"
                                                                                            action="<?php echo e(route('contactos.storeCotizaciones')); ?>">
                                                                                            <?php echo csrf_field(); ?>
            
                                                                                            <div class="text-center">
                                                                                                <label for="personaCliente"
                                                                                                    class="text-center text-lg font-semibold text-custom-morado px-5">Prospecto:</label>
                                                                                                <input type="hidden"
                                                                                                    name="personaCliente_id"
                                                                                                    id="personaCliente_id"
                                                                                                    value="<?php echo e($cliente->id); ?>">
                                                                                                <input type="text"
                                                                                                    class="rounded-lg ml-2 h-8 w-3/4"
                                                                                                    name="personaCliente"
                                                                                                    id="personaCliente"
                                                                                                    value="<?php echo e($cliente->nombre); ?>"
                                                                                                    disabled>
                                                                                            </div>
            
                                                                                            <div class="grid grid-cols-2">
                                                                                                <div class="text-center my-2">
                                                                                                    <label for="productoCliente"
                                                                                                        class="text-lg text-center font-semibold text-custom-morado p-5">Producto</label>
                                                                                                    <div class="my-2">
                                                                                                        <select name="productoCliente"
                                                                                                            id="productoCliente"
                                                                                                            class="rounded-lg w-4/5 text-xs text-custom-morado font-semibold"
                                                                                                            onchange="establecerPrecio(this)">
                                                                                                            <option selected>
                                                                                                                ---Selecciona una
                                                                                                                opción---
                                                                                                            </option>
                                                                                                            <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                                <option
                                                                                                                    value="<?php echo e($producto->id); ?>"
                                                                                                                    data-precio="<?php echo e($producto->precio); ?>">
                                                                                                                    <?php echo e($producto->producto); ?>

                                                                                                                </option>
                                                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
            
                                                                                                <div class="text-center my-2">
                                                                                                    <label for="precioCliente"
                                                                                                        class="text-lg font-semibold text-center text-custom-morado">Precio</label>
                                                                                                    <div class="my-2">
                                                                                                        <div name="precioCliente"
                                                                                                            id="precioCliente">
                                                                                                            <i
                                                                                                                class="text-xs">$00.00</i>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
            
                                                                                            <div class="grid grid-cols-2">
                                                                                                <div class="text-center my-1">
                                                                                                    <label for="cantidadCliente"
                                                                                                        class="text-base text-custom-morado">Cantidad</label>
                                                                                                    <div class="my-2">
                                                                                                        <input type="number"
                                                                                                            class="rounded-lg ml-2 h-8 w-4/5"
                                                                                                            name="cantidadCliente"
                                                                                                            id="cantidadCliente">
                                                                                                    </div>
                                                                                                </div>
            
                                                                                                <div class="text-center my-1">
                                                                                                    <label for="descuentoCliente"
                                                                                                        class="text-base text-custom-morado">Descuento
                                                                                                        %</label>
            
                                                                                                    <div class="my-2">
                                                                                                        <input type="number"
                                                                                                            class="rounded-lg ml-2 h-8 w-4/5"
                                                                                                            name="descuentoCliente"
                                                                                                            id="descuentoCliente">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
            
                                                                                            <div class="my-3 p-2">
                                                                                                <button type="button"
                                                                                                    onclick="agregarProducto3()"
                                                                                                    title="Agregar Producto"
                                                                                                    class="px-2 py-2 text-xs font-medium inline-flex text-center items-center bg-custom-morado rounded-lg">
                                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                        height="2em"
                                                                                                        viewBox="0 0 512 512">
                                                                                                        <path
                                                                                                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                                                                                                    </svg>
                                                                                                </button>
                                                                                            </div>
            
                                                                                            <div
                                                                                                class="overflow-x-auto shadow-md sm:rounded-lg my-4">
                                                                                                <table
                                                                                                    class="text-sm w-full text-left text-custom-linksmenu">
                                                                                                    <thead
                                                                                                        class="text-sm text-custom-linksmenu uppercase bg-custom-header my-4">
                                                                                                        <tr class="text-center">
                                                                                                            <th scope="col"
                                                                                                                class="px-2 py-3">
                                                                                                                Nombre
                                                                                                            </th>
                                                                                                            <th scope="col"
                                                                                                                class="px-2 py-3">
                                                                                                                Cantidad
                                                                                                            </th>
                                                                                                            <th scope="col"
                                                                                                                class="px-2 py-3">
                                                                                                                Precio
                                                                                                            </th>
                                                                                                            <th scope="col"
                                                                                                                class="px-2 py-3">
                                                                                                                Descuento
                                                                                                            </th>
                                                                                                            <th scope="col"
                                                                                                                class="px-2 py-3">
                                                                                                                Total
                                                                                                            </th>
                                                                                                        </tr>
                                                                                                    </thead>
                                                                                                    <tbody id="tablaCotizacion">
                                                                                                        <tr
                                                                                                            class="bg-teal-500 hover:bg-teal-700 text-white">
                                                                                                            <td class="text-center">
            
                                                                                                            </td>
                                                                                                            <td class="text-center">
            
                                                                                                            </td>
                                                                                                            <td class="text-center">
            
                                                                                                            </td>
                                                                                                            <td class="text-center">
            
                                                                                                            </td>
                                                                                                            <td class="text-center">
            
                                                                                                            </td>
                                                                                                            <td class="text-center">
            
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </div>
            
                                                                                            <div class="text-center my-3">
                                                                                                <label for="observacionesCliente"
                                                                                                    class="text-lg font-semibold text-custom-morado px-5">Observaciones:</label>
                                                                                                <textarea name="observacionesCliente" id="observacionesCliente" rows="4"
                                                                                                    class="block p-3 w-11/12 m-auto text-sm bg-white rounded-lg border-2 border-green-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
                                                                                            </div>
            
                                                                                            <div
                                                                                                class="text-right p-2 border-y rounded-b">
                                                                                                <button type="submit"
                                                                                                    class="text-custom-header bg-custom-morado focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2">
                                                                                                    Guardar cotización</button>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="ventas <?php echo e($cliente->id); ?>"
                                                                    class="tab-content hidden text-black">
                                                                    <div class="overflow-x-auto shadow-md sm:rounded-lg my-4">
                                                                        <table class="text-sm w-full text-left text-custom-linksmenu">
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
            
                                                                            <?php $__currentLoopData = $ventasClientes[$cliente->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $venta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <tbody>
                                                                                    <td class="px-6 py-4"><?php echo e($venta->referencia); ?>

                                                                                    </td>
                                                                                    <td class="px-6 py-4"><?php echo e($venta->fecha); ?></td>
                                                                                    <td class="px-6 py-4"><?php echo e($venta->total); ?></td>
                                                                                    <td class="px-6 py-4">
                                                                                        <?php echo e($venta->observaciones); ?></td>
                                                                                    <td class="px-6 py-4"><?php echo e($venta->name); ?></td>
                                                                                </tbody>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
            
                                                                        </table>
                                                                        <div class="text-right">
                                                                            <div class="inline-flex">
                                                                                <button data-modal-target="default-modal"
                                                                                    data-modal-toggle="agregarVentaCliente<?php echo e($cliente->id); ?>"
                                                                                    class="block mt-4 ml-2 text-white bg-custom-morado hover:bg-fuchsia-600 rounded-lg text-center px-3 py-2"
                                                                                    type="button">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        height="2em" class="m-auto"
                                                                                        viewBox="0 0 512 512">
                                                                                        <path
                                                                                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                                                                                    </svg>
                                                                                </button>
            
                                                                                <div id="agregarVentaCliente<?php echo e($cliente->id); ?>"
                                                                                    tabindex="-1"
                                                                                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                                                    <div class="relative w-full max-w-md max-h-full">
                                                                                        <!-- Modal content -->
                                                                                        <div
                                                                                            class="relative bg-white rounded-lg shadow">
                                                                                            <!-- Modal header -->
                                                                                            <div
                                                                                                class="bg-custom-morado flex items-start justify-between p-4 border-b rounded-t">
                                                                                                <div
                                                                                                    class="text-xl font-semibold text-white text-left">
                                                                                                    Detalles de Venta <br>
                                                                                                    <?php echo e($cliente->funeraria); ?> -
                                                                                                    <?php echo e($cliente->nombre); ?>

                                                                                                </div>
            
                                                                                                <button type="button"
                                                                                                    class="text-white bg-transparent hover:bg-custom-header hover:text-custom-linksmenu rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center"
                                                                                                    data-modal-hide="agregarVentaCliente<?php echo e($cliente->id); ?>">
                                                                                                    <svg class="w-3 h-3"
                                                                                                        aria-hidden="true"
                                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                                        fill="none"
                                                                                                        viewBox="0 0 14 14">
                                                                                                        <path stroke="currentColor"
                                                                                                            stroke-linecap="round"
                                                                                                            stroke-linejoin="round"
                                                                                                            stroke-width="2"
                                                                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                                                    </svg>
                                                                                                    <span class="sr-only">Close
                                                                                                        modal</span>
                                                                                                </button>
                                                                                            </div>
                                                                                            <!-- Modal body -->
            
                                                                                            <form accept-charset="utf-8"
                                                                                                method="POST"
                                                                                                action="<?php echo e(route('contactos.storeCotizaciones')); ?>">
                                                                                                <?php echo csrf_field(); ?>
            
                                                                                                <div class="text-center">
                                                                                                    <label for="referencia"
                                                                                                        class="text-center text-lg font-semibold text-custom-morado px-5">Referencia:</label>
                                                                                                    <input type="text"
                                                                                                        class="rounded-lg ml-2 h-8 w-3/4"
                                                                                                        name="referencia"
                                                                                                        id="referencia">
                                                                                                </div>
            
                                                                                                <div class="text-center my-3">
                                                                                                    <label for="fechaVenta"
                                                                                                        class="text-lg text-center font-semibold text-custom-morado px-5">Fecha:</label>
                                                                                                    <div class="my-2">
                                                                                                        <input type="date"
                                                                                                            name="fechaVenta"
                                                                                                            id="fechaVenta"
                                                                                                            class="rounded-lg w-4/5 text-sm text-custom-morado">
                                                                                                    </div>
                                                                                                </div>
            
                                                                                                <div class="text-center my-3">
                                                                                                    <label for="productoVenta"
                                                                                                        class="text-lg text-center font-semibold text-custom-morado p-5">Producto</label>
                                                                                                    <div class="my-2">
                                                                                                        <select name="productoVenta"
                                                                                                            id="productoVenta"
                                                                                                            class="rounded-lg w-4/5 text-xs text-custom-morado font-semibold">
                                                                                                            <option selected>
                                                                                                                ---Selecciona una
                                                                                                                opción---
                                                                                                            </option>
                                                                                                            <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                                <option
                                                                                                                    value="<?php echo e($producto->producto); ?>">
                                                                                                                    <?php echo e($producto->producto); ?>

                                                                                                                </option>
                                                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
            
                                                                                                <div class="text-center my-3">
                                                                                                    <label for="totalVenta"
                                                                                                        class="text-base text-custom-morado">Total
                                                                                                        de venta</label>
                                                                                                    <div class="my-2">
                                                                                                        <input type="number"
                                                                                                            class="rounded-lg ml-2 h-8 w-4/5"
                                                                                                            name="totalVenta"
                                                                                                            id="totalVenta">
                                                                                                    </div>
                                                                                                </div>
            
                                                                                                <div class="text-center my-3">
                                                                                                    <label for="Observaciones"
                                                                                                        class="block ml-4 my-2 text-base text-custom-morado">Observaciones:</label>
                                                                                                    <textarea name="observaciones" id="message" rows="4"
                                                                                                        class="block p-3 w-4/5 m-auto text-sm bg-white rounded-lg border-2 border-green-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
                                                                                                </div>
            
                                                                                                <div
                                                                                                    class="text-right p-2 border-y rounded-b">
                                                                                                    <button type="submit"
                                                                                                        class="text-custom-header bg-custom-morado focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2">
                                                                                                        Registrar venta</button>
                                                                                                </div>
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
            
                                                        
            
                                                        
            
                                                        <div class="text-right">
                                                            <div class="inline-flex p-2 space-x-3">
            
                                                                
            
                                                                <button
                                                                    data-modal-target="enviarTarjetaPresentacion<?php echo e($cliente->id); ?>"
                                                                    data-modal-toggle="enviarTarjetaPresentacion<?php echo e($cliente->id); ?>"
                                                                    type="button" title="Envia la tarjeta de presentación"
                                                                    class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                                                                    <svg id="tarjetaPresentacion" xmlns="http://www.w3.org/2000/svg"
                                                                        height="2em" class="m-auto"
                                                                        viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                                        <path
                                                                            d="M512 80c8.8 0 16 7.2 16 16v32H48V96c0-8.8 7.2-16 16-16H512zm16 144V416c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V224H528zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm56 304c-13.3 0-24 10.7-24 24s10.7 24 24 24h48c13.3 0 24-10.7 24-24s-10.7-24-24-24H120zm128 0c-13.3 0-24 10.7-24 24s10.7 24 24 24H360c13.3 0 24-10.7 24-24s-10.7-24-24-24H248z" />
                                                                    </svg>
                                                                </button>
            
                                                                <div id="enviarTarjetaPresentacion<?php echo e($cliente->id); ?>"
                                                                    tabindex="-1"
                                                                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                                    <div class="relative w-full max-w-md max-h-full">
                                                                        <!-- Modal content -->
                                                                        <div class="relative bg-white rounded-lg shadow">
                                                                            <!-- Modal header -->
                                                                            <div
                                                                                class="bg-custom-morado flex items-start justify-between p-4 border-b rounded-t">
                                                                                <div class="text-xl font-semibold text-white">
                                                                                    Enviar tarjeta de presentación
                                                                                </div>
            
                                                                                <button type="button"
                                                                                    class="text-white bg-transparent hover:bg-custom-header hover:text-custom-linksmenu rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center"
                                                                                    data-modal-hide="enviarTarjetaPresentacion<?php echo e($cliente->id); ?>">
                                                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        fill="none" viewBox="0 0 14 14">
                                                                                        <path stroke="currentColor"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round" stroke-width="2"
                                                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                                    </svg>
                                                                                    <span class="sr-only">Close
                                                                                        modal</span>
                                                                                </button>
                                                                            </div>
                                                                            <!-- Modal body -->
            
                                                                            <div class="text-center my-3">
                                                                                <label for="correoCliente"
                                                                                    class="text-lg text-center font-semibold text-custom-morado px-5">Correo
                                                                                    electrónico del contacto:</label>
                                                                                <div class="my-2">
                                                                                    <select name="correoCliente" id="correoCliente"
                                                                                        class="rounded-lg mx-6 h-10 w-4/5 text-xs text-custom-morado font-semibold">
                                                                                        <option selected>
                                                                                            ---Selecciona una
                                                                                            opción---</option>
                                                                                        <option value="<?php echo e($cliente->correo); ?>">
                                                                                            <?php echo e($cliente->correo); ?>

                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <!-- Modal footer -->
            
                                                                            <div class="text-right">
                                                                                <div class="inline-flex p-2">
                                                                                    <button type="button"
                                                                                        title="cancelar envio de Tarjeta"
                                                                                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center bg-white rounded-lg hover:bg-white">
                                                                                        <svg class="h-6 w-6 m-auto"
                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                            viewBox="0 0 384 512">
                                                                                            <path fill="#000000"
                                                                                                d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                                                                                        </svg>
                                                                                    </button>
            
                                                                                    <button type="submit" title="enviar Tarjeta"
                                                                                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center bg-custom-morado rounded-lg hover:bg-fuchsia-800">
                                                                                        <svg class="h-6 w-6 m-auto"
                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                            viewBox="0 0 512 512">
                                                                                            <path fill="#ffffff"
                                                                                                d="M64 112c-8.8 0-16 7.2-16 16v22.1L220.5 291.7c20.7 17 50.4 17 71.1 0L464 150.1V128c0-8.8-7.2-16-16-16H64zM48 212.2V384c0 8.8 7.2 16 16 16H448c8.8 0 16-7.2 16-16V212.2L322 328.8c-38.4 31.5-93.7 31.5-132 0L48 212.2zM0 128C0 92.7 28.7 64 64 64H448c35.3 0 64 28.7 64 64V384c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128z" />
                                                                                        </svg>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
            
                                                                
            
                                                                
            
                                                                <button data-modal-target="volverProspectoaCliente<?php echo e($cliente->id); ?>"
                                                                    data-modal-toggle="volverProspectoaCliente<?php echo e($cliente->id); ?>"
                                                                    type="button" title="Volver Prospecto"
                                                                    class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                                                                    <svg id="btnVolverProspecto" xmlns="http://www.w3.org/2000/svg"
                                                                        height="2em" class="m-auto" viewBox="0 0 512 512">
                                                                        <path
                                                                            d="M32 96l320 0V32c0-12.9 7.8-24.6 19.8-29.6s25.7-2.2 34.9 6.9l96 96c6 6 9.4 14.1 9.4 22.6s-3.4 16.6-9.4 22.6l-96 96c-9.2 9.2-22.9 11.9-34.9 6.9s-19.8-16.6-19.8-29.6V160L32 160c-17.7 0-32-14.3-32-32s14.3-32 32-32zM480 352c17.7 0 32 14.3 32 32s-14.3 32-32 32H160v64c0 12.9-7.8 24.6-19.8 29.6s-25.7 2.2-34.9-6.9l-96-96c-6-6-9.4-14.1-9.4-22.6s3.4-16.6 9.4-22.6l96-96c9.2-9.2 22.9-11.9 34.9-6.9s19.8 16.6 19.8 29.6l0 64H480z" />
                                                                    </svg>
                                                                </button>
            
                                                                <div id="volverProspectoaCliente<?php echo e($cliente->id); ?>" tabindex="-1"
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
                                                                                    data-modal-hide="volverProspectoaCliente<?php echo e($cliente->id); ?>">
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
                                                                                    class="text-center text-2xl font-bold text-custom-morado">
                                                                                    ¿Estas seguro de volver prospecto a este contacto?
                                                                                </div>
                                                                            </div>
                                                                            
            
                                                                            
                                                                            <div class="text-right">
                                                                                <div class="inline-flex">
                                                                                    <div class="m-4">
                                                                                        <button type="button" title="cancelar"
                                                                                            data-modal-hide="volverProspectoaCliente<?php echo e($cliente->id); ?>"
                                                                                            class="text-custom-header text-right bg-custom-morado focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2">
                                                                                            <svg id="btnCancelar" class="w-4 h-4"
                                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                                viewBox="0 0 384 512">
                                                                                                <path
                                                                                                    d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                                                                                            </svg>
                                                                                        </button>
                                                                                    </div>
            
                                                                                    <div class="m-4">
                                                                                        <button type="button" title="confirmar"
                                                                                            onclick="volverProspectoaCliente(<?php echo e($cliente->id); ?>)"
                                                                                            class="text-custom-header bg-custom-morado focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2">
                                                                                            <svg id="btnConfirmar" class="w-4 h-4"
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
            
                                                                
            
                                                                
            
                                                                <button data-modal-target="editarCliente<?php echo e($cliente->id); ?>"
                                                                    data-modal-toggle="editarCliente<?php echo e($cliente->id); ?>"
                                                                    type="button" title="Editar"
                                                                    class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                                                                    <svg id="editar" xmlns="http://www.w3.org/2000/svg"
                                                                        height="2em" class="m-auto" viewBox="0 0 640 512">
                                                                        <path
                                                                            d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H322.8c-3.1-8.8-3.7-18.4-1.4-27.8l15-60.1c2.8-11.3 8.6-21.5 16.8-29.7l40.3-40.3c-32.1-31-75.7-50.1-123.9-50.1H178.3zm435.5-68.3c-15.6-15.6-40.9-15.6-56.6 0l-29.4 29.4 71 71 29.4-29.4c15.6-15.6 15.6-40.9 0-56.6l-14.4-14.4zM375.9 417c-4.1 4.1-7 9.2-8.4 14.9l-15 60.1c-1.4 5.5 .2 11.2 4.2 15.2s9.7 5.6 15.2 4.2l60.1-15c5.6-1.4 10.8-4.3 14.9-8.4L576.1 358.7l-71-71L375.9 417z" />
                                                                    </svg>
                                                                </button>
            
                                                                <div id="editarCliente<?php echo e($cliente->id); ?>" tabindex="-1"
                                                                    aria-hidden="true"
                                                                    class="fixed z-50 hidden w-full p-6 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                                    <div class="relative w-full max-w-2xl max-h-full">
                                                                        <div class="relative bg-white rounded-lg shadow">
                                                                            
                                                                            <div
                                                                                class="bg-custom-morado flex items-start justify-between p-4 border-b rounded-t">
                                                                                <div
                                                                                    class="text-3xl text-start font-semibold text-white">
                                                                                    Editar Cliente <br>
                                                                                    <?php echo e($cliente->funeraria); ?> -
                                                                                    <?php echo e($cliente->nombre); ?>

                                                                                </div>
            
                                                                                <button type="button"
                                                                                    class="text-white bg-transparent hover:bg-custom-header hover:text-custom-linksmenu rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center"
                                                                                    data-modal-hide="editarCliente<?php echo e($cliente->id); ?>">
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
            
                                                                            
            
                                                                            
            
                                                                            <form
                                                                                action="<?php echo e(route('contactos.updateCliente', $cliente->id)); ?>"
                                                                                method="POST">
                                                                                <?php echo csrf_field(); ?>
                                                                                <?php echo method_field('put'); ?>
            
                                                                                <div class="grid grid-cols-3 gap-4 px-4">
                                                                                    <div class="text-center my-3">
                                                                                        <label for="funeraria"
                                                                                            class="text-base text-custom-morado">Funeraria:</label>
                                                                                        <input type="text"
                                                                                            class="rounded-lg text-custom-morado ml-2 w-full"
                                                                                            name="funeraria" id="funeraria"
                                                                                            value=<?php echo e($cliente->funeraria); ?>>
                                                                                    </div>
            
                                                                                    <div class="text-center my-3">
                                                                                        <label for="nombreContacto"
                                                                                            class="text-base text-custom-morado">Nombre:</label>
                                                                                        <input type="text"
                                                                                            class="rounded-lg text-custom-morado ml-2 w-full"
                                                                                            name="nombreContacto"
                                                                                            id="nombreContacto"
                                                                                            value=<?php echo e($cliente->nombre); ?>>
                                                                                    </div>
            
                                                                                    <div class="text-center my-3">
                                                                                        <label for="tipo"
                                                                                            class="text-base text-custom-morado">Tipo:</label>
            
                                                                                        <select name="tipoContacto" id="tipoContacto"
                                                                                            class="rounded-lg ml-2 h-10 w-full text-xs text-custom-morado">
                                                                                            <option value="">---Selecciona una
                                                                                                opción---</option>
                                                                                            <?php $__currentLoopData = $tiposContacto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                <option value="<?php echo e($tipo); ?>"
                                                                                                    <?php if($tipo == $cliente->tipo): ?> selected <?php endif; ?>>
                                                                                                    <?php echo e($tipo); ?>

                                                                                                </option>
                                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
            
                                                                                <hr
                                                                                    class="w-auto h-0 mx-auto my-4 bg-custom-morado customDashed">
            
                                                                                <div class="grid grid-cols-3 gap-4 px-4">
            
                                                                                    <div class="text-center my-3">
                                                                                        <label for="correo"
                                                                                            class="text-base text-custom-morado">Correo:</label>
                                                                                        <input type="email"
                                                                                            class="rounded-lg text-custom-morado ml-2 w-full"
                                                                                            name="correo" id="correo"
                                                                                            value=<?php echo e($cliente->correo); ?>>
                                                                                    </div>
            
                                                                                    <div class="text-center my-3">
                                                                                        <label for="telefono"
                                                                                            class="text-base text-custom-morado">Teléfono:</label>
                                                                                        <input type="tel"
                                                                                            class="rounded-lg text-custom-morado ml-2 w-full"
                                                                                            name="telefono" id="telefono"
                                                                                            value=<?php echo e($cliente->telefono); ?>>
                                                                                    </div>
            
                                                                                    <div class="text-center my-3">
                                                                                        <label for="celular"
                                                                                            class="text-base text-custom-morado">Celular:</label>
                                                                                        <input type="tel"
                                                                                            class="rounded-lg text-custom-morado ml-2 w-full"
                                                                                            name="celular" id="celular"
                                                                                            value=<?php echo e($cliente->celular); ?>>
                                                                                    </div>
                                                                                </div>
            
                                                                                <hr
                                                                                    class="w-auto h-0 mx-auto my-4 bg-custom-morado customDashed">
            
                                                                                <div class="grid grid-cols-3 gap-4 px-4 my-4">
            
                                                                                    <div class="text-center">
                                                                                        <label for="referenciado"
                                                                                            class="text-base text-custom-morado">Referenciado:</label>
                                                                                        <select name="referenciado"
                                                                                            id="referenciado"
                                                                                            class="rounded-lg ml-2 h-10 w-full text-xs text-custom-morado">
                                                                                            <option value="">---Selecciona una
                                                                                                opción---</option>
                                                                                            <?php $__currentLoopData = $contactos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contacto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                <option
                                                                                                    value="<?php echo e($contacto->referenciado); ?>"
                                                                                                    <?php if($contacto->referenciado == $cliente->referenciado): ?> selected <?php endif; ?>>
                                                                                                    <?php echo e($contacto->referenciado); ?>

                                                                                                </option>
                                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                        </select>
                                                                                    </div>
            
                                                                                    <div class="text-center">
                                                                                        <label for="origen"
                                                                                            class="text-base text-custom-morado">Origen:</label>
                                                                                        <select name="origen" id="origen"
                                                                                            class="rounded-lg ml-2 h-10 w-full text-xs text-custom-morado">
                                                                                            <option value="">---Selecciona una
                                                                                                opción---</option>
                                                                                            <?php $__currentLoopData = $origenContacto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $origen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                <option value="<?php echo e($origen); ?>"
                                                                                                    <?php if($origen == $cliente->origen): ?> selected <?php endif; ?>>
                                                                                                    <?php echo e($origen); ?>

                                                                                                </option>
                                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                        </select>
                                                                                    </div>
            
                                                                                    <div class="text-center">
                                                                                        <label for="fechaNacimiento"
                                                                                            class="text-base text-custom-morado">Fecha
                                                                                            de
                                                                                            nacimiento:</label>
                                                                                        <input type="date" name="fechaNacimiento"
                                                                                            id="fechaNacimiento"
                                                                                            class="rounded-lg ml-2 h-10 w-full text-xs text-custom-morado"
                                                                                            value=<?php echo e($cliente->fechaNacimiento); ?>>
                                                                                    </div>
                                                                                </div>
            
                                                                                <div class="grid grid-cols-2 gap-6 px-4 my-4">
                                                                                    <div class="text-center">
                                                                                        <label for="fechaIngreso"
                                                                                            class="text-base text-custom-morado">Fecha
                                                                                            de
                                                                                            Ingreso:</label>
                                                                                        <input type="date" name="fechaIngreso"
                                                                                            id="fechaIngreso"
                                                                                            class="rounded-lg ml-2 h-10 w-full text-xs text-custom-morado"
                                                                                            value=<?php echo e($cliente->fechaIngreso); ?>>
                                                                                    </div>
                                                                                    <div class="text-center">
                                                                                        <label for="vigencia"
                                                                                            class="text-base text-custom-morado">Vigencia:</label>
                                                                                        <input type="date" name="vigencia"
                                                                                            id="vigencia"
                                                                                            class="rounded-lg ml-2 h-10 w-full text-xs text-custom-morado"
                                                                                            value=<?php echo e($cliente->vigencia); ?>>
                                                                                    </div>
                                                                                </div>
            
                                                                                <div class="grid grid-cols-3 gap-4 px-4 my-4">
            
                                                                                    <div class="text-center">
                                                                                        <label for="profesion"
                                                                                            class="text-base text-custom-morado">Profesion:</label>
                                                                                        <input type="text"
                                                                                            class="rounded-lg text-custom-morado ml-2 w-full"
                                                                                            name="profesion" id="profesion"
                                                                                            value=<?php echo e($cliente->profesion); ?>>
                                                                                    </div>
            
                                                                                    <div class="text-center">
                                                                                        <label for="empresas"
                                                                                            class="text-base text-custom-morado">Empresa:</label>
            
                                                                                        <div class="flex items-center">
                                                                                            <select name="empresas" id="empresas"
                                                                                                class="rounded-lg ml-2 h-10 w-full text-xs text-custom-morado">
                                                                                                <option value="">---Selecciona
                                                                                                    una opción---</option>
                                                                                                <?php $__currentLoopData = $empresas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $empresa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                    <option
                                                                                                        value="<?php echo e($empresa->id); ?>"
                                                                                                        <?php if($empresa->id == $cliente->empresas_id): ?> selected <?php endif; ?>>
                                                                                                        <?php echo e($empresa->nombreEmpresa); ?>

                                                                                                    </option>
                                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
            
                                                                                    <div class="text-center">
                                                                                        <label for="ingresos"
                                                                                            class="text-base text-custom-morado">Ingresos:</label>
                                                                                        <input type="number" name="ingresos"
                                                                                            id="ingresos"
                                                                                            class="rounded-lg ml-2 mt-1 w-full text-xs text-custom-morado"
                                                                                            value=<?php echo e($cliente->ingresos); ?>>
                                                                                    </div>
            
                                                                                </div>
            
                                                                                <div class="grid grid-cols-3 gap-4 px-4 my-4">
            
                                                                                    <div class="text-center">
                                                                                        <label for="calle"
                                                                                            class="text-base text-custom-morado">Calle:</label>
                                                                                        <input type="text"
                                                                                            class="rounded-lg text-custom-morado ml-2 w-full"
                                                                                            name="calle" id="calle"
                                                                                            value=<?php echo e($cliente->calle); ?>>
                                                                                    </div>
            
                                                                                    <div class="text-center">
                                                                                        <label for="noExterior"
                                                                                            class="text-base text-custom-morado">No.
                                                                                            Exterior:</label>
                                                                                        <input type="text"
                                                                                            class="rounded-lg text-custom-morado ml-2 w-full"
                                                                                            name="noExterior" id="noExterior"
                                                                                            value=<?php echo e($cliente->noExterior); ?>>
                                                                                    </div>
            
                                                                                    <div class="text-center">
                                                                                        <label for="noInterior"
                                                                                            class="text-base text-custom-morado">No.
                                                                                            Interior:</label>
                                                                                        <input type="text"
                                                                                            class="rounded-lg text-custom-morado ml-2 w-full"
                                                                                            name="noInterior" id="noInterior"
                                                                                            value=<?php echo e($cliente->noInterior); ?>>
                                                                                    </div>
            
                                                                                </div>
            
                                                                                <div class="grid grid-cols-3 gap-4 px-4 my-4">
            
                                                                                    <div class="text-center">
                                                                                        <label for="colonias_id"
                                                                                            class="text-base text-custom-morado">Colonia:</label>
                                                                                        <div class="flex items-center">
                                                                                            <select name="colonias_id"
                                                                                                id="colonia"
                                                                                                class="rounded-lg ml-2 h-10 w-full text-xs text-custom-morado">
                                                                                                <option value="">---Selecciona
                                                                                                    una opción---</option>
                                                                                                <?php $__currentLoopData = $colonias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $colonia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                    <option
                                                                                                        value="<?php echo e($colonia->id); ?>"
                                                                                                        <?php if($colonia->id == $cliente->colonias_id): ?> selected <?php endif; ?>>
                                                                                                        <?php echo e($colonia->colonia); ?>

                                                                                                    </option>
                                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
            
                                                                                    <div class="text-center">
                                                                                        <label for="localidad"
                                                                                            class="text-base text-custom-morado">Localidad:</label>
                                                                                        <input type="text"
                                                                                            class="rounded-lg text-custom-morado ml-2 w-full"
                                                                                            name="localidad" id="localidad"
                                                                                            value=<?php echo e($cliente->localidad); ?>>
                                                                                    </div>
            
                                                                                    <div class="text-center">
                                                                                        <label for="municipio"
                                                                                            class="text-base text-custom-morado">Municipio:</label>
                                                                                        <input type="text"
                                                                                            class="rounded-lg text-custom-morado ml-2 w-full"
                                                                                            name="municipio" id="municipio"
                                                                                            value=<?php echo e($cliente->municipio); ?>>
                                                                                    </div>
            
                                                                                </div>
            
                                                                                <div class="grid grid-cols-3 gap-4 px-4 my-4">
            
                                                                                    <div class="text-center">
                                                                                        <label for="estado"
                                                                                            class="text-base text-custom-morado">Estado:</label>
                                                                                        <input type="text"
                                                                                            class="rounded-lg text-custom-morado ml-2 w-full"
                                                                                            name="estado" id="estado"
                                                                                            value=<?php echo e($cliente->estado); ?>>
                                                                                    </div>
            
                                                                                    <div class="text-center">
                                                                                        <label for="pais"
                                                                                            class="text-base text-custom-morado">Pais:</label>
                                                                                        <input type="text"
                                                                                            class="rounded-lg text-custom-morado ml-2 w-full"
                                                                                            name="pais" id="pais"
                                                                                            value=<?php echo e($cliente->pais); ?>>
                                                                                    </div>
            
                                                                                    <div class="text-center">
                                                                                        <label for="codigoP"
                                                                                            class="text-base text-custom-morado">C.P.:</label>
                                                                                        <input type="number" name="codPostal"
                                                                                            id="codPostal"
                                                                                            class="rounded-lg ml-2 mt-1 w-full text-xs text-custom-morado"
                                                                                            value=<?php echo e($cliente->codPostal); ?>>
                                                                                    </div>
                                                                                </div>
            
                                                                                <div class="text-start ms-5">
                                                                                    <label for="usuarios"
                                                                                        class="text-base text-custom-morado">Usuario
                                                                                        al que se le
                                                                                        asignara:</label>
                                                                                    <select name="usuarios" id="usuarios"
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
            
                                                                                <hr
                                                                                    class="w-auto h-0 mx-auto my-4 bg-custom-morado customDashed">
            
                                                                                <label for="Observaciones"
                                                                                    class="block text-start ml-4 my-2 text-base text-custom-morado">Observaciones:</label>
                                                                                <textarea name="observaciones" id="message" rows="4"
                                                                                    class="block p-3 w-4/5 m-auto text-sm bg-white rounded-lg text-custom-morado border-2 border-green-300 focus:ring-blue-500 focus:border-blue-500"><?php echo e($cliente->observaciones); ?></textarea>
            
                                                                                <div class="text-right p-2 border-y rounded-b">
                                                                                    <button
                                                                                        data-modal-hide="editarCliente<?php echo e($cliente->id); ?>"
                                                                                        type="submit"
                                                                                        class="text-custom-header bg-custom-morado focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2">
                                                                                        Actualizar contacto</button>
                                                                                </div>
                                                                            </form>
            
                                                                            
                                                                        </div>
                                                                    </div>
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
                    </div>
                </div>
            
                <div id="tablaDescartados" style="display: none">
                    <div class="overflow-x-auto  sm:rounded-lg my-4">
                        <table class="text-sm w-full text-left text-custom-linksmenu">
                            <thead class="text-sm text-custom-linksmenu uppercase bg-purple-300 border-b-2 border-custom-morado my-4">
                                <tr class="text-center">
                                    <th scope="col" class="px-4 py-3">
                                        Fecha de Descartado
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Funeraria
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Nombre
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Causa
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Detalles
                                    </th>
                                </tr>
                            </thead>
            
                            <?php $__currentLoopData = $detalleDescartados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $descartado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tbody>
                                    <tr class="bg-slate-600 border border-gray-300 text-white">
                                        <td class="text-center">
                                            <?php echo e($descartado->fecha); ?>

                                        </td>
                                        <td class="text-center">
                                            <?php echo e($descartado->funeraria); ?>

                                        </td>
                                        <td class="text-center">
                                            <?php echo e($descartado->nombre); ?>

                                        </td>
                                        <td class="text-center">
                                            <?php echo e($descartado->causa); ?>

                                        </td>
                                        <td>
                                            <div class="flex justify-center items-center">
                                                <!-- Modal toggle -->
                                                <button data-modal-target="detalleDescartado<?php echo e($descartado->id); ?>"
                                                    data-modal-toggle="detalleDescartado<?php echo e($descartado->id); ?>"
                                                    class="my-2 text-white bg-slate-800 hover:bg-slate-950 rounded-lg text-center px-2 py-2"
                                                    type="button">
                                                    <svg class="w-6 h-6 text-white" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                                    </svg>
                                                </button>
                                            </div>
            
                                            <!-- Modal Detalles -->
                                            <div id="detalleDescartado<?php echo e($descartado->id); ?>" tabindex="-1" aria-hidden="true"
                                                class="fixed z-50 hidden w-full p-6 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                <div class="relative w-full max-w-2xl max-h-full">
            
                                                    <div class="relative bg-white rounded-lg shadow">
            
                                                        <!-- Modal header -->
                                                        <div
                                                            class="bg-custom-morado flex items-start justify-between p-4 border-b rounded-t">
                                                            <div class="text-3xl font-semibold text-white">
                                                                Detalles de Descartado <br>
                                                                <?php echo e($descartado->funeraria); ?> - <?php echo e($descartado->nombre); ?>

                                                            </div>
            
                                                            <button type="button"
                                                                class="text-white bg-transparent hover:bg-custom-header hover:text-custom-linksmenu rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center"
                                                                data-modal-hide="detalleDescartado<?php echo e($descartado->id); ?>">
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
                                                                        data-tab="detalles <?php echo e($descartado->id); ?>">Detalles</a>
                                                                </li>
                                                                <li>
                                                                    <a class="text-custom-linksmenu cursor-pointer"
                                                                        data-tab="citas <?php echo e($descartado->id); ?>">Citas</a>
                                                                </li>
                                                                <li>
                                                                    <a class="text-custom-linksmenu cursor-pointer"
                                                                        data-tab="preferencias <?php echo e($descartado->id); ?>">Preferencias</a>
                                                                </li>
                                                                <li>
                                                                    <a class="text-custom-linksmenu cursor-pointer"
                                                                        data-tab="cotizaciones <?php echo e($descartado->id); ?>">Cotizaciones</a>
                                                                </li>
                                                                <li>
                                                                    <a class="text-custom-linksmenu cursor-pointer"
                                                                        data-tab="ventas <?php echo e($descartado->id); ?>">Ventas</a>
                                                                </li>
                                                            </ul>
            
            
                                                            <div class="border p-4 rounded-b">
                                                                <div id="detalles <?php echo e($descartado->id); ?>"
                                                                    class="tab-content text-black">
                                                                    <div class="inline-flex my-5 px-2 text-sm text-custom-morado">
                                                                        <div>
                                                                            <strong>Funeraria: </strong> <?php echo e($descartado->funeraria); ?>

                                                                        </div>
                                                                        <div class="px-3">
                                                                            <strong>Nombre: </strong> <?php echo e($descartado->nombre); ?>

                                                                        </div>
                                                                    </div>
            
                                                                    <div
                                                                        class="grid grid-cols-3 gap-4 px-2 text-custom-morado text-sm">
                                                                        <div>
                                                                            <strong>Antiguedad: </strong>
                                                                            <?php echo e($antiguedadDescartados[$loop->index]->diasDesdeIngreso); ?>

                                                                        </div>
                                                                        <div class="px-3">
                                                                            <strong>No. de Citas: </strong>
                                                                            <?php echo e($citasPorDescartados[$loop->index]->noCitas); ?>

                                                                        </div>
                                                                        <div class="px-3">
                                                                            <strong>Tipo: </strong> Descartado
                                                                        </div>
                                                                    </div>
            
                                                                    <hr class="w-auto h-0 mx-3 my-5 bg-custom-morado customDashed">
            
                                                                    <div
                                                                        class="grid grid-cols-3 gap-4 px-2 text-custom-morado text-sm">
                                                                        <div>
                                                                            <strong>Teléfono: </strong> <?php echo e($descartado->telefono); ?>

                                                                        </div>
                                                                        <div class="px-3">
                                                                            <strong>Email: </strong> <?php echo e($descartado->correo); ?>

                                                                        </div>
                                                                    </div>
            
                                                                    <hr class="w-auto h-0 mx-3 my-5 bg-custom-morado customDashed">
            
                                                                    <div
                                                                        class="grid grid-cols-3 py-3 gap-4 px-2 text-custom-morado text-sm">
                                                                        <div>
                                                                            <strong>Referenciado: </strong>
                                                                            <?php echo e($descartado->referenciado); ?>

                                                                        </div>
                                                                        <div class="px-3">
                                                                            <strong>Origen: </strong> <?php echo e($descartado->origen); ?>

                                                                        </div>
                                                                        <div class="px-3">
                                                                            <strong>Fecha de Ingreso: </strong>
                                                                            <?php echo e($descartado->fechaIngreso); ?>

                                                                        </div>
                                                                    </div>
            
                                                                    <div
                                                                        class="grid grid-cols-3 py-3 gap-4 px-2 text-custom-morado text-sm">
                                                                        <div>
                                                                            <strong>Profesión: </strong> <?php echo e($descartado->profesion); ?>

                                                                        </div>
                                                                        <div class="px-3">
                                                                            <strong>Empresa: </strong>
                                                                            <?php echo e($empresasDescartados[$loop->index]->nombreEmpresa); ?>

                                                                        </div>
                                                                        <div class="px-3">
                                                                            <strong>Ingresos: </strong> <?php echo e($descartado->ingresos); ?>

                                                                        </div>
                                                                    </div>
            
                                                                    <div
                                                                        class="grid grid-cols-3 gap-4 py-3 px-2 text-custom-morado text-sm">
                                                                        <div>
                                                                            <strong>Calle: </strong> <?php echo e($descartado->calle); ?>

                                                                        </div>
                                                                        <div class="px-3">
                                                                            <strong>No. Exterior: </strong>
                                                                            <?php echo e($descartado->noExterior); ?>

                                                                        </div>
                                                                        <div class="px-3">
                                                                            <strong>No. Interior: </strong>
                                                                            <?php echo e($descartado->noInterior); ?>

                                                                        </div>
                                                                    </div>
            
                                                                    <div
                                                                        class="grid grid-cols-3 gap-4 py-3 px-2 text-custom-morado text-sm">
                                                                        <div>
                                                                            <strong>Colonia: </strong>
                                                                            <?php echo e($coloniasDescartados[$loop->index]->colonia); ?>

                                                                        </div>
                                                                        <div class="px-3">
                                                                            <strong>Localidad: </strong> <?php echo e($descartado->localidad); ?>

                                                                        </div>
                                                                        <div class="px-3">
                                                                            <strong>Municipio: </strong> <?php echo e($descartado->municipio); ?>

                                                                        </div>
                                                                    </div>
            
                                                                    <div
                                                                        class="grid grid-cols-3 gap-4 py-3 px-2 text-custom-morado text-sm">
                                                                        <div>
                                                                            <strong>Estado: </strong> <?php echo e($descartado->estado); ?>

                                                                        </div>
                                                                        <div class="px-3">
                                                                            <strong>País: </strong> <?php echo e($descartado->pais); ?>

                                                                        </div>
                                                                        <div class="px-3">
                                                                            <strong>C.P.: </strong> <?php echo e($descartado->codPostal); ?>

                                                                        </div>
                                                                    </div>
            
                                                                    <hr class="w-auto h-0 mx-3 my-5 bg-custom-morado customDashed">
            
                                                                    <div class="px-2 text-custom-morado text-sm py-3">
                                                                        <p>
                                                                            <strong>Observaciones: </strong>
                                                                            <?php echo e($descartado->observaciones); ?>

                                                                        </p>
                                                                    </div>
                                                                </div>
            
                                                                <div id="citas <?php echo e($descartado->id); ?>"
                                                                    class="tab-content hidden text-black">
            
                                                                    <div class="text-center text-2xl text-custom-morado">
                                                                        <?php echo e($citasPorDescartados[$loop->index]->noCitas); ?>/<?php echo e($numeroCitasDescartados); ?>

                                                                        citas realizadas
                                                                    </div>
            
                                                                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                                                        <table
                                                                            class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                                            <thead
                                                                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                                                <tr>
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
            
                                                                            <?php $__currentLoopData = $citasDescartados[$descartado->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <tbody>
                                                                                    <tr class="bg-white border-b">
                                                                                        <td class="px-6 py-4">
                                                                                            <?php echo e($cita->fecha); ?>

                                                                                        </td>
                                                                                        <td class="px-6 py-4">
                                                                                            <?php echo e($cita->horaInicio); ?>

                                                                                        </td>
                                                                                        <td class="px-6 py-4">
                                                                                            <?php echo e($cita->duracion); ?> minutos
                                                                                        </td>
                                                                                        <td class="px-6 py-4">
                                                                                            <?php echo e($cita->estado); ?>

                                                                                        </td>
                                                                                        <td class="px-6 py-4">
                                                                                            <?php echo e($cita->comentarios); ?>

                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </table>
                                                                    </div>
                                                                </div>
            
                                                                <div id="preferencias <?php echo e($descartado->id); ?>"
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
                                                                                    class="ml-2 text-sm font-medium text-gray-900">6 X
                                                                                    15</label>
                                                                            </div>
                                                                            <div class="flex justify-center items-center">
                                                                                <input id="default-checkbox" type="checkbox"
                                                                                    value=""
                                                                                    class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                <label for="default-checkbox"
                                                                                    class="ml-2 text-sm font-medium text-gray-900">6 X
                                                                                    6</label>
                                                                            </div>
                                                                            <div class="flex justify-center items-center">
                                                                                <input id="default-checkbox" type="checkbox"
                                                                                    value=""
                                                                                    class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                <label for="default-checkbox"
                                                                                    class="ml-2 text-sm font-medium text-gray-900">3 X
                                                                                    9</label>
                                                                            </div>
                                                                            <div class="flex justify-center items-center">
                                                                                <input id="default-checkbox" type="checkbox"
                                                                                    value=""
                                                                                    class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                <label for="default-checkbox"
                                                                                    class="ml-2 text-sm font-medium text-gray-900">3 X
                                                                                    6</label>
                                                                            </div>
                                                                            <div class="flex justify-center items-center">
                                                                                <input id="default-checkbox" type="checkbox"
                                                                                    value=""
                                                                                    class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                <label for="default-checkbox"
                                                                                    class="ml-2 text-sm font-medium text-gray-900">3 X
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
            
                                                                <div id="cotizaciones <?php echo e($descartado->id); ?>"
                                                                    class="tab-content hidden text-black">
                                                                    <div class="overflow-x-auto shadow-md sm:rounded-lg my-4">
            
                                                                        <table class="text-sm w-full text-left text-custom-linksmenu">
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
                                                                                <?php $__currentLoopData = $cotizacionesDescartados[$descartado->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cotizacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <tbody>
                                                                                        <td class="px-6 py-4 text-center"><?php echo e($cotizacion->id); ?>

                                                                                        </td>
                                                                                        <td class="px-6 py-4 text-center"><?php echo e($cotizacion->fecha); ?></td>
                                                                                        <td class="px-6 py-4 text-center"><?php echo e($cotizacion->total); ?></td>
                                                                                        <td class="px-6 py-4 text-center"><?php echo e($cotizacion->estado); ?>

                                                                                        </td>
                                                                                        <td>
                                                                                            <button type="button" title="Ver cotización"
                                                                                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center bg-custom-morado rounded-lg">
                                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                    class="m-auto" height="2em"
                                                                                                    viewBox="0 0 448 512">
                                                                                                    <path
                                                                                                        d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z" />
                                                                                                </svg>
                                                                                            </button>
                                                                                        </td>
                                                                                    </tbody>
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
            
                                                                <div id="ventas <?php echo e($descartado->id); ?>"
                                                                    class="tab-content hidden text-black">
                                                                    <div class="overflow-x-auto shadow-md sm:rounded-lg my-4">
                                                                        <table class="text-sm w-full text-left text-custom-linksmenu">
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
            
                                                                            <?php $__currentLoopData = $ventasDescartados[$descartado->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $venta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <tbody>
                                                                                    <td class="px-6 py-4"><?php echo e($venta->referencia); ?>

                                                                                    </td>
                                                                                    <td class="px-6 py-4"><?php echo e($venta->fecha); ?></td>
                                                                                    <td class="px-6 py-4"><?php echo e($venta->total); ?></td>
                                                                                    <td class="px-6 py-4">
                                                                                        <?php echo e($venta->observaciones); ?></td>
                                                                                    <td class="px-6 py-4"><?php echo e($venta->name); ?></td>
                                                                                </tbody>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </table>
            
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
            
                                                        
            
                                                        
            
                                                        <div class="text-right">
                                                            <div class="inline-flex p-3">
            
                                                                <button data-modal-target="activarDescartado<?php echo e($descartado->id); ?>"
                                                                    data-modal-toggle="activarDescartado<?php echo e($descartado->id); ?>"
                                                                    type="button" title="Activar descartado"
                                                                    class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                                                                    <svg id= "activarDescartado" xmlns="http://www.w3.org/2000/svg"
                                                                        height="2em" class="auto"
                                                                        viewBox="0 0 448 512">
                                                                        <path
                                                                            d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                                                                    </svg>
                                                                </button>
            
                                                                <div id="activarDescartado<?php echo e($descartado->id); ?>" tabindex="-1" aria-hidden="true"
                                                                    class="fixed z-50 hidden w-full p-6 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                                    <div class="relative w-full max-w-2xl max-h-full">
                                
                                                                        <div class="relative bg-white rounded-lg shadow">
                                
                                                                            <!-- Modal header -->
                                                                            <div
                                                                                class="bg-custom-morado flex items-start justify-between p-4 border-b rounded-t">
                                                                                <div class="text-3xl text-start font-semibold text-white">
                                                                                    Detalles de Descartado <br>
                                                                                    <?php echo e($descartado->funeraria); ?> - <?php echo e($descartado->nombre); ?>

                                                                                </div>
                                
                                                                                <button type="button"
                                                                                    class="text-white bg-transparent hover:bg-custom-header hover:text-custom-linksmenu rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center"
                                                                                    data-modal-hide="activarDescartado<?php echo e($descartado->id); ?>">
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
                                                                            
            
                                                                            
            
                                                                            <div class="text-lg text-start text-custom-morado my-3 px-4">
                                                                                <?php echo e($descartado->funeraria); ?> - <?php echo e($descartado->nombre); ?>

                                                                            </div>
            
                                                                            <form
                                                                                action="<?php echo e(route('contactos.activateDescartado', $descartado->id)); ?>"
                                                                                method="POST">
                                                                                <?php echo csrf_field(); ?>
                                                                                <?php echo method_field('put'); ?>
            
                                                                                <input type="hidden" name="funeraria" value="<?php echo e($descartado->funeraria); ?>">
                                                                                <input type="hidden" name="nombreContacto" value="<?php echo e($descartado->nombre); ?>">
                                                                                <div class="text-base text-start px-4 my-2 text-custom-morado">
                                                                                    Activar como:
                                                                                        <select name="tipoContacto" id="tipoContacto"
                                                                                            class="rounded-lg ml-2 h-10 w-3/4 text-xs text-custom-morado">
                                                                                            <option value="">---Selecciona una
                                                                                                opción---</option>
                                                                                            <option value="Candidato">Candidato</option> 
                                                                                            <option value="Prospecto">Prospecto</option> 
                                                                                        </select>
                                                                                </div>
                                                                                
                                                                                <input type="hidden" name="correo" value="<?php echo e($descartado->correo); ?>">
                                                                                <input type="hidden" name="telefono" value="<?php echo e($descartado->telefono); ?>">
                                                                                <input type="hidden" name="celular" value="<?php echo e($descartado->celular); ?>">
                                                                                <input type="hidden" name="referenciado" value="<?php echo e($descartado->referenciado); ?>">
                                                                                <input type="hidden" name="origen" value="<?php echo e($descartado->origen); ?>">
                                                                                <input type="hidden" name="fechaNacimiento" value="<?php echo e($descartado->fechaNacimiento); ?>">
                                                                                <input type="hidden" name="fechaIngreso" value="<?php echo e($descartado->fechaIngreso); ?>">
                                                                                <input type="hidden" name="vigencia" value="<?php echo e($descartado->vigencia); ?>">
                                                                                <input type="hidden" name="profesion" value="<?php echo e($descartado->profesion); ?>">
                                                                                <input type="hidden" name="empresas" value="<?php echo e($descartado->empresas_id); ?>">
                                                                                <input type="hidden" name="ingresos" value="<?php echo e($descartado->ingresos); ?>">
                                                                                <input type="hidden" name="calle" value="<?php echo e($descartado->calle); ?>">
                                                                                <input type="hidden" name="noExterior" value="<?php echo e($descartado->noExterior); ?>">
                                                                                <input type="hidden" name="noInterior" value="<?php echo e($descartado->noInterior); ?>">
                                                                                <input type="hidden" name="colonias_id" value="<?php echo e($descartado->colonias_id); ?>">
                                                                                <input type="hidden" name="localidad" value="<?php echo e($descartado->localidad); ?>">
                                                                                <input type="hidden" name="municipio" value="<?php echo e($descartado->municipio); ?>">
                                                                                <input type="hidden" name="estado" value="<?php echo e($descartado->estado); ?>">
                                                                                <input type="hidden" name="pais" value="<?php echo e($descartado->pais); ?>">
                                                                                <input type="hidden" name="codPostal" value="<?php echo e($descartado->codPostal); ?>">
                                                                                <input type="hidden" name="observaciones" value="<?php echo e($descartado->observaciones); ?>">
                                                                                <input type="hidden" name="usuarios" value="<?php echo e($descartado->users_id); ?>">
            
                                                                                
            
                                                                                
            
                                                                                <div class="text-right">
                                                                                    <div class="inline-flex p-2 space-x-3">
                                                                                        <button type="button" title="cancelar"
                                                                                            class="bg-custom-morado rounded-lg w-10 h-10 ml-auto inline-flex justify-center items-center"
                                                                                            data-modal-hide="activarDescartado<?php echo e($descartado->id); ?>">
                                                                                            <svg class="w-6 h-6" aria-hidden="true"
                                                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                                                viewBox="0 0 14 14">
                                                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                                                    stroke-linejoin="round" stroke-width="2"
                                                                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                                            </svg>
                                                                                            <span class="sr-only">Close modal</span>
                                                                                        </button>
                                                                                        <button type="submit" title="Activar descartado"
                                                                                            class="bg-custom-morado rounded-lg w-10 h-10 ml-auto inline-flex justify-center items-center">
                                                                                            <svg id="btnActivar" class="w-6 h-6" aria-hidden="true"
                                                                                                xmlns="http://www.w3.org/2000/svg" 
                                                                                                viewBox="0 0 512 512">
                                                                                                <path 
                                                                                                    d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-111 111-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L369 209z"/>
                                                                                            </svg>
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
            
                                                                            
            
                                                                        </div>
                                                                    </div>
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
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        function mostrarBarra(clase) {
            $(".barraColor > div").hide();
            $("." + clase).show();
        }

        $(document).ready(function() {
            mostrarBarra("barraCandidatos");
            datosContactos('1');
        })

        function datosContactos(id) {
            switch (id) {
                case "1":
                    $("#tablaCandidatos").show();
                    $("#tablaProspectos").hide();
                    $("#tablaClientes").hide();
                    $("#tablaDescartados").hide();
                    break;
                case "2":
                    $("#tablaCandidatos").hide();
                    $("#tablaProspectos").show();
                    $("#tablaClientes").hide();
                    $("#tablaDescartados").hide();
                    break;
                case "3":
                    $("#tablaCandidatos").hide();
                    $("#tablaProspectos").hide();
                    $("#tablaClientes").show();
                    $("#tablaDescartados").hide();
                    break;
                case "4":
                    $("#tablaCandidatos").hide();
                    $("#tablaProspectos").hide();
                    $("#tablaClientes").hide();
                    $("#tablaDescartados").show();
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

        function volverProspecto(candidato) {
            const url = `<?php echo e(url('contactos')); ?>/${candidato}`;

            fetch(url, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                    },
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error al volver prospecto el contacto');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Contacto actualizado', data);
                    location.reload();
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

        function volverCandidato(prospecto) {
            const url = `<?php echo e(url('contactos')); ?>/${prospecto}`;

            fetch(url, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                    },
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error al volver candidato al contacto');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Contacto actualizado', data);
                    location.reload();
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

        function volverProspectoaCliente(cliente) {
            const url = `<?php echo e(url('contactos')); ?>/${cliente}`;

            fetch(url, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                    },
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error al volver prospecto al contacto');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Contacto actualizado', data);
                    location.reload();
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

        function descartarCandidato(candidato) {
            const url = `<?php echo e(url('contactos')); ?>/${candidato}/descartar`;

            fetch(url, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                    },
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error al descartar contacto');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Contacto descartado correctamente', data);
                    location.reload();
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

        function descartarProspecto(prospecto) {
            const url = `<?php echo e(url('contactos')); ?>/${prospecto}/descartar`;

            fetch(url, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                    },
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error al descartar contacto');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Contacto descartado correctamente', data);
                    location.reload();
                })
                .catch(error => {
                    console.error('Error:', error);
                });
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
<?php /**PATH C:\xampp\htdocs\ANDF\jetStream\resources\views\contactos.blade.php ENDPATH**/ ?>