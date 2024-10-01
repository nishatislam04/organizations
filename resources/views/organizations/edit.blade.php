<x-layout :showNav="false" :showAside="false">

  <div class="flex items-center justify-center w-full">
    <div class="relative w-9/12 p-10 px-4 md:h-auto">
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
        <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-700">
          <h3 class="text-xl font-semibold dark:text-white">
            Update <span class="text-4xl font-normal">{{ $organization->name }} </span> informations
          </h3>

          <x-button type="a" href="{{ route('organizations.index') }}"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white">
            <img src="{{ Vite::asset('resources/icons/close-icon.svg')}}" alt="" class="w-5 h-5">
          </x-button>
        </div>

        <div class="p-6 space-y-6">
          <form action="{{ route("organizations.update", $organization->id) }}" method="POST">
            @csrf
            @method("PUT")

            <div class="grid grid-cols-6 gap-6 ">

              <x-form-field>
                <x-label for="name">Name </x-label>
                <x-input id="name" name="name" type="text" value="{{ $organization->name }}"
                  placeholder="Enter Organization Name" />
              </x-form-field>

              <x-form-field>
                <x-label for="description">Description </x-label>
                <x-textarea id="description" name="description" placeholder="Enter Organization Description">
                  {{ $organization->description }}</x-textarea>
              </x-form-field>

              <x-form-field>
                <x-label for="max_members">Max Members </x-label>
                <x-input id="max_members" name="max_members" type="text" value="{{ $organization->max_members }}"
                  placeholder="Maximum member can join" />
              </x-form-field>

              <x-button type="submit" class="text-white text-sm px-5 py-2.5 text-center " value="Update" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-layout>
