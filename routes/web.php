<?php

use Illuminate\Support\Facades\Route;


use App\Http\Livewire\Backend\Parametros;
use App\Http\Livewire\Backend\Categorias;

use App\Http\Livewire\Shop;
use App\Http\Livewire\Contacto;
use App\Http\Livewire\Productos;
use App\Http\Livewire\Carrito;



Route::get('/', Shop::class)->name('shop.index');
Route::get('/contacto', Contacto::class)->name('contacto.index');
Route::get('/carrito', Carrito::class)->name('carrito.index');

// Route::get('/shop', function () {
//     return 'Bienvenido a la home de la tienda';
// });

// Route::get('/shop/{categoria}', function ($categoria) {
//     return 'Bienvenido a la categoria:' . $categoria;
// });

//Route::get('/shop/{categoria}/{producto}', Producto::class)->name('shop.index');


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
