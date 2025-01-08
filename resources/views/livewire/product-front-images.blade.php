<div class="row g-4">
    {{-- Imagen seleccionada del producto --}}
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="position-relative w-100"
                style="aspect-ratio: 3 / 2; overflow: hidden; background-color: #f8f9fa;">
                <img src="{{ asset('storage/productos/' . $selectedImages) }}" alt="imagen1"
                    class="position-absolute top-50 start-50 translate-middle"
                    style="min-width: 100%; min-height: 100%; object-fit: cover;">
            </div>
        </div>
    </div>
    {{-- Imágenes alternativas con slider --}}
    <div class="col-12">
        <div class="d-flex align-items-center position-relative">
            <button class="btn btn-outline-secondary me-2" onclick="scrollThumbnails(-1)" style="flex-shrink: 0;">
                ‹
            </button>
            <div class="d-flex overflow-hidden flex-grow-1" id="thumbnails-container" style="scroll-behavior: smooth;">
                @foreach ($images as $index => $image)
                    <div class="flex-shrink-0" style="width: calc(100% / 5); padding: 0 0.5rem;">
                        <label class="position-relative d-block rounded border shadow-sm hover-overlay"
                            style="cursor: pointer; overflow: hidden; background-color: #f8f9fa; aspect-ratio: 3 / 2;"
                            wire:click="selectImage('{{ $image }}')">
                            <input type="radio" wire:model="selectedImages"
                                value="{{ asset('storage/productos/' . $image) }}"
                                class="position-absolute top-0 start-0 w-100 h-100 opacity-0">
                            <img src="{{ asset('storage/productos/' . $image) }}" alt="imagen"
                                class="position-absolute top-50 start-50 translate-middle"
                                style="min-width: 100%; min-height: 100%; object-fit: cover;">
                        </label>
                    </div>
                @endforeach
            </div>
            <button class="btn btn-outline-secondary ms-2" onclick="scrollThumbnails(1)" style="flex-shrink: 0;">
                ›
            </button>
        </div>
    </div>

    <script>
        // Función para desplazar los thumbnails
        function scrollThumbnails(direction) {
            const container = document.getElementById('thumbnails-container');
            const scrollAmount = container.offsetWidth / 5; // Anchura de un thumbnail
            container.scrollBy({
                left: direction * scrollAmount,
                behavior: 'smooth',
            });
        }
    </script>
</div>
