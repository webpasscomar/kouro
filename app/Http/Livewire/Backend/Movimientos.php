<?php

namespace App\Http\Livewire\Backend;

// use App\Http\Livewire\Product;
use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Tipomovimiento;
use App\Models\Producto;
use App\Models\Color;
use App\Models\Talle;
use App\Models\Sku;
use App\Models\Product;
use App\Models\Movimiento;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class Movimientos extends Component
{

    public $modal = false;
    public $search;
    public $sort = 'id';
    public $order = 'desc';
    public $indice_productos;
    public $cantidad_movimiento;

    public Producto $producto;


    public $movimientos = array();
    public $producto_id, $color_id, $talle_id, $cantidad, $tipomove_id;
    public $producto_nombre, $color_nombre, $talle_nombre;


    use WithPagination;

    protected $tipomovimientos;
    protected $productos, $colores, $talles;
    protected $estado = 1;

    protected $listeners = ['delete'];


    public function render()
    {

        //dd(auth()->user());

        $this->tipomovimientos = Tipomovimiento::all();
        $this->productos = Producto::where('estado', 1)->orderBy('nombre')->get();
        $this->colores = Color::where('estado', 1)->orderBy('color')->get();
        $this->talles = Talle::where('estado', 1)->orderBy('talle')->get();;

        return view(
            'livewire.backend.movimientos',
            [
                'movimientos' => $this->movimientos,
                'productos' => $this->productos,
                'colores' => $this->colores,
                'talles' => $this->talles,
                'tipomove' => $this->tipomovimientos,
            ]
        );
    }

    protected function rules()
    {
        $productos_existentes = Product::pluck('id')->toArray();
        $colores_existentes = Color::pluck('id')->toArray();
        $talles_existentes = Talle::pluck('id')->toArray();
        $movimientos_existentes = Tipomovimiento::pluck('id')->toArray();

        return [
            'tipomove_id' => ['required', Rule::in($movimientos_existentes)],
            'producto_id' => ['required', Rule::in($productos_existentes)],
            'color_id' => ['required', Rule::in($colores_existentes)],
            'talle_id' => ['required', Rule::in($talles_existentes)],
            'cantidad' => 'required|int|min:1',
        ];
    }

    protected $messages = [
        'tipomove_id.required' => 'Seleccione un movimiento',
        'tipomove_id.in' => 'El movimiento no es válido',
        'producto_id.required' => 'Seleccione un producto',
        'producto_id.in' => 'El producto no es válido',
        'color_id.required' => 'Seleccione un color',
        'color_id.in' => 'El color no es válido',
        'talle_id.required' => 'Seleccione un talle',
        'talle_id.in' => 'El talle no es válido',
        'cantidad.required' => 'Ingrese la cantidad',
        'cantidad.integer' => 'Ingrese una cantidad válida',
        'cantidad.min' => 'La cantidad mínima es 1'

        // 'unidadVenta.required' => 'La unidad de venta es requerida',
        // 'orden.required' => 'El orden es requerido',
    ];

    //guarda item
    public function guardar()
    {


        $this->validate();


        $this->indice_productos = count($this->movimientos);

        $this->producto_nombre = Producto::where('id', $this->producto_id)->value('nombre');
        $this->color_nombre = Color::where('id', $this->color_id)->value('color');
        $this->talle_nombre = Talle::where('id', $this->talle_id)->value('talle');


        $this->movimientos[$this->indice_productos] = [
            'producto_id' => $this->producto_id,
            'producto_descripcion' => $this->producto_nombre,
            'color_id' => $this->color_id,
            'color' => $this->color_nombre,
            'talle_id' => $this->talle_id,
            'talle' => $this->talle_nombre,
            'cantidad' => $this->cantidad,
            'tipoMovimiento_id' => $this->tipomove_id,
        ];

        $this->limpiarCampos();
    }

    public function finalizar()
    {

        if (count($this->movimientos) > 0) {
            foreach ($this->movimientos as $movimiento) {
                // Buscar el SKU existente
                $sku = Sku::where('producto_id', $movimiento['producto_id'])
                    ->where('talle_id', $movimiento['talle_id'])
                    ->where('color_id', $movimiento['color_id'])
                    ->first();

                // Si el SKU ya existe, actualizamos el stock
                // Buscamos el tipo de movimiento para saber si es un ingreso ó egreso y poder sumar ó restar al stock según la ocasión
                $tipo_movimiento = Tipomovimiento::where('id', '=', $movimiento['tipoMovimiento_id'])->value('descripcion');
                if ($sku) {
                    if (strpos(Str::lower($tipo_movimiento), 'ingreso') !== false) {
                        $sku->stock += $movimiento['cantidad'];
                    } else if (strpos(Str::lower($tipo_movimiento), 'egreso') !== false) {
                        $sku->stock -= $movimiento['cantidad'];
                    }
                    $sku->save();
                } else {
                    // Si el SKU no existe, creamos un nuevo registro
                    Sku::create([
                        'producto_id' => $movimiento['producto_id'],
                        'talle_id' => $movimiento['talle_id'],
                        'color_id' => $movimiento['color_id'],
                        'stock' => strpos(Str::lower($tipo_movimiento), 'egreso') !== false ? 0 - $movimiento['cantidad'] : $movimiento['cantidad'], // Inicializar con la cantidad del movimiento
                        'estado' => 1, // Ajustar según tu lógica
                    ]);
                }

                // Registrar el movimiento en el historial
                Movimiento::create([
                    'tipoMovimiento_id' => $movimiento['tipoMovimiento_id'],
                    'sku_id' => $sku ? $sku->id : Sku::where('producto_id', $movimiento['producto_id'])
                        ->where('talle_id', $movimiento['talle_id'])
                        ->where('color_id', $movimiento['color_id'])
                        ->value('id'),
                    'cantidad' => $movimiento['cantidad'],
                    'pedido_id' => 0,
                    'estado' => 0, // Ajustar según tu lógica
                    'user_id' => auth()->user()->id,
                ]);
            }
            session()->flash('message', '¡Stock actualizado exitosamente!');
            $this->emit('alertSave');
            $this->limpiarCampos();
            $this->movimientos = [];
            // $this->tipomove_id = 0;
        }


        // if (count($this->movimientos) > 0) {
        //     foreach ($this->movimientos as $movimiento) {
        //         // Crear el registro en la tabla Movimiento sin modificar el stock de Sku
        //         $sku_id = Sku::where('producto_id', $movimiento['producto_id'])
        //             ->where('talle_id', $movimiento['talle_id'])
        //             ->where('color_id', $movimiento['color_id'])
        //             ->value('id');

        //         Movimiento::create([
        //             'tipoMovimiento_id' => $this->tipomove_id,
        //             'sku_id' => $sku_id,
        //             'cantidad' => $movimiento['cantidad'],
        //             'pedido_id' => 0,
        //             'estado' => 0, // puedes ajustar este campo según tus necesidades
        //             'user_id' => auth()->user()->id,
        //         ]);
        //     }
        //     session()->flash('message', '¡Actualización exitosa!');
        //     $this->emit('alertSave');
        //     $this->limpiarCampos();
        //     $this->movimientos = [];
        // }





        // $resta = Tipomovimiento::where('id', $this->tipomove_id)->value('resta');

        // $this->indice_productos = count($this->movimientos);
        // if ($this->indice_productos > 0) {
        //     for ($i = 0; $i < count($this->movimientos); $i++) {
        ////obtenemos la cantidad original de stock
        // $canti_ori = Sku::where('producto_id', $this->movimientos[$i]['producto_id'])
        //     ->where('talle_id', $this->movimientos[$i]['talle_id'])
        //     ->where('color_id', $this->movimientos[$i]['color_id'])
        //     ->value('stock');
        // if ($canti_ori === null) {
        //     $canti_ori = 0;
        // }

        // $movimiento = Tipomovimiento::where('id', $this->tipomove_id)->first()->descripcion;

        // if (strpos(Str::lower($movimiento), 'ingreso') !== false) {
        //     dd(true);
        // }

        // dd(
        //     'Movimiento: ' . $movimiento,
        //     'cantidad: ' . $this->movimientos[$i]['cantidad'],
        //     'Producto_id: ' . $this->movimientos[$i]['producto_id'],
        //     'Color_id: ' . $this->movimientos[$i]['color_id'],
        //     'Talle_id: ' . $this->movimientos[$i]['talle_id'],
        // );


        //// actualizamos stock sku
        // if ($resta == 0) {
        //     $cantidad = $this->movimientos[$i]['cantidad'] + $canti_ori;
        // } else {
        //     $cantidad = $canti_ori - $this->movimientos[$i]['cantidad'];
        // }

        // Sku::create(
        //     [
        //         'producto_id' => $this->movimientos[$i]['producto_id'],
        //         'talle_id' => $this->movimientos[$i]['talle_id'],
        //         'color_id' => $this->movimientos[$i]['color_id'],
        //     ],
        //     [
        //         'stock' => $this->cantidad,
        //         'estado' => 1
        //     ]
        // );
        // //// grabamos en historia en movimiento
        // //obtengo el id del sku
        // $sku_id = Sku::where('producto_id', $this->movimientos[$i]['producto_id'])
        //     ->where('talle_id', $this->movimientos[$i]['talle_id'])
        //     ->where('color_id', $this->movimientos[$i]['color_id'])
        //     ->value('id');

        // Movimiento::Create(
        //     [
        //         'tipoMovimiento_id' => $this->tipomove_id,
        //         'sku_id' => $sku_id,
        //         'cantidad' => $this->cantidad,
        //         'pedido_id' => 0,
        //         'estado' => 0,   //no se que es
        //         'user_id' => auth()->user()->id,
        //     ]
        // );

        //    auth()->user() Obtenemos la instancia del usuario logueado
        //    auth()->user()->name
        //    auth()->user()->email
        //    auth()->user()->id


        //     }
        //     session()->flash('message', '¡Actualización exitosa!');
        //     $this->emit('alertSave');
        //     $this->limpiarCampos();
        //     $this->movimientos = [];
        //     $this->cantidad_movimiento = '';
        // }
    }

    public function limpiarCampos()
    {
        $this->producto_id = 0;
        $this->talle_id = 0;
        $this->color_id = 0;
        $this->cantidad = '';
        $this->tipomove_id = 0;
        $this->resetErrorBag();

        // if (empty($this->movimientos)) {
        //     $this->tipomove_id = 0;
        // }
    }

    public function delete($id)
    {
        //elimina por indice
        unset($this->movimientos[$id]);
        //re acomoda el vector para que noque posiciones null
        $this->movimientos = array_values($this->movimientos);
    }
}
