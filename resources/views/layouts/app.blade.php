<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Windmill Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/tailwind.output.css') }}" />
    <script src="{{ asset('admin/assets/js/alpinejs/alpinev2/dist/alpine.min.js') }}" defer ></script>
    <script src="{{ asset('admin/assets/js/init-alpine.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('admin/assets/js/ajax/libs/Chart.js/2.9.3/Chart.min.css') }}" />
    <script src="{{ asset('admin/assets/js/ajax/libs/Chart.js/2.9.3/Chart.min.js') }}" defer></script>
    <script src="{{ asset('admin/assets/js/charts-lines.js') }}" defer></script>
    <script src="{{ asset('admin/assets/js/charts-pie.js') }}" defer></script>
  </head>
  <body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
      
        @include('layouts.partials.sidebar')

      <div class="flex flex-col flex-1 w-full">
        <header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
          {{ $header }}
        </header>

        {{-- Main Content --}}
        <main class="h-full overflow-y-auto">
          {{ $slot }}
        </main>
      </div>
    </div>
  </body>
</html>
