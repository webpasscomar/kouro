<div class="card">

  @if ($modal)
    @include('livewire.backend.stockspendientes-form')
  @endif

  <div class="table-responsive">
    <table class="table table-striped table-bordered w-100" id="myTable">
      <thead>
        <tr class="bg-light text-dark">
          <th>ID</th>
          <th>Solicitado</th>
          <th>Respondido</th>
          <th>E-Mail</th>
          <th>Respuesta</th>
          <th>Producto</th>
          <th>Color</th>
          <th>Talle</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($stockspendientes as $pendientes)
          <tr>
            <td>{{ $pendientes->id }}</td>
            <td>{{ $pendientes->fechaSolicitud }}</td>
            <td>{{ $pendientes->fechaRespuesta }}</td>
            <td>{{ $pendientes->email }}</td>
            <td>{{ $pendientes->respuesta }}</td>
            <td>{{ $pendientes->producto->nombre }}</td>
            <td>{{ $pendientes->color->color }}</td>
            <td>{{ $pendientes->talle->talle }}</td>
            <td class="text-right align-middle">

              <button wire:click="editar({{ $pendientes->id }})" class="btn btn-sm btn-info" title="Respuesta">
                <i class="fas fa-comments"></i>
              </button>
              <button wire:click="enviar({{ $pendientes->id }})" class="btn btn-sm btn-primary" title="Enviar Mail">
                <i class="fas fa-envelope"></i>
              </button>
              <button wire:click="$emit('alertDelete', {{ $pendientes->id }})" class="btn btn-sm btn-danger"
                title="Eliminar">
                <i class="fas fa-trash-alt"></i>
              </button>

            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="mt-3">
    {{ $stockspendientes->links() }}
  </div>

</div>
