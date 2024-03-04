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
                    Gerenciamiento

                    <span class="font-normal text-lg text-custom-morado ml-6 mt-3">
                        Desempeño |
                    </span>
                </div>

                <hr class="w-3/4 h-1 mx-auto my-4 bg-custom-morado border-0 rounded md:my-5">

                <div class="mr-8 text-end text-custom-morado text-lg font-semibold">
                    Cuentas con un desempeño de  %
                </div>

                <div class="bg-purple-300 rounded-lg shadow-lg p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">

                        <div class="bg-purple-300 border border-custom-morado rounded-lg p-4 text-center">
                            <div class="text-xl font-semibold text-custom-morado mb-2">Mes</div>

                            <select id="underline_select"
                                class="block py-2.5 px-0 w-3/4 text-lg text-center mx-auto text-slate-950 bg-purple-300 border-0 border-b-2 border-custom-morado">
                                <option selected>Seleccione un mes</option>
                                <option value="01">Enero</option>
                                <option value="02">Febrero</option>
                                <option value="03">Marzo</option>
                                <option value="04">Abril</option>
                                <option value="05">Mayo</option>
                                <option value="06">Junio</option>
                                <option value="07">Julio</option>
                                <option value="08">Agosto</option>
                                <option value="09">Septiembre</option>
                                <option value="10">Octubre</option>
                                <option value="11">Noviembre</option>
                                <option value="12">Diciembre</option>
                            </select>
                        </div>

                        <div class="bg-purple-300 border border-custom-morado rounded-lg p-4 text-center">
                            <div class="text-xl font-semibold text-custom-morado mb-2">Año</div>
                            <select id="underline_select"
                                class="block py-2.5 px-0 w-3/4 text-lg text-center mx-auto text-slate-950 bg-purple-300 border-0 border-b-2 border-custom-morado">
                                <option selected>Selecciona un año</option>
                                <option value="19">2019</option>
                                <option value="20">2020</option>
                                <option value="21">2021</option>
                                <option value="22">2022</option>
                                <option value="23">2023</option>
                                <option value="24">2024</option>
                            </select>
                        </div>
                    </div>

                    <div class="text-lg text-violet-900 font-semibold mt-5 flex items-center">
                        Generar reporte
                        <button type="button"
                            class="ml-2 text-gray-50 bg-purple-400 focus:ring-4 focus:outline-none rounded-lg p-2.5 text-center inline-flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </button>
                    </div>

                    <hr class="w-4/5 h-0 mx-auto my-4 bg-violet-900 customDashed">

                    <div class="flex flex-wrap mt-5">
                        @foreach ($usuarios as $usuario)
                            <div class="w-1/3 px-4 mb-4">
                                <div class="max-w-sm bg-purple-200 border border-gray-200 rounded-lg shadow">
                                    <a href="#">
                                        <img class="rounded-t-lg" src="" alt="" />
                                    </a>
                                    <div class="p-5">
                                        <div class="mb-2 text-2xl text-center font-bold tracking-tight text-blue-800">
                                            {{ $usuario->name }}
                                        </div>

                                        <hr class="w-3/4 h-0 mx-auto my-4 bg-violet-900 customDashed">

                                        <div class="mb-2 text-2xl text-center font-bold tracking-tight text-blue-800">
                                            %
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
