<x-app-layout>

  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ $categoria->categoria }}
    </h2>
  </x-slot>

  <div class="container">
    <div class="row">
      {{-- Sección principal --}}
      <div class="col-md-9">
        <div class="row">
          @if (count($hijas) > 0)

            @foreach ($hijas as $category)
              <a href="{{ route('productos.categoria', $category->slug) }}">
                <div class="col-md-4">

                  @if (Storage::disk('public')->exists('categorias/' . $category->imagen))
                    <img class="w-full h-64 object-cover transform hover:scale-105 transition duration-500 ease-in-out"
                      src="{{ asset('storage/categorias/' . $category->imagen) }}" alt="{{ $category->categoria }}">
                  @else
                    <img class="w-full h-64 object-cover transform hover:scale-105 transition duration-500 ease-in-out"
                      src="{{ asset('storage/categorias/no_disponible.jpg') }}" alt="Imagen no disponible">
                  @endif

                  <div class="">
                    <h2 class="text-lg font-bold">{{ $category->categoria }}</h2>
                  </div>
                </div>
              </a>
            @endforeach

          @endif
        </div>

        <div class="row">
          @if (count($productos) > 0)

            <!-- Mostrar los productos aquí -->
            @foreach ($productos as $producto)
              <?php $primeraCategoria = $producto->categorias->first(); ?>
              <div class="col-md-4 mb-4">
                <a href="{{ route('productos.show', [$primeraCategoria->slug, $producto]) }}" class="group">
                  <x-producto :producto="$producto" :fechahoy="$fechahoy" />
                </a>
              </div>
            @endforeach

          @endif

          <!-- Si no tiene productos y tampoco categorias hijas, Muestro el mensaje de alerta -->
          @if (count($hijas) == 0 and count($productos) == 0)
            <div class="">
              <span class="block sm:inline">La categoría no posee aún productos.</span>
            </div>
          @endif
        </div>

      </div>

      {{-- Sidebar derecha --}}
      <div class="col-md-3">

        @include('productos.sidebar')
      </div>
    </div>
  </div>


</x-app-layout>
