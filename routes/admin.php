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
use App\Http\Livewire\Backend\Avisostock;


Route::middleware([
  'auth:sanctum',
  config('jetstream.auth_session'),
  'verified'
])->group(function () {
  Route::get('/parametros', Parametros::class)->name('parametros');
  Route::get('/categorias', Categorias::class)->name('categorias');
  Route::get('/productos', Productos::class)->name('productos');
  Route::get('/presentaciones', Presentaciones::class)->name('presentaciones');
  Route::get('/faqs', Faqs::class)->name('faqs');
  Route::get('/testimonios', Testimonios::class)->name('testimonios');
  Route::get('/formasdeentrega', Formasdeentregas::class)->name('formasdeentrega');
  Route::get('/colores', Colores::class)->name('colores');
  Route::get('/talles', Talles::class)->name('talles');
  Route::get('/sitio', Sitios::class)->name('sitio');
  Route::get('/movimientos', Movimientos::class)->name('movimientos');
  Route::get('/historias', Historias::class)->name('historias');
  Route::get('/pedidos', Pedidos::class)->name('pedidos');
  Route::get('/pendientes', Avisostock::class)->name('pendientes');
  // Route::get('/mipanel/impuestos', Impuestos::class)->name('impuestos');
  // Route::get('/mipanel/formasdepago', Formasdepago::class)->name('formasdepago');
  // Route::get('/mipanel/estadosdelenvio', Estadosdelenvio::class)->name('estadosdelenvio');

  // Route::get('/dashboard', function () {
  //     return view('dashboard');
  // })->name('dashboard');
  Route::get('/dashboard', Dashboard::class)->name('dashboard');
});
