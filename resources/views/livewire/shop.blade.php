<div>

    <x-header>
        Shop
    </x-header>

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