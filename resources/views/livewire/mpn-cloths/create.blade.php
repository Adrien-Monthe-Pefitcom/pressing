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
                            <label for="type" class="block text-gray-700 text-sm font-bold mb-2">Type:</label>
                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="type" placeholder="Enter Title" wire:model="type">
                            @error('type') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="material" class="block text-gray-700 text-sm font-bold mb-2">Material:</label>
                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="material" placeholder="Enter Title" wire:model="material">
                            @error('material') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="color" class="block text-gray-700 text-sm font-bold mb-2">Color:</label>
                            <select name="color" id="color" wire:model="color"
                                class="shadow appearance-none w-full border text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:shadow-outline">
                                <option value="" selected>Select Color</option>
                                <option value="#ffffff">white</option>
                                <option value="#000000">black</option>
                                <option value="blue">blue</option>
                                <option value="pink">pink</option>
                                <option value="green">green</option>
                                <option value="violet">violet</option>
                            </select>
                            @error('color') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                            <textarea rows="4"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="description" wire:model="description" placeholder="Enter cloth description"></textarea>
                            @error('description') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Price:</label>
                            <input type="number"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="price" placeholder="Enter Price" wire:model="price">
                            @error('price') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="id_order" class="block text-gray-700 text-sm font-bold mb-2">Order:</label>
                            <select name="id_order" id="id_order" wire:model="id_order"
                                class="shadow appearance-none w-full border text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:shadow-outline">
                                <option value="" selected>Select Order</option>
                                @foreach ($orders as $order)
                                    <option value="{{ $order->id }}">{{ $order->code }}</option>
                                @endforeach
                            </select>
                            @error('id_order') <span class="text-red-500">{{ $message }}</span>@enderror
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
                            <label for="tagids" class="block text-gray-700 text-sm font-bold mb-2">Tags:</label>
                            <select multiple name="tagids[]" id="tagids[]" wire:model="tagids"
                                class="shadow appearance-none w-full border text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:shadow-outline">
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                                @endforeach
                            </select>
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
