<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div>
        <x-jet-application-logo class="block h-12 w-auto" />
    </div>

    <div class="mt-8 mb-6 text-2xl">
        Welcome to Studio!
    </div>

    <form method="POST" action="{{ route('studio.index') }}">
        @csrf

        <div>
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input id="name" class="block mt-1 mb-4 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
        </div>

        <div>
            <x-jet-label for="branchId" value="{{ __('Branch ID') }}" />
            <x-jet-input id="branchId" class="block mt-1 mb-4 w-full" type="number" name="branch_id" :value="old('branch_id')" required />
        </div>

        <div>
            <x-jet-label for="basicPrice" value="{{ __('Basic Price') }}" />
            <x-jet-input id="basicPrice" class="block mt-1 mb-4 w-full" type="number" name="basic_price" :value="old('basic_price')" required />
        </div>

        <div>
            <x-jet-label for="additionalFridayPrice" value="{{ __('Additional Friday Price') }}" />
            <x-jet-input id="additionalFridayPrice" class="block mt-1 mb-4 w-full" type="number" name="additional_friday_price" :value="old('additional_friday_price')" required />
        </div>

        <div>
            <x-jet-label for="additionalSaturdayPrice" value="{{ __('Additional Saturday Price') }}" />
            <x-jet-input id="additionalSaturdayPrice" class="block mt-1 mb-4 w-full" type="number" name="additional_saturday_price" :value="old('additional_saturday_price')" required />
        </div>

        <div>
            <x-jet-label for="additionalSundayPrice" value="{{ __('Additional Sunday Price') }}" />
            <x-jet-input id="additionalSundayPrice" class="block mt-1 mb-4 w-full" type="number" name="additional_sunday_price" :value="old('additional_sunday_price')" required />
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
		<th class="py-3 text-gray-400 text-sm">Branch</th>
		<th class="py-3 text-gray-400 text-sm">Basic Price</th>
		<th class="py-3 text-gray-400 text-sm">Additional Friday Price</th>
		<th class="py-3 text-gray-400 text-sm">Additional Saturday Price</th>
		<th class="py-3 text-gray-400 text-sm">Additional Sunday Price</th>
		<th class="py-3 text-gray-400 text-sm">Properties</th>
	</thead>
	<tbody class="divide-y divide-gray-100 text-center">
		@forelse ($data as $item)
			<tr>
				<td class="py-1 text-gray-400 text-sm">{{ $item->id }}</td>
				<td class="py-1 text-gray-400 text-sm">{{ $item->name }}</td>
				<td class="py-1 text-gray-400 text-sm"> @branchname($item->branch_id) </td>
				<td class="py-1 text-gray-400 text-sm">{{ number_format($item->basic_price) }}</td>
				<td class="py-1 text-gray-400 text-sm">{{ number_format($item->additional_friday_price) }}</td>
				<td class="py-1 text-gray-400 text-sm">{{ number_format($item->additional_saturday_price) }}</td>
				<td class="py-1 text-gray-400 text-sm">{{ number_format($item->additional_sunday_price) }}</td>
				<td class="py-1 text-sm">
					<form action="{{ route('studio.destroy', $item->id) }}" method="post">
						@csrf
						@method('delete')

						<a href="{{ route('studio.edit', $item->id) }}" class="py-1 px-3 text-indigo-600 hover:text-indigo-900 text-sm">
							Edit
						</a>

						<button type="submit" class="py-1 px-3 text-indigo-600 hover:text-indigo-900 text-sm" onclick="return confirm('Are you sure?')">
							Delete
						</button>
					</form>
				</td>
			</tr>
		@empty
			@for ($i = 0; $i < 8; $i++)
				<td class="py-3 text-gray-300 text-sm">Empty</td>
			@endfor
		@endforelse
	</tbody>
</table>