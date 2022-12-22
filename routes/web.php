<?php

use Illuminate\Support\Facades\Route;


use App\Http\Livewire\Backend\Parametros;
use App\Http\Livewire\Backend\Categorias;

use App\Http\Livewire\Shop;
use App\Http\Livewire\Contacto;
use App\Http\Livewire\Producto;
use App\Http\Livewire\Productos;
use App\Http\Livewire\Carrito;
use App\Http\Livewire\Nosotros;



Route::get('/shop/{categoria}/{producto}', Producto::class)->name('producto');
Route::get('/shop/{categoria}', Productos::class)->name('productos');
Route::get('/', Shop::class)->name('shop');

Route::get('/contacto', Contacto::class)->name('contacto');
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
