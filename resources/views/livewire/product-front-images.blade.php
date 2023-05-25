<div class="grid gap-4">
    {{-- Imágen seleccionada del producto  --}}
    <div class="max-w-full max-h-96 rounded-lg shadow-md shadow-gray-400 overflow-hidden">
        <img class="w-full h-full object-cover" src="{{ $selectedImages }}" alt="imagen1">
    </div>
    {{-- Imágenes alternativas   --}}
    <div class="grid grid-cols-5 gap-4">
        @foreach ($images as $image)
            <button type="button" class="relative rounded-lg shadow-md shadow-gray-400 hover:ring-4 hover:ring-red-400"
                wire:click="selectImage('{{ $image }}')">
                @if (
                    $image ===
                        'https://images.unsplash.com/photo-1520256862855-398228c41684?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=869&q=80')
                    <input type="radio" name="img"
                        class="h-full w-full rounded-lg absolute left-0 opacity-0 cursor-pointer peer" checked>
                @else
                    <input type="radio" name="img"
                        class="h-full w-full rounded-lg absolute left-0 opacity-0 cursor-pointer peer">
                @endif
                <img src="{{ $image }}" alt="imagen"
                    class="h-full max-w-full rounded-lg peer-checked:ring-4 peer-checked:ring-red-500 peer-focus:ring-4 peer-focus:ring-red-500"alt="image">
            </button>
        @endforeach
        {{-- <div>
            <img class="h-auto max-w-full rounded-lg hover:border-4 hover:border-red-400"
                src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg" alt="">
        </div> --}}
    </div>
</div>
