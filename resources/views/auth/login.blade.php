<x-layouts.layout>
  <main class="bg-gray-50 dark:bg-gray-900">
    <div
      class="flex flex-col items-center justify-center px-6 pt-8 mx-auto md:h-screen pt:mt-0 dark:bg-gray-900">
      <a class="flex items-center justify-center mb-8 text-2xl font-semibold lg:mb-10 dark:text-white"
        href="#">
        <x-icon.icon class="mr-4 h-11 w-11" icon="logo" />
        <span>Flowbite</span>
      </a>
      <!-- Card -->
      <div
        class="w-full max-w-xl p-6 space-y-8 bg-white rounded-lg shadow sm:p-8 dark:bg-gray-800">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
          Sign in to platform
        </h2>
        <form class="mt-8 space-y-7" action="{{ route("auth.login") }}"
          method="POST">
          @csrf

          <div>
            <label
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
              for="username">username or email</label>
            <input
              class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
              id="username" name="username" type="username"
              placeholder="username" required>
            @error("username")
              <p class="text-red-500">{{ $message }}</p>
            @enderror
          </div>
          <div>
            <label
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
              for="password">Your password</label>
            <input
              class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
              id="password" name="password" type="password"
              placeholder="••••••••" required>
          </div>
          <div class="flex items-center">
            <input
              class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
              id="checked-checkbox" name="remember" type="checkbox"
              checked>
            <label
              class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300"
              for="checked-checkbox">Remember Me</label>
          </div>


          <div class="flex items-center justify-start gap-6">
            <button
              class="w-full px-5 py-3 text-base font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
              type="submit">Login to your account</button>

            <div class="flex items-center justify-center dark:bg-gray-800"
              id="login-container">
              <button
                class="flex gap-2 px-4 py-2 transition duration-150 border rounded-lg border-slate-200 dark:border-slate-700 text-slate-700 dark:text-slate-200 hover:border-slate-400 dark:hover:border-slate-500 hover:text-slate-900 dark:hover:text-slate-300 hover:shadow">
                <x-icon.icon class="w-6 h-6" icon="google"
                  loading="lazy" />
                <a href="{{ route("auth.google") }}">Login with Google</a>
              </button>
            </div>
          </div>

          <div
            class="text-sm font-medium text-gray-500 dark:text-gray-400">
            Not registered? <a
              class="cursor-pointer text-primary-700 hover:underline dark:text-primary-500"
              href="{{ route("register") }}">Create account</a>
          </div>
        </form>
      </div>
    </div>

  </main>
</x-layouts.layout>
