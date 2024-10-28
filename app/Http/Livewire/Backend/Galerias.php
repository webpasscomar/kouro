<?php

namespace App\Http\Livewire\Backend;


use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


use App\Models\Galeria;
use Illuminate\Support\Facades\Storage;

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
                'nombre' => 'required|max:20|min:1',
                'imagen' => 'required|mimes:jpg,png,jpeg|max:2048',
                'descripcion' => 'nullable|string|max:255',
                'orden' => 'nullable|integer|min:0',
            ];
        } else {
            return [
                'nombre' => 'required|max:20|min:1',
                'descripcion' => 'nullable|string|max:255',
                'orden' => 'nullable|integer|min:0',
            ];
        }
    }

    public function messages()
    {
        return [
            'nombre.required' => 'Ingrese un nombre',
            'nombre.max' => 'No puede ser mayor a 20 caracteres',
            'nombre.min' => 'Debe contener al menos 1 caracter',
            'imagen.required' => 'La imágen es requerida',
            'imagen.mimes' => 'El formato no es correcto',
            'imagen.max' => 'El peso es mayor a 2mb',
            'descripcion.string' => 'Ingrese una descripción válida',
            'descripcion.max' => 'Máximo permitido 255 caracteres',
            'orden.integer' => 'Ingrese un número válido',
            'orden.min' => 'Valor mínimo 0'
        ];
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
        return redirect()->route('galeria.index');
    }

    public function limpiarCampos()
    {

        $this->nombre = '';
        $this->descripcion = '';
        $this->imagen = '';
        $this->orden = 0;
        $this->estado = 0;
        $this->id_galeria = 0;
        $this->resetErrorBag();
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

    // public function borrar($id)
    // {
    //     Galeria::find($id)->delete();
    //     session()->flash('message', 'Registro eliminado correctamente');
    // }

    // public function delete($id)
    // {
    //     Galeria::find($id)->delete();
    // }

    public function guardar()
    {
        $this->validate();

        try {
            if ($this->cambioImg) {
                // Si estamos editando y cambiamos la imágen, eliminamos la anterior

                if ($this->accion == 'editar') {
                    $slide = Galeria::findOrFail($this->id_galeria);
                    if (Storage::disk('public')->exists('galeria/' . $slide->imagen)) {
                        Storage::disk('public')->delete('galeria/' . $slide->imagen);
                    }
                }

                $imagen_name = $this->imagen->getClientOriginalName();
                $upload_imagen = $this->imagen->storeAs('galeria', $imagen_name);
                $this->cambioImg = false;
            } else {
                $slide = Galeria::findOrFail($this->id_galeria);
                $imagen_name = $slide->imagen;
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

            $this->limpiarCampos();
            $this->cerrarModal();

            // Mensaje de eliminación ó actualización correcta según la ocasión
            if ($this->accion == 'editar') {
                toast('El slide se actualizó correctamente', 'success');
                return redirect()->route('galeria.index');
            } else if ($this->accion == 'crear') {
                toast('El slide se agregó correctamente', 'success');
                return redirect()->route('galeria.index');
            }
        } catch (\Throwable $th) {
            dd($th);
            toast('No se pudo realizar la operación correctamente', 'error');
            return redirect()->route('galeria.index');
        }
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
