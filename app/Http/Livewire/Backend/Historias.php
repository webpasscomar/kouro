<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\Sku;
use App\Models\Movimiento;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Historias extends Component
{


    public $modal = false;
    public $search;
    public $sort = 'id';
    public $order = 'desc';

    //se usa para armar el detalle del articulo
    //es el codigo de id sku
    public $ver_detalle = 0;


    use WithPagination;
    use WithFileUploads;


    protected $sku;
    protected $detalle;

    public function render()
    {

        $this->sku = Sku::select([
            'sku.id',
            'sku.stock',
            'sku.producto_id',
            'sku.created_at',
            'productos.nombre',
            'productos.codigo',
            'colores.color',
            'talles.talle',
            'tipomovimientos.descripcion',
        ])
            ->join('productos', 'sku.producto_id', '=', 'productos.id')
            ->join('talles', 'sku.talle_id', '=', 'talles.id')
            ->join('colores', 'sku.color_id', '=', 'colores.id')
            ->join('movimientos', 'movimientos.sku_id', '=', 'sku.id')
            ->join('tipomovimientos', 'movimientos.tipoMovimiento_id', '=', 'tipomovimientos.id')
            ->get();
        // ->orderBy($this->sort, $this->order)
        // ->paginate(10);


        return view(
            'livewire.backend.historias',
            [
                'sku' => $this->sku,
                'detalle' => $this->detalle,
            ]
        );
    }


    public function detalle($id)
    {

        $this->detalle = Movimiento::select([
            'movimientos.tipomovimiento_id',
            'movimientos.cantidad',
            'movimientos.fecha',
            'movimientos.pedido_id',
            'tipomovimientos.descripcion',
            'users.name'
        ])
            ->leftJoin('tipomovimientos', 'movimientos.tipoMovimiento_id', '=', 'tipomovimientos.id')
            ->leftJoin('users', 'movimientos.user_id', '=', 'users.id')
            ->where('movimientos.sku_id', '=', $id)
            ->get();


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
}
