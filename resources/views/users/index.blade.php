<x-layouts.layout>

  <x-layouts.container search_route="users.index">
    <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">
      <main>
        <div
          class="items-center justify-between block p-4 bg-white border-b border-gray-200 sm:flex dark:bg-gray-800 dark:border-gray-700">
          <div class="relative w-full mb-2 h-28">

            <x-modals.flash />

            <div class="">
              <x-buttons.bread-crumb class="mb-10" />
              <h1 class="text-xl font-semibold text-gray-900 -translate-y-3 sm:text-2xl dark:text-white">All
                Users</h1>
            </div>
            <div class="flex items-center justify-between sm:flex md:divide-x md:divide-gray-100 dark:divide-gray-700">

              <x-search.search-result />

              @if ($availableOrganizations !== 0)
              @can("is-super")
              <x-buttons.button :href="route('users.create')" type="a"
                class="absolute right-0 bottom-0 text-white ml-auto bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                Create a new User
              </x-buttons.button>
              @endcan

              @else
              <x-buttons.button type="button"
                class="absolute right-0 px-2 py-2 pr-5 text-sm text-center capitalize bg-gray-300 opacity-50 cursor-not-allowed bottom-0px-5 text-stone-500 dark:text-white dark:bg-slate-700 dark:hover:bg-slate-600 focus:ring-4 dark:focus:ring-slate-400 hover:bg-gray-400 focus:ring-gray-500"
                disabled>
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
                      <th scope="col" class="p-4">

                        <x-forms.checkbox type="all" />

                      </th>
                      <th scope="col"
                        class="flex items-center gap-2 p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                        Username

                        <x-layouts.sort sort_route="users.index" sortBy="name" :sortDir="$sortDir ?? 'asc'" />
                      </th>
                      <th scope="col"
                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                        ID
                      </th>
                      <th scope="col"
                        class="flex items-center gap-2 p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                        Email
                      </th>
                      <th scope="col"
                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                        Organization Name
                      </th>
                      <th scope="col"
                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                        Organization Id
                      </th>
                      <th scope="col"
                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                        Actions
                      </th>
                    </tr>
                  </thead>

                  <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">

                    @foreach ($users as $user)

                    @if ($user->role === "super")
                    @continue
                    @endif

                    <tr class="h-14 hover:bg-gray-100 dark:hover:bg-gray-700">

                      <td class="w-4 p-4">
                        <x-forms.checkbox type="single" />
                      </td>

                      <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                        <div class="text-base font-semibold text-gray-900 dark:text-white">
                          {{ $user->username }}
                        </div>
                      </td>

                      <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $user->id  }}
                      </td>

                      <td
                        class="max-w-sm p-4 overflow-hidden text-base font-normal text-gray-500 truncate xl:max-w-xs dark:text-gray-400">
                        {{ $user->email }}
                      </td>

                      <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $user->name }}
                      </td>

                      <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $user->organizationId }}
                      </td>

                      <td class="flex justify-center gap-4 p-2" id="organizations-actions">

                        @if ($user->status === "passed")


                        @can("user-edit")
                        <x-buttons.button type="a" href="{{ route('users.edit', $user->id) }}" id="edit-user-btn"
                          data-user-id="{{ $user->id  }}"
                          class="inline-flex items-center px-3 py-2 text-sm text-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                          <img src="{{ Vite::asset('resources/icons/edit.svg') }}" alt="" class="w-4 h-4 mr-2">
                          Edit
                        </x-buttons.button>
                        @endcan

                        @can("user-delete")
                        <x-buttons.button type="button" id="delete-user-btn" data-user-id="{{ $user->id  }}"
                          class="inline-flex items-center px-3 py-2 text-sm text-center text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                          <img src="{{ Vite::asset('resources/icons/delete.svg') }}" alt="" class="w-4 h-4 mr-2">
                          Delete
                        </x-buttons.button>
                        @endcan

                        @else

                        <x-buttons.button type="button" id="approve-user-btn" data-user-id="{{ $user->id }}"
                          class="inline-flex items-center px-3 py-2 text-sm text-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                          <img src="{{ Vite::asset('resources/icons/approve.svg') }}" alt="" class="w-4 h-4 mr-2">
                          Approve
                        </x-buttons.button>

                        <x-buttons.button type="button" id="reject-user-btn" data-user-id="{{ $user->id }}"
                          class="inline-flex items-center px-3 py-2 text-sm text-center text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                          <img src="{{ Vite::asset('resources/icons/reject.svg') }}" alt="" class="w-4 h-4 mr-2">
                          Reject
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


        <x-modals.delete-modal headerTitle="Delete item" typeIcon="warning-icon" formId="user-delete-form"
          actionConfirmBtn="Yes, I am sure" actionConfirmCancel="No, cancel">Are you sure you want to delete this user?
          </x-modal>

          <x-modals.approve-modal headerTitle="Accept User" typeIcon="success-icon" actionConfirmBtn="Yes, I am sure"
            actionConfirmCancel="No, cancel">Are you sure you want to Accept this user?</x-modals.approve-modal>
          <x-modals.reject-modal headerTitle="Reject user" typeIcon="warning-icon" actionConfirmBtn="Yes, I am sure"
            actionConfirmCancel="No, cancel">Are you sure you want to reject this user?</x-modals.approve-modal>

            {!! $users->appends(['query' => request('query')])->links() !!}
      </main>
    </div>


  </x-layouts.container>
</x-layouts.layout>
