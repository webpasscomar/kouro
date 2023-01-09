<x-slot name="header">
    <h1 class="text-gray-900"><a href="{{ route('dashboard') }}">Dashboard</a> | Gestión de Parámetros</h1>
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
                        Nueva Pregunta frecuente</button>
                </div>
                <div class="py-3">
                    <x-jet-input type="text" placeholder="Texto a buscar" wire:model="search" class="w-full" />
                </div>
            </div>

            @if ($modal)
                @include('livewire.backend.faqs-form')
            @endif

            <table class="table-auto w-full">
                <thead>
                    <tr class="bg-indigo-600 text-white">
                        <th class="cursor-pointer px-4 py-2" wire:click="order('id')">ID</th>
                        <th class="cursor-pointer px-4 py-2" wire:click="order('pregunta')">Pregunta</th>
                        <th class="cursor-pointer px-4 py-2" wire:click="order('respuesta')">Respuesta</th>
                        <th class="cursor-pointer px-4 py-2" wire:click="order('estado')">Estado</th>
                        <th class="px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($faqs as $item)
                        <tr>
                            <td class="border px-4 py-2">{{ $item->id }}</td>
                            <td class="border px-4 py-2">{{ $item->pregunta }}</td>
                            <td class="border px-4 py-2">{{ $item->respuesta }}</td>
                            <td class="border px-4 py-2">
                                @if ($item->estado === 1)
                                    <span class="text-green-500">Activo</span>
                                @else
                                    <span class="text-red-500">Inactivo</span>
                                @endif
                                {{-- @livewire('toggle-button', [
                                    'model' => $item,
                                    'field' => 'estado',
                                ]) --}}
                            </td>

                            <td class="border px-4 py-2 text-center">
                                <button wire:click="editar({{ $item->id }})"
                                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4">Editar</button>
                                <button wire:click="borrar({{ $item->id }})"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4">Borrar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $faqs->links() }}

        </div>
    </div>
</div>
