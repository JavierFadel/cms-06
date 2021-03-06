<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('schedule.update', $data->id) }}" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div>
                <x-jet-label for="movieId" value="{{ __('Movie ID') }}" />
                <x-jet-input id="movieId" class="block mt-1 w-full" type="number" name="movie_id" :value="old('movie_id')" value="{{ $data->movie_id }}" required autofocus autocomplete="name" />
            </div>

            <div>
                <x-jet-label for="studioId" value="{{ __('Studio ID') }}" />
                <x-jet-input id="studioId" class="block mt-1 w-full" type="number" name="studio_id" :value="old('studio_id')" value="{{ $data->studio_id }}" required />
            </div>

            <div>
                <x-jet-label for="start" value="{{ __('Start') }}" />
                <x-jet-input id="start" class="block mt-1 w-full" type="datetime-local" name="start" :value="old('start')" value="{{ date('Y-m-d/TH:i', strtotime($data->start)) }}" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button class="ml-4">
                    {{ __('Update') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
