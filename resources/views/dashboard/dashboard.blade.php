<x-layouts.layout bodyOverflowHidden="true">

  <x-layouts.container search_route="organizations.index">

    <main class="grid w-full grid-cols-12 gap-6 p-2 grid-rows-12 lg:ml-64">

      {{-- Super: top3 installment collection --}}
      <div class="col-start-1 col-end-6 row-start-1 row-end-6 bg-gray-400">
        <p>top3 installment collection</p>
      </div>

      {{-- super: top10 users with highest penalty --}}
      <div class="col-start-6 col-end-10 row-start-1 bg-gray-400 row-end-9">
        <p>top10 installment collection</p>
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
        <p>Top10 user joining</p>
      </div>
    </main>


    </div>
  </x-layouts.container>
</x-layouts.layout>
