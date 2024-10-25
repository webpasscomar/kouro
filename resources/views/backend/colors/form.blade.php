@extends('layouts.adminlte')

@section('subtitle')
    {{ isset($color) ? 'Editar Color' : 'Nuevo Color' }}
@endsection

@section('content_header_title', 'Admin')
@section('content_header_subtitle')
    {{ isset($color) ? 'Editar color' : 'Nuevo color' }}
@endsection

@section('content_body')
    <div class="card">
        <div class="card-body">

            <form action="{{ isset($color) ? route('colors.update', $color) : route('colors.store') }}" method="POST"
                class="mt-3" enctype="multipart/form-data">
                @csrf
                @if (isset($color))
                    @method('PUT')
                @endif
                {{-- color --}}
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="color" class="form-label">Color</label><span class="ml-1 text-danger">*</span>
                            <input type="text" id="color" name="color"
                                class="form-control @error('color') is-invalid @enderror"
                                value="{{ old('color', isset($color) ? $color->color : '') }}">
                            @error('color')
                                <span class="text-danger mt-1 ml-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    {{-- Estado --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <select name="estado" class="form-select @error('estado') is-invalid @enderror" id="estado">
                                <option value='1'
                                    {{ old('estado', isset($color) ? $color->estado : '') == '1' ? 'selected' : '' }}>
                                    Activo
                                </option>
                                <option value='0'
                                    {{ old('estado', isset($color) ? $color->estado : '') == '0' ? 'selected' : '' }}>
                                    Inactivo
                                </option>
                            </select>
                            @error('estado')
                                <span class="text-danger ml-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                {{-- Imágen --}}
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="imagen" class="form-label">Imágen</label><span class="ml-1 text-danger">*</span>
                            <input type="file" name="imagen" id="imagen"
                                class="form-control @error('imagen') is-invalid @enderror" onchange="imagePreview(event)">

                            <p class="ms-1 mt-1 image-requisite mb-0">Formato:JPG,JPEG,PNG,SVG.Dimensiones:mínimo 100px x
                                100px.Tamaño:1mb</p>
                            @error('imagen')
                                <span class="text-danger mt-1 ml-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div id="imagePreview">
                    @if (isset($color))
                        @if (file_exists(public_path('storage/colores/' . $color->imagen)) && $color->imagen)
                            <img src="{{ asset('storage/colores/' . $color->imagen) }}" class="img-thumbnail"
                                alt="{{ $color->color }}" width="300">
                        @endif
                    @endif
                </div>
                <p class="my-3 text-right field_required"><span
                        class="text-danger field_required-icon align-middle">*</span>Campos
                    obligatorios
                </p>

                <button type="submit" class="btn btn-success">{{ isset($color) ? 'Actualizar' : 'Guardar' }}</button>
                <a href="{{ route('colors.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>

        </div>
    </div>
@endsection

@push('js')
    <script>
        // Función para generar la imágen previa
        const imagePreview = (event) => {
            const imagePreview = document.querySelector('#imagePreview');
            imagePreview.innerHTML = '';
            let image = document.createElement('img');
            let text = document.createElement('p');
            text.innerHTML = 'Vista Previa Color';
            text.classList.add('fw-bold');
            text.classList.add('text-secondary');
            text.classList.add('ms-2');
            let reader = new FileReader();
            reader.onload = () => {
                image.src = reader.result;
                image.style.width = '300px';
                image.style.transition = 'all 1s ease-in-out';
                image.classList.add('img-thumbnail');
                imagePreview.appendChild(image);
            };
            imagePreview.appendChild(text);

            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
@endpush
