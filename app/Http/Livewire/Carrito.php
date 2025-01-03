<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Formadeentrega;
use App\Models\Provincia;
use App\Models\Localidad;
use App\Models\Sku;
use App\Models\Formasdepagos;
use App\Models\Pedido;
use App\Models\Movimiento;
use App\Models\Pedido_item;



class Carrito extends Component
{

    protected $listeners = ['remove-item-cart' => 'delete'];
    protected $formasdeentregas, $provincias, $localidades, $formasdepagos;

    public $entrega_id;
    public $pidedirec = 0;
    public $costoentrega;

    public $cli_nombre, $cli_apellido, $cli_email, $cli_telefono, $cli_calle, $cli_nro, $cli_piso, $cli_dpto;
    public $cli_prov_id, $cli_loc_id;
    public $apagar = 0;
    public $forma_pago_id = 0;
    public $numero_pedido;
    public $cobra = 0;


    //estas publicas las usa ´para ir a pagar
    //despues de eliminar los valores de las
    //variables de session
    public $articulos, $importe, $delivery, $cant_art;


    // public function mount()
    // {
    //     $this->tomarvalores();
    // }

    public function render()
    {
        $this->formasdeentregas = Formadeentrega::where('estado', 1)->get();
        $this->formasdepagos = Formasdepagos::where('estado', 1)->get();
        $this->provincias = Provincia::where('estado', 1)->get();

        // $this->tomarvalores();

        if ($this->cli_prov_id != 0) {
            $this->localidades = Localidad::where('estado', 1)
                ->where('provincia_id', $this->cli_prov_id)
                ->get();
        } else {
            $this->cli_loc_id = 0;
        }

        //si alguna vez comenzo a cargar el formulario lo guardo en session

        if ($this->forma_pago_id != 0) {
            $this->cobra = Formasdepagos::where('id', $this->forma_pago_id)->value('cobra');
        }

        return view('livewire.carrito', [
            'formasdeentregas' => $this->formasdeentregas,
            'formasdepagos' => $this->formasdepagos,
            'provincias' => $this->provincias,
            'localidades' => $this->localidades,
        ]);
    }


    public function  vamosashop()
    {
        return redirect()->route('productos.index');
    }


    protected function rules()
    {

        if ($this->pidedirec == 1) { //valida pedido con direccion requerida
            return [
                'cli_nombre'     => 'required|string',
                'cli_apellido'   => 'required|string',
                'cli_email'      => 'required|email',
                'cli_telefono'   => 'required',
                'entrega_id'     => 'required|not_in:0',
                'cli_calle'      => 'required',
                'cli_nro'        => 'required|numeric',
                'cli_prov_id'    => 'required|not_in:0',
                'cli_loc_id'     => 'required|not_in:0'
            ];
        } else {  //valida pedido sin direccion requerida
            return [
                'cli_nombre'     => 'required',
                'cli_apellido'   => 'required',
                'cli_email'      => 'required|email',
                'cli_telefono'   => 'required',
                'entrega_id'     => 'required|not_in:0'
            ];
        }
    }

    protected function messages()
    {
        return [
            'cli_nombre.required'    => 'Debe ingresar el nombre',
            'cli_nombre.string'      => 'El nombre no puede ser numerico',
            'cli_apellido.required'  => 'Debe ingresar el apellido',
            'cli_apellido.string'    => 'El apellido no puede ser numerico',
            'cli_email.required'     => 'Debe ingresar un E-mail',
            'cli_email.email'        => 'El E-mail no es valido',
            'cli_telefono.required'   => 'Debe ingresar un telefono',
            'entrega_id.not_in'  => 'Seleccione una forma de entrega válida',
            'entrega_id.required'  => 'Seleccione una forma de entrega',
            'cli_calle.required' => 'Debe ingresar una calle',
            'cli_nro.required'   => 'Debe ingresar el numero',
            'cli_nro.numeric'    => 'Debe ingresar un valor numerico',
            'cli_piso.numeric'    => 'Debe ingresar un valor numerico',
            'cli_prov_id.not_in' => 'Debe seleccionar una provincia',
            'cli_prov_id.required' => 'Debe seleccionar una provincia',
            'cli_loc_id.not_in' => 'Debe seleccionar una localidad',
            'cli_loc_id.required' => 'Debe seleccionar una localidad',
        ];
    }



    //grabamos el carrito
    public function cerrarCarrito()
    {

        $this->validate();


        if (parametro(10) === 'S') {

            $items = session('items');
            $cantitems = count($items);
            $ok = 1;
            for ($i = 0; $i < $cantitems; $i++) {
                $producto =  $items[$i]['producto_id'];
                $talle    =   $items[$i]['talle_id'];
                $color    =   $items[$i]['color_id'];
                $cantidad =  $items[$i]['cantidad'];
                $dispo = Sku::where('producto_id', $producto)
                    ->where('talle_id', $talle)
                    ->where('color_id', $color)
                    ->value('stock');
                if ($dispo < $cantidad) {
                    $mensaje = 'La cantidad solicitada del producto ' . $items[$i]['producto_nombre'] .
                        ' talle ' .  $items[$i]['talle_nombre'] . ' color ' . $items[$i]['color_nombre'] .
                        ' no se encuentra en stock solo hay ' . $dispo . ',  por favor verifique las cantidades en su pedido';
                    $this->emit('mensajeNegativo', ['mensaje' => $mensaje]);
                    $ok = 0;
                    break;
                }
            }

            if ($ok == 1) {
                //grabar pedido
                $this->numero_pedido = null;
                $this->numero_pedido = $this->grabarPedido();

                if ($this->numero_pedido) {
                    $this->articulos = session('items');
                    $this->importe = session('sub_total');
                    $this->delivery = session('costoentrega');
                    $this->cant_art = count(session('items'));
                    // session(['items' => null, 'cantidad' => 0, 'sub_total' => 0, 'costoentrega' => 0]);
                    $this->apagar = 1;

                    // $this->emit('cantidad_carrito', ['cantidad' => session('cantidad')]);


                    //si la forma de entrega requiere cobro
                    //$this->cobra = Formadeentrega::where('id', $this->entrega_id)->value('cobra');
                    //if ($this->cobra  == '1') {

                    // $this->emit('mensajePositivo', ['mensaje' => 'Ya finalizaste tu compra, vamos a pagar el pedido ' . $this->numero_pedido->id]);
                    // }else{
                    //     $this->emit('mensajePositivo', ['mensaje' => 'Ya finalizaste tu compra, pedido ' . $this->numero_pedido->id]);
                    // return redirect()->route('productos.index');
                    //   redirect()->to('/shop');

                    //}
                    //$this->pagar($articulos, $importe, $delivery, $this->forma_pago_id);

                }
            }
        }
    }


    public function pagar()
    {
        $opciones = [
            'items' => $this->articulos,
            'total' => $this->importe,
            'envio' => $this->delivery,
            'cant_art' => $this->cant_art,
            'nro_pedido' => $this->numero_pedido->id
        ];

        switch ($this->forma_pago_id) {
            case 1: //efectivo contra entrega
                break;
            case 2:  //mercado pago
                session(['items' => null, 'cantidad' => 0, 'sub_total' => 0, 'costoentrega' => 0]);
                redirect()->to('/mercadopago')->with([
                    'opciones' => $opciones,
                ]);
                break;
            case 3: //modo
                break;
            default:
                redirect()->to('/carrito'); //vuelve al carrito
        };
    }





    //borra items del carrito
    public function delete($idproducto, $idtalle, $idcolor)
    {

        $items = session('items');
        if ($items) {
            $cantitems = count($items);
            for ($i = 0; $i < $cantitems; $i++) {
                if (
                    $items[$i]['producto_id'] == $idproducto &&
                    $items[$i]['talle_id'] == $idtalle &&
                    $items[$i]['color_id'] == $idcolor
                ) {

                    //elimino el elemento del array
                    unset($items[$i]);
                    //reordeno indices para que no queden espacios en null
                    $items = array_values($items);
                    break;
                }
            }
            //cuento la cantidad
            $cantitems = count($items);
            $subtotal = 0;
            for ($i = 0; $i < $cantitems; $i++) {
                $subtotal += $items[$i]['total_item'];
            }


            //actualizo la sesion los items y la cantidad total de items
            session(['items' => $items, 'cantidad' => $cantitems, 'sub_total' => $subtotal]);

            //envio al icono de carrito
            $this->emit('carrito', ['mensaje' => 'Se elimino  el producto de carrito', 'cantidad' => session('cantidad')]);
        }
    }



    //selecciona la forma de entrega
    public function tipoentrega()
    {
        $forma = Formadeentrega::where('id', $this->entrega_id)->first();
        if ($forma) {
            $this->pidedirec =  $forma['pidedirec'];
            if ($this->pidedirec == 0) {
                $this->cli_prov_id = 0;
                $this->cli_loc_id = 0;
            }
            $this->costoentrega = $forma['costo'];
        } else {
            $this->cli_prov_id = 0;
            $this->cli_loc_id = 0;
            $this->pidedirec = 0;
            $this->costoentrega = 0;
        }
        session(['entrega_id' => $this->entrega_id, 'pidedirec' => $this->pidedirec, 'costoentrega' => $this->costoentrega]);
    }





    //graba el pedido
    public function grabarPedido()
    {

        $items = session('items');
        $indice_productos = count($items);
        $costototal = 0;

        for ($i = 0; $i < $indice_productos; $i++) {
            $costototal = $costototal + ($items[$i]['cantidad'] * $items[$i]['producto_precio']);
        }

        if ($this->pidedirec == 0) {
            $this->cli_calle = "";
            $this->cli_nro = 0;
            $this->cli_piso = "";
            $this->cli_dpto = "";
        } else {
            if ($this->cli_piso == null) {
                $this->cli_piso = '';
            }
            if ($this->cli_dpto == null) {
                $this->cli_dpto = '';
            }
        }

        //actualiza cabecera
        $lastid = Pedido::Create(
            [
                'apellido'      => $this->cli_apellido,
                'nombre'        => $this->cli_nombre,
                'cantidadItems' => $indice_productos,
                'cliente_id'    => 0,
                'correo'        => $this->cli_email,
                'del_calle'     => $this->cli_calle,
                'del_nro'       => $this->cli_nro,
                'del_piso'      => $this->cli_piso,
                'del_dpto'      => $this->cli_dpto,
                'del_costo'     => session('costoentrega'),
                'entrega_id'    => $this->entrega_id,
                'estado_id'     => 1,
                'fecha'         => date('Y-m-d H:i:s'),
                'provincia_id'  => $this->cli_prov_id,
                'localidad_id'  => $this->cli_loc_id,
                'observaciones' => '',
                'subTotal'      => $costototal,
                'sucursal_id'   => 0,
                'telefono'      => $this->cli_telefono,
                'total'         => session('sub_total') + session('costoentrega'),
            ]
        );


        for ($i = 0; $i < $indice_productos; $i++) {
            //la baja de stock la hacemos cuando paga el pedido a menos
            //que el parametro de cobro electronico este apagado
            //en ese caso lo hacemos aca si el parametro de maneja stock esta prendido

            //obtengo el id del sku
            $sku_id = Sku::where('producto_id', $items[$i]['producto_id'])
                ->where('talle_id', $items[$i]['talle_id'])
                ->where('color_id', $items[$i]['color_id'])
                ->value('id');


            if (parametro(10) === 'S') {   //control de stock
                if (parametro(4) === 'N') {   //no utiliza pasarela de pago
                    //// actualizamos stock sku

                    ////obtenemos la cantidad original de stock
                    $canti_ori = Sku::where('producto_id', $items[$i]['producto_id'])
                        ->where('talle_id', $items[$i]['talle_id'])
                        ->where('color_id', $items[$i]['color_id'])
                        ->value('stock');

                    if ($canti_ori === null) {
                        $canti_ori = 0;
                    }

                    //actualizo stock
                    $cantidad = $canti_ori - $items[$i]['cantidad'];
                    Sku::updateOrCreate(
                        [
                            'producto_id' => $items[$i]['producto_id'],
                            'talle_id'    => $items[$i]['talle_id'],
                            'color_id'    => $items[$i]['color_id'],
                        ],
                        [
                            'stock' => $cantidad,
                            'estado' => 1
                        ]
                    );


                    //// grabamos en historia en movimiento
                    Movimiento::Create([
                        'tipoMovimiento_id' => 2,
                        'sku_id' => $sku_id,
                        'cantidad' => $items[$i]['cantidad'],
                        'pedido_id' => $lastid['id'],
                        'estado' => 0,   //no se que es
                        'user_id' => 0,
                    ]);
                }
            }

            Pedido_item::Create([
                'cantidad' => $items[$i]['cantidad'],
                'pedido_id' => $lastid['id'],
                'precioItem' => $items[$i]['producto_precio'] * $items[$i]['cantidad'],
                'precioUnitario' => $items[$i]['producto_precio'],
                'sku_id' => $sku_id,
                'vacio' => 0
            ]);
        }
        return  $lastid;
    }
}
