<!-- resources/views/components/producto.blade.php -->
<div
    class="bg-[#E4E4E4] overflow-hidden py-2 px-3 h-full shadow-md shadow-gray-400 rounded-md relative hover:bg-gray-300">
    <div class="w-full drop-shadow-md">

        @if (Storage::disk('public')->exists('productos/' . $producto->imagen))
            <img src="{{ asset('storage/productos/' . $producto->imagen) }}" alt="{{ $producto->nombre }}"
                class="w-auto object-contain">
        @else
            <img src="{{ asset('storage/productos/no_disponible.jpg') }}" alt="Imagen no disponible"
                class="w-auto object-contain">
        @endif


        {{-- <img src="{{ asset('storage/productos/' . $producto->imagen) }}" alt="{{ $producto->nombre }}"
            class="w-auto object-contain"> --}}
        {{-- <img alt="{{ $producto->nombre }}" src="{{ asset('storage/productos/' . $producto->imagen) }}"
            class="object-cover object-center group-hover:opacity-75"> --}}
    </div>
    <div class="mt-3">

        <h4 class="text-base line-clamp-2">{{ $producto->nombre }}</h4>
        @if ($producto->fechahoy >= $producto->ofertaDesde && $producto->fechahoy <= $producto->ofertaHasta)
            <p class="font-bold mt-5 text-xl">$ {{ $producto->precioLista }}</p>
        @else
            <p class="mt-3 text-sm text-gray-400 line-through">$ {{ $producto->precioLista }}</p>
            <span class="absolute top-2 z-10"><img src="{{ asset('img/oferta.png') }}" alt="producto en oferta"
                    class="w-16 opacity-75"></span>
            <p class="font-bold mt-3 text-xl">$ {{ $producto->precioOferta }}</p>
        @endif
    </div>
</div>
