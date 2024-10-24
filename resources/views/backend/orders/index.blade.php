@extends('layouts.adminlte')
@section('title', 'Pedidos')
@section('content_header_title', 'Admin')
@section('content_header_subtitle', 'Listado de Pedidos')

@section('content_body')
  <div class="card">
    <div class="card-header text-right">
      <a href="{{ route('orders.create') }}" class="btn btn-success mb-3">
        <i class="fas fa-plus mr-2"></i>Nuevo
      </a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table id="myTable" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Apellido</th>
              <th>Nombre</th>
              {{-- <th>Correo</th> --}}
              <th>Teléfono</th>
              <th>Items</th>
              <th>Total</th>
              <th>Estado</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($orders as $order)
              <tr>
                <td>{{ $order->apellido }}</td>
                <td>{{ $order->nombre }}</td>
                {{-- <td>{{ $order->correo }}</td> --}}
                <td>{{ $order->telefono }}</td>
                <td>{{ $order->cantidadItems }}</td>
                <td>${{ number_format($order->total, 2) }}</td>
                <td class="{{ $order->estado_id == 1 ? 'text-success' : 'text-secondary' }}">
                  <i class="{{ $order->estado_id == 1 ? 'fas fa-check-circle' : 'fas fa-times-circle' }}"></i>
                </td>
                <td class="text-right">
                  <a href="{{ route('orders.edit', $order) }}" class="btn btn-sm btn-warning">
                    <i class="fas fa-edit"></i>
                  </a>
                  <a href="{{ route('orders.destroy', $order->id) }}" class="btn btn-sm btn-danger"
                    data-confirm-delete="true">
                    <i class="fas fa-trash"></i>
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    $(document).ready(function() {
      $('#ordersTable').DataTable();
    });
  </script>
@endpush
