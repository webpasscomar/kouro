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
                                        <a href="{{ route('productos.show', [$categoria->slug, $producto]) }}"
                                            class="group">
                                            <div
                                                class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-w-7 xl:aspect-h-8">

                                                <picture>
                                                    <source
                                                        srcset="{{ asset('storage/productos/' . $producto->imagen ) }}"
                                                        type="image/webp">
                                                    <img alt="{{ $producto->nombre }}"
                                                        src="{{ asset('storage/productos/' . $producto->imagen ) }}"
                                                        class="object-cover object-center group-hover:opacity-75">
                                                </picture>

                                            </div>
                                            <h3 class="mt-4 text-sm text-gray-700">{{ $producto->nombre }}</h3>
                                                @if ($producto->ofertaDesde <= $fechahoy and $producto->ofertaHasta >= $fechahoy)
                                                <img alt="Producto en oferta"  src="{{ asset('storage/oferta.png') }}"   class="object-cover object-center group-hover:opacity-75">
                                                <p class="mt-1 text-lg font-medium text-gray-900 " style="text-decoration: line-through;">$ {{ number_format($producto->precioLista,2) }}</p>
                                                <p class="mt-1 text-lg font-medium text-gray-900 ">$ {{ number_format($producto->precioOferta,2) }}</p>
                                                @else
                                                <p class="mt-1 text-lg font-medium text-gray-900">$ {{ number_format($producto->precioLista,2) }}</p>
                                                @endif




                                        </a>
                                    @endforeach

                                    <!-- More products... -->
                                </div>


                            </div>

                            <div class="grid grid-cols-1">
                                <h3 class="block px-2 py-3 bg-gray-300">Otras categorias</h3>
                                <ul role="list" class="px-2 py-3 font-medium text-gray-900">
                                    @foreach ($categorias as $categoria)
                                        <li class="block px-2 py-3 border-b">
                                            <a href="{{ route('productos.categoria', $categoria->slug) }}">
                                                {{ $categoria->categoria }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
