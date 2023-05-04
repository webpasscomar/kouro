<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\CategoriaController;
use App\Http\Livewire\Carrito;
use App\Http\Livewire\MercadoPago;
use App\Http\Livewire\Nosotros;
use App\Http\Livewire\ProductosFront;
use App\Http\Livewire\ProductoFront;
// use App\Http\Livewire\ContactoFront;
// use App\Http\Livewire\NosotrosFront;
use App\Http\Controllers\WebhooksController;
use App\Http\Controllers\MpController;



// Route::get('/productos', ProductosFront::class)->name('productos.index');
// Route::get('/productos/{categoria}', [\App\Http\Livewire\ProductosFront::class, 'setCategoria'])->name('productos.categoria');
// Route::get('/productos/{id}', ProductoFront::class)->name('producto');

// Route::get('/categorias', [CategoriaController::class, 'index']);

Route::get('/shop', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/shop/{categoria}', [ProductoController::class, 'categoria'])->name('productos.categoria');
Route::get('/shop/{categoria}/{id}', ProductoFront::class)->name('productos.show');


Route::get('/contacto', [ContactController::class, 'index'])->name('contacto');
Route::post('/contacto', [ContactController::class, 'store'])->name('contacto.store');

Route::get('/carrito', Carrito::class)->name('carrito');
Route::get('/mercadopago',MercadoPago::class)->name('mercadopago');

Route::get('/nosotros', Nosotros::class)->name('nosotros');



Route::get('/pagomp/{datos}/pago', [MpController::class, 'pago'])->name('pagomp.pago'); //url de testing
Route::get('/pagosmp/{datos}/pagos', [MpController::class, 'pagos'])->name('pagomp.pagos'); //url de producccion

Route::post('/webhooks',  WebhooksController::class);


Route::get('preguntas-frecuentes', [FaqController::class, 'index'])->name('faqs.index');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
