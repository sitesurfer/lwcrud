<?php

namespace Sitesurfer\Lwcrud\Components;

use Illuminate\View\Component;
use Spatie\LaravelRay;

class LwContainer extends Component
{

    //back up vars array
    public $appData;

    //private vars
    public $itemsPerPage;
    public $itemType;
    public $classPathBase;
    public $listView;
    public $listNames;
    public $allowCreation;
    public $deleteConfirm;
    public $createView;
    public $createButtonText;
    public $extraSearchOption;
    public $sortField;
    public $page;
    public $paginators;
    public $data;
    private $listData;

    public function __construct($d,$a)
    {
        //add variables as if this came from us directly
        $this->listData = $d;
        $this->appData = $a;

        ray($this->appData);
        foreach ($a as $key => $value)
        {
           $this->$key = $value;
        }

        if(!empty($this->listNames))
        {
            //make simple list view up internally
            $this->listView = 'lwcrud::partials.lw-list-table';
        }

        if(empty($this->listView))
        {
            //if we have neither then provide an error.
            die("No List View or Names provided, please check your configuration");
        }

    }

    public function render()
    {
        return view('lwcrud::components.lw-container', ['listData' => $this->listData]);
    }
}
