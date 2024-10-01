{{-- anchor --}}
@if ($type=== "a")
<a href="{{ $href }}" id="{{ $id }}" {{ $attributes->merge(['class'=>"font-medium rounded-lg $class"])}}>
    {{ $slot }}
</a>
@endif

{{-- button --}}
@if ($type === "button")
<button type="button" id="{{ $id }}" {{ $attributes->merge(['class'=>"font-medium rounded-lg $class"])}}>
    {{ $slot }}
</button>
@endif

{{-- input submit --}}
@if ($type === "submit")
<input type="submit" value="{{ $value }}" id="{{ $id }}"
    {{ $attributes->merge(['class'=>"font-medium rounded-lg $class"])}}>
@endif
