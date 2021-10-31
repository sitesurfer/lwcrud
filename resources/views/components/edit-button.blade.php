<button
    wire:click='edit({{$edit_button_id}})'
    data-tippy-content="Edit Item"
    class="-ml-1 bg-green-500 hover:bg-green-200 text-white py-0.5 px-3 rounded">
    <i class="far fa-pencil fa-sm mr-1"></i>
    @if ($slot->isEmpty()) Edit @else {{ $slot }} @endif</button>
