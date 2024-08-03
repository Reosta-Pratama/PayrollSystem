<?php

namespace App\View\Components\admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Tabs extends Component
{
    public $name;
    public $button;
    /**
     * Create a new component instance.
     */
    public function __construct($name, $button)
    {
        //
        $this->name = $name;
        $this->button = $button;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.tabs');
    }
}
