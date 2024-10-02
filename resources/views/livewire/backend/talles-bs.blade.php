@extends('layouts.adminlte')

{{-- Customize layout sections --}}

@section('subtitle', 'Welcome')
@section('content_header_title', 'Admin')
@section('content_header_subtitle', 'Talles')

{{-- Content body: main page content --}}

@section('content_body')



  <div class="card">
    <div class="card-header text-right">

      {{-- <a href="#" class="btn btn-success mb-3"><i class="fas fa-plus"></i> Crear
        Categoría</a> --}}
      <button type="button" wire:click="crear" class="btn btn-primary">
        Abrir Modal
      </button>

    </div>

    <div class="card-body">

      @if ($modal)
        @include('livewire.backend.talles-form-bs')
      @endif

      <table id="talles-table" class="table table-striped table-bordered table-hover">
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

                <button wire:click="editar({{ $talle->id }})" title="Editar">
                  <img src="{{ asset('./img/edit.svg') }}" alt="editar" width="20" height="20"></button>

                <button wire:click="$emit('alertDelete',{{ $talle->id }})" class="w-5 hover:scale-125"><img
                    src="{{ asset('./img/trash.svg') }}" alt="borrar" title="Eliminar" width="20"
                    height="20"></button>

              </td>
            </tr>
          @endforeach
        </tbody>
      </table>

    </div>

  </div>



@stop

{{-- Push extra CSS --}}

@push('css')
  {{-- Add here extra stylesheets --}}
  {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endpush

{{-- Push extra scripts --}}

@push('js')
  <script>
    console.log("Hi, I'm using the Laravel-AdminLTE package!");


  </script>

  <script>
    $(function() {
      $('#talles-table').DataTable({
        language: {
          "decimal": "",
          "emptyTable": "No hay información",
          "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
          "infoEmpty": "Mostrando 0 a 0 de 0 entradas",
          "infoFiltered": "(Filtrado de _MAX_ total entradas)",
          "infoPostFix": "",
          "thousands": ",",
          "lengthMenu": "Mostrar _MENU_ entradas",
          "loadingRecords": "Cargando...",
          "processing": "Procesando...",
          "search": "Buscar:",
          "zeroRecords": "No se encontraron resultados",
          "paginate": {
            "first": "Primero",
            "last": "Último",
            "next": "Siguiente",
            "previous": "Anterior"
          },
          "aria": {
            "sortAscending": ": activar para ordenar la columna en orden ascendente",
            "sortDescending": ": activar para ordenar la columna en orden descendente"
          }
        }
      });
    });
  </script>
@endpush
