<x-app-layout>

  <x-slot name="header">
    <h2 class="fw-semibold text-xl text-dark">
      Detalle del producto: {{ $producto->nombre }}
    </h2>
  </x-slot>

  <div class="container">

    <div class="row">

      {{-- Sección principal --}}
      <div class="col-md-6">

        <div class="row">


          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="#">Men</a>
              </li>
              <li class="breadcrumb-item">
                <a href="{{ route('productos.categoria', $categoria) }}">{{ $categoria->categoria }}</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">{{ $producto->nombre }}</li>
            </ol>
          </nav>




          <div class="col-md-8">
            <picture>
              <source srcset="{{ asset('storage/productos/' . $producto->id . '.webp') }}" type="image/webp">
              <img alt="{{ $producto->nombre }}" src="{{ asset('storage/productos/' . $producto->id . '.jpg') }}"
                class="img-fluid">
            </picture>
            <h1 class="display-6">{{ $producto->nombre }}</h1>
          </div>


          <div class="col-md-4 mt-4">
            <h2 class="sr-only">Product information</h2>
            <p class="display-6">$ {{ $producto->precioLista }}</p>

            <div class="mt-4">
              <div class="d-flex align-items-center">
                <div class="me-2">
                  <!-- Estrellas de calificación -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="text-warning" width="16" height="16"
                    fill="currentColor" viewBox="0 0 16 16">
                    <path
                      d="M3.612 15.443c-.396.198-.824-.149-.746-.592l.83-4.73-3.523-3.356c-.329-.314-.158-.888.283-.95l4.898-.696 2.065-4.356a.513.513 0 0 1 .92 0l2.065 4.356 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.35.79-.746.592L8 13.187l-4.389 2.256z" />
                  </svg>
                  <!-- Repetir SVG por el número de estrellas necesarias -->
                </div>
                <a href="#" class="text-primary ms-2">117 reviews</a>
              </div>
            </div>

            <form class="mt-4">
              <h3 class="fs-6">Color</h3>

              <div class="d-flex">
                <div class="form-check me-3">
                  <input class="form-check-input" type="radio" name="color-choice" id="color-choice-0" value="White">
                  <label class="form-check-label" for="color-choice-0">
                    Blanco
                  </label>
                </div>
                <div class="form-check me-3">
                  <input class="form-check-input" type="radio" name="color-choice" id="color-choice-1" value="Gray">
                  <label class="form-check-label" for="color-choice-1">
                    Gris
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="color-choice" id="color-choice-2" value="Black">
                  <label class="form-check-label" for="color-choice-2">
                    Negro
                  </label>
                </div>
              </div>
            </form>

          </div>

        </div>





      </div>

      {{-- Sidebar derecha --}}
      <div class="col-md-3">
        {{-- <h2>Sidebar</h2> --}}
        {{-- @include('productos.sidebar') --}}
      </div>

    </div>

  </div>





</x-app-layout>
