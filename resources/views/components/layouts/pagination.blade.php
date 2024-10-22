@props(["paginator"])

@if (
    $paginator instanceof \Illuminate\Contracts\Pagination\Paginator &&
        $paginator->hasPages())
  <div
    class="sticky bottom-0 right-0 items-center w-full p-4 bg-white border-t border-gray-200 sm:flex sm:justify-center dark:bg-gray-800 dark:border-gray-700">

    <div class="flex items-center space-x-3">

      {{-- Previous Button --}}
      @if ($paginator->onFirstPage())
        <x-buttons.button
          class="inline-flex items-center justify-center flex-1 px-5 py-2 pr-5 text-sm text-center bg-gray-300 opacity-50 cursor-not-allowed text-stone-500 dark:text-white dark:bg-slate-700 dark:hover:bg-slate-600 focus:ring-4 dark:focus:ring-slate-400 hover:bg-gray-400 focus:ring-gray-500"
          type="button" disabled>
          <x-icon.icon class="w-5 h-5 mr-1 -ml-1" fill="gray"
            icon="previous" />
          Previous
        </x-buttons.button>
      @else
        <x-buttons.button
          class="inline-flex items-center justify-center flex-1 px-5 py-2 pr-5 text-sm text-center bg-gray-300 text-stone-500 dark:text-white dark:bg-slate-700 dark:hover:bg-slate-600 focus:ring-4 dark:focus:ring-slate-400 hover:bg-gray-400 focus:ring-gray-500"
          type="a" href="{{ $paginator->previousPageUrl() }}">
          <x-icon.icon class="w-5 h-5 mr-1 -ml-1" fill="gray"
            icon="previous" />
          Previous
        </x-buttons.button>
      @endif

      {{-- Next Button --}}
      @if ($paginator->hasMorePages())
        <x-buttons.button
          class="inline-flex items-center justify-center flex-1 px-5 py-2 pr-5 text-sm text-center bg-gray-300 text-stone-500 dark:text-white dark:bg-slate-700 dark:hover:bg-slate-600 focus:ring-4 dark:focus:ring-slate-400 hover:bg-gray-400 focus:ring-gray-500"
          type="a" href="{{ $paginator->nextPageUrl() }}">
          Next
          <x-icon.icon class="w-5 h-5 ml-1 -mr-1" fill="gray"
            icon="next" />
        </x-buttons.button>
      @else
        <x-buttons.button
          class="inline-flex items-center justify-center flex-1 px-5 py-2 pr-5 text-sm text-center bg-gray-300 opacity-50 cursor-not-allowed text-stone-500 dark:text-white dark:bg-slate-700 dark:hover:bg-slate-600 focus:ring-4 dark:focus:ring-slate-400 hover:bg-gray-400 focus:ring-gray-500"
          type="button" disabled>
          Next
          <x-icon.icon class="w-5 h-5 ml-1 -mr-1" fill="gray"
            icon="next" />
        </x-buttons.button>
      @endif

    </div>
  </div>
@endif
