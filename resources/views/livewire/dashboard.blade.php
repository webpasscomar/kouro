<x-header>
    Panel de administración
</x-header>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">

            <a href="/admin/productos"
                class="flex flex-col justify-between w-full h-32 p-4 rounded-lg shadow-md bg-white">
                <div class="flex justify-between items-center mb-4">
                    <div class="text-gray-600 font-bold text-xl">Productos</div>
                    <i class="fas fa-boxes text-gray-600 text-2xl"></i>
                </div>
                <div class="text-gray-600 font-bold text-xl">{{ $products_count }}</div>
            </a>

            <a href="/admin/pedidos" class="flex flex-col justify-between w-full h-32 p-4 rounded-lg shadow-md bg-white">
                <div class="flex justify-between items-center mb-4">
                    <div class="text-gray-600 font-bold text-xl">Pedidos</div>
                    <i class="fas fa-shopping-cart text-gray-600 text-2xl"></i>
                </div>
                <div class="text-gray-600 font-bold text-xl">{{ $orders_count }}</div>
            </a>

            <a href="/admin/movimientos"
                class="flex flex-col justify-between w-full h-32 p-4 rounded-lg shadow-md bg-white">
                <div class="flex justify-between items-center mb-4">
                    <div class="text-gray-600 font-bold text-xl">Manejo de Existencias</div>
                    <i class="fas fa-boxes text-gray-600 text-2xl"></i>
                </div>
                <div class="text-gray-600 font-bold text-xl">{{ $existencias_count }}</div>
            </a>

            <a href="/admin/pendientes"
                class="flex flex-col justify-between w-full h-32 p-4 rounded-lg shadow-md bg-white">
                <div class="flex justify-between items-center mb-4">
                    <div class="text-gray-600 font-bold text-xl">Stocks Pendientes</div>
                    <i class="fas fa-box-open text-gray-600 text-2xl"></i>
                </div>
                <div class="text-gray-600 font-bold text-xl">{{ $stock_pend }}</div>
            </a>


        </div>
    </div>
</div>
