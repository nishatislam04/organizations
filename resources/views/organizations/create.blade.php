<x-layout :showNav="false" :showAside="false">

  <div class="flex items-center justify-center w-full h-screen">
    <div class="relative w-9/12 p-10 px-4 md:h-auto">
      <div class="relative overflow-y-scroll bg-white rounded-lg shadow h-96 dark:bg-gray-800">
        <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-700">
          <h3 class="text-xl font-semibold dark:text-white">
            Add a new organization
          </h3>

          <x-button type="a" href="{{ route('organizations.index') }}"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white">
            <img src="{{ Vite::asset('resources/icons/close-icon.svg')}}" alt="" class="w-5 h-5">
          </x-button>
        </div>

        <div class="p-6 space-y-6">
          <form action="{{ route("organizations.store") }}" method="POST">
            @csrf
            <div class="grid grid-cols-6 gap-6 ">

              <x-form-field>
                <x-label for="name">Name </x-label>
                <x-input id="name" name="name" type="text" value="{{ old('name') }}"
                  placeholder="Enter Organization Name" />
                <x-input-error key="name" />
              </x-form-field>

              <x-form-field>
                <x-label for="description">Description </x-label>
                <x-textarea id="description" name="description" placeholder="Enter Organization Description">
                  {{ old('description') }}</x-textarea>
                <x-input-error key="description" />
              </x-form-field>

              <x-form-field>
                <x-label for="max_members">Max Members </x-label>
                <x-input id="max_members" name="max_members" type="text" value="{{ old('max_members') }}"
                  placeholder="Maximum member can join" />
                <x-input-error key="max_members" />
              </x-form-field>

              <x-button type="submit" class="text-white text-sm px-2 py-2.5 text-center " value="Add Organization" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-layout>
