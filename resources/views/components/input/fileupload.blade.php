<!-- properties -->
@props([
    'buttonText' => 'Upload File',
    'settings' => '',
])

<!-- the code -->
<div class="w-full rounded-lg overflow-hidden mt-1 relative">
    <div class="flex flex-row">
        <div class="w-1/2">
            <div class="overflow-hidden p-2 border-solid h-28 rounded-l-md border border-r-0 border-gray-300 bg-gray-100 flex justify-center items-center">
                {{ $slot }}
            </div>
        </div>
        <div class="w-1/2">
            <div class="relative h-28 rounded-r-md border-solid border border-l-0 border-gray-300 bg-gray-100 flex justify-center items-center">
                <div class="absolute">
                    <div class="flex flex-col items-center">
                        <i class="fa fa-folder-open fa-4x text-yellow-600"></i>
                        <span class="block text-gray-500 font-normal">{{ $buttonText }}</span>
                    </div>
                </div> <input
                    {{ $attributes }}
                    type="file"
                    class="h-full w-full opacity-0">
            </div>
        </div>
    </div>

    <div wire:loading wire:target="{{ $attributes['id'] }}" class="flex flex-wrap content-center absolute top-0 right-0 z-50 w-full h-full">
        <div class="absolute bg-gray-400 w-full h-full opacity-60 pt-4"></div>
        <div class="content-center text-center pt-3">
            <div class="text-xl text-center font-black text-gray-700">Please Wait</div>
            <i class="fad fa-spin text-yellow-600 mb-auto mt-auto mx-auto text-5xl fa-atom-alt"></i>
        </div>
    </div>

</div>

