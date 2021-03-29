<div>
    <x-jet-form-section submit="createItem">

        <x-slot name="title">
            {{ __('Add Order') }}
        </x-slot>
    
        <x-slot name="description">
            {{ __('') }}
        </x-slot>

       
    
        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">

                <Select>
                    @foreach ($list as $item)
                    <option value="{{ $item->id }}">{{ $item->first_name }} {{ $item->last_name }}</option>
                    @endforeach
                </Select>

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
