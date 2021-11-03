<x-lwcrud::lw-dialog-modal wire:model="isOpen">

    <x-slot name="title">
        Edit {{$itemType}}
    </x-slot>

    <x-slot name="content">
        <div class="mt-6 grid grid-cols-1 gap-y-3 gap-x-4 sm:grid-cols-6">

            @foreach($editSettings as $k => $v)
                <x-lwcrud::lwinput.group label="{{ $v['label'] }}" for="{{ $k }}" :error="$errors->first('data.{{ $k }}')" class="sm:col-span-{{ $v['width'] ?? 6 }}">
                    @php $ff = "lwcrud::lwinput.".$v['type']; @endphp
                    <x-dynamic-component :component="$ff" :name="$k" :settings="$v" />
                </x-lwcrud::lwinput.group>
            @endforeach

        </div>
    </x-slot>

</x-lwcrud::lw-dialog-modal>
