@extends('layouts.adminlte')
@section('subtitle', 'Colores')

@section('content_header_title', 'Admin')
@section('content_header_subtitle', 'Colores')

@section('content_body')
  <div class="card">
    <div class="card-header text-right">
      <a href="{{ route('colors.create') }}" class="btn btn-success"><i class="fas fa-plus mr-2"></i>Nuevo</a>
    </div>

    <div class="card-body">
      <div class="table-responsive">

        <table id="myTable" class="table my-4 table-bordered table-striped">
          <thead>
            <tr>
              <th class="text-left">Cod.</th>
              <th>Muestra color</th>
              <th>Color</th>
              <th>Estado</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($colors as $color)
              <tr>
                <td class="align-middle text-left">{{ $color->id }}</td>
                <td class="align-middle">
                  <img
                    src="{{ isset($color->imagen) && file_exists(public_path('storage/colores/' . $color->imagen)) ? asset('storage/colores/' . $color->imagen) : asset('img/Imagen-no-disponible.png') }}"
                    alt="{{ $color->color }}" class="img_color img-thumbnail">
                </td>
                <td class="align-middle">{{ $color->color }}</td>
                <td class="text-center">
                  @livewire(
                      'toggle-button',
                      [
                          'model' => $color,
                          'field' => 'estado',
                      ],
                      key($color->id)
                  )
                </td>
                <td class="text-right align-middle">
                  <a href="{{ route('colors.edit', $color) }}" class="btn btn-sm btn-warning">
                    <i class="fas fa-edit"></i>
                  </a>
                  <a href="{{ route('colors.destroy', $color) }}" class="btn btn-sm btn-danger"
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
