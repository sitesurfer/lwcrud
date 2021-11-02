<div class="container mx-auto flex items-center justify-around">
    <div>
        <x-lwcrud::edit_button :editbuttonid="$list->id"/>
    </div>
    <div>
        <x-lwcrud::delete_button :deletebuttonid="$list->id" :deleteConfirm="$deleteConfirm"/>
    </div>
</div>

