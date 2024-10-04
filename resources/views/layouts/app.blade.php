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

  @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="stretched">

  <!-- Document Wrapper
 ============================================= -->
  <div id="wrapper">


    @livewire('navigation')
    {{-- @include('layouts.partials.header') --}}



    @isset($slot)
      {{ $slot }}
    @else
      @yield('content')
      @endif



      {{-- @include('layouts.partials.footer') --}}
      <footer>
        <x-footer />
      </footer>

      @livewireScripts

    </div>

    <!-- Go To Top
       ============================================= -->
    <div id="gotoTop" class="uil uil-angle-up"></div>

    <!-- JavaScripts
        ============================================= -->
    <script src="{{ asset('js/functions.js') }}"></script>
    
    <script>
      if (typeof $ === 'undefined') {
        console.log('jQuery no está cargado');
      } else {
        console.log('jQuery está cargado correctamente');
      }

      if (typeof Popper === 'undefined') {
        console.log('Popper.js no está cargado');
      } else {
        console.log('Popper.js está cargado correctamente');
      }
    </script>
  </body>

  </html>
