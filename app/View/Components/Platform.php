<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Platform extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */

    public $name;

    /**
     * Create the component instance.
     *
     * @param  name  $name
     * @return void
     */
    public function __construct($name)
    {
        $this->name = $name;
    }
    
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
    */
    public function render()
    {
        return view('integrations.platform');
    }
}