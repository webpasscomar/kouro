<div class="fixed z-50 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle lg:max-w-5xl md:max-w-2xl sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">

            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4 grid grid-cols-1 sm:grid-cols-6 gap-2">


                    <div class="mb-2 col-span-3">
                        <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                        <input type="text"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="nombre" wire:model="nombre">
                        <x-jet-input-error for="nombre" />
                    </div>


                    <div class="mb-2 col-span-3">
                        <label for="desCorta" class="block text-gray-700 text-sm font-bold mb-2">Descripción
                            Corta:</label>
                        <input type="text"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="desCorta" wire:model="desCorta">
                        <x-jet-input-error for="desCorta" />
                    </div>

                    <div class="mb-2  col-span-2">
                        <label for="categorias" class="block text-gray-700 text-sm font-bold mb-2">Categorias:</label>
                        <select
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            wire:model="categoriasSeleccionadas" multiple>
                            <option class="text-gray-400" value="0">Elija una presentacion</option>
                            @foreach ($categorias as $categoria)
                                <option class="mt-1" value="{{ $categoria->id }}">
                                    {{ $categoria['categoria'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="mb-2 col-span-4">
                        <label for="descLarga" class="block text-gray-700 text-sm font-bold mb-2">Descripción
                            larga:</label>
                        <textarea rows="5"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="descLarga" wire:model="descLarga"></textarea>
                        <x-jet-input-error for="descLarga" />
                    </div>

                    {{-- Segunda linea --}}

                    <div class="mb-2">
                        <label for="codigo" class="block text-gray-700 text-sm font-bold mb-2">Código:</label>
                        <input type="text"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="codigo" wire:model="codigo">
                        <x-jet-input-error for="codigo" />
                    </div>

                    <div class="mb-2">
                        <label for="presentacion_id"
                            class="block text-gray-700 text-sm font-bold mb-2">Presentacion:</label>
                        <select
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            wire:model="presentacion_id">
                            <option value="0">Elija una presentacion</option>
                            @foreach ($presentaciones as $item)
                                <option value="{{ $item->id }}">{{ $item->presentacion }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-2">
                        <label for="precioLista" class="block text-gray-700 text-sm font-bold mb-2">Precio
                            Lista:</label>
                        <input type="text"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="precioLista" wire:model="precioLista">
                        <x-jet-input-error for="precioLista" />
                    </div>


                    {{-- Tercera linea --}}

                    <div class="mb-2">
                        <label for="ofertaDesde" class="block text-gray-700 text-sm font-bold mb-2">En oferta
                            desde:</label>
                        <input type="date"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="ofertaDesde" wire:model="ofertaDesde">
                        <x-jet-input-error for="ofertaDesde" />
                    </div>

                    <div class="mb-2">
                        <label for="precioOferta" class="block text-gray-700 text-sm font-bold mb-2">Precio
                            oferta:</label>
                        <input type="text"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="precioOferta" wire:model="precioOferta">
                        <x-jet-input-error for="precioOferta" />
                    </div>

                    <div class="mb-2">
                        <label for="ofertaHasta" class="block text-gray-700 text-sm font-bold mb-2">Oferta
                            hasta:</label>
                        <input type="date"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="ofertaHasta" wire:model="ofertaHasta">
                        <x-jet-input-error for="ofertaHasta" />
                    </div>

                    {{-- Cuarta linea --}}

                    <div class="mb-2">
                        <label for="peso" class="block text-gray-700 text-sm font-bold mb-2">Peso:</label>
                        <input type="text"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="peso" wire:model="peso">
                        <x-jet-input-error for="peso" />
                    </div>

                    <div class="mb-2">
                        <label for="tamano" class="block text-gray-700 text-sm font-bold mb-2">Tamaño:</label>
                        <input type="text"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="tamano" wire:model="tamano">
                        <x-jet-input-error for="tamano" />
                    </div>

                    <div class="mb-2">
                        <label for="link" class="block text-gray-700 text-sm font-bold mb-2">Link:</label>
                        <input type="text"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="link" wire:model="link">
                        <x-jet-input-error for="link" />
                    </div>

                    {{-- Quinta linea --}}

                    <div class="mb-2">
                        <label for="orden" class="block text-gray-700 text-sm font-bold mb-2">Orden
                            interno:</label>
                        <input type="number"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="orden" wire:model="orden">
                        <x-jet-input-error for="orden" />
                    </div>

                    <div class="mb-2">
                        <label for="unidadVenta" class="block text-gray-700 text-sm font-bold mb-2">Unidad de
                            venta:</label>
                        <input type="text"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="unidadVenta" wire:model="unidadVenta">
                        <x-jet-input-error for="unidadVenta" />
                    </div>

                    <div class="mb-2">
                        <label for="destacar" class="block text-gray-700 text-sm font-bold mb-2">Destacado:</label>
                        <select
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            wire:model="destacar">
                            <option value="0">No</option>
                            <option value="1">Si</option>
                        </select>
                        <x-jet-input-error for="destacar" />
                    </div>

                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse col-span-6">
                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                            <button wire:click.prevent="guardar()" type="button"
                                class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-purple-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-purple-800 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">Guardar</button>
                        </span>

                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                            <button wire:click="cerrarModal(1)" type="button"
                                class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-gray-200 text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">Cancelar</button>
                        </span>
                    </div>

                </div>
            </form>

        </div>


    </div>
</div>
