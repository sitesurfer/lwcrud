<?php

namespace Sitesurfer\Lwcrud\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DeleteButton extends Component
{
    public $delete_button_id;
    public $deleteConfirm;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($deletebuttonid, $deleteConfirm)
    {
        $this->delete_button_id = $deletebuttonid;
        $this->deleteConfirm = $deleteConfirm;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return \view('lwcrud::components.delete-button');
    }
}
