<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProductFrontImages extends Component
{
    public $images;
    public $selectedImages;

    public function mount($images)
    {
        $this->images = $images;
        $this->selectedImages = $images[0];
    }

    public function selectImage($image)
    {
        $this->selectedImages = $image;
    }

    public function render()
    {

        // dd($this->images, $this->selectedImages);

        return view('livewire.product-front-images');
    }
}
