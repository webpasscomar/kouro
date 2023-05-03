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
                    </tr>
                </tbody>
            </table>
            @endif

        </div>
    </div>
</div>
