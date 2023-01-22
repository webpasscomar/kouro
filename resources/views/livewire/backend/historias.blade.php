<x-slot name="header">
    <h1 class="text-gray-900"><a href="{{ route('dashboard') }}">Dashboard</a> | Existencias en Stock</h1>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">


            <div class="grid grid-cols-1 sm:grid-cols-3">
                <div class="py-3">
                    <x-jet-input type="text" placeholder="Texto a buscar" wire:model="search" class="w-full" />
                </div>
            </div>

            @if ($modal)
                @include('livewire.backend.historias-form')
            @endif

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
                        <th class="cursor-pointer px-4 py-2" wire:click="order('color')">Color
                            {{-- -- Ordenar -- --}}
                            @if ($sort == 'color')
                                @if ($order == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th class="cursor-pointer px-4 py-2" wire:click="order('talle')">talle
                            {{-- -- Ordenar -- --}}
                            @if ($sort == 'talle')
                                @if ($order == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th class="cursor-pointer px-4 py-2" wire:click="order('stock')">Stock
                            {{-- -- Ordenar -- --}}
                            @if ($sort == 'stock')
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
                    @foreach ($sku as $item)
                        <tr>
                            <td class="border px-4 py-2">{{ $item->id }}</td>
                            <td class="border px-4 py-2">{{ $item->nombre }}</td>
                            <td class="border px-4 py-2">{{ $item->color }}</td>
                            <td class="border px-4 py-2">{{ $item->talle }}</td>
                            <td class="border px-4 py-2">{{ $item->stock }}</td>
                            <td class="border px-4 py-2 text-center">
                                <button wire:click="detalle({{ $item->id }})"
                                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4">Detalle</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $sku->links() }}

        </div>
    </div>
</div>
