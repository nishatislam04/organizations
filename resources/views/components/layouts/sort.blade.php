@props(["sort_route" => ""])

@if ($sortDir === "asc")
  <a
    href="{{ route($sort_route, ["sortBy" => "$sortBy", "sortDir" => $sortDir === "asc" ? "desc" : "asc"]) }}">
    <x-icon.icon class="w-5 h-5 cursor-pointer" fill="gray"
      icon="asc" />
  </a>
@else
  <a
    href="{{ route($sort_route, ["sortBy" => "$sortBy", "sortDir" => $sortDir === "asc" ? "desc" : "asc"]) }}">
    <x-icon.icon class="w-5 h-5 cursor-pointer" fill="gray"
      icon="desc" />
  </a>
@endif
