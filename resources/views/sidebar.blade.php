{{-- <!-- Contenido de la columna 3 -->
<div class="flex h-screen bg-gray-90">
    <!-- Contenido principal -->
    <div class="flex-1 bg-white p-8">
        <!-- Aquí iría el contenido principal del backend -->
    </div> --}}

<!-- Sidebar a la derecha -->
<aside class="w-auto bg-gray-800 text-white p-4 rounded-lg ml-4 pl-4 overflow-hidden mt-11">
    <!-- Logo o título del sidebar -->
    {{-- <div class="text-xl font-semibold mb-6">
        Mi panel
    </div> --}}

    {{-- Sidebar  --}}
    <h4>ADMINISTRACION</h4>

    <!-- Enlaces del sidebar -->
    <ul class="list-disc px-7 mt-3">
        <li class="mb-2">
            <a href="{{ route('categorias') }}" class="text-gray-300 hover:text-white">
                Categorias
            </a>
        </li>
        <li class="mb-2">
            <a href="{{ route('colores') }}" class="text-gray-300 hover:text-white">
                Colores
            </a>
        </li>
        <li class="mb-2">
            <a href="{{ route('formasdeentrega') }}" class="text-gray-300 hover:text-white">
                Formas de entrega
            </a>
        </li>
        <li class="mb-2">
            <a href="{{ route('presentaciones') }}" class="text-gray-300 hover:text-white">
                Presentaciones
            </a>
        </li>
        <li class="mb-2">
            <a href="{{ route('parametros') }}" class="text-gray-300 hover:text-white">
                Parametros
            </a>
        </li>
        <li class="mb-2">
            <a href="{{ route('talles') }}" class="text-gray-300 hover:text-white">
                Talles
            </a>
        </li>
    </ul>

    <h4 class="mt-5">VENTAS</h4>

    <ul class="list-disc px-7 mt-3">
        <li class="mb-2">
            <a href="{{ route('productos') }}" class="text-gray-300 hover:text-white">
                Productos
            </a>
        </li>
        <li class="mb-2">
            <a href="{{ route('pedidos') }}" class="text-gray-300 hover:text-white">
                Pedidos
            </a>
        </li>
        <li class="mb-2">
            <a href="{{ route('movimientos') }}" class="text-gray-300 hover:text-white">
                Movimientos (Stock)
            </a>
        </li>
        <li class="mb-2">
            <a href="{{ route('pendientes') }}" class="text-gray-300 hover:text-white">
                Pendientes (Stock)
            </a>
        </li>
        <li class="mb-2">
            <a href="{{ route('historias') }}" class="text-gray-300 hover:text-white">
                Historias (Movimientos)
            </a>
        </li>
    </ul>

    <h4 class="mt-5">WEB</h4>

    <ul class="list-disc px-7 mt-3">
        <li class="mb-2">
            <a href="{{ route('galerias') }}" class="text-gray-300 hover:text-white">
                Galeria
            </a>
        </li>
        <li class="mb-2">
            <a href="{{ route('faqs') }}" class="text-gray-300 hover:text-white">
                FAQs
            </a>
        </li>
        <li class="mb-2">
            <a href="{{ route('testimonios') }}" class="text-gray-300 hover:text-white">
                Testimonios
            </a>
        </li>
        <!-- Agrega más enlaces según tus necesidades -->
    </ul>
</aside>
{{-- </div> --}}
