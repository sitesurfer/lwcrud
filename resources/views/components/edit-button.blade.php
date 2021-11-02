<div class="mr-1 flex rounded border-b-2 border-grey-dark overflow-hidden">
    <button
        wire:click='edit({{$edit_button_id}})'
        data-tippy-content="Edit Item"
        class="block -ml-1 bg-green-500 hover:bg-green-300 text-white p-2 text-sm px-3 rounded-l shadow-border font-sans tracking-wide uppercase font-bold">
        @if ($slot->isEmpty()) Edit @else {{ $slot }} @endif
    </button>
    <div class="bg-green-600 shadow-border px-3 p-2 pt-3 rounded-r">
        <div class="w-4 h-4">
            @include("lwcrud::includes.edit-icon")
        </div>
    </div>
</div>


