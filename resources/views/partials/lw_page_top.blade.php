<div>
    @section('title', "$itemType Administration")

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Manage @isset($itemPlural) {{$itemPlural}} @else {{$itemType}}s @endif
        </h2>
    </x-slot>

<x-lwcrud-search-top tippy-text="{{$itemType}}" ></x-lwcrud-search-top>
<x-delete-button></x-delete-button>

<!-- create view -->
@includeIf($createView)

