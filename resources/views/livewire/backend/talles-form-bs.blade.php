{{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> --}}

<div class="modal fade show d-block" id="exampleModal" tabindex="-1" role="dialog" style="display: block;"
  aria-labelledby="exampleModalLabel" aria-modal="true">
  <div class="modal-dialog modal-dialog-centered">


    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Formulario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="talle" class="form-label">Talle:</label>
            <input type="text" class="form-control" id="talle" wire:model="talle">
            <x-jet-input-error for="talle" />
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button wire:click.prevent="guardar()" type="button" class="btn btn-primary">Guardar</button>
        <button wire:click="cerrarModal()" type="button" class="btn btn-secondary"
          data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
