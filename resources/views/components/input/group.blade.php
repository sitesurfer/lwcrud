<!-- properties -->
@props([
    'label',
    'for',
    'error' => false,
    'helperText' => ''
])

<!-- the code -->
<div {{ $attributes}} >

    @isset($label)
    <label for="{{ $for }}" class="block text-md font-bold leading-5 text-gray-700">
        {{ $label }}
    </label>
    @endisset

    <div class="">
        <!-- input here -->
        {{ $slot }}
    </div>

    @isset($helperText)
        <p class="mt-2 text-sm text-gray-500  ">{!! $helperText !!}</p>
    @endisset

    @if ($error)
    <span class="text-red-500">{{ $error }}</span>
    @endif

</div>
