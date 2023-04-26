<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

            <h1 class="font-bold py-2 text-3xl">Carrito</h1>

            {{-- <h1>{{$subTotal}}</h1> --}}

            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Producto</th>
                        <th class="px-4 py-2">Talle</th>
                        <th class="px-4 py-2">Color</th>
                        <th class="px-4 py-2">Precio</th>
                        <th class="px-4 py-2">Cantidad</th>
                        <th class="px-4 py-2">Subtotal</th>
                    </tr>
                </thead>
                @if (session('items'))
                    <tbody>
                        @foreach (session('items') as $item)
                            <tr>
                                <td class="border px-4 py-2">{{ $item['producto_id'] }}</td>
                                <td class="border px-4 py-2">{{ $item['producto_nombre'] }}</td>
                                <td class="border px-4 py-2">{{ $item['talle_nombre'] }}</td>
                                <td class="border px-4 py-2">{{ $item['color_nombre'] }}</td>
                                <td class="border px-4 py-2" style="text-align: right;">
                                    {{ number_format($item['producto_precio'], 2, ',', '.') }}</td>
                                <td class="border px-4 py-2" style="text-align: right;">{{ $item['cantidad'] }}</td>
                                <td class="border px-4 py-2" style="text-align: right;">
                                    {{ number_format($item['cantidad'] * $item['producto_precio'], 2, ',', '.') }}</td>
                                <td class="border px-4 py-2 text-center">
                                    <button
                                        wire:click.prevent="$emit('alertCarritoDelete','{{ $item['producto_id'] }}','{{ $item['talle_id'] }}','{{ $item['color_id'] }}')"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4">Borrar</button>


                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                @else
                    <p>No hay compras</p>
                @endif
            </table>

            <hr>

            <table class="table-auto">
                <thead>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                    <tr>
                        <td class="border px-4 py-2 ">Subtotal</td>
                        <td class="border px-4 py-2 " style="text-align: right;">
                            {{ number_format(session('sub_total'), 2, ',', '.') }}</td>

                    </tr>
                    <tr>
                        <td class="border px-4 py-2">Costo de envío</td>
                        <td class="border px-4 py-2" style="text-align: right;">
                            {{ number_format(session('costoentrega'), 2, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">Total</td>
                        <td class="border px-4 py-2" style="text-align: right;">
                            {{ number_format(session('sub_total') + session('costoentrega'), 2, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>

            @if (session('items'))
                <div class="mt-4">
                    <label class="block font-bold text-gray-700">Datos del comprador</label>
                </div>
                <div class="mb-4 col-span-3">
                    <label for="cli_nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre *</label>
                    <input type="text"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="cli_nombre" wire:model="cli_nombre" >
                    <x-jet-input-error for="cli_nombre" />
                </div>

                <div class="mb-4 col-span-3">
                    <label for="cli_apellido" class="block text-gray-700 text-sm font-bold mb-2">Apellido *</label>
                    <input type="text"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="cli_apellido" wire:model="cli_apellido" >
                    <x-jet-input-error for="cli_apellido" />
                </div>


                <div class="mb-4 col-span-3">
                    <label for="cli_email" class="block text-gray-700 text-sm font-bold mb-2">E-mail *</label>
                    <input type="text"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="cli_email" wire:model="cli_email" >
                    <x-jet-input-error for="cli_email" />
                </div>

                <div class="mb-4 col-span-3">
                    <label for="cli_telefono" class="block text-gray-700 text-sm font-bold mb-2">Telefono *</label>
                    <input type="text"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="cli_telefono" wire:model="cli_telefono" >
                    <x-jet-input-error for="cli_telefono" />
                </div>



                <div class="mt-4">
                    <label class="block font-bold text-gray-700">Forma de Entrega</label>
                    <select class="form-select mt-1 block w-full" id="entrega_id" wire:model="entrega_id"
                        wire:change="tipoentrega()">
                        <option value="0">Seleccione una Forma de Entrega</option>
                        @foreach ($formasdeentregas as $forma)
                            <option value="{{ $forma['id'] }}">{{ $forma['nombre'] }}</option>
                        @endforeach
                    </select>
                </div>

                @if ($pidedirec == '1')
                    <div class="mt-4">
                        <label class="block font-bold text-gray-700">Direccion del comprador</label>
                    </div>

                    <div class="mb-4 col-span-3">
                        <label for="cli_calle class="block text-gray-700 text-sm font-bold mb-2">Calle</label>
                        <input type="text"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="cli_calle" wire:model="cli_calle"
                            >
                        <x-jet-input-error for="cli_calle" />
                    </div>

                    <div class="mb-4 col-span-3">
                        <label for="cli_nro class="block text-gray-700 text-sm font-bold mb-2">Nro</label>
                        <input type="text"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="cli_nro" wire:model="cli_nro" >
                        <x-jet-input-error for="cli_nro" />
                    </div>

                    <div class="mb-4 col-span-3">
                        <label for="cli_piso class="block text-gray-700 text-sm font-bold mb-2">Piso</label>
                        <input type="text"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="cli_piso" wire:model="cli_piso" >
                        <x-jet-input-error for="cli_piso" />
                    </div>


                    <div class="mb-4 col-span-3">
                        <label for="cli_dpto class="block text-gray-700 text-sm font-bold mb-2">Dpto</label>
                        <input type="text"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="cli_dpto" wire:model="cli_dpto" >
                        <x-jet-input-error for="cli_dpto" />
                    </div>


                    <div class="mt-4">
                        <label class="block font-bold text-gray-700">Provincia</label>
                        <select class="form-select mt-1 block w-full" id="cli_prov_id" wire:model="cli_prov_id"
                        >
                            <option value="0">Seleccione una Provincia</option>
                            @foreach ($provincias as $provincia)
                                <option value="{{ $provincia['id'] }}">{{ $provincia['nombre'] }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="mt-4">
                        <label class="block font-bold text-gray-700">Localidad</label>
                        <select class="form-select mt-1 block w-full" id="cli_prov_id" wire:model="cli_loc_id" >
                            <option value="0">Seleccione una Localidad</option>
                            @if($localidades)
                                @foreach ($localidades as $localidad)
                                    <option value="{{ $localidad['id'] }}">{{ $localidad['nombre'] }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>


                @endif
            @endif




        </div>
    </div>
</div>
