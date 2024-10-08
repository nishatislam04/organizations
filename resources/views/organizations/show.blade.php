<x-layouts.layout>

  <x-layouts.container search_route="organizations.index">

    <div
      class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900"
      id="main-content">
      <main class="relative">
        <div
          class="items-center justify-between block p-4 bg-white border-b border-gray-200 sm:flex dark:bg-gray-800 dark:border-gray-700">
          <div class="relative w-full mb-2 h-28">

            <x-modals.flash />

            <div class="">
              <x-buttons.bread-crumb class="mb-10" />

              <h1
                class="text-xl font-semibold text-gray-900 -translate-y-3 sm:text-2xl dark:text-white">
                Organization</h1>
            </div>
            <div
              class="flex items-center justify-between sm:flex md:divide-x md:divide-gray-100 dark:divide-gray-700">

              <x-search.search-result />

              @can("is-super")
                <x-buttons.button
                  class="absolute right-0 bottom-0 text-white ml-auto bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800"
                  type="a" :href='route(
                      "subscriptions.create",
                      $organization->organizationId,
                  )'>
                  Create a new Subscription
                </x-buttons.button>
              @endcan

            </div>
          </div>
        </div>

        <div class="flex flex-col">
          <div class="overflow-x-auto">
            <div class="inline-block min-w-full align-middle">
              <div class="rounded-lg shadow dark:bg-gray-900 h-80">

                <!-- Organization Details and Subscriptions -->
                <div class="grid w-full h-full grid-cols-12 p-12">

                  <!-- Left Section: Organization Information -->
                  <div class="col-start-1 col-end-8">
                    <h2 class="text-2xl font-semibold text-blue-500">
                      {{ $organization->name }}</h2>
                    <p
                      class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                      ID: {{ $organization->organizationId }}</p>

                    <!-- Max Members -->
                    <div class="flex gap-2 my-2 mt-5">
                      <p class="font-medium text-gray-400">Max Members:</p>
                      <p
                        class="text-lg font-semibold text-gray-500 dark:text-gray-300">
                        {{ $organization->max_members }}
                      </p>
                    </div>

                    <!-- Author -->
                    <div class="flex items-baseline gap-2">
                      <p class="font-medium text-gray-400">Author:</p>
                      <p
                        class="text-lg font-semibold text-gray-500 dark:text-gray-300">
                        {{ $organization->username }}
                      </p>
                    </div>

                    <!-- Created At -->
                    <div class="flex items-baseline gap-2 mb-4">
                      <p class="font-medium text-gray-400">Created At:</p>
                      <p
                        class="text-lg font-semibold text-gray-500 dark:text-gray-300">
                        {{ $organization->created_at->format("Y-m-d H:i:s") }}
                      </p>
                    </div>

                    <!-- Total Subscriptions -->
                    <div>
                      <h3 class="text-lg font-semibold text-blue-500">Total
                        Subscriptions</h3>
                      <p class="text-sm text-gray-500 dark:text-gray-400">
                        {{ $organization->subscriptions->count() }}
                        Subscriptions</p>
                    </div>
                  </div>

                  <!-- Right Section: Description -->
                  <div
                    class="flex flex-col col-start-8 col-end-13 gap-4 p-4 rounded-lg dark:bg-gray-800">
                    <p class="font-medium text-gray-400">Description</p>
                    <p class="text-gray-700 dark:text-gray-300">
                      {{ $organization->description }}</p>
                  </div>
                </div>

                <!-- Button to Show All Subscriptions -->
                <x-buttons.button
                  class="border border-b-gray-600 absolute bottom-2 px-5 py-3 ml-auto text-sm text-white transform -translate-x-1/2 bg-blue-800 left-[48%] hover:bg-blue-700 focus:ring-4 focus:ring-blue-500 dark:bg-gray-900 dark:hover:bg-gray-800 focus:outline-none dark:focus:ring-gray-700"
                  type="a" :href='route(
                      "subscriptions.index",
                      $organization->organizationId,
                  )'>
                  Show All Subscriptions
                </x-buttons.button>

              </div>
            </div>
          </div>
        </div>
      </main>
    </div>

  </x-layouts.container>
</x-layouts.layout>
