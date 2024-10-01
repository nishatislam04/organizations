<form action="#" method="GET" class="hidden lg:block ">
    <label for="topbar-search" class="sr-only">Search</label>
    <div class="relative mt-1 lg:w-96">

        @if ($showSearchIcon === "true")
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <img src="{{ Vite::asset("resources/icons/search.svg")}}" alt="" class="w-6 h-6">
        </div>
        @endif

        <input type="text" name="email" id="topbar-search" {{ $attributes->merge(["class"=>"bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500
        block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
        dark:focus:ring-primary-500 dark:focus:border-primary-500" . ($showSearchIcon === 'true' ? ' pl-10' : '')])}}
            placeholder="Search">
    </div>
</form>
