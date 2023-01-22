<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">



        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">

            <form>

                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4 grid grid-cols-1 sm:grid-cols-3 gap-2">

                    <div class="mb-4 col-span-3" wire:loading wire:target="imagen">
                        <x-alert type='warning' title='Imagen subiendo'></x-alert>
                    </div>


                    <div class="mb-4 col-span-3">
                        <label for="cliente" class="block text-gray-700 text-sm font-bold mb-2">Cliente:</label>
                        <input type="text"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="cliente" wire:model="cliente">
                        <x-jet-input-error for="cliente" />
                    </div>

                    <div class="mb-4 col-span-3">
                        <label for="testimonio" class="block text-gray-700 text-sm font-bold mb-2">Testimonio:</label>
                        <input type="text"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="testimonio" wire:model="testimonio">
                        <x-jet-input-error for="testimonio" />
                    </div>

                    <div class="mb-3">
                        @if ($cambioImg)
                            @if (gettype($imagen) === 'object')
                                <img src="{{ $imagen->temporaryUrl() }}">
                            @endif
                        @else
                            @if ($accion === 'editar')
                                <img class="h-20 w-20" src="{{ asset('storage/testimonio/' . $imagen) }}"
                                    alt="">
                            @endif
                        @endif
                    </div>

                    <div class="mb-3 col-span-2">
                        <label for="imagen" class="block text-gray-700 text-sm font-bold mb-2">Imagen:</label>
                        <input type="file" id="imagen" wire:change="cambioImagen" wire:model="imagen">
                        <x-jet-input-error for="imagen" />
                    </div>


                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse col-span-3 w-full">

                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                            <button wire:click.prevent="guardar()" wire:target="save, imagen" type="button"
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
