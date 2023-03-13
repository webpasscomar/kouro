<?php


use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Dashboard;

use App\Http\Livewire\Backend\Talles;
use App\Http\Livewire\Backend\Colores;
use App\Http\Livewire\Backend\Presentaciones;
use App\Http\Livewire\Backend\Productos;
use App\Http\Livewire\Backend\Faqs;
use App\Http\Livewire\Backend\Formasdeentregas;
use App\Http\Livewire\Backend\Sitios;
use App\Http\Livewire\Backend\Movimientos;
use App\Http\Livewire\Backend\Pedidos;
use App\Http\Livewire\Backend\Testimonios;
use App\Http\Livewire\Backend\Historias;
use App\Http\Livewire\Backend\Parametros;
use App\Http\Livewire\Backend\Categorias;


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
  Route::get('/mipanel/formasdeentrega', Formasdeentregas::class)->name('formasdeentrega');
  Route::get('/mipanel/colores', Colores::class)->name('colores');
  Route::get('/mipanel/talles', Talles::class)->name('talles');
  Route::get('/mipanel/sitio', Sitios::class)->name('sitio');
  Route::get('/mipanel/movimientos', Movimientos::class)->name('movimientos');
  Route::get('/mipanel/historias', Historias::class)->name('historias');
  Route::get('/mipanel/pedidos', Pedidos::class)->name('pedidos');
  // Route::get('/mipanel/impuestos', Impuestos::class)->name('impuestos');
  // Route::get('/mipanel/formasdepago', Formasdepago::class)->name('formasdepago');
  // Route::get('/mipanel/estadosdelenvio', Estadosdelenvio::class)->name('estadosdelenvio');

  // Route::get('/dashboard', function () {
  //     return view('dashboard');
  // })->name('dashboard');
  Route::get('/dashboard', Dashboard::class)->name('dashboard');
});
