<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class FooterCategories extends Component
{
    public $categories;

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function render()
    {
        return view('livewire.footer-categories');
    }
}
