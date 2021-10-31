<!-- properties -->
@props([
    'settings' => '',
    'extraClass' => '',
])

<div class="mt-1 h-96">
    <textarea
        {{ $attributes }}
        type="text"
        class="block h-96 w-full border-gray-300 rounded-md {{ $extraClass }} focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 sm:text-sm sm:leading-5"
    />
    </textarea>
</div>
