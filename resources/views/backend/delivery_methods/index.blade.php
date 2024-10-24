@extends('layouts.adminlte')

@section('subtitle', 'Métodos de Entrega')

@section('content_header_title', 'Admin')

@section('content_header_subtitle', 'Métodos de entrega')

@section('content_body')

  <div class="card">

    <div class="card-header text-right">
      <a href="{{ route('formas.create') }}" class="btn btn-success"><i class="fas fa-plus mr-2"></i>Nuevo</a>
    </div>

    <div class="card-body">
      <div class="table-responsive">

        <table id="myTable" class="table my-4 table-bordered table-striped">
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
                <td class="align-middle">{{ $method->name }}</td>
                <td class="align-middle">{{ $method->cost }}</td>
                <td class="text-center">
                  @livewire(
                      'toggle-button',
                      [
                          'model' => $method,
                          'field' => 'status',
                      ],
                      key($method->id)
                  )
                </td>
                <td class="text-right align-middle">
                  <a href="{{ route('formas.edit', $method) }}" class="btn btn-sm btn-warning">
                    <i class="fas fa-edit"></i>
                  </a>
                  <a href="{{ route('formas.destroy', $method->id) }}" class="btn btn-sm btn-danger"
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
