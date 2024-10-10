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
    {{-- @yield('content_body') --}}
    {{ $slot }}
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Add your common script logic here...

            // document.addEventListener('livewire:load', function() {
            //     window.livewire.on('mostrarModal', () => {
            //         var modal = new bootstrap.Modal(document.getElementById('exampleModal'));
            //         modal.show();
            //     });

            //     window.livewire.on('ocultarModal', () => {
            //         var modal = bootstrap.Modal.getInstance(document.getElementById(
            //             'exampleModal'));
            //         modal.hide();
            //     });
            // });

            // Implemetación datatables
            $('#myTable').DataTable({
                "stateSave": true, // Habilita guardar el estado
                "language": {
                    "lengthMenu": "Mostrar _MENU_ elementos por página",
                    "zeroRecords": "No se encontraron resultados",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(filtrados de _MAX_ registros totales)",
                    "search": "Buscar:",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                }
            });

            // Redibujar tabla - datatables
            Livewire.on('table', () => {
                // Guardar el estado actual de DataTables
                let tableState = $('#myTable').DataTable().state();
                let tableStateCopy;

                // Destruir la instancia de DataTables
                $('#myTable').DataTable().destroy();

                // Recrear DataTables
                $('#myTable').DataTable({
                    "stateSave": true, // Habilitar guardar el estado
                    "language": {
                        "lengthMenu": "Mostrar _MENU_ elementos por página",
                        "zeroRecords": "No se encontraron resultados",
                        "info": "Mostrando página _PAGE_ de _PAGES_",
                        "infoEmpty": "No hay registros disponibles",
                        "infoFiltered": "(filtrados de _MAX_ registros totales)",
                        "search": "Buscar:",
                        "paginate": {
                            "first": "Primero",
                            "last": "Último",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        }
                    }
                });
                // Restaurar el estado guardado
                if (tableState.time != tableStateCopy
                    .time) { // comparar cada cambio en el estado de datable con el timestamp
                    $('#myTable').DataTable().state.clear(); // Limpiar el estado actual antes de restaurar
                    $('#myTable').DataTable().state.restore(tableState);
                }
                tableStateCopy =
                    tableState; // Copiar el estado en otra variable para poder comparar con el estado anterior el timestamp
            });


            // ABM Mensaje de exito / error

            // Crear
            Livewire.on('messageCreate', () => {
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
                Toast.fire({
                    icon: "success",
                    title: "Talle creado con éxito"
                });
            });

            // Editar
            Livewire.on('messageUpdate', () => {
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
                Toast.fire({
                    icon: "success",
                    title: "Talle modificado con éxito"
                });
            });

            // Eliminar
            Livewire.on('messageDelete', () => {
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
                Toast.fire({
                    icon: "success",
                    title: "Talle eliminado con éxito"
                });
            });


            Livewire.on('confirmDelete', (id) => {
                Livewire.emit('refreshTable');
                Swal.fire({
                    title: "Está seguro?",
                    text: "Está acción no se podrá revertir!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    cancelButtonText: "Cancelar",
                    confirmButtonText: "Si, eliminar!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emit('delete', id);
                    } else {
                        Livewire.emit('refreshTable');
                    }
                });
            });
        });
    </script>
    @livewireScripts

    {{-- @include('sweetalert::alert') --}}
@endpush

{{-- Add common CSS customizations --}}

@push('css')
    {{-- Fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
@endpush
