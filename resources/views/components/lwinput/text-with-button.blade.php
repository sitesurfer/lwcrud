<!-- properties -->
@props([
    'icon' => "far fa-magic",
    'buttonText' => "Click",
    'clickAction' => false,
    'settings' => '',
    'name' => '',
])

<!-- the code -->
<div class="mt-1 flex">
    <div class="relative flex items-stretch flex-grow focus-within:z-10">
        <input
            {{ $attributes }}
            type="text"
            class="rounded-none rounded-l-md block w-full border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 sm:text-sm sm:leading-5"
        />
    </div>
        <button
            @if ($clickAction)
            wire:click="{{ $clickAction }}"
            @endif
            class="-ml-px relative inline-flex items-center px-2 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-r-md text-gray-700 bg-gray-50 hover:text-gray-500 hover:bg-white focus:outline-none focus:ring-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
            <i class="{{ $icon }}"></i>
            <span class="ml-2"> {{ $slot }} </span>
        </button>

</div>

