<div class="flex items-center">
    <input id="checkbox" aria-describedby="checkbox-1" type="checkbox"
        {{ $attributes->merge(["class"=>"w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600 $type"])}}>
    <label for="checkbox" class="sr-only">checkbox</label>
</div>
