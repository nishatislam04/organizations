<x-layout>

  <div class="flex w-full h-screen mt-5 justify-stretch lg:ml-64">
    <div class="relative w-full px-4 lg:w-9/12">
      <div class="relative flex flex-col justify-center overflow-hidden bg-white rounded-lg shadow dark:bg-gray-800"
        style="height: 450px;">
        <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-700">
          <h3 class="text-xl font-semibold dark:text-white">
            Add a new organization
          </h3>

          <x-button type="a" href="{{ route('organizations.index') }}"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white">
            <img src="{{ Vite::asset('resources/icons/close-icon.svg') }}" alt="" class="w-5 h-5">
          </x-button>
        </div>

        <div class="p-6 pb-12 max-h-[500px] overflow-y-auto">
          <!-- Enable scroll -->
          <form action="{{ route('organizations.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-6">

              <x-form-field class="lg:col-span-3">
                <x-label for="name">Name</x-label>
                <x-input id="name" name="name" type="text" value="{{ old('name') }}"
                  placeholder="Enter Organization Name" />
                <x-input-error key="name" />
              </x-form-field>

              <x-form-field class="lg:col-span-3">
                <x-label for="description">Description</x-label>
                <x-textarea id="description" name="description" placeholder="Enter Organization Description">
                  {{ old('description') }}
                </x-textarea>
                <x-input-error key="description" />
              </x-form-field>

              <x-form-field class="lg:col-span-2">
                <x-label for="max_members">Max Members</x-label>
                <x-input id="max_members" name="max_members" type="text" value="{{ old('max_members') }}"
                  placeholder="Maximum member can join" />
                <x-input-error key="max_members" />
              </x-form-field>

            </div>

            <div class="flex justify-end mt-6">
              <x-button type="submit" class="text-white text-sm px-4 py-2.5 text-center w-36"
                value="Add Organization" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-layout>
