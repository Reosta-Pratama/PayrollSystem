<?php

namespace App\View\Components\admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UpdateDelete extends Component
{
    public $edit;
    public $delete;
    /**
     * Create a new component instance.
     */
    public function __construct($edit, $delete)
    {
        //
        $this->edit = $edit;
        $this->delete = $delete;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.update-delete');
    }
}
