<x-layout>

  <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">
    <main>
      <div
        class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
        <div class="w-full mb-1">
          <div class="mb-4">
            <x-bread-crumb class="mb-10" />
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">All Organizations</h1>
          </div>
          <div class="items-center justify-between block sm:flex md:divide-x md:divide-gray-100 dark:divide-gray-700">

            <x-search showSearchIcon="false" />

            <x-button :href="route('organizations.create')" type="a" id="createProductButton"
              class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
              Create a new Organization
            </x-button>

          </div>
        </div>
      </div>

      <div class="flex flex-col">
        <div class="overflow-x-auto">
          <div class="inline-block min-w-full align-middle">
            <div class="overflow-hidden shadow">
              <table class="max-w-full min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                <thead class="bg-gray-100 dark:bg-gray-700">
                  <tr>
                    <th scope="col" class="p-4">

                      <x-checkbox />

                    </th>
                    <th scope="col"
                      class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                      Name
                    </th>
                    <th scope="col"
                      class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                      ID
                    </th>
                    <th scope="col"
                      class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                      Description
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
                  <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                    <td class="w-4 p-4">
                      <x-checkbox />
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

                    <td class="flex flex-col gap-2 p-4">
                      <x-button type="a" href="{{ route('organizations.edit', $organization->id)}}"
                        id="updateProductButton"
                        class="inline-flex items-center px-3 py-2 text-sm text-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        <img src="{{ Vite::asset("resources/icons/edit.svg") }}" alt="" class="w-4 h-4 mr-2">
                        Edit
                      </x-button>

                      <x-button type="a" href="{{ route('organizations.deleteView', $organization->id)}}"
                        id="deleteProductButton"
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

      <div
        class="sticky bottom-0 right-0 items-center w-full p-4 bg-white border-t border-gray-200 sm:flex sm:justify-between dark:bg-gray-800 dark:border-gray-700">
        <div class="flex items-center mb-4 sm:mb-0">
          <a href="#"
            class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
            <img src="{{ Vite::asset("resources/icons/left-arrow.svg")}}" alt="" class="w-7 h-7">
          </a>
          <a href="#"
            class="inline-flex justify-center p-1 mr-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
            <img src="{{ Vite::asset("resources/icons/right-arrow.svg")}}" alt="" class="w-7 h-7">
          </a>
          <span class="text-sm font-normal text-gray-500 dark:text-gray-400">Showing <span
              class="font-semibold text-gray-900 dark:text-white">1-20</span> of <span
              class="font-semibold text-gray-900 dark:text-white">2290</span></span>
        </div>
        <div class="flex items-center space-x-3">
          <x-button type="a" href="#"
            class="inline-flex items-center justify-center flex-1 px-5 py-2 pr-5 text-sm text-center bg-gray-300 text-stone-500 dark:text-white dark:bg-slate-700 dark:hover:bg-slate-600 focus:ring-4 dark:focus:ring-slate-400 hover:bg-gray-400 focus:ring-gray-500">
            <img src="{{ Vite::asset("resources/icons/previous.svg")}}" alt="" class="w-5 h-5 mr-1 -ml-1">
            Previous
          </x-button>

          <x-button type="a" href="#"
            class="inline-flex items-center justify-center flex-1 px-5 py-2 pr-5 text-sm text-center bg-gray-300 text-stone-500 dark:text-white dark:bg-slate-700 dark:hover:bg-slate-600 focus:ring-4 dark:focus:ring-slate-400 hover:bg-gray-400 focus:ring-gray-500">
            Next
            <img src="{{ Vite::asset("resources/icons/next.svg")}}" alt="" class="w-5 h-5 ml-1 -mr-1">
          </x-button>
        </div>
      </div>

    </main>
  </div>


</x-layout>
