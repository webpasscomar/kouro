<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sku;
use App\Models\Stock_pendiente;





class Dashboard extends Component
{

  public  $existencias_count;
  public $stock_count,$products_count, $products_pend,$categories_count,$sizes_count,$colors_count;
  public  $orders_count, $testimonies_count, $parameters_count, $delivery_methods_count, $faq_count, $contact_messages_count;
  public  $gallery_count, $places_count, $show_count,$stock_pend;


  public function render()
  {

    $this->existencias_count = Sku::count();
    $this->stock_count       = Sku::sum('stock');
    $this->stock_pend        = Stock_pendiente::where('fechaRespuesta',  '=', null)->count();





    $this->products_count = 5;

    $this->categories_count = 5;
    $this->sizes_count = 5;
    $this->colors_count = 5;
    $this->orders_count = 5;
    $this->testimonies_count = 5;
    $this->parameters_count = 5;
    $this->delivery_methods_count = 5;
    $this->faq_count = 5;
    $this->contact_messages_count = 5;
    $this->gallery_count = 5;
    $this->places_count = 5;
    $this->show_count = 5;



    return view('livewire.dashboard');
  }
}
