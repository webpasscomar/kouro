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
                                    <div class="p-3" style="background-color: {{ $color->pcolor }}"></div>
                                </td>
                                <td class="align-middle">{{ $color->color }}</td>
                                <td
                                    class="{{ $color->estado ? 'text-success' : 'text-secondary' }} text-center align-middle">
                                    <i class="{{ $color->estado ? 'fas fa-toggle-on' : 'fas fa-toggle-off' }}"
                                        style="font-size: 25px;"></i>
                                </td>
                                <td class="text-right align-middle">
                                    <a href="{{ route('categories.edit', $color) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ route('categories.destroy', $color) }}" class="btn btn-sm btn-danger"
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
