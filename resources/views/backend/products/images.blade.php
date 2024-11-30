@extends('layouts.adminlte')

@section('subtitle', 'Productos | Imágenes')
@section('content_header_title', 'Admin')
@section('content_header_subtitle')
    Producto {!! '<i class="fas fa-xs fa-angle-right text-muted fs-5 align-middle"></i>' !!}
    {{ Str::title($product->nombre) }} {!! '<i class="fas fa-xs fa-angle-right text-muted fs-5 align-middle"></i>' !!} Imagenes
@endsection

@section('content_body')
    <div class="card">
        <div class="card-header text-right">
            <a href="{{ route('products.index') }}" class="btn btn-secondary my-2 mr-2"><i
                    class="fas fa-arrow-left mr-2"></i>Volver</a>

            <a href="{{ route('products_image.create', $product->id) }}" class="btn btn-success my-2"><i
                    class="fas fa-plus mr-2"></i>Agregar</a>

        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table class="table my-4 table-bordered table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th class="cursor-pointer px-4 py-2 text-left">Cod.</th>
                            <th class="cursor-pointer px-4 py-2">Color</th>
                            <th class="cursor-pointer px-4 py-2">Archivo</th>
                            <th class="cursor-pointer px-4 py-2">Imagen</th>
                            <th class="px-4 py-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @if ($imagenes) --}}
                        @foreach ($images as $img)
                            <tr>
                                <td class="align-middle text-left">{{ $img->id }}</td>
                                <td class="align-middle">
                                    <div class="d-flex align-items-center justify-content-between">
                                        {{ $img->color->color }}
                                        <img src="{{ file_exists(public_path('storage/colores/' . $img->color->imagen)) ? asset('storage/colores/' . $img->color->imagen) : asset('img/Imagen-no-disponible.png') }}"
                                            alt="imagen color" class="img-thumbnail object-cover" width="30"
                                            height="30">
                                    </div>
                                </td>
                                <td class="align-middle">{{ $img->file_name }}</td>
                                <td class="text-left align-middle">
                                    <img src="{{ file_exists(public_path($img->file_path)) ? asset($img->file_path) : asset('img/Imagen-no-disponible.png') }}"
                                        class="img-fluid object-cover" style="width: 50px; height: 50px;">
                                </td>
                                <td class="align-middle text-right">
                                    <a href="{{ route('products_image.destroy', $img->id) }}" class="btn btn-sm btn-danger"
                                        title="Eliminar" data-confirm-delete>
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    {{-- @endif --}}
                </table>

            </div>

        </div>
    </div>


@endsection
