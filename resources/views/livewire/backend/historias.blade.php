<div class="card">

  @if ($modal)
    @include('livewire.backend.historias-form')
  @endif

  <div class="table-responsive">
    <table id="myTable" class="table table-bordered">
      <thead>
        <tr class="bg-gray-200 text-gray-700">
          <th>Código </th>
          <th>Nombre </th>
          <th>Color </th>
          <th>talle </th>
          <th>Stock </th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($sku as $item)
          <tr>
            <td>{{ $item->codigo }}</td>
            <td>{{ $item->nombre }}</td>
            <td>{{ $item->color }}</td>
            <td>{{ $item->talle }}</td>
            <td>{{ $item->stock }}</td>
            <td class="text-right align-middle">
              <button wire:click="detalle({{ $item->id }})" class="btn btn-sm btn-success" title="Detalle"><i
                  class="fas fa-eye"></i></button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
