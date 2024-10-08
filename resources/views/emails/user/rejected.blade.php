<x-mail::message>
  # Sorry. Try another organization

  we are sorry to inform you that, we could not assign you to the
  organization you chose.
  Please try another one.

  <x-mail::button :url='""'>
    clickable btn to view the organization listings
  </x-mail::button>

  Thanks,<br>
  {{ config("app.name") }}
</x-mail::message>
