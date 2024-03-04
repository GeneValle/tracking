<style>
    #agregarProducto,
    #eliminarProducto {
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

                <div class="mt-4 ml-6 font-bold text-4xl text-custom-morado flex items-center">
                    Cotizaciones

                    <span class="font-normal text-lg text-custom-morado ml-6 mt-3">|</span>

                    <button data-modal-target="agregarCotizacion" data-modal-toggle="agregarCotizacion"
                        class="block mt-4 ml-2 text-white bg-custom-morado hover:bg-fuchsia-600 rounded-lg text-center px-2 py-2"
                        type="button">
                        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 20 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 8h6m-3 3V5m-6-.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0ZM5 11h3a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z" />
                        </svg>
                    </button>

                    <div id="agregarCotizacion" tabindex="-1" aria-hidden="true"
                        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-2xl max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow">
                                <!-- Modal header -->
                                <div class="bg-custom-morado flex items-start justify-between p-4 border-b rounded-t">
                                    <div class="text-xl font-semibold text-white">
                                        Agregar Cotización
                                    </div>

                                    <button type="button"
                                        class="text-white bg-transparent hover:bg-custom-header hover:text-custom-linksmenu rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center"
                                        data-modal-hide="agregarCotizacion">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->

                                <form accept-charset="utf-8" method="POST" action="{{ route('cotizaciones.store') }}">
                                    @csrf

                                    <label for="prospecto"
                                        class="text-lg font-semibold text-custom-morado px-5">Prospecto:</label>
                                    <div class="my-2">
                                        <select name="prospecto" id="prospecto"
                                            class="rounded-lg mx-6 h-10 w-4/5 text-xs text-custom-morado font-semibold"
                                            onclick="abrirCotizacion(this)">
                                            <option selected>---Selecciona una opción---</option>
                                            @foreach ($prospectos as $prospecto)
                                                <option value="{{ $prospecto->id }}">{{ $prospecto->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div id="cotizacion" class="elementosCotizacion" style="display: none">
                                        <div class="flex flex-row my-6 px-6">
                                            <div class="basis-4/12 text-center">
                                                <label for="producto"
                                                    class="text-base text-custom-morado">Producto</label>
                                                <select name="producto" id="producto"
                                                    class="rounded-lg w-4/5 text-xs text-custom-morado"
                                                    onchange="establecerPrecio(this)">
                                                    <option selected>---Selecciona una opción---</option>
                                                    @foreach ($productos as $producto)
                                                        <option value="{{ $producto->id }}"
                                                            data-precio="{{ $producto->precio }}">
                                                            {{ $producto->producto }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="basis-2/12 text-center">
                                                <label for="precio"
                                                    class="text-lg font-semibold text-center text-custom-morado">Precio</label>
                                                <div class="my-2">
                                                    <div name="precio" id="precio">
                                                        <i class="text-xs">$00.00</i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="basis-2/12 text-center">
                                                <label for="cantidad"
                                                    class="text-base text-custom-morado">Cantidad</label>
                                                <div class="my-1">
                                                    <input type="number" class="rounded-lg ml-2 h-2/5 w-4/5"
                                                        name="cantidad" id="cantidad">
                                                </div>
                                            </div>

                                            <div class="basis-2/12 text-center">
                                                <label for="descuento" class="text-base text-custom-morado">Descuento
                                                    %</label>
                                                <div class="my-1">
                                                    <input type="number" class="rounded-lg ml-2 h-2/5 w-4/5"
                                                        name="descuento" id="descuento">
                                                </div>
                                            </div>
                                            <div class="basis-2/12 text-center m-auto">
                                                <button type="button" onclick="agregarProducto()"
                                                    title="Agregar Producto"
                                                    class="px-2 py-2 items-center justify-center bg-custom-morado rounded-lg">
                                                    <svg id="agregarProducto" xmlns="http://www.w3.org/2000/svg"
                                                        height="0.7em" viewBox="0 0 512 512">
                                                        <path
                                                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="overflow-x-auto shadow-md sm:rounded-lg my-4">
                                            <table class="text-sm w-full text-left text-custom-linksmenu">
                                                <thead
                                                    class="text-sm text-custom-linksmenu uppercase bg-custom-header my-4">
                                                    <tr class="text-center">
                                                        <th scope="col" class="px-4 py-3">
                                                            Nombre
                                                        </th>
                                                        <th scope="col" class="px-4 py-3">
                                                            Precio
                                                        </th>
                                                        <th scope="col" class="px-4 py-3">
                                                            Cantidad
                                                        </th>
                                                        <th scope="col" class="px-4 py-3">
                                                            Descuento
                                                        </th>
                                                        <th scope="col" class="px-4 py-3">
                                                            Total
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tablaCotizacion">
                                                    <tr class="bg-teal-500 hover:bg-teal-700 text-white">
                                                        <td class="text-center">

                                                        </td>
                                                        <td class="text-center">

                                                        </td>
                                                        <td class="text-center">

                                                        </td>
                                                        <td class="text-center">

                                                        </td>
                                                        <td class="text-center">

                                                        </td>
                                                        <td class="text-center">

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="inline-flex">
                                            <div class="text-right">
                                                <div class="my-2">
                                                    <div name="total" id="total">
                                                        <i class="text-base">Total:
                                                            $00.00</i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <hr class="w-auto h-0 mx-auto my-4 bg-custom-morado customDashed">

                                        <div class="text-center my-3">
                                            <label for="observaciones"
                                                class="text-lg font-semibold text-custom-morado px-5">Observaciones:</label>
                                            <textarea name="observaciones" id="observaciones" rows="4"
                                                class="block p-3 w-11/12 m-auto text-sm bg-white rounded-lg border-2 border-green-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
                                        </div>

                                        <input type="hidden" name="fecha" value="{{ now() }}">

                                        <div class="text-right p-2 border-y rounded-b">
                                            <button type="submit"
                                                class="text-custom-header bg-custom-morado focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2">
                                                Guardar cotización</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="w-3/4 h-1 mx-auto my-4 bg-custom-morado border-0 rounded md:my-5">

                <div class="rounded-lg {{-- shadow-2xl --}} p-6 my-3">
                    <form action="{{ route('cotizaciones') }}" method="get">
                        <div class="bg-purple-300 border border-custom-morado rounded-lg p-4">
                            <div class="text-xl text-center font-semibold text-custom-morado mb-2">Colaboradores</div>

                            <select name="colaboradores" id="underline_select"
                                class="block rounded-lg py-2.5 px-0 w-3/4 text-lg text-center mx-auto text-black bg-purple-300 border-0 border-b-2 border-custom-morado">
                                <option selected>Selecciona un colaborador</option>
                                @foreach ($usuarios as $usuario)
                                    <option value="{{ $usuario->id }}" class="text-base">
                                        {{ $usuario->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="grid grid-cols-2 gap-6 px-4 py-2">
                            <div>
                                <div class="text-center">
                                    <label for="fechaInicio" class="text-xl text-custom-morado">Fecha Inicial:</label>
                                </div>

                                <div class="mt-2 text-center">
                                    <input name="fechaInicio" id="fechaInicio" type="date"
                                        class="w-3/4 rounded-lg mx-auto bg-purple-300">
                                </div>
                            </div>

                            <div>
                                <div class="text-center">
                                    <label for="fechaFinal" class="text-xl text-custom-morado">Fecha Final:</label>
                                </div>

                                <div class="mt-2 text-center">
                                    <input type="date" name="fechaFinal" id="fechaFinal"
                                        class="rounded-lg w-3/4 mx-auto bg-purple-300">
                                </div>

                                <div class="text-right p-2 mt-7">
                                    <button type="submit"
                                        class="text-custom-header bg-custom-morado focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2">
                                        Filtrar cotizaciones </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="rounded-lg {{-- shadow-2xl --}} p-6 my-3">
                    @if ($cotizacionesCount === 0)
                    <table class="text-sm w-full text-left text-custom-linksmenu">
                        <thead class="text-sm text-custom-linksmenu uppercase bg-purple-300 border-custom-morado border-b-2 my-4">
                            <tr class="text-center">
                                <th scope="col" class="px-4 py-3">
                                    Fecha de cotización
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    Contacto
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    Observaciones
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    Envios
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    Visitas
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    Monto
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    Estado
                                </th>
                            </tr>
                        </thead>

                        <tbody class="bg-purple-300 hover:bg-purple-500 text-black">
                            <td class="text-center p-2">Sin registros</td>
                            <td class="text-center p-2">Sin registros</td>
                            <td class="text-center p-2">Sin registros</td>
                            <td class="text-center p-2">Sin registros</td>
                            <td class="text-center p-2">Sin registros</td>
                            <td class="text-center p-2">Sin registros</td>
                            <td class="text-center p-2">Sin registros</td>
                        </tbody>
                    </table>
                @else
                    <table class="text-sm w-full text-left text-custom-linksmenu">
                        <thead class="text-sm text-custom-linksmenu uppercase bg-purple-300 border-custom-morado border-b-2 my-4">
                            <tr class="text-center">
                                <th scope="col" class="px-4 py-3">
                                    Fecha de cotización
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    Contacto
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    Observaciones
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    Envios
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    Visitas
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    Monto
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    Estado
                                </th>
                            </tr>
                        </thead>

                        @foreach ($cotizaciones as $cotizacion)
                            <tbody class="bg-purple-300 hover:text-custom-header hover:bg-purple-500 text-black">
                                <td class="text-center p-2">
                                    {{ $cotizacion->fecha }}
                                </td>
                                <td class="text-center p-2">
                                    {{ $cotizacion->nombre }}
                                </td>
                                <td class="text-center p-2">
                                    {{ $cotizacion->observaciones }}
                                </td>
                                <td class="text-center p-2">
                                    {{ $cotizacion->envios }}
                                </td>
                                <td class="text-center p-2">
                                    {{ $cotizacion->visitas }}
                                </td>
                                <td class="text-center p-2">
                                    {{ $cotizacion->total }}
                                </td>
                                <td class="text-center p-2">
                                    {{ $cotizacion->estado }}
                                </td>
                            </tbody>
                        @endforeach
                    </table>
                    @endif
                </div>

            </div>
        </div>
    </div>

    <script>
        function abrirCotizacion(selectElement) {
            var seleccion = selectElement.value;
            var elementoCotizacion = document.getElementById('cotizacion');

            if (seleccion !== '---Selecciona una opción---') {
                elementoCotizacion.style.display = 'block';
            } else {
                elementoCotizacion.style.display = 'none';
            }
        }

        function establecerPrecio(selectElement) {
            var selectedOption = selectElement.options[selectElement.selectedIndex];
            var precio = selectedOption.getAttribute('data-precio');

            document.getElementById('precio').innerHTML = '<i class="text-xs">' + precio + '</i>';
        }

        function obtenerNombreProductoDesdeSelect(idProducto) {
            var select = document.getElementById('producto');
            var selectedOption = [...select.options].find(option => option.value === idProducto);

            return selectedOption ? selectedOption.textContent.trim() : '';
        }

        var sumaTotal = 0;
        var productosAgregados = [];

        function agregarProducto() {
            var idProducto = document.getElementById('producto').value;

            if (productosAgregados.includes(idProducto)) {
                alert('Este producto ya ha sido agregado a la cotización.');
                return;
            }

            var nombreProductoSelect = document.getElementById('producto');

            var nombreProducto = obtenerNombreProductoDesdeSelect(idProducto);
            var precio = document.getElementById('precio').textContent;
            var cantidad = parseFloat(document.getElementById('cantidad').value) || 0;
            var descuento = parseFloat(document.getElementById('descuento').value) || 0;
            var total = (parseFloat(precio) * parseFloat(cantidad)) * (1 - parseFloat(descuento) / 100);

            sumaTotal += total;

            console.log('ID Producto:', idProducto);
            console.log('Nombre Producto:', nombreProducto);
            console.log('Precio:', precio);
            console.log('Cantidad:', cantidad);
            console.log('Descuento:', descuento);
            console.log('Total:', total);
            console.log('Suma total:', sumaTotal.toFixed(2));

            var nuevaFila = '<tr class= "bg-teal-500 hover:bg-teal-700 text-white">' +
                '<td class="text-center">' + nombreProducto + '</td>' +
                '<td class="text-center">' + precio + '</td>' +
                '<td class="text-center">' + cantidad + '</td>' +
                '<td class="text-center">' + descuento + '</td>' +
                '<td class="text-center">$' + total.toFixed(2) + '</td>' +
                '<td class="text-center">' +
                '<button type="button" title="eliminar" class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-slate-600 rounded-lg hover:bg-slate-800" onclick="eliminarCotizacion(this)">' +
                '<svg fill="white" xmlns="http://www.w3.org/2000/svg" height="0.8em" class="auto" viewBox="0 0 384 512">' +
                '<path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/>' +
                '</svg>' +
                '</button>' +
                '</td>' +
                '<input type="hidden" name="productos[]" value="' + idProducto + '">' +
                '<input type="hidden" name="precios[]" value="' + precio + '">' +
                '<input type="hidden" name="cantidades[]" value="' + cantidad + '">' +
                '<input type="hidden" name="descuentos[]" value="' + descuento + '">' +
                '<input type="hidden" name="totales[]" value="' + total.toFixed(2) + '">' +
                '</tr>';

            productosAgregados.push(idProducto);

            var tabla = document.getElementById('tablaCotizacion')
            tabla.innerHTML += nuevaFila;

            actualizarSumaTotalEnTabla();
            document.getElementById('precio').innerHTML = '<i class="text-xs">' + '$00.00' + '</i>';
        }

        function eliminarCotizacion(btn) {
            var fila = btn.closest('tr');

            var idProducto = fila.querySelector('[name="productos[]"]').value;
            var totalEliminar = parseFloat(fila.querySelector('td:nth-child(5)').textContent.replace('$', ''));

            sumaTotal -= totalEliminar;
            sumaTotal = Math.abs(sumaTotal);
            console.log('Suma total después de eliminar:', sumaTotal.toFixed(2));

            actualizarSumaTotalEnTabla();

            productosAgregados = productosAgregados.filter(p => p !== idProducto);
            fila.remove();
        }

        function actualizarSumaTotalEnTabla() {
            var totalElement = document.getElementById('total');
            if (totalElement) {
                totalElement.innerHTML = 'Total: $' + sumaTotal.toFixed(2);
            }
        }
    </script>

</x-app-layout>
