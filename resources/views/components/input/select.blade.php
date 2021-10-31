@props([
    'optionData' => [],
    'keyId' => 'id',
    'keyValue' => 'name',
    'settings' => '',
])

<div class="mt-1 rounded-md shadow-sm">

    <select
        {{ $attributes }}
        class="block w-full border-gray-300 rounded-md focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 sm:text-sm sm:leading-5"
    >
        <option value="0">Please select an option</option>

        @foreach($optionData as $ok => $ov)
            <option
                value="{{ $ov[$keyId] }}"
                wire:key="{{ $loop->index }}"
            >
                {{ $ov[$keyValue] }}
            </option>
        @endforeach

    </select>

</div>
