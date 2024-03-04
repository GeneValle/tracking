<style>
    #btnEditar,
    #btnPermisos,
    #btnEliminar,
    #btnCancelar,
    #btnGuardarPermisos {
        fill: white;
    }

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
                    Administración

                    <span class="font-normal text-lg text-custom-morado ml-6 mt-3">
                        Usuarios |
                    </span>

                    <!-- Modal registrar usuario -->
                    <button data-modal-target="agregarUsuario" data-modal-toggle="agregarUsuario"
                        class="block mt-4 ml-2 text-white bg-custom-morado hover:bg-fuchsia-600 rounded-lg text-center px-2 py-2"
                        type="button">
                        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 20 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 8h6m-3 3V5m-6-.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0ZM5 11h3a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z" />
                        </svg>
                    </button>

                    <div id="agregarUsuario" tabindex="-1" aria-hidden="true"
                        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-2xl max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow">
                                <!-- Modal header -->
                                <div class="bg-custom-morado flex items-start justify-between p-4 border-b rounded-t">
                                    <div class="text-xl font-semibold text-white">
                                        Agregar Usuario
                                    </div>

                                    <button type="button"
                                        class="text-white bg-transparent hover:bg-custom-header hover:text-custom-linksmenu rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center"
                                        data-modal-hide="agregarUsuario">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>

                                <form action="{{ route('adminUsuarios.store') }}" method="POST">
                                    @csrf

                                    <div class="grid grid-cols-2 gap-6 px-4">
                                        <div class="my-3">
                                            <label for="nombre"
                                                class="text-base text-custom-morado mx-3">Nombre(s):</label>
                                            <input type="text" class="rounded-lg ml-2 w-full" name="nombre"
                                                id="nombre">
                                        </div>

                                        <div class="my-3">
                                            <label for="email" class="text-base text-custom-morado mx-3">Correo
                                                electrónico:</label>
                                            <input type="text" class="rounded-lg ml-2 w-full" name="email"
                                                id="email">
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-2 gap-6 px-4">
                                        <div class="my-3">
                                            <label for="profesion"
                                                class="text-base text-custom-morado mx-3">Profesión:</label>
                                            <input type="text" class="rounded-lg ml-2 w-full" name="profesion"
                                                id="profesion">
                                        </div>

                                        <div class="my-3">
                                            <label for="password"
                                                class="text-base text-custom-morado mx-3">Contraseña:</label>
                                            <input type="text" class="rounded-lg ml-2 w-full" name="password"
                                                id="password">
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-2 gap-6 px-4">
                                        <div class="my-3">
                                            <label for="telefono"
                                                class="text-base text-custom-morado mx-3">Télefono:</label>
                                            <input type="text" class="rounded-lg ml-2 w-full" name="telefono"
                                                id="telefono">
                                        </div>

                                        <div class="my-3">
                                            <label for="puesto"
                                                class="text-base text-custom-morado mx-3">Puesto:</label>
                                            <select name="puesto" id="puesto"
                                                class="rounded-lg ml-2 h-10 w-full text-xs text-custom-morado">
                                                <option selected>---Selecciona una opción---</option>
                                                @foreach ($puestoUsuario as $puesto)
                                                    <option value="{{ $puesto }}">{{ $puesto }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="text-right p-2 border-y rounded-b">
                                        <button type="submit"
                                            class="text-custom-header bg-custom-morado focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2">
                                            Agregar</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Modal registrar usuario -->

                </div>

                <hr class="w-3/4 h-1 mx-auto my-4 bg-custom-morado border-0 rounded md:my-5">

                <div class="flex flex-wrap my-5">
                    @foreach ($usuarios as $usuario)
                        <div class="w-1/3 px-4 mb-4">
                            <div class="max-w-sm bg-purple-300 border border-purple-500 rounded-lg shadow">

                                <div class="flex flex-wrap justify-between">

                                    <div class="w-1/4"></div>

                                    <div class="w-3/4">

                                        <div class="text-xl text-center text-custom-morado font-semibold">
                                            {{ $usuario->name }}
                                        </div>
                                        <div class="text-base text-center text-custom-morado font-normal">
                                            {{ $usuario->puesto }}
                                        </div>

                                        <hr class="w-auto h-1 mx-auto my-1 bg-custom-morado border-0 rounded md:my-5">

                                        <div class="grid grid-cols-4 gap-1 px-2">
                                            {{-- <div class="text-custom-morado text-sm font-semibold">
                                                {{ $usuario->usuario }}
                                            </div> --}}

                                            <div class="flex justify-center items-center">

                                                <!-- Modal editar usuario -->

                                                <button data-modal-target="editarUsuario{{ $usuario->id }}"
                                                    data-modal-toggle="editarUsuario{{ $usuario->id }}"
                                                    class="my-2 text-white bg-blue-600 hover:bg-blue-800 rounded-lg text-center px-2 py-2"
                                                    type="button">

                                                    <svg id="btnEditar" class="w-6 h-6 text-white" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <path
                                                            d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                                                    </svg>

                                                </button>

                                                <div id="editarUsuario{{ $usuario->id }}" tabindex="-1"
                                                    aria-hidden="true"
                                                    class="fixed z-50 hidden w-full p-6 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                    <div class="relative w-full max-w-2xl max-h-full">

                                                        <div class="relative bg-white rounded-lg shadow">

                                                            <!-- Modal header -->
                                                            <div
                                                                class="bg-custom-morado flex items-start justify-between p-4 border-b rounded-t">
                                                                <div class="text-3xl font-semibold text-white">
                                                                    Detalles de Usuario
                                                                </div>

                                                                <button type="button"
                                                                    class="text-white bg-transparent hover:bg-custom-header hover:text-custom-linksmenu rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center"
                                                                    data-modal-hide="editarUsuario{{ $usuario->id }}">
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
                                                                action="{{ route('adminUsuarios.update', $usuario) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('put')

                                                                <div class="grid grid-cols-2 gap-6 px-4">
                                                                    <div class="my-3">
                                                                        <label for="nombre"
                                                                            class="text-base text-custom-morado mx-3">Nombre(s):</label>
                                                                        <input type="text"
                                                                            class="rounded-lg ml-2 w-full"
                                                                            name="nombre" id="nombre"
                                                                            value={{ $usuario->name }}>
                                                                    </div>

                                                                    <div class="my-3">
                                                                        <label for="email"
                                                                            class="text-base text-custom-morado mx-3">Correo
                                                                            electrónico:</label>
                                                                        <input type="text"
                                                                            class="rounded-lg ml-2 w-full"
                                                                            name="email" id="email"
                                                                            value={{ $usuario->email }}>
                                                                    </div>
                                                                </div>

                                                                <div class="grid grid-cols-2 gap-6 px-4">
                                                                    <div class="my-3">
                                                                        <label for="profesion"
                                                                            class="text-base text-custom-morado mx-3">Profesión:</label>
                                                                        <input type="text"
                                                                            class="rounded-lg ml-2 w-full"
                                                                            name="profesion" id="profesion"
                                                                            value={{ $usuario->profesion }}>
                                                                    </div>
                                                                    <div class="my-3">
                                                                        <label for="password"
                                                                            class="text-base text-custom-morado mx-3">Contraseña:</label>
                                                                        <input type="password"
                                                                            class="rounded-lg ml-2 w-full"
                                                                            name="password" id="password"
                                                                            value="">
                                                                    </div>
                                                                </div>

                                                                <div class="grid grid-cols-2 gap-6 px-4">
                                                                    <div class="my-3">
                                                                        <label for="telefono"
                                                                            class="text-base text-custom-morado mx-3">Télefono:</label>
                                                                        <input type="text"
                                                                            class="rounded-lg ml-2 w-full"
                                                                            name="telefono" id="telefono"
                                                                            value={{ $usuario->telefono }}>
                                                                    </div>

                                                                    <div class="my-3">
                                                                        <label for="puesto"
                                                                            class="text-base text-custom-morado mx-3">Puesto:</label>
                                                                        <select name="puesto" id="puesto"
                                                                            class="rounded-lg h-10 w-full text-xs text-custom-morado">
                                                                            <option value="{{ $puesto }}"
                                                                                @if ($puesto == $usuario->puesto) selected @endif>
                                                                                {{ $usuario->puesto }}
                                                                            </option>
                                                                            <option value="asesor">asesor</option>
                                                                            <option value="lider de equipo">lider de
                                                                                equipo</option>
                                                                            <option value="gerente comercial">gerente
                                                                                comercial
                                                                            </option>
                                                                            <option
                                                                                value="director
                                                                comercial">
                                                                                director comercial
                                                                            </option>
                                                                            <option value="director general">director
                                                                                general</option>
                                                                            <option value="dueño">dueño</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <!-- Modal footer -->
                                                                <div class="text-right p-2 border-y rounded-b">
                                                                    <button type="submit"
                                                                        class="text-custom-header bg-custom-morado focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2">
                                                                        Actualizar datos de usuario</button>
                                                                </div>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal editar usuario -->
                                            </div>

                                            <div class="flex justify-center items-center">
                                                <!-- Modal permisos usuario -->

                                                <button data-modal-target="permisosUsuario"
                                                    data-modal-toggle="permisosUsuario"
                                                    class="my-2 text-white bg-blue-600 hover:bg-blue-800 rounded-lg text-center px-2 py-2"
                                                    type="button">

                                                    <svg id="btnPermisos" class="w-6 h-6 text-white"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 448 512">
                                                        <path
                                                            d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z" />
                                                    </svg>

                                                </button>

                                                <div id="permisosUsuario" tabindex="-1" aria-hidden="true"
                                                    class="fixed z-50 hidden w-full p-6 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                    <div class="relative w-full max-w-2xl max-h-full">

                                                        <div class="relative bg-white rounded-lg shadow">

                                                            <!-- Modal header -->
                                                            <div
                                                                class="bg-custom-morado flex items-start justify-between p-4 border-b rounded-t">
                                                                <div class="text-3xl font-semibold text-white">
                                                                    Permisos
                                                                </div>

                                                                <button type="button"
                                                                    class="text-white bg-transparent hover:bg-custom-header hover:text-custom-linksmenu rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center"
                                                                    data-modal-hide="permisosUsuario">
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
                                                                <div class="grid grid-cols-2 gap-6 px-5 my-4">
                                                                    <div class="relative overflow-x-auto">
                                                                        <table
                                                                            class="w-full text-sm text-left rtl:text-right text-gray-500">
                                                                            <thead
                                                                                class="text-xs text-gray-700 uppercase bg-gray-50">
                                                                                <tr>
                                                                                    <th scope="col"
                                                                                        class="px-6 py-3 bg-custom-morado text-center text-xl font-bold text-white">
                                                                                        Gerenciamiento
                                                                                    </th>
                                                                                    <th
                                                                                        class="px-6 py-3 bg-custom-morado">
                                                                                    </th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr class="bg-white border-b">
                                                                                    <td class="px-6 py-4">
                                                                                        Estructura del equipo
                                                                                    </td>
                                                                                    <td class="px-6 py-4">
                                                                                        <input type="checkbox"
                                                                                            name="estructura"
                                                                                            id="estructura"
                                                                                            class="rounded-lg">
                                                                                    </td>
                                                                                </tr>

                                                                                <tr class="bg-white border-b">
                                                                                    <td class="px-6 py-4">
                                                                                        Autorizaciones
                                                                                    </td>
                                                                                    <td class="px-6 py-4">
                                                                                        <input type="checkbox"
                                                                                            name="autorizaciones"
                                                                                            id="autorizaciones"
                                                                                            class="rounded-lg">
                                                                                    </td>
                                                                                </tr>

                                                                                <tr class="bg-white border-b">
                                                                                    <td class="px-6 py-4">
                                                                                        Autorizar contactos
                                                                                    </td>
                                                                                    <td class="px-6 py-4">
                                                                                        <input type="checkbox"
                                                                                            name="autorizarContactos"
                                                                                            id="autorizarContactos"
                                                                                            class="rounded-lg">
                                                                                    </td>
                                                                                </tr>

                                                                                <tr class="bg-white border-b">
                                                                                    <td class="px-6 py-4">
                                                                                        Autorizar Citas
                                                                                    </td>
                                                                                    <td class="px-6 py-4">
                                                                                        <input type="checkbox"
                                                                                            name="autorizarCitas"
                                                                                            id="autorizarCitas"
                                                                                            class="rounded-lg">
                                                                                    </td>
                                                                                </tr>

                                                                                <tr class="bg-white border-b">
                                                                                    <td class="px-6 py-4">
                                                                                        Desempeño
                                                                                    </td>
                                                                                    <td class="px-6 py-4">
                                                                                        <input type="checkbox"
                                                                                            name="desempeño"
                                                                                            id="desempeño"
                                                                                            class="rounded-lg">
                                                                                    </td>
                                                                                </tr>

                                                                                <tr class="bg-white border-b">
                                                                                    <td class="px-6 py-4">
                                                                                        Ranking
                                                                                    </td>
                                                                                    <td class="px-6 py-4">
                                                                                        <input type="checkbox"
                                                                                            name="ranking"
                                                                                            id="ranking"
                                                                                            class="rounded-lg">
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>

                                                                    <div class="relative overflow-x-auto">
                                                                        <table
                                                                            class="w-full text-sm text-left rtl:text-right text-gray-500">
                                                                            <thead
                                                                                class="text-xs text-gray-700 uppercase bg-gray-50">
                                                                                <tr>
                                                                                    <th scope="col"
                                                                                        class="px-6 py-3 bg-custom-morado text-center text-xl font-bold text-white">
                                                                                        Catalogos
                                                                                    </th>
                                                                                    <th
                                                                                        class="px-6 py-3 bg-custom-morado">
                                                                                    </th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr class="bg-white border-b">
                                                                                    <td class="px-6 py-4">
                                                                                        Colonias
                                                                                    </td>
                                                                                    <td class="px-6 py-4">
                                                                                        <input type="checkbox"
                                                                                            name="colonias"
                                                                                            id="colonias"
                                                                                            class="rounded-lg">
                                                                                    </td>
                                                                                </tr>

                                                                                <tr class="bg-white border-b">
                                                                                    <td class="px-6 py-4">
                                                                                        Empresas
                                                                                    </td>
                                                                                    <td class="px-6 py-4">
                                                                                        <input type="checkbox"
                                                                                            name="empresas"
                                                                                            id="empresas"
                                                                                            class="rounded-lg">
                                                                                    </td>
                                                                                </tr>

                                                                                <tr class="bg-white border-b">
                                                                                    <td class="px-6 py-4">
                                                                                        Orígenes
                                                                                    </td>
                                                                                    <td class="px-6 py-4">
                                                                                        <input type="checkbox"
                                                                                            name="orígenes"
                                                                                            id="orígenes"
                                                                                            class="rounded-lg">
                                                                                    </td>
                                                                                </tr>

                                                                                <tr class="bg-white border-b">
                                                                                    <td class="px-6 py-4">
                                                                                        Preferencias
                                                                                    </td>
                                                                                    <td class="px-6 py-4">
                                                                                        <input type="checkbox"
                                                                                            name="preferencias"
                                                                                            id="preferencias"
                                                                                            class="rounded-lg">
                                                                                    </td>
                                                                                </tr>

                                                                                <tr class="bg-white border-b">
                                                                                    <td class="px-6 py-4">
                                                                                        Citas
                                                                                    </td>
                                                                                    <td class="px-6 py-4">
                                                                                        <input type="checkbox"
                                                                                            name="citas"
                                                                                            id="citas"
                                                                                            class="rounded-lg">
                                                                                    </td>
                                                                                </tr>

                                                                                <tr class="bg-white border-b">
                                                                                    <td class="px-6 py-4">
                                                                                        Productos
                                                                                    </td>
                                                                                    <td class="px-6 py-4">
                                                                                        <input type="checkbox"
                                                                                            name="productos"
                                                                                            id="productos"
                                                                                            class="rounded-lg">
                                                                                    </td>
                                                                                </tr>

                                                                                <tr class="bg-white border-b">
                                                                                    <td class="px-6 py-4">
                                                                                        Causas de descarte
                                                                                    </td>
                                                                                    <td class="px-6 py-4">
                                                                                        <input type="checkbox"
                                                                                            name="causas"
                                                                                            id="causas"
                                                                                            class="rounded-lg">
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>

                                                                </div>

                                                                <div class="grid grid-cols-2 gap-6 px-5 my-4">

                                                                    <div class="relative overflow-x-auto">
                                                                        <table
                                                                            class="w-full text-sm text-left rtl:text-right text-gray-500">
                                                                            <thead
                                                                                class="text-xs text-gray-700 uppercase bg-gray-50">
                                                                                <tr>
                                                                                    <th scope="col"
                                                                                        class="px-6 py-3 bg-custom-morado text-center text-xl font-bold text-white">
                                                                                        Contactos
                                                                                    </th>
                                                                                    <th
                                                                                        class="px-6 py-3 bg-custom-morado">
                                                                                    </th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr class="bg-white border-b">
                                                                                    <td class="px-6 py-4">
                                                                                        Contactos
                                                                                    </td>
                                                                                    <td class="px-6 py-4">
                                                                                        <input type="checkbox"
                                                                                            name="contactos"
                                                                                            id="contactos"
                                                                                            class="rounded-lg">
                                                                                    </td>
                                                                                </tr>

                                                                                <tr class="bg-white border-b">
                                                                                    <td class="px-6 py-4">
                                                                                        Ventas
                                                                                    </td>
                                                                                    <td class="px-6 py-4">
                                                                                        <input type="checkbox"
                                                                                            name="ventas"
                                                                                            id="ventas"
                                                                                            class="rounded-lg">
                                                                                    </td>
                                                                                </tr>

                                                                                <tr class="bg-white border-b">
                                                                                    <td class="px-6 py-4">
                                                                                        Cotizaciones
                                                                                    </td>
                                                                                    <td class="px-6 py-4">
                                                                                        <input type="checkbox"
                                                                                            name="cotizaciones"
                                                                                            id="cotizaciones"
                                                                                            class="rounded-lg">
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>

                                                                    <div class="relative overflow-x-auto">
                                                                        <table
                                                                            class="w-full text-sm text-left rtl:text-right text-gray-500">
                                                                            <thead
                                                                                class="text-xs text-gray-700 uppercase bg-gray-50">
                                                                                <tr>
                                                                                    <th scope="col"
                                                                                        class="px-6 py-3 bg-custom-morado text-center text-xl font-bold text-white">
                                                                                        Reportes
                                                                                    </th>
                                                                                    <th
                                                                                        class="px-6 py-3 bg-custom-morado">
                                                                                    </th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr class="bg-white border-b">
                                                                                    <td class="px-6 py-4">
                                                                                        Citas
                                                                                    </td>
                                                                                    <td class="px-6 py-4">
                                                                                        <input type="checkbox"
                                                                                            name="reporteCitas"
                                                                                            id="reporteCitas"
                                                                                            class="rounded-lg">
                                                                                    </td>
                                                                                </tr>

                                                                                <tr class="bg-white border-b">
                                                                                    <td class="px-6 py-4">
                                                                                        Anual
                                                                                    </td>
                                                                                    <td class="px-6 py-4">
                                                                                        <input type="checkbox"
                                                                                            name="anual"
                                                                                            id="anual"
                                                                                            class="rounded-lg">
                                                                                    </td>
                                                                                </tr>

                                                                                <tr class="bg-white border-b">
                                                                                    <td class="px-6 py-4">
                                                                                        Asesor
                                                                                    </td>
                                                                                    <td class="px-6 py-4">
                                                                                        <input type="checkbox"
                                                                                            name="reporteAsesor"
                                                                                            id="reporteAsesor"
                                                                                            class="rounded-lg">
                                                                                    </td>
                                                                                </tr>

                                                                                <tr class="bg-white border-b">
                                                                                    <td class="px-6 py-4">
                                                                                        Descartados
                                                                                    </td>
                                                                                    <td class="px-6 py-4">
                                                                                        <input type="checkbox"
                                                                                            name="descartados"
                                                                                            id="descartados"
                                                                                            class="rounded-lg">
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="text-right">
                                                                <div class="inline-flex p-2 space-x-3">
                                                                    <button type="button" title="cancelar"
                                                                        class="bg-custom-morado rounded-lg w-10 h-10 ml-auto inline-flex justify-center items-center"
                                                                        data-modal-hide="permisosUsuario">
                                                                        <svg id="btnCancelar" class="w-6 h-6"
                                                                            aria-hidden="true"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 384 512">
                                                                            <path
                                                                                d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                                                                        </svg>
                                                                    </button>
                                                                    <button type="submit" title="Guardar cambios"
                                                                        class="bg-custom-morado rounded-lg w-10 h-10 ml-auto inline-flex justify-center items-center">
                                                                        <svg id="btnGuardarPermisos" class="w-6 h-6"
                                                                            aria-hidden="true"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 448 512">
                                                                            <path
                                                                                d="M48 96V416c0 8.8 7.2 16 16 16H384c8.8 0 16-7.2 16-16V170.5c0-4.2-1.7-8.3-4.7-11.3l33.9-33.9c12 12 18.7 28.3 18.7 45.3V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96C0 60.7 28.7 32 64 32H309.5c17 0 33.3 6.7 45.3 18.7l74.5 74.5-33.9 33.9L320.8 84.7c-.3-.3-.5-.5-.8-.8V184c0 13.3-10.7 24-24 24H104c-13.3 0-24-10.7-24-24V80H64c-8.8 0-16 7.2-16 16zm80-16v80H272V80H128zm32 240a64 64 0 1 1 128 0 64 64 0 1 1 -128 0z" />
                                                                        </svg>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal permisos usuario -->
                                            </div>

                                            <div class="flex justify-center items-center">
                                                <!-- Modal eliminar Usuario -->

                                                <button data-modal-target="eliminarUsuario{{ $usuario->id }}"
                                                    data-modal-toggle="eliminarUsuario{{ $usuario->id }}"
                                                    class="my-2 text-white bg-blue-600 hover:bg-blue-800 rounded-lg text-center px-2 py-2"
                                                    type="button">

                                                    <svg id="btnEliminar" class="w-6 h-6 text-white"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 448 512">
                                                        <path
                                                            d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                                                    </svg>

                                                </button>

                                                <div id="eliminarUsuario{{ $usuario->id }}" tabindex="-1"
                                                    aria-hidden="true"
                                                    class="fixed z-50 hidden w-full p-6 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                    <div class="relative w-full max-w-2xl max-h-full">

                                                        <div class="relative bg-white rounded-lg shadow">

                                                            <!-- Modal header -->
                                                            <div
                                                                class="bg-custom-morado flex items-start justify-between p-4 border-b rounded-t">
                                                                <div class="text-3xl font-semibold text-white">
                                                                    Atencion
                                                                </div>

                                                                <button type="button"
                                                                    class="text-white bg-transparent hover:bg-custom-header hover:text-custom-linksmenu rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center"
                                                                    data-modal-hide="eliminarUsuario{{ $usuario->id }}">
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

                                                            <div
                                                                class="text-2xl text-center text-custom-morado font-bold my-4">
                                                                ¿Desea eliminar el usuario seleccionado?
                                                            </div>

                                                            <form
                                                                action="{{ route('adminUsuarios.destroy', $usuario->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <div class="text-right">
                                                                    <div class="inline-flex p-2 space-x-3">
                                                                        <button type="button" title="cancelar"
                                                                            class="bg-custom-morado rounded-lg w-10 h-10 ml-auto inline-flex justify-center items-center"
                                                                            data-modal-hide="eliminarUsuario{{ $usuario->id }}">
                                                                            <svg id="btnCancelar" class="w-6 h-6"
                                                                                aria-hidden="true"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                viewBox="0 0 384 512">
                                                                                <path
                                                                                    d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                                                                            </svg>
                                                                        </button>
                                                                        <button type="submit" title="Eliminar"
                                                                            class="bg-custom-morado rounded-lg w-10 h-10 ml-auto inline-flex justify-center items-center">
                                                                            <svg id="btnEliminar" class="w-6 h-6"
                                                                                aria-hidden="true"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                viewBox="0 0 448 512" fill="none">
                                                                                <path
                                                                                    d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                                                                            </svg>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal eliminar Usuario -->
                                            </div>
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
