<?php

namespace App\View\Components\form;

use Illuminate\View\Component;

class delete extends Component
{
    public $modal;

    public function __construct($modal="")
    {
        $this->modal = $modal;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.delete');
    }
}
