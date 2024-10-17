@extends('layouts.adminlte')
@section('title', 'Productos')
@section('content_header_title', 'Admin')
@section('content_header_subtitle', 'Productos')
@section('content_body')
  <div class="card">
    <div class="card-header text-right">
      <a href="{{ route('products.create') }}" class="btn btn-success mb-3"><i class="fas fa-plus mr-2"></i>Nuevo</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table id="myTable" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Descripción Corta</th>
              <th>Precio Lista</th>
              <th>Estado</th>
              <th class="text-right">Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($products as $product)
              <tr>
                <td class="align-middle">{{ $product->nombre }}</td>
                <td class="align-middle">{{ $product->desCorta }}</td>
                <td class="align-middle">{{ $product->precioLista }}</td>
                <td class="{{ $product->estado ? 'text-success' : 'text-secondary' }} text-center">
                  <i class="{{ $product->estado ? 'fas fa-toggle-on' : 'fas fa-toggle-off' }}"
                    style="font-size: 25px;"></i>
                </td>
                <td class="text-right align-middle">
                  <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning">
                    <i class="fas fa-edit"></i>
                  </a>
                  <a href="{{ route('products.destroy', $product) }}" class="btn btn-sm btn-danger"
                    data-confirm-delete="true">
                    <i class="fas fa-trash"></i>
                  </a>
                  {{-- <a href="{{ route('products.photos', $product) }}" class="btn btn-sm btn-info" data-toggle="modal"
                    data-target="#photoModal">
                    <i class="fas fa-camera"></i>
                  </a> --}}
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
