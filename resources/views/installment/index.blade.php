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
              <x-buttons.bread-crumb class="mb-10" />

              <h1
                class="text-xl font-semibold text-gray-900 -translate-y-3 sm:text-2xl dark:text-white">
                Installment Name: <span
                  class="text-5xl font-semibold text-gray-500">{{ $details->subscriptionName }}</span>
              </h1>
            </div>
            <div
              class="flex items-center justify-between sm:flex md:divide-x md:divide-gray-100 dark:divide-gray-700">

              <x-search.search-result />

            </div>
          </div>
        </div>
        <div class="flex">
          {{-- left --}}
          <div class="flex flex-col justify-center gap-4 ml-4">
            <h2 class="mb-3 text-4xl font-semibold text-gray-200">
              Installment
              Details</h2>
            <p
              class="text-lg font-semibold text-gray-700 dark:text-gray-300">
              Organization Name:
              <span class="font-normal text-gray-600 dark:text-gray-400">
                {{ $details->organizationName }}
              </span>
            </p>

            <p
              class="text-lg font-semibold text-gray-700 dark:text-gray-300">
              Subscription Type:
              <span class="font-normal text-gray-600 dark:text-gray-400">
                {{ $details->subscriptionType }}
              </span>
            </p>

            <p
              class="text-lg font-semibold text-gray-700 dark:text-gray-300">
              Installment Pay Amount:
              <span class="font-normal text-gray-600 dark:text-gray-400">
                {{ $details->installmentPerAmount }}
              </span>
            </p>

            <p
              class="text-lg font-semibold text-gray-700 dark:text-gray-300">
              Installment Penalty Amount:
              <span class="font-normal text-gray-600 dark:text-gray-400">
                {{ $details->installmentPenaltyAmount }}
              </span>
            </p>
          </div>

          {{-- right --}}
          <div class="ml-auto mr-3 overflow-x-auto w-96">
            <div class="inline-block min-w-full align-middle">
              <div class="shadow h-80">
                <table
                  class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                  <thead class="sticky top-0 bg-gray-100 dark:bg-gray-700">
                    <tr>
                      <th class="p-4" scope="col">
                        <x-forms.checkbox type="all" />
                      </th>
                      <th
                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400"
                        scope="col">
                        Index
                      </th>
                      <th
                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400"
                        scope="col">
                        Due Date
                      </th>
                    </tr>
                  </thead>
                  <tbody
                    class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                    @foreach ($dueDates as $key => $dueDate)
                      <tr
                        class="h-14 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <td class="w-4 p-4">
                          <x-forms.checkbox type="single" />
                        </td>
                        <td
                          class="p-4 text-base font-normal text-gray-500 truncate dark:text-gray-400">
                          {{ $key + 1 }}
                        </td>
                        <td
                          class="p-4 text-base font-normal text-gray-500 truncate dark:text-gray-400">
                          {{ $dueDate->due_date }}
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
        <x-modals.delete-modal formId="delete-organization-form"
          typeIcon="warning-icon" headerTitle="Delete item"
          actionConfirmBtn="Yes, I am sure"
          actionConfirmCancel="No, cancel">Are you sure you want to delete
          this
          organization?</x-modal>

      </main>
    </div>

  </x-layouts.container>
  </x-layputs.layout>
