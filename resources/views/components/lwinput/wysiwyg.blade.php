<!-- properties -->
@props([
    'settings' => '',
    "loopkey" => 1,
    "modelname" => '',
    "rawrows" => 5,
    'name' => '',
])

<script type="javascript">
    var ed_{{ $loopkey }};
</script>

<!-- the code -->
<div class="mt-1" wire:ignore>
    <div
        {{ $attributes }}
        class="form-textarea w-full"
        x-data
        x-init="
            ClassicEditor
                .create( $refs.loopKey_{{ $loopkey }}, {
                autosave: {
                    waitingTime: 500, // in ms
                    save( editor ) { Livewire.emit( 'updateWysiwyg', '{{$modelname}}', editor.getData() ) }
                },
                toolbar: {
                items: [
                    'heading',
						'|',
						'bold',
						'italic',
						'link',
						'bulletedList',
						'numberedList',
						'|',
						'alignment',
						'indent',
						'outdent',
						'|',
						'imageInsert',
						'blockQuote',
						'mediaEmbed',
						'undo',
						'redo',
						'removeFormat',
						'horizontalLine',
						'htmlEmbed'
                ]
                },
                language: 'en',
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                        { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                        { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' }
                    ]
                },
                image: {
                     styles: [
                    'alignLeft', 'alignCenter', 'alignRight'
                    ],
                    resizeOptions: [
                        {
                            name: 'imageResize:original',
                            label: 'Original',
                            value: null
                        },
                        {
                            name: 'imageResize:50',
                            label: '50%',
                            value: '50'
                        },
                        {
                            name: 'imageResize:75',
                            label: '75%',
                            value: '75'
                        }
                    ],
                    toolbar: [
                        'imageStyle:alignLeft', 'imageStyle:alignCenter', 'imageStyle:alignRight',
                        '|',
                        'imageResize',
                        'imageTextAlternative',
                        '|',
                        'linkImage'
                    ]
                },
                licenseKey: '',
                } )
                .then( newEditor => {
                    window.ed_{{ $loopkey }} = newEditor;
                } )
                .catch( error => {
                console.error( error );
                } );  "
        wire:key="wysiwygle{{ $loopkey }}"
        x-ref="loopKey_{{ $loopkey }}"
    >{{ $slot }}</div>
</div>

@role('SuperAdmin')
<x-input.group label="Raw HTML" for="{{ $attributes['id'] }}" class="sm:col-span-6 mt-4">
    <x-input.textarea
        wire:model.lazy="{{ $modelname }}"
        name="{{ $attributes['id'] }}"
        id="letx_{{$loopkey}}"
        rows="{{ $rawrows }}" >
    </x-input.textarea>
</x-input.group>

<script type="javascript">
    $("#letx_{{$loopkey}}").on("change",function(){
        ed_{{ $loopkey }}.setData($("#letx_{{$loopkey}}").val());
    });
</script>
@endrole
