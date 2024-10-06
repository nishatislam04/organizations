<label for="{{ $for }}"
  {{ $attributes->merge(["class"=>"block mb-2 text-xl font-medium text-gray-900 dark:text-white $class"])}}>{{ $slot }}</label>
