{{-- anchor --}}
@if ($type === "a")
  <a id="{{ $id }}" href="{{ $href ?? "#" }}"
    {{ $attributes->merge(["class" => "font-medium rounded-lg $class"]) }}>
    {!! $slot ?? "" !!}
  </a>
@endif

{{-- button --}}
@if ($type === "button")
  <button id="{{ $id }}" type="button"
    {{ $attributes->merge(["class" => "font-medium rounded-lg $class"]) }}
    @if ($attributes->has("disabled")) disabled @endif>
    {{ $slot }}
  </button>
@endif

{{-- input submit --}}
@if ($type === "submit")
  <input id="{{ $id }}" type="submit" value="{{ $value }}"
    {{ $attributes->merge(["class" => "bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 cursor-pointer $class"]) }}>
@endif
