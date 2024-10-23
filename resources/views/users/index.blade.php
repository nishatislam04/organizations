<x-layouts.layout>

  <x-layouts.container search_route="users.index">
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
                  "users" => "",
              ]' />
              {{-- <x-buttons.bread-crumb class="mb-10" /> --}}
              <h1
                class="text-xl font-semibold text-gray-900 -translate-y-3 sm:text-2xl dark:text-white">
                All Users</h1>
            </div>
            <div
              class="flex items-center justify-between sm:flex md:divide-x md:divide-gray-100 dark:divide-gray-700">

              <x-search.search-result />

              @if ($availableOrganizations !== 0)
                @can("is-super")
                  <x-buttons.button
                    class="absolute right-0 bottom-0 text-white ml-auto bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800"
                    type="a" :href='route("users.create")'>
                    <x-icon.icon class="inline w-5 h-5 mr-2" fill="white"
                      icon="create" />
                    Create a new User
                  </x-buttons.button>
                @endcan
              @else
                <x-buttons.button
                  class="absolute right-0 px-2 py-2 pr-5 text-sm text-center capitalize bg-gray-300 opacity-50 cursor-not-allowed bottom-0px-5 text-stone-500 dark:text-white dark:bg-slate-700 dark:hover:bg-slate-600 focus:ring-4 dark:focus:ring-slate-400 hover:bg-gray-400 focus:ring-gray-500"
                  type="button" disabled>
                  No organization is available to assign
                </x-buttons.button>
              @endif

            </div>
          </div>
        </div>

        <div class="flex flex-col">
          <div class="overflow-x-auto">
            <div class="inline-block min-w-full align-middle">
              <div class="shadow h-80">
                <table
                  class="max-w-full min-w-full overflow-y-scroll divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                  <thead class="sticky top-0 bg-gray-100 dark:bg-gray-700">
                    <tr class="">
                      <th class="p-4" scope="col">

                        <x-forms.checkbox type="all" />

                      </th>
                      <th
                        class="flex items-center gap-2 p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400"
                        scope="col">
                        Username

                        <x-layouts.sort sort_route="users.index"
                          sortBy="name" :sortDir="$sortDir ?? "asc"" />
                      </th>
                      <th
                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400"
                        scope="col">
                        Role
                      </th>
                      <th
                        class="flex items-center gap-2 p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400"
                        scope="col">
                        Email
                      </th>
                      <th
                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400"
                        scope="col">
                        Org Name
                      </th>
                      <th
                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400"
                        scope="col">
                        Org Id
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

                    @foreach ($users as $user)
                      @if ($user->role === "super")
                        @continue
                      @endif

                      <tr
                        class="h-14 hover:bg-gray-100 dark:hover:bg-gray-700">

                        <td class="w-4 p-4">
                          <x-forms.checkbox type="single" />
                        </td>

                        <td
                          class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                          <div
                            class="text-base font-semibold text-gray-900 dark:text-white">
                            {{ $user->username }}
                          </div>
                        </td>

                        <td
                          class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                          {{ $user->role }}
                        </td>

                        <td
                          class="max-w-sm p-4 overflow-hidden text-base font-normal text-gray-500 truncate xl:max-w-xs dark:text-gray-400">
                          {{ $user->email }}
                        </td>

                        <td
                          class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                          {{ $user->name }}
                        </td>

                        <td
                          class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                          {{ $user->organizationId }}
                        </td>

                        <td class="flex justify-center gap-4 p-2"
                          id="organizations-actions">

                          @if ($user->status === "passed")
                            @can("user-edit")
                              <x-buttons.button
                                class="inline-flex items-center px-3 py-2 text-sm text-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                                id="edit-user-btn"
                                data-user-id="{{ $user->id }}"
                                type="a"
                                href='{{ route("users.edit", $user->id) }}'>
                                <x-icon.icon class="w-4 h-4 mr-2"
                                  fill="white" icon="edit" />
                              </x-buttons.button>
                            @endcan

                            @can("user-delete")
                              <x-buttons.button
                                class="inline-flex items-center px-3 py-2 text-sm text-center text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900"
                                id="delete-user-btn"
                                data-user-id="{{ $user->id }}"
                                type="button">
                                <x-icon.icon class="w-4 h-4 mr-2"
                                  fill="white" icon="delete" />
                              </x-buttons.button>
                            @endcan
                          @else
                            <x-buttons.button
                              class="inline-flex items-center px-3 py-2 text-sm text-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                              id="approve-user-btn"
                              data-user-id="{{ $user->id }}"
                              type="button">
                              <x-icon.icon class="w-4 h-4 mr-2"
                                fill="white" icon="approve" />
                            </x-buttons.button>

                            <x-buttons.button
                              class="inline-flex items-center px-3 py-2 text-sm text-center text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900"
                              id="reject-user-btn"
                              data-user-id="{{ $user->id }}"
                              type="button">
                              <x-icon.icon class="w-4 h-4 mr-2"
                                fill="white" icon="reject" />
                            </x-buttons.button>
                          @endif
                        </td>
                      </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>


        <x-modals.action-modal name="delete-user" type="warning"
          method="DELETE" header="Delete User">
          Are you sure you want to delete this user?
        </x-modals.action-modal>

        <x-modals.action-modal name="approve-user" type="warning"
          method="POST" header="Accept User">
          Are you sure you want to approve this user?
        </x-modals.action-modal>

        <x-modals.action-modal name="reject-user" type="warning"
          method="POST" header="Reject User">
          Are you sure you want to reject this user?
        </x-modals.action-modal>

        {!! $users->appends(["query" => request("query")])->links() !!}
      </main>
    </div>


  </x-layouts.container>
</x-layouts.layout>
