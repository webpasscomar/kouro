<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categoria;
use Livewire\WithPagination;

class Categorias extends Component
{
    public $categorias, $categoriaPadre_id, $idioma_id, $categoria, $descripcion, $slug, $imagen, $menu, $orden, $modulo_id, $estado;

    public $modal = false;
    public $search;
    public $sort = 'id';
    public $order = 'desc';

    use WithPagination;

    public function render()
    {
        $this->categorias = Categoria::where('descripcion', 'like', '%' . $this->search . '%')
            ->orWhere('categoria', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->order)
            ->get();
        return view('livewire.categorias');
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
        $this->categoriaPadre_id = '';
        $this->idioma_id = '';
        $this->categoria = '';
        $this->descripcion = '';
        $this->slug = '';
        $this->imagen = '';

        $this->menu = '';
        $this->orden = '';
        $this->modulo_id = '';
        $this->estado = '';
        $this->id_categoria = '';
    }

    public function editar($id)
    {
        $categoria = Categoria::findOrFail($id);
        $this->id_categoria = $id;
        $this->categoriaPadre_id = $categoria->categoriaPadre_id;
        $this->idioma_id = $categoria->idioma_id;
        $this->categoria = $categoria->categoria;
        $this->slug = $categoria->slug;
        $this->descripcion = $categoria->descripcion;
        $this->menu = $categoria->menu;
        $this->orden = $categoria->orden;
        $this->modulo_id = $categoria->modulo_id;
        $this->abrirModal();
    }

    public function borrar($id)
    {
        Categoria::find($id)->delete();
        session()->flash('message', 'Registro eliminado correctamente');
    }

    public function guardar()
    {
        Categoria::updateOrCreate(
            ['id' => $this->id_categoria],
            [
                'categoriaPadre_id' => $this->categoriaPadre_id,
                'idioma_id' => $this->idioma_id,
                'categoria' => $this->categoria,
                'descripcion' => $this->descripcion,

                'slug' => $this->slug,
                'imagen' => 'foto.jpg',
                'menu' => $this->menu,
                'orden' => $this->orden,
                'modulo_id' => $this->modulo_id,
                'estado' => 1
            ]
        );

        session()->flash(
            'message',
            $this->id_categoria ? '¡Actualización exitosa!' : '¡Alta Exitosa!'
        );

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
