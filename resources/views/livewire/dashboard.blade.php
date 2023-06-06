<?php
$categories_count = 5;
$products_count = 5;
$sizes_count = 5;
$colors_count = 5;
$orders_count = 5;
$stock_count = 5;
$testimonies_count = 5;
$parameters_count = 5;
$delivery_methods_count = 5;
$faq_count = 5;
$places_count = 5;
$contact_messages_count = 5;
$gallery_count = 5;
$existencias_count = 10;
$stock_count = 20;
?>

<x-header>
    Panel de administración
</x-header>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">

            <a href="/admin/movimientos"
                class="flex flex-col justify-between w-full h-32 p-4 rounded-lg shadow-md bg-white">
                <div class="flex justify-between items-center mb-4">
                    <div class="text-gray-600 font-bold text-xl">Manejo de Existencias</div>
                    <i class="fas fa-boxes text-gray-600 text-2xl"></i>
                </div>
                <div class="text-gray-600 font-bold text-xl">{{ $existencias_count }}</div>
            </a>

            <a href="/admin/historias"
                class="flex flex-col justify-between w-full h-32 p-4 rounded-lg shadow-md bg-white">
                <div class="flex justify-between items-center mb-4">
                    <div class="text-gray-600 font-bold text-xl">Stock</div>
                    <i class="fas fa-box-open text-gray-600 text-2xl"></i>
                </div>
                <div class="text-gray-600 font-bold text-xl">{{ $stock_count }}</div>
            </a>

            <a href="/admin/pendientes"
                class="flex flex-col justify-between w-full h-32 p-4 rounded-lg shadow-md bg-white">
                <div class="flex justify-between items-center mb-4">
                    <div class="text-gray-600 font-bold text-xl">Stocks Pendientes</div>
                    <i class="fas fa-box-open text-gray-600 text-2xl"></i>
                </div>
                <div class="text-gray-600 font-bold text-xl">{{ $stock_count }}</div>
            </a>


            <a href="/admin/productos"
                class="flex flex-col justify-between w-full h-32 p-4 rounded-lg shadow-md bg-white">
                <div class="flex justify-between items-center mb-4">
                    <div class="text-gray-600 font-bold text-xl">Productos</div>
                    <i class="fas fa-boxes text-gray-600 text-2xl"></i>
                </div>
                <div class="text-gray-600 font-bold text-xl">{{ $products_count }}</div>
            </a>

            <a href="/admin/categorias"
                class="flex flex-col justify-between w-full h-32 p-4 rounded-lg shadow-md bg-white">
                <div class="flex justify-between items-center mb-4">
                    <div class="text-gray-600 font-bold text-xl">Categorías</div>
                    <i class="fas fa-tags text-gray-600 text-2xl"></i>
                </div>
                <div class="text-gray-600 font-bold text-xl">{{ $categories_count }}</div>
            </a>

            <a href="/admin/talles" class="flex flex-col justify-between w-full h-32 p-4 rounded-lg shadow-md bg-white">
                <div class="flex justify-between items-center mb-4">
                    <div class="text-gray-600 font-bold text-xl">Talles</div>
                    <i class="fas fa-ruler-horizontal text-gray-600 text-2xl"></i>
                </div>
                <div class="text-gray-600 font-bold text-xl">{{ $sizes_count }}</div>
            </a>

            <a href="/admin/colores"
                class="flex flex-col justify-between w-full h-32 p-4 rounded-lg shadow-md bg-white">
                <div class="flex justify-between items-center mb-4">
                    <div class="text-gray-600 font-bold text-xl">Colores</div>
                    <i class="fas fa-palette text-gray-600 text-2xl"></i>
                </div>
                <div class="text-gray-600 font-bold text-xl">{{ $colors_count }}</div>
            </a>

            <a href="/admin/pedidos"
                class="flex flex-col justify-between w-full h-32 p-4 rounded-lg shadow-md bg-white">
                <div class="flex justify-between items-center mb-4">
                    <div class="text-gray-600 font-bold text-xl">Pedidos</div>
                    <i class="fas fa-shopping-cart text-gray-600 text-2xl"></i>
                </div>
                <div class="text-gray-600 font-bold text-xl">{{ $orders_count }}</div>
            </a>

            <a href="/admin/testimonios"
                class="flex flex-col justify-between w-full h-32 p-4 rounded-lg shadow-md bg-white">
                <div class="flex justify-between items-center mb-4">
                    <div class="text-gray-600 font-bold text-xl">Testimonios</div>
                    <i class="fas fa-comment-alt text-gray-600 text-2xl"></i>
                </div>
                <div class="text-gray-600 font-bold text-xl">{{ $testimonies_count }}</div>
            </a>

            <a href="/admin/parametros"
                class="flex flex-col justify-between w-full h-32 p-4 rounded-lg shadow-md bg-white">
                <div class="flex justify-between items-center mb-4">
                    <div class="text-gray-600 font-bold text-xl">Parámetros</div>
                    <i class="fas fa-cog text-gray-600 text-2xl"></i>
                </div>
                <div class="text-gray-600 font-bold text-xl">{{ $parameters_count }}</div>
            </a>

            <a href="/admin/formasdeentrega"
                class="flex flex-col justify-between w-full h-32 p-4 rounded-lg shadow-md bg-white">
                <div class="flex justify-between items-center mb-4">
                    <div class="text-gray-600 font-bold text-xl">Formas de entrega</div>
                    <i class="fas fa-truck text-gray-600 text-2xl"></i>
                </div>
                <div class="text-gray-600 font-bold text-xl">{{ $delivery_methods_count }}</div>
            </a>

            <a href="/admin/faqs" class="flex flex-col justify-between w-full h-32 p-4 rounded-lg shadow-md bg-white">
                <div class="flex justify-between items-center mb-4">
                    <div class="text-gray-600 font-bold text-xl">Preguntas frecuentes</div>
                    <i class="fas fa-question-circle text-gray-600 text-2xl"></i>
                </div>
                <div class="text-gray-600 font-bold text-xl">{{ $faq_count }}</div>
            </a>

            <a href="/admin/contacto"
                class="flex flex-col justify-between w-full h-32 p-4 rounded-lg shadow-md bg-white">
                <div class="flex justify-between items-center mb-4">
                    <div class="text-gray-600 font-bold text-xl">Contacto</div>
                    <i class="fas fa-envelope text-gray-600 text-2xl"></i>
                </div>
                <div class="text-gray-600 font-bold text-xl">{{ $contact_messages_count }}</div>
            </a>

            <a href="/admin/slider" class="flex flex-col justify-between w-full h-32 p-4 rounded-lg shadow-md bg-white">
                <div class="flex justify-between items-center mb-4">
                    <div class="text-gray-600 font-bold text-xl">Galería</div>
                    <i class="fas fa-images text-gray-600 text-2xl"></i>
                </div>
                <div class="text-gray-600 font-bold text-xl">{{ $gallery_count }}</div>
            </a>

            <a href="/admin/locales"
                class="flex flex-col justify-between w-full h-32 p-4 rounded-lg shadow-md bg-white">
                <div class="flex justify-between items-center mb-4">
                    <div class="text-gray-600 font-bold text-xl">Locales</div>
                    <i class="fas fa-map-marker-alt text-gray-600 text-2xl"></i>
                </div>
                <div class="text-gray-600 font-bold text-xl">{{ $places_count }}</div>
            </a>

        </div>
    </div>
</div>
