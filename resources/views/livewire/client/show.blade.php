<div>
    <table class="table-auto w-full">
        <thead>
        <tr>
            <th class="px-6 py-2">Name</th>
            <th class="px-3 py-2">Phone</th>
            <th class="px-3 py-2">Address</th>      
        </tr>
        </thead>
        <tbody>
        @foreach ($list as $item)
            <tr @if($loop->even)class="bg-grey"@endif>
                <td class="border px-4 py-2">{{ $item->first_name }} </td>
                <td class="border px-4 py-2">{{ $item->phone }}</td>
                <td class="border px-4 py-2">{{ $item->address }}</td> 
                <td class="border px-4 py-2"> 
                    <button wire:click="deleteItem({{ $item->id }})" class="bg-red-100 text-red-600 px-6 rounded-full">
                        Delete Permanently
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>