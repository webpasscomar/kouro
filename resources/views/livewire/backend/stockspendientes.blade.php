    <div class="max-w-7xl mx-auto sm:px6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

            <!--            @if (session()->has('message'))
<div class="bg-teal-100 rounded-b text-teal-900 px-4 py-4 shadow-md my-3" role="alert">
                    <div class="flex">
                        <div>
                            <h4>{{ session('message') }}</h4>
                        </div>
                    </div>
                </div>
@endif
 -->
            <div class="grid grid-cols-1 sm:grid-cols-3">

                <div class="py-3 my-2">

                    <h4 class="text-xl text-gray-900 font-bold"><a href="{{ route('dashboard') }}"><i
                                class="fas fa-home"></i></a> - Pendientes de stock
                    </h4>
                </div>

                <div class="py-3">
                    <x-jet-input type="text" placeholder="Texto a buscar" wire:model="search" class="w-full" />
                </div>

                <div>
                    {{-- <button wire:click="crear()"
                        class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 my-3">+
                        Nuevo Pendiente</button> --}}
                </div>

            </div>

            @if ($modal)
                @include('livewire.backend.stockspendientes-form')
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
                        <th class="cursor-pointer px-2 py-2 box-border" wire:click="order('fechaSolicitud')">Solicitado
                            {{-- -- Ordenar -- --}}
                            @if ($sort == 'fechaSolicitud')
                                @if ($order == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th class="cursor-pointer px-2 py-2 box-border" wire:click="order('fechaRespuesta')">Respondido
                            {{-- -- Ordenar -- --}}
                            @if ($sort == 'fechaRespuesta')
                                @if ($order == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th class="cursor-pointer px-4 py-2" wire:click="order('fechaRespuesta')">E-Mail
                            {{-- -- Ordenar -- --}}
                            @if ($sort == 'email')
                                @if ($order == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th class="cursor-pointer px-4 py-2"">Respuesta</th>
                        <th class="cursor-pointer px-4 py-2" wire:click="order('nombre')">Producto
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
                        <th class="cursor-pointer -px-2 py-2 box-border" wire:click="order('talle')">Talle
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
                        <th class="px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stockspendientes as $pendientes)
                        <tr>
                            <td class="border px-4 py-2">{{ $pendientes->id }}</td>
                            <td class="border px-4 py-2">{{ $pendientes->fechaSolicitud }}</td>
                            <td class="border px-4 py-2">{{ $pendientes->fechaRespuesta }}</td>
                            <td class="border px-4 py-2">{{ $pendientes->email }}</td>
                            <td class="border px-4 py-2">{{ $pendientes->respuesta }}</td>
                            <td class="border px-4 py-2">{{ $pendientes->nombre }}</td>
                            <td class="border px-4 py-2">{{ $pendientes->color }}</td>
                            <td class="border px-4 py-2">{{ $pendientes->talle }}</td>

                            <td class="border py-2">
                                <div class="flex justify-around items-center">
                                    <button wire:click="editar({{ $pendientes->id }})" class="w-6"
                                        title="Respuesta"><img src="{{ asset('/img/comments.svg') }}"
                                            alt="respuesta"></button>
                                    <button wire:click="enviar({{ $pendientes->id }})" class="w-6"
                                        title="Enviar Mail"><img src="{{ asset('/img/mail-send.svg') }}"
                                            alt="Enviar mail">
                                    </button>
                                    <button wire:click="$emit('alertDelete',{{ $pendientes->id }})" class="w-5"
                                        title="Eliminar"><img src="{{ asset('/img/trash.svg') }}"
                                            alt="Eliminar"></button>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="py-3">

                {{ $stockspendientes->links() }}

            </div>

        </div>
    </div>
