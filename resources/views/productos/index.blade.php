<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if (parametro(10) === 'S')
                Realiza control de stock
            @else
                Sin control de stock
            @endif
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

                <div class="bg-white">
                    <div class="mx-auto max-w-2xl py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
                        <h2 class="sr-only">Categorias</h2>

                        <div
                            class="grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 xl:gap-x-8">

                            @foreach ($categorias as $categoria)
                                <a href="{{ route('productos.categoria', $categoria) }}" class="group">
                                    <picture>
                                        {{-- <source
                                            srcset="{{ asset('storage/categorias/' . $categoria->imagen . '.webp') }}"
                                            type="image/webp"> --}}
                                        <img alt="{{ $categoria->categoria }}"
                                            src="{{ asset('storage/categorias/' . $categoria->imagen) }}"
                                            class="object-cover object-center group-hover:opacity-75">
                                    </picture>

                                    <h3 class="mt-4 text-lg text-gray-800 text-center">{{ $categoria->categoria }}</h3>
                                </a>
                            @endforeach

                            <!-- More products... -->
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

</x-app-layout>
