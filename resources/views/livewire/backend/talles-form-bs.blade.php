{{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> --}}

<div class="modal fade show d-block" id="talleModal" tabindex="-1" role="dialog"
    style="background-color:#00000099;{{ $modal ? 'display: block' : 'display: none' }}"
    aria-labelledby="exampleModalLabel" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered">


        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    {{ $action == 'crear' ? 'Nuevo Talle' : 'Modificar Talle' }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click='cerrarModal'
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="talle" class="form-label">Talle <span class="ms-1 text-danger">*</span></label>
                        <input type="text" class="form-control @error('talle') is-invalid @enderror" id="talle"
                            wire:model="talle">
                        @error('talle')
                            <span class="fs-6 text-danger ms-1 mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                </form>
                <p class="field_required text-right text-secondary">
                    <span class="fs-6 text-danger">*</span>
                    campos obligatorios
                </p>
            </div>
            <div class="modal-footer">
                <button wire:click="guardar" type="button"
                    class="btn btn-primary">{{ $action == 'crear' ? 'Guardar' : 'Actualizar' }}</button>
                <button wire:click="cerrarModal" type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
