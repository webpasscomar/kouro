@extends('adminlte::page')

{{-- Extend and customize the browser title --}}

@section('title')
  {{ config('adminlte.title') }}
  @hasSection('subtitle')
    | @yield('subtitle')
  @endif
@stop

{{-- Extend and customize the page content header --}}

@section('content_header')
  @hasSection('content_header_title')
    <h1 class="text-muted">
      @yield('content_header_title')

      @hasSection('content_header_subtitle')
        <small class="text-dark">
          <i class="fas fa-xs fa-angle-right text-muted"></i>
          @yield('content_header_subtitle')
        </small>
      @endif
    </h1>
  @endif
@stop

{{-- Rename section content to content_body --}}

@section('content')
  @yield('content_body')
@stop

{{-- Create a common footer --}}

@section('footer')
  <div class="float-right">
    Version: {{ config('app.version', '1.0.0') }}
  </div>

  <strong>
    <a href="{{ config('app.company_url', 'https://webpass.com.ar') }}" target="_blank">
      {{ config('app.company_name', 'WebPass') }} | Soluciones IT
    </a>
  </strong>
@stop

{{-- Add common Javascript/Jquery code --}}

@push('js')
  <script>
    $(document).ready(function() {
      // Add your common script logic here...

      document.addEventListener('livewire:load', function() {
        window.livewire.on('mostrarModal', () => {
          var modal = new bootstrap.Modal(document.getElementById('exampleModal'));
          modal.show();
        });

        window.livewire.on('ocultarModal', () => {
          var modal = bootstrap.Modal.getInstance(document.getElementById('exampleModal'));
          modal.hide();
        });
      });

    });
  </script>
@endpush

{{-- Add common CSS customizations --}}

@push('css')
  <style type="text/css">
    {{-- You can add AdminLTE customizations here --}}
    /*
                      .card-header {
                          border-bottom: none;
                      }
                      .card-title {
                          font-weight: 600;
                      }
                      */
  </style>
@endpush
