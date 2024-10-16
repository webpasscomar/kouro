<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Dashboard;

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


    Route::resource('formas-de-entrega', DeliveryMethodController::class)->names([
        'index' => 'formas.index',
        'create' => 'formas.create',
        'store' => 'formas.store',
        'show' => 'formas.show',
        'edit' => 'formas.edit',
        'update' => 'formas.update',
        'destroy' => 'formas.destroy',
    ]);


    Route::resource('categorias', CategoriesController::class)->names([
        'index' => 'categorias.index',
        'create' => 'categorias.create',
        'store' => 'categorias.store',
        'show' => 'categorias.show',
        'edit' => 'categorias.edit',
        'update' => 'categorias.update',
        'destroy' => 'categorias.destroy',
    ]);


    Route::resource('colores', ColorsController::class)->names([
        'index' => 'colores.index',
        'create' => 'colores.create',
        'store' => 'colores.store',
        'show' => 'colores.show',
        'edit' => 'colores.edit',
        'update' => 'colores.update',
        'destroy' => 'colores.destroy',
    ]);


    Route::resource('presentaciones', PresentationsController::class)->names([
        'index' => 'presentaciones.index',
        'create' => 'presentaciones.create',
        'store' => 'presentaciones.store',
        'show' => 'presentaciones.show',
        'edit' => 'presentaciones.edit',
        'update' => 'presentaciones.update',
        'destroy' => 'presentaciones.destroy',
    ]);


    Route::resource('talles', SizesController::class)->names([
        'index' => 'talles.index',
        'create' => 'talles.create',
        'store' => 'talles.store',
        'show' => 'talles.show',
        'edit' => 'talles.edit',
        'update' => 'talles.update',
        'destroy' => 'talles.destroy',
    ]);


    Route::resource('productos', ProductsController::class)->names([
        'index' => 'productos.index',
        'create' => 'productos.create',
        'store' => 'productos.store',
        'show' => 'productos.show',
        'edit' => 'productos.edit',
        'update' => 'productos.update',
        'destroy' => 'productos.destroy',
    ]);


    Route::resource('pedidos', OrdersController::class)->names([
        'index' => 'pedidos.index',
        'create' => 'pedidos.create',
        'store' => 'pedidos.store',
        'show' => 'pedidos.show',
        'edit' => 'pedidos.edit',
        'update' => 'pedidos.update',
        'destroy' => 'pedidos.destroy',
    ]);


    Route::resource('movimientos-de-stock', StockMovementsController::class)->names([
        'index' => 'movimientos.index',
        'create' => 'movimientos.create',
        'store' => 'movimientos.store',
        'show' => 'movimientos.show',
        'edit' => 'movimientos.edit',
        'update' => 'movimientos.update',
        'destroy' => 'movimientos.destroy',
    ]);


    Route::resource('pendientes-de-stock', PendingStockController::class)->names([
        'index' => 'pendientes.index',
        'create' => 'pendientes.create',
        'store' => 'pendientes.store',
        'show' => 'pendientes.show',
        'edit' => 'pendientes.edit',
        'update' => 'pendientes.update',
        'destroy' => 'pendientes.destroy',
    ]);


    Route::resource('historico-de-movimientos', MovementHistoryController::class)->names([
        'index' => 'historico.index',
        'create' => 'historico.create',
        'store' => 'historico.store',
        'show' => 'historico.show',
        'edit' => 'historico.edit',
        'update' => 'historico.update',
        'destroy' => 'historico.destroy',
    ]);


    Route::resource('galeria', GalleryController::class)->names([
        'index' => 'galeria.index',
        'create' => 'galeria.create',
        'store' => 'galeria.store',
        'show' => 'galeria.show',
        'edit' => 'galeria.edit',
        'update' => 'galeria.update',
        'destroy' => 'galeria.destroy',
    ]);


    Route::resource('testimonios', TestimonialsController::class)->names([
        'index' => 'testimonios.index',
        'create' => 'testimonios.create',
        'store' => 'testimonios.store',
        'show' => 'testimonios.show',
        'edit' => 'testimonios.edit',
        'update' => 'testimonios.update',
        'destroy' => 'testimonios.destroy',
    ]);


    Route::resource('faqs', FaqsController::class)->names([
        'index' => 'faqs.index',
        'create' => 'faqs.create',
        'store' => 'faqs.store',
        'show' => 'faqs.show',
        'edit' => 'faqs.edit',
        'update' => 'faqs.update',
        'destroy' => 'faqs.destroy',
    ]);


    Route::get('/dashboard', Dashboard::class)->name('dashboard');


    Route::get('/', function () {
        return redirect()->route('dashboard');
    });
});
