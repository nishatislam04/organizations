<x-layout>

  <div class="flex w-full h-screen mt-5 justify-stretch lg:ml-64">
    <div class="relative w-full px-4 lg:w-9/12">
      <div class="relative flex flex-col justify-center overflow-hidden bg-white rounded-lg shadow dark:bg-gray-800"
        style="height: 450px;">
        <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-700">
          <h3 class="text-xl font-semibold dark:text-white">
            Create A New User
          </h3>

          <x-button type="a" href="{{ route('users.index') }}"
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
                <x-label for="username">username</x-label>
                <x-input id="name" name="username" type="text" value="{{ old('username') }}"
                  placeholder="Enter Username" />
                <x-input-error key="username" />
              </x-form-field>

              <x-form-field class="lg:col-span-3">
                <x-label for="email">email</x-label>
                <x-input id="name" name="email" type="text" value="{{ old('email') }}" placeholder="Enter email" />
                <x-input-error key="email" />
              </x-form-field>

              <x-form-field class="lg:col-span-3">
                <x-label for="password">password</x-label>
                <x-input id="name" name="password" type="text" value="{{ old('password') }}"
                  placeholder="Enter password" />
                <x-input-error key="password" />
              </x-form-field>

              <x-form-field class="lg:col-span-3">
                <x-label for="organization-listings">Assign to organization</x-label>

                <x-form-select id="organization-listings">
                  <option selected>Choose a Organization</option>

                  @foreach ($organizations as $organization)
                  <x-form-option value="{{ $organization->name }}">
                    {{ $organization->name}}
                  </x-form-option>
                  @endforeach

                </x-form-select>

                <x-input-error key="organization-listings" />
              </x-form-field>
            </div>

            <div class="flex justify-end mt-6">
              <x-button type="submit" class="text-white text-sm px-4 py-2.5 text-center w-36" value="Add User" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-layout>
