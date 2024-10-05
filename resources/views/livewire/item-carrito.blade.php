<div class="row bg-white shadow-sm rounded-lg mb-7 px-4 py-4 align-items-center">
  <div class="col">
    {{-- TODO: Reemplazar por imágen dinámica --}}
    @if ($imagen_producto)
      <img src="{{ asset('storage/productos/' . $imagen_producto) }}" alt="imagen producto" class="img-fluid rounded-md"
        style="width: 7rem;">
    @else
      <img src="" alt="imagen producto" class="img-fluid rounded-md" style="width: 7rem;">
    @endif
  </div>
  <div class="col">
    <div>
      <p class="fw-semibold">{{ $producto_nombre }}</p>
    </div>
  </div>
  <div class="col text-center">
    <p class="fw-semibold">Cantidad: {{ $cantidad }}</p>
  </div>
  <div class="col text-center">
    <p class="fw-semibold">$ {{ number_format($cantidad * $producto_precio, 2, ',', '.') }}</p>
  </div>
  <div class="col d-flex justify-content-around">
    <button class="btn btn-xs" title="Detalle Producto" wire:click="toogleDetalles({{ $index }})">
      <img src="{{ asset('./img/arrow.svg') }}" alt=""
        class="{{ $mostrarDetalle ? 'rotate-90' : '' }} w-5 transition-all">
      {{-- <span class="fw-semibold ms-2">Detalle</span> --}}
    </button>
    @if ($apagar == 0)
      <button class="btn btn-xs" title="Eliminar producto"
        wire:click.prevent="$emit('alertCarritoDelete','{{ $producto_id }}','{{ $talle_id }}','{{ $color_id }}')">
        <img src="{{ asset('./img/trash.svg') }}" alt="Eliminar item">
      </button>
    @endif
  </div>

  {{-- Detalle del producto --}}
  <div class="col-12 mt-3 {{ $mostrarDetalle ? 'd-flex' : 'd-none' }} transition-all">
    <div class="d-flex gap-4 mx-auto justify-content-center">
      <p><span class="fw-semibold">Color: </span>{{ $color_nombre }}</p>
      <p><span class="fw-semibold">Talle: </span>{{ $talle_nombre }}</p>
      <p><span class="fw-semibold">Precio x Unidad: </span><span>$ {{ number_format($producto_precio) }}</span></p>
    </div>
  </div>
</div>
