<div>

    <x-header>
        Shop
    </x-header>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px6 lg:px-8">

            {{-- Because she competes with no one, no one can compete with her. --}}
            <div class="flex flex-wrap">
                <div class="w-3/4 p-4">
                    @if ($productos->count() > 0)
                        <div class="grid grid-cols-3 gap-4">

                            @foreach ($productos as $producto)
                                <a href="{{ route('producto', $producto->id) }}">
                                    <div class="bg-white rounded-lg overflow-hidden shadow-md">
                                        <img class="w-full h-56 object-cover object-center"
                                            src="{{ asset('storage/productos/' . $producto->id . '.jpg') }}"
                                            alt="{{ $producto->titulo }}">
                                        <div class="p-4">
                                            <h2 class="text-gray-900 font-bold text-xl mb-2">XXX {{ $producto->nombre }}
                                            </h2>
                                            <p class="text-gray-700 text-base">{{ $producto->descripcion }}</p>


                                                <p class="text-gray-700 text-base font-bold mt-2">{{ $producto->precio }}</p>
                                        </div>

                                    </div>
                                </a>
                            @endforeach
                        </div>
                        <div class="mt-4">
                            {{ $productos->links() }}
                        </div>
                    @endif
                </div>
                <div class="w-1/4 p-4">
                    <h2 class="text-gray-900 font-bold text-xl mb-2">Categorías</h2>
                    <ul class="text-gray-700 text-base">
                        @foreach ($categorias as $categoria)
                            <li class="mb-2">
                                <a href="#"
                                    wire:click.prevent="setCategoria('{{ $categoria->slug }}')">{{ $categoria->categoria }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>

        </div>
    </div>

</div>
