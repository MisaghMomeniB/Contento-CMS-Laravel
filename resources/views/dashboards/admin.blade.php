<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>مدیریت</title>
</head>

<body class="h-screen bg-white flex flex-row">
    {{-- Side-Bar --}}
    <aside id="sidebar"
        class="w-64 h-screen bg-gray-800 text-white p-4 transition-transform duration-300 transform translate-x-0">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold">مدیریت</h2>

        </div>
        <nav class="space-y-3">
            <a href="#" class="block hover:bg-gray-700 px-3 py-2 rounded">ثبت دسته بندی</a>
            <a href="#" class="block hover:bg-gray-700 px-3 py-2 rounded">ثبت محصول</a>
            <a href="#" class="block hover:bg-gray-700 px-3 py-2 rounded">ثبت فاکتور</a>
        </nav>
    </aside>
</body>

</html>