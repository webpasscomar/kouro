<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Tipomovimiento;
use App\Models\Producto;
use App\Models\Color;
use App\Models\Talle;



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
    public $producto_id,$color_id,$talle_id,$cantidad;
    public $producto_nombre,$color_nombre,$talle_nombre;


    use WithPagination;

    protected $tipomovimientos;
    protected $productos,$colores,$talles;
    protected $estado = 1;

    protected $listeners = ['delete'];


    public function render()
    {
        $this->tipomovimientos = Tipomovimiento::all();
        $this->productos  = Producto::all();
        $this->colores  = Color::all();
        $this->talles  = Talle::all();



        // $this-> movimientos[0] = ['producto_id' => 1,
        //                           'producto_descripcion' => 'descripcion del producto 1' ,
        //                           'color_id' => 4,
        //                           'color' => 'Rojo',
        //                           'talle_id' => 2,
        //                           'talle' => 'XL',
        //                            'cantidad' => 10];

        //$this->movimientos=array();

        // dd($this->productos);


        return view('livewire.backend.movimientos',
                    [
                         'movimientos' => $this->movimientos,
                         'productos' => $this->productos,
                         'colores' => $this->colores,
                         'talles' => $this->talles,
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

   public function guardar()
   {
       //dd($this->producto_id);
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

   public function limpiarCampos()
   {
        $this->producto_id = 0;
        $this->talle_id  = 0;
        $this->color_id = 0;
        $this->cantidad = '';
   }








   public function crear()
    {
        $this->limpiarCampos();
        $this->abrirModal();
    }

    public function abrirModal()
    {
        $this->modal = true;
    }

    public function cerrarModal()
    {
        $this->modal = false;
    }



    public function editar($id)
    {
        // $color = Color::findOrFail($id);
        // $this->id_color = $id;
        // $this->color = $color->color;
        // $this->abrirModal();
    }

    public function delete($id)
    {
        unset($this->movimientos[$id]);
        $this->movimientos = array_values($this->movimientos);
    }


    public function order($sort)
    {
        // if ($this->sort == $sort) {

        //     if ($this->order == 'desc') {
        //         $this->order = 'asc';
        //     } else {
        //         $this->order = 'desc';
        //     }
        // } else {
        //     $this->sort = $sort;
        //     $this->order = 'asc';
        // }
    }
}
