<nav class="sticky top-0 z-50">
    <section class="w-full hidden md:block bg-slate-100 items-center gap-y-3 py-2">

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
                    <div class="relative" x-data="{ open: false }">
                        <button x-on:click="open = true" type="button"
                            class="mr-3 w-8 text-sm rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300"
                            id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                            data-dropdown-placement="bottom">
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

                {{-- =======================================================================   --}}
            </div>
        </section>
    </section>
    {{-- Links de Navegación --}}
    @unless (request()->is('admin/*'))
        {{-- <section class="st"> --}}
        <div class="flex bg-slate-200 p-3">
            <div class="flex w-full md:hidden justify-between items-center">
                <button data-collapse-toggle="navbar-user" type="button"
                    class="inline-flex p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-user" aria-expanded="false">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
                <div class="w-32">
                    <a href="/">
                        <img src="{{ asset('./img/logo2.png') }}" alt="Logo Kouro" width="200">
                    </a>
                </div>
                <div>
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
                </div>
            </div>

            <!-- Coloca aquí el código HTML del menú que quieres mostrar -->

            <div class="md:justify-evenly hidden md:w-full md:flex md:order-1" id="navbar-user">
                <ul
                    class="flex flex-col absolute md:relative left-0 md:justify-center top-[70px] md:top-0 font-medium p-4 md:p-0 mt-4 border border-gray-100 md:rounded-lg bg-gray-100 w-full z-10 md:z-0 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-transparent">
                    <li>
                        <a href="/"
                            class="@if (request()->is('/')) { text-red-700 font-bold } @else text-gray-900 @endif block py-2 pl-3 pr-4 rounded md:bg-transparent md:hover-blue-700 md:p-0"
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

        {{-- </section> --}}
    @endunless
</nav>
