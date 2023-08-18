<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'WebPass - Ecommerce ') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    {{-- Icono --}}
    <link rel="shortcut icon" href="{{ asset('./img/logo_ico.ico') }}" type="image/x-icon">

    <!-- Styles -->
    <!-- styles tw-elements -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
    <!-- Styles  flowbite -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <!-- ---------------- -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet" />
    <!-- ---------------- -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>




</head>

<body class="font-sans antialiased">
    @php
        use Illuminate\Support\Str;
        use Livewire\Livewire;
    @endphp
    <x-jet-banner />

    <div class="bg-gray-100">

        @livewire('navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main class="min-h-screen">
            <div>
                @isset($slot)
                    {{ $slot }}
                @else
                    @yield('content')
                    @endif
                </div>
            </main>

            {{-- <main>
            @switch(Route::currentRouteName())
                @case('productos')
                @case('productos.categoria')
                    @livewire('productos-front')
                @break

                @case('producto')
                    @livewire('producto-front')
                @break

                @case('nosotros')
                    @livewire('nosotrosFront')
                @break

                @case('contacto')
                    @livewire('contactoFront')
                @break

                @case('colores')
                    @livewire('backend.colores')
                @break

                @case('dashboard')
                    @livewire('dashboard')
                @break

                @case('historias')
                    @livewire('backend.historias')
                @break

                @case('pedidos')
                    @livewire('backend.pedidos')
                @break

                @case('carrito')
                    @livewire('carrito')
                @break

                @default

                    <h1>Error 404</h1>
            @endswitch
        </main> --}}

            {{-- <main>
            @if (request()->is('productos'))
                @livewire('productos-front')
            @elseif(request()->is('contacto'))
                @livewire('contacto-front')
            @elseif(request()->is('nosotros'))
                @livewire('nosotros-front')
            @endif
        </main> --}}


            <!-- Page Content -->
            {{-- <main>
            <h1>{{ request()->route()->getName() }}</h1>
        @switch(request()->route()->getName())
        @case('livewire.productos.index')
        @livewire('productos')
        @break

        @case('contacto.index')
        @livewire('contacto.index')
        @break

        @case('nosotros.index')
        @livewire('nosotros.index')
        @break

        @case('servicios.index')
        @livewire('servicios.index')
        @break

        @default
        @livewire('default.index')
        @endswitch
        </main> --}}

            {{-- <main>
            @if (Str::contains(view()->getName(), 'livewire'))
                <div>
                    @livewire(
                        request()->route()->getActionMethod()
                    )
                </div>
            @else
                <div>
                    @isset($slot)
                        {{ $slot }}
        @else
        @yield('content')
        @endif
    </div>
    @endif
    </main> --}}

            <!-- Footer del sitio  -->
            <footer>
                <x-footer />
            </footer>

        </div>
        {{-- @livewire('footer') --}}
        @stack('modals')

        @livewireScripts

        <script>
            Livewire.on('alertSave', function() {
                Swal.fire(
                    'Excelente!',
                    'Ha sido guardado correctamente!',
                    'success'
                )
            });

            Livewire.on('alertDelete', id => {
                Swal.fire({
                    title: '¿Está seguro /a?',
                    text: "La acción no podrá ser revertida!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, borrar!'
                }).then((result) => {


                    if (result.isConfirmed) {
                        // alert('Borrar el id: ' + id);
                        Livewire.emit('delete', id);

                        Swal.fire(
                            'Borrado!',
                            'Ha sido eliminado con éxito.',
                            'success'
                        )
                    }
                })
            })


            Livewire.on('alertCarritoDelete', (idproducto, idtalle, idcolor) => {
                Swal.fire({
                    title: '¿Está seguro /a?',
                    text: "La acción no podrá ser revertida!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, borrar!'
                }).then((result) => {


                    if (result.isConfirmed) {
                        Livewire.emit('delete', idproducto, idtalle, idcolor);

                        // Swal.fire(
                        //     'Borrado!',
                        //     'Ha sido eliminado con éxito.',
                        //     'success'
                        // )
                    }
                })
            })

            //emit del cambio de cantidades en  carrito
            Livewire.on('carrito', function(mensaje) {
                Swal.fire(
                    'Excelente!',
                    mensaje['mensaje'],
                    'success'
                )
            });


            //emit mensaje negativo
            Livewire.on('mensajeNegativo', function(mensaje) {
                Swal.fire({
                    title: 'Atencion',
                    text: mensaje['mensaje'],
                    icon: 'warning',
                    showCloseButton: true
                })
            });


            //emit mensaje positivo
            Livewire.on('mensajePositivo', function(mensaje) {
                Swal.fire({
                    title: 'Excelente!',
                    text: mensaje['mensaje'],
                    icon: 'success',
                    showCloseButton: true
                })
            });
        </script>

        <!-- Script de tw-elements -->
        <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
    </body>

    </html>
