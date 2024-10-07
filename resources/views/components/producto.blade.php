<!-- resources/views/components/producto.blade.php -->
{{-- <div class="">
  <div class="">

    @if (Storage::disk('public')->exists('productos/' . $producto->imagen))
      <img src="{{ asset('storage/productos/' . $producto->imagen) }}" alt="{{ $producto->nombre }}"
        class="w-auto object-contain">
    @else
      <img src="{{ asset('storage/productos/no_disponible.jpg') }}" alt="Imagen no disponible"
        class="w-auto object-contain">
    @endif


  </div>
  <div class="">
    <h4 class="text-base line-clamp-2">{{ $producto->nombre }}</h4>
    @if ($fechahoy >= $producto->ofertaDesde && $fechahoy <= $producto->ofertaHasta)
      <p class="mt-3 text-sm text-gray-400 line-through">$ {{ $producto->precioLista }}</p>
      <span class="absolute top-2 z-10"><img src="{{ asset('img/oferta.png') }}" alt="producto en oferta"
          class="w-16 opacity-75"></span>
      <p class="font-bold mt-3 text-xl">$ {{ $producto->precioOferta }}</p>
    @else
      <p class="font-bold mt-5 text-xl">$ {{ $producto->precioLista }}</p>
    @endif
  </div>
</div> --}}



<!-- resources/views/components/producto.blade.php -->
<div class="card border rounded shadow-md mb-4 hover-shadow-lg transition" style="height: 100%;">
  <div class="card-img-top" style="height: 250px; overflow: hidden;">
    @if (Storage::disk('public')->exists('productos/' . $producto->imagen))
      <img src="{{ asset('storage/productos/' . $producto->imagen) }}" alt="{{ $producto->nombre }}"
        class="img-fluid w-100 h-100 object-fit-cover">
    @else
      <img src="{{ asset('storage/productos/no_disponible.jpg') }}" alt="Imagen no disponible"
        class="img-fluid w-100 h-100 object-fit-cover">
    @endif
  </div>

  <div class="card-body">
    <h5 class="card-title">{{ $producto->nombre }}</h5>
    @if ($fechahoy >= $producto->ofertaDesde && $fechahoy <= $producto->ofertaHasta)
      <p class="card-text text-muted text-decoration-line-through">$ {{ $producto->precioLista }}</p>
      <span class="badge bg-danger position-absolute top-0 start-0 m-2">Oferta</span>
      <p class="card-text font-weight-bold text-danger">$ {{ $producto->precioOferta }}</p>
    @else
      <p class="card-text font-weight-bold">$ {{ $producto->precioLista }}</p>
    @endif
  </div>
</div>

<!-- CSS personalizado para el efecto hover -->
<style>
  .hover-shadow-lg:hover {
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
  }

  .transition {
    transition: box-shadow 0.3s ease;
  }
</style>
