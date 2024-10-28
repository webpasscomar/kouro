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

        <table class="table table-striped table-bordered w-100 my-4" id="myTable">
          <thead>
            <tr class="bg-light text-dark">
              <th class="text-left">Id</th>
              <th>Imagen</th>
              <th>Nombre</th>
              <th>Descripción</th>
              <th>Estado</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @if ($galerias)
              @foreach ($galerias as $galeria)
                <tr>
                  <td class="border text-left">{{ $galeria->id }}</td>
                  <td class="border">
                    <div class="d-flex justify-content-center">
                      <img src="{{ asset('storage/galeria/' . $galeria->imagen) }}" alt=""
                        class="rounded-circle" style="height: 40px; width: 40px;">
                    </div>
                  </td>
                  <td class="border">{{ $galeria->nombre }}</td>
                  <td class="border">{{ $galeria->descripcion }}</td>
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
                    <a href="{{ route('galeria.destroy', $galeria) }}" data-confirm-delete class="btn btn-sm btn-danger"
                      title="Eliminar">
                      <i class="fas fa-trash"></i>
                    </a>
                  </td>
                </tr>
              @endforeach
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
