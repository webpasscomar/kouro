<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $categoria->categoria }}
        </h2>
    </x-slot>


    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">


                <div class="mx-auto max-w-2xl py-4 px-4 sm:py-8 sm:px-6 lg:max-w-7xl lg:px-8">

                    <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">

                        <div class="grid col-span-3 border-r border-gray-300 pr-4">

                            @if (count($hijas) > 0)

                                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-4">
                                    @foreach ($hijas as $category)
                                        <a href="{{ route('productos.categoria', $category->slug) }}">
                                            <div class="relative overflow-hidden rounded-lg shadow-lg">

                                                @if (Storage::disk('public')->exists('categorias/' . $category->imagen))
                                                    <img class="w-full h-64 object-cover transform hover:scale-105 transition duration-500 ease-in-out"
                                                        src="{{ asset('storage/categorias/' . $category->imagen) }}"
                                                        alt="{{ $category->categoria }}">
                                                @else
                                                    <img class="w-full h-64 object-cover transform hover:scale-105 transition duration-500 ease-in-out"
                                                        src="{{ asset('storage/categorias/no_disponible.jpg') }}"
                                                        alt="Imagen no disponible">
                                                @endif


                                                <div
                                                    class="absolute bottom-0 left-0 right-0 px-4 py-2 bg-white bg-opacity-75">
                                                    <h2 class="text-lg font-bold">{{ $category->categoria }}</h2>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            @endif


                            {{-- <h1>Productos</h1> --}}
                            @if (count($productos) > 0)
                                <!-- Mostrar los productos aquí -->

                                <div
                                    class="grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 xl:gap-x-8 pr-8 pt-8">

                                    @foreach ($productos as $producto)
                                        <?php $primeraCategoria = $producto->categorias->first(); ?>
                                        <a href="{{ route('productos.show', [$primeraCategoria->slug, $producto]) }}"
                                            class="group">
                                            <x-producto :producto="$producto" :fechahoy="$fechahoy" />
                                        </a>
                                    @endforeach

                                    <!-- More products... -->
                                </div>
                            @else
                                <!-- Mostrar el mensaje de alerta -->
                                <div
                                    class="bg-gray-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative">
                                    <span class="block sm:inline">La categoría no posee aún productos.</span>
                                </div>
                            @endif

                        </div>

                        <div class="grid grid-cols-1">

                            <!-- Buscardor y Categorias  -->
                            <div class="px-6 lg:px-0">

                                <!-- Buscador -->
                                <h3 class="text-xl font-bold mt-1">Buscador</h3>
                                <div class="flex lg:justify-between mt-3">
                                    <input type="search" name="" id="" placeholder="Buscar producto"
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
        </div>

</x-app-layout>
