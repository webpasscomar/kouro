{{-- @extends('layouts.adminlte') --}}

{{-- Customize layout sections --}}

@section('subtitle', 'Talles')
@section('content_header_title', 'Admin')
@section('content_header_subtitle', 'Talles')

{{-- Content body: main page content --}}

{{-- @section('content_body') --}}



<div class="card">
    <div class="card-header text-right">
        {{-- <a href="#" class="btn btn-success mb-3"><i class="fas fa-plus"></i> Crear
        Categoría</a> --}}
        <button wire:click='crear' class="btn btn-secondary">
            <i class="fa-regular fa-file me-1"></i>
            Agregar
        </button>
    </div>

    <div class="card-body">

        @if ($modal)
            @include('livewire.backend.talles-form-bs')
        @endif
        <div class="table-responsive">
            <table id="myTable" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Talle</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($talles as $talle)
                        <tr>
                            <td>{{ $talle->id }}</td>
                            <td>{{ $talle->talle }}</td>
                            <td>{{ $talle->estado == 1 ? 'Activo' : 'Inactivo' }}</td>
                            <td class="text-right" style="white-space: nowrap;">

                                <button wire:click="editar({{ $talle->id }})" title="Editar"
                                    class="btn btn-sm btn-primary">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </button>

                                <button wire:click="$emit('confirmDelete',{{ $talle->id }})"
                                    class="btn btn-sm btn-danger" title="Eliminar">
                                    <i class="fa-regular fa-trash-can"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



{{-- @stop --}}

{{-- Push extra CSS --}}

@push('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endpush

{{-- Push extra scripts --}}

@push('js')
    <script>
        // $(document).ready(function() {
        // Livewire.on('loadDatatable', () => {
        //     alert('hola');
        //     $('#talles-table').DataTable({
        //         language: {
        //             "decimal": "",
        //             "emptyTable": "No hay información",
        //             "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
        //             "infoEmpty": "Mostrando 0 a 0 de 0 entradas",
        //             "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        //             "infoPostFix": "",
        //             "thousands": ",",
        //             "lengthMenu": "Mostrar _MENU_ entradas",
        //             "loadingRecords": "Cargando...",
        //             "processing": "Procesando...",
        //             "search": "Buscar:",
        //             "zeroRecords": "No se encontraron resultados",
        //             "paginate": {
        //                 "first": "Primero",
        //                 "last": "Último",
        //                 "next": "Siguiente",
        //                 "previous": "Anterior"
        //             },
        //             "aria": {
        //                 "sortAscending": ": activar para ordenar la columna en orden ascendente",
        //                 "sortDescending": ": activar para ordenar la columna en orden descendente"
        //             }
        //         }
        //     });
        // });
        // });
    </script>
@endpush
