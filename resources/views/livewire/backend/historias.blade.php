<div class="card">

    {{-- @if ($modal)
        @include('livewire.backend.historias-form')
    @endif --}}

    <div class="table-responsive">
        <table id="myTable" class="table my-4 table-bordered table-striped">
            <thead>
                <tr>
                    <th class="align-middle text-left">Código</th>
                    <th class="align-middle text-left">Nombre</th>
                    <th class="align-middle text-left">Color</th>
                    <th class="align-middle text-left">Talle</th>
                    <th class="align-middle text-left">Cantidad</th>
                    <th class="align-middle text-left">Descripción</th>
                    <th class="align-middle text-left">Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sku as $item)
                    <tr>
                        <td class="align-middle text-left">{{ $item->codigo }}</td>
                        <td class="align-middle text-left">{{ $item->nombre }}</td>
                        <td class="align-middle text-left">{{ $item->color }}</td>
                        <td class="align-middle text-left">{{ $item->talle }}</td>
                        <td class="align-middle text-left">{{ $item->cantidad }}</td>
                        <td class="align-middle text-left">{{ $item->descripcion }}</td>
                        <td class="align-middle text-left">{{ $item->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
