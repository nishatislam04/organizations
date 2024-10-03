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
              Users</h1>
          </div>
          <div class="flex items-center justify-between sm:flex md:divide-x md:divide-gray-100 dark:divide-gray-700">

            <x-search-result />


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

                      <x-checkbox />

                    </th>
                    <th scope="col"
                      class="flex items-center gap-2 p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                      Name
                    </th>
                    <th scope="col"
                      class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                      ID
                    </th>
                    <th scope="col"
                      class="flex items-center gap-2 p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
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

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>


      {{-- delete view --}}
      <x-modal headerTitle="Delete item" typeIcon="warning-icon" actionConfirmBtn="Yes, I am sure"
        actionConfirmCancel="No, cancel">Are you sure you want to delete this organization?</x-modal>

    </main>
  </div>



</x-layout>
