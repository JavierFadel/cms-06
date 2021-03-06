<div class="p-9 sm:px-20 bg-white border-b border-gray-200">
    <div>
        <x-jet-application-logo class="block h-12 w-auto" />
    </div>

    <div class="text-2xl">
        Welcome to your Cinema!
    </div>

    <div class="mt-4 text-gray-500">
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Possimus magnam aut alias cupiditate mollitia, ut ea, rem. Error, consequuntur. Eveniet quae magni, soluta quos. Impedit cum exercitationem voluptatem, blanditiis rerum.
    </div>

    <a href="{{ route('schedule.index') }}" class="mb-6 text-indigo-600 hover:text-indigo-900 text-sm">
        See schedules &rarr;
    </a>
</div>

@can('isAdmin')
<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
    <div class="p-6">
        <div class="flex items-center">
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="{{ route('schedule.index') }}">Schedules</a></div>
        </div>

        <div class="ml-4">
            <div class="mt-2 text-sm text-gray-500">
                Check out the schedules. Even though it looks cool using Tailwind
                but honestly from the bottom of my heart I don't know what to say
                in this field and I don't want it to be some latinus thing that 
                I don't even know what it means so, there you go.
            </div>

            <a href="{{ route('schedule.index') }}">
                <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                        <div>See schedules</div>

                        <div class="ml-1 text-indigo-500">
                            <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </div>
                </div>
            </a>
        </div>
    </div>

    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
        <div class="flex items-center">
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="{{ route('branch.index') }}">Branch</a></div>
        </div>

        <div class="ml-4">
            <div class="mt-2 text-sm text-gray-500">
                Check out the branches. Even though it looks cool using Tailwind
                but honestly from the bottom of my heart I don't know what to say
                in this field and I don't want it to be some latinus thing that 
                I don't even know what it means so, there you go.
            </div>

            <a href="{{ route('branch.index') }}">
                <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                        <div>See branches</div>

                        <div class="ml-1 text-indigo-500">
                            <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </div>
                </div>
            </a>
        </div>
    </div>

    <div class="p-6 border-t border-gray-200">
        <div class="flex items-center">
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="{{ route('studio.index') }}">Studio</a></div>
        </div>

        <div class="ml-4">
            <div class="mt-2 text-sm text-gray-500">
                Check out the studios. Even though it looks cool using Tailwind
                but honestly from the bottom of my heart I don't know what to say
                in this field and I don't want it to be some latinus thing that 
                I don't even know what it means so, there you go.
            </div>

            <a href="{{ route('studio.index') }}">
                <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                    <div>See studios</div>

                    <div class="ml-1 text-indigo-500">
                        <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </div>
                </div>
            </a> 
        </div>
    </div>

    <div class="p-6 border-t border-gray-200 md:border-l">
        <div class="flex items-center">
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="{{ route('movie.index') }}">Movie</a></div>
        </div>

        <div class="ml-4">
            <div class="mt-2 text-sm text-gray-500">
                Check out the movies. Even though it looks cool using Tailwind
                but honestly from the bottom of my heart I don't know what to say
                in this field and I don't want it to be some latinus thing that 
                I don't even know what it means so, there you go.
            </div>

            <a href="{{ route('movie.index') }}">
                <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                    <div>See movies</div>

                    <div class="ml-1 text-indigo-500">
                        <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </div>
                </div>
            </a> 
        </div>
    </div>
</div>

@endcan