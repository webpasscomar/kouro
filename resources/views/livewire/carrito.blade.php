<x-header>
    Carrito
</x-header>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">





            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Productos</th>
                        <th class="px-4 py-2">Talle</th>
                        <th class="px-4 py-2">Color</th>
                        <th class="px-4 py-2">Precio</th>
                        <th class="px-4 py-2">Cantidad</th>
                        <th class="px-4 py-2">Subtotal</th>
                    </tr>
                </thead>
                @if (isset($productos))
                    <tbody>
                        @foreach ($productos as $p)
                            <tr>
                                <td class="border px-4 py-2">{{ $p->id }}</td>
                                <td class="border px-4 py-2">{{ $p->descripcion }}</td>
                                <td class="border px-4 py-2">{{ $p->default }}</td>
                                <td class="border px-4 py-2">{{ $p->valor }}</td>
                                {{-- <td class="border px-4 py-2">{{ $p->detalle }}</td> --}}
                                <td class="border px-4 py-2">{{ $p->relacionados }}</td>

                                <td class="border px-4 py-2 text-center">
                                    <button wire:click="editar({{ $p->id }})"
                                        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4">Editar</button>
                                    <button wire:click="borrar({{ $p->id }})"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4">Borrar</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                @endif
            </table>

            <hr>

            <table>
                <thead>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                    <tr>
                        <td>Subtotal</td>
                        <td>{{ $subTotal }}</td>
                    </tr>
                    <tr>
                        <td>Costo de envío</td>
                        <td>{{ $envio }}</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td>{{ $total }}</td>
                    </tr>
                </tbody>
            </table>


        </div>
    </div>
</div>
