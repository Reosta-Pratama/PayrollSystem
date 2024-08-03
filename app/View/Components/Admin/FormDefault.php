<?php

namespace App\View\Components\admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormDefault extends Component
{
    public $id;
    public $action;
    public $isMultipart;
    /**
     * Create a new component instance.
     */
    public function __construct($id, $action, $isMultipart = false)
    {
        $this->id = $id;
        $this->action = $action;
        $this->isMultipart = $isMultipart;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.form-default');
    }
}
