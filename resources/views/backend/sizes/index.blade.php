@extends('layouts.adminlte')
@section('subtitle', 'Talles')
@section('content_header_title', 'Admin')
@section('content_header_subtitle', 'Talles')
@section('content_body')
    <div class="card">
        <div class="card-header text-right">
            <a href="{{ route('sizes.create') }}" class="btn btn-success"><i class="fas fa-plus mr-2"></i>Nuevo</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="myTable" class="table table-bordered table-striped my-4">
                    <thead>
                        <tr>
                            <th class="text-left">Cod.</th>
                            <th>Talle</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sizes as $size)
                            <tr>
                                <td class="align-middle text-left">{{ $size->id }}</td>
                                <td class="align-middle">{{ $size->talle }}</td>
                                <td class="{{ $size->estado ? 'text-success' : 'text-secondary' }} text-center">
                                    <i class="{{ $size->estado ? 'fas fa-toggle-on' : 'fas fa-toggle-off' }}"
                                        style="font-size: 25px;"></i>
                                </td>
                                <td class="text-right align-middle">

                                    <a href="{{ route('sizes.edit', $size) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <a href="{{ route('sizes.destroy', $size) }}" class="btn btn-sm btn-danger"
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

@section('js')
    <script>
        $(document).ready(function() {
            $('#sizes-table').DataTable();

            @if (session('success'))
                toast("{{ session('success') }}", 'success');
            @endif
        });
    </script>
@endsection
@endsection
