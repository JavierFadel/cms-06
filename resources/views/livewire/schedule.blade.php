<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div>
        <x-jet-application-logo class="block h-12 w-auto" />
    </div>

    <div class="mt-8 mb-6 text-2xl">
        Welcome to Schedule!
    </div>

	{{-- Admins only. --}}
    @can('isAdmin')
    <form method="POST" action="{{ route('schedule.index') }}">
        @csrf

        <div>
            <x-jet-label for="movieId" value="{{ __('Movie ID') }}" />
            <x-jet-input id="movieId" class="block mt-1 mb-4 w-full" type="number" name="movie_id" required autofocus />
        </div>

        <div>
            <x-jet-label for="studioId" value="{{ __('Studio ID') }}" />
            <x-jet-input id="studioId" class="block mt-1 mb-4 w-full" type="number" name="studio_id" required />
        </div>

        <div>
            <x-jet-label for="start" value="{{ __('Start') }}" />
            <x-jet-input id="start" class="block mt-1 mb-4 w-full" type="datetime-local" name="start" required />
        </div>

        <div class="flex items-center justify-end mt-4">
          	<x-jet-button class="ml-4">
                {{ __('Create') }}
            </x-jet-button>
        </div>
    </form>
    @endcan

    <x-jet-validation-errors class="mb-4" />
</div>

<table class="table-fixed min-w-full divide-y divide-gray-200">
	<thead class="bg-gray-100">
		<th class="py-3 text-gray-400 text-sm">Movie</th>
		<th class="py-3 text-gray-400 text-sm">Studio</th>
		<th class="py-3 text-gray-400 text-sm">Start</th>
		<th class="py-3 text-gray-400 text-sm">End</th>
		<th class="py-3 text-gray-400 text-sm">Price</th>
		@can('isAdmin')
		<th class="py-3 text-gray-400 text-sm">Properties</th>
		@endcan
	</thead>
	<tbody class="divide-y divide-gray-100 text-center">
		@forelse ($data as $item)
			<tr>
				<td class="py-3 text-sm">
					<a href="@imageurl($item->movie_id)" class="py-1 px-3 text-indigo-600 hover:text-indigo-900 text-sm">
						@moviename($item->movie_id)
					</a>
				</td>
				<td class="py-3 text-gray-400 text-sm"> @studioname($item->studio_id) </td>
				<td class="py-3 text-gray-400 text-sm"> @convertdate($item->start) </td>
				<td class="py-3 text-gray-400 text-sm"> @convertdate($item->end) </td>
				<td class="py-3 text-gray-400 text-sm">{{ number_format($item->price) }}</td>
				@can('isAdmin')
				<td class="py-3 text-sm">
					<form action="{{ route('schedule.destroy', $item->id) }}" method="post">
						@csrf
						@method('delete')

						<a href="{{ route('schedule.edit', $item->id) }}" class="py-1 px-3 text-indigo-600 hover:text-indigo-900 text-sm">
							Edit
						</a>

						<button type="submit" class="py-1 px-3 text-indigo-600 hover:text-indigo-900 text-sm" onclick="return confirm('Are you sure?')">
							Delete
						</button>
					</form>
				</td>
				@endcan
			</tr>
		@empty
			@for ($i = 0; $i < 6; $i++)
				<td class="py-3 text-gray-300 text-sm">Empty</td>
			@endfor
		@endforelse
	</tbody>
</table>