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

                    <div class="mb-4">
                        <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                        <input type="text"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="nombre" wire:model="nombre">
                        <x-jet-input-error for="nombre" />
                    </div>

                    <div class="mb-4">
                        <label for="url" class="block text-gray-700 text-sm font-bold mb-2">URL:</label>
                        <input type="text"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="url" wire:model="url">
                        <x-jet-input-error for="url" />
                    </div>

                    <div class="mb-4">
                        <label for="correo" class="block text-gray-700 text-sm font-bold mb-2">Correo:</label>
                        <input type="text"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="correo" wire:model="correo">
                        <x-jet-input-error for="correo" />
                    </div>

                    <div class="mb-4">
                        <label for="razonSocial" class="block text-gray-700 text-sm font-bold mb-2">Razón
                            Social:</label>
                        <input type="text"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="razonSocial" wire:model="razonSocial">
                        <x-jet-input-error for="razonSocial" />
                    </div>










                    <div class="mb-4 col-span-2">
                        <label for="direccion" class="block text-gray-700 text-sm font-bold mb-2">Dirección:</label>
                        <input type="text"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="direccion" wire:model="direccion">
                        <x-jet-input-error for="direccion" />
                    </div>

                    <div class="mb-4">
                        <label for="codigoPostal" class="block text-gray-700 text-sm font-bold mb-2">Código
                            Postal:</label>
                        <input type="text"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="codigoPostal" wire:model="codigoPostal">
                        <x-jet-input-error for="codigoPostal" />
                    </div>



                    <div class="mb-4">
                        <label for="googleMap" class="block text-gray-700 text-sm font-bold mb-2">Google Map
                            con:</label>
                        <input type="text"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="googleMap" wire:model="googleMap">
                        <x-jet-input-error for="googleMap" />
                    </div>

                    <div class="mb-4">
                        <label for="googleAnalytics" class="block text-gray-700 text-sm font-bold mb-2">Google Analytics
                            con:</label>
                        <input type="text"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="googleAnalytics" wire:model="googleAnalytics">
                        <x-jet-input-error for="googleAnalytics" />
                    </div>

                    <div class="mb-4">
                        <label for="icon" class="block text-gray-700 text-sm font-bold mb-2">Icono
                            con:</label>
                        <input type="text"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="icon" wire:model="icon">
                        <x-jet-input-error for="icon" />
                    </div>

                    <div class="mb-4">
                        <label for="qr" class="block text-gray-700 text-sm font-bold mb-2">QR
                            con:</label>
                        <input type="text"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="qr" wire:model="qr">
                        <x-jet-input-error for="qr" />
                    </div>

                    <div class="mb-4">
                        <label for="instagram" class="block text-gray-700 text-sm font-bold mb-2">instagram
                            con:</label>
                        <input type="text"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="instagram" wire:model="instagram">
                        <x-jet-input-error for="instagram" />
                    </div>

                    <div class="mb-4">
                        <label for="facebook" class="block text-gray-700 text-sm font-bold mb-2">facebook
                            con:</label>
                        <input type="text"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="facebook" wire:model="facebook">
                        <x-jet-input-error for="facebook" />
                    </div>

                    <div class="mb-4">
                        <label for="twitter" class="block text-gray-700 text-sm font-bold mb-2">twitter
                            con:</label>
                        <input type="text"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="twitter" wire:model="twitter">
                        <x-jet-input-error for="twitter" />
                    </div>

                    <div class="mb-4">
                        <label for="linkedin" class="block text-gray-700 text-sm font-bold mb-2">linkedin
                            con:</label>
                        <input type="text"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="linkedin" wire:model="linkedin">
                        <x-jet-input-error for="linkedin" />
                    </div>

                    <div class="mb-4">
                        <label for="youtube" class="block text-gray-700 text-sm font-bold mb-2">youtube
                            con:</label>
                        <input type="text"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="youtube" wire:model="youtube">
                        <x-jet-input-error for="youtube" />
                    </div>

                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">

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
