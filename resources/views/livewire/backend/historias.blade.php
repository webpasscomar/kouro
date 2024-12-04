<div class="card">

    {{-- @if ($modal)
        @include('livewire.backend.historias-form')
    @endif --}}

    <div class="table-responsive">
        <table id="myTable" class="table my-4 table-bordered table-striped">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Color</th>
                    <th>talle</th>
                    <th class="text-left">Stock</th>
                    <th>Descripción</th>
                    <th class="text-left">Fecha</th>
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
                        <td>{{ $item->descripcion }}</td>
                        <td class="text-left">{{ $item->created_at }}</td>
                        {{-- <td class="text-right align-middle">
              <button wire:click="detalle({{ $item->id }})" class="btn btn-sm btn-success" title="Detalle"><i
                  class="fas fa-eye"></i></button>
            </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
