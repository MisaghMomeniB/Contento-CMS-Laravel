<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>صفحه فرود سرویس</title>
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
<header class="bg-navy text-white p-6">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-2xl font-bold">ارائه دهنده خدمات دیجیتال</h1>
        <nav class="space-x-4 space-x-reverse">
            <a href="#services" class="hover:text-sky transition">خدمات</a>
            <a href="{{route('showLogin')}}" class="hover:text-sky transition">ورود</a>
            <a href="#about" class="hover:text-sky transition">درباره ما</a>
            <a href="#contact" class="hover:text-sky transition">تماس با ما</a>
        </nav>
    </div>
</header>



<footer class="bg-navy text-white text-center py-6">
    <p>© ۲۰۲۵ همه حقوق محفوظ است.</p>
</footer>
</body>

</html>
