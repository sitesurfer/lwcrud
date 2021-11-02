<!--search section -->
<div class="flex flex-wrap -mx-1 overflow-hidden md:-mx-1 xl:-mx-2 mb-2">

    <div class="my-1 px-1 w-full overflow-hidden md:my-1 md:px-1 md:w-1/3 xl:my-2 xl:px-2 xl:w-1/3">
        <div class="max-w-lg w-full lg:max-w-xs">
            <label for="search" class="sr-only">Search</label>
            <div class="mt-1 flex rounded-md shadow-sm">
                <div class="relative flex items-stretch flex-grow focus-within:z-10">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input wire:model="search" id="search" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-none rounded-l-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:border-blue-300 focus:ring-blue sm:text-sm transition duration-150 ease-in-out" placeholder="Search" type="search">
                </div>
                <button wire:click="resetsearch()" class="-ml-px relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-r-md text-gray-700 bg-gray-50 hover:text-gray-500 hover:bg-white focus:outline-none focus:ring-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                    Reset
                </button>
            </div>
        </div>
    </div>

    <div class="my-1 px-1 w-full overflow-hidden md:my-1 md:px-1 md:w-1/3 xl:my-2 xl:px-2 xl:w-1/3">
        @if (session()->has('message'))
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-1 shadow-md lwalert" role="alert">
                <div class="flex">
                    <div>
                        <p class="text-sm">{{ session('message') }}</p>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <div class="md:text-right my-1 px-1 w-full overflow-hidden md:my-1 md:px-1 md:w-1/3 xl:my-2.5 xl:px-2 xl:w-1/3">

        {{--  whats this? --}}
        @isset($extraNewButton)
            {{ $extraNewButton }}
        @endisset

        @if($allowCreation == "true")
        <button data-tippy-content="New {{ $createButtonText }}" wire:click="create()" type="button" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-500 hover:bg-yellow-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
            <i class="fas fa-plus mr-1"></i> Create New
        </button>
        @endif
    </div>

</div>

@isset($extraSearchOption)
<div class="mt-1 mb-2">
     {{ $extraSearchOption }}
</div>
@endisset
