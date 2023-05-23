<div class="fixed z-5 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>


        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">

            <h2 class="p-2">Ingreso de Imagenes</h2>
            <form enctype="multipart/form-data">   {{--wire:submit.prevent="saveImagen" enctype="multipart/form-data" --}}
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4 grid grid-cols-1 sm:grid-cols-2 gap-2">


                    <div class="mb-3">
                        <label for="presentacion_id" class="block text-gray-700 text-sm font-bold mb-2">Color:</label>
                        <select
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            wire:model="color_id">
                            <option value="0">Elija un color</option>
                            @foreach ($colores as $color)
                                <option value="{{ $color->id }}">{{ $color->color }}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="color_id" />

                    </div>


                    <div class="mb-3 col-span-2">
                        <label for="imagen" class="block text-gray-700 text-sm font-bold mb-2">Imagen:</label>
                        <input type="file" id="imagen" wire:model="imagen" >
                        <x-jet-input-error for="imagen" />
                        @if($imagen)
                            <h3>Visualizacion d Imagen</h3>
                            @if($imagen->extension()=='png' || $imagen->extension()=='jpg' || $imagen->extension()=='jpeg')
                                 <img src="{{$imagen->temporaryUrl()}}" width="150" heigth="150">
                            @endif

                        @endif


                    </div>

                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse col-span-2">
                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                            @if($imagen)
                                <button wire:click.prevent="saveImagen" type="button"
                                class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-purple-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-purple-800 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">Guardar</button>
                            @endif

                        </span>
                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                <button wire:click.prevent="notsaveImagen" type="button"
                                class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-gray-200 text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">Cancelar</button>
                        </span>
                    </div>

                </div>
            </form>


        </div>


    </div>
</div>
