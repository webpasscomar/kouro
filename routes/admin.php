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
use App\Http\Livewire\Backend\Galerias;


use App\Http\Controllers\backend\DeliveryMethodController;
use App\Http\Controllers\backend\CategoriesController;
use App\Http\Controllers\backend\ColorsController;
use App\Http\Controllers\backend\PresentationsController;
use App\Http\Controllers\backend\SizesController;
use App\Http\Controllers\backend\ProductsController;
use App\Http\Controllers\backend\OrdersController;
use App\Http\Controllers\backend\StockMovementsController;
use App\Http\Controllers\backend\PendingStockController;
use App\Http\Controllers\backend\MovementHistoryController;
use App\Http\Controllers\backend\GalleryController;
use App\Http\Controllers\backend\TestimonialsController;
use App\Http\Controllers\backend\FaqsController;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    // Route::get('/parametros', Parametros::class)->name('parametros');
    // Route::get('/categorias', Categorias::class)->name('categorias');
    // Route::get('/productos', Productos::class)->name('productos');
    // Route::get('/presentaciones', Presentaciones::class)->name('presentaciones');
    // Route::get('/faqs', Faqs::class)->name('faqs');
    // Route::get('/testimonios', Testimonios::class)->name('testimonios');
    // Route::get('/formasdeentrega', Formasdeentregas::class)->name('formasdeentrega');
    // Route::get('/colores', Colores::class)->name('colores');
    // Route::get('/talles', Talles::class)->name('talles');
    // Route::get('/sitio', Sitios::class)->name('sitio');
    // Route::get('/movimientos', Movimientos::class)->name('movimientos');
    // Route::get('/historias', Historias::class)->name('historias');
    // Route::get('/pedidos', Pedidos::class)->name('pedidos');
    // Route::get('/pendientes', Avisostock::class)->name('pendientes');
    // Route::get('/galerias', Galerias::class)->name('galerias');
    // Route::get('/mipanel/impuestos', Impuestos::class)->name('impuestos');
    // Route::get('/mipanel/formasdepago', Formasdepago::class)->name('formasdepago');
    // Route::get('/mipanel/estadosdelenvio', Estadosdelenvio::class)->name('estadosdelenvio');

    Route::resource('delivery_methods', DeliveryMethodController::class);
    Route::resource('categories', CategoriesController::class);
    Route::resource('colors', ColorsController::class);
    Route::resource('presentations', PresentationsController::class);
    Route::resource('sizes', SizesController::class);
    Route::resource('products', ProductsController::class);
    Route::resource('orders', OrdersController::class);
    Route::resource('stock-movements', StockMovementsController::class);
    Route::resource('pending-stock', PendingStockController::class);
    Route::resource('movement-history', MovementHistoryController::class);
    Route::resource('gallery', GalleryController::class);
    Route::resource('testimonials', TestimonialsController::class);
    Route::resource('faqs', FaqsController::class);

    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    Route::get('/', function () {
        return redirect()->route('dashboard');
    });
});
