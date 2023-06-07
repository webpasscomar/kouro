<div>

    <h1>Detalle del producto</h1>

    <div class="grid grid-cols-12 gap-6 pt-8">
        <div class="col-span-9">
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-6">
                    <img class="w-full h-96 object-cover object-center"
                        src="{{ asset('storage/productos/' . $producto->imagen) }}" alt="{{ $producto->nombre }}">
                </div>
                <div class="col-span-6">
                    <h2 class="text-gray-900 font-bold text-3xl mb-2" id="producto_id" wire:model="producto_id"> Id
                        {{ $producto->id }}</h2>
                    <h2 class="text-gray-900 font-bold text-3xl mb-2"> Nombre {{ $producto->nombre }}</h2>
                    <p class="text-gray-700 text-base">Desc. Corta {{ $producto->descCorta }}</p>
                    <p class="text-gray-700 text-base font-bold mt-2">Precio Lista {{ $producto->precioLista }}</p>
                    <p class="text-gray-700 text-base font-bold mt-2">Precio Oferta {{ $producto->precioOferta }}</p>
                    <p class="text-gray-700 text-base font-bold mt-2">Codigo {{ $producto->codigo }}</p>

                    <div class="mt-4">
                        <label class="block font-bold text-gray-700">Talle:</label>
                        <select class="form-select mt-1 block w-full" id="talle_id" wire:model="talle_id"
                            wire:change="checkstock()">
                            <option value="0">Seleccione un Talle</option>
                            @foreach ($talles as $talle)
                                <option value="{{ $talle['talle_id'] }}">{{ $talle['talle'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-4">
                        <label class="block font-bold text-gray-700">Color:</label>
                        <select class="form-select mt-1 block w-full" id="color_id" wire:model="color_id"
                            wire:change="checkstock()">
                            <option value="0">Seleccione un Color</option>
                            @foreach ($colores as $color)
                                <option value="{{ $color['color_id'] }}">{{ $color['color'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-4">
                        <button
                            class="py-2 px-4 bg-blue-500 hover:bg-blue-600 text-white font-bold rounded-md
                                      shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                            wire:click.prevent="decrementa()">
                            -
                        </button>

                        <input class="py-2 px-2 " type="numeric" id="cantidad" wire:model="cantidad"
                        wire:change="checkstock()" />

                        <button
                        class="py-2 px-4 bg-blue-500 hover:bg-blue-600 text-white font-bold rounded-md
                                   shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                        wire:click.prevent="incrementa()">
                        +
                        </button>
                        @if (parametro(10) === 'S')
                            Disponibles<input class="py-2 px-2 " type="numeric" id="disponibles"
                                wire:model="disponibles" disabled></input>
                        @endif
                    </div>

                    <div class="mt-4">
                        @if (parametro(10) === 'S')
                            <button
                                class="py-2 px-4
                            {{ ($cantidad > $disponibles) | ($talle_id == 0) | ($color_id == 0)
                                ? 'bg-slate-100 hover:bg-slate-200 text-{212 212 216}'
                                : ' bg-green-500 hover:bg-green-600 text-white' }}
                                                           font-bold rounded-md
                            shadow-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2
                            {{ ($cantidad > $disponibles) | ($talle_id == 0) | ($color_id == 0) ? 'disabled' : '' }}
                            "
                                wire:click.prevent="agregarcarrito()">
                                {{ $cantidad > $disponibles && $talle_id > 0 && $color_id > 0 ? 'Sin stock disponible' : ' Agregar al carrito' }}

                            </button>
                        @else
                            <button
                                class="py-2 px-4  bg-green-500 hover:bg-green-600 text-white  font-bold rounded-md shadow-md focus:outline-none focus:ring-2
                                         focus:ring-green-500 focus:ring-offset-2 "
                                wire:click.prevent="agregarcarrito()">Agregar al carrito</button>
                        @endif

                        <a href="/shop"
                        class="py-2 px-4  bg-blue-500 hover:bg-blue-600 text-white  font-bold rounded-md shadow-md focus:outline-none focus:ring-2
                        focus:ring-blue-500 focus:ring-offset-2 ">Seguir comprando</a>

                        @if (($cantidad > $disponibles) && ($talle_id !== 0) && ($color_id !== 0))
                            <div class="mt-4">
                                <div class="mb-4 col-span-2">
                                    <input type="text"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="mailaviso" placeholder="Tu e-mail y te avisamos cuando haya stock" wire:model="mailaviso">
                                        <x-jet-input-error for="mailaviso" />
                                </div>

                                <button
                                class="py-2 px-4  bg-red-500 hover:bg-red-600 text-white  font-bold rounded-md shadow-md focus:outline-none focus:ring-2
                                        focus:ring-red-500 focus:ring-offset-2 "   wire:click.prevent="avisostock()">Enviar</button>
                            </div>
                        @endif

                        <div>


                            {{-- @if (session('items'))
                                @foreach (session('items') as $item)
                                    {{ $item['producto_id'] }}
                                    {{ $item['producto_nombre'] }}
                                    {{ $item['producto_precio'] }}
                                    {{ $item['color_id'] }}
                                    {{ $item['color_nombre'] }}
                                    {{ $item['talle_id'] }}
                                    {{ $item['talle_nombre'] }}
                                    {{ $item['cantidad'] }}
                                @endforeach
                            @else
                            @endif --}}

                        </div>




                    </div>
                </div>
            </div>
        </div>

        <div class="col-span-3">
            {{-- @livewire('categorias-front') --}}
            <div class="grid grid-cols-1">
                <h3 class="block px-2 py-3 bg-gray-300">Otras categorias</h3>
                <ul role="list" class="px-2 py-3 font-medium text-gray-900">
                    @foreach ($categorias as $categoria)
                        <li class="block px-2 py-3 border-b">
                            <a href="{{ route('productos.categoria', $categoria['slug']) }}">
                                {{ $categoria['categoria'] }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>


</div>
