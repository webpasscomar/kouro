<x-slot name="header">
    <h1 class="text-gray-900"><a href="{{ route('dashboard') }}">Dashboard</a> | Manejo de Existencias</h1>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
        {{-- <form> --}}
            <div class="mb-5 w-full">
              <div>
                    <select
                        class="shadow appearance-none border rounded w-70 py-2 px-0 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        wire:model="tipomove_id">
                        <option value="0">Selecciona un Tipo de Movimiento</option>
                        @foreach ($tipomove as $t)
                            <option value="{{ $t->id }}">{{ $t->descripcion }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="tipomove_id" />
                </div>
                    <select
                        class="shadow appearance-none border rounded w-60 py-2 px-0 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        wire:model="producto_id">
                        <option value="0">Selecciona un Producto</option>
                        @foreach ($productos as $p)
                            <option value="{{ $p->id }}">{{ $p->nombre }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="producto_id" />
                    <select
                        class="shadow appearance-none border rounded w-60  text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        wire:model="color_id">
                        <option value="0">Selecciona un Color</option>
                        @foreach ($colores as $c)
                            <option value="{{ $c->id }}">{{ $c->color }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="color_id" />
                <select
                    class="shadow appearance-none border rounded w-60  text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    wire:model="talle_id">
                    <option value="0">Selecciona un Talle</option>
                    @foreach ($talles as $c)
                        <option value="{{ $c->id }}">{{ $c->talle }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="talle_id" />
                <input type="text"
                        class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="cantidad" wire:model="cantidad" placeholder="Cantidad">
                    <x-jet-input-error for="cantidad" />

                    <button wire:click="guardar()"
                    class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 my-3">+
                    Nuevo Ingreso</button>
            </div>
        {{-- </form> --}}


            <table class="table-auto w-full">
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="cursor-pointer px-4 py-2">Id Producto</th>
                        <th class="cursor-pointer px-4 py-2" >Descripcion</th>
                        <th class="cursor-pointer px-4 py-2" >Color</th>
                        <th class="cursor-pointer px-4 py-2" >Talle</th>
                        <th class="cursor-pointer px-4 py-2" >Cantidad</th>
                        <th class="px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                  @if($movimientos)
                       @for($i=0;$i<count($movimientos);$i++)
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
            </table>

            <button wire:click="finalizar()" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 my-3">
               Grabar {{ count($movimientos) }} Movimientos</button>


                   <div class="py-3">

                {{-- {{ $movimientos->links() }} --}}

            </div>





        </div>
    </div>
</div>
