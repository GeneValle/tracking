<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<x-app-layout>
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-purple-300 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="mt-4 ml-6 font-bold text-4xl text-slate-950 flex items-center">
                    Reportes

                    <span class="font-normal text-lg text-custom-morado ml-6 mt-3">
                        Anual |
                    </span>
                </div>

                <hr class="w-3/4 h-1 mx-auto my-4 bg-custom-morado border-0 rounded md:my-5">

                <form method="GET" action="{{ route('reporteAnual') }}" id="formReporteAnual">
                    @csrf
                    <div class="rounded-lg {{-- shadow-2xl --}} p-6 my-3">

                        <div class="bg-purple-300 border border-custom-morado rounded-lg p-4">
                            <div class="text-xl font-semibold text-custom-morado mb-2 text-center">Colaboradores</div>

                            <select name="colaboradores" id="colaboradores"
                                class="block rounded-lg py-2.5 px-0 w-3/4 text-lg mx-auto text-center text-black bg-purple-300  border-0 border-b-2 border-custom-morado">
                                <option selected>Selecciona un colaborador</option>
                                @foreach ($asesores as $asesor)
                                    <option value="{{ $asesor->id }}" class="text-base">
                                        {{ $asesor->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex flex-grow px-4 py-2 my-3">
                            <div class="basis-5/12">
                                <div class="text-center">
                                    <label for="añoInicio" class="text-xl text-custom-morado">Año de inicio:</label>
                                </div>
                                <select name="añoInicio" id="añoInicio"
                                    class="block rounded-lg py-2.5 px-0 w-full text-lg text-black text-center bg-purple-300 border-0 border-b-2 border-custom-morado">
                                    <option selected>Selecciona un año de Inicio</option>
                                    <option value="2018" class="text-base">2018</option>
                                    <option value="2019" class="text-base">2019</option>
                                    <option value="2020" class="text-base">2020</option>
                                    <option value="2021" class="text-base">2021</option>
                                    <option value="2022" class="text-base">2022</option>
                                    <option value="2023" class="text-base">2023</option>
                                </select>
                            </div>

                            <div class="basis-2/12 text-center m-auto text-2xl text-custom-morado">
                                a
                            </div>

                            <div class="basis-5/12">
                                <div class="text-center">
                                    <label for="añoFin" class="text-xl text-custom-morado">Año Final:</label>
                                </div>

                                <select name="añoFin" id="añoFin"
                                    class="block rounded-lg py-2.5 px-0 w-full text-lg text-black text-center bg-purple-300 border-0 border-b-2 border-custom-morado">
                                    <option selected>Selecciona un año Final</option>
                                    <option value="2018" class="text-base">2018</option>
                                    <option value="2019" class="text-base">2019</option>
                                    <option value="2020" class="text-base">2020</option>
                                    <option value="2021" class="text-base">2021</option>
                                    <option value="2022" class="text-base">2022</option>
                                    <option value="2023" class="text-base">2023</option>
                                    <option value="2024" class="text-base">2024</option>
                                </select>

                            </div>
                        </div>

                        <div class="text-right mt-6">
                            <button type="submit"
                                class="text-custom-header bg-custom-morado focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2">
                                Filtrar ventas por año </button>
                        </div>
                    </div>
                </form>

                <canvas id="barChart" style="width: 75%; margin: auto"></canvas>

                <div class="relative overflow-x-auto {{-- shadow-md --}} sm:rounded-lg my-6">
                    @if (!empty($colaboradorId) && !empty($añoInicio) && !empty($añoFin))
                        <table class="w-11/12 m-auto text-sm text-left rtl:text-right text-gray-500">
                            <thead class="text-xs text-center text-gray-700 uppercase">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 bg-gray-50 border-y-2 border-x-2 border-custom-morado">
                                        MES
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 border-y-2 border-custom-morado">
                                        2018
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 border-y-2 border-custom-morado">
                                        2019
                                    </th>
                                    <th scope="col" class="px-6 py-3  bg-gray-50 border-y-2 border-custom-morado">
                                        2020
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 border-y-2 border-custom-morado">
                                        2021
                                    </th>
                                    <th scope="col" class="px-6 py-3  bg-gray-50 border-y-2 border-custom-morado">
                                        2022
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 border-y-2 border-custom-morado">
                                        2023
                                    </th>
                                    <th scope="col" class="px-6 py-3  bg-gray-50 border-y-2 border-custom-morado">
                                        2024
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 bg-gray-50 border-y-2 border-e-2 border-custom-morado">
                                        PROMEDIO
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr class="border-b border-gray-200">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 border-b-2 border-x-2 border-custom-morado">
                                        Enero
                                    </th>
                                    @foreach ($alignedDataEnero as $totalVentasEnero)
                                        <td class="px-6 py-4 border-b-2 border-custom-morado">
                                            {{ $totalVentasEnero }}
                                        </td>
                                    @endforeach

                                    <td class="px-6 py-4 bg-purple-300 border-b-2 border-e-2 border-custom-morado">
                                        {{ number_format($sumatoriaEnero / 7, 2) }}
                                    </td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 border-b-2 border-x-2 border-custom-morado">
                                        Febrero
                                    </th>
                                    @foreach ($alignedDataFebrero as $totalVentasFebrero)
                                        <td class="px-6 py-4 border-b-2 border-custom-morado">
                                            {{ $totalVentasFebrero }}
                                        </td>
                                    @endforeach
                                    <td class="px-6 py-4 bg-purple-300 border-b-2 border-e-2 border-custom-morado">
                                        {{ number_format($sumatoriaFebrero / 7, 2) }}
                                    </td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 border-b-2 border-x-2 border-custom-morado">
                                        Marzo
                                    </th>
                                    @foreach ($alignedDataMarzo as $totalVentasMarzo)
                                        <td class="px-6 py-4 border-b-2 border-custom-morado">
                                            {{ $totalVentasMarzo }}
                                        </td>
                                    @endforeach
                                    <td class="px-6 py-4 bg-purple-300 border-b-2 border-e-2 border-custom-morado">
                                        {{ number_format($sumatoriaMarzo / 7, 2) }}
                                    </td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 border-b-2 border-x-2 border-custom-morado">
                                        Abril
                                    </th>
                                    @foreach ($alignedDataAbril as $totalVentasAbril)
                                        <td class="px-6 py-4 border-b-2 border-custom-morado">
                                            {{ $totalVentasAbril }}
                                        </td>
                                    @endforeach
                                    <td class="px-6 py-4 bg-purple-300 border-b-2 border-e-2 border-custom-morado">
                                        {{ number_format($sumatoriaAbril / 7, 2) }}
                                    </td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 border-b-2 border-x-2 border-custom-morado">
                                        Mayo
                                    </th>
                                    @foreach ($alignedDataMayo as $totalVentasMayo)
                                        <td class="px-6 py-4 border-b-2 border-custom-morado">
                                            {{ $totalVentasMayo }}
                                        </td>
                                    @endforeach
                                    <td class="px-6 py-4 bg-purple-300 border-b-2 border-e-2 border-custom-morado">
                                        {{ number_format($sumatoriaMayo / 7, 2) }}
                                    </td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 border-b-2 border-x-2 border-custom-morado">
                                        Junio
                                    </th>
                                    @foreach ($alignedDataJunio as $totalVentasJunio)
                                        <td class="px-6 py-4 border-b-2 border-custom-morado">
                                            {{ $totalVentasJunio }}
                                        </td>
                                    @endforeach
                                    <td class="px-6 py-4 bg-purple-300 border-b-2 border-e-2 border-custom-morado">
                                        {{ number_format($sumatoriaJunio / 7, 2) }}
                                    </td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 border-b-2 border-x-2 border-custom-morado">
                                        Julio
                                    </th>
                                    @foreach ($alignedDataJulio as $totalVentasJulio)
                                        <td class="px-6 py-4 border-b-2 border-custom-morado">
                                            {{ $totalVentasJulio }}
                                        </td>
                                    @endforeach
                                    <td class="px-6 py-4 bg-purple-300 border-b-2 border-e-2 border-custom-morado">
                                        {{ number_format($sumatoriaJulio / 7, 2) }}
                                    </td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 border-b-2 border-x-2 border-custom-morado">
                                        Agosto
                                    </th>
                                    @foreach ($alignedDataAgosto as $totalVentasAgosto)
                                        <td class="px-6 py-4 border-b-2 border-custom-morado">
                                            {{ $totalVentasAgosto }}
                                        </td>
                                    @endforeach
                                    <td class="px-6 py-4 bg-purple-300 border-b-2 border-e-2 border-custom-morado">
                                        {{ number_format($sumatoriaAgosto / 7, 2) }}
                                    </td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 border-b-2 border-x-2 border-custom-morado">
                                        Septiembre
                                    </th>
                                    @foreach ($alignedDataSeptiembre as $totalVentasSeptiembre)
                                        <td class="px-6 py-4 border-b-2 border-custom-morado">
                                            {{ $totalVentasSeptiembre }}
                                        </td>
                                    @endforeach
                                    <td class="px-6 py-4 bg-purple-300 border-b-2 border-e-2 border-custom-morado">
                                        {{ number_format($sumatoriaSeptiembre / 7, 2) }}
                                    </td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 border-b-2 border-x-2 border-custom-morado">
                                        Octubre
                                    </th>
                                    @foreach ($alignedDataOctubre as $totalVentasOctubre)
                                        <td class="px-6 py-4 border-b-2 border-custom-morado">
                                            {{ $totalVentasOctubre }}
                                        </td>
                                    @endforeach
                                    <td class="px-6 py-4 bg-purple-300 border-b-2 border-e-2 border-custom-morado">
                                        {{ number_format($sumatoriaOctubre / 7, 2) }}
                                    </td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 border-b-2 border-x-2 border-custom-morado">
                                        Noviembre
                                    </th>
                                    @foreach ($alignedDataNoviembre as $totalVentasNoviembre)
                                        <td class="px-6 py-4 border-b-2 border-custom-morado">
                                            {{ $totalVentasNoviembre }}
                                        </td>
                                    @endforeach
                                    <td class="px-6 py-4 bg-purple-300 border-b-2 border-e-2 border-custom-morado">
                                        {{ number_format($sumatoriaNoviembre / 7, 2) }}
                                    </td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 border-b-2 border-x-2 border-custom-morado">
                                        Diciembre
                                    </th>
                                    @foreach ($alignedDataDiciembre as $totalVentasDiciembre)
                                        <td class="px-6 py-4 border-b-2 border-custom-morado">
                                            {{ $totalVentasDiciembre }}
                                        </td>
                                    @endforeach
                                    <td class="px-6 py-4 bg-purple-300 border-b-2 border-e-2 border-custom-morado">
                                        {{ number_format($sumatoriaDiciembre / 7, 2) }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    @else
                        <table class="w-11/12 m-auto text-sm text-left rtl:text-right text-gray-500">
                            <thead class="text-xs text-center text-gray-700 uppercase">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 bg-gray-50 border-y-2 border-x-2 border-custom-morado">
                                        MES
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 border-y-2 border-custom-morado">
                                        2018
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 border-y-2 border-custom-morado">
                                        2019
                                    </th>
                                    <th scope="col" class="px-6 py-3  bg-gray-50 border-y-2 border-custom-morado">
                                        2020
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 border-y-2 border-custom-morado">
                                        2021
                                    </th>
                                    <th scope="col" class="px-6 py-3  bg-gray-50 border-y-2 border-custom-morado">
                                        2022
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 border-y-2 border-custom-morado">
                                        2023
                                    </th>
                                    <th scope="col" class="px-6 py-3  bg-gray-50 border-y-2 border-custom-morado">
                                        2024
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 bg-gray-50 border-y-2 border-e-2 border-custom-morado">
                                        PROMEDIO
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr class="border-b border-gray-200">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 border-b-2 border-x-2 border-custom-morado">
                                        Enero
                                    </th>
                                    @foreach ($alignedDataGeneralEnero as $totalVentasGeneralesEnero)
                                        <td class="px-6 py-4 border-b-2 border-custom-morado">
                                            {{ $totalVentasGeneralesEnero }}
                                        </td>
                                    @endforeach

                                    <td class="px-6 py-4 bg-purple-300 border-b-2 border-e-2 border-custom-morado">
                                        {{ number_format($sumatoriaGeneralEnero / 7, 2) }}
                                    </td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 border-b-2 border-x-2 border-custom-morado">
                                        Febrero
                                    </th>
                                    @foreach ($alignedDataGeneralFebrero as $totalVentasGeneralesFebrero)
                                        <td class="px-6 py-4 border-b-2 border-custom-morado">
                                            {{ $totalVentasGeneralesFebrero }}
                                        </td>
                                    @endforeach
                                    <td class="px-6 py-4 bg-purple-300 border-b-2 border-e-2 border-custom-morado">
                                        {{ number_format($sumatoriaGeneralFebrero / 7, 2) }} 
                                    </td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 border-b-2 border-x-2 border-custom-morado">
                                        Marzo
                                    </th>
                                    @foreach ($alignedDataGeneralMarzo as $totalVentasGeneralesMarzo)
                                        <td class="px-6 py-4 border-b-2 border-custom-morado">
                                            {{ $totalVentasGeneralesMarzo }}
                                        </td>
                                    @endforeach
                                    <td class="px-6 py-4 bg-purple-300 border-b-2 border-e-2 border-custom-morado">
                                        {{ number_format($sumatoriaGeneralMarzo / 7, 2) }} 
                                    </td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 border-b-2 border-x-2 border-custom-morado">
                                        Abril
                                    </th>
                                    @foreach ($alignedDataGeneralAbril as $totalVentasGeneralesAbril)
                                        <td class="px-6 py-4 border-b-2 border-custom-morado">
                                            {{ $totalVentasGeneralesAbril }}
                                        </td>
                                    @endforeach
                                    <td class="px-6 py-4 bg-purple-300 border-b-2 border-e-2 border-custom-morado">
                                        {{ number_format($sumatoriaGeneralAbril / 7, 2) }} 
                                    </td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 border-b-2 border-x-2 border-custom-morado">
                                        Mayo
                                    </th>
                                    @foreach ($alignedDataGeneralMayo as $totalVentasGeneralesMayo)
                                        <td class="px-6 py-4 border-b-2 border-custom-morado">
                                            {{ $totalVentasGeneralesMayo }}
                                        </td>
                                    @endforeach
                                    <td class="px-6 py-4 bg-purple-300 border-b-2 border-e-2 border-custom-morado">
                                        {{ number_format($sumatoriaGeneralMayo / 7, 2) }} 
                                    </td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 border-b-2 border-x-2 border-custom-morado">
                                        Junio
                                    </th>
                                    @foreach ($alignedDataGeneralJunio as $totalVentasGeneralesJunio)
                                        <td class="px-6 py-4 border-b-2 border-custom-morado">
                                            {{ $totalVentasGeneralesJunio }}
                                        </td>
                                    @endforeach
                                    <td class="px-6 py-4 bg-purple-300 border-b-2 border-e-2 border-custom-morado">
                                        {{ number_format($sumatoriaGeneralJunio / 7, 2) }} 
                                    </td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 border-b-2 border-x-2 border-custom-morado">
                                        Julio
                                    </th>
                                    @foreach ($alignedDataGeneralJulio as $totalVentasGeneralesJulio)
                                        <td class="px-6 py-4 border-b-2 border-custom-morado">
                                            {{ $totalVentasGeneralesJulio }}
                                        </td>
                                    @endforeach
                                    <td class="px-6 py-4 bg-purple-300 border-b-2 border-e-2 border-custom-morado">
                                        {{ number_format($sumatoriaGeneralJulio / 7, 2) }} 
                                    </td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 border-b-2 border-x-2 border-custom-morado">
                                        Agosto
                                    </th>
                                    @foreach ($alignedDataGeneralAgosto as $totalVentasGeneralesAgosto)
                                        <td class="px-6 py-4 border-b-2 border-custom-morado">
                                            {{ $totalVentasGeneralesAgosto }}
                                        </td>
                                    @endforeach
                                    <td class="px-6 py-4 bg-purple-300 border-b-2 border-e-2 border-custom-morado">
                                        {{ number_format($sumatoriaGeneralAgosto / 7, 2) }} 
                                    </td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 border-b-2 border-x-2 border-custom-morado">
                                        Septiembre
                                    </th>
                                    @foreach ($alignedDataGeneralSeptiembre as $totalVentasGeneralesSeptiembre)
                                        <td class="px-6 py-4 border-b-2 border-custom-morado">
                                            {{ $totalVentasGeneralesSeptiembre }}
                                        </td>
                                    @endforeach
                                    <td class="px-6 py-4 bg-purple-300 border-b-2 border-e-2 border-custom-morado">
                                        {{ number_format($sumatoriaGeneralSeptiembre / 7, 2) }} 
                                    </td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 border-b-2 border-x-2 border-custom-morado">
                                        Octubre
                                    </th>
                                    @foreach ($alignedDataGeneralOctubre as $totalVentasGeneralesOctubre)
                                        <td class="px-6 py-4 border-b-2 border-custom-morado">
                                            {{ $totalVentasGeneralesOctubre }}
                                        </td>
                                    @endforeach
                                    <td class="px-6 py-4 bg-purple-300 border-b-2 border-e-2 border-custom-morado">
                                        {{ number_format($sumatoriaGeneralOctubre / 7, 2) }}
                                    </td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 border-b-2 border-x-2 border-custom-morado">
                                        Noviembre
                                    </th>
                                    @foreach ($alignedDataGeneralNoviembre as $totalVentasGeneralesNoviembre)
                                        <td class="px-6 py-4 border-b-2 border-custom-morado">
                                            {{ $totalVentasGeneralesNoviembre }}
                                        </td>
                                    @endforeach
                                    <td class="px-6 py-4 bg-purple-300 border-b-2 border-e-2 border-custom-morado">
                                        {{ number_format($sumatoriaGeneralNoviembre / 7, 2) }}
                                    </td>
                                </tr>

                                <tr class="border-b border-gray-200">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 border-b-2 border-x-2 border-custom-morado">
                                        Diciembre
                                    </th>
                                    @foreach ($alignedDataGeneralDiciembre as $totalVentasGeneralesDiciembre)
                                        <td class="px-6 py-4 border-b-2 border-custom-morado">
                                            {{ $totalVentasGeneralesDiciembre }}
                                        </td>
                                    @endforeach
                                    <td class="px-6 py-4 bg-purple-300 border-b-2 border-e-2 border-custom-morado">
                                        {{ number_format($sumatoriaGeneralDiciembre / 7, 2) }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    @endif
                </div>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        Chart.defaults.backgroundColor = '#000000';
        Chart.defaults.borderColor = '#000000';
        Chart.defaults.color = '#000000';

        var reporteAnual = document.getElementById('barChart').getContext('2d');

        var chartData = {
            labels: {!! json_encode($years) !!},
            datasets: [{
                label: 'Total Ventas Por Año',
                backgroundColor: 'rgb(75, 192, 192)',
                data: {!! json_encode($totalVentasPorAño) !!},
            }]
        };

        @if (!empty($colaboradorId) && !empty($añoInicio) && !empty($añoFin))
            chartData.datasets[0].data = {!! json_encode($totalVentasPorAsesorEntreAños) !!};
        @endif

        var chart = new Chart(reporteAnual, {
            type: 'bar',
            data: chartData,
            options: {
                responsive: false,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        type: 'category',
                        position: 'bottom'
                    },
                    y: {
                        type: 'linear',
                        position: 'left'
                    }
                }
            }
        });

        console.log('Datos JSON:', chartData);
    </script>
</x-app-layout>
