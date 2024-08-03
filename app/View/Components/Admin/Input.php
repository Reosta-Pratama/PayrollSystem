<?php

namespace App\View\Components\admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public $id;
    public $name;
    public $type;
    public $value;
    public $isRequired;
    /**
     * Create a new component instance.
     */
    public function __construct($id, $name, $type, $value, $isRequired = false)
    {
        //
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->value = $value;
        $this->isRequired = $isRequired;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.input');
    }
}
