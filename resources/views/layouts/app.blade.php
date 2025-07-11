<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'پنل کاربری')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Vazir', sans-serif;
        }
    </style>
</head>

<body
    class="min-h-screen bg-gray-100 dark:bg-gray-800 flex items-center justify-center text-gray-800 dark:text-gray-100 px-4">

    <main class="w-full max-w-screen-md">
        @yield('content')
    </main>

</body>

</html>