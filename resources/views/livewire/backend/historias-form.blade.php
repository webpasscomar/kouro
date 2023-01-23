<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex justify-center min-h-screen pt-4 px-6 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75">
            </div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">

            <table class="table-auto w-full">
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="px-4 py-2">Fecha</th>
                        <th class="px-4 py-2">Descripcion</th>
                        <th class="px-4 py-2">Cantidad</th>
                        <th class="px-4 py-2">Usuario</th>
                        <th class="px-4 py-2">Pedido</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detalle as $item)
                        <tr>
                            <td class="border px-4 py-2">{{ $item->fecha }}</td>
                            <td class="border px-4 py-2">{{ $item->descripcion }}</td>
                            <td class="border px-4 py-2">{{ $item->cantidad }}</td>
                            <td class="border px-4 py-2">{{ $item->name }}</td>
                            <td class="border px-4 py-2">{{ $item->pedido_id }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                <button wire:click="cerrarModal()" type="button"
                    class="inline-flex justify-center  rounded-md border border-gray-300 px-4 py-2 bg-gray-200 text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">Cerrar</button>
            </span>

        </div>


    </div>
</div>

