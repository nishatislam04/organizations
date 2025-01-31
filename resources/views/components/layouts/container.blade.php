@props(["search_route" => ""])

<x-layouts.nav :search_route="$search_route" />

<div class="h-full flex pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900">

  @auth

    <x-layouts.aside />
  @endauth


  <div class="fixed inset-0 z-10 hidden bg-gray-900/50 dark:bg-gray-900/90"
    id="sidebarBackdrop"></div>
  <div class="absolute inset-0 z-10 hidden bg-gray-900 bg-opacity-50"
    id="modal-overlay"></div>

  {{ $slot }}
</div>
