<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\Color;
use Livewire\WithPagination;

class Colores extends Component
{
    public $color, $id_color;

    public $modal = false;
    public $search;
    public $sort = 'id';
    public $order = 'desc';
    public $pcolor = '';



    use WithPagination;

    protected $colores;
    protected $listeners = ['delete'];


    protected $rules = [
        'color' => 'required|max:30',
    ];

    public function render()
    {
        $this->colores = Color::where('color', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->order)
            ->paginate(5);

        return view('livewire.backend.colores', ['colores' => $this->colores]);
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
        $this->color = '';
        $this->id_color = '';
        $this->pcolor = '';
    }

    public function editar($id)
    {
        $color = Color::findOrFail($id);
        $this->id_color = $id;
        $this->color = $color->color;
        $this->pcolor = $color->pcolor;
        $this->abrirModal();
    }

    public function delete($id)
    {
        Color::find($id)->delete();
    }

    public function guardar()
    {
        $this->validate();
        Color::updateOrCreate(
            ['id' => $this->id_color],
            [
                'color' => $this->color,
                'pcolor' => $this->pcolor,
            ]
        );

        $this->emit('alertSave');
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
