<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        List of Orders
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                    role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
            @endif
            <button wire:click="create()"
                class="inline-flex items-center px-4 py-2 my-3 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                Add a new Order
            </button>
            @if ($isOpen)
                @include('livewire.order.create')
            @endif
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">No.</th>
                        <th class="px-4 py-2">Code</th>
                        <th class="px-4 py-2">Client</th>
                        <th class="px-2 py-2">Total cost</th>
                        <th class="px-2 py-2">Amount Perceived</th>
                        <th class="px-2 py-2">Remaining amount</th>
                        <th class="px-4 py-2">Predicted Return date</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Collected</th>
                        <th class=" border px-6 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 1; ?>
                    @foreach ($orders as $order)
                        <tr>
                            <td class="border px-4 py-2"><?php echo $count++; ?></td>
                            <td class="border px-4 py-2">{{ $order->code }}</td>
                            <td class="border px-4 py-2">{{ $order->client_name }}</td>
                            <td class="border px-4 py-2">{{ $order->total_cost }}</td>
                            <td class="border px-2 py-2">{{ $order->amount_perceived }}</td>
                            <td class="border px-2 py-2">{{ intval($order->total_cost) - intval($order->amount_perceived) }}</td>
                            <td class="border px-2 py-2">{{ $order->predicted_return }}</td>
                            <td class="border px-4 py-2">{{ $order->return_status }}</td>
                            <td class="border px-4 py-2">{{ $order->collected }}</td>
                            <td class="border px-20 py-2">
                                <button wire:click="edit({{ $order->id }})"
                                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                    Edit
                                </button>
                                <!-- <a href= ""
                                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                    Show Client's Orders
                                </a> -->
                                <button wire:click="delete({{ $order->id }})"
                                    class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-600 transition ease-in-out duration-150">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
