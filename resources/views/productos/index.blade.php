<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Shop
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px6 lg:px-8">

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                @foreach ($categorias as $category)
                    <a href="{{ route('productos.categoria', $category->slug) }}">
                        <div class="relative overflow-hidden rounded-lg shadow-lg">
                            <img class="w-full h-64 object-cover transform hover:scale-105 transition duration-500 ease-in-out"
                                src="{{ asset('storage/categorias/' . $category->imagen) }}"
                                alt="{{ $category->categoria }}">
                            <div class="absolute bottom-0 left-0 right-0 px-4 py-2 bg-white bg-opacity-75">
                                <h2 class="text-lg font-bold">{{ $category->categoria }}</h2>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

        </div>
    </div>

</x-app-layout>
