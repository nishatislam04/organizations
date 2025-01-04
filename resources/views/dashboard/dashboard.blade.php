<x-layouts.layout bodyOverflowHidden="true">

  <x-layouts.container search_route="organizations.index">

    <main class="grid w-full grid-cols-12 gap-6 p-2 grid-rows-12 lg:ml-64">

      {{-- SUPER START --}}
      {{-- Super: top3 installment collection --}}
      @can('is-super')
        <div
          class="col-start-1 col-end-6 row-start-1 row-end-6 px-3 bg-gray-100 rounded-lg shadow-lg">
          <p class="mb-2 text-lg font-semibold text-gray-800">Top3 Installment
            Collection</p>

          <div class="max-w-full overflow-auto border border-gray-300 max-h-96">
            <table
              class="w-full text-left bg-white border-collapse rounded-lg shadow table-auto">
              <thead class="text-gray-700 bg-gray-200">
                <tr>
                  <th class="p-3 text-sm font-semibold border-b border-gray-300">Subs.
                    Name</th>
                  <th class="p-3 text-sm font-semibold border-b border-gray-300">Org.
                    Name</th>
                  <th class="p-3 text-sm font-semibold border-b border-gray-300">Per
                    Price</th>
                  <th class="p-3 text-sm font-semibold border-b border-gray-300">
                    Collected Count</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($superUserData["topInstallmentCollections"] as $topInstallmentCollection)
                  <tr class="hover:bg-gray-100">
                    <td class="p-2 text-sm text-gray-800 border-b border-gray-200">
                      {{ $topInstallmentCollection->name }}
                    </td>
                    <td class="p-2 text-sm text-gray-800 border-b border-gray-200">
                      {{ $topInstallmentCollection->organization_name }}
                    </td>
                    <td class="p-2 text-sm text-gray-800 border-b border-gray-200">
                      {{ $topInstallmentCollection->per_amount }}
                    </td>
                    <td class="p-2 text-sm text-gray-800 border-b border-gray-200">
                      {{ $topInstallmentCollection->subscription_count }}
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td
                      class="p-3 text-sm italic font-semibold text-center text-gray-400 border-b border-gray-200 bg-gray-50"
                      colspan="4">
                      No Data Found
                    </td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>

        {{-- super: last 10 installment collection log --}}
        <div
          class="flex flex-col justify-center col-start-1 col-end-10 bg-gray-100 rounded-lg shadow-lg row-start-9 row-end-13">
          <p class="mb-2 text-lg font-semibold text-gray-800">Last10
            Installment Collection Log</p>

          <div class="max-w-full overflow-auto border border-gray-300 max-h-80">
            <table
              class="w-full text-left bg-white border-collapse rounded-lg shadow table-auto">
              <thead class="text-gray-700 bg-gray-200">
                <tr>
                  <th class="p-3 text-sm font-semibold border-b border-gray-300">
                    Subs. Name</th>
                  <th class="p-3 text-sm font-semibold border-b border-gray-300">
                    Org. Name</th>
                  <th class="p-3 text-sm font-semibold border-b border-gray-300">
                    Paid</th>
                  <th class="p-3 text-sm font-semibold border-b border-gray-300">
                    Username</th>
                  <th class="p-3 text-sm font-semibold border-b border-gray-300">
                    Pay Date</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($superUserData['lastInstallmentCollections'] as $lastInstallmentCollection)
                  <tr class="hover:bg-gray-100">
                    <td class="p-2 text-sm text-gray-800 border-b border-gray-200">
                      {{ $lastInstallmentCollection->subscription_name }}
                    </td>
                    <td class="p-2 text-sm text-gray-800 border-b border-gray-200">
                      {{ $lastInstallmentCollection->organization_name }}
                    </td>
                    <td class="p-2 text-sm text-gray-800 border-b border-gray-200">
                      {{ $lastInstallmentCollection->subscription_per_amount }}
                    </td>
                    <td class="p-2 text-sm text-gray-800 border-b border-gray-200">
                      {{ $lastInstallmentCollection->username }}</td>
                    <td class="p-2 text-sm text-gray-800 border-b border-gray-200">
                      {{ $lastInstallmentCollection->created_at }}</td>
                  </tr>
                @empty
                  <tr>
                    <td
                      class="p-3 text-sm italic font-semibold text-center text-gray-400 border-b border-gray-200 bg-gray-50"
                      colspan="4">
                      No Data Found
                    </td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>

        {{-- super: latest subscription --}}
        <div class="col-start-1 col-end-6 row-start-6 p-1 mt-1 bg-gray-100 row-end-9">
          <p class="mb-1 text-lg font-semibold text-gray-800">Latest
            Subscription</p>

          <div class="overflow-x-auto">
            <table
              class="w-full text-left bg-white border-collapse rounded-lg shadow table-auto">
              <thead class="text-gray-700 bg-gray-200">
                <tr>
                  <th class="p-3 text-sm font-semibold border-b border-gray-300">
                    Name</th>
                  <th class="p-3 text-sm font-semibold border-b border-gray-300">
                    Type</th>
                  <th class="p-3 text-sm font-semibold border-b border-gray-300">
                    Count</th>
                  <th class="p-3 text-sm font-semibold border-b border-gray-300">
                    Amount</th>
                  <th class="p-3 text-sm font-semibold border-b border-gray-300">
                    Start</th>
                </tr>
              </thead>
              <tbody>
                <tr class="hover:bg-gray-100">
                  <td class="p-3 text-sm text-gray-800 border-b border-gray-200">
                    {{ $superUserData['latestSubscription']->name }}.</td>
                  <td class="p-3 text-sm text-gray-800 border-b border-gray-200">
                    {{ $superUserData['latestSubscription']->type }}.</td>
                  <td class="p-3 text-sm text-gray-800 border-b border-gray-200">
                    {{ $superUserData['latestSubscription']->total }}.</td>
                  <td class="p-3 text-sm text-gray-800 border-b border-gray-200">
                    {{ $superUserData['latestSubscription']->per_amount }}.
                  </td>
                  <td class="p-3 text-sm text-gray-800 border-b border-gray-200">
                    {{ $superUserData['latestSubscription']->start }}.</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        {{-- super: latest 10 complete subscription --}}
        <div class="col-start-6 col-end-10 row-start-1 bg-gray-100 row-end-9">
          <p class="mb-2 text-lg font-semibold text-gray-800">Latest10
            complete subscription</p>
          <div
            class="max-w-full overflow-auto border border-gray-300 rounded-lg max-h-[23rem]">
            <table
              class="w-full text-left bg-white border-collapse rounded-lg shadow table-auto">
              <thead class="text-gray-700 bg-gray-200">
                <tr>
                  <th class="p-3 text-sm font-semibold border-b border-gray-300">
                    Subs. Name</th>
                  <th class="p-3 text-sm font-semibold border-b border-gray-300">
                    Org. Name</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($superUserData['latestCompleteSubscriptions'] as $latest)
                  <tr class="hover:bg-gray-100">
                    <td class="p-3 text-sm text-gray-800 border-b border-gray-200">
                      {{ $latest->name }}.</td>
                    <td class="p-3 text-sm text-gray-800 border-b border-gray-200">
                      {{ $latest->organization->name }}.
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td
                      class="p-3 text-sm italic font-semibold text-center text-gray-400 border-b border-gray-200 bg-gray-50"
                      colspan="4">
                      No Data Found
                    </td>
                  </tr>
                @endforelse
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
            <table class="w-full text-left bg-white border-collapse shadow table-auto">
              <thead class="text-gray-700 bg-gray-200">
                <tr>
                  <th class="p-3 text-sm font-semibold border-b border-gray-300">
                    Name</th>
                  <th class="p-3 text-sm font-semibold border-b border-gray-300">
                    Org. Name</th>

                </tr>
              </thead>
              <tbody>
                @forelse ($superUserData['userJoiningRequests'] as $userJoiningRequest)
                  <tr class="hover:bg-gray-100">
                    <td class="p-3 text-sm text-gray-800 border-b border-gray-200">
                      {{ $userJoiningRequest->username }}.</td>
                    <td class="p-3 text-sm text-gray-800 border-b border-gray-200">
                      {{ $userJoiningRequest->organization->name }}.</td>
                  </tr>
                @empty
                  <tr>
                    <td
                      class="p-3 text-sm italic font-semibold text-center text-gray-400 border-b border-gray-200 bg-gray-50"
                      colspan="4">
                      No Data Found
                    </td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      @endcan
      {{-- SUPER END --}}

      {{-- ADMIN START --}}
      @can('is-admin')
        {{-- listing latest 3 subscription --}}
        <div
          class="col-start-1 col-end-7 row-start-7 bg-gray-100 rounded-lg shadow-md row-end-12">
          <p class="mb-4 text-xl font-bold text-gray-700">Last5 Installment
            Pay</p>

          <div class="overflow-auto border border-gray-300 rounded-lg max-h-[12rem]">
            <table class="min-w-full text-left bg-white rounded-lg shadow-sm ">
              <thead class="text-gray-700 bg-gray-100">
                <tr>
                  <th
                    class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-600 uppercase border-b border-gray-300">
                    Name</th>
                  <th
                    class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-600 uppercase border-b border-gray-300">
                    Subs. Name</th>
                  <th
                    class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-600 uppercase border-b border-gray-300">
                    Pay Amount</th>
                  <th
                    class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-600 uppercase border-b border-gray-300">
                    Paid Date</th>
                </tr>
              </thead>

              <tbody>
                @forelse ($adminUserData['lastInstallmentCollections'] as $lastInstallmentCollection)
                  <tr class="transition duration-150 ease-in-out hover:bg-gray-50">
                    <td
                      class="px-4 py-2 text-sm text-gray-800 border-b border-gray-200">
                      {{ $lastInstallmentCollection->user->username }}</td>
                    <td
                      class="px-4 py-2 text-sm text-gray-800 border-b border-gray-200">
                      {{ $lastInstallmentCollection->subscription->name }}
                    </td>
                    <td
                      class="px-4 py-2 text-sm text-gray-800 border-b border-gray-200">
                      {{ $lastInstallmentCollection->subscription->per_amount }}
                    </td>
                    <td
                      class="px-4 py-2 text-sm text-gray-800 border-b border-gray-200">
                      {{ $lastInstallmentCollection->created_at }}</td>
                  </tr>
                @empty
                  <tr>
                    <td
                      class="p-3 text-sm italic font-semibold text-center text-gray-400 border-b border-gray-200 bg-gray-50"
                      colspan="4">
                      No Data Found
                    </td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>

        {{-- overview --}}
        <div
          class="col-start-7 col-end-10 row-start-7 p-4 bg-white rounded-lg shadow-lg row-end-12">
          <p class="mb-4 text-xl font-bold text-gray-700">Organization
            Overview</p>

          <div class="space-y-2">
            <div class="flex items-center justify-between p-3 rounded-md bg-blue-50">
              <p class="font-medium text-gray-600">Total Members</p>
              <p class="text-xl font-semibold text-blue-600">
                {{ $adminUserData['overview']->total_members }}</p>
            </div>
            <div class="flex items-center justify-between p-3 rounded-md bg-green-50">
              <p class="font-medium text-gray-600">Total Subscriptions</p>
              <p class="text-xl font-semibold text-green-600">
                {{ $adminUserData['overview']->total_subscriptions }}</p>
            </div>
            <div
              class="flex items-center justify-between p-3 rounded-md bg-yellow-50">
              <p class="font-medium text-gray-600">Total Installments</p>
              <p class="text-xl font-semibold text-yellow-600">
                {{ $adminUserData['overview']->total_installments }}</p>
            </div>
          </div>
        </div>

        {{-- show top3 non missed installment pay user --}}
        <div
          class="col-start-10 col-end-13 row-start-1 row-end-6 p-6 bg-white border border-gray-300 rounded-lg shadow-md">
          <p class="mb-2 text-2xl font-semibold text-gray-700">Organization
            Active Status</p>

          <p class="mt-10 text-xl font-bold text-gray-800">
            Created on:
            <span
              class="text-gray-600">{{ $adminUserData['organizationActiveSince']->created_at->format('F, d, Y') }}</span>
          </p>

          <p class="mt-4 text-xl font-bold text-gray-800">
            Active for:
            <span
              class="text-green-600">{{ round($adminUserData['organizationActiveSince']->created_at->diffInDays(today())) }}
              days</span>
          </p>
        </div>

        {{-- show top5 most penalty charged users --}}
        <div
          class="col-start-10 col-end-13 row-start-6 p-4 bg-gray-100 rounded-lg shadow-md row-end-12">
          <p class="mb-4 text-lg font-bold text-gray-700">Most Penalty
            Charged Users</p>

          <div class="overflow-auto border border-gray-300 rounded-lg max-h-80">
            <table
              class="min-w-full text-left bg-white border-collapse shadow-sm table-auto">
              <thead class="text-gray-700 bg-gray-200">
                <tr>
                  <th
                    class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-600 uppercase border-b border-gray-300">
                    Name</th>
                  <th
                    class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-600 uppercase border-b border-gray-300">
                    Charged</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($adminUserData['mostPenaltyChargedUsers'] as $user)
                  <tr class="hover:bg-gray-100">
                    <td
                      class="px-4 py-2 text-sm text-gray-800 border-b border-gray-200">
                      {{ $user->username }}</td>
                    <td
                      class="px-4 py-2 text-sm text-gray-800 border-b border-gray-200">
                      {{ $user->penalty_charges }}</td>
                  </tr>
                @empty
                  <tr>
                    <td
                      class="p-3 text-sm italic font-semibold text-center text-gray-400 border-b border-gray-200 bg-gray-50"
                      colspan="4">
                      No Data Found
                    </td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>

        {{-- listing Top5 Subscriptions Overview  --}}
        <div
          class="col-start-1 col-end-10 row-start-1 row-end-7 p-1 px-3 rounded-lg shadow-lg bg-gray-50">
          <p class="mb-2 text-2xl font-bold text-gray-800">Top 5
            Subscriptions Overview</p>

          <div class="overflow-auto border border-gray-300 rounded-lg max-h-96">
            <table
              class="min-w-full text-left bg-white rounded-lg shadow-sm h-[15rem]">
              <thead class="text-gray-700 bg-gray-100">
                <tr>
                  <th
                    class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-600 uppercase border-b border-gray-300">
                    Name</th>
                  <th
                    class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-600 uppercase border-b border-gray-300">
                    Type</th>
                  <th
                    class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-600 uppercase border-b border-gray-300">
                    Pay Per Amount</th>
                  <th
                    class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-600 uppercase border-b border-gray-300">
                    Penalty Amount</th>
                  <th
                    class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-600 uppercase border-b border-gray-300">
                    Start</th>
                  <th
                    class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-600 uppercase border-b border-gray-300">
                    End</th>
                </tr>
              </thead>

              <!-- Table Body -->
              <tbody>
                @forelse ($adminUserData['topSubscriptions'] as $topSubscription)
                  <tr class="transition duration-150 ease-in-out hover:bg-gray-50">
                    <td
                      class="px-4 py-2 text-sm text-gray-800 border-b border-gray-200">
                      {{ $topSubscription->name }}</td>
                    <td
                      class="px-4 py-2 text-sm text-gray-800 border-b border-gray-200">
                      {{ $topSubscription->type }}</td>
                    <td
                      class="px-4 py-2 text-sm text-gray-800 border-b border-gray-200">
                      {{ $topSubscription->per_amount }}</td>
                    <td
                      class="px-4 py-2 text-sm text-gray-800 border-b border-gray-200">
                      {{ $topSubscription->penalty_amount }}</td>
                    <td
                      class="px-4 py-2 text-sm text-gray-800 border-b border-gray-200">
                      {{ $topSubscription->start }}</td>
                    <td
                      class="px-4 py-2 text-sm text-gray-800 border-b border-gray-200">
                      {{ $topSubscription->end }}</td>
                  </tr>
                @empty
                  <tr>
                    <td
                      class="p-3 text-sm italic font-semibold text-center text-gray-400 border-b border-gray-200 bg-gray-50"
                      colspan="4">
                      No Data Found
                    </td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      @endcan
      {{-- ADMN END --}}

      {{-- MEMBER START --}}
      @can('is-member')
        {{-- organization overview --}}
        @if ($memberUserData['user']->status === 'pending')
          <p
            class="col-span-12 p-6 mt-10 text-2xl font-medium text-center text-gray-400 bg-gray-100 rounded-lg ">
            Your joining request is still being processed. Please wait some time.
          </p>
        @else
          <div
            class="col-start-1 col-end-8 row-start-1 px-8 pt-8 rounded-lg shadow-md row-end-8 bg-gradient-to-r from-gray-100 to-gray-50">
            <div class="space-y-5 text-left">
              <p
                class="mb-2 text-4xl font-bold tracking-wide text-left text-gray-700">
                Organization Name</p>
              <p class="mt-4 text-6xl font-semibold text-indigo-700">
                {{ $memberUserData['organization']->name }}</p>
            </div>
          </div>

          {{-- Go To susbcription page --}}
          <div
            class="flex items-center justify-center col-start-10 col-end-13 p-6 rounded-lg shadow-md row-start-10 row-end-13 bg-gray-50">
            <a class="px-5 py-2 text-lg font-medium text-gray-700 transition-colors duration-200 bg-gray-200 rounded-md shadow-md hover:bg-gray-300 hover:text-gray-800"
              href="{{ 'http://nio.com/subscriptions/' . $memberUserData['organization']->id }}"
              style="text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);">
              Go to Subscription Page
            </a>
          </div>

          {{-- top5 susbscription --}}
          <div
            class="col-start-1 col-end-7 bg-gray-100 rounded-lg shadow-md row-start-8 row-end-13">
            <p class="mb-2 text-2xl font-semibold text-gray-700">Top5
              Subscriptions</p>

            <div
              class="overflow-auto border border-gray-300 rounded-lg max-h-[12rem]">
              <table class="min-w-full text-left bg-white rounded-lg shadow-sm ">
                <thead class="text-gray-700 bg-gray-100">
                  <tr>
                    <th
                      class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-600 uppercase border-b border-gray-300">
                      Name</th>
                    <th
                      class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-600 uppercase border-b border-gray-300">
                      Type</th>
                    <th
                      class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-600 uppercase border-b border-gray-300">
                      Pay Amount</th>
                    <th
                      class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-600 uppercase border-b border-gray-300">
                      penalty Amount</th>
                  </tr>
                </thead>

                <tbody>
                  @forelse ($memberUserData['topSubscriptions'] as $topSubscription)
                    <tr class="transition duration-150 ease-in-out hover:bg-gray-50">
                      <td
                        class="px-4 py-2 text-sm text-gray-800 border-b border-gray-200">
                        {{ $topSubscription->name }}</td>
                      <td
                        class="px-4 py-2 text-sm text-gray-800 border-b border-gray-200">
                        {{ $topSubscription->type }}
                      </td>
                      <td
                        class="px-4 py-2 text-sm text-gray-800 border-b border-gray-200">
                        {{ $topSubscription->per_amount }}
                      </td>
                      <td
                        class="px-4 py-2 text-sm text-gray-800 border-b border-gray-200">
                        {{ $topSubscription->penalty_amount }}</td>
                    </tr>
                  @empty
                    <tr>
                      <td
                        class="p-3 text-sm italic font-semibold text-center text-gray-400 border-b border-gray-200 bg-gray-50"
                        colspan="4">
                        No Data Found
                      </td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>

          {{-- show penalty charges amount  --}}
          <div
            class="col-start-7 col-end-10 p-6 border-l-4 border-red-600 rounded-lg shadow-md row-start-10 row-end-13 bg-red-50">
            <p class="mb-2 text-3xl font-bold text-red-700">Penalty Amount</p>
            <p
              class="flex items-center pt-2 space-x-1 text-4xl font-semibold text-red-800">
              <span class="text-4xl">৳</span>
              <span>{{ auth()->user()->penalty_charges }}</span>
            </p>
          </div>

          {{-- show all payment history --}}
          <div
            class="col-start-8 col-end-13 row-start-1 px-3 bg-gray-100 rounded-lg shadow-lg row-end-10">
            <p class="mb-2 text-2xl font-semibold text-gray-700">All Payment
              History</p>

            <div
              class="overflow-auto border border-gray-300 rounded-lg max-h-[26rem] shadow-md">
              <table class="min-w-full text-left bg-white rounded-lg shadow-sm">
                <thead class="text-gray-700 bg-gray-200">
                  <tr>
                    <th
                      class="px-6 py-3 text-xs font-semibold tracking-wide text-gray-600 uppercase border-b border-gray-300">
                      Subscription Name
                    </th>
                    <th
                      class="px-6 py-3 text-xs font-semibold tracking-wide text-gray-600 uppercase border-b border-gray-300">
                      Payment Amount
                    </th>
                    <th
                      class="px-6 py-3 text-xs font-semibold tracking-wide text-gray-600 uppercase border-b border-gray-300">
                      Payment Date
                    </th>
                  </tr>
                </thead>

                <tbody>
                  @forelse ($memberUserData['allPaymentHistories'] as $allPaymentHistory)
                    <tr class="transition duration-200 ease-in-out hover:bg-gray-100">
                      <td
                        class="px-6 py-3 text-sm text-gray-800 border-b border-gray-200">
                        {{ $allPaymentHistory->subscription->name }}
                      </td>
                      <td
                        class="px-6 py-3 text-sm font-semibold text-green-600 border-b border-gray-200">
                        ৳{{ number_format($allPaymentHistory->subscription->per_amount, 2) }}
                      </td>
                      <td
                        class="px-6 py-3 text-sm text-gray-800 border-b border-gray-200">
                        {{ $allPaymentHistory->created_at->format('d-m-Y') }}
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td
                        class="p-3 text-sm italic font-semibold text-center text-gray-400 border-b border-gray-200 bg-gray-50"
                        colspan="4">
                        No Data Found
                      </td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        @endif

      @endcan
      {{-- MEMBER END --}}
    </main>
    </div>
  </x-layouts.container>
</x-layouts.layout>
