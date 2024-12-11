@extends('layouts.adminlte')
@section('title', 'Producto')
@section('content_header_title', 'Admin')
@section('content_header_subtitle', isset($product) ? 'Editar Producto' : 'Nuevo Producto')

@section('content_body')
    <div class="card">
        <div class="card-body">
            <form action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}"
                method="POST">
                @csrf
                @if (isset($product))
                    @method('PUT')
                @endif

                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label><span class="ml-1 text-danger">*</span>
                                    <input type="text" name="nombre"
                                        class="form-control @error('nombre') is-invalid @enderror"
                                        value="{{ old('nombre', $product->nombre ?? '') }}">
                                    @error('nombre')
                                        <span class="text-danger ml-1">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="desCorta">Descripción Corta</label><span class="ml-1 text-danger">*</span>
                                    <input type="text" name="desCorta"
                                        class="form-control @error('desCorta') is-invalid @enderror"
                                        value="{{ old('desCorta', $product->desCorta ?? '') }}">
                                    @error('desCorta')
                                        <span class="text-danger ml-1">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="descLarga">Descripción Larga</label><span class="ml-1 text-danger">*</span>
                                    <textarea name="descLarga" class="form-control @error('descLarga') is-invalid @enderror">{{ old('descLarga', $product->descLarga ?? '') }}</textarea>
                                    @error('descLarga')
                                        <span class="text-danger ml-1">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="categorias">Categorías</label><span class="ml-1 text-danger">*</span>
                            <select name="categorias[]" id="categorias"
                                class="form-control select2 @error('categorias') is-invalid @enderror" multiple>
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}"
                                        {{ isset($product) && $product->categorias->contains($categoria->id) ? 'selected' : '' }}>
                                        {{ Str::title($categoria->categoria) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('categorias')
                                <span class="text-danger ml-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>



                </div>


                <div class="row">
                    <div class="col">

                    </div>

                </div>


                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="codigo">Código</label>
                            <input type="text" name="codigo" class="form-control @error('codigo') is-invalid @enderror"
                                value="{{ old('codigo', $product->codigo ?? '') }}">
                            @error('codigo')
                                <span class="text-danger ml-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="presentacion_id">Presentación</label>
                            <select name="presentacion_id"
                                class="form-select @error('presentacion_id') is-invalid @enderror">
                                <option value="">Seleccione una presentación</option>
                                @foreach ($presentations as $presentation)
                                    <option value="{{ $presentation->id }}"
                                        {{ (isset($product) && $product->presentacion_id == $presentation->id) || (!isset($product) && $presentation->id == 2) ? 'selected' : '' }}>
                                        {{ $presentation->presentacion }}
                                    </option>
                                @endforeach
                            </select>
                            @error('presentacion_id')
                                <span class="text-danger ml-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="precioLista">Precio Lista</label><span class="ml-1 text-danger">*</span>
                            <input type="text" name="precioLista"
                                class="form-control @error('precioLista') is-invalid @enderror"
                                value="{{ old('precioLista', $product->precioLista ?? '') }}">
                            @error('precioLista')
                                <span class="text-danger ml-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="precioOferta">Precio Oferta</label>
                            <input type="text" name="precioOferta"
                                class="form-control @error('precioOferta') is-invalid @enderror"
                                value="{{ old('precioOferta', $product->precioOferta ?? '') }}">
                            @error('precioOferta')
                                <span class="text-danger ml-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="ofertaDesde">Oferta Desde</label>
                            <input type="date" name="ofertaDesde"
                                class="form-control @error('ofertaDesde') is-invalid @enderror"
                                value="{{ old('ofertaDesde', $product->ofertaDesde ?? '') }}">
                            @error('ofertaDesde')
                                <span class="text-danger ml-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="ofertaHasta">Oferta Hasta</label>
                            <input type="date" name="ofertaHasta"
                                class="form-control @error('ofertaHasta') is-invalid @enderror"
                                value="{{ old('ofertaHasta', $product->ofertaHasta ?? '') }}">
                            @error('ofertaHasta')
                                <span class="text-danger ml-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="peso">Peso</label>
                            <input type="text" name="peso" class="form-control @error('peso') is-invalid @enderror"
                                value="{{ old('peso', $product->peso ?? '') }}">
                            @error('peso')
                                <span class="text-danger ml-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="tamano">Tamaño</label>
                            <input type="text" name="tamano"
                                class="form-control @error('tamano') is-invalid @enderror"
                                value="{{ old('tamano', $product->tamano ?? '') }}">
                            @error('tamano')
                                <span class="text-danger ml-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="link">Link</label>
                            <input type="url" name="link"
                                class="form-control @error('link') is-invalid @enderror"
                                value="{{ old('link', $product->link ?? '') }}">
                            @error('link')
                                <span class="text-danger ml-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="orden">Orden</label>
                            <input type="number" name="orden"
                                class="form-control @error('orden') is-invalid @enderror"
                                value="{{ old('orden', $product->orden ?? 0) }}">
                            @error('orden')
                                <span class="text-danger ml-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="unidadVenta">Unidad de Venta</label>
                            <input type="text" name="unidadVenta"
                                class="form-control @error('unidadVenta') is-invalid @enderror"
                                value="{{ old('unidadVenta', $product->unidadVenta ?? 1) }}">
                            @error('unidadVenta')
                                <span class="text-danger ml-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="destacar">Destacar</label>
                            <select name="destacar" class="form-select @error('destacar') is-invalid @enderror">
                                <option value="0" {{ isset($product) && $product->destacar == 0 ? 'selected' : '' }}>
                                    No</option>
                                <option value="1" {{ isset($product) && $product->destacar == 1 ? 'selected' : '' }}>
                                    Sí</option>
                            </select>
                            @error('destacar')
                                <span class="text-danger ml-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>




                <div class="form-group">
                    <label for="estado">Estado</label>
                    <select name="estado" class="form-select @error('estado') is-invalid @enderror">
                        <option value="1" {{ isset($product) && $product->estado == 1 ? 'selected' : '' }}>Activo
                        </option>
                        <option value="0" {{ isset($product) && $product->estado == 0 ? 'selected' : '' }}>Inactivo
                        </option>
                    </select>
                    @error('estado')
                        <span class="text-danger ml-1">{{ $message }}</span>
                    @enderror
                </div>

                <p class="my-3 text-right field_required"><span
                        class="text-danger field_required-icon align-middle">*</span>Campos
                    obligatorios
                </p>

                <button type="submit" class="btn btn-success">{{ isset($product) ? 'Actualizar' : 'Guardar' }}</button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
