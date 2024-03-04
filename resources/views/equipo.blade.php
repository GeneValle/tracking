<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-bold text-xl text-blue-800 leading-tight">
            Tracking by ANDF
        </h2>
    </x-slot> --}}

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

                {{-- @foreach ($liderEquipo as $lider)
                <div class="px-4">
                    <div class="w-full bg-custom-header border border-gray-200 rounded-lg shadow">
                        <div class="text-custom-morado text-4xl">
                            {{ $lider->puesto }}
                        </div>
                        <div class="text-custom-morado text-xl">
                            {{ $lider->name }}
                        </div>
                    </div>
                </div>
                @endforeach --}}

                <div class="flex flex-wrap my-5">
                    @foreach ($liderEquipo as $lider)
                    <div class="basis-1/3 px-4 mb-4"></div>

                    <div class="basis-1/3 px-4 mb-4">

                        <div class="max-w-sm bg-purple-300 border-2 border-gray-200 rounded-lg shadow">
                            <a href="#">
                                <img class="rounded-t-lg" src="" alt="" />
                            </a>
                            <div class="p-5">
                                <div class="mb-2 text-2xl text-center font-bold tracking-tight text-custom-morado">
                                    {{ $lider->puesto }} <br>
                                    {{ $lider->name }}
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
                                        {{ $numeroProspectosLider[$loop->index]->numeroProspectosL }}
                                    </div>
                                    <div class="w-1/3 mt-2">
                                        {{ $numeroCitasLider[$loop->index]->numeroCitasL }}
                                    </div>
                                    <div class="w-1/3 mt-2">
                                        {{ $numeroVentasLider[$loop->index]->numeroVentasL }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="basis-1/3 px-4 mb-4"></div>
                    @endforeach
                </div>

                <hr class="w-auto h-0 mx-auto my-4 bg-custom-morado customDashed">

                <div class="flex flex-wrap my-5">
                    @foreach ($asesores as $asesor)
                        <div class="w-1/3 px-4 mb-4">
                            <div class="max-w-sm bg-purple-300 border-2 border-gray-200 rounded-lg shadow">
                                <a href="#">
                                    <img class="rounded-t-lg" src="" alt="" />
                                </a>
                                <div class="p-5">
                                    <div class="mb-2 text-2xl text-center font-bold tracking-tight text-custom-morado">
                                        {{ $asesor->puesto }} <br>
                                        {{ $asesor->name }}
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
                                            @if (isset($numeroProspectosAsesor[$loop->index]))
                                                {{ $numeroProspectosAsesor[$loop->index]->numeroProspectosA }}
                                            @else
                                                0
                                            @endif
                                        </div>
                                        <div class="w-1/3 mt-2">
                                            @if (@isset($numeroCitasAsesor[$loop->index]))
                                                {{ $numeroCitasAsesor[$loop->index]->numeroCitasA }}
                                            @else
                                                0
                                            @endif
                                        </div>
                                        <div class="w-1/3 mt-2">
                                            @if (isset($numeroVentasAsesor[$loop->index]))
                                                {{ $numeroVentasAsesor[$loop->index]->numeroVentasA }}
                                            @else
                                                0
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
