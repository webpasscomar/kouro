<x-guest-layout>

<div>
    <h1>Home del Shop - {{ $categoria }} - Mostrar: {{ $mostrar }} </h1>

    <div>
        <a href="#" wire:click="mostrar('categorias')">Categorias</a>
        <a href="#" wire:click="mostrar('productos')">Productos</a>
        <a href="#" wire:click="mostrar('producto')">Producto</a>
    </div>

    <div class="container text-center">
        <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">

        @foreach ($categorias as $cat)
            <div>
                <a href="#" wire:click="listarProductos('{{ $cat->slug }}')">{{ $cat->categoria }}</a>
            </div>
        @endforeach

        </div>

    </div>

</div>

</x-guest-layout>