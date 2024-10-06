<x-layouts.layout>
  <x-layouts.container search_route="users.index">

    <div class="flex w-full h-screen mt-5 justify-stretch lg:ml-64">
      <div class="relative w-full px-4 lg:w-9/12">
        <div class="relative flex flex-col justify-center overflow-hidden bg-white rounded-lg shadow dark:bg-gray-800"
          style="height: 450px;">
          <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-700">
            <h3 class="text-xl font-semibold dark:text-white">
              Update <span class="text-4xl font-normal">{{ $user->username }} </span> informations
            </h3>

            <x-buttons.button type="a" href="{{ route('users.index') }}"
              class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white">
              <img src="{{ Vite::asset('resources/icons/close-icon.svg') }}" alt="" class="w-5 h-5">
            </x-buttons.button>
          </div>

          <div class="p-6 pb-12 max-h-[500px] overflow-y-auto">

            <form action="{{ route("users.update", $user->id) }}" method="POST">
              @csrf
              @method("PUT")

              <div class="grid grid-cols-6 gap-6 ">

                <x-forms.form-field>
                  <x-forms.label for="username">UserName </x-forms.label>
                  <x-forms.input id="username" name="username" type="text" value="{{ $user->username }}"
                    placeholder="Enter User UserName" />
                  <x-forms.input-error key="username" />
                </x-forms.form-field>

                <x-forms.form-field>
                  <x-forms.label for="email">Email </x-forms.label>
                  <x-forms.input id="email" name="email" type="email" value="{{ $user->email }}"
                    placeholder="Enter User Email" />
                  <x-forms.input-error key="email" />
                </x-forms.form-field>

                <x-buttons.button type="submit" class="text-white text-sm px-5 py-2.5 text-center " value="Update" />
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </x-layouts.container>
</x-layouts.layout>
