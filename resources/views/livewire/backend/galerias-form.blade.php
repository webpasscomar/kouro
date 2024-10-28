<div class="modal fade show d-block" tabindex="-1" role="dialog" style="background-color: rgba(0, 0, 0, 0.5);"
    aria-modal="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-headline">
                        {{ $accion == 'crear' ? 'Nuevo Slide' : 'Editar Slide' }}
                    </h5>
                    <button type="button" class="btn-close" aria-label="Close" wire:click="cerrarModal"></button>
                </div>

                <div class="modal-body">
                    <div class="row mt-3">

                        <!-- Nombre -->
                        <div class="col-md-5">
                            <label for="nombre" class="form-label">Nombre</label><span
                                class="ml-1 text-danger">*</span>
                            <input type="text" class="form-control" id="nombre" wire:model="nombre">
                            <x-jet-input-error for="nombre" class="text-danger" />
                        </div>

                        <!-- Descripción -->
                        <div class="col-md-5">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <input type="text" class="form-control" id="descripcion" wire:model="descripcion">
                            {{-- <textarea rows="2" class="form-control" id="descripcion" wire:model="descripcion"></textarea> --}}
                            <x-jet-input-error for="descripcion" class="text-danger" />
                        </div>

                        <!-- Orden -->
                        <div class="col-md-2 form-group">
                            <label for="orden" class="form-label">Orden</label>
                            <input type="number" class="form-control" id="orden" wire:model="orden" min="0">
                            <x-jet-input-error for="orden" class="text-danger text-small" />
                        </div>

                        <!-- Seleccionar imagen -->
                        <div class="col-md-8 form-group">
                            {{-- <label for="imagen" class="form-label">Imagen:</label> --}}
                            <input type="file" id="imagen" wire:model="imagen" wire:change="cambioImagen" hidden>
                            <button type="button" class="btn btn-primary mt-2"
                                onclick="document.getElementById('imagen').click()">
                                Seleccionar imagen
                            </button><span class="ml-1 text-danger">*</span>
                            <p class="form-text">La imagen debe ser jpg ó png de 2000x400 px con un peso máximo de 2 MB.
                            </p>
                            <x-jet-input-error for="imagen" class="text-danger" />
                        </div>

                        <!-- Vista previa de la imagen -->
                        <div class="col-md-4">
                            @if ($cambioImg)
                                @if (gettype($imagen) === 'object')
                                    @if (in_array($imagen->extension(), ['png', 'jpg', 'jpeg']))
                                        <img src="{{ $imagen->temporaryUrl() }}" class="img-thumbnail"
                                            style="width: 80px; height: 80px;">
                                    @endif
                                @endif
                            @elseif ($accion === 'editar')
                                <img src="{{ asset('storage/galeria/' . $imagen) }}" class="img-thumbnail"
                                    style="width: 80px; height: 80px;">
                            @endif
                        </div>
                        <p class="field_required text-right"><span
                                class="text-danger field_required-icon align-middle">*</span>
                            Campos
                            obligatorios</p>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="cerrarModal()">Cancelar</button>
                    <button type="button" class="btn btn-primary" wire:click.prevent="guardar()">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
