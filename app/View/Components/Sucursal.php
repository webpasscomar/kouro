<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Sucursal extends Component
{
    public $background;
    public $color;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($background, $color)
    {
        $this->background = $background;
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sucursal');
    }
}
