<x-layouts.layout>

  <x-layouts.container search_route="organizations.index">

    <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">
      <main>
        <div
          class="items-center justify-between block p-4 bg-white border-b border-gray-200 sm:flex dark:bg-gray-800 dark:border-gray-700">
          <div class="relative w-full mb-2 h-28">

            <x-modals.flash />

            <div class="">
              <x-buttons.bread-crumb class="mb-10" />

              <h1 class="text-xl font-semibold text-gray-900 -translate-y-3 sm:text-2xl dark:text-white">
                Organization</h1>
            </div>
            <div class="flex items-center justify-between sm:flex md:divide-x md:divide-gray-100 dark:divide-gray-700">

              <x-search.search-result />

              <x-buttons.button :href="route('subscriptions.create', $organization->id)" type="a"
                class="absolute right-0 bottom-0 text-white ml-auto bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                Create a new Suscription
              </x-buttons.button>

            </div>
          </div>
        </div>

        <div class="flex flex-col">
          <div class="overflow-x-auto">
            <div class="inline-block min-w-full align-middle">
              <div class="shadow h-80">
                <li>{{ $organization->id }}</li>
              </div>
            </div>
          </div>
        </div>


        {{-- delete view --}}
        <x-modals.delete-modal headerTitle="Delete item" typeIcon="warning-icon" formId="delete-organization-form"
          actionConfirmBtn="Yes, I am sure" actionConfirmCancel="No, cancel">Are you sure you want to delete this
          organization?</x-modal>
      </main>
    </div>

  </x-layouts.container>
  </x-layputs.layout>
