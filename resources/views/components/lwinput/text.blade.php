<!-- properties -->
@props([
    'leadingAddOn' => false,
    'followingAddOn' => false,
    'extraClass' => false,
    'settings' => '',
    'name' => '',
])

<!-- the code -->
<div class="mt-1 flex rounded-md shadow-sm">
    @if ($leadingAddOn)
        <span class="inline-flex items-center px-3 py-2 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">{!! $leadingAddOn !!}</span>
    @endif

    <input
        {{ $attributes }}
        wire:model.lazy="data.{{ $name }}"
        name="{{ $name }}"
        placeholder="{{ $settings['placeholder'] ?? $settings['label'] }}"
        type="text"
        class="flex-1 block w-full border-gray-300 {{ $leadingAddOn ? 'rounded-none rounded-r-md' : '' }} {{ $followingAddOn ? 'rounded-none rounded-l-md' : '' }} @if(!$leadingAddOn && !$followingAddOn) rounded-md @endif {{ $extraClass }} focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 sm:text-sm sm:leading-5"
    />

    @if ($followingAddOn)
        <span class="inline-flex items-center px-3 rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">{{ $followingAddOn }}</span>
    @endif
</div>

