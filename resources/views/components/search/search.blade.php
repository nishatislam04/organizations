@props(["search_route" => "organizations.index"])

<form class="hidden lg:block " action="{{ route($search_route) }}"
  method="GET">
  @csrf

  <label class="sr-only" for="topbar-search">Search</label>
  <div class="relative mt-1 lg:w-96">

    @if ($showSearchIcon === "true")
      <div
        class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
        <svg class="w-6 h-6">
          <use xlink:href="{{ asset("sprite.svg#search") }}">
          </use>
        </svg>

      </div>
    @endif

    <input id="topbar-search" name="query" type="text"
      value="{{ $query ?? "" }}"
      {{ $attributes->merge([
          "class" =>
              "bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500
                                            block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                            dark:focus:ring-primary-500 dark:focus:border-primary-500" .
              ($showSearchIcon === "true" ? " pl-10" : ""),
      ]) }}
      placeholder="Search">
  </div>
</form>
