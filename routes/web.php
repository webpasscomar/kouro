<?php

use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;


use App\Http\Livewire\Backend\Parametros;
use App\Http\Livewire\Backend\Categorias;

// use App\Http\Livewire\Product;
// use App\Http\Livewire\ProductosFront;
use App\Http\Livewire\Carrito;
use App\Http\Livewire\Nosotros;

use App\Http\Livewire\Backend\Talles;
use App\Http\Livewire\Backend\Colores;
use App\Http\Livewire\Backend\Presentaciones;
use App\Http\Livewire\Backend\Productos;
use App\Http\Livewire\Backend\Faqs;
use App\Http\Livewire\Backend\Formasdeentregas;
use App\Http\Livewire\Backend\Sitios;
use App\Http\Livewire\Backend\Movimientos;



use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use App\Http\Livewire\Backend\Testimonios;
use App\Http\Livewire\Backend\Historias;

use App\Http\Livewire\ProductosFront;
use App\Http\Livewire\ProductoFront;
// use App\Http\Livewire\ContactoFront;
// use App\Http\Livewire\NosotrosFront;

Route::get('/productos', ProductosFront::class)->name('productos');
Route::get('productos/categoria/{categoria}', [\App\Http\Livewire\ProductosFront::class, 'setCategoria'])->name('productos.categoria');
Route::get('/productos/{id}', ProductoFront::class)->name('producto');
// Route::get('/contacto', ContactoFront::class)->name('contacto');
// Route::get('/nosotros', NosotrosFront::class)->name('nosotros');


// Rutas de productos
// Route::get('productos', [\App\Http\Livewire\ProductosFront::class, 'setCategoria'])->name('productos.index');
// Route::get('productos/categoria/{categoria}', [\App\Http\Livewire\ProductosFront::class, 'setCategoria'])->name('productos.categoria');


// Route::livewire('/productos', 'productos');
// Route::get('/productos', function () {
//     return view('livewire.productos');
// })->name('productos.index');

// Route::get('/productos/categoria/{categoria}', function () {
//     return view('productos.index');
// })->name('productos.index');

// Route::get('/contacto', function () {
//     return view('contacto.index');
// })->name('contacto.index');

// Route::get('/nosotros', function () {
//     return view('nosotros.index');
// })->name('nosotros.index');

// Route::get('/servicios', function () {
//     return view('servicios.index');
// })->name('servicios.index');

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/shop/{categoria}/{producto}', [ProductoController::class, 'show'])->name('productos.show');
// Route::get('categorias', [CategoriaController::class, 'index']);
// Route::get('/shop/{categoria}/{producto}', Product::class)->name('productos.show');


Route::get('/mipanel', function () {
    return view('dashboard');
})->name('dashboard');


// Route::get('shop/{categoria}', [ProductoController::class, 'categoria'])->name('productos.categoria');
// Route::get('/shop', [ProductoController::class, 'index'])->name('productos.index');
// Route::get('/', [ProductoController::class, 'index'])->name('productos.index');

Route::get('contacto', [ContactController::class, 'index'])->name('contacto');
Route::post('contacto', [ContactController::class, 'store'])->name('contacto.store');

Route::get('/carrito', Carrito::class)->name('carrito');
Route::get('/nosotros', Nosotros::class)->name('nosotros');

Route::get('preguntas-frecuentes', [FaqController::class, 'index'])->name('faqs.index');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/mipanel/parametros', Parametros::class)->name('parametros');
    Route::get('/mipanel/categorias', Categorias::class)->name('categorias');
    Route::get('/mipanel/productos', Productos::class)->name('productos');
    Route::get('/mipanel/presentaciones', Presentaciones::class)->name('presentaciones');
    Route::get('/mipanel/faqs', Faqs::class)->name('faqs');
    Route::get('/mipanel/testimonios', Testimonios::class)->name('testimonios');
    // Route::get('/mipanel/impuestos', Impuestos::class)->name('impuestos');
    // Route::get('/mipanel/formasdepago', Formasdepago::class)->name('formasdepago');
    Route::get('/mipanel/formasdeentrega', Formasdeentregas::class)->name('formasdeentrega');
    Route::get('/mipanel/colores', Colores::class)->name('colores');
    Route::get('/mipanel/talles', Talles::class)->name('talles');
    // Route::get('/mipanel/estadosdelenvio', Estadosdelenvio::class)->name('estadosdelenvio');
    Route::get('/mipanel/sitio', Sitios::class)->name('sitio');
    Route::get('/mipanel/movimientos', Movimientos::class)->name('movimientos');
    Route::get('/mipanel/historias', Historias::class)->name('historias');



    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
