<x-layouts.layout>
  <x-layouts.container search_route="organizations.index">

    <div class="flex w-full h-screen mt-5 justify-stretch lg:ml-64">
      <div class="relative w-full px-4 lg:w-9/12">
        <div
          class="relative flex flex-col justify-center overflow-hidden bg-white rounded-lg shadow dark:bg-gray-800">
          <div
            class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-700">
            <h3 class="text-xl font-semibold dark:text-white">
              Update <span class="text-4xl font-normal">{{ $organization->name }}
              </span> informations
            </h3>

            <x-buttons.button
              class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white"
              type="a" href="{{ route('organizations.index') }}">
              <x-icon.icon class="w-5 h-5" fill="gray" icon="close" />
            </x-buttons.button>
          </div>

          <div class="p-6 pb-12 max-h-[500px] overflow-y-auto">
            <!-- Enable scroll -->
            <form action="{{ route('organizations.update', $organization->id) }}"
              method="POST">
              @csrf
              @method('PUT')

              <div class="grid grid-cols-6 gap-6 ">

                <x-forms.form-field>
                  <x-forms.label for="name">Name </x-forms.label>
                  <x-forms.input id="name" name="name" type="text"
                    value="{{ old('name', $organization->name) }}"
                    placeholder="Enter Organization Name" />
                </x-forms.form-field>

                <x-forms.form-field>
                  <x-forms.label for="description">Description
                  </x-forms.label>
                  <x-forms.textarea id="description" name="description"
                    placeholder="Enter Organization Description">
                    {{ $organization->description }}
                  </x-forms.textarea>
                </x-forms.form-field>

                <x-forms.form-field>
                  <x-forms.label for="max_members">Max Members
                  </x-forms.label>
                  <x-forms.input id="max_members" name="max_members" type="text"
                    value="{{ $organization->max_members }}"
                    placeholder="Maximum member can join" />
                </x-forms.form-field>

                <x-buttons.button class="text-white text-sm px-5 py-2.5 text-center "
                  type="submit" value="Update" />
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </x-layouts.container>
</x-layouts.layout>
