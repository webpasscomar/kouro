<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Tipomovimiento;
use App\Models\Producto;
use App\Models\Color;
use App\Models\Talle;
use App\Models\Sku;
use App\Models\Movimiento;


class Movimientos extends Component
{

    public $modal = false;
    public $search;
    public $sort = 'id';
    public $order = 'desc';
    public $indice_productos;

    public Producto $producto;


    public $movimientos = array();
    public $producto_id,$color_id,$talle_id,$cantidad,$tipomove_id;
    public $producto_nombre,$color_nombre,$talle_nombre;


    use WithPagination;

    protected $tipomovimientos;
    protected $productos,$colores,$talles;
    protected $estado = 1;

    protected $listeners = ['delete'];


    public function render()
    {

        //dd(auth()->user());

        $this->tipomovimientos = Tipomovimiento::all();
        $this->productos  = Producto::all();
        $this->colores  = Color::all();
        $this->talles  = Talle::all();


        return view('livewire.backend.movimientos',
                    [
                         'movimientos' => $this->movimientos,
                         'productos' => $this->productos,
                         'colores' => $this->colores,
                         'talles' => $this->talles,
                         'tipomove' => $this->tipomovimientos,
                        ]);
    }

    protected function rules() {
            return [
                'producto_id' => 'required|not_in:0',
                'color_id' => 'required|not_in:0',
                'talle_id' => 'required|not_in:0',
                'cantidad' => 'required|not_in:0',
            ];
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
                        'cantidad' => $this->cantidad];

       $this->emit('alertSave');
       $this->limpiarCampos();
   }

    public function finalizar()
    {
      $this->indice_productos = count($this->movimientos);
      if ($this->indice_productos > 0)
      {
        for($i=0;$i<count($this->movimientos);$i++) {
            ////obtenemos la cantidad original de stock
            $canti_ori = Sku::where('producto_id',$this->movimientos[$i]['producto_id'])
            ->where('talle_id',$this->movimientos[$i]['talle_id'])
            ->where('color_id',$this->movimientos[$i]['color_id'])
            ->value('stock');
            if($canti_ori===null) {
                $canti_ori=0;
            }
            //// actualizamos stock sku
            $cantidad = $this->movimientos[$i]['cantidad']+$canti_ori;
            Sku::updateOrCreate(
                ['producto_id' => $this->movimientos[$i]['producto_id'],
                 'talle_id'    => $this->movimientos[$i]['talle_id'],
                 'color_id'    => $this->movimientos[$i]['color_id'],
                ],
                [
                    'stock' =>$cantidad,
                    'estado' => 1
                ]
            );
            //// grabamos en historia en movimiento
            //obtengo el id del sku
            $sku_id = Sku::where('producto_id',$this->movimientos[$i]['producto_id'])
            ->where('talle_id',$this->movimientos[$i]['talle_id'])
            ->where('color_id',$this->movimientos[$i]['color_id'])
            ->value('id');
            Movimiento::Create([
                'tipoMovimiento_id' => $this->tipomove_id,
                'sku_id' => $sku_id,
                'cantidad' => $cantidad,
                'pedido_id' => 0,
                'estado' => 0,   //no se que es
                'user_id' => auth()->user()->id,
            ]
            );

            //    auth()->user() Obtenemos la instancia del usuario logueado
            //    auth()->user()->name
            //    auth()->user()->email
            //    auth()->user()->id




        }
        session()->flash('message','¡Actualización exitosa!');
        $this->emit('alertSave');
        $this->limpiarCampos();
        $this->movimientos=[];
      }

    }

   public function limpiarCampos()
   {
        $this->producto_id = 0;
        $this->talle_id  = 0;
        $this->color_id = 0;
        $this->cantidad = '';
        $this->cantidad = '';

   }

    public function delete($id)
    {
        //elimina por indice
        unset($this->movimientos[$id]);
        //re acomoda el vector para que noque posiciones null
        $this->movimientos = array_values($this->movimientos);
    }




}
