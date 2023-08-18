<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400 ">
    <div class="flex justify-center h-screen w-screen  pt-4 px-4 pb-20 text-center sm:block sm:p-0">



        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">


            <div class="bg-white px-4 pt-5 pb-4  ">

                <h1>Pedido: {{ $pedidos_items2[0]->pedido_id }}</h1>

                <h3>Estado: {{ $pedidos_items2[0]->nomestado }}</h3>

                </p>
                <br>
                </p>

                <table class="table-auto w-full">
                    <tr>
                        <td class="border">Fecha</td>
                        <td class="border">{{ $pedidos_items2[0]->fecha }}</td>
                    </tr>
                    <tr>
                        <td class="border">Forma Entrega</td>
                        <td class="border">{{ $pedidos_items2[0]->nomformaent }}</td>
                    </tr>
                    <tr>
                        <td class="border">Apellido</td>
                        <td class="border">{{ $pedidos_items2[0]->apellido }}</td>
                    </tr>
                    <tr>
                        <td class="border">Nombre</td>
                        <td class="border">{{ $pedidos_items2[0]->nombre }}</td>
                    </tr>
                    <tr>
                        <td class="border">Telefono</td>
                        <td class="border">{{ $pedidos_items2[0]->telefono }}</td>
                    </tr>
                    <tr>
                        <td class="border">Correo</td>
                        <td class="border">{{ $pedidos_items2[0]->correo }}</td>
                    </tr>

                </table>

                <br>
                <p class="text-center">Items</p>
                <br>

                <div>
                    <table class="table-auto w-full">
                        <th>Codigo</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Sub-Total</th>
                        <th>Talle</th>
                        <th>Color</th>
                        <th>Producto</th>
                        @foreach ($pedidos_items2 as $items)
                            <tr>
                                <td class="border">{{ $items->codigo }}</td>
                                <td class="border">{{ $items->cantidad }}</td>
                                <td class="border">{{ $items->precioUnitario }}</td>
                                <td class="border">{{ $items->precioItem }}</td>
                                <td class="border">{{ $items->talle }}</td>
                                <td class="border">{{ $items->color }}</td>
                                <td class="border">{{ $items->nomproduct }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>

                @if ($items->pidedirec == 1)
                    <br>
                    <p class="text-center">Direccion de entrega</p>
                    <br>

                    <table class="table-auto w-full">
                        <tr>
                            <td class="border">Calle</td>
                            <td class="border">{{ $pedidos_items2[0]->del_calle }}</td>
                        </tr>
                        <tr>
                            <td class="border">Numero</td>
                            <td class="border">{{ $pedidos_items2[0]->del_nro }}</td>
                        </tr>
                        <tr>
                            <td class="border">Piso</td>
                            <td class="border">{{ $pedidos_items2[0]->del_piso }}</td>
                        </tr>
                        <tr>
                            <td class="border">Dpto.</td>
                            <td class="border">{{ $pedidos_items2[0]->del_dpto }}</td>
                        </tr>
                        <tr>
                            <td class="border">Localidad</td>
                            <td class="border">{{ $pedidos_items2[0]->nomlocalidad }}</td>
                        </tr>
                        <tr>
                            <td class="border">Provincia</td>
                            <td class="border">{{ $pedidos_items2[0]->nomprovincia }}</td>
                        </tr>

                    </table>
                @endif
                <br>
                </p>
                <p class="text-center">Totales</p>
                <br>
                </p>

                <table class="table-auto w-full">
                    <tr>
                        <td class="border">Sub-Total</td>
                        <td class="border text-right">{{ number_format($pedidos_items2[0]->subTotal,2) }}</td>
                    </tr>
                    <tr>
                        <td class="border ">Delivery</td>
                        <td class="border text-right">{{ number_format($pedidos_items2[0]->del_costo,2) }}</td>
                    </tr>
                    <tr>
                        <td class="border"><h1>Total</h1></td>
                        <td class="border text-right"><h1>{{ number_format($pedidos_items2[0]->total,2) }}</h1></td>
                    </tr>
                </table>

                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse col-span-3">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button wire:click="cerrarModalVerdeta()" type="button"
                            class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-gray-200 text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">Cerrar</button>
                    </span>

                </div>

            </div>
        </div>


    </div>
</div>
