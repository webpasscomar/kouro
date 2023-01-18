<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\Producto;
use Livewire\WithPagination;

class Productos extends Component
{


    // Atributos
    public $nombre;
    public $desCorta;
    public $descLarga;

    public $codigo;
    public $presentacion_id;
    public $precioLista;

    public $precioOferta;
    public $ofertaDesde;
    public $ofertaHasta;

    public $peso;
    public $tamano;
    public $link;

    public $orden;
    public $unidadVenta;
    public $destacar;

    public $estado;

    // Parametros generales
    public $modal = false;
    public $search;
    public $sort = 'id';
    public $order = 'desc';


    public $producto, $id_producto;

    use WithPagination;

    protected $productos;

    // Parametros para el multistep
    public $totalSteps = 4;
    public $currentStep = 1;


    public function mount()
    {
        // Defino en 1 el paso si es multistep
        // $this->currentStep = 1;
    }





    public function render()
    {
        $this->productos = Producto::where('nombre', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->order)
            ->paginate(5);
        return view('livewire.backend.productos', ['productos' => $this->productos]);
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

    public function editar($id)
    {
        $producto = Producto::findOrFail($id);
        $this->id_producto = $id;
        $this->nombre = $producto->nombre;
        $this->abrirModal();
    }

    public function borrar($id)
    {
        Producto::find($id)->delete();
        session()->flash('message', 'Registro eliminado correctamente');
    }

    public function guardar()
    {
        Producto::updateOrCreate(
            ['id' => $this->id_color],
            [
                'color' => $this->color,
            ]
        );

        //session(['idCarrito' => $this->id_parametro]);

        session()->flash(
            'message',
            $this->id_color ? '¡Actualización exitosa!' : '¡Alta Exitosa!'
        );

        $this->cerrarModal();
        $this->limpiarCampos();
    }














    public function validateData()
    {

        if ($this->currentStep == 1) {
            $this->validate([
                'nombre' => 'required|string',
                'desCorta' => 'required|string',
                'descLarga' => 'required|string',
                'codigo' => 'required',
                'presentacion_id' => 'required|digits:1'
            ]);
        } elseif ($this->currentStep == 2) {
            $this->validate([
                'email' => 'required|email|unique:students',
                'phone' => 'required',
                'country' => 'required',
                'city' => 'required'
            ]);
        } elseif ($this->currentStep == 3) {
            $this->validate([
                'frameworks' => 'required|array|min:2|max:3'
            ]);
        }
    }

    public function increaseStep()
    {
        $this->resetErrorBag();
        $this->validateData();
        $this->currentStep++;
        if ($this->currentStep > $this->totalSteps) {
            $this->currentStep = $this->totalSteps;
        }
    }

    public function decreaseStep()
    {
        $this->resetErrorBag();
        $this->currentStep--;
        if ($this->currentStep < 1) {
            $this->currentStep = 1;
        }
    }

    public function register()
    {
        $this->resetErrorBag();
        if ($this->currentStep == 4) {
            $this->validate([
                'cv' => 'required|mimes:doc,docx,pdf|max:1024',
                'terms' => 'accepted'
            ]);
        }

        $cv_name = 'CV_' . $this->cv->getClientOriginalName();
        $upload_cv = $this->cv->storeAs('students_cvs', $cv_name);

        if ($upload_cv) {
            $values = array(
                "first_name" => $this->first_name,
                "last_name" => $this->last_name,
                "gender" => $this->gender,
                "email" => $this->email,
                "phone" => $this->phone,
                "country" => $this->country,
                "city" => $this->city,
                "frameworks" => json_encode($this->frameworks),
                "description" => $this->description,
                "cv" => $cv_name,
            );

            Producto::insert($values);
            //   $this->reset();
            //   $this->currentStep = 1;
            $data = ['name' => $this->first_name . ' ' . $this->last_name, 'email' => $this->email];
            return redirect()->route('productos.success', $data);
        }
    }
}
