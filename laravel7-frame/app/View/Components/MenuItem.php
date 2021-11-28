<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MenuItem extends Component
{
    public $name,$link,$class,$counter;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name,$link="#",$class="feather-list",$counter="")
    {
        $this->name = $name;
        $this->link = $link;
        $this->counter = $counter;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.menu-item');
    }
}
