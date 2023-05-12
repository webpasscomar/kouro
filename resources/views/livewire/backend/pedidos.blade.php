<x-slot name="header">
    <h1 class="text-gray-900"><a href="{{ route('dashboard') }}">Dashboard</a> | Pedidos</h1>
</x-slot>


<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if ($modal==1)
                @include('livewire.backend.pedidos-form')
            @endif
            @if ($modal==0)
            <div class="grid grid-cols-1 sm:grid-cols-3">
                <div>
                    <button wire:click="crear()"
                        class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 my-3">+ Nuevo Pedido</button>
                </div>
                <div class="py-3">
                    <x-jet-input type="text" placeholder="Texto a buscar" wire:model="search" class="w-full" />
                </div>
            </div>
            <table class="table-auto w-full">
                        <thead>
                            <tr class="bg-gray-200 text-gray-700">
                                <th class="cursor-pointer px-4 py-2" wire:click="order('id')">ID
                                    {{-- -- Ordenar -- --}}
                                    @if ($sort == 'id')
                                        @if ($order == 'asc')
                                            <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                        @else
                                            <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                        @endif
                                    @else
                                        <i class="fas fa-sort float-right mt-1"></i>
                                    @endif
                                </th>
                                <th class="cursor-pointer px-4 py-2" wire:click="order('fecha')">Fecha
                                    {{-- -- Ordenar -- --}}
                                    @if ($sort == 'fecha')
                                        @if ($order == 'asc')
                                            <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                        @else
                                            <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                        @endif
                                    @else
                                        <i class="fas fa-sort float-right mt-1"></i>
                                    @endif

                                </th>
                                <th class="cursor-pointer px-4 py-2" wire:click="order('apellido')">Apellido
                                    {{-- -- Ordenar -- --}}
                                    @if ($sort == 'apellido')
                                        @if ($order == 'asc')
                                            <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                        @else
                                            <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                        @endif
                                    @else
                                        <i class="fas fa-sort float-right mt-1"></i>
                                    @endif
                                </th>
                                <th class="cursor-pointer px-4 py-2" wire:click="order('nombre')">Nombre
                                    {{-- -- Ordenar -- --}}
                                    @if ($sort == 'nombre')
                                        @if ($order == 'asc')
                                            <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                        @else
                                            <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                        @endif
                                    @else
                                        <i class="fas fa-sort float-right mt-1"></i>
                                    @endif
                                </th>
                                <!-- <th class="cursor-pointer px-4 py-2" wire:click="order('status_mp')">Status Pago
                                    {{-- -- Ordenar -- --}}
                                    @if ($sort == 'status_mp')
                                        @if ($order == 'asc')
                                            <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                        @else
                                            <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                        @endif
                                    @else
                                        <i class="fas fa-sort float-right mt-1"></i>
                                    @endif
                                </th>
                                <th class="cursor-pointer px-4 py-2" wire:click="order('detail_mp')">Detalle Pago
                                    {{-- -- Ordenar -- --}}
                                    @if ($sort == 'status_mp')
                                        @if ($order == 'asc')
                                            <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                        @else
                                            <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                        @endif
                                    @else
                                        <i class="fas fa-sort float-right mt-1"></i>
                                    @endif
                                </th>
                                <th class="cursor-pointer px-4 py-2" wire:click="order('transac_mp')">ID Pago
                                    {{-- -- Ordenar -- --}}
                                    @if ($sort == 'transac_mp')
                                        @if ($order == 'asc')
                                            <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                        @else
                                            <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                        @endif
                                    @else
                                        <i class="fas fa-sort float-right mt-1"></i>
                                    @endif
                                </th> -->
                                <th class="cursor-pointer px-4 py-2" wire:click="order('estado')">Estado
                                    {{-- -- Ordenar -- --}}
                                    @if ($sort == 'estado')
                                        @if ($order == 'asc')
                                            <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                        @else
                                            <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                        @endif
                                    @else
                                        <i class="fas fa-sort float-right mt-1"></i>
                                    @endif
                                </th>
                                <th class="px-4 py-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pedidos as $pedido)
                                <tr>
                                    <td class="border px-4 py-2">{{ $pedido->id }}</td>
                                    <td class="border px-4 py-2">{{ $pedido->fecha }}</td>
                                    <td class="border px-4 py-2">{{ $pedido->apellido }}</td>
                                    <td class="border px-4 py-2">{{ $pedido->nombre }}</td>
                                    <!-- <td class="border px-4 py-2">{{ $pedido->status_mp }}</td>
                                    <td class="border px-4 py-2">{{ $pedido->detail_mp }}</td>
                                    <td class="border px-4 py-2">{{ $pedido->transac_mp }}</td> -->
                                    <!-- <td class="border px-4 py-2">{{ $pedido->estado }}</td> -->
                                    <td class="border px-4 py-2">{{ $pedido->estado->nombre }}</td>
                                    <td class="border px-4 py-2 text-center">
                                        <button wire:click="detalle({{ $pedido->id }})"
                                            class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4">Detalle</button>

                                            <!-- solo se puede editar en pendiente o en preparacion -->
                                        @if ($pedido->estado_id == 1 || $pedido->estado_id == 2)
                                            <button wire:click="editar({{ $pedido->id }})"
                                                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4">Editar</button>

                                                <button wire:click="$emit('alertDelete',{{ $pedido->id }})"
                                                   class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4">Borrar</button>

                                        @endif

                                        <button wire:click="verpago({{ $pedido->id }})"
                                            class="bg-gray-200 hover:bg-gray-400 text-black font-bold py-2 px-4">Ver Pago</button>

                                        <button wire:click="cobrarmp({{ $pedido->id }})"
                                                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4">Cobrar con MP</button>


                                        </td>
                                </tr>
                                @for ($i = 0; $i < $cantidad_detalle; $i++)
                                        @if ($muestra_detalle[$i]['id'] == $pedido->id)
                                            @if ($muestra_detalle[$i]['ver'] == 1)
                                                <tr class="border">
                                                    <td colspan=6>
                                                        <table class="table-auto w-full">
                                                            <th>Codigo</th>
                                                            <th>Cantidad</th>
                                                            <th>Precio</th>
                                                            <th>Sub-Total</th>
                                                            <th>Talle</th>
                                                            <th>Color</th>
                                                            <th>Producto</th>
                                                            @foreach ($pedidos_items as $items)
                                                                @if ($items->pedido_id == $muestra_detalle[$i]['id'])
                                                                    <tr>
                                                                        <td class="border" >{{$items->sku->producto_id}}</td>
                                                                        <td class="border" >{{$items->cantidad}}</td>
                                                                        <td class="border">{{$items->precioUnitario}}</td>
                                                                        <td class="border" >{{$items->precioItem}}</td>
                                                                        <td class="border">{{$items->sku->talle->talle}}</td>
                                                                        <td class="border">{{$items->sku->color->color}}</td>
                                                                        <td class="border">{{$items->sku->producto->nombre}}</td>
                                                                    </tr>
                                                                @endif
                                                            @endforeach
                                                        </table>

                                                    </td>
                                                </tr>
                                            @endif
                                        @endif
                                @endfor



                            @endforeach
                        </tbody>
            </table>

                    {{ $pedidos->links() }}
            @endif
            @if ($modalpago==1)
                @include('livewire.backend.verpago-form')
            @endif

        </div>
    </div>
</div>
