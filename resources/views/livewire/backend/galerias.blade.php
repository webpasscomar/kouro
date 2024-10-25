<div>
  @if ($modal)
    @include('livewire.backend.galerias-form')
  @endif

  <div class="card">

    <div class="card-header text-right">
      <button wire:click="crear()" class="btn btn-success">
        <i class="fas fa-plus mr-2"></i>Nuevo
      </button>
    </div>

    <div class="card-body">
      <div class="table-responsive">

        <table class="table table-striped table-bordered w-100" id="myTable">
          <thead>
            <tr class="bg-light text-dark">
              <th class="cursor-pointer" wire:click="order('id')">Id
                @if ($sort == 'id')
                  @if ($order == 'asc')
                    <i class="fas fa-sort-alpha-up-alt float-end"></i>
                  @else
                    <i class="fas fa-sort-alpha-down-alt float-end"></i>
                  @endif
                @else
                  <i class="fas fa-sort float-end"></i>
                @endif
              </th>
              <th>Imagen</th>
              <th class="cursor-pointer" wire:click="order('nombre')">Nombre
                @if ($sort == 'nombre')
                  @if ($order == 'asc')
                    <i class="fas fa-sort-alpha-up-alt float-end"></i>
                  @else
                    <i class="fas fa-sort-alpha-down-alt float-end"></i>
                  @endif
                @else
                  <i class="fas fa-sort float-end"></i>
                @endif
              </th>
              <th class="cursor-pointer" wire:click="order('descripcion')">Descripción
                @if ($sort == 'descripcion')
                  @if ($order == 'asc')
                    <i class="fas fa-sort-alpha-up-alt float-end"></i>
                  @else
                    <i class="fas fa-sort-alpha-down-alt float-end"></i>
                  @endif
                @else
                  <i class="fas fa-sort float-end"></i>
                @endif
              </th>
              <th class="cursor-pointer" wire:click="order('orden')">Orden
                @if ($sort == 'orden')
                  @if ($order == 'asc')
                    <i class="fas fa-sort-alpha-up-alt float-end"></i>
                  @else
                    <i class="fas fa-sort-alpha-down-alt float-end"></i>
                  @endif
                @else
                  <i class="fas fa-sort float-end"></i>
                @endif
              </th>
              <th class="cursor-pointer" wire:click="order('estado')">Estado
                @if ($sort == 'estado')
                  @if ($order == 'asc')
                    <i class="fas fa-sort-alpha-up-alt float-end"></i>
                  @else
                    <i class="fas fa-sort-alpha-down-alt float-end"></i>
                  @endif
                @else
                  <i class="fas fa-sort float-end"></i>
                @endif
              </th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @if ($galerias)
              @foreach ($galerias as $galeria)
                <tr>
                  <td class="border">{{ $galeria->id }}</td>
                  <td class="border">
                    <div class="d-flex justify-content-center">
                      <img src="{{ asset('storage/galeria/' . $galeria->imagen) }}" alt=""
                        class="rounded-circle" style="height: 40px; width: 40px;">
                    </div>
                  </td>
                  <td class="border">{{ $galeria->nombre }}</td>
                  <td class="border">{{ $galeria->descripcion }}</td>
                  <td class="border">{{ $galeria->orden }}</td>
                  <td class="border text-center">
                    @livewire(
                        'toggle-button',
                        [
                            'model' => $galeria,
                            'field' => 'estado',
                        ],
                        key($galeria->id)
                    )
                  </td>
                  <td class="border text-end">
                    <button wire:click="editar({{ $galeria->id }})" class="btn btn-sm btn-warning" title="Editar">
                      <i class="fas fa-edit"></i>
                    </button>
                    <button wire:click="$emit('alertDelete', {{ $galeria->id }})" class="btn btn-sm btn-danger"
                      title="Eliminar">
                      <i class="fas fa-trash"></i>
                    </button>
                  </td>
                </tr>
              @endforeach
            @endif
          </tbody>
        </table>

        @if ($galerias)
          <div class="mt-3">
            {{ $galerias->links() }}
          </div>
        @endif

      </div>
    </div>
  </div>
</div>
