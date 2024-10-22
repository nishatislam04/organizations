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

              <x-buttons.bread-crumb class="mb-10" :links='[
                  "home" => "dashboard.index",
                  "organizations" => "organizations.index",
                  "organization" => [
                      "route" => "organizations.show",
                      "id" => "$organization->id",
                  ],
                  "subscriptions" => "",
              ]' />


              {{-- <x-buttons.bread-crumb class="mb-10" /> --}}

              <h1
                class="text-xl font-semibold text-gray-900 -translate-y-3 sm:text-2xl dark:text-white">
                All Subscriptions : <span
                  class="text-4xl italic text-gray-600">{{ $organization->name }}</span>
              </h1>
            </div>
            <div
              class="flex items-center justify-between sm:flex md:divide-x md:divide-gray-100 dark:divide-gray-700">

              <x-search.search-result />

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
                      <th class="p-4" scope="col">

                        <x-forms.checkbox type="all" />

                      </th>
                      <th
                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400"
                        scope="col">
                        Name
                      </th>
                      @can("is-admin-or-super")
                        <th
                          class="flex items-center gap-2 p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400"
                          scope="col">
                          ID
                        </th>
                      @endcan

                      <th
                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400"
                        scope="col">
                        Type
                      </th>
                      <th
                        class="flex items-center gap-2 p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400"
                        scope="col">
                        Total
                      </th>
                      <th
                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400"
                        scope="col">
                        Per Amount
                      </th>
                      <th
                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400"
                        scope="col">
                        Penalty amount
                      </th>
                      <th
                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400"
                        scope="col">
                        Start From
                      </th>
                      <th
                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400"
                        scope="col">
                        Complete
                      </th>

                    </tr>
                  </thead>

                  <tbody
                    class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">

                    @foreach ($subscriptions as $subscription)
                      <tr
                        class="h-14 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <td class="w-4 p-4">
                          <x-forms.checkbox type="single" />
                        </td>

                        <td
                          class="p-4 text-base font-medium text-gray-900 capitalize whitespace-nowrap dark:text-white">
                          <a class="hover:underline"
                            href="{{ route("installments.index", $subscription->id) }}">
                            {{ $subscription->name }}</a>
                        </td>
                        @can("is-admin-or-super")
                          <td
                            class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                            <a class="text-base font-semibold text-gray-900 dark:text-white"
                              href="#">{{ $subscription->id }}
                            </a>
                          </td>
                        @endcan

                        <td
                          class="p-4 text-base font-medium text-gray-900 capitalize whitespace-nowrap dark:text-white">
                          {{ $subscription->type }}</td>

                        <td
                          class="max-w-sm p-4 overflow-hidden text-base font-normal text-gray-500 truncate xl:max-w-xs dark:text-gray-400">
                          {{ number_format($subscription->total) }}
                        </td>

                        <td
                          class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                          <span class="flex gap-1 ">
                            {{ number_format($subscription->per_amount) }}
                            <x-icon.icon class="w-5 h-5" fill="gray"
                              icon="taka" />
                          </span>
                        </td>

                        <td
                          class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                          <span class="flex gap-1 ">
                            {{ number_format($subscription->penalty_amount) }}
                            <x-icon.icon class="w-5 h-5" fill="gray"
                              icon="taka" />
                          </span>
                        </td>

                        @php
                          $date = date_create($subscription->start);
                          $date = date_format($date, "M-Y");
                        @endphp
                        <td
                          class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                          {{ $date }}
                        </td>

                        <td
                          class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                          <span class="text-gray-400">No</span>
                        </td>

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
