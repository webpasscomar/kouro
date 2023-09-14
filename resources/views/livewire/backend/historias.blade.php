<div class="max-w-7xl mx-auto sm:px6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">


        <div class="grid grid-cols-1 sm:grid-cols-3 mb-2">

            <div class="py-3 my-2">

                <h4 class="text-xl text-gray-900 font-bold"><a href="{{ route('dashboard') }}"><i
                            class="fas fa-home"></i></a> - Historia de movimientos
                </h4>
            </div>

            <div class="py-3">
                <x-jet-input type="text" placeholder="Texto a buscar" wire:model="search" class="w-full" />
            </div>

            <div class="flex justify-end">

            </div>

        </div>

        @if ($modal)
            @include('livewire.backend.historias-form')
        @endif

        <table class="table-auto w-full">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="cursor-pointer px-4 py-2" wire:click="order('codigo')">Código
                        {{-- -- Ordenar -- --}}
                        @if ($sort == 'codigo')
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
                        <td class="border px-4 py-2">{{ $item->codigo }}</td>
                        <td class="border px-4 py-2">{{ $item->nombre }}</td>
                        <td class="border px-4 py-2">{{ $item->color }}</td>
                        <td class="border px-4 py-2">{{ $item->talle }}</td>
                        <td class="border px-4 py-2">{{ $item->stock }}</td>
                        <td class="border px-4 py-2 text-center">
                            <button wire:click="detalle({{ $item->id }})" class="w-16 py-2 px-4 hover:scale-110"
                                title="Detalle"><img src="{{ asset('/img/search.svg') }}" alt="Detalle"></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="py-2">
            {{ $sku->links() }}
        </div>

    </div>
</div>
