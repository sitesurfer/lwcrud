<!-- Manual select -->
@props([
    'settings' => '',
    'name' => '',
])
<div class="mt-1 rounded-md shadow-sm">

    <select
        {{ $attributes }}
        class="block w-full border-gray-300 rounded-md focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 sm:text-sm sm:leading-5">
        <option>Select an option</option>
        {{ $slot }}
    </select>

</div>
