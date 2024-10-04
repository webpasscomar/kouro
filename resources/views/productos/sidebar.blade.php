<!-- Buscardor y Categorias  -->


<!-- Buscador -->
<h3 class="text-xl font-bold mt-1">Buscador</h3>
<div class="flex lg:justify-between mt-3">
  <input type="search" name="" id="" placeholder="Buscar producto"
    class="rounded-lg border-2 border-gray-300 placeholder:text-gray-400 flex-1 lg:w-40 xl:flex-1 mr-3 focus:ring-red-400 focus:border-red-400"
    wire:model="busqueda">
  <button class="bg-red-500 p-3 w-12 h-12 rounded-lg lg:ml-0 hover:bg-red-600" wire:click.prevent="buscar()">
    <span>
      <svg xmlns="http://www.w3.org/2000/svg" fill="white" height="24" viewBox="0 96 960 960" width="24">
        <path
          d="M796 935 533 672q-30 26-69.959 40.5T378 727q-108.162 0-183.081-75Q120 577 120 471t75-181q75-75 181.5-75t181 75Q632 365 632 471.15 632 514 618 554q-14 40-42 75l264 262-44 44ZM377 667q81.25 0 138.125-57.5T572 471q0-81-56.875-138.5T377 275q-82.083 0-139.542 57.5Q180 390 180 471t57.458 138.5Q294.917 667 377 667Z" />
      </svg>
    </span>
  </button>
</div>


<!-- Categorias  -->
<h3 class="text-xl font-bold mt-16">Categorias</h3>
<div class="mt-5">

  <ul>
    @foreach ($categorias as $categoria)
      <li class="mb-2">
        <i class="fa fa-caret-right" aria-hidden="true"></i>
        <a href="{{ route('productos.categoria', $categoria['slug']) }}" class="text-red-700 hover:text-red-400">
          {{ $categoria['categoria'] }}</a>
        @if ($categoria->hijas->count() > 0)
          @include('productos.partials_categorias', [
              'categorias' => $categoria->hijas,
          ])
        @endif
      </li>
    @endforeach
  </ul>

</div>
