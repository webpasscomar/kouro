<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sku;
use App\Models\Stock_pendiente;
use App\Models\Producto;
use App\Models\Category;
use App\Models\Talle;
use App\Models\Color;
use App\Models\Pedido;
use App\Models\Movimiento;
use App\Models\Testimonio;
use App\Models\Parametro;
use App\Models\Formadeentrega;
use App\Models\Faq;
use App\Models\Producto_imagen;
use App\Models\Presentacion;
use App\Models\Contacto;
use App\Models\Galeria;


class Dashboard extends Component
{

  public  $existencias_count;
  public $stock_count, $products_count, $products_pend, $categories_count, $sizes_count, $colors_count;
  public  $orders_count, $testimonies_count, $parameters_count, $delivery_methods_count, $faq_count, $contact_messages_count;
  public  $gallery_count, $places_count, $show_count, $stock_pend, $galeria_imagenes;


  public function render()
  {

    $this->existencias_count = Sku::count();
    $this->stock_pend        = Stock_pendiente::count();
    $this->products_count    = Producto::count();

    $this->categories_count  = Category::count();
    $this->sizes_count       = Talle::count();
    $this->colors_count      = Color::count();
    $this->orders_count      = Pedido::count();

    $this->testimonies_count = Testimonio::count();
    $this->parameters_count  = Parametro::count();
    $this->delivery_methods_count = Formadeentrega::count();
    $this->faq_count         = Faq::count();

    $this->contact_messages_count = contacto::count();
    $this->gallery_count = Producto_imagen::count();
    $this->places_count = 0;
    $this->show_count = Presentacion::count();

    $this->galeria_imagenes = Galeria::count();

    return view('livewire.dashboard-bs')->layout('layouts.adminlte');
  }
}
