
@php
    //sdk mercadopago
    require base_path('vendor/autoload.php');
    //credenciales
    MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));

    //crea el objeto
    $preference = new MercadoPago\Preference();

    //crea un item de la preferencia
    $item = new MercadoPago\Item();

    // $item->title = "Mi producto";
    // $item->quantity = 1;
    // $item->unit_price = 75.56;
    // $preference->items = array($item);
    // $preference->save();


    if ($cant_art > 0) {
        for ($i = 0; $i < $cant_art; $i++){
            $item->title = $items[$i]['producto_nombre'] . ' ' . $items[$i]['talle_nombre'] . ' ' . $items[$i]['color_nombre'];
            $item->quantity = $items[$i]['cantidad'];
            $item->unit_price = $items[$i]['producto_precio'];

            $products[] = $item;
        }

        if ($envio > 0 ) {
            $item->title = 'Envio';
            $item->quantity = 1;
            $item->unit_price = $envio;
            $products[] = $item;
        }

        $preference->notification_url = config('services.mercadopago.url_post');

        $preference->external_reference = $nro_pedido;

        $preference->back_urls = array(
                "success" => route('pagomp.pago',$nro_pedido),
                "failure" => route('pagomp.pago',$nro_pedido),
                "pending" => route('pagomp.pago',$nro_pedido),
        );

        $preference->auto_return = "approved";
        $preference->items = $products;
        $preference->save();


    }

@endphp


<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

            <h1 class="font-bold py-2 text-3xl">Mercado Pago</h1>


            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Producto</th>
                        <th class="px-4 py-2">Talle</th>
                        <th class="px-4 py-2">Color</th>
                        <th class="px-4 py-2">Precio</th>
                        <th class="px-4 py-2">Cantidad</th>
                        <th class="px-4 py-2">Subtotal</th>
                    </tr>
                </thead>
                @if ($cant_art > 0)
                    <tbody>
                        @for ($i = 0; $i < $cant_art; $i++)
                            <tr>
                                <td class="border px-4 py-2">{{ $items[$i]['producto_id'] }}</td>
                                <td class="border px-4 py-2">{{ $items[$i]['producto_nombre'] }}</td>
                                <td class="border px-4 py-2">{{ $items[$i]['talle_nombre'] }}</td>
                                <td class="border px-4 py-2">{{ $items[$i]['color_nombre'] }}</td>
                                <td class="border px-4 py-2" style="text-align: right;">
                                    {{ number_format($items[$i]['producto_precio'], 2, ',', '.') }}</td>
                                <td class="border px-4 py-2" style="text-align: right;">{{ $items[$i]['cantidad'] }}
                                </td>
                                <td class="border px-4 py-2" style="text-align: right;">
                                    {{ number_format($items[$i]['cantidad'] * $items[$i]['producto_precio'], 2, ',', '.') }}
                                </td>
                            </tr>
                        @endfor
            </table>
            <table class="table-auto">
                <thead>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                    <tr>
                        <td class="border px-4 py-2 ">Total</td>
                        <td class="border px-4 py-2 " style="text-align: right;">
                            {{ number_format($total, 2, ',', '.') }}</td>

                    </tr>
                    <tr>
                        <td class="border px-4 py-2">Costo de envío</td>
                        <td class="border px-4 py-2" style="text-align: right;">
                            {{ number_format($envio, 2, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">Total</td>
                        <td class="border px-4 py-2" style="text-align: right;">
                            {{ number_format($total + $envio, 2, ',', '.') }}</td>
                        <td>
                            <div class="cho-container">
                            </div>
                        </td>
                        </tr>
                </tbody>
            </table>
            @endif

        </div>
    </div>
</div>


<script src="https://sdk.mercadopago.com/js/v2"></script>

<script>
    //Agrega el sdk
    const  mp = new MercadoPago("{{config('services.mercadopago.key')}}",{
        locale: 'es-AR'
    });

    //Inicializa el checkout
    mp.checkout({
        preference: {
            id: '{{$preference->id}}'
        },
        render: {
            container: '.cho-container',  //indice donde se mostrara el boton
            label: 'Pagar con MercadoPago',  //Texto del boton
        }
    });


</script>
