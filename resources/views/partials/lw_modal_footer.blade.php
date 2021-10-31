<x-slot name="footer">
    <x-secondary-button  wire:click="closeModal()" wire:loading.attr="disabled">
        Cancel
    </x-secondary-button>

    <x-danger-button  wire:loading.remove wire:click="store()" wire:loading.attr="disabled" class="ml-2 bg-green-500">
        Save & Close
    </x-danger-button>
</x-slot>
