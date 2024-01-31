<div class="max-w-7xl mx-auto sm:px6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
        {{-- <form> --}}

        <div class="grid grid-cols-1 sm:grid-cols-6 mb-2">

            <div class="py-3 my-2 col-span-5">

                <h4 class="text-xl text-gray-900 font-bold"><a href="{{ route('dashboard') }}"><i
                            class="fas fa-home"></i></a> - Movimientos
                </h4>
            </div>
        </div>

        <table class="table-auto w-full">
            <thead>
            <tr class="bg-gray-200 text-gray-700">
                <th class="cursor-pointer py-2 w-[16%]">Id</th>
                <th class="cursor-pointer py-2 w-[16%]">Producto</th>
                <th class="cursor-pointer py-2 w-[16%]">Color</th>
                <th class="cursor-pointer py-2 w-[16%]">Talle</th>
                <th class="cursor-pointer py-2 w-[16%]">Cantidad</th>
                <th class="py-2">Acciones</th>
            </tr>
            </thead>
            <tbody>

            @if ($movimientos)
                @for ($i = 0; $i < count($movimientos); $i++)
                    <tr>
                        <td class="border px-4 py-2">{{ $movimientos[$i]['producto_id'] }}</td>
                        <td class="border px-4 py-2">{{ $movimientos[$i]['producto_descripcion'] }}</td>
                        <td class="border px-4 py-2">{{ $movimientos[$i]['color'] }}</td>
                        <td class="border px-4 py-2">{{ $movimientos[$i]['talle'] }}</td>
                        <td class="border px-4 py-2">{{ $movimientos[$i]['cantidad'] }}</td>


                        <td class="border px-4 py-2 text-center">
                            <button wire:click="$emit('alertDelete',{{ $i }})" class="w-6"
                                    title="Eliminar"><img src="{{ asset('/img/trash.svg') }}" alt="eliminar">
                            </button>
                        </td>
                    </tr>
                @endfor
            @endif
            </tbody>
        </table>

        <div class="mb-5 grid grid-cols-1 md:grid-cols-6 mt-10 gap-4">
            <div class="">

                <select
                    class="shadow appearance-none border w-full rounded py-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    wire:model="tipomove_id">
                    <option value="0">Tipo de Movimiento</option>
                    @foreach ($tipomove as $t)
                        <option value="{{ $t->id }}">{{ $t->descripcion }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="tipomove_id"/>
            </div>

            <div class="">
                <select
                    class="shadow appearance-none border rounded py-2 w-full text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    wire:model="producto_id">
                    <option value="0">Producto</option>
                    @foreach ($productos as $p)
                        <option value="{{ $p->id }}">{{ $p->nombre }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="producto_id"/>
            </div>
            <div class="">
                <select
                    class="shadow appearance-none w-full py-2 border rounded text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    wire:model="color_id">
                    <option value="0">Color</option>
                    @foreach ($colores as $c)
                        <option value="{{ $c->id }}">{{ $c->color }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="color_id"/>
            </div>
            <div class="">

                <select
                    class="shadow appearance-none border w-full py-2 rounded text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    wire:model="talle_id">
                    <option value="0">Talle</option>
                    @foreach ($talles as $c)
                        <option value="{{ $c->id }}">{{ $c->talle }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="talle_id"/>
            </div>
            <div class="">

                <input type="text"
                       class="shadow appearance-none border rounded py-2 w-full text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       id="cantidad" wire:model="cantidad" placeholder="Cantidad">
                <x-jet-input-error for="cantidad"/>
            </div>

            <div class="">
                <button wire:click="guardar()"
                        class="font-bold bg-gray-100 p-2 box-border w-full rounded-md shadow shadow-gray-500 flex items-center text-gray-500 gap-x-1 hover:bg-gray-300 h-9 px-8">
                    <img src="{{ asset('./img/add.svg') }}" alt="agregar producto" class="w-6">Agregar
                </button>
            </div>

        </div>
        {{-- </form> --}}


        {{-- <table class="table-auto w-full">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="cursor-pointer px-4 py-2">Id Producto</th>
                    <th class="cursor-pointer px-4 py-2">Descripción</th>
                    <th class="cursor-pointer px-4 py-2">Color</th>
                    <th class="cursor-pointer px-4 py-2">Talle</th>
                    <th class="cursor-pointer px-4 py-2">Cantidad</th>
                    <th class="px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @if ($movimientos)
                    @for ($i = 0; $i < count($movimientos); $i++)
                        <tr>
                            <td class="border px-4 py-2">{{ $movimientos[$i]['producto_id'] }}</td>
                            <td class="border px-4 py-2">{{ $movimientos[$i]['producto_descripcion'] }}</td>
                            <td class="border px-4 py-2">{{ $movimientos[$i]['color'] }}</td>
                            <td class="border px-4 py-2">{{ $movimientos[$i]['talle'] }}</td>
                            <td class="border px-4 py-2">{{ $movimientos[$i]['cantidad'] }}</td>


                            <td class="border px-4 py-2 text-center">
                                <button wire:click="$emit('alertDelete',{{ $i }})"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4">Borrar</button>
                            </td>
                        </tr>
                    @endfor
                @endif
            </tbody>
        </table> --}}
        <div class="w-full flex justify-end">
            <button wire:click="finalizar()" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 my-3">
                Grabar {{ count($movimientos) }} Movimientos
            </button>
        </div>


        <div class="py-3">
            {{-- {{ $movimientos -> links() }}--}}
        </div>


    </div>
</div>
