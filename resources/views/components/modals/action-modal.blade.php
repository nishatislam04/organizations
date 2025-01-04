<div class="fixed inset-0 z-50 flex items-center justify-center hidden"
  id="{{ $name }}-modal">
  <div class="justify-between p-4 bg-white dark:bg-gray-800">
    <div class="flex justify-between">

      <h5
        class="inline-flex items-center text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">
        {{ $header }}
      </h5>
      <x-buttons.button
        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white modal-close-btn"
        type="button">
        <x-icon.icon class="w-5 h-5" fill="gray" icon="close" />
      </x-buttons.button>
    </div>

    <x-icon.icon class="w-10 h-10 mt-2 mb-4 text-red-600" icon="{{ $type }}"
      fill="white" />

    <h3 class="mb-6 text-lg text-gray-500 dark:text-gray-400">
      {{ $slot }}
    </h3>

    <div class="flex justify-end">

      <form id="{{ $name }}-form" action="{{ $action ?? '' }}"
        method="POST">
        @csrf

        @method($method)

        <x-buttons.button
          class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2.5 text-center mr-2 dark:focus:ring-red-900"
          type="submit" value="{{ $confirm }}" />
      </form>

      <x-buttons.button
        class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-primary-300 border border-gray-200 font-medium inline-flex items-center rounded-lg text-sm px-3 py-2.5 text-center dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700 modal-close-btn"
        type="button">
        {{ $cancel }}
      </x-buttons.button>
    </div>
  </div>
</div>
