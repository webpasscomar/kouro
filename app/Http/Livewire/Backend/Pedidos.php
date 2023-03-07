<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use Livewire\WithPagination;


use App\Models\Pedido;
use App\Models\Pedido_item;
use App\Models\Estadospedido;
use App\Models\Producto;
use App\Models\Color;
use App\Models\Talle;
use App\Models\Sku;
use App\Models\Formadeentrega;
use App\Models\Provincia;
use App\Models\Localidad;
use App\Models\Movimiento;






class Pedidos extends Component
{

    public $modal = false;
    public $modalitem = false;
    public $search;
    public $sort = 'id';
    public $order = 'desc';
    public $id_pedido = 0;

    //campos vista
    public $nombre,$apellido,$entrega_id,$fecha,$telefono,$correo,$transac_mp;
    public $del_calle,$del_piso,$del_dpto,$del_costo,$status_mp;
    public $producto_id,$talle_id,$color_id,$cantidad,$precio,$total;
    public $formapago_id,$observaciones,$detail_mp;
    public $estado_id=1;
    public $provincia_id = 0;
    public $localidad_id = 0;
    public $movimientos = array();
    public $del_nro = 0;
    // este campo activo o desactiva los imput de direccion
    // configurador en las formasdeentrega
    public $pidedirec = 0;
    public $cantitems = 0;
    public $edicion = false;

    public $muestra_detalle = array();
    public $cantidad_detalle = 0;



    //tablas usadas
    protected $productos,$talles,$colores,$estados_pedidos;
    protected $pedidos,$entregas,$provincias,$localidades,$sku;

    protected $listeners = ['delete'];

    use WithPagination;


    public function render()
    {

        if ($this->fecha == null) {
            $this->fecha = date('Y-m-d H:i:s');
        }
        $this->cantitems  = count($this->movimientos);

        if ($this->entrega_id != 0) {
            $this->pidedirec = Formadeentrega::where('id',$this->entrega_id)
                 ->value('pidedirec');
            $this->delcosto = Formadeentrega::where('id',$this->entrega_id)
                 ->value('costo');
        }            

        if ($this->producto_id != 0) {

            //    $precio = Producto::where('id',$this->producto_id)
            //     ->value('preciolista');
                $precio = Producto::where('id',$this->producto_id)
                   ->first();

                $ldate = date('Y-m-d H:i:s');
                if(is_null($precio->ofertaDesde) or is_null($precio->ofertaHasta)) {
                    //no se cargaron datos de las fechas de las ofertas
                    $this->precio =  $precio->precioLista;
                }else{
                    if ($precio->ofertaDesde <= $ldate and $precio->ofertaHasta >= $ldate) {
                        $this->precio =  $precio->precioOferta;
                    }else{
                        $this->precio =  $precio->precioLista;
                    }
                }

                if (is_numeric($this->cantidad)) {
                   $this->total  =  $this->precio*$this->cantidad;
                  }else{
                    $this->total  =  0;
                }

        }



        $this->pedidos = Pedido::where('apellido', 'like', '%' . $this->search . '%')
        ->orderBy($this->sort, $this->order)
        ->paginate(5);

        

        $this->sku              = Sku::all();
        $this->estados_pedidos  = Estadospedido::all();
        $this->pedidos_items  = Pedido_item::all();
        $this->productos  = Producto::where('estado','=',1)->get();
        $this->colores  = Color::all();
        $this->talles  = Talle::all();
        $this->entregas  = Formadeentrega::where('estado','=',1)->get();
        $this->provincias  = Provincia::where('estado','=',1)->get();

        $this->localidades  = Localidad::where('estado','=',1)
                            ->where('provincia_id','=', $this->provincia_id)
                            ->orderby('nombre')
                            ->get();

        //dd(auth()->user());
     

        return view('livewire.backend.pedidos',
                        [
                         'pedidos' => $this->pedidos,
                         'productos' => $this->productos,
                         'colores' => $this->colores,
                         'talles' => $this->talles,
                         'entregas' => $this->entregas,
                         'provincias' => $this->provincias,
                         'localidades' => $this->localidades,
                         'estados_pedidos' => $this->estados_pedidos,
                         'muestra_detalle' => $this->muestra_detalle,
                         'cantidad_detalle' => $this->cantidad_detalle,
                         'pedidos_items' => $this->pedidos_items,
                         'sku' => $this->sku,
                        ]);
    }


    protected function rules() {
        
        if ($this->modalitem==1) {  //valida el item
                return [
                    'producto_id' => 'required|not_in:0',
                    'color_id' => 'required|not_in:0',
                    'talle_id' => 'required|not_in:0',
                    'cantidad' => 'required|not_in:0',
                ];
        }else{
            if ($this->pidedirec==1) { //valida pedido con direccion requerida
                return [
                    'entrega_id' => 'required|not_in:0',
                    'apellido' => 'required|string',
                    'nombre' => 'required|string',
                    'del_calle' => 'required',
                    'del_nro' => 'required',
                    'provincia_id' => 'required|not_in:0',
                    'localidad_id' => 'required|not_in:0',
                    'telefono' => 'required',
                    'correo' => 'required|email',
                    'estado_id' => 'required|not_in:0',
                ]; 
            }else{  //valida pedido sin direccion requerida
                return [
                    'entrega_id' => 'not_in:0|required',
                    'apellido' => 'required|string',
                    'nombre' => 'required|string',
                    'telefono' => 'required',
                    'correo' => 'required|email',
                    'estado_id' => 'required|not_in:0',
                ]; 
            }    
        }
    }

//agrega un nuevo pedido
public function crear()
{
    $this->id_pedido=0;
    $this->estado_id=1;
    $this->limpiarCampos();
    $this->abrirModal();
}


//editar pedido un nuevo pedido
public function editar($id_pedido)
{
    $this->id_pedido = $id_pedido;
    $this->edicion   = 1;
    //asigna valores propiedades del formulario
    $ped = Pedido::where('id', '=', $id_pedido)->first();
    $this->apellido      =   $ped['apellido'];
    $this->nombre        =   $ped['nombre'];
    $this->cliente_id    =   $ped['cliente_id'];
    $this->correo        =   $ped['correo'];
    $this->del_calle     =   $ped['del_calle'];
    $this->del_nro       =   $ped['del_nro'];
    $this->del_piso      =   $ped['del_piso'];
    $this->del_dpto      =   $ped['del_dpto'];
    $this->del_costo     =   $ped['del_costo'];
    $this->entrega_id    =   $ped['entrega_id'];
    $this->estado_id     =   $ped['estado_id'];
    $this->fecha         =   $ped['fecha'];
    $this->formapago_id  =   $ped['formaPago_id'];
    $this->provincia_id  =   $ped['provincia_id'];
    $this->localidad_id  =   $ped['localidad_id'];
    $this->observaciones =   $ped['observaciones'];
    $this->status_mp     =   $ped['status_mp'];
    $this->subTotal      =   $ped['subTotal'];
    $this->sucursal_id   =   $ped['sucursal_id'];
    $this->telefono      =   $ped['telefono'];
    $this->total         =   $ped['total'];
    $this->transac_mp    =   $ped['transac_mp'];
    $this->detail_mp     =   $ped['detail_mp'];
    $this->cantidaditems =   $ped['indice_productos'];
    
    //arma items en memoria
    $this->pedidos_items  = Pedido_item::where('pedido_id', '=', $id_pedido)->get();
    $this->indice_productos=0;
    foreach ($this->pedidos_items as $item) {
        //obtiene datos de producto, talle y color 
        $sku  = Sku::where('id','=',$item->sku_id)->first();
        $this-> movimientos[ $this->indice_productos] = [
                'id' => $item->id,
                'producto_id' => $sku->producto_id,
                'producto_descripcion' => $sku->producto->nombre,
                'color_id' => $sku->color_id,
                'color' => $sku->color->color,
                'talle_id' => $sku->talle_id,
                'talle' =>  $sku->talle->talle,
                'cantidad' => $item->cantidad,
                'precio' =>  $item->precioUnitario];
                $this->indice_productos=$this->indice_productos+1;
    }
    $this->abrirModal();
}



//graba el pedido
public function finalizar()
{
 
    $this->validate();

    $this->indice_productos = count($this->movimientos);
    $costototal = 0;
    for($i=0;$i<count($this->movimientos);$i++) {
        $costototal = $costototal + ($this->movimientos[$i]['cantidad']*$this->movimientos[$i]['precio']);
    }

    if ($this->pidedirec == 0) {
        $this->del_calle = "";
        $this->del_nro = 0;
        $this->del_piso = "";
        $this->del_dpto = "";
        $this->del_costo = 0;
    }
        
    //actualiza cabecera
    $lastid = Pedido::updateOrCreate(
        ['id' => $this->id_pedido,
        ],
        [
            'apellido'      => $this->apellido,
            'nombre'        => $this->nombre,
            'cantidadItems' => $this->indice_productos,
            'cliente_id'    => 0,
            'correo'        => $this->correo,
            'del_calle'     => $this->del_calle,
            'del_nro'       => $this->del_nro,
            'del_piso'      => $this->del_piso,
            'del_dpto'      => $this->del_dpto,
            'del_costo'     => $this->del_costo,
            'entrega_id'    => $this->entrega_id,
            'estado_id'     => $this->estado_id,
            'fecha'         => $this->fecha,
            'formaPago_id'  => $this->formapago_id,
            'provincia_id'  => $this->provincia_id,
            'localidad_id'  => $this->localidad_id,
            'observaciones' => $this->observaciones,
            'status_mp'     => $this->status_mp,
            'subTotal'      => $costototal,
            'sucursal_id'   => 0,
            'telefono'      => $this->telefono,
            'total'         => $this->del_costo+$costototal,
            'transac_mp'    => $this->transac_mp,
            'detail_mp'    => $this->detail_mp
        ]);

   
        for($i=0;$i<count($this->movimientos);$i++) {
            //solo agrega los items nuevos
            if ($this->movimientos[$i]['id'] == 0) {          
                    ////obtenemos la cantidad original de stock
                    $canti_ori = Sku::where('producto_id',$this->movimientos[$i]['producto_id'])
                        ->where('talle_id',$this->movimientos[$i]['talle_id'])
                        ->where('color_id',$this->movimientos[$i]['color_id'])
                        ->value('stock');
                    if($canti_ori===null) {
                        $canti_ori=0;
                    }
                    //// actualizamos stock sku
                    $cantidad = $this->movimientos[$i]['cantidad']-$canti_ori;
                    Sku::updateOrCreate(
                        ['producto_id' => $this->movimientos[$i]['producto_id'],
                        'talle_id'    => $this->movimientos[$i]['talle_id'],
                        'color_id'    => $this->movimientos[$i]['color_id'],
                        ],
                        [
                            'stock' =>$cantidad,
                            'estado' => 1
                    ]);
                    //// grabamos en historia en movimiento
                    //obtengo el id del sku
                    $sku_id = Sku::where('producto_id',$this->movimientos[$i]['producto_id'])
                    ->where('talle_id',$this->movimientos[$i]['talle_id'])
                    ->where('color_id',$this->movimientos[$i]['color_id'])
                    ->value('id');
                    
                    Movimiento::Create([
                        'tipoMovimiento_id' => 2, 
                        'sku_id' => $sku_id,
                        'cantidad' => $cantidad,
                        'pedido_id' => $lastid['id'],
                        'estado' => 0,   //no se que es
                        'user_id' => auth()->user()->id,
                    ]);


                    Pedido_item::Create([
                        'cantidad' => $this->movimientos[$i]['cantidad'],
                        'pedido_id' => $lastid['id'],
                        'precioItem' => $this->movimientos[$i]['precio'],
                        'precioUnitario' => $this->movimientos[$i]['precio']*$this->movimientos[$i]['cantidad'],
                        'sku_id' => $sku_id,
                        'vacio' => 0
                    ]);
            } 

        }       
        session()->flash('message','¡Actualización exitosa!');
        $this->emit('alertSave');
        $this->limpiarCampos();
        $this->movimientos=[];
        $this->modal=false;
        $this->edicion = 0;

    
}


public function detalle($id)
{
    
    //cuenta cuantos items se debe mostrar el detalle
    $cantidad_det = count($this->muestra_detalle);
    $encontro = 0;
    //verifica si esta ya en detalle para apagarlo o encenderlo
    if ($cantidad_det != 0){
            for($i=0;$i<count($this->muestra_detalle);$i++) {
                if($this->muestra_detalle[$i]['id']== $id) {
                     if ($this->muestra_detalle[$i]['ver']== 0) {
                         $this->muestra_detalle[$i]['ver'] = 1;
                     }else{ 
                         $this->muestra_detalle[$i]['ver'] = 0;
                     }
                     $encontro=1;
                     break;
                }
            }
    }
    //lo agrega a muestra detalle si no lo encontro
    if ($encontro == 0 ){
         $indice = count($this->muestra_detalle);
         $this->muestra_detalle[$indice] = ['id' => $id, 'ver' => 1];
    }    
    $this->cantidad_detalle = count($this->muestra_detalle);
     
} 


public function order($sort)
{
        if ($this->sort == $sort) {

            if ($this->order == 'desc') {
                $this->order = 'asc';
            } else {
                $this->order = 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->order = 'asc';
        }
}


public function abrirModal()
{
        $this->modal = true;
}

public function cerrarModal()
{
        $this->modal = false;
        $this->movimientos=[];
}


//nuevo item del pedido
public function nuevo() 
{
        $this->limpiarCamposItem();
        $this->abrirModalItem();
}

//elimina item
public function delete($indice)
{
    
    if ($this->modal==1) { //esta borrando un item $indice es el indice del item

        //si el item tiene id se debe eliminar de los detalles
        // grabar la anulacion y descontar stock 
        if ($this->edicion=1 && $this->movimientos[$indice]['id'] != 0) {
                ////obtenemos la cantidad original de stock
                $canti_ori = Sku::where('producto_id',$this->movimientos[$indice]['producto_id'])
                    ->where('talle_id',$this->movimientos[$indice]['talle_id'])
                    ->where('color_id',$this->movimientos[$indice]['color_id'])
                    ->value('stock');
               //// actualizamos stock sku
               $cantidad = $this->movimientos[$indice]['cantidad']+$canti_ori;
               Sku::updateOrCreate(
                    ['producto_id' => $this->movimientos[$indice]['producto_id'],
                     'talle_id'    => $this->movimientos[$indice]['talle_id'],
                     'color_id'    => $this->movimientos[$indice]['color_id'],
                    ],
                    [
                        'stock' =>$cantidad,
                        'estado' => 1
               ]);
               //// grabamos en historia en movimiento
               //obtengo el id del sku
               $sku_id = Sku::where('producto_id',$this->movimientos[$indice]['producto_id'])
                ->where('talle_id',$this->movimientos[$indice]['talle_id'])
                ->where('color_id',$this->movimientos[$indice]['color_id'])
                ->value('id');

                //genera movimiento en la historia
                Movimiento::Create([
                    'tipoMovimiento_id' => 9, 
                    'sku_id' => $sku_id,
                    'cantidad' => $cantidad,
                    'pedido_id' => $this->id_pedido,
                    'estado' => 0,   //no se que es
                    'user_id' => auth()->user()->id,
               ]);

               //elimina de la tabla pedidos_item
               Pedido_item::find($this->movimientos[$indice]['id'])->delete();
        }
        unset($this->movimientos[$indice]);
        //re acomoda el vector para que noque posiciones null
        $this->movimientos = array_values($this->movimientos);
    }else{  //esta borrando el pedido completo $indice es el numero de pedido
        $pedido       = Pedido::where('id', '=', $indice)->first();
        $itemspedidos = Pedido_item::where('pedido_id', '=', $indice)->get();

        //eliminamos items 
        foreach ($itemspedidos as $items) {
            $sku  = Sku::where('id','=',$items->sku_id)->first();

            ////obtenemos la cantidad original de stock
            $canti_ori = Sku::where('producto_id',$sku['producto_id'])
                            ->where('talle_id',$sku['talle_id'])
                            ->where('color_id',$sku['color_id'])
                            ->value('stock');
            
            //// actualizamos stock sku
            $cantidad = $items['cantidad']+$canti_ori;
            Sku::updateOrCreate(
                [ 'producto_id' => $sku['producto_id'],
                  'talle_id'    => $sku['talle_id'],
                  'color_id'    => $sku['color_id'],
                ],
                  [
                    'stock' =>$cantidad,
                    'estado' => 1
                ]);
          

            //genera movimiento en la historia
            Movimiento::Create([
                'tipoMovimiento_id' => 9, 
                'sku_id' => $sku['id'],
                'cantidad' => $cantidad,
                'pedido_id' => $indice,
                'estado' => 0,   //no se que es
                'user_id' => auth()->user()->id,
            ]);

            //elimina de la tabla pedidos_item
            Pedido_item::find($items['id'])->delete();
        }
        Pedido::find($indice)->delete();
    }
}


//abre modal item
public function abrirModalItem()
{
        $this->modalitem = true;
}

//cierra modal item sin grabar
public function cerrarModalItem()
{
        $this->limpiarCampositem();
        $this->modalitem = false;
}

//guarda item
public function guardaritem()
{


       $this->validate();



       $this->indice_productos = count($this->movimientos);

       $this->producto_nombre  = Producto::where('id',$this->producto_id)->value('nombre');
       $this->color_nombre  = Color::where('id',$this->color_id)->value('color');
       $this->talle_nombre  = Talle::where('id',$this->talle_id)->value('talle');



      $this-> movimientos[ $this->indice_productos] = [
                        'id' => 0,
                        'producto_id' => $this->producto_id,
                        'producto_descripcion' => $this->producto_nombre,
                        'color_id' => $this->color_id,
                        'color' => $this->color_nombre,
                        'talle_id' => $this->talle_id,
                        'talle' =>  $this->talle_nombre,
                        'cantidad' => $this->cantidad,
                        'precio' =>  $this->precio];

       $this->emit('alertSave');
       $this->limpiarCamposItem();
       $this->modalitem=false;
}



//inicializa las propiedades para el alta del pedido
public function limpiarCampos()
{
         $this->apellido='';
         $this->nombre='';
         $this->indice_productos=0;
         $this->cliente_id=0;
         $this->correo='';
         $this->del_calle='';
         $this->del_nro='';
         $this->del_piso='';
         $this->del_dpto='';
         $this->del_costo=0;
         $this->entrega_id=0;
         $this->estado=1;
         $this->fecha=date('Y-m-d H:i:s');
         $this->formapago_id=0;
         $this->provincia_id=0;
         $this->localidad_id=0;
         $this->observaciones='';
         $this->status_mp='';
         $this->subTotal = 0;
         $this->sucursal_id= 0;
         $this->telefono='';
         $this->total=0;
         $this->transac_mp=0;
         $this->detail_mp='';
        
}

public function limpiarCamposItem()
{
            $this->producto_id=0;
            $this->talle_id=0;
            $this->color_id=0;
            $this->cantidad=0;
            $this->precio=0;
            $this->total=0;

}



}
