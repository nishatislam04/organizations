@if ($sortDir === "asc")
<a href="{{ route("organizations.index", ["sortBy"=>"$sortBy", "sortDir"=> ($sortDir === "asc" ? "desc" : "asc") ])}}">
    <img src="{{ Vite::asset("resources/icons/org/asc.svg")}}" alt="" class="w-5 h-5 cursor-pointer">
</a>
@else
<a href="{{ route("organizations.index", ["sortBy"=>"$sortBy", "sortDir"=>($sortDir === "asc" ? "desc" : "asc") ])}}">
    <img src="{{ Vite::asset("resources/icons/org/desc.svg")}}" alt="" class="w-5 h-5 cursor-pointer">
</a>
@endif
