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





    public function render()
    {
        $this->formasdeentregas = Formadeentrega::where('estado', 1)->get();
        $this->provincias = Provincia::where('estado', 1)->get();
        if ($this->cli_prov_id != 0) {
            $this->localidades = Localidad::where('estado', 1)
                                ->where('provincia_id',$this->cli_prov_id)
                                ->get();
        }else{
            $this-> cli_loc_id=0;
        }


        return view('livewire.carrito', [
            'formasdeentregas' => $this->formasdeentregas,
            'entrega_id' => $this->entrega_id,
            'pidedirec' => $this->pidedirec,
            'costoextrega' => $this->costoentrega,
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
            session(['items' => $items, 'cantidad' => $cantitems, 'sub_total' => $subtotal, 'envio' => $envio]);

            //envio al icono de cart
            $this->emit('carrito', ['mensaje' => 'Se elimino  el producto al carrito', 'cantidad' => session('cantidad')]);
        }
    }



    //selecciona la forma de entrega
    public function tipoentrega()
    {
        $forma = Formadeentrega::where('id', $this->entrega_id)->firstOrFail();
        $this->pidedirec =  $forma['pidedirec'];
        $this->costoentrega = $forma['costo'];
        session(['entrega_id' => $this->entrega_id, 'pidedirec' => $this->pidedirec, 'costoentrega' => $this->costoentrega]);
    }
}
