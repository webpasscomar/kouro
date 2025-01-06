<div>
    <!-- formulario de pago -->
    <div class="mt-4">
        <h2 class="mb-4 fw-bold fs-2 text-secondary">Pago:</h2>
        <label class="block font-bold text-gray-700">Forma de Pago</label>
        <select class="form-select mt-1 block w-full" id="entrega_id" wire:model="forma_pago_id">
            <option value="0">Seleccione una Forma de Pago</option>
            @foreach ($formasdepagos as $formap)
                <option value="{{ $formap['id'] }}">{{ $formap['nombre'] }}</option>
            @endforeach
        </select>
        <x-jet-input-error for="forma_pago_id" />
    </div>
</div>
<div class="mt-3">
    <span class="">
        @if ($forma_pago_id != 0)
            {{-- @if ($cobra == 1) --}}
                <button wire:click="pagar()" type="button" class="btn btn-danger btn-large">Pagar</button>
            {{-- @else --}}
                {{-- <a href="/destacados" class="btn btn-danger btn-large">Finalizar</a> --}}
            {{-- @endif --}}
        @endif
    </span>
</div>
