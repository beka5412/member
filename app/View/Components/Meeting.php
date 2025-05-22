<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Meeting extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $title;
    public $items;

    public function __construct($title, $items)
    {
        $this->title = $title;
        $this->items = $items;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('storefront.components.meeting.grid');
    }
}
