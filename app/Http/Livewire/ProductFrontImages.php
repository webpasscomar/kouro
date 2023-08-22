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
        if ($images) {
            $this->selectedImages = $images[0];
        } else {
            $this->selectedImages = null;
        }
    }

    public function selectImage($image)
    {
        $this->selectedImages = $image;
    }

    public function render()
    {
        return view('livewire.product-front-images');
    }
}
