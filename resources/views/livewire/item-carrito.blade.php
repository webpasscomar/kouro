<div class="grid grid-cols-5 bg-white overflow-hidden shadow-xl sm:rounded-lg mb-7 px-4 max-w-4xl py-4 items-center">
    <div>
        {{-- TODO: Reemplazar por imágen dinámica --}}
        <img src="https://images.unsplash.com/photo-1552346154-21d32810aba3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&   auto=format&fit=crop&w=870&q=80"
            alt="imagen producto" class="w-28 rounded-md">
    </div>
    <div>
        <div>
            <p class="font-semibold">{{ $producto_nombre }}</p>
        </div>
    </div>
    <div class="text-center">
        <p class="font-semibold">Cantidad: {{ $cantidad }}</p>
    </div>
    <div class="text-center">
        <p class="font-semibold">$ {{ number_format($cantidad * $producto_precio, 2, ',', '.') }}</p>

    </div>
    <div class="flex justify-around">
        <button class="flex items-center" title="Detalle Producto" wire:click="toogleDetalles({{ $index }})">
            <img src="{{ asset('./img/arrow.svg') }}" alt=""
                class="{{ $mostrarDetalle ? 'w-5 rotate-90 transition-all ease-in-out duration-300' : 'w-5 transition-all ease-in-out duration-300' }}">
            <span class="font-semibold">Detalle</span>
        </button>
        @if ($apagar == 0)
            <button title="Eliminar producto"
                wire:click.prevent="$emit('alertCarritoDelete','{{ $producto_id }}','{{ $talle_id }}','{{ $color_id }}')">
                <img src="{{ asset('./img/trash.svg') }}" alt="eliminar item" class="w-6">
            </button>
        @endif
    </div>

    {{-- Detalle del producto --}}
    <div
        class="{{ $mostrarDetalle ? 'visible transition-all ease-in-out duration-1000' : 'hidden transition-all ease-in-out duration-1000' }} col-span-5 flex items-center mt-3">
        <div class="flex max-w-3xl gap-x-10 m-auto justify-center">
            <p><span class="font-semibold">Color: </span>{{ $color_nombre }}</p>
            <p><span class="font-semibold">Talle: </span>{{ $talle_nombre }}</p>
            <p><span class="font-semibold">Precio x Unidad: </span><span>$ {{ number_format($producto_precio) }}</span>
            </p>
        </div>
    </div>
</div>
