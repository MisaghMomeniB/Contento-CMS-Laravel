<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>پنل مدیریت</title>
</head>

<body class="h-screen bg-white flex">

    <!-- Sidebar -->
    <aside id="sidebar"
        class="w-64 h-full bg-gray-800 text-white p-6 transition-transform duration-300 transform translate-x-0 shadow-lg">

        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-bold tracking-tight">مدیریت</h1>
        </div>

        <!-- Navigation -->
        <nav class="space-y-4">
            <a href="#" class="block px-4 py-2 rounded hover:bg-gray-700 transition-colors">ثبت دسته‌بندی</a>
            <a href="#" class="block px-4 py-2 rounded hover:bg-gray-700 transition-colors">ثبت محصول</a>
            <a href="#" class="block px-4 py-2 rounded hover:bg-gray-700 transition-colors">ثبت فاکتور</a>
        </nav>

        <!-- Logout -->
        <form method="POST" action="{{ route('logout') }}" class="mt-10">
            @csrf
            <button type="submit"
                class="w-full bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded transition-colors">
                خروج
            </button>
        </form>

    </aside>

    <!-- Main content placeholder -->
    <main class="flex-1 p-6">
        <!-- محتوای اصلی اینجا قرار می‌گیرد -->
    </main>

</body>

</html>