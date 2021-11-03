<?php

namespace Sitesurfer\Lwcrud;

use App\Events\SmartMagUpdated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Spatie\LaravelRay\Ray;
use Sitesurfer\Lwcrud\Lwcrud;

trait LwCommon
{
    use WithPagination;
    use WithFileUploads;

    public $search,$image;
    public $isOpen = 0;
    public $sortField = "id";
    public $sortAsc = true;
    public $itemType = "Item";
    public $classPathBase = "";
    public $itemsPerPage = 15;
    private $indexField = "id";

    public $createView;
    public $listView;
    public $listNames;
    public $dbJoin = null;

    public $data;
    public $deleteConfirm = 0;

    //search bar options
    public $allowCreation = false;
    public $createButtonText = '';
    public $extraSearchOption = '';
    public $editSettings = [];

    public $accountId,$accountSlug,$accountName,$accountData;

    private $listData;
    private $appData;

    public $showHelp = false;
    public $debugWithRay = false;

    public function mount()
    {
        //left here in case we need to do anything in the trait that should not be changed

        //allow user to have seperated setup method
        if(method_exists($this,'setup'))
        {
            $this->checkSetup($this->setup());
        }
    }

    public function checkSetup()
    {
        //check the setup to make sure that we have not missed anything
        if ($this->itemType == "") { die("No itemType provided!"); }
        if ($this->classPathBase == "") { die("No classPathBase provided!"); }
        if ($this->listView == "" && empty($this->listNames)) { die("Provide either a list view OR fields!"); }
        if ($this->createView == "" && empty($this->editSettings)) { die("No create view OR editSettings provided!"); }

        if(!empty($this->editSettings))
        {
            $fields = ['label','type'];
            foreach ($this->editSettings as $key => $es)
            {
                foreach ($fields as $f)
                {
                    if(empty($es[$f])) { die("An edit parameter - {$f} - is missing or blank in your config for \"{$key}\"."); }
                }

            }
        }
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();

        $this->data = array('spare' => '');

        //set the new item button to the current itemp type
        $this->createButtonText = $this->itemType;
    }

    public function edit($id)
    {
        $this->resetInputFields();
        $this->data = $this->classPathBase::findOrFail($id)->toArray();
        $this->openModal();
    }

    private function resetInputFields(){
        $this->reset(['data']);
        if(function_exists('resetMultiImages')){
            if (is_callable('resetMultiImages',true))
            {
                $this->resetMultiImages();
            }
        }

    }

    public function openModal()
    {
        $this->resetErrorBag();
        $this->resetValidation();

        $this->deleteConfirm = 0;


        //$this->dispatchBrowserEvent('lw-modal-opens',['data' => $this->data]);
        $this->dispatchBrowserEvent('lw-modal-opens');

        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->dispatchBrowserEvent('lw-modal-closes');
        $this->resetInputFields();
        $this->isOpen = false;
    }

    public function afterStore($id = "")
    {
        session()->flash('message', $id ? 'Item Updated Successfully.' : 'Item Created Successfully.');
        $this->closeModal();

        //remove alert message in 5 seconds
        $this->dispatchBrowserEvent('lw-after-store');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updateWysiwyg($cid,$content)
    {
        //get the correct id
        $cid = trim($cid);

        if(Str::startsWith($cid,"data."))
        {
            $cid = str_replace("data.",'',$cid);
        }

        //do some extra work on the lwinput
        $this->data[$cid] = $content;

        //output an event so that our editor component can pick it up
        $this->emitTo('lw-wizzy','dbUpdate',['name' => $cid, 'data' => $content]);
    }

    public function resetsearch()
    {
        $this->search = "";
    }

    public function afterDelete(){
        session()->flash("message", "{$this->itemType} Deleted Successfully.");
        $this->dispatchBrowserEvent('lw-after-store');
        $this->deleteConfirm = 0;
    }

    public function updatedImage()
    {
        $this->validate(['image' => 'image|max:5000',]);
    }

    public function makeSlug($value)
    {
        $tempText =  strtolower(str_replace(' ','-',preg_replace("/[^ A-Z-a-z0-9]+/","",$value)));
        $tempText = preg_replace('/-+/', '-', $tempText);
        $tempText = trim($tempText,'-');

        return $tempText;
    }

    public function sortBy($field)
    {
        if($this->sortField == $field){
            $this->sortAsc = !$this->sortAsc;
        }else{
            $this->sortAsc = true;
        }

        //send the sort field
        $this->sortField = $field;
    }

    public function getData()
    {
        //set up the variables we need to return
        $listData = $this->classPathBase::search($this->search)
            ->when($this->sortField, function($query){
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            })->paginate($this->itemsPerPage);

        if(method_exists($this, 'filterData'))
        {
            return $this->filterData($listData);
        }

        return $listData;

    }

    public function render()
    {

        //run the data retrieval, this can be overridden by a user.
        $tempData = $this->getData();
        $this->listData = $tempData;

        $data = get_object_vars($this);
        $this->appData = $data;

        //report via ray() if turned on
        if($this->debugWithRay) { $this->showDebugOutput(); }

        //make list view up internally
        return view('lwcrud::layouts.lw-base',['listData' => $this->listData, 'appData' => $this->appData]);

    }

    public function store()
    {
        //run a user specific method IF installed and needed before save
        $this->preStoreActions($this->data);

        //check all the fields
        $this->validate();

        //save to the database
        $this->save();

        //do broadcast
        //$this->broadcastUpdate("Updated Menu for - ".Str::limit($this->accountName,50));

        //tidy up
        $this->afterStore($this->data['id'] ?? '');

        //run a user specific method IF installed and needed after save
        $this->afterStoreActions($this->data);

    }

    //this is the generic save function, if anything extra is needed then this will need to be done by the client
    public function save()
    {
        //set some parameters
        $indexField = [ $this->indexField => $this->data[$this->indexField] ?? '' ];
        $columns = [];

        foreach ($this->editSettings as $k => $v)
        {
         $columns[$k] = $this->data[$k];
        }

        $class = $this->classPathBase::updateOrCreate($indexField, $columns);

    }

    public function preStoreActions($data)
    {
        //this function receives all the data prior to the save
        return $data;
    }

    public function afterStoreActions($data) :void
    {
        //this function receives all the data after the save
        //does not return anything
    }

    public function getListData()
    {
        return $this->listData;
    }

    public function confirmDelete($id)
    {
        $this->deleteConfirm = $id;
    }

    public function delete($id)
    {
        $this->classPathBase::find($id)->delete();
        $this->afterDelete();
    }

    public function broadcastUpdate($action)
    {
        $message = [
            "action" => $action,
            "user" => Auth::user()->name,
            "userid" => Auth::user()->id
        ];
        //send the broadcast
        //event(new SmartMagUpdated($message));
        SmartMagUpdated::dispatch($message);
    }

    /**
     * @return bool
     */
    public function getAllowCreation(): bool
    {
        return $this->allowCreation;
    }

    /**
     * @param bool $allowCreation
     */
    public function setAllowCreation(bool $allowCreation): void
    {
        $this->allowCreation = $allowCreation;
    }

    /**
     * @return string
     */
    public function getExtraSearchOption(): string
    {
        return $this->extraSearchOption;
    }

    /**
     * @param string $extraSearchOption
     */
    public function setExtraSearchOption(string $extraSearchOption): void
    {
        $this->extraSearchOption = $extraSearchOption;
    }

    /**
     * @return string
     */
    public function getCreateButtonText(): string
    {
        return $this->createButtonText;
    }

    /**
     * @param string $searchButtonText
     */
    public function setCreateButtonText(string $searchButtonText): void
    {
        $this->createButtonText = $searchButtonText;
    }

    public function showHelp()
    {
        $this->showHelp = true;
    }

    public function debugWithRay()
    {
        $this->debugWithRay = true;
    }

    public function showDebugOutput()
    {
        if(class_exists(Ray::class)) { ray($this->getListData(),$this->editSettings); }
    }

    /**
     * @return string
     */
    public function getIndexField(): string
    {
        return $this->indexField;
    }

    /**
     * @param string $indexField
     */
    public function setIndexField(string $indexField): void
    {
        $this->indexField = $indexField;
    }
}
