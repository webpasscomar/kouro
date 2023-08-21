<div class="max-w-7xl mx-auto sm:px6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

        <div class="grid grid-cols-1 sm:grid-cols-3 mb-2">

            <div class="py-3 my-2">

                <h4 class="text-xl text-gray-900 font-bold"><a href="{{ route('dashboard') }}"><i
                            class="fas fa-home"></i></a> - Testimonios
                </h4>
            </div>

            <div class="py-3">
                <x-jet-input type="text" placeholder="Texto a buscar" wire:model="search" class="w-full" />
            </div>

            <div class="flex justify-end">
                <button wire:click="crear()"
                    class="font-bold bg-gray-100 p-2 rounded-md shadow shadow-gray-500 flex items-center text-gray-500 gap-x-1 hover:bg-gray-300 hover:translate-x-1 hover:translate-y-1 hover:shadow-none py-2 px-4 my-3">
                    <img src="{{ asset('./img/add.svg') }}" alt="agregar producto" class="w-6">Agregar</button>
            </div>

        </div>

        @if ($modal)
            @include('livewire.backend.testimonios-form')
        @endif

        <table class="table-auto w-full">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="cursor-pointer px-4 py-2" wire:click="order('id')">
                        <div class="flex">ID
                            {{-- -- Ordenar -- --}}
                            @if ($sort == 'id')
                                @if ($order == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1 ml-2"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1 ml-2"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1 ml-2"></i>
                            @endif
                        </div>
                    </th>
                    <th class="px-4 py-2">Imagen</th>
                    <th class="flex cursor-pointer px-4 py-2" wire:click="order('cliente')">
                        <div class="flex">Cliente
                            {{-- -- Ordenar -- --}}
                            @if ($sort == 'cliente')
                                @if ($order == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1 ml-2"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1 ml-2"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1 ml-2"></i>
                            @endif
                        </div>
                    </th>
                    <th class="cursor-pointer px-4 py-2" wire:click="order('testimonio')">
                        <div class="flex">Testimonio
                            {{-- -- Ordenar -- --}}
                            @if ($sort == 'testimonio')
                                @if ($order == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1 ml-2"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1 ml-2"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1 ml-2"></i>
                            @endif
                        </div>
                    </th>
                    <th class="cursor-pointer px-4 py-2" wire:click="order('estado')">
                        <div class="flex">
                            Estado
                            {{-- -- Ordenar -- --}}
                            @if ($sort == 'estado')
                                @if ($order == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1 ml-2"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1 ml-2"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1 ml-2"></i>
                            @endif
                        </div>
                    </th>
                    <th class="px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($testimonios as $item)
                    <tr>
                        <td class="border px-4 py-2">{{ $item->id }}</td>
                        <td class="border px-4 py-2">
                            <div class="flex-shrink-0 h-10 w-10">
                                <img class="h-10 w-10 rounded-full"
                                    src="{{ asset('storage/testimonio/' . $item->imagen) }}" alt="">
                            </div>
                        </td>
                        <td class="border px-4 py-2">{{ $item->cliente }}</td>
                        <td class="border px-4 py-2">{{ $item->testimonio }}</td>
                        <td class="border px-4 py-2 text-center">
                            <livewire:toggle-button :model="$item" field="estado" key="{{ $item->id }}" />
                        </td>

                        <td class="border px-4 py-2 text-right">
                            <button wire:click="editar({{ $item->id }})" class="w-5 hover:scale-125"
                                title="Editar"><img src="{{ asset('./img/edit.svg') }}" alt="editar"></button>

                            <button wire:click="$emit('alertDelete',{{ $item->id }})"
                                class="w-5 hover:scale-125"><img src="{{ asset('./img/trash.svg') }}" alt="borrar"
                                    title="Eliminar"></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="py-2">
            {{ $testimonios->links() }}
        </div>

    </div>
</div>
