<div>

  <div class="card">
    <div class="card-body">
      <label for="">Ingrese los movimientos a guardar</label>
      <div class="row mt-4">
        <div class="col-md-2">
          <select class="form-select" wire:model="tipomove_id">
            <option value="0">Tipo de Movimiento</option>
            @foreach ($tipomove as $t)
              <option value="{{ $t->id }}">{{ $t->descripcion }}</option>
            @endforeach
          </select>
          <x-jet-input-error for="tipomove_id" />
        </div>

        <div class="col-md-2">
          <select class="form-select" wire:model="producto_id">
            <option value="0">Producto</option>
            @foreach ($productos as $p)
              <option value="{{ $p->id }}">{{ $p->nombre }}</option>
            @endforeach
          </select>
          <x-jet-input-error for="producto_id" />
        </div>

        <div class="col-md-2">
          <select class="form-select" wire:model="color_id">
            <option value="0">Color</option>
            @foreach ($colores as $c)
              <option value="{{ $c->id }}">{{ $c->color }}</option>
            @endforeach
          </select>
          <x-jet-input-error for="color_id" />
        </div>

        <div class="col-md-2">
          <select class="form-select" wire:model="talle_id">
            <option value="0">Talle</option>
            @foreach ($talles as $c)
              <option value="{{ $c->id }}">{{ $c->talle }}</option>
            @endforeach
          </select>
          <x-jet-input-error for="talle_id" />
        </div>

        <div class="col-md-2">
          <input type="text" class="form-control" id="cantidad" wire:model="cantidad" placeholder="Cantidad">
          <x-jet-input-error for="cantidad" />
        </div>

        <div class="col-md-2">
          <button wire:click="guardar()" class="btn btn-primary w-100">
            <i class="fas fa-plus"></i> Agregar
          </button>
        </div>
      </div>
    </div>
  </div>

  <div class="card">

    <div class="card-body">


      <table class="table table-striped">
        <thead>
          <tr class="bg-light text-dark">
            <th class="cursor-pointer py-2 w-16">Id</th>
            <th class="cursor-pointer py-2 w-16">Producto</th>
            <th class="cursor-pointer py-2 w-16">Color</th>
            <th class="cursor-pointer py-2 w-16">Talle</th>
            <th class="cursor-pointer py-2 w-16">Cantidad</th>
            <th class="py-2">Acciones</th>
          </tr>
        </thead>
        <tbody>
          @if ($movimientos)
            @for ($i = 0; $i < count($movimientos); $i++)
              <tr>
                <td class="border px-4 py-2">{{ $movimientos[$i]['producto_id'] }}</td>
                <td class="border px-4 py-2">{{ $movimientos[$i]['producto_descripcion'] }}</td>
                <td class="border px-4 py-2">{{ $movimientos[$i]['color'] }}</td>
                <td class="border px-4 py-2">{{ $movimientos[$i]['talle'] }}</td>
                <td class="border px-4 py-2">{{ $movimientos[$i]['cantidad'] }}</td>
                <td class="border px-4 py-2 text-center">
                  <button wire:click="$emit('alertDelete', {{ $i }})" class="btn btn-danger btn-sm"
                    title="Eliminar">
                    <i class="fas fa-trash-alt"></i>
                  </button>
                </td>
              </tr>
            @endfor
          @else
            <tr>
              <td colspan="6">No hay movimientos aún ingresados</td>
            </tr>
          @endif
        </tbody>
      </table>
    </div>
    <div class="card-footer text-end">

      <button wire:click="finalizar()" class="btn btn-success">
        Grabar {{ count($movimientos) }} movimientos
      </button>

    </div>
  </div>

</div>
