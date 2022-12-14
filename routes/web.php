<?php

use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\ProductController;

use App\Http\Livewire\Parametros;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/mipanel/parametros', Parametros::class)->name('parametros');
    // Route::get('/mipanel/categorias', Categorias::class)->name('categorias');
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
