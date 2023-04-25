<x-header>
    Carrito
</x-header>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

            <h1>{{$subTotal}}</h1>

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
                @if(session('items'))
                    <tbody>
                        @foreach (session('items') as $item)
                            <tr>
                                <td class="border px-4 py-2">{{ $item['producto_id'] }}</td>
                                <td class="border px-4 py-2">{{ $item['producto_nombre'] }}</td>
                                <td class="border px-4 py-2">{{$item['talle_nombre'] }}</td>
                                <td class="border px-4 py-2">{{  $item['color_nombre']  }}</td>
                                <td class="border px-4 py-2" style="text-align: right;">{{ number_format($item['producto_precio'], 2, ',', '.') }}</td>
                                <td class="border px-4 py-2" style="text-align: right;">{{ $item['cantidad'] }}</td>
                                <td class="border px-4 py-2"  style="text-align: right;">{{ number_format($item['cantidad']*$item['producto_precio'], 2, ',', '.') }}</td>
                                <td class="border px-4 py-2 text-center">
                                    {{-- <button wire:click.prevent="$emit('alerCarritotDelete',{{ $item['producto_id'],$item['talle_id'],$item['color_id'] }})"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4">Borrar</button> --}}
                                        <button  class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4" wire:click.prevent="prueba()" >Borrar</button>








                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    @else
                            <p>No hay compras</p>
                @endif
            </table>

            <hr>

            <table class="table-auto">
                <thead>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                    <tr >
                        <td class="border px-4 py-2 ">Subtotal</td>
                        <td class="border px-4 py-2 " style="text-align: right;">{{ number_format(session('sub_total'), 2, ',', '.')}}</td>

                    </tr>
                    <tr>
                        <td class="border px-4 py-2">Costo de envío</td>
                        <td class="border px-4 py-2" style="text-align: right;">{{ number_format(session('envio'), 2, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">Total</td>
                        <td class="border px-4 py-2" style="text-align: right;">{{ number_format(session('sub_total')+session('envio'), 2, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>


        </div>
    </div>
</div>
