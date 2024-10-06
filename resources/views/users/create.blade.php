<x-layouts.layout>

  <div class="flex w-full h-screen mt-5 justify-stretch lg:ml-64">
    <div class="relative w-full px-4 lg:w-9/12">
      <div class="relative flex flex-col justify-center overflow-hidden bg-white rounded-lg shadow dark:bg-gray-800"
        style="height: 450px;">
        <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-700">
          <h3 class="text-xl font-semibold dark:text-white">
            Create A New User
          </h3>

          <x-buttons.button type="a" href="{{ route('users.index') }}"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white">
            <img src="{{ Vite::asset('resources/icons/close-icon.svg') }}" alt="" class="w-5 h-5">
          </x-buttons.button>
        </div>

        <div class="p-6 pb-12 max-h-[500px] overflow-y-auto">
          <!-- Enable scroll -->
          <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-6">

              <x-forms.form-field class="lg:col-span-3">
                <x-forms.label for="username">username</x-forms.label>
                <x-forms.input id="name" name="username" type="text" value="{{ old('username') }}"
                  placeholder="Enter Username" />
                <x-forms.input-error key="username" />
              </x-forms.form-field>

              <x-forms.form-field class="lg:col-span-3">
                <x-forms.label for="email">email</x-forms.label>
                <x-forms.input id="name" name="email" type="text" value="{{ old('email') }}"
                  placeholder="Enter email" />
                <x-forms.input-error key="email" />
              </x-forms.form-field>

              <x-forms.form-field class="lg:col-span-3">
                <x-forms.label for="password">password</x-forms.label>
                <x-forms.input id="name" name="password" type="text" value="{{ old('password') }}"
                  placeholder="Enter password" />
                <x-forms.input-error key="password" />
              </x-forms.form-field>

              <x-forms.form-field class="lg:col-span-3">
                <x-forms.label for="organization-listings">Assign to organization</x-forms.label>

                <x-forms.form-select id="organization-listings" name="organization_id">
                  <option selected>Choose a Organization</option>

                  @foreach ($organizations as $organization)
                  <x-forms.form-option value="{{ $organization->id }}">
                    {{ $organization->name}}
                  </x-forms.form-option>
                  @endforeach

                </x-forms.form-select>

                <x-forms.input-error key="organization-listings" />
                </x-form-field>
            </div>

            <div class="flex justify-end mt-6">
              <x-buttons.button type="submit" class="text-white text-sm px-4 py-2.5 text-center w-36"
                value="Add User" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-layouts.layout>
