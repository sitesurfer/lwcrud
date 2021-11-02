<x-dialog-modal wire:model="isOpen">
    <x-slot name="title">
        Edit {{$itemType}}
    </x-slot>

    <x-slot name="content">
        <div class="mt-6 grid grid-cols-1 gap-y-3 gap-x-4 sm:grid-cols-6">

            <div class="sm:col-span-6">
                <label class="block text-sm font-medium leading-5 text-gray-700">Display Text</label>
                <div class="mt-1 rounded-md shadow-sm">
                    <input type="text" placeholder="Menu Text" wire:model.lazy="data.display_name" class="block w-full border-gray-300 rounded-md focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 sm:text-sm sm:leading-5">
                </div>
                @error('data.display_name') <span class="text-red-500">{{ $message }}</span>@enderror
            </div>

            <div class="sm:col-span-3">
                <label class="block text-sm font-medium leading-5 text-gray-700">Url (without preceding /)</label>
                <div class="mt-1 rounded-md shadow-sm">
                    <input type="text" placeholder="Enter the URL" wire:model.lazy="data.resource_url" class="block w-full border-gray-300 rounded-md focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 sm:text-sm sm:leading-5">
                </div>
                @error('data.resource_url') <span class="text-red-500">{{ $message }}</span>@enderror
            </div>

            <div class="sm:col-span-3">
                <label class="block text-sm font-medium leading-5 text-gray-700">Use Existing Site Page?</label>

                <x-input.group for="article_category_id" :error="$errors->first('data.article_category_id')" class="sm:col-span-2">
                    <x-input.select
                        wire:model="data.resource_url"
                        :optionData=$sitepages
                        keyId="slug"
                        keyValue="name"
                        name="sitepage">
                    </x-input.select>
                </x-input.group>

            </div>

            <div class="sm:col-span-2">
                <label class="block text-sm font-medium leading-5 text-gray-700">Menu</label>
                <div class="mt-1 rounded-md shadow-sm">
                    <select wire:model="data.menu_id" id="role" name="target" class="block w-full border-gray-300 rounded-md focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 sm:text-sm sm:leading-5">
                        <option>Please select an option</option>
                        <option value=1>Top Nav</option>
                        <option value=2>This Edition Footer</option>
                        <option value=3>Our Company Footer</option>
                        <option value=4>Footer3</option>
                        <option value=5>Custom</option>
                    </select>
                </div>
                @error('data.menu_id') <span class="text-red-500">{{ $message }}</span>@enderror
            </div>

            <div class="sm:col-span-1">
                <label class="block text-sm font-medium leading-5 text-gray-700">Order in Menu</label>
                <div class="mt-1 rounded-md shadow-sm">
                    <input type="text" placeholder="Menu Order" wire:model.lazy="data.order" class="block w-full border-gray-300 rounded-md focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 sm:text-sm sm:leading-5">
                </div>
                @error('data.order') <span class="text-red-500">{{ $message }}</span>@enderror
            </div>

            <div class="sm:col-span-3">
                <label class="block text-sm font-medium leading-5 text-gray-700">Target</label>
                <div class="mt-1 rounded-md shadow-sm">
                    <select wire:model="data.target" id="role" name="target" class="block w-full border-gray-300 rounded-md focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 sm:text-sm sm:leading-5">
                        <option>Please select an option</option>
                        <option value="_self">Normal</option>
                        <option value="_blank">Blank (New Window)</option>
                    </select>
                </div>
                @error('data.target') <span class="text-red-500">{{ $message }}</span>@enderror
            </div>


        </div>
    </x-slot>

    @include('livewire.partials.lw_modal_footer')
</x-dialog-modal>
