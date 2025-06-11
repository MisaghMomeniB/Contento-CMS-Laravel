<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'عنوان صفحه خودم')</title>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@700&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        vazir: ['Vazirmatn', 'sans-serif']
                    },
                    colors: {
                        sky: '#87CEEB',
                        navy: '#1e2a38'
                    }
                }
            },
            darkMode: 'class'
        }
    </script>
    <style>
        * {
            font-family: 'Vazirmatn', sans-serif;
        }
    </style>
</head>
<body class="bg-white text-navy">

<div>
    @yield('content')
</div>

</body>
</html>
