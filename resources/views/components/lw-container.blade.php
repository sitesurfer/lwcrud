<div class="container mx-auto">
    @section('title', $itemType." Administration")

        @if($showHelp)
            @include('lwcrud::lw-help')
        @endif

        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-white leading-tight">
                    Manage @isset($itemPlural) {{$itemPlural}} @else {{$itemType}}s @endif
                </h2>
            </div>
        </header>

        @include('lwcrud::components.lw-search-top')

        @include($listView)

        <!-- create view -->
        @includeIf($createView)

        <x-lwcrud::lw-pager :listdata="$listData" />
</div>
