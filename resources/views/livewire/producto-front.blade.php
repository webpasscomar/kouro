<div>

    <!-- <h1>Detalle del producto</h1>

<div class="grid grid-cols-12 gap-6 pt-8">
    <div class="col-span-9">
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-6">
                <img class="w-full h-96 object-cover object-center" src="{{ asset('storage/productos/' . $producto->imagen) }}" alt="{{ $producto->nombre }}">
            </div>
            <div class="col-span-6">
                <h2 class="text-gray-900 font-bold text-3xl mb-2" id="producto_id" wire:model="producto_id"> Id
                    {{ $producto->id }}
                </h2>
                <h2 class="text-gray-900 font-bold text-3xl mb-2"> Nombre {{ $producto->nombre }}</h2>
                <p class="text-gray-700 text-base">Desc. Corta {{ $producto->descCorta }}</p>
                <p class="text-gray-700 text-base font-bold mt-2">Precio Lista {{ $producto->precioLista }}</p>
                <p class="text-gray-700 text-base font-bold mt-2">Precio Oferta {{ $producto->precioOferta }}</p>
                <p class="text-gray-700 text-base font-bold mt-2">Codigo {{ $producto->codigo }}</p>

                <div class="mt-4">
                    <label class="block font-bold text-gray-700">Talle:</label>
                    <select class="form-select mt-1 block w-full" id="talle_id" wire:model="talle_id" wire:change="checkstock()">
                        <option value="0">Seleccione un Talle</option>
                        @foreach ($talles as $talle)
<option value="{{ $talle['talle_id'] }}">{{ $talle['talle'] }}</option>
@endforeach
                    </select>
                </div>

                <div class="mt-4">
                    <label class="block font-bold text-gray-700">Color:</label>
                    <select class="form-select mt-1 block w-full" id="color_id" wire:model="color_id" wire:change="checkstock()">
                        <option value="0">Seleccione un Color</option>
                        @foreach ($colores as $color)
<option value="{{ $color['color_id'] }}">{{ $color['color'] }}</option>
@endforeach
                    </select>
                </div>
                <div class="mt-4">
                    <button class="py-2 px-4 bg-blue-500 hover:bg-blue-600 text-white font-bold rounded-md
                                    shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" wire:click.prevent="incrementa()">
                        +
                    </button>
                    <input class="py-2 px-2 " type="numeric" id="cantidad" wire:model="cantidad" wire:change="checkstock()" />
                    <button class="py-2 px-4 bg-blue-500 hover:bg-blue-600 text-white font-bold rounded-md
                                    shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" wire:click.prevent="decrementa()">
                        -
                    </button>
                    @if (parametro(10) === 'S')
Disponibles<input class="py-2 px-2 " type="numeric" id="disponibles" wire:model="disponibles" disabled></input>
@endif
                </div>

                <div class="mt-4">
                    @if (parametro(10) === 'S')
<button class="py-2 px-4
                        {{ ($cantidad > $disponibles) | ($talle_id == 0) | ($color_id == 0)
                            ? 'bg-slate-100 hover:bg-slate-200 text-{212 212 216}'
                            : ' bg-blue-500 hover:bg-blue-600 text-white' }}
                                                        font-bold rounded-md
                        shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2
                        {{ ($cantidad > $disponibles) | ($talle_id == 0) | ($color_id == 0) ? 'disabled' : '' }}
                        " wire:click.prevent="agregarcarrito()">
                        {{ $cantidad > $disponibles && $talle_id > 0 && $color_id > 0 ? 'Sin stock disponible' : ' Agregar al carrito' }}

                    </button>
@else
<button class="py-2 px-4  bg-blue-500 hover:bg-blue-600 text-white  font-bold rounded-md shadow-md focus:outline-none focus:ring-2
                                        focus:ring-blue-500 focus:ring-offset-2 " wire:click.prevent="agregarcarrito()">Agregar al carrito</button>
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

</div> -->

    <!-- lO ANTERIOR QUEDO COMENTADO HATA PROBAR QUE FUNCIONE BIEN EL DETALLE DEL PRODUCTO  -->
    <!-- DETALLE DEL PRODUCTO -->

    {{-- Array con las imágenes de prueba del componente --}}



    {{-- <div class="max-w-7xl grid grid-cols-1 lg:grid-cols-4 gap-12 mx-auto lg:px-8 py-12"> --}}

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

                <div class="mx-auto max-w-2xl py-4 px-4 sm:py-8 sm:px-6 lg:max-w-7xl lg:px-8">

                    <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">

                        <div class="grid col-span-3 border-r border-gray-300 pr-4">

                            <div class="grid grid-cols-3 sm:grid-cols-3 gap-4">


                                <!-- Imagenes del producto  -->
                                <div class="lg:col-span-2 px-6 lg:px-0">
                                    {{-- Componente de imágenes del producto --}}
                                    <livewire:product-front-images :images="$images">
                                </div>
                                <!-- Nombre,Cantidad, precio, color del producto al agregar al carrito  -->
                                <div>
                                    <!-- Nombre del producto  -->
                                    <div class="lg:max-w-7xl lg:grid-rows-[auto,auto,1fr] px-6 lg:px-0">
                                        <div class="col-span-2">
                                            <h2 class="text-2xl font-bold text-gray-900 sm:text-3xl">
                                                {{ $producto->nombre }}</h2>
                                            <h4 class="text-gray-700 text-base">{{ $producto->codigo }}</h4>

                                        </div>

                                        <!-- Precio - Precio con descuento -->
                                        <div class="mt-4 lg:row-span-3 lg:mt-0">
                                            {{-- <h2 class="sr-only">Product information</h2> --}}
                                            <div>
                                                @if ($oferta == 1)
                                                    <p class="text-3xl tracking-tight text-gray-900 mt-5">$
                                                        {{ number_format($producto->precioOferta, 2, ',', '.') }}</p>
                                                    <p class="text-gray-500 mt-2 line-through">$
                                                        {{ number_format($producto->precioLista, 2, ',', '.') }}</p>
                                                @else
                                                    <p class="text-3xl tracking-tight text-gray-900 mt-5">$
                                                        {{ number_format($producto->precioLista, 2, ',', '.') }}</p>
                                                @endif
                                            </div>



                                            <!-- Selección de Colores -->
                                            <form class="mt-10">
                                                <div>
                                                    <h3 class="text-sm font-medium text-gray-900">Color</h3>
                                                    <fieldset class="mt-4">
                                                        {{-- <legend class="sr-only">Choose a color</legend> --}}
                                                        <div class="flex items-center space-x-3">
                                                            {{-- @foreach ($colores as $color) --}}
                                                            <label
                                                                class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 focus:outline-none ring-gray-400">
                                                                <input type="radio" name="color-choice"
                                                                    value="{{ $color['color_id'] }}"
                                                                    class="sr-only peer"
                                                                    aria-labelledby="color-choice-0-label"
                                                                    wire:click.prevent="asigna_color({{ $color['color_id'] }})">
                                                                {{-- <span id="color-choice-0-label" class="sr-only">White</span> --}}
                                                                <span
                                                                    style=" background-color: {{ $color['pcolor'] }};"
                                                                    aria-hidden="true"
                                                                    class="h-8 w-8 rounded-full border border-black border-opacity-10 peer-checked:ring-4 peer-checked:ring-red-500 hover:ring-4 hover:ring-red-400"></span>
                                                            </label>
                                                            {{-- @endforeach --}}
                                                        </div>
                                                    </fieldset>
                                                </div>

                                                <!-- Selección de Talles -->
                                                <div class="mt-10">
                                                    <div class="flex items-center justify-between">
                                                        <h3 class="text-sm font-medium text-gray-900">Talle</h3>
                                                        <a href="#"
                                                            class="text-sm font-medium text-red-400 hover:text-red-500">Guía
                                                            de
                                                            Talles</a>
                                                    </div>
                                                    <fieldset class="mt-4">
                                                        {{-- <legend class="sr-only">Talles</legend> --}}
                                                        <div
                                                            class="grid grid-cols-4 gap-4 sm:grid-cols-8 lg:grid-cols-4">

                                                            @foreach ($talles as $talle)
                                                                <label
                                                                    class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 cursor-pointer bg-white text-gray-900 shadow-sm hover:ring-4 hover:ring-red-400">
                                                                    <input type="radio" name="size-choice"
                                                                        wire:click.prevent="asigna_talle({{ $talle['talle_id'] }})"
                                                                        class="sr-only peer/xs"
                                                                        aria-labelledby="size-choice-1-label">


                                                                    <span
                                                                        id="size-choice-1-label">{{ $talle['talle'] }}</span>
                                                                    <span
                                                                        class="pointer-events-none absolute -inset-px rounded-md peer-checked/xs:ring-4 peer-checked/xs:ring-red-500"
                                                                        aria-hidden="true"></span>
                                                                </label>
                                                            @endforeach
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <!-- Selección de la Cantidad y agregar al carrito-->
                                                <div
                                                    class="flex flex-wrap items-center justify-between mt-14 lg:gap-4 xl:gap-0">
                                                    <div class="flex gap-2 items-center">
                                                        <button
                                                            class="w-6 h-6 border-2 border-red-400 text-red-400 rounded-md shadow-sm shadow-gray-400 hover:bg-red-500 hover:text-white hover:border-none"
                                                            wire:click.prevent="decrementa()">-</button>

                                                        {{-- <p class="text-xl text-center">1</p> --}}

                                                        <input class="text-center w-6" type="numeric" id="cantidad"
                                                            wire:model="cantidad" wire:change="checkstock()" />

                                                        <button
                                                            class="w-6 h-6 border-2 border-red-400 text-red-400 rounded-md shadow-sm shadow-gray-400 hover:bg-red-500 hover:text-white hover:border-none"
                                                            wire:click.prevent="incrementa()">+</button>
                                                    </div>
                                                    <!-- Botón Agregar al Carrito  -->
                                                    <button type="submit"
                                                        class="flex flex-1 ml-3 lg:ml-0 xl:ml-3 items-center justify-center rounded-md border border-transparent
                                bg-red-500 px-8 py-2 text-base text-white hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
                                                        {{ ($cantidad > $disponibles) | ($talle_id == 0) | ($color_id == 0) ? 'disabled' : '' }}
                                                        wire:click.prevent="agregarcarrito()">
                                                        {{ $cantidad > $disponibles && $talle_id > 0 && $color_id > 0 ? 'Sin stock disponible' : ' Agregar' }}</button>






                                                    <!-- aviso de stocks -->
                                                    @if ($cantidad > $disponibles && $talle_id !== 0 && $color_id !== 0)
                                                        <div class="mt-4">
                                                            <div class="mb-4 col-span-2">
                                                                <input type="text"
                                                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                                    id="mailaviso"
                                                                    placeholder="Tu e-mail y te avisamos cuando haya stock"
                                                                    wire:model="mailaviso">
                                                                <x-jet-input-error for="mailaviso" />
                                                            </div>

                                                            <button
                                                                class="py-2 px-4  bg-red-500 hover:bg-red-600 text-white font-bold rounded-md shadow-md focus:outline-none focus:ring-2
                                        focus:ring-red-500 focus:ring-offset-2 "
                                                                wire:click.prevent="avisostock()">Enviar</button>
                                                        </div>
                                                    @endif


                                                </div>
                                            </form>
                                            {{-- <p class="mt-4">Categorias: <strong class="text-red-700">Calzado caballeros</strong></p> --}}
                                        </div>
                                    </div>
                                </div>

                                <!-- Buscardor y Categorias  -->
                            </div>
                        </div>

                        <div class="grid grid-cols-1">

                            <!-- Buscardor y Categorias  -->
                            <div class="px-6 lg:px-0">
                                <!-- Buscador -->
                                <h3 class="text-xl font-bold mt-1">Buscador</h3>
                                <div class="flex lg:justify-between mt-3">
                                    <input type="search" name="" id=""
                                        placeholder="Buscar producto"
                                        class="rounded-lg border-2 border-gray-300 placeholder:text-gray-400 flex-1 lg:w-40 xl:flex-1 mr-3 focus:ring-red-400 focus:border-red-400"
                                        wire:model="busqueda">
                                    <button class="bg-red-500 p-3 w-12 h-12 rounded-lg lg:ml-0 hover:bg-red-600"
                                        wire:click.prevent="buscar()">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="white" height="24"
                                                viewBox="0 96 960 960" width="24">
                                                <path
                                                    d="M796 935 533 672q-30 26-69.959 40.5T378 727q-108.162 0-183.081-75Q120 577 120 471t75-181q75-75 181.5-75t181 75Q632 365 632 471.15 632 514 618 554q-14 40-42 75l264 262-44 44ZM377 667q81.25 0 138.125-57.5T572 471q0-81-56.875-138.5T377 275q-82.083 0-139.542 57.5Q180 390 180 471t57.458 138.5Q294.917 667 377 667Z" />
                                            </svg>
                                        </span>
                                    </button>
                                </div>
                                <!-- Categorias  -->
                                <h3 class="text-xl font-bold mt-16">Categorias</h3>
                                <div class="mt-5">

                                    <ul>
                                        @foreach ($categorias as $categoria)
                                            <li class="mb-2">
                                                <i class="fa fa-caret-right" aria-hidden="true"></i>
                                                <a href="{{ route('productos.categoria', $categoria['slug']) }}"
                                                    class="text-red-700 hover:text-red-400">
                                                    {{ $categoria['categoria'] }}</a>
                                                @if ($categoria->hijas->count() > 0)
                                                    @include('productos.partials_categorias', [
                                                        'categorias' => $categoria->hijas,
                                                    ])
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
