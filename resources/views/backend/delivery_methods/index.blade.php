@extends('adminlte::page')

@section('title', 'Métodos de Entrega')

@section('content_header')
  <h1>Métodos de Entrega</h1>
@endsection

@section('content')
  <a href="{{ route('delivery_methods.create') }}" class="btn btn-primary mb-3">Nuevo Método de Entrega</a>

  <table id="methods-table" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Costo</th>
        <th>Estado</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($methods as $method)
        <tr>
          <td>{{ $method->name }}</td>
          <td>{{ $method->cost }}</td>
          <td>{{ $method->status ? 'Activo' : 'Inactivo' }}</td>
          <td>
            <a href="{{ route('delivery_methods.edit', $method->id) }}" class="btn btn-sm btn-warning">
              <i class="fas fa-edit"></i>
            </a>
            <form action="{{ route('delivery_methods.destroy', $method->id) }}" method="POST" style="display:inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger"
                onclick="return confirm('¿Estás seguro de eliminar este método?');">
                <i class="fas fa-trash"></i>
              </button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection

@section('css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endsection


@section('js')
  <script>
    $(document).ready(function() {
      $('#methods-table').DataTable();
    });
  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <script>
    @if (Session::has('toastr::notifications'))
      {!! Toastr::message() !!}
    @endif
  </script>
@endsection
