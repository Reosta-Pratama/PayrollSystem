<?php

namespace App\View\Components\admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BtnEditProfile extends Component
{
    public $type;
    public $href;
    /**
     * Create a new component instance.
     */
    public function __construct($type, $href)
    {
        //
        $this->type = $type;
        $this->href = $href;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.btn-edit-profile');
    }
}
