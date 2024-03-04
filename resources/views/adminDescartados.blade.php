<style>
    #btnActivarDescartado,
    #btnCancelar {
        fill: white;
    }
</style>

<x-app-layout>

    {{-- <x-slot name="header">
        <h2 class="font-bold text-xl text-blue-800 leading-tight">
            Tracking by ANDF
        </h2>
    </x-slot> --}}

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-purple-300 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="mt-4 ml-6 font-bold text-4xl text-slate-950 flex items-center">
                    Administración

                    <span class="font-normal text-lg text-custom-morado ml-6 mt-3">
                        Descartados |
                    </span>
                </div>

                <hr class="w-3/4 h-1 mx-auto my-4 bg-custom-morado border-0 rounded md:my-5">

                <div class="rounded-lg {{-- shadow-2xl --}} p-6 my-3">
                    <form action="{{ route('adminDescartados') }}" method="get">
                        <div class="bg-purple-300 border border-custom-morado rounded-lg p-4">
                            <div class="text-xl font-semibold text-center text-custom-morado mb-2">Colaboradores
                            </div>

                            <select name="colaboradores" id="colaboradores"
                                class="block py-2.5 px-0 w-3/4 text-lg mx-auto text-center text-slate-950 bg-purple-300 border-0 border-b-2 border-custom-morado">
                                <option selected>Selecciona un colaborador</option>
                                 @foreach ($usuarios->sortBy(function ($usuario) use ($ordenPuestos) {
        return $ordenPuestos[$usuario->puesto];
    }) as $usuario)
                                    <option value="{{ $usuario->id }}" class="text-base">
                                        {{ $usuario->name }}-{{ $usuario->puesto }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex flex-wrap px-5 my-4">
                            <div class="basis-3/12">
                                <div class="text-lg font-bold text-custom-morado">Rango de fechas:</div>
                                <div class="my-2">
                                    <select name="rangoFechas" id="rangoFechas"
                                        class="block rounded-lg py-2.5 px-0 w-4/5 text-lg text-black bg-purple-300 border-0 border-b-2 border-custom-morado">
                                        <option selected value="todas">Todas</option>
                                        <option value="personalizada" class="text-base">Personalizada</option>
                                    </select>
                                </div>
                            </div>

                            <div class="basis-3/12">
                                <div class="text-lg font-bold text-custom-morado">Fecha Inicial:</div>
                                <div class="my-2">
                                    <input type="date" name="fechaInicial" id="fechaInicial"
                                        class="rounded-lg w-4/5 bg-purple-300 border-0 border-b-2 border-custom-morado h-12">
                                </div>
                            </div>

                            <div class="basis-3/12">
                                <div class="text-lg font-bold text-custom-morado">Fecha Final:</div>
                                <div class="my-2">
                                    <input type="date" name="fechaFinal" id="fechaFinal"
                                        class="rounded-lg w-4/5 bg-purple-300 border-0 border-b-2 border-custom-morado h-12">
                                </div>
                            </div>

                            <div class="basis-3/12">
                                <button type="submit"
                                    class="text-white bg-indigo-700 hover:bg-indigo-900 font-bold rounded-lg text-lg w-full sm:w-auto mt-11 mx-2 px-5 py-2.5 text-center">Generar
                                    Reporte</button>
                            </div>
                        </div>
                    </form>
                </div>

                {{-- <div class="flex items-center justify-end">
                    <div class ="flex items-center text-2xl text-custom-morado cursor-pointer">
                        <span><svg id="btnActivar" xmlns="http://www.w3.org/2000/svg" height="1.5em"
                                viewBox="0 0 448 512">
                                <path
                                    d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                            </svg></span>
                        <div class="px-2">Activar seleccionados</div>
                    </div>
                </div> --}}

                <table class="text-sm w-full m-auto px-6 text-left text-custom-linksmenu">
                    <thead class="text-lg text-custom-linksmenu uppercase bg-purple-300 border-b-2 border-custom-morado my-4">
                        <tr class="text-center">
                            {{-- <th scope="col" class="px-4 py-3">
                                <input type="checkbox" name="activarDescartado" id="activarDescartado"
                                    class="rounded-sm">
                            </th> --}}
                            <th scope="col" class="px-4 py-3">
                                Fecha de descartado
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
                                Colaborador
                            </th>
                            <th scope="col" class="px-4 py-3">
                                Activar
                            </th>
                        </tr>
                    </thead>
                    @foreach ($descartados as $descartado)
                    <tbody>
                        <tr class="text-lg bg-teal-500 hover:bg-teal-700 text-white">
                            {{-- <td class="text-center">
                                <input type="checkbox" name="activarDescartado" id="activarDescartado"
                                    class="rounded-sm">
                            </td> --}}
                            <td class="text-center">
                                {{ $descartado->fecha }}
                            </td>
                            <td class="text-center">
                                {{ $descartado->funeraria }}
                            </td>
                            <td class="text-center">
                                {{ $descartado->nombre }}
                            </td>
                            <td class="text-center">
                                {{ $descartado->causa }}
                            </td>
                            <td class="text-center">
                                {{ $descartado->nombreAsesor }}
                            </td>
                            <td class="text-center">

                                {{-- Modal activar descartado --}}

                                <button 
                                data-modal-target="activarDescartado{{ $descartado->id }}"
                                    data-modal-toggle="activarDescartado{{ $descartado->id }}"
                                    class="my-2 text-white bg-custom-morado hover:bg-fuchsia-800 rounded-lg text-center px-2 py-2"
                                    type="button">
                                    <svg id="btnactivarDescartado" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                                    </svg>
                                </button>

                                <div id="activarDescartado{{ $descartado->id }}" tabindex="-1" aria-hidden="true"
                                    class="fixed z-50 hidden w-full p-6 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative w-full max-w-2xl max-h-full">

                                        <div class="relative bg-white rounded-lg shadow">

                                            <!-- Modal header -->
                                            <div
                                                class="bg-custom-morado flex items-start justify-between p-4 border-b rounded-t">
                                                <div class="text-3xl font-semibold text-white">
                                                    ACTIVAR
                                                </div>

                                                <button type="button"
                                                    class="text-white bg-transparent hover:bg-custom-header hover:text-custom-linksmenu rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center"
                                                    data-modal-hide="activarDescartado{{ $descartado->id }}">
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

                                            {{-- Modal body --}}
                                            <div class="modal-body">
                                                <div class="text-custom-morado text-start text-lg font-bold my-4 px-4">
                                                    {{ $descartado->funeraria }} - {{ $descartado->nombre }}
                                                </div>

                                                <form action="{{ route('adminDescartados.activarDescartados', $descartado->id) }}" method="POST">
                                                    @csrf
                                                    @method('put')

                                                    <div class="text-custom-morado text-start px-4">
                                                        <label for="asesores">Selecciona un asesor para reasignarle
                                                            el contacto
                                                            seleccionado
                                                        </label>

                                                        <select name="asesores" id="asesores"
                                                            class="my-3 py-2.5 px-3 w-3/4 text-lg rounded-md">
                                                            <option selected>Selecciona un colaborador</option>
                                                            @foreach ($usuarios->sortBy(function ($usuario) use ($ordenPuestos) {
        return $ordenPuestos[$usuario->puesto];
    }) as $usuario)
                                                                    <option value="{{ $usuario->id }}"
                                                                        class="text-base">
                                                                        {{ $usuario->name }}-{{ $usuario->puesto }}
                                                                    </option>
                                                                @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="text-custom-morado text-start px-4">
                                                        <label for="selectActivar">Activar como:</label> <br>

                                                        <select name="selectActivar" id="selectActivar"
                                                            class="my-3 py-2.5 px-3 w-3/4 text-lg rounded-md">
                                                            <option value="">Selecciona uno</option>
                                                            <option value="Candidato">Candidato</option>
                                                            <option value="Prospecto">Prospecto</option>
                                                        </select>
                                                    </div>

                                                    <div class="text-right">
                                                        <div class="inline-flex p-2 space-x-3">

                                                            <button type="button" title="cancelar"
                                                                class="bg-custom-morado rounded-lg w-10 h-10 ml-auto inline-flex justify-center items-center"
                                                                data-modal-hide="activarDescartado{{ $descartado->id }}">
                                                                <svg id="btnCancelar" class="w-6 h-6"
                                                                    aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 384 512">
                                                                    <path
                                                                        d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                                                                </svg>
                                                            </button>

                                                            <button type="submit" title="Activar"
                                                                class="bg-custom-morado rounded-lg w-10 h-10 ml-auto inline-flex justify-center items-center">
                                                                <svg id="btnActivarDescartado" class="w-6 h-6"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 576 512">
                                                                    <path
                                                                        d="M96 80c0-26.5 21.5-48 48-48H432c26.5 0 48 21.5 48 48V384H96V80zm313 47c-9.4-9.4-24.6-9.4-33.9 0l-111 111-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L409 161c9.4-9.4 9.4-24.6 0-33.9zM0 336c0-26.5 21.5-48 48-48H64V416H512V288h16c26.5 0 48 21.5 48 48v96c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V336z" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Modal activar descartado --}}

                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>

            </div>
        </div>
    </div>

    <script>
        var selectRangoFechas = document.getElementById('rangoFechas');
        var selectFechaInicio = document.getElementById('fechaInicial');
        var selectFechaFinal = document.getElementById('fechaFinal');
        var fechaActual = new Date().toISOString().split('T')[0];


        if (selectRangoFechas.value == 'todas') {
            selectFechaInicio.value = '1999-01-01';
            selectFechaInicio.disabled = true;
            selectFechaFinal.value = fechaActual;
            selectFechaFinal.disabled = true;
        }

        selectRangoFechas.addEventListener('change', function() {
            if (selectRangoFechas.value === 'todas') {
                selectFechaInicio.value = '1999-01-01';
                selectFechaInicio.disabled = true;
                selectFechaFinal.value = fechaActual;
                selectFechaFinal.disabled = true;
            } else {
                selectFechaInicio.disabled = false;
                selectFechaFinal.disabled = false;
            }
        });
    </script>
</x-app-layout>
