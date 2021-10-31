@props([
    'leadingAddOn' => false,
    'followingAddOn' => false,
    'extraClass' => false,
    'settings' => ''
])

<div class="relative w-12 mr-2 align-middle select-none transition duration-200 ease-in">
    <input
        {{ $attributes }}
        type="checkbox"
        class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer" />
    <label for="toggle" class="toggle-label block overflow-hidden mt-3 h-6 rounded-full bg-gray-300 cursor-pointer"></label>
</div>
