<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('studio.update', $data->id) }}">
            @csrf
            @method('put')

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" value="{{ $data->name }}" required autofocus autocomplete="name" />
            </div>

            <div>
                <x-jet-label for="branchId" value="{{ __('Branch ID') }}" />
                <x-jet-input id="branchId" class="block mt-1 w-full" type="number" name="branch_id" :value="old('branch_id')" value="{{ $data->branch_id }}" required />
            </div>

            <div>
                <x-jet-label for="basicPrice" value="{{ __('Basic Price') }}" />
                <x-jet-input id="basicPrice" class="block mt-1 w-full" type="number" name="basic_price" :value="old('basic_price')" value="{{ $data->basic_price }}" required />
            </div>

            <div>
                <x-jet-label for="additionalFridayPrice" value="{{ __('Additional Friday Price') }}" />
                <x-jet-input id="additionalFridayPrice" class="block mt-1 w-full" type="number" name="additional_friday_price" :value="old('additional_friday_price')" value="{{ $data->additional_friday_price }}" required />
            </div>

            <div>
                <x-jet-label for="additionalSaturdayPrice" value="{{ __('Additional Saturday Price') }}" />
                <x-jet-input id="additionalSaturdayPrice" class="block mt-1 w-full" type="number" name="additional_saturday_price" :value="old('additional_saturday_price')" value="{{ $data->additional_saturday_price }}" required />
            </div>

            <div>
                <x-jet-label for="additionalSundayPrice" value="{{ __('Additional Sunday Price') }}" />
                <x-jet-input id="additionalSundayPrice" class="block mt-1 w-full" type="number" name="additional_sunday_price" :value="old('additional_sunday_price')" value="{{ $data->additional_sunday_price }}" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button class="ml-4">
                    {{ __('Update') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
