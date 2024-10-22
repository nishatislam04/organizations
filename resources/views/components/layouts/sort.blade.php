@props(["sort_route" => ""])

@if ($sortDir === "asc")
  <a
    href="{{ route($sort_route, ["sortBy" => "$sortBy", "sortDir" => $sortDir === "asc" ? "desc" : "asc"]) }}">
    <svg class="w-5 h-5 cursor-pointer">
      <use xlink:href="{{ asset("sprite.svg#asc") }}"></use>
    </svg>
  </a>
@else
  <a
    href="{{ route($sort_route, ["sortBy" => "$sortBy", "sortDir" => $sortDir === "asc" ? "desc" : "asc"]) }}">
    <svg class="w-5 h-5 cursor-pointer">
      <use xlink:href="{{ asset("sprite.svg#desc") }}"></use>
    </svg>
  </a>
@endif
