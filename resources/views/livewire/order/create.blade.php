<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="">

                        <div class="mb-4">
                            <label for="total_cost" class="block text-gray-700 text-sm font-bold mb-2">Total Cost:</label>
                            <input type="number"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="total_cost" placeholder="Enter total cost" wire:model="total_cost">
                            @error('total_cost') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="amount_perceived" class="block text-gray-700 text-sm font-bold mb-2">Amount Percieved:</label>
                            <input type="number"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="amount_perceived" placeholder="Enter amount perceived" wire:model="amount_perceived">
                            @error('amount_perceived') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="predicted_return" class="block text-gray-700 text-sm font-bold mb-2">Predicted Return Date:</label>
                            <input type="date"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="predicted_return" placeholder="Enter Predicted return date" wire:model="predicted_return">
                            @error('predicted_return') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="client" class="block text-gray-700 text-sm font-bold mb-2">Client</label>
                            <select name="client" id="client" wire:model="client"
                                class="shadow appearance-none w-full border text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:shadow-outline">
                                <option value="" selected>Select Client</option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->first_name }} {{ $client->last_name }}</option>
                                @endforeach
                            </select>
                            @error('client') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="return_status" class="block text-gray-700 text-sm font-bold mb-2">Return Status</label>
                            <select name="return_status" id="return_status" wire:model="return_status" required
                                class="shadow appearance-none w-full border text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:shadow-outline">
                                    <option value="" selected>Select option</option>
                                    <option value="Not yet sent" selected> Not yet sent</option>
                                    <option value="Sent for washing"> Sent for Washing</option>
                                    <option value="Returned Partially"> Returned Partially</option>
                                    <option value="Returned Completely"> Returned Completely</option>
                            </select>
                            @error('return_status') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="collected" class="block text-gray-700 text-sm font-bold mb-2">Collected</label>
                            <select name="collected" id="collected" wire:model="collected"
                                class="shadow appearance-none w-full border text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:shadow-outline">
                                    <option value="Not yet collected" selected> Not yet Collected</option>
                                    <option value="collected partially"> Collected Partially</option>
                                    <option value="collected completely"> Collected Completely</option>
                            </select>
                            @error('collected') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="additional_intel" class="block text-gray-700 text-sm font-bold mb-2">Additional Intel:</label>
                            <textarea rows="4"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="additional_intel" wire:model="additional_intel" placeholder="Enter additional info"></textarea>
                            @error('additional_intel') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto"><button
                            wire:click.prevent="store()" type="button"
                            class="inline-flex items-center px-4 py-2 my-3 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                            Save
                        </button>
                    </span>
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                        <button wire:click="closeModal()" type="button"
                            class="inline-flex items-center px-4 py-2 my-3 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150">
                            Cancel
                        </button>
                    </span>
            </form>
        </div>
    </div>
</div>
</div>
