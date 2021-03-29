<div>
    <x-jet-form-section submit="createItem">

        <x-slot name="title">
            {{ __('Add Client') }}
        </x-slot>
    
        <x-slot name="description">
            {{ __('') }}
        </x-slot>

       
    
        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4" style=" display: inline;">

                <x-jet-label for="first_name" value="{{ __('First Name') }}" />
                <x-jet-input id="first_name" type="text" class="mt-1 block w-full" wire:model.defer="first_name" autocomplete="first_name" />
                <x-jet-input-error for="first_name" class="mt-2" />

                <x-jet-label for="last_name" value="{{ __('Last Name') }}" />
                <x-jet-input id="last_name" type="text" class="mt-1 block w-full" wire:model.defer="last_name" autocomplete="last_name" />
                <x-jet-input-error for="last_name" class="mt-2" />

                <x-jet-label for="phone" value="{{ __('Phone') }}" />
                <x-jet-input id="phone" type="text" class="mt-1 block w-full" wire:model.defer="phone" autocomplete="phone" />
                <x-jet-input-error for="phone" class="mt-2" />

                <x-jet-label for="address" value="{{ __('Address') }}" />
                <x-jet-input id="address" type="text" class="mt-1 block w-full" wire:model.defer="address" autocomplete="address" />
                <x-jet-input-error for="address" class="mt-2" />

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
