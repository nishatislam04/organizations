@php
  $user = auth()->user();
  $shouldShowOrganization =
      is_null($user->organization_id) && !$user->role === "super";
@endphp

<aside
  class="fixed top-0 left-0 z-20 flex flex-col flex-shrink-0 hidden w-64 h-full pt-16 font-normal duration-75 lg:flex transition-width"
  id="sidebar" aria-label="Sidebar">
  <div
    class="relative flex flex-col flex-1 min-h-0 pt-0 bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="flex flex-col flex-1 pt-5 pb-4 overflow-y-auto">
      <div
        class="flex-1 px-3 space-y-1 bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
        <ul class="pb-2 space-y-2">
          <li>
            <p class="py-6 text-white lg:hidden">here should be search
              container visible
              on mobile view. fix the css 'hide' conflict</p>
          </li>
          <li>
            <a class="flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 dark:hover:bg-gray-700"
              href="{{ route("dashboard.index") }}">
              <img
                class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                src="{{ Vite::asset("resources/icons/dashboard.svg") }}"
                alt="">
              <span class="ml-3" sidebar-toggle-item>Dashboard</span>
            </a>
          </li>
          @can("is-super")
            <li>
              <button
                class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700"
                data-collapse-toggle="dropdown-crud" type="button"
                aria-controls="dropdown-crud">
                <img
                  class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                  src="{{ Vite::asset("resources/icons/crud.svg") }}"
                  alt="">

                <span class="flex-1 ml-3 text-left whitespace-nowrap"
                  sidebar-toggle-item>CRUD</span>
                <img class="w-6 h-6"
                  src="{{ Vite::asset("resources/icons/arrow-down.svg") }}"
                  alt="" sidebar-toggle-item>

              </button>
              <ul class="hidden py-2 space-y-2 " id="dropdown-crud">
                <li>
                  <a class="flex items-center p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 pl-11 dark:text-gray-200 dark:hover:bg-gray-700 "
                    href="{{ route("organizations.index") }}">Organizations</a>
                </li>
                @can("is-super")
                  <li>
                    <a class="flex items-center p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 pl-11 dark:text-gray-200 dark:hover:bg-gray-700 "
                      href="{{ route("users.index") }}">Users</a>
                  </li>
                @endcan
              </ul>
            </li>
          @endcan

          @if ($shouldShowOrganization)
            <li>
              <a class="flex items-center p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 pl-11 dark:text-gray-200 dark:hover:bg-gray-700 "
                href="{{ route("organizations.listings") }}">Organizations</a>
            </li>
          @endif

          @can("is-super")
            <li>
              <button
                class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700"
                data-collapse-toggle="dropdown-pages" type="button"
                aria-controls="dropdown-pages">

                <img
                  class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                  src="{{ Vite::asset("resources/icons/pages.svg") }}"
                  alt="">


                <span class="flex-1 ml-3 text-left whitespace-nowrap"
                  sidebar-toggle-item>Listings</span>

                <img class="w-6 h-6"
                  src="{{ Vite::asset("resources/icons/arrow-down.svg") }}"
                  alt="" sidebar-toggle-item>

              </button>
              <ul class="hidden py-2 space-y-2" id="dropdown-pages">
                <li>
                  <a class="flex items-center p-2 text-base text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700"
                    href="{{ route("organizations.listings") }}">Organizations</a>
                </li>
              </ul>
            </li>
          @endcan

          <li>
            <a class="flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 dark:hover:bg-gray-700 "
              href="#">

              <img
                class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                src="{{ Vite::asset("resources/icons/settings.svg") }}"
                alt="">

              <span class="ml-3" sidebar-toggle-item>Settings</span>
            </a>
          </li>

        </ul>
      </div>
    </div>
  </div>
</aside>
