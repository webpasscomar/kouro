<x-guest-layout>
<div>
    <h1>Productos</h1>
        <p>Mostrar: {{$mostrar}}</p>
        <p>Categoria a listar: {{$slugCategoria}}</p>


    <div class="container text-center">
        <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">

        @foreach ($productos as $producto)
            <div>
                <a href="#" wire:click="verProducto({{ $producto->slug }})">{{ $producto->nombre }}</a>
            </div>
        @endforeach

        </div>

    </div>
        
</div>
</x-guest-layout>