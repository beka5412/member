<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Chapters extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public $header;
    public $showname;
    public $size;
    public $slug;
    public $id;
    public $activity;
    public $row;

    /**
     * Create the component instance.
     * @param  string $size
     * @param  string $showname
     * @param  array $header
     * @param  string $slug
     * @param  string $id
     * @param  integer $row
     * @return void
     */
    public function __construct($header, $showname, $size, $slug, $id, $activity, $row)
    {
        $this->header = $header;
        $this->showname = $showname;
        $this->size = $size;
        $this->slug = $slug;
        $this->id = $id;
        $this->activity = $activity;
        $this->row = $row;
    }
    
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
    */
    public function render()
    {
        return view('storefront.components.chapters');
    }
}