<style>
    form {
        margin-top: 0;
        margin-bottom: 0;
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
                    Catálogos

                    <span class="font-normal text-lg text-custom-morado ml-6 mt-3">
                        Empresas |
                    </span>

                    <!-- Modal toggle -->
                    <button data-modal-target="registroEmpresa" data-modal-toggle="registroEmpresa"
                        class="block mt-4 ml-2 text-white bg-custom-morado hover:bg-fuchsia-600 rounded-lg text-center px-2 py-2"
                        type="button">

                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" height="1em"
                            viewBox="0 0 512 512">
                            <style>
                                svg {
                                    fill: #ffffff
                                }
                            </style>
                            <path
                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                        </svg>
                    </button>

                    <div id="registroEmpresa" tabindex="-1" aria-hidden="true"
                        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-2xl max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow">
                                <!-- Modal header -->
                                <div class="bg-custom-morado flex items-start justify-between p-4 border-b rounded-t">
                                    <div class="text-xl font-semibold text-white">
                                        Registro de Empresa
                                    </div>

                                    <button type="button"
                                        class="text-white bg-transparent hover:bg-custom-header hover:text-custom-linksmenu rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center"
                                        data-modal-hide="registroEmpresa">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>

                                <!-- Modal body -->

                                <form action="{{ route('empresas.store') }}" method="POST">
                                    @csrf

                                    <div class="px-6">
                                        <label for="nombre" class="text-base text-custom-morado">Nombre</label>
                                        <div class="my-2">
                                            <input type="text" class="rounded-lg w-full h-7" name="nombre"
                                                id="nombre">
                                        </div>

                                        <label for="giro" class="text-base text-custom-morado">Giro</label>
                                        <div class="my-2">
                                            <input type="text" class="rounded-lg w-full h-7" name="giro"
                                                id="giro">
                                        </div>

                                        <label for="web" class="text-base text-custom-morado">Sitio web</label>
                                        <div class="my-2">
                                            <input type="text" class="rounded-lg w-full h-7" name="web"
                                                id="web">
                                        </div>

                                        <hr class="w-auto h-0 my-5 bg-custom-morado customDashed">

                                        <label for="calle" class="text-base text-custom-morado">Calle</label>
                                        <div class="my-2">
                                            <input type="text" class="rounded-lg w-full h-7" name="calle"
                                                id="calle">
                                        </div>

                                        <div class="grid grid-cols-2 gap-6">
                                            <div>
                                                <label for="noExt" class="text-base text-custom-morado">No.
                                                    Exterior</label>
                                                <div class="my-2">
                                                    <input type="text" class="rounded-lg w-full h-7" name="noExt"
                                                        id="noExt">
                                                </div>
                                            </div>
                                            <div>
                                                <label for="noInt" class="text-base text-custom-morado">No.
                                                    Interior</label>
                                                <div class="my-2">
                                                    <input type="text" class="rounded-lg w-full h-7" name="noInt"
                                                        id="noInt">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-2 gap-6">
                                            <div>
                                                <label for="colonia"
                                                    class="text-base text-custom-morado">Colonia</label>
                                                <div class="my-2">
                                                    <select name="colonia" id="colonia"
                                                        class="rounded-lg h-7 w-full text-xs text-custom-morado">
                                                        <option selected>---Selecciona una opción---</option>
                                                        @foreach ($colonias as $colonia)
                                                            <option value="{{ $colonia->id }}">
                                                                {{ $colonia->colonia }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div>
                                                <label for="ciudad"
                                                    class="text-base text-custom-morado">Ciudad</label>
                                                <div class="my-2">
                                                    <input type="text" class="rounded-lg w-full h-7" name="ciudad"
                                                        id="ciudad">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-2 gap-6">
                                            <div>
                                                <label for="municipio"
                                                    class="text-base text-custom-morado">Municipio</label>
                                                <div class="my-2">
                                                    <input type="text" class="rounded-lg w-full h-7"
                                                        name="municipio" id="municipio">
                                                </div>
                                            </div>
                                            <div>
                                                <label for="estado"
                                                    class="text-base text-custom-morado">Estado</label>
                                                <div class="my-2">
                                                    <input type="text" class="rounded-lg w-full h-7"
                                                        name="estado" id="estado">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-2 gap-6">
                                            <div>
                                                <label for="codPostal" class="text-base text-custom-morado">Código
                                                    Postal</label>
                                                <div class="my-2">
                                                    <input type="text" class="rounded-lg w-full h-7"
                                                        name="codPostal" id="codPostal">
                                                </div>
                                            </div>
                                            <div>
                                                <label for="pais"
                                                    class="text-base text-custom-morado">País</label>
                                                <div class="my-2">
                                                    <input type="text" class="rounded-lg w-full h-7"
                                                        name="pais" id="pais">
                                                </div>
                                            </div>
                                        </div>

                                        <label for="Observaciones"
                                            class="block ml-4 my-2 text-base text-custom-morado">Observaciones:</label>
                                        <textarea name="observaciones" id="observaciones" rows="4"
                                            class="block p-3 w-4/5 m-auto text-sm bg-white rounded-lg border-2 border-green-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
                                    </div>

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

                <div class="my-4 ml-6 font-bold text-2xl text-custom-morado text-center">
                    Listado de empresas a la cual puede pertenece un contacto.
                </div>

                <hr class="w-3/4 h-1 mx-auto my-4 bg-custom-morado border-0 rounded md:my-5">

                <div class="overflow-x-auto {{-- shadow-md --}} sm:rounded-lg my-4">
                    <table class="text-sm w-4/5 text-left text-custom-linksmenu m-auto">
                        <thead class="text-sm text-custom-linksmenu uppercase bg-purple-300 border-b-2 border-custom-morado my-4">
                            <tr class="text-center">
                                <th scope="col" class="px-4 py-3">
                                    Empresa
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    Giro
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    Pagina Web
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    Editar/Eliminar
                                </th>
                            </tr>
                        </thead>
                        @foreach ($empresas as $empresa)
                            <tbody>
                                <tr class="bg-teal-500 hover:bg-teal-700 text-white">
                                    <td class="text-center">
                                        {{ $empresa->nombreEmpresa }}
                                    </td>
                                    <td class="text-center">
                                        {{ $empresa->giro }}
                                    </td>
                                    <td class="text-center">
                                        {{ $empresa->sitioWeb }}
                                    </td>
                                    <td class="text-center">
                                        <div class="inline-flex p-2 space-x-3">

                                            {{-- Modal editar empresa --}}

                                            <button type="button"
                                                data-modal-target="editarEmpresa {{ $empresa->id }}"
                                                data-modal-toggle="editarEmpresa {{ $empresa->id }}"
                                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="2em" class="auto"
                                                    viewBox="0 0 512 512">
                                                    <path
                                                        d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                                                </svg>
                                            </button>

                                            <div id="editarEmpresa {{ $empresa->id }}" tabindex="-1"
                                                aria-hidden="true"
                                                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                <div class="relative w-full max-w-2xl max-h-full">
                                                    <!-- Modal content -->
                                                    <div class="relative bg-white rounded-lg shadow">
                                                        <!-- Modal header -->
                                                        <div
                                                            class="bg-custom-morado flex items-start justify-between p-4 border-b rounded-t">
                                                            <div class="text-xl font-semibold text-white">
                                                                Actualizar Empresa
                                                            </div>

                                                            <button type="button"
                                                                class="text-white bg-transparent hover:bg-custom-header hover:text-custom-linksmenu rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center"
                                                                data-modal-hide="editarEmpresa {{ $empresa->id }}">
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

                                                        <form action="{{ route('empresas.update', $empresa) }}"
                                                            method="POST">
                                                            @csrf

                                                            @method('put')

                                                            <div class="px-6">
                                                                <label for="nombre"
                                                                    class="text-base text-custom-morado">Nombre</label>
                                                                <div class="my-2">
                                                                    <input type="text"
                                                                        class="rounded-lg w-full text-custom-morado h-7"
                                                                        name="nombre" id="nombre"
                                                                        value={{ $empresa->nombreEmpresa }}>
                                                                </div>

                                                                <label for="giro"
                                                                    class="text-base text-custom-morado">Giro</label>
                                                                <div class="my-2">
                                                                    <input type="text"
                                                                        class="rounded-lg w-full text-custom-morado h-7"
                                                                        name="giro" id="giro"
                                                                        value={{ $empresa->giro }}>
                                                                </div>

                                                                <label for="web"
                                                                    class="text-base text-custom-morado">Sitio
                                                                    web</label>
                                                                <div class="my-2">
                                                                    <input type="text"
                                                                        class="rounded-lg text-custom-morado w-full h-7"
                                                                        name="web" id="web"
                                                                        value={{ $empresa->sitioWeb }}>
                                                                </div>

                                                                <hr
                                                                    class="w-auto h-0 my-5 bg-custom-morado customDashed">

                                                                <label for="calle"
                                                                    class="text-base text-custom-morado">Calle</label>
                                                                <div class="my-2">
                                                                    <input type="text"
                                                                        class="rounded-lg text-custom-morado w-full h-7"
                                                                        name="calle" id="calle"
                                                                        value={{ $empresa->calle }}>
                                                                </div>

                                                                <div class="grid grid-cols-2 gap-6">
                                                                    <div>
                                                                        <label for="noExt"
                                                                            class="text-base text-custom-morado">No.
                                                                            Exterior</label>
                                                                        <div class="my-2">
                                                                            <input type="text"
                                                                                class="rounded-lg text-custom-morado w-full h-7"
                                                                                name="noExt" id="noExt"
                                                                                value={{ $empresa->noExterior }}>
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <label for="noInt"
                                                                            class="text-base text-custom-morado">No.
                                                                            Interior</label>
                                                                        <div class="my-2">
                                                                            <input type="text"
                                                                                class="rounded-lg text-custom-morado w-full h-7"
                                                                                name="noInt" id="noInt"
                                                                                value={{ $empresa->noInterior }}>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="grid grid-cols-2 gap-6">
                                                                    <div>
                                                                        <label for="colonia"
                                                                            class="text-base text-custom-morado">Colonia</label>
                                                                        <div class="my-2">
                                                                           {{--  <select name="colonia" id="colonia"
                                                                                @selected({{ $empresa->colonias_id }})
                                                                                class="rounded-lg h-7 w-full text-xs text-custom-morado">
                                                                                <option selected>---Selecciona una
                                                                                    opción---</option>
                                                                                @foreach ($colonias as $colonia)
                                                                                    <option
                                                                                        value="{{ $colonia->id }}">
                                                                                        {{ $colonia->colonia }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select> --}}

                                                                            <select name="colonia" id="colonia"
                                                                                class="rounded-lg h-7 w-full text-xs text-custom-morado">
                                                                                <option value="">---Selecciona
                                                                                    una opción---</option>
                                                                                @foreach ($colonias as $colonia)
                                                                                    <option
                                                                                        value="{{ $colonia->id }}"
                                                                                        @if ($colonia->id == $empresa->colonias_id) selected @endif>
                                                                                        {{ $colonia->colonia }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <label for="ciudad"
                                                                            class="text-base text-custom-morado">Ciudad</label>
                                                                        <div class="my-2">
                                                                            <input type="text"
                                                                                class="rounded-lg text-custom-morado w-full h-7"
                                                                                name="ciudad" id="ciudad"
                                                                                value="{{ $empresa->ciudad }}">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="grid grid-cols-2 gap-6">
                                                                    <div>
                                                                        <label for="municipio"
                                                                            class="text-base text-custom-morado">Municipio</label>
                                                                        <div class="my-2">
                                                                            <input type="text"
                                                                                class="rounded-lg text-custom-morado w-full h-7"
                                                                                name="municipio" id="municipio"
                                                                                value="{{ $empresa->municipio }}">
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <label for="estado"
                                                                            class="text-base text-custom-morado">Estado</label>
                                                                        <div class="my-2">
                                                                            <input type="text"
                                                                                class="rounded-lg text-custom-morado w-full h-7"
                                                                                name="estado" id="estado"
                                                                                value={{ $empresa->estado }}>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="grid grid-cols-2 gap-6">
                                                                    <div>
                                                                        <label for="codPostal"
                                                                            class="text-base text-custom-morado">Código
                                                                            Postal</label>
                                                                        <div class="my-2">
                                                                            <input type="text"
                                                                                class="rounded-lg text-custom-morado w-full h-7"
                                                                                name="codPostal" id="codPostal"
                                                                                value={{ $empresa->codPostal }}>
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <label for="pais"
                                                                            class="text-base text-custom-morado">País</label>
                                                                        <div class="my-2">
                                                                            <input type="text"
                                                                                class="rounded-lg text-custom-morado w-full h-7"
                                                                                name="pais" id="pais"
                                                                                value={{ $empresa->pais }}>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <label for="Observaciones"
                                                                    class="block ml-4 my-2 text-base text-custom-morado">Observaciones:</label>
                                                                <textarea name="observaciones" id="observaciones" rows="4"
                                                                    class="block p-3 w-4/5 m-auto text-custom-morado text-sm bg-white rounded-lg border-2 border-green-300 focus:ring-blue-500 focus:border-blue-500"> 
                                                                    {{ $empresa->observaciones }} 
                                                                </textarea>
                                                            </div>

                                                            <div class="text-right p-2 border-y rounded-b">
                                                                <button type="submit"
                                                                    class="text-custom-header bg-custom-morado focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2">
                                                                    Actualizar datos de empresa</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Modal editar empresa --}}

                                            <form action="{{ route('empresas.destroy', $empresa->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('delete')

                                                <button type="submit"
                                                    class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="2em"
                                                        class="auto" viewBox="0 0 512 512">
                                                        <path
                                                            d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c-9.4 9.4-9.4 24.6 0 33.9l47 47-47 47c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l47-47 47 47c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-47-47 47-47c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-47 47-47-47c-9.4-9.4-24.6-9.4-33.9 0z" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
