{{-- <style>
    .hidden {
        display:none !important;
    }
</style> --}}

<x-app-layout>
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-purple-300 overflow-hidden shadow-xl sm:rounded-lg">

                <div class="mt-4 ml-6 font-bold text-4xl text-slate-950 flex items-center">
                    Citas

                    <span class="font-normal text-lg text-custom-morado ml-6 mt-3">
                        Agenda de Citas |
                    </span>

                    <!-- Modal toggle -->

                    {{-- Modal registro cita --}}

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

                                <form accept-charset="utf-8" method="POST" action="{{ route('citas.store') }}">
                                    @csrf

                                    <label for="persona"
                                        class="text-lg font-semibold text-custom-morado px-5">Persona:</label>
                                    <div class="my-2">
                                        <select name="persona" id="persona"
                                            class="rounded-lg mx-6 h-10 w-4/5 text-xs text-custom-morado font-semibold">
                                            <option selected>---Selecciona una opción---</option>
                                            @foreach ($contactos as $contacto)
                                                <option value="{{ $contacto->id }}">{{ $contacto->nombre }}</option>
                                            @endforeach
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
                                                    @foreach ($tiposdeCita as $tCita)
                                                        <option value="{{ $tCita }}">{{ $tCita }}</option>
                                                    @endforeach
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
                                            @foreach ($lugarCita as $lCita)
                                                <option value="{{ $lCita }}">{{ $lCita }}</option>
                                            @endforeach
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

                    {{-- Modal registro cita --}}
                </div>

                <hr class="w-3/4 h-1 mx-auto my-4 bg-custom-morado border-0 rounded md:my-5">


                <div class="rounded-lg p-6 my-3">
                    <form id="formularioCitas" accept-charset="utf-8" method="get" action="{{ route('citas') }}">
                        @csrf

                        <div class="bg-purple-300 border border-custom-morado rounded-lg p-4 w-3/4 mx-auto">
                            <div class="text-xl font-semibold text-custom-morado text-center mb-2">Colaboradores</div>

                            <select name="colaboradores" id="colaboradores"
                                class="block rounded-lg py-2.5 px-0 w-3/4 text-lg text-center mx-auto text-black bg-purple-300 border-0 border-b-2 border-custom-morado">
                                <option selected>Selecciona un colaborador</option>
                                @foreach ($asesores as $asesor)
                                    <option value="{{ $asesor->id }}" class="text-base">
                                        {{ $asesor->name }}
                                    </option>
                                @endforeach
                            </select>

                            <input type="hidden" name="colaboradorId" id="colaboradorId">
                        </div>
                        {{-- onchange="document.getElementById('formularioCitas').submit()" --}}
                        <div class="text-right p-2 mt-6">
                            <button type="submit"
                                class="text-custom-header bg-custom-morado focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2">
                                Filtrar citas
                            </button>
                        </div>
                    </form>
                </div>

                {{-- <div id='calendar' class="w-3/4 h-3/4 m-auto py-3"></div> --}}

                <div class="grid grid-cols-4 gap-3 px-8 my-4 space-x-8">
                    <div class="max-w-sm text-white bg-teal-500 border border-gray-200 rounded-lg shadow py-6">
                        <div class="text-center text-4xl font-bold">
                            {{ $numerocitasProgramadas }}
                        </div>

                        <div class="text-right text-2xl font-medium mr-2">
                            Programadas
                        </div>
                    </div>

                    <div class="max-w-sm text-white bg-red-500 border border-gray-200 rounded-lg shadow py-6">
                        <div class="text-center text-4xl font-bold">
                            {{ $numerocitasCanceladas }}
                        </div>

                        <div class="text-right text-2xl font-medium mr-2">
                            Canceladas
                        </div>
                    </div>

                    <div class="max-w-sm text-white bg-green-500 border border-gray-200 rounded-lg shadow py-6">
                        <div class="text-center text-4xl font-bold">
                            {{ $numerocitasRealizadas }}
                        </div>

                        <div class="text-right text-2xl font-medium mr-2">
                            Realizadas
                        </div>
                    </div>

                    <div class="max-w-sm text-white bg-slate-600 border border-gray-200 rounded-lg shadow py-6">
                        <div class="text-center text-4xl font-bold">
                            {{ $numerocitasPorAutorizar }}
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
                                @if ($citasHoyCount === 0)
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
                                @else
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
                                            @foreach ($citasHoy as $citaHoy)
                                                <tr class="bg-teal-500 hover:bg-teal-700 text-white">
                                                    <td class="text-center">
                                                        {{ $citaHoy->Nombre }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $citaHoy->fecha }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $citaHoy->horaInicio }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $citaHoy->horaFin }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $citaHoy->tipo }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{-- Modal detalles citas hoy --}}

                                                        <div class="flex justify-center items-center">
                                                            <button
                                                                data-modal-target="detallesCitasHoy{{ $citaHoy->id }}"
                                                                data-modal-toggle="detallesCitasHoy{{ $citaHoy->id }}"
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

                                                        <div id="detallesCitasHoy{{ $citaHoy->id }}" tabindex="-1"
                                                            aria-hidden="true"
                                                            class="fixed z-50 hidden w-full p-6 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">

                                                            <div class="relative w-full max-w-2xl max-h-full">

                                                                <div class="relative bg-white rounded-lg shadow">

                                                                    {{-- Modal header --}}
                                                                    <div
                                                                        class="bg-custom-morado flex items-start justify-between p-4 border-b rounded-t">
                                                                        <div class="text-3xl font-semibold text-white">
                                                                            Detalles de Cita
                                                                        </div>

                                                                        <button type="button"
                                                                            class="text-white bg-transparent hover:bg-custom-header hover:text-custom-linksmenu rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center"
                                                                            data-modal-hide="detallesCitasHoy{{ $citaHoy->id }}">
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
                                                                    {{-- Modal header --}}

                                                                    {{-- Modal Body --}}

                                                                    <div class="modal-body">
                                                                        <div class="flex flex-wrap px-2 mt-5">

                                                                            <div class="basis-3/4">
                                                                                <div
                                                                                    class="text-2xl font-medium text-custom-morado text-start">
                                                                                    {{ $detallesCitasHoy[$loop->index]->funeraria }}
                                                                                </div>
                                                                            </div>
                                                                            {{-- <div class="basis-1/4">

                                                                            </div> --}}
                                                                        </div>

                                                                        <div
                                                                            class="px-2 text-2xl font-medium text-custom-morado text-start">
                                                                            {{ $detallesCitasHoy[$loop->index]->nombre }}
                                                                        </div>

                                                                        <div class="my-5 text-start">
                                                                            <div class="grid grid-cols-3 gap-4 px-2">
                                                                                <div
                                                                                    class="text-sm text-custom-morado">
                                                                                    <strong>Fecha: </strong>
                                                                                    {{ $detallesCitasHoy[$loop->index]->fecha }}
                                                                                </div>

                                                                                <div
                                                                                    class="text-sm text-custom-morado">
                                                                                    <strong>Hora de inicio: </strong>
                                                                                    {{ $detallesCitasHoy[$loop->index]->horaInicio }}
                                                                                </div>

                                                                                <div
                                                                                    class="text-sm text-custom-morado">
                                                                                    <strong>Hora Fin: </strong>
                                                                                    {{ $detallesCitasHoy[$loop->index]->horaFin }}
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="my-5 text-start">
                                                                            <div class="grid grid-cols-3 gap-4 px-2">

                                                                                <div
                                                                                    class="text-sm text-custom-morado">
                                                                                    <strong>Tipo: </strong>
                                                                                    {{ $detallesCitasHoy[$loop->index]->tipo }}
                                                                                </div>

                                                                                <div
                                                                                    class="text-sm text-custom-morado">
                                                                                    <strong>Lugar: </strong>
                                                                                    {{ $detallesCitasHoy[$loop->index]->lugar }}
                                                                                </div>

                                                                                <div
                                                                                    class="text-sm text-custom-morado">
                                                                                    <strong>Estado de la cita: </strong>
                                                                                    {{ $detallesCitasHoy[$loop->index]->estado }}
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="my-5 text-start">
                                                                            <div class="flex flex-wrap px-2">

                                                                                <div class="basis-1/3">
                                                                                    <div
                                                                                        class="text-sm text-custom-morado">
                                                                                        <strong>Telefono: </strong>
                                                                                        {{ $detallesCitasHoy[$loop->index]->telefono }}
                                                                                    </div>
                                                                                </div>

                                                                                <div class="basis-2/3">
                                                                                    <div
                                                                                        class="text-sm text-custom-morado">
                                                                                        <strong>Correo: </strong>
                                                                                        {{ $detallesCitasHoy[$loop->index]->correo }}
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="my-5 text-start px-2">
                                                                            <div class="text-sm text-custom-morado">
                                                                                <strong>Observaciones: </strong>
                                                                                {{ $detallesCitasHoy[$loop->index]->observaciones }}
                                                                            </div>
                                                                        </div>

                                                                        {{-- Botones cancelar y realizar cita --}}

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

                                                                        {{-- Botones cancelar y realizar cita --}}

                                                                        <hr
                                                                            class="w-auto h-0 mx-auto my-4 bg-custom-morado customDashed">
                                                                        <div
                                                                            class="text-2xl text-custom-morado mx-5 my-3">
                                                                            Citas que ha tenido este contacto:
                                                                        </div>

                                                                        <div
                                                                            class="relative overflow-x-auto shadow-md sm:rounded-lg my-3">
                                                                            @if ($citasContactoHoyCount === 0)
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

                                                                                    @foreach ($citasContactoHoy[$citaHoy->id] as $cita)
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
                                                                                    @endforeach
                                                                                </table>
                                                                            @else
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

                                                                                    @foreach ($citasContactoHoy[$citaHoy->id] as $cita)
                                                                                        <tbody class="text-center">
                                                                                            <tr
                                                                                                class="bg-white border-b-4">
                                                                                                <td class="">
                                                                                                    {{ $cita->fecha }}
                                                                                                </td>
                                                                                                <td class="">
                                                                                                    {{ $cita->horaInicio }}
                                                                                                </td>
                                                                                                <td class="">
                                                                                                    {{ $cita->duracion }}
                                                                                                    minutos
                                                                                                </td>
                                                                                                <td class="">
                                                                                                    {{ $cita->estado }}
                                                                                                </td>
                                                                                                <td class="">
                                                                                                    {{ $cita->comentarios }}
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    @endforeach
                                                                                </table>
                                                                            @endif

                                                                        </div>
                                                                    </div>
                                                                    {{-- Modal Body --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- Modal detalles citas hoy --}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                        </div>

                        <div class="tab-content" id="tab2">
                            <div class="overflow-x-auto shadow-md sm:rounded-lg my-4">
                                @if ($citasVencidasCount === 0)
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
                                @else
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
                                        @foreach ($citasVencidas as $citaVencida)
                                            <tbody>
                                                <tr class="bg-red-500 hover:bg-red-700 text-white">
                                                    <td class="text-center">
                                                        {{ $citaVencida->Nombre }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $citaVencida->fecha }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $citaVencida->horaInicio }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $citaVencida->horaFin }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $citaVencida->tipo }}
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="flex justify-center items-center">
                                                            <button
                                                                data-modal-target="detallesCitasVencidas{{ $citaVencida->id }}"
                                                                data-modal-toggle="detallesCitasVencidas{{ $citaVencida->id }}"
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

                                                        <div id="detallesCitasVencidas{{ $citaVencida->id }}"
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
                                                                            data-modal-hide="detallesCitasVencidas{{ $citaVencida->id }}">
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
                                                                                    {{ $detallesCitasVencidas[$loop->index]->funeraria }}
                                                                                </div>
                                                                            </div>

                                                                            {{-- <div class="basis-1/4">
                                                                                <button
                                                                                    data-modal-target="detalleContacto{{ $citaVencida->id }}"
                                                                                    data-modal-toggle="detalleContacto{{ $citaVencida->id }}"
                                                                                    class="my-2 text-white bg-slate-700 hover:bg-slate-800 rounded-lg text-center px-2 py-2"
                                                                                    type="button">
                                                                                    <svg class="w-6 h-6 text-white"
                                                                                        aria-hidden="true"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        fill="currentColor"
                                                                                        viewBox="0 0 20 20">
                                                                                        <path
                                                                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                                                                    </svg>
                                                                                </button>

                                                                                <div id="detalleContacto{{ $citaVencida->id }}"
                                                                                    tabindex="-1" aria-hidden="true"
                                                                                    class="fixed z-50 hidden w-full p-6 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">

                                                                                    <div
                                                                                        class="relative w-full max-w-2xl max-h-full">
                                                                                        <div
                                                                                            class="relative bg-white rounded-lg shadow">

                                                                                            <div
                                                                                                class="bg-custom-morado flex items-start justify-between p-4 border-b rounded-t">
                                                                                                <div
                                                                                                    class="text-3xl font-semibold text-left text-white">
                                                                                                    Detalles de
                                                                                                    Contacto <br>
                                                                                                    {{ $citaVencida->Nombre }}
                                                                                                </div>

                                                                                                <button type="button"
                                                                                                    class="text-white bg-transparent hover:bg-custom-header hover:text-custom-linksmenu rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center"
                                                                                                    data-modal-hide="detalleContacto{{ $citaVencida->id }}">
                                                                                                    <svg class="w-3 h-3"
                                                                                                        aria-hidden="true"
                                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                                        fill="none"
                                                                                                        viewBox="0 0 14 14">
                                                                                                        <path
                                                                                                            stroke="currentColor"
                                                                                                            stroke-linecap="round"
                                                                                                            stroke-linejoin="round"
                                                                                                            stroke-width="2"
                                                                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                                                    </svg>
                                                                                                    <span
                                                                                                        class="sr-only">Close
                                                                                                        modal</span>
                                                                                                </button>
                                                                                            </div>

                                                                                            <div class="modal-body">
                                                                                                <ul class="flex flex-wrap items-center justify-between px-5 py-3 font-medium text-base"
                                                                                                    id="tabContent">
                                                                                                    <li>
                                                                                                        <a class="text-custom-linksmenu cursor-pointer"
                                                                                                            data-tab="detalles{{ $citaVencida->id }}">Detalles</a>
                                                                                                    </li>
                                                                                                    <li>
                                                                                                        <a class="text-custom-linksmenu cursor-pointer"
                                                                                                            data-tab="citas{{ $citaVencida->id }}">Citas</a>
                                                                                                    </li>
                                                                                                    <li>
                                                                                                        <a class="text-custom-linksmenu cursor-pointer"
                                                                                                            data-tab="preferencias{{ $citaVencida->id }}">Preferencias</a>
                                                                                                    </li>
                                                                                                    <li>
                                                                                                        <a class="text-custom-linksmenu cursor-pointer"
                                                                                                            data-tab="cotizaciones{{ $citaVencida->id }}">Cotizaciones</a>
                                                                                                    </li>
                                                                                                    <li>
                                                                                                        <a class="text-custom-linksmenu cursor-pointer"
                                                                                                            data-tab="ventas{{ $citaVencida->id }}">Ventas</a>
                                                                                                    </li>
                                                                                                </ul>

                                                                                                <div
                                                                                                    class="border p-4 rounded-b">

                                                                                                    <div id="detalles{{ $citaVencida->id }}"
                                                                                                        class="tab-content text-black">

                                                                                                        <div
                                                                                                            class="inline-flex my-5 px-2 text-sm text-custom-morado">
                                                                                                            <div>
                                                                                                                <strong>Funeraria:
                                                                                                                </strong>
                                                                                                                {{ $citaVencida->funeraria }}
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="px-3">
                                                                                                                <strong>Nombre:
                                                                                                                </strong>
                                                                                                                {{ $citaVencida->nombre }}
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div
                                                                                                            class="grid grid-cols-3 gap-4 px-2 text-custom-morado text-sm">
                                                                                                            <div>
                                                                                                                <strong>Antiguedad:
                                                                                                                </strong>
                                                                                                                {{ $antiguedadCandidatos[$loop->index]->diasDesdeIngreso }}
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="px-3">
                                                                                                                <strong>No.
                                                                                                                    de
                                                                                                                    Citas:
                                                                                                                </strong>
                                                                                                                {{ $citasPorCandidatos[$loop->index]->noCitas }}
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="px-3">
                                                                                                                <strong>Tipo:
                                                                                                                </strong>
                                                                                                                Candidato
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <hr
                                                                                                            class="w-auto h-0 mx-3 my-5 bg-custom-morado customDashed">

                                                                                                        <div
                                                                                                            class="grid grid-cols-3 gap-4 px-2 text-custom-morado text-sm">
                                                                                                            <div>
                                                                                                                <strong>Teléfono:
                                                                                                                </strong>
                                                                                                                {{ $citaVencida->telefono }}
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="px-3">
                                                                                                                <strong>Email:
                                                                                                                </strong>
                                                                                                                {{ $citaVencida->correo }}
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <hr
                                                                                                            class="w-auto h-0 mx-3 my-5 bg-custom-morado customDashed">

                                                                                                        <div
                                                                                                            class="grid grid-cols-3 py-3 gap-4 px-2 text-custom-morado text-sm">
                                                                                                            <div>
                                                                                                                <strong>Referenciado:
                                                                                                                </strong>
                                                                                                                {{ $citaVencida->referenciado }}
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="px-3">
                                                                                                                <strong>Origen:
                                                                                                                </strong>
                                                                                                                {{ $citaVencida->origen }}
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="px-3">
                                                                                                                <strong>Fecha
                                                                                                                    de
                                                                                                                    Ingreso:
                                                                                                                </strong>
                                                                                                                {{ $citaVencida->fechaIngreso }}
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div
                                                                                                            class="grid grid-cols-3 py-3 gap-4 px-2 text-custom-morado text-sm">
                                                                                                            <div>
                                                                                                                <strong>Profesión:
                                                                                                                </strong>
                                                                                                                {{ $citaVencida->profesion }}
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="px-3">
                                                                                                                <strong>Empresa:
                                                                                                                </strong>
                                                                                                                {{ $empresasCandidatos[$loop->index]->nombreEmpresa }}
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="px-3">
                                                                                                                <strong>Ingresos:
                                                                                                                </strong>
                                                                                                                {{ $citaVencida->ingresos }}
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div
                                                                                                            class="grid grid-cols-3 gap-4 py-3 px-2 text-custom-morado text-sm">
                                                                                                            <div>
                                                                                                                <strong>Calle:
                                                                                                                </strong>
                                                                                                                {{ $citaVencida->calle }}
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="px-3">
                                                                                                                <strong>No.
                                                                                                                    Exterior:
                                                                                                                </strong>
                                                                                                                {{ $citaVencida->noExterior }}
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="px-3">
                                                                                                                <strong>No.
                                                                                                                    Interior:
                                                                                                                </strong>
                                                                                                                {{ $citaVencida->noInterior }}
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div
                                                                                                            class="grid grid-cols-3 gap-4 py-3 px-2 text-custom-morado text-sm">
                                                                                                            <div>
                                                                                                                <strong>Colonia:
                                                                                                                </strong>
                                                                                                                {{ $coloniasCandidatos[$loop->index]->colonia }}
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="px-3">
                                                                                                                <strong>Localidad:
                                                                                                                </strong>
                                                                                                                {{ $citaVencida->localidad }}
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="px-3">
                                                                                                                <strong>Municipio:
                                                                                                                </strong>
                                                                                                                {{ $citaVencida->municipio }}
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div
                                                                                                            class="grid grid-cols-3 gap-4 py-3 px-2 text-custom-morado text-sm">
                                                                                                            <div>
                                                                                                                <strong>Estado:
                                                                                                                </strong>
                                                                                                                {{ $citaVencida->estado }}
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="px-3">
                                                                                                                <strong>País:
                                                                                                                </strong>
                                                                                                                {{ $citaVencida->pais }}
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="px-3">
                                                                                                                <strong>C.P.:
                                                                                                                </strong>
                                                                                                                {{ $citaVencida->codPostal }}
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <hr
                                                                                                            class="w-auto h-0 mx-3 my-5 bg-custom-morado customDashed">

                                                                                                        <div
                                                                                                            class="px-2 text-custom-morado text-sm py-3">
                                                                                                            <p>
                                                                                                                <strong>Observaciones:
                                                                                                                </strong>
                                                                                                                {{ $citaVencida->observaciones }}
                                                                                                            </p>
                                                                                                        </div>

                                                                                                    </div>

                                                                                                    <div id="citas{{ $citaVencida->id }}"
                                                                                                        class="tab-content hidden text-black">

                                                                                                        <div
                                                                                                            class="relative overflow-x-auto shadow-md sm:rounded-lg my-3">
                                                                                                            <table
                                                                                                                class="w-full text-sm text-left text-gray-500">
                                                                                                                <thead
                                                                                                                    class="text-xs text-gray-700 uppercase bg-gray-50">
                                                                                                                    <tr
                                                                                                                        class="text-center">
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

                                                                                                                @foreach ($citasContactoVencidas[$citaVencida->id] as $cita)
                                                                                                                    <tbody
                                                                                                                        class="text-center">
                                                                                                                        <tr
                                                                                                                            class="bg-white border-b-4">
                                                                                                                            <td
                                                                                                                                class="">
                                                                                                                                {{ $cita->fecha }}
                                                                                                                            </td>
                                                                                                                            <td
                                                                                                                                class="">
                                                                                                                                {{ $cita->horaInicio }}
                                                                                                                            </td>
                                                                                                                            <td
                                                                                                                                class="">
                                                                                                                                {{ $cita->duracion }}
                                                                                                                                minutos
                                                                                                                            </td>
                                                                                                                            <td
                                                                                                                                class="">
                                                                                                                                {{ $cita->estado }}
                                                                                                                            </td>
                                                                                                                            <td
                                                                                                                                class="">
                                                                                                                                {{ $cita->comentarios }}
                                                                                                                            </td>
                                                                                                                        </tr>
                                                                                                                    </tbody>
                                                                                                                @endforeach
                                                                                                            </table>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div id="preferencias{{ $citaVencida->id }}"
                                                                                                        class="tab-content hidden text-black">

                                                                                                        <div
                                                                                                            class="rounded-lg shadow-md px-10">
                                                                                                            <div
                                                                                                                class="text-custom-morado text-2xl font-medium">
                                                                                                                Pase
                                                                                                            </div>

                                                                                                            <hr
                                                                                                                class="w-auto h-0 mx-3 my-5 bg-custom-morado customDashed">

                                                                                                            <div
                                                                                                                class="grid grid-cols-3 gap-4 py-4">
                                                                                                                <div
                                                                                                                    class="flex justify-center items-center">
                                                                                                                    <input
                                                                                                                        id="default-checkbox"
                                                                                                                        type="checkbox"
                                                                                                                        value=""
                                                                                                                        class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                                                    <label
                                                                                                                        for="default-checkbox"
                                                                                                                        class="ml-2 text-sm font-medium text-gray-900">Tipo
                                                                                                                        Infantil</label>
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="flex justify-center items-center">
                                                                                                                    <input
                                                                                                                        id="default-checkbox"
                                                                                                                        type="checkbox"
                                                                                                                        value=""
                                                                                                                        class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                                                    <label
                                                                                                                        for="default-checkbox"
                                                                                                                        class="ml-2 text-sm font-medium text-gray-900">Tipo
                                                                                                                        A</label>
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="flex justify-center items-center">
                                                                                                                    <input
                                                                                                                        id="default-checkbox"
                                                                                                                        type="checkbox"
                                                                                                                        value=""
                                                                                                                        class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                                                    <label
                                                                                                                        for="checked-checkbox"
                                                                                                                        class="ml-2 text-sm font-medium text-gray-900">Tipo
                                                                                                                        B</label>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div
                                                                                                            class="rounded-lg shadow-md px-10 my-5">
                                                                                                            <div
                                                                                                                class="text-custom-morado text-2xl font-medium">
                                                                                                                Stand
                                                                                                            </div>

                                                                                                            <hr
                                                                                                                class="w-auto h-0 mx-3 my-5 bg-custom-morado customDashed">

                                                                                                            <div
                                                                                                                class="grid grid-cols-4 gap-3 py-4">
                                                                                                                <div
                                                                                                                    class="flex justify-center items-center">
                                                                                                                    <input
                                                                                                                        id="default-checkbox"
                                                                                                                        type="checkbox"
                                                                                                                        value=""
                                                                                                                        class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                                                    <label
                                                                                                                        for="default-checkbox"
                                                                                                                        class="ml-2 text-sm font-medium text-gray-900">6
                                                                                                                        X
                                                                                                                        15</label>
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="flex justify-center items-center">
                                                                                                                    <input
                                                                                                                        id="default-checkbox"
                                                                                                                        type="checkbox"
                                                                                                                        value=""
                                                                                                                        class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                                                    <label
                                                                                                                        for="default-checkbox"
                                                                                                                        class="ml-2 text-sm font-medium text-gray-900">6
                                                                                                                        X
                                                                                                                        6</label>
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="flex justify-center items-center">
                                                                                                                    <input
                                                                                                                        id="default-checkbox"
                                                                                                                        type="checkbox"
                                                                                                                        value=""
                                                                                                                        class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                                                    <label
                                                                                                                        for="default-checkbox"
                                                                                                                        class="ml-2 text-sm font-medium text-gray-900">3
                                                                                                                        X
                                                                                                                        9</label>
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="flex justify-center items-center">
                                                                                                                    <input
                                                                                                                        id="default-checkbox"
                                                                                                                        type="checkbox"
                                                                                                                        value=""
                                                                                                                        class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                                                    <label
                                                                                                                        for="default-checkbox"
                                                                                                                        class="ml-2 text-sm font-medium text-gray-900">3
                                                                                                                        X
                                                                                                                        6</label>
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="flex justify-center items-center">
                                                                                                                    <input
                                                                                                                        id="default-checkbox"
                                                                                                                        type="checkbox"
                                                                                                                        value=""
                                                                                                                        class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                                                    <label
                                                                                                                        for="default-checkbox"
                                                                                                                        class="ml-2 text-sm font-medium text-gray-900">3
                                                                                                                        X
                                                                                                                        3</label>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div
                                                                                                            class="rounded-lg shadow-md px-10 mt-5 mb-2">
                                                                                                            <div
                                                                                                                class="text-custom-morado text-2xl font-medium">
                                                                                                                Paquete
                                                                                                            </div>

                                                                                                            <hr
                                                                                                                class="w-auto h-0 mx-3 my-5 bg-custom-morado customDashed">

                                                                                                            <div
                                                                                                                class="grid grid-cols-4 gap-3 py-4">
                                                                                                                <div
                                                                                                                    class="flex justify-center items-center">
                                                                                                                    <input
                                                                                                                        id="default-checkbox"
                                                                                                                        type="checkbox"
                                                                                                                        value=""
                                                                                                                        class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                                                    <label
                                                                                                                        for="default-checkbox"
                                                                                                                        class="ml-2 text-sm font-medium text-gray-900">Doble
                                                                                                                        tipo
                                                                                                                        A</label>
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="flex justify-center items-center">
                                                                                                                    <input
                                                                                                                        id="default-checkbox"
                                                                                                                        type="checkbox"
                                                                                                                        value=""
                                                                                                                        class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                                                    <label
                                                                                                                        for="default-checkbox"
                                                                                                                        class="ml-2 text-sm font-medium text-gray-900">Doble
                                                                                                                        tipo
                                                                                                                        B</label>
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="flex justify-center items-center">
                                                                                                                    <input
                                                                                                                        id="default-checkbox"
                                                                                                                        type="checkbox"
                                                                                                                        value=""
                                                                                                                        class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                                                    <label
                                                                                                                        for="default-checkbox"
                                                                                                                        class="ml-2 text-sm font-medium text-gray-900">Sencillo
                                                                                                                        tipo
                                                                                                                        A</label>
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="flex justify-center items-center">
                                                                                                                    <input
                                                                                                                        id="default-checkbox"
                                                                                                                        type="checkbox"
                                                                                                                        value=""
                                                                                                                        class="w-4 h-4 text-custom-morado bg-gray-100 border-gray-300">
                                                                                                                    <label
                                                                                                                        for="default-checkbox"
                                                                                                                        class="ml-2 text-sm font-medium text-gray-900">Sencillo
                                                                                                                        tipo
                                                                                                                        B</label>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div
                                                                                                            class="text-right py-2">
                                                                                                            <button
                                                                                                                type="button"
                                                                                                                title="Guardar"
                                                                                                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center bg-custom-morado rounded-lg">
                                                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                                    height="2em"
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

                                                                                                    <div id="cotizaciones{{ $citaVencida->id }}"
                                                                                                        class="tab-content hidden text-black">

                                                                                                        <div
                                                                                                            class="overflow-x-auto shadow-md sm:rounded-lg my-4">

                                                                                                            <table
                                                                                                                class="text-sm w-full text-left text-custom-linksmenu">
                                                                                                                <thead
                                                                                                                    class="text-sm text-custom-linksmenu uppercase bg-custom-header my-4">
                                                                                                                    <tr
                                                                                                                        class="text-center">
                                                                                                                        <th scope="col"
                                                                                                                            class="px-4 py-3">
                                                                                                                            Folio
                                                                                                                        </th>
                                                                                                                        <th scope="col"
                                                                                                                            class="px-4 py-3">
                                                                                                                            Fecha
                                                                                                                        </th>
                                                                                                                        <th scope="col"
                                                                                                                            class="px-4 py-3">
                                                                                                                            Total
                                                                                                                        </th>
                                                                                                                        <th scope="col"
                                                                                                                            class="px-4 py-3">
                                                                                                                            Estado
                                                                                                                        </th>
                                                                                                                        <th scope="col"
                                                                                                                            class="px-4 py-3">

                                                                                                                        </th>
                                                                                                                    </tr>
                                                                                                                </thead>
                                                                                                                @foreach ($cotizacionesContactoCitasVencidas[$citaVencida->id] as $cotizacion)
                                                                                                                    <tbody>
                                                                                                                        <td
                                                                                                                            class="px-6 py-4 text-center">
                                                                                                                            {{ $cotizacion->id }}
                                                                                                                        </td>
                                                                                                                        <td
                                                                                                                            class="px-6 py-4 text-center">
                                                                                                                            {{ $cotizacion->fecha }}
                                                                                                                        </td>
                                                                                                                        <td
                                                                                                                            class="px-6 py-4 text-center">
                                                                                                                            {{ $cotizacion->total }}
                                                                                                                        </td>
                                                                                                                        <td
                                                                                                                            class="px-6 py-4 text-center">
                                                                                                                            {{ $cotizacion->estado }}
                                                                                                                        </td>
                                                                                                                        <td>
                                                                                                                            <button
                                                                                                                                type="button"
                                                                                                                                title="Ver cotización"
                                                                                                                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center bg-custom-morado rounded-lg">
                                                                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                                                    class="m-auto"
                                                                                                                                    height="2em"
                                                                                                                                    viewBox="0 0 448 512">
                                                                                                                                    <path
                                                                                                                                        d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z" />
                                                                                                                                </svg>
                                                                                                                            </button>
                                                                                                                        </td>
                                                                                                                    </tbody>
                                                                                                                @endforeach
                                                                                                            </table>
                                                                                                        </div>

                                                                                                    </div>

                                                                                                    <div id="ventas{{ $citaVencida->id }}"
                                                                                                        class="tab-content hidden text-black">

                                                                                                        <div
                                                                                                            class="overflow-x-auto shadow-md sm:rounded-lg my-4">
                                                                                                            <table
                                                                                                                class="text-sm w-full text-left text-custom-linksmenu">
                                                                                                                <thead
                                                                                                                    class="text-sm text-custom-linksmenu uppercase bg-custom-header my-4">
                                                                                                                    <tr
                                                                                                                        class="text-center">
                                                                                                                        <th scope="col"
                                                                                                                            class="px-4 py-3">
                                                                                                                            Contrato
                                                                                                                        </th>
                                                                                                                        <th scope="col"
                                                                                                                            class="px-4 py-3">
                                                                                                                            Fecha
                                                                                                                        </th>
                                                                                                                        <th scope="col"
                                                                                                                            class="px-4 py-3">
                                                                                                                            Total
                                                                                                                        </th>
                                                                                                                        <th scope="col"
                                                                                                                            class="px-4 py-3">
                                                                                                                            Detalles
                                                                                                                        </th>
                                                                                                                        <th scope="col"
                                                                                                                            class="px-4 py-3">
                                                                                                                            Asesor
                                                                                                                        </th>
                                                                                                                    </tr>
                                                                                                                </thead>

                                                                                                                @foreach ($ventasContactoCitasVencidas[$citaVencida->id] as $venta)
                                                                                                                    <tbody>
                                                                                                                        <td
                                                                                                                            class="px-6 py-4">
                                                                                                                            {{ $venta->referencia }}
                                                                                                                        </td>
                                                                                                                        <td
                                                                                                                            class="px-6 py-4">
                                                                                                                            {{ $venta->fecha }}
                                                                                                                        </td>
                                                                                                                        <td
                                                                                                                            class="px-6 py-4">
                                                                                                                            {{ $venta->total }}
                                                                                                                        </td>
                                                                                                                        <td
                                                                                                                            class="px-6 py-4">
                                                                                                                            {{ $venta->observaciones }}
                                                                                                                        </td>
                                                                                                                        <td
                                                                                                                            class="px-6 py-4">
                                                                                                                            {{ $venta->name }}
                                                                                                                        </td>
                                                                                                                    </tbody>
                                                                                                                @endforeach
                                                                                                            </table>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </div> --}}
                                                                        </div>

                                                                        <div
                                                                            class="px-2 text-2xl font-medium text-custom-morado text-start">
                                                                            {{ $detallesCitasVencidas[$loop->index]->nombre }}
                                                                        </div>

                                                                        <div class="my-5 text-start">
                                                                            <div class="grid grid-cols-3 gap-4 px-2">

                                                                                <div
                                                                                    class="text-sm text-custom-morado">
                                                                                    <strong>Fecha: </strong>
                                                                                    {{ $detallesCitasVencidas[$loop->index]->fecha }}
                                                                                </div>

                                                                                <div
                                                                                    class="text-sm text-custom-morado">
                                                                                    <strong>Hora de inicio:
                                                                                    </strong>
                                                                                    {{ $detallesCitasVencidas[$loop->index]->horaInicio }}
                                                                                </div>

                                                                                <div
                                                                                    class="text-sm text-custom-morado">
                                                                                    <strong>Hora Fin: </strong>
                                                                                    {{ $detallesCitasVencidas[$loop->index]->horaFin }}
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="my-5 text-start">
                                                                            <div class="grid grid-cols-3 gap-4 px-2">

                                                                                <div
                                                                                    class="text-sm text-custom-morado">
                                                                                    <strong>Tipo: </strong>
                                                                                    {{ $detallesCitasVencidas[$loop->index]->tipo }}
                                                                                </div>

                                                                                <div
                                                                                    class="text-sm text-custom-morado">
                                                                                    <strong>Lugar: </strong>
                                                                                    {{ $detallesCitasVencidas[$loop->index]->lugar }}
                                                                                </div>

                                                                                <div
                                                                                    class="text-sm text-custom-morado">
                                                                                    <strong>Estado de la cita:
                                                                                    </strong>
                                                                                    {{ $detallesCitasVencidas[$loop->index]->estado }}
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="my-5 text-start">
                                                                            <div class="flex flex-wrap px-2">

                                                                                <div class="basis-1/3">
                                                                                    <div
                                                                                        class="text-sm text-custom-morado">
                                                                                        <strong>Telefono: </strong>
                                                                                        {{ $detallesCitasVencidas[$loop->index]->telefono }}
                                                                                    </div>
                                                                                </div>

                                                                                <div class="basis-2/3">
                                                                                    <div
                                                                                        class="text-sm text-custom-morado">
                                                                                        <strong>Correo: </strong>
                                                                                        {{ $detallesCitasVencidas[$loop->index]->correo }}
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="my-5 text-start px-2">
                                                                            <div class="text-sm text-custom-morado">
                                                                                <strong>Observaciones: </strong>
                                                                                {{ $detallesCitasVencidas[$loop->index]->observaciones }}
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
                                                                            @if ($citasContactoVencidasCount === 0)
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

                                                                                    @foreach ($citasContactoVencidas[$citaVencida->id] as $cita2)
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
                                                                                    @endforeach
                                                                                </table>
                                                                            @else
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

                                                                                    @foreach ($citasContactoVencidas[$citaVencida->id] as $cita2)
                                                                                        <tbody class="text-center">
                                                                                            <tr
                                                                                                class="bg-white border-b-4">
                                                                                                <td class="">
                                                                                                    {{ $cita2->fecha }}
                                                                                                </td>
                                                                                                <td class="">
                                                                                                    {{ $cita2->horaInicio }}
                                                                                                </td>
                                                                                                <td class="">
                                                                                                    {{ $cita2->duracion }}
                                                                                                    minutos
                                                                                                </td>
                                                                                                <td class="">
                                                                                                    {{ $cita2->estado }}
                                                                                                </td>
                                                                                                <td class="">
                                                                                                    {{ $cita2->comentarios }}
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    @endforeach
                                                                                </table>
                                                                            @endif
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        @endforeach
                                    </table>
                                @endif
                            </div>
                        </div>

                        <div class="tab-content" id="tab3">
                            <div class="overflow-x-auto shadow-md sm:rounded-lg my-4">
                                @if ($proximasCitasCount === 0)
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
                                @else
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
                                        @foreach ($proximasCitas as $proximaCita)
                                            <tbody>
                                                <tr class="bg-green-500 hover:bg-green-700 text-white">
                                                    <td class="text-center">
                                                        {{ $proximaCita->Nombre }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $proximaCita->fecha }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $proximaCita->horaInicio }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $proximaCita->horaFin }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $proximaCita->tipo }}
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="flex justify-center items-center">
                                                            <button
                                                                data-modal-target="detallesProximasCitas{{ $proximaCita->id }}"
                                                                data-modal-toggle="detallesProximasCitas{{ $proximaCita->id }}"
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

                                                        <div id="detallesProximasCitas{{ $proximaCita->id }}"
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
                                                                            data-modal-hide="detallesProximasCitas{{ $proximaCita->id }}">
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
                                                                                    {{ $detallesProximasCitas[$loop->index]->funeraria }}
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div
                                                                            class="px-2 text-2xl font-medium text-custom-morado text-start">
                                                                            {{ $detallesProximasCitas[$loop->index]->nombre }}
                                                                        </div>

                                                                        <div class="my-5 text-start">
                                                                            <div class="grid grid-cols-3 gap-4 px-2">

                                                                                <div
                                                                                    class="text-sm text-custom-morado">
                                                                                    <strong>Fecha: </strong>
                                                                                    {{ $detallesProximasCitas[$loop->index]->fecha }}
                                                                                </div>

                                                                                <div
                                                                                    class="text-sm text-custom-morado">
                                                                                    <strong>Hora de inicio: </strong>
                                                                                    {{ $detallesProximasCitas[$loop->index]->horaInicio }}
                                                                                </div>

                                                                                <div
                                                                                    class="text-sm text-custom-morado">
                                                                                    <strong>Hora Fin: </strong>
                                                                                    {{ $detallesProximasCitas[$loop->index]->horaFin }}
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="my-5 text-start">
                                                                            <div class="grid grid-cols-3 gap-4 px-2">

                                                                                <div
                                                                                    class="text-sm text-custom-morado">
                                                                                    <strong>Tipo: </strong>
                                                                                    {{ $detallesProximasCitas[$loop->index]->tipo }}
                                                                                </div>

                                                                                <div
                                                                                    class="text-sm text-custom-morado">
                                                                                    <strong>Lugar: </strong>
                                                                                    {{ $detallesProximasCitas[$loop->index]->lugar }}
                                                                                </div>

                                                                                <div
                                                                                    class="text-sm text-custom-morado">
                                                                                    <strong>Estado de la cita: </strong>
                                                                                    {{ $detallesProximasCitas[$loop->index]->estado }}
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="my-5 text-start">
                                                                            <div class="flex flex-wrap px-2">

                                                                                <div class="basis-1/3">
                                                                                    <div
                                                                                        class="text-sm text-custom-morado">
                                                                                        <strong>Telefono: </strong>
                                                                                        {{ $detallesProximasCitas[$loop->index]->telefono }}
                                                                                    </div>
                                                                                </div>

                                                                                <div class="basis-2/3">
                                                                                    <div
                                                                                        class="text-sm text-custom-morado">
                                                                                        <strong>Correo: </strong>
                                                                                        {{ $detallesProximasCitas[$loop->index]->correo }}
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="my-5 text-start px-2">
                                                                            <div class="text-sm text-custom-morado">
                                                                                <strong>Observaciones: </strong>
                                                                                {{ $detallesProximasCitas[$loop->index]->observaciones }}
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
                                                                            @if ($proximasCitasContactoCount === 0)
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

                                                                                    @foreach ($proximasCitasContacto[$proximaCita->id] as $cita3)
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
                                                                                    @endforeach
                                                                                </table>
                                                                            @else
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

                                                                                    @foreach ($proximasCitasContacto[$proximaCita->id] as $cita3)
                                                                                        <tbody class="text-center">
                                                                                            <tr
                                                                                                class="bg-white border-b-4">
                                                                                                <td class="">
                                                                                                    {{ $cita3->fecha }}
                                                                                                </td>
                                                                                                <td class="">
                                                                                                    {{ $cita3->horaInicio }}
                                                                                                </td>
                                                                                                <td class="">
                                                                                                    {{ $cita3->duracion }}
                                                                                                    minutos
                                                                                                </td>
                                                                                                <td class="">
                                                                                                    {{ $cita3->estado }}
                                                                                                </td>
                                                                                                <td class="">
                                                                                                    {{ $cita3->comentarios }}
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    @endforeach
                                                                                </table>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        @endforeach
                                    </table>
                                @endif
                            </div>
                        </div>

                        <div class="tab-content" id="tab4">
                            <div class="overflow-x-auto shadow-md sm:rounded-lg my-4">
                                @if ($citasPorAutorizarCount === 0)
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
                                @else
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
                                        @foreach ($citasPorAutorizar as $citaPorAutorizar)
                                            <tbody>
                                                <tr class="bg-slate-600 hover:bg-slate-800 text-white">
                                                    <td class="text-center">
                                                        {{ $citaPorAutorizar->Nombre }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $citaPorAutorizar->fecha }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $citaPorAutorizar->horaInicio }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $citaPorAutorizar->horaFin }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $citaPorAutorizar->tipo }}
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="flex justify-center items-center">
                                                            <button
                                                                data-modal-target="detallesCitasPorAutorizar{{ $citaPorAutorizar->id }}"
                                                                data-modal-toggle="detallesCitasPorAutorizar{{ $citaPorAutorizar->id }}"
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

                                                        <div id="detallesCitasPorAutorizar{{ $citaPorAutorizar->id }}"
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
                                                                            data-modal-hide="detallesCitasPorAutorizar{{ $citaPorAutorizar->id }}">
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
                                                                                    {{ $detallesCitasPorAutorizar[$loop->index]->funeraria }}
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div
                                                                            class="px-2 text-2xl font-medium text-custom-morado text-start">
                                                                            {{ $detallesCitasPorAutorizar[$loop->index]->nombre }}
                                                                        </div>

                                                                        <div class="my-5 text-start">
                                                                            <div class="grid grid-cols-3 gap-4 px-2">

                                                                                <div
                                                                                    class="text-sm text-custom-morado">
                                                                                    <strong>Fecha: </strong>
                                                                                    {{ $detallesCitasPorAutorizar[$loop->index]->fecha }}
                                                                                </div>

                                                                                <div
                                                                                    class="text-sm text-custom-morado">
                                                                                    <strong>Hora de inicio: </strong>
                                                                                    {{ $detallesCitasPorAutorizar[$loop->index]->horaInicio }}
                                                                                </div>

                                                                                <div
                                                                                    class="text-sm text-custom-morado">
                                                                                    <strong>Hora Fin: </strong>
                                                                                    {{ $detallesCitasPorAutorizar[$loop->index]->horaFin }}
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="my-5 text-start">
                                                                            <div class="grid grid-cols-3 gap-4 px-2">

                                                                                <div
                                                                                    class="text-sm text-custom-morado">
                                                                                    <strong>Tipo: </strong>
                                                                                    {{ $detallesCitasPorAutorizar[$loop->index]->tipo }}
                                                                                </div>

                                                                                <div
                                                                                    class="text-sm text-custom-morado">
                                                                                    <strong>Lugar: </strong>
                                                                                    {{ $detallesCitasPorAutorizar[$loop->index]->lugar }}
                                                                                </div>

                                                                                <div
                                                                                    class="text-sm text-custom-morado">
                                                                                    <strong>Estado de la cita: </strong>
                                                                                    {{ $detallesCitasPorAutorizar[$loop->index]->estado }}
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="my-5 text-start">
                                                                            <div class="flex flex-wrap px-2">

                                                                                <div class="basis-1/3">
                                                                                    <div
                                                                                        class="text-sm text-custom-morado">
                                                                                        <strong>Telefono: </strong>
                                                                                        {{ $detallesCitasPorAutorizar[$loop->index]->telefono }}
                                                                                    </div>
                                                                                </div>

                                                                                <div class="basis-2/3">
                                                                                    <div
                                                                                        class="text-sm text-custom-morado">
                                                                                        <strong>Correo: </strong>
                                                                                        {{ $detallesCitasPorAutorizar[$loop->index]->correo }}
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="my-5 text-start px-2">
                                                                            <div class="text-sm text-custom-morado">
                                                                                <strong>Observaciones: </strong>
                                                                                {{ $detallesCitasPorAutorizar[$loop->index]->observaciones }}
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
                                                                            @if ($citasContactoPorAutorizarCount === 0)
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

                                                                                    @foreach ($citasContactoPorAutorizar[$citaPorAutorizar->id] as $cita4)
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
                                                                                    @endforeach
                                                                                </table>
                                                                            @else
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

                                                                                    @foreach ($citasContactoPorAutorizar[$citaPorAutorizar->id] as $cita4)
                                                                                        <tbody class="text-center">
                                                                                            <tr
                                                                                                class="bg-white border-b-4">
                                                                                                <td class="">
                                                                                                    {{ $cita4->fecha }}
                                                                                                </td>
                                                                                                <td class="">
                                                                                                    {{ $cita4->horaInicio }}
                                                                                                </td>
                                                                                                <td class="">
                                                                                                    {{ $cita4->duracion }}
                                                                                                    minutos
                                                                                                </td>
                                                                                                <td class="">
                                                                                                    {{ $cita4->estado }}
                                                                                                </td>
                                                                                                <td class="">
                                                                                                    {{ $cita4->comentarios }}
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    @endforeach
                                                                                </table>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        @endforeach
                                    </table>
                                @endif
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
</x-app-layout>

{{-- document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    moment.locale('es');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        initialDate: new Date(),
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        buttonText: {
            today: 'Hoy',
            prev: 'Anterior',
            next: 'Siguiente',
            dayGridMonth: 'Mes',
            timeGridWeek: 'Semana',
            timeGridDay: 'Día'
        },
        locales: 'es',
    });
    calendar.render();
});  --}}

{{-- <div class="flex flex-wrap">
                                                            <div class="basis-2/4">
                                                                <div class="text-2xl text-custom-morado">
                                                                    Citas que ha tenido este contacto:
                                                                </div>
                                                            </div>
                                                            <div class="basis-2/4">
                                                                <button type="button"
                                                                    onclick="mostrarCitas({{ $citaHoy->id }})"
                                                                    class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                                                                    <svg id="tarjetaPresentacion"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        height="2em" class="m-auto"
                                                                        viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                                        <path
                                                                            d="M512 80c8.8 0 16 7.2 16 16v32H48V96c0-8.8 7.2-16 16-16H512zm16 144V416c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V224H528zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm56 304c-13.3 0-24 10.7-24 24s10.7 24 24 24h48c13.3 0 24-10.7 24-24s-10.7-24-24-24H120zm128 0c-13.3 0-24 10.7-24 24s10.7 24 24 24H360c13.3 0 24-10.7 24-24s-10.7-24-24-24H248z" />
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </div> --}}
