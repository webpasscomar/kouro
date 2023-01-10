<x-slot name="header">
    <h1 class="text-gray-900"><a href="{{ route('dashboard') }}">Dashboard</a> | Gestión de testimonios</h1>
    <h2>A borrar: {{ $aborrar }}</h2>
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
                        Nuevo testimonio</button>
                </div>
                <div class="py-3">
                    <x-jet-input type="text" placeholder="Texto a buscar" wire:model="search" class="w-full" />
                </div>
            </div>

            @if ($modal)
                @include('livewire.backend.testimonios-form')
            @endif

            <table class="table-auto w-full">
                <thead>
                    <tr class="bg-indigo-600 text-white">
                        <th class="cursor-pointer px-4 py-2" wire:click="order('id')">ID</th>
                        <th class="px-4 py-2">Imagen</th>
                        <th class="cursor-pointer px-4 py-2" wire:click="order('cliente')">Cliente</th>
                        <th class="cursor-pointer px-4 py-2" wire:click="order('testimonio')">Testimonio</th>
                        <th class="cursor-pointer px-4 py-2" wire:click="order('estado')">Estado</th>
                        <th class="px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($testimonios as $item)
                        <tr>
                            <td class="border px-4 py-2">{{ $item->id }}</td>
                            <td class="border px-4 py-2">
                                <div class="flex-shrink-0 h-10 w-10">
                                    {{-- <img class="h-10 w-10 rounded-full"
                                        src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                        alt=""> --}}
                                    <img class="h-10 w-10 rounded-full"
                                        src="{{ asset('storage/testimonio/' . $item->imagen) }}" alt="">
                                </div>
                            </td>
                            <td class="border px-4 py-2">{{ $item->cliente }}</td>
                            <td class="border px-4 py-2">{{ $item->testimonio }}</td>
                            <td class="border px-4 py-2">
                                @livewire(
                                    'toggle-button',
                                    [
                                        'model' => $item,
                                        'field' => 'estado',
                                    ],
                                    key($item->id)
                                )
                            </td>

                            <td class="border px-4 py-2 text-center">
                                <button wire:click="editar({{ $item->id }})"
                                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4">Editar</button>
                                <button wire:click="$emit('alertDelete',{{ $item->id }})"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4">Borrar</button>
                                <a href=""><i class="fas fa-edit"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $testimonios->links() }}

        </div>
    </div>
</div>
