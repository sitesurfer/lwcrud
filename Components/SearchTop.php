<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class SearchTop extends Component
{

    public $extraTopOption,$tippyText,$newbutton;

    public function __construct($extraTopOption = null,$tippyText = '',$newbutton = true)
    {
        $this->extraTopOption == $extraTopOption;
        $this->tippyText = $tippyText;
        $this->newbutton = $newbutton;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.search-top');
    }
}
