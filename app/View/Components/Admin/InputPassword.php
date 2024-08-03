<?php

namespace App\View\Components\admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputPassword extends Component
{
    public $id;
    public $name;
    public $type;
    public $isRequired;
    public $isautoCompleted;
    /**
     * Create a new component instance.
     */
    public function __construct($id, $name, $type, $isRequired = false, $isautoCompleted = false)
    {
        //
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->isRequired = $isRequired;
        $this->isautoCompleted = $isautoCompleted;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.input-password');
    }
}
