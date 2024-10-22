@extends('layouts.adminlte')
@section('subtitle', 'Presentaciones')
@section('content_header_title', 'Admin')
@section('content_header_subtitle', 'Presentaciones')
@section('content_body')
    <div class="card">
        <div class="card-header text-right">
            <a href="{{ route('presentations.create') }}" class="btn btn-success"><i class="fas fa-plus mr-2"></i>Nuevo</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="myTable" class="table table-bordered table-striped my-4">
                    <thead>
                        <tr>
                            <th>Presentación</th>
                            <th>Sigla</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($presentations as $presentation)
                            <tr>
                                <td>{{ $presentation->presentacion }}</td>
                                <td>{{ $presentation->sigla }}</td>
                                <td class="{{ $presentation->estado ? 'text-success' : 'text-secondary' }} text-center">
                                    <i class="{{ $presentation->estado ? 'fas fa-toggle-on' : 'fas fa-toggle-off' }}"
                                        style="font-size: 25px;"></i>
                                </td>
                                <td class="text-right align-middle">
                                    <a href="{{ route('presentations.edit', $presentation) }}"
                                        class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>

                                    <a href="{{ route('presentations.destroy', $presentation) }}"
                                        class="btn btn-sm btn-danger" data-confirm-delete="true">
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
