<?php

namespace App\Http\Livewire\Backend;

use App\Models\Stock_pendiente;
use Livewire\Component;
use Livewire\WithPagination;

class Avisostock extends Component
{
    public $respuesta, $id_pendiente;

    protected $listeners = ['delete'];

    public $modal = false;
    public $search;
    public $sort = 'id';
    public $order = 'desc';

    use WithPagination;

    protected $stockpendientes;
    protected $rules = [
        'respuesta' => 'required',
    ];


    protected function messages()
    {
        return [
            'respuesta.required'        => 'Debe ingresar una respuesta.',
        ];
    }

    public function render()
    {
            $this->stockpendientes = Stock_pendiente::select(
            ['stocks_pend.id',
             'stocks_pend.fechaSolicitud',
             'stocks_pend.fechaRespuesta',
             'stocks_pend.respuesta',
             'stocks_pend.cantidad',
             'stocks_pend.email',
             'productos.nombre',
             'colores.color',
             'talles.talle'])
             ->leftJoin('sku','stocks_pend.sku_id','=', 'sku.id')
             ->leftJoin('productos', 'sku.producto_id', '=', 'productos.id')
             ->leftJoin('talles', 'sku.talle_id', '=', 'talles.id')
             ->leftJoin('colores', 'sku.color_id', '=', 'colores.id')
             ->where('stocks_pend.email', 'like', '%' . $this->search . '%')
             ->orderBy($this->sort, $this->order)
             ->paginate(5);


        return view('livewire.backend.stockspendientes', ['stockspendientes' => $this->stockpendientes]);
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

    public function limpiarCampos()
    {
        $this->respuesta = '';
    }

    public function editar($id)
    {
        $pendiente = Stock_pendiente::findOrFail($id);
        $this->id_pendiente = $id;
        $this->respuesta = $pendiente->respuesta;
        $this->abrirModal();
    }

    public function delete($id)
    {
        Stock_pendiente::find($id)->delete();
        //$this->emit('mensajePositivo', ['mensaje' => 'El pendiente a sido eliminado']);
    }

    public function guardar()
    {
        $this->validate();
        Stock_pendiente::updateOrCreate(
            ['id' => $this->id_pendiente],
            [
                'respuesta' => $this->respuesta,
            ]
        );
        $this->emit('mensajePositivo', ['mensaje' => 'Respuesta registrada, no olvides enviarla!!!']);

        $this->cerrarModal();
        $this->limpiarCampos();
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
