<x-layouts.layout bodyOverflowHidden="true">

  <x-layouts.container search_route="organizations.index">

    <main class="grid w-full grid-cols-12 gap-6 p-2 grid-rows-12 lg:ml-64">

      {{-- SUPER START --}}
      {{-- Super: top3 installment collection --}}
      @can("is-super")
        <div
          class="col-start-1 col-end-6 row-start-1 row-end-6 px-3 bg-gray-100 rounded-lg shadow-lg">
          <p class="mb-2 text-lg font-semibold text-gray-800">Top3 Installment
            Collection</p>

          <div
            class="max-w-full overflow-auto border border-gray-300 max-h-96">
            <table
              class="w-full text-left bg-white border-collapse rounded-lg shadow table-auto">
              <thead class="text-gray-700 bg-gray-200">
                <tr>
                  <th
                    class="p-3 text-sm font-semibold border-b border-gray-300">
                    Susbs. Name</th>
                  <th
                    class="p-3 text-sm font-semibold border-b border-gray-300">
                    Org. Name</th>
                  <th
                    class="p-3 text-sm font-semibold border-b border-gray-300">
                    Per Price</th>
                  <th
                    class="p-3 text-sm font-semibold border-b border-gray-300">
                    Collected Count</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($superUserData["topInstallmentCollections"] as $topInstallmentCollection)
                  <tr class="hover:bg-gray-100">
                    <td
                      class="p-2 text-sm text-gray-800 border-b border-gray-200">
                      {{ $topInstallmentCollection->name }}</td>
                    <td
                      class="p-2 text-sm text-gray-800 border-b border-gray-200">
                      {{ $topInstallmentCollection->organization_name }}
                    </td>
                    <td
                      class="p-2 text-sm text-gray-800 border-b border-gray-200">
                      {{ $topInstallmentCollection->per_amount }}</td>
                    <td
                      class="p-2 text-sm text-gray-800 border-b border-gray-200">
                      {{ $topInstallmentCollection->subscription_count }}
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

        {{-- super: last 10 installment collection log --}}
        <div
          class="flex flex-col justify-center col-start-1 col-end-10 bg-gray-100 rounded-lg shadow-lg row-start-9 row-end-13">
          <p class="mb-2 text-lg font-semibold text-gray-800">Last10
            Installment Collection Log</p>

          <div
            class="max-w-full overflow-auto border border-gray-300 max-h-80">
            <table
              class="w-full text-left bg-white border-collapse rounded-lg shadow table-auto">
              <thead class="text-gray-700 bg-gray-200">
                <tr>
                  <th
                    class="p-3 text-sm font-semibold border-b border-gray-300">
                    Subs. Name</th>
                  <th
                    class="p-3 text-sm font-semibold border-b border-gray-300">
                    Org. Name</th>
                  <th
                    class="p-3 text-sm font-semibold border-b border-gray-300">
                    Paid</th>
                  <th
                    class="p-3 text-sm font-semibold border-b border-gray-300">
                    Username</th>
                  <th
                    class="p-3 text-sm font-semibold border-b border-gray-300">
                    Pay Date</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($superUserData["lastInstallmentCollections"] as $lastInstallmentCollection)
                  <tr class="hover:bg-gray-100">
                    <td
                      class="p-2 text-sm text-gray-800 border-b border-gray-200">
                      {{ $lastInstallmentCollection->subscription_name }}
                    </td>
                    <td
                      class="p-2 text-sm text-gray-800 border-b border-gray-200">
                      {{ $lastInstallmentCollection->organization_name }}
                    </td>
                    <td
                      class="p-2 text-sm text-gray-800 border-b border-gray-200">
                      {{ $lastInstallmentCollection->subscription_per_amount }}
                    </td>
                    <td
                      class="p-2 text-sm text-gray-800 border-b border-gray-200">
                      {{ $lastInstallmentCollection->username }}</td>
                    <td
                      class="p-2 text-sm text-gray-800 border-b border-gray-200">
                      {{ $lastInstallmentCollection->created_at }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

        {{-- super: latest subscription --}}
        <div
          class="col-start-1 col-end-6 row-start-6 p-1 mt-1 bg-gray-100 row-end-9">
          <p class="mb-1 text-lg font-semibold text-gray-800">Latest
            Subscription</p>

          <div class="overflow-x-auto">
            <table
              class="w-full text-left bg-white border-collapse rounded-lg shadow table-auto">
              <thead class="text-gray-700 bg-gray-200">
                <tr>
                  <th
                    class="p-3 text-sm font-semibold border-b border-gray-300">
                    Name</th>
                  <th
                    class="p-3 text-sm font-semibold border-b border-gray-300">
                    Type</th>
                  <th
                    class="p-3 text-sm font-semibold border-b border-gray-300">
                    Count</th>
                  <th
                    class="p-3 text-sm font-semibold border-b border-gray-300">
                    Amount</th>
                  <th
                    class="p-3 text-sm font-semibold border-b border-gray-300">
                    Start</th>
                </tr>
              </thead>
              <tbody>
                <tr class="hover:bg-gray-100">
                  <td
                    class="p-3 text-sm text-gray-800 border-b border-gray-200">
                    {{ $superUserData["latestSubscription"]->name }}.</td>
                  <td
                    class="p-3 text-sm text-gray-800 border-b border-gray-200">
                    {{ $superUserData["latestSubscription"]->type }}.</td>
                  <td
                    class="p-3 text-sm text-gray-800 border-b border-gray-200">
                    {{ $superUserData["latestSubscription"]->total }}.</td>
                  <td
                    class="p-3 text-sm text-gray-800 border-b border-gray-200">
                    {{ $superUserData["latestSubscription"]->per_amount }}.
                  </td>
                  <td
                    class="p-3 text-sm text-gray-800 border-b border-gray-200">
                    {{ $superUserData["latestSubscription"]->start }}.</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        {{-- super: latest 8 complete subscription --}}
        <div
          class="col-start-6 col-end-10 row-start-1 bg-gray-100 row-end-9">
          <p class="mb-2 text-lg font-semibold text-gray-800">Latest8
            complete subscription</p>

          <div
            class="max-w-full overflow-auto border border-gray-300 rounded-lg max-h-[23rem]">
            <table
              class="w-full text-left bg-white border-collapse rounded-lg shadow table-auto">
              <thead class="text-gray-700 bg-gray-200">
                <tr>
                  <th
                    class="p-3 text-sm font-semibold border-b border-gray-300">
                    Subs. Name</th>
                  <th
                    class="p-3 text-sm font-semibold border-b border-gray-300">
                    Org. Name</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($superUserData["latestCompleteSubscriptions"] as $latest)
                  <tr class="hover:bg-gray-100">
                    <td
                      class="p-3 text-sm text-gray-800 border-b border-gray-200">
                      {{ $latest->name }}.</td>
                    <td
                      class="p-3 text-sm text-gray-800 border-b border-gray-200">
                      {{ $latest->organization->name }}.
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

        {{-- super: show first 15 users joining approval --}}
        <div
          class="h-full min-h-[550px] col-start-10 col-end-13 row-start-1 mt-2 bg-gray-100 rounded-lg shadow-lg row-end-8">
          <p class="mb-2 text-lg font-semibold text-gray-800">Top15 User
            Joining Approval</p>

          <div
            class="h-full min-h-[550px] max-w-full overflow-auto border border-gray-300">
            <table
              class="w-full text-left bg-white border-collapse shadow table-auto">
              <thead class="text-gray-700 bg-gray-200">
                <tr>
                  <th
                    class="p-3 text-sm font-semibold border-b border-gray-300">
                    Name</th>
                  <th
                    class="p-3 text-sm font-semibold border-b border-gray-300">
                    Org. Name</th>

                </tr>
              </thead>
              <tbody>
                @foreach ($superUserData["userJoiningRequests"] as $userJoiningRequest)
                  <tr class="hover:bg-gray-100">
                    <td
                      class="p-3 text-sm text-gray-800 border-b border-gray-200">
                      {{ $userJoiningRequest->username }}.</td>
                    <td
                      class="p-3 text-sm text-gray-800 border-b border-gray-200">
                      {{ $userJoiningRequest->organization->name }}.</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      @endcan
      {{-- SUPER END --}}


      {{-- ADMIN START --}}
      @can("is-admin")
        {{-- listing latest 3 subscription --}}
        <div
          class="hidden col-start-1 col-end-7 row-start-7 bg-gray-400 row-end-12">
          <p>listing latest 3 subscriptions</p>
        </div>

        {{-- show next (upcomig installment details) --}}
        <div
          class="hidden col-start-7 col-end-10 row-start-7 bg-gray-400 row-end-12">
          <p>upcoming installment details</p>
        </div>

        {{-- show top3 non missed installment pay user --}}
        <div
          class="hidden col-start-10 col-end-13 row-start-1 row-end-6 bg-gray-400">
          <p>top3 non-missed installment pay user</p>
        </div>

        {{-- show top5 most missed installment pay user --}}
        <div
          class="hidden col-start-10 col-end-13 row-start-6 bg-gray-400 row-end-12">
          <p>top5 most missed installment pay user</p>
        </div>

        {{-- listing last5 installments : how many paid & how many was supposed to pay  --}}
        <div
          class="hidden col-start-1 col-end-10 row-start-1 row-end-7 bg-gray-400">
          <p>listing last5 installments : how many paid & how many was
            supposed to pay</p>
        </div>
      @endcan
      {{-- ADMN END --}}


      {{-- MEMBER START --}}
      @can("is-member")
        {{-- organization overview --}}
        <div class="col-start-1 col-end-8 row-start-1 bg-gray-400 row-end-8">
          <p>organization overview</p>
        </div>

        {{-- quick pay button for upcoming installment --}}
        <div
          class="col-start-10 col-end-13 bg-gray-400 row-start-10 row-end-13">
          <p>quick pay button for upcoming installment</p>
        </div>

        {{-- show last 3 installment pids status --}}
        <div
          class="col-start-1 col-end-7 bg-gray-400 row-start-8 row-end-13">
          <p>show last 3 installment pids status</p>
        </div>

        {{-- show penalty charges amount & total count of installment payment missed --}}
        <div
          class="col-start-7 col-end-10 bg-gray-400 row-start-10 row-end-13">
          <p>show penalty charges amount & total count of installment payment
            missed</p>
        </div>

        {{-- show all payment history --}}
        <div
          class="col-start-8 col-end-13 row-start-1 bg-gray-400 row-end-10">
          <p>show all payment history</p>
        </div>
      @endcan
      {{-- MEMBER END --}}
    </main>


    </div>
  </x-layouts.container>
</x-layouts.layout>
