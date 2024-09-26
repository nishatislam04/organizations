<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>amin dashboard</title>
  @vite("resources/css/app.css")
</head>

<body>
  <div class="bg-[#222e3c] w-3/12">
    {{-- sidebar --}}
    <div>
      {{-- sidebar logo --}}
      <div>
        <h1><a href="#">admin kit</a></h1>
      </div>
      {{-- sidebar section --}}
      <div>
        <ul>
          <li>
            <a href="#" class="flex">
              <img src="{{ Vite::asset("resources/icons/organizations.svg")}}" alt="organizations icons"
                class="h-8 w-8 fill-red-500">
              <p class="text-[#A6ACB3]">organizations</p>

            </a>
          </li>
          <li>
            <a href="#" class="flex">
              <img src="{{ Vite::asset("resources/icons/members.svg")}}" alt="organizations icons" class="h-8 w-8">
              members
            </a>
          </li>
        </ul>
      </div>
    </div>
    {{-- main part --}}
    <div>
      {{-- main header --}}
      <div></div>
      {{-- main story --}}
    </div>
  </div>
  @vite("resources/js/app.js")
</body>

</html>
