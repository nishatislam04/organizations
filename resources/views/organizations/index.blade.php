<!doctype html>
<html lang="en" class="dark">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description"
    content="Get started with a free and open-source admin dashboard layout built with Tailwind CSS and Flowbite featuring charts, widgets, CRUD layouts, authentication pages, and more">
  <meta name="author" content="Themesberg">
  <meta name="generator" content="Hugo 0.135.0">

  <title>Tailwind CSS Products Page - Flowbite</title>

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

  <script>
    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark')
    }
  </script>
</head>

<body class="bg-gray-50 dark:bg-gray-800">

  <x-nav />

  <div class="flex pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900">

    <x-aside />

    <div class="fixed inset-0 z-10 hidden bg-gray-900/50 dark:bg-gray-900/90" id="sidebarBackdrop"></div>

    <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">
      <main>
        <div
          class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
          <div class="w-full mb-1">
            <div class="mb-4">
              <nav class="flex mb-5" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
                  <li class="inline-flex items-center">
                    <a href="{{ route("dashboard.index")}}"
                      class="inline-flex items-center text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white">
                      <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                          d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                        </path>
                      </svg>
                      Home
                    </a>
                  </li>
                  <li>
                    <div class="flex items-center">
                      <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                          d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                          clip-rule="evenodd"></path>
                      </svg>
                      <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500"
                        aria-current="page">Organizations</span>
                    </div>
                  </li>
                </ol>
              </nav>
              <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">All Organizations</h1>
            </div>
            <div class="items-center justify-between block sm:flex md:divide-x md:divide-gray-100 dark:divide-gray-700">
              <div class="flex items-center mb-4 sm:mb-0">
                <form class="sm:pr-3" action="#" method="GET">
                  <label for="products-search" class="sr-only">Search</label>
                  <div class="relative w-48 mt-1 sm:w-64 xl:w-96">
                    <input type="text" name="email" id="products-search"
                      class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                      placeholder="Search for products">
                  </div>
                </form>
              </div>
              <button id="createProductButton"
                class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800"
                type="button" data-drawer-target="drawer-create-product-default"
                data-drawer-show="drawer-create-product-default" aria-controls="drawer-create-product-default"
                data-drawer-placement="right">
                Create a new Organization
              </button>
            </div>
          </div>
        </div>
        <div class="flex flex-col">
          <div class="overflow-x-auto">
            <div class="inline-block min-w-full align-middle">
              <div class="overflow-hidden shadow">
                <table class="max-w-full min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                  <thead class="bg-gray-100 dark:bg-gray-700">
                    <tr>
                      <th scope="col" class="p-4">
                        <div class="flex items-center">
                          <input id="checkbox-all" aria-describedby="checkbox-1" type="checkbox"
                            class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">
                          <label for="checkbox-all" class="sr-only">checkbox</label>
                        </div>
                      </th>
                      <th scope="col"
                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                        Name
                      </th>
                      <th scope="col"
                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                        ID
                      </th>
                      <th scope="col"
                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                        Description
                      </th>
                      <th scope="col"
                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                        join members
                      </th>
                      <th scope="col"
                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                        max members
                      </th>
                      <th scope="col"
                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                        created By
                      </th>
                      <th scope="col"
                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                        Actions
                      </th>
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">

                    @foreach ($organizations as $organization)
                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                      <td class="w-4 p-4">
                        <div class="flex items-center">
                          <input id="checkbox-194556" aria-describedby="checkbox-1" type="checkbox"
                            class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">
                          <label for="checkbox-194556" class="sr-only">checkbox</label>
                        </div>
                      </td>

                      <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                        <div class="text-base font-semibold text-gray-900 dark:text-white">{{ $organization->name }}
                        </div>
                      </td>

                      <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $organization->id }}</td>

                      <td
                        class="max-w-sm p-4 overflow-hidden text-base font-normal text-gray-500 truncate xl:max-w-xs dark:text-gray-400">
                        {{$organization->description}}
                      </td>

                      <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ count($organization->joinedMembers)}}</td>

                      <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $organization->max_members}}</td>

                      <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $organization->user->username}}
                      </td>

                      <td class="p-4 space-x-2 whitespace-nowrap">
                        <a href="#" id="updateProductButton" data-drawer-target="drawer-update-product-default"
                          data-drawer-show="drawer-update-product-default" aria-controls="drawer-update-product-default"
                          data-drawer-placement="right"
                          class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                          <img src="{{ Vite::asset("resources/icons/edit.svg") }}" alt="" class="w-4 h-4 mr-2">
                          Update
                        </a>
                        <a href="#" id="deleteProductButton" data-drawer-target="drawer-delete-product-default"
                          data-drawer-show="drawer-delete-product-default" aria-controls="drawer-delete-product-default"
                          data-drawer-placement="right"
                          class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                          <img src="{{ Vite::asset("resources/icons/delete.svg")}}" alt="" class="w-4 h-4 mr-2">
                          Delete item
                        </a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <div
          class="sticky bottom-0 right-0 items-center w-full p-4 bg-white border-t border-gray-200 sm:flex sm:justify-between dark:bg-gray-800 dark:border-gray-700">
          <div class="flex items-center mb-4 sm:mb-0">
            <a href="#"
              class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
              <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                  d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                  clip-rule="evenodd"></path>
              </svg>
            </a>
            <a href="#"
              class="inline-flex justify-center p-1 mr-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
              <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                  clip-rule="evenodd"></path>
              </svg>
            </a>
            <span class="text-sm font-normal text-gray-500 dark:text-gray-400">Showing <span
                class="font-semibold text-gray-900 dark:text-white">1-20</span> of <span
                class="font-semibold text-gray-900 dark:text-white">2290</span></span>
          </div>
          <div class="flex items-center space-x-3">
            <a href="#"
              class="inline-flex items-center justify-center flex-1 px-5 py-2 pr-5 text-sm font-medium text-center bg-gray-300 rounded-lg text-stone-500 dark:text-white dark:bg-slate-700 dark:hover:bg-slate-600 focus:ring-4 dark:focus:ring-slate-400 hover:bg-gray-400 focus:ring-gray-500">
              <img src="{{ Vite::asset("resources/icons/previous.svg")}}" alt="" class="w-5 h-5 mr-1 -ml-1">
              Previous
            </a>
            <a href="#"
              class="inline-flex items-center justify-center flex-1 px-5 py-2 pr-5 text-sm font-medium text-center bg-gray-300 rounded-lg text-stone-500 dark:text-white dark:bg-slate-700 dark:hover:bg-slate-600 focus:ring-4 dark:focus:ring-slate-400 hover:bg-gray-400 focus:ring-gray-500">
              Next
              <img src="{{ Vite::asset("resources/icons/next.svg")}}" alt="" class="w-5 h-5 ml-1 -mr-1">
            </a>
          </div>
        </div>

        <!-- Edit Product Drawer -->
        <div id="drawer-update-product-default"
          class="fixed top-0 right-0 z-40 w-full h-screen max-w-xs p-4 overflow-y-auto transition-transform translate-x-full bg-white dark:bg-gray-800"
          tabindex="-1" aria-labelledby="drawer-label" aria-hidden="true">
          <h5 id="drawer-label"
            class="inline-flex items-center mb-6 text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">
            Update Product</h5>
          <button type="button" data-drawer-dismiss="drawer-update-product-default"
            aria-controls="drawer-update-product-default"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
            <img src="{{ Vite::asset("resources/icons/close-icon.svg")}}" alt="" class="w-5 h-5">
            <span class="sr-only">Close menu</span>
          </button>

          {{-- update a organizatin --}}
          <form action="#" method="POST">
            <div class="space-y-4">
              <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                <input type="text" name="name" id="name"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                  value="Education Dashboard" placeholder="Type product name" required="">
              </div>
              <div>
                <label for="description"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                <textarea name="description" id="description" rows="10"
                  class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                  placeholder="Enter event description here"></textarea>
              </div>
              <div>
                <label for="max_members" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Max
                  Members</label>
                <input type="number" name="max_members" id="max_members"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                  value="2999" placeholder="100" required="">
              </div>
            </div>

            <div class="bottom-0 left-0 flex justify-center w-full pb-4 mt-4 space-x-4 sm:absolute sm:px-4 sm:mt-0">
              <button type="submit"
                class="w-full justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                Update
              </button>
              <button type="button" data-drawer-dismiss="drawer-create-product-default"
                aria-controls="drawer-create-product-default"
                class="inline-flex w-full justify-center text-gray-500 items-center bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                <img src="{{ Vite::asset("resources/icons/close-icon.svg")}}" alt="" class="w-5 h-5 -ml-1 sm:mr-1">
                Cancel
              </button>
            </div>
          </form>
        </div>


        <!-- Delete Product Drawer -->
        <div id="drawer-delete-product-default"
          class="fixed top-0 right-0 z-40 w-full h-screen max-w-xs p-4 overflow-y-auto transition-transform translate-x-full bg-white dark:bg-gray-800"
          tabindex="-1" aria-labelledby="drawer-label" aria-hidden="true">
          <h5 id="drawer-label"
            class="inline-flex items-center text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">Delete
            item</h5>
          <button type="button" data-drawer-dismiss="drawer-delete-product-default"
            aria-controls="drawer-delete-product-default"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
            <img src="{{ Vite::asset("resources/icons/close-icon.svg")}}" alt="" class="w-5 h-5">
            <span class="sr-only">Close menu</span>
          </button>
          <svg class="w-10 h-10 mt-8 mb-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
          </svg>
          <h3 class="mb-6 text-lg text-gray-500 dark:text-gray-400">Are you sure you want to delete this product?</h3>
          <a href="#"
            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2.5 text-center mr-2 dark:focus:ring-red-900">
            Yes, I'm sure
          </a>
          <a href="#"
            class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-primary-300 border border-gray-200 font-medium inline-flex items-center rounded-lg text-sm px-3 py-2.5 text-center dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700"
            data-drawer-hide="drawer-delete-product-default">
            No, cancel
          </a>
        </div>


        <!-- Add Product Drawer -->
        <div id="drawer-create-product-default"
          class="fixed top-0 right-0 z-40 w-full h-screen max-w-xs p-4 overflow-y-auto transition-transform translate-x-full bg-white dark:bg-gray-800"
          tabindex="-1" aria-labelledby="drawer-label" aria-hidden="true">
          <h5 id="drawer-label"
            class="inline-flex items-center mb-6 text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">New
            Organization</h5>
          <button type="button" data-drawer-dismiss="drawer-create-product-default"
            aria-controls="drawer-create-product-default"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
            <img src="{{ Vite::asset("resources/icons/close-icon.svg")}}" alt="" class="w-5 h-5">
            <span class="sr-only">Close menu</span>
          </button>
          <form action="{{ route("organizations.store") }}" method="POST">
            @csrf

            <div class="space-y-4">
              <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                <input type="text" name="name" id="name"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                  value="" placeholder="Type organization name" required="">
                @error("name")
                <p>{{ $message }}</p>
                @enderror
              </div>
              <div>
                <label for="description"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                <textarea name="description" id="description" rows="10"
                  class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                  placeholder="Enter description here"></textarea>
                @error("description")
                <p>{{ $message }}</p>
                @enderror
              </div>
              <div>
                <label for="max_members" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Max
                  Members</label>
                <input type="number" name="max_members" id="max_members"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                  value="" placeholder="100" required="">
                @error("max_members")
                <p>{{ $message }}</p>
                @enderror
              </div>
              <div class="bottom-0 left-0 flex justify-center w-full pb-4 space-x-4 md:px-4 md:absolute">
                <button type="submit"
                  class="text-white w-full justify-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                  Add Organization
                </button>
                <button type="button" data-drawer-dismiss="drawer-create-product-default"
                  aria-controls="drawer-create-product-default"
                  class="inline-flex w-full justify-center text-gray-500 items-center bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                  <img src="{{ Vite::asset("resources/icons/close-icon.svg")}}" alt="" class="w-5 h-5 -ml-1 sm:mr-1">
                  Cancel
                </button>
              </div>
          </form>
        </div>


      </main>

    </div>

  </div>

</body>

</html>
