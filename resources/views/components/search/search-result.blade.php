@if(session('search_result') > 0)

<div class="absolute bottom-0 left-0 flex items-center justify-center w-56 p-1 m-auto mt-2 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800"
    role="alert">
    <img src="{{ Vite::asset('resources/icons/alert-icon.svg') }}" alt="" class="flex-shrink-0 inline w-4 h-4 me-3">
    <span class="sr-only">Info</span>
    <div>
        <span class="font-medium">Search Result Found</span>
        <span class="font-bold">&nbsp; {{ session('search_result') }}</span>
    </div>
</div>

@elseif (session('search_result') === 0)

<div class="flex items-center p-1 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800"
    role="alert">
    <img src="{{ Vite::asset('resources/icons/alert-icon.svg') }}" alt="" class="flex-shrink-0 inline w-4 h-4 me-3">
    <span class="sr-only">Info</span>
    <div>
        <span class="font-medium text-gray-300">No Search Results Found</span>

    </div>
</div>
@endif
