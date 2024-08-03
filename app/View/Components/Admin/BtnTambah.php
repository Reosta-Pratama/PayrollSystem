<?php

namespace App\View\Components\admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BtnTambah extends Component
{
    public $type;
    public $name;
    public $href;
    /**
     * Create a new component instance.
     */
    public function __construct($type, $name, $href)
    {
        //
        $this->type = $type;
        $this->name = $name;
        $this->href = $href;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.btn-tambah');
    }
}
