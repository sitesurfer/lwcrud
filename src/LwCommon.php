<?php

namespace Sitesurfer\Lwcrud;

use App\Events\SmartMagUpdated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

trait LwCommon
{
    use WithPagination;
    use WithFileUploads;

    public $search;
    public $image;
    public $isOpen = 0;
    public $sortField = "id";
    public $sortAsc = false;
    public $itemType = "Item";
    public $classPathBase = "";
    public $itemsPerPage = 15;

    public $createView;
    public $listView;

    public $data;
    public $deleteConfirm = 0;

    public $accountId;
    public $accountSlug;
    public $accountName;
    public $accountData;

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();

        $this->data = ['spare' => ''];
    }

    public function edit($id)
    {
        $this->resetInputFields();
        $this->data = $this->classPathBase::findOrFail($id)->toArray();
        $this->openModal();
    }

    private function resetInputFields()
    {
        $this->reset(['data']);
        if (function_exists('resetMultiImages')) {
            if (is_callable('resetMultiImages', true)) {
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

    public function updateWysiwyg($cid, $content)
    {
        //get the correct id
        $cid = trim($cid);

        if (Str::startsWith($cid, "data.")) {
            $cid = str_replace("data.", '', $cid);
        }

        //do some extra work on the input
        $this->data[$cid] = $content;

        //output an event so that our editor component can pick it up
        $this->emitTo('lw-wizzy', 'dbUpdate', ['name' => $cid, 'data' => $content]);
    }

    public function resetsearch()
    {
        $this->search = "";
    }

    public function afterDelete()
    {
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
        $tempText = strtolower(str_replace(' ', '-', preg_replace("/[^ A-Z-a-z0-9]+/", "", $value)));
        $tempText = preg_replace('/-+/', '-', $tempText);
        $tempText = trim($tempText, '-');

        return $tempText;
    }

    public function sortBy($field)
    {
        if ($this->sortField == $field) {
            $this->sortAsc = ! $this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        //send the sort field
        $this->sortField = $field;
    }

    public function render()
    {
        return view($this->listView, [
            'lists' => $this->classPathBase::search($this->search)
                ->when($this->sortField, function ($query) {
                    $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
                })->paginate($this->itemsPerPage), ]);
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
            "userid" => Auth::user()->id,
        ];
        //send the broadcast
        //event(new SmartMagUpdated($message));
        SmartMagUpdated::dispatch($message);
    }
}
