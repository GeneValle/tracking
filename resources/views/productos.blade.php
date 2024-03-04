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
                        Productos |
                    </span>

                    <!-- Modal toggle -->
                    <button data-modal-target="registroProductos" data-modal-toggle="registroProductos"
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

                    <div id="registroProductos" tabindex="-1" aria-hidden="true"
                        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-2xl max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow">
                                <!-- Modal header -->
                                <div class="bg-custom-morado flex items-start justify-between p-4 border-b rounded-t">
                                    <div class="text-xl font-semibold text-white">
                                        Registrar producto
                                    </div>

                                    <button type="button"
                                        class="text-white bg-transparent hover:bg-custom-header hover:text-custom-linksmenu rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center"
                                        data-modal-hide="registroProductos">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>

                                <!-- Modal body -->

                                <form action="{{ route('productos.store') }}" method="POST">
                                    @csrf

                                    <div class="px-6">
                                        <div class="flex flex-wrap">
                                            <div class="basis-4/5">
                                                <label for="producto"
                                                    class="text-base text-custom-morado">Producto</label>
                                                <div class="my-2">
                                                    <input type="text" class="rounded-lg w-full" name="producto"
                                                        id="producto">
                                                </div>
                                            </div>
                                            <div class="basis-1/5 px-4">
                                                <label for="precio"
                                                    class="text-base text-custom-morado">Precio</label>
                                                <div class="my-2">
                                                    <input type="number" class="rounded-lg w-full" name="precio"
                                                        id="precio">
                                                </div>
                                            </div>
                                        </div>

                                        <label for="descripcion"
                                            class="block my-2 text-base text-custom-morado">Descripción</label>
                                        <textarea name="descripcion" id="descripcion" rows="4"
                                            class="block p-3 w-11/12 m-auto text-sm bg-white rounded-lg border-2 border-green-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="text-right p-2 border-y rounded-b">
                                        <button data-modal-hide="defaultModal" type="submit"
                                            class="text-custom-header bg-custom-morado focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2">
                                            Registrar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="my-4 ml-6 font-bold text-2xl text-custom-morado text-center">
                    Listado de productos disponibles para realizar una venta o cotización.
                </div>

                <hr class="w-3/4 h-1 mx-auto my-4 bg-custom-morado border-0 rounded md:my-5">

                <div class="overflow-x-auto {{-- shadow-md --}} sm:rounded-lg my-4">
                    <table class="text-sm w-4/5 text-left text-custom-linksmenu m-auto">
                        <thead class="text-sm text-custom-linksmenu uppercase bg-purple-300 border-b-2 border-custom-morado my-4">
                            <tr class="text-center">
                                <th scope="col" class="px-4 py-3">
                                    Producto
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    Descripción
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    Precio
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    Editar/Eliminar
                                </th>
                            </tr>
                        </thead>
                        @foreach ($productos as $producto)
                            <tbody>
                                <tr class="bg-teal-500 hover:bg-teal-700 text-white">
                                    <td class="text-center">
                                        {{ $producto->producto }}
                                    </td>
                                    <td class="text-center">
                                        {{ $producto->descripcion }}
                                    </td>
                                    <td class="text-center">
                                        $ {{ $producto->precio }}
                                    </td>
                                    <td class="text-center">
                                        <div class="inline-flex p-2 space-x-3">
                                            <button data-modal-target="editarProductos{{ $producto->id }}"
                                                data-modal-toggle="editarProductos{{ $producto->id }}"{{--  --}}
                                                type="button"
                                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="2em" class="auto"
                                                    viewBox="0 0 512 512">
                                                    <path
                                                        d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                                                </svg>
                                            </button>

                                            <div id="editarProductos{{ $producto->id }}" tabindex="-1"
                                                aria-hidden="true"
                                                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                <div class="relative w-full max-w-2xl max-h-full">
                                                    <!-- Modal content -->
                                                    <div class="relative bg-white rounded-lg shadow">
                                                        <!-- Modal header -->
                                                        <div
                                                            class="bg-custom-morado flex items-start justify-between p-4 border-b rounded-t">
                                                            <div class="text-xl font-semibold text-white">
                                                                Actualizar producto
                                                            </div>

                                                            <button type="button"
                                                                class="text-white bg-transparent hover:bg-custom-header hover:text-custom-linksmenu rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center"
                                                                data-modal-hide="editarProductos{{ $producto->id }}">
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

                                                        <form action="{{ route('productos.update', $producto) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('put')

                                                            <div class="px-6">
                                                                <div class="flex flex-wrap">
                                                                    <div class="basis-4/5">
                                                                        <label for="producto"
                                                                            class="text-base text-custom-morado">Producto</label>
                                                                        <div class="my-2">
                                                                            <input type="text"
                                                                                class="rounded-lg text-custom-morado w-full"
                                                                                name="producto" id="producto"
                                                                                value="{{ $producto->producto }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="basis-1/5 px-4">
                                                                        <label for="precio"
                                                                            class="text-base text-custom-morado">Precio</label>
                                                                        <div class="my-2">
                                                                            <input type="number"
                                                                                class="rounded-lg text-custom-morado w-full"
                                                                                name="precio" id="precio"
                                                                                value="{{ $producto->precio }}">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <label for="descripcion"
                                                                    class="block my-2 text-base text-custom-morado">Descripción</label>
                                                                <textarea name="descripcion" id="descripcion" rows="4"
                                                                    class="block p-3 w-11/12 m-auto text-sm text-custom-morado bg-white rounded-lg border-2 border-green-300 focus:ring-blue-500 focus:border-blue-500">
                                                                     {{ $producto->descripcion }}
                                                                     </textarea>
                                                            </div>

                                                            <!-- Modal footer -->
                                                            <div class="text-right p-2 border-y rounded-b">
                                                                <button data-modal-hide="defaultModal" type="submit"
                                                                    class="text-custom-header bg-custom-morado focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2">
                                                                    Actualizar producto</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <form action="{{ route('productos.destroy', $producto->id) }}"
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
