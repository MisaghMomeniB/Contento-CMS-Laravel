<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>داشبورد</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: "Vazirmatn", sans-serif;
        }
    </style>
</head>

<body class="bg-gradient-to-tr from-indigo-50 to-blue-100 min-h-screen flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-indigo-600 text-white flex flex-col shadow-lg">
        <div class="p-6 border-b border-indigo-500">
            <h2 class="text-2xl font-bold">پنل مدیریتی</h2>
            <p class="text-sm text-indigo-200 mt-1">{{ auth()->user()->type }}</p>
        </div>

        <nav class="flex-1 p-4 space-y-3">
            <a href="#" class="block py-2 px-4 rounded hover:bg-indigo-500 transition">داشبورد</a>
            <a href="#" class="block py-2 px-4 rounded hover:bg-indigo-500 transition">پروفایل</a>
            <a href="#" class="block py-2 px-4 rounded hover:bg-indigo-500 transition">فاکتورها</a>
            <a href="#" class="block py-2 px-4 rounded hover:bg-indigo-500 transition">تنظیمات</a>
        </nav>

        <form method="POST" action="{{ route('logout') }}" class="p-4 border-t border-indigo-500">
            @csrf
            <button class="w-full py-2 text-sm bg-red-500 hover:bg-red-600 rounded text-white transition">خروج</button>
        </form>
    </aside>

    <!-- Main -->
    <main class="flex-1 p-6">
        <!-- Header -->
        <header class="mb-6">
            <h1 class="text-3xl font-bold text-indigo-700">سلام {{ auth()->user()->first_name ?? 'کاربر' }} 👋</h1>
            <p class="text-sm text-gray-600 mt-1">خوش آمدید</p>
        </header>

        {{-- <!-- Stats Cards -->
        <section class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <div class="bg-white shadow rounded-lg p-5 border-r-4 border-green-400">
                <h3 class="text-gray-700 font-semibold">تعداد سفارش‌ها</h3>
                <p class="text-2xl font-bold mt-2 text-green-500">۱۲</p>
            </div>
            <div class="bg-white shadow rounded-lg p-5 border-r-4 border-yellow-400">
                <h3 class="text-gray-700 font-semibold">مبلغ کل</h3>
                <p class="text-2xl font-bold mt-2 text-yellow-500">۲,۳۰۰,۰۰۰ تومان</p>
            </div>
            <div class="bg-white shadow rounded-lg p-5 border-r-4 border-blue-400">
                <h3 class="text-gray-700 font-semibold">وضعیت فعال</h3>
                <p class="text-xl mt-2 text-blue-500">فعال</p>
            </div>
        </section> --}}
    </main>

</body>

</html>