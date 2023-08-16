<x-slot name="header">
    <h4 class="text-gray-900"><a href="{{ route('dashboard') }}">Dashboard</a> | Gestión de Productos</h4>
</x-slot>


<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">


            @if (session()->has('message'))
                <div class="bg-teal-100 rounded-b text-teal-900 px-4 py-4 shadow-md my-3" role="alert">
                    <div class="flex">
                        <div>
                            <h4>{{ session('message') }}</h4>
                        </div>
                    </div>
                </div>
            @endif


            <div class="grid grid-cols-1 sm:grid-cols-3">
                <div>
                    <button wire:click="crear()"
                        class="font-bold bg-gray-100 p-2 rounded-md shadow shadow-gray-500 flex items-center text-gray-500 gap-x-1 hover:bg-gray-300 hover:translate-x-1 hover:translate-y-1 hover:shadow-none">
                        <img src="{{ asset('./img/add.svg') }}" alt="agregar producto" class="w-6">Nuevo</button>
                </div>
                <div class="py-3">
                    <x-jet-input type="text" placeholder="Texto a buscar" wire:model="search" class="w-full" />
                </div>
            </div>


            @if ($modal)
                @include('livewire.backend.productos-form')
            @endif

            @if ($modal2)
                @include('livewire.backend.productos-imagenes')
                {{-- @include('livewire.backend.modal-large') --}}
            @endif

            @if ($modal3)
                @include('livewire.backend.productos-imagenes-form')
            @endif


            @if ($modal4)
                @include('livewire.backend.productos-categorias')
            @endif


            @if ($modal5)
                @include('livewire.backend.productos-categorias-form')
            @endif

            {{-- Tabla para agregar productos --}}
            <table class="table-auto w-full mt-6">
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="cursor-pointer px-4 py-2" wire:click="order('id')">COD
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
                        <th class="cursor-pointer px-4 py-2" wire:click="order('desCorta')">Detalle
                            {{-- -- Ordenar -- --}}
                            @if ($sort == 'desCorta')
                                @if ($order == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th class="cursor-pointer px-4 py-2" wire:click="order('precioLista')">Precio Lista
                            {{-- -- Ordenar -- --}}
                            @if ($sort == 'precioLista')
                                @if ($order == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th class="cursor-pointer px-4 py-2" wire:click="order('estado')">Estado</th>
                        <th class="px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $item)
                        <tr>
                            <td class="border px-4 py-2">{{ $item->codigo }}</td>
                            <td class="border px-4 py-2">{{ $item->nombre }}</td>
                            <td class="border px-4 py-2">{{ $item->desCorta }}</td>
                            <td class="border px-4 py-2 text-right w-36">{{ number_format($item->precioLista, 2) }}</td>
                            <td class="border px-4 py-2 text-center">
                                <livewire:toggle-button :model="$item" field="estado" key="{{ $item->id }}" />
                            </td>
                            <td class="border px-4 py-2">
                                <div class="flex justify-center items-center gap-x-3">
                                    <button wire:click="editar({{ $item->id }})" class="w-5 hover:scale-125"
                                        title="Editar"><img src="{{ asset('./img/edit.svg') }}" alt="editar"></button>
                                    <button wire:click="imagenes({{ $item->id }})" class="w-5 hover:scale-125"
                                        title="Imágenes"><img src="{{ asset('./img/photo.svg') }}"
                                            alt="imagenes"></button>
                                    <button wire:click="categorias({{ $item->id }})"
                                        class="w-5 hover:scale-125"><img src="{{ asset('./img/category.svg') }}"
                                            alt="categorias" title="categorias"></button>
                                    <button wire:click="borrar({{ $item->id }})" class="w-5 hover:scale-125"><img
                                            src="{{ asset('./img/trash.svg') }}" alt="borrar"
                                            title="Eliminar"></button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="py-3">

                {{ $productos->links() }}

            </div>
        </div>
    </div>
</div>
