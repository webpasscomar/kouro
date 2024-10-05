{{-- <div class="grid gap-4"> --}}
{{-- Imágen seleccionada del producto  --}}
{{-- <div class="max-w-full max-h-96 rounded-lg shadow-md shadow-gray-400 overflow-hidden">
    <img class="w-full h-full object-cover" src="{{ asset('storage/productos/' . $selectedImages) }}" alt="imagen1">
  </div> --}}
{{-- Imágenes alternativas   --}}
{{-- <div class="grid grid-cols-5 gap-4">
    @foreach ($images as $image)
      <label class="relative rounded-lg shadow-md shadow-gray-400 hover:ring-4 hover:ring-red-400"
        wire:click="selectImage('{{ $image }}')">
        <input type="radio" wire:model="selectedImages" value="{{ asset('storage/productos/' . $image) }}"
          class="h-full w-full rounded-lg absolute left-0 opacity-0 cursor-pointer peer">
        <img src="{{ asset('storage/productos/' . $image) }}" alt="imagen"
          class="h-full max-w-full rounded-lg peer-checked:ring-4 peer-checked:ring-red-500 peer-focus:ring-4 peer-focus:ring-red-500"alt="image">
      </label>
    @endforeach

  </div>
</div> --}}





<div class="fslider flex-thumb-grid grid-6" data-pagi="false" data-arrows="false" data-thumbs="true">
  <div class="flexslider">
    <div class="slider-wrap">
      @foreach ($images as $image)
        <div class="slide" data-thumb="{{ asset('storage/productos/' . $image) }}">
          <img src="{{ asset('storage/productos/' . $image) }}" alt="Image">
          {{-- <div class="bg-overlay">
            <div class="bg-overlay-content justify-content-start align-items-end">
              <div class="h4 fw-light bg-light text-dark px-3 py-2">Government Contraction</div>
            </div>
          </div> --}}
        </div>
      @endforeach

      {{-- <div class="slide" data-thumb="demos/construction/images/gallery/thumbs/1.jpg">
        <img src="demos/construction/images/gallery/1.jpg" alt="Image">
        <div class="bg-overlay">
          <div class="bg-overlay-content justify-content-start align-items-end">
            <div class="h4 fw-light bg-light text-dark px-3 py-2">Government Contraction</div>
          </div>
        </div>
      </div> 
      <div class="slide" data-thumb="demos/construction/images/gallery/thumbs/2.jpg">
        <img src="demos/construction/images/gallery/2.jpg" alt="Image">
        <div class="bg-overlay">
          <div class="bg-overlay-content justify-content-start align-items-end">
            <div class="h4 fw-light bg-light text-dark px-3 py-2">Home Renovation</div>
          </div>
        </div>
      </div>    
      <div class="slide" data-thumb="demos/construction/images/gallery/thumbs/3.jpg">
        <img src="demos/construction/images/gallery/3.jpg" alt="Image">
        <div class="bg-overlay">
          <div class="bg-overlay-content justify-content-start align-items-end">
            <div class="h4 fw-light bg-light text-dark px-3 py-2">Residential Construction</div>
          </div>
        </div>
      </div>
      <div class="slide" data-thumb="demos/construction/images/gallery/thumbs/4.jpg">
        <img src="demos/construction/images/gallery/4.jpg" alt="Image">
        <div class="bg-overlay">
          <div class="bg-overlay-content justify-content-start align-items-end">
            <div class="h4 fw-light bg-light text-dark px-3 py-2">Wooden Floor</div>
          </div>
        </div>
      </div>
      <div class="slide" data-thumb="demos/construction/images/gallery/thumbs/5.jpg">
        <img src="demos/construction/images/gallery/5.jpg" alt="Image">
        <div class="bg-overlay">
          <div class="bg-overlay-content justify-content-start align-items-end">
            <div class="h4 fw-light bg-light text-dark px-3 py-2">Repairing of Houses</div>
          </div>
        </div>
      </div>
      <div class="slide" data-thumb="demos/construction/images/gallery/thumbs/6.jpg">
        <img src="demos/construction/images/gallery/6.jpg" alt="Image">
        <div class="bg-overlay">
          <div class="bg-overlay-content justify-content-start align-items-end">
            <div class="h4 fw-light bg-light text-dark px-3 py-2">Building Renovaion</div>
          </div>
        </div>
      </div>
      <div class="slide" data-thumb="demos/construction/images/gallery/thumbs/7.jpg">
        <img src="demos/construction/images/gallery/7.jpg" alt="Image">
        <div class="bg-overlay">
          <div class="bg-overlay-content justify-content-start align-items-end">
            <div class="h4 fw-light bg-light text-dark px-3 py-2">Hightech Construction</div>
          </div>
        </div>
      </div>
      <div class="slide" data-thumb="demos/construction/images/gallery/thumbs/8.jpg">
        <img src="demos/construction/images/gallery/8.jpg" alt="Image">
        <div class="bg-overlay">
          <div class="bg-overlay-content justify-content-start align-items-end">
            <div class="h4 fw-light bg-light text-dark px-3 py-2">Hardwood Flooring</div>
          </div>
        </div>
      </div>
      <div class="slide" data-thumb="demos/construction/images/gallery/thumbs/9.jpg">
        <img src="demos/construction/images/gallery/9.jpg" alt="Image">
        <div class="bg-overlay">
          <div class="bg-overlay-content justify-content-start align-items-end">
            <div class="h4 fw-light bg-light text-dark px-3 py-2">Commercial Construction</div>
          </div>
        </div>
      </div>
      <div class="slide" data-thumb="demos/construction/images/gallery/thumbs/10.jpg">
        <img src="demos/construction/images/gallery/10.jpg" alt="Image">
        <div class="bg-overlay">
          <div class="bg-overlay-content justify-content-start align-items-end">
            <div class="h4 fw-light bg-light text-dark px-3 py-2">Repairing Of Roof</div>
          </div>
        </div>
      </div>
      <div class="slide" data-thumb="demos/construction/images/gallery/thumbs/11.jpg">
        <img src="demos/construction/images/gallery/11.jpg" alt="Image">
        <div class="bg-overlay">
          <div class="bg-overlay-content justify-content-start align-items-end">
            <div class="h4 fw-light bg-light text-dark px-3 py-2">Home Renovation</div>
          </div>
        </div>
      </div>
      <div class="slide" data-thumb="demos/construction/images/gallery/thumbs/12.jpg">
        <img src="demos/construction/images/gallery/12.jpg" alt="Image">
        <div class="bg-overlay">
          <div class="bg-overlay-content justify-content-start align-items-end">
            <div class="h4 fw-light bg-light text-dark px-3 py-2">Office Renovation</div>
          </div>
        </div>
      </div> --}}

    </div>
  </div>
</div>
