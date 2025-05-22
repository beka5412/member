<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Grid extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public $size;
    public $showname;
    public $header;
    public $slug;
    public $id;
    public $row;

    /**
     * Create the component instance.
     *
     * @param  string $size
     * @param  string $showname
     * @param  array $header
     * @param  string $slug
     * @param  string $id
     * @param  integer $row
     * @return void
     */
    public function __construct($header, $showname,  $size, $slug, $id, $row)
    {
        $this->header = $header;
        $this->showname = $showname;
        $this->size = $size;
        $this->slug = $slug;
        $this->id = $id;
        $this->row = $row;
    }
    
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
    */
    public function render()
    {
        return view('storefront.components.grid');
    }
}