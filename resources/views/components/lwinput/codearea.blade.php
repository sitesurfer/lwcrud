<!-- properties -->
@props([
    'settings' => '',
    'extraClass' => '',
    'name' => '',
])

<div class="mt-1">
    <div class="text-xs">BETA - is NOT 2 way yet!! Only works Editor -> Code</div>
    <div x-data="{isShowing: false}" class="sm:col-span-6">
        <button @click='isShowing = !isShowing' type="button" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Toggle code view
        </button>
        <textarea
            {{ $attributes }}
            type="text"
            class="block w-full border-gray-300 rounded-md {{ $extraClass }} focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 sm:text-sm sm:leading-5"
        />
        </textarea>
    </div>
</div>
