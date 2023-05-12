<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex justify-center min-h-screen pt-4 px-4 pb-20 text-center w-full">

        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">


            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

                        <h2 class="text-black font-bold flex justify-center">{{$imagenes[0]->nombre}}</h2>

                        <div class="grid grid-cols-1 sm:grid-cols-3">
                            <div class="col-span-3">
                                <button wire:click="addImagen"
                                    class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 my-3">+
                                    Nueva imagen</button>
                            </div>
                            {{-- <div class="py-3">
                                <x-jet-input type="text" placeholder="Texto a buscar" wire:model="search"
                                    class="w-full" />
                            </div> --}}
                        </div>



                        <table class="table-auto w-full">
                            <thead>
                                <tr class="bg-gray-200 text-gray-700">
                                    <th class="cursor-pointer px-4 py-2" wire:click="order('id')">Id</th>
                                    <th class="cursor-pointer px-4 py-2" wire:click="order('color')">Color</th>
                                    <th class="cursor-pointer px-4 py-2" wire:click="order('file_name')">Archivo</th>
                                    <th class="cursor-pointer px-4 py-2" >Imagen</th>
                                    <th class="px-4 py-2">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($imagenes)
                                    @foreach ($imagenes as $img)
                                        <tr>
                                            <td class="border px-4 py-2">{{ $img->id }}</td>
                                            <td class="border px-4 py-2">{{ $img->color }}</td>
                                            <td class="border px-4 py-2">{{ $img->file_name }}</td>
                                            <td class="border px-4 py-2">
                                                <img src="{{asset($img->file_path)}}" width="150" heigth="150">
                                            </td>
                                            <td class="border px-4 py-2 text-center">
                                                <button wire:click="deleteImagen({{ $img->id }})"
                                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4">Borrar</button>
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
                    <button wire:click="cerrarModal(2)" type="button"
                        class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-gray-200 text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">Cerrar</button>
                </span>
            </div>

        </div>


    </div>
</div>
