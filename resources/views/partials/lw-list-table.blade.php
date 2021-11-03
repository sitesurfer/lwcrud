
    <table class="table-fixed w-full">

        <thead>
            <tr class="bg-gray-100 border">
                <th class="px-4 py-2 w-1/12 text-left">No.</th>

                @foreach($listNames as $lk => $lv)
                    <th class="px-4 py-2 text-left">{{ $lv }}</th>
                @endforeach

                <i wire:click="sortBy('gen_name')" class="fal fa-sm fa-sort-circle"></i>

                <th class="px-4 py-2 w-2/12 text-right"></th>
            </tr>
        </thead>

        <tbody>

        @if($listData)
            @foreach($listData as $list)
                <tr>
                    <td class="border px-4 py-1.5">{{ $list->id }}</td>

                    @foreach($listNames as $lk => $lv)
                        <td class="border px-4 py-1.5">{{ $list->$lk }}</td>
                    @endforeach

                    <td class="border border-l-0 px-4 py-1.5 text-right">
                        @include('lwcrud::components.lw_edit_buttons')
                    </td>
                </tr>
            @endforeach
        @endif

        </tbody>
    </table>

