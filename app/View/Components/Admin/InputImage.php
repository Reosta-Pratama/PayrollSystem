<?php

namespace App\View\Components\admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputImage extends Component
{
    public $photo;
    public $name;
    public $oldDestination;
    public $newDestination;
    public $isRequired;
    /**
     * Create a new component instance.
     */
    public function __construct($photo, $name, $oldDestination, $newDestination, $isRequired = false)
    {
        //
        $this->photo = $photo;
        $this->name = $name;
        $this->oldDestination = $oldDestination;
        $this->newDestination = $newDestination;
        $this->isRequired = $isRequired;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.input-image');
    }
}
