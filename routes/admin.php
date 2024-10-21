<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Livewire\Dashboard;

use App\Http\Controllers\backend\DeliveryMethodController;
use App\Http\Controllers\backend\CategoriesController;
use App\Http\Controllers\backend\ColorsController;
use App\Http\Controllers\backend\DashboardController;
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
    ])
        ->parameters([
            'formas-de-entrega' => 'deliveryMethod'
        ]);


    Route::resource('categorias', CategoriesController::class)->names([
        'index' => 'categories.index',
        'create' => 'categories.create',
        'store' => 'categories.store',
        'show' => 'categories.show',
        'edit' => 'categories.edit',
        'update' => 'categories.update',
        'destroy' => 'categories.destroy',
    ])
        ->parameters([
            'categorias' => 'category'
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
        'index' => 'presentations.index',
        'create' => 'presentations.create',
        'store' => 'presentations.store',
        'show' => 'presentations.show',
        'edit' => 'presentations.edit',
        'update' => 'presentations.update',
        'destroy' => 'presentations.destroy',
    ])
        ->parameters([
            'presentaciones' => 'presentation'
        ]);

    Route::resource('talles', SizesController::class)->names([
        'index' => 'sizes.index',
        'create' => 'sizes.create',
        'store' => 'sizes.store',
        'show' => 'sizes.show',
        'edit' => 'sizes.edit',
        'update' => 'sizes.update',
        'destroy' => 'sizes.destroy',
    ])
        ->parameters([
            'talles' => 'size'
        ]);


    Route::resource('productos', ProductsController::class)->names([
        'index' => 'products.index',
        'create' => 'products.create',
        'store' => 'products.store',
        'show' => 'products.show',
        'edit' => 'products.edit',
        'update' => 'products.update',
        'destroy' => 'products.destroy',
    ])
        ->parameters([
            'productos' => 'product'
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


    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');


    Route::get('/', function () {
        return redirect()->route('dashboard.index');
    });
});
