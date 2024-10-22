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

              <div>

              </div>
            </div>
            <div
              class="flex items-center justify-between sm:flex md:divide-x md:divide-gray-100 dark:divide-gray-700">

              <x-search.search-result />

              @can("is-member")
                <p class="mt-1 text-sm text-gray-500 ">Today is :
                  {{ date("d-m-Y") }}</p>

                <div
                  class="absolute bottom-0 right-0 flex flex-col justify-between gap-8">

                  <p class="text-2xl text-gray-400 ">
                    Penalty Charges :
                    <span>{{ auth()->user()->penalty_charges }}
                      <x-icon.icon class="inline w-6 h-6 -mt-2 -ml-2"
                        fill="gray" icon="taka" />
                    </span>
                  </p>

                  <x-buttons.button
                    class=" text-white ml-auto bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800"
                    type="a" :href='route("installments.penaltyPayView")'>
                    Pay Penalty
                  </x-buttons.button>
                </div>
              @endcan
            </div>

          </div>
        </div>
        <div class="flex">
          {{-- left --}}
          <div class="flex flex-col justify-center gap-4 ml-4">
            <h2 class="mb-3 text-4xl font-semibold text-gray-200">
              Installment Details</h2>
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
                {{ number_format($details->installmentPerAmount) }}
                <x-icon.icon class="inline w-5 h-5" fill="gray"
                  icon="taka" />
              </span>
            </p>

            <p
              class="text-lg font-semibold text-gray-700 dark:text-gray-300">
              Installment Penalty Amount:
              <span class="font-normal text-gray-600 dark:text-gray-400">
                {{ number_format($details->installmentPenaltyAmount) }}
                <x-icon.icon class="inline w-5 h-5" fill="gray"
                  icon="taka" />
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
                      @if (auth()->user()->role !== "super")
                        <th
                          class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400"
                          scope="col">
                          Paid
                        </th>
                      @endif
                      <th
                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400"
                        scope="col">
                        Due Date
                      </th>
                      @if (auth()->user()->role !== "super")
                        <th
                          class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400"
                          scope="col">
                          Pay
                        </th>
                      @endif
                    </tr>
                  </thead>

                  <tbody
                    class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                    @foreach ($installments as $key => $installment)
                      @php
                        $isPaid = $installment->collected->count() > 0;
                        $dueDate = \Carbon\Carbon::createFromFormat(
                            "d-m-Y",
                            $installment->due_date,
                        );
                        $currentDate = \Carbon\Carbon::now();

                        // Check if the current date matches the due date
                        $isSameDay = $currentDate->isSameDay($dueDate);

                        // Check if the due date is in the past (including any previous months of the current year, but not today)
                        $isDuePassed =
                            !$isSameDay &&
                            $dueDate->isBefore(
                                $currentDate->startOfMonth(),
                            );

                        // Ensure that we're considering dates that are not just in the past year, but in the past months of the current year
                        if ($dueDate->year < $currentDate->year) {
                            $isDuePassed = true; // If the due date is in a previous year, mark it as passed
                        }
                      @endphp


                      <tr @class([
                          "h-14 hover:bg-gray-100 dark:hover:bg-gray-700",
                          "bg-green-50 dark:bg-green-900" =>
                              $isPaid &&
                              auth()->user()->role !== "super" &&
                              auth()->user()->role !== "admin",
                          "bg-red-50 dark:bg-red-900" =>
                              $isDuePassed &&
                              auth()->user()->role !== "super" &&
                              auth()->user()->role !== "admin",
                      ])>
                        <td
                          class="p-4 text-base font-normal text-gray-500 truncate dark:text-gray-400">
                          {{ $key + 1 }}
                        </td>

                        @if (auth()->user()->role !== "super")
                          <td
                            class="p-4 text-base font-normal text-gray-500 truncate dark:text-gray-400">
                            {{ $isPaid ? "Paid" : "Unpaid" }}
                          </td>
                        @endif

                        <td
                          class="p-4 text-base font-normal text-gray-500 truncate dark:text-gray-400">
                          {{ $installment->due_date }}
                        </td>

                        <!-- Action Button (for non-super users) -->
                        @if (auth()->user()->role !== "super")
                          <td
                            class="p-4 text-base font-normal text-gray-500 truncate dark:text-gray-400">
                            @if ($isPaid)
                              <button
                                class="px-3 py-2 text-sm font-medium text-gray-700 bg-green-100 rounded cursor-not-allowed dark:bg-green-800 dark:text-green-200">
                                Already Paid
                              </button>
                            @elseif ($isDuePassed)
                              <button
                                class="px-3 py-2 text-sm font-medium text-gray-700 bg-red-100 rounded cursor-not-allowed dark:bg-red-800 dark:text-red-200">
                                Due Date Passed
                              </button>
                            @else
                              <x-buttons.button
                                class="inline-flex items-center px-3 py-2 text-sm text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                                id="installment-pay-btn" type="a"
                                href='{{ route("installments.payView", $installment->id) }}'>
                                <x-icon.icon class="w-4 h-4 mr-2"
                                  fill="" icon="success" />
                                Pay
                              </x-buttons.button>
                            @endif

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

      </main>
    </div>

  </x-layouts.container>
  </x-layputs.layout>
