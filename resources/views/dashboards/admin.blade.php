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
            <a href="{{route("admin.categories.create")}}"
                class="block px-4 py-2 rounded hover:bg-gray-700 transition-colors">ثبت دسته‌بندی</a>
            <a href="{{route("admin.products.create")}}"
                class="block px-4 py-2 rounded hover:bg-gray-700 transition-colors">ثبت محصول</a>
            <a href="{{route("admin.invoices.create")}}"
                class="block px-4 py-2 rounded hover:bg-gray-700 transition-colors">ثبت فاکتور</a>
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
    <main class="block">

        <!-- From Uiverse.io by emmanuelh-dev -->
        <div class="container mx-auto px-4 py-8 max-w-3xl">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- محصولات ثبت شده -->
                <div class="bg-gray-700 rounded-2xl p-6 shadow-xl text-white">
                    <h2 class="text-lg font-bold mb-1">📦 محصولات ثبت شده</h2>
                    <p class="text-gray-200 text-lg mt-4">تعداد: {{$productCount}}</p>
                </div>

                <!-- مشتریان حقوقی -->
                <div class="bg-gray-700 rounded-2xl p-6 shadow-xl text-white">
                    <h2 class="text-lg font-bold mb-1">🏢 مشتریان حقوقی</h2>
                    <p class="text-gray-200 text-lg mt-4">تعداد: {{$legalCount}}</p>
                </div>

                <!-- مشتریان حقیقی -->
                <div class="bg-gray-700 rounded-2xl p-6 shadow-xl text-white">
                    <h2 class="text-lg font-bold mb-1">👤 مشتریان حقیقی</h2>
                    <p class="text-gray-200 text-lg mt-4">تعداد: {{$realCount}}</p>
                </div>

            </div>
        </div>


    </main>

</body>

</html>