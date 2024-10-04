<x-app-layout>

  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Shop
    </h2>
  </x-slot>


  <div class="container">
    <div class="row">
      {{-- Sección principal --}}

      @foreach ($categorias as $category)
        <div class="col-md-4">
          <a href="{{ route('productos.categoria', $category->slug) }}">
            <div class="relative overflow-hidden rounded-lg shadow-lg">
              @if (Storage::disk('public')->exists('storage/categorias/' . $category->imagen))
                <h1>Existe la imagen</h1>
                <img class="w-full h-64 object-cover transform hover:scale-105 transition duration-500 ease-in-out"
                  src="{{ asset('storage/categorias/' . $category->imagen) }}" alt="{{ $category->categoria }}">
              @else
                <img class="w-full h-64 object-cover transform hover:scale-105 transition duration-500 ease-in-out"
                  src="{{ asset('storage/categorias/no_disponible.jpg') }}" alt="Imagen no disponible">
              @endif

              <div class="absolute bottom-0 left-0 right-0 px-4 py-2 bg-white bg-opacity-75">
                <h2 class="text-lg font-bold">{{ $category->categoria }}</h2>
              </div>
            </div>
          </a>
        </div>
      @endforeach


    </div>
  </div>

</x-app-layout>
