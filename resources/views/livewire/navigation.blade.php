{{-- <nav class="bg-gray-800/80 h-32" x-data="{ open = false }">
    <div class="mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between">

            <!-- Mobile menu button-->
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <button x-on:click="open = true" type="button" class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <!--
            Icon when menu is closed.

            Heroicon name: outline/bars-3

            Menu open: "hidden", Menu closed: "block"
          -->
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!--
            Icon when menu is open.

            Heroicon name: outline/x-mark

            Menu open: "block", Menu closed: "hidden"
          -->
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="flex items-center justify-center sm:items-stretch sm:justify-start">

                <div class="flex items-center">
                    <img class="block h-8 w-auto lg:hidden" src="{{ asset('storage/logo.png') }}" alt="Your Company">
                    <img class="hidden w-56 lg:block" src="{{ asset('storage/logo2.png') }}" alt="Your Company">
                <div class="flex flex-shrink-0 items-center">
                    <img class="block h-8 w-auto lg:hidden" src="https://kouro.webpass.online/assets/uploads/7/logo_kouro_6001.png" alt="Your Company">
                    <img class="hidden h-8 w-auto lg:block" src="https://kouro.webpass.online/assets/uploads/7/logo_kouro_6001.png" alt="Your Company">
                </div>
                <div class="hidden sm:ml-6 sm:block justify-center">
                    <div class="flex">

                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href="/" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Inicio</a>

                        <a href="{{ route('productos.index') }}"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Productos</a>
                        <a href="{{ route('productos.index') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Shop</a>

                        <a href="/nosotros"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Sobre
                            nosotros</a>
                        <a href="/nosotros" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Nosotros</a>

                        <a href="/sucursales"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Sucursales</a>

                        <a href="/contacto" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Contacto</a>

                        <a href="{{ route('faqs.index') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Preguntas
                        <a href="{{ route('faqs.index') }}"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Preguntas
                            frecuentes</a>

                        <a href="/contacto"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Contacto</a>


                        @auth
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                {{ __('Log Out') }}
                            </x-jet-dropdown-link>
                        </form>
                        @endauth

                        @guest
                        <a href="/login" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Login</a>
                        @endguest

                    </div>
                </div>
            </div>

            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">

                <!-- Icono de Carrito -->
                <li class="font-sans block mt-4 lg:inline-block lg:mt-0 lg:ml-6 align-middle text-white hover:text-gray-400">
                    <a href="{{ route('carrito') }}" role="button" class="relative flex">
                        <svg class="flex-1 w-8 h-8 fill-current" style="background-color: bg-gray-800" viewbox="0 0 24 24">
                            <path d="M17,18C15.89,18 15,18.89 15,20A2,2 0 0,0 17,22A2,2 0 0,0 19,20C19,18.89 18.1,18 17,18M1,2V4H3L6.6,11.59L5.24,14.04C5.09,14.32 5,14.65 5,15A2,2 0 0,0 7,17H19V15H7.42A0.25,0.25 0 0,1 7.17,14.75C7.17,14.7 7.18,14.66 7.2,14.63L8.1,13H15.55C16.3,13 16.96,12.58 17.3,11.97L20.88,5.5C20.95,5.34 21,5.17 21,5A1,1 0 0,0 20,4H5.21L4.27,2M7,18C5.89,18 5,18.89 5,20A2,2 0 0,0 7,22A2,2 0 0,0 9,20C9,18.89 8.1,18 7,18Z" />
                        </svg>
                        <span class="absolute right-0 top-0 rounded-full
                                            bg-blue-600 w-4 h-4 top right p-0 m-0
                                            text-white font-mono text-sm  leading-tight
                                            text-center">{{ $carrito }}
                            <!-- {{ session('cantidad') ? session('cantidad') : 0 }} -->
                        </span>
                    </a>
                </li>





                <!-- Profile dropdown -->
                <div class="relative ml-3" x-data="{ open: false }">
                    <div>
                        <button x-on:click="open = true" type="button" class="flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                            <span class="sr-only">Open user menu</span>
                            <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                        </button>
                    </div>

                    <div x-show="open" x-on:click.away="open = false" class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                        <!-- Active: "bg-gray-100", Not Active: "" -->
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                            id="user-menu-item-0">Your Profile</a>
                        <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-gray-700"
                            role="menuitem" tabindex="-1" id="user-menu-item-1">Dashboard</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                            tabindex="-1" id="user-menu-item-2">Sign out</a>
                    </div>
                </div>




            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
            <div class="sm:hidden" id="mobile-menu" x-show="open" x-on:click.away="open = false">
                <div class="space-y-1 px-2 pt-2 pb-3">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <a href="#" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page">Inicio</a>

                    <a href="#"
                        class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Productos</a>

                    <a href="#"
                        class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Sobre
                        nosotros</a>

                    <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Sucursales</a>

                    <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Contacto</a>
                </div>

</nav> --}}
<nav class="w-full bg-slate-100 items-center gap-y-3 py-2">
    {{-- Redes sociales y contacto --}}
    {{-- <section class="flex items-center px-4"> --}}
    {{-- <div class="flex gap-x-4 items-center ml-2 flex-1">
            <img src="{{ asset('./storage/contacto/phone.svg') }}" alt="teléfono">
            <span class="-ms-2 text-sm" title="teléfono">
                <strong>011 4627-5723</strong>
            </span>
            <a href="https://wa.me/5491122222222" class="flex" target="_blank" title="whatsapp">
                <img src="{{ asset('./storage/contacto/whatsapp.svg') }}" alt="whatsapp">
                <span class="ms-2 text-sm">
                    <strong>011 4627-5723</strong>
                </span>
            </a>
            <img src="{{ asset('./storage/contacto/mail.svg') }}" alt="correo">
            <span class="-ml-2" title="email">
                <strong>kouroarg@gmail.com</strong>
            </span>
        </div> --}}
    {{-- <div class="flex gap-x-3">
            <img src="{{ asset('./storage/contacto/facebook.svg') }}" alt="facebook" title="facebook">
            <img src="{{ asset('./storage/contacto/instagram.svg') }}" alt="instagram" title="instagram">
            <img src="{{ asset('./storage/contacto/linkedin.svg') }}" alt="linkedin" title="linkedin">
        </div> --}}
    {{-- </section> --}}
    {{-- Logo - Icono carrito - Profile --}}
    <section class="flex items-center justify-between px-4">
        {{-- Logo  --}}
        <div class="w-44 -ms-2">
            <a href="/">
                <img src="{{ asset('./img/logo2.png') }}" alt="Logo Kouro" width="200">
            </a>
        </div>
        {{-- contacto - carrito - Profile --}}
        <div class="flex gap-x-5">
            {{-- Correo  --}}
            <a href="mailto:kouroarg@gmail.com" class="flex items-center" title="email">
                <img src="{{ asset('./img/mail.svg') }}" alt="correo" class="w-6">
                <span class="ms-1">
                    <strong class="text-base">kouroarg@gmail.com</strong>
                </span>
            </a>
            {{-- Whatsapp --}}
            <a href="https://wa.me/5491146275723" class="flex items-center mr-3" target="_blank" title="whatsapp">
                <img src="{{ asset('./img/whatsapp.svg') }}" alt="whatsapp" class="w-7">
                <span class="ms-1">
                    <strong class="text-base">011 4627-5723</strong>
                </span>
            </a>
            {{-- carrito --}}
            <a href="{{ route('carrito') }}" class="relative" role="button">
                <img src="{{ asset('./img/carrito.svg') }}" alt="carrito" class="w-8">
                @if ($carrito > 0)
                    <span
                        class="flex absolute right-0 -top-1 rounded-full w-4 h-4 -p-2 bg-red-600 m-0 text-white font-mono text-sm text-center">
                        <span class="self-center w-full">
                            {{ $carrito }}
                        </span>
                    </span>
                @endif
            </a>
            {{-- =======================================================================   --}}
            {{-- TODO: Revisar si queda o no el botón de acceso user profile  --}}
            {{-- Profile User --}}
            @auth
                <div class="relative " x-data="{ open: false }">
                    <button x-on:click="open = true" type="button"
                        class="mr-3 w-8 text-sm rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300" id="user-menu-button"
                        aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                        <img class="w-8 h-8 rounded-full" src="{{ asset('img/user.png') }}" alt="user photo">
                    </button>
                    <!-- Menú desplegable user -->
                    <div x-show="open" x-on:click.away="open = false"
                        class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                        role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                        <!-- Active: "bg-gray-100", Not Active: "" -->
                        {{-- <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                        id="user-menu-item-0">Your Profile</a> --}}
                        <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                            tabindex="-1" id="user-menu-item-1">Ir al panel</a>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                {{ __('Log Out') }}
                            </x-jet-dropdown-link>
                        </form>
                    </div>
                </div>
            @endauth

            @guest
                <a href="/login" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                    id="user-menu-item-2">Login</a>
            @endguest
            {{-- <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow"
                id="user-dropdown">
                <div class="px-4 py-3">
                    <span class="block text-sm text-gray-900 dark:text-white">Bonnie Green</span>
                    <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">name@flowbite.com</span>
                </div>
                <ul class="py-2" aria-labelledby="user-menu-button">
                    <li>
                        <a href="#"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Earnings</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                            out</a>
                    </li>
                </ul>
            </div> --}}
            {{-- =======================================================================   --}}
        </div>
    </section>

    {{-- Links de Navegación --}}
    @unless (request()->is('admin/*'))
        <section class="mt-2">
            <div class="flex bg-slate-200 p-3">
                <div class="flex md:order-2">
                    <button data-collapse-toggle="navbar-user" type="button"
                        class="inline-flex p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                        aria-controls="navbar-user" aria-expanded="false">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 1h15M1 7h15M1 13h15" />
                        </svg>
                    </button>
                </div>

                <!-- Coloca aquí el código HTML del menú que quieres mostrar -->

                <div class="justify-evenly hidden w-full md:flex md:order-1" id="navbar-user">
                    <ul
                        class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-transparent">
                        <li>
                            <a href="/"
                                class="@if (request()->is('/')) { text-red-700 font-bold } @else text-gray-900 @endif block py-2 pl-3 pr-4 bg-blue-700 rounded md:bg-transparent md:hover-blue-700 md:p-0"
                                aria-current="page">Inicio
                            </a>
                        </li>

                        <a href="{{ route('productos.destacados') }}"
                            class="@if (request()->is('destacados')) { text-red-700 font-bold } @else text-gray-900 @endif block py-2 pl-3 pr-4 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-red-700 md:p-0">Destacados
                        </a>
                        </li>

                        <li>
                            <a href="/nosotros"
                                class="@if (request()->is('nosotros')) { text-red-700 font-bold } @else text-gray-900 @endif block py-2 pl-3 pr-4 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-red-700 md:p-0">Sobre
                                nosotros
                            </a>
                        </li>
                        <li>
                            <a href="/sucursales"
                                class="@if (request()->is('sucursales')) { text-red-700 font-bold } @else text-gray-900 @endif block py-2 pl-3 pr-4 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-red-700 md:p-0">
                                Sucursales
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('faqs.index') }}"
                                class="@if (request()->is('preguntas-frecuentes')) { text-red-700 font-bold } @else text-gray-900 @endif block py-2 pl-3 pr-4 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-red-700 md:p-0">Preguntas
                                frecuentes
                            </a>
                        </li>
                        <li>
                            <a href="/contacto"
                                class="@if (request()->is('contacto')) { text-red-700 font-bold } @else text-gray-900 @endif block py-2 pl-3 pr-4 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-red-700 md:p-0">Contacto
                            </a>
                        </li>
                    </ul>
                </div>

            </div>

        </section>
    @endunless
</nav>
