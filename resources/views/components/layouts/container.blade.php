@props(['search_route'=> ""])

<x-layouts.nav :search_route="$search_route" />

<div class="flex pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900">

    <x-layouts.aside />


    <div class="fixed inset-0 z-10 hidden bg-gray-900/50 dark:bg-gray-900/90" id="sidebarBackdrop"></div>
    <div id="modal-overlay" class="absolute inset-0 z-10 hidden bg-gray-900 bg-opacity-50"></div>

    {{ $slot }}
</div>
