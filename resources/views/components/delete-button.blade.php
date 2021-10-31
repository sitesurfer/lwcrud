@if($deleteConfirm == $delete_button_id)
    <button wire:click="delete({{$delete_button_id}})"  class="bg-red-500 hover:bg-red-700 text-white py-0.5 px-4 rounded"><i class="fas fa-exclamation-triangle mr-1"></i> Sure ?</button>
@else
    <button wire:click="confirmDelete({{$delete_button_id}})" data-tippy-content="Delete Item" class="bg-purple-500 hover:bg-purple-200 text-white py-0.5 px-3 rounded pr-6"><i class="far fa-sm fa-trash-alt mr-1"></i> Delete </button>
@endif
