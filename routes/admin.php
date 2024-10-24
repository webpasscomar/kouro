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

use App\Http\Livewire\Backend\Movimientos;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    // Route::get('movimientos-de-stock', [Movimientos::class])->name('movimientos');

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
        'index' => 'colors.index',
        'create' => 'colors.create',
        'store' => 'colors.store',
        'show' => 'colors.show',
        'edit' => 'colors.edit',
        'update' => 'colors.update',
        'destroy' => 'colors.destroy',
    ])
    ->parameters([
        'colores'=>'color'
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
        'index' => 'orders.index',
        'create' => 'orders.create',
        'store' => 'orders.store',
        'show' => 'orders.show',
        'edit' => 'orders.edit',
        'update' => 'orders.update',
        'destroy' => 'orders.destroy',
    ])
        ->parameters([
            'pedidos' => 'order'
        ]);


    Route::resource('movimientos-de-stock', StockMovementsController::class)->names([
        'index' => 'movements.index',
        'create' => 'movements.create',
        'store' => 'movements.store',
        'show' => 'movements.show',
        'edit' => 'movements.edit',
        'update' => 'movements.update',
        'destroy' => 'movements.destroy',
    ])
        ->parameters([
            'movimientos' => 'movements'
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
