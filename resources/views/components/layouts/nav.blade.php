@props(["search_route" => ""])

<nav
  class="fixed z-30 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
  <div class="px-3 py-2 lg:px-5 lg:pl-3">
    <div class="flex items-center justify-between">
      <div class="flex items-center justify-start">
        <button
          class="p-2 text-gray-600 rounded cursor-pointer lg:hidden hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 dark:focus:bg-gray-700 focus:ring-2 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
          id="toggleSidebarMobile" aria-expanded="true"
          aria-controls="sidebar">

          {{-- Hamburger Icon --}}
          <img class="w-6 h-6" id="toggleSidebarMobileHamburger"
            src="{{ Vite::asset("resources/icons/toggleSidebarMobileHamburger.svg") }}"
            alt="Hamburger Menu" />

          {{-- Close Icon --}}
          <img class="hidden w-6 h-6" id="toggleSidebarMobileClose"
            src="{{ Vite::asset("resources/icons/toggleSidebarMobileClose.svg") }}"
            alt="Close Menu" />
        </button>


        <a class="flex ml-2 md:mr-24" href="#">
          <img class="h-8 mr-3"
            src="{{ Vite::asset("resources/icons/logo.svg") }}"
            alt="FlowBite Logo" />
          <span
            class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Flowbite</span>
        </a>

        <x-search.search :search_route="$search_route" />

      </div>

      <button
        class="p-2 ml-4 text-gray-500 rounded-lg lg:hidden hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
        id="toggleSidebarMobileSearch" type="button">
        <span class="sr-only">Search</span>

        <img class="w-6 h-6"
          src="{{ Vite::asset("resources/icons/search.svg") }}"
          alt="">
      </button>

      <button
        class="text-gray-500 ml-auto dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5"
        id="theme-toggle" data-tooltip-target="tooltip-toggle"
        type="button">

        <img class="hidden w-5 h-5" id="theme-toggle-dark-icon"
          src="{{ Vite::asset("resources/icons/dark.svg") }}"
          alt="">
        <img class="hidden w-5 h-5" id="theme-toggle-light-icon"
          src="{{ Vite::asset("resources/icons/light.svg") }}"
          alt="">
      </button>
      <div
        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip"
        id="tooltip-toggle" role="tooltip">
        Toggle dark mode
        <div class="tooltip-arrow" data-popper-arrow></div>
      </div>

      @auth

        <div class="flex items-center ml-3">
          <div>
            <button
              class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
              id="user-menu-button-2" data-dropdown-toggle="dropdown-2"
              type="button" aria-expanded="false">
              <span class="sr-only">Open user menu</span>
              @if (is_null(auth()->user()->avatar))
                <img class="w-8 h-8 rounded-full"
                  src="https://placehold.co/30x30" alt="">
              @elseif (is_null(auth()->user()->google_id))
                <img class="w-8 h-8 rounded-full"
                  src="{{ asset("storage/uploads/" . auth()->user()->avatar) }}"
                  alt="user photo">
              @else
                <img class="w-8 h-8 rounded-full"
                  src="{{ auth()->user()->avatar }}" alt="user photo">
              @endif

            </button>
          </div>

          <div
            class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
            id="dropdown-2">
            <div class="px-4 py-3" role="none">
              <p class="text-sm text-gray-900 dark:text-white"
                role="none">
                {{ auth()->user()->username }}
              </p>
              <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300"
                role="none">
                {{ auth()->user()->email }}
              </p>
            </div>
            <ul class="py-1" role="none">
              <li>
                <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                  href="{{ route("dashboard.index") }}"
                  role="menuitem">Dashboard</a>
              </li>
              <li>
                <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                  href="#" role="menuitem">Settings</a>
              </li>
              <li>
                <form action="{{ route("logout") }}" method="POST">
                  @csrf
                  <input
                    class="block w-full px-4 py-2 text-sm text-left text-gray-700 cursor-pointer hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                    type="submit" value="Sign out">
                </form>

              </li>
            </ul>
          </div>
        </div>
      @endauth

      @guest
        <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mx-3 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
          type="button" href="{{ route("auth.login") }}">Login</a>

      @endguest

    </div>
  </div>
  </div>
</nav>
