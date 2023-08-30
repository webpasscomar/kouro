<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\Carrito;
use App\Http\Livewire\MercadoPago;
use App\Http\Livewire\Nosotros;
use App\Http\Livewire\ProductosFront;
use App\Http\Livewire\ProductoFront;
use App\Http\Livewire\Sucursales;
use App\Http\Controllers\WebhooksController;
use App\Http\Controllers\MpController;

use Illuminate\Support\Facades\DB;



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/shop/{categoria}', [ProductoController::class, 'categoria'])->name('productos.categoria');
Route::get('/shop/{categoria}/{id}', ProductoFront::class)->name('productos.show');
Route::get('/carrito', Carrito::class)->name('carrito');

Route::get('/contacto', [ContactController::class, 'index'])->name('contacto');
Route::post('/contacto', [ContactController::class, 'store'])->name('contacto.store');

Route::get('/nosotros', Nosotros::class)->name('nosotros');
Route::get('/sucursales', Sucursales::class)->name('sucursales');
Route::get('preguntas-frecuentes', [FaqController::class, 'index'])->name('faqs.index');

// Pagos y métodos de pago
Route::get('/mercadopago', MercadoPago::class)->name('mercadopago');
Route::get('/pagomp/{datos}/pago', [MpController::class, 'pago'])->name('pagomp.pago'); //url de testing
Route::post('/webhooks',  WebhooksController::class);


// Route::get('/', function () {

//     $fotos_slider = Galeria::where('estado', '=', 1)->get();


//     $destacados =  Producto_imagen::select('productos_imagenes.producto_id', 'productos_imagenes.file_path', 'productos.nombre', 'productos.desCorta')
//         ->leftJoin('productos', 'productos.id', 'productos_imagenes.producto_id')
//         ->where('destacar', 1)
//         ->groupBy('productos_imagenes.producto_id')
//         ->get();

//     foreach ($destacados as $destacado) {
//         if ($destacado->file_path) {
//             $destacado->file_path = basename($destacado->file_path);
//         } else {
//             $destacado->file_path = 'sin_imagen.jpg';
//         }
//     }


//     return view('welcome', ['slider' => $fotos_slider, 'destacados' => $destacados]);
// })->name('welcome');
