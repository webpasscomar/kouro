<div class="grid gap-4">
    {{-- Imágen seleccionada del producto  --}}
    <div class="max-w-full max-h-96 rounded-lg shadow-md shadow-gray-400 overflow-hidden">
        <img class="w-full h-full object-cover" src="{{ asset('storage/productos/' . $selectedImages) }}" alt="imagen1">
    </div>
    {{-- Imágenes alternativas   --}}
    <div class="grid grid-cols-5 gap-4">
        @foreach ($images as $image)
            <label class="relative rounded-lg shadow-md shadow-gray-400 hover:ring-4 hover:ring-red-400"
                wire:click="selectImage('{{ $image }}')">
                <input type="radio" wire:model="selectedImages" value="{{ asset('storage/productos/' . $image) }}"
                    class="h-full w-full rounded-lg absolute left-0 opacity-0 cursor-pointer peer">
                <img src="{{ asset('storage/productos/' . $image) }}" alt="imagen"
                    class="h-full max-w-full rounded-lg peer-checked:ring-4 peer-checked:ring-red-500 peer-focus:ring-4 peer-focus:ring-red-500"alt="image">
            </label>
        @endforeach
        {{-- <div>
            <img class="h-auto max-w-full rounded-lg hover:border-4 hover:border-red-400"
                src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg" alt="">
        </div> --}}
    </div>
</div>
