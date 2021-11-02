<?php

namespace Sitesurfer\Lwcrud\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LwPager extends Component{

    public $links;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($listdata)
    {
        $this->links = $listdata;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        //$links = $this->links->links();
        return view('lwcrud::components.lw-pager');
    }
}
