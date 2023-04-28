<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Formadeentrega;
use App\Models\Provincia;
use App\Models\Localidad;
use App\Models\Sku;



class Carrito extends Component
{

    protected $listeners = ['delete'];
    protected $formasdeentregas,$provincias,$localidades;

    public $entrega_id;
    public $pidedirec=0;
    public $costoentrega;

    public $cli_nombre, $cli_apellido, $cli_email, $cli_telefono,$cli_calle,$cli_nro,$cli_piso,$cli_dpto;
    public $cli_prov_id, $cli_loc_id;


    // public function mount()
    // {
    //     $this->tomarvalores();
    // }


    public function render()
    {
        $this->formasdeentregas = Formadeentrega::where('estado', 1)->get();
        $this->provincias = Provincia::where('estado', 1)->get();

      // $this->tomarvalores();


        if ($this->cli_prov_id != 0) {
            $this->localidades = Localidad::where('estado', 1)
                                ->where('provincia_id',$this->cli_prov_id)
                                ->get();
        }else{
            $this-> cli_loc_id=0;
        }

        //si alguna vez comenzo a cargar el formulario lo guardo en session




        return view('livewire.carrito', [
            'formasdeentregas' => $this->formasdeentregas,
            'provincias' => $this->provincias,
            'localidades' => $this->localidades,
        ]);
    }


    protected function rules()
    {

      if ($this->pidedirec==1) { //valida pedido con direccion requerida
                return [
                    'cli_nombre'     => 'required|string',
                    'cli_apellido'   => 'required|string',
                    'cli_email'      => 'required|email',
                    'cli_telefono'   => 'required',
                    'entrega_id'     => 'required|not_in:0',
                    'cli_calle'      => 'required',
                    'cli_nro'        => 'required|numeric',
                    'cli_prov_id' => 'required|not_in:0',
                    'cli_loc_id' => 'required|not_in:0'
                ];
            }else{  //valida pedido sin direccion requerida
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
            'cli_nombre.required'    => 'Debe ingresar el nombre.',
            'cli_nombre.string'      => 'El nombre no puede ser numerico.',
            'cli_apellido.required'  => 'Debe ingresar el apellido',
            'cli_apellido.string'    => 'El apellido no puede ser numerico.',
            'cli_email.required'     => 'Debe ingresar un E-mail',
            'cli_email.email'        => 'El E-mail no es valido',
            'cli_telefono.required'   => 'Debe ingresar un telefono',
            'entrega_id.not_in'  => 'Debe seleccionar una forma de entrega.',
            'cli_calle.required' => 'Debe ingresar una calle',
            'cli_nro.required'   => 'Debe ingresar el numero',
            'cli_nro.numeric'    => 'Debe ingresar un valor numerico.',
            'cli_piso.numeric'    => 'Debe ingresar un valor numerico.',
            'cli_prov_id.not_in' => 'Debe seleccionar una provincia',
            'cli_loc_id.not_in' => 'Debe seleccionar una localidad',
        ];
    }



    //grabamos el carrito
    public function cerrarCarrito() {

        $this->validate();


        if (parametro(10) === 'S') {

            $items = session('items');
            $cantitems = count($items);
            $ok=1;
            for ($i = 0; $i < $cantitems; $i++) {
                    $producto =  $items[$i]['producto_id'];
                    $talle    =   $items[$i]['talle_id'] ;
                    $color    =   $items[$i]['color_id'];
                    $cantidad =  $items[$i]['cantidad'];
                    $dispo = Sku::where('producto_id', $producto)
                    ->where('talle_id', $talle)
                    ->where('color_id', $color)
                    ->value('stock');
                     if ($dispo < $cantidad  ) {
                        $mensaje = 'La cantidad solicitada del producto ' . $items[$i]['producto_nombre'] .
                                    ' talle ' .  $items[$i]['talle_nombre'] . ' color ' . $items[$i]['color_nombre'] .
                        ' no se encuentra en stock, por favor verifique las cantidades en su pedido';
                        $this->emit('mensajeNegativo', ['mensaje' => $mensaje]);
                        $ok=0;
                        break;
                     }
            }

            if ($ok==1) {
                $this->emit('mensajePositivo', ['mensaje' => 'Ya finalizaste tu compra']);
             }

        }
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
            if ($this->pidedirec==0) {
                $this->cli_prov_id =0;
                $this->cli_loc_id=0;
            }
            $this->costoentrega = $forma['costo'];
        }else{
            $this->cli_prov_id =0;
            $this->cli_loc_id=0;
            $this->pidedirec =0;
            $this->costoentrega = 0;

        }
        session(['entrega_id' => $this->entrega_id, 'pidedirec' => $this->pidedirec, 'costoentrega' => $this->costoentrega]);
    }





    // //guardo los valores del form en variables de session
    // public function guardarvalores() {
    //     session(['cli_nombre' =>  $this->cli_nombre]);
    //     session(['cli_apellido' =>  $this->cli_apellido]);
    //     session(['cli_email' =>  $this->cli_email]);
    //     session(['cli_telefono' =>  $this->cli_telefono]);
    //     session(['cli_calle' =>  $this->cli_calle]);
    //     session(['cli_nro' =>  $this->cli_nro]);
    //     session(['cli_piso' =>  $this->cli_piso]);
    //     session(['cli_dpto' =>  $this->cli_dpto]);
    //     session(['cli_prov_id' =>  $this->cli_prov_id]);
    //     session(['cli_loc_id' =>  $this->cli_loc_id]);
    // }



    // //tomo los valores de session si fueron cargados alguna vez
    // public function tomarvalores() {
    //     $this->cli_nombre    = session('cli_nombre');
    //     $this->cli_apellido  = session('cli_apellido');
    //     $this->cli_email     = session('cli_email');
    //     $this->cli_telefono  = session('cli_telefono');
    //     $this->cli_calle     = session('cli_calle');
    //     $this->cli_nro       = session('cli_nro');
    //     $this->cli_piso      = session('cli_piso');
    //     $this->cli_dpto      = session('cli_dpto');
    //     $this->cli_prov_id   = session('cli_prov_id');
    //     $this->cli_loc_id    = session('cli_loc_id');
    // }


}
