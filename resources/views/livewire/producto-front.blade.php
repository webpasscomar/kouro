<div class="container py-4">


  <div class="row g-4">
    <div class="col-md-9 border-end border-gray-300 pe-4">

      <div class="row g-4">

        <!-- Imagenes del producto -->
        <div class="col-lg-8 px-4">
          {{-- Componente de imágenes del producto --}}
          <livewire:product-front-images :images="$images">
        </div>

        <!-- Nombre, Cantidad, Precio, Color del producto -->
        <div class="col-lg-4">
          <div class="px-4">
            <h2 class="h3 font-bold text-dark">{{ $producto->nombre }}</h2>
            <h4 class="text-muted">{{ $producto->codigo }}</h4>
            <!-- Precio - Precio con descuento -->
            <div class="mt-4">
              @if ($oferta == 1)
                <p class="text-dark mt-5">${{ number_format($producto->precioOferta, 2, ',', '.') }}</p>
                <p class="text-muted text-decoration-line-through">
                  ${{ number_format($producto->precioLista, 2, ',', '.') }}</p>
              @else
                <p class="text-dark mt-5">${{ number_format($producto->precioLista, 2, ',', '.') }}</p>
              @endif
            </div>
            <!-- Selección de Colores -->
            <form class="mt-4">
              <div>
                <h3 class="h6">Color</h3>
                <div class="d-flex align-items-center gap-3 mt-3">
                  @foreach ($colores as $color)
                    <label class="d-flex justify-center align-items-center position-relative">
                      <input type="radio" name="color-choice" value="{{ $color['color_id'] }}" class="d-none"
                        wire:click.prevent="asigna_color({{ $color['color_id'] }})" wire:model="colorSeleccionado">
                      <span style="background-color: {{ $color['pcolor'] }};"
                        class="rounded-circle border p-2 @if ($color['color_id'] == $colorSeleccionado) border-2 border-danger @endif"></span>
                    </label>
                  @endforeach
                </div>
              </div>
              <!-- Selección de Talles -->
              <div class="mt-4">
                <div class="d-flex justify-content-between">
                  <h3 class="h6">Talle</h3>
                  <a href="#" class="text-danger text-decoration-none">Guía de Talles</a>
                </div>
                <div class="row g-2 mt-3">
                  @foreach ($talles as $talle)
                    <label
                      class="col-3 btn btn-outline-dark p-3 @if ($talle['talle_id'] == $talleSeleccionado) border-2 border-danger @endif"
                      wire:click.prevent="asigna_talle({{ $talle['talle_id'] }})">
                      {{ $talle['talle'] }}
                    </label>
                  @endforeach
                </div>
              </div>
              <!-- Cantidad y agregar al carrito -->
              <div class="d-flex justify-content-between align-items-center mt-4">
                <div class="d-flex align-items-center gap-2">
                  <button class="btn btn-outline-danger rounded-circle" wire:click.prevent="decrementa()">-</button>
                  <input type="number" id="cantidad" class="form-control text-center" wire:model="cantidad"
                    wire:change="checkstock()" style="width: 50px;">
                  <button class="btn btn-outline-danger rounded-circle" wire:click.prevent="incrementa()">+</button>
                </div>
                <!-- Botón agregar al carrito -->
                <button type="submit" class="btn btn-danger px-4 py-2" wire:click.prevent="agregarcarrito()"
                  {{ ($cantidad > $disponibles) | ($talle_id == 0) | ($color_id == 0) ? 'disabled' : '' }}>
                  {{ $cantidad > $disponibles && $talle_id > 0 && $color_id > 0 ? 'Sin stock disponible' : 'Agregar' }}
                </button>
              </div>
              <!-- Aviso de stock -->
              @if ($cantidad > $disponibles && $talle_id !== 0 && $color_id !== 0)
                <div class="mt-4">
                  <input type="email" class="form-control mb-2" id="mailaviso"
                    placeholder="Tu e-mail y te avisamos cuando haya stock" wire:model="mailaviso">
                  <x-jet-input-error for="mailaviso" />
                  <button class="btn btn-danger" wire:click.prevent="avisostock()">Enviar</button>
                </div>
              @endif
            </form>
          </div>
        </div>
        <!-- Buscador y Categorias -->
      </div>
    </div>




    <!-- Categorías -->
    <div class="col-md-3">
      <div class="px-4">
        <!-- Buscador -->
        <h3 class="h4">Buscador</h3>
        <div class="input-group mt-3">
          <input type="search" placeholder="Buscar producto" class="form-control" wire:model="busqueda">
          <button class="btn btn-danger" wire:click.prevent="buscar()">
            <svg xmlns="http://www.w3.org/2000/svg" fill="white" height="24" viewBox="0 96 960 960" width="24">
              <path
                d="M796 935 533 672q-30 26-69.959 40.5T378 727q-108.162 0-183.081-75Q120 577 120 471t75-181q75-75 181.5-75t181 75Q632 365 632 471.15 632 514 618 554q-14 40-42 75l264 262-44 44ZM377 667q81.25 0 138.125-57.5T572 471q0-81-56.875-138.5T377 275q-82.083 0-139.542 57.5Q180 390 180 471t57.458 138.5Q294.917 667 377 667Z" />
            </svg>
          </button>
        </div>
        <!-- Categorías -->
        <h3 class="h4 mt-5">Categorías</h3>
        <ul class="list-unstyled mt-3">
          @foreach ($categorias as $categoria)
            <li class="mb-2">
              <i class="fa fa-caret-right"></i>
              <a href="{{ route('productos.categoria', $categoria['slug']) }}"
                class="text-danger text-decoration-none">
                {{ $categoria['categoria'] }}
              </a>
              @if ($categoria->hijas->count() > 0)
                @include('productos.partials_categorias', ['categorias' => $categoria->hijas])
              @endif
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</div>
