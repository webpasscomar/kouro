<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\Imagen;
use Livewire\WithPagination;

class Imagenes extends Component
{
    
    
    public $titulo,$imagen, $id_imagen;

    public $modal = false;
    public $search;
    public $sort = 'id';
    public $order = 'desc';

    use WithPagination;

    protected $imagenes;

    protected $rules = [
        'titulo' => 'required|min:6',
        'imagen' => 'NULLable|image|max:1024',   
    ];

    protected $messages = [
        'titulo.required' => 'El titulo es requerido',
        'titulo.min' => 'El titulo debe contener 6 caracteres como minio',
        'imagen.image' => 'Archivo de imagen no valido',
        'imagen.max' => 'Archivo excede el tamaño maximo de 1024 bytes',
    ];



    public function render()
    {
        $this->imagenes = Imagen::where('imagen', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->order)
            ->paginate(5);

        return view('livewire.backend.imagenes', ['imagenes' => $this->imagenes]);
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
        $this->titulo = '';
        $this->imagen = '';
    }

    public function editar($id)
    {
        $imagen = Imagen::findOrFail($id);
        $this->id_imagen = $id;
        $this->titulo = $imagen->titulo;
        $this->imagen = $imagen->imagen;
        $this->abrirModal();
    }

    public function borrar($id)
    {
        Imagen::find($id)->delete();
        session()->flash('message', 'Registro eliminado correctamente');
    }

    public function guardar()
    {


        //dd($this->titulo,$this->imagen);
        $this->validate();



        Imagen::updateOrCreate(
            ['id' => $this->id_imagen],
            [
                'imagen' => $this->imagen,
                'titulo' => $this->titulo
            ]
        );

        //session(['idCarrito' => $this->id_parametro]);

        session()->flash(
            'message',
            $this->id_imagen ? '¡Actualización exitosa!' : '¡Alta Exitosa!'
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
