
<!-- WYSIWYG using CKEditor -->
<x-input.group label="foobar" for="foobar" :error="$errors->first('data.foobar')" class="sm:col-span-6">
    <x-input.wysiwyg
        :loopkey="$foobar" {{-- a unique id --}}
        modelname="foobar" {{-- name of the model --}}
        name="foobar"
        id="foobar"
        placeholder="foobar" >
        {{-- The actual content goes in here --}}
        {{-- ECHO THE MODEL --}}
        {!! $FOOBAR !!}
    </x-input.wysiwyg>
</x-input.group>

<!-- TEXT -->
<x-input.group label="foobar" for="foobar" :error="$errors->first('data.foobar')" class="sm:col-span-6">
    <x-input.text
        wire:model.lazy="data.foobar"
        name="foobar"
        placeholder="foobar" >
    </x-input.text>
</x-input.group>

<!-- SELECT (WITH DATA) -->
<x-input.group label="foobar" for="foobar" :error="$errors->first('data.foobar')" class="sm:col-span-6">
    <x-input.select
        wire:model="data.foobar"
        :optionData=$foobar
        keyId="id"
        keyValue="name"
        name="foobar"
        placeholder="foobar" >
    </x-input.select>
</x-input.group>

<!-- MANUAL SELECT -->
<x-input.group label="foobar" for="foobar" :error="$errors->first('data.foobar')" class="sm:col-span-6">
    <x-input.select-manual
        wire:model="data.foobar"
        name="foobar"
        placeholder="foobar" >
        <!-- put your data here as options -->
        <option value="foo">bar</option>
    </x-input.select-manual>
</x-input.group>

<!-- TEXTAREA -->
<x-input.group label="foobar" for="foobar" :error="$errors->first('data.foobar')" class="sm:col-span-6">
    <x-input.textarea
        wire:model.lazy="data.foobar"
        name="foobar"
        placeholder="foobar"
        rows="4" >
    </x-input.textarea>
</x-input.group>

<!-- TEXT WITH ACTION BUTTON -->
<x-input.group label="foobar" for="foobar" :error="$errors->first('foobar')" class="sm:col-span-6">
    <x-input.text-with-button
        wire:model="foobar"
        clickAction="foobar()"
        name="foobar"
        placeholder="foobar"> foobar </x-input.text-with-button>
</x-input.group>

<!-- FILE UPLOAD -->
<x-input.group label="foobar" for="foobar" :error="$errors->first('foobar')" class="sm:col-span-6">
    <x-input.fileupload
        wire:model="foobar"
        name="foobar"
        id="foobar"
        buttonText="foobar">

        <div style="background-image: @if(!empty($new_company_logo)) url('{{ $new_company_logo->temporaryUrl() }}')
        @elseif(!empty($data['company_logo'])) url('{{ Storage::disk('s3')->url($data['company_logo']) }}') @endif "
             class="fileimg flex bg-contain bg-no-repeat bg-center w-full h-full p-1" >
            @if(!empty($foobar))
                <div wire:click="removeImageT()" class="mb-auto mt-auto px-8 py-4 rounded-lg hover:bg-red-600 border border-2 hover:border-white hover:opacity-80 opacity-0 mx-auto"><i class="fas text-4xl text-white fa-trash-alt"></i></div>
            @elseif (!empty($data['foobar']))
                <div wire:click="removeImage()" class="mb-auto mt-auto px-8 py-4 rounded-lg hover:bg-red-600 border border-2 hover:border-white hover:opacity-80 opacity-0 mx-auto"><i class="fas text-4xl text-white fa-trash-alt"></i></div>
            @endif
        </div>

    </x-input.fileupload>
</x-input.group>

<!-- radio -->
<x-input.group label="foobar" for="foobar" :error="$errors->first('foobar')" class="sm:col-span-6">
    <x-input.radio
        wire:model.lazy="foobar"
        name="foobar"
        id="foobar" >
    </x-input.radio>
</x-input.group>

<!-- multi image using collection component -->
<x-input.group wire:key="group_container_article_picture" helperText="Upload article images" label="Article Images" for="upload_multi_image" :error="$errors->first('upload_multi_image')" class="sm:col-span-6">
    <div class="grid grid-cols-6 gap-2 mt-2">
        <div class="col-span-2">
            <div class="flex flex-wrap gap-1">
                @if(!empty($multi_image_thumbs))
                    @foreach($multi_image_thumbs as $ei)
                        <div class="w-16 h-16 rounded-lg border border-gray-400 flex bg-cover bg-no-repeat bg-center p-0" style="background-image: url('{{ $ei->getUrl('thumb') }}')">
                            <div wire:key="{{ $loop->index }}" wire:click="removeThisImage({{$ei->id}},'main')" class="mb-auto mt-auto px-2 py-1 rounded-md hover:bg-red-600 border border hover:border-white hover:opacity-80 opacity-0 mx-auto"><i class="fas text-2xl text-white fa-trash-alt"></i></div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="col-span-4">
            <x-media-library-attachment name="upload_multi_image" rules="mimes:jpeg,png|max:8200" multiple class="w-full flex-1 h-full"></x-media-library-attachment>
        </div>
    </div>
</x-input.group>
