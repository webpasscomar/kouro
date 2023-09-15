<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex justify-center min-h-screen pt-4 px-4 pb-20 text-center w-full">

        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>

        <div class="inline-block self-center h-96 bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">


            <div class="py-3 px-4">
                <div class="max-w-7xl mx-auto sm:px-2 lg:px-8">
                    <div class="bg-white overflow-hidden sm:rounded-lg px-2 py-4">

                        <h2 class="text-black font-bold flex justify-center">{{ $producto_nombre }}</h2>

                        <div class="grid grid-cols-1 sm:grid-cols-3 mt-5">
                            <div class="col-span-3">
                                {{-- <button wire:click="addCategoria"
                                    class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 my-3">+
                                    Nueva categoria</button> --}}
                                <button wire:click="addCategoria"
                                    class="font-bold bg-gray-100 p-1 w-28 rounded-md shadow shadow-gray-500 flex items-center text-gray-500 gap-x-1 hover:bg-gray-300 hover:translate-x-1 hover:translate-y-1 hover:shadow-none py-2 px-4 my-3">
                                    <img src="{{ asset('./img/add.svg') }}" alt="agregar producto"
                                        class="w-4">Agregar</button>
                            </div>
                            {{-- <div class="py-3">
                                <x-jet-input type="text" placeholder="Texto a buscar" wire:model="search"
                                    class="w-full" />
                            </div> --}}
                        </div>



                        <table class="table-auto w-full mt-5">
                            <thead>
                                <tr class="bg-gray-200 text-gray-700">
                                    <th class="cursor-pointer px-4 py-2" wire:click="order('id')">Id</th>
                                    <th class="cursor-pointer px-4 py-2" wire:click="order('categoria')">Categoria</th>
                                    <th class="px-4 py-2">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($productos_categorias)
                                    @foreach ($productos_categorias as $prodcat)
                                        <tr>
                                            <td class="border px-4 py-2">{{ $prodcat->id }}</td>
                                            <td class="border px-4 py-2">{{ $prodcat->categoria }}</td>
                                            <td class="border px-4 py-2 text-center">
                                                {{-- <button wire:click="deleteCategoria({{ $prodcat->id }})"
                                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4">Borrar</button> --}}
                                                <button wire:click="deleteCategoria({{ $prodcat->id }})" class="w-5"
                                                    title="Eliminar"><img src="{{ asset('/img/trash.svg') }}"
                                                        alt="Eliminar categoria"></button>
                                            </td>
                                        </tr>
                                    @endforeach
                            </tbody>
                            @endif
                        </table>

                        <div class="py-3">

                            {{-- {{ $imagenes->links() }} --}}

                        </div>


                    </div>
                </div>
            </div>

            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse col-span-2">
                <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                    <button wire:click="cerrarModal(4)" type="button"
                        class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-gray-200 text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">Cerrar</button>
                </span>
            </div>

        </div>


    </div>
</div>
