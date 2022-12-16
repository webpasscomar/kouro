<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
  <div class="flex justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

    <div class="fixed inset-0 transition-opacity">
      <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>

    <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>

    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">

      <form>
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">


          <div class="mb-4 w-50">
            <label for="categoriaPadre_id" class="block text-gray-700 text-sm font-bold mb-2">Categoria padre:</label>
            <input type="text" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="categoriaPadre_id" wire:model="categoriaPadre_id">
          </div>

          <div class="mb-4 w-50">
            <label for="idioma_id" class="block text-gray-700 text-sm font-bold mb-2">idioma_id:</label>
            <input type="text" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="idioma_id" wire:model="idioma_id">
          </div>

          <div class="mb-4">
            <label for="categoria" class="block text-gray-700 text-sm font-bold mb-2">categoria:</label>
            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="categoria" wire:model="categoria">

            <x-jet-input-error for="categoria" />
          </div>

          <div class="mb-4">
            <label for="slug" class="block text-gray-700 text-sm font-bold mb-2">slug:</label>
            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="slug" wire:model="slug">
          </div>

          <div class="mb-4">
            <label for="descripcion" class="block text-gray-700 text-sm font-bold mb-2">Descripcion:</label>
            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="descripcion" wire:model="descripcion">
          </div>

          <div class="mb-4">
            <label for="menu" class="block text-gray-700 text-sm font-bold mb-2">menu:</label>
            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="menu" wire:model="menu">
          </div>

          <div class="mb-4">
            <label for="orden" class="block text-gray-700 text-sm font-bold mb-2">orden:</label>
            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="orden" wire:model="orden">
          </div>

          <div class="mb-4">
            <label for="modulo_id" class="block text-gray-700 text-sm font-bold mb-2">Pertenece al Módulo:</label>
            <!-- <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="modulo_id" wire:model="modulo_id"> -->

            <select id="modulo_id" name="modulo_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" wire:model="modulo_id">
              <option value="0">-- Seleccione un módulo --</option>
              <option value="1">Blog</option>
              <option value="2">Contacto</option>
              <option value="3">Productos</option>
              <option value="4">Publicaciones</option>
            </select>

            <x-jet-input-error for="categoria" />
          </div>

          <div class="mb-4">
            <label for="imagen" class="block text-gray-700 text-sm font-bold mb-2">imagen:</label>
            <input type="file" id="imagen" wire:model="imagen">
            <!-- <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="imagen" wire:model="imagen"> -->
          </div>

          <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
              <button wire:click.prevent="guardar()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-purple-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-purple-800 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">Guardar</button>
            </span>

            <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
              <button wire:click="cerrarModal()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-gray-200 text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">Cancelar</button>
            </span>
          </div>

        </div>
      </form>


    </div>


  </div>
</div>