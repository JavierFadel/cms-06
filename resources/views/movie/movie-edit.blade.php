<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('movie.update', $data->id) }}" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" value="{{ $data->name }}" required autofocus autocomplete="name" />
            </div>

            <div>
                <x-jet-label for="minuteLength" value="{{ __('Minute') }}" />
                <x-jet-input id="minuteLength" class="block mt-1 w-full" type="number" name="minute_length" :value="old('minute_length')" value="{{ $data->minute_length }}" required />
            </div>

            <div>
                <x-jet-label for="imageInput" value="{{ __('Image') }}" />
                <x-jet-input id="imageInput" class="block mt-1 w-full" type="file" name="picture_url" :value="old('picture_url')" value="{{ $data->picture_url }}" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button class="ml-4">
                    {{ __('Update') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
