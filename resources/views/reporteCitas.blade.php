<x-app-layout>
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-purple-300 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="mt-4 ml-6 font-bold text-4xl text-slate-950 flex items-center">
                    Reportes

                    <span class="font-normal text-lg text-custom-morado ml-6 mt-3">
                        Citas |
                    </span>
                </div>

                <hr class="w-3/4 h-1 mx-auto my-4 bg-custom-morado border-0 rounded md:my-5">

                <form method="GET" action="{{ route('reporteCitas') }}">
                    @csrf
                    <div class="rounded-lg {{-- shadow-2xl --}} p-6 my-3">
                        <div class="bg-purple-300 border border-custom-morado rounded-lg p-4">
                            <div class="text-xl text-center font-semibold text-custom-morado mb-2">Colaboradores</div>

                            <select name="colaboradores" id="colaboradores"
                                class="block rounded-lg py-2.5 px-0 w-3/4 text-center mx-auto text-lg text-black bg-purple-300 border-0 border-b-2 border-custom-morado"
                                onchange="this.form.submit()">
                                <option selected>Selecciona un colaborador</option>
                                @foreach ($asesores as $asesor)
                                    <option value="{{ $asesor->id }}" class="text-base">
                                        {{ $asesor->name }} - {{ $asesor->puesto }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </form>

                <div class="grid grid-cols-4 gap-3 px-6 my-4 space-x-5">

                    <div class="max-w-sm text-white bg-teal-500 border border-gray-200 rounded-lg shadow py-6 cursor-pointer"
                        onclick="solicitarCitas('1');">

                        <div class="text-center text-4xl font-bold">
                            {{ $numeroCitasVencidas }}
                        </div>

                        <div class="text-right text-2xl font-medium mr-2">
                            Vencidas
                        </div>
                    </div>

                    <div class="max-w-sm text-white bg-green-500 border border-gray-200 rounded-lg shadow py-6 cursor-pointer"
                        onclick="solicitarCitas('2');">

                        <div class="text-center text-4xl font-bold">
                            {{ $numeroCitasHoy }}
                        </div>

                        <div class="text-right text-2xl font-medium mr-2">
                            Del día
                        </div>
                    </div>

                    <div class="max-w-sm text-white bg-red-500 border border-gray-200 rounded-lg shadow py-6 cursor-pointer"
                        onclick="solicitarCitas('3');">

                        <div class="text-center text-4xl font-bold">
                            {{ $numeroProximasCitas }}
                        </div>

                        <div class="text-right text-2xl font-medium mr-2">
                            Próximas
                        </div>
                    </div>

                    <div class="max-w-sm text-white bg-slate-600 border border-gray-200 rounded-lg shadow py-6 cursor-pointer"
                        onclick="solicitarCitas('4');">

                        <div class="text-center text-4xl font-bold">
                            {{ $numeroCitas }}
                        </div>

                        <div class="text-right text-2xl font-medium mr-2">
                            Todas
                        </div>
                    </div>
                </div>

                <div id="tablaCitasVencidas" {{-- style="display: none" --}}>
                    <div class="overflow-x-auto shadow-md sm:rounded-lg my-4">
                        @if ($citasVencidasCount === 0)
                            <table class="text-sm w-full text-left text-custom-linksmenu">
                                <thead
                                    class="text-sm text-custom-linksmenu uppercase bg-purple-300 border-b-2 border-custom-morado my-4">
                                    <tr class="text-center">
                                        <th scope="col" class="px-4 py-3">
                                            Funeraria
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Nombre
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Fecha
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Hora
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Estado
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Observaciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="bg-teal-500 hover:bg-teal-700 text-white">
                                        <td class="text-center">
                                            Sin registros
                                        </td>
                                        <td class="text-center">
                                            Sin registros
                                        </td>
                                        <td class="text-center">
                                            Sin registros
                                        </td>
                                        <td class="text-center">
                                            Sin registros
                                        </td>
                                        <td class="text-center">
                                            Sin registros
                                        </td>
                                        <td class="text-center">
                                            Sin registros
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        @else
                            <table class="text-sm w-full text-left text-custom-linksmenu">
                                <thead
                                    class="text-sm text-custom-linksmenu uppercase bg-purple-300 border-b-2 border-custom-morado my-4">
                                    <tr class="text-center">
                                        <th scope="col" class="px-4 py-3">
                                            Funeraria
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Nombre
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Fecha
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Hora
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Estado
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Observaciones
                                        </th>
                                    </tr>
                                </thead>
                                @foreach ($citasVencidas as $citaVencida)
                                    <tbody>
                                        <tr class="bg-teal-500 hover:bg-teal-700 text-white">
                                            <td class="text-center">
                                                {{ $citaVencida->funeraria }}
                                            </td>
                                            <td class="text-center">
                                                {{ $citaVencida->nombre }}
                                            </td>
                                            <td class="text-center">
                                                {{ $citaVencida->fecha }}
                                            </td>
                                            <td class="text-center">
                                                {{ $citaVencida->horaInicio }}
                                            </td>
                                            <td class="text-center">
                                                {{ $citaVencida->estado }}
                                            </td>
                                            <td class="text-center">
                                                {{ $citaVencida->observaciones }}
                                            </td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        @endif
                    </div>
                </div>

                <div id="tablaCitasHoy" style="display: none">
                    <div class="overflow-x-auto shadow-md sm:rounded-lg my-4">
                        @if ($citasHoyCount === 0)
                            <table class="text-sm w-full text-left text-custom-linksmenu">
                                <thead
                                    class="text-sm text-custom-linksmenu uppercase bg-purple-300 border-b-2 border-custom-morado my-4">
                                    <tr class="text-center">
                                        <th scope="col" class="px-4 py-3">
                                            Funeraria
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Nombre
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Fecha
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Hora
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Estado
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Observaciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="bg-green-500 hover:bg-green-700 text-white">
                                        <td class="text-center">
                                            Sin registros
                                        </td>
                                        <td class="text-center">
                                            Sin registros
                                        </td>
                                        <td class="text-center">
                                            Sin registros
                                        </td>
                                        <td class="text-center">
                                            Sin registros
                                        </td>
                                        <td class="text-center">
                                            Sin registros
                                        </td>
                                        <td class="text-center">
                                            Sin registros
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        @else
                            <table class="text-sm w-full text-left text-custom-linksmenu">
                                <thead
                                    class="text-sm text-custom-linksmenu uppercase bg-purple-300 border-b-2 border-custom-morado my-4">
                                    <tr class="text-center">
                                        <th scope="col" class="px-4 py-3">
                                            Funeraria
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Nombre
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Fecha
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Hora
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Estado
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Observaciones
                                        </th>
                                    </tr>
                                </thead>
                                @foreach ($citasHoy as $citaHoy)
                                    <tbody>
                                        <tr class="bg-green-500 hover:bg-green-700 text-white">
                                            <td class="text-center">
                                                {{ $citaHoy->funeraria }}
                                            </td>
                                            <td class="text-center">
                                                {{ $citaHoy->nombre }}
                                            </td>
                                            <td class="text-center">
                                                {{ $citaHoy->fecha }}
                                            </td>
                                            <td class="text-center">
                                                {{ $citaHoy->horaInicio }}
                                            </td>
                                            <td class="text-center">
                                                {{ $citaHoy->estado }}
                                            </td>
                                            <td class="text-center">
                                                {{ $citaHoy->observaciones }}
                                            </td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        @endif
                    </div>
                </div>

                <div id="tablaProximasCitas" style="display: none">
                    <div class="overflow-x-auto shadow-md sm:rounded-lg my-4">
                        @if ($proximasCitasCount === 0)
                            <table class="text-sm w-full text-left text-custom-linksmenu">
                                <thead
                                    class="text-sm text-custom-linksmenu uppercase bg-purple-300 border-b-2 border-custom-morado my-4">
                                    <tr class="text-center">
                                        <th scope="col" class="px-4 py-3">
                                            Funeraria
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Nombre
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Fecha
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Hora
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Estado
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Observaciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="bg-red-500 hover:bg-red-700 text-white">
                                        <td class="text-center">
                                            Sin registros
                                        </td>
                                        <td class="text-center">
                                            Sin registros
                                        </td>
                                        <td class="text-center">
                                            Sin registros
                                        </td>
                                        <td class="text-center">
                                            Sin registros
                                        </td>
                                        <td class="text-center">
                                            Sin registros
                                        </td>
                                        <td class="text-center">
                                            Sin registros
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        @else
                            <table class="text-sm w-full text-left text-custom-linksmenu">
                                <thead
                                    class="text-sm text-custom-linksmenu uppercase bg-purple-300 border-b-2 border-custom-morado my-4">
                                    <tr class="text-center">
                                        <th scope="col" class="px-4 py-3">
                                            Funeraria
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Nombre
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Fecha
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Hora
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Estado
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Observaciones
                                        </th>
                                    </tr>
                                </thead>
                                @foreach ($proximasCitas as $proximaCita)
                                    <tbody>
                                        <tr class="bg-red-500 hover:bg-red-700 text-white">
                                            <td class="text-center">
                                                {{ $proximaCita->funeraria }}
                                            </td>
                                            <td class="text-center">
                                                {{ $proximaCita->nombre }}
                                            </td>
                                            <td class="text-center">
                                                {{ $proximaCita->fecha }}
                                            </td>
                                            <td class="text-center">
                                                {{ $citaVencida->horaInicio }}
                                            </td>
                                            <td class="text-center">
                                                {{ $citaVencida->estado }}
                                            </td>
                                            <td class="text-center">
                                                {{ $citaVencida->observaciones }}
                                            </td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        @endif
                    </div>
                </div>

                <div id="tablaCitas" style="display: none">
                    <div class="overflow-x-auto shadow-md sm:rounded-lg my-4">
                        @if ($citasCount === 0)
                            <table class="text-sm w-full text-left text-custom-linksmenu">
                                <thead
                                    class="text-sm text-custom-linksmenu uppercase bg-purple-300 border-b-2 border-custom-morado my-4">
                                    <tr class="text-center">
                                        <th scope="col" class="px-4 py-3">
                                            Funeraria
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Nombre
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Fecha
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Hora
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Estado
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Observaciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="bg-slate-600 hover:bg-slate-800 text-white">
                                        <td class="text-center">
                                            Sin registros
                                        </td>
                                        <td class="text-center">
                                            Sin registros
                                        </td>
                                        <td class="text-center">
                                            Sin registros
                                        </td>
                                        <td class="text-center">
                                            Sin registros
                                        </td>
                                        <td class="text-center">
                                            Sin registros
                                        </td>
                                        <td class="text-center">
                                            Sin registros
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        @else
                            <table class="text-sm w-full text-left text-custom-linksmenu">
                                <thead
                                    class="text-sm text-custom-linksmenu uppercase bg-purple-300 border-b-2 border-custom-morado my-4">
                                    <tr class="text-center">
                                        <th scope="col" class="px-4 py-3">
                                            Funeraria
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Nombre
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Fecha
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Hora
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Estado
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Observaciones
                                        </th>
                                    </tr>
                                </thead>
                                @foreach ($citas as $cita)
                                    <tbody>
                                        <tr class="bg-slate-600 hover:bg-slate-800 text-white">
                                            <td class="text-center">
                                                {{ $cita->funeraria }}
                                            </td>
                                            <td class="text-center">
                                                {{ $cita->nombre }}
                                            </td>
                                            <td class="text-center">
                                                {{ $cita->fecha }}
                                            </td>
                                            <td class="text-center">
                                                {{ $cita->horaInicio }}
                                            </td>
                                            <td class="text-center">
                                                {{ $cita->estado }}
                                            </td>
                                            <td class="text-center">
                                                {{ $cita->observaciones }}
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

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        function solicitarCitas(id) {
            switch (id) {
                case "1":
                    $("#tablaCitasVencidas").show();
                    $("#tablaCitasHoy").hide();
                    $("#tablaProximasCitas").hide();
                    $("#tablaCitas").hide();
                    break;
                case "2":
                    $("#tablaCitasVencidas").hide();
                    $("#tablaCitasHoy").show();
                    $("#tablaProximasCitas").hide();
                    $("#tablaCitas").hide();
                    break;
                case "3":
                    $("#tablaCitasVencidas").hide();
                    $("#tablaCitasHoy").hide();
                    $("#tablaProximasCitas").show();
                    $("#tablaCitas").hide();
                    break;
                case "4":
                    $("#tablaCitasVencidas").hide();
                    $("#tablaCitasHoy").hide();
                    $("#tablaProximasCitas").hide();
                    $("#tablaCitas").show();
                    break;
            }
        }
    </script>
</x-app-layout>
