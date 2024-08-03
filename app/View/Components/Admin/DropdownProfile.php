<?php

namespace App\View\Components\admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\HtmlString;
use Illuminate\View\Component;

class DropdownProfile extends Component
{
    public $href;
    public $name;
    public $icon;
    /**
     * Create a new component instance.
     */
    public function __construct($href, $name, $icon)
    {
        //
        $this->href = $href;
        $this->name = $name;
        $this->icon = new HtmlString($icon);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.dropdown-profile');
    }
}
