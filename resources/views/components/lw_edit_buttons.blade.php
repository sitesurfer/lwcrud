<div class="container mx-auto flex items-center justify-around">
    <div>
        <x-lwcrud::lw-edit-button :editbuttonid="$list->id"/>
    </div>
    <div>
        <x-lwcrud::lw-delete-button :deletebuttonid="$list->id" :deleteConfirm="$deleteConfirm"/>
    </div>
</div>

