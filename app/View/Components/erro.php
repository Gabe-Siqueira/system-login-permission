<?php

namespace App\View\Components;

use Illuminate\View\Component;

class erro extends Component
{
    public $message;
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.erro');
    }
}
