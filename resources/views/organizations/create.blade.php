<x-layouts.layout>

  <x-layouts.container search_route="organizations.index">
    <div class="flex w-full h-screen mt-5 justify-stretch lg:ml-64">
      <div class="relative w-full px-4 lg:w-9/12">
        <div
          class="relative flex flex-col justify-center overflow-hidden bg-white rounded-lg shadow dark:bg-gray-800"
          style="height: 450px;">
          <div
            class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-700">
            <h3 class="text-xl font-semibold dark:text-white">
              Add a new organization
            </h3>

            <x-buttons.button
              class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white"
              type="a" href='{{ route("organizations.index") }}'>
              <x-icon.icon class="w-5 h-5" fill="gray" icon="close" />
            </x-buttons.button>
          </div>

          <div class="p-6 pb-12 max-h-[500px] overflow-y-auto">
            <!-- Enable scroll -->
            <form action='{{ route("organizations.store") }}'
              method="POST">
              @csrf
              <div class="grid grid-cols-1 gap-6 lg:grid-cols-6">

                <x-forms.form-field class="lg:col-span-3">
                  <x-forms.label for="name">Name</x-forms.label>
                  <x-forms.input id="name" name="name"
                    type="text" value='{{ old("name") }}'
                    placeholder="Enter Organization Name" />
                  <x-forms.input-error key="name" />
                </x-forms.form-field>

                <x-forms.form-field class="lg:col-span-3">
                  <x-forms.label
                    for="description">Description</x-forms.label>
                  <x-forms.textarea id="description" name="description"
                    placeholder="Enter Organization Description">
                    {{ old("description") }}
                  </x-forms.textarea>
                  <x-forms.input-error key="description" />
                </x-forms.form-field>

                <x-forms.form-field class="lg:col-span-2">
                  <x-forms.label for="max_members">Max
                    Members</x-forms.label>
                  <x-forms.input id="max_members" name="max_members"
                    type="text" value='{{ old("max_members") }}'
                    placeholder="Maximum member can join" />
                  <x-forms.input-error key="max_members" />
                </x-forms.form-field>

              </div>

              <div class="flex justify-end mt-6">
                <x-buttons.button
                  class="text-white text-sm px-4 py-2.5 text-center w-36"
                  type="submit" value="Add Organization" />
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </x-layouts.container>
</x-layouts.layout>
