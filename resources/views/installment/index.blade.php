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
              @can("is-super-or-admin")
                <x-buttons.bread-crumb class="mb-10" :links='[
                    "home" => "dashboard.index",
                    "organizations" => "organizations.index",
                    "organizaion" => [
                        "route" => "organizations.show",
                        "id" => $details->organizationId,
                    ],
                    "subscriptions" => [
                        "route" => "subscriptions.index",
                        "id" => "$details->organizationId",
                    ],
                    "installment" => "",
                ]' />
              @endcan
              @can("is-member")
                <x-buttons.bread-crumb class="mb-10" :links='[
                    "home" => "dashboard.index",
                    "organizaion" => [
                        "route" => "organizations.show",
                        "id" => $details->organizationId,
                    ],
                    "subscriptions" => [
                        "route" => "subscriptions.index",
                        "id" => "$details->organizationId",
                    ],
                    "installment" => "",
                ]' />
              @endcan

              {{-- <x-buttons.bread-crumb class="mb-10" /> --}}

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
          <div class="ml-auto mr-3 overflow-x-auto">
            <div class="inline-block min-w-full align-middle">
              <div class="shadow h-80">
                <table
                  class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                  <thead class="sticky top-0 bg-gray-100 dark:bg-gray-700">
                    <tr>

                      <th
                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400"
                        scope="col">
                        Index
                      </th>
                      <th
                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400"
                        scope="col">
                        Paid
                      </th>
                      <th
                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400"
                        scope="col">
                        Due Date
                      </th>
                      <th
                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400"
                        scope="col">
                        Pay
                      </th>
                    </tr>
                  </thead>
                  @php
                    $currentMonth = date("n");
                    $currentDay = date("j");
                    $currentYear = date("Y");
                  @endphp
                  <tbody
                    class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                    @foreach ($dueDates as $key => $dueDate)
                      <tr
                        class="h-14 hover:bg-gray-100 dark:hover:bg-gray-700">

                        <td
                          class="p-4 text-base font-normal text-gray-500 truncate dark:text-gray-400">
                          {{ $key + 1 }}
                        </td>
                        <td
                          class="p-4 text-base font-normal text-gray-500 truncate dark:text-gray-400">
                          unpaid
                        </td>
                        <td
                          class="p-4 text-base font-normal text-gray-500 truncate dark:text-gray-400">
                          {{ $dueDate->due_date }}
                        </td>
                        @php
                          $date = explode("-", $dueDate->due_date);
                          [$dueDay, $dueMonth, $dueYear] = $date;
                        @endphp
                        @if ($dueYear <= $currentYear && $dueMonth <= $currentMonth)
                          <td
                            class="p-4 text-base font-normal text-gray-500 truncate dark:text-gray-400">
                            <x-buttons.button
                              class="inline-flex items-center px-3 py-2 text-sm text-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                              id="installment-pay-btn" type="a"
                              href='{{ route("installments.payView", $details->subscriptionId) }}'>
                              <img class="w-4 h-4 mr-2"
                                src="{{ Vite::asset("resources/icons/success-icon.svg") }}"
                                alt="">Pay
                            </x-buttons.button>
                          </td>
                        @else
                          <td
                            class="p-4 text-base font-normal text-gray-500 truncate dark:text-gray-400">
                            <button>not available</button>
                          </td>
                        @endif

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
