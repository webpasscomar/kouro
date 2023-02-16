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
                                <th class="cursor-pointer px-4 py-2" wire:click="order('status_mp')">Status Pago
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
                                </th>
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
                            @foreach ($pedidos as $item)
                                <tr>
                                    <td class="border px-4 py-2">{{ $item->id }}</td>
                                    <td class="border px-4 py-2">{{ $item->fecha }}</td>
                                    <td class="border px-4 py-2">{{ $item->apellido }}</td>
                                    <td class="border px-4 py-2">{{ $item->nombre }}</td>
                                    <td class="border px-4 py-2">{{ $item->status_mp }}</td>
                                    <td class="border px-4 py-2">{{ $item->detail_mp }}</td>
                                    <td class="border px-4 py-2">{{ $item->transac_mp }}</td>
                                    <td class="border px-4 py-2">{{ $item->estado }}</td>
                                    <td class="border px-4 py-2 text-center">
                                        <button wire:click="detalle({{ $item->id }})"
                                            class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4">Detalle</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
            </table>

                    {{ $pedidos->links() }}
            @endif
        </div>
    </div>
</div>
