<!-- properties -->
@props([
    'settings' => '',
    'extraClass' => '',
    'name' => '',
])

<div class="mt-1">
    <textarea
        wire:model.lazy="data.{{ $name }}"
        name="{{ $name }}"
        placeholder="{{ $settings['placeholder'] ?? $settings['label'] }}"
        type="text"
        class="block h-{{ $settings['height'] ?? 28 }} w-full border-gray-300 rounded-md {{ $extraClass }} focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 sm:text-sm sm:leading-5"
    />
    </textarea>
</div>
