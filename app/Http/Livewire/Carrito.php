<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Formadeentrega;
use App\Models\Provincia;
use App\Models\Localidad;



class Carrito extends Component
{

    protected $listeners = ['delete'];
    protected $formasdeentregas,$provincias,$localidades;

    public $entrega_id;
    public $pidedirec;
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

            //envio al icono de cart
            $this->emit('carrito', ['mensaje' => 'Se elimino  el producto de carrito', 'cantidad' => session('cantidad')]);
        }
    }



    //selecciona la forma de entrega
    public function tipoentrega()
    {
        $forma = Formadeentrega::where('id', $this->entrega_id)->first();
        $this->pidedirec =  $forma['pidedirec'];
        if ($this->pidedirec==0) {
            $this->cli_prov_id =0;
            $this->cli_loc_id=0;
        }
        $this->costoentrega = $forma['costo'];
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
