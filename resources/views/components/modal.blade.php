@props(['organization'])

<div id="delete-organization" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">

    <div class="justify-between p-4 bg-white dark:bg-gray-800">
        <div class="flex justify-between">

            <h5 class="inline-flex items-center text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">Delete
                item
            </h5>
            <x-button type="button"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white"
                data-modal-hide="delete-organization">
                <img src="{{ Vite::asset('resources/icons/close-icon.svg')}}" alt="" class="w-5 h-5">
            </x-button>
        </div>

        <img src="{{ Vite::asset("resources/icons/warning-icon.svg")}}" alt="" class="w-10 h-10 mt-2 mb-4 text-red-600">

        <h3 class="mb-6 text-lg text-gray-500 dark:text-gray-400">Are you sure you want to delete this organization?
        </h3>

        <div class="flex justify-end">

            <form action="{{ route("organizations.destroy", $organization->id) }}" method="POST">
                @csrf
                @method("DELETE")

                <x-button type="submit" value="Yes, I'm sure"
                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2.5 text-center mr-2 dark:focus:ring-red-900" />
            </form>

            <x-button type="button"
                class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-primary-300 border border-gray-200 font-medium inline-flex items-center rounded-lg text-sm px-3 py-2.5 text-center dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700"
                data-modal-hide="delete-organization">
                No, cancel
            </x-button>
        </div>
    </div>
</div>
