@extends('layouts.adminlte')
@section('subtitle', 'Productos')
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
              <th>Precio</th>
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
                <td class="text-center">
                  @livewire(
                      'toggle-button',
                      [
                          'model' => $product,
                          'field' => 'estado',
                      ],
                      key($product->id)
                  )
                </td>
                <td class="d-flex text-right align-middle">

                  <!-- Botón para abrir el modal de imágenes -->
                  <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#imagesModal-{{ $product->id }}">
                    <i class="fas fa-camera"></i>
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="imagesModal-{{ $product->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="imagesModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h3 class="modal-title" id="imagesModalLabel">Fotos de {{ $product->codigo }} -
                            {{ $product->nombre }}</h3>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          @livewire('backend.productosimagenes', ['productId' => $product->id])
                        </div>
                      </div>
                    </div>
                  </div>

                  <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning">
                    <i class="fas fa-edit"></i>
                  </a>

                  <a href="{{ route('products.destroy', $product) }}" class="btn btn-sm btn-danger"
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
