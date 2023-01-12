<x-slot name="header">
    <h1 class="text-gray-900"><a href="{{ route('dashboard') }}">Dashboard</a> | Gestión de Categorías</h1>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

            <div class="grid grid-cols-1 sm:grid-cols-3">
                <div>
                    <button wire:click="crear()"
                        class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 my-3">+
                        Nueva categoría</button>
                </div>
                <div class="py-3">
                    <x-jet-input type="text" placeholder="Texto a buscar" wire:model="search" class="w-full" />
                </div>
            </div>

            @if ($modal)
                @include('livewire.backend.categorias-form')
            @endif


            <table class="table-auto w-full">
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="cursor-pointer px-4 py-2" wire:click="order('id')">Id
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
                        <th class="cursor-pointer px-4 py-2">Imagen</th>
                        <th class="cursor-pointer px-4 py-2" wire:click="order('categoriaPadre_id')">Padre
                            {{-- -- Ordenar -- --}}
                            @if ($sort == 'categoriaPadre_id')
                                @if ($order == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th class="cursor-pointer px-4 py-2" wire:click="order('categoria')">Nombre
                            {{-- -- Ordenar -- --}}
                            @if ($sort == 'categoria')
                                @if ($order == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th class="cursor-pointer px-4 py-2" wire:click="order('slug')">Slug
                            {{-- -- Ordenar -- --}}
                            @if ($sort == 'categoria')
                                @if ($order == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        {{-- <th class="cursor-pointer px-4 py-2" wire:click="order('descripcion')">Descripción
                            {{-- -- Ordenar -- --}}
                        @if ($sort == 'descripcion')
                            @if ($order == 'asc')
                                <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                            @else
                                <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                            @endif
                        @else
                            <i class="fas fa-sort float-right mt-1"></i>
                        @endif
                        </th> --}}
                        <th class="cursor-pointer px-4 py-2" wire:click="order('orden')">Orden
                            {{-- -- Ordenar -- --}}
                            @if ($sort == 'orden')
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
                    @foreach ($categorias as $categoria)
                        <tr>
                            <td class="border px-4 py-2">{{ $categoria->id }}</td>
                            <td class="border px-4 py-2">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-full"
                                        src="{{ asset('storage/categorias/' . $categoria->imagen) }}" alt="">
                                </div>
                            </td>
                            <td class="border px-4 py-2">{{ $categoria->categoriaPadre_id }}</td>
                            <td class="border px-4 py-2">{{ $categoria->categoria }}</td>
                            <td class="border px-4 py-2">{{ $categoria->slug }}</td>
                            {{-- <td class="border px-4 py-2">{{ $categoria->descripcion }}</td> --}}
                            <td class="border px-4 py-2">{{ $categoria->orden }}</td>
                            <td class="border px-4 py-2 text-center">
                                @livewire(
                                    'toggle-button',
                                    [
                                        'model' => $categoria,
                                        'field' => 'estado',
                                    ],
                                    key($categoria->id)
                                )
                            </td>
                            <td class="border px-4 py-2 text-center">
                                <button wire:click="editar({{ $categoria->id }})"
                                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4">Editar</button>
                                <button wire:click="$emit('alertDelete',{{ $categoria->id }})"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4">Borrar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


            {{ $categorias->links() }}


        </div>
    </div>
</div>
