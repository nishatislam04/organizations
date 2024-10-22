@props(["links"])

<nav class="" aria-label="Breadcrumb"
  {{ $attributes->merge(["class" => "flex mb-5 $class"]) }}>
  <ol
    class="inline-flex items-center mb-5 space-x-1 text-sm font-medium md:space-x-2">

    @foreach ($links as $linkKey => $linkValue)
      <li class="inline-flex items-center">
        @if (is_array($linkValue) && count($linkValue) === 2)
          <a class="inline-flex items-center text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white"
            href='{{ route($linkValue["route"], $linkValue["id"]) }}'>
            {{ $linkKey }}
          </a>
          <x-icon.icon class="w-4 h-4" fill="gray" icon="back-slash" />
        @elseif (!is_array($linkValue) && !empty($linkValue))
          <a class="inline-flex items-center text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white"
            href='{{ route($linkValue) }}'>
            {{ $linkKey }}
            <x-icon.icon class="w-4 h-4" fill="gray"
              icon="back-slash" />
          </a>
        @else
          <a
            class="inline-flex items-center text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white">
            {{ $linkKey }}
            <x-icon.icon class="w-2 h-1" fill="gray"
              icon="back-slash" />
          </a>
        @endif

      </li>
    @endforeach



    {{-- <li class="inline-flex items-center">
      <a class="inline-flex items-center text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white"
        href="{{ route("dashboard.index") }}">
        <img class="w-5 h-5 mr-2.5"
          src="{{ Vite::asset("resources/icons/home.svg") }}" alt="">
        Home
      </a>
    </li>
    <li>
      <div class="flex items-center">
        <img class="w-6 h-6 text-gray-400"
          src="{{ Vite::asset("resources/icons/right-arrow.svg") }}"
          alt="">
        <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500"
          aria-current="page">Organizations</span>
      </div>
    </li> --}}
  </ol>
</nav>
