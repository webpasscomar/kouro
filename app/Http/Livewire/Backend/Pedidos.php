<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use Livewire\WithPagination;


use App\Models\Pedido;
use App\Models\Producto;
use App\Models\Color;
use App\Models\Talle;
use App\Models\Sku;
use App\Models\Formadeentrega;
use App\Models\Provincia;
use App\Models\Localidad;





class Pedidos extends Component
{

    public $modal = false;
    public $modalitem = false;
    public $search;
    public $sort = 'id';
    public $order = 'desc';

    //campos vista
    public $nombre,$apellido,$fecha,$entrega_id,$telefono,$correo,$transac_mp;
    public $producto_id,$talle_id,$color_id,$cantidad,$precio,$total;
    public $provincia_id = 0;
    public $localidad_id = 0;
    public $movimientos = array();


    //tablas usadas
    protected $productos,$colores,$talles,$pedidos,$entregas,$provincias,$localidades;

    protected $listeners = ['delete'];


    use WithPagination;


    public function render()
    {

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
                        ]);
    }


    protected function rules() {
        if ($this->modalitem==1) {
                return [
                    'producto_id' => 'required|not_in:0',
                    'color_id' => 'required|not_in:0',
                    'talle_id' => 'required|not_in:0',
                    'cantidad' => 'required|not_in:0',
                ];
        }else{
                return [];
        }
    }


public function crear()
{
    $this->limpiarCampos();
    $this->abrirModal();
}


   public function finalizar()
   {

    //   $this->indice_productos = count($this->movimientos);
    //   if ($this->indice_productos > 0)
    //   {
    //     for($i=0;$i<count($this->movimientos);$i++) {
    //         ////obtenemos la cantidad original de stock
    //         $canti_ori = Sku::where('producto_id',$this->movimientos[$i]['producto_id'])
    //         ->where('talle_id',$this->movimientos[$i]['talle_id'])
    //         ->where('color_id',$this->movimientos[$i]['color_id'])
    //         ->value('stock');
    //         if($canti_ori===null) {
    //             $canti_ori=0;
    //         }
    //         //// actualizamos stock sku
    //         $cantidad = $this->movimientos[$i]['cantidad']+$canti_ori;
    //         Sku::updateOrCreate(
    //             ['producto_id' => $this->movimientos[$i]['producto_id'],
    //              'talle_id'    => $this->movimientos[$i]['talle_id'],
    //              'color_id'    => $this->movimientos[$i]['color_id'],
    //             ],
    //             [
    //                 'stock' =>$cantidad,
    //                 'estado' => 1
    //             ]
    //         );
    //         //// grabamos en historia en movimiento
    //         //obtengo el id del sku
    //         $sku_id = Sku::where('producto_id',$this->movimientos[$i]['producto_id'])
    //         ->where('talle_id',$this->movimientos[$i]['talle_id'])
    //         ->where('color_id',$this->movimientos[$i]['color_id'])
    //         ->value('id');
    //         Movimiento::Create([
    //             'tipoMovimiento_id' => $this->tipomove_id,
    //             'sku_id' => $sku_id,
    //             'cantidad' => $cantidad,
    //             'pedido_id' => 0,
    //             'estado' => 0,   //no se que es
    //             'user_id' => auth()->user()->id,
    //         ]
    //         );

    //         //    auth()->user() Obtenemos la instancia del usuario logueado
    //         //    auth()->user()->name
    //         //    auth()->user()->email
    //         //    auth()->user()->id

    //     }
    //     session()->flash('message','¡Actualización exitosa!');
    //     $this->emit('alertSave');
    //     $this->limpiarCampos();
    //     $this->movimientos=[];
    //   }

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

    }


    //nuevo item del pedido
    public function nuevo() {
        $this->limpiarCamposItem();
        $this->abrirModalItem();
    }

    //elimina item
    public function delete($id)
    {
        unset($this->movimientos[$id]);
        //re acomoda el vector para que noque posiciones null
        $this->movimientos = array_values($this->movimientos);
    }

    //abre modal item
    public function abrirModalItem()
    {
        $this->modalitem = true;
    }

    //cierra modal item sin grabar
    public function cerrarModalItem()
    {
        $this->limpiarCamposItem();
        $this->modalitem = false;
    }

   //guarda item
   public function guardar()
   {


    $this->validate();



       $this->indice_productos = count($this->movimientos);

       $this->producto_nombre  = Producto::where('id',$this->producto_id)->value('nombre');
       $this->color_nombre  = Color::where('id',$this->color_id)->value('color');
       $this->talle_nombre  = Talle::where('id',$this->talle_id)->value('talle');



      $this-> movimientos[ $this->indice_productos] = [
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




    public function limpiarCampos()
    {
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
