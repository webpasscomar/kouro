<!-- Buscardor y Categorias  -->

<div class="px-4">
  <!-- Buscador -->
  <h3 class="h4">Buscador</h3>
  <div class="input-group mt-3">
    <input type="search" placeholder="Buscar producto" class="form-control" wire:model="busqueda">
    <button class="btn btn-danger" wire:click.prevent="buscar()">
      <svg xmlns="http://www.w3.org/2000/svg" fill="white" height="24" viewBox="0 96 960 960" width="24">
        <path
          d="M796 935 533 672q-30 26-69.959 40.5T378 727q-108.162 0-183.081-75Q120 577 120 471t75-181q75-75 181.5-75t181 75Q632 365 632 471.15 632 514 618 554q-14 40-42 75l264 262-44 44ZM377 667q81.25 0 138.125-57.5T572 471q0-81-56.875-138.5T377 275q-82.083 0-139.542 57.5Q180 390 180 471t57.458 138.5Q294.917 667 377 667Z" />
      </svg>
    </button>
  </div>

  <!-- Categorías -->
  <h3 class="h4 mt-5">Categorías</h3>
  <ul class="list-unstyled mt-3">
    @foreach ($categorias as $categoria)
      <li class="mb-2">
        <i class="fa fa-angle-right text-danger me-2"></i>
        <a href="{{ route('productos.categoria', $categoria['slug']) }}" class="text-dark fw-bold text-decoration-none">
          {{ ucfirst(strtolower($categoria['categoria'])) }}
        </a>
        @if ($categoria->hijas->count() > 0)
          <ul class="list-unstyled ms-3 mt-2 border-start border-2 ps-3">
            @foreach ($categoria->hijas as $hija)
              <li>
                <i class="fa fa-angle-right text-secondary me-2"></i>
                <a href="{{ route('productos.categoria', $hija['slug']) }}" class="text-muted text-decoration-none">
                  {{ ucfirst(strtolower($hija['categoria'])) }}
                </a>
              </li>
            @endforeach
          </ul>
        @endif
      </li>
    @endforeach
  </ul>
</div>
