<?php

namespace App\Http\Livewire\Backend;

use App\Models\Categoria;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Categorias extends Component
{
    public $categoriaPadre_id, $categoria, $descripcion, $slug, $imagen, $menu, $orden, $estado, $id_categoria, $categoriasAnt;

    public $modal = false;
    public $search;
    public $sort = 'id';
    public $order = 'desc';
    public $accion;
    public $cambioImg = false;

    protected $categorias;

    protected $listeners = ['delete'];

    use WithPagination;
    use WithFileUploads;

    protected function rules()
    {
        if (($this->cambioImg === true && $this->accion === 'editar') ||
            $this->accion === 'crear'
        ) {
            return [
                'categoria' => 'required|max:20',
                'imagen' => 'required|mimes:jpg,png|max:1024',
            ];
        } else {
            return [
                'categoria' => 'required|max:20',
            ];
        }
    }

    public function render()
    {
        $this->categoriasAnt = Categoria::where('estado', 1)->get();
        $this->categorias = Categoria::where('id', '>', 1)
            ->where(
                function ($q) {
                    $q->where('descripcion', 'like', '%' . $this->search . '%')
                        ->orWhere('categoria', 'like', '%' . $this->search . '%');
                }
            )
            ->orderBy($this->sort, $this->order)
            ->paginate(5);
        return view('livewire.backend.categorias', ['categorias' => $this->categorias]);
    }

    public function crear()
    {
        $this->accion = 'crear';
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
        $this->cambioImg = false;
    }

    public function limpiarCampos()
    {
        $this->categoriaPadre_id = '';
        $this->categoria = '';
        $this->descripcion = '';
        $this->slug = '';
        $this->imagen = '';

        $this->menu = '';
        $this->orden = '';
        $this->estado = '';
        $this->id_categoria = '';
    }

    public function editar($id)
    {
        $this->accion = 'editar';

        $categoria = Categoria::findOrFail($id);
        $this->id_categoria = $id;
        $this->categoriaPadre_id = $categoria->categoriaPadre_id;
        $this->categoria = $categoria->categoria;
        $this->slug = Str::slug($categoria->categoria);
        $this->descripcion = $categoria->descripcion;
        $this->menu = $categoria->menu;
        $this->imagen = $categoria->imagen;
        $this->orden = $categoria->orden;
        $this->abrirModal();
    }

    public function borrar($id)
    {
        Categoria::find($id)->delete();
        session()->flash('message', 'Registro eliminado correctamente');
    }

    public function delete($id)
    {
        Categoria::find($id)->delete();
    }

    public function guardar()
    {
        $this->validate();

        if ($this->cambioImg) {
            ////
            //// borrar imagen anterior storage
            ////
            $imagen_name = $this->imagen->getClientOriginalName();
            $upload_imagen = $this->imagen->storeAs('categorias', $imagen_name);

            $this->cambioImg = false;
        } else {
            $imagen_name = $this->imagen;
        }

        Categoria::updateOrCreate(
            ['id' => $this->id_categoria],
            [
                'categoriaPadre_id' => $this->categoriaPadre_id,
                'categoria' => $this->categoria,
                'descripcion' => $this->descripcion,

                'slug' => Str::slug($this->categoria),
                'imagen' => $imagen_name,
                'menu' => $this->menu,
                'orden' => $this->orden,
                'estado' => 1
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

    public function cambioImagen()
    {
        $this->cambioImg = true;
    }
}
