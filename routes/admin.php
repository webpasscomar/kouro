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

    Route::resource('metodos-de-entrega', DeliveryMethodController::class);
    Route::resource('categorias', CategoriesController::class);
    Route::resource('colores', ColorsController::class);
    Route::resource('presentaciones', PresentationsController::class);
    Route::resource('talles', SizesController::class);
    Route::resource('productos', ProductsController::class);
    Route::resource('ordenes', OrdersController::class);
    Route::resource('movimientos-de-stock', StockMovementsController::class);
    Route::resource('pending-stock', PendingStockController::class);
    Route::resource('historico-de-movimientos', MovementHistoryController::class);
    Route::resource('galerias', GalleryController::class);
    Route::resource('testimonios', TestimonialsController::class);
    Route::resource('faqs', FaqsController::class);

    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    Route::get('/', function () {
        return redirect()->route('dashboard');
    });
});
