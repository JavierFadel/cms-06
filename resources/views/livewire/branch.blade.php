<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div>
        <x-jet-application-logo class="block h-12 w-auto" />
    </div>

    <div class="mt-8 mb-6 text-2xl">
        Welcome to Branch!
    </div>

    <form method="POST" action="{{ route('branch.index') }}">
        @csrf

        <div>
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
        </div>

        <div class="flex items-center justify-end mt-4">
          	<x-jet-button class="ml-4">
                {{ __('Create') }}
            </x-jet-button>
        </div>
    </form>

    <x-jet-validation-errors class="mb-4" />
</div>

<table class="table-fixed min-w-full divide-y divide-gray-200">
	<thead class="bg-gray-100">
		<th class="py-3 text-gray-400 text-sm">ID</th>
		<th class="py-3 text-gray-400 text-sm">Name</th>
		<th class="py-3 text-gray-400 text-sm">Properties</th>
	</thead>
	<tbody class="divide-y divide-gray-100 text-center">
		@forelse ($data as $item)
			<tr>
				<td class="py-1 text-gray-400 text-sm">{{ $item->id }}</td>
				<td class="py-1 text-gray-400 text-sm">{{ $item->name }}</td>
				<td class="py-1 text-sm">
					<form action="{{ route('branch.destroy', $item->id) }}" method="post">
						@csrf
						@method('delete')

						<a href="{{ route('branch.edit', $item->id) }}" class="py-1 px-3 text-indigo-600 hover:text-indigo-900 text-sm">
							Edit
						</a>

						<button type="submit" class="py-1 px-3 text-indigo-600 hover:text-indigo-900 text-sm" onclick="return confirm('Are you sure?')">
							Delete
						</button>
					</form>
				</td>
			</tr>
		@empty
			@for ($i = 0; $i < 3; $i++)
				<td class="py-3 text-gray-400 text-sm">Empty</td>
			@endfor
		@endforelse
	</tbody>
</table>