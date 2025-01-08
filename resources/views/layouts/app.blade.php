<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Kouro">
    <meta name="author" content="Kouro Linea Fina">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- .ico -->
    <link rel="shortcut icon" href="{{ asset('favicons/favicon.ico') }}" type="image/x-icon">
    <title>{{ config('app.name', 'Kouro') }} - @yield('title')</title>

    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="stretched">

    <!-- Document Wrapper
 ============================================= -->
    <div id="wrapper">

        @livewire('navigation')
        {{-- @include('layouts.partials.header') --}}

    </div>


    <div class="container mt-5 mb-5">

        @isset($slot)
            {{ $slot }}
        @else
            @yield('content')
        @endisset

    </div>


    {{-- @include('layouts.partials.footer') --}}

    <x-footer />


    @livewireScripts


    <!-- Go To Top
                   ============================================= -->
    <div id="gotoTop" class="uil uil-angle-up"></div>

    <script src="../../js/functions.js"></script>
    {{-- Sweet Alert 2 - Mensajes --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- JavaScripts
                    ============================================= -->
    {{-- <script src="{{ asset('./js/functions.js') }}"></script> --}}

</body>

</html>
