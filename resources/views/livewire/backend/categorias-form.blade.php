<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">

            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4 grid grid-cols-1 sm:grid-cols-2 gap-2">


                    <div class="mb-3 col-span-2">
                        <label for="categoriaPadre_id" class="block text-gray-700 text-sm font-bold mb-2">Categoría
                            padre:</label>
                        <select
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            wire:model="categoriaPadre_id">

                            @forelse ($categoriasAnt as $item)
                                <option value="{{ $item->id }}">{{ $item->categoria }}</option>
                            @empty
                                <option value="1">Sin categoría padre</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="categoria" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                        <input type="text"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="categoria" wire:model="categoria">

                        <x-jet-input-error for="categoria" />
                    </div>

                    <div class="mb-3">
                        <label for="slug" class="block text-gray-700 text-sm font-bold mb-2">Slug:</label>
                        <input type="text"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="slug" wire:model="slug">
                    </div>
                    <div class="mb-3 col-span-2">
                        <label for="descripcion" class="block text-gray-700 text-sm font-bold mb-2">Descripción:</label>
                        <textarea rows="2"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="descripcion" wire:model="descripcion"></textarea>
                    </div>

                    <div class="mb-3">
                        <span class="block">.</span>
                        <input type="checkbox" class="default:ring-2 p-4" id="menu" wire:model="menu" />
                        <label for="menu" class=" text-gray-700 text-sm font-bold mb-2">Va en menú
                            principal:</label>
                    </div>

                    <div class="mb-3">
                        <label for="orden" class="block text-gray-700 text-sm font-bold mb-2">Orden interno:</label>
                        <input type="number"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="orden" wire:model="orden">
                    </div>


                    <div class="mb-3 col-span-2">
                        <label for="imagen" class="block text-gray-700 text-sm font-bold mb-2">Imagen:</label>
                        <input type="file" id="imagen" wire:model="imagen" wire:change="cambioImagen">
                        <x-jet-input-error for="imagen" />
                    </div>


                    <div class="mb-3">
                        @if ($cambioImg)
                            @if (gettype($imagen) === 'object')
                                <img class="h-20 w-20" src="{{ $imagen->temporaryUrl() }}">
                            @endif
                        @else
                            @if ($accion === 'editar')
                                <img class="h-20 w-20" src="{{ asset('storage/categorias/' . $imagen) }}"
                                    alt="">
                            @endif
                        @endif
                    </div>


                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse col-span-2">
                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                            <button wire:click.prevent="guardar()" type="button"
                                class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-purple-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-purple-800 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">Guardar</button>
                        </span>

                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                            <button wire:click="cerrarModal()" type="button"
                                class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-gray-200 text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">Cancelar</button>
                        </span>
                    </div>

                </div>
            </form>


        </div>


    </div>
</div>
