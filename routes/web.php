<?php

use Illuminate\Support\Facades\Route;


use App\Http\Livewire\Backend\Parametros;
use App\Http\Livewire\Backend\Categorias;

use App\Http\Livewire\Contacto;
use App\Http\Livewire\Carrito;
use App\Http\Livewire\Nosotros;

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ContactController;

Route::get('/shop/{categoria}/{producto}', [ProductoController::class, 'show'])->name('productos.show');
Route::get('shop/{categoria}', [ProductoController::class, 'categoria'])->name('productos.categoria');
Route::get('/', [ProductoController::class, 'index'])->name('productos.index');

Route::get('contacto', [ContactController::class, 'index'])->name('contacto');
Route::post('contacto', [ContactController::class, 'store'])->name('contacto.store');

Route::get('/carrito', Carrito::class)->name('carrito');
Route::get('/nosotros', Nosotros::class)->name('nosotros');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/mipanel/parametros', Parametros::class)->name('parametros');
    Route::get('/mipanel/categorias', Categorias::class)->name('categorias');
    // Route::get('/mipanel/productos', Productos::class)->name('productos');
    // Route::get('/mipanel/presentaciones', Presentaciones::class)->name('presentaciones');
    // Route::get('/mipanel/impuestos', Impuestos::class)->name('impuestos');
    // Route::get('/mipanel/formasdepago', Formasdepago::class)->name('formasdepago');
    // Route::get('/mipanel/formasdeentrega', Formasdeentrega::class)->name('formasdeentrega');
    // Route::get('/mipanel/colores', Colores::class)->name('colores');
    // Route::get('/mipanel/talles', Talles::class)->name('talles');
    // Route::get('/mipanel/estadosdelenvio', Estadosdelenvio::class)->name('estadosdelenvio');
    // Route::get('/mipanel/sitios', Sitios::class)->name('sitios');


    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
