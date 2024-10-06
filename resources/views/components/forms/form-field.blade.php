@props(["id"])

<div class="col-span-6" id="{{ $id ?? "" }}">{{ $slot }}</div>
