<?php

namespace App\Http\Livewire\Backend;


use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


use App\Models\Galeria;


class Galerias extends Component
{
    public $nombre, $descripcion, $imagen, $id_galeria;
    public $orden = 1;
    public $estado = 1;
    public $user;


    public $modal = false;
    public $search;
    public $sort = 'id';
    public $order = 'desc';
    public $accion;
    public $cambioImg = false;

    protected $galeriaImagenes;
    protected $galeriaAnt;
    protected $galerias;

    protected $listeners = ['delete'];

    use WithPagination;
    use WithFileUploads;

    protected function rules()
    {
        if (($this->cambioImg === true && $this->accion === 'editar') ||
            $this->accion === 'crear'
        ) {
            return [
                'nombre' => 'required|max:20',
                'imagen' => 'required|mimes:jpg,png|max:1024',
            ];
        } else {
            return [
                'nombre' => 'required|max:20',
            ];
        }
    }

    public function render()
    {

        $this->user = Auth::user();
        $this->galeriaAnt = Galeria::where('estado', 1)->get();
        $this->galeriaImagenes = Galeria::where(
            function ($q) {
                $q->where('descripcion', 'like', '%' . $this->search . '%')
                    ->orWhere('nombre', 'like', '%' . $this->search . '%');
            }
        )
            ->orderBy($this->sort, $this->order)
            ->paginate(10);

        return view('livewire.backend.galerias', ['galerias' => $this->galeriaImagenes]);
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

        $this->nombre = '';
        $this->descripcion = '';
        $this->imagen = '';
        $this->orden = 0;
        $this->estado = 0;
        $this->id_galeria = 0;
    }

    public function editar($id)
    {
        $this->accion = 'editar';

        $galeria = Galeria::findOrFail($id);
        $this->id_galeria = $id;
        $this->nombre = $galeria->nombre;
        $this->descripcion = $galeria->descripcion;
        $this->imagen = $galeria->imagen;
        $this->orden = $galeria->orden;
        $this->abrirModal();
    }

    public function borrar($id)
    {
        Galeria::find($id)->delete();
        session()->flash('message', 'Registro eliminado correctamente');
    }

    public function delete($id)
    {
        Galeria::find($id)->delete();
    }

    public function guardar()
    {
        $this->validate();

        if ($this->cambioImg) {
            ////
            //// borrar imagen anterior storage
            ////
            $imagen_name = $this->imagen->getClientOriginalName();
            $upload_imagen = $this->imagen->storeAs('galeria', $imagen_name);
            $this->cambioImg = false;
        } else {
            $imagen_name = $this->imagen;
        }

        Galeria::updateOrCreate(
            ['id' => $this->id_galeria],
            [
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion,
                'imagen' => $imagen_name,
                'orden' => $this->orden,
                'estado' => 1,
                'usuario' => $this->user->name,
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
