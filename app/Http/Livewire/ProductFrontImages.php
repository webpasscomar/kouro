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
<<<<<<< HEAD
        $this->selectedImages = $images[0];
=======
        if ($images) {
            $this->selectedImages = $images[0];
        }else{
            $this->selectedImages = null;
        }

>>>>>>> 288272709c91085d02ad8d5cd6e339fa9fd4bb08
    }

    public function selectImage($image)
    {
        $this->selectedImages = $image;
    }

    public function render()
    {
<<<<<<< HEAD
=======

        // dd($this->images, $this->selectedImages);

>>>>>>> 288272709c91085d02ad8d5cd6e339fa9fd4bb08
        return view('livewire.product-front-images');
    }
}
