<div class="flex rounded border-b-2 border-grey-dark overflow-hidden">
    @if($deleteConfirm == $deletebuttonid)
        <button
            wire:click="delete({{$deletebuttonid}})"
            class="block -ml-1 bg-red-500 hover:bg-red-300 text-white p-2 text-sm px-1 rounded-l shadow-border font-sans tracking-wide uppercase font-bold">
            <i class="fas fa-exclamation-triangle mr-1"></i>
            Confirm
        </button>
        <div class="bg-red-600 shadow-border px-1.5 p-2 pt-2 rounded-r">
            <div class="w-4 h-4">
                @include("lwcrud::includes.lw-question-icon")
            </div>
        </div>
    @else
        <button
            wire:click="confirmDelete({{$deletebuttonid}})"
            data-tippy-content="Delete Item"
            class="block -ml-1 bg-purple-500 hover:bg-purple-300 text-white p-2 text-sm px-2 rounded-l shadow-border font-sans tracking-wide uppercase font-bold">
            <i class="far fa-sm fa-trash-alt mr-1"></i>
            Delete
        </button>
        <div class="bg-purple-600 shadow-border px-2 p-2 pt-2.5 rounded-r">
            <div class="w-4 h-4">
                @include("lwcrud::includes.lw-delete-icon")
            </div>
        </div>
    @endif
</div>
