<x-layout>

  <div class="fixed left-0 right-0 z-50 flex items-center justify-center top-4 md:inset-0 h-modal sm:h-full">
    <div class="relative w-9/12 px-4 overflow-y-scroll md:h-auto">
      <!-- Modal content -->
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
        <!-- Modal header -->
        <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-700">
          <h3 class="text-xl font-semibold dark:text-white">
            Add new user
          </h3>
          <button type="button"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white">
            <img src="{{ Vite::asset("resources/icons/close-icon.svg")}}" alt="" class="w-5 h-5">
          </button>
        </div>
        <!-- Modal body -->
        <div class="p-6 space-y-6">
          <form action="#" method="POST">
            <div class="grid grid-cols-6 gap-6">

              <x-form-field>
                <x-label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                  {{ $slot }}
                </x-label>
                <x-input id="name" name="name" type="text" placeholder="Enter Organization Name"
                  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                  required />
              </x-form-field>

              <div class="col-span-6 sm:col-span-3">
                <label for="first-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First
                  Name</label>
                <input type="text" name="first-name" id="first-name"
                  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                  placeholder="Bonnie" required>
              </div>
              <div class="col-span-6 sm:col-span-3">
                <label for="last-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last
                  Name</label>
                <input type="text" name="last-name" id="last-name"
                  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                  placeholder="Green" required>
              </div>
              <div class="col-span-6 sm:col-span-3">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input type="email" name="email" id="email"
                  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                  placeholder="example@company.com" required>
              </div>
              <div class="col-span-6 sm:col-span-3">
                <label for="position"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Position</label>
                <input type="text" name="position" id="position"
                  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                  placeholder="e.g. React developer" required>
              </div>
              <div class="col-span-6">
                <label for="biography"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Biography</label>
                <textarea id="biography" rows="4"
                  class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                  placeholder="👨‍💻Full-stack web developer. Open-source contributor."></textarea>
              </div>
            </div>
        </div>
        <!-- Modal footer -->
        <div class="items-center p-6 border-t border-gray-200 rounded-b dark:border-gray-700">
          <button
            class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
            type="submit">Add user</button>
        </div>
        </form>
      </div>
    </div>
  </div>

</x-layout>
