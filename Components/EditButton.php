<?php

namespace Sitesurfer\Lwcrud;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EditButton extends Component
{
    public $edit_button_id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($editbuttonid)
    {
        $this->edit_button_id = $editbuttonid;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.edit-button');
    }
}
