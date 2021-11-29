<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Windmill Dashboard</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/tailwind.output.css') }}" />
    <script
      src="{{ asset('admin/assets/js/alpinejs/alpinev2/dist/alpine.min.js') }}"
      defer
    ></script>
    <script src="{{ asset('admin/assets/js/init-alpine.js') }}"></script>
  </head>
  <body>
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
        {{ $slot }}
    </div>
  </body>

</html>
