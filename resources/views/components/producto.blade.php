<!-- resources/views/components/producto.blade.php -->
<div class="">
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
    {{--        {{ dd($fechahoy) }} --}}
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
</div>
