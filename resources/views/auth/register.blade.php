<x-layouts.layout>
  <main class="p-12 bg-gray-50 dark:bg-gray-900">

    <div
      class="flex flex-col items-center justify-center px-6 pt-8 mx-auto pt:mt-0 dark:bg-gray-900">
      <a class="flex items-center justify-center mb-8 text-2xl font-semibold lg:mb-10 dark:text-white"
        href="#">
        <x-icon.icon class="mr-4 h-11 w-11" icon="logo" />
        <span>Flowbite</span>
      </a>
      <div
        class="w-full max-w-xl p-6 space-y-8 bg-white rounded-lg shadow sm:p-8 dark:bg-gray-800">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
          Create a Free Account
        </h2>

        <form class="mt-8 space-y-6" action="{{ route("auth.register") }}"
          method="POST" enctype="multipart/form-data">
          @csrf

          <div>
            <x-forms.label
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
              for="username">Your Username</x-forms.label>
            <x-forms.input
              class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
              id="username" name="username" value="username"
              placeholder="Enter Username" required />
            <x-forms.input-error key="username" />
          </div>

          <div>
            <x-forms.label
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
              for="email">Your Email</x-forms.label>
            <x-forms.input
              class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
              id="email" name="email" value="email"
              placeholder="Enter Email" required />
            <x-forms.input-error key="email" />
          </div>

          @if (!session()->has("joining_org"))
            <div>
              <x-forms.label
                class="block mb-2 text-sm font-medium text-gray-900 cursor-pointer dark:text-white"
                for="organization-listings">Select A Organization to
                join</x-forms.label>

              <x-forms.form-select id="organization-listings"
                name="organization_id">
                <option selected>Choose a Organization</option>

                @foreach ($organizations as $organization)
                  <x-forms.form-option value="{{ $organization->id }}">
                    {{ $organization->name }}
                  </x-forms.form-option>
                @endforeach
              </x-forms.form-select>
            </div>
          @endif

          <div>
            <x-forms.label
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
              for="avatar">Upload file</x-forms.label>
            <x-forms.input
              class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
              id="avatar" name="avatar" type="file" />
          </div>

          <div>
            <x-forms.label
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
              for="password">Your password</x-forms.label>
            <input
              class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
              id="password" name="password" type="text"
              placeholder="Enter Password" required>

            <x-forms.input-error key="password" />
          </div>

          <div>
            <x-forms.label
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
              for="password-confirmation">Confirm password</x-forms.label>
            <input
              class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
              id="password-confirmation" name="password_confirmation"
              type="text" placeholder="Enter Password again" required>
          </div>

          <div class="flex items-center">
            <x-forms.checkbox
              class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
              id="checkbox" name="remember" type="checkbox" checked />
            <x-forms.label
              class="mt-2 text-sm font-medium text-gray-900 ms-2 dark:text-gray-300"
              for="checkbox">Remember Me</x-forms.label>
          </div>

          <button
            class="w-full px-5 py-3 text-base font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
            type="submit">Create account</button>
          <div
            class="text-sm font-medium text-gray-500 dark:text-gray-400">
            Already have an account? <a
              class="text-primary-700 hover:underline dark:text-primary-500"
              href="{{ route("auth.login") }}">Login here</a>
          </div>
        </form>

      </div>
    </div>
  </main>
</x-layouts.layout>
