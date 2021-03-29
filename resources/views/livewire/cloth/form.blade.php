<div>
    <x-jet-form-section submit="createItem">

        <x-slot name="title">
            {{ __('Add Cloth to the Order') }}
        </x-slot>
    
        <x-slot name="description">
            {{ __('') }}
        </x-slot>

       
    
        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <select id="order_id" class="mt-1 block w-full" wire:model.defer="order_id" >
                    <option value="">Choco</option>
                    <option value="">Bo</option>
                    <option value="">Ledo</option>
                </select>

                <x-jet-label for="type" value="{{ __('Type') }}" />
                <x-jet-input id="type" type="text" class="mt-1 block w-60" wire:model.defer="type" autocomplete="type" />
                <x-jet-input-error for="type" class="mt-2" />

                <x-jet-label for="material" value="{{ __('Material') }}" />
                <x-jet-input id="material" type="text" class="mt-1 block w-60" wire:model.defer="material" autocomplete="material" />
                <x-jet-input-error for="material" class="mt-2" />

                <x-jet-label for="color" value="{{ __('Color') }}" />
                <x-jet-input id="color" type="text" class="mt-1 block w-full" wire:model.defer="color" autocomplete="color" />
                <x-jet-input-error for="color" class="mt-2" />

                <x-jet-label for="description" value="{{ __('Description') }}" />
                <x-jet-input id="description" type="text" class="mt-1 block w-full" wire:model.defer="description" autocomplete="description" />
                <x-jet-input-error for="description" class="mt-2" />

                <x-jet-label for="state" value="{{ __('State') }}" />
                <x-jet-input id="state" type="text" class="mt-1 block w-full" wire:model.defer="state" autocomplete="state" />
                <x-jet-input-error for="state" class="mt-2" />

                <x-jet-label for="price" value="{{ __('Price') }}" />
                <x-jet-input id="price" type="text" class="mt-1 block w-full" wire:model.defer="price" autocomplete="price" />
                <x-jet-input-error for="price" class="mt-2" />
            </div>
        </x-slot>
    
        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __('Saved.') }}
            </x-jet-action-message>
    
            <x-jet-button>
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>
</div>
