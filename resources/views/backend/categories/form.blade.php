@extends('layouts.adminlte')

@section('subtitle')
    {{ isset($category) ? 'Editar Categoria' : 'Nueva Categoria' }}
@endsection

@section('content_header_title', 'Admin')
@section('content_header_subtitle')
    {{ isset($category) ? 'Editar categoría' : 'Nueva categoría' }}
@endsection

@section('content_body')
    <div class="card">
        <div class="card-body">

            <form action="{{ isset($category) ? route('categories.update', $category) : route('categories.store') }}"
                method="POST" class="mt-3" enctype="multipart/form-data">
                @csrf
                @if (isset($category))
                    @method('PUT')
                @endif
                {{-- categoria y slug --}}
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="categoria" class="form-label">Categoría</label><span
                                class="ml-1 text-danger">*</span>
                            <input type="text" id="categoria" name="categoria" oninput="generateSlug()"
                                class="form-control @error('categoria') is-invalid @enderror"
                                value="{{ old('categoria', isset($category) ? $category->categoria : '') }}">
                            @error('categoria')
                                <span class="text-danger mt-1 ml-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="slug" class="form-label">Slug</label><span class="ml-1 text-danger">*</span>
                            <input type="text" id="slug" name="slug"
                                class="form-control @error('slug') is-invalid @enderror"
                                value="{{ old('slug', isset($category) ? $category->slug : '') }}">
                            @error('slug')
                                <span class="text-danger mt-1 ml-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                {{-- Descripción --}}
                <div class="row mb-3">
                    <div class="form-group">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea name="descripcion" id="descripcion" cols="30" rows="5"
                            class="form-control @error('descripcion') is-invalid @enderror">{{ old('descripcion', isset($category) ? $category->descripcion : '') }}</textarea>
                        @error('descripcion')
                            <span class="text-danger mt-1 ml-1">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                {{-- Categoría Padre - Imágen --}}
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="categoriaPadre_id" class="form-label">Categoria Padre</label>
                            <select name="categoriaPadre_id" id="categoriaPadre_id"
                                class="form-select @error('categoriaPadre_id') is-invalid @enderror">
                                <option value="0">Seleccione una categoria</option>
                                @forelse ($categories_father as $category_father)
                                    <option value="{{ $category_father->id }}"
                                        {{ (isset($category) && $category->categoriaPadre_id == $category_father->id) || old('categoriaPadre_id') == $category_father->id ? 'selected' : '' }}>
                                        {{ $category_father->categoria }}</option>
                                @empty
                                    <option value="a">No existen categorias</option>
                                @endforelse
                            </select>
                            @error('categoriaPadre_id')
                                <span class="text-danger mt-1 ml-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="imagen" class="form-label">Imágen</label><span class="ml-1 text-danger">*</span>
                            <input type="file" name="imagen" id="imagen"
                                class="form-control @error('imagen') is-invalid @enderror" onchange="imagePreview(event)">

                            <p class="ms-1 mt-1 image-requisite mb-0">Formato permitido:JPG,JPEG,PNG,SVG. Tamaño:1mb</p>
                            @error('imagen')
                                <span class="text-danger mt-1 ml-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                {{-- Estado - Mostrar en menú principal --}}
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <select name="estado" class="form-select @error('estado') is-invalid @enderror" id="estado">
                                <option value="1"
                                    {{ old('estado', isset($category) ? $category->estado : '') == '1' ? 'selected' : '' }}>
                                    Activo
                                </option>
                                <option value="0"
                                    {{ old('estado', isset($category) ? $category->estado : '') == '0' ? 'selected' : '' }}>
                                    Inactivo
                                </option>
                            </select>
                            @error('estado')
                                <span class="text-danger ml-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="menu">Mostrar en menú principal</label>
                            <select name="menu" class="form-select @error('menu') is-invalid @enderror" id="menu">
                                <option value="1"
                                    {{ old('menu', isset($category) ? $category->menu : '') == '1' ? 'selected' : '' }}>
                                    Si
                                </option>
                                <option value="0"
                                    {{ old('menu', isset($category) ? $category->menu : '') == '0' ? 'selected' : '' }}>
                                    No
                                </option>
                            </select>
                            @error('menu')
                                <span class="text-danger ml-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div id="imagePreview">
                    @if (isset($category))
                        @if (file_exists(public_path('storage/categorias/' . $category->imagen)) && $category->imagen)
                            <img src="{{ asset('storage/categorias/' . $category->imagen) }}" class="img-thumbnail"
                                alt="{{ $category->categoria }}" width="300">
                        @endif
                    @endif
                </div>
                <p class="my-3 text-right field_required"><span
                        class="text-danger field_required-icon align-middle">*</span>Campos
                    obligatorios
                </p>

                <button type="submit" class="btn btn-success">{{ isset($category) ? 'Actualizar' : 'Guardar' }}</button>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>

        </div>
    </div>
@endsection

@push('js')
    <script>
        // Función para generar el slug automáticamente
        const generateSlug = () => {
            // Tomammos la referencia de los campos categoria y slug para generar el slug automático
            let categoria = document.querySelector('#categoria').value;
            // Generamos el slug
            let slug = categoria
                .toLowerCase()
                .trim()
                .replace(/[^a-z0-9 -]/g, '') // Remover caracteres inválidos
                .replace(/\s+/g, '-') // Reemplazar espacios por guiones
                .replace(/-+/g, '-'); // Eliminar múltiples guiones

            document.querySelector('#slug').value = slug;
        };
        // Función para generar la imágen previa
        const imagePreview = (event) => {
            const imagePreview = document.querySelector('#imagePreview');
            imagePreview.innerHTML = '';
            let image = document.createElement('img');
            let text = document.createElement('p');
            text.innerHTML = 'Vista Previa Imágen';
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
