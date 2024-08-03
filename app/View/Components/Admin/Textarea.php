<?php

namespace App\View\Components\admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Textarea extends Component
{
    public $id;
    public $name;
    public $value;
    public $isRequired;

    /**
     * Create a new component instance.
     */
    public function __construct($id, $name, $value, $isRequired = false)
    {
        //
        $this->id = $id;
        $this->name = $name;
        $this->value = $value;
        $this->isRequired = $isRequired;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.textarea');
    }
}
