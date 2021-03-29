<div>
    <table class="table-auto w-full">
        <thead>
        <tr>
            <th class="px-2 py-2">Type</th>
            <th class="px-2 py-2">Material</th> 
            <th class="px-2 py-2">Color</th>
            <th class="px-4 py-2">Description</th>
            <th class="px-4 py-2">State</th> 
            <th class="px-2 py-2">Price</th>   
        </tr>
        </thead>
        <tbody>
        @foreach ($list as $item)
            <tr @if($loop->even)class="bg-grey"@endif>
                <td class="border px-2 py-2">{{ $item->type }}</td>
                <td class="border px-2 py-2">{{ $item->material }}</td>
                <td class="border px-2 py-2">{{ $item->color }}</td>
                <td class="border px-2 py-2">{{ $item->description }}</td>
                <td class="border px-4 py-2">{{ $item->state }}</td>
                <td class="border px-2 py-2">{{ $item->price }}</td>
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
