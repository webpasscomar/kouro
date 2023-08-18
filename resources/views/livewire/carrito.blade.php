<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px6 lg:px-8">

        {{-- <h1 class="font-bold py-2 text-3xl">Carrito</h1> --}}

        {{-- Mostrar productos en carrito --}}
        @if (session('items'))
            <section class="grid grid-cols-12 gap-x-10 mt-10">
                {{-- Sección items del carrito --}}
                <div class="col-span-9">
                    @foreach (session('items') as $index => $item)
                        {{-- Pasar imágen dinámica al componente --}}
                        <livewire:item-carrito :key="$index" :producto_nombre="$item['producto_nombre']" :cantidad="$item['cantidad']" :producto_precio="$item['producto_precio']"
                            :index="$index" :apagar="$apagar" :producto_id="$item['producto_id']" :talle_id="$item['talle_id']" :color_id="$item['color_id']"
                            :color_nombre="$item['color_nombre']" :talle_nombre="$item['talle_nombre']">
                    @endforeach
                </div>

                {{-- Sección Total - Subtotal --}}
                <div class="col-span-3 bg-white overflow-hidden shadow-xl rounded-lg max-h-44">
                    <div class="grid grid-cols-1 p-4 place-items-stretch h-44">
                        <div class="flex items-center">
                            <p class="font-semibold flex-1">Subtotal:</p>
                            <span>$ {{ number_format(session('sub_total'), 2, ',', '.') }}</span>
                        </div>
                        <div class="flex items-center">
                            <p class="font-semibold flex-1">Costo de envío:</p>
                            <span>$ {{ number_format(session('costoentrega'), 2, ',', '.') }}</span>
                        </div>
                        <div class="flex font-bold text-xl items-center">
                            <p class="flex-1">Total:</p>
                            <span>$
                                {{ number_format(session('sub_total') + session('costoentrega'), 2, ',', '.') }}</span>
                        </div>
                    </div>
                </div>
            </section>
        @else
            {{-- Sino hay productos en el carrito mostrar mensaje --}}
            <section class="flex flex-col items-center justify-center">
                <h2 class="text-xl">No hay productos en el carrito</h2>
                <p class="flex gap-x-2 mt-5 font-bold items-center border-2 p-2 border-gray-500 rounded-md hover:bg-slate-200 shadow-sm shadow-gray-400"
                    role="button">
                    <img src="{{ asset('./img/hand.svg') }}" alt="elegir productos" class="w-5">
                    <a href="{{ route('productos.index') }}" class="inline-block">
                        <em>
                            Mira nuestros productos
                        </em>
                    </a>
                </p>
            </section>
        @endif


        {{-- TODO: Revisar funcionamiento - Luego eliminar lo que esta debajo, es la anterior vista --}}

        {{-- <table class="table-auto w-full">
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
                @if ($apagar == 0)
                <button wire:click.prevent="$emit('alertCarritoDelete','{{ $item['producto_id'] }}','{{ $item['talle_id'] }}','{{ $item['color_id'] }}')" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4">Borrar</button>
                @endif

            </td>
            </tr>
            @endforeach
            </tbody>
            @else
            <p>No hay compras</p>
            @endif
            </table> --}}

        {{--
            <hr> --}}
        {{-- @if (session('items'))
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
            @endif

            --}}
        {{-- TODO:ELiminar todo lo de arriba de está linea si la vista carrito funciona adecuadamente --}}
        {{-- ================================================================================================================== --}}



        {{-- Datos del comprador  --}}

        @if (session('items'))
            <form class="mt-12">
                <h2 class="block mt-4 mb-10 font-bold text-2xl text-gray-700">Datos del comprador</h1>
                    <div class="grid grid-cols-5 gap-8 gap-y-16 content-center">
                        <!-- formulario de datos de comprador y entrega-->
                        <div class="h-11">
                            <label for="cli_nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre
                                <span class="text-red-500">*</span></label>
                            <input type="text"
                                class="bg-white shadow-md shadow-gray-300 rounded-lg h-11 border-[#a5a7a7] px-3 py-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:ring-0 placeholder:text-gray-400 focus:border-slate-400 focus:border-2"
                                id="cli_nombre" wire:model="cli_nombre" placeholder="Ingrese el nombre">
                            <x-jet-input-error for="cli_nombre" class="mt-2 ms-1" />
                        </div>

                        <div class="h-11">
                            <label for="cli_apellido" class="block text-gray-700 text-sm font-bold mb-2">Apellido
                                <span class="text-red-500">*</span></label>
                            <input type="text"
                                class="bg-white shadow-md shadow-gray-300 rounded-lg h-11 border-[#a5a7a7] px-3 py-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:ring-0 placeholder:text-gray-400 focus:border-slate-400 focus:border-2"
                                id="cli_apellido" wire:model="cli_apellido" placeholder="Ingrese el apellido">
                            <x-jet-input-error for="cli_apellido" class="mt-2 ms-1" />
                        </div>
                        <div class="h-11">
                            <label for="cli_email" class="block text-gray-700 text-sm font-bold mb-2">E-mail
                                <span class="text-red-500">*</span></label>
                            <input type="text"
                                class="bg-white shadow-md shadow-gray-300 rounded-lg h-11 border-[#a5a7a7] px-3 py-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:ring-0 placeholder:text-gray-400 focus:border-slate-400 focus:border-2"
                                id="cli_email" wire:model="cli_email" placeholder="Ingrese el correo">
                            <x-jet-input-error for="cli_email" class="mt-2 ms-1" />
                        </div>

                        <div class="h-11">
                            <label for="cli_telefono" class="block text-gray-700 text-sm font-bold mb-2">Telefono
                                <span class="text-red-500">*</span></label>
                            <input type="text"
                                class="bg-white shadow-md shadow-gray-300 rounded-lg h-11 border-[#a5a7a7] px-3 py-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:ring-0 placeholder:text-gray-400 focus:border-slate-400 focus:border-2"
                                id="cli_telefono" wire:model="cli_telefono" placeholder="Ingrese el teléfono">
                            <x-jet-input-error for="cli_telefono" class="mt-2 ms-1" />
                        </div>
                        <div class="h-11">
                            <label class="block text-gray-700 text-sm font-bold mb-1">Forma de Entrega</label>
                            <select
                                class="bg-white shadow-md shadow-gray-300 mt-1 rounded-lg h-11 border-[#a5a7a7] px-3 py-2 text-gray-400 leading-tight focus:outline-none focus:shadow-outline focus:ring-0 focus:border-slate-400 focus:border-2"
                                id="entrega_id" wire:model="entrega_id" wire:change="tipoentrega()">
                                <option value="0" class="text-gray-800">
                                    Seleccione una opción
                                </option>
                                @foreach ($formasdeentregas as $forma)
                                    <option value="{{ $forma['id'] }}" class="text-gray-800">
                                        {{ $forma['nombre'] }}
                                    </option>
                                @endforeach
                            </select>
                            <x-jet-input-error for="entrega_id" class="mt-2 ms-1" />
                        </div>

                        {{-- @if ($pidedirec == '1')  TODO:Revisar si funciona bien sin esta funcionalidad --}}

                        <div class="col-span-2 h-11">
                            <label for="cli_calle" class="block text-gray-700 text-sm font-bold mb-2">Calle</label>
                            <input type="text"
                                class="bg-white shadow-md shadow-gray-300 rounded-lg h-11 w-full border-[#a5a7a7] px-3 py-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:ring-0 placeholder:text-gray-400 focus:border-slate-400 focus:border-2"
                                id="cli_calle" wire:model="cli_calle" placeholder="Ingrese la dirección">
                            <x-jet-input-error for="cli_calle" class="mt-2 ms-1" />
                        </div>

                        <div class="h-11">
                            <label for="cli_nro" class="block text-gray-700 text-sm font-bold mb-2">Nro</label>
                            <input type="text"
                                class="bg-white shadow-md shadow-gray-300 rounded-lg h-11 border-[#a5a7a7] px-3 py-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:ring-0 placeholder:text-gray-400 focus:border-slate-400 focus:border-2"
                                id="cli_nro" wire:model="cli_nro" placeholder="Ingrese el número">
                            <x-jet-input-error for="cli_nro" class="mt-2 ms-1" />
                        </div>

                        <div class="h-11">
                            <label for="cli_piso" class="block text-gray-700 text-sm font-bold mb-2">Piso</label>
                            <input type="text"
                                class="bg-white shadow-md shadow-gray-300 rounded-lg h-11 border-[#a5a7a7] px-3 py-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:ring-0 placeholder:text-gray-400 focus:border-slate-400 focus:border-2"
                                id="cli_piso" wire:model="cli_piso" placeholder="Ingrese el piso">
                            <x-jet-input-error for="cli_piso" class="mt-2 ms-1" />
                        </div>


                        <div class="h-11">
                            <label for="cli_dpto" class="block text-gray-700 text-sm font-bold mb-2">Dpto</label>
                            <input type="text"
                                class="bg-white shadow-md shadow-gray-300 rounded-lg h-11 border-[#a5a7a7] px-3 py-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:ring-0 placeholder:text-gray-400 focus:border-slate-400 focus:border-2"
                                id="cli_dpto" wire:model="cli_dpto" placeholder="Ingrese el Dpto">
                            <x-jet-input-error for="cli_dpto" class="mt-2 ms-1" />
                        </div>

                        <div class="col-span-2 h-11">
                            <label class="block font-bold text-gray-700 text-sm mb-1">Provincia</label>
                            <select
                                class="bg-white shadow-md shadow-gray-300 mt-1 rounded-lg h-11 w-full border-[#a5a7a7] px-3 py-2 text-gray-400 leading-tight focus:outline-none focus:shadow-outline focus:ring-0 focus:border-slate-400 focus:border-2"
                                id="cli_prov_id" wire:model="cli_prov_id">
                                <option value="0" class="text-gray-800">
                                    Seleccione una Provincia
                                </option>
                                @foreach ($provincias as $provincia)
                                    <option value="{{ $provincia['id'] }}" class="text-gray-800">
                                        {{ $provincia['nombre'] }}
                                    </option>
                                @endforeach
                            </select>
                            <x-jet-input-error for="cli_prov_id" class="mt-2 ms-1" />
                        </div>

                        <div class="col-span-2 h-11">
                            <label class="block font-bold text-gray-700 text-sm mb-1">Localidad</label>
                            <select
                                class="bg-white shadow-md shadow-gray-300 mt-1 rounded-lg h-11 w-full border-[#a5a7a7] px-3 py-2 text-gray-400 leading-tight focus:outline-none focus:shadow-outline focus:ring-0 focus:border-slate-400 focus:border-2"
                                id="cli_prov_id" wire:model="cli_loc_id">
                                <option value="0" class="text-gray-800">
                                    Seleccione una Localidad
                                </option>
                                @if ($localidades)
                                    @foreach ($localidades as $localidad)
                                        <option value="{{ $localidad['id'] }}" class="text-gray-800">
                                            {{ $localidad['nombre'] }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                            <x-jet-input-error for="cli_loc_id" class="mt-2 ms-1" />
                        </div>

                        {{-- @endif --}}
                    </div>
            </form>
            <div class="bg-slate-100 sm:flex justify-between items-center col-span-5 mt-20">
                <p class="text-gray-600">
                    <span class="text-red-500">*</span> Datos obligatorios
                </p>
                <span class="flex gap-x-4 items-center">
                    <a href="/shop"
                        class="py-2 px-4 bg-gray-300 hover:bg-gray-400 w-42 h-10 text-gray-600 font-bold shadow-md shadow-gray-400 hover:shadow-none hover:text-gray-700 rounded-md">Seguir
                        comprando</a>
                    <button wire:click.prevent="cerrarCarrito()" type="button"
                        class="py-2 px-4 bg-red-500 hover:bg-red-600 w-42 h-10 text-slate-100 font-bold shadow-md shadow-gray-400 hover:shadow-none hover:text-white rounded-md">Continuar
                        Compra</button>
                </span>
            </div>
        @endif

        @if ($apagar == 1)
            <form>
                <!-- formulario de pago -->
                <div class="mt-4">
                    <label class="block font-bold text-gray-700">Forma de Pago</label>
                    <select class="form-select mt-1 block w-full" id="entrega_id" wire:model="forma_pago_id">
                        <option value="0">Seleccione una Forma de Pago</option>
                        @foreach ($formasdepagos as $formap)
                            <option value="{{ $formap['id'] }}">{{ $formap['nombre'] }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="forma_pago_id" />
                </div>
            </form>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse col-span-2">
                <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                    @if ($forma_pago_id != 0)
                        @if ($cobra == 1)
                            <button wire:click.prevent="pagar()" type="button"
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4">Pagar</button>
                        @else
                            <a href="/shop"
                                class="py-2 px-4 bg-blue-500 hover:bg-blue-600 text-white font-bold shadow-md focus:outline-none focus:ring-2
                                focus:ring-blue-500 focus:ring-offset-2 mr-1">Finalizar</a>
                        @endif
                    @endif
                </span>
            </div>
        @endif
    </div>
</div>
