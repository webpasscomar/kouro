<?php

use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;


use App\Http\Livewire\Backend\Parametros;
use App\Http\Livewire\Backend\Categorias;

use App\Http\Livewire\Product;
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


// Route::get('/shop/{categoria}/{producto}', [ProductoController::class, 'show'])->name('productos.show');

Route::get('categorias', [CategoriaController::class, 'index']);

Route::get('/shop/{categoria}/{producto}', Product::class)->name('productos.show');


Route::get('/mipanel', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('shop/{categoria}', [ProductoController::class, 'categoria'])->name('productos.categoria');
Route::get('/shop', [ProductoController::class, 'index'])->name('productos.index');
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
