<div>

    <div class="card">
        <div class="card-body">
            <label for="">Ingrese los movimientos a guardar</label>
            <div class="row mt-4">
                {{-- Tipo de movimiento --}}
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="tipomove_id" class="form-label fw-normal mb-0">Movimiento</label><span
                            class="ml-1 text-danger">*</span>
                        <select id="tipomove_id" class="form-select @error('tipomove_id') is-invalid @enderror"
                            wire:model="tipomove_id">
                            <option value="0">Seleccione un movimiento</option>
                            @foreach ($tipomove as $t)
                                <option value="{{ $t->id }}">{{ $t->descripcion }}</option>
                            @endforeach
                        </select>
                        {{-- <x-jet-input-error for="tipomove_id" /> --}}
                        @error('tipomove_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                {{-- Producto --}}
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="producto_id" class="form-label fw-normal mb-0">Producto</label><span
                            class="ml-1 text-danger">*</span>
                        <select id="producto_id" class="form-select @error('producto_id') is-invalid @enderror"
                            wire:model="producto_id">
                            <option value="0">Seleccione un producto</option>
                            @foreach ($productos as $p)
                                <option value="{{ $p->id }}">{{ $p->nombre }}</option>
                            @endforeach
                        </select>
                        {{-- <x-jet-input-error for="producto_id" /> --}}
                        @error('producto_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                {{-- Color --}}
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="color_id" class="form-label fw-normal mb-0">Color</label><span
                            class="ml-1 text-danger">*</span>
                        <select id="color_id" class="form-select @error('color_id') is-invalid @enderror"
                            wire:model="color_id">
                            <option value="0">Seleccione un color</option>
                            @foreach ($colores as $c)
                                <option value="{{ $c->id }}">{{ $c->color }}</option>
                            @endforeach
                        </select>
                        {{-- <x-jet-input-error for="color_id" /> --}}
                        @error('color_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                {{-- Talle --}}
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="talle_id" class="form-label fw-normal mb-0">Talle</label><span
                            class="ml-1 text-danger">*</span>
                        <select id="talle_id" class="form-select @error('talle_id') is-invalid @enderror"
                            wire:model="talle_id">
                            <option value="0">Seleccione un talle</option>
                            @foreach ($talles as $c)
                                <option value="{{ $c->id }}">{{ $c->talle }}</option>
                            @endforeach
                        </select>
                        {{-- <x-jet-input-error for="talle_id" /> --}}
                        @error('talle_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                {{-- Cantidad --}}
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="cantidad" class="form-label fw-normal mb-0">Cantidad</label><span
                            class="ml-1 text-danger">*</span>
                        <input type="text"
                            class="form-control @error('cantidad') is-invalid                
                        @enderror"
                            id="cantidad" wire:model="cantidad" placeholder="Ingrese cantidad">
                        {{-- <x-jet-input-error for="cantidad" /> --}}
                        @error('cantidad')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-2">
                    <button wire:click="guardar()" class="btn btn-primary w-100 mt-4">
                        <i class="fas fa-plus"></i> Agregar
                    </button>
                </div>
            </div>
            <p class="field_required mt-3 mb-0 text-right"><span class="field_required-icon text-danger">*</span> Campos
                requeridos
            </p>
        </div>
    </div>

    <div class="card">

        <div class="card-body">


            <table class="table table-bordered table-striped">
                <thead>
                    <tr class="bg-light text-dark">
                        <th class="algin-middle text-left">Id</th>
                        <th class="algin-middle text-left">Producto</th>
                        <th class="algin-middle text-left">Color</th>
                        <th class="algin-middle text-left">Talle</th>
                        <th class="algin-middle text-left">Cantidad</th>
                        <th class="algin-middle text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($movimientos)
                        @for ($i = 0; $i < count($movimientos); $i++)
                            <tr>
                                <td class="align-middle text-left">{{ $movimientos[$i]['producto_id'] }}</td>
                                <td class="align-middle text-left">{{ $movimientos[$i]['producto_descripcion'] }}
                                </td>
                                <td class="align-middle text-left">{{ $movimientos[$i]['color'] }}</td>
                                <td class="align-middle text-left">{{ $movimientos[$i]['talle'] }}</td>
                                <td class="align-middle text-left">{{ $movimientos[$i]['cantidad'] }}</td>
                                <td class="align-middle text-right">
                                    <button wire:click="$emit('alertDelete', {{ $i }})"
                                        class="btn btn-danger btn-sm" title="Eliminar">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                    {{-- <button wire:click="delete({{ $i }})" class="btn btn-danger btn-sm"
                                        title="Eliminar">
                                        <i class="fas fa-trash-alt"></i>
                                    </button> --}}
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
