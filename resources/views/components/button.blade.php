{{-- anchor --}}
@if ($type=== "a")
<a href="{{ $href ?? '#' }}" id="{{ $id }}" {{ $attributes->merge(['class'=>"font-medium rounded-lg $class"])}}>
    {!! $slot ?? '' !!}
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
    {{ $attributes->merge(['class'=>"bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 cursor-pointer $class"])}}>
@endif
