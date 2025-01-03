<div>

    {{-- Datos del comprador --}}
    @if (session('items'))
        <div class="mt-5">
            <h2 class="mb-4 fw-bold fs-2 text-secondary">Datos del comprador</h2>
            <div class="row gy-4">
                <!-- formulario de datos de comprador y entrega-->
                <div class="col-md-4">
                    <label for="cli_nombre" class="form-label fw-bold text-secondary">Nombre
                        <span class="text-danger">*</span></label>
                    <input type="text" class="shadow-sm form-control" id="cli_nombre" wire:model.defer="cli_nombre"
                        placeholder="Ingrese el nombre">
                    <x-jet-input-error for="cli_nombre" class="mt-2 ms-1 text-danger" />
                </div>

                <div class="col-md-4">
                    <label for="cli_apellido" class="form-label fw-bold text-secondary">Apellido
                        <span class="text-danger">*</span></label>
                    <input type="text" class="shadow-sm form-control" id="cli_apellido" wire:model="cli_apellido"
                        placeholder="Ingrese el apellido">
                    <x-jet-input-error for="cli_apellido" class="mt-2 ms-1 text-danger" />
                </div>

                <div class="col-md-4">
                    <label for="cli_email" class="form-label fw-bold text-secondary">E-mail
                        <span class="text-danger">*</span></label>
                    <input type="email" class="shadow-sm form-control" id="cli_email" wire:model="cli_email"
                        placeholder="Ingrese el correo">
                    <x-jet-input-error for="cli_email" class="mt-2 ms-1 text-danger" />
                </div>

                <div class="col-md-4">
                    <label for="cli_telefono" class="form-label fw-bold text-secondary">Teléfono
                        <span class="text-danger">*</span></label>
                    <input type="text" class="shadow-sm form-control" id="cli_telefono" wire:model="cli_telefono"
                        placeholder="Ingrese el teléfono">
                    <x-jet-input-error for="cli_telefono" class="mt-2 ms-1 text-danger" />
                </div>

                <div class="col-md-4">
                    <label for="entrega_id" class="form-label fw-bold text-secondary">Forma de Entrega
                        <span class="text-danger">*</span>
                    </label>
                    <select class="shadow-sm form-select" id="entrega_id" wire:model="entrega_id"
                        wire:change="tipoentrega()">
                        <option value="0">Seleccione una opción</option>
                        @foreach ($formasdeentregas as $forma)
                            <option value="{{ $forma['id'] }}">{{ $forma['nombre'] }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="entrega_id" class="mt-2 ms-1 text-danger" />
                </div>

                <div class="col-md-8">
                    <label for="cli_calle" class="form-label fw-bold text-secondary">Calle
                        @if ($entrega_id == 1 || $entrega_id == 3)
                            <span class="text-danger">*</span>
                        @endif
                    </label>
                    <input type="text" class="shadow-sm form-control" id="cli_calle" wire:model="cli_calle"
                        placeholder="Ingrese la dirección">
                    <x-jet-input-error for="cli_calle" class="mt-2 ms-1 text-danger" />
                </div>

                <div class="col-md-2">
                    <label for="cli_nro" class="form-label fw-bold text-secondary">Nro
                        @if ($entrega_id == 1 || $entrega_id == 3)
                            <span class="text-danger">*</span>
                        @endif
                    </label>
                    <input type="text" class="shadow-sm form-control" id="cli_nro" wire:model="cli_nro"
                        placeholder="Ingrese el número">
                    <x-jet-input-error for="cli_nro" class="mt-2 ms-1 text-danger" />
                </div>

                <div class="col-md-2">
                    <label for="cli_piso" class="form-label fw-bold text-secondary">Piso</label>
                    <input type="text" class="shadow-sm form-control" id="cli_piso" wire:model="cli_piso"
                        placeholder="Ingrese el piso">
                    <x-jet-input-error for="cli_piso" class="mt-2 ms-1 text-danger" />
                </div>

                <div class="col-md-2">
                    <label for="cli_dpto" class="form-label fw-bold text-secondary">Dpto</label>
                    <input type="text" class="shadow-sm form-control" id="cli_dpto" wire:model="cli_dpto"
                        placeholder="Ingrese el Dpto">
                    <x-jet-input-error for="cli_dpto" class="mt-2 ms-1 text-danger" />
                </div>

                <div class="col-md-6">
                    <label for="cli_prov_id" class="form-label fw-bold text-secondary">Provincia
                        @if ($entrega_id == 1 || $entrega_id == 3)
                            <span class="text-danger">*</span>
                        @endif
                    </label>
                    <select class="shadow-sm form-select" id="cli_prov_id" wire:model="cli_prov_id">
                        <option value="0">Seleccione una Provincia</option>
                        @foreach ($provincias as $provincia)
                            <option value="{{ $provincia['id'] }}">{{ $provincia['nombre'] }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="cli_prov_id" class="mt-2 ms-1 text-danger" />
                </div>

                <div class="col-md-6">
                    <label for="cli_loc_id" class="form-label fw-bold text-secondary">Localidad
                        @if ($entrega_id == 1 || $entrega_id == 3)
                            <span class="text-danger">*</span>
                        @endif
                    </label>
                    <select class="shadow-sm form-select" id="cli_loc_id" wire:model="cli_loc_id">
                        <option value="0">Seleccione una Localidad</option>
                        @if ($localidades)
                            @foreach ($localidades as $localidad)
                                <option value="{{ $localidad['id'] }}">{{ $localidad['nombre'] }}</option>
                            @endforeach
                        @endif
                    </select>
                    <x-jet-input-error for="cli_loc_id" class="mt-2 ms-1 text-danger" />
                </div>
            </div>
            <div class="mt-4 d-flex justify-content-between align-items-center">
                <p class="text-muted">
                    <span class="text-danger">*</span> Datos obligatorios
                </p>
                <button class="btn btn-primary" wire:click.prevent='cerrarCarrito'>Continuar
                    con la
                    compra</button>
            </div>
        </div>

        {{-- {{ dump($apagar) }} --}}
    @endif
    {{-- Cuando se completan los datos del cliente y envio - aparece la forma de pago --}}
    @if ($apagar == 1)
        @include('livewire.carrito-form-pay')
    @endif

</div>
