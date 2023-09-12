<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $categoria->categoria }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

                <div class="bg-white">
                    <div class="mx-auto max-w-2xl py-12 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">

                        {{-- <h2 class="sr-only">Productos</h2> --}}

                        <div class="grid grid-cols-1 sm:grid-cols-4">

                            <div class="grid col-span-3">
                                {{-- <h1>Productos</h1> --}}

                                <div
                                    class="grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">

                                    @foreach ($productos as $producto)
                                        <?php $primeraCategoria = $producto->categorias->first(); ?>
                                        <a href="{{ route('productos.show', [$primeraCategoria->slug, $producto]) }}"
                                            class="group">
                                            <div
                                                class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-w-7 xl:aspect-h-8">

                                                <picture>
                                                    <source
                                                        srcset="{{ asset('storage/productos/' . $producto->imagen) }}"
                                                        type="image/webp">
                                                    <img alt="{{ $producto->nombre }}"
                                                        src="{{ asset('storage/productos/' . $producto->imagen) }}"
                                                        class="object-cover object-center group-hover:opacity-75">
                                                </picture>

                                            </div>
                                            <h3 class="mt-4 text-sm text-gray-700">{{ $producto->nombre }}</h3>
                                            @if ($producto->ofertaDesde <= $fechahoy and $producto->ofertaHasta >= $fechahoy)
                                                <img alt="Producto en oferta" src="{{ asset('storage/oferta.png') }}"
                                                    class="object-cover object-center group-hover:opacity-75">
                                                <p class="mt-1 text-lg font-medium text-gray-900 "
                                                    style="text-decoration: line-through;">$
                                                    {{ number_format($producto->precioLista, 2) }}</p>
                                                <p class="mt-1 text-lg font-medium text-gray-900 ">$
                                                    {{ number_format($producto->precioOferta, 2) }}</p>
                                            @else
                                                <p class="mt-1 text-lg font-medium text-gray-900">$
                                                    {{ number_format($producto->precioLista, 2) }}</p>
                                            @endif




                                        </a>
                                    @endforeach

                                    <!-- More products... -->
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

                                        @foreach ($categorias as $categoria)
                                            <div class="flex items-center mt-3">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="rgb(185,28,28)"
                                                        height="24" viewBox="0 96 960 960" width="32">
                                                        <path
                                                            d="M375 829.566 318.434 773l198-198-198-198L375 320.434 629.566 575 375 829.566Z" />
                                                    </svg>
                                                </span>
                                                <a href="{{ route('productos.categoria', $categoria['slug']) }}"
                                                    class="text-xl text-red-700 hover:text-red-400">
                                                    {{ $categoria['categoria'] }}</a>
                                            </div>
                                        @endforeach


                                    </div>


                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

</x-app-layout>
