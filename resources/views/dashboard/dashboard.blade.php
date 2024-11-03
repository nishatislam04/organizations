<x-layouts.layout bodyOverflowHidden="true">

  <x-layouts.container search_route="organizations.index">

    <main class="grid w-full grid-cols-12 gap-6 p-2 grid-rows-12 lg:ml-64">

      {{-- SUPER START --}}
      {{-- Super: top3 installment collection --}}
      @can("is-super")
        <div class="col-start-1 col-end-6 row-start-1 row-end-6 bg-gray-400 ">
          <p>top3 installment collection</p>
        </div>

        {{-- super: top10 users with highest penalty --}}
        <div class="col-start-6 col-end-10 row-start-1 bg-gray-400 row-end-9">
          <p>last10 installment collection log</p>
        </div>

        {{-- super: latest subscription --}}
        <div class="col-start-1 col-end-6 row-start-6 bg-gray-400 row-end-9">
          <p>latest subscription</p>
        </div>

        {{-- super: latest 3 complete subscription --}}
        <div
          class="col-start-1 col-end-10 bg-gray-400 row-start-9 row-end-13">
          <p>Latest 3 complete subscription</p>
        </div>

        {{-- super: show first 10 users joining approval --}}
        <div
          class="col-start-10 col-end-13 row-start-1 bg-gray-400 row-end-10">
          <p>Top15 user joining</p>
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
