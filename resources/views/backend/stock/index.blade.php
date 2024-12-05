@extends('layouts.adminlte')
@section('subtitle', 'Stock')
@section('content_header_title', 'Admin')
@section('content_header_subtitle', 'Stock')

@section('content_body')
    <div class="card">
        {{-- <div class="card-header text-right">
      <a href="{{ route('categories.create') }}" class="btn btn-success"><i class="fas fa-plus mr-2"></i>Nueva</a>
    </div> --}}

        <div class="card-body">
            <div class="table-responsive">

                <table id="myTable" class="table my-4 table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="align-middle text-left">Cod. Producto</th>
                            <th class="align-middle text-left">Producto</th>
                            <th class="align-middle text-left">Color</th>
                            <th class="align-middle text-left">Talle</th>
                            <th class="align-middle text-left">Stock</th>
                            {{-- <th>Acciones</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sku as $item)
                            <tr>
                                <td class="align-middle text-left">{{ $item->producto->codigo }}</td>
                                <td class="align-middle text-left">{{ $item->producto->nombre }}</td>
                                <td class="align-middle text-left">{{ $item->color->color }}</td>
                                <td class="align-middle text-left">{{ $item->talle->talle }}</td>
                                <td class="align-middle text-left">{{ $item->stock }}</td>
                            </tr>
                        @endforeach
                        {{-- @foreach ($categories as $category)
              <tr>
                <td class="align-middle text-left">{{ $category->id }}</td>
                <td class="align-middle"><img
                    src="{{ file_exists(public_path('storage/categorias/' . $category->imagen)) && isset($category->imagen) ? asset('storage/categorias/' . $category->imagen) : asset('img/Imagen-no-disponible.png') }}"
                    alt="{{ $category->nombre }}" class="img-fluid" width="40">
                </td>
                <td class="align-middle">{{ $category->categoria }}</td>
                <td class="align-middle">{{ $category->slug }}</td>
                <td class="text-center">
                  @livewire(
                      'toggle-button',
                      [
                          'model' => $category,
                          'field' => 'estado',
                      ],
                      key($category->id)
                  )
                </td>
                <td class="text-right align-middle">
                  <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-warning">
                    <i class="fas fa-edit"></i>
                  </a>
                  <a href="{{ route('categories.destroy', $category) }}" class="btn btn-sm btn-danger"
                    data-confirm-delete="true">
                    <i class="fas fa-trash"></i>
                  </a>
                </td>
              </tr>
            @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
