<?php

namespace App\View\Components;

use Illuminate\View\Component;

class OnMeeting extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $item;

    public function __construct($item)
    {
        $this->item = $item;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('storefront.components.meeting.onmeeting');
    }
}
