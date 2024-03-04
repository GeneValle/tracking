<x-app-layout>

    {{-- <x-slot name="header">
        <h2 class="font-bold text-xl text-blue-800 leading-tight">
            Tracking by ANDF
        </h2>
    </x-slot> --}}

    <div class="py-5 bg-purple-400">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-purple-300 overflow-hidden shadow-xl sm:rounded-lg">

                <div class="text-center text-4xl mt-5 font-bold text-custom-morado">
                    Bienvenido {{ Auth::user()->name }}
                </div>

                <img src="img/ANDF_Tracking_Logo.png" class="h-80 w-90 m-auto mt-5">

                <div class="text-center font-semibold text-custom-morado text-2xl mt-4">
                    Este mes has contribuido con {{ $numeroVentasUserAuth }} ventas
                </div>

                <hr class="w-3/4 h-1 mx-auto my-4 bg-custom-morado border-0 rounded">

                <div class="flex justify-center my-4">
                    <table class="w-3/4 text-md text-center table-auto rounded-lg bg-purple-300 text-slate-950 border-2">
                        <thead class="uppercase font-bold">
                            <tr>
                                <th scope="col" class="px-6 py-">
                                    Nombre
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Prospectos
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Citas
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Ventas
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Mes actual
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Mes anterior
                                </th>
                            </tr>
                        </thead>
                        @foreach ($asesores as $asesor)
                            <tbody>
                                <tr class="border-b hover:bg-custom-morado hover:text-white">
                                    <th scope="row" class="px-6 py-4">
                                        {{ $asesor->name }}
                                    </th>

                                    <td class="px-6 py-4">
                                        @if (isset($numeroProspectos[$loop->index]))
                                            {{ $numeroProspectos[$loop->index]->numeroProspectos }}
                                        @else
                                            0
                                        @endif
                                    </td>

                                    <td class="px-6 py-4">
                                        @if (isset($numeroCitas[$loop->index]))
                                            {{ $numeroCitas[$loop->index]->numeroCitas }}
                                        @else
                                            0
                                        @endif
                                    </td>

                                    <td class="px-6 py-4">
                                        @if (isset($numeroVentas[$loop->index]))
                                            {{ $numeroVentas[$loop->index]->numeroVentas }}
                                        @else
                                            0
                                        @endif
                                    </td>

                                    <td class="px-6 py-4">
                                        <input id="mesActual" type="radio" value="mes_actual" name="seleccion_mes"
                                            class="w-4 h-4 text-custom-morado bg-white border-white focus:ring-red-500">
                                    </td>

                                    <td class="px-6 py-4">
                                        <input id="mesAnterior" type="radio" value="mes_anterior" name="seleccion_mes"
                                            class="w-4 h-4 text-custom-morado bg-white border-white focus:ring-red-500">
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
</x-app-layout>
