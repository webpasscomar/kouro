@extends('layouts.adminlte')
@section('title', 'Producto | Imagenes')
@section('content_header_title', 'Admin')
@section('content_header_subtitle')
    Producto {!! '<i class="fas fa-xs fa-angle-right text-muted fs-5 align-middle"></i>' !!}
    {{ Str::title($product->nombre) }} {!! '<i class="fas fa-xs fa-angle-right text-muted fs-5 align-middle"></i>' !!} Imagenes
@endsection

@section('content_body')
    <div class="card mt-4">
        <div class="card-body">
            <form action="{{ route('products_image.store', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="color_id">Color</label><span class="ml-1 text-danger">*</span>
                                <select name="color_id" id="color_id" @selected(old('color_id') ?? '')
                                    class="form-select @error('color_id') is-invalid @enderror">
                                    <option value="">Seleccione un color</option>
                                    @forelse ($colors as $color)
                                        <option value="{{ $color->id }}">{{ $color->color }}</option>
                                    @empty
                                        <option>No existe ningún color</option>
                                    @endforelse
                                </select>
                                {{-- <input type="text" name="nombre"
                                    class="form-control @error('nombre') is-invalid @enderror"
                                    value="{{ old('nombre', $product->nombre ?? '') }}"> --}}
                                @error('color_id')
                                    <span class="text-danger ml-1">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="image">Imágen</label><span class="ml-1 text-danger">*</span>
                                <input type="file" name="image" id="image" onchange="imagePreview(event)"
                                    class="form-control @error('image') is-invalid @enderror"
                                    value="{{ old('image' ?? '') }}">
                                <p class="ms-1 mt-1 image-requisite mb-0">Formato permitido:JPG,JPEG,PNG,SVG. Tamaño:1mb</p>
                                @error('image')
                                    <span class="text-danger ml-1">{{ $message }}</span>
                                @enderror
                            </div>
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
                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="{{ route('products_image.index', $product->id) }}" class="btn btn-secondary">Cancelar</a>
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
