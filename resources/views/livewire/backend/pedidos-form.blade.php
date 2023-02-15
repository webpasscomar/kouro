

            <form>

                
                            <label for="id" class="block text-gray-700 text-sm font-bold mb-2">ID</label>
                            <input type="text"
                                class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="id" wire:model="id">
                                <x-jet-input-error for="id" />
                
                
                            <label for="fecha" class="block text-gray-700 text-sm font-bold mb-2">Fecha</label>
                            <input type="text"
                                class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="fecha" wire:model="fecha">
                                <x-jet-input-error for="fecha" />
                
                            <label for="entrega_id" class="block text-gray-700 text-sm font-bold mb-2">Forma de entrega</label>
                            <select
                                class="shadow appearance-none border rounded py-2 px-0 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                wire:model="entrega_id">
                                <option value="0">Selecciona Forma Entrega</option>
                                @foreach ($entregas as $p)
                                    <option value="{{ $p->id }}">{{ $p->nombre }}</option>
                                @endforeach
                            </select>
                            <x-jet-input-error for="entrega_id" />


                            <label for="apellido" class="block text-gray-700 text-sm font-bold mb-2">Apellido</label>
                            <input type="text"
                                class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="apellido" wire:model="apellido">
                                <x-jet-input-error for="apellido" />

                            <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre</label>
                            <input type="text"
                                class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="nombre" wire:model="nombre">
                                <x-jet-input-error for="nombre" />

                            <label for="del_calle" class="block text-gray-700 text-sm font-bold mb-2">Calle</label>
                            <input type="text"
                                class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="del_calle" wire:model="del_calle">
                                <x-jet-input-error for="del_calle" />

                            <label for="del_nro" class="block text-gray-700 text-sm font-bold mb-2">Numero</label>
                            <input type="text"
                                class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="del_nro" wire:model="del_nro">
                                <x-jet-input-error for="del_nro" />

                            <label for="del_piso" class="block text-gray-700 text-sm font-bold mb-2">Piso</label>
                            <input type="text"
                                class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="del_piso" wire:model="del_piso">
                                <x-jet-input-error for="del_piso" />

                            <label for="del_dpto" class="block text-gray-700 text-sm font-bold mb-2">Dpto.</label>
                            <input type="text"
                                class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="del_dpto" wire:model="del_dpto">
                                <x-jet-input-error for="del_dpto" />



                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse col-span-3">
                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                            <button wire:click.prevent="guardar()" type="button"
                                class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-purple-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-purple-800 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">Guardar</button>
                        </span>

                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                            <button wire:click="cerrarModal()" type="button"
                                class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-gray-200 text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">Cancelar</button>
                        </span>
            </form>

