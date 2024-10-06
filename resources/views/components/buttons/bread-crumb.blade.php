<nav {{ $attributes->merge(["class"=>"flex mb-5 $class"])}} class="" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
        <li class="inline-flex items-center">
            <a href="{{ route("dashboard.index")}}"
                class="inline-flex items-center text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white">
                <img src="{{ Vite::asset("resources/icons/home.svg")}}" alt="" class="w-5 h-5 mr-2.5">
                Home
            </a>
        </li>
        <li>
            <div class="flex items-center">
                <img src="{{ Vite::asset("resources/icons/right-arrow.svg")}}" alt="" class="w-6 h-6 text-gray-400">
                <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500" aria-current="page">Organizations</span>
            </div>
        </li>
    </ol>
</nav>
