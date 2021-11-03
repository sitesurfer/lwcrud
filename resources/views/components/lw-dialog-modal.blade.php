@props(['id' => null, 'maxWidth' => null])

<x-lwcrud::lw-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="px-6 py-4">
        <div class="text-lg">
            {{ $title }}
        </div>

        <div class="mt-4">
            {{ $content }}
        </div>
    </div>

    <div class="px-6 py-4 bg-gray-100 text-right">

            <x-lwcrud::lw-button  class="text-white bg-red-500 hover:bg-yellow-500" wire:click="closeModal()" wire:loading.attr="disabled">
                Cancel
            </x-lwcrud::lw-button>

            <x-lwcrud::lw-button  class="text-white bg-green-500 hover:bg-blue-500 ml-2" wire:loading.remove wire:click="store()" wire:loading.attr="disabled" >
                Save & Close
            </x-lwcrud::lw-button>

    </div>

</x-lwcrud::lw-modal>
