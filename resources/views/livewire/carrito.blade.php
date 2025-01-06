<div>
    <div id="content">
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
                                                :talle_id="$item['talle_id']" :color_id="$item['color_id']" :color_nombre="$item['color_nombre']"
                                                :talle_nombre="$item['talle_nombre']">
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
                    </section>
                @else
                    {{-- Si no hay productos en el carrito, mostrar mensaje --}}
                    <div class="text-center d-flex flex-column align-items-center justify-content-center">
                        <h2 class="fs-4">No hay productos en el carrito</h2>
                        <div
                            class="gap-2 p-3 mt-3 border-2 rounded shadow-sm d-flex align-items-center fw-bold border-secondary">
                            <img src="{{ asset('img/hand.svg') }}" alt="Elegir productos" class="img-fluid"
                                style="width: 40px;">
                            <a href="{{ route('productos.destacados') }}" class="text-decoration-none">
                                <em>Mira nuestros productos</em>
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    @include('livewire.carrito-form')
</div>
