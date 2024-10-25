<?php

use App\Http\Controllers\backend\FaqsController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ContactController;
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

Route::get('/productos', [ProductoController::class, 'productos'])->name('productos.index');

Route::get('/destacados', [ProductoController::class, 'destacados'])->name('productos.destacados');

Route::get('/shop/{category}', [ProductoController::class, 'categoria'])->name('productos.categoria');

Route::get('/shop/{category}/{id}', ProductoFront::class)->name('productos.show');
Route::get('/carrito', Carrito::class)->name('carrito');

Route::get('/contacto', [ContactController::class, 'index'])->name('contacto');
Route::post('/contacto', [ContactController::class, 'store'])->name('contacto.store');

Route::get('nosotros', Nosotros::class)->name('nosotros');
Route::get('sucursales', Sucursales::class)->name('sucursales');
Route::get('preguntas-frecuentes', [FaqsController::class, 'index'])->name('faqs.front.index');

// Pagos y métodos de pago
Route::get('/mercadopago', MercadoPago::class)->name('mercadopago');
Route::get('/pagomp/{datos}/pago', [MpController::class, 'pago'])->name('pagomp.pago'); //url de testing
Route::post('/webhooks',  WebhooksController::class);
