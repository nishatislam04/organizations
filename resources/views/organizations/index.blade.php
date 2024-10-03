<x-layout>
  <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">
    <main>
      <div
        class="items-center justify-between block p-4 bg-white border-b border-gray-200 sm:flex dark:bg-gray-800 dark:border-gray-700">
        <div class="relative w-full mb-2 h-28">

          <x-flash />

          <div class="">
            <x-bread-crumb class="mb-10" />

            <h1 class="text-xl font-semibold text-gray-900 -translate-y-3 sm:text-2xl dark:text-white">All
              Organizations</h1>
          </div>
          <div class="flex items-center justify-between sm:flex md:divide-x md:divide-gray-100 dark:divide-gray-700">

            <x-search-result />


            {{-- <x-search showSearchIcon="false" /> --}}

            <x-button :href="route('organizations.create')" type="a"
              class="absolute right-0 bottom-0 text-white ml-auto bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
              Create a new Organization
            </x-button>

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

                      <x-checkbox type="all" />

                    </th>
                    <th scope="col"
                      class="flex items-center gap-2 p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                      Name

                      <x-sort sortBy="name" :sortDir="$sortDir ?? 'asc'" />
                    </th>
                    <th scope="col"
                      class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                      ID
                    </th>
                    <th scope="col"
                      class="flex items-center gap-2 p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                      Description

                      {{-- <x-sort :sorted="$sortBy" sortBy="description" :sortDir="$sortDir ?? 'asc'" /> --}}

                    </th>
                    <th scope="col"
                      class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                      join members
                    </th>
                    <th scope="col"
                      class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                      max members
                    </th>
                    <th scope="col"
                      class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                      created By
                    </th>
                    <th scope="col"
                      class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                      Actions
                    </th>
                  </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">

                  @foreach ($organizations as $organization)
                  <tr class="h-14 hover:bg-gray-100 dark:hover:bg-gray-700">
                    <td class="w-4 p-4">
                      <x-checkbox type="single" />
                      {{-- <div class="flex items-center">
                                  <input id="checkbox-194556" aria-describedby="checkbox-1" type="checkbox"
                                    class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">
                                  <label for="checkbox-194556" class="sr-only">checkbox</label>
                                </div> --}}
                    </td>

                    <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                      <div class="text-base font-semibold text-gray-900 dark:text-white">{{ $organization->name }}
                      </div>
                    </td>

                    <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                      {{ $organization->id }}</td>

                    <td
                      class="max-w-sm p-4 overflow-hidden text-base font-normal text-gray-500 truncate xl:max-w-xs dark:text-gray-400">
                      {{$organization->description}}
                    </td>

                    <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                      {{ count($organization->joinedMembers)}}</td>

                    <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                      {{ $organization->max_members}}</td>

                    <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                      {{ $organization->user->username}}
                    </td>

                    <td class="flex flex-col gap-2 p-2" id="organizations-actions">
                      <x-button type="a" href="{{ route('organizations.edit', $organization->id)}}"
                        id="updateProductButton"
                        class="inline-flex items-center px-3 py-2 text-sm text-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        <img src="{{ Vite::asset("resources/icons/edit.svg") }}" alt="" class="w-4 h-4 mr-2">
                        Edit
                      </x-button>

                      <x-button type="button" id="delete-organization" data-item-id="{{ $organization->id }}"
                        class="inline-flex items-center px-3 py-2 text-sm text-center text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                        <img src="{{ Vite::asset("resources/icons/delete.svg")}}" alt="" class="w-4 h-4 mr-2">Delete
                      </x-button>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>


      {{-- delete view --}}
      <x-delete-modal headerTitle="Delete item" typeIcon="warning-icon" actionConfirmBtn="Yes, I am sure"
        actionConfirmCancel="No, cancel">Are you sure you want to delete this organization?</x-modal>

        {!! $organizations->appends(['query' => request('query')])->links() !!}
    </main>
  </div>



</x-layout>
