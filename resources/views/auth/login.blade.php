<!doctype html>
<html lang="en" class="dark">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description"
    content="Get started with a free and open-source admin dashboard layout built with Tailwind CSS and Flowbite featuring charts, widgets, CRUD layouts, authentication pages, and more">
  <meta name="author" content="Themesberg">
  <meta name="generator" content="Hugo 0.135.0">

  <title>Login</title>


  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
    rel="stylesheet">

  @vite(["resources/css/template.css","resources/css/app.css", "resources/css/style.css", "resources/js/index.js",
  "resources/js/app.js"])

  <link rel="apple-touch-icon" sizes="180x180"
    href="{{ Vite::asset('resources/icons/favicons/apple-touch-icon.png') }}">
  <link rel="icon" type="image/png" sizes="32x32"
    href="{{ Vite::asset('resources/icons/favicons/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16"
    href="{{ Vite::asset('resources/icons/favicons/favicon-16x16.png') }}">
  <link rel="icon" type="image/x-icon" href="{{ Vite::asset('resources/icons/favicons/favicon.ico') }}">
  <link rel="manifest" href="{{ Vite::asset('resources/icons/favicons/site.webmanifest') }}">
  <link rel="mask-icon" href="{{ Vite::asset('resources/icons/favicons/safari-pinned-tab.svg') }}" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">
</head>

<body class="bg-gray-50 dark:bg-gray-800">

  <main class="bg-gray-50 dark:bg-gray-900">
    <div class="flex flex-col items-center justify-center px-6 pt-8 mx-auto md:h-screen pt:mt-0 dark:bg-gray-900">
      <a href="http://localhost:1313/"
        class="flex items-center justify-center mb-8 text-2xl font-semibold lg:mb-10 dark:text-white">
        <img src="{{ Vite::asset("resources/icons/logo.svg")}}" class="mr-4 h-11" alt="FlowBite Logo">
        <span>Flowbite</span>
      </a>
      <!-- Card -->
      <div class="w-full max-w-xl p-6 space-y-8 bg-white rounded-lg shadow sm:p-8 dark:bg-gray-800">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
          Sign in to platform
        </h2>
        <form class="mt-8 space-y-7" action="{{ route("auth.login")}}" method="POST">
          @csrf

          <div>
            <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
              username</label>
            <input type="username" name="username" id="username"
              class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
              placeholder="username" required>
            @error("username")
            <p>{{ $message }}</p>
            @enderror
          </div>
          <div>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
              password</label>
            <input type="password" name="password" id="password" placeholder="••••••••"
              class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
              required>
          </div>
          <button type="submit"
            class="w-full px-5 py-3 mt-10 text-base font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Login
            to your account</button>
          <div class="text-sm font-medium text-gray-500 dark:text-gray-400">
            Not registered? <a href="{{ route("register")}}"
              class="cursor-pointer text-primary-700 hover:underline dark:text-primary-500">Create
              account</a>
          </div>
        </form>
      </div>
    </div>

  </main>
</body>

</html>
