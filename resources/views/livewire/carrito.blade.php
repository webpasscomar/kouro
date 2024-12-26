<!-- Content
  ============================================= -->
<section id="content">
    <div class="content-wrap">
        <div class="container">

            @if (session('items'))

                <section class="mt-4 row gx-4">

                    <div class="row">

                        <div class="col-xl-9">
                            <table class="table mb-5 cart">
                                <thead>
                                    <tr>
                                        <th class="cart-product-remove">&nbsp;</th>
                                        <th class="cart-product-thumbnail">&nbsp;</th>
                                        <th class="cart-product-name">Productos</th>
                                        <th class="cart-product-price">P. Unitario</th>
                                        <th class="cart-product-quantity">Cantidad</th>
                                        <th class="cart-product-subtotal">SubTotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (session('items') as $index => $item)
                                        <livewire:item-carrito :key="$index" :producto_nombre="$item['producto_nombre']" :cantidad="$item['cantidad']"
                                            :producto_precio="$item['producto_precio']" :index="$index" :apagar="$apagar" :producto_id="$item['producto_id']"
                                            :talle_id="$item['talle_id']" :color_id="$item['color_id']" :color_nombre="$item['color_nombre']" :talle_nombre="$item['talle_nombre']">
                                    @endforeach
                                </tbody>

                            </table>
                        </div>




                        <div class="col-xl-3">
                            <div class="p-2 rounded grid-inner bg-light">
                                <div class="row col-mb-30">
                                    <div class="col-12">
                                        <h4>Total del pedido</h4>

                                        <div class="table-responsive">
                                            <table class="table cart cart-totals">
                                                <tbody>
                                                    <tr class="cart_item">
                                                        <td class="cart-product-name">
                                                            <h5 class="mb-0">Subtotal</h5>
                                                        </td>

                                                        <td class="cart-product-name text-end">
                                                            <span class="amount">$
                                                                {{ number_format(session('sub_total'), 2, ',', '.') }}</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="cart_item">
                                                        <td class="cart-product-name">
                                                            <h5 class="mb-0">Costo de envío</h5>
                                                        </td>

                                                        <td class="cart-product-name text-end">
                                                            <span class="amount">$ 0,00</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="cart_item">
                                                        <td class="cart-product-name">
                                                            <h5 class="mb-0">Total</h5>
                                                        </td>

                                                        <td class="cart-product-name text-end">
                                                            <span class="amount color lead fw-medium">$
                                                                {{ number_format(session('sub_total') + session('costoentrega'), 2, ',', '.') }}</span>
                                                        </td>
                                                    </tr>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>

                                    {{-- <div class="col-12">
                      <a href="shop.html" class="m-0 text-center button button-3d button-black d-block">Proceed to
                        Checkout</a>
                    </div> --}}

                                </div>
                            </div>
                        </div>
                    </div>

        </div>
    </div>
</section><!-- #content end -->

<div class="py-5">
    <div class="container">
        {{-- Mostrar productos en carrito --}}
        {{-- @if (session('items'))
        <section class="mt-4 row gx-4">
         
          <div class="col-lg-9">
            @foreach (session('items') as $index => $item)
              <livewire:item-carrito :key="$index" :producto_nombre="$item['producto_nombre']" :cantidad="$item['cantidad']" :producto_precio="$item['producto_precio']"
                :index="$index" :apagar="$apagar" :producto_id="$item['producto_id']" :talle_id="$item['talle_id']" :color_id="$item['color_id']"
                :color_nombre="$item['color_nombre']" :talle_nombre="$item['talle_nombre']">
            @endforeach
          </div>

          
          <div class="p-3 bg-white rounded shadow-sm col-lg-3">
            <div class="gap-3 d-grid">
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
        </section> --}}
    @else
        {{-- Si no hay productos en el carrito, mostrar mensaje --}}
        <section class="text-center d-flex flex-column align-items-center justify-content-center">
            <h2 class="fs-4">No hay productos en el carrito</h2>
            <div class="gap-2 p-3 mt-3 border-2 rounded shadow-sm d-flex align-items-center fw-bold border-secondary">
                <img src="{{ asset('img/hand.svg') }}" alt="Elegir productos" class="img-fluid" style="width: 40px;">
                <a href="{{ route('productos.destacados') }}" class="text-decoration-none">
                    <em>Mira nuestros productos</em>
                </a>
            </div>
        </section>

        @endif

        {{-- Datos del comprador --}}
        @if (session('items'))
            <form class="mt-5">
                <h2 class="mb-4 fw-bold fs-2 text-secondary">Datos del comprador</h2>
                <div class="row gy-4">
                    <!-- formulario de datos de comprador y entrega-->
                    <div class="col-md-4">
                        <label for="cli_nombre" class="form-label fw-bold text-secondary">Nombre
                            <span class="text-danger">*</span></label>
                        <input type="text" class="shadow-sm form-control" id="cli_nombre" wire:model="cli_nombre"
                            placeholder="Ingrese el nombre">
                        <x-jet-input-error for="cli_nombre" class="mt-2" />
                    </div>

                    <div class="col-md-4">
                        <label for="cli_apellido" class="form-label fw-bold text-secondary">Apellido
                            <span class="text-danger">*</span></label>
                        <input type="text" class="shadow-sm form-control" id="cli_apellido" wire:model="cli_apellido"
                            placeholder="Ingrese el apellido">
                        <x-jet-input-error for="cli_apellido" class="mt-2" />
                    </div>

                    <div class="col-md-4">
                        <label for="cli_email" class="form-label fw-bold text-secondary">E-mail
                            <span class="text-danger">*</span></label>
                        <input type="email" class="shadow-sm form-control" id="cli_email" wire:model="cli_email"
                            placeholder="Ingrese el correo">
                        <x-jet-input-error for="cli_email" class="mt-2" />
                    </div>

                    <div class="col-md-4">
                        <label for="cli_telefono" class="form-label fw-bold text-secondary">Teléfono
                            <span class="text-danger">*</span></label>
                        <input type="text" class="shadow-sm form-control" id="cli_telefono" wire:model="cli_telefono"
                            placeholder="Ingrese el teléfono">
                        <x-jet-input-error for="cli_telefono" class="mt-2" />
                    </div>

                    <div class="col-md-4">
                        <label for="entrega_id" class="form-label fw-bold text-secondary">Forma de Entrega</label>
                        <select class="shadow-sm form-select" id="entrega_id" wire:model="entrega_id"
                            wire:change="tipoentrega()">
                            <option value="0">Seleccione una opción</option>
                            @foreach ($formasdeentregas as $forma)
                                <option value="{{ $forma['id'] }}">{{ $forma['nombre'] }}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="entrega_id" class="mt-2" />
                    </div>

                    <div class="col-md-8">
                        <label for="cli_calle" class="form-label fw-bold text-secondary">Calle</label>
                        <input type="text" class="shadow-sm form-control" id="cli_calle" wire:model="cli_calle"
                            placeholder="Ingrese la dirección">
                        <x-jet-input-error for="cli_calle" class="mt-2" />
                    </div>

                    <div class="col-md-2">
                        <label for="cli_nro" class="form-label fw-bold text-secondary">Nro</label>
                        <input type="text" class="shadow-sm form-control" id="cli_nro" wire:model="cli_nro"
                            placeholder="Ingrese el número">
                        <x-jet-input-error for="cli_nro" class="mt-2" />
                    </div>

                    <div class="col-md-2">
                        <label for="cli_piso" class="form-label fw-bold text-secondary">Piso</label>
                        <input type="text" class="shadow-sm form-control" id="cli_piso" wire:model="cli_piso"
                            placeholder="Ingrese el piso">
                        <x-jet-input-error for="cli_piso" class="mt-2" />
                    </div>

                    <div class="col-md-2">
                        <label for="cli_dpto" class="form-label fw-bold text-secondary">Dpto</label>
                        <input type="text" class="shadow-sm form-control" id="cli_dpto" wire:model="cli_dpto"
                            placeholder="Ingrese el Dpto">
                        <x-jet-input-error for="cli_dpto" class="mt-2" />
                    </div>

                    <div class="col-md-6">
                        <label for="cli_prov_id" class="form-label fw-bold text-secondary">Provincia</label>
                        <select class="shadow-sm form-select" id="cli_prov_id" wire:model="cli_prov_id">
                            <option value="0">Seleccione una Provincia</option>
                            @foreach ($provincias as $provincia)
                                <option value="{{ $provincia['id'] }}">{{ $provincia['nombre'] }}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="cli_prov_id" class="mt-2" />
                    </div>

                    <div class="col-md-6">
                        <label for="cli_loc_id" class="form-label fw-bold text-secondary">Localidad</label>
                        <select class="shadow-sm form-select" id="cli_loc_id" wire:model="cli_loc_id">
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

            <div class="mt-4 d-flex justify-content-between align-items-center">
                <p class="text-muted">
                    <span class="text-danger">*</span> Datos obligatorios
                </p>
                <button class="btn btn-primary">Continuar con la compra</button>
            </div>
        @endif
    </div>
</div>
