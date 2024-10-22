<!doctype html>
<html class="dark" lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
      content="Get started with a free and open-source admin dashboard layout built with Tailwind CSS and Flowbite featuring charts, widgets, CRUD layouts, authentication pages, and more">
    <meta name="author" content="Themesberg">
    <meta name="generator" content="Hugo 0.135.0">

    <title>Tailwind CSS 404 Not Found Page - Flowbite</title>


    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
      rel="stylesheet">
    @vite(["resources/css/template.css", "resources/css/app.css", "resources/css/style.css", "resources/js/index.js", "resources/js/app.js"])

    <link
      href="{{ Vite::asset("resources/icons/favicons/apple-touch-icon.png") }}"
      rel="apple-touch-icon" sizes="180x180">
    <link type="image/png"
      href="{{ Vite::asset("resources/icons/favicons/favicon-32x32.png") }}"
      rel="icon" sizes="32x32">
    <link type="image/png"
      href="{{ Vite::asset("resources/icons/favicons/favicon-16x16.png") }}"
      rel="icon" sizes="16x16">
    <link type="image/x-icon"
      href="{{ Vite::asset("resources/icons/favicons/favicon.ico") }}"
      rel="icon">
    <link
      href="{{ Vite::asset("resources/icons/favicons/site.webmanifest") }}"
      rel="manifest">
    <link
      href="{{ Vite::asset("resources/icons/favicons/safari-pinned-tab.svg") }}"
      rel="mask-icon" color="#5bbad5">

    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

  </head>

  <body class="bg-gray-50 dark:bg-gray-800">

    <main class="bg-gray-50 dark:bg-gray-900">

      <div
        class="flex flex-col items-center justify-center h-screen px-6 mx-auto xl:px-0 dark:bg-gray-900">
        <div class="block md:max-w-md">
          <img
            src="{{ Vite::asset("resources/images/illustrations/404.svg") }}"
            alt="astronaut image">
        </div>
        <div class="text-center xl:max-w-4xl">
          <h1
            class="mb-3 text-2xl font-bold leading-tight text-gray-900 sm:text-4xl lg:text-5xl dark:text-white">
            Page not
            found</h1>
          <p
            class="mb-5 text-base font-normal text-gray-500 md:text-lg dark:text-gray-400">
            Oops! Looks like you followed
            a bad link. If you think this is a problem with us, please tell
            us.</p>
          <a class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-3 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
            href="#">
            <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor"
              viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                clip-rule="evenodd"></path>
            </svg>
            Go back home
          </a>
        </div>
      </div>

    </main>

  </body>

</html>
