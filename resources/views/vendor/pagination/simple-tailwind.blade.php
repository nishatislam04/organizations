<div
    class="sticky bottom-0 right-0 items-center w-full p-4 bg-white border-t border-gray-200 sm:flex sm:justify-center dark:bg-gray-800 dark:border-gray-700">

    <div class="flex items-center space-x-3">

        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <x-button type="button"
            class="inline-flex items-center justify-center flex-1 px-5 py-2 pr-5 text-sm text-center bg-gray-300 opacity-50 cursor-not-allowed text-stone-500 dark:text-white dark:bg-slate-700 dark:hover:bg-slate-600 focus:ring-4 dark:focus:ring-slate-400 hover:bg-gray-400 focus:ring-gray-500"
            disabled>
            <img src="{{ Vite::asset('resources/icons/previous.svg') }}" alt="" class="w-5 h-5 mr-1 -ml-1">
            Previous
        </x-button>
        @else
        {{-- Use {!! !!} to prevent escaping of the URL --}}
        <x-button type="a" href="{!! $paginator->previousPageUrl() !!}"
            class="inline-flex items-center justify-center flex-1 px-5 py-2 pr-5 text-sm text-center bg-gray-300 text-stone-500 dark:text-white dark:bg-slate-700 dark:hover:bg-slate-600 focus:ring-4 dark:focus:ring-slate-400 hover:bg-gray-400 focus:ring-gray-500">
            <img src="{{ Vite::asset('resources/icons/previous.svg') }}" alt="" class="w-5 h-5 mr-1 -ml-1">
            Previous
        </x-button>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        {{-- Use {!! !!} to prevent escaping of the URL --}}
        <x-button type="a" href="{!! $paginator->nextPageUrl() !!}"
            class="inline-flex items-center justify-center flex-1 px-5 py-2 pr-5 text-sm text-center bg-gray-300 text-stone-500 dark:text-white dark:bg-slate-700 dark:hover:bg-slate-600 focus:ring-4 dark:focus:ring-slate-400 hover:bg-gray-400 focus:ring-gray-500">
            Next
            <img src="{{ Vite::asset('resources/icons/next.svg') }}" alt="" class="w-5 h-5 ml-1 -mr-1">
        </x-button>
        @else
        <x-button type="button"
            class="inline-flex items-center justify-center flex-1 px-5 py-2 pr-5 text-sm text-center bg-gray-300 opacity-50 cursor-not-allowed text-stone-500 dark:text-white dark:bg-slate-700 dark:hover:bg-slate-600 focus:ring-4 dark:focus:ring-slate-400 hover:bg-gray-400 focus:ring-gray-500"
            disabled>
            Next
            <img src="{{ Vite::asset('resources/icons/next.svg') }}" alt="" class="w-5 h-5 ml-1 -mr-1">
        </x-button>
        @endif
    </div>
</div>
