@extends('layouts.adminlte')

@section('subtitle', 'Categorias')

@section('content_header_title', 'Admin')
@section('content_header_subtitle', 'Categorias')

@section('content_body')
  <div class="card">
    <div class="card-header text-right">
      <a href="{{ route('categories.create') }}" class="btn btn-success"><i class="fas fa-plus mr-2"></i>Nueva</a>
    </div>

    <div class="card-body">
      <div class="table-responsive">

        <table id="myTable" class="table my-4 table-bordered table-striped">
          <thead>
            <tr>
              <th class="text-left">Cod.</th>
              <th>Imagen</th>
              <th>Categoría</th>
              <th>Slug</th>
              <th>Estado</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($categories as $category)
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
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

@endsection

@section('css')
@endsection


@section('js')
@endsection
