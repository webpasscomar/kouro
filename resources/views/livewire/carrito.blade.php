<div class="py-5">
  <div class="container">
    {{-- Mostrar productos en carrito --}}
    @if (session('items'))
      <section class="row gx-4 mt-4">
        {{-- Sección items del carrito --}}
        <div class="col-lg-9">
          @foreach (session('items') as $index => $item)
            {{-- Pasar imágen dinámica al componente --}}
            <livewire:item-carrito :key="$index" :producto_nombre="$item['producto_nombre']" :cantidad="$item['cantidad']" :producto_precio="$item['producto_precio']"
              :index="$index" :apagar="$apagar" :producto_id="$item['producto_id']" :talle_id="$item['talle_id']" :color_id="$item['color_id']"
              :color_nombre="$item['color_nombre']" :talle_nombre="$item['talle_nombre']">
          @endforeach
        </div>

        {{-- Sección Total - Subtotal --}}
        <div class="col-lg-3 bg-white shadow-sm rounded p-3">
          <div class="d-grid gap-3">
            <div class="d-flex justify-content-between">
              <p class="fw-semibold">Subtotal:</p>
              <span>$ {{ number_format(session('sub_total'), 2, ',', '.') }}</span>
            </div>
            <div class="d-flex justify-content-between">
              <p class="fw-semibold">Costo de envío:</p>
              <span>$ {{ number_format(session('costoentrega'), 2, ',', '.') }}</span>
            </div>
            <div class="d-flex justify-content-between fw-bold fs-4">
              <p>Total:</p>
              <span>$ {{ number_format(session('sub_total') + session('costoentrega'), 2, ',', '.') }}</span>
            </div>
          </div>
        </div>
      </section>
    @else
      {{-- Sino hay productos en el carrito mostrar mensaje --}}
      <section class="d-flex flex-column align-items-center justify-content-center text-center">
        <h2 class="fs-4">No hay productos en el carrito</h2>
        <p
          class="d-flex align-items-center gap-2 mt-3 fw-bold border border-2 p-2 border-secondary rounded shadow-sm cursor-pointer">
          <img src="{{ asset('./img/hand.svg') }}" alt="elegir productos" class="w-25">
          <a href="{{ route('productos.destacados') }}" class="text-decoration-none">
            <em>Mira nuestros productos</em>
          </a>
        </p>
      </section>
    @endif

    {{-- Datos del comprador --}}
    @if (session('items'))
      <form class="mt-5">
        <h2 class="fw-bold fs-2 text-secondary mb-4">Datos del comprador</h2>
        <div class="row gy-4">
          <!-- formulario de datos de comprador y entrega-->
          <div class="col-md-4">
            <label for="cli_nombre" class="form-label fw-bold text-secondary">Nombre
              <span class="text-danger">*</span></label>
            <input type="text" class="form-control shadow-sm" id="cli_nombre" wire:model="cli_nombre"
              placeholder="Ingrese el nombre">
            <x-jet-input-error for="cli_nombre" class="mt-2" />
          </div>

          <div class="col-md-4">
            <label for="cli_apellido" class="form-label fw-bold text-secondary">Apellido
              <span class="text-danger">*</span></label>
            <input type="text" class="form-control shadow-sm" id="cli_apellido" wire:model="cli_apellido"
              placeholder="Ingrese el apellido">
            <x-jet-input-error for="cli_apellido" class="mt-2" />
          </div>

          <div class="col-md-4">
            <label for="cli_email" class="form-label fw-bold text-secondary">E-mail
              <span class="text-danger">*</span></label>
            <input type="email" class="form-control shadow-sm" id="cli_email" wire:model="cli_email"
              placeholder="Ingrese el correo">
            <x-jet-input-error for="cli_email" class="mt-2" />
          </div>

          <div class="col-md-4">
            <label for="cli_telefono" class="form-label fw-bold text-secondary">Teléfono
              <span class="text-danger">*</span></label>
            <input type="text" class="form-control shadow-sm" id="cli_telefono" wire:model="cli_telefono"
              placeholder="Ingrese el teléfono">
            <x-jet-input-error for="cli_telefono" class="mt-2" />
          </div>

          <div class="col-md-4">
            <label for="entrega_id" class="form-label fw-bold text-secondary">Forma de Entrega</label>
            <select class="form-select shadow-sm" id="entrega_id" wire:model="entrega_id" wire:change="tipoentrega()">
              <option value="0">Seleccione una opción</option>
              @foreach ($formasdeentregas as $forma)
                <option value="{{ $forma['id'] }}">{{ $forma['nombre'] }}</option>
              @endforeach
            </select>
            <x-jet-input-error for="entrega_id" class="mt-2" />
          </div>

          <div class="col-md-8">
            <label for="cli_calle" class="form-label fw-bold text-secondary">Calle</label>
            <input type="text" class="form-control shadow-sm" id="cli_calle" wire:model="cli_calle"
              placeholder="Ingrese la dirección">
            <x-jet-input-error for="cli_calle" class="mt-2" />
          </div>

          <div class="col-md-2">
            <label for="cli_nro" class="form-label fw-bold text-secondary">Nro</label>
            <input type="text" class="form-control shadow-sm" id="cli_nro" wire:model="cli_nro"
              placeholder="Ingrese el número">
            <x-jet-input-error for="cli_nro" class="mt-2" />
          </div>

          <div class="col-md-2">
            <label for="cli_piso" class="form-label fw-bold text-secondary">Piso</label>
            <input type="text" class="form-control shadow-sm" id="cli_piso" wire:model="cli_piso"
              placeholder="Ingrese el piso">
            <x-jet-input-error for="cli_piso" class="mt-2" />
          </div>

          <div class="col-md-2">
            <label for="cli_dpto" class="form-label fw-bold text-secondary">Dpto</label>
            <input type="text" class="form-control shadow-sm" id="cli_dpto" wire:model="cli_dpto"
              placeholder="Ingrese el Dpto">
            <x-jet-input-error for="cli_dpto" class="mt-2" />
          </div>

          <div class="col-md-6">
            <label for="cli_prov_id" class="form-label fw-bold text-secondary">Provincia</label>
            <select class="form-select shadow-sm" id="cli_prov_id" wire:model="cli_prov_id">
              <option value="0">Seleccione una Provincia</option>
              @foreach ($provincias as $provincia)
                <option value="{{ $provincia['id'] }}">{{ $provincia['nombre'] }}</option>
              @endforeach
            </select>
            <x-jet-input-error for="cli_prov_id" class="mt-2" />
          </div>

          <div class="col-md-6">
            <label for="cli_loc_id" class="form-label fw-bold text-secondary">Localidad</label>
            <select class="form-select shadow-sm" id="cli_loc_id" wire:model="cli_loc_id">
              <option value="0">Seleccione una Localidad</option>
              @if ($localidades)
                @foreach ($localidades as $localidad)
                  <option value="{{ $localidad['id'] }}">{{ $localidad['nombre'] }}</option>
                @endforeach
              @endif
            </select>
            <x-jet-input-error for="cli_loc_id" class="mt-2" />
          </div>
        </div>
      </form>

      <div class="d-flex justify-content-between align-items-center mt-4">
        <p class="text-muted">
          <span class="text-danger">*</span> Datos obligatorios
        </p>
        <button class="btn btn-primary">Continuar con la compra</button>
      </div>
    @endif
  </div>
</div>
