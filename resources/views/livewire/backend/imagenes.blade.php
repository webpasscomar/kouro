<x-slot name="header">
    <h4 class="text-gray-900">Gestión de Imagenes</h4>
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
                        class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 my-3">+
                        Nuevo imagen</button>
                </div>
                <div class="py-3">
                    <x-jet-input type="text" placeholder="Texto a buscar" wire:model="search" class="w-full" />
                </div>
            </div>

            @if ($modal)
                @include('livewire.backend.imagenes-form')
            @endif

            {{-- The best athlete wants his opponent at his best. --}}


            <table class="table-auto w-full">
                <thead>
                    <tr class="bg-indigo-600 text-white">
                        <th class="cursor-pointer px-4 py-2" wire:click="order('id')">ID</th>
                        <th class="cursor-pointer px-4 py-2" wire:click="order('titulo')">Titulo</th>
                        <th class="px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($imagenes as $imagen)
                        <tr>
                            <td class="border px-4 py-2">{{ $imagen->id }}</td>
                            <td class="border px-4 py-2">{{ $imagen->titulo }}</td>
                            <td class="border px-4 py-2 text-center">
                                <button wire:click="editar({{ $imagen->id }})"
                                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4">Editar</button>
                                <button wire:click="borrar({{ $imagen->id }})"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4">Borrar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="py-3">

                {{ $imagenes->links() }}

            </div>





        </div>
    </div>
</div>
