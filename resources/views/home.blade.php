<x-app-layout>

  <!-- Carousel Bootstrap 5 -->
  <div id="carouselDarkVariant" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <!-- Carousel indicators -->
    <div class="carousel-indicators">
      @if ($slider)
        @foreach ($slider as $foto)
          @if ($loop->first)
            <button type="button" data-bs-target="#carouselDarkVariant" data-bs-slide-to="{{ $loop->index }}"
              class="active" aria-current="true" aria-label="{{ $foto->nombre }}"></button>
          @else
            <button type="button" data-bs-target="#carouselDarkVariant" data-bs-slide-to="{{ $loop->index }}"
              aria-label="{{ $foto->nombre }}"></button>
          @endif
        @endforeach
      @endif
    </div>

    <!-- Carousel items -->
    <div class="carousel-inner">
      @if ($slider)
        @foreach ($slider as $foto)
          @if ($loop->first)
            <div class="carousel-item active">
              <img src="{{ asset('storage/galeria/' . $foto->imagen) }}" class="d-block w-100"
                alt="{{ $foto->nombre }}">
            </div>
          @else
            <div class="carousel-item">
              <img src="{{ asset('storage/galeria/' . $foto->imagen) }}" class="d-block w-100"
                alt="{{ $foto->nombre }}">
            </div>
          @endif
        @endforeach
      @endif
    </div>

    <!-- Carousel controls - prev item-->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselDarkVariant" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>

    <!-- Carousel controls - next item-->
    <button class="carousel-control-next" type="button" data-bs-target="#carouselDarkVariant" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>




  {{-- ======================================================== --}}



  <style>
    .category-card {
      border-radius: 10px;
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
      overflow: hidden;
      height: 300px;
      position: relative;
      background-color: #f8f9fa;
      margin-top: 1.5em;
    }

    .category-card img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .category-overlay {
      position: absolute;
      bottom: -50%;
      /* Ajuste de altura inicial fuera de la card */
      left: 0;
      width: 100%;
      background-color: rgba(0, 0, 0, 0.6);
      color: #fff !important;
      /* Fuerza el color blanco del texto */
      /* Texto en blanco */
      text-align: center;
      padding: 5px;
      /* Ajuste del padding */
      transition: bottom 0.3s ease;
    }

    .category-card:hover .category-overlay {
      bottom: 0;
      /* Desliza hacia arriba en hover */
    }

    .category-overlay h2 {
      margin: 0;
      font-size: 1.25rem;
    }
  </style>

  <div class="container">
    <div class="row">
      @foreach ($categorias as $category)
        <div class="col-md-4">
          <a href="{{ route('productos.categoria', $category->slug) }}">
            <div class="category-card">
              @if (Storage::disk('public')->exists('categorias/' . $category->imagen))
                <img src="{{ asset('storage/categorias/' . $category->imagen) }}" alt="{{ $category->categoria }}">
              @else
                <img src="{{ asset('storage/categorias/no_disponible.jpg') }}" alt="Imagen no disponible">
              @endif
              <div class="category-overlay">
                <h2 class="text-md font-bold text-white">{{ $category->categoria }}</h2>
              </div>
            </div>
          </a>
        </div>
      @endforeach
    </div>
  </div>











  {{-- Estilos   --}}
  <style>
    .overflow-x-auto::-webkit-scrollbar {
      height: 0.5rem;
    }

    .overflow-x-auto::-webkit-scrollbar-thumb {
      background-color: rgba(0, 0, 0, 0.3);
      border-radius: 9999px;
    }

    .overflow-x-auto::-webkit-scrollbar-track {
      background-color: rgba(0, 0, 0, 0.1);
      border-radius: 9999px;
    }
  </style>


</x-app-layout>
