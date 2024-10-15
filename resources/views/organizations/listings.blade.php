<x-layouts.layout>

  <x-layouts.container search_route="organizations.index">

    <div
      class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900"
      id="main-content">
      <main>
        <div
          class="items-center justify-between block p-4 bg-white border-b border-gray-200 sm:flex dark:bg-gray-800 dark:border-gray-700">
          <div class="relative w-full mb-2 h-28">

            <x-modals.flash />

            <div class="">
              <x-buttons.bread-crumb class="mb-10" :links='[
                  "home" => "dashboard.index",
                  "organizations" => "",
              ]' />

              <h1
                class="text-xl font-semibold text-gray-900 -translate-y-3 sm:text-2xl dark:text-white">
                All
                Organizations</h1>
            </div>
            <div
              class="flex items-center justify-between sm:flex md:divide-x md:divide-gray-100 dark:divide-gray-700">

              <x-search.search-result />

            </div>
          </div>
        </div>

        <div class="flex flex-col">
          <div class="overflow-x-auto">
            <div class="inline-block min-w-full">
              <div class="shadow h-80">
                <table
                  class="w-full max-w-full min-w-full overflow-y-scroll divide-y divide-gray-200 dark:divide-gray-600">
                  <thead
                    class="sticky top-0 w-full min-w-full bg-gray-100 dark:bg-gray-700">
                    <tr>
                      <th
                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400"
                        scope="col">
                        Name
                      </th>
                      <th
                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400"
                        scope="col">
                        Members
                      </th>
                      <th
                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400"
                        scope="col">
                        Created By
                      </th>
                      <th
                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400"
                        scope="col">
                        Actions
                      </th>
                    </tr>
                  </thead>


                  <tbody
                    class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">

                    @foreach ($organizations as $organization)
                      <tr
                        class="h-14 hover:bg-gray-100 dark:hover:bg-gray-700">

                        <td
                          class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                          <a class="text-base font-semibold text-gray-900 dark:text-white hover:underline"
                            href='{{ route("organizations.show", $organization->id) }}'>{{ $organization->name }}
                          </a>
                        </td>

                        <td
                          class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                          {{ 0 / $organization->max_members }}</td>

                        <td
                          class="max-w-sm p-4 overflow-hidden text-base font-normal text-gray-500 truncate xl:max-w-xs dark:text-gray-400">
                          {{ $organization->user->username ?? $superName }}
                        </td>

                        <td class="flex flex-col gap-2 p-2"
                          id="organizations-actions">
                          <x-buttons.button
                            class="inline-flex items-center px-3 py-2 text-sm text-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                            id="updateProductButton" type="a"
                            href='{{ route("organizations.edit", $organization->id) }}'>
                            <img class="w-4 h-4 mr-2"
                              src="{{ Vite::asset("resources/icons/join.svg") }}"
                              alt="">
                            Join
                          </x-buttons.button>

                          <x-buttons.button
                            class="inline-flex items-center px-3 py-2 text-sm text-center text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900"
                            id="delete-organization"
                            data-item-id="{{ $organization->id }}"
                            type="button">
                            <img class="w-4 h-4 mr-2"
                              src="{{ Vite::asset("resources/icons/hide_org.svg") }}"
                              alt="">Hide
                          </x-buttons.button>

                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        @if ($organizations instanceof Illuminate\Pagination\Paginator)
          {!! $organizations->appends(["query" => request("query")])->links() !!}
        @endif
      </main>
    </div>

  </x-layouts.container>
  </x-layputs.layout>
