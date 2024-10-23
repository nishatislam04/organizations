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

              <h1
                class="text-xl font-semibold text-gray-900 -translate-y-3 sm:text-2xl dark:text-white">
                Installment Name: <span
                  class="text-5xl font-semibold text-gray-500">{{ $details->subscriptionName }}</span>
              </h1>
            </div>
            <div
              class="flex items-center justify-between sm:flex md:divide-x md:divide-gray-100 dark:divide-gray-700">

              <x-search.search-result />

              @can("is-member")
                <p class="mt-1 text-sm text-gray-500 ">Today is :
                  {{ date("d-m-Y") }}</p>
              @endcan
            </div>
          </div>
        </div>
        <div class="flex">
          {{-- left --}}
          <div class="flex flex-col justify-center gap-4 ml-4">
            <h2 class="mb-3 text-4xl font-semibold text-gray-200">
              Installment Paying Details</h2>
            <p
              class="text-lg font-semibold text-gray-700 dark:text-gray-300">
              Organization Name:
              <span class="font-normal text-gray-600 dark:text-gray-400">
                {{ $details->organizationName }}
              </span>
            </p>

            <p
              class="text-lg font-semibold text-gray-700 dark:text-gray-300">
              Paying Amount:
              <span class="font-normal text-gray-600 dark:text-gray-400">
                {{ number_format($details->installmentPerAmount) }}
                <x-icon.icon class="inline w-5 h-5" fill="gray"
                  icon="taka" />
              </span>
            </p>

            <p
              class="text-lg font-semibold text-gray-700 dark:text-gray-300">
              Paying Date:
              <span class="font-normal text-gray-600 dark:text-gray-400">
                {{ date("d-M-Y") }}
              </span>
            </p>

            <p
              class="text-lg font-semibold text-gray-700 dark:text-gray-300">
              Paying By:
              <span class="font-normal text-gray-600 dark:text-gray-400">
                null
              </span>
            </p>

          </div>

          {{-- right --}}
          <div class="ml-auto mr-3 overflow-x-auto min-w-32">
            <div
              class="flex items-center justify-center min-w-full align-middle h-80">
              <div class="shadow">
                <x-buttons.button
                  class="flex items-center justify-center px-12 py-5 text-sm text-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                  id="installment-pay-btn"
                  data-sub-id="{{ $details->subscriptionId }}"
                  data-org-id="{{ $details->organizationId }}"
                  data-ins-id="{{ $installmentId }}" type="button">
                  <x-icon.icon class="w-4 h-4 mr-2" fill=""
                    icon="success" />
                  <span class="text-xl">Pay</span>
                </x-buttons.button>
              </div>
            </div>
          </div>


        </div>

        {{-- pay modal --}}
        <x-modals.action-modal name="installment-pay" type="warning"
          method="POST" header="Installment Pay Confirm">
          Are you sure you want to confirm the payment?
        </x-modals.action-modal>

      </main>
    </div>

  </x-layouts.container>
  </x-layputs.layout>
