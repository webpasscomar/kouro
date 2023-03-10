
    
        <form>
    
    @if ($modalitem == 1)  
    <h1>Alta de Item</h1>
    <div class="grid grid-cols-4 gap-3 bg-red">
        <div>
            <label for="producto_id" class="block text-gray-700 text-sm font-bold mb-2">Producto</label>
            <select
                class="shadow appearance-none border rounded w-60 py-2 px-0 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                wire:model="producto_id">
                <option value="0">Selecciona un Producto</option>
                @foreach ($productos as $p)
                    <option value="{{ $p->id }}">{{ $p->nombre }}</option>
                @endforeach
            </select>
            <x-jet-input-error for="producto_id" />
        </div>
        <div>
            <label for="color_id" class="block text-gray-700 text-sm font-bold mb-2">Color</label>
                <select
                    class="shadow appearance-none border rounded w-60  text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    wire:model="color_id">
                    <option value="0">Selecciona un Color</option>
                    @foreach ($colores as $c)
                        <option value="{{ $c->id }}">{{ $c->color }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="color_id" />
        </div>
        <div>
            <label for="talle_id" class="block text-gray-700 text-sm font-bold mb-2">Talle</label>
            <select
                class="shadow appearance-none border rounded w-60  text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                wire:model="talle_id">
                <option value="0">Selecciona un Talle</option>
                @foreach ($talles as $c)
                    <option value="{{ $c->id }}">{{ $c->talle }}</option>
                @endforeach
            </select>
            <x-jet-input-error for="talle_id" />
        </div>
        <div>
            <label for="cantidad" class="block text-gray-700 text-sm font-bold mb-2">Cantidad</label>
            <input type="text"
                class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="cantidad" wire:model="cantidad" placeholder="Cantidad">
            <x-jet-input-error for="cantidad" />            
        </div>
        <div>    
            <label for="precio" class="block text-gray-700 text-sm font-bold mb-2">Precio</label>
            <input type="text"
                class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="precio" wire:model="precio" placeholder="Precio" disabled>
            <x-jet-input-error for="precio" />  
        </div>    
        <div>
            <label for="total" class="block text-gray-700 text-sm font-bold mb-2">Total</label>
            <input type="text"
                class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="total" wire:model="total" placeholder="Total Item" disabled>
            <x-jet-input-error for="total" />  
        </div>
    </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse col-span-3">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button wire:click.prevent="guardaritem()" type="button"
                            class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-purple-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-purple-800 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">Guardar</button>
                    </span>

                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button wire:click.prevent="cerrarModalItem()" type="button"
                            class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-gray-200 text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">Cancelar</button>
                    </span>
            </div>
    
    @else
    <p class="pb-4 font-bold text-xl decoration-emerald-800">Pedidos</p>
         <div class="grid grid-cols-4 gap-3">
                <div>
                    <label for="id_pedido" class="block text-gray-700 text-sm font-bold mb-2">ID</label>
                    <input type="text"
                        class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="id_pedido" wire:model="id_pedido" disabled="disabled">
                        <x-jet-input-error for="id_pedido" />
                </div>
                <div>
                    <label for="fecha" class="block text-gray-700 text-sm font-bold mb-2">Fecha</label>
                    <input type="text"
                        class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="fecha" wire:model="fecha" disabled="disabled">
                        <x-jet-input-error for="fecha" />
                </div>
                <div> 
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
                </div> 
                <div>
                    <label for="transac_mp" class="block text-gray-700 text-sm font-bold mb-2">Transaccion Mercado Pago</label>
                        <input type="text"
                            class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="transac_mp" wire:model="transac_mp">
                            <x-jet-input-error for="transac_mp" />                                
                </div>
                <div>
                    <label for="apellido" class="block text-gray-700 text-sm font-bold mb-2">Apellido</label>
                    <input type="text"
                        class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="apellido" wire:model="apellido">
                        <x-jet-input-error for="apellido" />
                </div>
                <div>
                    <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre</label>
                    <input type="text"
                        class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="nombre" wire:model="nombre">
                        <x-jet-input-error for="nombre" />
                </div>

                    @if ($pidedirec == 1 )        
                    <div>
                        <label for="del_calle" class="block text-gray-700 text-sm font-bold mb-2">Calle</label>
                        <input type="text"  
                            class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="del_calle" wire:model="del_calle">
                            <x-jet-input-error for="del_calle" />
                    </div>
                    <div>
                        <label for="del_nro" class="block text-gray-700 text-sm font-bold mb-2">Número</label>
                        <input type="text"
                            class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="del_nro" wire:model="del_nro">
                            <x-jet-input-error for="del_nro" />
                    </div>
                    <div>
                        <label for="del_piso" class="block text-gray-700 text-sm font-bold mb-2">Piso</label>
                        <input type="text"
                            class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="del_piso" wire:model="del_piso">
                            <x-jet-input-error for="del_piso" />
                    </div>
                    <div>
                        <label for="del_dpto" class="block text-gray-700 text-sm font-bold mb-2">Dpto.</label>
                        <input type="text"
                            class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="del_dpto" wire:model="del_dpto">
                            <x-jet-input-error for="del_dpto" />
                    </div>
                    <div>
                        <label for="provincia_id" class="block text-gray-700 text-sm font-bold mb-2">provincia</label>
                        <select
                            class="shadow appearance-none border rounded py-2 px-0 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            wire:model="provincia_id">
                            <option value="0">Selecciona una Provincia</option>
                            @foreach ($provincias as $p)
                                <option value="{{ $p->id }}">{{ $p->nombre }}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="provincia_id" />                                
                    </div>
                    <div>
                        <label for="localidad_id" class="block text-gray-700 text-sm font-bold mb-2">provincia</label>
                        <select
                            class="shadow appearance-none border rounded py-2 px-0 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            wire:model="localidad_id">
                            <option value="0">Selecciona una Localidad</option>
                            @if ($localidades)
                                @foreach ($localidades as $p)
                                    <option value="{{ $p->id }}">{{ $p->nombre }}</option>
                                @endforeach
                            @endif
                        </select>
                        <x-jet-input-error for="localidad_id" />  
                    </div>   
                    @endif 
                    <div>   
                        <label for="telefono" class="block text-gray-700 text-sm font-bold mb-2">Teléfono</label>
                        <input type="text"
                            class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="telefono" wire:model="telefono">
                            <x-jet-input-error for="telefono" />
                    </div>
                    <div>
                        <label for="correo" class="block text-gray-700 text-sm font-bold mb-2">Correo</label>
                        <input type="text"
                            class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="correo" wire:model="correo">
                            <x-jet-input-error for="correo" />
                    </div>
                    <div>
                        <label for="estado_id" class="block text-gray-700 text-sm font-bold mb-2">Estado</label>
                        <select
                            class="shadow appearance-none border rounded py-2 px-0 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            wire:model="estado_id">
                            <option value="0">Selecciona un Estado</option>
                            @foreach ($estados_pedidos as $p)
                                <option value="{{ $p->id }}">{{ $p->nombre }}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="estado_id" />                                
                    </div>

    </div>
                        <div>
                            <button wire:click.prevent="nuevo()"
                                class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 my-3">+ Nuevo Item</button>
                        </div>
      

    <div class="grid grid-cols-1">
        <table class="table-auto w-full">
        <thead>
            <tr class="bg-gray-200 text-gray-700">
                <th class="cursor-pointer px-4 py-2">Id Producto</th>
                <th class="cursor-pointer px-4 py-2" >Descripción</th>
                <th class="cursor-pointer px-4 py-2" >Color</th>
                <th class="cursor-pointer px-4 py-2" >Talle</th>
                <th class="cursor-pointer px-4 py-2" >Precio</th>
                <th class="cursor-pointer px-4 py-2" >Cantidad</th>
                <th class="cursor-pointer px-4 py-2" >Total</th>
                <th class="cursor-pointer px-4 py-2" >Acción</th>
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
                    <td class="border px-4 py-2">{{ $movimientos[$i]['precio'] }}</td>
                    <td class="border px-4 py-2">{{ $movimientos[$i]['cantidad'] }}</td>
                    <td class="border px-4 py-2">{{ $movimientos[$i]['cantidad']*$movimientos[$i]['precio'] }}</td>
                     <td class="border px-4 py-2 text-center">
                        <button wire:click.prevent="$emit('alertDelete',{{ $i }})"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4">Borrar</button>
                    </td>
                </tr>

            @endfor
          @endif             
        </tbody>
    </table>
</div>



                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse col-span-3">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                       
                           <button wire:click.prevent="finalizar()" type="button"
                            class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-purple-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-purple-800 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5" 
                            {{  $cantitems > 0 ? '' : 'disabled' }} 
                            >Guardar</button>
                    
                        </span>

                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button wire:click.prevent="cerrarModal()" type="button"
                            class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-gray-200 text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">Cancelar</button>
                    </span>
                </div>
    @endif
</form>

